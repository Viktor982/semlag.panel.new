@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Estatísticas - Interface</h2>
    </div>
    {{-- ui_first_init - abriu o noping pela primeira vez
    ui_trial_test_button_clicked - clicou em botao trial
    ui_trial_start_now_button_clicked - clickou no botao de finilizar
    ui_optimization_button_clicked - clickou em optimiza
    ui_register_now_button_clicked - clickou no botao register now e fechou
    ui_first_time_optimization_button_clicked - primeira vez q clicou no botao optimiza
    ui_first_time_connection_received - recebeu dados da conexao --}}
    <div class="panel-body">
        <div class="form-horizontal bordered-row">
            <div class="form-group">
                <label class="col-sm-3 control-label">Ação realizada:</label>
                <div class="col-sm-6">
                    <select id="chart_type" class="form-control">
                        <option value="1" selected>Eventos Noping</option>
                        <option value="2">Eventos SemLag</option>
                        <option value="4">Eventos Clarogaming</option>
                    </select>
                </div>Apenas trial: 
                    <input name="only_trial" id="only_trial" type="checkbox">
            </div>

            <div class="form-group" id="chart_interval" style="display:block;">
                <label class="col-sm-3 control-label">Intervalo:</label>
                <div class="col-sm-6">
                    <select name="interval" id="interval" class="form-control">
                        <option value="1" selected>Por hora</option>
                        <option value="2" >Por dia</option>
                        <option value="3" >Por mês</option>
                    </select>
                </div>
            </div>

            <div id="chart_hourly" class="form-group form-int-option" style="display: block;">
                <label class="col-md-4 control-label" for="hourly_date">Selecione um dia</label>
                <div class="col-md-4">
                    <input class="form-control input-md" id="chart_hourly_i" type="date"
                           value="{{ date("Y") }}-{{ date("m") }}-{{ date("d") }}">
                </div>
            </div>

            <div id="chart_monthly" class="form-group form-int-option" style="display: none;">
                <label class="col-md-4 control-label" for="monthly_month">Selecione um mês</label>
                <div class="col-md-4">
                    <input class="form-control input-md" id="chart_monthly_i" type="month"
                           value="{{ date("Y") }}-{{ date('m') }}">
                </div>
            </div>

            <div id="chart_yearly" class="form-group form-int-option" style="display: none;">
                <label class="col-md-4 control-label" for="yearly_year">Selecione um ano</label>
                <div class="col-md-4">
                    <input class="form-control input-md" id="chart_yearly_i" type="number" value="{{ date('Y') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-5">

                </div>
                <div class="col-sm-6">
                    <button type="submit" id="submit_btn" class="btn btn-black" style="display:block;"
                            onclick="generateChart()">Enviar
                    </button>
                </div>
                <div class="col-sm-1"></div>
            </div>


            <div class="col-md-12" id="result" style="display: none;">
                <div class="panel">
                    <div class="panel-body">
                        <h3 class="title-hero">
                            Resultado:
                        </h3>
                        <div class="example-box-wrapper">
                            <div id="chart-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
    <script type="text/javascript">
        var type = document.getElementById('chart_type');
        var interval_form = document.getElementById('chart_interval');
        var interval = document.getElementById('interval');
        var submit_btn = document.getElementById('submit_btn');
        var result = document.getElementById('result');
        var only_trial = document.getElementById('only_trial');
        var form_ids = {
            1: "chart_hourly",
            2: "chart_monthly",
            3: "chart_yearly"
        };

        var chart_titles = {
            1: "Relatório por hora",
            2: "Relatório por dia",
            3: "Relatório por mês"
        };


        var endpoints = {
            1: '{{ route('api.charts.ui-actions') }}',
            2: '{{ route('api.charts.ui-actions') }}',
            4: '{{ route('api.charts.ui-actions') }}'
        };

        type.addEventListener('change', function (e) {
            interval_form.style.display = (this.value == 0) ? 'none' : 'block';
        });
        interval.addEventListener('change', function (e) {
            if (this.value == 0) {
                var hidden = ["1", "2", "3"];
                var visible = [];
                submit_btn.style.display = 'none';
            } else {
                var visible = [this.value];
                var hidden = $(["1", "2", "3"]).not(visible).get();
            }
            visible.forEach(function (v) {
                document.getElementById(form_ids[v]).style.display = 'block';
            });
            hidden.forEach(function (h) {
                document.getElementById(form_ids[h]).style.display = 'none';
            });
            submit_btn.style.display = 'block';
        });

        function generateChart() {
            axios.post(endpoints[type.value], {
                only_trial: only_trial.checked,
                software_id: parseInt(type.value),
                interval: interval.value,
                date: document.getElementById(form_ids[interval.value] + '_i').value
            }).then(function (response) {
                    _res = response.data;
                    for (var index in _res.series)
                    {
                        for (var key in _res.series[index]['data'])
                        {
                            if(_res.series[index]['data'][key] === 0)
                            {
                                _res.series[index]['data'][key] = null
                            };
                        }

                    }
                    Highcharts.chart('chart-container', {
                        chart: {
                            height: 740,
                            type: 'areaspline'
                        },
                        title: {
                            text: chart_titles[interval.value]
                        },
                        xAxis: {
                            categories: _res.period
                        },
                        tooltip: {
                            formatter: function() {
                            var s = '';
                            
                            var sortedPoints = this.points.sort(function(a, b){
                                  return ((a.y > b.y) ? -1 : ((a.y < b.y) ? 1 : 0));
                              });
                            $.each(sortedPoints , function(i, point) {
                                
                            s += '<br/><span style="color:'+ point.color +'">● </span>' + point.series.name +': <b>'+ point.y + '</b>';
                            });
                        
                            return s;
                            },
                            shared: true
                        },
                        credits: {
                            enabled: false
                        },
                        plotOptions: {
                            areaspline: {
                                fillOpacity: 0.15
                            },
                        },
                        series: _res.series
                    });
                    result.style.display = 'block';
                },
                function (response) {

                });
        }
    </script>
@endsection


