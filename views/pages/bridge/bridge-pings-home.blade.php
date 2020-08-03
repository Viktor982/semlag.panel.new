@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Pings dos servidores</h2>
        <p>Clique no nome ou ip para ver o ping para outros servidores.</p>
    </div>
    <div class="panel">

        <div class="panel-body">
            <br class="clearfix">
            <div class="form-horizontal bordered-row">
                <h3><b>Pesquisar por servidores</b></h3>
            </div>
                
            <br>

            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-hover table-bordered responsive no-wrap sortable"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr style="cursor: pointer;">
                        <th>ID</th>
                        <th>Nome</th>
                        <th>IP</th>
                        <th>Tipo</th>
                        <th>Última Atualização</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>IP</th>
                        <th>Tipo</th>
                        <th>Última Atualização</th>
                    </tr>
                    </tfoot>

                    <tbody>
                        @foreach ($servers as $server)
                        <form>
                        <tr>
                            <td>{{$server->id}}</td>
                            <td>
                                <a href="{{ route('bridge.pings.servers', ['id' => $server->id]) }}">{{$server->name}}</a>
                            </td>
                            <td>
                                <a href="{{ route('bridge.pings.servers', ['id' => $server->id]) }}">{{$server->ip}}</a>
                            </td>
                            <td>{{$server->type}}</td>
                            <th>{{$server->updated_at}}</th>
                        </tr>
                        </form>
                        @endforeach
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