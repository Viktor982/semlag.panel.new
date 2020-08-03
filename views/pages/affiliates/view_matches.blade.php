@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Visualizar Matches</h2>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="view_details" tabindex="-1" role="dialog" aria-labelledby="view_details"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">Detalhes do Match:</h3>
                </div>
                <form class="form-horizontal bordered-row" method="POST" action="{{ route('customers.create') }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">IP:</label>
                            <div class="col-sm-6">
                                <input type="text" name="ip_address" class="form-control" id="ip_address"
                                       value="192.168.0.10" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Data:</label>
                            <div class="col-sm-6">
                                <input type="text" name="date" class="form-control" id="date"
                                       value="11/08/2017 16:06:45" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Cookie:</label>
                            <div class="col-sm-6">
                                <input type="text" name="cookie" class="form-control" id="cookie" value="cookie_1"
                                       readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">S.O:</label>
                            <div class="col-sm-6">
                                <input type="text" name="so" class="form-control" id="so" value="Windows 7 x64"
                                       readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Navegador:</label>
                            <div class="col-sm-6">
                                <input type="text" name="navigator" class="form-control" id="navigator"
                                       value="Google Chrome 54.16" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">User Logado:</label>
                            <div class="col-sm-6">
                                <input type="text" name="user_logged" class="form-control" id="user_logged"
                                       value="Bananas de Pijama" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-azure" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <div class="panel">
        <div class="panel-body">
            <div class="col-md-3">
                <div class="form-group">
                    <div class="input-group">
                        <label class="control-label">
                            <div class="title">
                                Afiliado:
                            </div>
                        </label>
                        <span class="input-group-addon bg-black">
                             <i class="glyph-icon icon-lock"></i>
                         </span>
                        <input type="text" class="form-control" placeholder="Digite o Nome do Afiliado">
                    </div>
                </div>
            </div>

            <label class="control-label">
                <div class="title">
                    Nível de Risco:
                </div>
            </label>

            <div class="btn-group" data-toggle="buttons">
                <a href="#" class="btn btn-danger">
                    <input name="radio-toggle-1" type="radio">
                    Risco Baixo
                </a>
                <a href="#" class="btn btn-warning">
                    <input name="radio-toggle-1" type="radio">
                    Risco Médio
                </a>
                <a href="#" class="btn btn-success">
                    <input name="radio-toggle-1" type="radio">
                    Risco Alto
                </a>
            </div>

            <div class="example-box-wrapper">
                <table class="table table-striped table-bordered responsive no-wrap" cellspacing="0" cellpadding="0"
                       width="100%">
                    <thead>
                    <tr>
                        <th>Plano</th>
                        <th>View</th>
                        <th>User</th>
                        <th>Risco</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Single Weekly</td>
                        <td>5</td>
                        <td>Santiago</td>
                        <td>
                            <div class="progressbar" data-value="75">
                                <div class="progressbar-value bg-green">
                                    <div class="progress-overlay"></div>
                                    <div class="progress-label">75%</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <button data-toggle="modal" data-target="#view_details" class="btn btn-round btn-black">
                                <i class="glyph-icon icon-eye"></i>
                            </button>
                            <button class="btn btn-success">Liberar Comissão</button>
                        </td>
                    </tr>

                    <tr>
                        <td>Single Annual</td>
                        <td>5</td>
                        <td>Santiago</td>
                        <td>
                            <div class="progressbar" data-value="45">
                                <div class="progressbar-value bg-warning">
                                    <div class="progress-overlay"></div>
                                    <div class="progress-label">45%</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <button data-toggle="modal" data-target="#view_details" class="btn btn-round btn-black">
                                <i class="glyph-icon icon-eye"></i>
                            </button>
                            <button class="btn btn-success">Liberar Comissão</button>
                        </td>
                    </tr>

                    <tr>
                        <td>Single Trimestral</td>
                        <td>5</td>
                        <td>Santiago</td>
                        <td>
                            <div class="progressbar" data-value="20">
                                <div class="progressbar-value bg-danger">
                                    <div class="progress-overlay"></div>
                                    <div class="progress-label">20%</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <button data-toggle="modal" data-target="#view_details" class="btn btn-round btn-black">
                                <i class="glyph-icon icon-eye"></i>
                            </button>
                            <button class="btn btn-success">Liberar Comissão</button>
                        </td>
                    </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')

@endsection

