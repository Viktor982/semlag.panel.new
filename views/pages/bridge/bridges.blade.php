@extends('layout.default')
@section('content')
{{-- <style style="text/css">
  tbody:hover {
        background-color: #ffff99 !important;
  }
</style> --}}
    <div id="page-title">
        <h2>Servidores - {{ $type }}</h2>
        <p>Lista de {{ $type }} Cadastrados.</p>

    </div>
    <div class="panel">
        <div class="panel-body">
            <div class="form-horizontal bordered-row">
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#add_bridge"><i
                            class="glyph-icon icon-plus-square"></i> Novo Registro
                </button>
                @if($type == 'BRIDGE')
                <button class="btn btn-sm" id="switch-all" data-toggle="modal" data-target="" disabled><i
                    class="glyph-icon icon-minus-square"></i> LISTAR TODOS
                </button>
                <button class="btn btn-sm" id="switch-problems" data-toggle="modal" data-target=""><i
                    class="glyph-icon icon-minus-square"></i> SERVIDORES OFFLINE
                </button>
                @elseif($type == 'FINAL')
                {{-- <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#add_fake"><i
                    class="glyph-icon icon-plus-square"></i> Novo Registro Fake
                </button> --}}
                {{-- <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_relation"><i
                            class="glyph-icon icon-plus-square"></i> NOVO RELACIONAMENTO
                </button> --}}
                <button class="btn btn-sm" id="switch-all-final" data-toggle="modal" data-target="" disabled><i
                    class="glyph-icon icon-minus-square"></i> LISTAR TODOS
                </button>
                <button class="btn btn-sm" id="switch-problems-final" data-toggle="modal" data-target=""><i
                    class="glyph-icon icon-minus-square"></i> FINAIS OFFLINE
                </button>
                @endif
                <div class="col-sm-2">
                    <div class="input-group">
                            <span class="input-group-addon bg-white border-left-0"><i class="glyph-icon icon-search"></i></span>
                            <input class="form-control" type="name" id="myInput"
                             placeholder="Search" name="Search" onkeyup="search()">
                        </div>
                </div>
            </div>
            <br class="clearfix">

            <div class="modal fade" id="add_fake" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <option id="id_b" value="{{$key->id}}">{{$key->id}} - {{$key->name}}</option>
                                                @endif
                                                @endforeach
                                                </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Display Name:</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="fake_b" name="display_name" class="form-control" onkeypress="return RestrictCommaSemicolon(event);"
                                        ondrop="return false;" onpaste="return false;" required>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">País:</label>
                                    <div class="col-sm-6">
                                        <select name="country_id" id="country_selection" class="form-control">
                                            @foreach($countries as $country)
                                            <option value="{{ $country->fullname }}">{{ $country->name }} - {{ $country->fullname }}</option>
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
                            <button id="add_fake_alias" type="button" class="btn btn-success">ADICIONAR SERVIDOR SELECIONADO</button><br>
                            </div>
                            <div id="target-selection-fake">
                        </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button id="save_fake" class="btn btn-primary">Salvar</button>
                            
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

            <div class="modal fade" id="add_bridge" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Adicionar Nova Bridge</h4>
                        </div>
                        <form class="form-horizontal bordered-row" method="POST"
                              action="{{ route('bridge.bridge.store') }}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nome:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="name" class="form-control"
                                              equired>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Display Name:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="display_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">País:</label>
                                    <div class="col-sm-6">
                                        <select name="country_id" id="country_add_selection" class="form-control">
                                            @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }} - {{ $country->fullname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-horizontal bordered-row">
                                        <label class="col-sm-3 control-label">IP:</label>
                                        <div class="col-sm-6 form-horizontal bordered-row">
                                                <input type="text" name="ip" class="form-control" required>
                                        </div>
                                        @if($type == 'FINAL')
                                        <div class="col-sm-3">
                                                <button id="add_related_ip" type="button" onclick="addSeveralIps();" class="btn btn-sm">Add IP</button>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div id="add-id"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nearest IP:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="nearest_ip" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Porta TCP:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="port_tcp" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Porta UDP:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="port_udp" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Cores:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="core" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Token:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="token" class="form-control">
                                    </div>
                                    <small>Deixe em branco caso já exista algum registro para este IP.</small>
                                </div>
                                @if($type == 'FINAL')
                            <div class="form-group">
                                       <label class="col-sm-3 control-label">Nível de permissão:</label>
                                       <div class="col-sm-6">
                                        <select name="permission_level" id="" class="form-control">
                                            <option value="0">0</option>
                                            <option value="10">10</option>
                                        </select>

                                    </div><small>Nível 10 para visualização interna, nível 0 para visualização do usuário.</small>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Network Limit:</label>
                                <div class="col-sm-6">
                                    <input type="number" name="network_limit" id="network-limit" class="form-control" placeholder="200000">
                                </div>
                            </div>
                                @endif
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tipo:</label>
                                    <div class="col-sm-6">
                                        <select name="type" id="" class="form-control">
                                            <option value="{{ $type }}">{{ $type }}</option>
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
            <br class="clear-fix">

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
                                                @if ($server->type == 'FINAL')         
                                                @foreach($servers as $server)
                                                    <option value="{{ $server->id }}">{{ $server->name }}</option>
                                                @endforeach                                           
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div id="target-selection">
                                    <div id="clone" class="form-group">
                                        <label class="col-sm-3 control-label">Selecionar Bridge:</label>
                                        <div class="col-sm-6">
                                            <select name="alias_id" class="form-control" id="selection">
                                                @if ($server->type == 'BRIDGE')
                                                    @foreach($servers as $server)
                                                        <option id="selected-option" value="selected-id-alias" name="{{ $server->name }}">{{ $server->name }}</option>
                                                    @endforeach
                                                @endif
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
            <div id="servers_info">
                    <div id="new_register" class="example-box-wrapper">
                        <table id="servers_info_table" class="table table-bordered responsive no-wrap" 
                        cellspacing="0" width="100%">                   
                            <thead style="color:black">
                            <tr>
                                <th>Servidores Online</th>
                                <th>Servidores Offline</th>
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
                                </tr>
                               </form>
                               </table>
                            </div>
                </div>
                        <br class="clear-fix">
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
                        @if($type == 'FINAL')
                        <th>Display Name</th>
                        @endif
                        <th>IP</th>
                        <th>Rank</th>
                        <th>Média por dia</th>
                        <th>Porta TCP</th>
                        <th>Porta UDP</th>
                        <th>Versao</th>
                        <th>Onlines (TCP)</th>
                        <th>Onlines (UDP)</th>
                        <th>Online</th>
                        <th>Loss</th>
                        <th>Permission Level</th>
                        <th>Network Limit</th>
                        <th colspan="2">Ações</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        @if($type == 'FINAL')
                        <th>Display Name</th>
                        @endif
                        <th>IP</th>
                        <th>Rank</th>
                        <th>Média por dia</th>
                        <th>Porta TCP</th>
                        <th>Porta UDP</th>
                        <th>Versao</th>
                        <th>Onlines (TCP)</th>
                        <th>Onlines (UDP)</th>
                        <th>Online</th>
                        <th>Loss</th>
                        <th>Permission Level</th>
                        <th>Network Limit</th>
                        <th colspan="2">Ações</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($servers as $server)
                        <tr>
                            <td>{{ $server->id }} </td>
                            <td>{{ $server->name }} </td>
                            @if($type == 'FINAL')
                            <td>{{ $server->display_name }}
                            @endif
                            <td>{{ $server->ip }}</td>
                            <td>{{ $server->rank }}</td>
                            <td>
                                <b style="color: blue;">{{ $server->mean }}</b>
                            </td>
                            <td>{{ $server->port_tcp }}</td>
                            <td>{{ $server->port_udp }}</td>
                            <td>{{ $server->version }}</td>
                            <td>
                                <b style="color: blue;">{{ $server->users_tcp_online }}</b>
                            </td>
                            <td>
                                <b style="color: blue;">{{ $server->users_udp_online }}</b>
                            </td>
                            <!-- Fixed for "bug temer" -->
                            @if ($server->status == 'Online') 
                            <td>
                                    <b style="color: green;">Online</b><i class="glyph-icon icon-ok-sign"></i>
                                </td>
                            @else
                                <td>
                                    <b style="color: red;">Offline</b><i class="icon-remove-sign"></i>
                                </td>
                            @endif
                            <td> {{ $server->loss }} </td>
                            <td> {{ $server->rules_type }} </td>
                            <td> {{ $server->network_limit }} </td>
                            <td>
                            <a data-balloon="{{$server->name}}" data-balloon-pos="left" href="{{ route('bridge.bridge.delete', ['id' => $server->id ]) }}">Excluir</a>
                            </td>
                            <td>
                                <a data-balloon="{{$server->name}}" data-balloon-pos="left" href="{{ route('bridge.bridge.edit', ['id' => $server->id]) }}">Editar</a>
                            </td>
                            @if($type == 'FINAL')
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>   
        <div id="problems" style="display: none;">
                <div class="example-box-wrapper">
                    <table id="datatable-responsive-problems" class="table table-hover table-bordered responsive no-wrap sortable"
                           cellspacing="0" width="100%">
                        <thead>
                          <tr style="cursor: pointer;">
                            <th>ID</th>
                            <th>Nome</th>
                            @if($type == 'FINAL')
                            <th>Display Name</th>
                            @endif
                            <th>IP</th>
                            <th>Rank</th>
                            <th>Média por dia</th>
                            <th>Porta TCP</th>
                            <th>Porta UDP</th>
                            <th>Versao</th>
                            <th>Onlines (TCP)</th>
                            <th>Onlines (UDP)</th>
                            <th>Online</th>
                            <th>Loss</th>
                            <th>Permission Level</th>
                            <th colspan="2">Ações</th>
                        </tr>
                        </thead>
    
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            @if($type == 'FINAL')
                            <th>Display Name</th>
                            @endif
                            <th>IP</th>
                            <th>Rank</th>
                            <th>Média por dia</th>
                            <th>Porta TCP</th>
                            <th>Porta UDP</th>
                            <th>Versao</th>
                            <th>Onlines (TCP)</th>
                            <th>Onlines (UDP)</th>
                            <th>Online</th>
                            <th>Loss</th>
                            <th>Permission Level</th>
                            <th colspan="2">Ações</th>
                        </tr>
                        </tfoot>
    
                        <tbody>
                        @foreach($servers as $server)
                        @if($server->status == 'Offline')
                            <tr>
                                <td>{{ $server->id }} </td>
                                <td>{{ $server->name }} </td>
                                @if($type == 'FINAL')
                                <td>{{ $server->display_name }}
                                @endif
                                <td>{{ $server->ip }}</td>
                                <td>{{ $server->rank }}</td>
                                <td>
                                    <b style="color: blue;">{{ $server->mean }}</b>
                                </td>
                                <td>{{ $server->port_tcp }}</td>
                                <td>{{ $server->port_udp }}</td>
                                <td>{{ $server->version }}</td>
                                <td>
                                    <b style="color: blue;">{{ $server->users_tcp_online }}</b>
                                </td>
                                <td>
                                    <b style="color: blue;">{{ $server->users_udp_online }}</b>
                                </td>
                                <!-- Fixed for "bug temer" -->
                                @if($server->status == 'Online')
                                <td>
                                    <b style="color: green;">Online</b><i class="glyph-icon icon-ok-sign"></i>
                                </td>
                                @else
                                <td>
                                    <b style="color: red;">Offline</b><i class="icon-remove-sign"></i>
                                </td>
                                @endif
                                {{-- @if($server->status == 'Offline')
                                <td style="font-weight: bold; color: purple;">Servidor offline!</td>
                                @endif --}}
                                <td> {{ $server->loss }} </td>
                                <td> {{ $server->rules_type }} </td>
                                <td>
                                    <a data-balloon="{{$server->name}}" data-balloon-pos="left" href="{{ route('bridge.bridge.delete', ['id' => $server->id ]) }}">Excluir</a>
                                </td>
                                <td>
                                    <a data-balloon="{{$server->name}}" data-balloon-pos="left" href="{{ route('bridge.bridge.edit', ['id' => $server->id]) }}">Editar</a>
                                </td>
                                @if($type == 'FINAL')
                                <td>
                                {{-- <a class="fake_anchor" data-balloon="{{$server->name}}" data-id="{{$server->id}}" data-balloon-pos="left" data-toggle="modal" data-target="#add_fake">Gerar Fake</a> --}}
                                </td>
                                @endif
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="final-offline" style="display: none">
                    <div class="example-box-wrapper">
                        <table id="datatable-responsive-final" class="table table-hover table-bordered responsive no-wrap sortable"
                               cellspacing="0" width="100%">
                            <thead>
                                    {{-- https://www.jqueryscript.net/table/Paginate-Sort-Filter-Table-Sortable.html --}}
                              <tr style="cursor: pointer;">
                                <th>ID</th>
                                <th>Nome</th>
                                @if($type == 'FINAL')
                                <th>Display Name</th>
                                @endif
                                <th>IP</th>
                                <th>Rank</th>
                                <th>Média por dia</th>
                                <th>Porta TCP</th>
                                <th>Porta UDP</th>
                                <th>Versao</th>
                                <th>Onlines (TCP)</th>
                                <th>Onlines (UDP)</th>
                                <th>Online</th>
                                <th>Loss</th>
                                <th>Permission Level</th>
                                <th colspan="2">Ações</th>
                            </tr>
                            </thead>
        
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                @if($type == 'FINAL')
                                <th>Display Name</th>
                                @endif
                                <th>IP</th>
                                <th>Rank</th>
                                <th>Média por dia</th>
                                <th>Porta TCP</th>
                                <th>Porta UDP</th>
                                <th>Versao</th>
                                <th>Onlines (TCP)</th>
                                <th>Onlines (UDP)</th>
                                <th>Online</th>
                                <th>Loss</th>
                                <th>Permission Level</th>
                                <th colspan="2">Ações</th>
                            </tr>
                            </tfoot>
        
                            <tbody>
                            @foreach($servers as $server)
                            @if ($server->status == 'Offline' )
                                <tr>
                                    <td>{{ $server->id }} </td>
                                    <td>{{ $server->name }} </td>
                                    @if($type == 'FINAL')
                                    <td>{{ $server->display_name }}
                                    @endif
                                    <td>{{ $server->ip }}</td>
                                    <td>{{ $server->rank }}</td>
                                    <td>
                                        <b style="color: blue;">{{ $server->mean }}</b>
                                    </td>
                                    <td>{{ $server->port_tcp }}</td>
                                    <td>{{ $server->port_udp }}</td>
                                    <td>{{ $server->version }}</td>
                                    <td>
                                        <b style="color: blue;">{{ $server->users_tcp_online }}</b>
                                    </td>
                                    <td>
                                        <b style="color: blue;">{{ $server->users_udp_online }}</b>
                                    </td>
                                    
                                        <td>
                                            <b style="color: red;">Offline</b><i class="icon-remove-sign"></i>
                                        </td>
                                    <td> {{ $server->loss }} </td>
                                    <td> {{ $server->rules_type }} </td>
                                    <td>
                                    <a data-balloon="{{$server->name}}" data-balloon-pos="left" href="{{ route('bridge.bridge.delete', ['id' => $server->id ]) }}">Excluir</a>
                                    </td>
                                    <td>
                                        <a data-balloon="{{$server->name}}" data-balloon-pos="left" href="{{ route('bridge.bridge.edit', ['id' => $server->id]) }}">Editar</a>
                                    </td>
                                    @if($type == 'FINAL')
                                    <td>
                                    {{-- <a class="fake_anchor" data-balloon="{{$server->name}}" data-id="{{$server->id}}" data-balloon-pos="left" data-toggle="modal" data-target="#add_fake">Gerar Fake</a> --}}
                                    </td>
                                    @endif
                                </tr>
                                @endif
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

  function addSeveralIps() {
      $("#add-id").append("<div id='added-ip' class='form-horizontal form-group bordered-row'>"
                         +"     <label class='col-sm-3 control-label'>IP Relacionado:</label>"
                         +"           <div class='col-sm-6'>"
                         +"               <input type='text' name='related_ip[]' class='form-control' required>"
                         +"           </div>"
                         +"           <div class='col-sm-3'>"
                         +"                   <button id='delete-parent-ip' type='button' onclick='deleteIp(this.id);' class='btn btn-sm btn-primary'>Delete</button>"
                         +"           </div>"
                         +"</div>");  
  }

function deleteIp(id) {
    $("#"+id).closest('#added-ip').remove();
}

</script>
<script>
$('#pool_ip[0], #pool_ip[1], #pool_ip[2], #pool_ip[3], #pool_ip[4]').on("keyup", action);
$('#save_bridge').on("change", action);

function action() {
    if( $('#pool_ip[0]').val().length > 0 && $('#pool_ip[1]').val().length > 0 && $('#pool_ip[2]').val().length > 0 && $('#pool_ip[3]').val() > 0 && $('#pool_ip[4]').val() > 0) {
        $('#save_bridge').prop("disabled", false);
    } else {
        $('#save_bridge').prop("disabled", true);
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

    $("#selection_b").chosen();
    $("#country_add_selection").chosen();
    $("#add_fake_alias").on("click", function() {
    var server_name = $( "#selection_b option:selected" ).text();
    var country = $( "#country_selection option:selected" ).text(); 
    var display_name = document.getElementById("fake_b").value;  
    var permission_level = $( "#permission_b option:selected" ).text();
    var others = $( "#others_b option:selected" ).text();
    var server_array = [server_name, display_name, country, permission_level, others]
        $("#target-selection-fake").append('<div id="'+server_name+'" class="selected" value="server_t[]" name="'+server_array+'"><br>'
                                +'<input type="hidden" id="hihinput" name="servers[]" value="'+server_array+'">'
                                +'<label class="col-sm-3 control-label">Servidor selecionado:</label> <h4 href="#">'+server_name
                                +'</h4><br><br><label class="col-sm-3 control-label">Fake Display Name:</label> <h4 href="#">'+display_name
                                +'</h4><br><br><label class="col-sm-3 control-label">Country:</label> <h4 href="#">'+country
                                +'</h4><br><br><label class="col-sm-3 control-label">Permission Level:</label> <h4 href="#">'+permission_level
                                +'</h4><br><br><label class="col-sm-3 control-label">Others:</label> <h4 href="#">'+ others
                                +'</h4><br><br><button style="text-align:center" type="button" class="deleteItem btn btn-default" >Delete</button><br></div>');
    });
    
    $(document).on("click", ".deleteItem", function() {
        $(this).closest(".selected").remove();
    });

    $(document).on("click", ".fake_anchor", function () {
        var server_id = $(this).data('id');
        $(".modal-body #").text(server_id);
    });

        jQuery(document).ready(function(){
        jQuery('#switch-all').on('click', function(event) {        
             jQuery('#problems').toggle('show');
             jQuery('#all').toggle('show');
             $("#switch-all").attr("disabled", true);
             $('#switch-problems').attr("disabled", false);
        });
        jQuery('#switch-problems').on('click', function(event) {        
             jQuery('#problems').toggle('show');
             jQuery('#all').toggle('show');
             $("#switch-problems").attr("disabled", true);
             $('#switch-all').attr("disabled", false);
        });

        jQuery('#switch-all-final').on('click', function(event) {        
             jQuery('#final-offline').toggle('show');
             jQuery('#all').toggle('show');
             $("#switch-all-final").attr("disabled", true);
             $('#switch-problems-final').attr("disabled", false);
        });

        

        jQuery('#switch-problems-final').on('click', function(event) {        
             jQuery('#final-offline').toggle('show');
             jQuery('#all').toggle('show');
             $("#switch-problems-final").attr("disabled", true);
             $("#switch-all-final").attr("disabled", false);
        });
    });

    $("#selection").chosen();
        $("#selectg").chosen();
</script>
@endsection