@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Criar Novo Cliente</h2>
    </div>
    <!--Começo Do Formulário --->
    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <form class="form-horizontal bordered-row" method="POST" action="{{ route('customers.store') }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">NOME:</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" id="nome"
                                       placeholder="Digite o Usuário." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">EMAIL:</label>
                            <div class="col-sm-6">
                                <input type="text" name="email" class="form-control" id="email"
                                       placeholder="Digite o Email." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">SENHA:</label>
                            <div class="col-sm-6">
                                <input type="password" name="pass" class="form-control" id="senha"
                                       placeholder="Digite a Senha." required>
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

@endsection
@section('extra-scripts')


@endsection