@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Route database - Bridge Status</h2>
    </div>
    <div  class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <table  id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Bridge IP</th>
                        <th>Client Port TCP</th>
                        <th>Client Port UDP</th>
                        <th>Egress Bandwith Max</th>
                        <th>Egress Bandwith Min</th>
                        
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Bridge IP</th>
                        <th>Client Port TCP</th>
                        <th>Client Port UDP</th>
                        <th>Egress Bandwith Max</th>
                        <th>Egress Bandwith Min</th>
                    </tr>
                    </tfoot>
                    @foreach($bridgeStatus as $status)
                     <tr>
                        <td>{{ $status['name'] }}</td>
                        <td>{{ $status['display_name'] }}</td>
                        <td>{{ $status['bridge_ip'] }} </td>
                        <td>{{ $status['client_port_tcp'] }}</td>
                        <td>{{ $status['client_port_udp'] }}</td>
                        <td>{{ $status['egress_bandwith_max'] }}</td>
                        <td>{{ $status['egress_bandwith_min'] }}</td>
                    </tr>   
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
   
@endsection