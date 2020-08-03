@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Tarefas da ponte</h2>
        <p>Aqui você poderá definir alguma tarefa para que a ponte execute, tal como: update ( faz update no cache de alias das pontes ) no caso de remoção ou add de algum alias.</p>

    </div>
    <div class="panel">

        <div class="panel-body">
            <div class="form-horizontal bordered-row">
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#add_bridge"><i
                            class="glyph-icon icon-plus-square"></i> Nova Tarefa
                </button>
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#add_bridge" disabled>
                    <i class="glyph-icon icon-plus-square"></i> Limpar Tarefas
                </button>
            </div>
            <br class="clearfix">
            <div class="modal fade" id="add_bridge" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Adicionar Nova tarefa</h4>
                        </div>
                        <form class="form-horizontal bordered-row" method="POST"
                              action="{{ route('bridge.task.store') }}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tasl:</label>
                                    <div class="col-sm-6">
                                        <select name="task" id="" class="form-control">
                                            <option value="update">UPDATE</option>
                                        </select>
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

            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Task</th>
                        <th>Pontes que concluíram</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Task</th>
                        <th>Pontes que concluíram</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->id }} </td>
                            <td>{{ $task->task }}</td>
                            <td><a href="#">
                                <b>Veja aqui</b>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
   
@endsection