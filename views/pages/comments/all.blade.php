@extends('layout.default')

@section('content')
    <div id="page-title">
        <h2>Moderando Comentários</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="panel">
                <div class="panel-body">
                    <h3 class="title-hero">
                        <div class="dropdown">

                        </div>
                        <div class="dropdown pull-right">
                            <button class="btn btn-black dropdown-toggle" type="button" data-toggle="dropdown">
                                Trocar Idioma Para ...
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                @foreach($languages as $lang)
                                    <li>
                                        <a href="{{ route('blog.comments.all', ['lang'=>$lang['short']]) }}">{{ $lang['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </h3>

                    <div class="example-box-wrapper">
                        <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Autor</th>
                                <th>Comentário</th>
                                <th>Em resposta a</th>
                                <th>Ações</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->author->nome }}</td>
                                    <td>{{ $comment->body }}</td>
                                    <td>
                                        {!! aroute($comment->post->title, 'blog.posts.edit', ['id' => $comment->post->id, 'lang'=>$language['short']])!!}
                                    </td>
                                    <td>
                                        {!! aroute('<i class="glyph-icon icon-eye"></i> Aprovação</a>', 'blog.comments.approval', ['id' => $comment->id, 'lang'=>$language['short']], ['class' => 'btn btn-sm btn-black'])!!}
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
                        {{ $comments->render() }}
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

            </script>
@endsection