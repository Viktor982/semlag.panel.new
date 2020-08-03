@extends('layout.default')
@section('content')
                                        {{-- TODO TODO TODO -> Arrumar o design da adição dinâmica de alias ao rulegroup, está toda esquisita --}}
    <div id="page-title">
        <h2>Fake Server Rules JSON</h2>
    </div>
    <div class="panel">
        <div class="panel-body">
            @if(isset($error))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Aviso!</h4>
                    {{ $error }}
                </div>
            @endif
            <div class="modal fade" id="add_record" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Adicionar Rulegroup em Regras.JSON</h4>
                        </div>
                        <form class="form-horizontal bordered-row" method="POST"
                              action="">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">RuleGroup Name:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="rulegroup_name" class="form-control" id="rulegroup_name" placeholder="Nome da RuleGroup" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">RuleGroup FullName:</label>
                                    <div class="col-sm-6">
                                    <input type="text" name="rulegroup_fullname" class="form-control" id="rulegroup_fullname" placeholder="Nome do completo do jogo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">RuleGroup Protocol:</label>
                                    <div class="col-sm-6">
                                    <input type="text" name="rule_protocol" class="form-control" id="rule_protocol" placeholder="Protocolo do jogo (EX: UDP)">
                                    </div>
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
            <div class="modal fade" id="add_record_alias" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Adicionar Alias ao Rulegroup</h4>
                            </div>
                            <form class="form-horizontal bordered-row" method="POST"
                                    action="{{ route('rules.save.fake-aliasrulegroup') }}">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">RuleGroup Name:</label>
                                        <div class="col-sm-6">
                                            <select name="rulegroup_id" class="form-control" id="selectg">
                                                @foreach($rulegroups as $rulegroup)
                                                    <option value="{{ $rulegroup->id_rulegroup }}">{{ $rulegroup->rule_rulegroup_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div id="target-selection">
                                    <div id="clone" class="form-group">
                                        <label class="col-sm-3 control-label">Selecionar Alias:</label>
                                        <div class="col-sm-6">
                                            <select name="alias_id" class="form-control" id="selection">
                                                @foreach($aliases as $alias)
                                                    <option id="selected-option" value="{{ $alias->id }}" name="{{ $alias->original_name }}-{{ $alias->display_name }}">{{ $alias->original_name }} ({{ $alias->display_name }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button id="add_alias" type="button" class="btn btn-success">ADICIONAR ALIAS SELECIONADO</button><br>
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
            <div class="modal fade" id="remove_alias_rulegroup" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Remover Alias do Rulegroup</h4>
                        </div>
                        <form class="form-horizontal bordered-row" method="POST"
                                  action="{{ route('rules.remove.fake-aliasrulegroup') }}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" id="rulegroup_remove_alias_id" name="rulegroup_id">
                                    <label class="col-sm-3 control-label">Alias Name:</label>
                                    <div class="col-sm-6" id="select_alias" name="alias_id">
                                        CARREGANDO...
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Excluir</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="form-horizontal bordered-row">   
                {{-- <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#add_record">
                    <i class="glyph-icon icon-plus-square"></i> Novo Registro
                </button> --}}
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#add_record_alias">
                    <i class="glyph-icon icon-plus-square"></i> Relacionar Alias Fake
                </button>
                <div class="col-sm-2">
                    <div class="input-group">
                        <span class="input-group-addon bg-white border-left-0"><i class="glyph-icon icon-search"></i></span>
                        <input class="form-control type="name" id="myInput" placeholder="Search" name="Search" onkeyup="search()">
                    </div>
                </div>
              </div>
            </div>
            <br class="clearfix">
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-hover table-bordered responsive no-wrap sortable" 
                cellspacing="0" width="100%"> 
                   <thead>
                    <tr style="cursor: pointer;">
                        <th>Rulegroup ID</th>
                        <th>Rulegroup Name</th>
                        <th>Nome Completo</th>
                        <th>Lista ID Alias</th>
                        <th>Lista de Servidores</th>
                        <th>Lista de Alias Fake</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr style="cursor: pointer;">
                            <th>Rulegroup ID</th>
                            <th>Rulegroup Name</th>
                            <th>Nome Completo</th>
                            <th>Lista ID Alias</th>
                            <th>Lista de Servidores</th>
                            <th>Lista de Alias Fake</th>
                            <th>Ações</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($rulegroups as $rulegroup)
                    <form>
                        <tr>
                            <td>{{ $rulegroup->id_rulegroup }}</td>
                            <td>{{ $rulegroup->rule_rulegroup_name }}</td>
                            <td>{{ $rulegroup->rule_rulegroup_fullname }}</td>
                            <td>{{ $rulegroup->alias_id_list }}</td>
                            <td>{{ $rulegroup->alias_name_list }}</td>
                            <td>{{ $rulegroup->alias_name_fake_list }}</td>
                            <td>
                                <a data-balloon="{{$rulegroup->rule_rulegroup_name}}" href="#" 
                                   data-balloon-pos="left" onclick="removeFakeAlias({{ $rulegroup->id_rulegroup }});">
                                    Excluir Alias
                                </a>
                            </td>
                        </tr>
                    </form>
                    @endforeach
                    </tbody>
                </table>
            </div>
            </div>
@endsection
@section('extra-scripts')
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/balloon-css/0.5.0/balloon.min.css">
   
   <script type="text/javascript">
    
        function removeFakeAlias(id)
        {
            document.getElementById("select_alias").innerHTML = "CARREGANDO...";
            document.getElementById("rulegroup_remove_alias_id").value = id;
            
            $('#remove_alias_rulegroup').modal('show');

            axios.get("/api/fake-rulegroup/" + id + "/alias")
            .then(function (response) {
                var data = response.data;
                console.log(data);
                var select = '<select class="form-control" name="alias_id">'; 
                for (var i = 0, len = data.length; i < len; i++) {
                    select += '<option value="' + data[i].fake_id + '">' + 
                    data[i].display_name + '</option>';
                }
                select += '</select>';
                document.getElementById("select_alias").innerHTML = select;
            }).catch(function (error) {
                console.log(error);
            });
        }

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
    </script>

    <script type="text/javascript">


        $("#add_alias").on("click", function() {
            var element_name = $( "#selection option:selected" ).text();
            var alias_id = document.getElementById("selection").value;  
            console.log(alias_id);
            if(document.getElementById(element_name)){
            alert("Já tem uma instância de "+element_name+" selecionada!");
            }else{  
                $("#target-selection").append('<div id="'+element_name+'" class="selected" value="alias_name[]" name="'+element_name+'"><br>'
                                        +'<input type="hidden" id="hihinput" name="alias_id[]" value="'+alias_id+'">'
                                        +'<label class="col-sm-3 control-label">Alias Selecionado:</label> <h4 href="#">'+element_name+'   </h4><button type="button" class="deleteItem btn btn-default" >Delete</button><br></div>');
            }
            
        });


        $("#selection").chosen();
        $("#selectg").chosen();


        $(document).on("click", ".deleteItem", function() {
        $(this).closest(".selected").remove();
        });

    </script>
@endsection