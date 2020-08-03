@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Clientes</h2>
        <p>Lista de Clientes.</p>
    </div>
    <div class="panel">
        <div class="panel-body">
            <div class="form-horizontal bordered-row">
                <form class="form-group" action="{{ route('customers.search') }}" method="post">
                    <label class="col-sm-3 control-label">Filtro</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="method" name="method">
                            <option value="email">Email</option>
                            <option value="id">ID</option>
                            <option value="nome">Nome</option>
                            <option value="refcode">Código de Referência</option>
                            <option value="refmeter">Link de Referência</option>
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
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#adicionar_usuario"><i
                            class="glyph-icon icon-plus-square"></i> Novo Cliente
                </button>
            </div>
            <br class="clearfix">
            <div class="modal fade" id="adicionar_usuario" tabindex="-1" role="dialog"
                 aria-labelledby="adicionar_usuariolabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Adicionar Novo Cliente</h4>
                        </div>
                        <form class="form-horizontal bordered-row" method="POST"
                              action="{{ route('customers.store') }}">
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

            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nível</th>
                        <th>Status</th>
                        <th>Pontos</th>
                        <th>Dias</th>
                        <th>Opções</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nível</th>
                        <th>Status</th>
                        <th>Pontos</th>
                        <th>Dias</th>
                        <th>Opções</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->nome }} </td>
                        <td>{{ $customer->usuario }}</td>
                        <td>{{ $customer->nivel }}</td>
                        <td>{{ customer_status($customer->status)     }}</td>
                        <td>{{ $customer->points }}</td>
                        <td>{{ $customer->days }}</td>
                        <td>
                            {!! aroute('<i class="glyph-icon icon-envelope-o"></i></a>', 'customers.send-email', ['id' => $customer->id], ['class' => 'btn btn-sm btn-azure'])!!}
                            {!! aroute('<i class="glyph-icon icon-edit"></i> Editar</a>', 'customers.edit', ['id' => $customer->id], ['class' => 'btn btn-sm btn-black'])!!}
                            <button class="open-add_days btn btn-sm btn-blue-alt"
                                    data-id="{{ $customer->id }}"
                                    data-toggle="modal"
                                    data-target="#add_days">
                                <i class="glyph-icon icon-plus-square"></i> VIP
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-lg" id="add_days" tabindex="-1" role="dialog"
         aria-labelledby="add_dayslabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Adicionar Dias:</h4>
                </div>
                <div class="modal-body">
                    <div class="example-box-wrapper form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-5">
                                <button type="button" class="btn btn-azure"><i
                                            class="glyph-icon icon-calendar"></i>
                                    VIP Expira
                                    em: <span
                                            id="days_vip"></span>
                                    Dias
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-5">
                                <button type="button" class="btn btn-azure"><i
                                            class="glyph-icon icon-calendar"></i>
                                    VIP Premium Expira
                                    em: <span
                                            id="days_vip_premium"></span>
                                    Dias
                                </button>
                            </div>
                        </div>

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

                        <input type="hidden" id="id">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Motivo:</label>
                            <div class="col-sm-3">
                                <input type="text" name="reason" class="form-control" id="reason">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <button id="leader-guild" type="button" class="btn btn-blue-alt">
                                <i class="glyph-icon icon-users"> </i>Lider de Guild
                            </button>

                            <button id="tester" type="button" class="btn btn-black">
                                <i class="glyph-icon icon-dollar"></i> Dias de Teste
                            </button>
                        </div>


                    </div>
                </div>


                <div id="show-success" style="display: none">
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

                <div id="show-error" style="display: none">
                    <div class="alert alert-danger">
                        <div class="bg-black alert-icon">
                            <i class="glyph-icon icon-warning"></i>
                        </div>
                        <div class="alert-content">
                            <h4 class="alert-title">Erro</h4>
                            <p id="error-type"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                    <button type="button" id="save-days" class="btn btn-black">Salvar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('extra-scripts')
    <script type="text/javascript">
        $('#reason').bind('keypress', function (e) {
            if (e.keyCode == 13) {
                $('#save-days').trigger('click');
            }
        });
    </script>
    <script type="text/javascript">
        var Success = function (res){
            $("#days_vip").text(res.data.vip_remaining);

            $("#days_vip_premium").text(res.data.vip_premium_remaining);

        };
        var Fail = function (res){

        };
        $(document).on("click", ".open-add_days", function () {
            var id = $(this).data('id');
            $("#id").val(id);
            console.log(id)
            axios.post('{{ route('api.customers.get-days') }}', {
                id: id
            }).then(Success, Fail);
            $(".modal-header #id-modal").text(id);
        });

        var request_update_days = false;

        $('#save-days').click(function () {
            var days = $('#days').val();
            var days_premium = $('#days_premium').val();
            var reason = $('#reason').val();

            var vip_time = $("#days_vip").text();
            var vip_time_premium = $("#days_vip_premium").text();
            $("#show-error").hide();
            $("#show-success").hide();
            var id = $('#id').val();


            var result_vip = Number(vip_time) + Number(days);
            var result_premium = Number(vip_time_premium) + Number(days_premium);

            var callbackSuccess = function (res) {
                if (!res.data.success) {
                    $("#error-type").text(res.data.alert);
                    $("#show-error").show()
                    request_update_days = false;
                } else {
                    $("#show-success").show();
                    $("#days_vip").text(result_vip);
                    $("#days_vip_premium").text(result_premium);
                    setTimeout(function () {
                        $("#add_days").modal('toggle');
                        $("#show-success").hide();
                        request_update_days = false;
                    }, 1500);
                }

            };

            var callbackFail = function (res) {
                $("#error-type").text(res.data.alert);
                $("#show-error").show()
            };

            if (!request_update_days) {
                request_update_days = true;
                axios.post('{{ route('customers.update-days') }}', {
                    days: days,
                    id: id,
                    days_premium: days_premium,
                    reason: reason
                }).then(callbackSuccess, callbackFail);
            }

        });

        $("#leader-guild").click(function(){
            var request_update_days = false;
            var days = 30;
            var days_premium = $('#days_premium').val();
            var reason = "Lider de Guild";
            var id = $('#id').val();


            var vip_time = $("#days_vip").text();
            var vip_time_premium = $("#days_vip_premium").text();
            $("#show-error").hide();
            $("#show-success").hide();

            var result_vip = Number(vip_time) + Number(days);
            var result_premium = Number(vip_time_premium) + Number(days_premium);

            var callbackSuccess = function (res) {
                if (!res.data.success) {
                    $("#error-type").text(res.data.alert);
                    $("#show-error").show()
                } else {
                    $("#show-success").show();
                    $("#days_vip").text(result_vip);
                    $("#days_vip_premium").text(result_premium);
                    setTimeout(function () {
                        $("#add_days").modal('toggle');
                        $("#show-success").hide();
                        request_update_days = false;
                    }, 1500);
                }
            };

            var callbackFail = function (res) {
                $("#error-type").text(res.data.alert);
                $("#show-error").show()
            };

            if (!request_update_days) {
                request_update_days = true;
                axios.post('{{ route('customers.update-days') }}', {
                    days: days,
                    id: id,
                    days_premium: days_premium,
                    reason: reason
                }).then(callbackSuccess, callbackFail);
            }

        });

        $("#tester").click(function(){
            var request_update_days = false;
            var days = 7;
            var days_premium = $('#days_premium').val();
            var reason = "Dias de Teste";
            var id = $('#id').val();


            var vip_time = $("#days_vip").text();
            var vip_time_premium = $("#days_vip_premium").text();
            $("#show-error").hide();
            $("#show-success").hide();

            var result_vip = Number(vip_time) + Number(days);
            var result_premium = Number(vip_time_premium) + Number(days_premium);

            var callbackSuccess = function (res) {
                if (!res.data.success) {
                    $("#error-type").text(res.data.alert);
                    $("#show-error").show()
                } else {
                    $("#show-success").show();
                    $("#days_vip").text(result_vip);
                    $("#days_vip_premium").text(result_premium);
                    setTimeout(function () {
                        $("#add_days").modal('toggle');
                        $("#show-success").hide();
                        request_update_days = false;
                    }, 1500);
                }
            };

            var callbackFail = function (res) {
                $("#error-type").text(res.data.alert);
                $("#show-error").show()
            };

            if (!request_update_days) {
                request_update_days = true;
                axios.post('{{ route('customers.update-days') }}', {
                    days: days,
                    id: id,
                    days_premium: days_premium,
                    reason: reason
                }).then(callbackSuccess, callbackFail);
            }

        });
    </script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paging: false,
            });
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });


        $('#add').click(function () {
            $('#customers_search').append("<option value=" + $('#customer_email').val() + " selected>" + $('#customer_email').val() + "</option>");
            $('#customer_email').val('');
        });
        $('#customers_search').click(function () {
            $('option:selected', this).remove();
        });

    </script>
@endsection