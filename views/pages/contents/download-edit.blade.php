@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Editar Link de Download - ID : {{ $link->id }}</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <form class="form-horizontal bordered-row" method="post"
                      action="{{ route('contents.download.update', ['id' => $link->id]) }}">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nome:</label>
                        <div class="col-sm-6">
                            <input type="text" name="version_name" value="{{ $link->version_name }}"
                                   class="form-control" id="nome">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Link:</label>
                        <div class="col-sm-6">
                            <input type="text" name="link" class="form-control" value="{{ $link->link }}" id="nome">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Inglês:</label>
                        <div class="col-sm-6">
                            <input type="text" name="en" class="form-control" id="en" value="{{ $link->names->where('lang', 'en')->first()->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Espanhol:</label>
                        <div class="col-sm-6">
                            <input type="text" name="es" class="form-control" id="es" value="{{ $link->names->where('lang', 'es')->first()->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Português:</label>
                        <div class="col-sm-6">
                            <input type="text" name="br" class="form-control" id="br" value="{{ $link->names->where('lang', 'br')->first()->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Status:</label>
                        <div class="col-sm-6">
                            <select name="state">
                                <option value="1" {{ ($link->state) ? "selected":"" }} > Ativo</option>
                                <option value="0" {{ ($link->state) ? "":"selected" }} > Inativo</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <button class="btn btn-black"><i class="glyph-icon icon-save"></i> Salvar Alterações
                            </button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>

@endsection
@section('extra-scripts')

@endsection
