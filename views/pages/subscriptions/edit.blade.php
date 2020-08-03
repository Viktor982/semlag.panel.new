@extends('layout.default')
@section('content')
    <div class="panel">
        <div class="panel-body">
            {!! aroute('<i class="glyph-icon icon-remove"></i> Cancelar Assinatura</a>', 'subscriptions.cancel', ['id' => $subscription->id], ['class' => 'btn btn-sm btn-warning'])!!}
            <div class="divider"></div>
            <div class="row">
                <div class="col-md-4">
                    <h2 class="invoice-client ">Assinatura #{{ $subscription->id }}:</h2>
                </div>
            </div>
            <br>
            <h3>
                Pagamentos:
            </h3>

            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuário</th>
                        <th>Plano</th>
                        <th>Valor</th>
                        <th>Data de Vigência</th>
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
                        <th>Data de Vigência</th>
                        <th>Método de Pagamento</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($subscription->sales as $sale)
                        <tr>
                            <td>{{ $sale->id }}</td>
                            <td>{{ $sale->customer->usuario }}</td>
                            <td>{{ plan($sale->plano_id) }}</td>
                            <td><b>{{ currency($sale->currency_id) }}:</b> {{ $sale->valor }}</td>
                            <td>{{ brDate($sale->data_vigencia) }}</td>
                            <td>{{ gateway($sale->metodo) }}</td>
                            <td>{{ sale_status($sale->status) }}</td>
                            <td>
                                <a href="{{ route('sales.edit', ['id' => $sale->id]) }}" class="btn btn-black"><span
                                            class="glyph-icon icon-eye"></span> Ver</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <hr>

                <h3>Solicitações de cancelamento:</h3>

                <table id="datatable-cancels"
                       class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Sucesso?</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscription->cancelRequests as $cancelRequest)
                            <tr>
                                <td>{{ brDate($cancelRequest->created_at) }}</td>
                                <td style="background-color: {{($_su = $cancelRequest->success ? '#D7F6D5' : '#FFE9E9')}};">{{ ($cancelRequest->success ? 'SIM' : 'NÃO')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="col-lg-12">
                    <div class="form-group">
                        <h3>Anotações:</h3>
                        @foreach($subscription->quotes as $quote)
                            <br>
                            <span class="alert bg-black">
                            <b>({{ brDate($quote->created_at) }}) {{ $quote->user->username }}
                                : </b>{{ $quote->message }}
                         </span><p>
                        @endforeach
                    </div>

                    <form method="POST" action="{{ route('subscriptions.quotes', ['id' => $subscription->id]) }}">
                        <h5>Insira uma mensagem:</h5>
                        <div class="form-group">
                            <textarea class="form-control" name="message"></textarea>
                            <button class="btn btn-azure" type="submit">Inserir nota</button>
                        </div>
                    </form>
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
            $('#datatable-cancels').DataTable({
                responsive: true,
                searching: false,
                paging: false
            });
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });

    </script>
@endsection