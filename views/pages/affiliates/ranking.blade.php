@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Relatório de Vendas</h2>
    </div>
    <style>
        
        tbody tr:hover {
            transform: scale(1.01);
            background: #ff0000;
            color: #ffffff;
            transition: 0.2s 0s ease-in-out;
        }
        tbody tr:hover td{
            color: #ffffff !important;
        }
        tbody tr:hover td a{
            color: #ffffff !important;
            font-weight: bold;
        }
        div#sb-site {
            min-height: fit-content !important;
        }
        div#page-content {
            min-height: fit-content !important;
        }
    </style>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">Vendas e Pageviews Por Afiliado
            </h3>
            <div class="example-box-wrapper">
                <table id="datatable-responsive" style="font-size:10px;" class="table  responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th colspan="4"></th>
                        <th style="background-color:#74D856; color:#510857; vertical-align: middle;" colspan="4">Vendas</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;" colspan="4">Registros</th>
                    </tr>
                    <tr>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Email:</th>

                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Registros:</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Usuários Ativos:</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Vendas Aprovadas:</th>

                        <th style="border-left: 5px #74D856 solid; background-color:#74D856; color:#510857; vertical-align: middle;">Ontem</th>
                        <th style="background-color:#74D856; color:#510857; vertical-align: middle;">Hoje</th>
                        <th style="background-color:#74D856; color:#510857; vertical-align: middle;">Última semana</th>
                        <th style="border-right: 5px #74D856 solid; background-color:#74D856; color:#510857; vertical-align: middle;">Ultimos 30 dias</th>

                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Ontem</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Hoje</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Última semana</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Ultimos 30 dias</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Ações</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr style="border-top: 5px #510857 solid;">
                        <th colspan="4"></th>
                        <th style="background-color:#74D856; color:#510857; vertical-align: middle;" colspan="4">Vendas</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;" colspan="4">Registros</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($result as $affiliate)
                        <tr>
                            <td style="text-align:center; border: 5px solid #510857; border-bottom:none; border-right:none;"><a style="color: black; font-size: 12px;" href="{{ route('customers.edit', ['id' => $affiliate['id']]) }}" target="_blank">{{ $affiliate['usuario'] ?? 0 }}</a></td>

                            <td style="text-align:center; border: 5px solid #510857; border-bottom:none; border-left:none; border-right:none; color: #510857; font-weight: bold; font-size: 12px; padding:7px;">{{ $affiliate['registros_totais'] ?? 0 }}</td>
                            <td style="text-align:center; border: 5px solid #510857; border-bottom:none; border-left:none; border-right:none; color: red; font-weight: bold; font-size: 12px; padding:7px;">{{ $affiliate['ativos'] ?? 0 }}</td>
                            <td style="background-color: #510857; text-align:center; border: 5px solid #510857; border-bottom:none; border-left:none; border-right:none; color: #74D856; font-weight: bold; font-size: 12px; padding:7px;">{{ $affiliate['vendas_totais'] ?? 0 }}</td>

                            <td style="text-align:center; border: 5px solid #74D856; border-bottom:none; border-left:solid 5px #74D856; border-right:none; color: #510857; font-weight: bold; font-size: 12px; padding:7px;">{{ $affiliate['vendas_ontem'] ?? 0 }}</td>
                            <td style="text-align:center; border: 5px solid #74D856; border-bottom:none; border-left:none; border-right:none; color: #510857; font-weight: bold; font-size: 12px; padding:7px;">{{ $affiliate['vendas_hoje'] ?? 0 }}</td>
                            <td style="text-align:center; border: 5px solid #74D856; border-bottom:none; border-left:none; border-right:none; color: #510857; font-weight: bold; font-size: 12px; padding:7px;">{{ $affiliate['vendas_semana'] ?? 0 }}</td>
                            <td style="text-align:center; border: 5px solid #74D856; border-bottom:none; border-left:none; border-right:solid 5px #74D856; color: #510857; font-weight: bold; font-size: 12px; padding:7px;">{{ $affiliate['vendas_mes'] ?? 0 }}</td>

                            <td style="text-align:center; border: 5px solid #510857; border-bottom:none; border-left:none; border-right:none; color: #510857; font-weight: bold; font-size: 12px; padding:7px;">{{ $affiliate['registros_ontem'] ?? 0 }}</td>
                            <td style="text-align:center; border: 5px solid #510857; border-bottom:none; border-left:none; border-right:none; color: #510857; font-weight: bold; font-size: 12px; padding:7px;">{{ $affiliate['registros_hoje'] ?? 0 }}</td>
                            <td style="text-align:center; border: 5px solid #510857; border-bottom:none; border-left:none; border-right:none; color: #510857; font-weight: bold; font-size: 12px; padding:7px;">{{ $affiliate['registros_semana'] ?? 0 }}</td>
                            <td style="text-align:center; border: 5px solid #510857; border-bottom:none; border-left:none; color: #510857; font-weight: bold; font-size: 12px; padding:7px;">{{ $affiliate['registros_mes'] ?? 0 }}</td>
                            <td style="background-color: #510857; text-align:center; border: 5px solid #510857; border-bottom:none; border-left:none; color: #510857; font-weight: bold; font-size: 12px; padding:7px;"><a href="{{ route('affiliates.vendas', ['id' => $affiliate['id']]) }}"><i style="color:#fff;" class="glyph-icon icon-shopping-cart"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script type="text/javascript">

        /* Datatables responsive */

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paginate: true,
                order:[]
            });
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });

    </script>
@endsection