@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Planos</h2>
        <p>Lista de Planos.</p>

    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                <button class="btn btn-sm btn-black" data-toggle="modal" data-target="#adicionar_plano"><i
                            class="glyph-icon icon-plus-square"></i> Novo Plano
                </button>
            </h3>
            <div class="modal fade" id="adicionar_plano" tabindex="-1" role="dialog"
                 aria-labelledby="adicionar_planolabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Adicionar Novo Plano</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal bordered-row" action="{{ route('plans.store') }}"
                                  method="post">
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">Nome</label>
                                    <div class="col-md-4">
                                        <input id="name" name="nome" type="text" class="form-control input-md"
                                               required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="price_real">Preço em Reais (BRL)</label>
                                    <div class="col-md-4">
                                        <input id="price_1" name="value[1]" type="text" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="price_usd">Preço em Dolares (USD)</label>
                                    <div class="col-md-4">
                                        <input id="price_2" name="value[2]" type="text" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="price_npcoins">Preço em NPCoins</label>
                                    <div class="col-md-4">
                                        <input id="npcoin" name="npcoin" type="number" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="frequency">Frequência e Período</label>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input id="frequency" name="frequency" class="form-control" type="number">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="special">Premium</label>
                                    <div class="col-md-4">
                                        <div class="checkbox">
                                            <label for="special-0">
                                                <input type="checkbox" name="special" id="special-0" value="1">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="special">Ativo?</label>
                                    <div class="col-md-4">
                                        <div class="checkbox">
                                            <label for="special-0">
                                                <input type="checkbox" name="active" id="active" value="1">
                                            </label>
                                        </div>
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
                        <th>Preço</th>
                        <th>Dias</th>
                        <th>Status</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Dias</th>
                        <th>Status</th>
                        <th>Opções</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($plans as $plan)
                        <tr>
                            <td>{{$plan->id}}</td>
                            <td>{{$plan->nome}}</td>
                            <td><p><b>BRL</b>: {{ $plan->planValues[0]->value }}</p>
                                <p><b>USD</b>: {{ $plan->planValues[1]->value  }} </p></td>
                            <td>{{$plan->frequency}}x {{$plan->period}}</td>
                            <td>{{ ($plan->status) ? 'Ativo':"Inativo" }}</td>
                            <td>
                            {!! aroute('<i class="glyph-icon icon-edit"></i> Precificar</a>', 'plans-values.edit', ['id' => $plan->id], ['class' => 'btn btn-sm btn-black'])!!}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $plans->render() }}
@endsection

@section('extra-scripts')
    <script type="text/javascript">

        /* Datatables responsive */

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paging: false
            });
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });

    </script>
@endsection
