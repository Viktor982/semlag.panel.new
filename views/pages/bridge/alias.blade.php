@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Alias Ponte Nova</h2>
        <p>Lista de Alias Cadastrados no qual a ponte traduz.</p>

    </div>
    <div class="panel">

        <div class="panel-body">
            <div class="form-horizontal bordered-row">
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#add_bridge"><i
                            class="glyph-icon icon-plus-square"></i> Novo Registro
                </button>
            </div>
            <br class="clearfix">
            <div class="modal fade" id="add_bridge" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Adicionar Novo Alias</h4>
                        </div>
                        <form class="form-horizontal bordered-row" method="POST"
                              action="{{ route('bridge.alias.store') }}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Alias ID:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="id" class="form-control"
                                              required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nome:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="alias_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">País:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="country" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">IP:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="ip" class="form-control" required>
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
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Alias ID</th>
                        <th>Name</th>
                        <th>IP</th>
                        <th>País</th>
                        <th>Porta TCP</th>
                        <th>Porta UDP</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Alias ID</th>
                        <th>Name</th>
                        <th>IP</th>
                        <th>País</th>
                        <th>Porta TCP</th>
                        <th>Porta UDP</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($alias as $al)
                        <tr>
                            <td>#</td>
                            <td>{{ $al->id }} </td>
                            <td>{{ $al->alias_name }}</td>
                            <td>{{ $al->ip }} </td>
                            <td>{{ $al->country }} </td>
                            <td>{{ $al->port_tcp }}</td>
                            <td>{{ $al->port_udp }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
   
@endsection