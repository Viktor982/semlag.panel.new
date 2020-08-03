@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Timeline de Vendas</h2>
    </div>
    <style>
        
        .timeline .timeline-items .timeline-item:nth-of-type(2n+1)::before{
            border-top: 1em solid #510856;
        }
        
        .timeline .timeline-items .timeline-item:nth-of-type(2n+1){
            background-color:#510856;
        }
        .timeline .timeline-items .timeline-item:nth-of-type(2n+1) hr{
            border-top: 1px solid #fff;
            border-bottom: 0;
        }
        time{
            font-size: 2em;
            text-align: center;
            margin: 0 auto;
            display: block;
        }
        ul{
            list-style: none;
            padding-left:0;
        }
        .timeline .timeline-items .timeline-item{
            padding: 20px 20px 20px 30px;
        }
        .timeline .timeline-items .timeline-item.inverted:nth-of-type(2n){
            background-color: #74D856;
            color:#510856;
        }
        .timeline .timeline-items .timeline-item.inverted:nth-of-type(2n)::before{
            border-top: 1em solid #74D856;
        }
        .timeline .timeline-items .timeline-item.inverted:nth-of-type(2n) hr{
            border-top: 1px solid #510856;
            border-bottom: 0;
        }
    </style>
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">Timeline de Vendas </h3>
            @foreach($results as $year => $months)
                <h2>Ano: {{$year}}</h2>
                <div class="timeline">
                    @foreach($months as $month => $sells)
   	                   <h2>Mês: {{$month}}</h2>
   	                   <ul class="timeline-items">
                            @php 
                                $count = 0;
                            @endphp
                            @foreach($sells as $sell)
   	                        <li class="is-hidden timeline-item {{$count%2 ? 'inverted' : ''}}">
                                <div class="row"> 
                                    <div class="col-md-6">
                                         <h3>Usuário</h3>
                                             <ul>
                                                 <li>Id: {{$sell->usuario_id}}</li>
                                                 <li>Ip: {{$sell->user_ip}}</li>
                                             </ul>
                                         
                                    </div>
                                    <div class="col-md-6">
                                        <h3>Venda</h3>
                                        <ul class="list-unstyled">
                                            <li>Id da Venda: {{$sell->id}}</li>
                                            <li>Plano: {{$sell->plano_id}}</li>
                                            <li>Vencimento: {{$sell->vencimento_dias}}</li>
                                            <li>Valor: {{ $sell->plano_id == 1 ? 'R$:'.$sell->valor : '$:'.$sell->valor }}</li>
                                            <li>Desconto: {{ $sell->plano_id == 1 ? 'R$:'.$sell->desconto : '$:'.$sell->desconto }}</li>
                                            <li>Cupom: {{ $sell->cupom }}</li>
                                        </ul>
                                    </div>
                                </div>
                                </br>
   	                                <hr>
                                       <time>{{$sell->data_vigencia}}</time>
                                @php 
                                    $count++;
                                @endphp
                            @endforeach 
                       </ul>
                    @endforeach           
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('extra-scripts')

    <script src="/assets/js/jquery.timelify.js"></script>
    <script>
        $('.timeline').timelify({
                animLeft: "fadeInLeft",
            animCenter: "fadeInUp",
            animRight: "fadeInRight",
            animSpeed: 600,
            offset: 150
        });
    </script>

@endsection