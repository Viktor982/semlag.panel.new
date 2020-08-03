@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Regras JSON</h2>
    </div>
    <div class="panel">

        <div class="panel-body">
            @if(isset($error))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Aviso!</h4>
                        {{ $error }}
                    </div>
            @endif

            <section class="content">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <div class="panel-layout">
                            <div class="panel-box">
                                <div class="panel-content bg-green">
                                    <i class="glyph-icon font-size-35">Download Regras</i>
                                </div>
                                <div class="panel-content pad15A bg-gray">
                                    <div class="center-vertical">
                                        <ul class="center-content list-group list-group-separator row mrg0A">
                                            <li class="col-md-12">
                                                <b><a href="#" data-toggle="modal" data-target="#download_rules">
                                                    <i class="glyph-icon font-size-35 icon-cloud-download"></i>
                                                </a></b>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="panel-layout">
                            <div class="panel-box">
                                <div class="panel-content bg-black">
                                    <i class="glyph-icon font-size-35">Atualizar Regras</i>
                                </div>
                                <div class="panel-content pad15A bg-gray">
                                    <div class="center-vertical">
                                        <ul class="center-content list-group list-group-separator row mrg0A">
                                            <li class="col-md-12">
                                                <b><a href="{{ route('rules.rule.edit', ['version' => $last_version]) }}">
                                                    <i class="glyph-icon font-size-35 icon-refresh"></i>
                                                </a></b>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="panel-layout">
                            <div class="panel-box">
                                <div class="panel-content bg-blue">
                                    <i class="glyph-icon font-size-35">Gerar Regras</i>
                                </div>
                                <div class="panel-content pad15A bg-gray">
                                    <div class="center-vertical">
                                        <ul class="center-content list-group list-group-separator row mrg0A">
                                            <li class="col-md-12">
                                                <b><a href="#" data-toggle="modal" data-target="#generate_rules">
                                                    <i class="glyph-icon font-size-35 icon-pencil-square-o"></i>
                                                </a></b>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="modal fade" id="download_rules" tabindex="-1" role="dialog"
                 aria-labelledby="download_rules" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Download Regras Json</h4>
                        </div>
                        <div class="modal-body">
                            <h3>Versão disponíveis para download:</h3>
                            <hr>
                            <br>
                            @foreach($rules as $rule)
                            <div class="row">
                                <div class="col-md-6">
                                    <a style="font-size: 15;" download href="{{ '.' . $rule->rule_path . 'rule_group_info_' . $rule->rule_version . '.json' }}">
                                        Rule_Group_Info_{{ $rule->rule_version }}
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <span style="font-size: 15">{{ $rule->updated_at }}</span>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-6">
                                        <a style="font-size: 15;" download href="{{ '.' . $rule->rule_path . 'servers_rules_info_' . $rule->rule_version . '.json' }}">
                                            Servers_Rules_Info_{{ $rule->rule_version }}
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <span style="font-size: 15">{{ $rule->updated_at }}</span>
                                    </div>
                            </div>
                           <div class="row">
                                    <div class="col-md-6">
                                        <a style="font-size: 15;" download href="{{ '.' . $rule->rule_path . 'filters_' . $rule->rule_version . '.json' }}">
                                            Rules_Filters_{{ $rule->rule_version }}
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <span style="font-size: 15">{{ $rule->updated_at }}</span>
                                    </div>
                           </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="generate_rules" tabindex="-1" role="dialog"
                     aria-labelledby="generate_rules" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Gerar Novo JSON</h4>
                            </div>
                            <form action="{{ route('rules.rule.create') }}" class="form" method="post">
                            <div class="modal-body">
                                <input type="hidden" value="{{ str_replace('-', '.',  $last_version) }}" name="version">
                                    <div class="form-group">
                                        <label for="version">Versão Customizada:</label><small>                 Deixe em branco para gerar as regras para a versão mais recente.</small>
                                        <input id="version_mask" type="text" class="form-control"  placeholder="Exemplo 0.0.0" name="version_custom">
                                    </div>
                                    <div class="form-group">

                                        <label for="version">Incluir Alias Fake na versão </label>
                                        <input type="checkbox" value="true" id="hasFakes" name="hasFakes" checked>
                                    </div>
                                    <div class="form-group">

                                        <label for="version">Incluir Launchers na versão </label>
                                        <input type="checkbox" value="true" id="hasLaunchers" name="hasLaunchers" checked>
                                    </div>
                                <label for="version"> Versão atual: <span style="color: #0f74a8; font-size: 14;">{{ str_replace('-', '.',  $last_version) }}</span></label>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-warning">Gerar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
    <script type="text/javascript">
    </script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paging: false,
            });
        });

        $(document).ready(function(){
            $('#version_mask').mask('0.0.000');
        });

       
    </script>
@endsection