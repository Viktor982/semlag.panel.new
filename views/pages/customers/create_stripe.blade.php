@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Criar Novo Cliente</h2>
    </div>
    <!--Começo Do Formulário --->
    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <form class="form-horizontal bordered-row" method="POST" action="{{ route('customers.store-stripe') }}">
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
                        </div><div class="form-group">
                            <label class="col-sm-3 control-label">CUSTOMER ID:</label>
                            <div class="col-sm-6">
                                <input type="text" name="customer_id" class="form-control" id="c_id"
                                       placeholder="Digite o customer id." required>
                            </div>
                        </div><div class="form-group">
                            <label class="col-sm-3 control-label">SUBSCRIPTION ID:</label>
                            <div class="col-sm-6">
                                <input type="text" name="subscription_id" class="form-control" id="s_id"
                                       placeholder="Digite o subscription id." required>
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