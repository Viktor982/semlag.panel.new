@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Estatísticas - Afiliados</h2>
    </div>
    <div class="panel-body">
        <div class="form-horizontal bordered-row">
            <div class="form-group">
                <label class="col-sm-3 control-label">E-mail do Afiliado:</label>
                <div class="col-sm-6">
                    <input class="form-control" id="affmail" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Intervalo:</label>
                <div class="col-sm-6">
                    <select id="interval" class="form-control">
                        <option value="0" selected>---</option>
                        <option value="1">Por hora</option>
                        <option value="2">Por dia</option>
                        <option value="3">Por mês</option>
                    </select>
                </div>
            </div>
            <div id="chart_hourly" class="form-group form-int-option" style="display: none;">
                <label class="col-md-4 control-label" for="hourly_date">Selecione um dia</label>
                <div class="col-md-4">
                    <input class="form-control input-md" id="chart_hourly_i" type="date" value="{{ date("Y-m-d")  }}">
                </div>
            </div>
            <div id="chart_monthly" class="form-group form-int-option" style="display: none;">
                <label class="col-md-4 control-label" for="monthly_month">Selecione um mês</label>
                <div class="col-md-4">
                    <input class="form-control input-md" id="chart_monthly_i" type="month" value="{{ date("Y-m") }}">
                </div>
            </div>
            <div id="chart_yearly" class="form-group form-int-option" style="display: none;">
                <label class="col-md-4 control-label" for="yearly_year">Selecione um ano</label>
                <div class="col-md-4">
                    <input class="form-control input-md" id="chart_yearly_i" type="number" value="{{ date("Y") }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-5"></div>
                <div class="col-sm-1">
                    <button type="submit" id="enviar" class="btn btn-black" style="display: none;"
                            onclick="requestChart()">Enviar
                    </button>
                </div>
                <div class="col-sm-6"></div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body" id="result" style="display: none;">
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
        var form_ids = {
            1: 'chart_hourly',
            2: 'chart_monthly',
            3: 'chart_yearly'
        };
        var chart_titles = {
            1: "Relatório por hora",
            2: "Relatório por dia",
            3: "Relatório por mês"
        };
        var interval = document.getElementById('interval');
        var submit = document.getElementById('enviar');
        interval.addEventListener('change', function () {
            if (this.value != 0) {
                var visible = [this.value];
                var hidden = $(["1", "2", "3"]).not(visible).get();
                submit.style.display = 'block';
            } else {
                submit.style.display = 'none';
                var visible = [];
                var hidden = [1, 2, 3]
            }
            visible.forEach(function (v) {
                document.getElementById(form_ids[v]).style.display = 'block';
            });
            hidden.forEach(function (h) {
                document.getElementById(form_ids[h]).style.display = 'none';
            });
        });
        var requestChart = function () {
            $('#enviar').button('loading');
            var email = document.getElementById('affmail').value;
            axios.post('{{ route('api.charts.affiliates') }}', {
                interval: interval.value,
                date: document.getElementById(form_ids[interval.value] + '_i').value,
                email: document.getElementById('affmail').value
            }).then(function (response) {
                    $('#submit_btn').button('reset');
                    _res = response.data;
                    Highcharts.chart('chart-container', {
                        chart: {
                            type: 'spline'
                        },
                        title: {
                            text: chart_titles[interval.value]
                        },
                        xAxis: {
                            categories: _res.period
                        },
                        tooltip: {
                            shared: true
                        },
                        credits: {
                            enabled: false
                        },
                        plotOptions: {
                            areaspline: {
                                fillOpacity: 0.5
                            },
                        },
                        series: _res.series
                    });
                    result.style.display = 'block';
                },
                function () {

                });
        };
    </script>
@endsection


