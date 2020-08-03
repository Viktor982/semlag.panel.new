@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Detalhes do Revendedor</h2>

    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                Detalhes do Revendedor: {{ $reseller->nome }}
            </h3>

            <table style="width: 100%" border="1">
                <tr>
                    <th colspan="2" style="background: #CACACA!important;padding: 10px;text-align: center;">
                        Estatísticas Gerais
                    </th>
                </tr>
                <tr>
                    <th>Cupons Livres:</th>
                    <td>
                        <b>{{ $reseller->resellerCoupons->where('disabled', null)->where('isReseller', 1)->count() }} </b>
                    </td>
                </tr>
                <tr>
                    <th>Cupons Utilizados:</th>
                    <td><b>{{ $reseller->resellerCoupons->where('isReseller',1)->where('disabled', true)->count() }}</b>
                    </td>
                </tr>
            </table>


            <p></p><br>

            <h3>
                Cupons:
            </h3>
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Código</th>
                        <th>Plano</th>
                        <th>Criado em:</th>
                        <th>Status</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Código</th>
                        <th>Plano</th>
                        <th>Criado em:</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($reseller->resellerCoupons->where('isReseller',1) as $coupons)
                        <tr>
                            <td>{{ $coupons->id }}</td>
                            <td>{{ coupon($coupons->cupom) }}</td>
                            <td>{{ plan($coupons->plano_id) }}</td>
                            <td>{{ brDate($coupons->data_cadastro) }}</td>
                            <td>
                                {{ $coupons->disabled ? 'Desabilitado' : 'Habilitado' }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <p></p><br>

                <h3>
                    Vendas:
                </h3>
                <div class="example-box-wrapper">
                    <table id="datatable-responsive2" class="table table-striped table-bordered responsive no-wrap"
                           cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Valor:</th>
                            <th>Data Vigência:</th>
                            <th>Método de Pagamento:</th>
                            <th>Status:</th>
                            <th>Opções:</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Valor:</th>
                            <th>Data Vigência:</th>
                            <th>Método de Pagamento:</th>
                            <th>Status:</th>
                            <th>Opções:</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        @foreach($reseller->sales->where('isReseller',1) as $sales)
                            <tr>
                                <td>{{ $sales->id }}</td>
                                <td>{{ $sales->valor }}</td>
                                <td>{{ brDate($sales->data_vigencia) }}</td>
                                <td>{{ gateway($sales->metodo) }}</td>
                                <td>{{ sale_status($sales->status) }}</td>
                                <td><a class="btn btn-sm btn-black"
                                       href="{{ route('sales.edit', ['id' => $sales->id]) }}"><i
                                                class="glyph-icon icon-eye"></i> Visualizar Venda</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('extra-scripts')
    <script type="text/javascript">

        /* Datatables responsive */

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true
            });
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });

        $(document).ready(function () {
            $('#datatable-responsive2').DataTable({
                responsive: true
            });
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });

    </script>
@endsection