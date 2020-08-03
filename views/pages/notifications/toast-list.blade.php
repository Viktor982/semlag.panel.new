@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Lista de notificações</h2>
    <h4><b style="color: green;">{{ $online_users }}</b>/<b style="color: gray;">{{ $total_users }}</b> Usuários Online</h4>
    </div>
    <div class="panel">

        <div class="panel-body">
            <div class="example-box-wrapper">
                <table id="notifications-datatable-responsive" class="table table-striped table-bordered responsive no-wrap display"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagem</th>
                        <th>Ativo</th>
                        <th>Software</th>
                        <th>Trial</th>
                        <th>Type</th>
                        <th>Duração</th>
                        <th>Mensagem</th>
                        <th>Audio</th>
                        <th>Activated</th>
                        <th>Dismissed</th>
                        <th>IP Range</th>
                        <th>Client Info Range</th>
                        <th>Games Range</th>
                        <th>Linguas</th>
                        <th>Updated At</th>
                        <th>Created At</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Imagem</th>
                        <th>Ativo</th>
                        <th>Software</th>
                        <th>Trial</th>
                        <th>Type</th>
                        <th>Duração</th>
                        <th>Mensagem</th>
                        <th>Audio</th>
                        <th>Activated</th>
                        <th>Dismissed</th>
                        <th>IP Range</th>
                        <th>Client Info Range</th>
                        <th>Games Range</th>
                        <th>Linguas</th>
                        <th>Updated At</th>
                        <th>Created At</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($toasts as $toast)
                        <tr>
                            <td>{{ $toast->id }}</td>
                            <td><img src="{{ $toast->image_url }}" width="96" height="65" alt=""></td>
                            <td>{{ $toast->active }}</td>
                            <td>{{ $toast->software }}</td>
                            <td>{{ $toast->is_trial }}</td>
                            <td>{{ $toast->type }}</td>
                            <td>{{ $toast->duration }}</td>
                            <td>{!! $toast->message !!}</td>
                            <td>{{ $toast->audio }}</td>
                            <td>{{ $toast->on_activated }}</td>
                            <td>{{ $toast->on_dismissed }}</td>
                            <td>{{ $toast->ip_targeting_range }}</td>
                            <td>{{ $toast->client_info_targeting }}</td>
                            <td>{{ $toast->played_games_targeting }}</td>
                            <td>{{ $toast->language_targeting }}</td>
                            <td>{{ $toast->updated_at }}</td>
                            <td>{{ $toast->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
{{-- <script>
        $('#notifications-datatable-responsive').DataTable({
            responsive: true,
            paginate: false
        });
</script> --}}
@endsection