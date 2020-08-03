@extends('layout.default')
@section('content')

    <h3>
        Detalhes do Afiliado - {{ $affiliate->nome }}:
    </h3>

    <div class="row">
        <div class="col-md-4">
            <h2 class="invoice-client mrg10T">Informações do Afiliado:</h2>
            <h5>{{ $affiliate->nome }}</h5>
            <b>Telefone: {{ $affiliate->telefone }}</b><br>
            <b>CPF: {{ $affiliate->affiliateInfo->cpf }}</b><br>
            <b>Porcentagem de Ganho: {{ $affiliate->affiliated_percentage }}%</b>
        </div>
        <div class="col-md-4">
            <h2 class="invoice-client mrg10T">Informações Bancárias :</h2>
            <ul class="reset-ul">
                <li><b>Banco:</b> <span class="bs-label label-black">{{ $affiliate->affiliateInfo->banco }}</span></li>
                <li><b>Agência:</b> <span class="bs-label label-black">{{ $affiliate->affiliateInfo->agencia }}</span>
                </li>
                <li><b>Conta:</b> <span class="bs-label label-black">{{ $affiliate->affiliateInfo->conta }}</span></li>

            </ul>
        </div>
        <div class="col-md-4">
            <h2 class="invoice-client mrg10T">Contas Digitais:</h2>
            <ul class="reset-ul">
                <li><b>PayPal:</b> <span
                            class="bs-label label-black">{{ $affiliate->affiliateInfo->conta_paypal }}</span></li>
                <li><b>Pagseguro:</b> <span
                            class="bs-label label-black">{{ $affiliate->affiliateInfo->conta_pagseguro }}</span></li>
            </ul>
        </div>
    </div>

    <h3>
        Pedidos de Saque:
    </h3>

    <div class="example-box-wrapper">
        <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Valor Do Saque</th>
                <th>Data de Criação</th>
                <th>Método de Troca:</th>
                <th>Status</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>#</th>
                <th>Valor Do Saque</th>
                <th>Data de Criação</th>
                <th>Método de Troca:</th>
                <th>Status</th>
            </tr>
            </tfoot>

            <tbody>
            @foreach($affiliate->withdrawals as $withdrawal)
                <tr>
                    <td>{{ $withdrawal->id }}</td>
                    <td>{{ withdraw_request_currency( $withdrawal->type ) }} {{  convert_npcoins( $withdrawal->type, $withdrawal->value ) }}</td>
                    <td>{{ brDate($withdrawal->created_at) }}</td>
                    <td>Saque ({{ withdraw_request_currency( $withdrawal->type ) }})</td>
                    <td>{{ withdraw_request_status( $withdrawal->status_code ) }}</td>
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
                @foreach($affiliate->affiliateSales as $sales)
                    <tr>
                        <td>{{ $sales->id }}</td>
                        <td><b>{{ currency($sales->currency_id) }}:</b> {{ $sales->valor }}</td>
                        <td>{{ brDate($sales->data_vigencia) }}    </td>
                        <td> {{ gateway($sales->metodo) }}</td>
                        <td>{{ sale_status($sales->status) }}</td>
                        <td>
                            {!! aroute('<i class="glyph-icon icon-eye"></i> Visualizar Venda</a>', 'sales.edit', ['id' => $sales->id], ['class' => 'btn btn-sm btn-black'])!!}

                        </td>
                    </tr>
                @endforeach
                </tbody>
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
                    $('#datatable-responsive2').DataTable({
                        responsive: true
                    });
                });

                $(document).ready(function () {
                    $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
                });

            </script>
@endsection