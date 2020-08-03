@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Display Fake Servers</h2>
        
        
    </div>
    <div class="panel">
        <div class="panel-body">
                
                <div class="form-horizontal bordered-row">
                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#add_fake"><i
                            class="glyph-icon icon-plus-square"></i> Novo Registro Fake
                        </button>
                        <div class="col-sm-2">
                            <div class="input-group">
                                    <span class="input-group-addon bg-white border-left-0"><i class="glyph-icon icon-search"></i></span>
                                    <input class="form-control type="name" id="myInput"
                                     placeholder="Search" name="Search" onkeyup="search()">
                                </div>
                        </div>
                    </div>
                    <br class="clear-fix">
                    <div id="all">
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-hover table-bordered responsive no-wrap sortable" 
                       cellspacing="0" width="100%">
                    <thead>
                    <tr style="cursor: pointer;">
                        
                        <th>ID</th>
                        <th>Servidor Original</th>
                        <th>Display Name</th>
                        <th>Country</th>
                        <th>Country Fullname</th>
                        <th>Others</th>
                        <th>Permission Level</th>
                        <th colspan="2"><b>Ações</b></th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr style="cursor: pointer;">
                    
                        <th>ID</th>
                        <th>Servidor Original</th>
                        <th>Display Name</th>
                        <th>Country</th>
                        <th>Country Fullname</th>
                        <th>Others</th>
                        <th>Permission Level</th>
                        <th colspan="2"><b>Ações</b></th>
                    </tr>
                    </tfoot>
                    @foreach($fakes as $fake)
                        <tr>
                            <td>{{ $fake->id }} </td>
                            <td>{{ $fake->original_name }} </td>
                            <td>{{ $fake->display_name }}</td>
                            <td>{{ $fake->country }} </td>
                            <td>{{ $fake->country_fullname }} </td>
                            <td>{{ $fake->others }} </td>
                            <td>{{ $fake->permission_level }}</td>
                            <td><a data-balloon="{{$fake->original_name}}" data-balloon-pos="left" href="{{ route('bridge.delete-fake-alias', ['id' => $fake->id]) }}">Excluir</a></td>
                        <td><button class="btn btn-sm btn-success" id="edit_alias_{{$fake->id}}" value="{{$fake->id}}"name="country-info" data-toggle="modal" data-target="#modify_fake"><i class="glyph-icon icon-save"></i> Editar Fake</td></tr>
                    @endforeach

                </table>
            </div>
          <div class="modal fade" id="modify_fake" tabindex="-1" role="dialog" aria-hidden="true">
                <input id="feed_data" name="modal_info" type="hidden" value="" />
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Modificar Alias Fake</h4>
                                </div>
                                <form class="form-horizontal bordered-row" method="POST" action="{{ route('bridge.edit-fake-alias') }}">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Display Name:</label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="id_modify" name="id_modify" class="form-control">
                                                <input type="text" id="display_modify" name="display_modify" class="form-control" required>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">País:</label>
                                            <div class="col-sm-6">
                                                <select name="country_modify" id="country_selection_edit" class="form-control">
                                                    @foreach($countries as $country)
                                                    <option value="{{ $country->fullname }}-{{ $country->name }}">{{ $country->name }} - {{ $country->fullname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                               <label class="col-sm-3 control-label">Nível de permissão:</label>
                                               <div class="col-sm-6">
                                                <select name="permission_level" id="permission_modify" class="form-control">
                                                    <option value="0">0</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div><small>Nível 10 para visualização interna, nível 0 para visualização do usuário.</small>
                                    </div>
                                    <div class="form-group">
                                               <label class="col-sm-3 control-label">Others:</label>
                                               <div class="col-sm-6">
                                                <select name="others_fake" id="others_modify" class="form-control">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                </select>
                                            </div><small>Mostrar no others.</small>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                        <button id="save_fake" class="btn btn-primary">Salvar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                <br class="clear-fix">
        </div>
    </div><div class="modal fade" id="add_fake" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Adicionar Novo Alias Fake</h4>
                                    </div>
                                    <form class="form-horizontal bordered-row" method="POST"
                                    action="{{ route('bridge.fake-alias') }}">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Nome:</label>
                                                <div class="col-sm-6">
                                                        <select name="permission_level" id="selection_b" class="form-control">
                                                            @foreach ($servers as $key)
                                                            @if($key->type == 'FINAL')
                                                        <option id="id_b" value="{{$key->id}}">{{$key->name}}</option>
                                                            @endif
                                                            @endforeach
                                                            </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Display Name:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" id="fake_b" name="display_name" class="form-control" required>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">País:</label>
                                                <div class="col-sm-6">
                                                    <select name="country_id" id="country_selection" class="form-control">
                                                        @foreach($countries as $country)
                                                        <option value="{{ $country->name }}">{{ $country->fullname }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        <div class="form-group">
                                                   <label class="col-sm-3 control-label">Nível de permissão:</label>
                                                   <div class="col-sm-6">
                                                    <select name="permission_level" id="permission_b" class="form-control">
                                                        <option value="0">0</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div><small>Nível 10 para visualização interna, nível 0 para visualização do usuário.</small>
                                        </div>
                                        <div class="form-group">
                                                   <label class="col-sm-3 control-label">Others:</label>
                                                   <div class="col-sm-6">
                                                    <select name="others_fake" id="others_b" class="form-control">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                    </select>
                                                </div><small>Mostrar no others.</small>
                                        </div>
                                        <input type="hidden" name="returnFake" value="1">
                                        <button id="add_fake_alias" type="button" class="btn btn-success">ADICIONAR SERVIDOR SELECIONADO</button><br>
                                        </div>
                                        <div id="target-selection-fake">
                                    </form>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                            <button id="save_fake2" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
@endsection
@section('extra-scripts')
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<script>
function search(){
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

$("#selection_b").chosen();
$("#country_selection").chosen();

@foreach($fakes as $fake) 
$("#edit_alias_{{$fake->id}}").on("click", function() {
    var fake_info_id = "{{$fake->id}}";
    var fake_display = "{{$fake->display_name}}"+"";
    var fake_others = "{{ $fake->others }}";
    var fake_permission = "{{$fake->permission_level}}";
    var info_array = [fake_info_id,fake_display,fake_others,fake_permission];
    $( "#id_modify" ).val(fake_info_id);
    $( "#display_modify" ).val(fake_display);
});
@endforeach


    $("#add_fake_alias").on("click", function() {
        var server_name = $( "#selection_b option:selected" ).text();
        var server_id = $( "#selection_b option:selected" ).val();
        var country_fullname = $( "#country_selection option:selected" ).text(); 
        var country_name = $( "#country_selection option:selected" ).val(); 
        var display_name = document.getElementById("fake_b").value;  
        var permission_level = $( "#permission_b option:selected" ).text();
        var others = $( "#others_b option:selected" ).text();

        var server_array = '|'+server_name+'...'+country_fullname+'...'+country_name+'...'+display_name+'...'+permission_level+'...'+others+'...'+server_id+'|';
        console.log(server_array);
        if(document.getElementById(server_name+display_name+country_name)){
                alert("Já tem uma instância de "+server_name+", "+display_name+" e "+country_name+" selecionada!");
        }else{  
                $("#target-selection-fake").append('<div id="'+server_name+display_name+country_name+'" class="selected" value="server_name[]" name="'+server_name+display_name+country_name+'"><br>'
                                    +"<input type='hidden' id='hihinput' name='server_list[]' value='"+server_array+"'>"
                                    +'<label class="col-sm-3 control-label">Server Name:</label> <h4 href="#"><b>'+server_name+'   </b></h4><br>'
                                    +'<label class="col-sm-3 control-label">Country:</label> <h4 href="#"><b>'+country_name+'   </b></h4><br>'
                                    +'<label class="col-sm-3 control-label">Display Name:</label> <h4 href="#"><b>'+display_name+'   </b></h4><br>'
                                    +'<label class="col-sm-3 control-label">Nv permissão:</label> <h4 href="#"><b>'+permission_level+'   </b></h4><br>'
                                    +'<label class="col-sm-3 control-label">Others:</label> <h4 href="#"><b>'+others+'   </b></h4><br>'
                                    +'<label class="col-sm-3 control-label">Deletar:</label><button id="delete_button" type="button" class="deleteItem btn btn-warning" >Delete</button><br></div>');
        }
    });
    $(document).on("click", ".deleteItem", function() {
        $(this).closest(".selected").remove();
    });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/balloon-css/0.5.0/balloon.min.css">
@endsection