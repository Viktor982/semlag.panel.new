@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Editar FAQ - ID: {{ $faq->id }}</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <form class="form-horizontal bordered-row" method="post"
                      action="{{ route('site.faqs.affiliates.update', ['id' => $faq->id]) }}">

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="code">Título:</label>
                        <div class="col-md-4">
                            <input id="question" name="question" type="text" value="{{ $faq->question }}"
                                   class="form-control input-md" required="">
                            <p class="help-block">Título da FAQ</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="code">Língua:</label>
                        <div class="col-md-4">
                            <select class="form-control input-md" name="lang">
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
                            <textarea class="form-control wysiwyg-editor" id="summernote"  name="answer">{{ $faq->answer }}</textarea>
                            <p class="help-block">Resposta da FAQ</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="code">Ordem:</label>
                        <div class="col-sm-2">
                            <input id="order" name="order" type="number" value="{{ $faq->order }}"
                                   class="form-control input-md" required="">
                            <p class="help-block">Ordem de Relevância da FAQ.</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="submit"></label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success"><i class="glyph-icon icon-save"></i> Salvar
                            </button>
                            <a href="{{ route('site.faqs') }}" class="btn btn-danger">Voltar</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script type="text/javascript">
        /* WYSIWYG editor */


        $(document).ready(function() {
            $('#summernote').summernote({
                height: 350
            });

        });


    </script>
    <style>
        .note-editable { background-color: black; color: white; }
    </style>
@endsection