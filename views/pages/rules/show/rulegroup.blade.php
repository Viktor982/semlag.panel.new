@extends('layout.default')
@section('content')
                                        {{-- TODO TODO TODO -> Arrumar o design da adição dinâmica de alias ao rulegroup, está toda esquisita --}}
    <div id="page-title">
        <h2>RuleGroup Rules JSON</h2>
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
                              action="{{ route('rules.save.rulegroup') }}">
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
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Relacionar como launcher </label>
                                    <input type="checkbox" name="isRelated" id="isRelated" value="1">
                                </div>
                                <div class="form-group">
                                    <label id="relate_label" style="display:none" class="col-sm-4 control-label">Rulegroup Relacionada:</label>
                                    <div class="col-sm-6">
                                        <select name="related_rulegroup" class="form-control" id="select_related">
                                            @foreach($rulegroups as $rulegroup)
                                                <option value="{{ $rulegroup->id_rulegroup }}">{{ $rulegroup->rule_rulegroup_name }}</option>
                                            @endforeach
                                        </select>
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
                                  action="{{ route('rules.save.aliasrulegroup') }}">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">RuleGroup Name:</label>
                                        <div class="col-sm-6">
                                            <select onselect="checkForRelations()" name="rulegroup_id" class="form-control" id="selectg">
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
                                                <option id="selected-option" value="{{ $alias->id }}" name="{{ $alias->name }}">{{ $alias->name }}</option>
                                                {{-- <option id="selected-option" value="{{$alias->id}}" name="{{ $alias->name }}">{{ $alias->name }}</option> --}}
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button onclick="checkForRelations()" id="add_alias" type="button" class="btn btn-success">ADICIONAR ALIAS SELECIONADO</button><br>
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
            <div class="modal fade" id="remove_alias_rulegroup" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Remover Alias do Rulegroup</h4>
                        </div>
                        <form class="form-horizontal bordered-row" method="POST"
                                  action="{{ route('rules.remove.aliasrulegroup') }}">
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
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#add_record">
                    <i class="glyph-icon icon-plus-square"></i> Novo Registro
                </button>
                <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#add_record_alias">
                    <i class="glyph-icon glyphicon-search"></i> Cadastrar Alias ao RuleGroup
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
                        <th>Rule Protocol</th>
                        <th>Lista ID Alias</th>
                        <th>Lista Nome Alias</th>
                        <th>Lista de Rulegroups relacionados</th>
                        <th>Options</th>
                        <th>Values</th>
                        <th colspan="3">Ações</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr style="cursor: pointer;">
                        <th>Rulegroup ID</th>
                        <th>Rulegroup Name</th>
                        <th>Nome Completo</th>
                        <th>Rule Protocol</th>
                        <th>Lista ID Alias</th>
                        <th>Lista Nome Alias</th>
                        <th>Lista de Rulegroups relacionados</th>
                        <th>Options</th>
                        <th>Values</th>
                        <th colspan="3">Ações</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($rulegroups as $rulegroup)
                    <form>
                        <tr>
                            <td>{{ $rulegroup->id_rulegroup }}</td>
                            <td>{{ $rulegroup->rule_rulegroup_name }}</td>
                            <td>{{ $rulegroup->rule_rulegroup_fullname }}</td>
                            
                            <td style="color: blue;">{{ $rulegroup->rule_protocol }}</td>
                            <td>{{ $rulegroup->alias_id_list }}</td>
                            <td>{{ $rulegroup->alias_name_list }}</td>
                            <td><a href="#">{{ $rulegroup->related_id_list }}</a></td>
                            <td>{{ $rulegroup->options_name}}</td>
                            <td>{{ $rulegroup->options_value}}</td>
                            <td>
                                <a data-balloon="{{$rulegroup->rule_rulegroup_name}}"
                                    data-balloon-pos="left" href="{{route('rules.show.delete', ['id_rulegroup' => $rulegroup->id_rulegroup])}}">
                                    Excluir
                                </a>
                            </td>
                            <td>
                                <a data-balloon="{{$rulegroup->rule_rulegroup_name}}" href="#" 
                                   data-balloon-pos="left" onclick="removeAlias({{ $rulegroup->id_rulegroup }});">
                                    Excluir Alias
                                </a>
                            </td>
                            <td>
                                <a data-balloon="{{$rulegroup->rule_rulegroup_name}}" href="{{ route('rules.show.edit', ['id' => $rulegroup->id_rulegroup, 'rule_rulegroup_name' => $rulegroup->rule_rulegroup_name,
                                                'protocol' => $rulegroup->rule_protocol, 'fullname' => $rulegroup->rule_rulegroup_fullname]) }}">
                                    Editar
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

        $('[name="isRelated"]').on('change', function() {
          $('#relate_label').toggle(this.checked);
          $('#select_related').toggle(this.checked);
        }).change();
    
        function removeAlias(id)
        {
            document.getElementById("select_alias").innerHTML = "CARREGANDO...";
            document.getElementById("rulegroup_remove_alias_id").value = id;
            
            $('#remove_alias_rulegroup').modal('show');

            axios.get("/api/rulegroup/" + id + "/alias")
            .then(function (response) {
                var data = response.data;
                var select = '<select class="form-control" name="alias_id">'; 
                for (var i = 0, len = data.length; i < len; i++) {
                    select += '<option value="' + data[i].id_alias + '">' + 
                    data[i].name + '</option>';
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
            var alias_id = $( "#selection option:selected" ).val();
            var alias_name = $( "#selection option:selected" ).text();
            
            var rule_id = $( "#selectg option:selected" ).val();
            var rule_name = $( "#selectg option:selected" ).text();

            if(document.getElementById(alias_name+rule_name)){
            alert("Já tem uma instância de "+alias_name+" e "+rule_name+" selecionada!");
            }else{  
                $("#target-selection").append('<div id="'+alias_name+rule_name+'" class="selected" value="alias_name[]" name="'+alias_name+'"><br>'
                                        +'<input type="hidden" id="hihinput" name="game_alias_list[]" value="'+rule_id+'-'+alias_id+'">'
                                        +'<label class="col-sm-3 control-label">Alias:</label> <h4 href="#"><b>'+alias_name+'   </b></h4><br>'
                                        +'<label class="col-sm-3 control-label">Game:</label> <h4 href="#"><b>'+rule_name+'   </b></h4><br>'
                                        +'<label class="col-sm-3 control-label">Deletar:</label><button id="delete_button" type="button" class="deleteItem btn btn-warning" >Delete</button><br></div>');
            }
            
        });


        $("#selection").chosen();
        $("#selectg").chosen();


        $(document).on("click", ".deleteItem", function() {
        $(this).closest(".selected").remove();
        });

    </script>
@endsection