@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Assinaturas</h2>
    </div>
    <div class="panel">
        <div class="panel-body">
            <!-- SEARCH -->*
            <div class="form-horizontal bordered-row">
                <form class="form-group" action="{{ route('subscriptions.search') }}" method="post">
                    <label class="col-sm-3 control-label">Filtro</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="method" name="method">
                            <option value="email">Email</option>
                            <option value="id">ID da Assinatura</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="value_text" name="value">
                            <span class="input-group-btn">
                                <button class="btn btn-info" id="filter">
                                    <i class="glyph-icon icon-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /SEARCH -->
            <br class="clearfix">
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuário</th>
                        <th>Estado</th>
                        <th>Data de Criação</th>
                        <th>Método de Pagamento</th>
                        <th>Ações</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Usuário</th>
                        <th>Estado</th>
                        <th>Data de Criação</th>
                        <th>Método de Pagamento</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($subscriptions as $subscription)
                        <tr>

                            <td>{{ $subscription->id }}</td>
                            <td>{!! aroute($subscription->customer->usuario, 'customers.edit', ['id' => $subscription->customer->id]) !!}</td>
                            <td>{{ subscription_status($subscription->status_code) }}</td>
                            <td>{{ brDate($subscription->created_at) }}</td>

                            <td>{{ gateway($subscription->gateway_id) }}</td>
                            <td>
                                {!! aroute('<i class="glyph-icon icon-envelope-o"></i></a>', 'customers.send-email', ['id' => $subscription->customer->id], ['class' => 'btn btn-sm btn-azure'])!!}
                                {!! aroute('<i class="glyph-icon icon-eye"></i> Ver</a>', 'subscriptions.edit', ['id' => $subscription->id], ['class' => 'btn btn-sm btn-black'])!!}
                                {!! ($subscription->status_code != 3) ? aroute('<i class="glyph-icon icon-close"></i> Cancelar Assinatura</a>', 'subscriptions.cancel', ['id' => $subscription->id], ['class' => 'btn btn-sm btn-danger']):""!!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    {{ $subscriptions->render() }}
@endsection
