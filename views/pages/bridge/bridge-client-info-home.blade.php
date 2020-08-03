@extends('layout.default')
@section('content')
<div id="page-title">
    <h2>Bridge Client Info</h2>
    <p>Modificar o tipo.</p>
</div>
<div class="panel">
    <div class="panel-body">
                <div class="form-horizontal bordered-row">
                    <button class="btn btn-lg btn-success" data-toggle="modal" data-target="#change_user_type_level"><i
                                class="glyph-icon icon-plus-square"></i> Atualizar tipo do usuário
                    </button>
                    <button class="btn btn-lg btn-success" data-toggle="modal" data-target="#change_bridge_type_level"><i
                                class="glyph-icon icon-plus-square"></i> Atualizar tipo do servidor
                    </button>
                </div>
                <br>
                <div class="modal fade" id="change_user_type_level" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Alterar o tipo do usuário</h4>
                            </div>
                            <form class="form-horizontal bordered-row" method="POST" 
                                   action="{{ route('bridge.client.info.update') }}"> 
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Tipo selecionado:</label>
                                        <div class="col-sm-6">
                                            <select name="user_new_type" class="form-control" id="selectg">
                                                    <option value="0">0</option>=
                                                    <option value="10">10</option>
                                            
                                            </select>
                                        </div>
                                    </div><br>
                                    <div id="target-selection">
                                    <div id="clone" class="form-group">
                                        <label class="col-sm-3 control-label">Selecionar Usuário:</label>
                                        <div class="col-sm-6">
                                            <select name="user_email" class="form-control" id="selection">
                                                @foreach($client as $user)
                                                    <option value="{{ $user->email }}">
                                                    {{ $user->email .'|Type '.    $user->type}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div> 
                                    </div>
                                    <button id="add_user" type="button" class="btn btn-success">ADICIONAR USUÁRIO SELECIONADO</button><br>
                                </div>
                                            
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="modal fade" id="change_bridge_type_level" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Alterar o tipo do servidor</h4>
                            </div>
                            <form class="form-horizontal bordered-row" method="POST" 
                                   action="{{ route('bridge.type.update') }}"> 
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Tipo selecionado:</label>
                                        <div class="col-sm-6">
                                            <select name="bridge_new_type" class="form-control" id="selectg">
                                                    <option value="0">0</option>
                                                    <option value="10">10</option>
                                            
                                            </select>
                                        </div>
                                    </div><br>
                                    <div id="target-selection-bridge">
                                    <div id="clone" class="form-group">
                                        <label class="col-sm-3 control-label">Selecionar Servidor:</label>
                                        <div class="col-sm-6">
                                            <select name="server_name" class="form-control" id="selection_b">
                                                @foreach($servers as $server)
                                                    <option value="{{ $server->name }}">
                                                    {{ $server->name .'|Type '.    $server->rules_type}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div> 
                                    </div>
                                    <button id="add_bridge" type="button" class="btn btn-success">ADICIONAR SERVIDOR SELECIONADO</button><br>
                                </div>
                                            
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
</div>
@endsection
@section('extra-scripts')
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

$("#selection").chosen();
$("#selectg").chosen();



$("#add_user").on("click", function() {
    var element_name = $( "#selection option:selected" ).text();
    console.log(element_name);
    if(document.getElementById(element_name)){
    alert("Já tem uma instância de "+element_name+" selecionada!");
    }else{  
        $("#target-selection").append('<div id="'+element_name+'" class="selected" value="users_t[]" name="'+element_name+'"><br>'
                                +'<input type="hidden" id="hihinput" name="names[]" value="'+element_name+'">'
                                +'<label class="col-sm-3 control-label">Usuário selecionado:</label> <h4 href="#">'+element_name+'</h4><br><button style="text-align:center" type="button" class="deleteItem btn btn-default" >Delete</button><br></div>');
    }
    
});

$("#add_bridge").on("click", function() {
    var element_name = $( "#selection_b option:selected" ).text();
    console.log(element_name);
    if(document.getElementById(element_name)){
    alert("Já tem uma instância de "+element_name+" selecionada!");
    }else{  
        $("#target-selection-bridge").append('<div id="'+element_name+'" class="selected" value="bridge_t[]" name="'+element_name+'"><br>'
                                +'<input type="hidden" id="hihinput" name="bridges[]" value="'+element_name+'">'
                                +'<label class="col-sm-3 control-label">Servidor selecionado:</label> <h4 href="#">'+element_name+'</h4><br><button style="text-align:center" type="button" class="deleteItem btn btn-default" >Delete</button><br></div>');
    }
    
});


$("#selection").chosen();
$("#selection_b").chosen();
$("#selectg").chosen();


$(document).on("click", ".deleteItem", function() {
$(this).closest(".selected").remove();
});

    </script>
   
@endsection