@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Cupons de Desconto</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                <button class="btn btn-sm btn-black" data-toggle="modal" data-target="#add_cupom"><i
                            class="glyph-icon icon-plus-square"></i> Adicionar Novo Cupom
                </button>
                <button id="discountStats" class="btn btn-sm btn-black" data-toggle="modal" data-target="#stats"><i
                            class="glyph-icon icon-bar-chart"></i></button>
            </h3>

            <!--modal-->
            <div class="modal fade" id="add_cupom" tabindex="-1" role="dialog" aria-labelledby="add_cumpomlabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Adicionar Novo Cupom</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal bordered-row">

                                <fieldset>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="name">Nome</label>
                                        <div class="col-md-10">
                                            <input id="name" name="name" type="text" placeholder="Nome do Cupom"
                                                   class="form-control input-md" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="plans_affected">Planos
                                            Afetados</label>
                                        <div class="col-md-10">
                                            <select id="plans_affected" name="plans_affected[]" class="form-control"
                                                    multiple="multiple">
                                                @foreach($plans as $plan)
                                                    <option value="{{ $plan->id }}">{{ $plan->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="percentage">Porcentagem de
                                            desconto</label>
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <input id="percentage" name="percentage" class="form-control"
                                                       placeholder="" type="number" required="">
                                                <span class="input-group-addon">%</span>
                                            </div>
                                            <p class="help-block">Porcentagem de desconto que o cupom vai oferecer
                                                quando ativado pelo usuário</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="expire_date">Expiração</label>
                                        <div class="col-md-10">
                                            <input id="expire_date" name="expire_date" type="date"
                                                   class="form-control input-md">
                                            <p class="help-block">Data em que o cupom de desconto será deletado</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="name">Código</label>
                                        <div class="col-md-10">
                                            <input id="code" name="code" type="text" placeholder=""
                                                   class="form-control input-md" required="">
                                            <p class="help-block">Código que o usuário deverá inserir para ativar o
                                                desconto</p>
                                        </div>
                                    </div>


                                    <div id="show-discount-success" style="display: none">
                                        <div class="alert alert-success">
                                            <div class="bg-green alert-icon">
                                                <i class="glyph-icon icon-check"></i>
                                            </div>
                                            <div class="alert-content">
                                                <h4 class="alert-title">Atenção!</h4>
                                                <p>A sua solicitação foi atendida com sucesso.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="show-discount-error" style="display: none">
                                        <div class="alert alert-danger">
                                            <div class="bg-black alert-icon">
                                                <i class="glyph-icon icon-warning"></i>
                                            </div>
                                            <div class="alert-content">
                                                <h4 class="alert-title">Erro</h4>
                                                <p id="error-type-discount"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar
                                        </button>
                                        <button type="button" id="insert-discount" class="btn btn-primary">Salvar</button>
                                    </div>

                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--modal-->

            <!--modal-->
            <div class="modal fade" id="stats" tabindex="-1" role="dialog" aria-labelledby="statslabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Estatísticas dos Cupons</h4>
                        </div>
                        <div class="modal-body">
                            <table style="text-align: center;" id="discountStatsTable" class="dataTable table table-hover">
                                <thead>
                                <tr>
                                    <th>Cupom</th>
                                    <th>N° de compras</th>
                                    <th>N° de compras concretizadas</th>
                                </tr>
                                </thead>
                                <tbody>
                            </table>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-black" data-dismiss="modal">Fechar</button>

                        </div>
                    </div>
                </div>
            </div>
            <!--modal-->

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
                                <th>Nome</th>
                                <th>Planos Afetados</th>
                                <th>Porcentagem de Desconto</th>
                                <th>Expira?</th>
                                <th>Código</th>
                                <th>Ações</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Planos Afetados</th>
                                <th>Porcentagem de Desconto</th>
                                <th>Expira?</th>
                                <th>Código</th>
                                <th>Ações</th>
                            </tr>
                            </tfoot>

                            <tbody>
                            @foreach($discounts as $discount)
                                <tr>
                                    <td>{{ $discount->id }}</td>
                                    <td>{{ $discount->name }}</td>
                                    <td>{{ affected_plans($discount->plans_affected) }}</td>
                                    <td>{{ $discount->percentage }}%</td>
                                    <td>{!! ($discount->expire_date) ? 'Expira em: <br>'.brDate($discount->expire_date) :'Não'!!}</td>
                                    <td>{{ $discount->code  }}</td>
                                    <td>
                                        {!! aroute('<i class="glyph-icon icon-edit"></i> Editar</a>', 'discount.edit', ['id' => $discount->id], ['class' => 'btn btn-sm btn-black'])!!}
                                        {!! aroute('<i class="glyph-icon icon-trash"></i> Deletar</a>', 'discount.delete', ['id' => $discount->id], ['class' => 'btn btn-sm btn-danger'])!!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('extra-scripts')
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#datatable-responsive').DataTable({
                        responsive: true,
                        paging: true
                    });
                });
                $(document).ready(function () {
                    $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
                });
            </script>
            <script type="text/javascript">
                $('#discountStats').click(function() {
                    dsTable = $('#discountStatsTable').DataTable({
                       ajax: "{{ route('api.discount.stats') }}",
                        columns: [
                            {data: "name"},
                            {data: "sales"},
                            {data: "salesApproved" }
                        ]
                    });
                });

                $("#stats").on('hidden.bs.modal', function () {
                    dsTable.destroy();
                });

                $("#insert-discount").click(function(){
                    var coupon_name = $('#name').val();
                    var plans = $('#plans_affected').val();
                    var d_percentage = $('#percentage').val();
                    var expire_date = $('#expire_date').val();
                    var code = $('#code').val();
                    var request_insert_discount = false;

                    var callbackSuccess = function (res) {
                        $("#show-discount-success").show()
                        setTimeout(function () {
                            $("#show-discount-success").hide();
                            location.reload();
                            request_insert_discount = false;
                        }, 3000);
                    };

                    var callbackFail = function (res) {
                        $("#error-type-discount").text("Erro! Certifique-se de que todas as informações estão preenchidas e tente novamente.");
                        $("#show-discount-error").show()
                    };

                    if (!request_insert_discount) {
                        request_insert_discount = true
                        axios.post('{{ route('discount.store') }}', {
                            name: coupon_name,
                            plans_affected: plans,
                            percentage: d_percentage,
                            expire_date: expire_date,
                            code: code
                        }).then(callbackSuccess, callbackFail)
                    }
                });
            </script>



@endsection