@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Atualizar Rulegroups</h2>
    </div>
<div class="panel">
    <div class="panel-body">
        <div class="example-box-wrapper">
            <form class="form-horizontal bordered-row" method="POST" action="{{ route('rules.show.update') }}">
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{$request['id']}}">
                    <input type="hidden" name="rule_rulegroup_name" value="{{$request['rule_rulegroup_name']}}">
                    <input type="hidden" name="rule_protocol" value="{{$request['protocol']}}">
                    <input type="hidden" name="rule_protocol" value="{{$request['rule_rulegroup_fullname']}}">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ID:</label>
                        <div class="col-sm-6">
                            <input type="text" name="id" value="{{$request['id']}}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Rulegroup name:</label>
                        <div class="col-sm-6">
                            <input type="text" name="rule_rulegroup_name" value="{{ $request['rule_rulegroup_name'] }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Protocol:</label>
                        <div class="col-sm-6">
                            <input type="text" id="rule_protocol" name="rule_protocol" value="{{ $request['rule_protocol']}}" class="form-control">
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Fullname:</label>
                    <div class="col-sm-6">
                        <input type="text" id="rule_rulegroup_fullname" name="rule_rulegroup_fullname" value="{{ $request['rule_rulegroup_fullname']}}" class="form-control">
                    </div>
                </div>
                <div class="form-group" align="right">
                    <button href="{{ route('rules.show.rulegroup')}}"type="submit" class="btn btn-default">Voltar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                <div class="modal-footer">
                </div>
                </div>
                </form>
        </div>
        <style>
        .center-div {
             align-self: center;
             width: fit-content; 
            }
        </style>
            
            <div class="center-div">
                <div class="example-box-wrapper">
                    <div class="col-sm-6" width="100%">
                        <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap">
                            <thead>
                            <tr>
                                <th>Rulegroup Name</th>
                                <th>Rulegroup ID</th>
                                <th>Options</th>
                                <th>Values</th>
                                <th colspan="2">Ações</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Rulegroup Name</th>
                                <th>Rulegroup ID</th>
                                <th>Option</th>
                                <th>Values</th>
                                <th colspan="2">Ações</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($options as $option)
                            @if ($option->id_rulegroup == $request['id'])
                                <tr>
                                    <td>{{ $request['rule_rulegroup_name'] }}</td>
                                    <td>{{ $option->id_rulegroup }}</td>
                                    <td>{{ $option->options_name }}</td>
                                    <td>{{ $option->options_value }}</td>
                                    <td>
                                        <a href="{{route('rules.show.delete.option', ['id' => $option->id_rulegroup, 'options_name' => $option->options_name,  'options_value' => $option->options_value])}}">
                                            Remover
                                        </a>
                                    </td>
                                </tr>

                                @endif
                            @endforeach
                        </table>
                    </div> 
                </div>
            </div>
            <form class="form-horizontal bordered-row" method="POST" action="{{ route('rules.show.add.option', ['id' => $request['id']])}}">
                <div class="form-group center-div">
                    <label class="col-sm-3 control-label">Option:</label>
                    <div class="col-sm-6">
                        <input type="text" name="options_name" value="" class="form-control">
                    </div>
                </div>
                <div class="form-group center-div">
                    <label class="col-sm-3 control-label">Value:</label>
                    <div class="col-sm-6">
                        <input type="text" name="options_value" value="" class="form-control">
                    </div>
                </div>
                <div class="form-group" align="center">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
                    <div class="modal-footer">
                    </div>
            </form>
    </div>
</div>
@endsection