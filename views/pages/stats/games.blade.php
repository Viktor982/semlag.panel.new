@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Estatísticas - Games</h2>
    </div>
    <form class="form-horizontal" method="post" action="">
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="dias">Modo</label>
                <div class="col-md-4">
                    <div class="input-group">
                        <select id="mode" class="form-control">
                            <option value="1" selected>Usuários</option>
                            <option value="2">Trials</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group pull-right">
                <label class="col-md-4 control-label" for="dias">Contar a partir de</label>
                <div class="col-md-4">
                    <div class="input-group">
                        <input id="dias" name="date" class="form-control" value="" type="datetime-local" required="">
                        <span id="appe" class="input-group-addon"></span>
                    </div>
                    Hora MYSQL: 2016-12-12 22:30:17
                </div>
                <button name="submit" class="btn btn-black"><span class="glyph-icon icon-search"></span></button>
            </div>
        </fieldset>
    </form>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            </thead>
            <tr>
                <th style="text-align: center">Usuários Contabilizados</th>
            </tr>
            <tbody>
            <tr>
                <td style="text-align: center">
                    <h1>61075</h1>
                </td>
            </tr>
            <tr>
                <th style="text-align: center">Aplicativos utilizados</th>
            </tr>
            <tr>
                <td style="text-align: center">
                    <div class="col-md-3 thumbnail">
                        <input data-fgColor="#455c55" type="text" class="input-knob" value='4193' data-max="61075"
                               data-readOnly="true">
                        <p>
                            <b>Tibia.exe</b>
                        </p>
                        <p>
                            <b>6.87% dos usuarios</b>
                        </p>
                    </div>
                    <div class="col-md-3 thumbnail">
                        <input data-fgColor="#9c1d0d" type="text" class="input-knob" value='879' data-max="61075"
                               data-readOnly="true">
                        <p>
                            <b>chrome.exe</b>
                        </p>
                        <p>
                            <b>1.44% dos usuarios</b>
                        </p>
                    </div>
                    <div class="col-md-3 thumbnail">
                        <input data-fgColor="#994a97" type="text" class="input-knob" value='791' data-max="61075"
                               data-readOnly="true">
                        <p>
                            <b>Tibia11.exe</b>
                        </p>
                        <p>
                            <b>1.30% dos usuarios</b>
                        </p>
                    </div>
                    <div class="col-md-3 thumbnail">
                        <input data-fgColor="#d906c1" type="text" class="input-knob" value='396' data-max="61075"
                               data-readOnly="true">
                        <p>
                            <b>bns.exe</b>
                        </p>
                        <p>
                            <b>0.65% dos usuarios</b>
                        </p>
                    </div>
                    <div class="col-md-3 thumbnail">
                        <input data-fgColor="#628685" type="text" class="input-knob" value='308' data-max="61075"
                               data-readOnly="true">
                        <p>
                            <b>League of Legends.exe</b>
                        </p>
                        <p>
                            <b>0.50% dos usuarios</b>
                        </p>
                    </div>
                    <div class="col-md-3 thumbnail">
                        <input data-fgColor="#2a8c46" type="text" class="input-knob" value='276' data-max="61075"
                               data-readOnly="true">
                        <p>
                            <b>Black Desert Online Launcher.exe</b>
                        </p>
                        <p>
                            <b>0.45% dos usuarios</b>
                        </p>
                    </div>
                    <div class="col-md-3 thumbnail">
                        <input data-fgColor="#9f44e2" type="text" class="input-knob" value='257' data-max="61075"
                               data-readOnly="true">
                        <p>
                            <b>client.exe</b>
                        </p>
                        <p>
                            <b>0.42% dos usuarios</b>
                        </p>
                    </div>
                    <div class="col-md-3 thumbnail">
                        <input data-fgColor="#ad6659" type="text" class="input-knob" value='242' data-max="61075"
                               data-readOnly="true">
                        <p>
                            <b>aion.bin</b>
                        </p>
                        <p>
                            <b>0.40% dos usuarios</b>
                        </p>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>


@endsection
@section('extra-scripts')
    <script type="text/javascript">

        /* Knobs inputs */

        $(function () {
            $(".input-knob").knob();
        });

    </script>
@endsection


