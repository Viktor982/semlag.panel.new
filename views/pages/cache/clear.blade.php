@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Cache</h2>
    </div>
    <!--Começo Do Formulário --->
    <div class="modal fade" id="clear_cache" tabindex="-1" role="dialog" aria-labelledby="clear_cachelabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Limpar Cache:</h4>
                </div>
                <form class="form-horizontal bordered-row" action="" id="form" data-parsley-validate="" method="post">

                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Opção Escolhida:</label>
                            <div class="col-md-4">
                                <input id="action-confirm" name="action-confirm" readonly type="text"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <b>Você tem certeza que deseja limpar o cache da opção escolhida? se sim, escreva o nome da
                            opção no campo abaixo:</b>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Digite a Opção:</label>
                            <div class="col-md-4">
                                <input id="action-reconfirm" name="action-reconfirm" type="text"
                                       data-parsley-equalto="#action-confirm" class="form-control input-md" required>
                            </div>
                        </div>
                    </div>
                    <div id="result"></div>
                    <div class="modal-footer">
                        <button type="button" id="close" class="btn btn-black" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <div class="form-horizontal bordered-row">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Limpar Cache de:</label>
                            <div class="col-sm-2">
                                <select class="form-control" id="action" onchange="getValueModal(this)" name="action">
                                    <option value="">Escolha uma Opção</option>
                                    <option value="site">Site</option>
                                    <option value="cloudflare">CloudFlare</option>
                                    <option value="painel">Painel</option>
                                    <option value="todos">Todos</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                <button class="btn btn-info" id="filter" data-toggle="modal" data-target="#clear_cache">
                                    <i class="glyph-icon icon-soundcloud"></i> Limpar Cache
                                </button>
                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('extra-scripts')
    <script>
        function getValueModal(valor) {
            document.getElementById('action-confirm').value = valor.value
        }

        $('#close').click(function () {
            $('#action-reconfirm').val('');
        })
    </script>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#form').submit(function () {
                var action = $("#action-confirm").val();
                jQuery.ajax({
                    type: "POST",
                    url: '{{ route('site.clear-cache') }}',
                    data: {action: action},
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-success"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-green alert-icon"><i class="glyph-icon icon-check"></i></div><div class="alert-content"><h4 class="alert-title">Pronto!</h4><p><b>Sua Solicitição foi atendida com sucesso.</b></p></div></div></div></div></div></div></div></div></div></div>');
                    },
                    error: function (data) {
                        $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-danger"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-red alert-icon"><i class="glyph-icon icon-remove"></i></div><div class="alert-content"><h4 class="alert-title">Erro!</h4><p><b>Favor entrar em contato com o desenvolvedor.</b></p></div></div></div></div></div></div></div></div></div></div>');
                    }
                });
                return false;
            });
        });
    </script>
@endsection