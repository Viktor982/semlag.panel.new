@extends('layout.default')
@section('content')
    @if(is_null($sale))
        <!--Começo Mensagem de Erro --->
        <div class="alert alert-warning">
            <div class="bg-orange alert-icon">
                <i class="glyph-icon icon-warning"></i>
            </div>
            <div class="alert-content">
                <h3 class="alert-title">Aviso</h3>
                <p><b>A venda que você tentou acessar não existe.</b> <a href="{{ route('sales.all') }}" title="Link">Clique
                        Aqui para Voltar</a>.</p>
            </div>
        </div>
        <!--FIM Mensagem de Erro --->
    @else

        <div id="page-title">
            <h2>Venda #{{ $sale->id }}</h2>
            <p></p>
        </div>

        <div class="modal fade" id="reversal_modal" tabindex="-1" role="dialog" aria-labelledby="reversallabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Estornar Venda Nº {{ $sale->id }}:</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal bordered-row" id="reversal" action="" name="reversal"
                              data-parsley-validate="" method="post">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Nº da Venda:</label>
                                <div class="col-md-4">
                                    <input id="action-confirm" value="{{ $sale->id }}" name="action-confirm" type="text"
                                           class="form-control input-md" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Valor:</label>
                                <div class="col-md-4">
                                    <input id="action-confirm"
                                           value="{{ currency($sale->currency_id)  }} {{ $sale->valor }}"
                                           name="action-confirm" type="text" class="form-control input-md" readonly>
                                </div>
                            </div>
                            <b>Você tem certeza que deseja estornar essa venda? Após confirmar essa ação ela é <font
                                        color="red">irreversível!</font> Se sim, digite o Nº da Venda no campo
                                abaixo:</b>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Digite a Opção:</label>
                                <div class="col-md-4">
                                    <input id="action-reconfirm" name="action-reconfirm" type="text"
                                           data-parsley-equalto="#action-confirm" class="form-control input-md"
                                           required>
                                </div>
                            </div>

                            <div id="reversal_result"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-black" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-danger">Estornar Venda!</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Começo Do Formulário --->
        <div class="panel">
            <div class="panel-body">
                <div class="example-box-wrapper">
                    <div class="form-horizontal bordered-row">
                        <div class="example-box-wrapper">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Usuário:</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" disabled id="email"
                                           value="{{ $sale->customer->nome }} - {{ $sale->customer->usuario }}"
                                           placeholder="Nada Consta...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Plano:</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" disabled id="email"
                                           value="{{ plan($sale->plano_id) }}" placeholder="Nada Consta...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">IP do Usuário:</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" disabled id="email"
                                           value="{{ $sale->user_ip }}" placeholder="Nada Consta...">
                                </div>
                            </div>

                            <div class="form-group" style="display: {{ ($sale->assinatura_id) ? "block":"none" }}">
                                <label class="col-sm-3 control-label">ID da Assinatura:</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" disabled id="email"
                                           value="{{ $sale->assinatura_id }}" placeholder="Nada Consta...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Status:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" value="{{ sale_status($sale->status) }}"
                                           disabled id="email" placeholder="Nada Consta...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Alterar Status:</label>
                                <div class="col-sm-6">
                                    <form class="form-horizontal bordered-row" name="form" id="form" action=""
                                          method="POST">
                                        <input type="hidden" class="form-control" name="saleId" id="saleId"
                                               value="{{ $sale->id }}">
                                        <select class="form-control" name="newStatus" id="newStatus">
                                            <option value="2">Aprovar</option>
                                            <option value="3">Cancelar</option>
                                        </select><br>
                                        <input type="submit" class="btn btn-black" value="Enviar">
                                    </form>
                                    <br>
                                    <div id="result"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Data Vigência:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" disabled id="email"
                                           value="{{ brDate($sale->data_vigencia) }}" placeholder="Nada Consta...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Data Aprovação:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" disabled id="email"
                                           value="{{ brDate($sale->date_approved) }}" placeholder="Nada Consta...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Valor:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" disabled
                                           value="{{ currency($sale->currency_id)  }} {{ $sale->valor }} " id="email"
                                           placeholder="Nada Consta..." disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Desconto:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" value="{{ $sale->desconto }}%"
                                           placeholder="Nada Consta..." disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Compra de Revenda:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control"
                                           value="{{ ($sale->isReseller) ? 'Sim':'Não'  }}" id="email"
                                           placeholder="Nada Consta..." disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Método de Pagamento:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" disabled
                                           value="{{ gateway($sale->metodo) }}" id="email" placeholder="Nada Consta...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Código:</label>
                                <div class="col-sm-6">
                                    <textarea rows="3"
                                              class="form-control textarea-sm">{{ $sale->pag_seguro }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Anotações:</label>
                            <div class="col-sm-6">
                                @foreach($sale->quotes as $quote)
                                    <div class="alert bg-black">
                                        <strong>({{ brDate($quote->created_at) }}) {{ $quote->user->username }}
                                            :</strong> {{ $quote->message }}
                                    </div>
                                @endforeach
                                <form method="POST" action="{{ route('sales.add-quote', ['id' => $sale->id]) }}">
                                    <h5>Insira uma mensagem:</h5>
                                    <textarea class="form-control" name="message"></textarea>
                                    <button class="pull-right btn btn-azure" type="submit">Inserir mensagem</button>
                                    <br class="clearfix">
                                </form>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Opções:</label>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#reversal_modal">
                                    <i class="glyph-icon icon-close"></i> Estornar Venda
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <div class="example-box-wrapper">
                                    <a class="btn btn-warning" href="javascript:window.history.go(-1)"><i
                                                class="glyph-icon icon-th-list"></i> Voltar</a>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('extra-scripts')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#form').submit(function () {
                var dados = $('#form').serialize();
                var saleId = $("#saleId").val();
                var newStatus = $("#newStatus").val();
                jQuery.ajax({
                    type: "POST",
                    url: '{{ route('sales.change-status',['id' => $sale->id]) }}',
                    data: {saleId: saleId, newStatus: newStatus},
                    success: function (data) {
                        $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-success"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-green alert-icon"><i class="glyph-icon icon-check"></i></div><div class="alert-content"><h4 class="alert-title">Pronto!</h4><p><b>Sua Solicitição foi atendida com sucesso.</b></p></div></div></div></div></div></div></div></div></div></div>');
                    },
                    error: function () {
                        $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-error"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-green alert-icon"><i class="glyph-icon icon-remove"></i></div><div class="alert-content"><h4 class="alert-title">Erro!</h4><p><b>Favor entrar em contato com o desenvolvedor.</b></p></div></div></div></div></div></div></div></div></div></div>');

                    }
                });

                return false;
            });

            jQuery('#reversal').submit(function () {
                var dados = $('#form').serialize();
                var saleId = $("#saleId").val();
                jQuery.ajax({
                    type: "POST",
                    url: '{{ route('sales.reversal-sale',['id' => $sale->id]) }}',
                    data: {saleId: saleId},
                    success: function (data) {
                        $('#reversal_result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-success"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-green alert-icon"><i class="glyph-icon icon-check"></i></div><div class="alert-content"><h4 class="alert-title">Pronto!</h4><p><b>Sua Solicitição foi atendida com sucesso, Estornamos o dinheiro :(</b></p></div></div></div></div></div></div></div></div></div></div>');
                    },
                    error: function () {
                        $('#reversal_result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-danger"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-green alert-icon"><i class="glyph-icon icon-remove"></i></div><div class="alert-content"><h4 class="alert-title">Erro!</h4><p><b>Favor entrar em contato com o desenvolvedor.</b></p></div></div></div></div></div></div></div></div></div></div>');

                    }
                });

                return false;
            });
        });
    </script>


    <script type="text/javascript">
        $("#csenha").change(function () {
            if (this.checked) {
                $("#senha").prop("disabled", false);
            } else {
                $("#senha").val("");
                $("#senha").prop("disabled", true);
            }
        });
        $("#cafiliado").change(function () {
            if (this.checked) {
                $("#afiliado").prop("disabled", false);
            } else {
                $("#afiliado").val("");
                $("#afiliado").prop("disabled", true);
            }
        });
    </script>
    <script type="text/javascript">
        /* Datepicker bootstrap */

        $(function () {
            "use strict";
            $('.bootstrap-datepicker').bsdatepicker({
                format: 'yyyy-mm-dd'
            });
        });

    </script>
@endsection