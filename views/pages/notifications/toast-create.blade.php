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
               <form action="{{ route('toast.store') }}" method="POST" class="form">
                   <div class="form-group">
                        <label for="">Is Trial:</label>
                        <select name="is_trial" id="">
                            <option value="1" selected>1</option>
                            <option value="0">0</option>
                        </select>
                        &nbsp;
                        <label for="">Software ID:</label>
                        <select name="software_id" id="">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        &nbsp;
                        <label for="">Active:</label>
                        <select name="active" id="">
                            <option value="1" selected>1</option>
                            <option value="0">0</option>
                        </select>
                        &nbsp;
                        <label for="">Type:</label>
                        <select name="type" id="">
                            <option value="Text01" selected>Text01</option>
                            <option value="Text02" >Text02</option>
                            <option value="Text03" >Text03</option>
                            <option value="Text04" >Text04</option>
                            <option value="ImageAndText01" >ImageAndText01</option>
                            <option value="ImageAndText02" >ImageAndText02</option>
                            <option value="ImageAndText03" >ImageAndText03</option>
                            <option value="ImageAndText04" >ImageAndText04</option>
                        </select>
                        &nbsp;
                        <label for="">Duration:</label>
                        <select name="duration" id="">
                            <option value="System" selected>System</option>
                            <option value="Short">Short</option>
                            <option value="Long">Long</option>
                        </select>
                        &nbsp;
                        <label for="">Audio:</label>
                        <select name="audio" id="">
                            <option value="Default" selected>Default</option>
                            <option value="Silent">Silent</option>
                            <option value="Loop">Loop</option>
                        </select>
                    </div>
                    <div class="form-group">
                         <label for="">Image URL</label>
                         <input type="text" class="form-control" name="image_url">
                    </div>
                   <div class="form-group">
                        <label for="">First Line</label>
                        <input type="text" class="form-control" name="first_line" required>
                   </div>
                   <div class="form-group">
                        <label for="">Second Line</label>
                        <input type="text" class="form-control" name="second_line">
                   </div>
                   <div class="form-group">
                        <label for="">Third Line</label>
                        <input type="text" class="form-control" name="third_line">
                   </div>
                   <div class="form-group">
                        <label for="">On Activated</label>
                        <textarea type="text" class="form-control" name="on_activated"></textarea>
                   </div>
                   <div class="form-group">
                        <label for="">On Dismissed</label>
                        <textarea type="text" class="form-control" name="on_dismissed"></textarea>
                   </div>
                   <div class="form-group">
                        <label for="">Ip Targeting Range</label>
                        <input type="text" class="form-control" name="ip_targeting_range">
                   </div>
                   <div class="form-group">
                        <label for="">Client Info Targeting</label>
                        <input type="text" class="form-control" name="client_info_targeting">
                   </div>
                   <div class="form-group">
                        <label for="">Played Games Targeting</label>
                        <input type="text" class="form-control" name="played_games_targeting">
                   </div>
                   <div class="form-group">
                        <label for="">Language Targeting</label>
                        <input type="text" class="form-control" name="language_targeting">
                   </div>
                   <div class="form-group">
                       <button class="btn btn-primary">Salvar</button>
                   </div>
               </form>
            </div>
        </div>
    </div>
@endsection
