@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Lista de notificações</h2>
    </div>
    <div class="panel">

        <div class="panel-body">
            <div class="example-box-wrapper">
                <table id="notifications-datatable-responsive" class="table table-striped table-bordered responsive no-wrap display"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Notification Title</th>
                        <th>Notification Display</th>
                        <th>Notification Text</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Notification Title</th>
                        <th>Notification Display</th>
                        <th>Notification Text</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $d)
                        <tr>
                            <td>{{ $d->notification_title }}</td>
                            <td>{{ $d->notification_display }}</td>
                            <td>{{ $d->notification_text }}</td>
                            <td>{{ $d->created_at }}</td>
                            <td>{{ $d->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
@endsection