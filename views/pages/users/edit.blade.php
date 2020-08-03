@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Editar Usuário - {{ $user->username }}</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <form method="post" action="{{ route('users.update', ['id' => $user->id]) }}"
                      class="form-horizontal bordered-row">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Login:</label>
                        <div class="col-md-2">
                            <input type="text" name="username" disabled value="{{ $user->username }}"
                                   class="form-control" id="username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Senha:</label>
                        <div class="col-md-2">
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-md-2">
                            <button class="btn btn-black"><i class="glyph-icon icon-save"></i> Atualizar Usuário
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection