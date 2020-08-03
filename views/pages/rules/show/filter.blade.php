@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Filters List Rules JSON</h2>

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
                            <h4 class="modal-title">Adicionar Filter em Regras.JSON</h4>
                        </div>
                        <form class="form-horizontal bordered-row" method="POST"
                              action="{{ route('rules.save.filter') }}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Filter Name:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="identifier" class="form-control" id="process_name"
                                               placeholder="Nome do Filter" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Custom:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="custom" class="form-control" id="process_name"
                                               placeholder="Custom">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Bin Name:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="bin_name" class="form-control" id="process_name"
                                               placeholder="Nome do exe" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Redirect Name:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="redirect_name" class="form-control" id="process_name"
                                               placeholder="Redirect Name" required>
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
            <div class="modal fade" id="add_option" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Adicionar Options em Filter</h4>
                            </div>
                            <form class="form-horizontal bordered-row" method="POST"
                                  action="{{ route('rules.save.filter.option') }}">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Key:</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="key" class="form-control"
                                                   placeholder="Chave" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Value:</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="value" class="form-control" id="process_name"
                                                   placeholder="Valor" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Filter:</label>
                                        <div class="col-sm-6">
                                            <select name="identifier_filter" class="form-control">
                                                @foreach($filters as $filter)
                                                    <option value="{{ $filter->identifier }}">{{ $filter->identifier}}</option>
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
            <div class="modal fade" id="add_path" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Adicionar Path Ocurrence em Filter</h4>
                            </div>
                            <form class="form-horizontal bordered-row" method="POST"
                                  action="{{ route('rules.save.filter.path') }}">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Path:</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="path" class="form-control"
                                                   placeholder="Caminho" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Filter:</label>
                                        <div class="col-sm-6">
                                            <select name="identifier_filter" class="form-control">
                                                @foreach($filters as $filter)
                                                    <option value="{{ $filter->identifier }}">{{ $filter->identifier}}</option>
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
            <div class="modal fade" id="add_window" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Adicionar Window Ocurrence em Filter</h4>
                            </div>
                            <form class="form-horizontal bordered-row" method="POST"
                                  action="{{ route('rules.save.filter.window') }}">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Window:</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="window" class="form-control"
                                                   placeholder="Janela do Game" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Filter:</label>
                                        <div class="col-sm-6">
                                            <select name="identifier_filter" class="form-control">
                                                @foreach($filters as $filter)
                                                    <option value="{{ $filter->identifier }}">{{ $filter->identifier}}</option>
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
            <div class="modal fade" id="add_remote_port" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Adicionar Range de Portas em Regras.JSON</h4>
                            </div>
                            <form class="form-horizontal bordered-row" method="POST"
                                  action="{{ route('rules.save.filter.remoteport') }}">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Filter Name:</label>
                                        <div class="col-sm-6">
                                            <select name="identifier" class="form-control" id="">
                                                @foreach($filters as $filter)
                                                    <option value="{{ $filter->identifier }}">{{ $filter->identifier }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Protocolo:</label>
                                        <div class="col-sm-6">
                                            <select name="protocol" class="form-control" id="">
                                                <option value="6">TCP</option>
                                                <option value="17">UDP</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Range:</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="min" class="form-control"
                                                   placeholder="min" required>
                                            <input type="text" name="max" class="form-control" placeholder="max" required>
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

                <div class="form-horizontal bordered-row">
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#add_record">
                    <i class="glyph-icon icon-plus-square"></i> Novo Registro
                </button>
            </div>
                <hr>
            <div class="form-horizontal bordered-row">
                <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#add_option">
                    <i class="glyph-icon icon-plus-square"></i> Adicionar Options ao Filter
                </button>
                <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#add_path">
                    <i class="glyph-icon icon-plus-square"></i> Adicionar Path ao Filter
                </button>
                <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#add_window">
                    <i class="glyph-icon icon-plus-square"></i> Adicionar Window ao Filter
                </button>
                <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#add_remote_port">
                    <i class="glyph-icon icon-plus-square"></i> Adicionar Remote Port
                </button>
            </div>
                <hr>
            <div class="form-horizontal bordered-row">
                <a class="btn btn-sm btn-default" href="{{ route('rules.show.filter.parameters') }}">
                    <i class="glyph-icon icon-eye"></i> Ver Filter com parametros
                </a>
            </div>
            <br class="clearfix">
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Identificador</th>
                        <th>Custom</th>
                        <th>Nome Exe</th>
                        <th>Redirect Name</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Identificador</th>
                        <th>Custom</th>
                        <th>Nome Exe</th>
                        <th>Redirect Name</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($filters as $filter)
                        <tr>
                            <td>{{ $filter->identifier }}</td>
                            <td>{{ $filter->custom }}</td>
                            <td>{{ $filter->bin_name }}</td>
                            <td>{{ $filter->redirect_name }}</td>
                            <td>
                                <a href="#">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script type="text/javascript">


    </script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paging: false,
            });
        });


    </script>
@endsection