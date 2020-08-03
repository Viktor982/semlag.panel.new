@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>{{$name}}</h2>
        <p>Pings de {{$ip}} para todos os servidores.</p>
    </div>
    <div class="panel">

        <div class="panel-body">
            <br class="clearfix">
            <div class="form-horizontal bordered-row">
            <button class="btn btn-sm btn-warning" onclick="window.location.href = '{{route('bridge.pings.home')}}';"><i
                    class="glyph-icon icon-plus-square"></i> Voltar à lista
                </button>
            </div>
                
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-hover table-bordered responsive no-wrap sortable"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr style="cursor: pointer;">
                        <th>ID</th>
                        <th>Nome</th>
                        <th>IP</th>
                        <th>Tipo</th>
                        <th>Loss</th>
                        <th>ICMP Min.</th>
                        <th>ICMP Avg.</th>
                        <th>ICMP Max.</th>
                        <th>Última Atualização</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>IP</th>
                        <th>Tipo</th>
                        <th>Loss</th>
                        <th>ICMP Min.</th>
                        <th>ICMP Avg.</th>
                        <th>ICMP Max.</th>
                        <th>Última Atualização</th>
                    </tr>
                    </tfoot>

                    <tbody>
                        @if($servers != null)
                        @foreach ($servers as $server)
                        <tr>
                            <td>{{$server->id}}</td>
                            <td>
                                <a href="{{ route('bridge.pings.servers', ['id' => $server->id]) }}">{{$server->name}}</a>
                            </td>
                            <td>
                                <a href="{{ route('bridge.pings.servers', ['id' => $server->id]) }}">{{$server->ipd}}</a>
                            </td>
                            <td>{{$server->type}}</td>
                            <td>{{$server->loss}}</td>
                            <td>{{$server->icmpmin}}</td>
                            <td>{{$server->icmpavg}}</td>
                            <td>{{$server->icmpmax}}</td>
                            <th>{{$server->updated_at}}</th>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td style="color:crimson; align-text:center; font-weight:bold; font-size:20;" colspan="9">
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;Servidor parece estar offline!<br><br></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
<script>

$(document).ready(function () {
    $('#datatable-responsive').DataTable({
        responsive: true,
        paging: false,
    });
});

</script>

@endsection