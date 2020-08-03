@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Cupons</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
            </h3>

            <div class="example-box-wrapper">
                <form class="form-horizontal bordered-row" action="{{ route('coupons.generated-coupons') }}"
                      method="POST">
                    <div class="form-group">
                        <label for="plan" class="col-sm-3 control-label">Plano</label>
                        <div class="col-sm-6">
                            <select id="plan" name="plan" class="form-control" required>
                                @foreach ($plans as $plan)
                                    <option value="{{ $plan->id }}">{{ $plan->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Quantidade</label>
                        <div class="col-sm-6">
                            <input type="number" id="amount" name="amount" class="form-control" value="1" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Motivo:</label>
                        <div class="col-sm-6">
                            <input type="text" id="reason" name="reason" class="form-control" maxlength="250" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Destino:</label>
                        <div class="col-sm-6">
                            <input type="text" id="destiny" name="destiny" class="form-control" maxlength="100" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Vincular Cliente?</label>
                        <div class="col-sm-6">
                            <div class="col-md-6">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <input class="custom-checkbox" name="link_customer" id="link_customer"
                                                   type="checkbox" value="1">
                                            </span>
                                    <input type="text" name="customer" id="customer" class="form-control" disabled>
                                </div>
                            </div>
                            Marque essa opção caso queira vincular algum cliente aos cupons.
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-success">
                            <i class="glyph-icon icon-plus"></i> Gerar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')

    <script type="text/javascript">
        $(function () {
            var cCustomer = function () {
                if ($("#link_customer").is(':checked')) {
                    $("#customer").prop("disabled", false);
                } else {
                    $("#customer").val("");
                    $("#customer").prop("disabled", true);
                }
            };
            $("#link_customer").change(cCustomer);
            cCustomer();
        });
    </script>
@endsection