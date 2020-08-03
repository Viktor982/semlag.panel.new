@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Links de Download</h2>

    </div>
    <button class="btn btn-black" data-toggle="modal" data-target="#adicionar_link"><i class="glyph-icon icon-plus"></i>
        Adicionar Novo Link
    </button>
    <p></p>

    <div class="modal fade" id="adicionar_link" tabindex="-1" role="dialog" aria-labelledby="adicionar_linklabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Adicionar Novo Link</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal bordered-row" method="post"
                          action="{{ route('contents.download.create') }}">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nome:</label>
                            <div class="col-sm-6">
                                <input type="text" name="version_name" class="form-control" id="nome">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Link:</label>
                            <div class="col-sm-6">
                                <input type="text" name="link" class="form-control" id="nome">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Inglês:</label>
                            <div class="col-sm-6">
                                <input type="text" name="en" class="form-control" id="en">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Espanhol:</label>
                            <div class="col-sm-6">
                                <input type="text" name="es" class="form-control" id="es">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Português:</label>
                            <div class="col-sm-6">
                                <input type="text" name="br" class="form-control" id="br">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status:</label>
                            <div class="col-sm-6">
                                <select name="state">
                                    <option value="1"> Ativo</option>
                                    <option value="0"> Inativo</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-black">Salvar</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Nome da Versão</th>
                        <th>Link</th>
                        <th></th>
                        <th>Estado</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Nome da Versão</th>
                        <th>Link</th>
                        <th></th>
                        <th>Estado</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($downloads as $download)
                        <tr>
                            <td>{{ $download->version_name }}</td>
                            <td>{{ $download->link }}</td>
                            <td><a class="btn btn-success" href="{{ $download->link }}"><i
                                            class="glyph-icon icon-cloud-download"></i></a></td>
                            <td>{!! ($download->state) ? '<i class="glyph-icon icon-check"></i>':'<i class="glyph-icon icon-remove"></i>' !!}</td>
                            <td>
                                {!! aroute('<i class="glyph-icon icon-edit"></i> Editar</a>', 'contents.download.edit', ['id' => $download->id], ['class' => 'btn btn-sm btn-black'])!!}
                                {!! aroute('<i class="glyph-icon icon-remove"></i> Deletar</a>', 'contents.download.delete', ['id' => $download->id], ['class' => 'btn btn-sm btn-warning'])!!}

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $downloads->render() }}
@endsection
@section('extra-scripts')
    <script type="text/javascript">

        /* Datatables responsive */

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true
            });
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });

    </script>
    <script type="text/javascript">
        /* Input switch */

        $(function () {
            "use strict";
            $('.input-switch').bootstrapSwitch();
        });
    </script>
@endsection
