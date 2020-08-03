@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Usuários</h2>
        <p>Lista de Grupos de Acesso do Painel.</p>
    </div>

    <button class="btn btn-black" data-toggle="modal" data-target="#adicionar_grupo"><i
                class="glyph-icon icon-plus"></i> Adicionar Novo Grupo
    </button>
    <p></p>

    <div class="modal fade" id="adicionar_grupo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Adicionar Novo Grupo</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal bordered-row" method="post" action="{{ route('groups.create') }}">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nome:</label>
                            <div class="col-sm-6">
                                <input type="text" name="group-name" class="form-control" id="nome">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-black">Salvar</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
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
                        <th>Grupo</th>
                        <th>Opções</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Grupo</th>
                        <th>Opções</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <td>{{ $group->name }}</td>
                            <td>
                                {!! aroute('<i class="glyph-icon icon-edit"></i> Editar', 'groups.edit', ['id' => $group->id], ['btn', 'btn-sm', 'btn-black']) !!}
                            </td>
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
                paging: false
            });
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });

    </script>
@endsection
