@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Cupons</h2>
        <p>Lista de Cupons Gerados.</p>

    </div>

    <div class="panel">
        <div class="panel-body">
            <a href="{{ route('coupons.generate') }}">
                <button class="btn btn-black"><i class="glyph-icon icon-plus"></i> Gerar Cupons</button>
            </a>
            <div class="form-horizontal bordered-row">
                <form class="form-group" action="{{ route('coupons.search') }}" method="post">
                    <label class="col-sm-3 control-label">Filtro</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="method" name="method">
                            <option value="coupon">Cupom</option>
                            <option value="email">Email / Usuário</option>
                            <option value="sale">Venda</option>
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

            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuário Dono</th>
                        <th>Origem</th>
                        <th>Motivo</th>
                        <th>Destino</th>
                        <th>IP de Origem</th>
                        <th>Plano</th>
                        <th>Código</th>
                        <th>Data de Criação</th>
                        <th>Situação</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Usuário Dono</th>
                        <th>Origem</th>
                        <th>Motivo</th>
                        <th>Destino</th>
                        <th>IP de Origem</th>
                        <th>Plano</th>
                        <th>Código</th>
                        <th>Data de Criação</th>
                        <th>Situação</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($coupons as $coupon)
                        <tr>
                            <td>{{ $coupon->id }}</td>
                            <td>{!! ($coupon->vendedor) ? aroute($coupon->reseller->usuario, 'customers.edit', ['id' => $coupon->reseller->id]) : '' !!} </td>
                            <td>{{ ($coupon->venda_id) ? 'Venda #'.$coupon->venda_id :'Criado Por um Admin' }}</td>
                            <td>{{ $coupon->reason }}</td>
                            <td>{{ $coupon->destiny }}</td>
                            <td>{{ $coupon->ad_user_ip }}</td>
                            <td>{{ $coupon->plan->nome }}</td>
                            <td>{{ coupon($coupon->cupom) }}</td>
                            <td>{{ brDate($coupon->data_cadastro) }}</td>
                            <td>{{ $coupon->disabled ? 'Desabilitado' : 'Habilitado' }}</td>
                            <td>{!! ($coupon->user_activated) ? 'utilizado por '.aroute($coupon->customerActivated->usuario, 'customers.edit', ['id' => $coupon->user_activated]).' em '.( new \Carbon\Carbon($coupon->data_utilizacao))->format("d/m/y H:i:s") : '<a class="btn btn-sm btn-success" href="#"> Livre</a>' !!}</td>
                            <td>
                                @if ($coupon->disabled)
                                    <a class="btn btn-sm btn-success"
                                       href="{!! route('coupons.enable-coupon', [ 'id' => $coupon->id ]) !!}"><i
                                                class="glyph-icon icon-edit"></i> Habilitar</a>
                                @else
                                    <a class="btn btn-sm btn-danger"
                                       href="{!! route('coupons.disable-coupon', [ 'id' => $coupon->id ]) !!}"><i
                                                class="glyph-icon icon-edit"></i> Desabilitar</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $coupons->render() }}
@endsection
@section('extra-scripts')
    <script type="text/javascript">

        /* Datatables responsive */

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paging: false,
                order: [[0, "desc"]]
            });
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });

        document.getElementById('value_text')
            .addEventListener('change', function (ev) {
                var type = document.getElementById('method');
                if(type.value == 'coupon') {
                    ev.target.value = ev.target.value.replace(/-/g, '');
                }
            });

    </script>
@endsection