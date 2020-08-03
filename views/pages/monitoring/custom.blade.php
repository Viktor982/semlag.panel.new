@extends('layout.default')
@section('content')
    <div class="form-horizontal bordered-row">
        <form class="form-group" action="{{ route('monitoring.games.result') }}" method="post">
            <label class="col-sm-3 control-label">Filtro</label>
            <div class="col-sm-2">
                <select class="form-control" id="method" name="filter">
                    <option value="1">Horas</option>
                    <option value="2">Semanal</option>
                    <option value="3">Mensal</option>
                </select>
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="number" class="form-control" min="1" value="24" id="hour_selector" name="filter_hours">
                    <span class="input-group-btn">
                                <button class="btn btn-info" id="filter">
                                    <i class="glyph-icon icon-search"></i>
                                </button>
                            </span>
                </div>
            </div>
<br class="clearfix">
        <label class="col-sm-3 control-label">Tipo de cliente:</label>
        <div class="col-sm-2">
            <select class="form-control" id="method" name="type">
                <option value="1">Clientes</option>
                <option value="2">Trials</option>
            </select>
        </div>

    </div>
    </form>

    <br class="clearfix">
    <script>
        document.getElementById('method')
            .addEventListener('change', function () {
                document.getElementById('hour_selector').style.display = (this.value == 1) ? 'block' : 'none';
            });
    </script>
@endsection