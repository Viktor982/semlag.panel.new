@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Usuários</h2>
        <p>Lista de Usuários do Painel.</p>
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
                        <th>Usuário</th>
                        <th>Opções</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Usuário</th>
                        <th>Opções</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>
                                {!! aroute('<i class="glyph-icon icon-edit"></i> Editar Usuário', 'users.edit', ['id' => $user->id], ['btn', 'btn-sm', 'btn-black']) !!}
                                {!! aroute('<i class="glyph-icon icon-edit"></i> Editar Permissões', 'users.edit-roles', ['id' => $user->id], ['btn', 'btn-sm', 'btn-black']) !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    {{ $users->render() }}
@endsection
@section('extra-scripts')
    <script type="text/javascript">

        /* Datatables responsive */

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paging: false
            });
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });

    </script>
@endsection
