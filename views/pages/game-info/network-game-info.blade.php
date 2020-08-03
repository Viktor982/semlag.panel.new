@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Game Info - Network info</h2>
        
        
    </div>
    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        
                        <th>ID Rulegroup</th>
                        <th>Rulegroup Name</th>
                        <th>Average PPS IN</th>
                        <th>Average PPS OUT</th>
                        <th>Average KBPS IN</th>
                        <th>Average KBPS OUT</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>ID Rulegroup</th>
                        <th>Rulegroup Name</th>
                        <th>Average PPS IN</th>
                        <th>Average PPS OUT</th>
                        <th>Average KBPS IN</th>
                        <th>Average KBPS OUT</th>
                    </tr>
                    </tfoot>
                    @foreach($network as $info)
                        <tr>
                            <td>{{ $info->id_rulegroup }} </td>
                            <td>{{ $info->rule_rulegroup_name }} </td>
                            <td>{{ $info->avg_pps_in }}</td>
                            <td>{{ $info->avg_pps_out }} </td>
                            <td>{{ $info->avg_kbps_in }} </td>
                            <td>{{ $info->avg_kbps_out }}</td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
   
@endsection