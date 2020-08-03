@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Editando Comentário</h2>
    </div>
    <form class="form-horizontal bordered-row" method="post" id="post-form"
          action="{{ route("blog.comments.approval_store", ['id'=>$comment->id, 'lang'=>$language['short']]) }}">
        <input type="hidden" name="language_id" value="1">
        <input type="hidden" name="id" value="{{ $comment->id }}">
        <input type="hidden" name="visible" id="visible" value="2">

        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">Post</div>
                    <div class="panel-body">
                        <fieldset>

                            <div class="form-group form-inline">
                                <label class="col-sm-2 control-label">Usuário:</label>
                                <span style="line-height:30px">{{ $comment->author->nome }}</span>
                            </div>
                            <div class="form-group form-inline">
                                <label class="col-sm-2 control-label">Em referência a:</label>
                                <span style="line-height:30px">{!! aroute('<i class="glyph-icon icon-external-link" title="" data-original-title=".icon-external-link"></i> '.$comment->post->title, 'blog.posts.edit', ['id' => $comment->post->id, 'lang'=>$language['short']])!!}</span>
                            </div>
                            <div class="form-group">
                                <textarea cols="70" id="body" name="body" class="form-control"
                                          rows="10">{{ $comment->body ?? null }}</textarea>
                            </div>
                        </fieldset>
                    </div>
                    <div class="panel-footer">
                        <div class="pull-right">
                            <button class="btn btn-black" onclick="$('#visible').val('2');$('#post-form').submit();">
                                Desaprovar
                            </button>
                            <button class="btn btn-primary" onclick="$('#visible').val('1');$('#post-form').submit();">
                                Aprovar
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('extra-scripts')
    <script type="text/javascript">
        $(function () {
            // status field
            $('#status').editable({
                source: [
                    {value: 1, text: 'Publicado'},
                    {value: 2, text: 'Pendente de Revisão'},
                    {value: 3, text: 'Rascunho'}
                ]
            });
            $('#status').on('hidden', function (e, reason) {
                if (reason === 'save' || reason === 'cancel') {
                    $('#status-hidden').val($('.editable-container select').val());
                }
            });

            // publication date field
            $('#publication_date').editable({
                format: 'yyyy-mm-dd',
                viewformat: 'dd/mm/yyyy',
                combodate: {
                    minYear: 2005,
                    maxYear: 2017
                }

            });
            $('#publication_date').on('hidden', function (e, reason) {
                if (reason === 'save' || reason === 'cancel') {
                    var day = $('.editable-container select.day').val();
                    var month = parseInt($('.editable-container select.month').val()) + 1;
                    var year = $('.editable-container select.year').val();
                    $('#publication_date-hidden').val(year + '-' + month + '-' + day);
                }
            });
        });

    </script>
    <script src="/build/widgets/ckeditor/ckeditor.js"></script>
    <script src="/build/widgets/tooltip/tooltip.js"></script>
    <script src="/build/widgets/popover/popover.js"></script>
    <link href="/build/widgets/xeditable/xeditable.css" rel="stylesheet" type="text/css"/>
    <script src="/build/widgets/xeditable/xeditable.js"></script>
    <script src="/build/widgets/xeditable/xeditable-demo.js"></script>
    <script src="/build/widgets/daterangepicker/moment.js"></script>
@endsection