@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Gateways</h2>
    </div>

    <!-- Subscription Modal -->
    <div class="modal fade" id="subscription_modal" tabindex="-1" role="dialog"
         aria-labelledby="subscription_modallabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Mudar o Status de Subscrição:</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal bordered-row" action="" id="subscription-form" data-parsley-validate=""
                          method="post">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Opção Escolhida:</label>
                            <div class="col-md-4">
                                <input id="action-confirm" name="action-confirm" type="text" readonly
                                       class="form-control input-md">
                                <div hidden>
                                    <input id="id-value" name="id-value" type="text" class="form-control input-md">
                                    <input id="status-value" name="status-value" type="text"
                                           class="form-control input-md">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Gateway a ser afetado:</label>
                            <div class="col-md-4">
                                <input id="gateway-confirm" name="gateway-confirm" readonly type="text"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <b>Você tem certeza que deseja realizar essa ação? se sim, digite o nome do gateway no campo
                            abaixo:</b>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Digite o Gateway:</label>
                            <div class="col-md-4">
                                <input id="action-reconfirm" name="action-reconfirm" type="text"
                                       data-parsley-equalto="#gateway-confirm" class="form-control input-md" required>
                            </div>
                        </div>
                        <div id="result"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-close" class="btn btn-black" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Status Modal -->
    <div class="modal fade" id="status_modal" tabindex="-1" role="dialog" aria-labelledby="status_modallabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modificar o Status do Gateway:</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal bordered-row" action="" id="status-form" data-parsley-validate=""
                          method="post">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Opção Escolhida:</label>
                            <div class="col-md-4">
                                <input id="action-confirm1" name="action-confirm" type="text" readonly
                                       class="form-control input-md">
                                <div hidden>
                                    <input id="id-value1" name="id-value" type="text" class="form-control input-md">
                                    <input id="status-value1" name="status-value" type="text"
                                           class="form-control input-md">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Gateway a ser afetado:</label>
                            <div class="col-md-4">
                                <input id="gateway-confirm1" name="gateway-confirm" readonly type="text"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <b>Você tem certeza que deseja realizar essa ação? se sim, digite o nome do gateway no campo
                            abaixo:</b>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Digite o Gateway:</label>
                            <div class="col-md-4">
                                <input id="action-reconfirm1" name="action-reconfirm" type="text"
                                       data-parsley-equalto="#gateway-confirm1" class="form-control input-md" required>
                            </div>
                        </div>
                        <div id="result1"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-close" class="btn btn-black" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Gateway:</th>
                        <th>Ativo:</th>
                        <th>Subscrição:</th>
                        <th>Taxa:</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Gateway:</th>
                        <th>Ativo:</th>
                        <th>Subscrição:</th>
                        <th>Taxa</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($gateways as $gateway)
                        <tr>
                            <td>{{ $gateway->id }}</td>
                            <td>{{ $gateway->name }}</td>
                            <td>
                                @if($gateway->active == 1)
                                    <button class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#status_modal"
                                            onclick="getValueModalStatus('0','{{$gateway->id}}','{{ strtolower($gateway->name) }}')">
                                        Ativo
                                    </button>
                                @elseif($gateway->active == 0)
                                    <button class="btn btn-sm btn-warning" data-toggle="modal"
                                            onclick="getValueModalStatus('1','{{$gateway->id}}','{{ strtolower($gateway->name) }}')"
                                            data-target="#status_modal">Inativo
                                    </button>
                                @endif
                            </td>
                            <td>
                                @if($gateway->subscription == 1)
                                    <button class="btn btn-sm btn-black" data-toggle="modal"
                                            data-target="#subscription_modal"
                                            onclick="getValueModal('0','{{$gateway->id}}','{{ strtolower($gateway->name) }}')">
                                        Ativo
                                    </button>
                                @elseif($gateway->subscription == 0)
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            onclick="getValueModal('1','{{$gateway->id}}','{{ strtolower($gateway->name) }}')"
                                            data-target="#subscription_modal">Inativo
                                    </button>
                                @endif
                            </td>
                            <td>
                                <form method="post"
                                      action="{{ route('ipn.gateway.update-fee', ['id' => $gateway->id ]) }}">
                                    <input name="fee" class="order form-control input-md" type="number"
                                           value="{{ $gateway->fee }}"
                                           style="margin: 0 auto;width: 60px;display: initial;">
                                    <button class="btn btn-black"><i class="glyph-icon icon-save"></i> Salvar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    {{ $gateways->render() }}
@endsection
@section('extra-scripts')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#subscription-form').submit(function () {
                var id = $("#id-value").val();
                var status = $("#status-value").val();
                jQuery.ajax({
                    type: "POST",
                    url: '{{ route('ipn.gateway.update-subscription') }}',
                    data: {id: id, status: status},
                    success: function (data) {
                        $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-success"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-green alert-icon"><i class="glyph-icon icon-check"></i></div><div class="alert-content"><h4 class="alert-title">Pronto!</h4><p><b>Sua Solicitição foi atendida com sucesso.</b></p></div></div></div></div></div></div></div></div></div></div>');
                        setTimeout('location.reload();', 1500);
                    },
                    error: function (data) {
                        $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-danger"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-red alert-icon"><i class="glyph-icon icon-remove"></i></div><div class="alert-content"><h4 class="alert-title">Erro!</h4><p><b>Favor entrar em contato com o desenvolvedor.</b></p></div></div></div></div></div></div></div></div></div></div>');
                    }
                });
                return false;
            });
            jQuery('#status-form').submit(function () {
                var id = $("#id-value1").val();
                var status = $("#status-value1").val();
                jQuery.ajax({
                    type: "POST",
                    url: '{{ route('ipn.gateway.update-status') }}',
                    data: {id: id, status: status},
                    success: function (data) {
                        $('#result1').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-success"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-green alert-icon"><i class="glyph-icon icon-check"></i></div><div class="alert-content"><h4 class="alert-title">Pronto!</h4><p><b>Sua Solicitição foi atendida com sucesso.</b></p></div></div></div></div></div></div></div></div></div></div>');
                        setTimeout('location.reload();', 1500);
                    },
                    error: function (data) {
                        $('#result1').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-danger"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-red alert-icon"><i class="glyph-icon icon-remove"></i></div><div class="alert-content"><h4 class="alert-title">Erro!</h4><p><b>Favor entrar em contato com o desenvolvedor.</b></p></div></div></div></div></div></div></div></div></div></div>');
                    }
                });
                return false;
            });
        });
    </script>
    ipn.gateway.update-status
    <script>
        function getValueModal(status, id, gateway) {
            //Gateway input show
            document.getElementById('gateway-confirm').value = gateway

            if (status == 1) {
                document.getElementById('action-confirm').value = 'Ativar'
                document.getElementById('action-reconfirm').value = ''
            } else {
                document.getElementById('action-confirm').value = 'Desativar'
                document.getElementById('action-reconfirm').value = ''
            }
            document.getElementById('id-value').value = id
            document.getElementById('status-value').value = status
        }

        function getValueModalStatus(status, id, gateway) {
            //Gateway input show
            document.getElementById('gateway-confirm1').value = gateway

            if (status == 1) {
                document.getElementById('action-confirm1').value = 'Ativar'
                document.getElementById('action-reconfirm1').value = ''
            } else {
                document.getElementById('action-confirm1').value = 'Desativar'
                document.getElementById('action-reconfirm1').value = ''
            }
            document.getElementById('id-value1').value = id
            document.getElementById('status-value1').value = status
        }
    </script>

    <script type="text/javascript">
        /* Datatables responsive */

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true
            });
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });

    </script>
@endsection
