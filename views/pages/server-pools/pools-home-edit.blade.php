@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Atualizar Pool</h2>
    </div>

<div class="panel">
    <div class="panel-body">
        <div class="example-box-wrapper">
        <form class="form-horizontal bordered-row" method="POST" action="{{ route('server.pools.update') }}">
            <div class="modal-body">
                <input type="hidden" name="ip" value="{{ $request->ip }}">
                <div class="form-group">
                        <label class="col-sm-3 control-label">Old Name:</label>
                        <div class="col-sm-6">
                            <input type="text" name="id_name" value="{{ $request->name }}" class="form-control" readonly>
                        </div>
                    </div>        
                <div class="form-group">
                    <label class="col-sm-3 control-label">Name:</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" value="{{ $request->name }}" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">IP:</label>
                    <div class="col-sm-6">
                        <input type="text" name="ip" value="{{ $request->ip }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <form action="{{route('server.pools.home')}}">
                <button type="submit" class="btn " data-dismiss="modal">Fechar</button>
            </form>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
    </div>
</div>

@endsection

@section('extra-scripts')
@endsection