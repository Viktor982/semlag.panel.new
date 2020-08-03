@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Configurações</h2>
        <p>Configurações de Assinaturas.</p>
    </div>

    <!-- Subscription Modal -->
    <div class="modal fade" id="subscription_modal" tabindex="-1" role="dialog"
         aria-labelledby="subscription_modallabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Alterar Configurações:</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal bordered-row" action="" id="subscription-form" data-parsley-validate=""
                          method="post">

                        <div hidden>
                            <input id="env" name="env" type="text" class="form-control input-md">
                            <input id="confirm-submit" value="desconto" name="confirm-submit" type="text"
                                   class="form-control input-md">
                        </div>

                        <div class="form-group" id="discount_item">
                            <label class="col-md-4 control-label" for="name">Desconto Aplicado:</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input id="discount_value" name="discount_value" readonly type="text"
                                           class="form-control input-md">
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>

                        <b>Você tem certeza que deseja realizar essa ação? se sim, digite a palavra <font color="red">desconto</font>
                            no campo abaixo:</b>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Validação:</label>
                            <div class="col-md-4">
                                <input id="action-reconfirm" name="action-reconfirm" type="text"
                                       data-parsley-equalto="#confirm-submit" class="form-control input-md" required>
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

    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <div class="form-horizontal bordered-row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Desconto Na Assinatura?</label>
                        <div class="col-sm-6">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="number" name="discount_recurring"
                                           value="{{ npconfig('discount_recurring') }}" id="discount_recurring"
                                           maxlength="3" class="form-control">
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-black" id="confirm" data-toggle="modal"
                                data-target="#subscription_modal">Confirmar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('extra-scripts')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#subscription-form').submit(function () {
                var key = $("#env").val();
                var value = $("#discount_value").val();
                jQuery.ajax({
                    type: "POST",
                    url: '{{ route('subscriptions.env-update') }}',
                    data: {key: key, value: value},
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
        });
    </script>

    <script type="text/javascript">

        $("#confirm").on('click', function () {
            var discount = $('#discount_recurring').val();

            var env = 'discount_recurring';
            document.getElementById('discount_value').value = discount;
            document.getElementById('env').value = env
            document.getElementById("discount_item").style.display = "block";


        });
    </script>
@endsection