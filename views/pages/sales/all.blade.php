@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Vendas</h2>
    </div>

    <!-- Modal -->
    <div class="panel">
        <div class="panel-body">
            <div class="form-horizontal bordered-row">
                <form class="form-group" action="{{ route('sales.search') }}" method="post">
                    <label class="col-md-2 control-label">Filtro</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="method" name="method">
                            <option value="customer" @if($method == null || $method == 'customer' ) selected @endif>Cliente</option>
                            <option value="date" @if( $method == 'date' ) selected @endif>Entre Datas</option>
                            <option value="id" @if($method == 'id') selected @endif>ID da Venda</option>
                            <option value="gateway" @if($method == 'gateway') selected @endif>Método de Pagamento</option>
                            <option value="plan" @if($method == 'plan') selected @endif>Plano</option>
                            <option value="status" @if($method == 'status') selected @endif>Status</option>
                            <option value="track-code" @if($method == 'track-code' ) selected @endif>Track Code</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" class="form-control" id="value_text" name="value" @if($method == 'status' || $method == 'date' || $method == 'plan' || $method == 'gateway') style="display: none;" @endif >
                            <select class="form-control" id="value_select"
                                    @if($method == 'status') style="display: block;" @else style="display: none;" @endif >
                                <option value="0">Nulo</option>
                                <option value="1">Em espera</option>
                                <option value="2">Aprovado</option>
                                <option value="3">Devolvido</option>
                                <option value="4">Cancelado</option>
                            </select>

                            <select class="form-control" id="gateway_select"  @if($method == 'gateway') style="display: block;" @else style="display: none;" @endif>
                                @foreach($gateways as $gateway)
                                    <option value="{{ $gateway->db_id }}">{{ $gateway->name }}</option>
                                @endforeach
                            </select>

                            <select class="form-control" id="plans_select"  @if($method == 'plan') style="display: block;" @else style="display: none;" @endif>
                                @foreach($plans as $plan)
                                    <option value="{{ $plan->id }}">{{ $plan->nome }}</option>
                                @endforeach
                            </select>

                            <div id="value_date" @if($method == 'date') style="display: block;" @else style="display: none;" @endif >
                                <label for="" class="col-sm-3 control-label">Escolha:</label>
                                <div class="col-sm-8">
                                    <div class="clearfix row">
                                        <div class="col-sm-6">
                                            <input type="text" name="from_date" id="fromDate" placeholder=""
                                                   class="float-left mrg10R form-control">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="to_date" id="toDate" placeholder=""
                                                   class="float-left form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-info" id="filter" title="Pesquisar">
                                    <i class="glyph-icon icon-search" ></i>
                                </button>
                            </span>
                        </div>
                        <div id="show-filter" style="display: show">
                            <input type="checkbox" value="1" id="filter-date" class="custom-checkbox">Filtrar Entre
                            Datas?
                        </div>

                    </div>
                </form>
            </div>

            <h3 class="title-hero"></h3>
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuário</th>
                        <th>Plano</th>
                        <th>Valor</th>
                        <th>Data Vigencia</th>
                        <th>Método de Pagamento</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Usuário</th>
                        <th>Plano</th>
                        <th>Valor</th>
                        <th>Data Vigencia</th>
                        <th>Método de Pagamento</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ $sale->id }}</td>
                            <td>{!! aroute($sale->customer->usuario, 'customers.edit', ['id'  => $sale->customer->id]) !!}</td>
                            <td>{{ plan($sale->plano_id) }}</td>
                            <td><b>{{ currency($sale->currency_id) }}:</b> {{ $sale->valor }}</td>
                            <td>{{ brDate($sale->data_vigencia) }}    </td>
                            <td>
                                {{ gateway($sale->metodo) }}
                                {!! (empty($sale->assinatura_id)) ? "":"<a href=\"".route('subscriptions.edit', ['id' => $sale->assinatura_id])."\"><b>(Recorrente {$sale->recurringIndex}º venda)</b></a>" !!}
                                {{  (empty($sale->vezes)) ? "":"(Cupom)"}}
                            </td>
                            <td>{{ sale_status($sale->status) }}</td>
                            <td>
                                {!! aroute('<i class="glyph-icon icon-envelope-o"></i></a>', 'customers.send-email', ['id' => $sale->customer->id], ['class' => 'btn btn-sm btn-azure'])!!}
                                {!! aroute('<i class="glyph-icon icon-eye"></i> ver</a>', 'sales.edit', ['id' => $sale->id], ['class' => 'btn btn-sm btn-black'])!!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    {{ $sales->render() }}

@endsection
@section('extra-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paging: false,
                filter: false,
                order:[]
            });
        });

        jQuery(document).ready(function () {
            jQuery('#method').change(function () {
                if (jQuery(this).val() == 'status') {
                    jQuery("#value_text").hide();
                    jQuery("#value_select").show();
                    jQuery("#show-filter").show();
                    jQuery("#plans_select").hide();
                    jQuery("#gateway_select").hide();
                    jQuery("#value_date").hide();
                    jQuery("#value_text").val(jQuery("#value_select").val());
                } else if (jQuery(this).val() == 'date') {
                    jQuery("#value_text").hide();
                    jQuery("#value_select").hide();
                    jQuery("#gateway_select").hide();
                    jQuery("#plans_select").hide();
                    jQuery("#show-filter").hide();
                    jQuery("#value_date").show();
                    jQuery("#value_text").val(jQuery("#value_select").val());
                } else if (jQuery(this).val() == 'gateway') {
                    jQuery("#value_text").hide();
                    jQuery("#gateway_select").show();
                    jQuery("#plans_select").hide();
                    jQuery("#value_select").hide();
                    jQuery("#value_date").hide();
                    jQuery("#show-filter").show();
                    jQuery("#value_text").val(jQuery("#gateway_select").val());
                } else if (jQuery(this).val() == 'plan') {
                    jQuery("#value_text").hide();
                    jQuery("#plans_select").show();
                    jQuery("#value_select").hide();
                    jQuery("#gateway_select").hide();
                    jQuery("#value_date").hide();
                    jQuery("#show-filter").show();
                    jQuery("#value_text").val(jQuery("#plans_select").val());
                }else if (jQuery(this).val() == 'id') {
                    jQuery("#show-filter").hide();
                    jQuery("#value_select").hide();
                    jQuery("#gateway_select").hide();
                    jQuery("#value_date").hide();
                    jQuery("#plans_select").hide();
                    jQuery("#value_text").show();
                    jQuery("#value_text").val("");
                } else if (jQuery(this).val() == 'track-code') {
                    jQuery("#show-filter").hide();
                    jQuery("#value_select").hide();
                    jQuery("#gateway_select").hide();
                    jQuery("#value_date").hide();
                    jQuery("#plans_select").hide();
                    jQuery("#value_text").show();
                    jQuery("#value_text").val("");
                } else {
                    jQuery("#value_select").hide();
                    jQuery("#gateway_select").hide();
                    jQuery("#value_date").hide();
                    jQuery("#plans_select").hide();
                    jQuery("#show-filter").show();
                    jQuery("#value_text").show();
                    jQuery("#value_text").val("");
                }
            });

            $('#filter-date').click(function () {
                $('#value_date').toggle();
            });
            jQuery('#value_select').change(function () {
                jQuery("#value_text").val(jQuery("#value_select").val());
            });

            jQuery('#gateway_select').change(function () {
                jQuery("#value_text").val(jQuery("#gateway_select").val());
            });

            jQuery('#plans_select').change(function () {
                jQuery("#value_text").val(jQuery("#plans_select").val());
            });

        });
    </script>
@endsection