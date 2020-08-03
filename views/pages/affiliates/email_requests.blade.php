@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Emails</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                Filtro por Status:
                <center>
                    <a href="{{ route('affiliates.email-requests') }}">
                        <button class="btn ra-100 btn-black">Todos</button>
                    </a>
                    <a href="{{ route('affiliates.email-requests.approved') }}">
                        <button class="btn ra-100 btn-success">Aprovados</button>
                    </a>
                    <a href="{{ route('affiliates.email-requests.disapproved') }}">
                        <button class="btn ra-100 btn-warning">Reprovados</button>
                    </a>
                    <a href="{{ route('affiliates.email-requests.pending') }}">
                        <button class="btn ra-100 btn-danger">Pendentes</button>
                    </a>
                </center>

                <div class="form-horizontal bordered-row">
                    <form class="form-group" action="{{ route('affiliates.email-request.search') }}" method="post">
                        <label class="col-sm-2 control-label">Pesquisa:</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="method" name="method">
                                <option value="email-affiliate">Email do Afiliado</option>
                                <option value="email-customer">Email do Cliente</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
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
            </h3>

            <div id="result"></div>

            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Afiliado:</th>
                        <th>Cliente:</th>
                        <th>Corpo:</th>
                        <th>Status:</th>
                        <th>Criado em:</th>
                        <th>Atualizado em:</th>
                        <th>Opções:</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Afiliado:</th>
                        <th>Cliente:</th>
                        <th>Corpo:</th>
                        <th>Status:</th>
                        <th>Criado em:</th>
                        <th>Opções:</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($emails as $email)
                        <tr>
                            <td>{{ $email->id }}</td>
                            <td>{{ $email->affiliate->usuario }}</td>
                            <td>{{ $email->customer->usuario }}</td>
                            <td>{{ $email->body }}</td>
                            <td>
                                @if($email->status == 1)
                                    <center>
                                        <b>Pendente</b>
                                        <br>
                                        <button class="btn btn-sm btn-success"
                                                onclick="setStatusEmail({{ $email->id }},2);" title="Aprovar Email">
                                            <span class="glyph-icon icon-check"></span>
                                        </button>
                                        <button class="btn btn-sm btn-warning"
                                                onclick="setStatusEmail({{ $email->id }}, 3);" title="Reprovar Email">
                                            <span class="glyph-icon icon-remove"></span>
                                        </button>
                                    </center>
                                @else
                                    <center>
                                        <b>{!! ($email->status == 2)
                                         ?
                                         "<button class='btn btn-sm btn-success'>Email Aprovado <span class='glyph-icon icon-check'></span></button>"
                                         :
                                         "<button class='btn btn-sm btn-warning'>Email Reprovado <span class='glyph-icon icon-remove'></span></button>" !!}</b>
                                    </center>

                                @endif
                            </td>
                            <td>{{ brDate($email->created_at) }}</td>
                            <td>{{ brDate($email->updated_at) }}</td>
                            <td>
                                <a href="{{ route('affiliates.email.view', ['id' => $email->id]) }}" target="_blank">
                                    <button class="btn btn-sm btn-black">
                                        <span class="glyph-icon icon-eye"></span> Visualizar Email
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $emails->render() }}

@endsection

@section('extra-scripts')
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

        function setStatusEmail(id, status) {
            jQuery(document).ready(function () {
                var action = $("#action-confirm").val();
                jQuery.ajax({
                    type: "POST",
                    url: '{{ route('affiliates.email-request-update') }}',
                    data: {id: id, status: status},
                    success: function (data) {
                        console.log(data);
                        $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-success"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-green alert-icon"><i class="glyph-icon icon-check"></i></div><div class="alert-content"><h4 class="alert-title">Pronto!</h4><p><b>Sua Solicitição foi atendida com sucesso.</b></p></div></div></div></div></div></div></div></div></div></div>');
                        //setInterval('window.location.reload()', 1500);
                    },
                    error: function (data) {
                        $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-danger"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-red alert-icon"><i class="glyph-icon icon-remove"></i></div><div class="alert-content"><h4 class="alert-title">Erro!</h4><p><b>Favor entrar em contato com o desenvolvedor.</b></p></div></div></div></div></div></div></div></div></div></div>');
                    }
                });
            });
        }

    </script>

@endsection
