@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Process List Rules JSON</h2>

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
                            <h4 class="modal-title">Adicionar Process Name em Regras.JSON</h4>
                        </div>
                        <form class="form-horizontal bordered-row" method="POST"
                                  action="{{ route('rules.save.process') }}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Process Name:</label>
                                    <div class="dinamicInput">
                                    <div class="form-group">
                                    <div class="col-sm-4">
                                    <input type="text" name="process_name[]" class="form-control" placeholder="Nome do Processo" required></div>
                                    <div class="add_form_field">
                                    <button class="btn btn-sm btn-warning"><i class="glyph-icon icon-plus-square"></i><span>Adicionar outro</span></button><br><br>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Rule Group:</label>
                                    <div class="col-sm-6">
                                        <select name="rule_group_id" class="form-control" id="selection">
                                            @foreach($rulegroups as $rulegroup)
                                                <option value="{{ $rulegroup->id_rulegroup }}">
                                                    {{ $rulegroup->rule_rulegroup_name }}
                                                </option>
                                            @endforeach
                                                
                                        </select>
                                    <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>    
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>

                <div class="form-horizontal bordered-row">
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#add_record">
                    <i class="glyph-icon icon-plus-square"></i> Novo Registro
                </button>
            </div>
            <br class="clearfix">
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" 
                cellspacing="0" width="100%">                   
                    <thead>
                    <tr>
                        <th>Process ID</th>
                        <th>Process Name</th>
                        <th>Jogo Vinculado</th>
                        <th>Rule Group</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Process ID</th>
                        <th>Process Name</th>
                        <th>Jogo Vinculado</th>
                        <th>Rule Group</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($processes as $process)
                    <form>
                        <tr>
                            <td>{{ $process->rule_process_id }}</td>
                            <td>{{ $process->rule_process_name }}</td>
                            <td>{{ $process->rule_rulegroup_name }}</td>
                            <td>{{ $process->rule_group_id }}</td>
                            <td>
                            <a href="{{ route('rules.remove.process',['id' => $process->rule_process_id]) }}">Excluir</a>
                            </td>
                        </tr>
                        </form>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paging: false,
            });
        });
     $(document).ready(function() { //Dinamic process input
        var max_fields      = 10;
        var wrapper         = $(".dinamicInput");
        var add_button      = $(".add_form_field");
        var x = 1;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){
                x++;
                $(wrapper).append('<div class="form-group"><label class="col-sm-3 control-label">Process Name:</label>'
                                 +'<div class="col-sm-4"><div class="form-group">'
                                 +'<input type="text" name="process_name[]" class="form-control" placeholder="Nome do Processo" required>'
                                 +'</div></div><button href="#" class="btn btn-sm btn-default delete">Delete</button></div>'); //add input box
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
    <script>
    function search() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("selection");
  tr = table.getElementsByTagName("select");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("option")[1];
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
        $("#selection").chosen();
     </script>
@endsection