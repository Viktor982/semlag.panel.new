@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Configurações</h2>
        <p>Configurações de Afiliados.</p>
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
                            <input id="confirm-submit" value="npcoins" name="confirm-submit" type="text"
                                   class="form-control input-md">
                        </div>

                        <div class="form-group" id="discount_item">
                            <label class="col-md-4 control-label" for="name">Minimo para Saque:</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input id="min_withdraw_npcoins_total" name="min_withdraw_npcoins_total" readonly
                                           type="text" class="form-control input-md">
                                    <span class="input-group-addon">$</span>
                                </div>
                            </div>
                        </div>

                        <b>Você tem certeza que deseja realizar essa ação? se sim, digite a palavra <font color="red">npcoins</font>
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

    <!-- Panel Configuração de Saque -->
    <div class="panel">
        <div class="panel-body">
            <div class="panel-title"><b>Configurações de Saque:</b></div>
            <div class="example-box-wrapper">
                <div class="form-horizontal bordered-row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Minímo de Saque (NPCoins) ?</label>
                        <div class="col-sm-6">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="number" name="min_withdraw_npcoins"
                                           value="{{ npconfig('min_withdraw_npcoins') }}" id="min_withdraw_npcoins"
                                           maxlength="4" class="form-control">
                                    <span class="input-group-addon">$</span>
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
    <form class="form-horizontal bordered-row" action="{{ route('affiliates.configs-update') }}" method="post">

        <!-- Panel Comissionamento Nível de Afiliados -->
        <div class="panel">
            <div class="panel-body">
                <div class="panel-title"><b>Nível Bronze:</b></div>

                <div class="row" align="center">
                    <div class="col-md-6">
                        <div class="example-box-wrapper">
                            <div class="form-horizontal bordered-row">
                                <b>Comissionamento Padrão:</b>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">User ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="bronze[user]"
                                                   value="{{ $levels->where('rank', 1)->where('key', '=', 'user')->first()['value'] }}"
                                                   id="affiliate_rate_commission_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 1 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="bronze[affiliate_rate_commission_1]"
                                                   value="{{ $levels->where('rank', 1)->where('key', '=', 'affiliate_rate_commission_1')->first()['value'] }}"
                                                   id="affiliate_rate_commission_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 2 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="bronze[affiliate_rate_commission_2]"
                                                   value="{{ $levels->where('rank', 1)->where('key', '=', 'affiliate_rate_commission_2')->first()['value'] }}"
                                                   id="affiliate_rate_commission_2"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 3 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="bronze[affiliate_rate_commission_3]"
                                                   value="{{ $levels->where('rank', 1)->where('key', 'affiliate_rate_commission_3')->first()['value'] }}"
                                                   id="affiliate_rate_commission_3"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 4 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="bronze[affiliate_rate_commission_4]"
                                                   value="{{ $levels->where('rank', 1)->where('key', 'affiliate_rate_commission_4')->first()['value'] }}"
                                                   id="affiliate_rate_commission_4"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="example-box-wrapper">
                            <div class="form-horizontal bordered-row">
                                <b>Comissionamento de Assinatura Padrão:</b>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">User ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="bronze[user_subscription]"
                                                   value="{{ $levels->where('rank', 1)->where('key', '=', 'user_subscription')->first()['value'] }}"
                                                   id="affiliate_rate_commission_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 1 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="bronze[affiliate_rate_subscription_1]"
                                                   value="{{ $levels->where('rank', 1)->where('key', 'affiliate_rate_subscription_1')->first()['value'] }}"
                                                   id="affiliate_rate_subscription_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 2 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="bronze[affiliate_rate_subscription_2]"
                                                   value="{{ $levels->where('rank', 1)->where('key', 'affiliate_rate_subscription_2')->first()['value'] }}"
                                                   id="affiliate_rate_subscription_2"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 3 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="bronze[affiliate_rate_subscription_3]"
                                                   value="{{ $levels->where('rank', 1)->where('key', 'affiliate_rate_subscription_3')->first()['value'] }}"
                                                   id="affiliate_rate_subscription_3"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 4 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="bronze[affiliate_rate_subscription_4]"
                                                   value="{{ $levels->where('rank', 1)->where('key', 'affiliate_rate_subscription_4')->first()['value'] }}"
                                                   id="affiliate_rate_subscription_4"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel Comissionamento Nível de Afiliados -->
        <div class="panel">
            <div class="panel-body">
                <div class="panel-title"><b>Nível Prata:</b></div>

                <div class="row" align="center">
                    <div class="col-md-6">
                        <div class="example-box-wrapper">
                            <div class="form-horizontal bordered-row">
                                <b>Comissionamento Padrão:</b>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">User ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="prata[user]"
                                                   value="{{ $levels->where('rank', 2)->where('key', '=', 'user')->first()['value'] }}"
                                                   id="affiliate_rate_commission_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 1 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="prata[affiliate_rate_commission_1]"
                                                   value="{{ $levels->where('rank', 2)->where('key', '=', 'affiliate_rate_commission_1')->first()['value'] }}"
                                                   id="affiliate_rate_commission_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 2 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="prata[affiliate_rate_commission_2]"
                                                   value="{{ $levels->where('rank', 2)->where('key', '=', 'affiliate_rate_commission_2')->first()['value']}}"
                                                   id="affiliate_rate_commission_2"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 3 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="prata[affiliate_rate_commission_3]"
                                                   value="{{ $levels->where('rank', 2)->where('key', '=', 'affiliate_rate_commission_3')->first()['value']}}"
                                                   id="affiliate_rate_commission_3"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 4 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="prata[affiliate_rate_commission_4]"
                                                   value="{{ $levels->where('rank', 2)->where('key', '=', 'affiliate_rate_commission_4')->first()['value']}}"
                                                   id="affiliate_rate_commission_4"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="example-box-wrapper">
                            <div class="form-horizontal bordered-row">
                                <b>Comissionamento de Assinatura Padrão:</b>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">User ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="prata[user_subscription]"
                                                   value="{{ $levels->where('rank', 2)->where('key', '=', 'user_subscription')->first()['value'] }}"
                                                   id="affiliate_rate_commission_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 1 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="prata[affiliate_rate_subscription_1]"
                                                   value="{{$levels->where('rank', 2)->where('key', '=', 'affiliate_rate_subscription_1')->first()['value']}}"
                                                   id="affiliate_rate_subscription_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 2 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="prata[affiliate_rate_subscription_2]"
                                                   value="{{$levels->where('rank', 2)->where('key', '=', 'affiliate_rate_subscription_2')->first()['value']}}"
                                                   id="affiliate_rate_subscription_2"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 3 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="prata[affiliate_rate_subscription_3]"
                                                   value="{{$levels->where('rank', 2)->where('key', '=', 'affiliate_rate_subscription_3')->first()['value']}}"
                                                   id="affiliate_rate_subscription_3"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 4 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="prata[affiliate_rate_subscription_4]"
                                                   value="{{$levels->where('rank', 2)->where('key', '=', 'affiliate_rate_subscription_4')->first()['value']}}"
                                                   id="affiliate_rate_subscription_4"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel Comissionamento Nível de Afiliados -->
        <div class="panel">
            <div class="panel-body">
                <div class="panel-title"><b>Nível Ouro:</b></div>

                <div class="row" align="center">
                    <div class="col-md-6">
                        <div class="example-box-wrapper">
                            <div class="form-horizontal bordered-row">
                                <b>Comissionamento Padrão:</b>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">User ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="ouro[user]"
                                                   value="{{ $levels->where('rank', 3)->where('key', '=', 'user')->first()['value'] }}"
                                                   id="affiliate_rate_commission_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 1 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="ouro[affiliate_rate_commission_1]"
                                                   value="{{$levels->where('rank', 3)->where('key', '=', 'affiliate_rate_commission_1')->first()['value']}}"
                                                   id="affiliate_rate_commission_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 2 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="ouro[affiliate_rate_commission_2]"
                                                   value="{{$levels->where('rank', 3)->where('key', '=', 'affiliate_rate_commission_2')->first()['value']}}"
                                                   id="affiliate_rate_commission_2"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 3 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="ouro[affiliate_rate_commission_3]"
                                                   value="{{$levels->where('rank', 3)->where('key', '=', 'affiliate_rate_commission_3')->first()['value']}}"
                                                   id="affiliate_rate_commission_3"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 4 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="ouro[affiliate_rate_commission_4]"
                                                   value="{{$levels->where('rank', 3)->where('key', '=', 'affiliate_rate_commission_4')->first()['value']}}"
                                                   id="affiliate_rate_commission_4"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="example-box-wrapper">
                            <div class="form-horizontal bordered-row">
                                <b>Comissionamento de Assinatura Padrão:</b>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">User ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="ouro[user_subscription]"
                                                   value="{{ $levels->where('rank', 3)->where('key', '=', 'user_subscription')->first()['value'] }}"
                                                   id="affiliate_rate_commission_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 1 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="ouro[affiliate_rate_subscription_1]"
                                                   value="{{$levels->where('rank', 3)->where('key', '=', 'affiliate_rate_subscription_1')->first()['value']}}"
                                                   id="affiliate_rate_subscription_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 2 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="ouro[affiliate_rate_subscription_2]"
                                                   value="{{$levels->where('rank', 3)->where('key', '=', 'affiliate_rate_subscription_2')->first()['value']}}"
                                                   id="affiliate_rate_subscription_2"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 3 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="ouro[affiliate_rate_subscription_3]"
                                                   value="{{$levels->where('rank', 3)->where('key', '=', 'affiliate_rate_subscription_3')->first()['value']}}"
                                                   id="affiliate_rate_subscription_3"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 4 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="ouro[affiliate_rate_subscription_4]"
                                                   value="{{$levels->where('rank', 3)->where('key', '=', 'affiliate_rate_subscription_4')->first()['value']}}"
                                                   id="affiliate_rate_subscription_4"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel Comissionamento Nível de Afiliados -->
        <div class="panel">
            <div class="panel-body">
                <div class="panel-title"><b>Nível Platina:</b></div>

                <div class="row" align="center">
                    <div class="col-md-6">
                        <div class="example-box-wrapper">
                            <div class="form-horizontal bordered-row">
                                <b>Comissionamento Padrão:</b>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">User ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="platina[user]"
                                                   value="{{ $levels->where('rank', 4)->where('key', '=', 'user')->first()['value'] }}"
                                                   id="affiliate_rate_commission_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 1 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="platina[affiliate_rate_commission_1]"
                                                   value="{{$levels->where('rank', 4)->where('key', '=', 'affiliate_rate_commission_1')->first()['value']}}"
                                                   id="affiliate_rate_commission_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 2 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="platina[affiliate_rate_commission_2]"
                                                   value="{{$levels->where('rank', 4)->where('key', '=', 'affiliate_rate_commission_2')->first()['value']}}"
                                                   id="affiliate_rate_commission_2"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 3 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="platina[affiliate_rate_commission_3]"
                                                   value="{{$levels->where('rank', 4)->where('key', '=', 'affiliate_rate_commission_3')->first()['value']}}"
                                                   id="affiliate_rate_commission_3"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 4 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="platina[affiliate_rate_commission_4]"
                                                   value="{{$levels->where('rank', 4)->where('key', '=', 'affiliate_rate_commission_4')->first()['value']}}"                                                   id="affiliate_rate_commission_4"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="example-box-wrapper">
                            <div class="form-horizontal bordered-row">
                                <b>Comissionamento de Assinatura Padrão:</b>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Padrão ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="platina[user_subscription]"
                                                   value="{{ $levels->where('rank', 4)->where('key', '=', 'user_subscription')->first()['value'] }}"
                                                   id="affiliate_rate_commission_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 1 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="platina[affiliate_rate_subscription_1]"
                                                   value="{{$levels->where('rank', 4)->where('key', '=', 'affiliate_rate_subscription_1')->first()['value']}}"
                                                   id="affiliate_rate_subscription_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 2 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="platina[affiliate_rate_subscription_2]"
                                                   value="{{$levels->where('rank', 4)->where('key', '=', 'affiliate_rate_subscription_2')->first()['value']}}"
                                                   id="affiliate_rate_subscription_2"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 3 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="platina[affiliate_rate_subscription_3]"
                                                   value="{{$levels->where('rank', 4)->where('key', '=', 'affiliate_rate_subscription_3')->first()['value']}}"
                                                   id="affiliate_rate_subscription_3"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 4 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="platina[affiliate_rate_subscription_4]"
                                                   value="{{$levels->where('rank', 4)->where('key', '=', 'affiliate_rate_subscription_4')->first()['value']}}"
                                                   id="affiliate_rate_subscription_4"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel Comissionamento Nível de Afiliados -->
        <div class="panel">
            <div class="panel-body">
                <div class="panel-title"><b>Nível Diamante:</b></div>

                <div class="row" align="center">
                    <div class="col-md-6">
                        <div class="example-box-wrapper">
                            <div class="form-horizontal bordered-row">
                                <b>Comissionamento Padrão:</b>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">User ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="diamante[user]"
                                                   value="{{ $levels->where('rank', 5)->where('key', '=', 'user')->first()['value'] }}"
                                                   id="affiliate_rate_commission_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 1 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="diamante[affiliate_rate_commission_1]"
                                                   value="{{$levels->where('rank', 5)->where('key', '=', 'affiliate_rate_commission_1')->first()['value']}}"
                                                   id="affiliate_rate_commission_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 2 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="diamante[affiliate_rate_commission_2]"
                                                   value="{{$levels->where('rank', 5)->where('key', '=', 'affiliate_rate_commission_2')->first()['value']}}"
                                                   id="affiliate_rate_commission_2"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 3 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="diamante[affiliate_rate_commission_3]"
                                                   value="{{$levels->where('rank', 5)->where('key', '=', 'affiliate_rate_commission_3')->first()['value']}}"
                                                   id="affiliate_rate_commission_3"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 4 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="diamante[affiliate_rate_commission_4]"
                                                   value="{{$levels->where('rank', 5)->where('key', '=', 'affiliate_rate_commission_4')->first()['value']}}"
                                                   id="affiliate_rate_commission_4"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="example-box-wrapper">
                            <div class="form-horizontal bordered-row">
                                <b>Comissionamento de Assinatura Padrão:</b>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">User ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="diamante[user_subscription]"
                                                   value="{{ $levels->where('rank', 5)->where('key', '=', 'user_subscription')->first()['value'] }}"
                                                   id="affiliate_rate_commission_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 1 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="diamante[affiliate_rate_subscription_1]"
                                                   value="{{$levels->where('rank', 5)->where('key', '=', 'affiliate_rate_subscription_1')->first()['value']}}"
                                                   id="affiliate_rate_subscription_1"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 2 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="diamante[affiliate_rate_subscription_2]"
                                                   value="{{$levels->where('rank', 5)->where('key', '=', 'affiliate_rate_subscription_2')->first()['value']}}"
                                                   id="affiliate_rate_subscription_2"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 3 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="diamante[affiliate_rate_subscription_3]"
                                                   value="{{$levels->where('rank', 5)->where('key', '=', 'affiliate_rate_subscription_3')->first()['value']}}"
                                                   id="affiliate_rate_subscription_3"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Valor Nível 4 ?</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="diamante[affiliate_rate_subscription_4]"
                                                   value="{{$levels->where('rank', 5)->where('key', '=', 'affiliate_rate_subscription_4')->first()['value']}}"
                                                   id="affiliate_rate_subscription_4"
                                                   maxlength="4" class="form-control">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="rate-commission" name="method">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-black float-right" id="confirm-rate" ><i class="glyph-icon icon-save"></i> Salvar Alterações
        </button>
    </form>



@endsection

@section('extra-scripts')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#subscription-form').submit(function () {
                var key = $("#env").val();
                var value = $("#min_withdraw_npcoins_total").val();
                var method = 'npcoin';
                jQuery.ajax({
                    type: "POST",
                    url: '{{ route('affiliates.configs-update') }}',
                    data: {key: key, value: value, method: method},
                    success: function (data) {
                        $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-success"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-green alert-icon"><i class="glyph-icon icon-check"></i></div><div class="alert-content"><h4 class="alert-title">Pronto!</h4><p><b>Sua Solicitição foi atendida com sucesso.</b></p></div></div></div></div></div></div></div></div></div></div>');
                        setTimeout('location.reload();', 1800);
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
            var min = $('#min_withdraw_npcoins').val();
            var env = 'min_withdraw_npcoins';
            document.getElementById('min_withdraw_npcoins_total').value = min;
            document.getElementById('env').value = env
            console.log(env)
            document.getElementById("discount_item").style.display = "block";
        });
    </script>

@endsection