@extends('layout.default')
@section('content')

  <div id="page-title">

  <h2>Gráficos - Vendas aprovadas por dia V1.0 <h2 style="color:steelblue">{{$time_end}}</h2>
  
    <div class="chart-container" id="chart-container" style="min-width: 310px; height: 1000px; max-width: 1000px; margin: 0 auto; 
    @if($start == null)display:none;
    @endif
    ">Gráfico</div>
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
	<form action="{{ route('graphs.approved-by-day') }}" method="get" class="form">
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
            <button type="submit" onclick="generateColumnChart();" class="btn btn-primary">Aplicar</button>
        </div>
    </form>
<script type="text/javascript">


window.onload = function() {
    generateColumnChart();
}

 function generateColumnChart(){
    Highcharts.chart('chart-container', {
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
        text: 'Vendas aprovadas por dia - Total: {{$totalSold}}.'
    },
    subtitle: {
        text: 'Aprovadas entre {{$start}} e {{$end}}. Clique e arraste para ativar o zoom.'
    },
    xAxis: {
        categories: [
        @foreach($data as $key)
            '{{$key->date}}',
        @endforeach
        ],
        crosshair: true,
        scrollbar: {
            enabled: true
        },
    },
    yAxis: {
        min: 1,
        title: {
            text: 'Vendas(qt)'
        }
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
    series: [
    {
        name: 'Vendas',
        data: [@foreach($data as $key){{$key->vendas}},@endforeach]
    },
    ]
});
}

</script>

@endsection


