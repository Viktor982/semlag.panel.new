@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Editar Sitemap - ID: {{ $sitemap->id }}</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <form class="form-horizontal bordered-row" method="post"
                      action="{{ route('site.sitemaps.update', ['id' => $sitemap->id]) }}">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Route:</label>
                        <div class="col-sm-6">
                            <input type="text" name="route" value="{{ $sitemap->route }}" class="form-control"
                                   id="route_link">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Prioridade:</label>
                        <div class="col-sm-6">
                            <input type="number" name="priority" step="0.1" value="{{ $sitemap->priority }}"
                                   class="form-control" id="priority">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Frequencia de Atualização:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="frequency">
                                <option value="always" {{ ($sitemap->frequency == 'always') ? "selected":"" }}>Todo momento(Quando for acessado)</option>
                                <option value="hourly" {{ ($sitemap->frequency == 'hourly') ? "selected":"" }}>Por Hora</option>
                                <option value="daily" {{ ($sitemap->frequency == 'daily') ? "selected":"" }}>Diaria</option>
                                <option value="weekly" {{ ($sitemap->frequency == 'weekly') ? "selected":"" }}>Semanal</option>
                                <option value="monthly" {{ ($sitemap->frequency == 'monthly') ? "selected":"" }}>Mensal</option>
                                <option value="anual" {{ ($sitemap->frequency == 'anual') ? "selected":"" }}>Anual</option>
                                <option value="never" {{ ($sitemap->frequency == 'always') ? "never":"" }}>Nunca Atualizado</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Status:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="active">
                                <option value="1" {{ ($sitemap->active == 1) ? "selected":"" }}>Ativa</option>
                                <option value="0" {{ ($sitemap->active == 0) ? "selected":"" }}>Inativa</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <button class="btn btn-black"><i class="glyph-icon icon-save"></i> Editar Sitemap</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
