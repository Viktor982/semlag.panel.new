@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Cupons</h2>
        <p>Lista de Cupons Gerados.</p>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
            </h3>

            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuário Dono</th>
                        <th>Origem</th>
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
                        <th>Plano</th>
                        <th>Código</th>
                        <th>Data de Criação</th>
                        <th>Situação</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <tr>
                        @foreach($coupons as $coupon)
                            <td>{{ $coupon->id }}</td>
                            <td>{{ ($coupon->vendedor) ? $coupon->reseller->usuario : ''}}</td>
                            <td>{{ ($coupon->venda_id) ? 'Venda #'.$coupon->venda_id :'Criado Por um Admin' }}</td>
                            <td>{{ $coupon->plan->nome }}</td>
                            <td>{{ coupon($coupon->cupom) }}</td>
                            <td>{{ brDate($coupon->data_cadastro) }}</td>
                            <td>Habilitado</td>
                            <td>{!! ($coupon->user_activated) ? 'utilizado por '.aroute($coupon->customerActivated->usuario, 'customers.edit', ['id' => $coupon->user_activated]).' em '.( new \Carbon\Carbon($coupon->data_utilizacao))->format("d/m/y H:i:s") : '<a class="btn btn-sm btn-success" href="#"> Livre</a>' !!}  </td>
                            <td>
                                <a class="btn btn-sm btn-danger" href="#"><i class="glyph-icon icon-edit"></i>
                                    Desabilitar</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <button class="btn btn-black" onClick="CopyClipboard();">Copiar Todos os Cupons</button>
            </div>
        </div>
    </div>
    <div id="generated-coupons" style="display: none">
        @foreach($coupons as $coupon)
            {{ coupon($coupon->cupom) }}
        @endforeach
    </div>
@endsection
@section('extra-scripts')
    <script type="text/javascript">

        function CopyClipboard(){
            let t = document.createElement('textarea')
            t.id = 't'
            t.style.height = 0
            document.body.appendChild(t)
            t.value = document.getElementById('generated-coupons').innerText
            let selector = document.querySelector('#t')
            selector.select()
            document.execCommand('copy')
            document.body.removeChild(t)
        }

        /* Datatables responsive */

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paging: false,
                order: [[0, "desc"]]
            });
        });

        function copyToClipboard(text) {
            window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
        }

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });

    </script>
@endsection