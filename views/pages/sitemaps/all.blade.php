@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Sitemaps</h2>
        <p>Lista de Sitemaps.</p>

    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                <a href="{{ route('site.sitemaps.create') }}">
                    <button class="btn btn-black">
                        <i class="glyph-icon icon-plus-square"></i>
                        Novo Sitemap
                    </button>
                </a>
            </h3>
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Rota:</th>
                        <th>Prioridade:</th>
                        <th>Frequencia de Atual.:</th>
                        <th>Ativo?</th>
                        <th>Opções:</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Rota:</th>
                        <th>Prioridade:</th>
                        <th>Frequencia de Atual.:</th>
                        <th>Ativo?</th>
                        <th>Opções:</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($sitemaps as $sitemap)
                        <tr>
                            <td>{{ $sitemap->id }}</td>
                            <td>{{ $sitemap->route }}</td>
                            <td>{{ $sitemap->priority }}</td>
                            <td>{{ $sitemap->frequency }}</td>
                            <td>{{ ($sitemap->active == 1) ? "Sim":"Não"}}</td>
                            <td>
                                {!! aroute('<i class="glyph-icon icon-edit"></i> Editar</a>',
                                  'site.sitemaps.edit',
                                  ['id' => $sitemap->id],
                                  ['class' => 'btn btn-black'])
                                !!}
                                {!! aroute('<i class="glyph-icon icon-remove"></i> Deletar</a>',
                                  'site.sitemaps.delete',
                                  ['id' => $sitemap->id],
                                  ['class' => 'btn btn-danger'])
                                !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $sitemaps->render() }}
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
