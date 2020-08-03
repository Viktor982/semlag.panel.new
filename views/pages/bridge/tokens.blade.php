@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Tokens Ponte Nova</h2>
        <p>Lista de Tokens Cadastrados.</p>

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
                            <h4 class="modal-title">Adicionar Novo Token</h4>
                        </div>

                        <form class="form-horizontal bordered-row" method="POST"
                              action="{{ route('bridge.token.store') }}">

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">TOKEN:</label>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input class="custom-checkbox" name="generate_token" id="generate_token" type="checkbox" value="1" checked>
                                            </span>
                                            <input type="text" name="token" class="form-control" id="token" placeholder="Digite o Token." disabled>
                                        </div>
                                        <!-- Marque essa opção caso queira vincular algum cliente aos cupons. -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">IP:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="ip" class="form-control" id="ip"
                                               placeholder="Digite o ip." required>
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
                        <th>Token</th>
                        <th>IP</th>
                        <th>Ações</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Token</th>
                        <th>IP</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($tokens as $token)
                        <tr>
                            <td>#</td>
                            <td>{{ $token->token }} </td>
                            <td>{{ $token->ip }}</td>
                            <th><a href="{{ route('bridge.token.delete', ['id' => $token->token ]) }}">Excluir</a></th>
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
        $(function () {
            var cCustomer = function () {
                if ($("#generate_token").is(':checked')) {
                    $("#token").prop("disabled", true);
                } else {
                    $("#token").val("");
                    $("#token").prop("disabled", false);
                }
            };

            $("#generate_token").change(cCustomer);
            cCustomer();
        });

    </script>
@endsection