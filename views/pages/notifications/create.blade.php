@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Criar notificação</h2>
    </div>
    @if($created)
    <div class="alert alert-success">
        Notificação criada com sucesso
    </div>
    @endif
    <div class="panel">

        <div class="panel-body">
            <div class="example-box-wrapper">
               <form action="{{ route('notifications.store') }}" method="POST" class="form">
                   <div class="form-group">
                        <label for="">Notificação Título</label>
                       <input type="text" class="form-control" name="notification_title" required>
                   </div>
                   <div class="form-group">
                        <label for="">Notificação Display</label>
                       <input type="text" class="form-control" name="notification_display" required>
                   </div>
                   <div class="form-group">
                        <label for="">Notificação Text</label>
                       <textarea class="form-control" name="notification_text" required></textarea> 
                   </div>
                   <div class="form-group">
                       <button class="btn btn-primary">Salvar</button>
                   </div>
               </form>
            </div>
        </div>
    </div>
@endsection
