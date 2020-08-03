@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Editar FAQ - ID</h2>
    </div>
    <form class="form-horizontal bordered-row" method="post"
          action="{{ route('site.faqs-update', ['id' => $faqs[0]['multiple_question_id']]) }}">
        @foreach($faqs as $faq)
            <div id="{{ $faq->id }}">
                <div class="panel">
                    <div class="panel-body">
                        <div class="example-box-wrapper">
                            <button type="button" onclick="remove({{ $faq->id }})" class="btn btn-black pull-right"><i
                                        class="glyph-icon icon-minus"></i>
                                Remover FAQ
                            </button>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="code">Título:</label>
                                <div class="col-md-4">
                                    <input id="question" name="question[]" type="text" value="{{ $faq->question }}"
                                           class="form-control input-md" required="">
                                    <p class="help-block">Título da FAQ</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="code">Língua:</label>
                                <div class="col-md-4">
                                    <select class="form-control input-md" name="lang[]">
                                        @foreach($langs as $lang)
                                            <option {{ ($lang['id'] == $faq->lang) ? 'selected':'' }} value="{{ $lang['id'] }}">{{ $lang['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block">Lingua que o Faq serve.</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="code">Resposta:</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control input-md" name="answer[]"
                                              id="summernote{{$faq->lang}}">{{ $faq->answer }}</textarea>
                                    <p class="help-block">Resposta da FAQ</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="code">Ordem:</label>
                                <div class="col-sm-2">
                                    <input id="order" name="order[]" type="number" value="{{ $faq->order }}"
                                           class="form-control input-md" required="">
                                    <p class="help-block">Ordem de Relevância da FAQ.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="destino"></div>

        <button type="button" id="clone" class="btn btn-black pull-right"><i
                    class="glyph-icon icon-plus"></i>
            Adicionar Nova Lingua
        </button>
        <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success"><i class="glyph-icon icon-save"></i> Salvar
                </button>
                <a href="{{ route('site.faqs') }}" class="btn btn-danger">Voltar</a>
            </div>
        </div>
    </form>
    <div class="origem" id="origem" style="display: none;">
        <div class="panel">
            <div class="panel-body">
                <div class="example-box-wrapper">
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="code">Título:</label>
                        <div class="col-md-4">
                            <input id="question" name="question[]" type="text"
                                   class="form-control input-md" required="">
                            <p class="help-block">Título da FAQ</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="code">Língua:</label>
                        <div class="col-md-4">
                            <select class="form-control input-md" name="lang[]">
                                @foreach($langs as $lang)
                                    <option {{ ($lang['id'] == $faq->lang) ? 'selected':'' }} value="{{ $lang['id'] }}">{{ $lang['name'] }}</option>
                                @endforeach
                            </select>
                            <p class="help-block">Lingua que o Faq serve.</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="code">Resposta:</label>
                        <div class="col-sm-6">
                            <textarea class="form-control input-md" name="answer[]" id="summernotenew"></textarea>
                            <p class="help-block">Resposta da FAQ</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="code">Ordem:</label>
                        <div class="col-sm-2">
                            <input id="order" name="order[]" type="number"
                                   class="form-control input-md" required="">
                            <p class="help-block">Ordem de Relevância da FAQ.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script type="text/javascript">
        var cloneCount = 1;

        $("#clone").click(function () {
            $("#origem")
                .clone()
                .attr('id', 'id' + cloneCount++)
                .insertAfter(".destino")
                .show()
                .find('#summernotenew')
                .attr('id', 'summernotenew' + cloneCount);
            $('#id' + cloneCount - 1).show();

            $('#summernotenew' + cloneCount).summernote({
                height: 350
            });

        });

        function remove(id) {
            $('#' + id).remove();
        }
    </script>

    @foreach($faqs as $faq)
        <script type="text/javascript">
            /* WYSIWYG editor */

            $(document).ready(function () {
                $('#summernote' + {{ $faq->lang }}).summernote({
                    height: 350
                });

            });

        </script>
    @endforeach
    <style>
        .note-editable {
            background-color: black;
            color: white;
        }
    </style>
@endsection