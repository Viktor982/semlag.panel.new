@extends('layout.default')
@section('content')

<div id="page-title">
    <h2>Estatísticas - Gerais</h2>
</div>

<div class="panel-body">
    <div class="form-horizontal bordered-row">

        <div class="form-group" id="chart_interval" style="display:block;">
            <label class="col-sm-3 control-label">Intervalo:</label>
            <div class="col-sm-6">
                <select name="interval" id="interval" class="form-control">
                    <option value="0">---</option>
                    <option value="1">Por hora</option>
                    <option value="2" selected>Por dia</option>
                    <option value="3">Por mês</option>
                </select>
            </div>
        </div>

        <div id="chart_hourly" class="form-group form-int-option" style="display: none;">
            <label class="col-md-4 control-label" for="hourly_date">Selecione um dia</label>
            <div class="col-md-4">
                <input class="form-control input-md" id="chart_hourly_i" type="date" value="{{ date("Y") }}-{{ date("m") }}-{{ date("d") }}">
            </div>
        </div>

        <div id="chart_monthly" class="form-group form-int-option" style="display: block;">
            <label class="col-md-4 control-label" for="monthly_month">Selecione um mês</label>
            <div class="col-md-4">
                <input class="form-control input-md" id="chart_monthly_i" type="month" value="{{ date("Y") }}-{{ date('m') }}">
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
                <button type="submit" id="submit_btn" class="btn btn-black" style="display:block;" onclick="generateChart()">Enviar
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
    var interval_form = document.getElementById('chart_interval');
    var interval = document.getElementById('interval');
    var submit_btn = document.getElementById('submit_btn');
    var result = document.getElementById('result');
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

    interval.addEventListener('change', function(e) {
        if (this.value == 0) {
            var hidden = ["1", "2", "3"];
            var visible = [];
            submit_btn.style.display = 'none';
        } else {
            var visible = [this.value];
            var hidden = $(["1", "2", "3"]).not(visible).get();
        }
        visible.forEach(function(v) {
            document.getElementById(form_ids[v]).style.display = 'block';
        });
        hidden.forEach(function(h) {
            document.getElementById(form_ids[h]).style.display = 'none';
        });
        submit_btn.style.display = 'block';
    });

    function generateChart() {
        $('#submit_btn').button('loading');
        axios.post('{{ route('api.charts.sales.avg') }}', {
                interval: interval.value,
                date: document.getElementById(form_ids[interval.value] + '_i').value
            }).then(function(response) {
                $('#submit_btn').button('reset');
                _res = response.data;
                console.log(_res.data.map(item => parseFloat(item)));
                

                Highcharts.chart('chart-container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: `Média por ${chart_titles[interval.value]}`
                    },
                    xAxis: {
                        categories: _res.categories,
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Quantidade'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.2f}</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [{
                        name: 'Media',
                        data: _res.data.map(item => parseFloat(item))

                    }]
                });

                result.style.display = 'block';
            },
            function(response) {
                $('#submit_btn').button('reset');
            });
    }
</script>
@endsection