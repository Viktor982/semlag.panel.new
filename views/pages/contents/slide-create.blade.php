@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Criar Novo SlideShow</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <form class="form-horizontal bordered-row" enctype="multipart/form-data" method="post"
                      action="{{ route('contents.slides.store') }}">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Titulo:</label>
                        <div class="col-sm-6">
                            <input type="text" name="title" class="form-control" id="title">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Route Link:</label>
                        <div class="col-sm-6">
                            <input type="text" name="route_link" class="form-control" id="route_link">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Imagem de Slide:</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="slide" name="slide">
                            <p class="help-block"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Linguagem:</label>
                        <div class="col-sm-2">
                            <select name="language_id" class="form-control">
                                @foreach($languages as $lang)
                                    <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ordem:</label>
                        <div class="col-sm-2">
                            <input name="order" class="order form-control input-md" type="number"
                                   style="margin: 0 auto;width: 60px;display: initial;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Status:</label>
                        <div class="col-sm-1">
                            <select name="active" class="form-control">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <button class="btn btn-black"><i class="glyph-icon icon-save"></i> Criar SlideShow</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
