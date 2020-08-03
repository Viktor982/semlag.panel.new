@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Criar FAQ</h2>
    </div>
    <form class="form-horizontal bordered-row" method="post" action="{{ route('site.faqs-store') }}">
        <div class="panel origem" id="original" >
            <div class="panel-body">
                <div class="example-box-wrapper">
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="code">Título:</label>
                        <div class="col-md-4">
                            <input id="question" name="question[]" type="text" value="" class="form-control input-md"
                                   required="">
                            <p class="help-block">Título da FAQ</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="code">Língua:</label>
                        <div class="col-md-4">
                            <select class="form-control input-md" name="lang[]">
                                @foreach($langs as $lang)
                                    <option value="{{ $lang['id'] }}">{{ $lang['name'] }}</option>
                                @endforeach
                            </select>
                            <p class="help-block">Lingua que o FAQ serve.</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="code">Resposta:</label>
                        <div class="col-sm-6">
                            <textarea class="form-control input-md" name="answer[]" id="summernote"></textarea>
                            <p class="help-block">Resposta da FAQ</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="code">Ordem:</label>
                        <div class="col-sm-2">
                            <input id="order" name="order[]" type="number" value="0" class="form-control input-md"
                                   required="">
                            <p class="help-block">Ordem de Relevância da FAQ.</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <button type="button" id="clone" class="btn btn-black pull-right"><i
                    class="glyph-icon icon-plus"></i>
            Adicionar Nova Lingua
        </button>

        <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success"><i class="glyph-icon icon-save"></i>
                    Salvar
                </button>
                <a href="{{ route('site.faqs') }}" class="btn btn-danger">Voltar</a>
            </div>
        </div>

        <div id="destino">
            <div id="remove">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
@section('extra-scripts')
    <script type="text/javascript">
        var cloneCount = 1;
        $("#clone").click(function () {
            $("#original")
                .clone()
                .attr('id', 'id'+ cloneCount++)
                .insertAfter("#original")
                .find('#summernote')
                .attr('id', 'summernote'+ cloneCount);
            $('#summernote' + cloneCount).summernote({
                height: 350
            });
        });
    </script>
    <script type="text/javascript">
        /* WYSIWYG editor */
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 350
            });
        });
    </script>
    <style>
        .note-editable {
            background-color: black;
            color: white;
        }
    </style>
@endsection