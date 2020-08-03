@extends('layout.default')
@section('content')
{{-- <style style="text/css">
  tbody:hover {
        background-color: #ffff99 !important;
  }
</style> --}}
    <div id="page-title">
        <h2>Monitoramento de Servidores Externos</h2>
        <p>Listagem de monitores</p>

    </div>
    <div class="panel">
        <div class="panel-body">
            <div class="form-horizontal bordered-row">
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#add_bridge"><i
                            class="glyph-icon icon-plus-square"></i> Novo Registro
                </button>
                
                <div class="col-sm-2">
                    <div class="input-group">
                            <span class="input-group-addon bg-white border-left-0"><i class="glyph-icon icon-search"></i></span>
                            <input class="form-control" type="name" id="myInput"
                             placeholder="Search" name="Search" onkeyup="search()">
                        </div>
                </div>
            </div>
            <br class="clearfix">
            <div class="modal fade" id="add_bridge" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Adicionar Novo Monitor</h4>
                        </div>
                        <form class="form-horizontal bordered-row" method="POST"
                              action="{{ route('bridge.monitor-external.add') }}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nome:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="name" class="form-control"
                                              equired>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-horizontal bordered-row">
                                        <label class="col-sm-3 control-label">IP:</label>
                                        <div class="col-sm-6 form-horizontal bordered-row">
                                                <input type="text" name="ip_address" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Porta:</label>
                                    <div class="col-sm-6">
                                        <input type="number" name="port" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Protocolo:</label>
                                    <div class="col-sm-6">
                                        <select name="protocol" id="" class="form-control">
                                            <option value="ICMP">ICMP</option>
                                            <option value="TCP" selected>TCP</option>
                                            <option value="UDP" selected>UDP</option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Monitorando:</label>
                                    <div class="col-sm-6">
                                        <select name="monitoring" id="" class="form-control">
                                            <option value="0">0</option>
                                            <option value="1" selected>1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="text-align:center">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button id="save_bridge" type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
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
                        <th>Porta</th>
                        <th>Protocolo</th>
                        <th>Monitorando</th>
                        <th>Último Update</th>
                        <th>Criado em</th>
                        <th colspan="1">Ações</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>IP</th>
                        <th>Porta</th>
                        <th>Protocolo</th>
                        <th>Monitorando</th>
                        <th>Último Update</th>
                        <th>Criado em</th>
                        <th colspan="1">Ações</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($servers as $server)
                        <tr>
                            <td>{{ $server->id }} </td>
                            <td>{{ $server->name }} </td>
                            <td>{{ $server->ip_address }}</td>
                            <td>{{ $server->port }}</td>
                            <td>{{ $server->protocol }}</td>
                            <td>{{ $server->monitoring }}</td>
                            <td>{{ $server->updated_at }}</td>
                            <td>{{ $server->created_at }}</td>
                            <td>
                                <form id="delete-row-{{ $server->id }}"  action="{{ route('bridge.monitor-external.remove') }}" method="POST">
                                    <input type="hidden" name="id" value="{{ $server->id }}">
                                    <a data-balloon="{{$server->name}}" onclick="document.getElementById('delete-row-{{ $server->id }}').submit();"  data-balloon-pos="left">Excluir</a>
                                </form>
                            </td>
                            {{-- <td>
                                <a data-balloon="{{$server->name}}" data-balloon-pos="left" href="#">Editar</a>
                            </td> --}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
  }
</script>
@endsection