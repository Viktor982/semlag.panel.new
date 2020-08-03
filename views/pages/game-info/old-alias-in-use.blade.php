@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Game Info - Old Alias</h2>
        <h4><b style="color: green;">{{ $usersOnline }}</b>/<b style="color: gray;">{{  $totalUsers }}</b> Usuarios online</h4>
        <p>Lista de Alias usados.</p>
        
    </div>
    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Alias Name</th>
                        <th>IP</th>
                        <th>Count</th>
                        <th>Total Count</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Alias Name</th>
                        <th>IP</th>
                        <th>Count</th>
                        <th>Total Count</th>
                    </tr>
                    </tfoot>
                    @foreach($alias as $al)
                        <tr>
                            <td>{{ $al->id }} </td>
                            <td>{{ $al->alias_name }} </td>
                            <td>{{ $al->ip }} </td>
                            <td>{{ $al->count }}</td>
                            <td>{{$al->total_count}}</td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
   
@endsection