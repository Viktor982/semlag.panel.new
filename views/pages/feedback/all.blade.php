@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Feedback NoPing Alpha</h2>
        <p>Lista de Usuarios Cadastrados. Total <b>{{ $size }}</b></p>

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
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#adicionar_usuario">
                <i class="glyph-icon icon-plus-square"></i> Novo Registro
                </button>
            </div>
            <br class="clearfix">
            <div class="modal fade" id="adicionar_usuario" tabindex="-1" role="dialog"
                 aria-labelledby="adicionar_usuariolabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Adicionar Novo Cliente No NoPingAlpha</h4>
                        </div>
                        <form class="form-horizontal bordered-row" method="POST"
                              action="{{ route('feedback.store') }}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">EMAIL:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="email" class="form-control" id="email"
                                               placeholder="Digite o Email." required>
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
                        <th>#</th>
                        <th>Email</th>
                        <th>Último Feedback</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Último Feedback</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($registered as $register)
                        
                        <tr>
                            <td>{{ $register->email }} </td>
                            <td>{{ $register->last_updated_days }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $registered->render() }}
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