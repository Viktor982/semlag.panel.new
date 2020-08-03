@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Editar SlideShow - ID: {{ $slide->id }}</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <form class="form-horizontal bordered-row" method="post"
                      action="{{ route('contents.slides.update', ['id' => $slide->id]) }}">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Titulo:</label>
                        <div class="col-sm-6">
                            <input type="text" name="title" value="{{ $slide->title }}" class="form-control" id="title">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Route Link:</label>
                        <div class="col-sm-6">
                            <input type="text" name="route_link" value="{{ $slide->route_link }}" class="form-control"
                                   id="route_link">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Linguagem:</label>
                        <div class="col-sm-2">
                            <select name="language_id" class="form-control">
                                @foreach($languages as $lang)
                                    <option value="{{ $lang->id }}" {!! ($slide->language_id == $lang->id) ? "selected":"" !!}>{{ $lang->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ordem:</label>
                        <div class="col-sm-2">
                            <input name="order" class="order form-control input-md" type="number"
                                   value="{{ $slide->order }}" style="margin: 0 auto;width: 60px;display: initial;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Status:</label>
                        <div class="col-sm-1">
                            <select name="active" class="form-control">
                                <option value="1" {{ ($slide->active == 1) ? "selected":"" }}>Ativo</option>
                                <option value="0" {{ ($slide->active == 0) ? "selected":"" }}>Inativo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <button class="btn btn-black"><i class="glyph-icon icon-save"></i> Editar SlideShow</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
