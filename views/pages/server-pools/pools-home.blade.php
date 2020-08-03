@extends('layout.default')
@section('content')

    <div id="page-title">
    <h2>Pools</h2>
    </div>
    <div  class="panel">

        <div class="panel-body">
            <div class="form-horizontal bordered-row">
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#add_pools"><i
                            class="glyph-icon icon-plus-square"></i> Novo Registro
                </button>
                <button class="btn btn-sm" id="switch" data-toggle="modal" data-target=""><i
                    class="glyph-icon icon-minus-square"></i> SWITCH ONLINE/OFFLINE
                </button>
                </button>
                <div class="col-sm-2">
                    <div class="input-group">
                        <span class="input-group-addon bg-white border-left-0"><i class="glyph-icon icon-search"></i></span>
                        <input class="form-control type="name" id="myInput"
                         placeholder="Search" name="Search" onkeyup="search()">
                </div>
            </div>
            
            </div>
            <br class="clearfix">
            <div class="modal fade" id="add_pools" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button id="add_pool" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Adicionar nova Pool para Servidor</h4>
                        </div>
                        <form class="form-horizontal bordered-row" method="POST"
                    action=" {{ route('server.pools.save') }}">
                            <div class="modal-body">
                                <div class="dinamicInput">
                                {{-- <div class="form-group">
                                        <label class="col-sm-3 control-label">Tipo:</label>
                                         <div class="col-sm-6">
                                             <select name="type[]" id="" class="form-control">
                                                <option value="FINAL">FINAL</option>
                                                <option value="BRIDGE">BRIDGE</option>
                                             </select>
                                        </div>                                                                      ->>>>>>>>>>>>> SE ELE ACABA SE SER ADICIONAOD NÃO
                                                                                                                                            APARECE
                                    </div> --}}
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Pool Name:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="name[]" class="form-control" placeholder="Nome da pool" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">IP:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="ip[]" class="form-control" placeholder="IP" required>
                                    
                                    <div class="add_form_field">
                                            <button class="btn btn-sm btn-warning"><i class="glyph-icon icon-plus-square"></i><span>Adicionar outro</span></button><br><br>
                                    </div>    
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Server Name:</label>
                                    <div class="col-sm-6">
                                        <select name="server_id" class="form-control" id="selection">
                                            @foreach($serversInstance as $serve)
                                                <option value="{{ $serve->id }}">
                                                    {{ $serve->name.' ID:'.$serve->id }}
                                                </option>
                                            @endforeach
                                        </select>
                                    <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>    
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <br class="clearfix">
            <div id="servers_info">
                    <div id="new_register" class="example-box-wrapper">
                        <table id="servers_info_table" class="table table-bordered responsive no-wrap sortable" 
                        cellspacing="0" width="100%">                   
                            <thead style="color:black">
                            <tr>
                                <th>Total de Pools</th>
                                <th>Servidores Online</th>
                                <th>Servidores Offline</th>
                                <th>Aguardando Atualização</th>
                                <th>Não adicionados</th>
                            </tr>
                            </thead>
                            <tfoot>
                                    <tr>
                                            <th colspan="7" style="text-align:center;"><h3></h3></th>
                                    </tr> 
                            </tfoot>
                            <tbody>
                            <form>
                                <tr >
                                    <td style="color:black;font-weight:bolder">{{ count($pools)}}</td>
                                    <td style="color:black;font-weight:bolder;background-color:lightgreen">{{ count($onlineTotal) }}</td>
                                    <td style="color:black;font-weight:bolder;background-color:lightgrey">{{ count($offlineTotal)}}</td>
                                    <td style="color:black;font-weight:bolder;background-color:lightyellow">{{ count($awating) }}</td>
                                    <td style="color:black;font-weight:bolder;background-color:lightsalmon">{{ count($pendingServers) }}</td>
                                </tr>
                               </form>
                            </div>
                        </div>

            <br class="clearfix">
            <div class="example-box-wrapper">
                <table id="online" class="table table-hover table-bordered responsive no-wrap sortable" 
                cellspacing="0" width="100%">                   
                    <thead>
                    <tr style="cursor: pointer;">
                        <th>ID</th>
                        <th>Server name</th>
                        <th>Name</th>
                        <th>IP</th>
                        <th>Display Name</th>
                        <th>STATUS</th>
                        <th>Type</th>
                        <th>Last Update</th>
                        <th colspan="2" style="text-align:center;">Ações</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Server Name</th>
                        <th>Name</th>
                        <th>IP</th>
                        <th>Display Name</th>
                        <th>STATUS</th>
                        <th>Type</th>
                        <th>Last Update</th>
                        <th style="text-align:center;" colspan="2">Ações</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($pools as $pool)
                    <form>
                        <tr>
                            <td>{{ $pool->server_id }}</td>
                            <td>{{ $pool->server_name }}</td>
                            <td>{{ $pool->name }}</td>
                            <td>{{ $pool->ip }}</td>
                            <td>{{$pool->display_name}}</td>
                            @if($pool->state === 1 && $pool->ip != null && $pool->updated_at != null)
                            <td style="color:green"><b>Online</td>
                            @endif
                            @if($pool->ip != null && $pool->state === 0 && $pool->updated_at != null)
                            <td style="color:gray"><b>Offline</td>
                            @endif
                            @if($pool->ip != null && $pool->updated_at === null)
                            <td style="color:yellowgreen"><b>Esperando Atualização</td>
                            @endif
                            @if($pool->ip === null && $pool->updated_at === null)
                            <td style="color:crimson"><b>Não Adicionado</td>
                            @endif
                            <td>{{$pool->type}}</td>
                            <td>{{ $pool->updated_at }}</td>
                            @if($pool->ip === null)
                            <td colspan="2" style="text-align:center;"><a target="_top">Subir para adicionar</a></td>
                            @else   
                            <td><a data-balloon="{{$pool->server_name}}" data-balloon-pos="left" href="{{route('server.pools.delete', ['name' => $pool->name])}}" >Excluir Registro</a></td>
                            <td><a data-balloon="{{$pool->server_name}}" data-balloon-pos="left" href="{{route('server.pools.edit',   ['name' => $pool->name]) }}">Editar</a></td>
                            @endif
                        </tr>
                       </form>
                    @endforeach
                    </div>
                </div>
                        <div class="example-box-wrapper">
                            <table style="display:none;" id="offline" class="table table-hover table-bordered responsive no-wrap sortable" 
                            cellspacing="0" width="100%">                   
                                <thead>
                                <tr style="cursor: pointer;">
                                    <th>ID</th>
                                    <th>Server name</th>
                                    <th>Name</th>
                                    <th>IP</th>
                                    <th>Display Name</th>
                                    <th>STATUS</th>
                                    <th>Type</th>
                                    <th>Last Update</th>
                                    <th  colspan="2" style="text-align:center;">Ações</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Server Name</th>
                                    <th>Name</th>
                                    <th>IP</th>
                                    <th>Display Name</th>
                                    <th>STATUS</th>
                                    <th>Type</th>
                                    <th>Last Update</th>
                                    <th style="text-align:center;" colspan="2">Ações</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($pools as $pool)
                                @if($pool->ip != null && $pool->state === 0 && $pool->updated_at != null)
                                <form>
                                    <tr>
                                        <td>{{ $pool->server_id }}</td>
                                        <td>{{ $pool->server_name }}</td>
                                        <td>{{ $pool->name }}</td>
                                        <td>{{ $pool->ip }}</td>
                                        <td>{{$pool->display_name}}</td>
                                        <td style="color:gray"><b>Offline</td>
                                        <td>{{$pool->type}}</td>
                                        <td>{{ $pool->updated_at }}</td>
                                    <td><a data-balloon="{{$pool->server_name}}" data-balloon-pos="left" href="{{route('server.pools.delete', ['name' => $pool->name])}}" >Excluir Registro</a></td>
                                    <td><a data-balloon="{{$pool->server_name}}" data-balloon-pos="left" href="{{route('server.pools.edit',   ['name' => $pool->name]) }}">Editar</a></td>
                                    </tr>
                                   </form>
                                @endif
                                @endforeach
                                </div>
                            </div>
                    </div>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
@section('extra-scripts')
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/balloon-css/0.5.0/balloon.min.css">
<script>
$(document).ready(function() { //Dinamic process input
        var max_fields      = 10;
        var wrapper         = $(".dinamicInput");
        var add_button      = $(".add_form_field");
        var x = 1;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){
                x++;
                                   
                $(wrapper).append('<div class="delete-this">'
                                //    +'     <div class="form-group">'
                                //    +'     <label class="col-sm-3 control-label">Tipo:</label>'
                                //    +'      <div class="col-sm-6">'
                                //    +'          <select name="type[]" id="" class="form-control">'
                                //    +'             <option value="FINAL">FINAL</option>'
                                //    +'             <option value="BRIDGE">BRIDGE</option>'
                                //    +'          </select>'
                                //    +'     </div>'
                                //    +' </div>'
                                 +'<div class="form-group"><label class="col-sm-3 control-label">Pool Name:</label>'
                                 +'<div class="col-sm-6"><input type="text" name="name[]" class="form-control" placeholder="Nome da pool" required>'
                                 +'</div></div><div class="form-group"><label class="col-sm-3 control-label">IP:</label><div class="col-sm-6">'
                                 +'<input type="text" name="ip[]" class="form-control" placeholder="IP" required></div>'
                                 +'</div><button style="float:inherit;" href="#" class="btn btn-sm btn-default delete">Delete</button></div></div>'); // Add input box
            }
      else
      {
      alert('Muitos processos!')
      }
        });
        $(wrapper).on("click",".delete", function(e){
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>

    <script type="text/javascript">
        $("#selection").chosen();
        
        function topFunction() {
           document.body.scrollTop = 0; // For Safari
           document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    function search() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("online");
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

</script>
<script>
        jQuery(document).ready(function(){
        jQuery('#switch').on('click', function(event) {        
             jQuery('#online').toggle('show');
             jQuery('#offline').toggle('show');
        });
    });
</script>
   
@endsection