@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Criar Novo Sitemap</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <form class="form-horizontal bordered-row" method="post" action="{{ route('site.sitemaps.store') }}">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Route:</label>
                        <div class="col-sm-6">
                            <input type="text" name="route" class="form-control" id="route_link">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Prioridade:</label>
                        <div class="col-sm-6">
                            <input type="number" name="priority" step="0.1" value="0.1" min="0.1" max="1.0" class="form-control"
                                   id="priority">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Frequencia de Atualização:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="frequency">
                                <option value="always">Todo momento(Quando for acessado)</option>
                                <option value="hourly">Por Hora</option>
                                <option value="daily">Diaria</option>
                                <option value="weekly">Semanal</option>
                                <option value="monthly">Mensal</option>
                                <option value="anual">Anual</option>
                                <option value="never">Nunca Atualizado</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Status:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="active">
                                <option value="1">Ativa</option>
                                <option value="0">Inativa</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <button class="btn btn-black"><i class="glyph-icon icon-save"></i> Criar Sitemap</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
