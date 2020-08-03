@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Dados Afiliado</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
            </h3>

            <div class="example-box-wrapper">
                <div class="content">
                    <h3>NP Administration - Dados de Afiliado:
                        <mark>21joao</mark>
                    </h3>
                    <div class="row">
                        <div class="col-md-push-1 col-md-4">
                            <div class="panel panel-success thumbnail2">
                                <div class="panel-heading">
                                    <h4 class="panel-title  bg-green text-center">Acessos Totais</h4>
                                </div>
                                <div class="panel-body">
                                    <p class="text-center">15</p>
                                </div>
                            </div>
                            <div class="panel panel-success thumbnail2">
                                <div class="panel-heading">
                                    <h4 class="panel-title  bg-green text-center">Vendas Totais</h4>
                                </div>
                                <div class="panel-body">
                                    <p class="text-center">1</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-push-2 col-md-5">
                            <div class="panel panel-success thumbnail2">
                                <div class="panel-heading">
                                    <h4 class="panel-title text-center">Informações</h4>
                                </div>
                                <form action="" method="post">
                                    <input type="hidden" name="request" value="update_info">
                                    <input type="hidden" name="uid" value="73542">
                                    <div class="panel-body">
                                        <div class="input-group">
<span class="input-group-addon">
</span>
                                            <label for="coderapido" class="form-control"> Anunciante Code Rápido</label>
                                        </div>
                                        <br>
                                        <div class="input-group">
<span class="input-group-addon">
<label for="payment">Método de pagamento</label>
</span>
                                            <select class="form-control" id="payment" name="payment">
                                                <option value="1" SELECTED>NP Key</option>
                                                <option value="2">Dinheiro</option>
                                                <option value="3">NP Key e Dinheiro</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                <span class="input-group-addon">
                                    <label for="keys">Quantidade de NP Keys</label>
                                </span>
                                            <input type="number" class="form-control" id="keys" name="keys" value="1">
                                        </div>
                                    </div>


                                    <div class="panel-footer text-center">
                                        <button class="btn btn-success"><i class="glyph-icon icon-send"></i> Enviar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h4>Contato</h4>

                    <hr>

                    <form class="row" action="" method="post">
                        <input type="hidden" name="request" value="add_contact">
                        <input type="hidden" name="uid" value="72669">
                        <div class="col-md-5">
                            <div class="input-group">
                        <span class="input-group-addon">
                            <label for="metodo">Metodo</label>
                        </span>
                                <input type="text" name="metodo" id="metodo" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="input-group">
                        <span class="input-group-addon">
                            <label for="contato">Contato</label>
                        </span>
                                <input type="text" name="contato" id="contato" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Adicionar</button>
                        </div>
                    </form>

                    <hr>

                    <table id="contatos">
                        <thead>
                        <tr>
                            <th>Método</th>
                            <th>Contato</th>
                            <th>Principal</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Facebook</td>
                            <td>https://www.facebook.com/eric.oneil1</td>
                            <td>
                                <span class="badge badge-success"><i class="glyphicon glyphicon-ok"></i></span>
                            </td>
                            <td>
                                <form action="" method="POST">
                                    <input type="hidden" name="request" value="remove_contact">
                                    <input type="hidden" name="cid" value="15">
                                    <input type="hidden" name="uid" value="72669">
                                    <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <hr>
                    <h4>Anuncios</h4>

                    <hr>

                    <form class="row" action="" method="post">
                        <input type="hidden" name="request" value="add_ad">
                        <input type="hidden" name="uid" value="72669">
                        <div class="col-md-3">
                            <div class="input-group">
                        <span class="input-group-addon">
                            <label for="plataforma">Plataforma</label>
                        </span>
                                <input type="text" name="plataforma" id="plataforma" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                        <span class="input-group-addon">
                            <label for="endereco">Endereço</label>
                        </span>
                                <input type="text" name="endereco" id="endereco" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                        <span class="input-group-addon">
                            <label for="inscritos">Numero de Inscritos</label>
                        </span>
                                <input type="text" name="inscritos" id="inscritos" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success"><i class="glyph-icon icon-plus"></i> Adicionar</button>
                        </div>
                    </form>

                    <hr>

                    <table id="anuncios">
                        <thead>
                        <tr>
                            <th>Plataforma</th>
                            <th>Endereço</th>
                            <th># de Inscritos</th>
                            <th>Principal</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Youtube</td>
                            <td>https://www.youtube.com/channel/UCl3CvJSRKWrZ-Nvj6tBqz-g</td>
                            <td>17000</td>
                            <td>
                                <span class="badge badge-success"><i class="glyph-icon icon-ok"></i></span>
                            </td>
                            <td>
                                <form action="" method="POST">
                                    <input type="hidden" name="request" value="remove_ad">
                                    <input type="hidden" name="aid" value="12">
                                    <input type="hidden" name="uid" value="72669">
                                    <button class="btn btn-danger"><i class="glyph-icon icon-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h4>Jogos</h4>

                    <hr>

                    <form class="row" action="" method="post">
                        <input type="hidden" name="request" value="add_game">
                        <input type="hidden" name="uid" value="72669">
                        <div class="col-md-offset-3 col-md-4">
                            <div class="input-group">
                    <span class="input-group-addon">
                        <label for="jogo">Jogo</label>
                    </span>
                                <select name="jogo" id="jogo" class="form-control">
                                    <option value="1">Tibia</option>
                                    <option value="2">World of Warcraft</option>
                                    <option value="3">Dota</option>
                                    <option value="4">Tera Online</option>
                                    <option value="5">Overwatch</option>
                                    <option value="6">League of Legends</option>
                                    <option value="7">Tree of Savior</option>
                                    <option value="8">Aion: The Tower of Eternity</option>
                                    <option value="9">Skyforge</option>
                                    <option value="10">Legend of Glory</option>
                                    <option value="11">The Division</option>
                                    <option value="12">Diablo III</option>
                                    <option value="13">Medivia</option>
                                    <option value="14">Grand Theft Auto 5</option>
                                    <option value="15">Heroes of the Storm</option>
                                    <option value="16">ArcheAge</option>
                                    <option value="17">Battlefield 1</option>
                                    <option value="18">World of Tanks</option>
                                    <option value="19">Black Desert</option>
                                    <option value="20">Blade & Soul</option>
                                    <option value="21">Call of Duty</option>
                                    <option value="22">Dragon Nest</option>
                                    <option value="23">The Elder Scrolls Online</option>
                                    <option value="24">Final Fantasy XIV: Heavensward</option>
                                    <option value="25">Guild Wars</option>
                                    <option value="26">H1Z1: King of the Kill</option>
                                    <option value="27">Riders of Icarus</option>
                                    <option value="28">Lineage 2</option>
                                    <option value="29">Ragnarok</option>
                                    <option value="31">Revelation Online</option>
                                    <option value="32">Rocket League</option>
                                    <option value="33">Smite</option>
                                    <option value="34">Starcraft 2</option>
                                    <option value="35">Counter-Strike: Global Offensive</option>
                                    <option value="36">Mu Legend</option>
                                    <option value="38">Playerunknown's Battlegrounds</option>
                                    <option value="39">Pokexgames</option>
                                    <option value="40">Conquer Online</option>
                                    <option value="41">Albion Online</option>
                                    <option value="42">Darkfall Rise of Agon</option>
                                    <option value="43">DC Universe Online</option>
                                    <option value="44">Digimon Masters</option>
                                    <option value="45">Dungeons & Dragons Neverwinter</option>
                                    <option value="46">Paladins</option>
                                    <option value="47">Quake Champions</option>
                                    <option value="48">Zezenia</option>
                                    <option value="50">ARK: Survival Evolved</option>
                                    <option value="51">Bless Online</option>
                                    <option value="52">Cabal</option>
                                    <option value="53">Combat Arms</option>
                                    <option value="54">Crossfire</option>
                                    <option value="55">Eve Online</option>
                                    <option value="57">Lodoss War</option>
                                    <option value="58">Trickster</option>
                                    <option value="59">Runescape</option>
                                    <option value="60">Path of Exile</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Adicionar</button>
                        </div>
                    </form>

                    <hr>

                    <table id="jogos">
                        <thead>
                        <tr>
                            <th>Jogo</th>
                            <th>Principal</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Tibia</td>
                            <td>
                                <span class="badge badge-success"><i class="glyphicon glyphicon-ok"></i></span>
                            </td>
                            <td>
                                <form action="" method="POST">
                                    <input type="hidden" name="request" value="remove_game">
                                    <input type="hidden" name="jid" value="10">
                                    <input type="hidden" name="uid" value="72669">
                                    <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection
@section('extra-scripts')
    <script type="text/javascript">

        /* Datatables responsive */

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true
            });
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });

    </script>
@endsection