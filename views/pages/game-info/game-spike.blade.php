@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Game Info - Spike</h2>
        <p>Monitoramento de Spike</p>
        
    </div>
    <div class="panel">
        <div class="panel-body">
            <div class="form-horizontal bordered-row">
                <form method="get" action="{{ route('game-info.spike') }}">
                    <button class="btn btn-sm btn-warning" type="submit">Buscar por versão</button>
                    
                    <div class="col-sm-2">
                        <div class="input-group">
                            <span class="input-group-addon bg-white border-left-0"><i class="glyph-icon icon-search"></i></span>
                            <input class="form-control" type="name" id="version_mask"
                             placeholder="Exemplo 0.0.0" name="software_version">
                        </div>
                    </div>

                </form>
            </div>
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Nº Registros</th>
                        <th>Email</th>
                        <th>Servidor</th>
                        <th>Jogo</th>
                        <th>Versão do Software</th>
                        <th>Lat. Média - Jogo</th>
                        <th>Lat. Média - Noping</th>
                        <th>Lat. Média - Google</th>
                        <th>Lat. Média - Cloudflare</th>
                        <th>Packet Loss</th>
                        <th>Criado em</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Nº Registros</th>
                        <th>Email</th>
                        <th>Servidor</th>
                        <th>Jogo</th>
                        <th>Versão do Software</th>
                        <th>Lat. Média - Jogo</th>
                        <th>Lat. Média - Noping</th>
                        <th>Lat. Média - Google</th>
                        <th>Lat. Média - Cloudflare</th>
                        <th>Packet Loss</th>
                        <th>Criado em</th>
                    </tr>
                    </tfoot>
                    @foreach($sessions as $session)
                        <tr>
                            <td>{{ $session['count'] }} </td>
                            <td>{{ $session['user_email'] }} </td>
                            <td>{{ $session['server_name'] }} </td>
                            <td>{{ $session['session_name'] }} </td>
                            <td>{{ $session['software_version'] }} </td>
                            <td>{{ round($session['lat_game'],2) }} </td>
                            <td>{{ round($session['lat_noping'],2) }} </td>
                            <td>{{ round($session['lat_first_8.8.8.8'],2) }} </td>
                            <td>{{ round($session['lat_second_1.1.1.1'],2) }} </td>
                            @if ($session['lat_game'] > 20000 || $session['lat_noping'] > 20000 || $session['lat_first_8.8.8.8'] > 20000 || $session['lat_second_1.1.1.1'] > 20000)
                            <td>Sim</td>
                            @else
                            <td>Não</td>
                            @endif
                            <td>{{ $session['date'] }} </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
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

    $(document).ready(function(){
            $('#version_mask').mask('0.0.000');
        });
</script>
@endsection