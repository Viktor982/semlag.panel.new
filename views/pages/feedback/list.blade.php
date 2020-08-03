@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Feedbacks NoPing Alpha</h2>
        <p>Lista de Feedbacks. Total <b>{{ $size }}</b></p>

    </div>
    <div class="panel">

        <div class="panel-body">
            @if(isset($error))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Aviso!</h4>
                        {{ $error }}
                    </div>
            @endif

            <br class="clearfix">
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>IP</th>
                        <th>Email</th>
                        <th>Jogo</th>
                        <th>Servidor</th>
                        <th>PingNP</th>
                        <th>Ping sem NP</th>
                        <th>Windows</th>
                        <th>Comentario</th>
                        <th>Data</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>IP</th>
                        <th>Email</th>
                        <th>Jogo</th>
                        <th>Servidor</th>
                        <th>PingNP</th>
                        <th>Ping sem NP</th>
                        <th>Windows</th>
                        <th>Comentario</th>
                        <th>Data</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($feedbacks as $feedback)
                        
                        <tr>
                            <td>{{ $feedback->ip }}</td>
                            <td>{{ $feedback->email }} </td>
                            <td>{{ $feedback->name_game }}</td>
                            <td>{{ $feedback->server_np }}</td>
                            <td>{{ $feedback->ping_with_np }}</td>
                            <td>{{ $feedback->ping_without_np }}</td>
                            <td>{{ $feedback->version_windows }}</td>
                            <td>{{ $feedback->description }}</td>
                            <td>{{ $feedback->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $feedbacks->render() }}
@endsection
@section('extra-scripts')
    <script type="text/javascript">

        
    </script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paging: false,
            });
        });

       
    </script>
@endsection