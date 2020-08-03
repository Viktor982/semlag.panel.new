@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Revendedores</h2>
        <p>Lista de Revendedores.</p>

    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
            </h3>

            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nº de Cupons</th>
                        <th>Nº de Compras</th>
                        <th>Opções</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nº de Cupons</th>
                        <th>Nº de Compras</th>
                        <th>Opções</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($resellers as $reseller)
                        <tr>
                            <td>{{ $reseller->id }}</td>
                            <td>{{ $reseller->nome }} </td>
                            <td>{{ $reseller->usuario }}</td>
                            <td>{{ $reseller->resellerCoupons->where('disabled', null)->where('isReseller', 1)->count() }} </td>
                            <td>{{ $reseller->sales->where('isReseller',1)->count() }}</td>
                            <td>
                                {!! aroute('<i class="glyph-icon icon-envelope-o"></i></a>', 'customers.send-email', ['id' => $reseller->id], ['class' => 'btn btn-sm btn-azure'])!!}
                                {!! aroute('<i class="glyph-icon icon-user"></i> Ver Perfil</a>', 'customers.edit', ['id' => $reseller->id], ['class' => 'btn btn-sm btn-black'])!!}
                                {!! aroute('<i class="glyph-icon icon-bar-chart-o"></i> Detalhes</a>', 'resellers.stats', ['id' => $reseller->id], ['class' => 'btn btn-sm btn-success'])!!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $resellers->render() }}

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

    </script>
@endsection