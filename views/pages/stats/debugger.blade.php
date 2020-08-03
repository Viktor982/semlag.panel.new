@extends('layout.default')
@section('content')
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">Debugger:</h3>
            <div class="form-horizontal">
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Filtrar Por Data:</label>
                    <div class="col-sm-6" id="time-selector">
                        <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">
                                        <i class="glyph-icon icon-calendar"></i>
                                    </span>
                            <input type="text"
                                   id="daterangepicker-time"
                                   class="form-control"
                                   value="{{ date('Y/m/d') }} - {{ date('Y/m/d') }}">
                        </div>
                    </div>
                    <button class="btn btn-black" id="search_date"><i class="glyph-icon icon-search"></i> Pesquisar
                    </button>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Filtrar por Jogos:</label>
                    <div class="col-sm-6">
                        <select multiple class="multi-select" name="filter_games">
                            <option>Tibia</option>
                            <option>Conquer</option>
                            <option>Grand Chase</option>
                            <option>Aion</option>
                            <option>Elsword</option>
                        </select>
                    </div>
                    <button class="btn btn-black" id="filter_game"><i class="glyph-icon icon-search"></i> Filtrar
                    </button>
                </div>
            </div>


            <div class="col-sm-6">

            </div>
            <p align="center">

            <div class="col-sm-11">
                <canvas id="myChart"></canvas>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <canvas id="myChart1"></canvas>
                </div>
                <div class="col-sm-3">
                    <canvas id="myChart2"></canvas>
                </div>
                <div class="col-sm-3">
                    <canvas id="myChart3"></canvas>
                </div>
                <div class="col-sm-3">
                    <canvas id="myChart4"></canvas>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <canvas id="myChart5"></canvas>
                </div>
                <div class="col-sm-3">
                    <canvas id="myChart6"></canvas>
                </div>
                <div class="col-sm-3">
                    <canvas id="myChart7"></canvas>
                </div>
                <div class="col-sm-3">
                    <canvas id="myChart8"></canvas>
                </div>
            </div>

            <canvas id="mensal"></canvas>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script type="text/javascript">
        /* Multiselect inputs */
        $(function () {
            "use strict";
            $(".multi-select").multiSelect();
            $(".ms-container").append('<i class="glyph-icon icon-exchange"></i>');
        });
    </script>
    <script>
        var config =  {
            type: 'doughnut',
            data: {
                labels: [
                    "Tibia - 300",
                    "Conquer - 50",
                    "WOW - 100",
                    "Grand Chase - 40",
                    "AION - 20"
                ],
                datasets: [
                    {
                        data: [300, 50, 100, 40, 20],
                        backgroundColor: [
                            "#FF6384",
                            "#36A2EB",
                            "#FFCE56",
                            "#ff118c",
                            "#33ff6b"
                        ],
                        hoverBackgroundColor: [
                            "#FF6384",
                            "#36A2EB",
                            "#FFCE56",
                            "#ff118c",
                            "#33ff6b"
                        ]
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: 'Gráfico de Pessoas Online - Total Online: 4520'
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': (' + tooltipPercentage + '%)';
                        }
                    }
                }
            }
        };

        var config2 = {
            type: 'doughnut',
            data: {
                labels: [
                    "Tibia - 300",
                    "Conquer - 50",
                    "WOW - 100",
                    "Grand Chase - 40",
                    "AION - 20"
                ],
                datasets: [
                    {
                        data: [300, 50, 100, 40, 20],
                        backgroundColor: [
                            "#FF6384",
                            "#36A2EB",
                            "#FFCE56",
                            "#ff118c",
                            "#33ff6b"
                        ],
                        hoverBackgroundColor: [
                            "#FF6384",
                            "#36A2EB",
                            "#FFCE56",
                            "#ff118c",
                            "#33ff6b"
                        ]
                    }
                ]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Dia 01'
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            for (var i in allData) {
                                total += allData[i];
                            }
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': (' + tooltipPercentage + '%)';
                        }
                    }
                }
            }
        };


        var ctx = document.getElementById("myChart").getContext("2d");
        window.myDoughnut = new Chart(ctx, config);
        {

        }

        var ctx1 = document.getElementById("myChart1").getContext("2d");
        window.myDoughnut1 = new Chart(ctx1, config2);
        {

        }
        var ctx2 = document.getElementById("myChart2").getContext("2d");
        window.myDoughnut2 = new Chart(ctx2, config2);
        {

        }
        var ctx3 = document.getElementById("myChart3").getContext("2d");
        window.myDoughnut3 = new Chart(ctx3, config2);
        {

        }
        var ctx4 = document.getElementById("myChart4").getContext("2d");
        window.myDoughnut4 = new Chart(ctx4, config2);
        {

        }
        var ctx5 = document.getElementById("myChart5").getContext("2d");
        window.myDoughnut5 = new Chart(ctx5, config2);
        {

        }
        var ctx6 = document.getElementById("myChart6").getContext("2d");
        window.myDoughnut6 = new Chart(ctx6, config2);
        {

        }

        var ctx7 = document.getElementById("myChart7").getContext("2d");
        window.myDoughnut7 = new Chart(ctx7, config2);
        {

        }

        var ctx8 = document.getElementById("myChart8").getContext("2d");
        window.myDoughnut8 = new Chart(ctx8, config2);
        {

        }
    </script>

    <script>
        var ctx = document.getElementById("server").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Dia : 1", "Dia : 2", "Dia : 3", "Dia : 4", "Dia : 5", "Dia : 6", "Dia : 7", "Dia : 8", "Dia : 9", "Dia : 10", "Dia : 11", "Dia : 12", "Dia : 13", "Dia : 14", "Dia : 15", "Dia : 16", "Dia : 17", "Dia : 18", "Dia : 19", "Dia : 20", "Dia : 21", "Dia : 22", "Dia : 23", "Dia : 24", "Dia : 25", "Dia : 26", "Dia : 27", "Dia : 28", "Dia : 29", "Dia : 30"],
                datasets: [{
                    label: 'Tibia',
                    data: ["416", "429", "681", "483", "514", "527", "571", "500", "710", "1178", "621", "671", "638", "698", "941", "907", "353", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    strokeColor: "rgba(21,3,152,0.2)",
                    fill: true,
                    borderColor: "#fff",
                    pointBackgroundColor: '#ff0009',
                    pointBorderColor: '#fff',
                    borderWidth: 2,
                }, {
                    label: 'PUBG',
                    data: ["268", "317", "543", "376", "411", "444", "436", "394", "593", "955", "564", "619", "558", "567", "799", "812", "367", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    backgroundColor: '#848380',
                    fill: true,
                    borderColor: "#fff",
                    pointBackgroundColor: '#848380',
                    pointBorderColor: '#fff',
                    borderWidth: 2,
                }, {
                    label: 'Conquer',
                    data: ["268", "317", "543", "376", "411", "444", "436", "394", "593", "955", "564", "619", "558", "567", "799", "812", "367", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    backgroundColor: '#294384',
                    borderColor: "#fff",
                    pointBackgroundColor: '#294384',
                    pointBorderColor: '#fff',
                    borderWidth: 2,
                }, {
                    label: 'DragonNest',
                    data: ["268", "317", "543", "376", "411", "444", "436", "394", "593", "955", "564", "619", "558", "567", "799", "812", "367", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    backgroundColor: '#294384',
                    fill: true,
                    borderColor: "#fff",
                    pointBackgroundColor: '#294384',
                    pointBorderColor: '#fff',
                    borderWidth: 2,
                }
                ]
            },
            responsive: true,
            animation: true,

            options: {
                tooltips: {
                    mode: 'index',
                    axis: 'y'
                },
            }
        });
    </script>

    <script>
        var ctx = document.getElementById("mensal").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                datasets: [{
                    label: 'Tibia',
                    data: [0, "12757", "9419", "12906", "22828", "7849", "8078", "10133", "9587", "11978", "12579", "13916"],
                    fill: true,
                    strokeColor: "rgba(21,3,152,0.2)",
                    backgroundColor: "rgba(32, 162, 219, 0.3)", // <-- supposed to be light blue
                    borderColor: "#fff",
                    pointBackgroundColor: '#0300ff',
                    pointBorderColor: '#fff',
                    borderWidth: 2,
                }, {
                    label: 'PUBG',
                    data: ["8712", "3740", "4227", "4074", "5488", "6336", "7745", "7250", "9462", "9369", "11736", 0],
                    fill: true,
                    backgroundColor: "rgba(196, 93, 105, 0.3)",
                    borderColor: "#fff",
                    pointBackgroundColor: '#848380',
                    pointBorderColor: '#fff',
                    borderWidth: 2,
                }, {
                    label: 'Conquer',
                    data: ["5853", "3769", "4068", "3865", "4254", "5157", "6878", "6018", "8348", "7882", "5885", 0],
                    fill: true,
                    backgroundColor: "rgba(136, 43, 105, 0.3)",
                    borderColor: "#fff",
                    pointBackgroundColor: '#294384',
                    pointBorderColor: '#fff',
                    borderWidth: 2,
                }
                ]
            },
            responsive: true,
            animation: true,
            barValueSpacing: 5,
            barDatasetSpacing: 1,
            tooltipFillColor: "rgba(0,0,0,0.8)",
            options: {
                tooltips: {
                    mode: 'index',
                    axis: 'y'
                },
                title: {
                    display: true,
                    text: 'Custom Chart Title'
                }
            }
        });
    </script>
@endsection