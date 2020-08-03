@extends('layout.default')
@section('content')

  <div id="page-title">

  <h2>Gráficos - Gerais V1.0 <h2 style="color:steelblue">{{$time_end}}</h2>
  
    </div>
    <div class="chart-container" id="chart-container" style="min-width: 310px; height: 1000px; max-width: 1000px; margin: 0 auto;">Gráfico</div>
    <div class="chart-column" id="chart-column" style="min-width: 310px; height: 1000px; max-width: 1000px; margin: 0 auto; display:none">Gráfico</div>
    <modal id="detail" style="min-width: 400px; height: 300px; margin: 0 auto"></modal>
    <style>
    #outer
        {
            width:100%;
            text-align: left;
        }
        .inner
        {
            display: inline-block;
        }
    </style>
    
	<form action="{{route('graphs.historical-period-sold')}}" method="get" class="form">
        <div class="form-group">
            <label>Data de Inicio:</label>
            <input type="date" name="start" id="date-start-input" class="form-control" data-date-inline-picker="true" required/>
        </div>
        <div class="form-group">
            <label>Data de Termino:</label>
            <input type="date" name="end" id="date-end-input" class="form-control" data-date-inline-picker="true" required/>
        </div>
        <div id="outer">
        <div class="inner">
            <button type="submit" onclick="generateChart();" class="btn btn-primary">Aplicar</button>
        </div>
    </form>
    
    <div class="inner">
    <form action="{{route('graphs.historical-last-three-days')}}" method="get" class="form">
            <button id="last-three-days" type="submit" method="get" class="btn btn-primary">Últimos três dias</button>
    </form>
    </div>
    <div class="inner">
    <form action="{{route('graphs.historical-last-week')}}" method="get" class="form">
            <button id="week" type="submit"  class="btn btn-primary">Última semana</button>
        </form>
    </div>
        <div class="inner">
        <form action="{{route('graphs.historical-last-month')}}" method="get" class="form">
            <button id="month" type="submit" class="btn btn-primary">Último mês</button>
        </form>
    </div>
    <div class="inner">
            <input type='button' id='hideshow-pie' value='pizza' class="btn btn-default"></button>
            </form>
        </div>
    <div class="inner">
            <input type='button' id='hideshow-column' value='coluna' class="btn btn-default"></button>
            </form>
        </div>    
    </div>
</div>
<script type="text/javascript">


window.onload = function() {
generateChart();
generateColumnChart();
jQuery(document).ready(function(){
        jQuery('#hideshow-pie').on('click', function(event) {        
             jQuery('#chart-container').toggle('show');
        });
    });    

    jQuery(document).ready(function(){
        jQuery('#hideshow-column').on('click', function(event) {        
             jQuery('#chart-column').toggle('show');
        });
    });  
}; 

function generateChart(){
    Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.9,
                cy: 0.8,
                r: 0.2
            },
            stops: [
                [0, color],
                [1, Highcharts.Color(color).get('rgb')] // darken
            ]
        };
    })
});
    
    Highcharts.chart('chart-container', {
    chart: {
        align: 'center',
        width: 800,
        height: 800,
        backgroundColor:'rgba(255, 255, 255, 0.0)',
        plotBorderWidth: 0,
        plotShadow: false,
        type: 'pie'
    },
    legend: {
        align: 'left',
        layout: 'horizontal',
        x: 0,
        y: 0
    },
    title: {
        @if($totalSold>0)
        text: 'Vendas por jogos. Total do período é de {{$totalSold}}' 
        @else
        text: 'Entre a data no campo abaixo' 
        @endif
    },
    subtitle: {
        
    @if($totalSold>0)
    text: 'Entre {{$dateStart}} e {{$dateEnd}}.'    
    @endif
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },  
    
    series: [{
        name: 'Total',
        colorByPoint: true,
        data: [
        @foreach($plot as $plots => $value)
        {   
            name: '{{$plots}}', // -> retornar o jogo
            y: {{$value['total']}},// -> retornar cada jogo com sua respectiva venda
            @if($value['total']>50)
            visible: true
            @else
            visible:false
            @endif
        },
        @endforeach
        ]
    }],
    plotOptions: {
        pie: {
            size: '90%',
            allowPointSelect: true,
            cursor: 'pointer',
            borderColor: '#000000',
            dataLabels: {
                enabled: true,
                alignTo: 'plotEdges',
                format: '<b>{point.name}</b>: {point.y} ',
                distance: 10,
            }
        },
        series: {
            dataLabels: {
                enabled: true,
                inside: true,
                alignTo: 'connectors',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                },
            },
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true
                
            },
            showInLegend: true
        }
    }
});

}

 function generateColumnChart(){
    Highcharts.chart('chart-column', {
    chart: {
        zoomType: 'x',
        width: 1200,
        height: 800,
        backgroundColor:'rgba(255, 255, 255, 0.0)',
        plotBorderWidth: null,
        plotShadow: true,
        panning: true,
        panKey: 'shift',
        type: 'column'
    },
    title: {
        @if($totalSold>0)
        text: ' Vendas por jogos (Coluna). Total do período é de {{$totalSold}}'
        @else
        text: 'Entre a data logo abaixo '
        @endif 
    },
    subtitle: {
        @if($totalSold>0)
        text: 'Clique/Zoom; Shift+Clique/Arrastar - Período entre {{$dateStart}} e {{$dateEnd}}.'
        @endif
    },
    xAxis: {
        scrollbar: {
            enabled: true
        },
        categories: [
        @foreach(array_keys($dataColumn) as $data)
        '{{$data}}',
        @endforeach
        ],
        crosshair: true,
        minRange: 1,
    },
    yAxis: {
        min: 1,
        title: {
            text: 'Vendas (qt)'
        },
        minRange: 1,
    },
    labels: {
                overflow: 'justify'
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0,
            dataLabels: {
                    enabled: true
                }
        }
    },
    series: [@foreach($plot as $plots => $value){
        
        
        name: '{{$plots}}',
        data: {{'['.implode(",",(array_values($value['data']))).'],'}}
        @if(array_sum($value['data']) > 10)
        visible: true
        @else
        visible: false
        @endif
    },  @endforeach
    ]
});
 }
    </script>
@endsection


