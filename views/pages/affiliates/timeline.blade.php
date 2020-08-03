@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Histórico de Vendas</h2>
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
        table a{
            color: rgb(81, 8, 87);
        }
    </style>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">Timeline de Vendas de Afiliados</h3>
            <div class="example-box-wrapper">
                <table id="datatable-responsive" style="font-size:10px;" class="table  responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                    <th style="background-color:#74D856; color:#510857; vertical-align: middle;">Id da Venda</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Email do Comprador</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Valor da Venda</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Data da Venda</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Plano da Venda</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Id de Assinatura</th>
                        <th style="background-color:#74D856; color:#510857; vertical-align: middle;">Cupom</th>
                        <th style="background-color:#74D856; color:#510857; vertical-align: middle;">Valor em NpCoin</th>
                        <th style="background-color:#74D856; color:#510857; vertical-align: middle;">NpCoin em dinheiro</th>
                        <th style="background-color:#74D856; color:#510857; vertical-align: middle;">Email do Afiliado</th>
                        <th style="background-color:#74D856; color:#510857; vertical-align: middle;">% do Afiliado</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr style="border-top: 5px #510857 solid;">
                    <th style="background-color:#74D856; color:#510857; vertical-align: middle;">Id da Venda</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Email do Comprador</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Valor da Venda</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Data da Venda</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Plano da Venda</th>
                        <th style="background-color:#510857; color:#fff; vertical-align: middle;">Id de Assinatura</th>
                        <th style="background-color:#74D856; color:#510857; vertical-align: middle;">Cupom</th>
                        <th style="background-color:#74D856; color:#510857; vertical-align: middle;">Valor em NpCoin</th>
                        <th style="background-color:#74D856; color:#510857; vertical-align: middle;">NpCoin em dinheiro</th>
                        <th style="background-color:#74D856; color:#510857; vertical-align: middle;">Email do Afiliado</th>
                        <th style="background-color:#74D856; color:#510857; vertical-align: middle;">% do Afiliado</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php 
                    $result = $results;
                    ?>
                    @foreach($result as $sell)
                    
                    <?php
                        switch ($sell->plano_id) {
                            case 1:
                                $plano = 'Single Monthly';
                                break;
                            case 4:
                                $plano = 'Single Trimestral';
                                break;
                            case 22:
                                $plano = 'Single Semiannual';
                                break;
                            case 43:
                                $plano = 'Single Annual';
                                break;
                            case 44:
                                $plano = 'Single Weekly';
                                break;
                            default:
                                $plano = 'Não Definido';
                                break;
                        }

                        $comissao = ( $sell->porcentagem_afiliado / 100 ) * $sell->valor;
                    ?>
                        <tr>
                            <td style="text-align:center; border: 5px solid #74D856; border-bottom:none; border-left:solid 5px #74D856; border-right:solid 5px #74D856; color: #510857; font-weight: bold; font-size: 12px; padding:7px;"><a href="/sales/{{ $sell->id }}/edit" title="Ver venda">{{ $sell->id ?? 0 }}</a></td>
                            <td style="text-align:center; border: 5px solid #510857; border-bottom:none;  border-right:none; color: #510857; font-weight: bold; font-size: 12px; padding:7px;"><a href="/customers/{{ $sell->usuario_id }}/edit" title="Ver Usuário">{{ $sell->usuario ?? 0 }}</a></td>
                            <td style="background-color: #510857; text-align:center; border: 5px solid #510857; border-bottom:none; border-left:none; border-right:none; color: #fff; font-weight: bold; font-size: 12px; padding:7px;">{{ $sell->currency_id === 1 ?  'R$'.$sell->valor : '$'.$sell->valor }}</td>             
                            <td style="text-align:center; border: 5px solid #510857; border-bottom:none; border-left:none; border-right:none; color: #510857; font-weight: bold; font-size: 12px; padding:7px;">{{ $sell->data_vigencia ?? 0 }}</td>
                            <td style="background-color: #510857; text-align:center; border: 5px solid #510857; border-bottom:none; border-left:none; border-right:none; color: #fff; font-weight: bold; font-size: 12px; padding:7px;">{{ $plano }}</td>
                            <td style="background-color: #510857; text-align:center; border: 5px solid #510857; border-bottom:none; border-left:none; border-right:none; color: #fff; font-weight: bold; font-size: 12px; padding:7px;"><a style="color: #fff;" href="{{ $sell->id ? '/subscriptions/'.$sell->assinatura_id.'/edit' : '#' }}" title="Ver venda">{{ $sell->assinatura_id ?? '--' }}</a></td>
                            <td style="text-align:center; border: 5px solid #74D856; border-bottom:none; border-left:solid 5px #74D856; border-right:solid 5px #74D856; color: #510857; font-weight: bold; font-size: 12px; padding:7px;">{{ $sell->porcentagem_desconto ? $sell->porcentagem_desconto.'%'  : '0%' }}</td>
                            <td style="text-align:center; border: 5px solid #74D856; border-bottom:none; border-left:solid 5px #74D856; border-right:solid 5px #74D856; color: #510857; font-weight: bold; font-size: 12px; padding:7px;">{{ $sell->currency_id === 1 ? floor($comissao / 0.07) : floor($comissao / 0.0247) }}</td>
                            <td style="text-align:center; border: 5px solid #74D856; border-bottom:none; border-left:solid 5px #74D856; border-right:solid 5px #74D856; color: #510857; font-weight: bold; font-size: 12px; padding:7px;">{{ $sell->currency_id === 1 ? 'R$'.$comissao : '$'.$comissao }}</td>
                            <td style="text-align:center; border: 5px solid #74D856; border-bottom:none; border-left:solid 5px #74D856; border-right:solid 5px #74D856; color: #510857; font-weight: bold; font-size: 12px; padding:7px;"><a href="/customers/{{ $sell->affiliated_id }}/edit" title="Ver Usuário">{{ $sell->afiliado }}</a></td>
                            <td style="text-align:center; border: 5px solid #74D856; border-bottom:none; border-left:solid 5px #74D856; border-right:solid 5px #74D856; color: #510857; font-weight: bold; font-size: 12px; padding:7px;">{{ $sell->porcentagem_afiliado ? $sell->porcentagem_afiliado.'%'  : '0%' }}</td>
                                                         
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