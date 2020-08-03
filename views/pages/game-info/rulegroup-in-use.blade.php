@extends('layout.default')
@section('content')
   <div id="page-title">

		<h2>Game Info - Rulegroup em uso</h2>
        <h4><b style="color: green;">{{ $usersOnline }}</b>/<b style="color: gray;">{{ $totalUsers-$player_sum }}</b> Usuarios online na versão antiga</h4>
        <h4 id="users-online"><b style="color: green;">{{ $new_total }}</b>/<b style="color: gray;">{{ $player_sum }}</b> Usuarios online na versão nova</h4>
        
</div>
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
    
    <div class="panel">
        <div class="panel-body">
      <form action="{{route('api.rulegroup.use.by.period')}}" method="POST" class="form">
        <div class="form-group">
            <label>Data de Inicio do período:</label>
            <input type="date" name="start" id="date-start-input" class="form-control" data-date-inline-picker="true" required/>
        </div>
        <div class="form-group">
            <label>Data de Término do período:</label>
            <input type="date" name="end" id="date-end-input" class="form-control" data-date-inline-picker="true" required/>
        </div>
        <div id="outer">
            <div class="inner">
              <button type="submit" class="btn btn-success">Aplicar</button>
            </div>
      </form>
            <div class="inner">
    <form action="{{route('api.rulegroup.use.by.period')}}" method="POST" class="form">
            <button id="last-three-days" name="three_days" value="1" type="submit"  class="btn btn-primary">Últimos três dias</button>
    </form>
    </div>
    <div class="inner">
    <form action="{{route('api.rulegroup.use.by.period')}}" method="POST" class="form">
            <button id="week" type="submit" name="last_week" value="1" class="btn btn-primary">Última semana</button>
        </form>
    </div>
        <div class="inner">
        <form action="{{route('api.rulegroup.use.by.period')}}" method="POST" class="form">
            <button id="month" type="submit" name="last_month" value="1" class="btn btn-primary">Último mês</button>
        </form>
    </div>
        <!-- <div class="inner">
        <form action="{{route('api.rulegroup.use.by.period')}}" method="POST" class="form">
            <button id="month" type="submit" name="last_month" value="1" class="btn btn-success">Gerar Gráfico</button>
        </form>
    </div> -->
        
</div>
            
            <div class="example-box-wrapper">
                <div id="period">
            <table id="search-table" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                <thead>
                    <th colspan="2">
                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon bg-white border-left-0"><i class="glyph-icon icon-search"></i></span>
                                <input class="form-control type="name" id="myInput" placeholder="Procurar por jogo" name="Search" onkeyup="search()">
                            </div>
                        </div> 
                        <button class="btn btn-sm" id="switch" data-toggle="modal" data-target=""><i
                            class="glyph-icon icon-minus-square"></i> MOSTRAR LIVE/PERÍODO
                        </button>
                    </th>
                    <th>
                        <h4 style="text-align:center;font-family:verdana;font-style: italic;font-weight: bold;">Ínicio: <b style="color:teal">{{$date[0]}}</b></h4>
                    </th>
                    <th>
                        <h4 style="text-align:center;font-family:verdana;font-style: italic;font-weight: bold;">Término: <b style="color:lightcoral">{{$date[1]}}</b></h4>
                    </th>
                </thead>
            </table>
                        <table id="servers_info_table" class="table table-bordered responsive no-wrap" 
                        cellspacing="0" width="100%">                   
                            <thead style="color:black">
                            <tr>
                                <th>Jogados no período</th>
                                <th>Total de Jogadores no período</th>
                                <th>Total de Conexões no período</th>
                            </tr>
                            </thead>
                            <tfoot>
                                    <tr>
                                            <th colspan="7" style="text-align:center;"><h3></h3></th>
                                    </tr> 
                            </tfoot>
                            <tbody>
                            <form>
                                <tr>
                                    <td style="color:black;font-weight:bolder;background-color:bisque">{{$period_info[1]}}</td>
                                    <td style="color:black;font-weight:bolder;background-color:burlywood">{{$period_info[0]}}</td>
                                    <td style="color:black;font-weight:bolder;background-color:lightgrey">{{$period_info[2]}}</td>
                                </tr>
                               </form>
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-hover table-bordered responsive no-wrap sortable" cellspacing="0" width="100%">
                    
                    <thead style="cursor: row-resize;">
                    <tr>
                        <th>ID</th>
                        <th>Jogo</th>
                        <th>Total de players no período</th>
                        <th>Total de Conexões</th>
                    </tr>
                    </thead>

                    <tfoot style="cursor: row-resize;">
                    <tr>
                        <th>ID</th>
                        <th>Jogo</th>
                        <th>Total de players no período</th>
                        <th>Total de Conexões</th>
                    </tr>
                    </tfoot>
                    
                        @foreach($rules as $key)
                        <tr>                        
                            <td><a data-toggle="modal" data-target="#{{ $key->rule_rulegroup_fullname }}">{{ $key->id_rulegroup }}</a></td>
                            <td><a data-toggle="modal" data-target="#{{ $key->rule_rulegroup_fullname }}">{{ $key->rule_rulegroup_fullname }}</a></td>
                            <td><a data-toggle="modal" data-target="#{{ $key->rule_rulegroup_fullname }}">{{ $key->player_quantity }}</a></td>       
                            <td><a data-toggle="modal" data-target="#{{ $key->rule_rulegroup_fullname }}">{{ $key->connection_count }}</a></td>                                              
                        </tr>
                        @endforeach  
                </table>
               </div>
            </div>
        </div>
        <div id="live" style="display: none;">
            <div class="example-box-wrapper">
            <table id="search-table" class="table table-hover table-bordered responsive no-wrap" cellspacing="0" width="100%">
                <thead>
                    <th colspan="2">
                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon bg-white border-left-0"><i class="glyph-icon icon-search"></i></span>
                                <input class="form-control type="name" id="myInputLive" placeholder="Procurar por jogos em tempo real" name="Search" onkeyup="search_live()">
                            </div>
                        </div> 
                        <button class="btn btn-sm" id="switch_live" data-toggle="modal" data-target=""><i
                            class="glyph-icon icon-minus-square"></i> MOSTRAR LIVE/PERÍODO
                        </button>
                    </th>
                    <th><div id="timer">
                        <h4 style="font-family:verdana;font-style: italic;font-weight: bold;">Atualização em, aproximadamente:</h4>
                        <div id="timing">
                        <h4 id="time" style="font-style: italic;font-weight: bold;font-style:italic; color:red;"></h4>
                    </div>
                    </div>
                    </th>
                </thead>
            </table>
            <br>
            <div id="live-table">
                <table id="servers_info_table" class="table table-hover table-bordered responsive no-wrap sortable" cellspacing="0" width="100%">                  
                            <thead style="color:black;cursor: row-resize;">
                            <tr>
                                <th>Jogados no momento</th>
                                <th>Total de Players Online</th>      
                                <th>Soma de Conexões</th>
                            </tr>
                            </thead>
                            <tfoot>
                                    <tr>
                                            <th colspan="7" style="text-align:center;"><h3></h3></th>
                                    </tr> 
                            </tfoot style="color:black;cursor: row-resize;">
                            <tbody>
                            <form>
                                <tr>
                                    <td style="color:black;font-weight:bolder;background-color:bisque">{{$live_info[1]}}</td>
                                    <td style="color:black;font-weight:bolder;background-color:burlywood">{{$live_info[0]}}</td>
                                    <td style="color:black;font-weight:bolder;background-color:lightgrey">{{$live_info[2]}}</td>
                                </tr>
                               </form>
                            </table>
                            <br>
                <table id='datatable-responsive-live' class='table table-striped table-bordered responsive no-wrap sortable' cellspacing='0' width='100%'>
                    
                    <thead>
                    <tr style="cursor: pointer;">
                        <th>ID</th>
                        <th>Jogo</th>
                        <th>Total de Players Conectados</th>
                        <th>Total de Conexões</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Jogo</th>
                        <th>Total de Conectados</th>
                        <th>Total de Conexões</th>
                    </tr>
                    </tfoot>
                    @foreach($live_users as $key)
                    <tr>
                                <td> {{$key->id_rulegroup }} </a></td>
                                <td> {{$key->rule_rulegroup_fullname }} </a></td>
                                <td> {{$key->player_quantity}} </a></td>       
                                <td> {{$key->connection_count}} </a></td>
                    </tr>
                    @endforeach
                    </table>
            </div>
           </div>
        </div>
@endsection
@section('extra-scripts')
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<script>
function search() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("datatable-responsive");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }

  function search_live() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInputLive");
    filter = input.value.toUpperCase();
    table = document.getElementById("datatable-responsive-live");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }

  $(document).ready(function() {
    setInterval(function(){
       $.ajax({
           url: "{{route('api.live.users.connection')}}",
           type: "GET",
           dataType: "html",
           success: function(html) {
           $("#live-table").html(html);
        }
      });//end ajax call
    },15000);//end setInterval
});//end docReady

$(document).ready(function() {
    setInterval(function(){
       $.ajax({
           url: "{{route('api.live.users.online')}}",
           type: "GET",
           dataType: "html",
           success: function(html) {
           $('#users-online').html(html);
        }
      });//end ajax call
    },15000);//end setInterval
});//end docReady 
function insert() {
            $( "h4" ).remove( "#time" ); 
            $("#timing").append('<h4 id="time" style="font-style: italic;font-weight: bold;font-style:italic; color:red;"></h4>'); 
        } 

  jQuery(document).ready(function(){
        jQuery('#switch').on('click', function(event) {        
             jQuery('#period').toggle('show');
             jQuery('#live').toggle('show');
        });
    });
  jQuery(document).ready(function(){
        jQuery('#switch_live').on('click', function(event) {        
             jQuery('#period').toggle('show');
             jQuery('#live').toggle('hide');
        });
    });

    function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(minutes + ":" + seconds);

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}
function timer_display(){
jQuery(function ($) {
    var fiveMinutes = 15,
        display = $('#time');
    startTimer(fiveMinutes, display);
});
}
$(document).one('ready', function () {
    timer_display();
   });

</script>
@endsection