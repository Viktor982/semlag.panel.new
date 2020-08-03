@extends('layout.default');
@section('content')
    <!-- Formulário -->
    <div class="panel">
        <div class="panel-body">
            <div class="form-horizontal bordered-row">
                <h2 class="title-hero">Imagens</h2>

                <form enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Imagem:</label>
                        <div class="col-md-4">
                            <input type="file" class="form-control" id="fileUpload" name="image">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <button type="button" id="btnEnviar" class="btn btn-sm btn-black">
                            <i class="glyph-icon icon-save"></i> Carregar Imagem
                        </button>
                    </div>
                </form>

            </div>
            <div id="result"></div>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script type="text/javascript">
        $(function () {

            var form;
            $('#fileUpload').change(function (event) {
                form = new FormData();
                form.append('fileUpload', event.target.files[0]);
            });

            $('#btnEnviar').click(function () {
                $.ajax({
                    url: '{{ route('blog.images.store')  }}',
                    data: form,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (data) {
                        $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-success"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-green alert-icon"><i class="glyph-icon icon-check"></i></div><div class="alert-content"><h4 class="alert-title">Pronto!</h4><p><b>Imagem Gerada com sucesso.</b></p><b>Link:</b> ' + data + '</div></div></div></div></div></div></div></div></div></div>');

                    }
                });
            });
        });
    </script>
@endsection