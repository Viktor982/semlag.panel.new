@extends('layout.default')
@inject('_subscriptions', 'NPDashboard\ViewHelpers\SubscriptionsViewHelper')
@inject('_customers', 'NPDashboard\ViewHelpers\CustomersViewHelper')

@section('content')
    <div class="col-lg-3 col-xs-6">
        <div class="panel-layout">
            <div class="panel-box">

                <div class="panel-content bg-yellow">

                    <i class="glyph-icon font-size-35 icon-users">Usuarios vip</i>

                </div>
                <div class="panel-content pad15A bg-white">
                    <div class="center-vertical">

                        <ul class="center-content list-group list-group-separator row mrg0A">
                            <li class="col-md-12">
                                <b>{{ $userWithVipSales }}</b>
                                <p class="font-gray-dark"><b>Usuarios com dias</b></p>
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
                <div class="panel-content bg-red">
                    <i class="glyph-icon font-size-35">Usuarios trial</i>
                </div>
                 <div class="panel-content pad15A bg-white">
                    <div class="center-vertical">
                        <ul class="center-content list-group list-group-separator row mrg0A">
                            <li class="col-md-12">
                                <b>{{ $allOneDayTrialUsers }}</b>
                                <p class="font-gray-dark"><b>Usuarios com 1 dia</b></p>
                            </li>
                            <br>
                            <li class="col-md-12">
                                <b>{{ $allTrialUsers }}</b>
                                <p class="font-gray-dark"><b>Usuarios com 3 dias</b></p>
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

                <div class="panel-content bg-blue">

                    <i class="glyph-icon font-size-35 icon-money">Comprados</i>

                </div>
                <div class="panel-content pad15A bg-white">
                    <div class="center-vertical">

                        <ul class="center-content list-group list-group-separator row mrg0A">
                            <li class="col-md-12">
                                <b>{{ $bought }}</b>
                                <p class="font-gray-dark"><b>Comprados</b></p>
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

                    <i class="glyph-icon font-size-35">Todos os usuarios</i>

                </div>
                <div class="panel-content pad15A bg-white">
                    <div class="center-vertical">

                        <ul class="center-content list-group list-group-separator row mrg0A">
                            <li class="col-md-12">
                                <b>{{ $allUsers }}</b>
                                <p class="font-gray-dark"><b>já cadadastrados</b></p>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>
<br>

    
    <div class="panel">
        <br>
        <br>
    <div class="row">
        <div class="col-md-4">
            <p>
            </p>
        </div>
    </div>
        <div class="panel-body">
            <div class="example-box-wrapper">
                <div class="row">
                    <div class="col-md-4">
                        <p>
                            <h3><b>Busca por dias fantasmas</b></h3>
                        </p>
                    </div>
                </div>
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Plano</th>
                        <th>Dias Comprados</th>
                        <th>Dias do Usuário</th>
                        <th>Status</th>                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($invalidUserTime as $coupon)
                        <tr>
                            <td>{{$coupon->id}}</td>
                            <td>{{$coupon->nome}}</td>
                            <td>{{$coupon->usuario}}</td>
                            <td>{{$coupon->plan_days}}</td>
                            <td>{{$coupon->user_days}}</td>
                            <td>{{$coupon->ghost_day_confirmation}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
@section('extra-scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paging: true,
                "language": {
                    "paginate": {
                    "previous": "Anterior",
                    "next": "Proximo"
                    }
                },
                order: [[5, "asc"]]
            });
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });
    </script>
@endsection