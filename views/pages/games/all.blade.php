@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Games</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <a href="{{ route('games.create') }}">
                <button class="btn btn-sm btn-black"><i class="glyph-icon icon-plus-square"></i> Novo Game</button>
            </a>


            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Game</th>
                        <th>Slug</th>
                        <th>Fixado Home</th>
                        <th>Acesso a Pagina</th>
                        <th>Criado em</th>
                        <th>Atualizado em</th>
                        <th>Ações</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Game</th>
                        <th>Slug</th>
                        <th>Fixado Home</th>
                        <th>Acesso a Pagina?</th>
                        <th>Criado em</th>
                        <th>Atualizado em</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($games as $game)
                        <tr>
                            <td>{{ $game->id }}</td>
                            <td>{{ $game->name}}</td>
                            <td>{{ $game->slug}}</td>
                            <td>
                                {!! ($game->fixed_cover)
                                    ?
                                    '<a href='.route("games.update-cover", ["id" => $game->id]).'><i class="glyph-icon icon-check"></i></a>'
                                    :
                                     '<a href='.route("games.update-cover", ["id" => $game->id]).'><i class="glyph-icon icon-remove"></i></a>'
                                 !!}
                            </td>
                            <td>
                                {!! ($game->access_page)
                                    ?
                                    '<a href='.route("games.update-page-access", ["id" => $game->id]).'><i class="glyph-icon icon-check"></i></a>'
                                    :
                                     '<a href='.route("games.update-page-access", ["id" => $game->id]).'><i class="glyph-icon icon-remove"></i></a>'
                                 !!}
                            </td>
                            <td>{{ brDate($game->created_at) }}</td>
                            <td>{{ brDate($game->updated_at) }}</td>
                            <td>
                                {!! aroute('<i class="glyph-icon icon-edit"></i> Editar</a>', 'games.edit', ['id' => $game->id], ['class' => 'btn btn-sm btn-black'])!!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $games->render() }}
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