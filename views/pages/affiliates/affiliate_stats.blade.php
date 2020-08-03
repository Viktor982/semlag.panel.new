@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Relatório de Vendas</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">Vendas e Pageviews Por Afiliado
            </h3>
            <div class="example-box-wrapper">
                <form class="form-horizontal bordered-row" action="{{ route('affiliates.stats') }}" method="post">
                    <div id="value_date" class="form-group">
                        <label for="" class="col-sm-3 control-label">Pesquisar por Data:</label>
                        <div class="col-sm-8">
                            <div class="clearfix row">
                                <div class="col-sm-3">
                                    <input type="text" name="date_filter" id="fromDate" placeholder=""
                                           class="float-left mrg10R form-control">
                                </div>
                                <button class="btn btn-black"><i class="glyph-icon icon-search"></i> Pesquisar</button>
                            </div>
                        </div>
                    </div>
                </form>
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Afiliado:</th>
                        <th>Email:</th>
                        <th>Vendas Aprovadas:</th>
                        <th>Total de Visualizações:</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Afiliado</th>
                        <th>Email</th>
                        <th>Vendas Aprovadas</th>
                        <th>Total de Visualizações</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($result as $info)
                        <tr>
                            <td>{{ $info['name'] }}</td>
                            <td>{{ $info['user']}}</td>
                            <td>{{ $info['sales'] }}</td>
                            <td>{{ $info['access'] }}</td>
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

        /* Datatables responsive */

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paginate: false
            });
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });

    </script>
@endsection