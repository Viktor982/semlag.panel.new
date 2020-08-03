@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Estatísticas - Trials</h2>
    </div>

    <div class="example-box-wrapper">
        <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0"
               width="50%">
            <thead>
            <tr>
                <th>IP</th>
                <th>Ultima Atualização</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>IP</th>
                <th>Ultima Atualização</th>
            </tr>
            </tfoot>

            <tbody>
            <tr>
                <td>2001</td>
                <td>1000</td>
            </tr>
            <tr>
                <td>2001</td>
                <td>1000</td>
            </tr>
            <tr>
                <td>2001</td>
                <td>1000</td>
            </tr>

            </tbody>
        </table>

        @endsection
        @section('extra-scripts')

            <script type="text/javascript">

                $(document).ready(function () {
                    $('#datatable-responsive').DataTable({
                        responsive: true,
                        paging: false,
                    });
                });

                $(document).ready(function () {
                    $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
                });

            </script>
@endsection


