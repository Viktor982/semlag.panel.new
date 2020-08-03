@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Retiradas</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero text-center">
                <button status="" class="btn ra-100 btn-black">Todos</button>
                <button status="Recebido" class="btn ra-100 btn-azure">Recebido</button>
                <button status="Realizado" class="btn ra-100 btn-success">Realizado</button>
                <button status="Cancelado" class="btn ra-100 btn-danger">Cancelado</button>
            </h3>

            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Usuário</th>
                        <th>Estado</th>
                        <th>Tipo</th>
                        <th>Transação</th>
                        <th>Valor NPCoins</th>
                        <th>Valor</th>
                        <th>Criado em:</th>
                        <th>Atualizado em:</th>
                        <th>Ações</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Usuário</th>
                        <th>Estado</th>
                        <th>Tipo</th>
                        <th>Transação</th>
                        <th>Valor NPCoins</th>
                        <th>Valor</th>
                        <th>Criado em:</th>
                        <th>Atualizado em:</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($withdrawRequests as $withdrawRequest)
                        <tr>
                            <td>{{ $withdrawRequest->customer->usuario }}</td>
                            <td>{{ withdraw_request_status( $withdrawRequest->status_code ) }}</td>
                            <td>{{ withdraw_request_type( $withdrawRequest->type ) }}</td>
                            <td>{{ $withdrawRequest->transaction }}</td>
                            <td>{{ $withdrawRequest->value }}</td>
                            <td>
                                <b>{{ withdraw_request_currency( $withdrawRequest->type ) }} </b> {{  convert_npcoins( $withdrawRequest->type, $withdrawRequest->value ) }}
                            </td>
                            <td>{{ $withdrawRequest->created_at }}</td>
                            <td>{{ $withdrawRequest->updated_at }}</td>
                            <td>
                                <button class="open-view_withdraw btn btn-black"
                                        data-id="{{ $withdrawRequest->id }}"
                                        data-toggle="modal"
                                        data-target="#view_withdraw">
                                    <i class="glyph-icon icon-eye"></i> Ver
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="view_withdraw" tabindex="-1" role="dialog" aria-labelledby="view_withdrawlabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"> Retirada # <span id="id-modal"></span></h4>
                </div>
                <div class="modal-body">

                    <div id="bordered-content"
                         class="content-box border-top border-">
                        <h3 class="content-box-header text-center clearfix">
                            Informações de Saque
                        </h3>

                        <div class="content-box-wrapper">
                            <div class="form-horizontal bordered-row">
                                <div class="form-group">
                                    <label for="metodo" class="col-sm-3 control-label">Método</label>
                                    <div class="col-sm-6">
                                        <input id="metodo" type="text" class="form-control"
                                               value="">
                                        <input id="id-value" name="id-value" type="hidden" class="form-control"
                                               value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="valor" class="col-sm-3 control-label">Valor</label>
                                    <div class="col-sm-6">
                                        <input id="valor" type="text" class="form-control"
                                               value="">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Nome:</label>
                                    <div class="col-sm-6">
                                        <input id="first_name" type="text" class="form-control"
                                               value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Sobrenome:</label>
                                    <div class="col-sm-6">
                                        <input id="last_name" type="text" class="form-control"
                                               value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Email:</label>
                                    <div class="col-sm-6">
                                        <input id="email" type="text" class="form-control"
                                               value="">
                                    </div>
                                </div>


                                <form id="result" class="button-pane">
                                    <div id="show_buttons" style="display: none;">
                                        <button id="confirmar" class="btn btn-lg btn-success">Confirmar Pagamento</button>
                                        <button id="cancelar" class="btn btn-lg btn-danger">Cancelar Pagamento</button>
                                    </div>
                                    <div id="payment_ok" style="display: none">
                                        <div class="alert alert-success">
                                            <div class="bg-green alert-icon">
                                                <i class="glyph-icon icon-check"></i>
                                            </div>
                                            <div class="alert-content">
                                                <h4 class="alert-title">Atenção!</h4>
                                                <p>O Pagamento foi Confirmado com sucesso.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="payment_canceled" style="display: none">
                                        <div class="alert alert-danger">
                                            <div class="bg-black alert-icon">
                                                <i class="glyph-icon icon-warning"></i>
                                            </div>
                                            <div class="alert-content">
                                                <h4 class="alert-title">Atenção!</h4>
                                                <p id="error-type">Esse Pagamento já foi Cancelado!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="payment_stats" style="display: none">
                                        <div class="alert alert-success">
                                            <div class="bg-green alert-icon">
                                                <i class="glyph-icon icon-check"></i>
                                            </div>
                                            <div class="alert-content">
                                                <h4 class="alert-title">Atenção!</h4>
                                                <p>Sua Solicitação foi concluida com sucesso..</p>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script type="text/javascript">

        /* Datatables responsive */

        $(document).ready(function () {
            var table = $('#datatable-responsive').DataTable({});

            table.search('Recebido').draw();

            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");

            $('.btn.ra-100').click(function () {
                table.search($(this).attr('status')).draw();
            });

        });
    </script>

    <script type="text/javascript">
        var Success = function (res) {
            $("#valor").val(res.data.value);
            $("#metodo").val(function () {
                if (res.data.type === 1) {
                    return 'PayPal'
                } else if (res.data.type === 2) {
                    return 'PagSeguro'
                } else if (res.data.type === 3) {
                    return 'Conta Bancaria'
                }
            });
            $("#first_name").val(res.data.first_name);
            $("#last_name").val(res.data.last_name);
            $("#email").val(res.data.email);
            $("#id-value").val(res.data.id);
            if(res.data.status_code === 1){
                $("#show_buttons").show();
                $("#payment_canceled").hide();
                $("#payment_ok").hide();
            }else if(res.data.status_code === 2){
                $("#payment_ok").show();
                $("#show_buttons").hide();
                $("#payment_canceled").hide();
            }else {
                $("#payment_canceled").show();
                $("#payment_ok").hide();
                $("#show_buttons").hide();
            }

        };
        var Fail = function (res) {

        };

        $(document).on("click", ".open-view_withdraw", function () {
            var id = $(this).data('id');
            axios.post('{{ route('affiliates.withdraw-detail') }}', {
                id: id
            }).then(Success, Fail);
            $(".modal-header #id-modal").text(id);

        });

        $("#view_withdraw").on('hidden.bs.modal', function () {
            $("#payment_canceled").hide();
            $("#payment_ok").hide();
            $("#show_buttons").hide();
            $("#payment_stats").hide();
        });
    </script>

    <script type="text/javascript">
        jQuery(document).ready(function () {

            function updateStatus(newStatus, message, successClass) {
                var id = $("#id-value").val();
                jQuery.ajax({
                    type: "POST",
                    url: '{{ route('affiliates.withdraw-change-status') }}',
                    data: {newStatus: newStatus, id:id},
                    success: function (data) {
                        $('#bordered-content').removeClass('border-azure');
                        $('#bordered-content').addClass(successClass);
                        $("#payment_stats").show();
                        setTimeout(function () {
                            $("#view_withdraw").modal('toggle');
                        }, 3000);

                    },
                    error: function () {
                        $("#payment_canceled").show();
                    }
                });
            }

            jQuery('#confirmar').click(function () {
                updateStatus(2, 'Pagamento feito.', 'border-green');

                return false;
            });

            jQuery('#cancelar').click(function () {
                updateStatus(3, 'Pagamento cancelado.', 'border-red');

                return false;
            });
        });
    </script>
@endsection