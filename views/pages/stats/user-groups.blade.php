@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Estatísticas - User Groups</h2>
    </div>

    <div class="example-box-wrapper">
        <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Usuários</th>
                <th>Usuários Premium</th>
                <th>Usuários VIP</th>
                <th>Usuários Free</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Usuários</th>
                <th>Usuários Premium</th>
                <th>Usuários VIP</th>
                <th>Usuários Free</th>
            </tr>
            </tfoot>

            <tbody>
            <tr>
                <td>325898</td>
                <td>Especial Ouro Aurea</td>
                <td>1</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>325898</td>
                <td>Especial Ouro Aurea</td>
                <td>1</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>325898</td>
                <td>Especial Ouro Aurea</td>
                <td>1</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
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


