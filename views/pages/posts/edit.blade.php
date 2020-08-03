@extends('layout.default')
@section('content')
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

    <div id="page-title">
        <h2>Editando post</h2>
    </div>
    <form class="form-horizontal bordered-row" method="post" enctype="multipart/form-data" id="post-form"
          action="{{ route('blog.posts.update', ['lang'=>$language['short'], 'id' => $post->id]) }}">
        @include('pages.posts._form')
    </form>
@endsection