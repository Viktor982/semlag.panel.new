@extends('layout.default')
@inject('mercadopago', 'NPDashboard\Payments\Gateways\Mercadopago')
@inject('paypal', 'NPDashboard\Payments\Gateways\Paypal')
@inject('pagseguro', 'NPDashboard\Payments\Gateways\Pagseguro')
@inject('pagarme', 'NPDashboard\Payments\Gateways\Pagarme')
@inject('stripe', 'NPDashboard\Payments\Gateways\Stripe')
@inject('_sales', 'NPDashboard\ViewHelpers\SalesViewHelper')
@inject('_subscriptions', 'NPDashboard\ViewHelpers\SubscriptionsViewHelper')
@inject('_testimonials', 'NPDashboard\ViewHelpers\TestimonialsViewHelper')
@inject('_emails', 'NPDashboard\ViewHelpers\EmailsViewHelper')
@inject('_customers', 'NPDashboard\ViewHelpers\CustomersViewHelper')
@section('content')
    <div id="page-title">
        <h2>Home</h2>
        <p></p>
        @prod
        @role('administrative')
        <div class="pull-right">
            <button class="btn btn-success" id="showGateways">$</button>
        </div>
        <br class="clearfix">
        @endrole
        @endprod
    </div>

    <section class="content">
        <!-- Gateway Payments -->
        @prod
        @role('administrative')
        <div class="row" id="gatewaysRow" style="display: none;">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <div class="panel-layout">
                        <div class="panel-box">
                            <div class="panel-content bg-blue">
                                <i class="glyph-icon font-size-50 icon-pf-paypal"></i>
                            </div>
                            <div class="panel-content pad15A bg-gray">
                                <div class="center-vertical">
                                    <ul class="center-content list-group list-group-separator row mrg0A">
                                        <li class="col-md-6">
                                            <p class="font-green"><b>{{ $paypal->getBalance() }}</b></p>
                                            <p class="font-green"><b>Liberado</b></p>
                                        </li>
                                        <li class="col-md-6">
                                            <p class="font-red"><b>{{ $paypal->getBlockedBalance() }}</b></p>
                                            <p class="font-red"><b>Bloqueado</b></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-xs-6">
                    <div class="panel-layout">
                        <div class="panel-box">
                            <div class="panel-content bg-green">
                                <i class="glyph-icon font-size-50 icon-pf-pagseguro"></i>
                            </div>
                            <div class="panel-content pad15A bg-gray">
                                <div class="center-vertical">
                                    <ul class="center-content list-group list-group-separator row mrg0A">
                                        <li class="col-md-6">
                                            <p class="font-green"><b>{{ $pagseguro->getBalance() }}</b></p>
                                            <p class="font-green"><b>Liberado</b></p>
                                        </li>
                                        <li class="col-md-6">
                                            <p class="font-red"><b>{{ $pagseguro->getBlockedBalance() }}</b></p>
                                            <p class="font-red"><b>Bloqueado</b></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="panel-layout">
                        <div class="panel-box">
                            <div class="panel-content bg-blue-alt">
                                <i class="glyph-icon font-size-50 icon-pf-mercado-pago"></i>
                            </div>
                            <div class="panel-content pad15A bg-gray">
                                <div class="center-vertical">
                                    <ul class="center-content list-group list-group-separator row mrg0A">
                                        <li class="col-md-6">
                                            <p class="font-green"><b>{{ $mercadopago->getBalance() }}</b></p>
                                            <p class="font-green"><b>Liberado</b></p>
                                        </li>
                                        <li class="col-md-6">
                                            <p class="font-red"><b>{{ $mercadopago->getBlockedBalance() }}</b></p>
                                            <p class="font-red"><b>Bloqueado</b></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="panel-layout">
                        <div class="panel-box">
                            <div class="panel-content bg-blue-alt">
                                {{--<i class="glyph-icon font-size-50 icon-pf-mercado-pago"></i>--}}
                                PagarMe
                            </div>
                            <div class="panel-content pad15A bg-gray">
                                <div class="center-vertical">
                                    <ul class="center-content list-group list-group-separator row mrg0A">
                                        <li class="col-md-6">
                                            <p class="font-green"><b>{{ $pagarme->getBalance() }}</b></p>
                                            <p class="font-green"><b>Liberado</b></p>
                                        </li>
                                        <li class="col-md-6">
                                            <p class="font-red"><b>{{ $pagarme->getBlockedBalance() }}</b></p>
                                            <p class="font-red"><b>Bloqueado</b></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <div class="panel-layout">
                        <div class="panel-box">
                            <div class="panel-content bg-blue-alt">
                                <i class="glyph-icon font-size-50 icon-pf-stripe"></i>
                            </div>
                            <div class="panel-content pad15A bg-gray">
                                <div class="center-vertical">
                                    <ul class="center-content list-group list-group-separator row mrg0A">
                                        <li class="col-md-6">
                                            <p class="font-green"><b>{{ $stripe->getBalance() }}</b></p>
                                            <p class="font-green"><b>Liberado</b></p>
                                        </li>
                                        <li class="col-md-6">
                                            <p class="font-red"><b>{{ $stripe->getBlockedBalance() }}</b></p>
                                            <p class="font-red"><b>Bloqueado</b></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endrole
    @endprod
    <!-- Gateway Payments -->
    </section>

    <section class="content">
        <!-- Gateway Payments -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="panel-layout">
                    <div class="panel-box">
                        <div class="panel-content bg-green">
                            <i class="glyph-icon font-size-35 icon-envelope-o"> Emails</i>
                        </div>
                        <div class="panel-content pad15A bg-gray">
                            <div class="center-vertical">
                                <ul class="center-content list-group list-group-separator row mrg0A">
                                    <li class="col-md-6">
                                        <b>{{ $_emails->today() }}</b>
                                        <p class="font-gray-dark"><b>Enviados Hoje</b></p>
                                    </li>
                                    <li class="col-md-6">
                                        <b>{{ $_emails->lastMonth() }}</b>
                                        <p class="font-gray-dark"><b>Enviados 30 Dias</b></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="panel-layout">
                    <div class="panel-box">
                        <div class="panel-content bg-twitter">
                            <i class="glyph-icon font-size-35 icon-money"> Vendas</i>
                        </div>
                        <div class="panel-content pad15A bg-gray">
                            <div class="center-vertical">
                                <ul class="center-content list-group list-group-separator row mrg0A">
                                    <li class="col-md-6">
                                        <b>{{ $_sales->todaySales(true) }}</b>
                                        <p class="font-gray-dark"><b>Aprovadas</b></p>
                                    </li>
                                    <li class="col-md-6">
                                        <b>{{ $_sales->todaySales(false) }}</b>
                                        <p class="font-gray-dark"><b>Não aprovadas</b></p>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-xs-6">

                <div class="panel-layout">
                    <div class="panel-box">

                        <div class="panel-content bg-green">

                            <i class="glyph-icon font-size-35 icon-users"> Assinaturas</i>

                        </div>
                        <div class="panel-content pad15A bg-gray">
                            <div class="center-vertical">

                                <ul class="center-content list-group list-group-separator row mrg0A">
                                    <li class="col-md-6">
                                        <b>{{ $_subscriptions->today(false) }}</b>
                                        <p class="font-gray-dark"><b>Realizadas Hoje</b></p>
                                    </li>
                                    <li class="col-md-6">
                                        <b>{{ $_subscriptions->today(true) }}</b>
                                        <p class="font-gray-dark"><b>Aprovadas Hoje</b></p>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-xs-6">

                <div class="panel-layout">
                    <div class="panel-box">

                        <div class="panel-content bg-twitter">

                            <i class="glyph-icon font-size-35 icon-check-square-o">Depoimentos</i>

                        </div>
                        <div class="panel-content pad15A bg-gray">
                            <div class="center-vertical">

                                <ul class="center-content list-group list-group-separator row mrg0A">
                                    <li class="col-md-6">
                                        <b>{{ $_testimonials->todayTestimonials() }}</b>
                                        <p class="font-gray-dark"><b>Realizados Hoje</b></p>
                                    </li>
                                    <li class="col-md-6">
                                        <b>{{ $_testimonials->pendingTestimonials() }}</b>
                                        <p class="font-gray-dark"><b>Pendentes</b></p>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-xs-6">

                <div class="panel-layout">
                    <div class="panel-box">

                        <div class="panel-content bg-green">

                            <i class="glyph-icon font-size-35 icon-key"> Registros</i>

                        </div>
                        <div class="panel-content pad15A bg-white">
                            <div class="center-vertical">

                                <ul class="center-content list-group list-group-separator row mrg0A">
                                    <li class="col-md-12">
                                        <b>{{ $_customers->todayRegistrationsCount() }}</b>
                                        <p class="font-gray-dark"><b>Realizados Hoje</b></p>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="panel-layout">
                    <div class="panel-box">
                        <div class="panel-content bg-green">
                            <i class="glyph-icon font-size-35 icon-line-chart"> Cotação</i>
                        </div>
                        <div class="panel-content pad15A bg-white">
                            <div class="center-vertical">
                                <ul class="center-content list-group list-group-separator row mrg0A">
                                    <p><b><i style="color:red" class="glyph-icon icon-chevron-up"></i> <span
                                                    id="dolar">{{ round($quotationData->high, 2) }}</span> - High(USD)</b></p>
                                    <p>
                                        <b><i style="color:green" class="glyph-icon icon-chevron-down"></i> <span
                                                    id="real">{{ round($quotationData->low, 2) }}</span> - Low(USD)</b></p>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('extra-scripts')
    <script>
        document.getElementById('showGateways')
            .addEventListener('click', function () {
                var row = document.getElementById('gatewaysRow');
                row.style.display = (row.style.display == 'none') ? 'block' : 'none';
            });
    </script>
@endsection