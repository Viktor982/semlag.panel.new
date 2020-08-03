@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Atualizar Server</h2>
    </div>

<div class="panel">
    <div class="panel-body">
        <div class="example-box-wrapper">
        <form class="form-horizontal bordered-row" method="POST" action="{{ route('bridge.bridge.update') }}">
            <div class="modal-body">
                <input type="hidden" name="id" value="{{ $server->id }}">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nome:</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" value="{{ $server->name }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                <input type="hidden" name="version" value="{{ $server->version }}"/>
                    <label class="col-sm-3 control-label">Display Name:</label>
                    <div class="col-sm-6">
                        <input type="text" name="display_name" value="{{ $server->display_name }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">País:</label>
                    <div class="col-sm-6">
                        <select name="country_id" id="country" class="form-control" required>
                            <option value="" disabled>Escolha um pais</option>
                            @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Bind IP:</label>
                    <div class="col-sm-6">
                        <input type="hidden" name="type" value="{{ $type }}"/>
                        <input type="text" name="bind_ip" value="{{ $server->bind_ip }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-horizontal bordered-row">
                    <label class="col-sm-3 control-label">IP:</label>
                    <div class="col-sm-6">
                        <input type="text" name="ip" value="{{ $server->ip }}" class="form-control" >
                    </div>
                    @if($type == 'FINAL')
                        <div class="col-sm-3">
                                <button id="add_related_ip" type="button" onclick="addSeveralIps();" class="btn btn-sm">Add IP</button>
                        </div>
                    @endif
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nearest IP:</label>
                    <div class="col-sm-6">
                        <input type="text" name="nearest_ip" value="{{ $server->nearest_ip }}"class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Porta TCP:</label>
                    <div class="col-sm-6">
                        <input type="text" name="port_tcp" value="{{ $server->port_tcp }}" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Porta UDP:</label>
                    <div class="col-sm-6">
                        <input type="text" name="port_udp" value="{{ $server->port_udp }}" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Others:</label>
                    <div class="col-sm-6">
                        <input type="text" name="others" value="{{ $server->others }}" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Cores:</label>
                    <div class="col-sm-6">
                        <input type="text" name="core" value="{{ $server->core }}" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Rules Type (Permission Level):</label>
                    <div class="col-sm-6">
                        <input type="number" name="rules_type" value="{{ $server->rules_type }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Network Limit:</label>
                    <div class="col-sm-6">
                        <input type="number" name="network_limit" value="{{ $server->network_limit }}" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Token:</label>
                    <div class="col-sm-6">
                        <input type="text" name="token" value="{{ $server->token }}" class="form-control" readonly>
                    </div>
                </div>
                <div id="add-id">
                @if($ips != null && $ips != false && isset($ips) && $ips != "")
                @foreach ($ips as $item)
                <div id='already-ip' class='form-horizontal form-group bordered-row'>
                <div class="form-group">
                        <input type="text" name="old_related[]" value="{{$item->ip}}" hidden>
                        <label class="col-sm-3 control-label">IP Relacionado:</label>
                        <div class="col-sm-6">
                            <input type="text" name="edited_related[]" value="{{ $item->ip }}" class="form-control">
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                </div>
            </div>
            <div class="modal-footer">
                <a href="/bridge/{{ strtolower($type) }}" type="button" class="btn btn-default">Fechar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
    </div>
</div>

@endsection

@section('extra-scripts')
   <script>
    function addSeveralIps() {
      $("#add-id").append("<div id='added-ip' class='form-horizontal form-group bordered-row'>"
                         +"     <label class='col-sm-3 control-label'>Novo IP Relacionado:</label>"
                         +"           <div class='col-sm-6'>"
                         +"               <input type='text' name='new_ips[]' class='form-control' required>"
                         +"           </div>"
                         +"           <div class='col-sm-3'>"
                         +"                   <button id='delete-parent-ip' type='button' onclick='deleteIp(this.id);' class='btn btn-sm btn-primary'>Delete</button>"
                         +"           </div>"
                         +"</div>");  
  }

function deleteIp(id) {
    $("#"+id).closest('#added-ip').remove();
}

       $(document).ready(function() {
            document.getElementById('country').value = {!! $server->country_id !!};            
       })
   </script>
@endsection