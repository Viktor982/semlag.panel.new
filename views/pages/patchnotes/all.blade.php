@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Versão Atual Patch Notes NoPing Alpha</h2>

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

            <div class="form-horizontal bordered-row">
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#adicionar_versao">
                <i class="glyph-icon icon-plus-square"></i> Fazer update de versao
                </button>
            @if($dontHave)
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#adicionar_patch_notes">
                <i class="glyph-icon icon-plus-square"></i> Cadastrar Patch Notes
                </button>
            @else
                <button class="btn btn-sm btn-warning" disabled="disabled" data-toggle="modal" data-target="#adicionar_usuario">
                <i class="glyph-icon icon-plus-square"></i> Cadastrar Patch Notes
                </button>
            @endif
            </div>
            
            <br class="clearfix">
            <div class="modal fade" id="adicionar_versao" tabindex="-1" role="dialog"
                 aria-labelledby="adicionar_usuariolabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Fazer update de versao</h4>
                        </div>
                        <form class="form-horizontal bordered-row" method="POST"
                              action="{{ route('patchnotes.version.update') }}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Versao:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="version" class="form-control" id="email"
                                               placeholder="Exemplo (15.5.5)" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <br class="clearfix">
            <div class="modal fade" id="adicionar_patch_notes" tabindex="-1" role="dialog"
                 aria-labelledby="adicionar_usuariolabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Cadastrar Patch Notes para versao {{ $version->version }}</h4>
                        </div>
                        <form class="form-horizontal bordered-row" method="POST"
                              action="{{ route('patchnotes.notes.save') }}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Portugues:</label>
                                        <textarea name="pt_patch" id="" cols="50" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Espanhol:</label>
                                        <textarea name="es_patch" id="" cols="50" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Ingles:</label>
                                        <textarea name="eu_patch" id="" cols="50" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Vietnamita:</label>
                                        <textarea name="vn_patch" id="" cols="50" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                        <input name="version" type="hidden" id="" value="{{ $version->version }}" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="example-box-wrapper">
            @if($dontHave)
                <h1 class="alert alert-warning">Desculpe.</h1>
                <h3>
                    {{ $patch }} 
                </h3>
            @else
                <h1>{{ $version->version }}</h1>
                <h3>Portugues: </h3>
                <pre>{{ $patch->translation }}</pre>
            </div>
            @endif
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script type="text/javascript">

        
    </script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paging: false,
            });
        });

       
    </script>
@endsection