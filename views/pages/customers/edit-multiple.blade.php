@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Editar Usuário</h2>
    </div>

    <!--Começo Do Formulário --->
    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <form action="{{ route('customers.update-multiple') }}" method="post"
                      class="form-horizontal bordered-row">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Dias:</label>
                        <div class="col-sm-6">
                            <input type="number" name="days" class="form-control spinner-input" id="days">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Dias Premium:</label>
                        <div class="col-sm-6">
                            <input type="number" name="days_premium" class="form-control spinner-input"
                                   id="days_premium">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Motivo:</label>
                        <div class="col-sm-6">
                            <input type="text" name="reason" class="form-control" id="reason">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Usuários Encontrados:</label>
                        <div class="col-sm-6">
                            <select multiple class="form-control" name="customers[]" id="customers_search" readonly>
                                @foreach($customers['success'] as $customer)
                                    <option value="{{ $customer['id'] }}" selected><b>ID: {{ $customer['id'] }}
                                            Usuário:{{ $customer['usuario'] }}</b></option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Usuários não Encontrados:</label>
                        <div class="col-sm-6">
                            <select multiple class="form-control" readonly>
                                @foreach($customers['fail'] as $customer)
                                    <option><b>Usuário:{{ $customer }}</b></option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                            <div class="example-box-wrapper">
                                <input type="submit" class="btn btn-black" value="Enviar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('extra-scripts')


@endsection