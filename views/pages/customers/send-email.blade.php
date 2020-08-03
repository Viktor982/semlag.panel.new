@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Enviar Novo Email para {{ $customer->usuario }}</h2>
    </div>
    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <form action="{{ route('email.send') }}" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="email_to" class="col-sm-3 control-label">Para</label>
                        <div class="col-sm-6">
                            <input id="email_to" type="email" name="email_to" class="form-control disabled"
                                   placeholder="exemplo@exem.plo" value="{{ $customer->usuario }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject" class="col-sm-3 control-label">Assunto</label>
                        <div class="col-sm-6">
                            <input required id="subject" type="text" name="subject" class="form-control"
                                   placeholder="Digite o Assunto">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Mensagem</label>
                        <div class="col-sm-6">
                            <textarea name="message" class="wysiwyg-editor"></textarea>
                        </div>
                    </div>

                    <div class="form-group bordered-row text-center">
                        <button class="btn btn-success"><i class="glyph-icon icon-send"></i> Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <!-- Bootstrap Summernote WYSIWYG editor -->

    <script type="text/javascript">
        /* WYSIWYG editor */

        $(function () {
            "use strict";
            $('.wysiwyg-editor').summernote({
                height: 150,
                placeholder: 'Digite aqui sua mensagem.'
            });
        });
    </script>

@endsection