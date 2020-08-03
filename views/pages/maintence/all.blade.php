@extends('layout.default');
@section('content')
    <!-- Formulário -->
    <div class="panel">
        <div class="panel-body">
            <div class="form-horizontal bordered-row">
                <h2 class="title-hero">Manutenção</h2>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Status do Site:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="status" name="status"
                               value="{{ ($status->status == 'maintenance') ? 'Em Manutenção' : 'Online  ' }}" readonly>
                    </div>
                </div>

                <div id="ip" class="form-group">
                    <label class="col-sm-3 control-label">IP de acesso:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="ip-sender" name="ip-sender">
                    </div>
                </div>

                <div id="button-send">
                    <button type="button" class="btn btn-sm btn-black" id="modal-button" data-toggle="modal"
                            data-target="#confirm-action">
                        <i class="glyph-icon icon-save"></i> Salvar Status
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="confirm-action" tabindex="-1" role="dialog" aria-labelledby="confirm-actionlabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Confirmar Ação:</h4>
                </div>
                <form class="form-horizontal bordered-row" id="maintence-form" method="post">
                    <div class="modal-body">
                        <div class="form-group" id="ip-confirm">
                            <label class="col-md-4 control-label">IP de acesso:</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="ip-value" name="ip-value">
                            </div>
                        </div>
                        <b>Você tem certeza que deseja realizar essa ação?
                            Essa alteração pode implicar
                            <font color="red">graves acontecimentos</font> caso não seja
                            <font color="red">ordem da diretoria</font>. Se sim, digite a senha do seu usuário para
                            confirmar:</b>
                        <div class="clearfix"></div>
                        <p></p>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Digite Sua Senha:</label>
                            <div class="col-md-4">
                                <input id="password-user" name="password-user" type="password"
                                       class="form-control input-md" required>
                            </div>
                        </div>
                    </div>
                    <div id="result"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-black-opacity" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-black">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')

    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#modal-button').click(function () {

                var ipaddress = $("#ip-sender").val();
                $("#ip-value").val(ipaddress);

            });
            jQuery('#maintence-form').submit(function () {

                var ip = $("#ip-value").val();
                var password = $("#password-user").val();


                jQuery.ajax({
                    type: "POST",
                    url: '{{ route('site.maintence-update') }}',
                    data: {ip: ip, password: password},
                    success: function (status) {
                        var obj = JSON.parse(status);

                        if (obj.success === true) {
                            $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-success"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-green alert-icon"><i class="glyph-icon icon-check"></i></div><div class="alert-content"><h4 class="alert-title">Pronto!</h4><p><b>Sua Solicitição foi atendida com sucesso.</b></p></div></div></div></div></div></div></div></div></div></div>');
                        } else if (obj.success === 'failPassword') {
                            $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-danger"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-red alert-icon"><i class="glyph-icon icon-remove"></i></div><div class="alert-content"><h4 class="alert-title">Erro!</h4><p><b>Login e Senha Invalida.</b></p></div></div></div></div></div></div></div></div></div></div>');
                        } else if (obj.success === false) {
                            $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-danger"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-red alert-icon"><i class="glyph-icon icon-remove"></i></div><div class="alert-content"><h4 class="alert-title">Erro!</h4><p><b>Não foi possivel atender sua solicitação.</b></p></div></div></div></div></div></div></div></div></div></div>')
                        }
                    },
                    error: function (status) {
                        $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-danger"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-red alert-icon"><i class="glyph-icon icon-remove"></i></div><div class="alert-content"><h4 class="alert-title">Erro!</h4><p><b>Favor entrar em contato com o desenvolvedor.</b></p></div></div></div></div></div></div></div></div></div></div>');
                    }
                });
                return false;
            });
        });
    </script>

@endsection

