@extends('layout.default')

@section('content')
    <div id="page-title">
        <h2>Posts</h2>
    </div>
    {{-- delete post modal--}}
    <div class="modal fade" tabindex="-1" role="dialog" id="delete-post-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Excluir Post</h4>
                </div>
                <div class="modal-body">
                    <p>Você deseja realmente remover o post?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default button-cancel" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary button-ok">Sim</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                <div class="dropdown">
                    <a href="{{ route('blog.posts.create', ['lang' => $language['short'] ]) }}">
                        <button class="btn btn-black" type="button">
                            <i class="glyph-icon icon-plus-square"></i>
                            Criar Novo Post
                        </button>
                    </a>
                </div>
                <div class="dropdown pull-right">
                    <button class="btn btn-black dropdown-toggle" type="button" data-toggle="dropdown">
                        Trocar Idioma Para ...
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        @foreach($languages as $lang)
                            <li>
                                <a href="{{ route('blog.posts.all', ['lang'=>$lang['short']]) }}">{{ $lang['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </h3>

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
                                <th>Post</th>
                                <th>Autor</th>
                                <th>Categorias</th>
                                <th>Tags</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->author->username }}</td>
                                    <td>{{ $post->categories->pluck('name')->implode(',') }}</td>
                                    <td>{{ $post->tags->pluck('name')->implode(', ') }}</td>
                                    <td>
                                        {{ $post->created_at->format('d/m/Y')}}
                                        <span class="bs-label label-{{ \NPDashboard\Repositories\Blog\PostRepository::getStatusClass($post->status_id) }}">
                                            {{ \NPDashboard\Repositories\Blog\PostRepository::getStatusName($post->status_id) }}

                                        </span>
                                    </td>
                                    <td>
                                        {!! aroute('<i class="glyph-icon icon-edit"></i> Editar</a>',
                                                    'blog.posts.edit',
                                                    ['id' => $post->id, 'lang' => $language['short']],
                                                    ['class' => 'btn btn-sm btn-black'])!!}
                                        <a href="javascript:removePostOrNot({{ $post->id }})"
                                           class="btn btn-sm btn-danger">
                                            <i class="glyph-icon icon-trash"></i> Excluir</a>
                                        </a>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="pull-right">
                        {{ $posts->render() }}
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        @endsection
        @section('extra-scripts')
            <script type="text/javascript">

                $(document).ready(function () {
                    $('#datatable-responsive').DataTable({
                        responsive: true,
                        paging: false
                    });
                });

                $(document).ready(function () {
                    $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
                });

                function removePostOrNot(id) {
                    $('#delete-post-modal').modal();
                    $('#delete-post-modal .button-ok').click(function () {
                        var url = '{!! route('blog.posts.all', ['lang' => $language['short']]) !!}';
                        url += '/' + id + '/delete';
                        window.location = url;

                    });
                }
            </script>
@endsection