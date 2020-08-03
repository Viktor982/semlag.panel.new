@extends('layout.default')
@section('content')
{{-- <style style="text/css">
  tbody:hover {
        background-color: #ffff99 !important;
  }
</style> --}}
    <div id="page-title">
        <h2> Relacionar Finais a Pontes para Launcher</h2>
        <p>Lista de Finais Relacionados.</p>

    </div>
    <div class="panel">
        <div class="panel-body">
            <div class="form-horizontal bordered-row">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_relation"><i
                            class="glyph-icon icon-plus-square"></i> NOVO RELACIONAMENTO
                </button>
                <div class="col-sm-2">
                    <div class="input-group">
                            <span class="input-group-addon bg-white border-left-0"><i class="glyph-icon icon-search"></i></span>
                            <input class="form-control type="name" id="myInput"
                             placeholder="Search" name="Search" onkeyup="search()">
                        </div>
                </div>
            </div>

            <div class="modal fade" id="add_relation" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Relacionar bridges aos finais (LAUNCHER)</h4>
                            </div>
                            <form class="form-horizontal bordered-row" method="POST"
                                  action="#">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nome Final:</label>
                                        <div class="col-sm-6">
                                            <select name="server_id" class="form-control" id="selectg">
                                                {{-- @foreach($servers as $server)
                                                    @if ($servers->type === 'FINAL') 
                                                        <option value="{{ $server->id }}">{{ $server->name }}</option>
                                                    @endif
                                                @endforeach                                            --}}
                                                    <option value="feafe"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="target-selection">
                                    </div>
                                    <div id="clone" class="form-group">
                                        <label class="col-sm-3 control-label">Selecionar Bridge:</label>
                                        <div class="col-sm-6">
                                            <select name="alias_id" class="form-control" id="selection">
                                                {{-- @if ($server->type === 'BRIDGE')
                                                    @foreach($servers as $server)
                                                        <option id="selected-option" value="selected-id-alias" name="{{ $server->name }}">{{ $server->name }}</option>
                                                    @endforeach
                                                @endif --}}
                                                <option value="test"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <button id="add_alias" type="button" class="btn btn-success">ADICIONAR ALIAS SELECIONADO</button><br>
                                </div>
                                            
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    <button id="save_rulegroup_alias" type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                 </div>
          {{--  <div id="servers_info">
                    <div id="new_register" class="example-box-wrapper">
                        <table id="servers_info_table" class="table table-bordered responsive no-wrap" 
                        cellspacing="0" width="100%">                   
                            <thead style="color:black">
                            <tr>
                                <th>Servidores Online</th>
                                <th>Servidores Offline</th>
                                @if($type === 'BRIDGE')
                                <th>Cálculo de Rotas Offline</th>
                                @endif
                            </tr>
                            </thead>
                            <tfoot>
                                    <tr>
                                            <th colspan="4" style="text-align:center;"><h3></h3></th>
                                    </tr> 
                            </tfoot>
                            <tbody>
                            <form>
                                <tr >
                                    <td style="color:black;font-weight:bolder;background-color:lightgreen">{{ $online_servers }}</td>
                                    <td style="color:black;font-weight:bolder;background-color:lightgrey">{{ $offline_servers }}</td>
                                    @if($type === 'BRIDGE')
                                    <td style="color:black;font-weight:bolder;background-color:lightyellow">{{ $route_offline }}</td>
                                    @endif
                                </tr>
                               </form>
                               </table>
                            </div>
                </div> 
                        <br class="clear-fix">--}}
                        <br class="clear-fix">
            <div id="all">
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-hover table-bordered responsive no-wrap sortable"
                       cellspacing="0" width="100%">
                    <thead>
                            {{-- https://www.jqueryscript.net/table/Paginate-Sort-Filter-Table-Sortable.html --}}
                      <tr style="cursor: pointer;">
                        <th>ID</th>
                        <th>Nome</th>
                        <th>IP</th>
                        <th>Lista de relações</th>
                        <th>Porta TCP</th>
                        <th>Porta UDP</th>
                        <th colspan="2">Ações</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>IP</th>
                        <th>Lista de Relações</th>
                        <th>Porta TCP</th>
                        <th>Porta UDP</th>
                        <th colspan="2">Ações</th>
                    </tr>
                    </tfoot>

                    <tbody>
                     @foreach($relations as $relation)
                        <tr>
                        <td>{{$relation->id}}</td>
                        <td>{{$relation->name}}</td>
                            <td>{{$relation->ipv4}}</td>
                            <td>{{$relation->relation_list}}</td>
                            <td>{{$relation->tcp_port}}</td>
                            <td>{{$relation->udp_port}}</td>
                            <td>teste
                            {{-- <a data-balloon="{{$relation->name}}" data-balloon-pos="left" href="{{ route('bridge.bridge.delete', ['id' => $server->id ]) }}">Excluir</a> --}}
                            </td>
                            <td>teste
                                {{-- <a data-balloon="{{$relation->name}}" data-balloon-pos="left" href="{{ route('bridge.bridge.edit', ['id' => $server->id]) }}">Editar</a> --}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>   
        
    </div>
    </div>
@endsection
@section('extra-scripts')
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/balloon-css/0.5.0/balloon.min.css">
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
    table_list_all = document.getElementById("datatable-responsive-problems");
    tr_list_all = table_list_all.getElementsByTagName("tr");
    for (i = 0; i < tr_list_all.length; i++) {
      td = tr_list_all[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue_list_all = td.textContent || td.innerText;
        if (txtValue_list_all.toUpperCase().indexOf(filter) > -1) {
          tr_list_all[i].style.display = "";
        } else {
          tr_list_all[i].style.display = "none";
        }
      }       
    }
    
    table_final_offline = document.getElementById("datatable-responsive-final");
    tr_final_offline = table_final_offline.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr_final_offline[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr_final_offline[i].style.display = "";
        } else {
          tr_final_offline[i].style.display = "none";
        }
      }       
    }
  }
</script>

<script>
    function RestrictCommaSemicolon(e) {
        var theEvent = e || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[^,;]+$/;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) {
                theEvent.preventDefault();
            }
        }
    }

    $("#add_relation").on("click", function() {
            var element_name = $( "#selection option:selected" ).text();
            console.log(element_name);
            if(document.getElementById(element_name)){
            alert("Já tem uma instância de "+element_name+" selecionada!");
            }else{  
                $("#target-selection").append('<div id="'+element_name+'" class="selected" value="servers[]" name="'+element_name+'"><br>'
                                        +'<input type="hidden" id="hihinput" name="servers[]" value="'+element_name+'">'
                                        +'<label class="col-sm-3 control-label">Alias Selecionado:</label> <h4 href="#">'+element_name+'   </h4><button id="delete_button" onclick="checkForRelations()" type="button" class="deleteItem btn btn-default" >Delete</button><br></div>');
            }
            
        });


        $(document).on("click", ".deleteItem", function() {
        $(this).closest(".selected").remove();
        });
    
    $(document).on("click", ".deleteItem", function() {
        $(this).closest(".selected").remove();
    });

    $("#selection").chosen();
        $("#selectg").chosen();
</script>
@endsection