@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Editando cupom de desconto - {{ $discount->name}}</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <form class="form-horizontal bordered-row" method="post"
                  action="{{ route("discount.update", ['id' => $discount->id]) }}">
                <fieldset>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="name">Nome:</label>
                        <div class="col-md-4">
                            <input id="name" name="name" type="text" value="{{ $discount->name }}"
                                   class="form-control input-md" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="plans_affected">Planos Afetados:</label>
                        <div class="col-md-4">
                            <select id="plans_affected" name="plans_affected[]" class="form-control"
                                    multiple="multiple">
                                @foreach($plans as $plan)
                                    <option value="{{ $plan->id }}" {{ (in_array($plan->id, $affected_plans)) ? 'selected':'' }}>{{ $plan->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="percentage">Porcentagem de desconto:</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input id="percentage" name="percentage" class="form-control"
                                       value="{{ $discount->percentage }}" type="number" required="">
                                <span class="input-group-addon">%</span>
                            </div>
                            <p class="help-block">Porcetagem de desconto que o cupom vai oferecer quando ativado pelo
                                usuário</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="expire_date">Expiração:</label>
                        <div class="col-md-4">
                            <input type="text" class="bootstrap-datepicker form-control"
                                   value="{{ $discount->expire_date }}" name="expire_date">
                            <p class="help-block">Data em que o cupom de desconto será deletado</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="code">Código:</label>
                        <div class="col-md-4">
                            <input id="code" name="code" type="text" value="{{ $discount->code }}"
                                   class="form-control input-md" required="">
                            <p class="help-block">Código que o usuário deverá inserir para ativar o desconto</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="submit"></label>
                        <div class="col-md-4">
                            <button id="submit" name="submit" class="btn btn-success">Enviar</button>
                            <a href="{{ route('discount.all') }}" class="btn btn-danger">Voltar</a>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>

@endsection
@section('extra-scripts')
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