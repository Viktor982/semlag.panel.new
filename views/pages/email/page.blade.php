@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Email</h2>
        <p>Envio de email.</p>
    </div>
    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <form action="{{ route('email.send') }}" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="email_to" class="col-sm-3 control-label">Para</label>
                        <div class="col-sm-6">
                            <input required id="email_to" type="email" name="email_to" class="form-control"
                                   placeholder="exemplo@exem.plo" value="{{ $email }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject" class="col-sm-3 control-label">Assunto</label>
                        <div class="col-sm-6">
                            <input required id="subject" type="text" name="subject" class="form-control"
                                   placeholder="Assunto">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Mensagem</label>
                        <div class="col-sm-6">
                            <textarea required name="message" id="message" cols="30" rows="10" class="form-control"
                                      placeholder="Mensagem..."></textarea>
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