@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Estatísticas - Users Online</h2>
    </div>

    <form class="form-horizontal bordered-row">
        <div class="form-group">
            <label class="col-sm-3 control-label">Intervalo:</label>
            <div class="col-sm-6">
                <select name="interval" id="interval" class="form-control">
                    <option value="0" selected>---</option>
                    <option value="1">Por hora</option>
                    <option value="2">Por dia</option>
                    <option value="3">Por mês</option>
                </select>
            </div>
        </div>

        <div id="hourly_form" class="form-group form-int-option" style="display: none;">
            <label class="col-md-4 control-label" for="hourly_date">Selecione um dia</label>
            <div class="col-md-4">
                <input class="form-control input-md" id="hourly_date" type="date" value="2017-07-15">
            </div>
        </div>

        <div id="monthly_form" class="form-group form-int-option" style="display: none;">
            <label class="col-md-4 control-label" for="monthly_month">Selecione um mês</label>
            <div class="col-md-4">
                <input class="form-control input-md" id="monthly_month" type="month" value="2017-07">
            </div>
        </div>

        <div id="yearly_form" class="form-group form-int-option" style="display: none;">
            <label class="col-md-4 control-label" for="yearly_year">Selecione um ano</label>
            <div class="col-md-4">
                <input class="form-control input-md" id="yearly_year" type="number" value="2017">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-6">
                <button type="submit" id="submit_btn" class="btn btn-black">Enviar</button>
            </div>
        </div>


        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <h3 class="title-hero">
                        Resultado:
                    </h3>
                    <div class="example-box-wrapper">
                        <canvas id="canvas-2" height="100" class="chart"></canvas>
                    </div>
                </div>
            </div>
        </div>


    </form>

    <div class="example-box-wrapper">
        <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Usuários</th>
                <th>Usuários Premium</th>
                <th>Usuários VIP</th>
                <th>Usuários Free</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Usuários</th>
                <th>Usuários Premium</th>
                <th>Usuários VIP</th>
                <th>Usuários Free</th>
            </tr>
            </tfoot>

            <tbody>
            <tr>
                <td>325898</td>
                <td>Especial Ouro Aurea</td>
                <td>1</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>325898</td>
                <td>Especial Ouro Aurea</td>
                <td>1</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>325898</td>
                <td>Especial Ouro Aurea</td>
                <td>1</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>

            </tbody>
        </table>

        @endsection
        @section('extra-scripts')
            <script type="text/javascript">

                $(function () {

                    /* Line */

                    var randomScalingFactor = function () {
                        return Math.round(Math.random() * 100)
                    };
                    var lineChartData = {
                        labels: ["Janeiro", "Fervereiro", "Março", "Abril", "Maio", "Junho", "Julho"],
                        datasets: [
                            {
                                label: "BRL",
                                fillColor: "rgba(220,220,220,0.2)",
                                strokeColor: "rgba(220,220,220,1)",
                                pointColor: "rgba(220,220,220,1)",
                                pointStrokeColor: "#fff",
                                pointHighlightFill: "#fff",
                                pointHighlightStroke: "rgba(220,220,220,1)",
                                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
                            },
                            {
                                label: "USD",
                                fillColor: "rgba(151,187,205,0.2)",
                                strokeColor: "rgba(151,187,205,1)",
                                pointColor: "rgba(151,187,205,1)",
                                pointStrokeColor: "#fff",
                                pointHighlightFill: "#fff",
                                pointHighlightStroke: "rgba(151,187,205,1)",
                                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
                            }
                        ]

                    }

                    var ctx = document.getElementById("canvas-2").getContext("2d");
                    window.myLine = new Chart(ctx).Line(lineChartData, {
                        responsive: true
                    });
                });

            </script>

            <script type="text/javascript">

                $(document).ready(function () {
                    $('#datatable-responsive').DataTable({
                        responsive: true,
                        paging: false,
                    });
                });

                $(document).ready(function () {
                    $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
                });

            </script>
            <script type="text/javascript">


                /**
                 * Created by Fernando on 11/05/16.
                 */
                $('#type').on('change', function () {
                    if ($(this).val() == '0') {
                        $('#submit_btn').attr('disabled', true);
                        $('#interval').val(0);
                        $('#interval').attr('disabled', true);
                        $('.form-int-option').hide();
                    } else {
                        $('#interval').removeAttr('disabled');
                    }
                });
                /**
                 * Created by hal on 26/01/16.
                 */
                $('#interval').on('change', function () {
                    if ($(this).val() == '0') {
                        $('#submit_btn').attr('disabled', true);
                    } else {
                        $('#submit_btn').removeAttr('disabled');
                    }
                    $('.form-int-option').hide();
                    console.log($(this).val());
                    switch ($(this).val()) {
                        case '1':
                            $('#hourly_form').fadeIn();
                            break;
                        case '2':
                            $('#monthly_form').fadeIn();
                            break;
                        case '3':
                            $('#yearly_form').fadeIn();
                            break;
                    }
                });
                $('#submit_btn').on('click', function () {
                    var val, interval, type;
                    type = $('#type').val();
                    switch ($('#interval').val()) {
                        case '1':
                            interval = 'hourly';
                            val = $('#hourly_date').val();
                            break;
                        case '2':
                            interval = 'daily';
                            val = $('#monthly_month').val();
                            break;
                        case '3':
                            interval = 'monthly';
                            val = $('#yearly_year').val();
                            break;
                    }
                    var $canvas = $("#canvas-container");
                    $canvas.empty();
                    var $canvas2 = $("<canvas></canvas>");
                    var ctx = $canvas2.get(0).getContext("2d");
                    $canvas2.appendTo($canvas);
                    var myLineChart = new Chart(ctx);

                    $('#submit_btn').html('<span class="fa fa-refresh spinning"></span> Carregando...');
                    console.log("ajax/ajaxstatus.php?int=" + interval + "&date=" + val + "&type=" + type);
                    $.ajax({
                        url: "ajax/ajaxstatus.php?int=" + interval + "&date=" + val + "&type=" + type,
                        dataType: 'json',
                        success: function (result) {
                            $('#submit_btn').html('Enviar');
                            var aux_str = '  <table class="table table-bordered" ' +
                                '                        <tbody><tr>' +
                                '                            <th></th><th></th>' +
                                '                            </tr>';
                            result.datasets.forEach(function (e, i) {
                                aux_str += '<tr><td>' + e.label + '</td><td>' + e.total_sum + '</td></tr>';
                            });
                            $canvas.append(aux_str + '</tbody></table>');
                            myLineChart.Line(result, {
                                responsive: true,
                                animation: true,
                                barValueSpacing: 5,
                                barDatasetSpacing: 1,
                                tooltipFillColor: "rgba(0,0,0,0.8)",
                                multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
                });
            }
        });
    });

</script>
@endsection


