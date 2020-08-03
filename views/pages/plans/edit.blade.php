@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Editar Plano</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
            </h3>

            <div class="example-box-wrapper">

                <form class="form-horizontal bordered-row" action="{{ route('plans.update', ['id' => $plan->id]) }}"
                      method="post">

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="nome">Nome</label>
                        <div class="col-md-4">
                            <input id="nome" name="nome" type="text" value="{{ $plan->nome }}"
                                   class="form-control input-md" required="">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label" for="price_real">Preço em Reais (BRL)</label>
                        <div class="col-md-4">
                            <input id="preco_1" name="value[1]" value="{{ $plan->planValues[0]->value }}" type="text"
                                   class="form-control input-md">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="price_usd">Preço em Dolares (USD)</label>
                        <div class="col-md-4">
                            <input id="preco_2" name="value[2]" value="{{ $plan->planValues[1]->value }}" type="text"
                                   class="form-control input-md">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="price_npcoins">Preço em NPCoins</label>
                        <div class="col-md-4">
                            <input id="npcoin" name="npcoin" type="number" value="{{ $plan->npCoins->price }}"
                                   class="form-control input-md">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="frequency">Frequencia e periodo</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input id="frequency" name="frequency" value="{{ $plan->frequency }}"
                                       class="form-control" type="number">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label" for="special">Premium:</label>
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label for="special-0">
                                    <input type="checkbox" name="special" id="special-0"
                                           {{ ($plan->special) ? 'checked':null }} value="1">
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="special">Plano Default?</label>
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label for="special-0">
                                    <input type="checkbox" name="default" id="default"
                                           {{ ($plan->default) ? 'checked':null }} value="1">
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label" for="type_subscription">Ativo?</label>
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label for="special-0">
                                    <input id="type_subscription" type="checkbox" name="active"
                                           {{ ($plan->status) ? 'checked':null }} value="1">
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4">
                            <button class="btn btn-black" type="submit"> Enviar</button>
                        </div>
                    </div>

                </form>
            </div>
@endsection

