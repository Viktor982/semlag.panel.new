@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Estatísticas - IPs</h2>
    </div>

    <form class="form-horizontal">
        <fieldset>

            <legend>Buscar informação</legend>

            <div class="form-group">
                <label class="col-md-4 control-label" for="data">IP ou Email</label>
                <div class="col-md-4">
                    <input id="data" name="data" type="text" placeholder="" class="form-control input-md" required="">
                    <span class="help-block">IP ou Email do usuário</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for=""></label>
                <div class="col-md-4">
                    <a id="submit_info" name="" class="btn btn-success">Enviar</a>
                </div>
            </div>
        </fieldset>
    </form>
    <small>28358 possíveis IPs de 28130 usuários</small>
    <div id="datashow" class="col-md-11 table-responsive">
        <div class="row">
            <div class="col-md-12">
                <legend>Gráficos</legend>
                <div class="col-md-4 thumbnail2">
                    <div>
                        <legend>Provedores</legend>
                        <canvas id="orgschart"></canvas>
                    </div>
                    <a class="pull-right btn btn-success" target="_blank" href="download_relatorio.php?a=6">Exportar
                        .xls <span class="glyphicon glyphicon-download"></span></a>
                </div>
                <div class="col-md-4 thumbnail2">
                    <div>
                        <legend>Países</legend>
                        <canvas id="contrieschart"></canvas>
                    </div>
                    <a class="pull-right btn btn-success" target="_blank" href="download_relatorio.php?a=7">Exportar
                        .xls <span class="glyphicon glyphicon-download"></span></a>
                </div>
                <div class="col-md-4 thumbnail2">
                    <div>
                        <legend>Cidades</legend>
                        <canvas id="citieschart"></canvas>
                    </div>
                    <a class="pull-right btn btn-success" target="_blank" href="download_relatorio.php?a=8">Exportar
                        .xls <span class="glyphicon glyphicon-download"></span></a>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection

@section('extra-scripts')

    <script type="text/javascript">
        $(function () {
            var opt = {responsive: true, animation: true};
            var ctx = $("#orgschart").get(0).getContext("2d");
            var myPieChart1 = new Chart(ctx).Pie([{
                "value": 5016,
                "color": "#13cd50",
                "highlight": "#13cd50",
                "label": "AS28573 CLARO S.A."
            }, {
                "value": 4813,
                "color": "#bb46fe",
                "highlight": "#bb46fe",
                "label": "AS18881 Global Village Telecom"
            }, {
                "value": 3420,
                "color": "#dc80e6",
                "highlight": "#dc80e6",
                "label": "AS27699 TELEF\u00d4NICA BRASIL S.A"
            }, {
                "value": 2655,
                "color": "#cc3e66",
                "highlight": "#cc3e66",
                "label": "AS7738 Telemar Norte Leste S.A."
            }, {
                "value": 2059,
                "color": "#e04e74",
                "highlight": "#e04e74",
                "label": "AS8167 Brasil Telecom S\/A - Filial Distrito Federal"
            }, {
                "value": 566,
                "color": "#159b7c",
                "highlight": "#159b7c",
                "label": "AS53006 ALGAR TELECOM S\/A"
            }, {
                "value": 544,
                "color": "#32505a",
                "highlight": "#32505a",
                "label": "AS26615 Tim Celular S.A."
            }, {
                "value": 452,
                "color": "#29b460",
                "highlight": "#29b460",
                "label": "AS8048 CANTV Servicios, Venezuela"
            }, {
                "value": 438,
                "color": "#36870e",
                "highlight": "#36870e",
                "label": "AS8151 Uninet S.A. de C.V."
            }, {
                "value": 372,
                "color": "#d3782d",
                "highlight": "#d3782d",
                "label": "AS18881 TELEF\u00d4NICA BRASIL S.A"
            }, {
                "value": 366,
                "color": "#8f5405",
                "highlight": "#8f5405",
                "label": "AS22047 VTR BANDA ANCHA S.A."
            }, {
                "value": 345,
                "color": "#9ca9a1",
                "highlight": "#9ca9a1",
                "label": "AS7418 TELEF\u00d3NICA CHILE S.A."
            }, {
                "value": 216,
                "color": "#405b10",
                "highlight": "#405b10",
                "label": "AS26599 TELEF\u00d4NICA BRASIL S.A"
            }, {
                "value": 131,
                "color": "#c3179d",
                "highlight": "#c3179d",
                "label": "AS14868 COPEL Telecom S.A."
            }, {
                "value": 116,
                "color": "#cc4d1d",
                "highlight": "#cc4d1d",
                "label": "AS6057 Administracion Nacional de Telecomunicaciones"
            }, {
                "value": 98,
                "color": "#f4d309",
                "highlight": "#f4d309",
                "label": "AS13999 Mega Cable, S.A. de C.V."
            }, {"value": 97, "color": "#c0bc6b", "highlight": "#c0bc6b", "label": "AS10481 Prima S.A."}, {
                "value": 89,
                "color": "#fc6cdd",
                "highlight": "#fc6cdd",
                "label": "AS28343 TPA TELECOMUNICACOES LTDA"
            }, {
                "value": 85,
                "color": "#57de14",
                "highlight": "#57de14",
                "label": "AS19182 TELEF\u00d4NICA BRASIL S.A"
            }, {
                "value": 81,
                "color": "#8b9414",
                "highlight": "#8b9414",
                "label": "AS7922 Comcast Cable Communications, Inc."
            }, {
                "value": 71,
                "color": "#ea9401",
                "highlight": "#ea9401",
                "label": "AS1221 Telstra Pty Ltd"
            }, {
                "value": 67,
                "color": "#54d204",
                "highlight": "#54d204",
                "label": "AS14868 COPEL Telecomunica\u00e7\u00f5es S.A."
            }, {
                "value": 63,
                "color": "#e581cf",
                "highlight": "#e581cf",
                "label": "AS28281 Brasil Telecomunica\u00e7\u00f5es S.A."
            }, {
                "value": 58,
                "color": "#1c3637",
                "highlight": "#1c3637",
                "label": "AS11888 Television Internacional, S.A. de C.V."
            }, {
                "value": 55,
                "color": "#88dfa6",
                "highlight": "#88dfa6",
                "label": "AS28649 Desktop Sigmanet Comunica\u00e7\u00e3o Multim\u00eddia Ltda"
            }, {
                "value": 50,
                "color": "#17940d",
                "highlight": "#17940d",
                "label": "AS7303 Telecom Argentina S.A."
            }, {
                "value": 48,
                "color": "#a7d4b1",
                "highlight": "#a7d4b1",
                "label": "AS28202 Rede Brasileira de Comunicacao Ltda"
            }, {
                "value": 48,
                "color": "#dc10b4",
                "highlight": "#dc10b4",
                "label": "AS28580 CILNET Comunicacao e Informatica LTDA."
            }, {
                "value": 48,
                "color": "#116d50",
                "highlight": "#116d50",
                "label": "AS28220 CABO SERVICOS DE TELECOMUNICACOES LTDA"
            }, {
                "value": 46,
                "color": "#30bee3",
                "highlight": "#30bee3",
                "label": "AS28300 MMA ACESSORIOS E SERVICOS DE INFORMATICA LTDA."
            }, {
                "value": 46,
                "color": "#ee9c85",
                "highlight": "#ee9c85",
                "label": "AS28281 VCB PROVEDOR DE ACESSO LTDA"
            }, {
                "value": 45,
                "color": "#f77b3f",
                "highlight": "#f77b3f",
                "label": "AS22927 Telefonica de Argentina"
            }, {
                "value": 42,
                "color": "#443328",
                "highlight": "#443328",
                "label": "AS28171 S. O. do Brasil Telecomunica\u00e7\u00f5es LTDA ME"
            }, {"value": 38, "color": "#12260d", "highlight": "#12260d", "label": "AS22085 Claro S\/A"}, {
                "value": 37,
                "color": "#14de94",
                "highlight": "#14de94",
                "label": "AS5617 Orange Polska Spolka Akcyjna"
            }, {
                "value": 37,
                "color": "#2fff82",
                "highlight": "#2fff82",
                "label": "AS6503 Axtel, S.A.B. de C.V."
            }, {
                "value": 37,
                "color": "#76ade0",
                "highlight": "#76ade0",
                "label": "AS6147 Telefonica del Peru S.A.A."
            }, {
                "value": 36,
                "color": "#284640",
                "highlight": "#284640",
                "label": "AS14117 Telefonica del Sur S.A."
            }, {
                "value": 36,
                "color": "#9d93d0",
                "highlight": "#9d93d0",
                "label": "AS22689 Internet by Sercomtel S.A."
            }, {
                "value": 35,
                "color": "#d84a43",
                "highlight": "#d84a43",
                "label": "AS28191 Jupiter Telecomunicacoes e Informatica Ltda"
            }, {
                "value": 35,
                "color": "#4da411",
                "highlight": "#4da411",
                "label": "AS10429 Telefonica Data S.A."
            }, {
                "value": 34,
                "color": "#3b5667",
                "highlight": "#3b5667",
                "label": "AS16735 ALGAR TELECOM S\/A"
            }, {"value": 32, "color": "#872048", "highlight": "#872048", "label": "AS25620 COTAS LTDA."}, {
                "value": 32,
                "color": "#3d54fc",
                "highlight": "#3d54fc",
                "label": "AS3352 TELEFONICA DE ESPANA"
            }, {
                "value": 30,
                "color": "#334eae",
                "highlight": "#334eae",
                "label": "AS21826 Corporaci\u00f3n Telemic C.A."
            }, {
                "value": 30,
                "color": "#e08803",
                "highlight": "#e08803",
                "label": "AS53143 RAPCHAN & RAPCHAN LTDA. - ME"
            }, {
                "value": 30,
                "color": "#d4ac3f",
                "highlight": "#d4ac3f",
                "label": "AS22773 Cox Communications Inc."
            }, {
                "value": 29,
                "color": "#9512d5",
                "highlight": "#9512d5",
                "label": "AS262293 Sistema Oeste de Servi\u00e7os LTDA"
            }, {
                "value": 29,
                "color": "#a6f3b1",
                "highlight": "#a6f3b1",
                "label": "AS28126 BRISANET SERVICOS DE TELECOMUNICACOES LTDA"
            }, {
                "value": 27,
                "color": "#38c1eb",
                "highlight": "#38c1eb",
                "label": "AS7018 AT&T Services, Inc."
            }, {
                "value": 27,
                "color": "#73f83e",
                "highlight": "#73f83e",
                "label": "AS28615 Televisao Cidade S\/A"
            }, {
                "value": 27,
                "color": "#bde106",
                "highlight": "#bde106",
                "label": "AS16960 Cablevision Red, S.A de C.V."
            }, {
                "value": 26,
                "color": "#8ca9e3",
                "highlight": "#8ca9e3",
                "label": "AS4739 Internode Pty Ltd"
            }, {
                "value": 25,
                "color": "#69e274",
                "highlight": "#69e274",
                "label": "AS6535 Telmex Servicios Empresariales S.A."
            }, {
                "value": 25,
                "color": "#f6d0a6",
                "highlight": "#f6d0a6",
                "label": "AS28665 PREDIALNET PROVEDOR DE INTERNET LTDA"
            }, {"value": 25, "color": "#379c2e", "highlight": "#379c2e", "label": "AS53080 Rede Telecom"}, {
                "value": 25,
                "color": "#58d7d3",
                "highlight": "#58d7d3",
                "label": "AS28169 BITCOM PROVEDOR DE SERVICOS DE INTERNET LTDA"
            }, {"value": 24, "color": "#2bbd06", "highlight": "#2bbd06", "label": "AS4230 CLARO S.A."}, {
                "value": 24,
                "color": "#bc9b0d",
                "highlight": "#bc9b0d",
                "label": "AS53075 Holistica Provedor Internet Ltda"
            }, {
                "value": 24,
                "color": "#2d9924",
                "highlight": "#2d9924",
                "label": "AS10318 CABLEVISION S.A."
            }, {
                "value": 24,
                "color": "#8617b5",
                "highlight": "#8617b5",
                "label": "AS28349 TVC Tupa Ltda."
            }, {
                "value": 24,
                "color": "#93aefa",
                "highlight": "#93aefa",
                "label": "AS12252 America Movil Peru S.A.C."
            }, {
                "value": 23,
                "color": "#7c9437",
                "highlight": "#7c9437",
                "label": "AS21321 Areti Internet Ltd."
            }, {
                "value": 23,
                "color": "#943f12",
                "highlight": "#943f12",
                "label": "AS27882 Telef\u00f3nica Celular de Bolivia S.A."
            }, {
                "value": 23,
                "color": "#5ff916",
                "highlight": "#5ff916",
                "label": "AS4804 Microplex PTY LTD"
            }, {
                "value": 23,
                "color": "#be0998",
                "highlight": "#be0998",
                "label": "AS262462 ARANET COMUNICA\u00c7\u00c3O LTDA"
            }, {
                "value": 23,
                "color": "#3d850d",
                "highlight": "#3d850d",
                "label": "AS27724 INTERNEXA RJ OPERADORA DE TELECOMUNICA\u00c7\u00d4ES LTDA."
            }, {
                "value": 23,
                "color": "#32f02e",
                "highlight": "#32f02e",
                "label": "AS28287 Acer Telecomunica\u00e7\u00f5es ltda"
            }, {
                "value": 23,
                "color": "#37c950",
                "highlight": "#37c950",
                "label": "AS17072 TOTAL PLAY TELECOMUNICACIONES SA DE CV"
            }, {
                "value": 22,
                "color": "#9a152b",
                "highlight": "#9a152b",
                "label": "AS28509 Cablemas Telecomunicaciones SA de CV"
            }, {
                "value": 22,
                "color": "#d61767",
                "highlight": "#d61767",
                "label": "AS262461 MT.NET - Servi\u00e7os de Internet Ltda-ME"
            }, {
                "value": 22,
                "color": "#e04e0d",
                "highlight": "#e04e0d",
                "label": "AS53169 Tche Turbo Provedor de Internet LTDA"
            }, {
                "value": 22,
                "color": "#ff8f30",
                "highlight": "#ff8f30",
                "label": "AS2119 Telenor Norge AS"
            }, {
                "value": 22,
                "color": "#58dfb0",
                "highlight": "#58dfb0",
                "label": "AS53135 Nettel Telecomunica\u00e7\u00f5es Ltda."
            }, {
                "value": 22,
                "color": "#c0d5fc",
                "highlight": "#c0d5fc",
                "label": "AS28668 SILVA & SILVEIRA S\/C LTDA - ME"
            }, {
                "value": 22,
                "color": "#43a0d4",
                "highlight": "#43a0d4",
                "label": "AS11427 Time Warner Cable Internet LLC"
            }, {
                "value": 22,
                "color": "#f1b399",
                "highlight": "#f1b399",
                "label": "AS53175 Unetvale Servicos e Equipamentos LTDA"
            }, {
                "value": 21,
                "color": "#a72562",
                "highlight": "#a72562",
                "label": "AS53066 Vetorialnet Inf e Serv de Internet EIRELI - EPP"
            }, {
                "value": 21,
                "color": "#6b8f28",
                "highlight": "#6b8f28",
                "label": "AS27747 Telecentro S.A."
            }, {
                "value": 21,
                "color": "#ebb6f8",
                "highlight": "#ebb6f8",
                "label": "AS28210 VM OPENLINK COMUNICA\u00c7\u00c3O MULTIMIDIA E INFORM\u00c1TICA L"
            }, {
                "value": 20,
                "color": "#217c11",
                "highlight": "#217c11",
                "label": "AS262849 SKY SERVI\u00c7OS DE BANDA LARGA LTDA"
            }, {
                "value": 20,
                "color": "#cb9a33",
                "highlight": "#cb9a33",
                "label": "AS28201 Companhia Itabirana Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 20,
                "color": "#f21f78",
                "highlight": "#f21f78",
                "label": "AS28198 Isimples Telecom e Hardware Ltda"
            }, {
                "value": 20,
                "color": "#320ed5",
                "highlight": "#320ed5",
                "label": "AS701 MCI Communications Services, Inc. d\/b\/a Verizon Business"
            }, {
                "value": 20,
                "color": "#8396c8",
                "highlight": "#8396c8",
                "label": "AS53178 SCNet Equipamentos de Inform\u00e1tica Ltda"
            }, {"value": 20, "color": "#c7878e", "highlight": "#c7878e", "label": "AS28303 OptiTel Ltda"}, {
                "value": 19,
                "color": "#772fd7",
                "highlight": "#772fd7",
                "label": "AS18822 Manquehuenet"
            }, {
                "value": 19,
                "color": "#755e4d",
                "highlight": "#755e4d",
                "label": "AS52573 TECHNET NETWORKS LTDA -ME"
            }, {
                "value": 19,
                "color": "#e5de03",
                "highlight": "#e5de03",
                "label": "AS262470 Pontenet Teleinform\u00e1tica Ltda."
            }, {
                "value": 19,
                "color": "#ef8fa5",
                "highlight": "#ef8fa5",
                "label": "AS28294 Minas Gerais Telecomunica\u00e7\u00f5es Ltda ME"
            }, {
                "value": 19,
                "color": "#52ebe2",
                "highlight": "#52ebe2",
                "label": "AS6400 Compa\u00f1\u00eda Dominicana de Tel\u00e9fonos, C. por A. - CODETEL"
            }, {
                "value": 19,
                "color": "#c7248b",
                "highlight": "#c7248b",
                "label": "AS28554 Cablemas Telecomunicaciones SA de CV"
            }, {
                "value": 19,
                "color": "#8b7e87",
                "highlight": "#8b7e87",
                "label": "AS263073 SOARES & AGUIAR LTDA ME"
            }, {
                "value": 19,
                "color": "#8b53b6",
                "highlight": "#8b53b6",
                "label": "AS6830 Liberty Global Operations B.V."
            }, {
                "value": 18,
                "color": "#2467f3",
                "highlight": "#2467f3",
                "label": "AS5089 Virgin Media Limited"
            }, {
                "value": 18,
                "color": "#390f7f",
                "highlight": "#390f7f",
                "label": "AS852 TELUS Communications Inc."
            }, {
                "value": 18,
                "color": "#62c62a",
                "highlight": "#62c62a",
                "label": "AS53144 SURFIX TECNOLOGIA EM INTERNET LTDA"
            }, {"value": 18, "color": "#6e8c8b", "highlight": "#6e8c8b", "label": "AS577 Bell Canada"}, {
                "value": 17,
                "color": "#1f16de",
                "highlight": "#1f16de",
                "label": "AS262659 ULTRAWAVE TELECOM EIRELI"
            }, {
                "value": 17,
                "color": "#f34cd3",
                "highlight": "#f34cd3",
                "label": "AS28359 VIS\u00c3ONET TELECOM LTDA."
            }, {
                "value": 17,
                "color": "#c2c678",
                "highlight": "#c2c678",
                "label": "AS28624 CLAUDEMON SILVEIRA - ME"
            }, {"value": 17, "color": "#7aaeb9", "highlight": "#7aaeb9", "label": "AS29314 VECTRA S.A."}, {
                "value": 17,
                "color": "#af62f9",
                "highlight": "#af62f9",
                "label": "AS812 Rogers Cable Communications Inc."
            }, {
                "value": 16,
                "color": "#af5c5c",
                "highlight": "#af5c5c",
                "label": "AS32508 Granite State Communications"
            }, {
                "value": 16,
                "color": "#b5311b",
                "highlight": "#b5311b",
                "label": "AS28284 Genius On Line Telecom. LTDA"
            }, {
                "value": 16,
                "color": "#a27a54",
                "highlight": "#a27a54",
                "label": "AS262785 Click Tecnologia e Telecomunica\u00e7\u00e3o Ltda"
            }, {
                "value": 16,
                "color": "#64fd48",
                "highlight": "#64fd48",
                "label": "AS6568 Ag para el Desarrollo de la Sociedad de la Inf en Bolivia - ADSIB"
            }, {
                "value": 16,
                "color": "#558444",
                "highlight": "#558444",
                "label": "AS28270 Videomar Rede Nordeste S\/A"
            }, {
                "value": 16,
                "color": "#19fcbc",
                "highlight": "#19fcbc",
                "label": "AS11835 IPE INFORMATICA LTDA"
            }, {"value": 16, "color": "#8a8740", "highlight": "#8a8740", "label": "AS27839 Comteco Ltda"}, {
                "value": 15,
                "color": "#667940",
                "highlight": "#667940",
                "label": "AS5607 Sky UK Limited"
            }, {
                "value": 15,
                "color": "#c13d48",
                "highlight": "#c13d48",
                "label": "AS9506 Singtel Fibre Broadband"
            }, {
                "value": 15,
                "color": "#f4d24f",
                "highlight": "#f4d24f",
                "label": "AS17974 PT Telekomunikasi Indonesia"
            }, {"value": 15, "color": "#860753", "highlight": "#860753", "label": "AS8452 TE-AS"}, {
                "value": 15,
                "color": "#ec2116",
                "highlight": "#ec2116",
                "label": "AS6327 Shaw Communications Inc."
            }, {
                "value": 15,
                "color": "#dbb7a1",
                "highlight": "#dbb7a1",
                "label": "AS264316 IZAZ PROCESSAMENTO DE DADOS LTDA"
            }, {
                "value": 15,
                "color": "#12ee3e",
                "highlight": "#12ee3e",
                "label": "AS7545 TPG Telecom Limited"
            }, {
                "value": 15,
                "color": "#a3e3d3",
                "highlight": "#a3e3d3",
                "label": "AS262691 CONECTA LTDA."
            }, {
                "value": 14,
                "color": "#5c05a6",
                "highlight": "#5c05a6",
                "label": "AS53240 Net Onze Provedor de Acesso a Internet Ltda"
            }, {
                "value": 14,
                "color": "#a7a8ff",
                "highlight": "#a7a8ff",
                "label": "AS61937 Oquei Solu\u00e7\u00f5es em TI"
            }, {
                "value": 14,
                "color": "#41649c",
                "highlight": "#41649c",
                "label": "AS28183 MICRON LINE SERVICOS DE INFORMATICA LTDA - ME"
            }, {
                "value": 14,
                "color": "#656752",
                "highlight": "#656752",
                "label": "AS28263 Ensite Brasil Telecomunica\u00e7\u00f5es Ltda - ME"
            }, {
                "value": 14,
                "color": "#9f1782",
                "highlight": "#9f1782",
                "label": "AS28146 MHNET TELECOM"
            }, {
                "value": 14,
                "color": "#6a3a90",
                "highlight": "#6a3a90",
                "label": "AS2856 British Telecommunications PLC"
            }, {
                "value": 14,
                "color": "#448919",
                "highlight": "#448919",
                "label": "AS12715 Jazz Telecom S.A."
            }, {
                "value": 13,
                "color": "#67471f",
                "highlight": "#67471f",
                "label": "AS28244 Sendnet Provider Ltda"
            }, {
                "value": 13,
                "color": "#cf980e",
                "highlight": "#cf980e",
                "label": "AS8374 Polkomtel Sp. z o.o."
            }, {
                "value": 13,
                "color": "#748757",
                "highlight": "#748757",
                "label": "AS28289 Americana Digital Ltda."
            }, {
                "value": 13,
                "color": "#9892ad",
                "highlight": "#9892ad",
                "label": "AS13489 EPM Telecomunicaciones S.A. E.S.P."
            }, {
                "value": 13,
                "color": "#fa1bd5",
                "highlight": "#fa1bd5",
                "label": "AS262272 F.G. JUNQUEIRA ME"
            }, {
                "value": 13,
                "color": "#aba8dd",
                "highlight": "#aba8dd",
                "label": "AS28667 NETWORK TELECOMUNICACOES LTDA EPP"
            }, {
                "value": 13,
                "color": "#cf3105",
                "highlight": "#cf3105",
                "label": "AS262544 Sulcom Inform\u00e1tica Ltda"
            }, {
                "value": 13,
                "color": "#f79262",
                "highlight": "#f79262",
                "label": "AS3320 Deutsche Telekom AG"
            }, {
                "value": 13,
                "color": "#32d0e4",
                "highlight": "#32d0e4",
                "label": "AS28368 Infoway Servicos de Informatica Ltda"
            }, {
                "value": 13,
                "color": "#d9c42f",
                "highlight": "#d9c42f",
                "label": "AS53142 Friburgo Online LTDA ME"
            }, {
                "value": 13,
                "color": "#2c5268",
                "highlight": "#2c5268",
                "label": "AS3301 TeliaSonera AB"
            }, {
                "value": 13,
                "color": "#86111e",
                "highlight": "#86111e",
                "label": "AS61878 FIBER CONECTIVIDADE LTDA ME"
            }, {
                "value": 12,
                "color": "#221fc1",
                "highlight": "#221fc1",
                "label": "AS52937 FHP TELECOMUNICACAO E COM VAREJISTA DE PRODUTOS DE"
            }, {
                "value": 12,
                "color": "#7708f0",
                "highlight": "#7708f0",
                "label": "AS28182 TeleSA Telecomunicacoes S.A"
            }, {
                "value": 12,
                "color": "#4f421c",
                "highlight": "#4f421c",
                "label": "AS52568 B. & S. COMERCIO E SERVICOS LTDA"
            }, {
                "value": 12,
                "color": "#19e713",
                "highlight": "#19e713",
                "label": "AS20001 Time Warner Cable Internet LLC"
            }, {
                "value": 12,
                "color": "#9d3339",
                "highlight": "#9d3339",
                "label": "AS25933 Sul Americana Tecnologia e Inform\u00e1tica Ltda."
            }, {
                "value": 12,
                "color": "#f1dcd8",
                "highlight": "#f1dcd8",
                "label": "AS20115 Charter Communications"
            }, {
                "value": 12,
                "color": "#dbc2ba",
                "highlight": "#dbc2ba",
                "label": "AS262992 Boa Vista Telec. LTDA."
            }, {
                "value": 12,
                "color": "#5e981b",
                "highlight": "#5e981b",
                "label": "AS6471 ENTEL CHILE S.A."
            }, {
                "value": 12,
                "color": "#56ce9c",
                "highlight": "#56ce9c",
                "label": "AS4713 NTT Communications Corporation"
            }, {"value": 12, "color": "#24526b", "highlight": "#24526b", "label": "AS18809 Cable Onda"}, {
                "value": 12,
                "color": "#7abb4b",
                "highlight": "#7abb4b",
                "label": "AS264351 Wuzu Telecom Ltda"
            }, {
                "value": 12,
                "color": "#b960c8",
                "highlight": "#b960c8",
                "label": "AS263717 SOL TELECOMUNICACIONES S.A."
            }, {
                "value": 12,
                "color": "#e1d246",
                "highlight": "#e1d246",
                "label": "AS27925 Entel PCS Telecomunicaciones S.A."
            }, {
                "value": 12,
                "color": "#a4601c",
                "highlight": "#a4601c",
                "label": "AS12479 France Telecom Espana SA"
            }, {
                "value": 12,
                "color": "#80efd3",
                "highlight": "#80efd3",
                "label": "AS22689 Sercomtel Participa\u00e7\u00f5es S.A."
            }, {
                "value": 12,
                "color": "#6132bc",
                "highlight": "#6132bc",
                "label": "AS262777 Conchalnet Telecomunica\u00e7\u00f5es LTDA - ME"
            }, {
                "value": 12,
                "color": "#6c1e4d",
                "highlight": "#6c1e4d",
                "label": "AS52666 SERGIPEWEB PROVEDORES DE INTERNET LTDA"
            }, {
                "value": 11,
                "color": "#d82431",
                "highlight": "#d82431",
                "label": "AS28577 AZEVEDO E FLORIANI TELECOMUNICA\u00c7\u00d5ES LTDA."
            }, {
                "value": 11,
                "color": "#74625c",
                "highlight": "#74625c",
                "label": "AS1916 Associa\u00e7\u00e3o Rede Nacional de Ensino e Pesquisa"
            }, {
                "value": 11,
                "color": "#600adc",
                "highlight": "#600adc",
                "label": "AS10796 Time Warner Cable Internet LLC"
            }, {
                "value": 11,
                "color": "#a1060f",
                "highlight": "#a1060f",
                "label": "AS262740 VELOO NET LTDA"
            }, {
                "value": 11,
                "color": "#61e085",
                "highlight": "#61e085",
                "label": "AS6128 Cablevision Systems Corp."
            }, {
                "value": 11,
                "color": "#f1f27c",
                "highlight": "#f1f27c",
                "label": "AS262417 Gustavo Zanatta e Cia Ltda"
            }, {
                "value": 11,
                "color": "#59bdbd",
                "highlight": "#59bdbd",
                "label": "AS262808 Brasilnet Telecomunica\u00e7\u00f5es Ltda ME"
            }, {
                "value": 11,
                "color": "#a42325",
                "highlight": "#a42325",
                "label": "AS28331 PaintWeb Internet Ltda"
            }, {
                "value": 11,
                "color": "#6c1509",
                "highlight": "#6c1509",
                "label": "AS52850 M & M Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 11,
                "color": "#2d4db2",
                "highlight": "#2d4db2",
                "label": "AS262662 Conexao Networks Provedor de Internet"
            }, {
                "value": 11,
                "color": "#918b74",
                "highlight": "#918b74",
                "label": "AS262784 SATURNO COMUNICA\u00c7\u00d5ES LTDA"
            }, {
                "value": 11,
                "color": "#e86758",
                "highlight": "#e86758",
                "label": "AS28258 Infoline - Comunica\u00e7\u00f5es e Informa\u00e7\u00f5es Eletr\u00f4nicas"
            }, {
                "value": 11,
                "color": "#e5424b",
                "highlight": "#e5424b",
                "label": "AS262725 RG SILVEIRA LTDA"
            }, {
                "value": 10,
                "color": "#3a0fa6",
                "highlight": "#3a0fa6",
                "label": "AS262550 LUCAS NETWORK INFORMATICA LTDA ME"
            }, {
                "value": 10,
                "color": "#83779b",
                "highlight": "#83779b",
                "label": "AS262946 SOLTELECOM SOLTV"
            }, {
                "value": 10,
                "color": "#b7692a",
                "highlight": "#b7692a",
                "label": "AS52790 CONECTA NET TELECOMUNICA\u00c7\u00d5ES LTDA ME"
            }, {
                "value": 10,
                "color": "#d67906",
                "highlight": "#d67906",
                "label": "AS262721 AMPLITUDENET PROVEDOR DE ACESSO A INTERNET LTDA"
            }, {
                "value": 10,
                "color": "#85d57a",
                "highlight": "#85d57a",
                "label": "AS53122 super midia tv a cabo ltda"
            }, {
                "value": 10,
                "color": "#bfd18a",
                "highlight": "#bfd18a",
                "label": "AS7922 Comcast Cable Communications, LLC"
            }, {
                "value": 10,
                "color": "#3a264e",
                "highlight": "#3a264e",
                "label": "AS52945 E&L Producoes de Software Ltda"
            }, {
                "value": 10,
                "color": "#2eb7e9",
                "highlight": "#2eb7e9",
                "label": "AS10620 Telmex Colombia S.A."
            }, {
                "value": 10,
                "color": "#c081f8",
                "highlight": "#c081f8",
                "label": "AS17676 Softbank BB Corp."
            }, {
                "value": 10,
                "color": "#1cff95",
                "highlight": "#1cff95",
                "label": "AS53131 GB Inform\u00e1tica Ltda"
            }, {
                "value": 10,
                "color": "#a09205",
                "highlight": "#a09205",
                "label": "AS263581 INFOWAY COMERCIO DE INFORM E TELECOMUNICACOES LTDA"
            }, {"value": 10, "color": "#d01c02", "highlight": "#d01c02", "label": "AS15169 Google Inc."}, {
                "value": 10,
                "color": "#869cc8",
                "highlight": "#869cc8",
                "label": "AS262622 DAVOI ISP - Provedor de sol. e ac. a internet Ltl"
            }, {
                "value": 10,
                "color": "#cfbca5",
                "highlight": "#cfbca5",
                "label": "AS53094 Guanhaes Internet LTDA-ME"
            }, {
                "value": 10,
                "color": "#dad26b",
                "highlight": "#dad26b",
                "label": "AS19108 Suddenlink Communications"
            }, {
                "value": 10,
                "color": "#6adfd1",
                "highlight": "#6adfd1",
                "label": "AS262324 DINAMICA NETWORKS LTDA"
            }, {
                "value": 10,
                "color": "#fc7331",
                "highlight": "#fc7331",
                "label": "AS52840 ON TELECOMUNICACOES LTDA"
            }, {
                "value": 10,
                "color": "#d18ee4",
                "highlight": "#d18ee4",
                "label": "AS28265 abcRede LTDA ME"
            }, {
                "value": 10,
                "color": "#fb529d",
                "highlight": "#fb529d",
                "label": "AS5384 Emirates Telecommunications Corporation"
            }, {
                "value": 9,
                "color": "#2f9625",
                "highlight": "#2f9625",
                "label": "AS7029 Windstream Communications Inc"
            }, {
                "value": 9,
                "color": "#fa1c84",
                "highlight": "#fa1c84",
                "label": "AS53088 FORNET COMUNICACOES LTDA"
            }, {
                "value": 9,
                "color": "#2c392a",
                "highlight": "#2c392a",
                "label": "AS53246 Cyber Info Provedor de Acesso LTDA ME"
            }, {
                "value": 9,
                "color": "#3997f8",
                "highlight": "#3997f8",
                "label": "AS262505 N4 Telecomunicacoes LTDA - ME"
            }, {
                "value": 9,
                "color": "#a2b3f0",
                "highlight": "#a2b3f0",
                "label": "AS3549 Level 3 Communications, Inc."
            }, {
                "value": 9,
                "color": "#4ef9fc",
                "highlight": "#4ef9fc",
                "label": "AS264389 ARP TELECOMUNICACOES LTDA - EPP"
            }, {
                "value": 9,
                "color": "#dce653",
                "highlight": "#dce653",
                "label": "AS263110 Louvetel Comunica\u00e7\u00e3o Comercial Ltda ME"
            }, {
                "value": 9,
                "color": "#623326",
                "highlight": "#623326",
                "label": "AS28283 Adylnet Telecom"
            }, {
                "value": 9,
                "color": "#e1cdc8",
                "highlight": "#e1cdc8",
                "label": "AS28280 A. P. OLIVEIRA & CIA. INFORMATICA LTDA."
            }, {
                "value": 9,
                "color": "#8377bd",
                "highlight": "#8377bd",
                "label": "AS28260 Altarede de Teresopolis Provedor de Internet Ltda"
            }, {
                "value": 9,
                "color": "#bd8b61",
                "highlight": "#bd8b61",
                "label": "AS262820 Ol\u00e1 Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 9,
                "color": "#5fee56",
                "highlight": "#5fee56",
                "label": "AS3301 Telia Company AB"
            }, {
                "value": 9,
                "color": "#28f11c",
                "highlight": "#28f11c",
                "label": "AS28125 Elo.Net Tecnologia Ltda. - ME"
            }, {
                "value": 9,
                "color": "#ac2ed1",
                "highlight": "#ac2ed1",
                "label": "AS53050 Super Cabo TV Caratinga Ltda"
            }, {
                "value": 9,
                "color": "#bf6b35",
                "highlight": "#bf6b35",
                "label": "AS209 Qwest Communications Company, LLC"
            }, {
                "value": 9,
                "color": "#30f3d9",
                "highlight": "#30f3d9",
                "label": "AS262444 XTURBO PROVEDOR DE INTERNET LTDA - EPP"
            }, {
                "value": 9,
                "color": "#a55c5f",
                "highlight": "#a55c5f",
                "label": "AS6739 VODAFONE ONO, S.A."
            }, {
                "value": 9,
                "color": "#b7088a",
                "highlight": "#b7088a",
                "label": "AS262317 Rodrigo Orlandeli Sanches"
            }, {
                "value": 9,
                "color": "#19fe59",
                "highlight": "#19fe59",
                "label": "AS264179 GL DUARTE MULTIMIDIA LTDA ME"
            }, {
                "value": 9,
                "color": "#53c689",
                "highlight": "#53c689",
                "label": "AS262730 Byteweb Comunica\u00e7\u00e3o Multim\u00eddia Ltda."
            }, {
                "value": 9,
                "color": "#8d6207",
                "highlight": "#8d6207",
                "label": "AS53037 NEXTEL TELECOMUNICA\u00c7\u00d5ES LTDA"
            }, {
                "value": 9,
                "color": "#758fad",
                "highlight": "#758fad",
                "label": "AS28208 Superline Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 9,
                "color": "#dfdb95",
                "highlight": "#dfdb95",
                "label": "AS263072 BD Fibra Telecom Ltda - EPP"
            }, {
                "value": 8,
                "color": "#8213eb",
                "highlight": "#8213eb",
                "label": "AS262792 VESCNET PROVEDORES LTDA"
            }, {
                "value": 8,
                "color": "#1529f3",
                "highlight": "#1529f3",
                "label": "AS52693 Conectel Telecomunica\u00e7\u00f5es e Inform\u00e1tica Ltda ME"
            }, {
                "value": 8,
                "color": "#d7ff67",
                "highlight": "#d7ff67",
                "label": "AS3243 MEO - SERVICOS DE COMUNICACOES E MULTIMEDIA S.A."
            }, {
                "value": 8,
                "color": "#42f337",
                "highlight": "#42f337",
                "label": "AS28306 Britis Telecom LTDA"
            }, {
                "value": 8,
                "color": "#9c7135",
                "highlight": "#9c7135",
                "label": "AS52817 A. P. de Barros Inform\u00e1tica"
            }, {
                "value": 8,
                "color": "#8d8337",
                "highlight": "#8d8337",
                "label": "AS28161 Piernet Telecom"
            }, {
                "value": 8,
                "color": "#dfb6d4",
                "highlight": "#dfb6d4",
                "label": "AS21928 T-Mobile USA, Inc."
            }, {"value": 8, "color": "#95e593", "highlight": "#95e593", "label": "AS12741 Netia SA"}, {
                "value": 8,
                "color": "#678e90",
                "highlight": "#678e90",
                "label": "AS262669 KONNET INFORM\u00c1TICA LTDA"
            }, {
                "value": 8,
                "color": "#c3f3c2",
                "highlight": "#c3f3c2",
                "label": "AS262753 VOCE TELECOMUNICACOES LTDA"
            }, {
                "value": 8,
                "color": "#713b3c",
                "highlight": "#713b3c",
                "label": "AS52956 Speed Travel Comunica\u00e7\u00e3o Multim\u00eddia Ltda - ME"
            }, {
                "value": 8,
                "color": "#a37589",
                "highlight": "#a37589",
                "label": "AS53158 Net Turbo Telecom"
            }, {
                "value": 8,
                "color": "#930cd3",
                "highlight": "#930cd3",
                "label": "AS263385 CSNET TELECOM LTDA"
            }, {
                "value": 8,
                "color": "#49ea17",
                "highlight": "#49ea17",
                "label": "AS262535 Flash Net Brasil Telecom Ltda - ME"
            }, {"value": 8, "color": "#e30e59", "highlight": "#e30e59", "label": "AS28153 Micropic Ltda"}, {
                "value": 8,
                "color": "#b93218",
                "highlight": "#b93218",
                "label": "AS28661 HOTLINK INTERNET LTDA"
            }, {
                "value": 8,
                "color": "#ef6daf",
                "highlight": "#ef6daf",
                "label": "AS262481 NEOREDE TELECOMUNICA\u00c7\u00c3O LTDA"
            }, {"value": 8, "color": "#991da2", "highlight": "#991da2", "label": "AS52689 ESPACO DIGITAL"}, {
                "value": 8,
                "color": "#51cede",
                "highlight": "#51cede",
                "label": "AS28292 ENGEPLUS INFORMATICA LTDA"
            }, {
                "value": 8,
                "color": "#6dcbf8",
                "highlight": "#6dcbf8",
                "label": "AS52653 Marlon L. Larger & Cia Ltda"
            }, {
                "value": 8,
                "color": "#e79154",
                "highlight": "#e79154",
                "label": "AS262690 Netwave Telecomunica\u00e7\u00f5es Ltda."
            }, {
                "value": 8,
                "color": "#9dfe3c",
                "highlight": "#9dfe3c",
                "label": "AS52268 COPELCO LTDA. (CUTRAL-CO)"
            }, {
                "value": 8,
                "color": "#be3b76",
                "highlight": "#be3b76",
                "label": "AS52974 Henet Telecomunicacoes Ltda"
            }, {
                "value": 7,
                "color": "#5baa13",
                "highlight": "#5baa13",
                "label": "AS52699 Conecta Telecom Ltda"
            }, {
                "value": 7,
                "color": "#3f4f21",
                "highlight": "#3f4f21",
                "label": "AS262420 GIGA TV LTDA - EPP"
            }, {
                "value": 7,
                "color": "#4ed84a",
                "highlight": "#4ed84a",
                "label": "AS12430 VODAFONE ESPANA S.A.U."
            }, {
                "value": 7,
                "color": "#d31de7",
                "highlight": "#d31de7",
                "label": "AS61709 Dms Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 7,
                "color": "#4b711a",
                "highlight": "#4b711a",
                "label": "AS9299 Philippine Long Distance Telephone Company"
            }, {
                "value": 7,
                "color": "#5ee394",
                "highlight": "#5ee394",
                "label": "AS262861 G30 TELECOM SERVI\u00c7OS EM TELECOMUNICA\u00c7\u00d5ES LTDA"
            }, {
                "value": 7,
                "color": "#ced486",
                "highlight": "#ced486",
                "label": "AS52965 1TELECOM SERVICOS DE TECNOLOGIA EM INTERNET LTDA"
            }, {
                "value": 7,
                "color": "#7db15e",
                "highlight": "#7db15e",
                "label": "AS36351 SoftLayer Technologies Inc."
            }, {
                "value": 7,
                "color": "#d9e7dc",
                "highlight": "#d9e7dc",
                "label": "AS53172 Next Telecomunica\u00e7\u00f5es do Brasil LTDA"
            }, {
                "value": 7,
                "color": "#98b2f7",
                "highlight": "#98b2f7",
                "label": "AS61935 Quick Comunica\u00e7\u00f5es.net LTDA."
            }, {
                "value": 7,
                "color": "#898ea4",
                "highlight": "#898ea4",
                "label": "AS16397 EQUINIX BRASIL SP"
            }, {
                "value": 7,
                "color": "#5e7147",
                "highlight": "#5e7147",
                "label": "AS262575 Alto Vale Net Ltda"
            }, {
                "value": 7,
                "color": "#1d2d76",
                "highlight": "#1d2d76",
                "label": "AS53217 INFRANET INTERNET LTDA."
            }, {
                "value": 7,
                "color": "#1be008",
                "highlight": "#1be008",
                "label": "AS263565 CLOUD COMUNICACOES LTDA ME"
            }, {"value": 7, "color": "#497274", "highlight": "#497274", "label": "AS39651 Com Hem AB"}, {
                "value": 7,
                "color": "#f463c3",
                "highlight": "#f463c3",
                "label": "AS263395 TINASNET SERVICOS E ACESSOS A INTERNET LTDA"
            }, {
                "value": 7,
                "color": "#5ccede",
                "highlight": "#5ccede",
                "label": "AS3816 COLOMBIA TELECOMUNICACIONES S.A. ESP"
            }, {
                "value": 7,
                "color": "#30fad2",
                "highlight": "#30fad2",
                "label": "AS263107 Qwerty Comunica\u00e7\u00f5es e Tecnologia Educacional Ltda"
            }, {
                "value": 7,
                "color": "#bc223c",
                "highlight": "#bc223c",
                "label": "AS132199 Globe Telecom Inc."
            }, {
                "value": 7,
                "color": "#f047b9",
                "highlight": "#f047b9",
                "label": "AS262744 ICENET TELECOMUNICACOES LTDA - ME"
            }, {
                "value": 7,
                "color": "#89b792",
                "highlight": "#89b792",
                "label": "AS262385 VSAT- TELECOMUNICA\u00c7\u00d5ES LTDA"
            }, {
                "value": 7,
                "color": "#921d1c",
                "highlight": "#921d1c",
                "label": "AS6306 TELEFONICA VENEZOLANA, C.A."
            }, {
                "value": 7,
                "color": "#509009",
                "highlight": "#509009",
                "label": "AS264544 SUPER NOVA TELECOM LTDA"
            }, {
                "value": 7,
                "color": "#49c10c",
                "highlight": "#49c10c",
                "label": "AS262617 UWBR Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 7,
                "color": "#45952f",
                "highlight": "#45952f",
                "label": "AS27717 Corporacion Digitel C.A."
            }, {
                "value": 7,
                "color": "#d1efa9",
                "highlight": "#d1efa9",
                "label": "AS53065 Op\u00e7\u00e3oNet Inform\u00e1tica Ltda ME"
            }, {
                "value": 7,
                "color": "#18d168",
                "highlight": "#18d168",
                "label": "AS265327 TELEPROFIT INTERNET EIRELI"
            }, {
                "value": 7,
                "color": "#f3433c",
                "highlight": "#f3433c",
                "label": "AS53059 Center Prestadora Servi\u00e7os S\/C Ltda"
            }, {
                "value": 7,
                "color": "#5d12d6",
                "highlight": "#5d12d6",
                "label": "AS52955 Souza&Santiago Ltda"
            }, {
                "value": 7,
                "color": "#e6b89e",
                "highlight": "#e6b89e",
                "label": "AS262569 MGNET INFORMATICA E SERVI\u00c7OS LTDA"
            }, {
                "value": 7,
                "color": "#c26751",
                "highlight": "#c26751",
                "label": "AS263616 Dez Solucoes em Telecomunicacoes LTDA"
            }, {
                "value": 7,
                "color": "#c53e73",
                "highlight": "#c53e73",
                "label": "AS28652 Telecomunica\u00e7\u00f5es Nordeste Ltda."
            }, {
                "value": 7,
                "color": "#fa1025",
                "highlight": "#fa1025",
                "label": "AS262519 BIA PADUA INTERNET E S.C.M. LTDA"
            }, {
                "value": 6,
                "color": "#f57818",
                "highlight": "#f57818",
                "label": "AS264275 ROLIM NET TECNOLOGIA LTDA"
            }, {"value": 6, "color": "#726ee8", "highlight": "#726ee8", "label": "AS52913 PLANALTO NET"}, {
                "value": 6,
                "color": "#8494e9",
                "highlight": "#8494e9",
                "label": "AS262675 Solucao Network Provedor Ltda"
            }, {
                "value": 6,
                "color": "#4c38a6",
                "highlight": "#4c38a6",
                "label": "AS52892 COPREL TELECOM LTDA"
            }, {
                "value": 6,
                "color": "#295d63",
                "highlight": "#295d63",
                "label": "AS265329 B.B. NET UP EIRELI -ME"
            }, {
                "value": 6,
                "color": "#4257d8",
                "highlight": "#4257d8",
                "label": "AS28545 Cablemas Telecomunicaciones SA de CV"
            }, {"value": 6, "color": "#bee851", "highlight": "#bee851", "label": "AS53113 Agyonet Ltda"}, {
                "value": 6,
                "color": "#7115ad",
                "highlight": "#7115ad",
                "label": "AS52547 Rodrigo Jos\u00e9 Marasca e Cia Ltda"
            }, {
                "value": 6,
                "color": "#bf0719",
                "highlight": "#bf0719",
                "label": "AS263390 SC Provedor Telecom Acesso a Rede de Internet Ltda"
            }, {
                "value": 6,
                "color": "#15e7f0",
                "highlight": "#15e7f0",
                "label": "AS262497 Metro Tecnologia"
            }, {
                "value": 6,
                "color": "#8b409e",
                "highlight": "#8b409e",
                "label": "AS13591 Brasil Telecom Comunica\u00e7\u00e3o Multimidia"
            }, {
                "value": 6,
                "color": "#fc84ce",
                "highlight": "#fc84ce",
                "label": "AS53085 MKANET SERVICOS E COMERCIO DE INFORMATICA EIRELI"
            }, {
                "value": 6,
                "color": "#a11bae",
                "highlight": "#a11bae",
                "label": "AS9269 Hong Kong Broadband Network Ltd."
            }, {
                "value": 6,
                "color": "#f81955",
                "highlight": "#f81955",
                "label": "AS52991 Tres Pontas Internet Ltda"
            }, {"value": 6, "color": "#55e9e6", "highlight": "#55e9e6", "label": "AS16276 OVH SAS"}, {
                "value": 6,
                "color": "#70db73",
                "highlight": "#70db73",
                "label": "AS262595 OnNet Telecomunicacoes LTDA - ME"
            }, {
                "value": 6,
                "color": "#4e5255",
                "highlight": "#4e5255",
                "label": "AS23655 Snap Internet Limited"
            }, {
                "value": 6,
                "color": "#7ad854",
                "highlight": "#7ad854",
                "label": "AS61889 BRASIL DIGITAL TELECOMUNICACOES LTDA"
            }, {
                "value": 6,
                "color": "#7802cc",
                "highlight": "#7802cc",
                "label": "AS262509 CONEXAO - TELECOM. E INTERNET LTDA"
            }, {
                "value": 6,
                "color": "#fcd8c9",
                "highlight": "#fcd8c9",
                "label": "AS5650 Frontier Communications of America, Inc."
            }, {
                "value": 6,
                "color": "#f55171",
                "highlight": "#f55171",
                "label": "AS28341 Westtelecom Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 6,
                "color": "#939dd6",
                "highlight": "#939dd6",
                "label": "AS264336 Inove Telecom Ltda"
            }, {"value": 6, "color": "#c85346", "highlight": "#c85346", "label": "AS17670 MNC Playmedia"}, {
                "value": 6,
                "color": "#778a5c",
                "highlight": "#778a5c",
                "label": "AS6805 Telefonica Germany GmbH & Co.OHG"
            }, {
                "value": 6,
                "color": "#47fa6a",
                "highlight": "#47fa6a",
                "label": "AS28548 Cablevisi\u00f3n, S.A. de C.V."
            }, {
                "value": 6,
                "color": "#f1966e",
                "highlight": "#f1966e",
                "label": "AS263077 RazaoInfo Internet Ltda"
            }, {
                "value": 6,
                "color": "#dd49da",
                "highlight": "#dd49da",
                "label": "AS263252 GIGASAT SERVI\u00c7OS DE PROCESSAMENTOS DE DADOS LTDA"
            }, {
                "value": 6,
                "color": "#d712fc",
                "highlight": "#d712fc",
                "label": "AS52588 Compuservice.Net Internet Provider LTDA-ME"
            }, {
                "value": 6,
                "color": "#e61224",
                "highlight": "#e61224",
                "label": "AS262765 Net F\u00e1cil Sistemas Eletr\u00f4nicos Ltda ME"
            }, {
                "value": 6,
                "color": "#317c4f",
                "highlight": "#317c4f",
                "label": "AS55430 Starhub Internet Pte Ltd"
            }, {"value": 6, "color": "#10ca7f", "highlight": "#10ca7f", "label": "AS53087 TELY Ltda."}, {
                "value": 6,
                "color": "#dac36e",
                "highlight": "#dac36e",
                "label": "AS52341 Centennial Cayman Corp Chile S.A"
            }, {
                "value": 6,
                "color": "#56d96e",
                "highlight": "#56d96e",
                "label": "AS61900 Mais Internet LTDA EPP"
            }, {"value": 6, "color": "#c31793", "highlight": "#c31793", "label": "AS53137 TCA Internet"}, {
                "value": 6,
                "color": "#faa693",
                "highlight": "#faa693",
                "label": "AS28635 Younet Internet"
            }, {
                "value": 6,
                "color": "#77211d",
                "highlight": "#77211d",
                "label": "AS263537 Luciana Zanette Branca Li\u00e3o Borges - ME"
            }, {
                "value": 6,
                "color": "#a37b39",
                "highlight": "#a37b39",
                "label": "AS53062 G G NET - Telecomunica\u00e7\u00f5es LTDA EPP"
            }, {
                "value": 6,
                "color": "#c1440e",
                "highlight": "#c1440e",
                "label": "AS28658 Gigalink de Nova Friburgo Solu\u00e7\u00f5es em Rede Multimi"
            }, {"value": 6, "color": "#b8dbba", "highlight": "#b8dbba", "label": "AS2518 BIGLOBE Inc."}, {
                "value": 6,
                "color": "#160911",
                "highlight": "#160911",
                "label": "AS262862 PR TELECOMUNICACOES E INFORMATICA LTDA"
            }, {
                "value": 5,
                "color": "#94db6c",
                "highlight": "#94db6c",
                "label": "AS27695 EDATEL S.A. E.S.P"
            }, {
                "value": 5,
                "color": "#c83699",
                "highlight": "#c83699",
                "label": "AS262879 Hifive Provedor de Internet Ltda"
            }, {
                "value": 5,
                "color": "#a510ba",
                "highlight": "#a510ba",
                "label": "AS262849 Galaxy Brasil Ltda"
            }, {
                "value": 5,
                "color": "#e35226",
                "highlight": "#e35226",
                "label": "AS262369 ok virtual provedor de internet ltda"
            }, {
                "value": 5,
                "color": "#a21c20",
                "highlight": "#a21c20",
                "label": "AS262582 Netsul Internet Banda Larga LTDA"
            }, {
                "value": 5,
                "color": "#8b3965",
                "highlight": "#8b3965",
                "label": "AS12989 Eweka Internet Services B.V."
            }, {
                "value": 5,
                "color": "#d61397",
                "highlight": "#d61397",
                "label": "AS16397 ALOG SOLUCOES DE TECNOLOGIA EM INFORMATICA S.A."
            }, {
                "value": 5,
                "color": "#15e370",
                "highlight": "#15e370",
                "label": "AS23106 Cemig Telecomunica\u00e7\u00f5es SA"
            }, {
                "value": 5,
                "color": "#7d7ccc",
                "highlight": "#7d7ccc",
                "label": "AS52935 Infobarra Solucoes em Informatica Ltda"
            }, {
                "value": 5,
                "color": "#8e48fc",
                "highlight": "#8e48fc",
                "label": "AS28259 COOPERATIVA REGIONAL DE DESENVOLVIMENTO TEUTONIA"
            }, {
                "value": 5,
                "color": "#2dad3a",
                "highlight": "#2dad3a",
                "label": "AS262682 REDE POPULAR DE INTERNET LTDA"
            }, {
                "value": 5,
                "color": "#bcc1bf",
                "highlight": "#bcc1bf",
                "label": "AS10396 DATACOM CARIBE, INC."
            }, {
                "value": 5,
                "color": "#b95845",
                "highlight": "#b95845",
                "label": "AS263905 New Group Telecomunicacoes LTDA"
            }, {
                "value": 5,
                "color": "#11d69d",
                "highlight": "#11d69d",
                "label": "AS52824 M.J. VENTURA LTDA"
            }, {
                "value": 5,
                "color": "#f4cdf6",
                "highlight": "#f4cdf6",
                "label": "AS264270 NETCOL - SERVI\u00c7O DE PROVEDORES DE ACESSO LTDA"
            }, {
                "value": 5,
                "color": "#815a8c",
                "highlight": "#815a8c",
                "label": "AS264359 RP COMERCIO E TELECOMUNICACOES LTDA - EPP"
            }, {
                "value": 5,
                "color": "#3266c0",
                "highlight": "#3266c0",
                "label": "AS30036 Mediacom Communications Corp"
            }, {
                "value": 5,
                "color": "#b4ba43",
                "highlight": "#b4ba43",
                "label": "AS53195 LOGTEL TELECOMUNICACOES E INFORMATICA LTDA ME"
            }, {
                "value": 5,
                "color": "#c1c5a6",
                "highlight": "#c1c5a6",
                "label": "AS61666 GLOBO INFORMATICA LTDA - ME"
            }, {
                "value": 5,
                "color": "#499281",
                "highlight": "#499281",
                "label": "AS28334 PROCESS SOLUTIONS TECNOLOGIA E INF. EIRELI - EPP"
            }, {
                "value": 5,
                "color": "#ebfc91",
                "highlight": "#ebfc91",
                "label": "AS52537 microplan informatica ltda."
            }, {
                "value": 5,
                "color": "#417417",
                "highlight": "#417417",
                "label": "AS263042 DELTA TELECOMUNICACOES LTDA"
            }, {
                "value": 5,
                "color": "#f5e008",
                "highlight": "#f5e008",
                "label": "AS11426 Time Warner Cable Internet LLC"
            }, {
                "value": 5,
                "color": "#a703be",
                "highlight": "#a703be",
                "label": "AS6939 Hurricane Electric, Inc."
            }, {
                "value": 5,
                "color": "#9441ef",
                "highlight": "#9441ef",
                "label": "AS262318 Horizons Telecomunica\u00e7\u00f5es e Tecnologia Ltda"
            }, {
                "value": 5,
                "color": "#7a1770",
                "highlight": "#7a1770",
                "label": "AS263653 Costa Esmeralda Net Ltda Me"
            }, {"value": 5, "color": "#2f1b65", "highlight": "#2f1b65", "label": "AS39603 P4 Sp. z o.o."}, {
                "value": 5,
                "color": "#6f246c",
                "highlight": "#6f246c",
                "label": "AS262746 Internet Servicos Ltda."
            }, {
                "value": 5,
                "color": "#e572b6",
                "highlight": "#e572b6",
                "label": "AS264487 iguaba provedor de servi\u00e7os internet ltda"
            }, {
                "value": 5,
                "color": "#14a9bc",
                "highlight": "#14a9bc",
                "label": "AS262638 BRASCONECT INFORMATICA LTDA"
            }, {
                "value": 5,
                "color": "#d498ce",
                "highlight": "#d498ce",
                "label": "AS262717 Net Artur Ind. Com. Caixas hermeticas Ltda - me"
            }, {
                "value": 5,
                "color": "#9faf6f",
                "highlight": "#9faf6f",
                "label": "AS262469 WISP ICONECTA SERVICOS DE REDE LTDA"
            }, {
                "value": 5,
                "color": "#6b58a1",
                "highlight": "#6b58a1",
                "label": "AS28642 Contato Internet Ltda EPP"
            }, {
                "value": 5,
                "color": "#a60eed",
                "highlight": "#a60eed",
                "label": "AS263276 BBCTECH PROVEDOR"
            }, {
                "value": 5,
                "color": "#a90025",
                "highlight": "#a90025",
                "label": "AS262330 NETCOM TERESOPOLIS INFORMATICA E INTERNET LTDA-ME"
            }, {
                "value": 5,
                "color": "#ea9d9a",
                "highlight": "#ea9d9a",
                "label": "AS28205 Ibituruna TV por assinatura S\/C Ltda"
            }, {
                "value": 5,
                "color": "#d0150c",
                "highlight": "#d0150c",
                "label": "AS6332 Telefonos del Noroeste, S.A. de C.V."
            }, {"value": 5, "color": "#9d2ab8", "highlight": "#9d2ab8", "label": "AS9143 Ziggo B.V."}, {
                "value": 5,
                "color": "#19e409",
                "highlight": "#19e409",
                "label": "AS2860 NOS COMUNICACOES, S.A."
            }, {
                "value": 5,
                "color": "#d7849b",
                "highlight": "#d7849b",
                "label": "AS262588 EXPLORERNET INFOLINK TECNOLOGIA E TELECOMUNICACOES"
            }, {
                "value": 5,
                "color": "#4d262c",
                "highlight": "#4d262c",
                "label": "AS8473 Bahnhof Internet AB"
            }, {
                "value": 5,
                "color": "#ac1c9e",
                "highlight": "#ac1c9e",
                "label": "AS262664 GIGALINE INTERNET SERVICOS DE INFORMATICA LTDA"
            }, {
                "value": 5,
                "color": "#12bfa9",
                "highlight": "#12bfa9",
                "label": "AS263033 W r de bel entreterimentos s\/s ltda"
            }, {
                "value": 5,
                "color": "#379223",
                "highlight": "#379223",
                "label": "AS53056 WEST INTERNET BANDA LARGA"
            }, {
                "value": 5,
                "color": "#269da5",
                "highlight": "#269da5",
                "label": "AS262604 Click.com telecomunica\u00e7\u00f5es ltda-me"
            }, {
                "value": 5,
                "color": "#b4d166",
                "highlight": "#b4d166",
                "label": "AS52846 INNOVANET Telecom LTDA."
            }, {
                "value": 5,
                "color": "#c75486",
                "highlight": "#c75486",
                "label": "AS53223 master net wireless inform\u00e1tica ltda"
            }, {
                "value": 5,
                "color": "#a6c5d3",
                "highlight": "#a6c5d3",
                "label": "AS28366 Marinter Telecom Ltda."
            }, {
                "value": 5,
                "color": "#c4d65c",
                "highlight": "#c4d65c",
                "label": "AS28276 Mikrocenter Inform\u00e1tica Ltda."
            }, {
                "value": 5,
                "color": "#330421",
                "highlight": "#330421",
                "label": "AS262468 Natel Telecom Ltda. - ME"
            }, {
                "value": 5,
                "color": "#f89191",
                "highlight": "#f89191",
                "label": "AS33363 BRIGHT HOUSE NETWORKS, LLC"
            }, {
                "value": 5,
                "color": "#5a9075",
                "highlight": "#5a9075",
                "label": "AS263020 MEGA NET PROVEDOR INTERNET LTDA"
            }, {
                "value": 5,
                "color": "#f40b03",
                "highlight": "#f40b03",
                "label": "AS262901 Vcnet Provedora de Internet Ltda."
            }, {
                "value": 5,
                "color": "#3bdf89",
                "highlight": "#3bdf89",
                "label": "AS264016 Snell Telecomunica\u00e7\u00f5es Ltda. ME"
            }, {
                "value": 5,
                "color": "#130b33",
                "highlight": "#130b33",
                "label": "AS52861 SN Internet Navegantes Ltda ME"
            }, {
                "value": 4,
                "color": "#ef913e",
                "highlight": "#ef913e",
                "label": "AS263973 Silmar Zamboni Bertoncheli & CIA. LTDA."
            }, {
                "value": 4,
                "color": "#dfda3d",
                "highlight": "#dfda3d",
                "label": "AS263466 M.P. TELECOM LTDA - EPP"
            }, {
                "value": 4,
                "color": "#718882",
                "highlight": "#718882",
                "label": "AS262680 CITY SHOP NET LTDA"
            }, {
                "value": 4,
                "color": "#f8a725",
                "highlight": "#f8a725",
                "label": "AS263251 BENTO DE OLIVEIRA SILVESTRE - ME"
            }, {
                "value": 4,
                "color": "#dedda6",
                "highlight": "#dedda6",
                "label": "AS52734 claubert dadier kochhann cia ltda"
            }, {
                "value": 4,
                "color": "#ffc05f",
                "highlight": "#ffc05f",
                "label": "AS263292 L E M TELECOMUNICA\u00c7\u00d5ES LTDA -ME"
            }, {"value": 4, "color": "#cc9af2", "highlight": "#cc9af2", "label": "AS264477 FLIX TELECOM"}, {
                "value": 4,
                "color": "#2c25d9",
                "highlight": "#2c25d9",
                "label": "AS264284 Transdados Telecom"
            }, {
                "value": 4,
                "color": "#626c84",
                "highlight": "#626c84",
                "label": "AS263374 ROCHA, ANDRADE E DONEDA LTDA"
            }, {
                "value": 4,
                "color": "#91f04e",
                "highlight": "#91f04e",
                "label": "AS23473 PAVLOV MEDIA INC"
            }, {
                "value": 4,
                "color": "#d9f9c7",
                "highlight": "#d9f9c7",
                "label": "AS263047 Speednet Provedor de Acesso a Internet Ltda"
            }, {
                "value": 4,
                "color": "#4593ff",
                "highlight": "#4593ff",
                "label": "AS263432 CORPORATIVA TELECOMUNICACOES EIRELI ME"
            }, {
                "value": 4,
                "color": "#2d37bf",
                "highlight": "#2d37bf",
                "label": "AS52720 WEBFOCO TELECOMUNICACOES LTDA"
            }, {
                "value": 4,
                "color": "#3fb7bb",
                "highlight": "#3fb7bb",
                "label": "AS52736 Viattiva Telecomunica\u00e7\u00f5es Ltda - ME"
            }, {
                "value": 4,
                "color": "#597523",
                "highlight": "#597523",
                "label": "AS263558 R.C. TELECOMUNICACOES E SEGURANCA LTDA"
            }, {
                "value": 4,
                "color": "#da3534",
                "highlight": "#da3534",
                "label": "AS262314 MINAS WI FI TELECOMUNICA\u00c7\u00d5ES LTDA"
            }, {
                "value": 4,
                "color": "#1c9016",
                "highlight": "#1c9016",
                "label": "AS28213 Lci Acess\u00f3ria Econ\u00f4mica Inform\u00e1tica LTDA"
            }, {
                "value": 4,
                "color": "#9d942f",
                "highlight": "#9d942f",
                "label": "AS61440 Digital Energy Technologies Chile SpA"
            }, {
                "value": 4,
                "color": "#614b39",
                "highlight": "#614b39",
                "label": "AS28637 Cia Proc. de Dados do Estado de S Paulo - Prodesp"
            }, {
                "value": 4,
                "color": "#b98414",
                "highlight": "#b98414",
                "label": "AS262434 WIIP TELECOM SERVI\u00c7OS DE INTERNET LTDA"
            }, {
                "value": 4,
                "color": "#c083f4",
                "highlight": "#c083f4",
                "label": "AS262729 Telemidia Sistema de Telecomunicacao Ltda"
            }, {
                "value": 4,
                "color": "#4aac76",
                "highlight": "#4aac76",
                "label": "AS28555 Cablemas Telecomunicaciones SA de CV"
            }, {
                "value": 4,
                "color": "#5a584f",
                "highlight": "#5a584f",
                "label": "AS8551 Bezeq International-Ltd"
            }, {
                "value": 4,
                "color": "#26bde4",
                "highlight": "#26bde4",
                "label": "AS53126 Virtual Vision Consultoria e Assessoria em Inform."
            }, {
                "value": 4,
                "color": "#1cc8c2",
                "highlight": "#1cc8c2",
                "label": "AS28158 Ampernet Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 4,
                "color": "#e85c1e",
                "highlight": "#e85c1e",
                "label": "AS53222 Seanet Telecom Ltda"
            }, {
                "value": 4,
                "color": "#ec9b5a",
                "highlight": "#ec9b5a",
                "label": "AS13285 TalkTalk Communications Limited"
            }, {
                "value": 4,
                "color": "#544626",
                "highlight": "#544626",
                "label": "AS53189 Toque Telecom Ltda"
            }, {
                "value": 4,
                "color": "#c68e23",
                "highlight": "#c68e23",
                "label": "AS264940 InfoTelecom BandaLarga"
            }, {
                "value": 4,
                "color": "#5e4207",
                "highlight": "#5e4207",
                "label": "AS262502 FLYLink Telecom"
            }, {
                "value": 4,
                "color": "#1ca03b",
                "highlight": "#1ca03b",
                "label": "AS262606 UNICA TECNOLOGY LTDA"
            }, {
                "value": 4,
                "color": "#bbfbe7",
                "highlight": "#bbfbe7",
                "label": "AS53106 Netvga Servi\u00e7os em Telecomunica\u00e7\u00f5es Ltda."
            }, {
                "value": 4,
                "color": "#e9abf8",
                "highlight": "#e9abf8",
                "label": "AS52711 FASTNET LTDA ME"
            }, {
                "value": 4,
                "color": "#a5c6e3",
                "highlight": "#a5c6e3",
                "label": "AS11664 Techtel LMDS Comunicaciones Interactivas S.A."
            }, {
                "value": 4,
                "color": "#bac2a6",
                "highlight": "#bac2a6",
                "label": "AS262856 Mil Neg\u00f3cios LTDA."
            }, {
                "value": 4,
                "color": "#e5ed9a",
                "highlight": "#e5ed9a",
                "label": "AS52783 SKYNET TELECOMUNICACOES LTDA"
            }, {
                "value": 4,
                "color": "#3b8bec",
                "highlight": "#3b8bec",
                "label": "AS52565 EDGAR RODRIGUES ROMAO FILHO ME"
            }, {
                "value": 4,
                "color": "#4c9c5c",
                "highlight": "#4c9c5c",
                "label": "AS22381 Megatelecom Telecomunicacoes Ltda"
            }, {
                "value": 4,
                "color": "#d69489",
                "highlight": "#d69489",
                "label": "AS263260 ICONECT TELECOMUNICACOES INTERNET E SERVICOS LTDA"
            }, {
                "value": 4,
                "color": "#af8057",
                "highlight": "#af8057",
                "label": "AS53121 Infornet Consultoria e Assessoria Ltda"
            }, {
                "value": 4,
                "color": "#fff601",
                "highlight": "#fff601",
                "label": "AS53167 SERRANA TELECOMUNICACOES LTDA"
            }, {
                "value": 4,
                "color": "#f09311",
                "highlight": "#f09311",
                "label": "AS12271 Time Warner Cable Internet LLC"
            }, {
                "value": 4,
                "color": "#3f1bbd",
                "highlight": "#3f1bbd",
                "label": "AS63859 PT. Eka Mas Republik"
            }, {
                "value": 4,
                "color": "#d15fb3",
                "highlight": "#d15fb3",
                "label": "AS52980 Netion Solu\u00e7\u00f5es em Internet Via R\u00e1dio Ltda."
            }, {
                "value": 4,
                "color": "#6cf418",
                "highlight": "#6cf418",
                "label": "AS263655 T-NET WIRELESS E INFORMA&#769;TICA"
            }, {
                "value": 4,
                "color": "#afe810",
                "highlight": "#afe810",
                "label": "AS262952 AIRLIFE COMUNICACAO VIRTUAL LTDA"
            }, {
                "value": 4,
                "color": "#afbb40",
                "highlight": "#afbb40",
                "label": "AS52639 MEGANET RJ INFORM\u00c1TICA E TELECOMUNICA\u00c7\u00d5ES LTDA"
            }, {
                "value": 4,
                "color": "#6bf24e",
                "highlight": "#6bf24e",
                "label": "AS52739 PROVEDOR INTERSOUSA LTDA"
            }, {"value": 4, "color": "#cebfad", "highlight": "#cebfad", "label": "AS53112 SULNET TELECOM"}, {
                "value": 4,
                "color": "#7987e2",
                "highlight": "#7987e2",
                "label": "AS46652 ServerStack, Inc."
            }, {
                "value": 4,
                "color": "#f1dc1a",
                "highlight": "#f1dc1a",
                "label": "AS262789 Simternet Tecnologia da Informa\u00e7\u00e3o LTDA"
            }, {
                "value": 4,
                "color": "#b07a43",
                "highlight": "#b07a43",
                "label": "AS53242 NOGUEIRA & DANTAS LTDA"
            }, {
                "value": 4,
                "color": "#f976a1",
                "highlight": "#f976a1",
                "label": "AS22363 Powerhouse Management, Inc."
            }, {
                "value": 4,
                "color": "#8619ca",
                "highlight": "#8619ca",
                "label": "AS28201 CIA ITABIRANA DE TELECOMUNICACOES"
            }, {
                "value": 4,
                "color": "#d1c741",
                "highlight": "#d1c741",
                "label": "AS53054 STETNET INFORMATICA LTDA."
            }, {
                "value": 4,
                "color": "#aae13b",
                "highlight": "#aae13b",
                "label": "AS263656 BRSULNET TELECOM LTDA"
            }, {
                "value": 4,
                "color": "#34b073",
                "highlight": "#34b073",
                "label": "AS12353 Vodafone Portugal - Communicacoes Pessoais S.A."
            }, {
                "value": 4,
                "color": "#7440c3",
                "highlight": "#7440c3",
                "label": "AS262733 Netcetera Telecomunica\u00e7\u00f5es Ltda."
            }, {
                "value": 4,
                "color": "#f9ff49",
                "highlight": "#f9ff49",
                "label": "AS53184 INB Telecom EIRELI - ME"
            }, {
                "value": 4,
                "color": "#50f4f7",
                "highlight": "#50f4f7",
                "label": "AS14638 Liberty Cablevision of Puerto Rico LTD"
            }, {
                "value": 4,
                "color": "#df097f",
                "highlight": "#df097f",
                "label": "AS263393 ELI ANTONIO MARTINS ME"
            }, {
                "value": 4,
                "color": "#79e733",
                "highlight": "#79e733",
                "label": "AS262363 Wharehouse Informatica e Multimidia Ltda"
            }, {"value": 4, "color": "#ef8465", "highlight": "#ef8465", "label": "AS14522 Satnet"}, {
                "value": 4,
                "color": "#7f7cac",
                "highlight": "#7f7cac",
                "label": "AS42298 Ooredoo Q.S.C."
            }, {
                "value": 4,
                "color": "#8c2f3a",
                "highlight": "#8c2f3a",
                "label": "AS263276 BBCTECH PROVEDOR LTDA"
            }, {
                "value": 4,
                "color": "#13b9f1",
                "highlight": "#13b9f1",
                "label": "AS198605 AVAST Software s.r.o."
            }, {
                "value": 4,
                "color": "#4df303",
                "highlight": "#4df303",
                "label": "AS22884 TOTAL PLAY TELECOMUNICACIONES SA DE CV"
            }, {
                "value": 4,
                "color": "#eab2ea",
                "highlight": "#eab2ea",
                "label": "AS393406 Digital Ocean, Inc."
            }, {"value": 4, "color": "#9bb2a5", "highlight": "#9bb2a5", "label": "AS28075 ARLINK S.A."}, {
                "value": 4,
                "color": "#c25826",
                "highlight": "#c25826",
                "label": "AS263865 BILISIM PROVEDORES DE ACESSO A INTERNET LTDA - ME"
            }, {"value": 4, "color": "#7c756d", "highlight": "#7c756d", "label": "AS27768 CO.PA.CO."}, {
                "value": 4,
                "color": "#f83090",
                "highlight": "#f83090",
                "label": "AS262497 Jnnet Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 4,
                "color": "#b385fe",
                "highlight": "#b385fe",
                "label": "AS28192 Globalwave Telecom"
            }, {
                "value": 4,
                "color": "#678941",
                "highlight": "#678941",
                "label": "AS61893 RM dos Santos Informatica"
            }, {
                "value": 4,
                "color": "#9d242c",
                "highlight": "#9d242c",
                "label": "AS263585 DIGITAL NET LTDA"
            }, {
                "value": 4,
                "color": "#dabdad",
                "highlight": "#dabdad",
                "label": "AS61836 CYBERLAN SERVI\u00c7OS DE TELECOMUNICA\u00c7\u00d5ES LTDA"
            }, {
                "value": 3,
                "color": "#97cc36",
                "highlight": "#97cc36",
                "label": "AS263035 MEIRE RODRIGUES DOS SANTOS INFORMATICA ME"
            }, {
                "value": 3,
                "color": "#c289bb",
                "highlight": "#c289bb",
                "label": "AS262651 LIBnet Comunica\u00e7\u00e3o Interativa Ltda"
            }, {
                "value": 3,
                "color": "#c69d0f",
                "highlight": "#c69d0f",
                "label": "AS14420 CORPORACION NACIONAL DE TELECOMUNICACIONES - CNT EP"
            }, {
                "value": 3,
                "color": "#dfbf36",
                "highlight": "#dfbf36",
                "label": "AS52761 MARP Solution Provider"
            }, {
                "value": 3,
                "color": "#cdaa10",
                "highlight": "#cdaa10",
                "label": "AS265323 F. S. da Silva J\u00fanior - ME"
            }, {
                "value": 3,
                "color": "#64a84c",
                "highlight": "#64a84c",
                "label": "AS28329 G8 NETWORKS LTDA"
            }, {
                "value": 3,
                "color": "#a9fbd1",
                "highlight": "#a9fbd1",
                "label": "AS263339 3WLINK INTERNET LTDA EPP"
            }, {
                "value": 3,
                "color": "#267348",
                "highlight": "#267348",
                "label": "AS4771 Spark New Zealand Trading Ltd."
            }, {
                "value": 3,
                "color": "#c60ba2",
                "highlight": "#c60ba2",
                "label": "AS52575 Clara Luz Internet Ltda ME"
            }, {
                "value": 3,
                "color": "#20684d",
                "highlight": "#20684d",
                "label": "AS264940 InfoTelecom Banda Larga"
            }, {
                "value": 3,
                "color": "#50d2c4",
                "highlight": "#50d2c4",
                "label": "AS28310 SMART TELECOMUNICA\u00c7\u00d5ES E SERVI\u00c7OS EIRELLI EPP"
            }, {
                "value": 3,
                "color": "#4b51a8",
                "highlight": "#4b51a8",
                "label": "AS263124 ZAP TELECOMUNICA\u00c7\u00d5ES LTDA-ME"
            }, {
                "value": 3,
                "color": "#792ab9",
                "highlight": "#792ab9",
                "label": "AS3737 PenTeleData Inc."
            }, {
                "value": 3,
                "color": "#ed1d7b",
                "highlight": "#ed1d7b",
                "label": "AS52838 CONECT WEBNET SOLU\u00c7\u00d5ES EM INTERNET LTDA"
            }, {
                "value": 3,
                "color": "#c05f99",
                "highlight": "#c05f99",
                "label": "AS262989 CLICKNET BRASIL INFORMATICA E TELECOMUNICACOES LT"
            }, {
                "value": 3,
                "color": "#3ddde0",
                "highlight": "#3ddde0",
                "label": "AS53111 Centro Educacional Nossa Senhora Auxiliadora"
            }, {
                "value": 3,
                "color": "#41f9cf",
                "highlight": "#41f9cf",
                "label": "AS262493 Global Tech Internet Banda Larga EPP - ltda"
            }, {"value": 3, "color": "#e704a8", "highlight": "#e704a8", "label": "AS29518 Bredband2 AB"}, {
                "value": 3,
                "color": "#819c9c",
                "highlight": "#819c9c",
                "label": "AS19037 AMX Argentina S.A."
            }, {
                "value": 3,
                "color": "#6ca14f",
                "highlight": "#6ca14f",
                "label": "AS53171 Omni Telecomunicacoes Ltda"
            }, {
                "value": 3,
                "color": "#4375dc",
                "highlight": "#4375dc",
                "label": "AS18004 PT WIRELESS INDONESIA ( WIN )"
            }, {
                "value": 3,
                "color": "#b4e599",
                "highlight": "#b4e599",
                "label": "AS262561 BRIP MULTIMIDIA LTDA"
            }, {
                "value": 3,
                "color": "#5d1235",
                "highlight": "#5d1235",
                "label": "AS53093 Voax Provedor de Internet"
            }, {
                "value": 3,
                "color": "#d1d80f",
                "highlight": "#d1d80f",
                "label": "AS28271 DataCorpore Servi\u00e7os e Representa\u00e7\u00f5es"
            }, {
                "value": 3,
                "color": "#f08ae1",
                "highlight": "#f08ae1",
                "label": "AS14259 Gtd Internet S.A."
            }, {
                "value": 3,
                "color": "#d95f43",
                "highlight": "#d95f43",
                "label": "AS262723 Alessio & Longhi Ltda"
            }, {
                "value": 3,
                "color": "#615813",
                "highlight": "#615813",
                "label": "AS27680 TELEFONICA MOVIL DE CHILE S.A."
            }, {"value": 3, "color": "#17d5b4", "highlight": "#17d5b4", "label": "AS12322 Free SAS"}, {
                "value": 3,
                "color": "#20670d",
                "highlight": "#20670d",
                "label": "AS262986 Alexandre Alvarenga Informatica -ME"
            }, {
                "value": 3,
                "color": "#109c1e",
                "highlight": "#109c1e",
                "label": "AS262999 IVI TECNOLOGIA E COMUNICA\u00c7\u00c3O LTDA"
            }, {
                "value": 3,
                "color": "#9ee5ac",
                "highlight": "#9ee5ac",
                "label": "AS262903 Tubaron Telecom"
            }, {
                "value": 3,
                "color": "#20e690",
                "highlight": "#20e690",
                "label": "AS22394 Cellco Partnership DBA Verizon Wireless"
            }, {
                "value": 3,
                "color": "#5911dd",
                "highlight": "#5911dd",
                "label": "AS52741 Macedo e Castro Inform\u00e1tica LTDA"
            }, {
                "value": 3,
                "color": "#4797d7",
                "highlight": "#4797d7",
                "label": "AS52930 Turbo SP Internet Provider"
            }, {
                "value": 3,
                "color": "#184232",
                "highlight": "#184232",
                "label": "AS30633 Leaseweb USA, Inc."
            }, {
                "value": 3,
                "color": "#4f72d5",
                "highlight": "#4f72d5",
                "label": "AS28634 Life Servi\u00e7os de Comunica\u00e7\u00e3o Multimidia Ltda."
            }, {
                "value": 3,
                "color": "#e6fd07",
                "highlight": "#e6fd07",
                "label": "AS262893 P4 TELECOM LTDA"
            }, {
                "value": 3,
                "color": "#118b8b",
                "highlight": "#118b8b",
                "label": "AS263982 POWERNET SOLUTIONS LTDA"
            }, {"value": 3, "color": "#772c2d", "highlight": "#772c2d", "label": "AS14282 PERSIS TELECOM"}, {
                "value": 3,
                "color": "#b92f3b",
                "highlight": "#b92f3b",
                "label": "AS3303 Swisscom (Switzerland) Ltd"
            }, {"value": 3, "color": "#609aea", "highlight": "#609aea", "label": "AS17222 Mundivox LTDA"}, {
                "value": 3,
                "color": "#b0a060",
                "highlight": "#b0a060",
                "label": "AS53086 WEBTAL - Telecomunica\u00e7\u00f5es e Inform\u00e1tica Ltda."
            }, {
                "value": 3,
                "color": "#977058",
                "highlight": "#977058",
                "label": "AS28598 Mob Servicos de Telecomunicacoes Ltda"
            }, {
                "value": 3,
                "color": "#640224",
                "highlight": "#640224",
                "label": "AS262607 MAURICIO DE TOFFOL BOCH ME"
            }, {
                "value": 3,
                "color": "#fa095d",
                "highlight": "#fa095d",
                "label": "AS45510 Level 10, 9 Hunter Street"
            }, {
                "value": 3,
                "color": "#75a1c5",
                "highlight": "#75a1c5",
                "label": "AS61786 E. D. SERVI\u00c7OS DE COMUNICA\u00c7\u00d5ES LTDA"
            }, {
                "value": 3,
                "color": "#407a01",
                "highlight": "#407a01",
                "label": "AS52951 Catanduva sistemas a cabo ltda."
            }, {
                "value": 3,
                "color": "#6d7357",
                "highlight": "#6d7357",
                "label": "AS52722 Paranhananet Ltda."
            }, {
                "value": 3,
                "color": "#544b0d",
                "highlight": "#544b0d",
                "label": "AS262367 SW COMERCIO E SERVICOS DE COMUNICACAO MULTIMIDIA"
            }, {
                "value": 3,
                "color": "#9318dc",
                "highlight": "#9318dc",
                "label": "AS262644 CONECTA NETWORKS LTDA-ME"
            }, {
                "value": 3,
                "color": "#7a9f79",
                "highlight": "#7a9f79",
                "label": "AS27901 Pacifico Cable S.A."
            }, {
                "value": 3,
                "color": "#b368b7",
                "highlight": "#b368b7",
                "label": "AS4788 TM Net, Internet Service Provider"
            }, {
                "value": 3,
                "color": "#29b1e3",
                "highlight": "#29b1e3",
                "label": "AS4773 MobileOne Ltd. Mobile\/Internet Service Provider Singapore"
            }, {
                "value": 3,
                "color": "#7073ea",
                "highlight": "#7073ea",
                "label": "AS262848 Naja Telecomunica\u00e7\u00f5es Ltda."
            }, {
                "value": 3,
                "color": "#c3511c",
                "highlight": "#c3511c",
                "label": "AS263539 NEW SYSTEM INTERNET"
            }, {
                "value": 3,
                "color": "#3dfd62",
                "highlight": "#3dfd62",
                "label": "AS39375 Telekomunikacja Podlasie Sp. z o.o."
            }, {
                "value": 3,
                "color": "#43204d",
                "highlight": "#43204d",
                "label": "AS263856 ROGERIO BATISTA DOS SANTOS E CIA LTDA ME"
            }, {
                "value": 3,
                "color": "#4c4725",
                "highlight": "#4c4725",
                "label": "AS262253 ECONOCABLE MEDIA SAC"
            }, {
                "value": 3,
                "color": "#ca25bf",
                "highlight": "#ca25bf",
                "label": "AS28277 VMAX NET TELECOMUNICACOES DO BRASIL LTDA"
            }, {
                "value": 3,
                "color": "#16691d",
                "highlight": "#16691d",
                "label": "AS28255 WEST INTERNET BANDA LARGA"
            }, {
                "value": 3,
                "color": "#233394",
                "highlight": "#233394",
                "label": "AS262788 M.L. CARIUS-ME"
            }, {
                "value": 3,
                "color": "#ab6d8d",
                "highlight": "#ab6d8d",
                "label": "AS52853 UFLA - UNIVERSIDADE FEDERAL DE LAVRAS"
            }, {
                "value": 3,
                "color": "#3e8e4d",
                "highlight": "#3e8e4d",
                "label": "AS262797 INTERVALE INFORMATICA LTDA. - EPP."
            }, {"value": 3, "color": "#a21969", "highlight": "#a21969", "label": "AS263089 V de M Vargas"}, {
                "value": 3,
                "color": "#9dfc0a",
                "highlight": "#9dfc0a",
                "label": "AS9105 Tiscali UK Limited"
            }, {
                "value": 3,
                "color": "#286788",
                "highlight": "#286788",
                "label": "AS20057 AT&T Mobility LLC"
            }, {
                "value": 3,
                "color": "#eb3aa1",
                "highlight": "#eb3aa1",
                "label": "AS17379 Intelig Telecomunica\u00e7\u00f5es Ltda."
            }, {
                "value": 3,
                "color": "#9bf5a7",
                "highlight": "#9bf5a7",
                "label": "AS4250 Alentus Corporation"
            }, {
                "value": 3,
                "color": "#649d4d",
                "highlight": "#649d4d",
                "label": "AS262889 Softhouse Solu\u00e7\u00f5es em Inform\u00e1tica"
            }, {
                "value": 3,
                "color": "#bf5dd9",
                "highlight": "#bf5dd9",
                "label": "AS264160 PRYMUS SERVI\u00e7OS EM TELECOMUNICA\u00e7\u00f5ES LTDA"
            }, {
                "value": 3,
                "color": "#634dbc",
                "highlight": "#634dbc",
                "label": "AS262645 BRASILNET TELECOMUNICACOES DO PARANA LTDA"
            }, {
                "value": 3,
                "color": "#760848",
                "highlight": "#760848",
                "label": "AS15311 Telefonica Empresas"
            }, {
                "value": 3,
                "color": "#87d57b",
                "highlight": "#87d57b",
                "label": "AS263431 SULNET RC INTERNET PROVIDER INFORMATICA LTDA"
            }, {
                "value": 3,
                "color": "#fa7257",
                "highlight": "#fa7257",
                "label": "AS7011 Frontier Communications of America, Inc."
            }, {
                "value": 3,
                "color": "#72c8a2",
                "highlight": "#72c8a2",
                "label": "AS28241 Viaceu Internet Ltda"
            }, {
                "value": 3,
                "color": "#c516b7",
                "highlight": "#c516b7",
                "label": "AS262489 Telecomunica\u00e7\u00f5es Sapucai Telecom Ltda"
            }, {
                "value": 3,
                "color": "#412312",
                "highlight": "#412312",
                "label": "AS53019 infotec- servi\u00e7os de provedor da internet ltda"
            }, {
                "value": 3,
                "color": "#aa545c",
                "highlight": "#aa545c",
                "label": "AS262476 PROVEDOR BRCENTRAL.NET LTDA"
            }, {
                "value": 3,
                "color": "#6067a9",
                "highlight": "#6067a9",
                "label": "AS27664 CTBC MULTIMIDIA DATA NET S\/A"
            }, {
                "value": 3,
                "color": "#3aec20",
                "highlight": "#3aec20",
                "label": "AS263271 estrelar web servi\u00e7os de internet ltda"
            }, {
                "value": 3,
                "color": "#14b66d",
                "highlight": "#14b66d",
                "label": "AS61884 NORTE TELECOMUNICA\u00c7\u00d5ES MULTIMIDIA LTDA"
            }, {
                "value": 3,
                "color": "#caccf8",
                "highlight": "#caccf8",
                "label": "AS262673 Lafaiete Provedor de Internet e Telecomunic Ltda"
            }, {
                "value": 3,
                "color": "#86c642",
                "highlight": "#86c642",
                "label": "AS263135 NOVA PORTONET TELECOMUNICA\u00c7\u00d5ES LTDA ME"
            }, {"value": 3, "color": "#9cc2fc", "highlight": "#9cc2fc", "label": "AS45899 VNPT Corp"}, {
                "value": 3,
                "color": "#ab12d2",
                "highlight": "#ab12d2",
                "label": "AS263611 ZUM TELECOM LTDA- ME"
            }, {
                "value": 3,
                "color": "#38e7f8",
                "highlight": "#38e7f8",
                "label": "AS263500 ON LINE Servi\u00e7os"
            }, {
                "value": 3,
                "color": "#b6a9e2",
                "highlight": "#b6a9e2",
                "label": "AS262463 Telecom Cordeir\u00f3polis Ltda."
            }, {
                "value": 3,
                "color": "#24d32a",
                "highlight": "#24d32a",
                "label": "AS53140 MPC INTERNET LTDA"
            }, {
                "value": 3,
                "color": "#f3d114",
                "highlight": "#f3d114",
                "label": "AS28186 ITS TELECOMUNICA\u00c7\u00d5ES LTDA"
            }, {"value": 3, "color": "#fdf44c", "highlight": "#fdf44c", "label": "AS52973 YIP Telecom"}, {
                "value": 3,
                "color": "#8ca33e",
                "highlight": "#8ca33e",
                "label": "AS262668 Mar Provedor de Internet Ltda"
            }, {"value": 3, "color": "#dd804a", "highlight": "#dd804a", "label": "AS262970 Tudo Internet"}, {
                "value": 3,
                "color": "#290b6e",
                "highlight": "#290b6e",
                "label": "AS61868 NETFACIL INTERNET VIA RADIO E INFORMATICA LTDA - M"
            }, {
                "value": 3,
                "color": "#ae3464",
                "highlight": "#ae3464",
                "label": "AS10715 Universidade Federal de Santa Catarina"
            }, {
                "value": 3,
                "color": "#e9fdd8",
                "highlight": "#e9fdd8",
                "label": "AS53086 OAI INTERNET LTDA"
            }, {"value": 3, "color": "#4f56bd", "highlight": "#4f56bd", "label": "AS264483 RP Telecom"}, {
                "value": 3,
                "color": "#ee354a",
                "highlight": "#ee354a",
                "label": "AS52629 W.E.K. INFORMATICA LTDA - ME"
            }, {
                "value": 3,
                "color": "#983897",
                "highlight": "#983897",
                "label": "AS263056 INDNET TELECOMUNICACOES LTDA"
            }, {
                "value": 3,
                "color": "#1fb610",
                "highlight": "#1fb610",
                "label": "AS262812 K.H.D. SILVESTRI E CIA LTDA"
            }, {
                "value": 3,
                "color": "#eec5cf",
                "highlight": "#eec5cf",
                "label": "AS262983 Net Barretos Tecnologia LTDA - ME"
            }, {
                "value": 3,
                "color": "#d2311e",
                "highlight": "#d2311e",
                "label": "AS11844 EMPRESA CATARINENSE DE TECNOLOGIA EM TEL LTDA"
            }, {
                "value": 3,
                "color": "#5ef48a",
                "highlight": "#5ef48a",
                "label": "AS52768 ALSOL Provedor de Internet Ltda."
            }, {
                "value": 3,
                "color": "#993eed",
                "highlight": "#993eed",
                "label": "AS28322 Mar Internet Provider Ltda."
            }, {
                "value": 3,
                "color": "#c0f62e",
                "highlight": "#c0f62e",
                "label": "AS15119 Southern Illinois University"
            }, {
                "value": 3,
                "color": "#3a00bd",
                "highlight": "#3a00bd",
                "label": "AS28211 Bidobens Participa\u00e7\u00f5es e Empreendimentos Ltda"
            }, {
                "value": 3,
                "color": "#1e1191",
                "highlight": "#1e1191",
                "label": "AS28218 Tv Cabo de Presidente Venceslau S\/S Ltda. EPP"
            }, {"value": 3, "color": "#2723df", "highlight": "#2723df", "label": "AS52812 WRLINK TELECOM"}, {
                "value": 3,
                "color": "#65fd93",
                "highlight": "#65fd93",
                "label": "AS262839 Yawl Telecomunica\u00e7\u00e3o e Rep. de Inform\u00e1tica Ltda."
            }, {"value": 3, "color": "#b8ce3e", "highlight": "#b8ce3e", "label": "AS6848 Telenet N.V."}, {
                "value": 3,
                "color": "#3439fa",
                "highlight": "#3439fa",
                "label": "AS264459 NET ALTERNATIVA PROVEDOR DE INTERNET LTDA - ME"
            }, {
                "value": 3,
                "color": "#7d4a95",
                "highlight": "#7d4a95",
                "label": "AS61908 Nova Net Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 3,
                "color": "#581ceb",
                "highlight": "#581ceb",
                "label": "AS28162 IBL Telecomunica\u00e7\u00f5es Ltda."
            }, {
                "value": 3,
                "color": "#6cdcb1",
                "highlight": "#6cdcb1",
                "label": "AS263600 Radio Link Internet"
            }, {
                "value": 3,
                "color": "#d97746",
                "highlight": "#d97746",
                "label": "AS52862 Redenilf Servi\u00e7os de Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 3,
                "color": "#678935",
                "highlight": "#678935",
                "label": "AS263324 Net&Com Servi\u00e7os de Inform\u00e1tica e Telecomunica\u00e7\u00f5es"
            }, {
                "value": 3,
                "color": "#78dc4f",
                "highlight": "#78dc4f",
                "label": "AS28163 Cosmonline Inform\u00e1tica Ltda"
            }, {
                "value": 3,
                "color": "#c49165",
                "highlight": "#c49165",
                "label": "AS53180 Infortel Telecomunica\u00e7\u00f5es e Servi\u00e7os EIRELI - ME"
            }, {
                "value": 3,
                "color": "#c13706",
                "highlight": "#c13706",
                "label": "AS62567 Digital Ocean, Inc."
            }, {
                "value": 3,
                "color": "#4e56d9",
                "highlight": "#4e56d9",
                "label": "AS61665 ROMICROS BRASIL LTDA"
            }, {
                "value": 3,
                "color": "#5af52e",
                "highlight": "#5af52e",
                "label": "AS53087 SITECNET INFORM\u00c1TICA LTDA"
            }, {
                "value": 3,
                "color": "#4d1589",
                "highlight": "#4d1589",
                "label": "AS263262 TOPPNET TELECOM LTDA"
            }, {
                "value": 3,
                "color": "#96f202",
                "highlight": "#96f202",
                "label": "AS53001 NAXI TELECOMUNICACOES"
            }, {
                "value": 3,
                "color": "#4e4a51",
                "highlight": "#4e4a51",
                "label": "AS264013 CONNECTA TELECOM INTERNET LTDA - EPP"
            }, {
                "value": 3,
                "color": "#2196a5",
                "highlight": "#2196a5",
                "label": "AS263546 TURBONETT TELECOMUNICACOES LTDA. - ME"
            }, {"value": 3, "color": "#70107d", "highlight": "#70107d", "label": "AS3209 Vodafone GmbH"}, {
                "value": 3,
                "color": "#d47d42",
                "highlight": "#d47d42",
                "label": "AS263880 WANTEL TECNOLOGIA LTDA. \u00ad EPP"
            }, {
                "value": 3,
                "color": "#c39053",
                "highlight": "#c39053",
                "label": "AS264556 L. Garcia Comunica\u00e7\u00f5es ME"
            }, {
                "value": 3,
                "color": "#538d87",
                "highlight": "#538d87",
                "label": "AS262671 S & M Inform\u00e1tica Ltda."
            }, {
                "value": 3,
                "color": "#46d4cc",
                "highlight": "#46d4cc",
                "label": "AS36423 San Juan Cable, LLC"
            }, {
                "value": 3,
                "color": "#feb823",
                "highlight": "#feb823",
                "label": "AS28481 SERVICIO Y EQUIPO EN TELEFON\u00cdA INTERNET Y TV S.A. DE C.V."
            }, {
                "value": 3,
                "color": "#c4825c",
                "highlight": "#c4825c",
                "label": "AS262696 Turbonet Telecomunica\u00e7\u00f5es"
            }, {"value": 3, "color": "#ee8d80", "highlight": "#ee8d80", "label": "AS28335 MAXCOMM LTDA"}, {
                "value": 2,
                "color": "#8da2a8",
                "highlight": "#8da2a8",
                "label": "AS61817 Halley Telecom Comercio & Servi\u00e7o Ltda Me"
            }, {
                "value": 2,
                "color": "#a06592",
                "highlight": "#a06592",
                "label": "AS262788 SELECT LATINA CORPORATE"
            }, {
                "value": 2,
                "color": "#9034d5",
                "highlight": "#9034d5",
                "label": "AS53125 NAPE - N\u00facleo de Assessoria aos Prof. e Empr."
            }, {
                "value": 2,
                "color": "#e58515",
                "highlight": "#e58515",
                "label": "AS264867 Click Telecomunica\u00e7\u00e3o Ltda ME"
            }, {
                "value": 2,
                "color": "#e2a2d3",
                "highlight": "#e2a2d3",
                "label": "AS28657 MD Brasil - Tecnologia da Informa\u00e7\u00e3o Ltda"
            }, {
                "value": 2,
                "color": "#d6b564",
                "highlight": "#d6b564",
                "label": "AS264513 R H M NET LTDA - ME"
            }, {"value": 2, "color": "#fbf3a6", "highlight": "#fbf3a6", "label": "AS52732 N F DA SILVA"}, {
                "value": 2,
                "color": "#9eeb7e",
                "highlight": "#9eeb7e",
                "label": "AS262645 LB REDES DE TELECOMUNICA\u00c7\u00d5ES LTDA"
            }, {"value": 2, "color": "#131f9e", "highlight": "#131f9e", "label": "AS54500 EGIHosting"}, {
                "value": 2,
                "color": "#c0ac7e",
                "highlight": "#c0ac7e",
                "label": "AS264106 ANDRADE & LANDIM TELECOMUNICACOES LTDA"
            }, {
                "value": 2,
                "color": "#48a65f",
                "highlight": "#48a65f",
                "label": "AS263008 UNIREDES TELECOMUNICACOES E INFORMATICA LTDA ME"
            }, {"value": 2, "color": "#a2b415", "highlight": "#a2b415", "label": "AS9905 Linknet ASN"}, {
                "value": 2,
                "color": "#4b4313",
                "highlight": "#4b4313",
                "label": "AS264332 CONEX\u00c3O INOVE TELECOMUNICA\u00c7\u00d5ES LTDA ME"
            }, {
                "value": 2,
                "color": "#304bbb",
                "highlight": "#304bbb",
                "label": "AS61650 WIRELESSNET INTERNET SOLUTIONS LTDA - ME"
            }, {
                "value": 2,
                "color": "#198c84",
                "highlight": "#198c84",
                "label": "AS46261 QuickPacket, LLC"
            }, {
                "value": 2,
                "color": "#a7be2e",
                "highlight": "#a7be2e",
                "label": "AS31642 Varnamo Energi AB"
            }, {
                "value": 2,
                "color": "#a15a9b",
                "highlight": "#a15a9b",
                "label": "AS263460 7 BRASIL TELECOM LTDA ME"
            }, {
                "value": 2,
                "color": "#9d0eb7",
                "highlight": "#9d0eb7",
                "label": "AS28165 Wireless Comm Services LTDA"
            }, {
                "value": 2,
                "color": "#a2a395",
                "highlight": "#a2a395",
                "label": "AS262681 DATACONNECTION - PROVEDOR DE INTERNET LTDA-ME"
            }, {
                "value": 2,
                "color": "#35d69c",
                "highlight": "#35d69c",
                "label": "AS264228 BRASIL STARLINK TELECOMUNICACOES LTDA - EPP"
            }, {
                "value": 2,
                "color": "#a60285",
                "highlight": "#a60285",
                "label": "AS263883 Transcabo Comunica\u00e7\u00f5es Ltda."
            }, {
                "value": 2,
                "color": "#bee306",
                "highlight": "#bee306",
                "label": "AS53202 Acesso10 Telecom"
            }, {
                "value": 2,
                "color": "#90f1c1",
                "highlight": "#90f1c1",
                "label": "AS23074 Petr\u00f3leo Brasileiro S\/A - Petrobras"
            }, {
                "value": 2,
                "color": "#c666f9",
                "highlight": "#c666f9",
                "label": "AS52932 Tecnowireless Telecom Ltda"
            }, {
                "value": 2,
                "color": "#5c8b06",
                "highlight": "#5c8b06",
                "label": "AS264135 Priston Net Telecom"
            }, {
                "value": 2,
                "color": "#e37b12",
                "highlight": "#e37b12",
                "label": "AS264293 Smart Solucoes em Telecomunicacoes"
            }, {
                "value": 2,
                "color": "#ffdca3",
                "highlight": "#ffdca3",
                "label": "AS262549 CELINET INFORMATICA LTDA-ME"
            }, {
                "value": 2,
                "color": "#dc44b4",
                "highlight": "#dc44b4",
                "label": "AS28591 MCM Telecom Ltda."
            }, {
                "value": 2,
                "color": "#9c7f19",
                "highlight": "#9c7f19",
                "label": "AS52687 Leni gomes Oberleander ME"
            }, {"value": 2, "color": "#1c99f5", "highlight": "#1c99f5", "label": "AS14754 Telgua"}, {
                "value": 2,
                "color": "#7382e3",
                "highlight": "#7382e3",
                "label": "AS10091 StarHub Cable Vision Ltd"
            }, {
                "value": 2,
                "color": "#74a2ad",
                "highlight": "#74a2ad",
                "label": "AS263320 Sansara Telecom"
            }, {
                "value": 2,
                "color": "#21e057",
                "highlight": "#21e057",
                "label": "AS53145 PROVEDOR REDESUL LTDA"
            }, {
                "value": 2,
                "color": "#138041",
                "highlight": "#138041",
                "label": "AS28571 UNIVERSIDADE DE SAO PAULO"
            }, {"value": 2, "color": "#893e70", "highlight": "#893e70", "label": "AS262688 Qnet Telecom"}, {
                "value": 2,
                "color": "#239d17",
                "highlight": "#239d17",
                "label": "AS264348 Webcenter Inform\u00e1tica"
            }, {
                "value": 2,
                "color": "#727eda",
                "highlight": "#727eda",
                "label": "AS61934 Puma Internet Tecnologia de Comunica\u00e7\u00e3o LTDA Me"
            }, {
                "value": 2,
                "color": "#816c6f",
                "highlight": "#816c6f",
                "label": "AS3269 Telecom Italia S.p.a."
            }, {
                "value": 2,
                "color": "#811a00",
                "highlight": "#811a00",
                "label": "AS262758 Unisites Servi\u00e7os de Inform\u00e1tica EIRELI"
            }, {
                "value": 2,
                "color": "#aa52bd",
                "highlight": "#aa52bd",
                "label": "AS263314 ATALINK TELECOMUNICACOES"
            }, {
                "value": 2,
                "color": "#5fa605",
                "highlight": "#5fa605",
                "label": "AS61695 Jet Link Telecomunicacoes LTDA"
            }, {"value": 2, "color": "#436249", "highlight": "#436249", "label": "AS6871 PlusNet plc."}, {
                "value": 2,
                "color": "#c730d9",
                "highlight": "#c730d9",
                "label": "AS11802 Centro de Informatica e Automacao do Estado de SC"
            }, {
                "value": 2,
                "color": "#531b10",
                "highlight": "#531b10",
                "label": "AS28245 NETDIGIT TELECOMUNICACOES LTDA"
            }, {
                "value": 2,
                "color": "#9ddd09",
                "highlight": "#9ddd09",
                "label": "AS262478 AUE Provedor de Internet LTDA."
            }, {
                "value": 2,
                "color": "#8d68fe",
                "highlight": "#8d68fe",
                "label": "AS28285 World Line Ltda"
            }, {
                "value": 2,
                "color": "#a81b08",
                "highlight": "#a81b08",
                "label": "AS61844 NEW MASTER PROVEDOR DE ACESSO A INTERNET"
            }, {
                "value": 2,
                "color": "#9d7b70",
                "highlight": "#9d7b70",
                "label": "AS53237 TELECOMUNICACOES BRASILEIRAS S. A. - TELEBRAS"
            }, {"value": 2, "color": "#2f7c1b", "highlight": "#2f7c1b", "label": "AS262539 DUNET LTDA ME"}, {
                "value": 2,
                "color": "#a8ddad",
                "highlight": "#a8ddad",
                "label": "AS262674 Conquest Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 2,
                "color": "#270747",
                "highlight": "#270747",
                "label": "AS263908 VICONTEC TECNOLOGIA INTERNET E REDES LTDA"
            }, {
                "value": 2,
                "color": "#8c22b1",
                "highlight": "#8c22b1",
                "label": "AS28330 IFTNET Informatica Ltda"
            }, {"value": 2, "color": "#89924a", "highlight": "#89924a", "label": "AS27836 Smartcom"}, {
                "value": 2,
                "color": "#ecfc39",
                "highlight": "#ecfc39",
                "label": "AS56300 MyRepublic Ltd."
            }, {"value": 2, "color": "#4e0f98", "highlight": "#4e0f98", "label": "AS20473 Choopa, LLC"}, {
                "value": 2,
                "color": "#461b9e",
                "highlight": "#461b9e",
                "label": "AS263665 TECNET PROVEDOR DE ACESSO AS REDES DE COM. LTDA"
            }, {
                "value": 2,
                "color": "#f5de76",
                "highlight": "#f5de76",
                "label": "AS21021 Multimedia Polska S.A."
            }, {"value": 2, "color": "#991f12", "highlight": "#991f12", "label": "AS2116 Broadnet AS"}, {
                "value": 2,
                "color": "#b46dcb",
                "highlight": "#b46dcb",
                "label": "AS17639 ComClark Network & Technology Corp."
            }, {
                "value": 2,
                "color": "#3eab26",
                "highlight": "#3eab26",
                "label": "AS52993 Ver Tv Comunica\u00e7\u00f5es S\/A"
            }, {
                "value": 2,
                "color": "#fc0f28",
                "highlight": "#fc0f28",
                "label": "AS262660 Consult Informatica Ltda"
            }, {"value": 2, "color": "#e12e4f", "highlight": "#e12e4f", "label": "AS13110 INEA S.A."}, {
                "value": 2,
                "color": "#4b72b3",
                "highlight": "#4b72b3",
                "label": "AS262488 Minasnet Servi\u00e7os de Provedor de Internet Ltda"
            }, {
                "value": 2,
                "color": "#bc7eb8",
                "highlight": "#bc7eb8",
                "label": "AS52711 FASTNET TELECOM"
            }, {
                "value": 2,
                "color": "#b0d98c",
                "highlight": "#b0d98c",
                "label": "AS251 Kaia Global Networks Ltd."
            }, {
                "value": 2,
                "color": "#a17afd",
                "highlight": "#a17afd",
                "label": "AS263525 Dispor de Telecomunicaes Ltda"
            }, {
                "value": 2,
                "color": "#fe9d4e",
                "highlight": "#fe9d4e",
                "label": "AS61917 LUCARONI TELECOM LTDA ME"
            }, {
                "value": 2,
                "color": "#384ee6",
                "highlight": "#384ee6",
                "label": "AS59108 KATCH NETWORK INC."
            }, {
                "value": 2,
                "color": "#d7decb",
                "highlight": "#d7decb",
                "label": "AS12353 Vodafone Telecel, Comunicacoes Pessoais, SA"
            }, {
                "value": 2,
                "color": "#fddb63",
                "highlight": "#fddb63",
                "label": "AS6389 BellSouth.net Inc."
            }, {
                "value": 2,
                "color": "#344f87",
                "highlight": "#344f87",
                "label": "AS1640 Thacker-Grigsby Communications"
            }, {
                "value": 2,
                "color": "#2cb418",
                "highlight": "#2cb418",
                "label": "AS263943 MALTA E CARVALHO LTDA - EPP"
            }, {
                "value": 2,
                "color": "#1383f6",
                "highlight": "#1383f6",
                "label": "AS264326 CARTECH INFORMATICA LTDA"
            }, {
                "value": 2,
                "color": "#9a767e",
                "highlight": "#9a767e",
                "label": "AS15389 P\/F Telefonverkid"
            }, {
                "value": 2,
                "color": "#c1a372",
                "highlight": "#c1a372",
                "label": "AS264295 Unolink Telecom Ltda ME"
            }, {
                "value": 2,
                "color": "#f30e9d",
                "highlight": "#f30e9d",
                "label": "AS52682 Mega Velocidade Internet Banda Larga"
            }, {
                "value": 2,
                "color": "#b49952",
                "highlight": "#b49952",
                "label": "AS264440 POINT TELECOMUNICA\u00c7\u00d5ES LTDA ME"
            }, {
                "value": 2,
                "color": "#a47dae",
                "highlight": "#a47dae",
                "label": "AS52963 JATIMNET TELECOM"
            }, {
                "value": 2,
                "color": "#7de8c3",
                "highlight": "#7de8c3",
                "label": "AS52747 Wsp Servi\u00e7os de Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 2,
                "color": "#5ff97e",
                "highlight": "#5ff97e",
                "label": "AS262983 Net Barretos Tecnologia Ltda"
            }, {
                "value": 2,
                "color": "#e37e08",
                "highlight": "#e37e08",
                "label": "AS61769 Petry Eletronica e Informatica Ltda me"
            }, {
                "value": 2,
                "color": "#b23b30",
                "highlight": "#b23b30",
                "label": "AS11404 vanoppen.biz LLC"
            }, {
                "value": 2,
                "color": "#52b3f0",
                "highlight": "#52b3f0",
                "label": "AS25605 Cisco Systems Ironport Division"
            }, {
                "value": 2,
                "color": "#7ef3fa",
                "highlight": "#7ef3fa",
                "label": "AS53058 ABAETE NET SERVI\u00c7OS EM TECNOL. DE INFORM\u00c1TICA LTDA"
            }, {
                "value": 2,
                "color": "#3920e1",
                "highlight": "#3920e1",
                "label": "AS6730 Sunrise Communications AG"
            }, {"value": 2, "color": "#cfc2ba", "highlight": "#cfc2ba", "label": "AS52742 HELP INTERNET"}, {
                "value": 2,
                "color": "#1e09ec",
                "highlight": "#1e09ec",
                "label": "AS52879 ABM INFORMATICA E TELECOM"
            }, {
                "value": 2,
                "color": "#ecfddf",
                "highlight": "#ecfddf",
                "label": "AS52788 Meganet Telecomunica\u00e7oes e Internet LTDA"
            }, {
                "value": 2,
                "color": "#8ef27e",
                "highlight": "#8ef27e",
                "label": "AS262761 Sinal BR Telecom LTDA"
            }, {
                "value": 2,
                "color": "#578cc6",
                "highlight": "#578cc6",
                "label": "AS262403 Net Way Telecom LTDA ME"
            }, {
                "value": 2,
                "color": "#cc7bfb",
                "highlight": "#cc7bfb",
                "label": "AS262596 Nortelpa Engenharia S.A"
            }, {"value": 2, "color": "#a506b8", "highlight": "#a506b8", "label": "AS65040"}, {
                "value": 2,
                "color": "#f8e7d7",
                "highlight": "#f8e7d7",
                "label": "AS61887 Inet Rio LTDA - ME"
            }, {"value": 2, "color": "#8dbd03", "highlight": "#8dbd03", "label": "AS61856 Viamar Telecom"}, {
                "value": 2,
                "color": "#eb3cb3",
                "highlight": "#eb3cb3",
                "label": "AS28247 Intercampo Empreendimentos Tecnol\u00f3gicos Ltda"
            }, {
                "value": 2,
                "color": "#9c56ff",
                "highlight": "#9c56ff",
                "label": "AS262197 MILLICOM CABLE COSTA RICA S.A."
            }, {
                "value": 2,
                "color": "#847132",
                "highlight": "#847132",
                "label": "AS264952 GSG TELECOM SERVICOS LTDA - ME"
            }, {"value": 2, "color": "#91a773", "highlight": "#91a773", "label": "AS29854 WestHost, Inc."}, {
                "value": 2,
                "color": "#438d06",
                "highlight": "#438d06",
                "label": "AS174 Cogent Communications"
            }, {
                "value": 2,
                "color": "#b24a19",
                "highlight": "#b24a19",
                "label": "AS7048 Linha Livre Internet Ltda"
            }, {"value": 2, "color": "#a77eef", "highlight": "#a77eef", "label": "AS12576 EE Limited"}, {
                "value": 2,
                "color": "#a48184",
                "highlight": "#a48184",
                "label": "AS262359 GOONET TELECOMUNICACOES LTDA - ME"
            }, {"value": 2, "color": "#93458b", "highlight": "#93458b", "label": "AS3215 Orange S.A."}, {
                "value": 2,
                "color": "#4220eb",
                "highlight": "#4220eb",
                "label": "AS22616 ZSCALER, INC."
            }, {
                "value": 2,
                "color": "#7b8f62",
                "highlight": "#7b8f62",
                "label": "AS262728 ELETRODATA LTDA"
            }, {
                "value": 2,
                "color": "#f239dc",
                "highlight": "#f239dc",
                "label": "AS855 Bell Aliant Regional Communications, Inc."
            }, {
                "value": 2,
                "color": "#be25f1",
                "highlight": "#be25f1",
                "label": "AS61708 INFOCAT INFORM\u00c1TICA LTDA"
            }, {
                "value": 2,
                "color": "#7232b8",
                "highlight": "#7232b8",
                "label": "AS52730 INFORTEK NETWORKS LTDA -ME"
            }, {
                "value": 2,
                "color": "#b4db21",
                "highlight": "#b4db21",
                "label": "AS264003 Pronet Telecom"
            }, {
                "value": 2,
                "color": "#f4a085",
                "highlight": "#f4a085",
                "label": "AS52532 Speednet Telecomunica\u00e7\u00f5es Ltda ME"
            }, {
                "value": 2,
                "color": "#896072",
                "highlight": "#896072",
                "label": "AS262433 QI Equipamentos para Inform\u00e1tica Ltda."
            }, {
                "value": 2,
                "color": "#a09b27",
                "highlight": "#a09b27",
                "label": "AS263424 Fonelight Telecomunica\u00e7\u00f5es S\/A"
            }, {
                "value": 2,
                "color": "#99f2cf",
                "highlight": "#99f2cf",
                "label": "AS263675 Jair Aparecido Casarotte-EPP"
            }, {
                "value": 2,
                "color": "#3ef289",
                "highlight": "#3ef289",
                "label": "AS23969 TOT Public Company Limited"
            }, {
                "value": 2,
                "color": "#8851a8",
                "highlight": "#8851a8",
                "label": "AS52958 Empr.Tec.Inform.Comun. Mun.SP-PRODAM-SP S\/A"
            }, {
                "value": 2,
                "color": "#5815d0",
                "highlight": "#5815d0",
                "label": "AS44581 AllTele Allmanna Svenska Telefonaktiebolaget"
            }, {
                "value": 2,
                "color": "#45866b",
                "highlight": "#45866b",
                "label": "AS52775 TecleNet Solucoes Tecnologicas"
            }, {
                "value": 2,
                "color": "#6b36bc",
                "highlight": "#6b36bc",
                "label": "AS263617 MARIA DAS NEVES MORAIS"
            }, {
                "value": 2,
                "color": "#807bc9",
                "highlight": "#807bc9",
                "label": "AS265301 UPNET TELECOMUNICA\u00c7\u00d5ES DA COSTA VERDE LTDA"
            }, {
                "value": 2,
                "color": "#3e0960",
                "highlight": "#3e0960",
                "label": "AS61739 FUNCIONAL INFORMATICA LTDA -ME"
            }, {
                "value": 2,
                "color": "#50e3c7",
                "highlight": "#50e3c7",
                "label": "AS262975 A. C. VERA FILHO TELECOMUNICACOES E INFORMATICA -"
            }, {
                "value": 2,
                "color": "#90c181",
                "highlight": "#90c181",
                "label": "AS263144 R2 TECNOLOGIA E TELECOMUNICACOES LTDA - ME"
            }, {
                "value": 2,
                "color": "#76cac2",
                "highlight": "#76cac2",
                "label": "AS264125 UN TELECOMUNICACOES LTDA ME"
            }, {
                "value": 2,
                "color": "#f137b7",
                "highlight": "#f137b7",
                "label": "AS262687 Screen Saver Inform\u00e1tica LTDA"
            }, {
                "value": 2,
                "color": "#5afc9c",
                "highlight": "#5afc9c",
                "label": "AS264239 Digital Telecomunica\u00e7\u00f5es Ltda-Me"
            }, {"value": 2, "color": "#1c2c0e", "highlight": "#1c2c0e", "label": "AS262971 IDL NET"}, {
                "value": 2,
                "color": "#66bd10",
                "highlight": "#66bd10",
                "label": "AS52760 Grupo G1 Telecom Ltda"
            }, {
                "value": 2,
                "color": "#8d2648",
                "highlight": "#8d2648",
                "label": "AS262360 INFORMATICA ITAPIRANGA LTDA - ME"
            }, {
                "value": 2,
                "color": "#51f0cf",
                "highlight": "#51f0cf",
                "label": "AS262159 Digital TV Cable de Edmund Daher"
            }, {
                "value": 2,
                "color": "#5c9f21",
                "highlight": "#5c9f21",
                "label": "AS262706 Ultranet Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 2,
                "color": "#e1d49a",
                "highlight": "#e1d49a",
                "label": "AS52554 S. A. da Silva Junior"
            }, {
                "value": 2,
                "color": "#fa97ae",
                "highlight": "#fa97ae",
                "label": "AS262316 Index Internet Solution Provider Ltda Me"
            }, {
                "value": 2,
                "color": "#266ca0",
                "highlight": "#266ca0",
                "label": "AS262427 Invista Net Provedor de Acesso Ltda"
            }, {
                "value": 2,
                "color": "#bda1a3",
                "highlight": "#bda1a3",
                "label": "AS28512 Cablemas Telecomunicaciones SA de CV"
            }, {
                "value": 2,
                "color": "#2fbfdd",
                "highlight": "#2fbfdd",
                "label": "AS52981 Conecta Tecnologia LTDA"
            }, {
                "value": 2,
                "color": "#be86ad",
                "highlight": "#be86ad",
                "label": "AS262378 Compuservice Empreendimentos Ltda"
            }, {
                "value": 2,
                "color": "#1b1f01",
                "highlight": "#1b1f01",
                "label": "AS9790 CallPlus Services Limited"
            }, {"value": 2, "color": "#8c4475", "highlight": "#8c4475", "label": "AS7122 MTS Inc."}, {
                "value": 2,
                "color": "#6b918b",
                "highlight": "#6b918b",
                "label": "AS262973 Max Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 2,
                "color": "#2227c7",
                "highlight": "#2227c7",
                "label": "AS38285 M2 Telecommunications Group Ltd"
            }, {
                "value": 2,
                "color": "#c305a7",
                "highlight": "#c305a7",
                "label": "AS52539 SBS-NET TELECOMUNICACOES LTDA ME"
            }, {
                "value": 2,
                "color": "#e6a46b",
                "highlight": "#e6a46b",
                "label": "AS9121 Turk Telekomunikasyon Anonim Sirketi"
            }, {
                "value": 2,
                "color": "#75f0ef",
                "highlight": "#75f0ef",
                "label": "AS264449 A. A. Inform\u00e1tica e Manuten\u00e7\u00e3o Ltda"
            }, {
                "value": 2,
                "color": "#86b70b",
                "highlight": "#86b70b",
                "label": "AS53232 Banner Servi\u00e7os de Telecom e Internet Ltda."
            }, {
                "value": 2,
                "color": "#71777a",
                "highlight": "#71777a",
                "label": "AS39832 Opera Software ASA"
            }, {
                "value": 2,
                "color": "#9892a8",
                "highlight": "#9892a8",
                "label": "AS53110 SystemsFox presta\u00e7\u00e3o de servi\u00e7os LTDA"
            }, {
                "value": 2,
                "color": "#5b4391",
                "highlight": "#5b4391",
                "label": "AS265242 FIGUEIREDO E SILVA - EPP"
            }, {
                "value": 2,
                "color": "#926ff5",
                "highlight": "#926ff5",
                "label": "AS52727 Internet Milenium LTDA EPP"
            }, {
                "value": 2,
                "color": "#b35a13",
                "highlight": "#b35a13",
                "label": "AS8447 A1 Telekom Austria AG"
            }, {
                "value": 2,
                "color": "#fde4d7",
                "highlight": "#fde4d7",
                "label": "AS52967 NT Brasil Tecnologia Ltda. ME"
            }, {
                "value": 2,
                "color": "#975fa7",
                "highlight": "#975fa7",
                "label": "AS28233 I-CONECTA REDES DE TELECOMUNICACAO LTDA EPP"
            }, {
                "value": 2,
                "color": "#c229a3",
                "highlight": "#c229a3",
                "label": "AS10897 Camara dos Deputados"
            }, {
                "value": 2,
                "color": "#ce7c72",
                "highlight": "#ce7c72",
                "label": "AS61923 SUNWAY TELECOM LTDA"
            }, {
                "value": 2,
                "color": "#3556f0",
                "highlight": "#3556f0",
                "label": "AS44558 Nethouse Bilgi Islem Merkezi Ltd"
            }, {
                "value": 2,
                "color": "#f17cf7",
                "highlight": "#f17cf7",
                "label": "AS264352 CONECTAW TELECOM LTDA - ME"
            }, {
                "value": 2,
                "color": "#7da29c",
                "highlight": "#7da29c",
                "label": "AS28173 Din\u00e2mica Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 2,
                "color": "#d0db72",
                "highlight": "#d0db72",
                "label": "AS262491 Saulo J. de Moura Borba ME"
            }, {
                "value": 2,
                "color": "#55ec91",
                "highlight": "#55ec91",
                "label": "AS10010 TOKAI Communications Corporation"
            }, {
                "value": 2,
                "color": "#b8a914",
                "highlight": "#b8a914",
                "label": "AS53230 Clean Net Telecom Ltda"
            }, {
                "value": 2,
                "color": "#60ed4b",
                "highlight": "#60ed4b",
                "label": "AS263566 RONDON TELECOM LTDA - ME"
            }, {
                "value": 2,
                "color": "#99e3e0",
                "highlight": "#99e3e0",
                "label": "AS262454 Rmontan Tecnologia Ltda"
            }, {
                "value": 2,
                "color": "#9e09dd",
                "highlight": "#9e09dd",
                "label": "AS264215 Wlenet Inform\u00e1tica manuten\u00e7\u00e3o"
            }, {
                "value": 2,
                "color": "#a25113",
                "highlight": "#a25113",
                "label": "AS52746 Primanet Informatica LTDA"
            }, {
                "value": 2,
                "color": "#6e2dfb",
                "highlight": "#6e2dfb",
                "label": "AS61951 Brasil-IP pcqnet Internet Ltda Me"
            }, {
                "value": 2,
                "color": "#2fcae8",
                "highlight": "#2fcae8",
                "label": "AS265173 MEGA MAX SERVICOS DE COMUNICACAO LTDA - ME"
            }, {
                "value": 2,
                "color": "#ba63a9",
                "highlight": "#ba63a9",
                "label": "AS262825 JL INFORMATICA LTDA"
            }, {
                "value": 2,
                "color": "#1dd78a",
                "highlight": "#1dd78a",
                "label": "AS53008 Pontal Cabo Ltda"
            }, {
                "value": 2,
                "color": "#bdcded",
                "highlight": "#bdcded",
                "label": "AS264283 Net Triangulo Telecom Ltda - ME"
            }, {
                "value": 2,
                "color": "#445b1f",
                "highlight": "#445b1f",
                "label": "AS52488 Universidad Pontificia Bolivariana"
            }, {"value": 2, "color": "#f9976d", "highlight": "#f9976d", "label": "AS42708 Portlane AB"}, {
                "value": 2,
                "color": "#c579f1",
                "highlight": "#c579f1",
                "label": "AS262760 76 TELECOMUNICA\u00c7\u00c3O LTDA"
            }, {
                "value": 2,
                "color": "#874547",
                "highlight": "#874547",
                "label": "AS40676 Psychz Networks"
            }, {
                "value": 2,
                "color": "#67b934",
                "highlight": "#67b934",
                "label": "AS38457 Honesty Net Solution (I) Pvt Ltd"
            }, {"value": 2, "color": "#2a5a2e", "highlight": "#2a5a2e", "label": "AS55850 TrustPower Ltd"}, {
                "value": 2,
                "color": "#a228c7",
                "highlight": "#a228c7",
                "label": "AS28235 NIPONET TELECOMUNICACOES LTDA"
            }, {
                "value": 2,
                "color": "#bde2b3",
                "highlight": "#bde2b3",
                "label": "AS262741 CONECTSUL - COMERCIO E SERVICOS LTDA"
            }, {
                "value": 2,
                "color": "#a2f000",
                "highlight": "#a2f000",
                "label": "AS24863 Link Egypt (Link.NET)"
            }, {
                "value": 2,
                "color": "#eeee65",
                "highlight": "#eeee65",
                "label": "AS27715 Locaweb Servi\u00e7os de Internet S\/A"
            }, {
                "value": 2,
                "color": "#f8f574",
                "highlight": "#f8f574",
                "label": "AS61761 ATI Internet Banda Larga"
            }, {
                "value": 2,
                "color": "#bf21ee",
                "highlight": "#bf21ee",
                "label": "AS32780 Hosting Services, Inc."
            }, {
                "value": 2,
                "color": "#c582ae",
                "highlight": "#c582ae",
                "label": "AS52721 TOLEDO INFO LTDA"
            }, {
                "value": 2,
                "color": "#4a5ca4",
                "highlight": "#4a5ca4",
                "label": "AS61900 Everson Kleber Mai ME"
            }, {"value": 2, "color": "#69915e", "highlight": "#69915e", "label": "AS2764 AAPT Limited"}, {
                "value": 2,
                "color": "#1e7c96",
                "highlight": "#1e7c96",
                "label": "AS263037 LUANETT INTERNET"
            }, {
                "value": 2,
                "color": "#eb5710",
                "highlight": "#eb5710",
                "label": "AS52928 JANAJ\u00c1 SERVI\u00c7OS LTDA"
            }, {
                "value": 2,
                "color": "#901f76",
                "highlight": "#901f76",
                "label": "AS15435 CAIW Diensten B.V."
            }, {
                "value": 2,
                "color": "#a90c40",
                "highlight": "#a90c40",
                "label": "AS262327 High Tech Informatica Ltda"
            }, {
                "value": 2,
                "color": "#32050b",
                "highlight": "#32050b",
                "label": "AS28155 Jop Comunica\u00e7\u00e3o Virtual Ltda"
            }, {
                "value": 2,
                "color": "#10fc08",
                "highlight": "#10fc08",
                "label": "AS52605 PGI SERVICOS DE TELECOMUNICACOES LTDA ME"
            }, {
                "value": 2,
                "color": "#fe5e85",
                "highlight": "#fe5e85",
                "label": "AS262343 Net Aki Internet Ltda"
            }, {
                "value": 2,
                "color": "#c386fb",
                "highlight": "#c386fb",
                "label": "AS61805 E-MEX TELECOMUNICACOES DO BRASIL LTDA - ME"
            }, {
                "value": 2,
                "color": "#7cf08f",
                "highlight": "#7cf08f",
                "label": "AS28908 Telecom3 Sverige AB"
            }, {"value": 2, "color": "#283b49", "highlight": "#283b49", "label": "AS19429 ETB - Colombia"}, {
                "value": 2,
                "color": "#4cfa2e",
                "highlight": "#4cfa2e",
                "label": "AS52593 Monte Alto Net Ltda"
            }, {
                "value": 2,
                "color": "#72a3f0",
                "highlight": "#72a3f0",
                "label": "AS263507 VAINET TECNOLOGIA LTDA"
            }, {"value": 2, "color": "#7de2b7", "highlight": "#7de2b7", "label": "AS263297 RNV TELECOM"}, {
                "value": 2,
                "color": "#d099d3",
                "highlight": "#d099d3",
                "label": "AS16232 TELECOM ITALIA SPA"
            }, {
                "value": 2,
                "color": "#297dd8",
                "highlight": "#297dd8",
                "label": "AS28670 REDEL SERVI\u00c7OS DE TELECOMUNICA\u00c7\u00d5ES LTDA"
            }, {
                "value": 2,
                "color": "#e9dd68",
                "highlight": "#e9dd68",
                "label": "AS263544 VARZEA NET TELECOMUNICACOES LTDA ME"
            }, {
                "value": 2,
                "color": "#345f8e",
                "highlight": "#345f8e",
                "label": "AS264564 VIVA SERVICOS DE COMUNICACAO LTDA - ME"
            }, {
                "value": 2,
                "color": "#cf28c7",
                "highlight": "#cf28c7",
                "label": "AS262854 AFINET SOLUCOES EM TECNOLOGIA DA INFORMACAO LTDA"
            }, {
                "value": 2,
                "color": "#9d5566",
                "highlight": "#9d5566",
                "label": "AS262300 AFONSO LUIZ TENORIO FREITAS MELRO - ME"
            }, {
                "value": 2,
                "color": "#ba4ce6",
                "highlight": "#ba4ce6",
                "label": "AS262807 Redfox Telecomunica\u00e7\u00f5es Ltda."
            }, {
                "value": 2,
                "color": "#6e780a",
                "highlight": "#6e780a",
                "label": "AS262957 8-Bit Informatica e Provedor LTDA"
            }, {
                "value": 2,
                "color": "#bbf785",
                "highlight": "#bbf785",
                "label": "AS61853 C F Scandura Inform\u00e1tica ME"
            }, {
                "value": 2,
                "color": "#aa1b67",
                "highlight": "#aa1b67",
                "label": "AS53162 VOIPGLOBE SERVICOS DE COM MULTIMIDIA VIA INTERNET"
            }, {
                "value": 2,
                "color": "#3e6a82",
                "highlight": "#3e6a82",
                "label": "AS262398 Thiago Borsato Nazzi ME"
            }, {
                "value": 2,
                "color": "#889471",
                "highlight": "#889471",
                "label": "AS263049 NIPPONTEC TELECOMUNICA\u00c7\u00d5ES"
            }, {"value": 2, "color": "#8cb17c", "highlight": "#8cb17c", "label": "AS9009 M247 Ltd"}, {
                "value": 2,
                "color": "#e1dd36",
                "highlight": "#e1dd36",
                "label": "AS262934 IP\u00b7RED"
            }, {
                "value": 2,
                "color": "#335d5b",
                "highlight": "#335d5b",
                "label": "AS53137 TCA INFORMATICA LTDA"
            }, {
                "value": 2,
                "color": "#1da15f",
                "highlight": "#1da15f",
                "label": "AS51207 Free Mobile SAS"
            }, {
                "value": 2,
                "color": "#32275f",
                "highlight": "#32275f",
                "label": "AS11351 Time Warner Cable Internet LLC"
            }, {
                "value": 2,
                "color": "#81ea4a",
                "highlight": "#81ea4a",
                "label": "AS52651 DeltaAtiva Telecomunicacoes"
            }, {
                "value": 2,
                "color": "#d17892",
                "highlight": "#d17892",
                "label": "AS43350 NForce Entertainment B.V."
            }, {
                "value": 2,
                "color": "#2888a9",
                "highlight": "#2888a9",
                "label": "AS52752 Vegas Telecom Inform\u00e1tica Ltda."
            }, {"value": 2, "color": "#611ff5", "highlight": "#611ff5", "label": "AS28250 Telbrax Ltda"}, {
                "value": 2,
                "color": "#415a23",
                "highlight": "#415a23",
                "label": "AS262346 FP Telecomiunicacoes Ltda"
            }, {
                "value": 2,
                "color": "#77b264",
                "highlight": "#77b264",
                "label": "AS264142 COMSINAL DO BRASIL SERVICOS DE TELECOM LTDA ME"
            }, {
                "value": 2,
                "color": "#b418d1",
                "highlight": "#b418d1",
                "label": "AS7552 Viettel Corporation"
            }, {
                "value": 2,
                "color": "#8172c5",
                "highlight": "#8172c5",
                "label": "AS264552 JustWeb Telecomunica\u00e7\u00f5es LTDA"
            }, {
                "value": 2,
                "color": "#dc5416",
                "highlight": "#dc5416",
                "label": "AS262304 Win Time Informatica Ltda."
            }, {
                "value": 2,
                "color": "#73a8df",
                "highlight": "#73a8df",
                "label": "AS40285 NORTHLAND CABLE TELEVISION INC."
            }, {
                "value": 2,
                "color": "#b128ab",
                "highlight": "#b128ab",
                "label": "AS133579 MYREPUBLIC LIMITED"
            }, {
                "value": 2,
                "color": "#efe864",
                "highlight": "#efe864",
                "label": "AS28651 SIGMABBS Comercio e Inf por Telep Ltda"
            }, {
                "value": 2,
                "color": "#80be2f",
                "highlight": "#80be2f",
                "label": "AS52743 Twister Soft Net Ltda"
            }, {
                "value": 2,
                "color": "#11cc3e",
                "highlight": "#11cc3e",
                "label": "AS264344 AMAZONET SERVICOS DE INFORMATICA LTDA - ME"
            }, {"value": 2, "color": "#bd938a", "highlight": "#bd938a", "label": "AS31939 DirecPath, LLC"}, {
                "value": 2,
                "color": "#ea1532",
                "highlight": "#ea1532",
                "label": "AS262817 CARDOSONET INTERNET E SERVI\u00c7OS DE INFORM\u00c1TICA LTDA"
            }, {
                "value": 2,
                "color": "#63462d",
                "highlight": "#63462d",
                "label": "AS53052 MULTIVELOX SERVICOS DE PROVEDOR DE ACESSO A INTERN"
            }, {
                "value": 2,
                "color": "#b21243",
                "highlight": "#b21243",
                "label": "AS53078 Acesse Comunica\u00e7\u00e3o Ltda"
            }, {
                "value": 2,
                "color": "#315121",
                "highlight": "#315121",
                "label": "AS263327 ONLINE PROVEDOR DE ACESSO A INTERNET LTDA"
            }, {
                "value": 2,
                "color": "#1e3da3",
                "highlight": "#1e3da3",
                "label": "AS262847 Hoinaski & Sklasky Ltda"
            }, {"value": 2, "color": "#d73954", "highlight": "#d73954", "label": "AS41164 Get AS"}, {
                "value": 2,
                "color": "#13a1a3",
                "highlight": "#13a1a3",
                "label": "AS263347 CEDNET PROVEDOR INTERNET"
            }, {
                "value": 2,
                "color": "#6700de",
                "highlight": "#6700de",
                "label": "AS11172 Alestra, S. de R.L. de C.V."
            }, {
                "value": 2,
                "color": "#a1ebc9",
                "highlight": "#a1ebc9",
                "label": "AS52579 Noroestecom Telecomunicacoes Ltda"
            }, {
                "value": 2,
                "color": "#25b1e0",
                "highlight": "#25b1e0",
                "label": "AS61709 Azis. Dms Telecomunica\u00e7\u00f5es Ltda."
            }, {
                "value": 2,
                "color": "#c0740e",
                "highlight": "#c0740e",
                "label": "AS28172 PROJESOM INTERNET LTDA"
            }, {
                "value": 2,
                "color": "#a80448",
                "highlight": "#a80448",
                "label": "AS262310 EDATEL TELECOMUNICA\u00c7\u00d5ES LTDA."
            }, {"value": 2, "color": "#cf52cb", "highlight": "#cf52cb", "label": "AS53165 Guaiba Telecom"}, {
                "value": 2,
                "color": "#8551d9",
                "highlight": "#8551d9",
                "label": "AS35911 Telebec"
            }, {"value": 2, "color": "#a5a4e6", "highlight": "#a5a4e6", "label": "AS23201 Telecel S.A."}, {
                "value": 2,
                "color": "#4b25bc",
                "highlight": "#4b25bc",
                "label": "AS264982 Rio Telecom LTDA"
            }, {
                "value": 2,
                "color": "#5801a9",
                "highlight": "#5801a9",
                "label": "AS264497 Carla Machado Internet Me"
            }, {
                "value": 2,
                "color": "#dfa21b",
                "highlight": "#dfa21b",
                "label": "AS262483 Prefeitura Municipal de Campo Grande"
            }, {
                "value": 2,
                "color": "#839374",
                "highlight": "#839374",
                "label": "AS20454 SECURED SERVERS LLC"
            }, {
                "value": 2,
                "color": "#e07cb7",
                "highlight": "#e07cb7",
                "label": "AS53005 Rede Connect Telecom"
            }, {
                "value": 2,
                "color": "#e40c88",
                "highlight": "#e40c88",
                "label": "AS263545 MATHEUS MAGALHAES BORTOLIN ME"
            }, {
                "value": 2,
                "color": "#7b0545",
                "highlight": "#7b0545",
                "label": "AS53227 M.V. Martin & Cia Ltda."
            }, {
                "value": 2,
                "color": "#9e030a",
                "highlight": "#9e030a",
                "label": "AS52787 MAX TELECOM PROVEDOR DE ACESSO A INTERNET LTDA"
            }, {
                "value": 2,
                "color": "#d4e4ba",
                "highlight": "#d4e4ba",
                "label": "AS262323 STAR CONECT TELECOM LTDA"
            }, {
                "value": 2,
                "color": "#74eb74",
                "highlight": "#74eb74",
                "label": "AS264456 GBATELECOM LTDA"
            }, {"value": 2, "color": "#25d78c", "highlight": "#25d78c", "label": "AS262868 Itnet ltda"}, {
                "value": 2,
                "color": "#762f0a",
                "highlight": "#762f0a",
                "label": "AS264049 TELECOMUNICACOES ALARCAO E FERNANDES LTDA - ME"
            }, {
                "value": 2,
                "color": "#e60d3d",
                "highlight": "#e60d3d",
                "label": "AS265131 GP4 TELECOM LTDA - ME"
            }, {
                "value": 2,
                "color": "#1c8fdd",
                "highlight": "#1c8fdd",
                "label": "AS262587 CST - Cerentini Solu\u00e7\u00f5es em Tecnologia"
            }, {
                "value": 2,
                "color": "#f4de87",
                "highlight": "#f4de87",
                "label": "AS14745 Internap Network Services Corporation"
            }, {
                "value": 2,
                "color": "#331f52",
                "highlight": "#331f52",
                "label": "AS53184 INB Telecom LTDA"
            }, {"value": 2, "color": "#1467ef", "highlight": "#1467ef", "label": "AS15180 UOL DIVEO S.A."}, {
                "value": 2,
                "color": "#35c29a",
                "highlight": "#35c29a",
                "label": "AS263117 VALE NETSHOP LTDA ME"
            }, {
                "value": 2,
                "color": "#d8c152",
                "highlight": "#d8c152",
                "label": "AS263603 DUPLANET INTERNET E INFORMATICA LTDA - ME"
            }, {
                "value": 2,
                "color": "#89b827",
                "highlight": "#89b827",
                "label": "AS263423 PROTEL NET TELECOM LTDA. - ME"
            }, {
                "value": 2,
                "color": "#e9f653",
                "highlight": "#e9f653",
                "label": "AS264562 TEX NET SERVI\u00c7OS DE COMUNICA\u00c7\u00c3O EM INFORMATICA LTD"
            }, {
                "value": 1,
                "color": "#d5d394",
                "highlight": "#d5d394",
                "label": "AS28333 Local Datacenter Solu\u00e7\u00f5es em Comunica\u00e7\u00e3o Ltda."
            }, {
                "value": 1,
                "color": "#863c94",
                "highlight": "#863c94",
                "label": "AS28269 COMPUTADORES E SISTEMAS LTDA"
            }, {
                "value": 1,
                "color": "#366066",
                "highlight": "#366066",
                "label": "AS60624 MyNET S.C. Tomasz Patrzalek, Marek Raton"
            }, {
                "value": 1,
                "color": "#e65a98",
                "highlight": "#e65a98",
                "label": "AS52704 Aecio do N Santos Informatica ME"
            }, {
                "value": 1,
                "color": "#3d27ce",
                "highlight": "#3d27ce",
                "label": "AS262955 VERAO COMUNICACOES LTDA"
            }, {
                "value": 1,
                "color": "#984ea2",
                "highlight": "#984ea2",
                "label": "AS264150 GIGAFLEX TELECOM"
            }, {"value": 1, "color": "#1bca91", "highlight": "#1bca91", "label": "AS58305 SYN LTD"}, {
                "value": 1,
                "color": "#69982a",
                "highlight": "#69982a",
                "label": "AS264528 Sidinara Dambros da Silva e CIA LTDA EPP"
            }, {
                "value": 1,
                "color": "#2ea590",
                "highlight": "#2ea590",
                "label": "AS52525 INPASUPRI - Com. de Suprimentos p\/Inf. Ltda"
            }, {
                "value": 1,
                "color": "#59f9ab",
                "highlight": "#59f9ab",
                "label": "AS31423 Przedsiebiorstwo PROMAX Spolka Jawna Zofia Formanek-Mroczkowska Wieslaw Okroj"
            }, {
                "value": 1,
                "color": "#cc1b1b",
                "highlight": "#cc1b1b",
                "label": "AS52947 PARAOPEBANET PROVEDOR LTDA"
            }, {
                "value": 1,
                "color": "#402192",
                "highlight": "#402192",
                "label": "AS52896 BDNET SOLUCOES TECNOLOGICAS LTDA ME"
            }, {
                "value": 1,
                "color": "#ae5684",
                "highlight": "#ae5684",
                "label": "AS52590 GPSNet Provedor de Acesso a Redes de Comunica\u00e7\u00e3o"
            }, {
                "value": 1,
                "color": "#4d8b04",
                "highlight": "#4d8b04",
                "label": "AS263672 Consult Telecom Provedor LTDA ME"
            }, {
                "value": 1,
                "color": "#b7e899",
                "highlight": "#b7e899",
                "label": "AS61663 INFOLINE BANDA LARGA LTDA"
            }, {
                "value": 1,
                "color": "#3e7744",
                "highlight": "#3e7744",
                "label": "AS264299 Rede Conectividade LTDA-ME"
            }, {
                "value": 1,
                "color": "#b310a5",
                "highlight": "#b310a5",
                "label": "AS28130 NETCERTTO INFORMATICA LTDA."
            }, {
                "value": 1,
                "color": "#f33a7b",
                "highlight": "#f33a7b",
                "label": "AS28234 Wireless Desenvolvimento de Sistemas Informatizada"
            }, {
                "value": 1,
                "color": "#bc2dc8",
                "highlight": "#bc2dc8",
                "label": "AS19723 CIA. DE TECNOL. DA INFOR. E COMUNICA\u00c7\u00c3O DO PARAN\u00c1"
            }, {
                "value": 1,
                "color": "#5bc4fd",
                "highlight": "#5bc4fd",
                "label": "AS26592 ALOG SOLUCOES DE TECNOLOGIA EM INFORMATICA S.A."
            }, {"value": 1, "color": "#903192", "highlight": "#903192", "label": "AS52609 EVO Networks"}, {
                "value": 1,
                "color": "#a88884",
                "highlight": "#a88884",
                "label": "AS262547 Tricor Teleinform\u00e1tica Ltda"
            }, {
                "value": 1,
                "color": "#30a425",
                "highlight": "#30a425",
                "label": "AS262492 INTERCONECT TELEINFORMATICA LTDA"
            }, {
                "value": 1,
                "color": "#bd725c",
                "highlight": "#bd725c",
                "label": "AS262716 RRM SERVI\u00c7OS DE INFORMATICA LTDA"
            }, {
                "value": 1,
                "color": "#f9bcec",
                "highlight": "#f9bcec",
                "label": "AS264997 DIRECT MASTER TELECOM"
            }, {
                "value": 1,
                "color": "#7284b0",
                "highlight": "#7284b0",
                "label": "AS263037 Ismael Stroher & Cia. Ltda"
            }, {"value": 1, "color": "#efc36f", "highlight": "#efc36f", "label": "AS11191 Fire2Wire"}, {
                "value": 1,
                "color": "#eb3fc5",
                "highlight": "#eb3fc5",
                "label": "AS61748 Dkirosnet Servi\u00e7os de Internet"
            }, {
                "value": 1,
                "color": "#a1f0b2",
                "highlight": "#a1f0b2",
                "label": "AS53055 HostDime.com.br Data Center"
            }, {
                "value": 1,
                "color": "#1705db",
                "highlight": "#1705db",
                "label": "AS263055 Wilson Santana da Silva"
            }, {"value": 1, "color": "#fc475d", "highlight": "#fc475d", "label": "AS20860 Iomart"}, {
                "value": 1,
                "color": "#47d48c",
                "highlight": "#47d48c",
                "label": "AS61658 BALSAS NET LTDA - ME"
            }, {
                "value": 1,
                "color": "#7fb230",
                "highlight": "#7fb230",
                "label": "AS28139 ItaSis Inform\u00e1tica Ltda"
            }, {
                "value": 1,
                "color": "#207ffa",
                "highlight": "#207ffa",
                "label": "AS263933 LMD DE OLIVEIRA COM. DE EQUIP. DE INFORMATICA ME"
            }, {
                "value": 1,
                "color": "#c13afe",
                "highlight": "#c13afe",
                "label": "AS11492 CABLE ONE, INC."
            }, {
                "value": 1,
                "color": "#f43992",
                "highlight": "#f43992",
                "label": "AS3801 Mikrotec Internet Services"
            }, {
                "value": 1,
                "color": "#5f0651",
                "highlight": "#5f0651",
                "label": "AS263354 AERO NETWORKS LTDA"
            }, {
                "value": 1,
                "color": "#e36091",
                "highlight": "#e36091",
                "label": "AS26662 XEROX CORPORATION"
            }, {
                "value": 1,
                "color": "#6a2ca2",
                "highlight": "#6a2ca2",
                "label": "AS265299 YOU CONNECTION SISTEMAS LTDA - ME"
            }, {
                "value": 1,
                "color": "#a24bd5",
                "highlight": "#a24bd5",
                "label": "AS263609 Free Way Tecnologia"
            }, {"value": 1, "color": "#50e20c", "highlight": "#50e20c", "label": "AS20255 Tecnowind S.A."}, {
                "value": 1,
                "color": "#a8b7a9",
                "highlight": "#a8b7a9",
                "label": "AS263641 TCF Telecomunica\u00e7\u00f5es Campo Florido Ltda"
            }, {
                "value": 1,
                "color": "#2d91b7",
                "highlight": "#2d91b7",
                "label": "AS263637 DIGITAL TECNOLOGIA & TELECOMUNICACAO LTDA"
            }, {
                "value": 1,
                "color": "#10e746",
                "highlight": "#10e746",
                "label": "AS264464 INFORMATICA ALMEIDA PARENTE"
            }, {
                "value": 1,
                "color": "#e9edf2",
                "highlight": "#e9edf2",
                "label": "AS53071 Tecnoasp Tecnologia e Servi\u00e7os de Comunica\u00e7\u00e3o Ltda"
            }, {
                "value": 1,
                "color": "#5adf1d",
                "highlight": "#5adf1d",
                "label": "AS263480 TELNET - SERVI\u00c7OES EM TELECOMUNICA\u00c7\u00d5ES LTDA - EPP"
            }, {"value": 1, "color": "#184f97", "highlight": "#184f97", "label": "AS28144 G3 TELECOM"}, {
                "value": 1,
                "color": "#5c8126",
                "highlight": "#5c8126",
                "label": "AS28618 LINKTEL TELECOMUNICACOES DO BRASIL LTDA"
            }, {
                "value": 1,
                "color": "#51897f",
                "highlight": "#51897f",
                "label": "AS264424 Enormity Brasil Tecnologia Ltda"
            }, {"value": 1, "color": "#45c177", "highlight": "#45c177", "label": "AS7472 Computer Centre"}, {
                "value": 1,
                "color": "#6a9dcd",
                "highlight": "#6a9dcd",
                "label": "AS263321 Ejmnet Tecnologia ltda"
            }, {
                "value": 1,
                "color": "#783b59",
                "highlight": "#783b59",
                "label": "AS263467 CORE TELECOM & IT LTDA"
            }, {
                "value": 1,
                "color": "#1777ef",
                "highlight": "#1777ef",
                "label": "AS22706 Matsunaka & Matsunaka Ltda - ME"
            }, {
                "value": 1,
                "color": "#64f598",
                "highlight": "#64f598",
                "label": "AS265126 FLEETNET TELECOMUNICACOES LTDA - ME"
            }, {
                "value": 1,
                "color": "#c0b085",
                "highlight": "#c0b085",
                "label": "AS263661 BRASIL DIGITAL SERVI\u00c7OS DE INFORMATICA E COMERCIO"
            }, {
                "value": 1,
                "color": "#2ebf1e",
                "highlight": "#2ebf1e",
                "label": "AS7470 TRUE INTERNET Co.,Ltd."
            }, {
                "value": 1,
                "color": "#15d087",
                "highlight": "#15d087",
                "label": "AS45629 JasTel Network International Gateway"
            }, {
                "value": 1,
                "color": "#b961d8",
                "highlight": "#b961d8",
                "label": "AS28133 Provedor Eloinet Ltda"
            }, {
                "value": 1,
                "color": "#7125f5",
                "highlight": "#7125f5",
                "label": "AS52544 Ivatel Redes e Internet LTDA"
            }, {
                "value": 1,
                "color": "#13bb19",
                "highlight": "#13bb19",
                "label": "AS26210 AXS Bolivia S. A."
            }, {
                "value": 1,
                "color": "#8f5e97",
                "highlight": "#8f5e97",
                "label": "AS53181 K2 Telecom e Multimidia LTDA ME"
            }, {
                "value": 1,
                "color": "#d252dd",
                "highlight": "#d252dd",
                "label": "AS61810 web fibra telecomunica\u00e7\u00f5es ltda me"
            }, {
                "value": 1,
                "color": "#8eaaaa",
                "highlight": "#8eaaaa",
                "label": "AS52866 WHS Telecom Serv em Telecomunicoes Ltda"
            }, {
                "value": 1,
                "color": "#ed723b",
                "highlight": "#ed723b",
                "label": "AS23002 Primesys Solu\u00e7\u00f5es Empresariais S.A"
            }, {"value": 1, "color": "#38521a", "highlight": "#38521a", "label": "AS35191 ASTA-NET S.A."}, {
                "value": 1,
                "color": "#fd7c13",
                "highlight": "#fd7c13",
                "label": "AS18618 west central wireless"
            }, {
                "value": 1,
                "color": "#193a8c",
                "highlight": "#193a8c",
                "label": "AS11136 Instituto Tecnol\u00f3gico y de Estudios Superiores de Monterrey"
            }, {
                "value": 1,
                "color": "#cae6b7",
                "highlight": "#cae6b7",
                "label": "AS262426 G3 Servi\u00e7os em Informatica Ltda"
            }, {
                "value": 1,
                "color": "#d230ee",
                "highlight": "#d230ee",
                "label": "AS202109 Digital Ocean, Inc."
            }, {
                "value": 1,
                "color": "#4c9017",
                "highlight": "#4c9017",
                "label": "AS28590 Directnet Prestacao de Servicos Ltda."
            }, {
                "value": 1,
                "color": "#ce9984",
                "highlight": "#ce9984",
                "label": "AS12390 KCOM Group Public Limited Company"
            }, {
                "value": 1,
                "color": "#68d83c",
                "highlight": "#68d83c",
                "label": "AS53003 EVOLUNET PROVEDORA DE INTERNET LTDA PE"
            }, {
                "value": 1,
                "color": "#4e7199",
                "highlight": "#4e7199",
                "label": "AS264402 MS NUNES INFORMA\u00c7\u00c3O TECNOLOGICA LTDA"
            }, {
                "value": 1,
                "color": "#c91150",
                "highlight": "#c91150",
                "label": "AS264406 ContilNet - Staff Computer LTDA - ME"
            }, {
                "value": 1,
                "color": "#352e5d",
                "highlight": "#352e5d",
                "label": "AS500 754th Electronic Systems Group"
            }, {
                "value": 1,
                "color": "#367b70",
                "highlight": "#367b70",
                "label": "AS263549 EntorNet Comercio e Servi\u00e7os Ltda"
            }, {"value": 1, "color": "#60b7f3", "highlight": "#60b7f3", "label": "AS262773 OndaNet Ltda"}, {
                "value": 1,
                "color": "#5e6638",
                "highlight": "#5e6638",
                "label": "AS262297 ALTERDATA TECNOLOGIA EM INFORMATICA LTDA."
            }, {
                "value": 1,
                "color": "#2c95e4",
                "highlight": "#2c95e4",
                "label": "AS18144 Energia Communications,Inc."
            }, {
                "value": 1,
                "color": "#80af56",
                "highlight": "#80af56",
                "label": "AS27995 CLARO CHILE S.A."
            }, {
                "value": 1,
                "color": "#ef48d3",
                "highlight": "#ef48d3",
                "label": "AS262757 Insidesign Tecnologia Ltda EPP"
            }, {
                "value": 1,
                "color": "#cc96db",
                "highlight": "#cc96db",
                "label": "AS264432 D & D INFORM\u00c1TICA LTDA"
            }, {
                "value": 1,
                "color": "#1685d2",
                "highlight": "#1685d2",
                "label": "AS264393 NetBrasil Telecom LTDA"
            }, {
                "value": 1,
                "color": "#91e0fc",
                "highlight": "#91e0fc",
                "label": "AS263024 ARAUJOSAT COMERCIO DE ANTENAS LTDA ME"
            }, {
                "value": 1,
                "color": "#cdca02",
                "highlight": "#cdca02",
                "label": "AS262649 Sidys Comunica\u00e7\u00f5es Ltda."
            }, {
                "value": 1,
                "color": "#219c27",
                "highlight": "#219c27",
                "label": "AS262645 Brasilnet Telecomunica\u00e7\u00f5es do Parana LTD"
            }, {
                "value": 1,
                "color": "#5b4590",
                "highlight": "#5b4590",
                "label": "AS52804 ESTREITONET LTDA"
            }, {
                "value": 1,
                "color": "#81d219",
                "highlight": "#81d219",
                "label": "AS50136 Kurt Schreckenbauer trading as Comtrend"
            }, {
                "value": 1,
                "color": "#e1965d",
                "highlight": "#e1965d",
                "label": "AS14852 DaimlerChrysler Corporation"
            }, {
                "value": 1,
                "color": "#6ba698",
                "highlight": "#6ba698",
                "label": "AS265172 E. C. E. Telecomunica\u00e7\u00f5es LTDA"
            }, {
                "value": 1,
                "color": "#c037a5",
                "highlight": "#c037a5",
                "label": "AS27720 CITTA TELECOM LTDA"
            }, {
                "value": 1,
                "color": "#5bf604",
                "highlight": "#5bf604",
                "label": "AS52923 Netcar Internet Telec Info e Tecnologia LTDA"
            }, {
                "value": 1,
                "color": "#47c636",
                "highlight": "#47c636",
                "label": "AS61763 Poxley Provedor de Internet Ltda"
            }, {
                "value": 1,
                "color": "#2678aa",
                "highlight": "#2678aa",
                "label": "AS263080 GTi TELECOMUNICA\u00c7\u00d4ES S\/A"
            }, {
                "value": 1,
                "color": "#7831d4",
                "highlight": "#7831d4",
                "label": "AS28302 Bon Line Internet Ltda"
            }, {
                "value": 1,
                "color": "#8fcd5b",
                "highlight": "#8fcd5b",
                "label": "AS53147 FONTES SOLUCOES TECNOLOGICAS LTDA"
            }, {
                "value": 1,
                "color": "#973fd8",
                "highlight": "#973fd8",
                "label": "AS61775 AW TELECOM LTDA - ME"
            }, {
                "value": 1,
                "color": "#10e549",
                "highlight": "#10e549",
                "label": "AS264238 Link Net-Igarapava"
            }, {
                "value": 1,
                "color": "#f2bcb1",
                "highlight": "#f2bcb1",
                "label": "AS262484 Zumpa Telecom Telecomunica\u00e7\u00f5es EIRELI"
            }, {
                "value": 1,
                "color": "#ee516a",
                "highlight": "#ee516a",
                "label": "AS53118 NETLINE TELECOM"
            }, {
                "value": 1,
                "color": "#9930f0",
                "highlight": "#9930f0",
                "label": "AS28308 Orion Telecomunica\u00e7\u00f5es Com\u00e9rcio e Servi\u00e7os LTDA"
            }, {
                "value": 1,
                "color": "#7cf0e4",
                "highlight": "#7cf0e4",
                "label": "AS28229 HARDONLINE LTDA"
            }, {
                "value": 1,
                "color": "#a3f850",
                "highlight": "#a3f850",
                "label": "AS265044 valtenir bezerra costa - me"
            }, {
                "value": 1,
                "color": "#9daba4",
                "highlight": "#9daba4",
                "label": "AS264288 Lenilson Francisco da Silva"
            }, {
                "value": 1,
                "color": "#83e829",
                "highlight": "#83e829",
                "label": "AS39647 Redhosting B.V."
            }, {
                "value": 1,
                "color": "#87bc26",
                "highlight": "#87bc26",
                "label": "AS265269 MEGA TELEINFORMATICA LTDA"
            }, {
                "value": 1,
                "color": "#95b847",
                "highlight": "#95b847",
                "label": "AS23944 SKYBroadband SKYCable Corporation"
            }, {
                "value": 1,
                "color": "#547e0e",
                "highlight": "#547e0e",
                "label": "AS25761 Staminus Communications"
            }, {"value": 1, "color": "#512e92", "highlight": "#512e92", "label": "AS8426 ClaraNET LTD"}, {
                "value": 1,
                "color": "#3fbb46",
                "highlight": "#3fbb46",
                "label": "AS263100 cconnect acesso a internet ltda"
            }, {"value": 1, "color": "#edcc78", "highlight": "#edcc78", "label": "AS4760 PCCW Limited"}, {
                "value": 1,
                "color": "#aac86e",
                "highlight": "#aac86e",
                "label": "AS264253 ISSO INTERNET E TELECOMUNICACOES LTDA - ME"
            }, {
                "value": 1,
                "color": "#98b942",
                "highlight": "#98b942",
                "label": "AS264221 phase projetos e servi\u00e7os de engenharia ltda"
            }, {
                "value": 1,
                "color": "#45fb49",
                "highlight": "#45fb49",
                "label": "AS19318 NEW JERSEY INTERNATIONAL INTERNET EXCHANGE LLC"
            }, {
                "value": 1,
                "color": "#5e3d37",
                "highlight": "#5e3d37",
                "label": "AS264349 ABSOLUTNET LTDA - ME"
            }, {
                "value": 1,
                "color": "#d2d2b8",
                "highlight": "#d2d2b8",
                "label": "AS262833 PORTO MIXCOM COMUNICACAO E INFORMATICA LTDA ME"
            }, {
                "value": 1,
                "color": "#750840",
                "highlight": "#750840",
                "label": "AS263579 ISUPER TELECOMUNICACOES INFO LTDA"
            }, {
                "value": 1,
                "color": "#7dce5d",
                "highlight": "#7dce5d",
                "label": "AS39326 HighSpeed Office Limited"
            }, {
                "value": 1,
                "color": "#7ca83c",
                "highlight": "#7ca83c",
                "label": "AS265279 Soft System Informatica Ltda"
            }, {"value": 1, "color": "#ae476f", "highlight": "#ae476f", "label": "AS18859 GVEC.NET, INC."}, {
                "value": 1,
                "color": "#20253b",
                "highlight": "#20253b",
                "label": "AS52842 FUSAONET COMUNICA\u00c7\u00c3O E INFORMATICA LTDA"
            }, {
                "value": 1,
                "color": "#d48079",
                "highlight": "#d48079",
                "label": "AS264924 V\u00e2nia C. da Silva Eireli - ME"
            }, {
                "value": 1,
                "color": "#ab36b6",
                "highlight": "#ab36b6",
                "label": "AS52602 SKORPION SISTEMA DE TELECOMUNICA\u00c7\u00d5ES LTDA"
            }, {
                "value": 1,
                "color": "#5abd62",
                "highlight": "#5abd62",
                "label": "AS262895 Norte Line Telecomunicacoes Ltda."
            }, {
                "value": 1,
                "color": "#164d78",
                "highlight": "#164d78",
                "label": "AS265140 DUPONT & SCHWANKE LTDA"
            }, {
                "value": 1,
                "color": "#fc8f7c",
                "highlight": "#fc8f7c",
                "label": "AS52998 Fundacao Assis Gurgacz"
            }, {
                "value": 1,
                "color": "#ae72b9",
                "highlight": "#ae72b9",
                "label": "AS19799 Highland Communication Services"
            }, {
                "value": 1,
                "color": "#acb8a6",
                "highlight": "#acb8a6",
                "label": "AS262587 Maicon Marques Cerentini"
            }, {
                "value": 1,
                "color": "#d0cbf0",
                "highlight": "#d0cbf0",
                "label": "AS199218 SAS Neo Services"
            }, {"value": 1, "color": "#cabcbf", "highlight": "#cabcbf", "label": "AS65555"}, {
                "value": 1,
                "color": "#540957",
                "highlight": "#540957",
                "label": "AS19931 LMK Communications, LLC"
            }, {
                "value": 1,
                "color": "#a8c575",
                "highlight": "#a8c575",
                "label": "AS262573 GILMAR DOS SANTOS & CIA. LTDA."
            }, {
                "value": 1,
                "color": "#ba60ad",
                "highlight": "#ba60ad",
                "label": "AS32808 Utah Broadband LLC"
            }, {"value": 1, "color": "#836f83", "highlight": "#836f83", "label": "AS18779 EGIHosting"}, {
                "value": 1,
                "color": "#262bd0",
                "highlight": "#262bd0",
                "label": "AS16531 Protel I-Next, S.A. de C.V."
            }, {
                "value": 1,
                "color": "#2028ea",
                "highlight": "#2028ea",
                "label": "AS263268 VITORINO NET LTDA"
            }, {
                "value": 1,
                "color": "#1556d2",
                "highlight": "#1556d2",
                "label": "AS52486 Cooperativa Electrica de Galvez Ltda."
            }, {
                "value": 1,
                "color": "#e35f45",
                "highlight": "#e35f45",
                "label": "AS61743 ALEX CARLOS EREDIA ME"
            }, {
                "value": 1,
                "color": "#d3be41",
                "highlight": "#d3be41",
                "label": "AS263555 infinity brasil telecom ltda me"
            }, {
                "value": 1,
                "color": "#358a10",
                "highlight": "#358a10",
                "label": "AS52715 SCORPION TELECOMUNICA\u00c7\u00c3O RIBEIR\u00c3O PRETO LTDA - ME"
            }, {
                "value": 1,
                "color": "#259a14",
                "highlight": "#259a14",
                "label": "AS28370 GUIFAMI Inform\u00e1tica Ltda."
            }, {
                "value": 1,
                "color": "#9840fa",
                "highlight": "#9840fa",
                "label": "AS27294 Reserve Long Distance Company, Inc"
            }, {"value": 1, "color": "#6b7ca0", "highlight": "#6b7ca0", "label": "AS5615 KPN B.V."}, {
                "value": 1,
                "color": "#73c09c",
                "highlight": "#73c09c",
                "label": "AS52692 CARVALHO E SILVA LTDA"
            }, {
                "value": 1,
                "color": "#894478",
                "highlight": "#894478",
                "label": "AS262775 TECHS TECNOLOGIA EM HARDWARE E SOFTWARE"
            }, {
                "value": 1,
                "color": "#38d8a0",
                "highlight": "#38d8a0",
                "label": "AS61778 R2 Com\u00e9rcio e Servi\u00e7os de Inform\u00e1tica Ltda"
            }, {
                "value": 1,
                "color": "#4a9765",
                "highlight": "#4a9765",
                "label": "AS11830 Instituto Costarricense de Electricidad y Telecom."
            }, {
                "value": 1,
                "color": "#938322",
                "highlight": "#938322",
                "label": "AS51399 FIBERWAY Sp. z o.o."
            }, {
                "value": 1,
                "color": "#a4d92d",
                "highlight": "#a4d92d",
                "label": "AS53072 Vespanet Servi\u00e7os de Redes e Internet LTDA"
            }, {
                "value": 1,
                "color": "#91c0fd",
                "highlight": "#91c0fd",
                "label": "AS25019 Saudi Telecom Company JSC"
            }, {
                "value": 1,
                "color": "#fb0c59",
                "highlight": "#fb0c59",
                "label": "AS28302 Net Barretos Tecnologia LTDA - ME"
            }, {"value": 1, "color": "#f661fd", "highlight": "#f661fd", "label": "AS4832 PT. iNterNUX"}, {
                "value": 1,
                "color": "#7e7efe",
                "highlight": "#7e7efe",
                "label": "AS56515 SystemX II Sp. z o.o."
            }, {
                "value": 1,
                "color": "#96749f",
                "highlight": "#96749f",
                "label": "AS28606 ITM Tecnologia de Redes"
            }, {
                "value": 1,
                "color": "#c46d91",
                "highlight": "#c46d91",
                "label": "AS10938 AGENCIA ESTADUAL DE TECNOLOGIA DA INFORMACAO - ATI"
            }, {
                "value": 1,
                "color": "#8c1b32",
                "highlight": "#8c1b32",
                "label": "AS53173 ARENANET TEL COM E SERV EM INF LTDA"
            }, {
                "value": 1,
                "color": "#b8882b",
                "highlight": "#b8882b",
                "label": "AS262495 INOVE TELECOMUNICACOES LTDA ME"
            }, {
                "value": 1,
                "color": "#32794f",
                "highlight": "#32794f",
                "label": "AS263373 SIlveira & Gon\u00e7alves Com. de Mat. de Infor. LTDA"
            }, {
                "value": 1,
                "color": "#ced34d",
                "highlight": "#ced34d",
                "label": "AS21555 LAUREL HIGHLAND TELEPHONE COMPANY"
            }, {"value": 1, "color": "#a3968c", "highlight": "#a3968c", "label": "AS29562 Kabel BW GmbH"}, {
                "value": 1,
                "color": "#d9674f",
                "highlight": "#d9674f",
                "label": "AS263899 VIATEC SERVICOS E COMUNICACOES LTDA - ME"
            }, {
                "value": 1,
                "color": "#2f69ba",
                "highlight": "#2f69ba",
                "label": "AS39392 SuperNetwork s.r.o."
            }, {
                "value": 1,
                "color": "#614cd1",
                "highlight": "#614cd1",
                "label": "AS30165 Dalton Utilities"
            }, {
                "value": 1,
                "color": "#670300",
                "highlight": "#670300",
                "label": "AS61901 RMR Assessoria T\u00e9cnica em Teleinform\u00e1tica LTDA-ME"
            }, {
                "value": 1,
                "color": "#4bdaaf",
                "highlight": "#4bdaaf",
                "label": "AS52941 SPACE NETWORK INFORM\u00c1TICA LTDA"
            }, {
                "value": 1,
                "color": "#c87106",
                "highlight": "#c87106",
                "label": "AS131207 SINET, Cambodia's specialist Internet and Telecom Service Provider."
            }, {"value": 1, "color": "#e84b36", "highlight": "#e84b36", "label": "AS22313 Supercable"}, {
                "value": 1,
                "color": "#460e5f",
                "highlight": "#460e5f",
                "label": "AS262375 Data Info Comercio e Servico Ltda."
            }, {
                "value": 1,
                "color": "#3386a0",
                "highlight": "#3386a0",
                "label": "AS262337 POWERSAT SERVICOS DE TELECOMUNICACOES LTDA"
            }, {
                "value": 1,
                "color": "#1b52ff",
                "highlight": "#1b52ff",
                "label": "AS56949 PHU ADI Lan-Net Malgorzata Bagan"
            }, {
                "value": 1,
                "color": "#4930b0",
                "highlight": "#4930b0",
                "label": "AS52759 DataSafeIT Solu\u00e7\u00f5es em Tecnologia"
            }, {"value": 1, "color": "#15ec66", "highlight": "#15ec66", "label": "AS42705 Talia Limited"}, {
                "value": 1,
                "color": "#68800a",
                "highlight": "#68800a",
                "label": "AS264400 COMERCIO DE PRODUTOS ELETRONICOS VIDEOSAT LTDA"
            }, {
                "value": 1,
                "color": "#327e8a",
                "highlight": "#327e8a",
                "label": "AS264470 Logic Pro Tecnologia"
            }, {
                "value": 1,
                "color": "#b43bd3",
                "highlight": "#b43bd3",
                "label": "AS10094 BruNet - Telekom Brunei Berhad"
            }, {
                "value": 1,
                "color": "#3acee3",
                "highlight": "#3acee3",
                "label": "AS52794 Net Flex Ltda ME"
            }, {
                "value": 1,
                "color": "#e601cb",
                "highlight": "#e601cb",
                "label": "AS14671 FairPoint Communications"
            }, {
                "value": 1,
                "color": "#77c479",
                "highlight": "#77c479",
                "label": "AS7004 CTC Transmisiones Regionales S.A."
            }, {"value": 1, "color": "#1a04e9", "highlight": "#1a04e9", "label": "AS19531 Nodes Direct"}, {
                "value": 1,
                "color": "#919c36",
                "highlight": "#919c36",
                "label": "AS264539 Erik Lucas Barbosa"
            }, {
                "value": 1,
                "color": "#7de7b7",
                "highlight": "#7de7b7",
                "label": "AS5410 Bouygues Telecom SA"
            }, {
                "value": 1,
                "color": "#5c3a25",
                "highlight": "#5c3a25",
                "label": "AS264267 TaboadoNET Comunica\u00e7\u00e3o e Multim\u00eddia LTDA-ME"
            }, {
                "value": 1,
                "color": "#2d2190",
                "highlight": "#2d2190",
                "label": "AS264998 SQUID NET TELECOMUNICACOES LTDA ME"
            }, {"value": 1, "color": "#c18078", "highlight": "#c18078", "label": "AS12066 TRICOM"}, {
                "value": 1,
                "color": "#c71d57",
                "highlight": "#c71d57",
                "label": "AS264590 INTELIX TECNOLOGIA LTDA-ME"
            }, {
                "value": 1,
                "color": "#79bf4c",
                "highlight": "#79bf4c",
                "label": "AS262846 VIACOM INFORM\u00c1TICA LTDA"
            }, {
                "value": 1,
                "color": "#2912f7",
                "highlight": "#2912f7",
                "label": "AS263363 RADLINK TELECOMUNICACOES LTDA"
            }, {
                "value": 1,
                "color": "#b02854",
                "highlight": "#b02854",
                "label": "AS28666 HOSTLOCATION LTDA"
            }, {
                "value": 1,
                "color": "#940f6b",
                "highlight": "#940f6b",
                "label": "AS52263 Telecable Economico S.A."
            }, {
                "value": 1,
                "color": "#796f55",
                "highlight": "#796f55",
                "label": "AS61874 S.R. da Silva Telecomunica\u00e7oes"
            }, {
                "value": 1,
                "color": "#3392dc",
                "highlight": "#3392dc",
                "label": "AS28296 Acessa Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 1,
                "color": "#36e2f5",
                "highlight": "#36e2f5",
                "label": "AS52729 BrNet Informatica"
            }, {
                "value": 1,
                "color": "#d573e3",
                "highlight": "#d573e3",
                "label": "AS52718 PEDRO ADRIANO SOUTO MAIOR VELOSO - ME"
            }, {
                "value": 1,
                "color": "#d9eb2a",
                "highlight": "#d9eb2a",
                "label": "AS262376 NOVANET TELECOMUNICA\u00c7AO LTDA"
            }, {
                "value": 1,
                "color": "#2e17b9",
                "highlight": "#2e17b9",
                "label": "AS52871 TASCOM TELECOMUNICA\u00c7\u00d5ES LTDA"
            }, {
                "value": 1,
                "color": "#b7626b",
                "highlight": "#b7626b",
                "label": "AS262793 DOURACOM-SERVI\u00c7OS E COMUNICA\u00c7\u00c3O LTDA"
            }, {
                "value": 1,
                "color": "#c4adda",
                "highlight": "#c4adda",
                "label": "AS28252 WorldNet Telecom Comercio e Servi\u00e7os de Telecomuni"
            }, {
                "value": 1,
                "color": "#9106d3",
                "highlight": "#9106d3",
                "label": "AS264570 RIOTEL TELECOMUNICA\u00c7\u00d5ES LESTE- RTL"
            }, {
                "value": 1,
                "color": "#2708ae",
                "highlight": "#2708ae",
                "label": "AS262409 CONNECTI SERVICOS DE COMUNICACAO LTDA"
            }, {
                "value": 1,
                "color": "#27f5de",
                "highlight": "#27f5de",
                "label": "AS262391 ACESSOLINE TELECOMUNICACOES LTDA"
            }, {
                "value": 1,
                "color": "#5596c3",
                "highlight": "#5596c3",
                "label": "AS262498 Sudoeste Telecom Ltda - ME"
            }, {
                "value": 1,
                "color": "#907cf8",
                "highlight": "#907cf8",
                "label": "AS262900 INFONET INFORMATICA E TELECOMUNICACOES LTDA"
            }, {
                "value": 1,
                "color": "#6c2208",
                "highlight": "#6c2208",
                "label": "AS2716 Universidade Federal do Rio Grande do Sul"
            }, {
                "value": 1,
                "color": "#3a94bb",
                "highlight": "#3a94bb",
                "label": "AS264233 WF -TELECOM SERVI\u00c7OS DE TELECOMUNICA\u00c7OES EIRELE ME"
            }, {"value": 1, "color": "#3740a8", "highlight": "#3740a8", "label": "AS28352 NETSPEED LTDA"}, {
                "value": 1,
                "color": "#177803",
                "highlight": "#177803",
                "label": "AS28268 Link Sol LTDA - ME"
            }, {
                "value": 1,
                "color": "#23e445",
                "highlight": "#23e445",
                "label": "AS263087 RAWNET INFORMATICA LTDA"
            }, {"value": 1, "color": "#4cfc1b", "highlight": "#4cfc1b", "label": "AS1257 TELE2"}, {
                "value": 1,
                "color": "#4ad9e0",
                "highlight": "#4ad9e0",
                "label": "AS42863 MEO - SERVICOS DE COMUNICACOES E MULTIMEDIA S.A."
            }, {
                "value": 1,
                "color": "#1af8fb",
                "highlight": "#1af8fb",
                "label": "AS263632 Intersete Telecom limitada - ME"
            }, {
                "value": 1,
                "color": "#8d48f5",
                "highlight": "#8d48f5",
                "label": "AS52856 NETWAY PROVEDOR DE INTERNET LTDA"
            }, {
                "value": 1,
                "color": "#6e9682",
                "highlight": "#6e9682",
                "label": "AS262459 Osirnet Info Telecom Ltda."
            }, {"value": 1, "color": "#b9b809", "highlight": "#b9b809", "label": "AS264516 A.M.A TELECOM"}, {
                "value": 1,
                "color": "#734992",
                "highlight": "#734992",
                "label": "AS53194 VIA NOVA TELECOMUNICACOES LTDA"
            }, {
                "value": 1,
                "color": "#17e42a",
                "highlight": "#17e42a",
                "label": "AS264137 CLICK PRODUTOS E SERVICOS LTDA ME"
            }, {
                "value": 1,
                "color": "#35bb14",
                "highlight": "#35bb14",
                "label": "AS52599 A Rede Telecom LTDA ME"
            }, {
                "value": 1,
                "color": "#382974",
                "highlight": "#382974",
                "label": "AS263405 GIGANET TELECOM"
            }, {
                "value": 1,
                "color": "#b65a29",
                "highlight": "#b65a29",
                "label": "AS14463 TDKOM INFORMATICA LTDA."
            }, {"value": 1, "color": "#973935", "highlight": "#973935", "label": "AS27866 CO.PA.CO."}, {
                "value": 1,
                "color": "#a08b46",
                "highlight": "#a08b46",
                "label": "AS52641 JAN CHARLES RUECKERT - EPP"
            }, {
                "value": 1,
                "color": "#ad613b",
                "highlight": "#ad613b",
                "label": "AS18812 New Wave Communications"
            }, {
                "value": 1,
                "color": "#5e14d6",
                "highlight": "#5e14d6",
                "label": "AS52531 DL Informatica Ltda"
            }, {
                "value": 1,
                "color": "#4a3def",
                "highlight": "#4a3def",
                "label": "AS262395 WIFI Plus Provedor Ltda."
            }, {
                "value": 1,
                "color": "#df4c8c",
                "highlight": "#df4c8c",
                "label": "AS53213 NEGRISOLO COMUNICA\u00c7\u00c3O BANDA LARGA LTDA ME"
            }, {"value": 1, "color": "#9db3d9", "highlight": "#9db3d9", "label": "AS264264 SAKKA TELECOM"}, {
                "value": 1,
                "color": "#e70cb1",
                "highlight": "#e70cb1",
                "label": "AS52439 OPTIC"
            }, {
                "value": 1,
                "color": "#80ffe0",
                "highlight": "#80ffe0",
                "label": "AS26607 IBM Brasil Industria Maquinas e Servicos LTDA"
            }, {
                "value": 1,
                "color": "#fb005e",
                "highlight": "#fb005e",
                "label": "AS52255 Grupo Servicios Junin S.A."
            }, {"value": 1, "color": "#7ea0d4", "highlight": "#7ea0d4", "label": "AS31939 GigaMonster"}, {
                "value": 1,
                "color": "#5bd755",
                "highlight": "#5bd755",
                "label": "AS33182 HostDime.com, Inc."
            }, {
                "value": 1,
                "color": "#7a0e4b",
                "highlight": "#7a0e4b",
                "label": "AS28012 BBVA Banco Provincial S.A."
            }, {
                "value": 1,
                "color": "#38e1c3",
                "highlight": "#38e1c3",
                "label": "AS265252 D1 Telecomunicacoes Ltda"
            }, {
                "value": 1,
                "color": "#c4c10c",
                "highlight": "#c4c10c",
                "label": "AS265144 MCD INFORMATICA E TELECOMUNICACOES LTDA - ME"
            }, {
                "value": 1,
                "color": "#9290fa",
                "highlight": "#9290fa",
                "label": "AS262743 Virgos IP Solutions"
            }, {
                "value": 1,
                "color": "#354d83",
                "highlight": "#354d83",
                "label": "AS264329 SOS PROVEDOR SERVICOS COMUNICACAO EIRELI ME"
            }, {
                "value": 1,
                "color": "#5b5ce3",
                "highlight": "#5b5ce3",
                "label": "AS262365 SEBASTI\u00c3O ESUT\u00c1QUIO COLEHO"
            }, {"value": 1, "color": "#2fcd24", "highlight": "#2fcd24", "label": "AS262684 Net New Ltda"}, {
                "value": 1,
                "color": "#2c66fa",
                "highlight": "#2c66fa",
                "label": "AS61568 FSF TECNOLOGIA LTDA ME"
            }, {
                "value": 1,
                "color": "#a92343",
                "highlight": "#a92343",
                "label": "AS264415 MAXIS TELECOMUNICA\u00c7\u00d5ES LTDA - ME"
            }, {
                "value": 1,
                "color": "#14dbbc",
                "highlight": "#14dbbc",
                "label": "AS61684 LocalWeb - Provedor de Internet"
            }, {
                "value": 1,
                "color": "#b3971a",
                "highlight": "#b3971a",
                "label": "AS263913 N. V. SOUSA - ME"
            }, {
                "value": 1,
                "color": "#700c06",
                "highlight": "#700c06",
                "label": "AS263087 BRSuper Internet"
            }, {
                "value": 1,
                "color": "#a74054",
                "highlight": "#a74054",
                "label": "AS263608 WSNET TELECOM E INFORMATICA LTDA"
            }, {
                "value": 1,
                "color": "#7ec4b5",
                "highlight": "#7ec4b5",
                "label": "AS23700 Linknet-Fastnet ASN"
            }, {
                "value": 1,
                "color": "#6109c8",
                "highlight": "#6109c8",
                "label": "AS265391 W C Dos Santos Telecomunicacoes - ME"
            }, {
                "value": 1,
                "color": "#43540a",
                "highlight": "#43540a",
                "label": "AS263017 Irm\u00e3os Paris Ltda - ME"
            }, {
                "value": 1,
                "color": "#ea69ab",
                "highlight": "#ea69ab",
                "label": "AS53079 A.S.Byte Inform\u00e1tica Ltda - ME"
            }, {"value": 1, "color": "#976d83", "highlight": "#976d83", "label": "AS262949 Icone Telecom"}, {
                "value": 1,
                "color": "#974cbc",
                "highlight": "#974cbc",
                "label": "AS264927 Abenet Provedora de Acesso a Internet LTDA"
            }, {
                "value": 1,
                "color": "#dbd7dd",
                "highlight": "#dbd7dd",
                "label": "AS53224 WEB NET COMERCIO DE EQUIPAMENTOS LTDA"
            }, {
                "value": 1,
                "color": "#13d4ae",
                "highlight": "#13d4ae",
                "label": "AS52770 REVO TELECOMUNICA\u00c7\u00d5ES LTDA"
            }, {
                "value": 1,
                "color": "#2fd881",
                "highlight": "#2fd881",
                "label": "AS265274 Claudio Borges Pereira Provedor ME"
            }, {
                "value": 1,
                "color": "#744f7e",
                "highlight": "#744f7e",
                "label": "AS28360 WKVE Asses. em Servi\u00e7os de Inform. e Telecom. Ltda"
            }, {
                "value": 1,
                "color": "#24064f",
                "highlight": "#24064f",
                "label": "AS33588 Charter Communications"
            }, {
                "value": 1,
                "color": "#486830",
                "highlight": "#486830",
                "label": "AS61681 MegaLink Telecom"
            }, {
                "value": 1,
                "color": "#ce299d",
                "highlight": "#ce299d",
                "label": "AS263164 Office Master Com. e Presta\u00e7\u00e3o de Servi\u00e7os LTDA"
            }, {
                "value": 1,
                "color": "#a3aa4b",
                "highlight": "#a3aa4b",
                "label": "AS12035 Atlantic Broadband Finance, LLC"
            }, {
                "value": 1,
                "color": "#c3dac0",
                "highlight": "#c3dac0",
                "label": "AS7046 MCI Communications Services, Inc. d\/b\/a Verizon Business"
            }, {"value": 1, "color": "#ba053c", "highlight": "#ba053c", "label": "AS1239 Sprint"}, {
                "value": 1,
                "color": "#c5f0cb",
                "highlight": "#c5f0cb",
                "label": "AS53231 GRUPOHOST COMUNICACAO MULTIMIDIA LTDA"
            }, {
                "value": 1,
                "color": "#f06662",
                "highlight": "#f06662",
                "label": "AS38511 PT Remala Abadi"
            }, {
                "value": 1,
                "color": "#948698",
                "highlight": "#948698",
                "label": "AS262621 LIMA & VICENTE Divers\u00f5es Eletr\u00f4nicas LTDA"
            }, {
                "value": 1,
                "color": "#a991c9",
                "highlight": "#a991c9",
                "label": "AS264514 DESCALNET PROVEDOR LTDA - ME"
            }, {
                "value": 1,
                "color": "#5ff688",
                "highlight": "#5ff688",
                "label": "AS262906 URSOFT Solu\u00e7\u00f5es em Internet"
            }, {
                "value": 1,
                "color": "#5ede4b",
                "highlight": "#5ede4b",
                "label": "AS263703 NetLink Am\u00e9rica C.A."
            }, {
                "value": 1,
                "color": "#13ee1a",
                "highlight": "#13ee1a",
                "label": "AS262940 Silva & Gon\u00e7alves Inform\u00e1tica Ltda"
            }, {
                "value": 1,
                "color": "#eb90e7",
                "highlight": "#eb90e7",
                "label": "AS28305 SVA INTERNET LTDA"
            }, {
                "value": 1,
                "color": "#394028",
                "highlight": "#394028",
                "label": "AS60339 Hutchison 3G UK Limited"
            }, {
                "value": 1,
                "color": "#8bf3e0",
                "highlight": "#8bf3e0",
                "label": "AS46475 Limestone Networks, Inc."
            }, {
                "value": 1,
                "color": "#22f7fe",
                "highlight": "#22f7fe",
                "label": "AS34610 +------------------------------------------------+"
            }, {
                "value": 1,
                "color": "#740c5d",
                "highlight": "#740c5d",
                "label": "AS262345 B N Inform\u00e1tica Ltda"
            }, {
                "value": 1,
                "color": "#52776e",
                "highlight": "#52776e",
                "label": "AS53209 Mantiqueira Tecnologia Ltda."
            }, {
                "value": 1,
                "color": "#eea065",
                "highlight": "#eea065",
                "label": "AS263163 JR LINK PROVEDOR DE INTERNET VIA RARIO LTDA"
            }, {
                "value": 1,
                "color": "#794094",
                "highlight": "#794094",
                "label": "AS264116 I2 Telecom Ltda"
            }, {
                "value": 1,
                "color": "#c36b60",
                "highlight": "#c36b60",
                "label": "AS262290 Newparce Telecomunica\u00e7\u00f5es Ltda ME"
            }, {
                "value": 1,
                "color": "#f18758",
                "highlight": "#f18758",
                "label": "AS62821 MNX Solutions LLC"
            }, {"value": 1, "color": "#100a64", "highlight": "#100a64", "label": "AS46844 Sharktech"}, {
                "value": 1,
                "color": "#764e46",
                "highlight": "#764e46",
                "label": "AS262578 EASY EMBRANET SERVI\u00c7OS DE COMUNICA\u00c7\u00c3O LTDA"
            }, {"value": 1, "color": "#83bc3e", "highlight": "#83bc3e", "label": "AS49282 Ficolo Oy"}, {
                "value": 1,
                "color": "#60b9f8",
                "highlight": "#60b9f8",
                "label": "AS263612 IP CARRIER TELECOM DO BRASIL LTDA"
            }, {"value": 1, "color": "#429b16", "highlight": "#429b16", "label": "AS52630 MT-TELECOM SUL"}, {
                "value": 1,
                "color": "#981da1",
                "highlight": "#981da1",
                "label": "AS32645 FAIRPOINT COMMUNICATIONS, INC."
            }, {
                "value": 1,
                "color": "#59b1a8",
                "highlight": "#59b1a8",
                "label": "AS12118 West Virginia University"
            }, {
                "value": 1,
                "color": "#f07c84",
                "highlight": "#f07c84",
                "label": "AS53211 ISPRJ - INFORM\u00c1TICA E TELECOMUNICA\u00c7\u00d5ES ME"
            }, {
                "value": 1,
                "color": "#5fa10d",
                "highlight": "#5fa10d",
                "label": "AS22995 Xplornet Communications Inc."
            }, {
                "value": 1,
                "color": "#f2e1a9",
                "highlight": "#f2e1a9",
                "label": "AS264574 Elite Telecomunica\u00e7oes LTDA ME"
            }, {
                "value": 1,
                "color": "#c17717",
                "highlight": "#c17717",
                "label": "AS262997 FAAr turboNet LTDA."
            }, {
                "value": 1,
                "color": "#33b2c5",
                "highlight": "#33b2c5",
                "label": "AS262353 marcelo bonini guaglini - me"
            }, {"value": 1, "color": "#1b0b13", "highlight": "#1b0b13", "label": "AS1136 KPN  B.V."}, {
                "value": 1,
                "color": "#706f04",
                "highlight": "#706f04",
                "label": "AS262480 dem\u00e9trio araujo prates ramos"
            }, {
                "value": 1,
                "color": "#2fef0f",
                "highlight": "#2fef0f",
                "label": "AS52613 VIP BR TELECOM LTDA - ME"
            }, {
                "value": 1,
                "color": "#fb0cde",
                "highlight": "#fb0cde",
                "label": "AS262527 MTCASEMOD COMERCIO DE PROD. DE INFOR. E SERV. LTDA"
            }, {
                "value": 1,
                "color": "#3c2641",
                "highlight": "#3c2641",
                "label": "AS23105 BCMG INTERNET LTDA"
            }, {
                "value": 1,
                "color": "#d754e4",
                "highlight": "#d754e4",
                "label": "AS262832 Infotechnet Informatica e Assistencia Tecnica Ltda"
            }, {
                "value": 1,
                "color": "#7a9e8e",
                "highlight": "#7a9e8e",
                "label": "AS262715 Caezar Provedor de Internet LTDA"
            }, {
                "value": 1,
                "color": "#865808",
                "highlight": "#865808",
                "label": "AS262880 RADAR WISP LTDA"
            }, {
                "value": 1,
                "color": "#7a87e9",
                "highlight": "#7a87e9",
                "label": "AS263070 Direta Comunica\u00e7\u00f5es Ltda - ME"
            }, {
                "value": 1,
                "color": "#b26b8f",
                "highlight": "#b26b8f",
                "label": "AS23693 PT. Telekomunikasi Selular"
            }, {
                "value": 1,
                "color": "#30a983",
                "highlight": "#30a983",
                "label": "AS52898 Multipla Servi\u00e7os Inteligentes"
            }, {
                "value": 1,
                "color": "#30c8e3",
                "highlight": "#30c8e3",
                "label": "AS262271 R. C. A. Sistemas Ltda."
            }, {
                "value": 1,
                "color": "#4f4b02",
                "highlight": "#4f4b02",
                "label": "AS56838 PUH Vatus Rafal Wejman"
            }, {
                "value": 1,
                "color": "#b3a17f",
                "highlight": "#b3a17f",
                "label": "AS53102 SI TELEINFOTMATICA CONS. ASS. INFO. TELECOM LTDA"
            }, {
                "value": 1,
                "color": "#b0eae1",
                "highlight": "#b0eae1",
                "label": "AS262599 OSTARA TELECOMUNICA\u00c7\u00d5ES LTDA"
            }, {
                "value": 1,
                "color": "#8d8485",
                "highlight": "#8d8485",
                "label": "AS262633 RTC INTERNET VIA RADIO LTDA ME"
            }, {
                "value": 1,
                "color": "#ce1ee4",
                "highlight": "#ce1ee4",
                "label": "AS262404 JC TELECOM SERVI\u00c7OS DE TELECOMUNICA\u00c7\u00d5ES LTDA EPP"
            }, {
                "value": 1,
                "color": "#a0aa33",
                "highlight": "#a0aa33",
                "label": "AS61639 BCNET INFORM\u00c1TICA LTDA"
            }, {
                "value": 1,
                "color": "#5b2967",
                "highlight": "#5b2967",
                "label": "AS262407 TR Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 1,
                "color": "#e2b721",
                "highlight": "#e2b721",
                "label": "AS61770 Valtemir Jos\u00e9 Friguetto"
            }, {"value": 1, "color": "#3a0492", "highlight": "#3a0492", "label": "AS36352 ColoCrossing"}, {
                "value": 1,
                "color": "#e472f4",
                "highlight": "#e472f4",
                "label": "AS52637 Station Net Provedor de Internet"
            }, {
                "value": 1,
                "color": "#e49b60",
                "highlight": "#e49b60",
                "label": "AS264940 INFOTELECOM-BANDA LARGA"
            }, {"value": 1, "color": "#a0a9a6", "highlight": "#a0a9a6", "label": "AS264103 Pinheiro Net"}, {
                "value": 1,
                "color": "#3ae539",
                "highlight": "#3ae539",
                "label": "AS264981 NOVANET WORK SERVI\u00c7OS DE INTERNET LTDA - ME"
            }, {
                "value": 1,
                "color": "#75b386",
                "highlight": "#75b386",
                "label": "AS262464 TRIP TECNOLOGIA LTDA"
            }, {
                "value": 1,
                "color": "#c5a9ad",
                "highlight": "#c5a9ad",
                "label": "AS264152 NetWork Digital Inform\u00e1tica Ltda."
            }, {
                "value": 1,
                "color": "#d77b2a",
                "highlight": "#d77b2a",
                "label": "AS52516 Nipoxnet Ltda me"
            }, {
                "value": 1,
                "color": "#ba1857",
                "highlight": "#ba1857",
                "label": "AS264348 FRANCISCO DE ASSIS BARBOSA DE BRITO GOMES"
            }, {
                "value": 1,
                "color": "#79d5fa",
                "highlight": "#79d5fa",
                "label": "AS263570 JF PROVEDOR DE INTERNET LTDA"
            }, {
                "value": 1,
                "color": "#2edac1",
                "highlight": "#2edac1",
                "label": "AS28640 VIPWay Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 1,
                "color": "#9198bd",
                "highlight": "#9198bd",
                "label": "AS28376 Gigacable de Aguascalientes, S.A. de C.V."
            }, {
                "value": 1,
                "color": "#c4d7ab",
                "highlight": "#c4d7ab",
                "label": "AS262799 ICTUS INFORMATICA LTDA"
            }, {
                "value": 1,
                "color": "#f2c97f",
                "highlight": "#f2c97f",
                "label": "AS262988 Pombonet Telecomunica\u00e7\u00f5es e Inform\u00e1tica"
            }, {
                "value": 1,
                "color": "#ab9694",
                "highlight": "#ab9694",
                "label": "AS14840 COMMCORP COMUNICACOES LTDA"
            }, {"value": 1, "color": "#c6712e", "highlight": "#c6712e", "label": "AS8100 QuadraNet, Inc"}, {
                "value": 1,
                "color": "#97889e",
                "highlight": "#97889e",
                "label": "AS264172 Cleber Ataide Pasti & Cia Ltda"
            }, {
                "value": 1,
                "color": "#c760b0",
                "highlight": "#c760b0",
                "label": "AS28621 NetOeste Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 1,
                "color": "#6c6469",
                "highlight": "#6c6469",
                "label": "AS263156 Infosuporte Tecnologia em Infom\u00e1tica Ltda."
            }, {
                "value": 1,
                "color": "#d5c2ff",
                "highlight": "#d5c2ff",
                "label": "AS53139 RDF Informatica Ltda"
            }, {
                "value": 1,
                "color": "#c5be28",
                "highlight": "#c5be28",
                "label": "AS263601 Anderson Marcos Coelho e Cia Ltda - ME"
            }, {
                "value": 1,
                "color": "#541abe",
                "highlight": "#541abe",
                "label": "AS28638 EMTEC EMPRESA DE TECNOLOGIA EMPREENDIMENTOS DE COM"
            }, {
                "value": 1,
                "color": "#13a210",
                "highlight": "#13a210",
                "label": "AS1251 FUNDA\u00c7\u00c3O DE AMPARO \u00c0 PESQUISA DO ESTADO S\u00c3O PAULO"
            }, {
                "value": 1,
                "color": "#14cd5c",
                "highlight": "#14cd5c",
                "label": "AS262734 TuxNet - Materiais e servi\u00e7os de inform\u00e1tica LTDA."
            }, {
                "value": 1,
                "color": "#4d42ec",
                "highlight": "#4d42ec",
                "label": "AS262663 METROFLEX TELECOMUNICACOES LTDA"
            }, {"value": 1, "color": "#16409d", "highlight": "#16409d", "label": "AS16342 Toya sp.z.o.o"}, {
                "value": 1,
                "color": "#cdbe4b",
                "highlight": "#cdbe4b",
                "label": "AS63949 Linode, LLC"
            }, {
                "value": 1,
                "color": "#339ae3",
                "highlight": "#339ae3",
                "label": "AS61676 WAYCONNECT INTERNET E TELECOM LTDA - ME"
            }, {
                "value": 1,
                "color": "#81136d",
                "highlight": "#81136d",
                "label": "AS264503 provedor r costa internet ltda"
            }, {
                "value": 1,
                "color": "#d53d5a",
                "highlight": "#d53d5a",
                "label": "AS265289 MP INFOTELECOM"
            }, {
                "value": 1,
                "color": "#e950a9",
                "highlight": "#e950a9",
                "label": "AS28242 NOLVER INFORMATICA LTDA"
            }, {
                "value": 1,
                "color": "#9d820a",
                "highlight": "#9d820a",
                "label": "AS263894 RV SUL TELECOM LTDA - ME"
            }, {
                "value": 1,
                "color": "#1deb6d",
                "highlight": "#1deb6d",
                "label": "AS262407 Thiel e Da Rosa Ltda"
            }, {
                "value": 1,
                "color": "#ce6a59",
                "highlight": "#ce6a59",
                "label": "AS24751 Jakobstadsnejdens Telefon Ab"
            }, {
                "value": 1,
                "color": "#209996",
                "highlight": "#209996",
                "label": "AS264598 DELTA TELECOMUNICACAO LTDA - ME"
            }, {"value": 1, "color": "#b1cc01", "highlight": "#b1cc01", "label": "AS16086 DNA Oy"}, {
                "value": 1,
                "color": "#9c2a95",
                "highlight": "#9c2a95",
                "label": "AS26231 San Francisco International Airport"
            }, {"value": 1, "color": "#37841b", "highlight": "#37841b", "label": "AS13381 CMET SACI"}, {
                "value": 1,
                "color": "#bf7ab9",
                "highlight": "#bf7ab9",
                "label": "AS11680 Hewlett-Packard Company"
            }, {
                "value": 1,
                "color": "#dbacdc",
                "highlight": "#dbacdc",
                "label": "AS46562 Total Server Solutions L.L.C."
            }, {
                "value": 1,
                "color": "#b00e4a",
                "highlight": "#b00e4a",
                "label": "AS10954 SERVICO FEDERAL DE PROCESSAMENTO DE DADOS - SERPRO"
            }, {
                "value": 1,
                "color": "#2119ed",
                "highlight": "#2119ed",
                "label": "AS55330 AFGHANTELECOM GOVERNMENT COMMUNICATION NETWORK"
            }, {
                "value": 1,
                "color": "#b57bc6",
                "highlight": "#b57bc6",
                "label": "AS61821 Barcelos Com\u00e9rcio de equipamentos de informatica"
            }, {
                "value": 1,
                "color": "#1cede7",
                "highlight": "#1cede7",
                "label": "AS262284 Centranet Internet Ltda"
            }, {
                "value": 1,
                "color": "#de667f",
                "highlight": "#de667f",
                "label": "AS21574 Century Telecom Ltda"
            }, {"value": 1, "color": "#716134", "highlight": "#716134", "label": "AS393924 RigNet Inc"}, {
                "value": 1,
                "color": "#7f2e83",
                "highlight": "#7f2e83",
                "label": "AS15128 Comwave Telecom Inc."
            }, {
                "value": 1,
                "color": "#301626",
                "highlight": "#301626",
                "label": "AS52985 Microsoft Informatica Ltda"
            }, {
                "value": 1,
                "color": "#d3cf48",
                "highlight": "#d3cf48",
                "label": "AS4768 TelstraClear Ltd"
            }, {
                "value": 1,
                "color": "#7f76fa",
                "highlight": "#7f76fa",
                "label": "AS265231 MF TELECOM LTDA-ME"
            }, {
                "value": 1,
                "color": "#9c20d3",
                "highlight": "#9c20d3",
                "label": "AS262704 FD Inform\u00e1tica Ltda EPP"
            }, {
                "value": 1,
                "color": "#127d6a",
                "highlight": "#127d6a",
                "label": "AS52910 A. Angeloni & Cia Ltda"
            }, {
                "value": 1,
                "color": "#9f5b72",
                "highlight": "#9f5b72",
                "label": "AS52870 Disk Sistema Tele-Informatica Ltda- ME"
            }, {
                "value": 1,
                "color": "#e332d5",
                "highlight": "#e332d5",
                "label": "AS262764 USONET TECNOLOGIC LTDA - EPP"
            }, {
                "value": 1,
                "color": "#940fff",
                "highlight": "#940fff",
                "label": "AS262755 Aonet Provedor de Internet LTDA - ME"
            }, {
                "value": 1,
                "color": "#16fc13",
                "highlight": "#16fc13",
                "label": "AS28341 WESTNET SERVICOS DE INFORMATICA S\/C LTDA"
            }, {
                "value": 1,
                "color": "#16d7c9",
                "highlight": "#16d7c9",
                "label": "AS263357 Hot Wave Comercio e Servico de Telecomunicacoes Lt"
            }, {
                "value": 1,
                "color": "#ab947f",
                "highlight": "#ab947f",
                "label": "AS31334 Kabel Deutschland Vertrieb und Service GmbH"
            }, {
                "value": 1,
                "color": "#c15d37",
                "highlight": "#c15d37",
                "label": "AS264367 lej redes de telecom e informatica"
            }, {
                "value": 1,
                "color": "#8153bf",
                "highlight": "#8153bf",
                "label": "AS36522 BELL MOBILITY INC."
            }, {
                "value": 1,
                "color": "#8e690a",
                "highlight": "#8e690a",
                "label": "AS61687 PRO NET EMPREENDIMENTOS TECNOLOGICOS LTDA"
            }, {
                "value": 1,
                "color": "#a6ee36",
                "highlight": "#a6ee36",
                "label": "AS262750 Byal Telecom Ltda"
            }, {
                "value": 1,
                "color": "#e0f918",
                "highlight": "#e0f918",
                "label": "AS264531 ULTRANETCE - VICENTE JULIANO M CARVALHO ME"
            }, {
                "value": 1,
                "color": "#5ce1ec",
                "highlight": "#5ce1ec",
                "label": "AS263019 QUICKNET TELECOM LTDA EPP"
            }, {
                "value": 1,
                "color": "#cd2afa",
                "highlight": "#cd2afa",
                "label": "AS198007 dobrafirma.pl Michal Mocek Krzysztof Kafka Gabriel Grzenia"
            }, {
                "value": 1,
                "color": "#2dc336",
                "highlight": "#2dc336",
                "label": "AS61689 MTV TELECOM LTDA - ME"
            }, {
                "value": 1,
                "color": "#339496",
                "highlight": "#339496",
                "label": "AS35063 Chopin Telewizja Kablowa spolka z ograniczona odpowiedzialnoscia"
            }, {
                "value": 1,
                "color": "#bfbaf5",
                "highlight": "#bfbaf5",
                "label": "AS52610 Giga Provedor de Internet Ltda"
            }, {
                "value": 1,
                "color": "#97f377",
                "highlight": "#97f377",
                "label": "AS262354 Ligue Telecomunica\u00e7\u00f5es Ltda"
            }, {
                "value": 1,
                "color": "#a49dd1",
                "highlight": "#a49dd1",
                "label": "AS264315 Ciclo Tecnologia da Informa\u00e7\u00e3o LTDA"
            }, {
                "value": 1,
                "color": "#653495",
                "highlight": "#653495",
                "label": "AS53176 NET INFORM\u00c1TICA LTDA"
            }, {
                "value": 1,
                "color": "#70ceed",
                "highlight": "#70ceed",
                "label": "AS52686 F.J.FANTINI AMPARO ME"
            }, {
                "value": 1,
                "color": "#406ab3",
                "highlight": "#406ab3",
                "label": "AS24086 Viettel Corporation"
            }, {
                "value": 1,
                "color": "#26654d",
                "highlight": "#26654d",
                "label": "AS264878 TRISTATE TECNOLOGIA E TELECOMUNICA\u00c7\u00d5ES"
            }, {
                "value": 1,
                "color": "#6446cb",
                "highlight": "#6446cb",
                "label": "AS394380 Leaseweb USA, Inc."
            }, {
                "value": 1,
                "color": "#bc5e54",
                "highlight": "#bc5e54",
                "label": "AS18747 IFX Corporation"
            }, {
                "value": 1,
                "color": "#5e225c",
                "highlight": "#5e225c",
                "label": "AS29357 National Mobile Telecommunications Company"
            }, {
                "value": 1,
                "color": "#829fdc",
                "highlight": "#829fdc",
                "label": "AS262589 INTERNEXA Brasil Operadora de Telecomunica\u00e7\u00f5es S.A"
            }, {
                "value": 1,
                "color": "#3e85a9",
                "highlight": "#3e85a9",
                "label": "AS265185 VIANET LTDA ME"
            }, {
                "value": 1,
                "color": "#4473dd",
                "highlight": "#4473dd",
                "label": "AS33885 Ownit Broadband AB"
            }, {
                "value": 1,
                "color": "#c7e5ca",
                "highlight": "#c7e5ca",
                "label": "AS264152 NetWork Digital Ltda."
            }, {
                "value": 1,
                "color": "#4a647a",
                "highlight": "#4a647a",
                "label": "AS264175 Station Telecomunicacoes ltda"
            }, {
                "value": 1,
                "color": "#ed4f81",
                "highlight": "#ed4f81",
                "label": "AS52595 Novas Vias Tecnologia da Informa\u00e7\u00e3o Ltda"
            }, {
                "value": 1,
                "color": "#310be5",
                "highlight": "#310be5",
                "label": "AS52873 SOFTCOMP TELECOMUNICACOES"
            }, {
                "value": 1,
                "color": "#a9987f",
                "highlight": "#a9987f",
                "label": "AS263569 DIRECT WIFI TELECOM LTDA. ME"
            }, {
                "value": 1,
                "color": "#6f4a96",
                "highlight": "#6f4a96",
                "label": "AS52878 REDE DE TELECOMUNICA\u00c7\u00d5ES CARAJAS LTDA"
            }, {
                "value": 1,
                "color": "#c61edb",
                "highlight": "#c61edb",
                "label": "AS265422 JHL - TELECOM SOLUCOES EM TI E TELECOM LTDA - ME"
            }, {
                "value": 1,
                "color": "#a70bee",
                "highlight": "#a70bee",
                "label": "AS28131 NET.COM TELECOMUNICA\u00c7\u00d5ES LTDA"
            }, {
                "value": 1,
                "color": "#d29bb7",
                "highlight": "#d29bb7",
                "label": "AS201229 Digital Ocean, Inc."
            }, {
                "value": 1,
                "color": "#c63d3d",
                "highlight": "#c63d3d",
                "label": "AS264138 INTERLES COMUNICACOES LTDA"
            }, {
                "value": 1,
                "color": "#a106cc",
                "highlight": "#a106cc",
                "label": "AS264236 COMFIBRA - PROVEDOR DE TELEC. LTDA - M"
            }, {"value": 1, "color": "#d6485d", "highlight": "#d6485d", "label": "AS21559 OSNET Wireless"}, {
                "value": 1,
                "color": "#1cd45b",
                "highlight": "#1cd45b",
                "label": "AS18889 City of Ruston"
            }, {
                "value": 1,
                "color": "#463052",
                "highlight": "#463052",
                "label": "AS262676 Intervip Networks Ltda."
            }, {
                "value": 1,
                "color": "#27a893",
                "highlight": "#27a893",
                "label": "AS2688 AT&T Global Network Services, LLC"
            }, {
                "value": 1,
                "color": "#fad5e7",
                "highlight": "#fad5e7",
                "label": "AS28219 Net Rosas Com\u00e9rcio e Servi\u00e7os em Inform\u00e1tica Ltda."
            }, {
                "value": 1,
                "color": "#f70ce5",
                "highlight": "#f70ce5",
                "label": "AS11232 Midcontinent Media, Inc."
            }, {
                "value": 1,
                "color": "#6cae41",
                "highlight": "#6cae41",
                "label": "AS39439 Multimedia Polska BBI S.A."
            }, {"value": 1, "color": "#bbb278", "highlight": "#bbb278", "label": "AS53124 Totvs S.A."}, {
                "value": 1,
                "color": "#4132cc",
                "highlight": "#4132cc",
                "label": "AS21795 Mount Saint Mary College"
            }, {
                "value": 1,
                "color": "#ebce91",
                "highlight": "#ebce91",
                "label": "AS262738 PAPA TECNOLOGIA LTDA"
            }, {
                "value": 1,
                "color": "#f58e33",
                "highlight": "#f58e33",
                "label": "AS28224 CPNET Com. e Serv. Telecomunica\u00e7\u00f5es Ltda."
            }, {
                "value": 1,
                "color": "#ee3deb",
                "highlight": "#ee3deb",
                "label": "AS27738 Ecuadortelecom S.A."
            }, {
                "value": 1,
                "color": "#a75144",
                "highlight": "#a75144",
                "label": "AS52606 BRASILNETS COM. ATAC. DE EQ. INFORMATICA LTDA ME"
            }, {
                "value": 1,
                "color": "#d87c92",
                "highlight": "#d87c92",
                "label": "AS262891 M. I. Internet Ltda."
            }, {
                "value": 1,
                "color": "#826399",
                "highlight": "#826399",
                "label": "AS262321 Conectwave Servi\u00e7os e Internet Ltda"
            }, {"value": 1, "color": "#b7d787", "highlight": "#b7d787", "label": "AS27984 Ver Tv S.A."}, {
                "value": 1,
                "color": "#3c07d8",
                "highlight": "#3c07d8",
                "label": "AS52962 Vipnet Baixada Telecom. e Inform\u00e1tica Ltda"
            }, {"value": 1, "color": "#8568fa", "highlight": "#8568fa", "label": "AS52936 ISOTELCO LTDA"}, {
                "value": 1,
                "color": "#ec498d",
                "highlight": "#ec498d",
                "label": "AS262532 VAS Freitas Servicos de Internet Ltda"
            }, {
                "value": 1,
                "color": "#274787",
                "highlight": "#274787",
                "label": "AS264090 Adilson Vanderlei dos Santos Alves e Cia Ltda"
            }, {
                "value": 1,
                "color": "#9032e4",
                "highlight": "#9032e4",
                "label": "AS2527 So-net Entertainment Corporation"
            }, {
                "value": 1,
                "color": "#5e050b",
                "highlight": "#5e050b",
                "label": "AS264911 PRISCILA SANTOS DA SILVA INFORMATICA ME"
            }, {
                "value": 1,
                "color": "#b28130",
                "highlight": "#b28130",
                "label": "AS264600 uznet provedora de internet ltda-me"
            }, {"value": 1, "color": "#ee78eb", "highlight": "#ee78eb", "label": "AS7992 Cogeco Cable"}, {
                "value": 1,
                "color": "#34e7f2",
                "highlight": "#34e7f2",
                "label": "AS262964 CWNET SERVI\u00c7OS T\u00c9CNICOS"
            }, {
                "value": 1,
                "color": "#29d51b",
                "highlight": "#29d51b",
                "label": "AS262591 F B COMUNICACAO MULTIMIDIA LTDA"
            }, {
                "value": 1,
                "color": "#c4e843",
                "highlight": "#c4e843",
                "label": "AS263025 ISPTEC Sistemas de Comunica\u00e7\u00e3o Ltda."
            }, {
                "value": 1,
                "color": "#4c7bc6",
                "highlight": "#4c7bc6",
                "label": "AS53199 The Center Informatica Ltda"
            }, {
                "value": 1,
                "color": "#f8ac87",
                "highlight": "#f8ac87",
                "label": "AS263152 AGUIARI E AGUIARI PROVEDOR DE INTERNET"
            }, {
                "value": 1,
                "color": "#ebe1cc",
                "highlight": "#ebe1cc",
                "label": "AS52601 FAXT Telecomunica\u00e7\u00f5es Ltda."
            }, {"value": 1, "color": "#eff2ee", "highlight": "#eff2ee", "label": "AS262806 F1NET LTDA"}, {
                "value": 1,
                "color": "#a03232",
                "highlight": "#a03232",
                "label": "AS263520 Gm Telecom Ltda"
            }, {
                "value": 1,
                "color": "#bae13e",
                "highlight": "#bae13e",
                "label": "AS265300 L. BATISTA E SOUSA EIRELI - ME"
            }, {
                "value": 1,
                "color": "#11063b",
                "highlight": "#11063b",
                "label": "AS52545 BJ NET Provedor de Internet Ltda. - ME"
            }, {"value": 1, "color": "#376836", "highlight": "#376836", "label": "AS263514 Link Web"}, {
                "value": 1,
                "color": "#e88f4b",
                "highlight": "#e88f4b",
                "label": "AS263884 Infotech de Bom Jardim C. de material de inf. Ltda"
            }, {
                "value": 1,
                "color": "#3f037b",
                "highlight": "#3f037b",
                "label": "AS262869 G1Telecom Provedor de Internet LTDA ME"
            }, {
                "value": 1,
                "color": "#2381b6",
                "highlight": "#2381b6",
                "label": "AS52695 DURAES E CLEMENTINO TECNOLOGIA EM REDES LTDA."
            }, {
                "value": 1,
                "color": "#6c6db5",
                "highlight": "#6c6db5",
                "label": "AS52604 V + NET INTERNET BANDA LARGA"
            }, {
                "value": 1,
                "color": "#318f40",
                "highlight": "#318f40",
                "label": "AS265159 SHELLEY JOSEPH SOARES SOUSA - ME"
            }, {"value": 1, "color": "#361969", "highlight": "#361969", "label": "AS39091 Hyperion S.A."}, {
                "value": 1,
                "color": "#8c89e7",
                "highlight": "#8c89e7",
                "label": "AS15796 Salt Mobile SA"
            }, {
                "value": 1,
                "color": "#dc6205",
                "highlight": "#dc6205",
                "label": "AS15502 Vodafone Ireland Limited"
            }, {
                "value": 1,
                "color": "#47d2ee",
                "highlight": "#47d2ee",
                "label": "AS263272 FamaNet Tecnologia e Inform\u00e1tica LTDA"
            }, {
                "value": 1,
                "color": "#58304d",
                "highlight": "#58304d",
                "label": "AS263029 Atua Net Provedor de Internet Ltda"
            }, {
                "value": 1,
                "color": "#5db70f",
                "highlight": "#5db70f",
                "label": "AS262496 Clonix Inform\u00e1tica LTDA"
            }, {
                "value": 1,
                "color": "#a6119a",
                "highlight": "#a6119a",
                "label": "AS262722 Televigo Televis\u00e3o a Cabo Ltda"
            }, {
                "value": 1,
                "color": "#dbf1c7",
                "highlight": "#dbf1c7",
                "label": "AS21243 Polkomtel Sp. z o.o."
            }, {
                "value": 1,
                "color": "#9eba71",
                "highlight": "#9eba71",
                "label": "AS263626 G-LAB Telecom Informatica LTDA - ME"
            }, {
                "value": 1,
                "color": "#c25555",
                "highlight": "#c25555",
                "label": "AS262419 ASNet Inform\u00e1tica e Internet Ltda"
            }, {
                "value": 1,
                "color": "#211a25",
                "highlight": "#211a25",
                "label": "AS262993 Lanteca Telecom LTDA - ME"
            }, {
                "value": 1,
                "color": "#fbd72a",
                "highlight": "#fbd72a",
                "label": "AS262438 VELOMAX TELECOM S\/A"
            }, {"value": 1, "color": "#38e18a", "highlight": "#38e18a", "label": "AS47524 turksat.com.tr"}, {
                "value": 1,
                "color": "#b7f877",
                "highlight": "#b7f877",
                "label": "AS263619 NovaNet Prest. Serv. de Telecomunica\u00e7\u00f5es Ltda-Me"
            }, {
                "value": 1,
                "color": "#651859",
                "highlight": "#651859",
                "label": "AS263038 SkyNet Presta\u00e7\u00e3o S.C.M. LTDA. ME."
            }, {
                "value": 1,
                "color": "#467ae8",
                "highlight": "#467ae8",
                "label": "AS262699 FOX Internet Banda Larga"
            }, {
                "value": 1,
                "color": "#b2ba34",
                "highlight": "#b2ba34",
                "label": "AS262805 REDE MINAS TELECOM LTDA"
            }, {
                "value": 1,
                "color": "#a1f917",
                "highlight": "#a1f917",
                "label": "AS52541 New Speed Internet Banda Larga"
            }, {
                "value": 1,
                "color": "#f10986",
                "highlight": "#f10986",
                "label": "AS52674 SERCOMPE DATACENTER LTDA"
            }, {
                "value": 1,
                "color": "#843d0d",
                "highlight": "#843d0d",
                "label": "AS52982 GGT PROVEDOR INTERNET LTDA"
            }, {
                "value": 1,
                "color": "#7a2e57",
                "highlight": "#7a2e57",
                "label": "AS263267 VIUNET PROVIMENTO DE ACESSO A INTERNET LTDA - ME"
            }, {
                "value": 1,
                "color": "#203176",
                "highlight": "#203176",
                "label": "AS264229 GLOBAL FLASH TELECOM E TECNOLOGIA LTDA - ME"
            }, {
                "value": 1,
                "color": "#4a85e1",
                "highlight": "#4a85e1",
                "label": "AS53164 UNIVERSIDADE FEDERAL DA BAHIA"
            }, {
                "value": 1,
                "color": "#8d8ffb",
                "highlight": "#8d8ffb",
                "label": "AS5390 Euronet Communications B.V."
            }, {
                "value": 1,
                "color": "#3dbe1a",
                "highlight": "#3dbe1a",
                "label": "AS61577 AMAZONTEL TELECOMUNICACOES LTDA"
            }, {
                "value": 1,
                "color": "#a54047",
                "highlight": "#a54047",
                "label": "AS52851 WEBSUL TELECOMUNICACOES LTDA"
            }, {
                "value": 1,
                "color": "#cd978a",
                "highlight": "#cd978a",
                "label": "AS262743 CLIGUE TELECOMUNICACOES LTDA -ME"
            }, {
                "value": 1,
                "color": "#c2748a",
                "highlight": "#c2748a",
                "label": "AS264212 IMPACTO TELECOMUNICACOES EIRELI - ME"
            }, {
                "value": 1,
                "color": "#55d72b",
                "highlight": "#55d72b",
                "label": "AS13127 Tele 2 Nederland B.V."
            }, {
                "value": 1,
                "color": "#82178c",
                "highlight": "#82178c",
                "label": "AS264945 IP5 PROVEDORES DE REDES DE TELECOMUNICACOES"
            }, {
                "value": 1,
                "color": "#9c2e4c",
                "highlight": "#9c2e4c",
                "label": "AS394111 Foothills Rural Telephone Cooperative Corporation, Inc."
            }, {
                "value": 1,
                "color": "#fc896b",
                "highlight": "#fc896b",
                "label": "AS262336 Conecta Minas Telecom LTDA"
            }, {
                "value": 1,
                "color": "#10b835",
                "highlight": "#10b835",
                "label": "AS6568 Entel S.A. - EntelNet"
            }, {
                "value": 1,
                "color": "#8345a9",
                "highlight": "#8345a9",
                "label": "AS264321 WEBGENESYS INFORM\u00c1TICA LTDA"
            }, {
                "value": 1,
                "color": "#b3183c",
                "highlight": "#b3183c",
                "label": "AS28135 ASSOCIA\u00c7\u00c3O NACIONAL PARA INCLUS\u00c3O DIGITAL - ANID"
            }, {
                "value": 1,
                "color": "#c33f99",
                "highlight": "#c33f99",
                "label": "AS14955 Northern Valley Communications LLC"
            }, {"value": 1, "color": "#b73241", "highlight": "#b73241", "label": "AS11260 EastLink"}, {
                "value": 1,
                "color": "#1d12d2",
                "highlight": "#1d12d2",
                "label": "AS12912 T-MOBILE POLSKA SPOLKA AKCYJNA"
            }, {"value": 1, "color": "#2c952d", "highlight": "#2c952d", "label": "AS9351 ZTV CO.,LTD"}, {
                "value": 1,
                "color": "#5bab9b",
                "highlight": "#5bab9b",
                "label": "AS262966 KEHL E REMUSSI LTDA-ME"
            }, {
                "value": 1,
                "color": "#52cfc9",
                "highlight": "#52cfc9",
                "label": "AS263528 VIACOM NEXT GENERATION COMUNICACAO LTDA"
            }, {
                "value": 1,
                "color": "#51ead7",
                "highlight": "#51ead7",
                "label": "AS21571 MLS Wireless S\/A"
            }, {
                "value": 1,
                "color": "#b0de31",
                "highlight": "#b0de31",
                "label": "AS263950 TVANET TELECOM LTDA"
            }, {
                "value": 1,
                "color": "#7e2b02",
                "highlight": "#7e2b02",
                "label": "AS61848 Ulisses Costa de Almeida ME"
            }, {"value": 1, "color": "#5d7096", "highlight": "#5d7096", "label": "AS57084 Bjare Kraft AB"}, {
                "value": 1,
                "color": "#8b5caa",
                "highlight": "#8b5caa",
                "label": "AS263126 XMAX TELECOM LTDA."
            }, {
                "value": 1,
                "color": "#406ed2",
                "highlight": "#406ed2",
                "label": "AS28355 Connect Servico de Acesso a Internet Ltda"
            }, {
                "value": 1,
                "color": "#37171c",
                "highlight": "#37171c",
                "label": "AS263614 Ajsi Inform\u00e1tica Ltda - Me"
            }, {
                "value": 1,
                "color": "#cd54f3",
                "highlight": "#cd54f3",
                "label": "AS262826 PW INFORMATICA E TECNOLOGIA LTDA"
            }, {
                "value": 1,
                "color": "#c12291",
                "highlight": "#c12291",
                "label": "AS263398 FAMATEL TELECOMUNICACOES LTDA - ME"
            }, {
                "value": 1,
                "color": "#8e405b",
                "highlight": "#8e405b",
                "label": "AS53117 ED ART SISTEMAS LTDA"
            }, {
                "value": 1,
                "color": "#83dd76",
                "highlight": "#83dd76",
                "label": "AS263007 Lobianco Telecom Inform\u00e1tica Ltda. ME"
            }, {
                "value": 1,
                "color": "#d9fe12",
                "highlight": "#d9fe12",
                "label": "AS262359 HIPER LINK PROVEDOR DE INTERNET LTDA - ME"
            }, {
                "value": 1,
                "color": "#67c267",
                "highlight": "#67c267",
                "label": "AS263483 DIRECT LAN TELECOMUNICA\u00c7\u00d5ES SOROCABA LTDA"
            }, {
                "value": 1,
                "color": "#60e29b",
                "highlight": "#60e29b",
                "label": "AS15003 Nobis Technology Group, LLC"
            }, {
                "value": 1,
                "color": "#aed18f",
                "highlight": "#aed18f",
                "label": "AS262542 Speakers Projetos e Execu\u00e7\u00e3o em Audio Ltda"
            }, {
                "value": 1,
                "color": "#318439",
                "highlight": "#318439",
                "label": "AS262618 JGM BRASIL TELECOMUNICA\u00c7\u00d5ES LTDA"
            }, {
                "value": 1,
                "color": "#467f2a",
                "highlight": "#467f2a",
                "label": "AS28469 NII DIGITAL S DE RL DE CV"
            }, {"value": 1, "color": "#12fde1", "highlight": "#12fde1", "label": "AS30094 Giganews, Inc."}, {
                "value": 1,
                "color": "#c22e27",
                "highlight": "#c22e27",
                "label": "AS2516 KDDI CORPORATION"
            }, {
                "value": 1,
                "color": "#59b409",
                "highlight": "#59b409",
                "label": "AS52709 w de c canto junior"
            }, {
                "value": 1,
                "color": "#253dd4",
                "highlight": "#253dd4",
                "label": "AS265178 L.G. BENATO INFORMATICA - ME"
            }, {
                "value": 1,
                "color": "#c06c52",
                "highlight": "#c06c52",
                "label": "AS52976 Datacast Teleinformatica Ltda"
            }, {"value": 1, "color": "#9b86f9", "highlight": "#9b86f9", "label": "AS40065 CNSERVERS LLC"}, {
                "value": 1,
                "color": "#136cde",
                "highlight": "#136cde",
                "label": "AS263285 Tiago Silva Provedores ME"
            }, {
                "value": 1,
                "color": "#62b30d",
                "highlight": "#62b30d",
                "label": "AS61902 Bahialink - Technology"
            }, {
                "value": 1,
                "color": "#fc4b00",
                "highlight": "#fc4b00",
                "label": "AS61811 STAR NET DIVINO LTDA ME"
            }, {
                "value": 1,
                "color": "#8c7168",
                "highlight": "#8c7168",
                "label": "AS28469 AT&T COMUNICACIONES DIGITALES S DE RL DE CV"
            }, {
                "value": 1,
                "color": "#e9c778",
                "highlight": "#e9c778",
                "label": "AS263378 FOKUSNET PROVEDOR DE INTERNET LTDA ME"
            }, {"value": 1, "color": "#757d4b", "highlight": "#757d4b", "label": "AS262774 Tdnet Ltda"}, {
                "value": 1,
                "color": "#d0123f",
                "highlight": "#d0123f",
                "label": "AS32098 Transtelco Inc"
            }, {
                "value": 1,
                "color": "#2c0716",
                "highlight": "#2c0716",
                "label": "AS23352 Server Central Network"
            }, {
                "value": 1,
                "color": "#34f3f8",
                "highlight": "#34f3f8",
                "label": "AS263648 M. N. Redes de Comunica\u00e7\u00f5es Ltda."
            }, {
                "value": 1,
                "color": "#c67f7d",
                "highlight": "#c67f7d",
                "label": "AS265430 Claudia Fernandes de Almeida Vieira - ME"
            }, {
                "value": 1,
                "color": "#84f976",
                "highlight": "#84f976",
                "label": "AS6461 Abovenet Communications, Inc"
            }, {
                "value": 1,
                "color": "#22419c",
                "highlight": "#22419c",
                "label": "AS52614 Goldnet Servi\u00e7os de Internet Ltda"
            }, {"value": 1, "color": "#907ca2", "highlight": "#907ca2", "label": "AS262379 HZ TELECOM"}, {
                "value": 1,
                "color": "#c1c074",
                "highlight": "#c1c074",
                "label": "AS63284 Flextronics International USA , Inc."
            }, {
                "value": 1,
                "color": "#395575",
                "highlight": "#395575",
                "label": "AS28634 Life Tecnologia Ltda."
            }, {
                "value": 1,
                "color": "#4fbb9f",
                "highlight": "#4fbb9f",
                "label": "AS263333 VIPTURBO COM\u00c9RCIO & SERVI\u00c7OS DE INFORM\u00c1TICA LTDA"
            }, {
                "value": 1,
                "color": "#6bd249",
                "highlight": "#6bd249",
                "label": "AS262421 Smart Solutions Comercio e Servicos Ltda"
            }, {
                "value": 1,
                "color": "#78b7c8",
                "highlight": "#78b7c8",
                "label": "AS61752 BATISTA PEREIRA INFORMATICA LTDA."
            }, {"value": 1, "color": "#ad7d50", "highlight": "#ad7d50", "label": "AS264081 Rc Telecom"}, {
                "value": 1,
                "color": "#69acd5",
                "highlight": "#69acd5",
                "label": "AS52872 VOANET Telecomunica\u00e7\u00f5es Ltda."
            }, {
                "value": 1,
                "color": "#877a6d",
                "highlight": "#877a6d",
                "label": "AS52964 FJR TELECOMUNICA\u00c7\u00d5ES LTDA ME"
            }, {
                "value": 1,
                "color": "#cc4e3d",
                "highlight": "#cc4e3d",
                "label": "AS3128 University of Wisconsin System"
            }, {
                "value": 1,
                "color": "#8f790c",
                "highlight": "#8f790c",
                "label": "AS16461 The University of Texas at El Paso"
            }, {
                "value": 1,
                "color": "#c3a13a",
                "highlight": "#c3a13a",
                "label": "AS61873 BORBA PROVEDOR LTDA"
            }, {
                "value": 1,
                "color": "#9d477d",
                "highlight": "#9d477d",
                "label": "AS61858 PRIME SYSTEM INFORMATICA"
            }, {
                "value": 1,
                "color": "#a10264",
                "highlight": "#a10264",
                "label": "AS52953 ZAP TCHE PROVEDOR DE INTERNET LTDA"
            }, {
                "value": 1,
                "color": "#b06812",
                "highlight": "#b06812",
                "label": "AS262802 Flybyte Comunica\u00e7\u00e3o Multimida Ltda."
            }, {
                "value": 1,
                "color": "#84ad80",
                "highlight": "#84ad80",
                "label": "AS61806 Lig Tech Internet Banda Larga"
            }, {
                "value": 1,
                "color": "#49ff4d",
                "highlight": "#49ff4d",
                "label": "AS2856 BT Public Internet Service"
            }, {
                "value": 1,
                "color": "#7b0d9d",
                "highlight": "#7b0d9d",
                "label": "AS52916 Datanet Provedor de Internet Ltda"
            }, {"value": 1, "color": "#783260", "highlight": "#783260", "label": "AS10101 Simpur ISP"}, {
                "value": 1,
                "color": "#c2ad15",
                "highlight": "#c2ad15",
                "label": "AS263487 Giganet Comunica\u00e7\u00f5es Multimidia Ltda"
            }, {
                "value": 1,
                "color": "#36aa71",
                "highlight": "#36aa71",
                "label": "AS52683 HiperNET Servico de Comunicacao LTDA ME"
            }, {
                "value": 1,
                "color": "#eac882",
                "highlight": "#eac882",
                "label": "AS19611 Associa\u00e7\u00e3o Ant\u00f4nio Vieira - Unisinos"
            }, {
                "value": 1,
                "color": "#57f9dc",
                "highlight": "#57f9dc",
                "label": "AS7122 MTS Allstream Inc."
            }, {
                "value": 1,
                "color": "#b009ec",
                "highlight": "#b009ec",
                "label": "AS1759 TeliaSonera Finland Oyj"
            }, {
                "value": 1,
                "color": "#8d1a12",
                "highlight": "#8d1a12",
                "label": "AS13703 BroadRiver Inc."
            }, {
                "value": 1,
                "color": "#4d2872",
                "highlight": "#4d2872",
                "label": "AS263361 INFOVALE-TELECOM LTDA-EPP"
            }, {"value": 1, "color": "#86fd29", "highlight": "#86fd29", "label": "AS53889 Micfo, LLC."}, {
                "value": 1,
                "color": "#fa58f4",
                "highlight": "#fa58f4",
                "label": "AS264031 BRASILTEC SOLUCOES DIGITAIS LTDA - ME"
            }, {
                "value": 1,
                "color": "#8818df",
                "highlight": "#8818df",
                "label": "AS52876 PW NETWORK INFORMATICA E TELECOMUNICACOES LTDA"
            }, {
                "value": 1,
                "color": "#7231e8",
                "highlight": "#7231e8",
                "label": "AS264177 NETTCON PROVEDOR DE INTERNET LTDA - ME"
            }, {
                "value": 1,
                "color": "#283fa5",
                "highlight": "#283fa5",
                "label": "AS61713 Virtual Internet Ltda Me"
            }, {
                "value": 1,
                "color": "#447b29",
                "highlight": "#447b29",
                "label": "AS11993 BANCO DO BRASIL S.A."
            }, {
                "value": 1,
                "color": "#2d3e21",
                "highlight": "#2d3e21",
                "label": "AS264554 CONECTE TELECOMUNICA\u00c7\u00d5ES LTDA"
            }, {
                "value": 1,
                "color": "#47d78e",
                "highlight": "#47d78e",
                "label": "AS263456 MARIA ELIZA XAVIER DA SILVA"
            }, {
                "value": 1,
                "color": "#319b6d",
                "highlight": "#319b6d",
                "label": "AS262590 NET ON LINE LTDA ME"
            }, {
                "value": 1,
                "color": "#2b38d6",
                "highlight": "#2b38d6",
                "label": "AS43939 Internetia Sp.z o.o."
            }, {"value": 1, "color": "#ee5153", "highlight": "#ee5153", "label": "AS52561 GFOUR TELECOM"}, {
                "value": 1,
                "color": "#2323b4",
                "highlight": "#2323b4",
                "label": "AS265059 TV CABO SAO PAULO LTDA"
            }, {
                "value": 1,
                "color": "#33b922",
                "highlight": "#33b922",
                "label": "AS263492 VIPMAX INTERNET LTDA"
            }, {
                "value": 1,
                "color": "#bc5f91",
                "highlight": "#bc5f91",
                "label": "AS52764 Delta Broadband Telecom Provedores de Internet Ltd"
            }, {
                "value": 1,
                "color": "#3b9d2c",
                "highlight": "#3b9d2c",
                "label": "AS14586 Nuclearfallout Enterprises, Inc."
            }, {
                "value": 1,
                "color": "#ccd86a",
                "highlight": "#ccd86a",
                "label": "AS12357 VODAFONE ESPANA S.A.U."
            }, {
                "value": 1,
                "color": "#1b1042",
                "highlight": "#1b1042",
                "label": "AS133124 Spark Ventures"
            }, {
                "value": 1,
                "color": "#ac73a0",
                "highlight": "#ac73a0",
                "label": "AS4761 INDOSAT Internet Network Provider"
            }, {
                "value": 1,
                "color": "#92fc6d",
                "highlight": "#92fc6d",
                "label": "AS17907 NuSkope Pty. Ltd."
            }, {
                "value": 1,
                "color": "#16f88d",
                "highlight": "#16f88d",
                "label": "AS263903 INFORBARRA COMERCIO DE MATERIAIS DE INFORMATICA"
            }, {
                "value": 1,
                "color": "#29d12a",
                "highlight": "#29d12a",
                "label": "AS263497 DH ONLINE INTERNET LTDA"
            }, {
                "value": 1,
                "color": "#da375f",
                "highlight": "#da375f",
                "label": "AS10479 Instituto Tecnol\u00f3gico y de Estudios Superiores de Monterrey"
            }, {
                "value": 1,
                "color": "#a2ee24",
                "highlight": "#a2ee24",
                "label": "AS61722 FLACKNET TELECOMUNICA\u00c7\u00d5ES LTDA ME"
            }, {
                "value": 1,
                "color": "#2b9323",
                "highlight": "#2b9323",
                "label": "AS262620 Pox Network Telecomunica\u00e7\u00f5es Ltda-ME"
            }, {
                "value": 1,
                "color": "#7f7366",
                "highlight": "#7f7366",
                "label": "AS262477 RAIZEN ENERGIA S.A"
            }, {
                "value": 1,
                "color": "#570b34",
                "highlight": "#570b34",
                "label": "AS28178 Networld Provedor e Servicos de Internet Ltda"
            }, {
                "value": 1,
                "color": "#b41578",
                "highlight": "#b41578",
                "label": "AS262571 SM Networks (SM Servi\u00e7os Ltda)"
            }, {"value": 1, "color": "#f6b665", "highlight": "#f6b665", "label": "AS264601 NAVEX Telecom"}, {
                "value": 1,
                "color": "#203628",
                "highlight": "#203628",
                "label": "AS262408 CEPAIN - C2 TELECOM - Ferreira Com e inf ltda"
            }, {
                "value": 1,
                "color": "#7f2faa",
                "highlight": "#7f2faa",
                "label": "AS53016 PRODEPA - Emp Tec da Inf e Com do Estado do Par\u00e1"
            }, {
                "value": 1,
                "color": "#aad056",
                "highlight": "#aad056",
                "label": "AS262851 PLIM TELECOMUNICACOES LTDA-ME"
            }, {
                "value": 1,
                "color": "#3a9161",
                "highlight": "#3a9161",
                "label": "AS264207 Ponto Net Inform\u00e1tica Ltda."
            }, {"value": 1, "color": "#cf4dc7", "highlight": "#cf4dc7", "label": "AS12392 Brutele SC"}, {
                "value": 1,
                "color": "#1a4a20",
                "highlight": "#1a4a20",
                "label": "AS262282 MARIA LUCIANA MACHADO E CIA LTDA-ME"
            }, {
                "value": 1,
                "color": "#c188d4",
                "highlight": "#c188d4",
                "label": "AS52559 Novatec Telecom Ltda ME"
            }, {
                "value": 1,
                "color": "#5301c8",
                "highlight": "#5301c8",
                "label": "AS262530 M. J. Dias & Lima Ltda ME"
            }, {
                "value": 1,
                "color": "#68f274",
                "highlight": "#68f274",
                "label": "AS51815 IP-Only Networks AB"
            }, {
                "value": 1,
                "color": "#4a9cee",
                "highlight": "#4a9cee",
                "label": "AS265255 D. M. R. DE MENESES EIRELI - ME"
            }, {
                "value": 1,
                "color": "#20e995",
                "highlight": "#20e995",
                "label": "AS263166 Murbach Muchelin LTDA"
            }, {
                "value": 1,
                "color": "#ba669e",
                "highlight": "#ba669e",
                "label": "AS262511 Universidade Federal do Par\u00e1"
            }, {
                "value": 1,
                "color": "#af0d4b",
                "highlight": "#af0d4b",
                "label": "AS2715 Fundacao de Amparo a Pesquisa\/RJ"
            }, {
                "value": 1,
                "color": "#52af03",
                "highlight": "#52af03",
                "label": "AS264994 FREIRE E MEDEIROS COM E SERV INFORMATICA LTDA ME"
            }, {
                "value": 1,
                "color": "#3cdbcf",
                "highlight": "#3cdbcf",
                "label": "AS7203 Leaseweb USA, Inc."
            }, {
                "value": 1,
                "color": "#9ecab8",
                "highlight": "#9ecab8",
                "label": "AS11419 Telefonica Data S.A."
            }, {
                "value": 1,
                "color": "#e9f4eb",
                "highlight": "#e9f4eb",
                "label": "AS9116 012 Smile Communications LTD."
            }, {
                "value": 1,
                "color": "#ed865c",
                "highlight": "#ed865c",
                "label": "AS262583 Funda\u00e7\u00e3o Universidade de Passo Fundo"
            }, {
                "value": 1,
                "color": "#ee6627",
                "highlight": "#ee6627",
                "label": "AS7162 Universo Online S.A."
            }, {
                "value": 1,
                "color": "#978d10",
                "highlight": "#978d10",
                "label": "AS262809 Talklink Inform\u00e1tica EIRELI ME."
            }, {
                "value": 1,
                "color": "#42140f",
                "highlight": "#42140f",
                "label": "AS263586 E. M. Fernandes"
            }, {
                "value": 1,
                "color": "#d08ad5",
                "highlight": "#d08ad5",
                "label": "AS15557 Societe Francaise du Radiotelephone S.A."
            }, {
                "value": 1,
                "color": "#32aa07",
                "highlight": "#32aa07",
                "label": "AS52834 FERJ - Funda\u00e7\u00e3o Educacional Regional Jaraguaense"
            }, {
                "value": 1,
                "color": "#19ebe4",
                "highlight": "#19ebe4",
                "label": "AS263582 PONTO SAT CONECT EIRELI ME"
            }, {
                "value": 1,
                "color": "#46782d",
                "highlight": "#46782d",
                "label": "AS6192 University of California at Davis"
            }, {
                "value": 1,
                "color": "#5b2aa8",
                "highlight": "#5b2aa8",
                "label": "AS61785 Via Radio Dourados Informatica Ltda"
            }, {
                "value": 1,
                "color": "#d86181",
                "highlight": "#d86181",
                "label": "AS263037 ISMAEL STROHER & CIA. LTDA. - ME"
            }, {
                "value": 1,
                "color": "#2364b4",
                "highlight": "#2364b4",
                "label": "AS7657 Vodafone NZ Ltd."
            }, {
                "value": 1,
                "color": "#d032c5",
                "highlight": "#d032c5",
                "label": "AS263891 TURBONET INFO E TELECOM"
            }, {
                "value": 1,
                "color": "#32e4b1",
                "highlight": "#32e4b1",
                "label": "AS53018 Viana & Viana Comunica\u00e7ao LTDA-ME"
            }, {
                "value": 1,
                "color": "#c48039",
                "highlight": "#c48039",
                "label": "AS52670 Digital Provedor de Internet Ltda"
            }, {
                "value": 1,
                "color": "#201153",
                "highlight": "#201153",
                "label": "AS263535 REDE GLOBAL TECNOLOGIA LTDA ME"
            }, {"value": 1, "color": "#ad25d6", "highlight": "#ad25d6", "label": "AS262494 Virtex Ltda"}, {
                "value": 1,
                "color": "#1081f7",
                "highlight": "#1081f7",
                "label": "AS28145 RLINE - Solu\u00e7\u00f5es Inteligentes"
            }, {
                "value": 1,
                "color": "#deb4e0",
                "highlight": "#deb4e0",
                "label": "AS263099 STIW Sistema de Telecom. Inf e Wireless LTDA"
            }, {
                "value": 1,
                "color": "#21e76c",
                "highlight": "#21e76c",
                "label": "AS27979 Stel Chile S.A."
            }, {
                "value": 1,
                "color": "#2526e7",
                "highlight": "#2526e7",
                "label": "AS263384 WordNet Internet Banda Larga"
            }, {
                "value": 1,
                "color": "#d60eb4",
                "highlight": "#d60eb4",
                "label": "AS262298 Maikol Campanini Informatica Me"
            }, {
                "value": 1,
                "color": "#4eac5e",
                "highlight": "#4eac5e",
                "label": "AS61833 P. R. LIMA & CIA LTDA"
            }, {
                "value": 1,
                "color": "#a7e9b9",
                "highlight": "#a7e9b9",
                "label": "AS262503 PAULO DE TARSO DE CARVALHO BAYMA FILHO"
            }, {
                "value": 1,
                "color": "#1af10e",
                "highlight": "#1af10e",
                "label": "AS26292 Shrewsbury Electric and Cable Operations"
            }, {
                "value": 1,
                "color": "#b9547c",
                "highlight": "#b9547c",
                "label": "AS262898 jm telecomunica\u00e7\u00e3o e man. ltda me ."
            }, {"value": 1, "color": "#1f4794", "highlight": "#1f4794", "label": "AS263343 PC2 TELECOM"}, {
                "value": 1,
                "color": "#9dae29",
                "highlight": "#9dae29",
                "label": "AS28199 SERVPRO-SERVICOS DE PROCESSAMENTO E COMERCIO LTDA"
            }, {
                "value": 1,
                "color": "#a8aa47",
                "highlight": "#a8aa47",
                "label": "AS34244 Teleservice Bredband Skane AB"
            }, {"value": 1, "color": "#10ae84", "highlight": "#10ae84", "label": "AS262183 MSW S.A."}, {
                "value": 1,
                "color": "#6d2a05",
                "highlight": "#6d2a05",
                "label": "AS264274 DSP RS TELECOMUNICA\u00c7\u00d5ES LTDA."
            }, {
                "value": 1,
                "color": "#4a3938",
                "highlight": "#4a3938",
                "label": "AS262311 IMBRANET INTERNET & INFORMATICA LTDA ME"
            }, {
                "value": 1,
                "color": "#480aa4",
                "highlight": "#480aa4",
                "label": "AS263530 MICROSOL INFORMATICA LTDA"
            }, {
                "value": 1,
                "color": "#2536e6",
                "highlight": "#2536e6",
                "label": "AS265377 FLASH NET TELECOMUNICACOES LTDA - ME"
            }, {
                "value": 1,
                "color": "#344163",
                "highlight": "#344163",
                "label": "AS3595 Global Net Access, LLC"
            }, {
                "value": 1,
                "color": "#cdd4c4",
                "highlight": "#cdd4c4",
                "label": "AS10013 FreeBit Co.,Ltd."
            }, {"value": 1, "color": "#a73769", "highlight": "#a73769", "label": "AS11215 Logix"}, {
                "value": 1,
                "color": "#4a43ae",
                "highlight": "#4a43ae",
                "label": "AS47331 TTNet A.S."
            }, {"value": 1, "color": "#adcdfe", "highlight": "#adcdfe", "label": "AS4795 INDOSATM2  ASN"}, {
                "value": 1,
                "color": "#639040",
                "highlight": "#639040",
                "label": "AS263564 CPnet (Seu Provedor Banda Larga)"
            }, {"value": 0, "color": "#0", "highlight": "#0", "label": null}], opt);

            var ctx2 = $("#contrieschart").get(0).getContext("2d");
            var myPieChart2 = new Chart(ctx2).Pie([{
                "value": 24216,
                "color": "#6f30fa",
                "highlight": "#6f30fa",
                "label": "BR"
            }, {"value": 841, "color": "#e5e703", "highlight": "#e5e703", "label": "CL"}, {
                "value": 769,
                "color": "#61befa",
                "highlight": "#61befa",
                "label": "MX"
            }, {"value": 501, "color": "#ab8e5d", "highlight": "#ab8e5d", "label": "VE"}, {
                "value": 487,
                "color": "#7477bb",
                "highlight": "#7477bb",
                "label": "US"
            }, {"value": 261, "color": "#2dde5c", "highlight": "#2dde5c", "label": "AR"}, {
                "value": 147,
                "color": "#b3bac9",
                "highlight": "#b3bac9",
                "label": "AU"
            }, {"value": 117, "color": "#94a252", "highlight": "#94a252", "label": "UY"}, {
                "value": 109,
                "color": "#840842",
                "highlight": "#840842",
                "label": "PL"
            }, {"value": 91, "color": "#65f563", "highlight": "#65f563", "label": "BO"}, {
                "value": 84,
                "color": "#9b567f",
                "highlight": "#9b567f",
                "label": "CA"
            }, {"value": 77, "color": "#3eb5a9", "highlight": "#3eb5a9", "label": "ES"}, {
                "value": 67,
                "color": "#d6f9a9",
                "highlight": "#d6f9a9",
                "label": "SE"
            }, {"value": 66, "color": "#6633eb", "highlight": "#6633eb", "label": "GB"}, {
                "value": 65,
                "color": "#fdd4fa",
                "highlight": "#fdd4fa",
                "label": "PE"
            }, {"value": 39, "color": "#7cee52", "highlight": "#7cee52", "label": "CO"}, {
                "value": 38,
                "color": "#2024e4",
                "highlight": "#2024e4",
                "label": "JP"
            }, {"value": 36, "color": "#11d363", "highlight": "#11d363", "label": "ID"}, {
                "value": 34,
                "color": "#38f7c8",
                "highlight": "#38f7c8",
                "label": "SG"
            }, {"value": 28, "color": "#d37a2d", "highlight": "#d37a2d", "label": "DE"}, {
                "value": 20,
                "color": "#33afc4",
                "highlight": "#33afc4",
                "label": "DO"
            }, {"value": 20, "color": "#e9d5a6", "highlight": "#e9d5a6", "label": "PY"}, {
                "value": 20,
                "color": "#9764da",
                "highlight": "#9764da",
                "label": "PT"
            }, {"value": 18, "color": "#a49dc8", "highlight": "#a49dc8", "label": "NZ"}, {
                "value": 18,
                "color": "#50497d",
                "highlight": "#50497d",
                "label": "NL"
            }, {"value": 17, "color": "#246f7d", "highlight": "#246f7d", "label": "EG"}, {
                "value": 17,
                "color": "#836586",
                "highlight": "#836586",
                "label": "PH"
            }, {"value": 13, "color": "#7e077f", "highlight": "#7e077f", "label": "PR"}, {
                "value": 12,
                "color": "#fab93e",
                "highlight": "#fab93e",
                "label": "PA"
            }, {"value": 11, "color": "#c9402c", "highlight": "#c9402c", "label": "NO"}, {
                "value": 10,
                "color": "#629fca",
                "highlight": "#629fca",
                "label": "FR"
            }, {"value": 10, "color": "#ae0dd9", "highlight": "#ae0dd9", "label": "AE"}, {
                "value": 8,
                "color": "#2302b9",
                "highlight": "#2302b9",
                "label": "EC"
            }, {"value": 7, "color": "#e28ac7", "highlight": "#e28ac7", "label": "CH"}, {
                "value": 7,
                "color": "#98774f",
                "highlight": "#98774f",
                "label": "HK"
            }, {"value": 6, "color": "#3c5c84", "highlight": "#3c5c84", "label": "VN"}, {
                "value": 6,
                "color": "#1a6bba",
                "highlight": "#1a6bba",
                "label": "TR"
            }, {"value": 5, "color": "#c64735", "highlight": "#c64735", "label": "IT"}, {
                "value": 5,
                "color": "#1fe83e",
                "highlight": "#1fe83e",
                "label": "CR"
            }, {"value": 5, "color": "#66d453", "highlight": "#66d453", "label": "IE"}, {
                "value": 5,
                "color": "#1f08eb",
                "highlight": "#1f08eb",
                "label": "IL"
            }, {"value": 4, "color": "#e3a20f", "highlight": "#e3a20f", "label": "QA"}, {
                "value": 4,
                "color": "#e8fa03",
                "highlight": "#e8fa03",
                "label": "FI"
            }, {"value": 4, "color": "#85208a", "highlight": "#85208a", "label": "BE"}, {
                "value": 4,
                "color": "#e70943",
                "highlight": "#e70943",
                "label": "TH"
            }, {"value": 3, "color": "#c4bdf9", "highlight": "#c4bdf9", "label": "AT"}, {
                "value": 3,
                "color": "#16b9ca",
                "highlight": "#16b9ca",
                "label": "MY"
            }, {"value": 3, "color": "#1133b6", "highlight": "#1133b6", "label": "CZ"}, {
                "value": 3,
                "color": "#d25588",
                "highlight": "#d25588",
                "label": "RU"
            }, {"value": 2, "color": "#f1068a", "highlight": "#f1068a", "label": "IN"}, {
                "value": 2,
                "color": "#199a67",
                "highlight": "#199a67",
                "label": "FO"
            }, {"value": 2, "color": "#12f253", "highlight": "#12f253", "label": "BN"}, {
                "value": 1,
                "color": "#202389",
                "highlight": "#202389",
                "label": "NI"
            }, {"value": 1, "color": "#2a534d", "highlight": "#2a534d", "label": "KH"}, {
                "value": 1,
                "color": "#370488",
                "highlight": "#370488",
                "label": "AF"
            }, {"value": 1, "color": "#a75b40", "highlight": "#a75b40", "label": "KW"}, {
                "value": 1,
                "color": "#d1946d",
                "highlight": "#d1946d",
                "label": "SA"
            }, {"value": 0, "color": "#0", "highlight": "#0", "label": null}], opt);

            var ctx3 = $("#citieschart").get(0).getContext("2d");
            var myPieChart3 = new Chart(ctx3).Pie([{
                "value": 1756,
                "color": "#93851e",
                "highlight": "#93851e",
                "label": "S\u00e3o Paulo"
            }, {"value": 965, "color": "#fb4777", "highlight": "#fb4777", "label": "Rio de Janeiro"}, {
                "value": 539,
                "color": "#608dc3",
                "highlight": "#608dc3",
                "label": "Curitiba"
            }, {"value": 494, "color": "#c1bc01", "highlight": "#c1bc01", "label": "Recife"}, {
                "value": 445,
                "color": "#1ff13f",
                "highlight": "#1ff13f",
                "label": "Belo Horizonte"
            }, {"value": 387, "color": "#ac422b", "highlight": "#ac422b", "label": "Salvador"}, {
                "value": 318,
                "color": "#e470a5",
                "highlight": "#e470a5",
                "label": "Porto Alegre"
            }, {"value": 281, "color": "#5ccb8b", "highlight": "#5ccb8b", "label": "Macei\u00f3"}, {
                "value": 270,
                "color": "#916b52",
                "highlight": "#916b52",
                "label": "Goi\u00e2nia"
            }, {"value": 248, "color": "#13c485", "highlight": "#13c485", "label": "Campinas"}, {
                "value": 246,
                "color": "#556cdc",
                "highlight": "#556cdc",
                "label": "Santiago"
            }, {"value": 217, "color": "#869c71", "highlight": "#869c71", "label": "Bras\u00edlia"}, {
                "value": 207,
                "color": "#84dda2",
                "highlight": "#84dda2",
                "label": "Uberl\u00e2ndia"
            }, {"value": 197, "color": "#644897", "highlight": "#644897", "label": "Florian\u00f3polis"}, {
                "value": 178,
                "color": "#9305fa",
                "highlight": "#9305fa",
                "label": "Sorocaba"
            }, {"value": 166, "color": "#d4f66e", "highlight": "#d4f66e", "label": "Joinville"}, {
                "value": 165,
                "color": "#4253ac",
                "highlight": "#4253ac",
                "label": "Aracaju"
            }, {"value": 157, "color": "#c84730", "highlight": "#c84730", "label": "Cocal"}, {
                "value": 136,
                "color": "#d36be9",
                "highlight": "#d36be9",
                "label": "Campo Grande"
            }, {"value": 114, "color": "#348e5f", "highlight": "#348e5f", "label": "Montevideo"}, {
                "value": 111,
                "color": "#affe6a",
                "highlight": "#affe6a",
                "label": "Manaus"
            }, {"value": 107, "color": "#fe0ee4", "highlight": "#fe0ee4", "label": "Guarulhos"}, {
                "value": 105,
                "color": "#d4d440",
                "highlight": "#d4d440",
                "label": "Caracas"
            }, {"value": 103, "color": "#2f23d5", "highlight": "#2f23d5", "label": "Niter\u00f3i"}, {
                "value": 102,
                "color": "#232e0f",
                "highlight": "#232e0f",
                "label": "Caxias do Sul"
            }, {"value": 99, "color": "#679ee1", "highlight": "#679ee1", "label": "Vila Velha"}, {
                "value": 98,
                "color": "#a1d99e",
                "highlight": "#a1d99e",
                "label": "Sao Jose do Rio Preto"
            }, {"value": 94, "color": "#c5f881", "highlight": "#c5f881", "label": "Bel\u00e9m"}, {
                "value": 91,
                "color": "#1d32de",
                "highlight": "#1d32de",
                "label": "Uberaba"
            }, {"value": 90, "color": "#2a8127", "highlight": "#2a8127", "label": "Ribeir\u00e3o Preto"}, {
                "value": 89,
                "color": "#7e50c1",
                "highlight": "#7e50c1",
                "label": "Piracicaba"
            }, {
                "value": 83,
                "color": "#e00e35",
                "highlight": "#e00e35",
                "label": "S\u00e3o Jos\u00e9 dos Campos"
            }, {"value": 81, "color": "#3ce292", "highlight": "#3ce292", "label": "Santos"}, {
                "value": 77,
                "color": "#a3b47b",
                "highlight": "#a3b47b",
                "label": "Juiz de Fora"
            }, {"value": 76, "color": "#7de740", "highlight": "#7de740", "label": "Monterrey"}, {
                "value": 75,
                "color": "#4b9779",
                "highlight": "#4b9779",
                "label": "Santo Andr\u00e9"
            }, {"value": 74, "color": "#7b2da8", "highlight": "#7b2da8", "label": "Vit\u00f3ria"}, {
                "value": 70,
                "color": "#6af92d",
                "highlight": "#6af92d",
                "label": "Blumenau"
            }, {"value": 68, "color": "#2d2013", "highlight": "#2d2013", "label": "Itaja\u00ed"}, {
                "value": 67,
                "color": "#7136c2",
                "highlight": "#7136c2",
                "label": "Volta Redonda"
            }, {"value": 67, "color": "#fd3e33", "highlight": "#fd3e33", "label": "Buenos Aires"}, {
                "value": 66,
                "color": "#616fca",
                "highlight": "#616fca",
                "label": "Balne\u00e1rio Cambori\u00fa"
            }, {"value": 64, "color": "#813f5c", "highlight": "#813f5c", "label": "Feira de Santana"}, {
                "value": 63,
                "color": "#9ea886",
                "highlight": "#9ea886",
                "label": "S\u00e3o Bernardo do Campo"
            }, {"value": 63, "color": "#b74e81", "highlight": "#b74e81", "label": "Osasco"}, {
                "value": 61,
                "color": "#2c4d22",
                "highlight": "#2c4d22",
                "label": "Olinda"
            }, {"value": 61, "color": "#1e4320", "highlight": "#1e4320", "label": "Araraquara"}, {
                "value": 61,
                "color": "#7f5904",
                "highlight": "#7f5904",
                "label": "Londrina"
            }, {"value": 60, "color": "#25c175", "highlight": "#25c175", "label": "Sao Jose"}, {
                "value": 60,
                "color": "#ffd4bc",
                "highlight": "#ffd4bc",
                "label": "Maring\u00e1"
            }, {"value": 59, "color": "#ae8da1", "highlight": "#ae8da1", "label": "Cuiab\u00e1"}, {
                "value": 59,
                "color": "#c5a0b3",
                "highlight": "#c5a0b3",
                "label": "Serra"
            }, {"value": 58, "color": "#90eb02", "highlight": "#90eb02", "label": "Presidente Prudente"}, {
                "value": 57,
                "color": "#c96136",
                "highlight": "#c96136",
                "label": "Natal"
            }, {"value": 56, "color": "#8d7582", "highlight": "#8d7582", "label": "Bauru"}, {
                "value": 55,
                "color": "#e49dd7",
                "highlight": "#e49dd7",
                "label": "Sao Goncalo"
            }, {"value": 53, "color": "#ce0582", "highlight": "#ce0582", "label": "Americana"}, {
                "value": 53,
                "color": "#3f156f",
                "highlight": "#3f156f",
                "label": "Pelotas"
            }, {
                "value": 52,
                "color": "#204080",
                "highlight": "#204080",
                "label": "Jaboatao dos Guararapes"
            }, {"value": 52, "color": "#19d22b", "highlight": "#19d22b", "label": "Santa Cruz"}, {
                "value": 52,
                "color": "#40cb74",
                "highlight": "#40cb74",
                "label": "Jo\u00e3o Pessoa"
            }, {"value": 52, "color": "#6b0dc9", "highlight": "#6b0dc9", "label": "Duque de Caxias"}, {
                "value": 51,
                "color": "#1d7f34",
                "highlight": "#1d7f34",
                "label": "Aracatuba"
            }, {"value": 48, "color": "#5d668c", "highlight": "#5d668c", "label": "Lima"}, {
                "value": 47,
                "color": "#64e9c1",
                "highlight": "#64e9c1",
                "label": "Contagem"
            }, {"value": 45, "color": "#c98b50", "highlight": "#c98b50", "label": "Nova Igua\u00e7u"}, {
                "value": 44,
                "color": "#902c72",
                "highlight": "#902c72",
                "label": "Praia Grande"
            }, {"value": 42, "color": "#eb5a46", "highlight": "#eb5a46", "label": "Mexico City"}, {
                "value": 41,
                "color": "#35d84f",
                "highlight": "#35d84f",
                "label": "Barueri"
            }, {"value": 39, "color": "#13b69c", "highlight": "#13b69c", "label": "Jaragu\u00e1 do Sul"}, {
                "value": 38,
                "color": "#7b97ee",
                "highlight": "#7b97ee",
                "label": "Paulista"
            }, {"value": 37, "color": "#8f08d3", "highlight": "#8f08d3", "label": "Foz do Igua\u00e7u"}, {
                "value": 37,
                "color": "#a9389a",
                "highlight": "#a9389a",
                "label": "Passo Fundo"
            }, {"value": 37, "color": "#47040e", "highlight": "#47040e", "label": "Sao Vicente"}, {
                "value": 37,
                "color": "#50f651",
                "highlight": "#50f651",
                "label": "Valdivia"
            }, {"value": 36, "color": "#3c5432", "highlight": "#3c5432", "label": "Indaiatuba"}, {
                "value": 36,
                "color": "#b63fa3",
                "highlight": "#b63fa3",
                "label": "Diadema"
            }, {
                "value": 36,
                "color": "#7261e0",
                "highlight": "#7261e0",
                "label": "Santo Antonio de Jesus"
            }, {"value": 35, "color": "#d82ed3", "highlight": "#d82ed3", "label": "Santa Maria"}, {
                "value": 34,
                "color": "#7ae803",
                "highlight": "#7ae803",
                "label": "Jundia\u00ed"
            }, {"value": 34, "color": "#f7f98b", "highlight": "#f7f98b", "label": "Cariacica"}, {
                "value": 34,
                "color": "#da57a6",
                "highlight": "#da57a6",
                "label": "Novo Hamburgo"
            }, {"value": 33, "color": "#565088", "highlight": "#565088", "label": "Mossoro"}, {
                "value": 33,
                "color": "#febd2a",
                "highlight": "#febd2a",
                "label": "Vit\u00f3ria da Conquista"
            }, {"value": 33, "color": "#3c2df6", "highlight": "#3c2df6", "label": "Betim"}, {
                "value": 33,
                "color": "#ca8e13",
                "highlight": "#ca8e13",
                "label": "Imperatriz"
            }, {"value": 32, "color": "#211dc7", "highlight": "#211dc7", "label": "Warsaw"}, {
                "value": 32,
                "color": "#9b0e67",
                "highlight": "#9b0e67",
                "label": "Itaquaquecetuba"
            }, {"value": 31, "color": "#c13efc", "highlight": "#c13efc", "label": "Iquique"}, {
                "value": 31,
                "color": "#45742f",
                "highlight": "#45742f",
                "label": "Catanduva"
            }, {"value": 31, "color": "#138ef4", "highlight": "#138ef4", "label": "Hortol\u00e2ndia"}, {
                "value": 31,
                "color": "#86eaf5",
                "highlight": "#86eaf5",
                "label": "Valinhos"
            }, {"value": 31, "color": "#d1b73e", "highlight": "#d1b73e", "label": "Barquisimeto"}, {
                "value": 31,
                "color": "#e8af4a",
                "highlight": "#e8af4a",
                "label": "Palhoca"
            }, {"value": 30, "color": "#b1c4f1", "highlight": "#b1c4f1", "label": "Canoas"}, {
                "value": 29,
                "color": "#890d80",
                "highlight": "#890d80",
                "label": "Maca\u00e9"
            }, {"value": 29, "color": "#aa62b4", "highlight": "#aa62b4", "label": "Sumare"}, {
                "value": 29,
                "color": "#16dd16",
                "highlight": "#16dd16",
                "label": "Taubate"
            }, {"value": 29, "color": "#85bffd", "highlight": "#85bffd", "label": "Teresina"}, {
                "value": 28,
                "color": "#626203",
                "highlight": "#626203",
                "label": "Mar\u00edlia"
            }, {"value": 27, "color": "#408463", "highlight": "#408463", "label": "Rio Grande"}, {
                "value": 27,
                "color": "#b38491",
                "highlight": "#b38491",
                "label": "Carapicuiba"
            }, {"value": 27, "color": "#bd95f9", "highlight": "#bd95f9", "label": "Resende"}, {
                "value": 27,
                "color": "#e8e953",
                "highlight": "#e8e953",
                "label": "Rio Claro"
            }, {"value": 26, "color": "#610e6f", "highlight": "#610e6f", "label": "Suzano"}, {
                "value": 26,
                "color": "#2a8897",
                "highlight": "#2a8897",
                "label": "Campos"
            }, {"value": 25, "color": "#3d2608", "highlight": "#3d2608", "label": "Singapore"}, {
                "value": 24,
                "color": "#add8a2",
                "highlight": "#add8a2",
                "label": "Crici\u00fama"
            }, {"value": 24, "color": "#97d19d", "highlight": "#97d19d", "label": "Araras"}, {
                "value": 24,
                "color": "#8400a1",
                "highlight": "#8400a1",
                "label": "S\u00e3o Carlos"
            }, {"value": 24, "color": "#e7253d", "highlight": "#e7253d", "label": "London"}, {
                "value": 24,
                "color": "#69d222",
                "highlight": "#69d222",
                "label": "Maua"
            }, {"value": 24, "color": "#3cdc90", "highlight": "#3cdc90", "label": "Limeira"}, {
                "value": 24,
                "color": "#f64aad",
                "highlight": "#f64aad",
                "label": "Amparo"
            }, {"value": 23, "color": "#af0502", "highlight": "#af0502", "label": "Ponta Grossa"}, {
                "value": 22,
                "color": "#ad86d6",
                "highlight": "#ad86d6",
                "label": "Perth"
            }, {"value": 22, "color": "#b88290", "highlight": "#b88290", "label": "Vinhedo"}, {
                "value": 22,
                "color": "#33bd19",
                "highlight": "#33bd19",
                "label": "Cascavel"
            }, {"value": 22, "color": "#34266b", "highlight": "#34266b", "label": "Santa Luzia"}, {
                "value": 22,
                "color": "#e4635d",
                "highlight": "#e4635d",
                "label": "Colombo"
            }, {"value": 21, "color": "#71a3bf", "highlight": "#71a3bf", "label": "Campina Grande"}, {
                "value": 21,
                "color": "#7967dc",
                "highlight": "#7967dc",
                "label": "Medell\u00edn"
            }, {"value": 20, "color": "#65ba11", "highlight": "#65ba11", "label": "New York"}, {
                "value": 20,
                "color": "#d38f2c",
                "highlight": "#d38f2c",
                "label": "Governador Valadares"
            }, {"value": 20, "color": "#54fd09", "highlight": "#54fd09", "label": "Santo Domingo"}, {
                "value": 20,
                "color": "#d26ce2",
                "highlight": "#d26ce2",
                "label": "Camaragibe"
            }, {"value": 19, "color": "#eedd9c", "highlight": "#eedd9c", "label": "S\u00e3o Lu\u00eds"}, {
                "value": 19,
                "color": "#7ac07c",
                "highlight": "#7ac07c",
                "label": "Itabuna"
            }, {"value": 19, "color": "#62b0c5", "highlight": "#62b0c5", "label": "Tijuana"}, {
                "value": 19,
                "color": "#674673",
                "highlight": "#674673",
                "label": "Cotia"
            }, {"value": 18, "color": "#571869", "highlight": "#571869", "label": "Tampico"}, {
                "value": 18,
                "color": "#6db276",
                "highlight": "#6db276",
                "label": "La Paz"
            }, {"value": 18, "color": "#1cb340", "highlight": "#1cb340", "label": "Nova Friburgo"}, {
                "value": 18,
                "color": "#ba25a3",
                "highlight": "#ba25a3",
                "label": "Embu"
            }, {"value": 18, "color": "#9d0b9d", "highlight": "#9d0b9d", "label": "Palmas"}, {
                "value": 18,
                "color": "#830d2e",
                "highlight": "#830d2e",
                "label": "Montes Claros"
            }, {"value": 18, "color": "#b63b61", "highlight": "#b63b61", "label": "Itatiba"}, {
                "value": 18,
                "color": "#4549ac",
                "highlight": "#4549ac",
                "label": "Andradina"
            }, {"value": 17, "color": "#175e49", "highlight": "#175e49", "label": "Guaratingueta"}, {
                "value": 17,
                "color": "#bec2ec",
                "highlight": "#bec2ec",
                "label": "Petrolina"
            }, {"value": 17, "color": "#8f8167", "highlight": "#8f8167", "label": "Birigui"}, {
                "value": 17,
                "color": "#7a096d",
                "highlight": "#7a096d",
                "label": "Brusque"
            }, {"value": 17, "color": "#844894", "highlight": "#844894", "label": "Sydney"}, {
                "value": 17,
                "color": "#7c5873",
                "highlight": "#7c5873",
                "label": "Tatu\u00ed"
            }, {"value": 16, "color": "#1d165f", "highlight": "#1d165f", "label": "Jacare\u00ed"}, {
                "value": 16,
                "color": "#f554ae",
                "highlight": "#f554ae",
                "label": "Jakarta"
            }, {"value": 16, "color": "#85f2ae", "highlight": "#85f2ae", "label": "Lins"}, {
                "value": 16,
                "color": "#f2bd37",
                "highlight": "#f2bd37",
                "label": "Santo Antonio do Monte"
            }, {"value": 16, "color": "#9f43a4", "highlight": "#9f43a4", "label": "Cachoeirinha"}, {
                "value": 16,
                "color": "#ff9639",
                "highlight": "#ff9639",
                "label": "Cruz das Almas"
            }, {"value": 16, "color": "#3587ec", "highlight": "#3587ec", "label": "Porto Velho"}, {
                "value": 16,
                "color": "#544297",
                "highlight": "#544297",
                "label": "Viam\u00e3o"
            }, {"value": 16, "color": "#7df42f", "highlight": "#7df42f", "label": "Pinhais"}, {
                "value": 16,
                "color": "#475676",
                "highlight": "#475676",
                "label": "Sapucaia"
            }, {"value": 16, "color": "#d5d646", "highlight": "#d5d646", "label": "Guaruja"}, {
                "value": 16,
                "color": "#b8844c",
                "highlight": "#b8844c",
                "label": "Taboao da Serra"
            }, {"value": 16, "color": "#9f4544", "highlight": "#9f4544", "label": "Dunbarton Center"}, {
                "value": 16,
                "color": "#3ee0e5",
                "highlight": "#3ee0e5",
                "label": "Santa Barbara d'Oeste"
            }, {"value": 16, "color": "#eb3656", "highlight": "#eb3656", "label": "Itu"}, {
                "value": 16,
                "color": "#e85be8",
                "highlight": "#e85be8",
                "label": "Gaspar"
            }, {"value": 15, "color": "#f54f81", "highlight": "#f54f81", "label": "S\u00e3o Leopoldo"}, {
                "value": 15,
                "color": "#751dd9",
                "highlight": "#751dd9",
                "label": "Santa Cruz do Sul"
            }, {"value": 15, "color": "#16b62b", "highlight": "#16b62b", "label": "Pomerode"}, {
                "value": 15,
                "color": "#385eb0",
                "highlight": "#385eb0",
                "label": "Rio do Sul"
            }, {"value": 15, "color": "#4c433a", "highlight": "#4c433a", "label": "Jandira"}, {
                "value": 15,
                "color": "#7374af",
                "highlight": "#7374af",
                "label": "Navegantes"
            }, {"value": 15, "color": "#635d33", "highlight": "#635d33", "label": "An\u00e1polis"}, {
                "value": 15,
                "color": "#f1bfaf",
                "highlight": "#f1bfaf",
                "label": "Assis"
            }, {"value": 15, "color": "#1a8c51", "highlight": "#1a8c51", "label": "Manhuacu"}, {
                "value": 15,
                "color": "#fb51a8",
                "highlight": "#fb51a8",
                "label": "Rio Branco"
            }, {"value": 15, "color": "#39fd6f", "highlight": "#39fd6f", "label": "Gravata\u00ed"}, {
                "value": 15,
                "color": "#a623e9",
                "highlight": "#a623e9",
                "label": "Francisco Morato"
            }, {"value": 15, "color": "#30f51f", "highlight": "#30f51f", "label": "Maraca\u00ed"}, {
                "value": 15,
                "color": "#1a354e",
                "highlight": "#1a354e",
                "label": "Sao Joao de Meriti"
            }, {"value": 14, "color": "#57bae2", "highlight": "#57bae2", "label": "Guadalajara"}, {
                "value": 14,
                "color": "#5a501c",
                "highlight": "#5a501c",
                "label": "Belford Roxo"
            }, {"value": 14, "color": "#503b27", "highlight": "#503b27", "label": "Teresopolis"}, {
                "value": 14,
                "color": "#b3fcc6",
                "highlight": "#b3fcc6",
                "label": "Antofagasta"
            }, {"value": 14, "color": "#739be4", "highlight": "#739be4", "label": "Itapira"}, {
                "value": 14,
                "color": "#db2163",
                "highlight": "#db2163",
                "label": "Mogi das Cruzes"
            }, {"value": 14, "color": "#80cdf3", "highlight": "#80cdf3", "label": "Tres Pontas"}, {
                "value": 14,
                "color": "#9cdbfd",
                "highlight": "#9cdbfd",
                "label": "Lorena"
            }, {"value": 14, "color": "#15157c", "highlight": "#15157c", "label": "Tijucas"}, {
                "value": 14,
                "color": "#b4f122",
                "highlight": "#b4f122",
                "label": "Frederico Westphalen"
            }, {"value": 14, "color": "#6fe301", "highlight": "#6fe301", "label": "Irece"}, {
                "value": 14,
                "color": "#a787e5",
                "highlight": "#a787e5",
                "label": "Taguatinga"
            }, {"value": 14, "color": "#d95fc6", "highlight": "#d95fc6", "label": "Botucatu"}, {
                "value": 13,
                "color": "#8adba4",
                "highlight": "#8adba4",
                "label": "Dourados"
            }, {"value": 13, "color": "#27d100", "highlight": "#27d100", "label": "Louveira"}, {
                "value": 13,
                "color": "#21ea1f",
                "highlight": "#21ea1f",
                "label": "Mogi-Gaucu"
            }, {"value": 13, "color": "#bf1fd0", "highlight": "#bf1fd0", "label": "Sao Pedro da Aldeia"}, {
                "value": 13,
                "color": "#8613bc",
                "highlight": "#8613bc",
                "label": "Nova Lima"
            }, {"value": 13, "color": "#f20032", "highlight": "#f20032", "label": "Porto Seguro"}, {
                "value": 13,
                "color": "#a439f0",
                "highlight": "#a439f0",
                "label": "Cacapava"
            }, {"value": 13, "color": "#356985", "highlight": "#356985", "label": "Caieiras"}, {
                "value": 12,
                "color": "#33e7f5",
                "highlight": "#33e7f5",
                "label": "Macap\u00e1"
            }, {"value": 12, "color": "#ee9da6", "highlight": "#ee9da6", "label": "San Jose"}, {
                "value": 12,
                "color": "#514bbb",
                "highlight": "#514bbb",
                "label": "S\u00e3o Jo\u00e3o del Rei"
            }, {
                "value": 12,
                "color": "#901e04",
                "highlight": "#901e04",
                "label": "Cabo de Santo Agostinho"
            }, {"value": 12, "color": "#a3f4be", "highlight": "#a3f4be", "label": "V\u00e1rzea Grande"}, {
                "value": 12,
                "color": "#61f9f5",
                "highlight": "#61f9f5",
                "label": "Saquarema"
            }, {
                "value": 12,
                "color": "#98f7bd",
                "highlight": "#98f7bd",
                "label": "S\u00e3o Jos\u00e9 dos Pinhais"
            }, {"value": 12, "color": "#e66a7b", "highlight": "#e66a7b", "label": "Ponte Nova"}, {
                "value": 12,
                "color": "#7ed322",
                "highlight": "#7ed322",
                "label": "Buritirana"
            }, {"value": 12, "color": "#10442f", "highlight": "#10442f", "label": "Lencois Paulista"}, {
                "value": 12,
                "color": "#85136b",
                "highlight": "#85136b",
                "label": "Santana de Parnaiba"
            }, {"value": 12, "color": "#5e67e4", "highlight": "#5e67e4", "label": "Franca"}, {
                "value": 12,
                "color": "#ae73c2",
                "highlight": "#ae73c2",
                "label": "Aruj\u00e1"
            }, {
                "value": 12,
                "color": "#2ce90d",
                "highlight": "#2ce90d",
                "label": "Cachoeiro de Itapemirim"
            }, {"value": 12, "color": "#51e477", "highlight": "#51e477", "label": "Arica"}, {
                "value": 12,
                "color": "#7d5157",
                "highlight": "#7d5157",
                "label": "Cochabamba"
            }, {"value": 11, "color": "#8d2926", "highlight": "#8d2926", "label": "Paranavai"}, {
                "value": 11,
                "color": "#ab88f0",
                "highlight": "#ab88f0",
                "label": "Vicosa"
            }, {"value": 11, "color": "#dd8af4", "highlight": "#dd8af4", "label": "Almirante Tamandare"}, {
                "value": 11,
                "color": "#262086",
                "highlight": "#262086",
                "label": "Fazenda Rio Grande"
            }, {"value": 11, "color": "#2c2029", "highlight": "#2c2029", "label": "Nilopolis"}, {
                "value": 11,
                "color": "#7a2a97",
                "highlight": "#7a2a97",
                "label": "Rio das Ostras"
            }, {"value": 11, "color": "#d0cdcd", "highlight": "#d0cdcd", "label": "Victoria"}, {
                "value": 11,
                "color": "#842156",
                "highlight": "#842156",
                "label": "Avare"
            }, {"value": 11, "color": "#3daf4c", "highlight": "#3daf4c", "label": "Cravinhos"}, {
                "value": 11,
                "color": "#509723",
                "highlight": "#509723",
                "label": "Capao da Canoa"
            }, {"value": 11, "color": "#a00f86", "highlight": "#a00f86", "label": "Petr\u00f3polis"}, {
                "value": 11,
                "color": "#211b7e",
                "highlight": "#211b7e",
                "label": "Cubatao"
            }, {"value": 11, "color": "#512345", "highlight": "#512345", "label": "Veracruz"}, {
                "value": 11,
                "color": "#69443c",
                "highlight": "#69443c",
                "label": "Nova Odessa"
            }, {"value": 11, "color": "#fd715e", "highlight": "#fd715e", "label": "Pitangueiras"}, {
                "value": 11,
                "color": "#176af4",
                "highlight": "#176af4",
                "label": "Queimados"
            }, {"value": 11, "color": "#e3e776", "highlight": "#e3e776", "label": "Boa Vista"}, {
                "value": 11,
                "color": "#b92553",
                "highlight": "#b92553",
                "label": "Cabo Frio"
            }, {"value": 11, "color": "#581570", "highlight": "#581570", "label": "Sertaozinho"}, {
                "value": 11,
                "color": "#ed9820",
                "highlight": "#ed9820",
                "label": "Salto"
            }, {"value": 11, "color": "#d59df0", "highlight": "#d59df0", "label": "Votuporanga"}, {
                "value": 11,
                "color": "#5ac7eb",
                "highlight": "#5ac7eb",
                "label": "Ananindeua"
            }, {"value": 11, "color": "#2d31e4", "highlight": "#2d31e4", "label": "Atibaia"}, {
                "value": 11,
                "color": "#9edcd0",
                "highlight": "#9edcd0",
                "label": "Barra Mansa"
            }, {"value": 11, "color": "#a0dcd0", "highlight": "#a0dcd0", "label": "Chacra Valparaiso"}, {
                "value": 10,
                "color": "#857523",
                "highlight": "#857523",
                "label": "Culiac\u00e1n"
            }, {"value": 10, "color": "#103650", "highlight": "#103650", "label": "Itapevi"}, {
                "value": 10,
                "color": "#c557a5",
                "highlight": "#c557a5",
                "label": "Patos de Minas"
            }, {"value": 10, "color": "#bb874f", "highlight": "#bb874f", "label": "Madrid"}, {
                "value": 10,
                "color": "#88110d",
                "highlight": "#88110d",
                "label": "Pindamonhangaba"
            }, {"value": 10, "color": "#dd132f", "highlight": "#dd132f", "label": "Uppsala"}, {
                "value": 10,
                "color": "#37edb7",
                "highlight": "#37edb7",
                "label": "Jaboticabal"
            }, {"value": 10, "color": "#bb9190", "highlight": "#bb9190", "label": "Monte Alto"}, {
                "value": 10,
                "color": "#cfa418",
                "highlight": "#cfa418",
                "label": "Franco da Rocha"
            }, {"value": 10, "color": "#23084c", "highlight": "#23084c", "label": "Reynosa"}, {
                "value": 10,
                "color": "#db3c9a",
                "highlight": "#db3c9a",
                "label": "Freitas"
            }, {"value": 10, "color": "#5dd908", "highlight": "#5dd908", "label": "Barcelona"}, {
                "value": 10,
                "color": "#73d7b9",
                "highlight": "#73d7b9",
                "label": "Braganca Paulista"
            }, {"value": 10, "color": "#67b3f3", "highlight": "#67b3f3", "label": "Rondon\u00f3polis"}, {
                "value": 10,
                "color": "#229bc5",
                "highlight": "#229bc5",
                "label": "Tupa"
            }, {"value": 10, "color": "#740cde", "highlight": "#740cde", "label": "Erechim"}, {
                "value": 10,
                "color": "#dab02f",
                "highlight": "#dab02f",
                "label": "Cruzeiro"
            }, {"value": 10, "color": "#10177c", "highlight": "#10177c", "label": "Parnamirim"}, {
                "value": 10,
                "color": "#781eb1",
                "highlight": "#781eb1",
                "label": "Ibitinga"
            }, {"value": 10, "color": "#57bfa9", "highlight": "#57bfa9", "label": "Bebedouro"}, {
                "value": 10,
                "color": "#c7c12a",
                "highlight": "#c7c12a",
                "label": "Batatais"
            }, {"value": 10, "color": "#eecd47", "highlight": "#eecd47", "label": "Indaial"}, {
                "value": 10,
                "color": "#bd3422",
                "highlight": "#bd3422",
                "label": "Caratinga"
            }, {"value": 10, "color": "#727aaf", "highlight": "#727aaf", "label": "Santa Rita"}, {
                "value": 10,
                "color": "#643ed2",
                "highlight": "#643ed2",
                "label": "Maracay"
            }, {"value": 10, "color": "#fd551b", "highlight": "#fd551b", "label": "Varzea Paulista"}, {
                "value": 10,
                "color": "#a7a6a4",
                "highlight": "#a7a6a4",
                "label": "Sao Joao da Boa Vista"
            }, {"value": 10, "color": "#263c0d", "highlight": "#263c0d", "label": "Taquaritinga"}, {
                "value": 9,
                "color": "#63a673",
                "highlight": "#63a673",
                "label": "Colatina"
            }, {"value": 9, "color": "#1735d2", "highlight": "#1735d2", "label": "Itaborai"}, {
                "value": 9,
                "color": "#25a48b",
                "highlight": "#25a48b",
                "label": "Varginha"
            }, {"value": 9, "color": "#aaceec", "highlight": "#aaceec", "label": "Sorriso"}, {
                "value": 9,
                "color": "#d69c27",
                "highlight": "#d69c27",
                "label": "S\u00e3o Caetano do Sul"
            }, {"value": 9, "color": "#4f5304", "highlight": "#4f5304", "label": "Ourinhos"}, {
                "value": 9,
                "color": "#3b2895",
                "highlight": "#3b2895",
                "label": "Leopoldina"
            }, {"value": 9, "color": "#df589d", "highlight": "#df589d", "label": "Ipaucu"}, {
                "value": 9,
                "color": "#2d3190",
                "highlight": "#2d3190",
                "label": "Mesquita"
            }, {"value": 9, "color": "#efef3d", "highlight": "#efef3d", "label": "M\u00e9rida"}, {
                "value": 9,
                "color": "#5dd267",
                "highlight": "#5dd267",
                "label": "Lagoa Santa"
            }, {"value": 9, "color": "#3bc742", "highlight": "#3bc742", "label": "Sarandi"}, {
                "value": 9,
                "color": "#28f4e3",
                "highlight": "#28f4e3",
                "label": "Eunapolis"
            }, {"value": 9, "color": "#540317", "highlight": "#540317", "label": "Marica"}, {
                "value": 9,
                "color": "#449340",
                "highlight": "#449340",
                "label": "Satuba"
            }, {"value": 9, "color": "#c32a5f", "highlight": "#c32a5f", "label": "Vitoria de Santo Antao"}, {
                "value": 9,
                "color": "#b7db13",
                "highlight": "#b7db13",
                "label": "Itapema"
            }, {"value": 9, "color": "#ecf8d6", "highlight": "#ecf8d6", "label": "Aparecida"}, {
                "value": 9,
                "color": "#8b2a62",
                "highlight": "#8b2a62",
                "label": "Maravilha"
            }, {"value": 9, "color": "#640cbe", "highlight": "#640cbe", "label": "Ipatinga"}, {
                "value": 9,
                "color": "#ad78e4",
                "highlight": "#ad78e4",
                "label": "Mazatl\u00e1n"
            }, {"value": 9, "color": "#7fa4bc", "highlight": "#7fa4bc", "label": "Taquara"}, {
                "value": 9,
                "color": "#7d2957",
                "highlight": "#7d2957",
                "label": "Barra Bonita"
            }, {"value": 9, "color": "#70e1c7", "highlight": "#70e1c7", "label": "Matamoros"}, {
                "value": 9,
                "color": "#b106e7",
                "highlight": "#b106e7",
                "label": "Rio Largo"
            }, {
                "value": 9,
                "color": "#28c797",
                "highlight": "#28c797",
                "label": "Santa Cruz Do Capibaribe"
            }, {"value": 9, "color": "#6c3b0c", "highlight": "#6c3b0c", "label": "Votorantim"}, {
                "value": 9,
                "color": "#edf39d",
                "highlight": "#edf39d",
                "label": "Bogot\u00e1"
            }, {"value": 9, "color": "#febc5a", "highlight": "#febc5a", "label": "Mogi Mirim"}, {
                "value": 8,
                "color": "#fd0255",
                "highlight": "#fd0255",
                "label": "Maracaibo"
            }, {"value": 8, "color": "#e24b1c", "highlight": "#e24b1c", "label": "Arauc\u00e1ria"}, {
                "value": 8,
                "color": "#fb48ee",
                "highlight": "#fb48ee",
                "label": "Santo \u00c2ngelo"
            }, {"value": 8, "color": "#1d6a2c", "highlight": "#1d6a2c", "label": "Aracruz"}, {
                "value": 8,
                "color": "#48eb7b",
                "highlight": "#48eb7b",
                "label": "Dallas"
            }, {"value": 8, "color": "#c6b36c", "highlight": "#c6b36c", "label": "\\N"}, {
                "value": 8,
                "color": "#57d901",
                "highlight": "#57d901",
                "label": "Santo Amaro"
            }, {"value": 8, "color": "#b91d03", "highlight": "#b91d03", "label": "Alvorada"}, {
                "value": 8,
                "color": "#2f79cc",
                "highlight": "#2f79cc",
                "label": "Oklahoma City"
            }, {
                "value": 8,
                "color": "#1e42ad",
                "highlight": "#1e42ad",
                "label": "Rio Verde de Mato Grosso"
            }, {"value": 8, "color": "#996e32", "highlight": "#996e32", "label": "Vi\u00f1a del Mar"}, {
                "value": 8,
                "color": "#62cdd3",
                "highlight": "#62cdd3",
                "label": "Pouso Alegre"
            }, {"value": 8, "color": "#80f5f1", "highlight": "#80f5f1", "label": "Ferraz de Vasconcelos"}, {
                "value": 8,
                "color": "#935632",
                "highlight": "#935632",
                "label": "Esteio"
            }, {"value": 8, "color": "#6b9341", "highlight": "#6b9341", "label": "Artur Nogueira"}, {
                "value": 8,
                "color": "#425882",
                "highlight": "#425882",
                "label": "Monte Azul Paulista"
            }, {"value": 8, "color": "#691537", "highlight": "#691537", "label": "Aguas de Chapeco"}, {
                "value": 8,
                "color": "#6a1db3",
                "highlight": "#6a1db3",
                "label": "Divin\u00f3polis"
            }, {"value": 8, "color": "#44a5b0", "highlight": "#44a5b0", "label": "Lages"}, {
                "value": 7,
                "color": "#ccdc2f",
                "highlight": "#ccdc2f",
                "label": "Mountain View"
            }, {"value": 7, "color": "#e0c7f5", "highlight": "#e0c7f5", "label": "Mexicali"}, {
                "value": 7,
                "color": "#99d459",
                "highlight": "#99d459",
                "label": "Itaperuna"
            }, {"value": 7, "color": "#c051c3", "highlight": "#c051c3", "label": "Telemaco Borba"}, {
                "value": 7,
                "color": "#3b5b81",
                "highlight": "#3b5b81",
                "label": "Gua\u00edba"
            }, {"value": 7, "color": "#e2679c", "highlight": "#e2679c", "label": "Adamantina"}, {
                "value": 7,
                "color": "#dc8d3e",
                "highlight": "#dc8d3e",
                "label": "Ituiutaba"
            }, {"value": 7, "color": "#a94e09", "highlight": "#a94e09", "label": "Promissao"}, {
                "value": 7,
                "color": "#40c07e",
                "highlight": "#40c07e",
                "label": "Itapecerica da Serra"
            }, {"value": 7, "color": "#b87a6f", "highlight": "#b87a6f", "label": "Escada"}, {
                "value": 7,
                "color": "#8d47be",
                "highlight": "#8d47be",
                "label": "Miami"
            }, {"value": 7, "color": "#dc77d6", "highlight": "#dc77d6", "label": "Raposos"}, {
                "value": 7,
                "color": "#908ac4",
                "highlight": "#908ac4",
                "label": "Mineiros"
            }, {"value": 7, "color": "#f234c7", "highlight": "#f234c7", "label": "Abreu e Lima"}, {
                "value": 7,
                "color": "#315a02",
                "highlight": "#315a02",
                "label": "Biguacu"
            }, {"value": 7, "color": "#3828ab", "highlight": "#3828ab", "label": "Puebla"}, {
                "value": 7,
                "color": "#80a7b0",
                "highlight": "#80a7b0",
                "label": "Caruaru"
            }, {"value": 7, "color": "#762a2f", "highlight": "#762a2f", "label": "Castro"}, {
                "value": 7,
                "color": "#92cad2",
                "highlight": "#92cad2",
                "label": "Barretos"
            }, {"value": 7, "color": "#c1c10c", "highlight": "#c1c10c", "label": "Lavras"}, {
                "value": 7,
                "color": "#709046",
                "highlight": "#709046",
                "label": "Valpara\u00edso"
            }, {"value": 7, "color": "#403c1d", "highlight": "#403c1d", "label": "Garanhuns"}, {
                "value": 7,
                "color": "#65ce2e",
                "highlight": "#65ce2e",
                "label": "Bag\u00e9"
            }, {"value": 7, "color": "#9bebc0", "highlight": "#9bebc0", "label": "Linhares"}, {
                "value": 7,
                "color": "#81d7c7",
                "highlight": "#81d7c7",
                "label": "Aguas Mornas"
            }, {"value": 7, "color": "#62a046", "highlight": "#62a046", "label": "Nazar\u00e9"}, {
                "value": 7,
                "color": "#14ce0a",
                "highlight": "#14ce0a",
                "label": "Farroupilha"
            }, {"value": 7, "color": "#69d43a", "highlight": "#69d43a", "label": "Dracena"}, {
                "value": 7,
                "color": "#1eb33b",
                "highlight": "#1eb33b",
                "label": "Sobradinho"
            }, {"value": 7, "color": "#9938df", "highlight": "#9938df", "label": "Dois Vizinhos"}, {
                "value": 7,
                "color": "#c0e7bb",
                "highlight": "#c0e7bb",
                "label": "Bombinhas"
            }, {"value": 7, "color": "#4ee871", "highlight": "#4ee871", "label": "Quito"}, {
                "value": 7,
                "color": "#249d5e",
                "highlight": "#249d5e",
                "label": "S\u00e3o Mateus"
            }, {"value": 7, "color": "#f153e8", "highlight": "#f153e8", "label": "Paranagu\u00e1"}, {
                "value": 7,
                "color": "#80e672",
                "highlight": "#80e672",
                "label": "Patrocinio"
            }, {"value": 7, "color": "#5980e7", "highlight": "#5980e7", "label": "Pirassununga"}, {
                "value": 7,
                "color": "#8714dd",
                "highlight": "#8714dd",
                "label": "Toronto"
            }, {"value": 7, "color": "#721f2e", "highlight": "#721f2e", "label": "Concepci\u00f3n"}, {
                "value": 6,
                "color": "#131523",
                "highlight": "#131523",
                "label": "Santa Cruz do Rio Pardo"
            }, {"value": 6, "color": "#271169", "highlight": "#271169", "label": "Penha"}, {
                "value": 6,
                "color": "#b374a5",
                "highlight": "#b374a5",
                "label": "Los Mochis"
            }, {"value": 6, "color": "#54ea3c", "highlight": "#54ea3c", "label": "Beckley"}, {
                "value": 6,
                "color": "#5311b1",
                "highlight": "#5311b1",
                "label": "Leme"
            }, {"value": 6, "color": "#a86cc2", "highlight": "#a86cc2", "label": "Nova Serrana"}, {
                "value": 6,
                "color": "#aa9bea",
                "highlight": "#aa9bea",
                "label": "Conc\u00f3rdia"
            }, {
                "value": 6,
                "color": "#40ec91",
                "highlight": "#40ec91",
                "label": "Nossa Senhora do Socorro"
            }, {"value": 6, "color": "#87efa0", "highlight": "#87efa0", "label": "Tubarao"}, {
                "value": 6,
                "color": "#3a24ff",
                "highlight": "#3a24ff",
                "label": "Caraguatatuba"
            }, {"value": 6, "color": "#80c010", "highlight": "#80c010", "label": "Sao Cristovao"}, {
                "value": 6,
                "color": "#21a1ae",
                "highlight": "#21a1ae",
                "label": "Porto Feliz"
            }, {"value": 6, "color": "#e5c7d6", "highlight": "#e5c7d6", "label": "San Crist\u00f3bal"}, {
                "value": 6,
                "color": "#7ac9ab",
                "highlight": "#7ac9ab",
                "label": "Conselheiro Lafaiete"
            }, {"value": 6, "color": "#95a44d", "highlight": "#95a44d", "label": "McLean"}, {
                "value": 6,
                "color": "#4b2dd1",
                "highlight": "#4b2dd1",
                "label": "Poa"
            }, {"value": 6, "color": "#24b995", "highlight": "#24b995", "label": "Regente Feijo"}, {
                "value": 6,
                "color": "#f9dd81",
                "highlight": "#f9dd81",
                "label": "Cajamar"
            }, {"value": 6, "color": "#7e907e", "highlight": "#7e907e", "label": "Dom Pedrito"}, {
                "value": 6,
                "color": "#46fa7f",
                "highlight": "#46fa7f",
                "label": "Ceilandia"
            }, {
                "value": 6,
                "color": "#bb168e",
                "highlight": "#bb168e",
                "label": "Bela Vista De Goi\u00e1s"
            }, {"value": 6, "color": "#53a3fd", "highlight": "#53a3fd", "label": "Patos"}, {
                "value": 6,
                "color": "#91552c",
                "highlight": "#91552c",
                "label": "Bezerros"
            }, {"value": 6, "color": "#898b7b", "highlight": "#898b7b", "label": "Itabira"}, {
                "value": 6,
                "color": "#c1ebcc",
                "highlight": "#c1ebcc",
                "label": "Zapopan"
            }, {"value": 6, "color": "#f6bb9f", "highlight": "#f6bb9f", "label": "Torre\u00f3n"}, {
                "value": 6,
                "color": "#f8570e",
                "highlight": "#f8570e",
                "label": "Bariri"
            }, {"value": 6, "color": "#63d5cc", "highlight": "#63d5cc", "label": "Ciudad Cochabamba"}, {
                "value": 6,
                "color": "#a27070",
                "highlight": "#a27070",
                "label": "Mirassol"
            }, {"value": 6, "color": "#6077ed", "highlight": "#6077ed", "label": "Guanh\u00e3es"}, {
                "value": 6,
                "color": "#e8911b",
                "highlight": "#e8911b",
                "label": "Columbus"
            }, {"value": 6, "color": "#dfe29b", "highlight": "#dfe29b", "label": "Stockholm"}, {
                "value": 6,
                "color": "#157156",
                "highlight": "#157156",
                "label": "Ipor\u00e1"
            }, {"value": 6, "color": "#f4197b", "highlight": "#f4197b", "label": "Caucaia"}, {
                "value": 6,
                "color": "#dafdff",
                "highlight": "#dafdff",
                "label": "Coronel Fabriciano"
            }, {"value": 6, "color": "#987a89", "highlight": "#987a89", "label": "La Serena"}, {
                "value": 6,
                "color": "#ed0f77",
                "highlight": "#ed0f77",
                "label": "Alfenas"
            }, {"value": 6, "color": "#eaac21", "highlight": "#eaac21", "label": "Valencia"}, {
                "value": 6,
                "color": "#4005c2",
                "highlight": "#4005c2",
                "label": "Houston"
            }, {"value": 6, "color": "#5114bf", "highlight": "#5114bf", "label": "Altamira"}, {
                "value": 6,
                "color": "#e53cd7",
                "highlight": "#e53cd7",
                "label": "Campo Bom"
            }, {"value": 6, "color": "#579b18", "highlight": "#579b18", "label": "Ja\u00fa"}, {
                "value": 5,
                "color": "#36f1e8",
                "highlight": "#36f1e8",
                "label": "Barbacena"
            }, {"value": 5, "color": "#20cc2e", "highlight": "#20cc2e", "label": "Sapiranga"}, {
                "value": 5,
                "color": "#c26502",
                "highlight": "#c26502",
                "label": "Coquimbo"
            }, {"value": 5, "color": "#61def3", "highlight": "#61def3", "label": "Tr\u00eas Lagoas"}, {
                "value": 5,
                "color": "#df7b77",
                "highlight": "#df7b77",
                "label": "Campo Largo"
            }, {"value": 5, "color": "#34f1cb", "highlight": "#34f1cb", "label": "Barra do Gar\u00e7as"}, {
                "value": 5,
                "color": "#7c7e93",
                "highlight": "#7c7e93",
                "label": "Guarapari"
            }, {"value": 5, "color": "#88000b", "highlight": "#88000b", "label": "Bertioga"}, {
                "value": 5,
                "color": "#60a0a4",
                "highlight": "#60a0a4",
                "label": "Po\u00e7os de Caldas"
            }, {"value": 5, "color": "#2e6518", "highlight": "#2e6518", "label": "Palmital"}, {
                "value": 5,
                "color": "#8b5e9b",
                "highlight": "#8b5e9b",
                "label": "Fremont"
            }, {"value": 5, "color": "#d7cd30", "highlight": "#d7cd30", "label": "Senador Canedo"}, {
                "value": 5,
                "color": "#baa550",
                "highlight": "#baa550",
                "label": "Ribeir\u00e3o das Neves"
            }, {"value": 5, "color": "#7377f0", "highlight": "#7377f0", "label": "Carmo Da Cachoeira"}, {
                "value": 5,
                "color": "#fc08e6",
                "highlight": "#fc08e6",
                "label": "Jacarezinho"
            }, {"value": 5, "color": "#b62824", "highlight": "#b62824", "label": "Camacari"}, {
                "value": 5,
                "color": "#fc1c46",
                "highlight": "#fc1c46",
                "label": "Altagracia"
            }, {"value": 5, "color": "#d2c44a", "highlight": "#d2c44a", "label": "Sao Joaquim da Barra"}, {
                "value": 5,
                "color": "#6f7aaa",
                "highlight": "#6f7aaa",
                "label": "Londri"
            }, {"value": 5, "color": "#b9793c", "highlight": "#b9793c", "label": "Hanoi"}, {
                "value": 5,
                "color": "#9391bf",
                "highlight": "#9391bf",
                "label": "Guadalupe"
            }, {"value": 5, "color": "#5ed7d9", "highlight": "#5ed7d9", "label": "Capivari"}, {
                "value": 5,
                "color": "#f37178",
                "highlight": "#f37178",
                "label": "Ubaitaba"
            }, {"value": 5, "color": "#34bae3", "highlight": "#34bae3", "label": "Acailandia"}, {
                "value": 5,
                "color": "#979c07",
                "highlight": "#979c07",
                "label": "Lajeado"
            }, {"value": 5, "color": "#75232c", "highlight": "#75232c", "label": "Katowice"}, {
                "value": 5,
                "color": "#5c55a0",
                "highlight": "#5c55a0",
                "label": "Socorro"
            }, {"value": 5, "color": "#45c798", "highlight": "#45c798", "label": "Carpina"}, {
                "value": 5,
                "color": "#dcfa6e",
                "highlight": "#dcfa6e",
                "label": "Guapimirim"
            }, {"value": 5, "color": "#884bc6", "highlight": "#884bc6", "label": "Angra dos Reis"}, {
                "value": 5,
                "color": "#f8486d",
                "highlight": "#f8486d",
                "label": "Uba"
            }, {"value": 5, "color": "#d780c1", "highlight": "#d780c1", "label": "Jun\u00edn"}, {
                "value": 5,
                "color": "#cd1c02",
                "highlight": "#cd1c02",
                "label": "La Guaira"
            }, {"value": 5, "color": "#4a284a", "highlight": "#4a284a", "label": "Tres de Maio"}, {
                "value": 5,
                "color": "#d49199",
                "highlight": "#d49199",
                "label": "Itajub\u00e1"
            }, {"value": 5, "color": "#e6edc5", "highlight": "#e6edc5", "label": "Assis Chateaubriand"}, {
                "value": 5,
                "color": "#cbb46d",
                "highlight": "#cbb46d",
                "label": "Sete Lagoas"
            }, {"value": 5, "color": "#406d81", "highlight": "#406d81", "label": "La Plata"}, {
                "value": 5,
                "color": "#cfb4a8",
                "highlight": "#cfb4a8",
                "label": "Christchurch"
            }, {"value": 5, "color": "#c042c9", "highlight": "#c042c9", "label": "Los Angeles"}, {
                "value": 5,
                "color": "#53cc34",
                "highlight": "#53cc34",
                "label": "Primavera"
            }, {"value": 5, "color": "#19b0b3", "highlight": "#19b0b3", "label": "Vista Alegre"}, {
                "value": 5,
                "color": "#df9f18",
                "highlight": "#df9f18",
                "label": "Arapongas"
            }, {"value": 5, "color": "#43cb1f", "highlight": "#43cb1f", "label": "Guarenas"}, {
                "value": 5,
                "color": "#444a06",
                "highlight": "#444a06",
                "label": "Araruama"
            }, {"value": 5, "color": "#ee2798", "highlight": "#ee2798", "label": "Marau"}, {
                "value": 5,
                "color": "#9463e9",
                "highlight": "#9463e9",
                "label": "Bayam\u00f3n"
            }, {"value": 5, "color": "#3609f9", "highlight": "#3609f9", "label": "Poznan"}, {
                "value": 5,
                "color": "#3a9498",
                "highlight": "#3a9498",
                "label": "Mairipor\u00e3"
            }, {"value": 5, "color": "#7865e3", "highlight": "#7865e3", "label": "Cambui"}, {
                "value": 5,
                "color": "#e9d8d8",
                "highlight": "#e9d8d8",
                "label": "Juazeiro do Norte"
            }, {
                "value": 5,
                "color": "#d46ec8",
                "highlight": "#d46ec8",
                "label": "Espirito Santo do Pinhal"
            }, {"value": 5, "color": "#20ab62", "highlight": "#20ab62", "label": "Muria\u00e9"}, {
                "value": 5,
                "color": "#b56712",
                "highlight": "#b56712",
                "label": "Coatzacoalcos"
            }, {"value": 5, "color": "#21c095", "highlight": "#21c095", "label": "Pueblo Nuevo"}, {
                "value": 5,
                "color": "#798cf4",
                "highlight": "#798cf4",
                "label": "Itaquera"
            }, {"value": 5, "color": "#e664e4", "highlight": "#e664e4", "label": "Apodaca"}, {
                "value": 5,
                "color": "#6682b7",
                "highlight": "#6682b7",
                "label": "Agudos"
            }, {"value": 5, "color": "#ad8df7", "highlight": "#ad8df7", "label": "Maipu"}, {
                "value": 5,
                "color": "#ed531c",
                "highlight": "#ed531c",
                "label": "Federal"
            }, {"value": 5, "color": "#354ef5", "highlight": "#354ef5", "label": "Atlanta"}, {
                "value": 5,
                "color": "#746749",
                "highlight": "#746749",
                "label": "Formosa"
            }, {"value": 5, "color": "#bfd8f8", "highlight": "#bfd8f8", "label": "Presidente Epitacio"}, {
                "value": 5,
                "color": "#cb6140",
                "highlight": "#cb6140",
                "label": "Santo Antonio da Patrulha"
            }, {"value": 5, "color": "#2aa0e6", "highlight": "#2aa0e6", "label": "Ca\u00e7ador"}, {
                "value": 5,
                "color": "#95bf0c",
                "highlight": "#95bf0c",
                "label": "Pedreira"
            }, {"value": 5, "color": "#82b9da", "highlight": "#82b9da", "label": "Presidente Venceslau"}, {
                "value": 5,
                "color": "#4ea965",
                "highlight": "#4ea965",
                "label": "Gainesville"
            }, {"value": 5, "color": "#25e8ba", "highlight": "#25e8ba", "label": "Pi\u00e7arras"}, {
                "value": 5,
                "color": "#b5a69d",
                "highlight": "#b5a69d",
                "label": "Jequi\u00e9"
            }, {"value": 5, "color": "#85ac91", "highlight": "#85ac91", "label": "Itauna"}, {
                "value": 4,
                "color": "#f1b08f",
                "highlight": "#f1b08f",
                "label": "Parobe"
            }, {"value": 4, "color": "#ef2628", "highlight": "#ef2628", "label": "Asunci\u00f3n"}, {
                "value": 4,
                "color": "#1a2be7",
                "highlight": "#1a2be7",
                "label": "Central District"
            }, {"value": 4, "color": "#26478c", "highlight": "#26478c", "label": "Serra Negra"}, {
                "value": 4,
                "color": "#321750",
                "highlight": "#321750",
                "label": "Veran\u00f3polis"
            }, {"value": 4, "color": "#f764ef", "highlight": "#f764ef", "label": "Barra do Pira\u00ed"}, {
                "value": 4,
                "color": "#fb2341",
                "highlight": "#fb2341",
                "label": "Pasadena"
            }, {"value": 4, "color": "#6d5ae5", "highlight": "#6d5ae5", "label": "Ibirite"}, {
                "value": 4,
                "color": "#2b8679",
                "highlight": "#2b8679",
                "label": "Abbotsford"
            }, {"value": 4, "color": "#249c6d", "highlight": "#249c6d", "label": "Marechal Deodoro"}, {
                "value": 4,
                "color": "#704b23",
                "highlight": "#704b23",
                "label": "Richmond"
            }, {"value": 4, "color": "#146627", "highlight": "#146627", "label": "Peruibe"}, {
                "value": 4,
                "color": "#fc351a",
                "highlight": "#fc351a",
                "label": "Cear\u00e1"
            }, {"value": 4, "color": "#b39655", "highlight": "#b39655", "label": "Imbituba"}, {
                "value": 4,
                "color": "#8fe962",
                "highlight": "#8fe962",
                "label": "Porto Real"
            }, {"value": 4, "color": "#a1d2dc", "highlight": "#a1d2dc", "label": "Le\u00f3n"}, {
                "value": 4,
                "color": "#f86e3f",
                "highlight": "#f86e3f",
                "label": "Tokyo"
            }, {"value": 4, "color": "#750806", "highlight": "#750806", "label": "Tiete"}, {
                "value": 4,
                "color": "#39b645",
                "highlight": "#39b645",
                "label": "Santa Rosa"
            }, {"value": 4, "color": "#9df833", "highlight": "#9df833", "label": "Arraial do Cabo"}, {
                "value": 4,
                "color": "#24bde1",
                "highlight": "#24bde1",
                "label": "Jardim Santa Helena"
            }, {"value": 4, "color": "#84745a", "highlight": "#84745a", "label": "Gama"}, {
                "value": 4,
                "color": "#d0f091",
                "highlight": "#d0f091",
                "label": "Sao Roque"
            }, {"value": 4, "color": "#6eaa75", "highlight": "#6eaa75", "label": "Arax\u00e1"}, {
                "value": 4,
                "color": "#6050be",
                "highlight": "#6050be",
                "label": "Itaberaba"
            }, {"value": 4, "color": "#e7db09", "highlight": "#e7db09", "label": "Teixeira"}, {
                "value": 4,
                "color": "#eac87a",
                "highlight": "#eac87a",
                "label": "Agronomica"
            }, {
                "value": 4,
                "color": "#59a570",
                "highlight": "#59a570",
                "label": "Santo Ant\u00f4nio De P\u00e1dua"
            }, {"value": 4, "color": "#48be58", "highlight": "#48be58", "label": "Matinhos"}, {
                "value": 4,
                "color": "#3874cc",
                "highlight": "#3874cc",
                "label": "Sao Lourenco da Mata"
            }, {"value": 4, "color": "#bfcff0", "highlight": "#bfcff0", "label": "Barinas"}, {
                "value": 4,
                "color": "#55bc99",
                "highlight": "#55bc99",
                "label": "Campos Novos"
            }, {"value": 4, "color": "#9005b2", "highlight": "#9005b2", "label": "Paulinia"}, {
                "value": 4,
                "color": "#300faa",
                "highlight": "#300faa",
                "label": "Seattle"
            }, {"value": 4, "color": "#af7dbe", "highlight": "#af7dbe", "label": "Pompano Beach"}, {
                "value": 4,
                "color": "#bc4329",
                "highlight": "#bc4329",
                "label": "Joao Monlevade"
            }, {"value": 4, "color": "#8777cc", "highlight": "#8777cc", "label": "Estancia Velha"}, {
                "value": 4,
                "color": "#cbd9f9",
                "highlight": "#cbd9f9",
                "label": "Itapetininga"
            }, {"value": 4, "color": "#5b1b11", "highlight": "#5b1b11", "label": "Las Vegas"}, {
                "value": 4,
                "color": "#2fcb98",
                "highlight": "#2fcb98",
                "label": "Araguari"
            }, {"value": 4, "color": "#d3dc78", "highlight": "#d3dc78", "label": "Cafelandia"}, {
                "value": 4,
                "color": "#c53b06",
                "highlight": "#c53b06",
                "label": "Rio Sul"
            }, {"value": 4, "color": "#ee747c", "highlight": "#ee747c", "label": "Domingos Martins"}, {
                "value": 4,
                "color": "#bd651e",
                "highlight": "#bd651e",
                "label": "Campo Mourao"
            }, {"value": 4, "color": "#4c8b64", "highlight": "#4c8b64", "label": "Jatai"}, {
                "value": 4,
                "color": "#b09efb",
                "highlight": "#b09efb",
                "label": "Anil"
            }, {"value": 4, "color": "#fa7852", "highlight": "#fa7852", "label": "Brisbane"}, {
                "value": 4,
                "color": "#3c6e21",
                "highlight": "#3c6e21",
                "label": "S\u00e3o Bento do Sul"
            }, {"value": 4, "color": "#7c2791", "highlight": "#7c2791", "label": "Campina Grande do Sul"}, {
                "value": 4,
                "color": "#50560a",
                "highlight": "#50560a",
                "label": "Martinopolis"
            }, {"value": 4, "color": "#a2b019", "highlight": "#a2b019", "label": "Monte Aprazivel"}, {
                "value": 4,
                "color": "#170fff",
                "highlight": "#170fff",
                "label": "L\u00fcbeck"
            }, {
                "value": 4,
                "color": "#ad283d",
                "highlight": "#ad283d",
                "label": "Tr\u00eas Cora\u00e7\u00f5es"
            }, {
                "value": 4,
                "color": "#e3f297",
                "highlight": "#e3f297",
                "label": "Santo Amaro da Imperatriz"
            }, {"value": 4, "color": "#2ea2ec", "highlight": "#2ea2ec", "label": "Flores da Cunha"}, {
                "value": 4,
                "color": "#796308",
                "highlight": "#796308",
                "label": "Cornelio Procopio"
            }, {"value": 4, "color": "#c5adb0", "highlight": "#c5adb0", "label": "Balsas"}, {
                "value": 4,
                "color": "#ac0bf2",
                "highlight": "#ac0bf2",
                "label": "Igarassu"
            }, {"value": 4, "color": "#7b0f74", "highlight": "#7b0f74", "label": "Cianorte"}, {
                "value": 4,
                "color": "#1c6485",
                "highlight": "#1c6485",
                "label": "Len\u00e7oes"
            }, {"value": 4, "color": "#f125ee", "highlight": "#f125ee", "label": "Campos dos Goytacazes"}, {
                "value": 4,
                "color": "#8ea509",
                "highlight": "#8ea509",
                "label": "Melbourne"
            }, {"value": 4, "color": "#95d967", "highlight": "#95d967", "label": "Aragua\u00edna"}, {
                "value": 4,
                "color": "#db772c",
                "highlight": "#db772c",
                "label": "Heroica Matamoros"
            }, {"value": 4, "color": "#17c81d", "highlight": "#17c81d", "label": "Matao"}, {
                "value": 4,
                "color": "#183c05",
                "highlight": "#183c05",
                "label": "Campo Comprido"
            }, {"value": 4, "color": "#b886a1", "highlight": "#b886a1", "label": "Matur\u00edn"}, {
                "value": 4,
                "color": "#dc1987",
                "highlight": "#dc1987",
                "label": "Ciudad Victoria"
            }, {"value": 4, "color": "#5e3a90", "highlight": "#5e3a90", "label": "Apucarana"}, {
                "value": 4,
                "color": "#164b96",
                "highlight": "#164b96",
                "label": "Mage"
            }, {"value": 4, "color": "#bf38da", "highlight": "#bf38da", "label": "Sao Joao Batista"}, {
                "value": 4,
                "color": "#8e9c86",
                "highlight": "#8e9c86",
                "label": "Santa Rita do Sapucai"
            }, {"value": 4, "color": "#6f3641", "highlight": "#6f3641", "label": "Uniao da Vitoria"}, {
                "value": 4,
                "color": "#23200a",
                "highlight": "#23200a",
                "label": "Montreal"
            }, {"value": 4, "color": "#de21b0", "highlight": "#de21b0", "label": "Mendoza"}, {
                "value": 4,
                "color": "#ba38f9",
                "highlight": "#ba38f9",
                "label": "C\u00f3rdoba"
            }, {"value": 4, "color": "#71be5d", "highlight": "#71be5d", "label": "Mococa"}, {
                "value": 4,
                "color": "#b5f858",
                "highlight": "#b5f858",
                "label": "Ouro Branco"
            }, {"value": 4, "color": "#8a463b", "highlight": "#8a463b", "label": "Goian\u00e9sia"}, {
                "value": 4,
                "color": "#222b23",
                "highlight": "#222b23",
                "label": "Rosalia"
            }, {"value": 4, "color": "#65c6fb", "highlight": "#65c6fb", "label": "Fernandopolis"}, {
                "value": 4,
                "color": "#8f126a",
                "highlight": "#8f126a",
                "label": "Arapiraca"
            }, {"value": 4, "color": "#290d06", "highlight": "#290d06", "label": "Montenegro"}, {
                "value": 4,
                "color": "#1d42b0",
                "highlight": "#1d42b0",
                "label": "Touros"
            }, {"value": 4, "color": "#f961af", "highlight": "#f961af", "label": "Sinop"}, {
                "value": 4,
                "color": "#b0d6cc",
                "highlight": "#b0d6cc",
                "label": "Japira"
            }, {"value": 4, "color": "#e52c93", "highlight": "#e52c93", "label": "Phoenix"}, {
                "value": 4,
                "color": "#893536",
                "highlight": "#893536",
                "label": "Marechal Candido Rondon"
            }, {
                "value": 4,
                "color": "#d7b20c",
                "highlight": "#d7b20c",
                "label": "S\u00e3o Jo\u00e3o Nepomuceno"
            }, {"value": 4, "color": "#b0feae", "highlight": "#b0feae", "label": "Candido Mota"}, {
                "value": 4,
                "color": "#7588ed",
                "highlight": "#7588ed",
                "label": "Trindade"
            }, {"value": 3, "color": "#61f8e7", "highlight": "#61f8e7", "label": "Mucuri"}, {
                "value": 3,
                "color": "#4ae6ae",
                "highlight": "#4ae6ae",
                "label": "Virmond"
            }, {"value": 3, "color": "#961d9f", "highlight": "#961d9f", "label": "S\u00e3o Fid\u00e9lis"}, {
                "value": 3,
                "color": "#73bf42",
                "highlight": "#73bf42",
                "label": "Itapemirim"
            }, {"value": 3, "color": "#452891", "highlight": "#452891", "label": "Ituverava"}, {
                "value": 3,
                "color": "#7f8e44",
                "highlight": "#7f8e44",
                "label": "Cagua"
            }, {"value": 3, "color": "#e3b134", "highlight": "#e3b134", "label": "Winchester"}, {
                "value": 3,
                "color": "#3cbf11",
                "highlight": "#3cbf11",
                "label": "Pinhalzinho"
            }, {"value": 3, "color": "#600c51", "highlight": "#600c51", "label": "Sabara"}, {
                "value": 3,
                "color": "#834f73",
                "highlight": "#834f73",
                "label": "Ouro Preto"
            }, {"value": 3, "color": "#ffd404", "highlight": "#ffd404", "label": "Umuarama"}, {
                "value": 3,
                "color": "#3c77e2",
                "highlight": "#3c77e2",
                "label": "Istanbul"
            }, {"value": 3, "color": "#dd41af", "highlight": "#dd41af", "label": "Gosnells"}, {
                "value": 3,
                "color": "#25258b",
                "highlight": "#25258b",
                "label": "Rio Negrinho"
            }, {"value": 3, "color": "#100a29", "highlight": "#100a29", "label": "San Juan"}, {
                "value": 3,
                "color": "#a11c86",
                "highlight": "#a11c86",
                "label": "Jaguarari"
            }, {"value": 3, "color": "#5b069f", "highlight": "#5b069f", "label": "Extrema"}, {
                "value": 3,
                "color": "#7a7a60",
                "highlight": "#7a7a60",
                "label": "Torres"
            }, {"value": 3, "color": "#87560b", "highlight": "#87560b", "label": "Timbo"}, {
                "value": 3,
                "color": "#a6b97f",
                "highlight": "#a6b97f",
                "label": "Paraibuna"
            }, {"value": 3, "color": "#7f9596", "highlight": "#7f9596", "label": "Edinburg"}, {
                "value": 3,
                "color": "#e9ded7",
                "highlight": "#e9ded7",
                "label": "Porto Nacional"
            }, {"value": 3, "color": "#248a10", "highlight": "#248a10", "label": "Itapui"}, {
                "value": 3,
                "color": "#42e42a",
                "highlight": "#42e42a",
                "label": "Bento Gon\u00e7alves"
            }, {"value": 3, "color": "#3d707a", "highlight": "#3d707a", "label": "Ibate"}, {
                "value": 3,
                "color": "#833965",
                "highlight": "#833965",
                "label": "Guariba"
            }, {"value": 3, "color": "#5805e5", "highlight": "#5805e5", "label": "Lucelia"}, {
                "value": 3,
                "color": "#13bc83",
                "highlight": "#13bc83",
                "label": "Sao Simao"
            }, {"value": 3, "color": "#60d3b5", "highlight": "#60d3b5", "label": "Pittsburg"}, {
                "value": 3,
                "color": "#717b88",
                "highlight": "#717b88",
                "label": "Salto de Pirapora"
            }, {"value": 3, "color": "#82a859", "highlight": "#82a859", "label": "Cosmopolis"}, {
                "value": 3,
                "color": "#6036b6",
                "highlight": "#6036b6",
                "label": "Joao Neiva"
            }, {"value": 3, "color": "#edb485", "highlight": "#edb485", "label": "Garibaldi"}, {
                "value": 3,
                "color": "#fc59b1",
                "highlight": "#fc59b1",
                "label": "Miguelopolis"
            }, {"value": 3, "color": "#a2bd3a", "highlight": "#a2bd3a", "label": "Gramado"}, {
                "value": 3,
                "color": "#262c7d",
                "highlight": "#262c7d",
                "label": "Cachoeira Paulista"
            }, {"value": 3, "color": "#9f460e", "highlight": "#9f460e", "label": "Los Teques"}, {
                "value": 3,
                "color": "#7c3191",
                "highlight": "#7c3191",
                "label": "Porto Belo"
            }, {"value": 3, "color": "#af1d9d", "highlight": "#af1d9d", "label": "Chihuahua City"}, {
                "value": 3,
                "color": "#19ba9d",
                "highlight": "#19ba9d",
                "label": "Acarigua"
            }, {"value": 3, "color": "#7b56c8", "highlight": "#7b56c8", "label": "Bom Despacho"}, {
                "value": 3,
                "color": "#c694f7",
                "highlight": "#c694f7",
                "label": "Tramandai"
            }, {"value": 3, "color": "#5bfcab", "highlight": "#5bfcab", "label": "Hereford"}, {
                "value": 3,
                "color": "#f19a46",
                "highlight": "#f19a46",
                "label": "Iconha"
            }, {"value": 3, "color": "#d556cc", "highlight": "#d556cc", "label": "Adolfo"}, {
                "value": 3,
                "color": "#462b50",
                "highlight": "#462b50",
                "label": "Currais Novos"
            }, {"value": 3, "color": "#6459b8", "highlight": "#6459b8", "label": "Luz"}, {
                "value": 3,
                "color": "#61a720",
                "highlight": "#61a720",
                "label": "Nova Prata"
            }, {"value": 3, "color": "#b46702", "highlight": "#b46702", "label": "Pasto Da Mata"}, {
                "value": 3,
                "color": "#9870f9",
                "highlight": "#9870f9",
                "label": "Barao de Cocais"
            }, {"value": 3, "color": "#b10747", "highlight": "#b10747", "label": "Dourado"}, {
                "value": 3,
                "color": "#4b225e",
                "highlight": "#4b225e",
                "label": "Pires do Rio"
            }, {"value": 3, "color": "#f291ea", "highlight": "#f291ea", "label": "Chiguayante"}, {
                "value": 3,
                "color": "#2e395e",
                "highlight": "#2e395e",
                "label": "Pirapozinho"
            }, {"value": 3, "color": "#1f97ed", "highlight": "#1f97ed", "label": "Vancouver"}, {
                "value": 3,
                "color": "#1b3921",
                "highlight": "#1b3921",
                "label": "V\u00e4stervik"
            }, {"value": 3, "color": "#29c8a3", "highlight": "#29c8a3", "label": "Cruz Alta"}, {
                "value": 3,
                "color": "#284848",
                "highlight": "#284848",
                "label": "Orlando"
            }, {"value": 3, "color": "#c06bfa", "highlight": "#c06bfa", "label": "Araquari"}, {
                "value": 3,
                "color": "#e37142",
                "highlight": "#e37142",
                "label": "Ipiau"
            }, {"value": 3, "color": "#49a06c", "highlight": "#49a06c", "label": "Antioch"}, {
                "value": 3,
                "color": "#d71ab7",
                "highlight": "#d71ab7",
                "label": "Pen\u00e1polis"
            }, {"value": 3, "color": "#16cd7e", "highlight": "#16cd7e", "label": "Pontal"}, {
                "value": 3,
                "color": "#cb4de1",
                "highlight": "#cb4de1",
                "label": "Liverpool"
            }, {"value": 3, "color": "#8c7b36", "highlight": "#8c7b36", "label": "Garca"}, {
                "value": 3,
                "color": "#cea624",
                "highlight": "#cea624",
                "label": "Cacoal"
            }, {"value": 3, "color": "#51d356", "highlight": "#51d356", "label": "Canelinha"}, {
                "value": 3,
                "color": "#e0ce4b",
                "highlight": "#e0ce4b",
                "label": "Lubbock"
            }, {"value": 3, "color": "#fe1e94", "highlight": "#fe1e94", "label": "Sao Manuel"}, {
                "value": 3,
                "color": "#e6ee91",
                "highlight": "#e6ee91",
                "label": "Krasnogorsk"
            }, {"value": 3, "color": "#34cd62", "highlight": "#34cd62", "label": "Cabreuva"}, {
                "value": 3,
                "color": "#e18ef4",
                "highlight": "#e18ef4",
                "label": "Brownsville"
            }, {"value": 3, "color": "#d6cf01", "highlight": "#d6cf01", "label": "Boituva"}, {
                "value": 3,
                "color": "#2e02e9",
                "highlight": "#2e02e9",
                "label": "Maracanau"
            }, {"value": 3, "color": "#880ea1", "highlight": "#880ea1", "label": "Jardinopolis"}, {
                "value": 3,
                "color": "#bdfcb5",
                "highlight": "#bdfcb5",
                "label": "Maple Ridge"
            }, {"value": 3, "color": "#48b5b6", "highlight": "#48b5b6", "label": "Alegre"}, {
                "value": 3,
                "color": "#d4823b",
                "highlight": "#d4823b",
                "label": "Luziania"
            }, {"value": 3, "color": "#5fc2a0", "highlight": "#5fc2a0", "label": "Colonia Mexico"}, {
                "value": 3,
                "color": "#1a12af",
                "highlight": "#1a12af",
                "label": "Trajano De Morais"
            }, {"value": 3, "color": "#1cfede", "highlight": "#1cfede", "label": "Cuauhtemoc"}, {
                "value": 3,
                "color": "#c45d18",
                "highlight": "#c45d18",
                "label": "Itaguai"
            }, {"value": 3, "color": "#fc411e", "highlight": "#fc411e", "label": "Milton"}, {
                "value": 3,
                "color": "#e90137",
                "highlight": "#e90137",
                "label": "Seropedica"
            }, {"value": 3, "color": "#2206c3", "highlight": "#2206c3", "label": "Rancharia"}, {
                "value": 3,
                "color": "#6224ad",
                "highlight": "#6224ad",
                "label": "Carazinho"
            }, {"value": 3, "color": "#b4c530", "highlight": "#b4c530", "label": "Chapec\u00f3"}, {
                "value": 3,
                "color": "#bc53e9",
                "highlight": "#bc53e9",
                "label": "Laguna Niguel"
            }, {"value": 3, "color": "#9dbfd8", "highlight": "#9dbfd8", "label": "Pilar do Sul"}, {
                "value": 3,
                "color": "#d36e2c",
                "highlight": "#d36e2c",
                "label": "Araripina"
            }, {"value": 3, "color": "#86a6d5", "highlight": "#86a6d5", "label": "Guarabira"}, {
                "value": 3,
                "color": "#73befe",
                "highlight": "#73befe",
                "label": "La Lagunilla"
            }, {"value": 3, "color": "#6eb04a", "highlight": "#6eb04a", "label": "Brooklyn"}, {
                "value": 3,
                "color": "#850c74",
                "highlight": "#850c74",
                "label": "Sao Sebastiao do Paraiso"
            }, {"value": 3, "color": "#9fcc4f", "highlight": "#9fcc4f", "label": "Prague"}, {
                "value": 3,
                "color": "#9a367f",
                "highlight": "#9a367f",
                "label": "Vacaria"
            }, {
                "value": 3,
                "color": "#b9ea8d",
                "highlight": "#b9ea8d",
                "label": "Santa Cruz De La Sierra"
            }, {"value": 3, "color": "#6584d6", "highlight": "#6584d6", "label": "Bandung"}, {
                "value": 3,
                "color": "#cb4fda",
                "highlight": "#cb4fda",
                "label": "Castanheiras"
            }, {"value": 3, "color": "#3045c0", "highlight": "#3045c0", "label": "Oeste"}, {
                "value": 3,
                "color": "#8a4f46",
                "highlight": "#8a4f46",
                "label": "Pedras de Fogo"
            }, {"value": 3, "color": "#59f908", "highlight": "#59f908", "label": "Agua Caliente"}, {
                "value": 3,
                "color": "#1bdd04",
                "highlight": "#1bdd04",
                "label": "Monte Carmelo"
            }, {"value": 3, "color": "#5a3b76", "highlight": "#5a3b76", "label": "Sao Jose do Egito"}, {
                "value": 3,
                "color": "#3186d1",
                "highlight": "#3186d1",
                "label": "Piquete"
            }, {"value": 3, "color": "#fe1d02", "highlight": "#fe1d02", "label": "Bernardino de Campos"}, {
                "value": 3,
                "color": "#290a45",
                "highlight": "#290a45",
                "label": "Serra Talhada"
            }, {"value": 3, "color": "#36188c", "highlight": "#36188c", "label": "San Bernardo"}, {
                "value": 3,
                "color": "#2e16eb",
                "highlight": "#2e16eb",
                "label": "Itapolis"
            }, {"value": 3, "color": "#c96a8e", "highlight": "#c96a8e", "label": "Campo do Brito"}, {
                "value": 3,
                "color": "#b6e12d",
                "highlight": "#b6e12d",
                "label": "Goianira"
            }, {"value": 3, "color": "#5938ee", "highlight": "#5938ee", "label": "Alvares Machado"}, {
                "value": 3,
                "color": "#40e6b5",
                "highlight": "#40e6b5",
                "label": "Santar\u00e9m"
            }, {"value": 3, "color": "#f7869a", "highlight": "#f7869a", "label": "Ilha Solteira"}, {
                "value": 3,
                "color": "#aa8eca",
                "highlight": "#aa8eca",
                "label": "Sao Lourenco do Sul"
            }, {"value": 3, "color": "#c7b0aa", "highlight": "#c7b0aa", "label": "Jales"}, {
                "value": 3,
                "color": "#ea3d9f",
                "highlight": "#ea3d9f",
                "label": "Salamanca"
            }, {"value": 3, "color": "#7555ac", "highlight": "#7555ac", "label": "Barrinha"}, {
                "value": 3,
                "color": "#b5ee53",
                "highlight": "#b5ee53",
                "label": "Port Montt"
            }, {"value": 3, "color": "#93b354", "highlight": "#93b354", "label": "Pedro Leopoldo"}, {
                "value": 3,
                "color": "#f9228e",
                "highlight": "#f9228e",
                "label": "Carbondale"
            }, {"value": 3, "color": "#71c53c", "highlight": "#71c53c", "label": "Marab\u00e1"}, {
                "value": 3,
                "color": "#9c468c",
                "highlight": "#9c468c",
                "label": "Itapetinga"
            }, {"value": 3, "color": "#3489f9", "highlight": "#3489f9", "label": "Costa Mesa"}, {
                "value": 2,
                "color": "#21b650",
                "highlight": "#21b650",
                "label": "Santa Luzia do Norte"
            }, {"value": 2, "color": "#f53872", "highlight": "#f53872", "label": "Charallave"}, {
                "value": 2,
                "color": "#3bcb49",
                "highlight": "#3bcb49",
                "label": "Morehead"
            }, {"value": 2, "color": "#fcb892", "highlight": "#fcb892", "label": "Ouro Preto do Oeste"}, {
                "value": 2,
                "color": "#d4ea9d",
                "highlight": "#d4ea9d",
                "label": "Pojuca"
            }, {"value": 2, "color": "#ff9150", "highlight": "#ff9150", "label": "Sabo\u00f3"}, {
                "value": 2,
                "color": "#28ba9a",
                "highlight": "#28ba9a",
                "label": "Miami Beach"
            }, {"value": 2, "color": "#b386cd", "highlight": "#b386cd", "label": "Ariquemes"}, {
                "value": 2,
                "color": "#daee17",
                "highlight": "#daee17",
                "label": "Dublin"
            }, {"value": 2, "color": "#56a37a", "highlight": "#56a37a", "label": "Anchieta"}, {
                "value": 2,
                "color": "#532015",
                "highlight": "#532015",
                "label": "Martinho Campos"
            }, {"value": 2, "color": "#e7b331", "highlight": "#e7b331", "label": "Warzachewka Polska"}, {
                "value": 2,
                "color": "#5b2d2c",
                "highlight": "#5b2d2c",
                "label": "Auriflama"
            }, {"value": 2, "color": "#647a3e", "highlight": "#647a3e", "label": "Itagua\u00e7u"}, {
                "value": 2,
                "color": "#e1c756",
                "highlight": "#e1c756",
                "label": "Alvinlandia"
            }, {"value": 2, "color": "#25e203", "highlight": "#25e203", "label": "Armacao de Buzios"}, {
                "value": 2,
                "color": "#75f758",
                "highlight": "#75f758",
                "label": "Simi Valley"
            }, {"value": 2, "color": "#1b287f", "highlight": "#1b287f", "label": "Curitibanos"}, {
                "value": 2,
                "color": "#5dd60a",
                "highlight": "#5dd60a",
                "label": "Aldeia"
            }, {"value": 2, "color": "#f7798c", "highlight": "#f7798c", "label": "Chavantes"}, {
                "value": 2,
                "color": "#95fb1b",
                "highlight": "#95fb1b",
                "label": "Teutonia"
            }, {"value": 2, "color": "#15023a", "highlight": "#15023a", "label": "Cabedelo"}, {
                "value": 2,
                "color": "#da360c",
                "highlight": "#da360c",
                "label": "Carrizal"
            }, {"value": 2, "color": "#d6dbc1", "highlight": "#d6dbc1", "label": "Cordeiropolis"}, {
                "value": 2,
                "color": "#d1d45c",
                "highlight": "#d1d45c",
                "label": "S\u00e3o Miguel do Oeste"
            }, {"value": 2, "color": "#eab44d", "highlight": "#eab44d", "label": "Pharr"}, {
                "value": 2,
                "color": "#8e06cd",
                "highlight": "#8e06cd",
                "label": "Upplands Vasby"
            }, {"value": 2, "color": "#d17b01", "highlight": "#d17b01", "label": "Wellington"}, {
                "value": 2,
                "color": "#b5dd25",
                "highlight": "#b5dd25",
                "label": "Centerville"
            }, {"value": 2, "color": "#3ca8c2", "highlight": "#3ca8c2", "label": "Curionopolis"}, {
                "value": 2,
                "color": "#aaa2bc",
                "highlight": "#aaa2bc",
                "label": "Bromley"
            }, {"value": 2, "color": "#efcba9", "highlight": "#efcba9", "label": "Jacon\u00e9"}, {
                "value": 2,
                "color": "#52899c",
                "highlight": "#52899c",
                "label": "Seville"
            }, {"value": 2, "color": "#1e3073", "highlight": "#1e3073", "label": "Piraju"}, {
                "value": 2,
                "color": "#a2b27e",
                "highlight": "#a2b27e",
                "label": "Bom Jesus do Itabapoana"
            }, {
                "value": 2,
                "color": "#85fd14",
                "highlight": "#85fd14",
                "label": "San Luis Potos\u00ed City"
            }, {"value": 2, "color": "#ad695b", "highlight": "#ad695b", "label": "Albemarle"}, {
                "value": 2,
                "color": "#33fe01",
                "highlight": "#33fe01",
                "label": "Sao Miguel dos Campos"
            }, {"value": 2, "color": "#c4dd15", "highlight": "#c4dd15", "label": "Potirendaba"}, {
                "value": 2,
                "color": "#3cd62a",
                "highlight": "#3cd62a",
                "label": "Brasnorte"
            }, {"value": 2, "color": "#527709", "highlight": "#527709", "label": "Tlalnepantla"}, {
                "value": 2,
                "color": "#e5f540",
                "highlight": "#e5f540",
                "label": "Paraitinga"
            }, {"value": 2, "color": "#ce16e4", "highlight": "#ce16e4", "label": "Rolandia"}, {
                "value": 2,
                "color": "#50857e",
                "highlight": "#50857e",
                "label": "Temperley"
            }, {"value": 2, "color": "#45737f", "highlight": "#45737f", "label": "Mineiros do Tiete"}, {
                "value": 2,
                "color": "#78d7cd",
                "highlight": "#78d7cd",
                "label": "Valenca"
            }, {"value": 2, "color": "#d70cc6", "highlight": "#d70cc6", "label": "Olimpia"}, {
                "value": 2,
                "color": "#e6efc1",
                "highlight": "#e6efc1",
                "label": "Portage la Prairie"
            }, {"value": 2, "color": "#1b12e0", "highlight": "#1b12e0", "label": "Sao Bento do Sapucai"}, {
                "value": 2,
                "color": "#aa7a7d",
                "highlight": "#aa7a7d",
                "label": "Ensenada"
            }, {"value": 2, "color": "#958d69", "highlight": "#958d69", "label": "Carangola"}, {
                "value": 2,
                "color": "#bd581e",
                "highlight": "#bd581e",
                "label": "Goias"
            }, {"value": 2, "color": "#60f71f", "highlight": "#60f71f", "label": "Guatire"}, {
                "value": 2,
                "color": "#9510cf",
                "highlight": "#9510cf",
                "label": "Woodbridge"
            }, {"value": 2, "color": "#b80fb2", "highlight": "#b80fb2", "label": "Monte Santo de Minas"}, {
                "value": 2,
                "color": "#8b9d46",
                "highlight": "#8b9d46",
                "label": "Sao Marcos"
            }, {"value": 2, "color": "#9a0868", "highlight": "#9a0868", "label": "Albuquerque"}, {
                "value": 2,
                "color": "#78d904",
                "highlight": "#78d904",
                "label": "Boraceia"
            }, {"value": 2, "color": "#4baf1c", "highlight": "#4baf1c", "label": "Bilac"}, {
                "value": 2,
                "color": "#990f1e",
                "highlight": "#990f1e",
                "label": "Massaranduba"
            }, {"value": 2, "color": "#348e0d", "highlight": "#348e0d", "label": "Cachoeira"}, {
                "value": 2,
                "color": "#862b1e",
                "highlight": "#862b1e",
                "label": "Medford"
            }, {"value": 2, "color": "#9ebe90", "highlight": "#9ebe90", "label": "San Luis"}, {
                "value": 2,
                "color": "#d783d3",
                "highlight": "#d783d3",
                "label": "Auckland"
            }, {"value": 2, "color": "#d01156", "highlight": "#d01156", "label": "Jaguariuna"}, {
                "value": 2,
                "color": "#876c22",
                "highlight": "#876c22",
                "label": "Leipzig"
            }, {"value": 2, "color": "#4ee7fd", "highlight": "#4ee7fd", "label": "Paracambi"}, {
                "value": 2,
                "color": "#f8ac30",
                "highlight": "#f8ac30",
                "label": "Cataguases"
            }, {"value": 2, "color": "#9160ec", "highlight": "#9160ec", "label": "Palmeiras de Goias"}, {
                "value": 2,
                "color": "#2d7ab4",
                "highlight": "#2d7ab4",
                "label": "Los Andes"
            }, {"value": 2, "color": "#1c5bb0", "highlight": "#1c5bb0", "label": "Paraguacu Paulista"}, {
                "value": 2,
                "color": "#460cc2",
                "highlight": "#460cc2",
                "label": "Conceicao do Coite"
            }, {"value": 2, "color": "#d0e3a2", "highlight": "#d0e3a2", "label": "Rio Branco do Sul"}, {
                "value": 2,
                "color": "#ac3d29",
                "highlight": "#ac3d29",
                "label": "Nova Era"
            }, {"value": 2, "color": "#556a6b", "highlight": "#556a6b", "label": "Baixo Guandu"}, {
                "value": 2,
                "color": "#149f70",
                "highlight": "#149f70",
                "label": "Ariranha"
            }, {"value": 2, "color": "#55da95", "highlight": "#55da95", "label": "Lasalle"}, {
                "value": 2,
                "color": "#4bf000",
                "highlight": "#4bf000",
                "label": "S\u00e3o Gabriel"
            }, {"value": 2, "color": "#aa6f14", "highlight": "#aa6f14", "label": "Rio Maina"}, {
                "value": 2,
                "color": "#c7a545",
                "highlight": "#c7a545",
                "label": "Lontras"
            }, {"value": 2, "color": "#b649cf", "highlight": "#b649cf", "label": "Frankfurt am Main"}, {
                "value": 2,
                "color": "#56248b",
                "highlight": "#56248b",
                "label": "Peoria"
            }, {"value": 2, "color": "#9329bd", "highlight": "#9329bd", "label": "Green Bay"}, {
                "value": 2,
                "color": "#4c8e27",
                "highlight": "#4c8e27",
                "label": "Basildon"
            }, {"value": 2, "color": "#6e95a5", "highlight": "#6e95a5", "label": "Nova Veneza"}, {
                "value": 2,
                "color": "#4548f1",
                "highlight": "#4548f1",
                "label": "Hamburg"
            }, {"value": 2, "color": "#f4bbd2", "highlight": "#f4bbd2", "label": "Simoes"}, {
                "value": 2,
                "color": "#4d4c25",
                "highlight": "#4d4c25",
                "label": "Groningen"
            }, {"value": 2, "color": "#5e44e2", "highlight": "#5e44e2", "label": "Formiga"}, {
                "value": 2,
                "color": "#b9d56d",
                "highlight": "#b9d56d",
                "label": "Saudades"
            }, {"value": 2, "color": "#32e8d6", "highlight": "#32e8d6", "label": "Dumont"}, {
                "value": 2,
                "color": "#838974",
                "highlight": "#838974",
                "label": "Canoinhas"
            }, {
                "value": 2,
                "color": "#f3335e",
                "highlight": "#f3335e",
                "label": "Sant Cugat del Vall\u00e8s"
            }, {"value": 2, "color": "#333c11", "highlight": "#333c11", "label": "Tepic"}, {
                "value": 2,
                "color": "#300998",
                "highlight": "#300998",
                "label": "Panuco"
            }, {
                "value": 2,
                "color": "#9df83d",
                "highlight": "#9df83d",
                "label": "Colonia Madero (Madero)"
            }, {"value": 2, "color": "#472b92", "highlight": "#472b92", "label": "Uniao dos Palmares"}, {
                "value": 2,
                "color": "#32731b",
                "highlight": "#32731b",
                "label": "Itanhaem"
            }, {"value": 2, "color": "#f51011", "highlight": "#f51011", "label": "Congonhas"}, {
                "value": 2,
                "color": "#123fab",
                "highlight": "#123fab",
                "label": "Osvaldo Cruz"
            }, {"value": 2, "color": "#16e2d7", "highlight": "#16e2d7", "label": "Condado"}, {
                "value": 2,
                "color": "#8ea309",
                "highlight": "#8ea309",
                "label": "Abaet\u00e9"
            }, {"value": 2, "color": "#ddae7e", "highlight": "#ddae7e", "label": "Tampa"}, {
                "value": 2,
                "color": "#bd913f",
                "highlight": "#bd913f",
                "label": "Villa Alemana"
            }, {"value": 2, "color": "#a5bf50", "highlight": "#a5bf50", "label": "Amambai"}, {
                "value": 2,
                "color": "#9167b1",
                "highlight": "#9167b1",
                "label": "Airport West"
            }, {"value": 2, "color": "#8213cf", "highlight": "#8213cf", "label": "Aracati"}, {
                "value": 2,
                "color": "#c63039",
                "highlight": "#c63039",
                "label": "Cesario Lange"
            }, {"value": 2, "color": "#ecee8d", "highlight": "#ecee8d", "label": "Pacatuba"}, {
                "value": 2,
                "color": "#2abd21",
                "highlight": "#2abd21",
                "label": "Villa de Cura"
            }, {"value": 2, "color": "#ca49b2", "highlight": "#ca49b2", "label": "Pacaembu"}, {
                "value": 2,
                "color": "#873a6b",
                "highlight": "#873a6b",
                "label": "Andira"
            }, {"value": 2, "color": "#cb28f9", "highlight": "#cb28f9", "label": "Barra da Tijuca"}, {
                "value": 2,
                "color": "#db2991",
                "highlight": "#db2991",
                "label": "Corup\u00e1"
            }, {"value": 2, "color": "#7b5312", "highlight": "#7b5312", "label": "Gresham"}, {
                "value": 2,
                "color": "#c56ce8",
                "highlight": "#c56ce8",
                "label": "Bandeirantes"
            }, {"value": 2, "color": "#39d128", "highlight": "#39d128", "label": "Coracao de Maria"}, {
                "value": 2,
                "color": "#7b5c22",
                "highlight": "#7b5c22",
                "label": "Dusseldorf"
            }, {"value": 2, "color": "#fe7622", "highlight": "#fe7622", "label": "Ciudad Hidalgo"}, {
                "value": 2,
                "color": "#c754c1",
                "highlight": "#c754c1",
                "label": "Bady Bassitt"
            }, {"value": 2, "color": "#8576ec", "highlight": "#8576ec", "label": "Legnica"}, {
                "value": 2,
                "color": "#d0aa77",
                "highlight": "#d0aa77",
                "label": "Encruzilhada do Sul"
            }, {"value": 2, "color": "#cf2dfc", "highlight": "#cf2dfc", "label": "Rayyan"}, {
                "value": 2,
                "color": "#cb9c96",
                "highlight": "#cb9c96",
                "label": "Preston"
            }, {"value": 2, "color": "#62efa5", "highlight": "#62efa5", "label": "Magalhaes"}, {
                "value": 2,
                "color": "#fa447b",
                "highlight": "#fa447b",
                "label": "Canela"
            }, {"value": 2, "color": "#6661ef", "highlight": "#6661ef", "label": "Quer\u00e9taro City"}, {
                "value": 2,
                "color": "#5210ab",
                "highlight": "#5210ab",
                "label": "Neuqu\u00e9n"
            }, {"value": 2, "color": "#a7f194", "highlight": "#a7f194", "label": "Corrientes"}, {
                "value": 2,
                "color": "#7c743f",
                "highlight": "#7c743f",
                "label": "Umbauba"
            }, {"value": 2, "color": "#2b917a", "highlight": "#2b917a", "label": "Alto de Los Godos"}, {
                "value": 2,
                "color": "#88ac1d",
                "highlight": "#88ac1d",
                "label": "Marble Falls"
            }, {"value": 2, "color": "#ae983d", "highlight": "#ae983d", "label": "Ciudad De Dios"}, {
                "value": 2,
                "color": "#1257c4",
                "highlight": "#1257c4",
                "label": "Linares"
            }, {"value": 2, "color": "#1c756b", "highlight": "#1c756b", "label": "Ascurra"}, {
                "value": 2,
                "color": "#229eaf",
                "highlight": "#229eaf",
                "label": "Piracaia"
            }, {"value": 2, "color": "#72396e", "highlight": "#72396e", "label": "Carlton North"}, {
                "value": 2,
                "color": "#bef843",
                "highlight": "#bef843",
                "label": "Saint-laurent"
            }, {"value": 2, "color": "#9331fb", "highlight": "#9331fb", "label": "Santa Catarina"}, {
                "value": 2,
                "color": "#2871a5",
                "highlight": "#2871a5",
                "label": "Hermosillo"
            }, {"value": 2, "color": "#2233c4", "highlight": "#2233c4", "label": "Garner"}, {
                "value": 2,
                "color": "#933feb",
                "highlight": "#933feb",
                "label": "Arcoverde"
            }, {"value": 2, "color": "#6531e6", "highlight": "#6531e6", "label": "Puebla City"}, {
                "value": 2,
                "color": "#b8b597",
                "highlight": "#b8b597",
                "label": "Cachoeira Do Sul"
            }, {"value": 2, "color": "#decf98", "highlight": "#decf98", "label": "Toledo"}, {
                "value": 2,
                "color": "#a277ba",
                "highlight": "#a277ba",
                "label": "Mirandopolis"
            }, {"value": 2, "color": "#d23282", "highlight": "#d23282", "label": "Littleton"}, {
                "value": 2,
                "color": "#902caf",
                "highlight": "#902caf",
                "label": "Mandurah"
            }, {"value": 2, "color": "#fbc909", "highlight": "#fbc909", "label": "Fort Smith"}, {
                "value": 2,
                "color": "#7e2248",
                "highlight": "#7e2248",
                "label": "Hyattsville"
            }, {
                "value": 2,
                "color": "#7ed7d5",
                "highlight": "#7ed7d5",
                "label": "San Antonio de Los Altos"
            }, {"value": 2, "color": "#529f58", "highlight": "#529f58", "label": "Jaguaruna"}, {
                "value": 2,
                "color": "#df7477",
                "highlight": "#df7477",
                "label": "Morrinhos"
            }, {"value": 2, "color": "#787224", "highlight": "#787224", "label": "Igaracu do Tiete"}, {
                "value": 2,
                "color": "#382ad0",
                "highlight": "#382ad0",
                "label": "Hampton"
            }, {"value": 2, "color": "#86c082", "highlight": "#86c082", "label": "Carmopolis"}, {
                "value": 2,
                "color": "#7e4230",
                "highlight": "#7e4230",
                "label": "Stoney Creek"
            }, {"value": 2, "color": "#7d830e", "highlight": "#7d830e", "label": "Abu Dhabi"}, {
                "value": 2,
                "color": "#c7e69a",
                "highlight": "#c7e69a",
                "label": "Rafael Fernandes"
            }, {"value": 2, "color": "#423d8a", "highlight": "#423d8a", "label": "Bandar Seri Begawan"}, {
                "value": 2,
                "color": "#66f291",
                "highlight": "#66f291",
                "label": "Santa Cruz de Tenerife"
            }, {"value": 2, "color": "#b4cd61", "highlight": "#b4cd61", "label": "Tybo"}, {
                "value": 2,
                "color": "#afbc36",
                "highlight": "#afbc36",
                "label": "San Isidro"
            }, {"value": 2, "color": "#55a12d", "highlight": "#55a12d", "label": "Tempe"}, {
                "value": 2,
                "color": "#e55bf4",
                "highlight": "#e55bf4",
                "label": "Tlaquepaque"
            }, {"value": 2, "color": "#f9cacf", "highlight": "#f9cacf", "label": "Erere"}, {
                "value": 2,
                "color": "#646ce2",
                "highlight": "#646ce2",
                "label": "Cerquilho"
            }, {"value": 2, "color": "#2e30d1", "highlight": "#2e30d1", "label": "Guarapuava"}, {
                "value": 2,
                "color": "#73ddb0",
                "highlight": "#73ddb0",
                "label": "Ilhabela"
            }, {"value": 2, "color": "#a447e5", "highlight": "#a447e5", "label": "Guacara"}, {
                "value": 2,
                "color": "#1295c4",
                "highlight": "#1295c4",
                "label": "Santa Isabel"
            }, {"value": 2, "color": "#1e7091", "highlight": "#1e7091", "label": "Coelho"}, {
                "value": 2,
                "color": "#7ae8da",
                "highlight": "#7ae8da",
                "label": "Laranjeiras do Sul"
            }, {"value": 2, "color": "#372716", "highlight": "#372716", "label": "San Jos\u00e9 del Cabo"}, {
                "value": 2,
                "color": "#b64974",
                "highlight": "#b64974",
                "label": "Sousa"
            }, {"value": 2, "color": "#5af9f9", "highlight": "#5af9f9", "label": "Sao Francisco do Sul"}, {
                "value": 2,
                "color": "#3f3bce",
                "highlight": "#3f3bce",
                "label": "Rio Pardo"
            }, {"value": 2, "color": "#561bcc", "highlight": "#561bcc", "label": "Bastos"}, {
                "value": 2,
                "color": "#4e5f2a",
                "highlight": "#4e5f2a",
                "label": "Calama"
            }, {"value": 2, "color": "#71f65a", "highlight": "#71f65a", "label": "Alegres"}, {
                "value": 2,
                "color": "#816e4f",
                "highlight": "#816e4f",
                "label": "Ruy Barbosa"
            }, {"value": 2, "color": "#26124a", "highlight": "#26124a", "label": "Varnamo"}, {
                "value": 2,
                "color": "#1bf71b",
                "highlight": "#1bf71b",
                "label": "Morelia"
            }, {"value": 2, "color": "#779ea3", "highlight": "#779ea3", "label": "Greeley"}, {
                "value": 2,
                "color": "#49b0d2",
                "highlight": "#49b0d2",
                "label": "Potim"
            }, {"value": 2, "color": "#b0fc27", "highlight": "#b0fc27", "label": "Corumb\u00e1"}, {
                "value": 2,
                "color": "#bd8355",
                "highlight": "#bd8355",
                "label": "Talca"
            }, {"value": 2, "color": "#14c0fc", "highlight": "#14c0fc", "label": "Edmonton"}, {
                "value": 2,
                "color": "#9b520b",
                "highlight": "#9b520b",
                "label": "Jaragua"
            }, {"value": 2, "color": "#453a61", "highlight": "#453a61", "label": "Silver Spring"}, {
                "value": 2,
                "color": "#1eedd8",
                "highlight": "#1eedd8",
                "label": "Itapeva"
            }, {"value": 2, "color": "#ab11f9", "highlight": "#ab11f9", "label": "Lajedo"}, {
                "value": 2,
                "color": "#9d72f3",
                "highlight": "#9d72f3",
                "label": "Miguel Pereira"
            }, {"value": 2, "color": "#405b37", "highlight": "#405b37", "label": "Eusebio"}, {
                "value": 2,
                "color": "#690f13",
                "highlight": "#690f13",
                "label": "Nao Me Toque"
            }, {"value": 2, "color": "#36faaa", "highlight": "#36faaa", "label": "Mariana"}, {
                "value": 2,
                "color": "#c2a01a",
                "highlight": "#c2a01a",
                "label": "Ciudad Obreg\u00f3n"
            }, {
                "value": 2,
                "color": "#cb2cf6",
                "highlight": "#cb2cf6",
                "label": "La Rivera de Tampico Alto"
            }, {"value": 2, "color": "#103a48", "highlight": "#103a48", "label": "Bachaquero"}, {
                "value": 2,
                "color": "#eba9f2",
                "highlight": "#eba9f2",
                "label": "Mocajuba"
            }, {"value": 2, "color": "#3bb4de", "highlight": "#3bb4de", "label": "Ibitiuva"}, {
                "value": 2,
                "color": "#9ade34",
                "highlight": "#9ade34",
                "label": "Uruapan"
            }, {"value": 2, "color": "#b28710", "highlight": "#b28710", "label": "Jardim"}, {
                "value": 2,
                "color": "#4169d5",
                "highlight": "#4169d5",
                "label": "Southport"
            }, {"value": 2, "color": "#74dca7", "highlight": "#74dca7", "label": "Campeche"}, {
                "value": 2,
                "color": "#eb7dae",
                "highlight": "#eb7dae",
                "label": "Maiquetia"
            }, {"value": 2, "color": "#dde9d2", "highlight": "#dde9d2", "label": "Cairo"}, {
                "value": 2,
                "color": "#1886a5",
                "highlight": "#1886a5",
                "label": "Piedade"
            }, {"value": 2, "color": "#ac3cfe", "highlight": "#ac3cfe", "label": "Barra Velha"}, {
                "value": 2,
                "color": "#129b29",
                "highlight": "#129b29",
                "label": "Montividiu"
            }, {"value": 2, "color": "#cfe6a7", "highlight": "#cfe6a7", "label": "Acarape"}, {
                "value": 2,
                "color": "#291e25",
                "highlight": "#291e25",
                "label": "Marechal Floriano"
            }, {"value": 2, "color": "#154a3d", "highlight": "#154a3d", "label": "Iguaba Grande"}, {
                "value": 2,
                "color": "#b47f0d",
                "highlight": "#b47f0d",
                "label": "Vilar"
            }, {"value": 2, "color": "#8d6c59", "highlight": "#8d6c59", "label": "Vicente Lopez"}, {
                "value": 2,
                "color": "#529699",
                "highlight": "#529699",
                "label": "Deerfield Beach"
            }, {"value": 2, "color": "#b7d22f", "highlight": "#b7d22f", "label": "Alcorc\u00f3n"}, {
                "value": 2,
                "color": "#dca960",
                "highlight": "#dca960",
                "label": "Marac\u00e1s"
            }, {"value": 2, "color": "#624be9", "highlight": "#624be9", "label": "Boa Esperanca"}, {
                "value": 2,
                "color": "#319005",
                "highlight": "#319005",
                "label": "Helsinki"
            }, {"value": 2, "color": "#c72281", "highlight": "#c72281", "label": "Surubim"}, {
                "value": 2,
                "color": "#c23c3e",
                "highlight": "#c23c3e",
                "label": "Cabo San Lucas"
            }, {"value": 2, "color": "#4fa96f", "highlight": "#4fa96f", "label": "Candeias"}, {
                "value": 2,
                "color": "#443e93",
                "highlight": "#443e93",
                "label": "Catigua"
            }, {"value": 2, "color": "#ad749e", "highlight": "#ad749e", "label": "Vidigal"}, {
                "value": 2,
                "color": "#5c5fa3",
                "highlight": "#5c5fa3",
                "label": "Porto"
            }, {"value": 2, "color": "#b3f3f2", "highlight": "#b3f3f2", "label": "Helsingborg"}, {
                "value": 2,
                "color": "#8d1010",
                "highlight": "#8d1010",
                "label": "Pompeia"
            }, {"value": 2, "color": "#391c10", "highlight": "#391c10", "label": "Arlington"}, {
                "value": 2,
                "color": "#89644f",
                "highlight": "#89644f",
                "label": "Santo Cristo"
            }, {"value": 2, "color": "#8de0c3", "highlight": "#8de0c3", "label": "Antonio Prado"}, {
                "value": 2,
                "color": "#5ee914",
                "highlight": "#5ee914",
                "label": "Monte Mor"
            }, {"value": 2, "color": "#529eb2", "highlight": "#529eb2", "label": "Sao Goncalo do Sapucai"}, {
                "value": 2,
                "color": "#f1d707",
                "highlight": "#f1d707",
                "label": "Vernon"
            }, {"value": 2, "color": "#82a116", "highlight": "#82a116", "label": "Serra do Salitre"}, {
                "value": 2,
                "color": "#107dfc",
                "highlight": "#107dfc",
                "label": "Ciudad Madero"
            }, {"value": 2, "color": "#5557ab", "highlight": "#5557ab", "label": "Girua"}, {
                "value": 2,
                "color": "#ad0996",
                "highlight": "#ad0996",
                "label": "Belo Jardim"
            }, {"value": 2, "color": "#af9043", "highlight": "#af9043", "label": "Ne\u00f3polis"}, {
                "value": 2,
                "color": "#f600dc",
                "highlight": "#f600dc",
                "label": "Manassas"
            }, {"value": 2, "color": "#828d8d", "highlight": "#828d8d", "label": "Loures"}, {
                "value": 2,
                "color": "#a0c119",
                "highlight": "#a0c119",
                "label": "Oslo"
            }, {"value": 2, "color": "#f8bb1d", "highlight": "#f8bb1d", "label": "Lucas"}, {
                "value": 2,
                "color": "#155a81",
                "highlight": "#155a81",
                "label": "Piraquara"
            }, {"value": 2, "color": "#599bac", "highlight": "#599bac", "label": "Garza Garcia"}, {
                "value": 2,
                "color": "#d2b98e",
                "highlight": "#d2b98e",
                "label": "Guaxupe"
            }, {"value": 2, "color": "#a7e2bf", "highlight": "#a7e2bf", "label": "Pirai"}, {
                "value": 2,
                "color": "#655dc7",
                "highlight": "#655dc7",
                "label": "Marietta"
            }, {"value": 2, "color": "#bc53cf", "highlight": "#bc53cf", "label": "Krakow"}, {
                "value": 2,
                "color": "#17d6b9",
                "highlight": "#17d6b9",
                "label": "Ejido Jacume"
            }, {"value": 2, "color": "#babd03", "highlight": "#babd03", "label": "Taquarituba"}, {
                "value": 2,
                "color": "#f3d50c",
                "highlight": "#f3d50c",
                "label": "Chicago"
            }, {"value": 2, "color": "#2784c5", "highlight": "#2784c5", "label": "Quintana"}, {
                "value": 2,
                "color": "#8a58dc",
                "highlight": "#8a58dc",
                "label": "Absecon"
            }, {"value": 2, "color": "#45bb5f", "highlight": "#45bb5f", "label": "S\u00e3o Louren\u00e7o"}, {
                "value": 2,
                "color": "#cddfbf",
                "highlight": "#cddfbf",
                "label": "Forquilhinha"
            }, {"value": 2, "color": "#29867c", "highlight": "#29867c", "label": "Mexico"}, {
                "value": 2,
                "color": "#d3b01c",
                "highlight": "#d3b01c",
                "label": "Pau Dos Ferros"
            }, {"value": 2, "color": "#143a72", "highlight": "#143a72", "label": "Baulkham Hills"}, {
                "value": 2,
                "color": "#3710ae",
                "highlight": "#3710ae",
                "label": "San Nicol\u00e1s de los Garza"
            }, {"value": 2, "color": "#8df73c", "highlight": "#8df73c", "label": "Tenente Portela"}, {
                "value": 2,
                "color": "#1b0194",
                "highlight": "#1b0194",
                "label": "Palotina"
            }, {"value": 2, "color": "#55c28a", "highlight": "#55c28a", "label": "Cabi\u00fanas"}, {
                "value": 2,
                "color": "#2f8c08",
                "highlight": "#2f8c08",
                "label": "Cambridge"
            }, {"value": 2, "color": "#a5e70a", "highlight": "#a5e70a", "label": "Penedo"}, {
                "value": 2,
                "color": "#85068a",
                "highlight": "#85068a",
                "label": "Capao Bonito"
            }, {"value": 2, "color": "#beedc7", "highlight": "#beedc7", "label": "Buique"}, {
                "value": 2,
                "color": "#e1922c",
                "highlight": "#e1922c",
                "label": "Sukabumi"
            }, {"value": 2, "color": "#76482c", "highlight": "#76482c", "label": "Valle de La Pascua"}, {
                "value": 2,
                "color": "#45ff45",
                "highlight": "#45ff45",
                "label": "Timon"
            }, {"value": 2, "color": "#d45196", "highlight": "#d45196", "label": "Colina"}, {
                "value": 2,
                "color": "#7edb44",
                "highlight": "#7edb44",
                "label": "Chillan"
            }, {"value": 2, "color": "#aa2489", "highlight": "#aa2489", "label": "Irapuru"}, {
                "value": 2,
                "color": "#bbd17f",
                "highlight": "#bbd17f",
                "label": "General Lagos"
            }, {"value": 2, "color": "#a19e58", "highlight": "#a19e58", "label": "Jaru"}, {
                "value": 2,
                "color": "#f9e245",
                "highlight": "#f9e245",
                "label": "Troy"
            }, {"value": 2, "color": "#d1dd62", "highlight": "#d1dd62", "label": "Olho d'Agua das Flores"}, {
                "value": 2,
                "color": "#950bc7",
                "highlight": "#950bc7",
                "label": "Portao"
            }, {"value": 2, "color": "#c00aca", "highlight": "#c00aca", "label": "Registro"}, {
                "value": 2,
                "color": "#b5d893",
                "highlight": "#b5d893",
                "label": "Aztlan"
            }, {"value": 2, "color": "#5f0d20", "highlight": "#5f0d20", "label": "Bowie"}, {
                "value": 2,
                "color": "#7e67f4",
                "highlight": "#7e67f4",
                "label": "Duas Barras"
            }, {"value": 2, "color": "#2e7bd6", "highlight": "#2e7bd6", "label": "Ipojuca"}, {
                "value": 2,
                "color": "#346bc5",
                "highlight": "#346bc5",
                "label": "Dubai"
            }, {"value": 2, "color": "#231dab", "highlight": "#231dab", "label": "Coronel Vivida"}, {
                "value": 2,
                "color": "#1ff260",
                "highlight": "#1ff260",
                "label": "Aguai"
            }, {"value": 2, "color": "#22d7a7", "highlight": "#22d7a7", "label": "Ibicarai"}, {
                "value": 2,
                "color": "#3b3c59",
                "highlight": "#3b3c59",
                "label": "Brick Township"
            }, {"value": 2, "color": "#5e78eb", "highlight": "#5e78eb", "label": "Indianapolis"}, {
                "value": 2,
                "color": "#d5b637",
                "highlight": "#d5b637",
                "label": "Jardim Nova Europa"
            }, {"value": 2, "color": "#7c6606", "highlight": "#7c6606", "label": "Itarantim"}, {
                "value": 2,
                "color": "#dafb9d",
                "highlight": "#dafb9d",
                "label": "Planaltina"
            }, {"value": 2, "color": "#a951dc", "highlight": "#a951dc", "label": "Ponta Pora"}, {
                "value": 2,
                "color": "#a934db",
                "highlight": "#a934db",
                "label": "Marialva"
            }, {"value": 1, "color": "#441157", "highlight": "#441157", "label": "Casula"}, {
                "value": 1,
                "color": "#ba23f6",
                "highlight": "#ba23f6",
                "label": "Fair Oaks"
            }, {"value": 1, "color": "#f8938d", "highlight": "#f8938d", "label": "Braco do Norte"}, {
                "value": 1,
                "color": "#936507",
                "highlight": "#936507",
                "label": "Ames"
            }, {"value": 1, "color": "#604c41", "highlight": "#604c41", "label": "Arteaga"}, {
                "value": 1,
                "color": "#12acd6",
                "highlight": "#12acd6",
                "label": "Cosamaloapan de Carpio"
            }, {"value": 1, "color": "#6c2ced", "highlight": "#6c2ced", "label": "Sobik\u00f3w"}, {
                "value": 1,
                "color": "#2ab1f8",
                "highlight": "#2ab1f8",
                "label": "Puerto Ordaz and San Felix"
            }, {"value": 1, "color": "#c1fe95", "highlight": "#c1fe95", "label": "Mar del Plata"}, {
                "value": 1,
                "color": "#b97f3b",
                "highlight": "#b97f3b",
                "label": "Rybnik"
            }, {"value": 1, "color": "#f12e40", "highlight": "#f12e40", "label": "Eugene"}, {
                "value": 1,
                "color": "#b41108",
                "highlight": "#b41108",
                "label": "Anitapolis"
            }, {"value": 1, "color": "#a3347e", "highlight": "#a3347e", "label": "Wembley"}, {
                "value": 1,
                "color": "#7a5b1d",
                "highlight": "#7a5b1d",
                "label": "Rafael Calzada"
            }, {"value": 1, "color": "#a0e6ca", "highlight": "#a0e6ca", "label": "Paraiba do Sul"}, {
                "value": 1,
                "color": "#f3107c",
                "highlight": "#f3107c",
                "label": "Norcross"
            }, {"value": 1, "color": "#f8b4fb", "highlight": "#f8b4fb", "label": "Hamilton"}, {
                "value": 1,
                "color": "#e79c88",
                "highlight": "#e79c88",
                "label": "Edens Landing"
            }, {"value": 1, "color": "#6e0dc5", "highlight": "#6e0dc5", "label": "Vassalboro"}, {
                "value": 1,
                "color": "#4db7ac",
                "highlight": "#4db7ac",
                "label": "Sztutowo"
            }, {"value": 1, "color": "#b28f21", "highlight": "#b28f21", "label": "Las Piedras"}, {
                "value": 1,
                "color": "#7834d0",
                "highlight": "#7834d0",
                "label": "Rochedo de Minas"
            }, {"value": 1, "color": "#34316b", "highlight": "#34316b", "label": "Batangas"}, {
                "value": 1,
                "color": "#fb31e2",
                "highlight": "#fb31e2",
                "label": "Tiradentes"
            }, {"value": 1, "color": "#d08d85", "highlight": "#d08d85", "label": "Nuevo Laredo"}, {
                "value": 1,
                "color": "#fc0f2c",
                "highlight": "#fc0f2c",
                "label": "Heredia"
            }, {"value": 1, "color": "#4ad650", "highlight": "#4ad650", "label": "Travess\u00e3o"}, {
                "value": 1,
                "color": "#28bb5d",
                "highlight": "#28bb5d",
                "label": "Utuado"
            }, {"value": 1, "color": "#9158ad", "highlight": "#9158ad", "label": "South Burlington"}, {
                "value": 1,
                "color": "#c46ed3",
                "highlight": "#c46ed3",
                "label": "Carson City"
            }, {"value": 1, "color": "#8a51f3", "highlight": "#8a51f3", "label": "Guaranta"}, {
                "value": 1,
                "color": "#4dc7a6",
                "highlight": "#4dc7a6",
                "label": "San Antonio"
            }, {"value": 1, "color": "#76e837", "highlight": "#76e837", "label": "S\u00f6dert\u00e4lje"}, {
                "value": 1,
                "color": "#1bece7",
                "highlight": "#1bece7",
                "label": "Phillipsburg"
            }, {"value": 1, "color": "#698c11", "highlight": "#698c11", "label": "Teodoro Sampaio"}, {
                "value": 1,
                "color": "#cbbcd4",
                "highlight": "#cbbcd4",
                "label": "Bacax\u00e1"
            }, {"value": 1, "color": "#763a6a", "highlight": "#763a6a", "label": "Pedra Bonita"}, {
                "value": 1,
                "color": "#c0fbbe",
                "highlight": "#c0fbbe",
                "label": "Urbandale"
            }, {"value": 1, "color": "#c03b2a", "highlight": "#c03b2a", "label": "Tijuca"}, {
                "value": 1,
                "color": "#202911",
                "highlight": "#202911",
                "label": "Lenore"
            }, {"value": 1, "color": "#c73842", "highlight": "#c73842", "label": "Maracaju"}, {
                "value": 1,
                "color": "#56bce4",
                "highlight": "#56bce4",
                "label": "Coroados"
            }, {"value": 1, "color": "#70f43c", "highlight": "#70f43c", "label": "Sao Pedro"}, {
                "value": 1,
                "color": "#2ed144",
                "highlight": "#2ed144",
                "label": "Kedron"
            }, {"value": 1, "color": "#64e8fc", "highlight": "#64e8fc", "label": "Vincennes"}, {
                "value": 1,
                "color": "#931934",
                "highlight": "#931934",
                "label": "Lynwood"
            }, {"value": 1, "color": "#1d4a79", "highlight": "#1d4a79", "label": "Passos"}, {
                "value": 1,
                "color": "#a0361c",
                "highlight": "#a0361c",
                "label": "Constitution Hill"
            }, {"value": 1, "color": "#4b4b64", "highlight": "#4b4b64", "label": "Bastad"}, {
                "value": 1,
                "color": "#a80d79",
                "highlight": "#a80d79",
                "label": "Limoeiro do Norte"
            }, {"value": 1, "color": "#40c6e6", "highlight": "#40c6e6", "label": "Bornem"}, {
                "value": 1,
                "color": "#3f47dc",
                "highlight": "#3f47dc",
                "label": "Danbury"
            }, {"value": 1, "color": "#994a76", "highlight": "#994a76", "label": "Ciudad Ojeda"}, {
                "value": 1,
                "color": "#a5f763",
                "highlight": "#a5f763",
                "label": "Envigado"
            }, {"value": 1, "color": "#7be797", "highlight": "#7be797", "label": "Cavite City"}, {
                "value": 1,
                "color": "#219a47",
                "highlight": "#219a47",
                "label": "Morcillo"
            }, {"value": 1, "color": "#a24c79", "highlight": "#a24c79", "label": "Niewodnica Korycka"}, {
                "value": 1,
                "color": "#c99e0f",
                "highlight": "#c99e0f",
                "label": "Kawasaki"
            }, {"value": 1, "color": "#3e5e8c", "highlight": "#3e5e8c", "label": "Jakobstad"}, {
                "value": 1,
                "color": "#a1c0cc",
                "highlight": "#a1c0cc",
                "label": "Pedro Juan Caballero"
            }, {"value": 1, "color": "#1adaef", "highlight": "#1adaef", "label": "Homestead"}, {
                "value": 1,
                "color": "#3b8e79",
                "highlight": "#3b8e79",
                "label": "Rio Bonito"
            }, {"value": 1, "color": "#65ef13", "highlight": "#65ef13", "label": "Svaloev"}, {
                "value": 1,
                "color": "#7fa17a",
                "highlight": "#7fa17a",
                "label": "Alima"
            }, {"value": 1, "color": "#9f0cd9", "highlight": "#9f0cd9", "label": "Ouro Fino"}, {
                "value": 1,
                "color": "#948a54",
                "highlight": "#948a54",
                "label": "Jyv\u00e4skyl\u00e4"
            }, {"value": 1, "color": "#c86f47", "highlight": "#c86f47", "label": "Vilafant"}, {
                "value": 1,
                "color": "#3b280f",
                "highlight": "#3b280f",
                "label": "Sopot"
            }, {"value": 1, "color": "#f96466", "highlight": "#f96466", "label": "Pikeville"}, {
                "value": 1,
                "color": "#a722df",
                "highlight": "#a722df",
                "label": "Brussels"
            }, {"value": 1, "color": "#b3d716", "highlight": "#b3d716", "label": "Hendrik-Ido-Ambacht"}, {
                "value": 1,
                "color": "#39d550",
                "highlight": "#39d550",
                "label": "Villahermosa"
            }, {"value": 1, "color": "#8548cc", "highlight": "#8548cc", "label": "Palo Alto"}, {
                "value": 1,
                "color": "#a43165",
                "highlight": "#a43165",
                "label": "Trombudo Central"
            }, {"value": 1, "color": "#afc545", "highlight": "#afc545", "label": "Garimpo Novo"}, {
                "value": 1,
                "color": "#51f533",
                "highlight": "#51f533",
                "label": "Vitoria do Mearim"
            }, {"value": 1, "color": "#755c20", "highlight": "#755c20", "label": "Sao Joaquim"}, {
                "value": 1,
                "color": "#522f1b",
                "highlight": "#522f1b",
                "label": "Sugar Land"
            }, {"value": 1, "color": "#8fa917", "highlight": "#8fa917", "label": "Jussara"}, {
                "value": 1,
                "color": "#7782a1",
                "highlight": "#7782a1",
                "label": "Skaerholmen"
            }, {"value": 1, "color": "#237843", "highlight": "#237843", "label": "Morgantown"}, {
                "value": 1,
                "color": "#ff5ef1",
                "highlight": "#ff5ef1",
                "label": "Ardmore"
            }, {"value": 1, "color": "#6574d9", "highlight": "#6574d9", "label": "Thornlie"}, {
                "value": 1,
                "color": "#17996d",
                "highlight": "#17996d",
                "label": "Schenectady"
            }, {"value": 1, "color": "#2b4438", "highlight": "#2b4438", "label": "Palmitinho"}, {
                "value": 1,
                "color": "#f2019f",
                "highlight": "#f2019f",
                "label": "Erebango"
            }, {"value": 1, "color": "#bc351c", "highlight": "#bc351c", "label": "Champion"}, {
                "value": 1,
                "color": "#ea438c",
                "highlight": "#ea438c",
                "label": "Geilston Bay"
            }, {"value": 1, "color": "#117ade", "highlight": "#117ade", "label": "Mucum"}, {
                "value": 1,
                "color": "#af601a",
                "highlight": "#af601a",
                "label": "Araujos"
            }, {"value": 1, "color": "#fe112b", "highlight": "#fe112b", "label": "Surabaya"}, {
                "value": 1,
                "color": "#f692ff",
                "highlight": "#f692ff",
                "label": "Quilitapia"
            }, {"value": 1, "color": "#97fd06", "highlight": "#97fd06", "label": "Maroubra"}, {
                "value": 1,
                "color": "#6632b1",
                "highlight": "#6632b1",
                "label": "Capelinha"
            }, {"value": 1, "color": "#b685f4", "highlight": "#b685f4", "label": "Itamaraju"}, {
                "value": 1,
                "color": "#1be310",
                "highlight": "#1be310",
                "label": "Long Branch"
            }, {"value": 1, "color": "#3ffe39", "highlight": "#3ffe39", "label": "Melipilla"}, {
                "value": 1,
                "color": "#7e6a83",
                "highlight": "#7e6a83",
                "label": "Poza Rica de Hidalgo"
            }, {"value": 1, "color": "#796746", "highlight": "#796746", "label": "Garopaba"}, {
                "value": 1,
                "color": "#48a4c5",
                "highlight": "#48a4c5",
                "label": "Barrie"
            }, {"value": 1, "color": "#324d53", "highlight": "#324d53", "label": "Roldan"}, {
                "value": 1,
                "color": "#64b886",
                "highlight": "#64b886",
                "label": "Cerro Branco"
            }, {"value": 1, "color": "#3f126b", "highlight": "#3f126b", "label": "Whangarei"}, {
                "value": 1,
                "color": "#fed4e2",
                "highlight": "#fed4e2",
                "label": "Meshoppen"
            }, {"value": 1, "color": "#94a1f6", "highlight": "#94a1f6", "label": "Banzae"}, {
                "value": 1,
                "color": "#bdb0e6",
                "highlight": "#bdb0e6",
                "label": "Guanambi"
            }, {"value": 1, "color": "#4c7d71", "highlight": "#4c7d71", "label": "Jangada"}, {
                "value": 1,
                "color": "#8dcaef",
                "highlight": "#8dcaef",
                "label": "Santa Fe"
            }, {"value": 1, "color": "#2d4935", "highlight": "#2d4935", "label": "Amersfoort"}, {
                "value": 1,
                "color": "#cb5fbb",
                "highlight": "#cb5fbb",
                "label": "Quezon City"
            }, {"value": 1, "color": "#38eec2", "highlight": "#38eec2", "label": "Rio Azul"}, {
                "value": 1,
                "color": "#6d26b4",
                "highlight": "#6d26b4",
                "label": "Pacoima"
            }, {"value": 1, "color": "#63f7d7", "highlight": "#63f7d7", "label": "Florida"}, {
                "value": 1,
                "color": "#dc2a1c",
                "highlight": "#dc2a1c",
                "label": "Frutal"
            }, {"value": 1, "color": "#61157a", "highlight": "#61157a", "label": "Mirandiba"}, {
                "value": 1,
                "color": "#47c2ed",
                "highlight": "#47c2ed",
                "label": "Piotrk\u00f3w Trybunalski"
            }, {"value": 1, "color": "#4cde3d", "highlight": "#4cde3d", "label": "Pesqueira"}, {
                "value": 1,
                "color": "#c25274",
                "highlight": "#c25274",
                "label": "Barreiras"
            }, {"value": 1, "color": "#fc19f7", "highlight": "#fc19f7", "label": "Greenfields"}, {
                "value": 1,
                "color": "#ebb78a",
                "highlight": "#ebb78a",
                "label": "Papar"
            }, {"value": 1, "color": "#6cf746", "highlight": "#6cf746", "label": "Urussanga"}, {
                "value": 1,
                "color": "#42839f",
                "highlight": "#42839f",
                "label": "Commerce"
            }, {"value": 1, "color": "#f05e02", "highlight": "#f05e02", "label": "Villiers-sur-Orge"}, {
                "value": 1,
                "color": "#dd981c",
                "highlight": "#dd981c",
                "label": "Henderson"
            }, {"value": 1, "color": "#de5d45", "highlight": "#de5d45", "label": "Vallentuna"}, {
                "value": 1,
                "color": "#f5f6d8",
                "highlight": "#f5f6d8",
                "label": "Aperib\u00e9"
            }, {"value": 1, "color": "#88e0ff", "highlight": "#88e0ff", "label": "Cascais"}, {
                "value": 1,
                "color": "#dd0689",
                "highlight": "#dd0689",
                "label": "South Windham"
            }, {"value": 1, "color": "#d4c433", "highlight": "#d4c433", "label": "Batalha"}, {
                "value": 1,
                "color": "#62cf1d",
                "highlight": "#62cf1d",
                "label": "Whitby"
            }, {"value": 1, "color": "#b446f2", "highlight": "#b446f2", "label": "Emerton"}, {
                "value": 1,
                "color": "#d0ecb9",
                "highlight": "#d0ecb9",
                "label": "Itarare"
            }, {"value": 1, "color": "#8367c4", "highlight": "#8367c4", "label": "Careacu"}, {
                "value": 1,
                "color": "#bb065b",
                "highlight": "#bb065b",
                "label": "Mamanguape"
            }, {"value": 1, "color": "#548f53", "highlight": "#548f53", "label": "Duartina"}, {
                "value": 1,
                "color": "#bb347f",
                "highlight": "#bb347f",
                "label": "Ashcamp"
            }, {"value": 1, "color": "#5f4d98", "highlight": "#5f4d98", "label": "Alc\u00fadia"}, {
                "value": 1,
                "color": "#5fc2cb",
                "highlight": "#5fc2cb",
                "label": "Itaum"
            }, {"value": 1, "color": "#f582eb", "highlight": "#f582eb", "label": "Pombos"}, {
                "value": 1,
                "color": "#4f5c93",
                "highlight": "#4f5c93",
                "label": "Madison"
            }, {"value": 1, "color": "#f735a8", "highlight": "#f735a8", "label": "South Benfleet"}, {
                "value": 1,
                "color": "#de024e",
                "highlight": "#de024e",
                "label": "Keilor"
            }, {"value": 1, "color": "#c8d7e3", "highlight": "#c8d7e3", "label": "Ilicinea"}, {
                "value": 1,
                "color": "#f09ab0",
                "highlight": "#f09ab0",
                "label": "Ambrosio"
            }, {"value": 1, "color": "#6bbbae", "highlight": "#6bbbae", "label": "Morro da Fumaca"}, {
                "value": 1,
                "color": "#e99030",
                "highlight": "#e99030",
                "label": "Winnipeg"
            }, {"value": 1, "color": "#35bae3", "highlight": "#35bae3", "label": "Garden Grove"}, {
                "value": 1,
                "color": "#8da181",
                "highlight": "#8da181",
                "label": "Jalpa de Mendez"
            }, {"value": 1, "color": "#ac2714", "highlight": "#ac2714", "label": "Buerarema"}, {
                "value": 1,
                "color": "#8fbb42",
                "highlight": "#8fbb42",
                "label": "Iturama"
            }, {"value": 1, "color": "#b61bbd", "highlight": "#b61bbd", "label": "Malang"}, {
                "value": 1,
                "color": "#d08a27",
                "highlight": "#d08a27",
                "label": "Wallasey"
            }, {"value": 1, "color": "#8c4ffe", "highlight": "#8c4ffe", "label": "California"}, {
                "value": 1,
                "color": "#af1b63",
                "highlight": "#af1b63",
                "label": "\u00d6rebro"
            }, {"value": 1, "color": "#7ed962", "highlight": "#7ed962", "label": "Te\u00f3filo Otoni"}, {
                "value": 1,
                "color": "#15739e",
                "highlight": "#15739e",
                "label": "Rancagua"
            }, {"value": 1, "color": "#5caf0e", "highlight": "#5caf0e", "label": "San Felipe"}, {
                "value": 1,
                "color": "#49aadb",
                "highlight": "#49aadb",
                "label": "Barra De S\u00e3o Jo\u00e3o"
            }, {"value": 1, "color": "#4e5e47", "highlight": "#4e5e47", "label": "Stretton"}, {
                "value": 1,
                "color": "#821a10",
                "highlight": "#821a10",
                "label": "Joao Ramalho"
            }, {"value": 1, "color": "#6a5f2b", "highlight": "#6a5f2b", "label": "Menlo Park"}, {
                "value": 1,
                "color": "#fd3c87",
                "highlight": "#fd3c87",
                "label": "Helena"
            }, {"value": 1, "color": "#bae783", "highlight": "#bae783", "label": "Guabiruba"}, {
                "value": 1,
                "color": "#722f68",
                "highlight": "#722f68",
                "label": "Porto Uniao"
            }, {"value": 1, "color": "#3e7963", "highlight": "#3e7963", "label": "Shrewsbury"}, {
                "value": 1,
                "color": "#3c039a",
                "highlight": "#3c039a",
                "label": "Jacksonville"
            }, {"value": 1, "color": "#d5c6b4", "highlight": "#d5c6b4", "label": "Murrieta"}, {
                "value": 1,
                "color": "#f5c795",
                "highlight": "#f5c795",
                "label": "San Juan de Col\u00f3n"
            }, {"value": 1, "color": "#4f8e53", "highlight": "#4f8e53", "label": "Nioaque"}, {
                "value": 1,
                "color": "#12ff75",
                "highlight": "#12ff75",
                "label": "Guararema"
            }, {"value": 1, "color": "#514d8c", "highlight": "#514d8c", "label": "Lauro de Freitas"}, {
                "value": 1,
                "color": "#eeaa91",
                "highlight": "#eeaa91",
                "label": "Cha Preta"
            }, {"value": 1, "color": "#71248a", "highlight": "#71248a", "label": "Bangkok"}, {
                "value": 1,
                "color": "#26a065",
                "highlight": "#26a065",
                "label": "Shelburne"
            }, {"value": 1, "color": "#ee1cf4", "highlight": "#ee1cf4", "label": "Santo"}, {
                "value": 1,
                "color": "#b8a38b",
                "highlight": "#b8a38b",
                "label": "Manzanillo"
            }, {"value": 1, "color": "#5547c1", "highlight": "#5547c1", "label": "Carmo de Minas"}, {
                "value": 1,
                "color": "#ae1aef",
                "highlight": "#ae1aef",
                "label": "Concord"
            }, {"value": 1, "color": "#e5839a", "highlight": "#e5839a", "label": "Vendelso"}, {
                "value": 1,
                "color": "#510138",
                "highlight": "#510138",
                "label": "Morro Agudo"
            }, {"value": 1, "color": "#b72c25", "highlight": "#b72c25", "label": "J\u00f6nk\u00f6ping"}, {
                "value": 1,
                "color": "#db546a",
                "highlight": "#db546a",
                "label": "Sapucaia do Sul"
            }, {"value": 1, "color": "#f2ccc8", "highlight": "#f2ccc8", "label": "Cartago"}, {
                "value": 1,
                "color": "#2c0855",
                "highlight": "#2c0855",
                "label": "Carmen de Cura"
            }, {"value": 1, "color": "#689aeb", "highlight": "#689aeb", "label": "Hilton Head Island"}, {
                "value": 1,
                "color": "#f38837",
                "highlight": "#f38837",
                "label": "Saltillo"
            }, {"value": 1, "color": "#ac2a95", "highlight": "#ac2a95", "label": "Guaratuba"}, {
                "value": 1,
                "color": "#6b3533",
                "highlight": "#6b3533",
                "label": "Carmopolis de Minas"
            }, {"value": 1, "color": "#f32355", "highlight": "#f32355", "label": "Ahome"}, {
                "value": 1,
                "color": "#8f8e24",
                "highlight": "#8f8e24",
                "label": "Bethesda"
            }, {"value": 1, "color": "#f1f2cf", "highlight": "#f1f2cf", "label": "Ashmore"}, {
                "value": 1,
                "color": "#83fc55",
                "highlight": "#83fc55",
                "label": "Ponca City"
            }, {"value": 1, "color": "#9f810b", "highlight": "#9f810b", "label": "Mandirituba"}, {
                "value": 1,
                "color": "#d1f1b5",
                "highlight": "#d1f1b5",
                "label": "Jaguaruana"
            }, {"value": 1, "color": "#52ae86", "highlight": "#52ae86", "label": "Cezarina"}, {
                "value": 1,
                "color": "#a7cfef",
                "highlight": "#a7cfef",
                "label": "Brampton"
            }, {"value": 1, "color": "#6b36fc", "highlight": "#6b36fc", "label": "Cabo"}, {
                "value": 1,
                "color": "#ad4830",
                "highlight": "#ad4830",
                "label": "Tobias Barreto"
            }, {"value": 1, "color": "#66d8ba", "highlight": "#66d8ba", "label": "Peninsula"}, {
                "value": 1,
                "color": "#53e19e",
                "highlight": "#53e19e",
                "label": "Northampton"
            }, {"value": 1, "color": "#8e06f0", "highlight": "#8e06f0", "label": "Portland"}, {
                "value": 1,
                "color": "#29754a",
                "highlight": "#29754a",
                "label": "Jaworze"
            }, {"value": 1, "color": "#a32d15", "highlight": "#a32d15", "label": "Yukon"}, {
                "value": 1,
                "color": "#3d8045",
                "highlight": "#3d8045",
                "label": "Guacui"
            }, {"value": 1, "color": "#3915f2", "highlight": "#3915f2", "label": "Skawina"}, {
                "value": 1,
                "color": "#708be1",
                "highlight": "#708be1",
                "label": "Concei\u00e7\u00e3o Das Alagoas"
            }, {"value": 1, "color": "#47c3f6", "highlight": "#47c3f6", "label": "Long Jetty"}, {
                "value": 1,
                "color": "#bf300b",
                "highlight": "#bf300b",
                "label": "Pedra Mole"
            }, {"value": 1, "color": "#db2b55", "highlight": "#db2b55", "label": "Quixeramobim"}, {
                "value": 1,
                "color": "#71dcc8",
                "highlight": "#71dcc8",
                "label": "Deodapolis"
            }, {"value": 1, "color": "#fda6d6", "highlight": "#fda6d6", "label": "Suresnes"}, {
                "value": 1,
                "color": "#e8cf99",
                "highlight": "#e8cf99",
                "label": "Mambore"
            }, {"value": 1, "color": "#ea73b5", "highlight": "#ea73b5", "label": "Quatis"}, {
                "value": 1,
                "color": "#ee5723",
                "highlight": "#ee5723",
                "label": "Mene Grande"
            }, {"value": 1, "color": "#fc37e7", "highlight": "#fc37e7", "label": "Santa Perpetua de Gaia"}, {
                "value": 1,
                "color": "#731a30",
                "highlight": "#731a30",
                "label": "Tabira"
            }, {"value": 1, "color": "#d70103", "highlight": "#d70103", "label": "Bonner"}, {
                "value": 1,
                "color": "#fc3296",
                "highlight": "#fc3296",
                "label": "Park City"
            }, {"value": 1, "color": "#8af3de", "highlight": "#8af3de", "label": "Ageo"}, {
                "value": 1,
                "color": "#62ecc2",
                "highlight": "#62ecc2",
                "label": "Antonio Carlos"
            }, {"value": 1, "color": "#c16dcc", "highlight": "#c16dcc", "label": "Coluna"}, {
                "value": 1,
                "color": "#a948f8",
                "highlight": "#a948f8",
                "label": "Grand Rapids"
            }, {"value": 1, "color": "#8e1bd6", "highlight": "#8e1bd6", "label": "Hoglunda"}, {
                "value": 1,
                "color": "#9333ed",
                "highlight": "#9333ed",
                "label": "Ferrol"
            }, {"value": 1, "color": "#de97c4", "highlight": "#de97c4", "label": "Podlasie"}, {
                "value": 1,
                "color": "#791257",
                "highlight": "#791257",
                "label": "Resistencia"
            }, {"value": 1, "color": "#4deb14", "highlight": "#4deb14", "label": "Ipitanga"}, {
                "value": 1,
                "color": "#22349a",
                "highlight": "#22349a",
                "label": "Saco"
            }, {"value": 1, "color": "#a36607", "highlight": "#a36607", "label": "Sutton Coldfield"}, {
                "value": 1,
                "color": "#5140f9",
                "highlight": "#5140f9",
                "label": "Guanare"
            }, {"value": 1, "color": "#788c2d", "highlight": "#788c2d", "label": "Rodeio"}, {
                "value": 1,
                "color": "#b74ef7",
                "highlight": "#b74ef7",
                "label": "Milan"
            }, {"value": 1, "color": "#72bd4e", "highlight": "#72bd4e", "label": "Midland"}, {
                "value": 1,
                "color": "#e74d28",
                "highlight": "#e74d28",
                "label": "Cecilia"
            }, {"value": 1, "color": "#2dbb8c", "highlight": "#2dbb8c", "label": "Powder Springs"}, {
                "value": 1,
                "color": "#ebd697",
                "highlight": "#ebd697",
                "label": "Cuautla"
            }, {"value": 1, "color": "#6d5d3e", "highlight": "#6d5d3e", "label": "Salto Grande"}, {
                "value": 1,
                "color": "#9c8c71",
                "highlight": "#9c8c71",
                "label": "Ipanema"
            }, {"value": 1, "color": "#5c1bd9", "highlight": "#5c1bd9", "label": "Mississauga"}, {
                "value": 1,
                "color": "#65e524",
                "highlight": "#65e524",
                "label": "Brumado"
            }, {"value": 1, "color": "#4bed30", "highlight": "#4bed30", "label": "Maria Da Gra\u00e7a"}, {
                "value": 1,
                "color": "#c51d79",
                "highlight": "#c51d79",
                "label": "Balancan de Dominguez"
            }, {
                "value": 1,
                "color": "#76599b",
                "highlight": "#76599b",
                "label": "Monte Alegre de Sergipe"
            }, {"value": 1, "color": "#64a206", "highlight": "#64a206", "label": "Zaragoza"}, {
                "value": 1,
                "color": "#113616",
                "highlight": "#113616",
                "label": "Mata Verde"
            }, {"value": 1, "color": "#642f97", "highlight": "#642f97", "label": "Tres Passos"}, {
                "value": 1,
                "color": "#4c5924",
                "highlight": "#4c5924",
                "label": "Tacarigua"
            }, {"value": 1, "color": "#c300f6", "highlight": "#c300f6", "label": "Presidente Olegario"}, {
                "value": 1,
                "color": "#27d010",
                "highlight": "#27d010",
                "label": "Des Plaines"
            }, {"value": 1, "color": "#e56036", "highlight": "#e56036", "label": "Cua"}, {
                "value": 1,
                "color": "#28156c",
                "highlight": "#28156c",
                "label": "Ibia"
            }, {"value": 1, "color": "#9a6e9d", "highlight": "#9a6e9d", "label": "Clifton Springs"}, {
                "value": 1,
                "color": "#231d58",
                "highlight": "#231d58",
                "label": "Agostinho Porto"
            }, {"value": 1, "color": "#462c2c", "highlight": "#462c2c", "label": "Cafarnaum"}, {
                "value": 1,
                "color": "#3e4a86",
                "highlight": "#3e4a86",
                "label": "Bunkeflostrand"
            }, {"value": 1, "color": "#a72d27", "highlight": "#a72d27", "label": "Riverhead"}, {
                "value": 1,
                "color": "#185133",
                "highlight": "#185133",
                "label": "Santos Dumont"
            }, {"value": 1, "color": "#94f183", "highlight": "#94f183", "label": "Eldorado"}, {
                "value": 1,
                "color": "#f3c46b",
                "highlight": "#f3c46b",
                "label": "Schroeder"
            }, {"value": 1, "color": "#879a82", "highlight": "#879a82", "label": "Carrollton"}, {
                "value": 1,
                "color": "#a5947e",
                "highlight": "#a5947e",
                "label": "Cologne"
            }, {"value": 1, "color": "#e48908", "highlight": "#e48908", "label": "Redbank"}, {
                "value": 1,
                "color": "#435098",
                "highlight": "#435098",
                "label": "Orillia"
            }, {"value": 1, "color": "#37fdfd", "highlight": "#37fdfd", "label": "Canc\u00fan"}, {
                "value": 1,
                "color": "#a92b2e",
                "highlight": "#a92b2e",
                "label": "Esmeraldas"
            }, {"value": 1, "color": "#db5179", "highlight": "#db5179", "label": "Vespasiano"}, {
                "value": 1,
                "color": "#a702c2",
                "highlight": "#a702c2",
                "label": "Sunnyvale"
            }, {"value": 1, "color": "#3a106b", "highlight": "#3a106b", "label": "Laurel"}, {
                "value": 1,
                "color": "#459ac1",
                "highlight": "#459ac1",
                "label": "Lazy"
            }, {"value": 1, "color": "#f12926", "highlight": "#f12926", "label": "Coolaroo"}, {
                "value": 1,
                "color": "#5b4715",
                "highlight": "#5b4715",
                "label": "Ribeirao dos Indios"
            }, {"value": 1, "color": "#32f25c", "highlight": "#32f25c", "label": "Milagres"}, {
                "value": 1,
                "color": "#6568ff",
                "highlight": "#6568ff",
                "label": "Claypole"
            }, {"value": 1, "color": "#61c9df", "highlight": "#61c9df", "label": "Ajman"}, {
                "value": 1,
                "color": "#322940",
                "highlight": "#322940",
                "label": "Beaufort"
            }, {"value": 1, "color": "#5c5750", "highlight": "#5c5750", "label": "Aguascalientes"}, {
                "value": 1,
                "color": "#e3de62",
                "highlight": "#e3de62",
                "label": "Posto Fiscal Rolim de Moura"
            }, {"value": 1, "color": "#751421", "highlight": "#751421", "label": "Glenroy"}, {
                "value": 1,
                "color": "#c28253",
                "highlight": "#c28253",
                "label": "Rinc\u00e3o"
            }, {"value": 1, "color": "#a18012", "highlight": "#a18012", "label": "Thornlands"}, {
                "value": 1,
                "color": "#f4808a",
                "highlight": "#f4808a",
                "label": "Grudzi?dz"
            }, {"value": 1, "color": "#eb3e04", "highlight": "#eb3e04", "label": "Dalton"}, {
                "value": 1,
                "color": "#bb82f3",
                "highlight": "#bb82f3",
                "label": "Corumbaiba"
            }, {"value": 1, "color": "#9fbeef", "highlight": "#9fbeef", "label": "Torrinha"}, {
                "value": 1,
                "color": "#c05e18",
                "highlight": "#c05e18",
                "label": "Potomac"
            }, {
                "value": 1,
                "color": "#c3eb63",
                "highlight": "#c3eb63",
                "label": "Ponte Alta Do Bom Jesus"
            }, {"value": 1, "color": "#e1f5b9", "highlight": "#e1f5b9", "label": "Aurora"}, {
                "value": 1,
                "color": "#132480",
                "highlight": "#132480",
                "label": "Kowloon"
            }, {"value": 1, "color": "#b9af09", "highlight": "#b9af09", "label": "Poco Redondo"}, {
                "value": 1,
                "color": "#538f09",
                "highlight": "#538f09",
                "label": "Hazleton"
            }, {"value": 1, "color": "#a5d252", "highlight": "#a5d252", "label": "Campo Formoso"}, {
                "value": 1,
                "color": "#4c9897",
                "highlight": "#4c9897",
                "label": "Ji Parana"
            }, {"value": 1, "color": "#bf50c1", "highlight": "#bf50c1", "label": "Tres Rios"}, {
                "value": 1,
                "color": "#46ced4",
                "highlight": "#46ced4",
                "label": "Katy"
            }, {"value": 1, "color": "#944c79", "highlight": "#944c79", "label": "Nova Alianca"}, {
                "value": 1,
                "color": "#442861",
                "highlight": "#442861",
                "label": "San Francisco"
            }, {"value": 1, "color": "#69fca4", "highlight": "#69fca4", "label": "Rio Negro"}, {
                "value": 1,
                "color": "#3fd3df",
                "highlight": "#3fd3df",
                "label": "Monmouth Junction"
            }, {"value": 1, "color": "#d7371e", "highlight": "#d7371e", "label": "Viradouro"}, {
                "value": 1,
                "color": "#436c67",
                "highlight": "#436c67",
                "label": "Adolfo Ruiz Cortines"
            }, {"value": 1, "color": "#82ffdf", "highlight": "#82ffdf", "label": "Boznow"}, {
                "value": 1,
                "color": "#9affe5",
                "highlight": "#9affe5",
                "label": "Esplugues de Llobregat"
            }, {"value": 1, "color": "#3c22af", "highlight": "#3c22af", "label": "Adelaide"}, {
                "value": 1,
                "color": "#e6d15b",
                "highlight": "#e6d15b",
                "label": "Goianapolis"
            }, {"value": 1, "color": "#9cebb4", "highlight": "#9cebb4", "label": "Almenara"}, {
                "value": 1,
                "color": "#d24be1",
                "highlight": "#d24be1",
                "label": "Rivervale"
            }, {"value": 1, "color": "#399db0", "highlight": "#399db0", "label": "Shizuoka"}, {
                "value": 1,
                "color": "#e070c9",
                "highlight": "#e070c9",
                "label": "Kristinehamn"
            }, {"value": 1, "color": "#3b3ff8", "highlight": "#3b3ff8", "label": "Pilar"}, {
                "value": 1,
                "color": "#30beac",
                "highlight": "#30beac",
                "label": "Rochester"
            }, {"value": 1, "color": "#1d6fef", "highlight": "#1d6fef", "label": "Kissimmee"}, {
                "value": 1,
                "color": "#ade818",
                "highlight": "#ade818",
                "label": "Troms\u00f8"
            }, {"value": 1, "color": "#f4328a", "highlight": "#f4328a", "label": "Houten"}, {
                "value": 1,
                "color": "#191d0b",
                "highlight": "#191d0b",
                "label": "Bernal"
            }, {"value": 1, "color": "#3f4235", "highlight": "#3f4235", "label": "San Diego"}, {
                "value": 1,
                "color": "#f453d8",
                "highlight": "#f453d8",
                "label": "Drammen"
            }, {"value": 1, "color": "#dd63e3", "highlight": "#dd63e3", "label": "Annandale"}, {
                "value": 1,
                "color": "#9c63d1",
                "highlight": "#9c63d1",
                "label": "Holambra"
            }, {"value": 1, "color": "#17cddf", "highlight": "#17cddf", "label": "Itamarandiba"}, {
                "value": 1,
                "color": "#63184f",
                "highlight": "#63184f",
                "label": "Somerville"
            }, {"value": 1, "color": "#b1aabf", "highlight": "#b1aabf", "label": "Kane'ohe"}, {
                "value": 1,
                "color": "#b9b2f5",
                "highlight": "#b9b2f5",
                "label": "Paracuru"
            }, {"value": 1, "color": "#5472c2", "highlight": "#5472c2", "label": "Trujillo"}, {
                "value": 1,
                "color": "#854cc4",
                "highlight": "#854cc4",
                "label": "Santa Rita do Passa Quatro"
            }, {"value": 1, "color": "#2230fc", "highlight": "#2230fc", "label": "Major Vieira"}, {
                "value": 1,
                "color": "#ad8450",
                "highlight": "#ad8450",
                "label": "Caulfield South"
            }, {"value": 1, "color": "#9a7add", "highlight": "#9a7add", "label": "Claremont"}, {
                "value": 1,
                "color": "#1b6992",
                "highlight": "#1b6992",
                "label": "Lanus"
            }, {"value": 1, "color": "#38bec8", "highlight": "#38bec8", "label": "Alto Hospicio"}, {
                "value": 1,
                "color": "#73adea",
                "highlight": "#73adea",
                "label": "Iacri"
            }, {"value": 1, "color": "#cd4c87", "highlight": "#cd4c87", "label": "Wejherowo"}, {
                "value": 1,
                "color": "#704da9",
                "highlight": "#704da9",
                "label": "Vienna"
            }, {"value": 1, "color": "#161f06", "highlight": "#161f06", "label": "Louisville"}, {
                "value": 1,
                "color": "#e19162",
                "highlight": "#e19162",
                "label": "Caetit\u00e9"
            }, {"value": 1, "color": "#a92d41", "highlight": "#a92d41", "label": "Armazem"}, {
                "value": 1,
                "color": "#b7ec51",
                "highlight": "#b7ec51",
                "label": "Olympia"
            }, {"value": 1, "color": "#56eb1c", "highlight": "#56eb1c", "label": "Macaparana"}, {
                "value": 1,
                "color": "#4f08a5",
                "highlight": "#4f08a5",
                "label": "Nonoai"
            }, {"value": 1, "color": "#5782d1", "highlight": "#5782d1", "label": "Delta"}, {
                "value": 1,
                "color": "#ab08e2",
                "highlight": "#ab08e2",
                "label": "Nanuque"
            }, {"value": 1, "color": "#483d2f", "highlight": "#483d2f", "label": "Sand"}, {
                "value": 1,
                "color": "#b21b14",
                "highlight": "#b21b14",
                "label": "Carmo do Paranaiba"
            }, {"value": 1, "color": "#8e3d06", "highlight": "#8e3d06", "label": "Mafra"}, {
                "value": 1,
                "color": "#a02b50",
                "highlight": "#a02b50",
                "label": "Cidreira"
            }, {"value": 1, "color": "#db5fbb", "highlight": "#db5fbb", "label": "Los Polvorines"}, {
                "value": 1,
                "color": "#2b5190",
                "highlight": "#2b5190",
                "label": "Castelo"
            }, {"value": 1, "color": "#9c5b0b", "highlight": "#9c5b0b", "label": "Vertentes"}, {
                "value": 1,
                "color": "#189022",
                "highlight": "#189022",
                "label": "Cosmorama"
            }, {"value": 1, "color": "#5e4ef2", "highlight": "#5e4ef2", "label": "Justin\u00f3polis"}, {
                "value": 1,
                "color": "#131d71",
                "highlight": "#131d71",
                "label": "Lund"
            }, {"value": 1, "color": "#1d5ca0", "highlight": "#1d5ca0", "label": "Gilbertsville"}, {
                "value": 1,
                "color": "#44c9ae",
                "highlight": "#44c9ae",
                "label": "Catalao"
            }, {"value": 1, "color": "#23416f", "highlight": "#23416f", "label": "Jaborandi"}, {
                "value": 1,
                "color": "#2b9ac5",
                "highlight": "#2b9ac5",
                "label": "Cupira"
            }, {"value": 1, "color": "#7f4f5c", "highlight": "#7f4f5c", "label": "Cruz das Posses"}, {
                "value": 1,
                "color": "#37fcc6",
                "highlight": "#37fcc6",
                "label": "Arcos"
            }, {"value": 1, "color": "#9d8ca0", "highlight": "#9d8ca0", "label": "Thames"}, {
                "value": 1,
                "color": "#1e8fbd",
                "highlight": "#1e8fbd",
                "label": "Bremerton"
            }, {"value": 1, "color": "#c744fe", "highlight": "#c744fe", "label": "Itaituba"}, {
                "value": 1,
                "color": "#b8b8b5",
                "highlight": "#b8b8b5",
                "label": "Pradopolis"
            }, {"value": 1, "color": "#aa6a55", "highlight": "#aa6a55", "label": "Pantano Grande"}, {
                "value": 1,
                "color": "#7e1fc6",
                "highlight": "#7e1fc6",
                "label": "Platteville"
            }, {"value": 1, "color": "#bccf03", "highlight": "#bccf03", "label": "Corregidora"}, {
                "value": 1,
                "color": "#f517e4",
                "highlight": "#f517e4",
                "label": "Brotas"
            }, {"value": 1, "color": "#2d971e", "highlight": "#2d971e", "label": "Euless"}, {
                "value": 1,
                "color": "#d1e32c",
                "highlight": "#d1e32c",
                "label": "Memphis"
            }, {"value": 1, "color": "#5458e1", "highlight": "#5458e1", "label": "Rafard"}, {
                "value": 1,
                "color": "#6895d1",
                "highlight": "#6895d1",
                "label": "Frisco"
            }, {"value": 1, "color": "#f26231", "highlight": "#f26231", "label": "Videira"}, {
                "value": 1,
                "color": "#9055ba",
                "highlight": "#9055ba",
                "label": "Busby"
            }, {"value": 1, "color": "#56aaa4", "highlight": "#56aaa4", "label": "Porlamar"}, {
                "value": 1,
                "color": "#7e94e0",
                "highlight": "#7e94e0",
                "label": "Maranh\u00e3o"
            }, {"value": 1, "color": "#c62d89", "highlight": "#c62d89", "label": "Saratoga"}, {
                "value": 1,
                "color": "#9fe0dc",
                "highlight": "#9fe0dc",
                "label": "Pimenta Bueno"
            }, {"value": 1, "color": "#1451fa", "highlight": "#1451fa", "label": "Rouyn-noranda"}, {
                "value": 1,
                "color": "#8c41be",
                "highlight": "#8c41be",
                "label": "Crawley"
            }, {"value": 1, "color": "#33c20a", "highlight": "#33c20a", "label": "Trondheim"}, {
                "value": 1,
                "color": "#b8d5a1",
                "highlight": "#b8d5a1",
                "label": "Westfield"
            }, {"value": 1, "color": "#1798d6", "highlight": "#1798d6", "label": "Caldas"}, {
                "value": 1,
                "color": "#d0eab1",
                "highlight": "#d0eab1",
                "label": "Woodside"
            }, {"value": 1, "color": "#894a07", "highlight": "#894a07", "label": "Elgoibar"}, {
                "value": 1,
                "color": "#4ea071",
                "highlight": "#4ea071",
                "label": "Rydalmere"
            }, {"value": 1, "color": "#bb9623", "highlight": "#bb9623", "label": "Quixada"}, {
                "value": 1,
                "color": "#3e23af",
                "highlight": "#3e23af",
                "label": "Santa Cruz das Palmeiras"
            }, {
                "value": 1,
                "color": "#b24dcc",
                "highlight": "#b24dcc",
                "label": "Acapulco de Ju\u00e1rez"
            }, {"value": 1, "color": "#d55f7c", "highlight": "#d55f7c", "label": "Turmero"}, {
                "value": 1,
                "color": "#6ddf26",
                "highlight": "#6ddf26",
                "label": "Gimo"
            }, {"value": 1, "color": "#41537c", "highlight": "#41537c", "label": "Bibra Lake"}, {
                "value": 1,
                "color": "#4840ee",
                "highlight": "#4840ee",
                "label": "Laurentino"
            }, {"value": 1, "color": "#658aed", "highlight": "#658aed", "label": "Magnolia"}, {
                "value": 1,
                "color": "#60c1a6",
                "highlight": "#60c1a6",
                "label": "Knoxville"
            }, {"value": 1, "color": "#8c7e28", "highlight": "#8c7e28", "label": "Oxford"}, {
                "value": 1,
                "color": "#fce1af",
                "highlight": "#fce1af",
                "label": "Livramento"
            }, {"value": 1, "color": "#e0a4b1", "highlight": "#e0a4b1", "label": "Rydu?towy"}, {
                "value": 1,
                "color": "#b5ea7b",
                "highlight": "#b5ea7b",
                "label": "Baruta"
            }, {"value": 1, "color": "#31f354", "highlight": "#31f354", "label": "Greystanes"}, {
                "value": 1,
                "color": "#291b83",
                "highlight": "#291b83",
                "label": "Sao Joao do Paraiso"
            }, {"value": 1, "color": "#5e2e42", "highlight": "#5e2e42", "label": "Lucena"}, {
                "value": 1,
                "color": "#3c31e8",
                "highlight": "#3c31e8",
                "label": "Iracemapolis"
            }, {"value": 1, "color": "#a014a0", "highlight": "#a014a0", "label": "Ribeirao Bonito"}, {
                "value": 1,
                "color": "#9203d6",
                "highlight": "#9203d6",
                "label": "Manduri"
            }, {"value": 1, "color": "#5ee57d", "highlight": "#5ee57d", "label": "Mato Grosso"}, {
                "value": 1,
                "color": "#9635ae",
                "highlight": "#9635ae",
                "label": "Bellport"
            }, {"value": 1, "color": "#bab153", "highlight": "#bab153", "label": "Juru"}, {
                "value": 1,
                "color": "#a14d96",
                "highlight": "#a14d96",
                "label": "Capinopolis"
            }, {"value": 1, "color": "#c7f427", "highlight": "#c7f427", "label": "Bellevue"}, {
                "value": 1,
                "color": "#77ef94",
                "highlight": "#77ef94",
                "label": "Raholt"
            }, {"value": 1, "color": "#d7894f", "highlight": "#d7894f", "label": "Scotch Plains"}, {
                "value": 1,
                "color": "#8b9786",
                "highlight": "#8b9786",
                "label": "Naucalpan"
            }, {"value": 1, "color": "#afd6c6", "highlight": "#afd6c6", "label": "General Salgado"}, {
                "value": 1,
                "color": "#c4b00a",
                "highlight": "#c4b00a",
                "label": "Versailles"
            }, {"value": 1, "color": "#37ae30", "highlight": "#37ae30", "label": "Rondon"}, {
                "value": 1,
                "color": "#3f4475",
                "highlight": "#3f4475",
                "label": "Desamparados"
            }, {"value": 1, "color": "#2ea643", "highlight": "#2ea643", "label": "Coburg"}, {
                "value": 1,
                "color": "#8fd84d",
                "highlight": "#8fd84d",
                "label": "Ituporanga"
            }, {"value": 1, "color": "#fef00e", "highlight": "#fef00e", "label": "Nueva York"}, {
                "value": 1,
                "color": "#dd7d98",
                "highlight": "#dd7d98",
                "label": "Caguas"
            }, {"value": 1, "color": "#e059b5", "highlight": "#e059b5", "label": "Conceicao da Feira"}, {
                "value": 1,
                "color": "#164154",
                "highlight": "#164154",
                "label": "High Wycombe"
            }, {"value": 1, "color": "#eeea48", "highlight": "#eeea48", "label": "Rockville"}, {
                "value": 1,
                "color": "#8a0d71",
                "highlight": "#8a0d71",
                "label": "Tarabai"
            }, {"value": 1, "color": "#e89a91", "highlight": "#e89a91", "label": "Guaicara"}, {
                "value": 1,
                "color": "#8aaf8e",
                "highlight": "#8aaf8e",
                "label": "Middle Island"
            }, {"value": 1, "color": "#53bd65", "highlight": "#53bd65", "label": "Duncan"}, {
                "value": 1,
                "color": "#e8e9cc",
                "highlight": "#e8e9cc",
                "label": "Cajobi"
            }, {"value": 1, "color": "#7b3d46", "highlight": "#7b3d46", "label": "Figueiredo"}, {
                "value": 1,
                "color": "#29bc63",
                "highlight": "#29bc63",
                "label": "Taquarana"
            }, {"value": 1, "color": "#c1d76b", "highlight": "#c1d76b", "label": "Celestyn\u00f3w"}, {
                "value": 1,
                "color": "#12045d",
                "highlight": "#12045d",
                "label": "Lakemba"
            }, {"value": 1, "color": "#d834d4", "highlight": "#d834d4", "label": "San Mateo"}, {
                "value": 1,
                "color": "#7fa4d2",
                "highlight": "#7fa4d2",
                "label": "Temuco"
            }, {"value": 1, "color": "#2fa13d", "highlight": "#2fa13d", "label": "Orlandia"}, {
                "value": 1,
                "color": "#d30e23",
                "highlight": "#d30e23",
                "label": "Sopuerta"
            }, {"value": 1, "color": "#dc8646", "highlight": "#dc8646", "label": "Sioux Falls"}, {
                "value": 1,
                "color": "#6e6c1e",
                "highlight": "#6e6c1e",
                "label": "Canley Vale"
            }, {"value": 1, "color": "#d9ef08", "highlight": "#d9ef08", "label": "Norrahammar"}, {
                "value": 1,
                "color": "#4df66a",
                "highlight": "#4df66a",
                "label": "San Jose de la Esquina"
            }, {"value": 1, "color": "#36556e", "highlight": "#36556e", "label": "Rosarito"}, {
                "value": 1,
                "color": "#eff552",
                "highlight": "#eff552",
                "label": "Elanora"
            }, {"value": 1, "color": "#c15d82", "highlight": "#c15d82", "label": "Viken"}, {
                "value": 1,
                "color": "#b678c2",
                "highlight": "#b678c2",
                "label": "Zacatelco"
            }, {"value": 1, "color": "#d9e9cd", "highlight": "#d9e9cd", "label": "Delmiro Gouveia"}, {
                "value": 1,
                "color": "#855fc4",
                "highlight": "#855fc4",
                "label": "IJsselstein"
            }, {"value": 1, "color": "#129a20", "highlight": "#129a20", "label": "Mount Pearl"}, {
                "value": 1,
                "color": "#5a5b22",
                "highlight": "#5a5b22",
                "label": "Santa Rosa de Viterbo"
            }, {"value": 1, "color": "#c54bf9", "highlight": "#c54bf9", "label": "Conceicao do Almeida"}, {
                "value": 1,
                "color": "#b27d07",
                "highlight": "#b27d07",
                "label": "Sao Gotardo"
            }, {"value": 1, "color": "#e1d955", "highlight": "#e1d955", "label": "Panama City"}, {
                "value": 1,
                "color": "#837288",
                "highlight": "#837288",
                "label": "Homebush"
            }, {"value": 1, "color": "#baac6d", "highlight": "#baac6d", "label": "Uruana"}, {
                "value": 1,
                "color": "#9f747d",
                "highlight": "#9f747d",
                "label": "Sonora"
            }, {"value": 1, "color": "#25ac8e", "highlight": "#25ac8e", "label": "Buritama"}, {
                "value": 1,
                "color": "#10ae67",
                "highlight": "#10ae67",
                "label": "Itaguatins"
            }, {"value": 1, "color": "#2639cf", "highlight": "#2639cf", "label": "Anage"}, {
                "value": 1,
                "color": "#1f3c3a",
                "highlight": "#1f3c3a",
                "label": "Alto Parnaiba"
            }, {"value": 1, "color": "#958b8d", "highlight": "#958b8d", "label": "La Llagosta"}, {
                "value": 1,
                "color": "#a99da7",
                "highlight": "#a99da7",
                "label": "Peabiru"
            }, {"value": 1, "color": "#ff52e8", "highlight": "#ff52e8", "label": "Foster"}, {
                "value": 1,
                "color": "#c4cbee",
                "highlight": "#c4cbee",
                "label": "Euclides da Cunha"
            }, {"value": 1, "color": "#ece1a1", "highlight": "#ece1a1", "label": "Wenceslau Braz"}, {
                "value": 1,
                "color": "#6528da",
                "highlight": "#6528da",
                "label": "Ciudad del Carmen"
            }, {"value": 1, "color": "#5bbe1f", "highlight": "#5bbe1f", "label": "Baldivis"}, {
                "value": 1,
                "color": "#14faa9",
                "highlight": "#14faa9",
                "label": "Orobo"
            }, {"value": 1, "color": "#b7b90e", "highlight": "#b7b90e", "label": "Catia La Mar"}, {
                "value": 1,
                "color": "#28fd51",
                "highlight": "#28fd51",
                "label": "Avesta"
            }, {"value": 1, "color": "#669c5c", "highlight": "#669c5c", "label": "Rockdale"}, {
                "value": 1,
                "color": "#a6619f",
                "highlight": "#a6619f",
                "label": "Pirambu"
            }, {"value": 1, "color": "#befadd", "highlight": "#befadd", "label": "Apodi"}, {
                "value": 1,
                "color": "#6fdcc5",
                "highlight": "#6fdcc5",
                "label": "Aracoiaba da Serra"
            }, {"value": 1, "color": "#b2ac51", "highlight": "#b2ac51", "label": "Pirajui"}, {
                "value": 1,
                "color": "#42982c",
                "highlight": "#42982c",
                "label": "Orleans"
            }, {"value": 1, "color": "#99e6ce", "highlight": "#99e6ce", "label": "Chicopee"}, {
                "value": 1,
                "color": "#ab97cc",
                "highlight": "#ab97cc",
                "label": "Arezzo"
            }, {"value": 1, "color": "#62eb20", "highlight": "#62eb20", "label": "Ruda ?l?ska"}, {
                "value": 1,
                "color": "#7271a6",
                "highlight": "#7271a6",
                "label": "Livramento do Brumado"
            }, {"value": 1, "color": "#de2d52", "highlight": "#de2d52", "label": "Versmold"}, {
                "value": 1,
                "color": "#57837e",
                "highlight": "#57837e",
                "label": "Paranapanema"
            }, {"value": 1, "color": "#a7449c", "highlight": "#a7449c", "label": "Cacul\u00e9"}, {
                "value": 1,
                "color": "#f272b3",
                "highlight": "#f272b3",
                "label": "Teramo"
            }, {"value": 1, "color": "#ee6e94", "highlight": "#ee6e94", "label": "S?ubice"}, {
                "value": 1,
                "color": "#6046d5",
                "highlight": "#6046d5",
                "label": "Bankstown"
            }, {"value": 1, "color": "#6ed73a", "highlight": "#6ed73a", "label": "Almirante Brown"}, {
                "value": 1,
                "color": "#602c50",
                "highlight": "#602c50",
                "label": "Galia"
            }, {"value": 1, "color": "#d7e184", "highlight": "#d7e184", "label": "Lewes"}, {
                "value": 1,
                "color": "#f8a75b",
                "highlight": "#f8a75b",
                "label": "Grand Prairie"
            }, {"value": 1, "color": "#97ed10", "highlight": "#97ed10", "label": "Fresno"}, {
                "value": 1,
                "color": "#e6728d",
                "highlight": "#e6728d",
                "label": "Jarinu"
            }, {"value": 1, "color": "#72365e", "highlight": "#72365e", "label": "Lake Saint Louis"}, {
                "value": 1,
                "color": "#5f48a2",
                "highlight": "#5f48a2",
                "label": "Passo de Camaragibe"
            }, {"value": 1, "color": "#b72023", "highlight": "#b72023", "label": "Barra Do Corda"}, {
                "value": 1,
                "color": "#6d5ec0",
                "highlight": "#6d5ec0",
                "label": "Karlholmsbruk"
            }, {"value": 1, "color": "#e24ea5", "highlight": "#e24ea5", "label": "Nova Granada"}, {
                "value": 1,
                "color": "#a9c9a3",
                "highlight": "#a9c9a3",
                "label": "Gonzales"
            }, {"value": 1, "color": "#36eb8f", "highlight": "#36eb8f", "label": "Mar De Plata"}, {
                "value": 1,
                "color": "#f0c505",
                "highlight": "#f0c505",
                "label": "Caldeirao Grande"
            }, {"value": 1, "color": "#7ad533", "highlight": "#7ad533", "label": "Mangaratiba"}, {
                "value": 1,
                "color": "#815653",
                "highlight": "#815653",
                "label": "Uchoa"
            }, {"value": 1, "color": "#225c2c", "highlight": "#225c2c", "label": "Caic\u00f3"}, {
                "value": 1,
                "color": "#f949bb",
                "highlight": "#f949bb",
                "label": "Alviso"
            }, {
                "value": 1,
                "color": "#ed69ee",
                "highlight": "#ed69ee",
                "label": "San Crist\u00f3bal de las Casas"
            }, {"value": 1, "color": "#2399f3", "highlight": "#2399f3", "label": "Albany"}, {
                "value": 1,
                "color": "#11414c",
                "highlight": "#11414c",
                "label": "Colchester"
            }, {"value": 1, "color": "#1f2a42", "highlight": "#1f2a42", "label": "Greenford"}, {
                "value": 1,
                "color": "#d32b80",
                "highlight": "#d32b80",
                "label": "Rosario"
            }, {"value": 1, "color": "#e4c090", "highlight": "#e4c090", "label": "Tres Fronteiras"}, {
                "value": 1,
                "color": "#2bedff",
                "highlight": "#2bedff",
                "label": "Al Qawz"
            }, {"value": 1, "color": "#fcfd7b", "highlight": "#fcfd7b", "label": "Aberdeen"}, {
                "value": 1,
                "color": "#2de768",
                "highlight": "#2de768",
                "label": "Rio Grande da Serra"
            }, {"value": 1, "color": "#85a6be", "highlight": "#85a6be", "label": "Sao Francisco"}, {
                "value": 1,
                "color": "#72a557",
                "highlight": "#72a557",
                "label": "Vila Muriqui"
            }, {"value": 1, "color": "#9527e6", "highlight": "#9527e6", "label": "Kearney"}, {
                "value": 1,
                "color": "#deea84",
                "highlight": "#deea84",
                "label": "Mullingar"
            }, {"value": 1, "color": "#ddf566", "highlight": "#ddf566", "label": "Goitacazes"}, {
                "value": 1,
                "color": "#470d62",
                "highlight": "#470d62",
                "label": "Corvallis"
            }, {"value": 1, "color": "#807c48", "highlight": "#807c48", "label": "Ramat Gan"}, {
                "value": 1,
                "color": "#e9651d",
                "highlight": "#e9651d",
                "label": "Sao Joao da Urtiga"
            }, {"value": 1, "color": "#67e5ca", "highlight": "#67e5ca", "label": "Lakeport"}, {
                "value": 1,
                "color": "#310bb9",
                "highlight": "#310bb9",
                "label": "Serrinha"
            }, {"value": 1, "color": "#7afb75", "highlight": "#7afb75", "label": "Burnaby"}, {
                "value": 1,
                "color": "#d0c3f1",
                "highlight": "#d0c3f1",
                "label": "Itacuruba"
            }, {"value": 1, "color": "#a0f352", "highlight": "#a0f352", "label": "Tunas"}, {
                "value": 1,
                "color": "#c52270",
                "highlight": "#c52270",
                "label": "Milwaukee"
            }, {"value": 1, "color": "#87a7cd", "highlight": "#87a7cd", "label": "Oceanside"}, {
                "value": 1,
                "color": "#7d09cc",
                "highlight": "#7d09cc",
                "label": "Bom Jardim"
            }, {"value": 1, "color": "#1574c7", "highlight": "#1574c7", "label": "Humble"}, {
                "value": 1,
                "color": "#1800c0",
                "highlight": "#1800c0",
                "label": "Alagoinha"
            }, {"value": 1, "color": "#c4af29", "highlight": "#c4af29", "label": "Algeciras"}, {
                "value": 1,
                "color": "#8c68e9",
                "highlight": "#8c68e9",
                "label": "Casimiro de Abreu"
            }, {"value": 1, "color": "#a076d3", "highlight": "#a076d3", "label": "Geylang"}, {
                "value": 1,
                "color": "#b41d77",
                "highlight": "#b41d77",
                "label": "Ottawa"
            }, {"value": 1, "color": "#467fd3", "highlight": "#467fd3", "label": "Cabudare"}, {
                "value": 1,
                "color": "#a280e3",
                "highlight": "#a280e3",
                "label": "Anaco"
            }, {"value": 1, "color": "#7d6daa", "highlight": "#7d6daa", "label": "Itumbiara"}, {
                "value": 1,
                "color": "#5dae0e",
                "highlight": "#5dae0e",
                "label": "Halifax"
            }, {"value": 1, "color": "#2cdcee", "highlight": "#2cdcee", "label": "Jambeiro"}, {
                "value": 1,
                "color": "#b92fd5",
                "highlight": "#b92fd5",
                "label": "Airdrie"
            }, {"value": 1, "color": "#889410", "highlight": "#889410", "label": "Paragominas"}, {
                "value": 1,
                "color": "#bf81c3",
                "highlight": "#bf81c3",
                "label": "Viana"
            }, {"value": 1, "color": "#30a669", "highlight": "#30a669", "label": "Serido"}, {
                "value": 1,
                "color": "#41ebb0",
                "highlight": "#41ebb0",
                "label": "Kramfors"
            }, {"value": 1, "color": "#b0c2e7", "highlight": "#b0c2e7", "label": "Visconde do Rio Branco"}, {
                "value": 1,
                "color": "#43ddbf",
                "highlight": "#43ddbf",
                "label": "Zacatecas City"
            }, {"value": 1, "color": "#7fd912", "highlight": "#7fd912", "label": "Uxbridge"}, {
                "value": 1,
                "color": "#95e8d6",
                "highlight": "#95e8d6",
                "label": "Aquidaba"
            }, {"value": 1, "color": "#b9bffb", "highlight": "#b9bffb", "label": "Gomez Palacio"}, {
                "value": 1,
                "color": "#aad059",
                "highlight": "#aad059",
                "label": "Altos"
            }, {"value": 1, "color": "#718b1a", "highlight": "#718b1a", "label": "Youngsville"}, {
                "value": 1,
                "color": "#f35918",
                "highlight": "#f35918",
                "label": "Hyltebruk"
            }, {"value": 1, "color": "#9c0798", "highlight": "#9c0798", "label": "Niepolomice"}, {
                "value": 1,
                "color": "#f242f5",
                "highlight": "#f242f5",
                "label": "Belle Plaine"
            }, {"value": 1, "color": "#7d838f", "highlight": "#7d838f", "label": "Jaiba"}, {
                "value": 1,
                "color": "#8354c2",
                "highlight": "#8354c2",
                "label": "Knutby"
            }, {"value": 1, "color": "#cbffdd", "highlight": "#cbffdd", "label": "Calcado"}, {
                "value": 1,
                "color": "#bb0ad0",
                "highlight": "#bb0ad0",
                "label": "Lagoa Dourada"
            }, {"value": 1, "color": "#3cb70a", "highlight": "#3cb70a", "label": "Camanducaia"}, {
                "value": 1,
                "color": "#c69e56",
                "highlight": "#c69e56",
                "label": "Caldazinha"
            }, {"value": 1, "color": "#d8a4c1", "highlight": "#d8a4c1", "label": "Barranquilla"}, {
                "value": 1,
                "color": "#dcd124",
                "highlight": "#dcd124",
                "label": "Fredericton"
            }, {"value": 1, "color": "#49268f", "highlight": "#49268f", "label": "Esperanza"}, {
                "value": 1,
                "color": "#89e9d9",
                "highlight": "#89e9d9",
                "label": "Queimadas"
            }, {"value": 1, "color": "#f5c8b8", "highlight": "#f5c8b8", "label": "Aparecida do Taboado"}, {
                "value": 1,
                "color": "#4f6772",
                "highlight": "#4f6772",
                "label": "Payakumbuh"
            }, {"value": 1, "color": "#dd0eda", "highlight": "#dd0eda", "label": "Orizaba"}, {
                "value": 1,
                "color": "#4a825b",
                "highlight": "#4a825b",
                "label": "Capela"
            }, {"value": 1, "color": "#1b963b", "highlight": "#1b963b", "label": "Lint"}, {
                "value": 1,
                "color": "#19ea83",
                "highlight": "#19ea83",
                "label": "Aguas de Lindoia"
            }, {"value": 1, "color": "#7d5636", "highlight": "#7d5636", "label": "Arvorezinha"}, {
                "value": 1,
                "color": "#f2c49b",
                "highlight": "#f2c49b",
                "label": "Iaras"
            }, {"value": 1, "color": "#8cd237", "highlight": "#8cd237", "label": "Paintsville"}, {
                "value": 1,
                "color": "#7b5b8d",
                "highlight": "#7b5b8d",
                "label": "Lo Barnechea"
            }, {"value": 1, "color": "#28ffeb", "highlight": "#28ffeb", "label": "Takahama"}, {
                "value": 1,
                "color": "#eacfec",
                "highlight": "#eacfec",
                "label": "Tuxtla Guti\u00e9rrez"
            }, {"value": 1, "color": "#fe22c", "highlight": "#fe22c", "label": "Presidente Dutra"}, {
                "value": 1,
                "color": "#99b0f3",
                "highlight": "#99b0f3",
                "label": "West Springfield"
            }, {"value": 1, "color": "#dd1aa8", "highlight": "#dd1aa8", "label": "Salyersville"}, {
                "value": 1,
                "color": "#b48306",
                "highlight": "#b48306",
                "label": "Highland"
            }, {"value": 1, "color": "#92d3d9", "highlight": "#92d3d9", "label": "Fairfield"}, {
                "value": 1,
                "color": "#1ae6a4",
                "highlight": "#1ae6a4",
                "label": "Annapol"
            }, {"value": 1, "color": "#a7430d", "highlight": "#a7430d", "label": "Quata"}, {
                "value": 1,
                "color": "#11dce3",
                "highlight": "#11dce3",
                "label": "Cianjur"
            }, {"value": 1, "color": "#2fb454", "highlight": "#2fb454", "label": "T\u00fcbingen"}, {
                "value": 1,
                "color": "#a7b2dc",
                "highlight": "#a7b2dc",
                "label": "Oconomowoc"
            }, {"value": 1, "color": "#9a8de8", "highlight": "#9a8de8", "label": "Ilhota"}, {
                "value": 1,
                "color": "#5cd159",
                "highlight": "#5cd159",
                "label": "Barreiros"
            }, {"value": 1, "color": "#e62cb8", "highlight": "#e62cb8", "label": "Bochum"}, {
                "value": 1,
                "color": "#65b19f",
                "highlight": "#65b19f",
                "label": "Navirai"
            }, {"value": 1, "color": "#f632ba", "highlight": "#f632ba", "label": "Le Raincy"}, {
                "value": 1,
                "color": "#c1434c",
                "highlight": "#c1434c",
                "label": "Dona Euzebia"
            }, {"value": 1, "color": "#209633", "highlight": "#209633", "label": "Miracatu"}, {
                "value": 1,
                "color": "#53c844",
                "highlight": "#53c844",
                "label": "Caninde de Sao Francisco"
            }, {"value": 1, "color": "#155c59", "highlight": "#155c59", "label": "Fitzroy"}, {
                "value": 1,
                "color": "#6c7edd",
                "highlight": "#6c7edd",
                "label": "Manjahlega"
            }, {"value": 1, "color": "#1e9d78", "highlight": "#1e9d78", "label": "Maranguape"}, {
                "value": 1,
                "color": "#9ea7fd",
                "highlight": "#9ea7fd",
                "label": "Queens Park"
            }, {"value": 1, "color": "#8bce47", "highlight": "#8bce47", "label": "Edinburgh"}, {
                "value": 1,
                "color": "#855e19",
                "highlight": "#855e19",
                "label": "Gold Coast"
            }, {"value": 1, "color": "#a13945", "highlight": "#a13945", "label": "Stouffville"}, {
                "value": 1,
                "color": "#2dbc77",
                "highlight": "#2dbc77",
                "label": "Lexington"
            }, {"value": 1, "color": "#ad67ef", "highlight": "#ad67ef", "label": "Mandaguari"}, {
                "value": 1,
                "color": "#750362",
                "highlight": "#750362",
                "label": "Duncraig"
            }, {"value": 1, "color": "#786507", "highlight": "#786507", "label": "Oaxaca"}, {
                "value": 1,
                "color": "#2c404d",
                "highlight": "#2c404d",
                "label": "Tupi"
            }, {"value": 1, "color": "#2c78bb", "highlight": "#2c78bb", "label": "La Grita"}, {
                "value": 1,
                "color": "#be1b6f",
                "highlight": "#be1b6f",
                "label": "Campos do Jordao"
            }, {"value": 1, "color": "#8c9f57", "highlight": "#8c9f57", "label": "Embu Guacu"}, {
                "value": 1,
                "color": "#a31fa5",
                "highlight": "#a31fa5",
                "label": "Canapolis"
            }, {"value": 1, "color": "#681fc2", "highlight": "#681fc2", "label": "Stuart"}, {
                "value": 1,
                "color": "#32a53e",
                "highlight": "#32a53e",
                "label": "Ipoh"
            }, {"value": 1, "color": "#1d1766", "highlight": "#1d1766", "label": "Barra dos Coqueiros"}, {
                "value": 1,
                "color": "#6a597b",
                "highlight": "#6a597b",
                "label": "Aguirre"
            }, {"value": 1, "color": "#2b0080", "highlight": "#2b0080", "label": "Harlingen"}, {
                "value": 1,
                "color": "#e2884d",
                "highlight": "#e2884d",
                "label": "Bujaru"
            }, {"value": 1, "color": "#c004d7", "highlight": "#c004d7", "label": "Ladario"}, {
                "value": 1,
                "color": "#d78418",
                "highlight": "#d78418",
                "label": "Op den Bosch"
            }, {"value": 1, "color": "#8db084", "highlight": "#8db084", "label": "Afogados Da Ingazeira"}, {
                "value": 1,
                "color": "#feaa38",
                "highlight": "#feaa38",
                "label": "Joao Alfredo"
            }, {"value": 1, "color": "#ea549f", "highlight": "#ea549f", "label": "El Salvador"}, {
                "value": 1,
                "color": "#41957d",
                "highlight": "#41957d",
                "label": "Parapua"
            }, {"value": 1, "color": "#162847", "highlight": "#162847", "label": "Ribeirao Pires"}, {
                "value": 1,
                "color": "#4cc707",
                "highlight": "#4cc707",
                "label": "Quirin\u00f3polis"
            }, {"value": 1, "color": "#a400bf", "highlight": "#a400bf", "label": "Bentley"}, {
                "value": 1,
                "color": "#31887b",
                "highlight": "#31887b",
                "label": "Jucati"
            }, {"value": 1, "color": "#d925a9", "highlight": "#d925a9", "label": "Laranjal Paulista"}, {
                "value": 1,
                "color": "#dfac5f",
                "highlight": "#dfac5f",
                "label": "Ivai"
            }, {"value": 1, "color": "#a66cac", "highlight": "#a66cac", "label": "Zurich"}, {
                "value": 1,
                "color": "#c13cef",
                "highlight": "#c13cef",
                "label": "Naugatuck"
            }, {"value": 1, "color": "#e953d8", "highlight": "#e953d8", "label": "Americo Brasiliense"}, {
                "value": 1,
                "color": "#76b337",
                "highlight": "#76b337",
                "label": "Bury"
            }, {"value": 1, "color": "#83752a", "highlight": "#83752a", "label": "Plasenzuela"}, {
                "value": 1,
                "color": "#439bb1",
                "highlight": "#439bb1",
                "label": "Guararapes"
            }, {"value": 1, "color": "#b4e32d", "highlight": "#b4e32d", "label": "Nantucket"}, {
                "value": 1,
                "color": "#a067fe",
                "highlight": "#a067fe",
                "label": "Itabaianinha"
            }, {"value": 1, "color": "#34698d", "highlight": "#34698d", "label": "Lafayette"}, {
                "value": 1,
                "color": "#ba7fac",
                "highlight": "#ba7fac",
                "label": "Cicero"
            }, {"value": 1, "color": "#337100", "highlight": "#337100", "label": "Crowley"}, {
                "value": 1,
                "color": "#2e779c",
                "highlight": "#2e779c",
                "label": "Agua Fria"
            }, {"value": 1, "color": "#c56f40", "highlight": "#c56f40", "label": "Petaling Jaya"}, {
                "value": 1,
                "color": "#be1901",
                "highlight": "#be1901",
                "label": "Descalvado"
            }, {"value": 1, "color": "#8fe48f", "highlight": "#8fe48f", "label": "Giza"}, {
                "value": 1,
                "color": "#e1cd1b",
                "highlight": "#e1cd1b",
                "label": "Castelar"
            }, {"value": 1, "color": "#3a6148", "highlight": "#3a6148", "label": "Horizonte"}, {
                "value": 1,
                "color": "#443676",
                "highlight": "#443676",
                "label": "Santa Cruz Cabralia"
            }, {"value": 1, "color": "#ee688b", "highlight": "#ee688b", "label": "Pereiro"}, {
                "value": 1,
                "color": "#611c28",
                "highlight": "#611c28",
                "label": "Desterro do Melo"
            }, {"value": 1, "color": "#4c86b2", "highlight": "#4c86b2", "label": "Moorooka"}, {
                "value": 1,
                "color": "#955248",
                "highlight": "#955248",
                "label": "Albufeira"
            }, {"value": 1, "color": "#cb983a", "highlight": "#cb983a", "label": "Mount Sterling"}, {
                "value": 1,
                "color": "#e98d31",
                "highlight": "#e98d31",
                "label": "Dois Corregos"
            }, {"value": 1, "color": "#70f781", "highlight": "#70f781", "label": "Cambe"}, {
                "value": 1,
                "color": "#c66d21",
                "highlight": "#c66d21",
                "label": "Agua Linda"
            }, {"value": 1, "color": "#535174", "highlight": "#535174", "label": "Mount Sinai"}, {
                "value": 1,
                "color": "#a99f8e",
                "highlight": "#a99f8e",
                "label": "La Cisterna"
            }, {"value": 1, "color": "#812f60", "highlight": "#812f60", "label": "San Miguel de Cozumel"}, {
                "value": 1,
                "color": "#119f44",
                "highlight": "#119f44",
                "label": "Pederneiras"
            }, {"value": 1, "color": "#ca8c5f", "highlight": "#ca8c5f", "label": "Capinzal"}, {
                "value": 1,
                "color": "#12ac06",
                "highlight": "#12ac06",
                "label": "Brejo Santo"
            }, {"value": 1, "color": "#c8f8c4", "highlight": "#c8f8c4", "label": "Far Rockaway"}, {
                "value": 1,
                "color": "#bef457",
                "highlight": "#bef457",
                "label": "Pindobacu"
            }, {"value": 1, "color": "#306ef8", "highlight": "#306ef8", "label": "Sobralinho"}, {
                "value": 1,
                "color": "#5be6b3",
                "highlight": "#5be6b3",
                "label": "Sao Sebastiao da Grama"
            }, {"value": 1, "color": "#646254", "highlight": "#646254", "label": "Porto Ferreira"}, {
                "value": 1,
                "color": "#53fd4a",
                "highlight": "#53fd4a",
                "label": "Moorebank"
            }, {"value": 1, "color": "#9f2e24", "highlight": "#9f2e24", "label": "City of Parramatta"}, {
                "value": 1,
                "color": "#13408b",
                "highlight": "#13408b",
                "label": "Godalming"
            }, {
                "value": 1,
                "color": "#ed7433",
                "highlight": "#ed7433",
                "label": "Santa Isabel Tlanepantla"
            }, {"value": 1, "color": "#b3892a", "highlight": "#b3892a", "label": "Rolleston"}, {
                "value": 1,
                "color": "#d564a3",
                "highlight": "#d564a3",
                "label": "Dortmund"
            }, {"value": 1, "color": "#b0dec1", "highlight": "#b0dec1", "label": "Sao Jose do Rio Pardo"}, {
                "value": 1,
                "color": "#5b61c4",
                "highlight": "#5b61c4",
                "label": "Russas"
            }, {"value": 1, "color": "#98e619", "highlight": "#98e619", "label": "Paudalho"}, {
                "value": 1,
                "color": "#6f50b8",
                "highlight": "#6f50b8",
                "label": "Laplace"
            }, {"value": 1, "color": "#9bbba6", "highlight": "#9bbba6", "label": "San Juan de los Morros"}, {
                "value": 1,
                "color": "#8505af",
                "highlight": "#8505af",
                "label": "Bom Sucesso"
            }, {"value": 1, "color": "#538dcc", "highlight": "#538dcc", "label": "Aratiba"}, {
                "value": 1,
                "color": "#1db022",
                "highlight": "#1db022",
                "label": "Pocoes"
            }, {"value": 1, "color": "#ba6a97", "highlight": "#ba6a97", "label": "Nelson"}, {
                "value": 1,
                "color": "#e3fc8e",
                "highlight": "#e3fc8e",
                "label": "Aracagi"
            }, {"value": 1, "color": "#353a23", "highlight": "#353a23", "label": "Tupi Paulista"}, {
                "value": 1,
                "color": "#42cce6",
                "highlight": "#42cce6",
                "label": "Canberra"
            }, {"value": 1, "color": "#477e61", "highlight": "#477e61", "label": "Brodosqui"}, {
                "value": 1,
                "color": "#be7d87",
                "highlight": "#be7d87",
                "label": "Itabaiana"
            }, {"value": 1, "color": "#a3ab93", "highlight": "#a3ab93", "label": "Ruston"}, {
                "value": 1,
                "color": "#98f395",
                "highlight": "#98f395",
                "label": "Mortugaba"
            }, {"value": 1, "color": "#82155f", "highlight": "#82155f", "label": "Venda Nova"}, {
                "value": 1,
                "color": "#ec0b79",
                "highlight": "#ec0b79",
                "label": "Itamogi"
            }, {"value": 1, "color": "#b717bd", "highlight": "#b717bd", "label": "Japeri"}, {
                "value": 1,
                "color": "#4f6647",
                "highlight": "#4f6647",
                "label": "Zagazig"
            }, {"value": 1, "color": "#37af02", "highlight": "#37af02", "label": "Berkeley"}, {
                "value": 1,
                "color": "#35d22a",
                "highlight": "#35d22a",
                "label": "Waikiki"
            }, {"value": 1, "color": "#21dea7", "highlight": "#21dea7", "label": "La Laja"}, {
                "value": 1,
                "color": "#436f93",
                "highlight": "#436f93",
                "label": "Araua"
            }, {"value": 1, "color": "#aedc02", "highlight": "#aedc02", "label": "Ipiabas"}, {
                "value": 1,
                "color": "#e92987",
                "highlight": "#e92987",
                "label": "Bocaiuva"
            }, {"value": 1, "color": "#c78df0", "highlight": "#c78df0", "label": "Tallahassee"}, {
                "value": 1,
                "color": "#7103cf",
                "highlight": "#7103cf",
                "label": "Don Torcuato"
            }, {"value": 1, "color": "#67b790", "highlight": "#67b790", "label": "Santa Teresa"}, {
                "value": 1,
                "color": "#64df61",
                "highlight": "#64df61",
                "label": "Irati"
            }, {"value": 1, "color": "#b8ea94", "highlight": "#b8ea94", "label": "Larchmont"}, {
                "value": 1,
                "color": "#962535",
                "highlight": "#962535",
                "label": "Fort Wayne"
            }, {"value": 1, "color": "#27ed01", "highlight": "#27ed01", "label": "Oak Creek"}, {
                "value": 1,
                "color": "#70636e",
                "highlight": "#70636e",
                "label": "Bedford"
            }, {"value": 1, "color": "#eb62a8", "highlight": "#eb62a8", "label": "Stamford"}, {
                "value": 1,
                "color": "#f62dc3",
                "highlight": "#f62dc3",
                "label": "Bakersfield"
            }, {"value": 1, "color": "#6798ab", "highlight": "#6798ab", "label": "Igarape"}, {
                "value": 1,
                "color": "#f0b655",
                "highlight": "#f0b655",
                "label": "Sollentuna"
            }, {"value": 1, "color": "#fbe54f", "highlight": "#fbe54f", "label": "Managua"}, {
                "value": 1,
                "color": "#1e52ad",
                "highlight": "#1e52ad",
                "label": "Medeiros Neto"
            }, {"value": 1, "color": "#c2b797", "highlight": "#c2b797", "label": "Navojoa"}, {
                "value": 1,
                "color": "#9a1931",
                "highlight": "#9a1931",
                "label": "Freeport"
            }, {"value": 1, "color": "#86ca9f", "highlight": "#86ca9f", "label": "Bothell"}, {
                "value": 1,
                "color": "#917da2",
                "highlight": "#917da2",
                "label": "Villa del Parque"
            }, {"value": 1, "color": "#a13fbd", "highlight": "#a13fbd", "label": "Brasilandia"}, {
                "value": 1,
                "color": "#5c32fc",
                "highlight": "#5c32fc",
                "label": "Canton"
            }, {"value": 1, "color": "#9facd8", "highlight": "#9facd8", "label": "Ibirarema"}, {
                "value": 1,
                "color": "#f1c6ff",
                "highlight": "#f1c6ff",
                "label": "Piau"
            }, {"value": 1, "color": "#d08df7", "highlight": "#d08df7", "label": "Mariara"}, {
                "value": 1,
                "color": "#9a171c",
                "highlight": "#9a171c",
                "label": "Guaiuba"
            }, {"value": 1, "color": "#54fd22", "highlight": "#54fd22", "label": "Una"}, {
                "value": 1,
                "color": "#f88f47",
                "highlight": "#f88f47",
                "label": "Mariano J. Haedo"
            }, {"value": 1, "color": "#e43ed2", "highlight": "#e43ed2", "label": "Ijui"}, {
                "value": 1,
                "color": "#700891",
                "highlight": "#700891",
                "label": "Brandon"
            }, {
                "value": 1,
                "color": "#a85ada",
                "highlight": "#a85ada",
                "label": "Oliveira de Azem\u00e9is"
            }, {"value": 1, "color": "#ed09aa", "highlight": "#ed09aa", "label": "Vasastan"}, {
                "value": 1,
                "color": "#622650",
                "highlight": "#622650",
                "label": "Bajang"
            }, {"value": 1, "color": "#70285f", "highlight": "#70285f", "label": "Braunas"}, {
                "value": 1,
                "color": "#821f95",
                "highlight": "#821f95",
                "label": "Tatuape"
            }, {"value": 1, "color": "#ee9459", "highlight": "#ee9459", "label": "Aguia Branca"}, {
                "value": 1,
                "color": "#fe2b59",
                "highlight": "#fe2b59",
                "label": "Saint John"
            }, {"value": 1, "color": "#59dd0a", "highlight": "#59dd0a", "label": "Denver"}, {
                "value": 1,
                "color": "#412afe",
                "highlight": "#412afe",
                "label": "Angicos"
            }, {"value": 1, "color": "#1aa02b", "highlight": "#1aa02b", "label": "Duffel"}, {
                "value": 1,
                "color": "#7eef96",
                "highlight": "#7eef96",
                "label": "Pound"
            }, {"value": 1, "color": "#2ef863", "highlight": "#2ef863", "label": "Iparanga"}, {
                "value": 1,
                "color": "#41043b",
                "highlight": "#41043b",
                "label": "Muko"
            }, {"value": 1, "color": "#4f6a1c", "highlight": "#4f6a1c", "label": "San Gregorio Atlapulco"}, {
                "value": 1,
                "color": "#8be631",
                "highlight": "#8be631",
                "label": "Agudo"
            }, {"value": 1, "color": "#614216", "highlight": "#614216", "label": "Hialeah"}, {
                "value": 1,
                "color": "#1b8650",
                "highlight": "#1b8650",
                "label": "Valatie"
            }, {"value": 1, "color": "#e0a683", "highlight": "#e0a683", "label": "Acu"}, {
                "value": 1,
                "color": "#d9644b",
                "highlight": "#d9644b",
                "label": "Blairsville"
            }, {"value": 1, "color": "#6d920e", "highlight": "#6d920e", "label": "Cangonhal"}, {
                "value": 1,
                "color": "#264bfa",
                "highlight": "#264bfa",
                "label": "Champaign"
            }, {"value": 1, "color": "#46c93a", "highlight": "#46c93a", "label": "Campo Alegre"}, {
                "value": 1,
                "color": "#7d9615",
                "highlight": "#7d9615",
                "label": "Glendale"
            }, {"value": 1, "color": "#64e394", "highlight": "#64e394", "label": "Burpengary"}, {
                "value": 1,
                "color": "#2b55bc",
                "highlight": "#2b55bc",
                "label": "Scarborough"
            }, {"value": 1, "color": "#1e6ccb", "highlight": "#1e6ccb", "label": "Cordeiro"}, {
                "value": 1,
                "color": "#b20f8a",
                "highlight": "#b20f8a",
                "label": "Cedral"
            }, {"value": 1, "color": "#6065e1", "highlight": "#6065e1", "label": "Tupancireta"}, {
                "value": 1,
                "color": "#84edfa",
                "highlight": "#84edfa",
                "label": "Pruszk\u00f3w"
            }, {"value": 1, "color": "#38cea0", "highlight": "#38cea0", "label": "Santa Maria da Serra"}, {
                "value": 1,
                "color": "#798033",
                "highlight": "#798033",
                "label": "Magallanes"
            }, {"value": 1, "color": "#b6ae0a", "highlight": "#b6ae0a", "label": "Landskrona"}, {
                "value": 1,
                "color": "#84d49b",
                "highlight": "#84d49b",
                "label": "Green Point"
            }, {"value": 1, "color": "#a728ca", "highlight": "#a728ca", "label": "Mundubim"}, {
                "value": 1,
                "color": "#258e99",
                "highlight": "#258e99",
                "label": "Warrawee"
            }, {"value": 1, "color": "#702692", "highlight": "#702692", "label": "Jaguaquara"}, {
                "value": 1,
                "color": "#e70009",
                "highlight": "#e70009",
                "label": "Paranoa"
            }, {"value": 1, "color": "#43d5d7", "highlight": "#43d5d7", "label": "Alto Araguaia"}, {
                "value": 1,
                "color": "#94810a",
                "highlight": "#94810a",
                "label": "Brighton"
            }, {"value": 1, "color": "#5f3d7a", "highlight": "#5f3d7a", "label": "Norwalk"}, {
                "value": 1,
                "color": "#6c7630",
                "highlight": "#6c7630",
                "label": "Guayaquil"
            }, {"value": 1, "color": "#dcacb4", "highlight": "#dcacb4", "label": "Santa Gertrudes"}, {
                "value": 1,
                "color": "#b64fb3",
                "highlight": "#b64fb3",
                "label": "Cornell\u00e0 de Llobregat"
            }, {"value": 1, "color": "#325709", "highlight": "#325709", "label": "Chilliwack"}, {
                "value": 1,
                "color": "#44f98c",
                "highlight": "#44f98c",
                "label": "Granja"
            }, {"value": 1, "color": "#6927e9", "highlight": "#6927e9", "label": "Mililani Town"}, {
                "value": 1,
                "color": "#771698",
                "highlight": "#771698",
                "label": "Itapora"
            }, {"value": 1, "color": "#5d444b", "highlight": "#5d444b", "label": "Bicas"}, {
                "value": 1,
                "color": "#cba2c7",
                "highlight": "#cba2c7",
                "label": "Planura"
            }, {"value": 1, "color": "#2e3578", "highlight": "#2e3578", "label": "Olivos"}, {
                "value": 1,
                "color": "#46ec7f",
                "highlight": "#46ec7f",
                "label": "Besan\u00e7on"
            }, {"value": 1, "color": "#8c944b", "highlight": "#8c944b", "label": "Williamsburg"}, {
                "value": 1,
                "color": "#7bfe84",
                "highlight": "#7bfe84",
                "label": "Santa Adelia"
            }, {"value": 1, "color": "#f846f1", "highlight": "#f846f1", "label": "Newport"}, {
                "value": 1,
                "color": "#960a06",
                "highlight": "#960a06",
                "label": "Alamo"
            }, {"value": 1, "color": "#a1791c", "highlight": "#a1791c", "label": "Jaguarao"}, {
                "value": 1,
                "color": "#a67ea3",
                "highlight": "#a67ea3",
                "label": "Gamelotal"
            }, {"value": 1, "color": "#551b4e", "highlight": "#551b4e", "label": "Kettering"}, {
                "value": 1,
                "color": "#3cfa05",
                "highlight": "#3cfa05",
                "label": "Lake Villa"
            }, {"value": 1, "color": "#52e27a", "highlight": "#52e27a", "label": "Southampton"}, {
                "value": 1,
                "color": "#9d2754",
                "highlight": "#9d2754",
                "label": "Jerez de Garcia Salinas"
            }, {"value": 1, "color": "#a17d74", "highlight": "#a17d74", "label": "Quartu Sant'Elena"}, {
                "value": 1,
                "color": "#29de16",
                "highlight": "#29de16",
                "label": "Cambuquira"
            }, {"value": 1, "color": "#eb25bd", "highlight": "#eb25bd", "label": "Condor"}, {
                "value": 1,
                "color": "#ea1b0b",
                "highlight": "#ea1b0b",
                "label": "Spring Valley"
            }, {"value": 1, "color": "#d43109", "highlight": "#d43109", "label": "Quatro Barras"}, {
                "value": 1,
                "color": "#de02cf",
                "highlight": "#de02cf",
                "label": "Sobral"
            }, {"value": 1, "color": "#81cf70", "highlight": "#81cf70", "label": "Florence"}, {
                "value": 1,
                "color": "#e3c950",
                "highlight": "#e3c950",
                "label": "Lyon"
            }, {"value": 1, "color": "#3e2772", "highlight": "#3e2772", "label": "El Alto Culiacan"}, {
                "value": 1,
                "color": "#b9e287",
                "highlight": "#b9e287",
                "label": "Amsterdam"
            }, {"value": 1, "color": "#9f94b5", "highlight": "#9f94b5", "label": "Nova Luzitania"}, {
                "value": 1,
                "color": "#719993",
                "highlight": "#719993",
                "label": "Gua\u00edra"
            }, {"value": 1, "color": "#6ee91e", "highlight": "#6ee91e", "label": "Ljungby"}, {
                "value": 1,
                "color": "#330a7b",
                "highlight": "#330a7b",
                "label": "Francisco Beltrao"
            }, {"value": 1, "color": "#450c4a", "highlight": "#450c4a", "label": "Taio"}, {
                "value": 1,
                "color": "#f3d1b3",
                "highlight": "#f3d1b3",
                "label": "Taperoa"
            }, {
                "value": 1,
                "color": "#b62d86",
                "highlight": "#b62d86",
                "label": "Engenheiro Paulo de Frontin"
            }, {"value": 1, "color": "#8d18d5", "highlight": "#8d18d5", "label": "Capitao Poco"}, {
                "value": 1,
                "color": "#154735",
                "highlight": "#154735",
                "label": "Servion"
            }, {"value": 1, "color": "#390788", "highlight": "#390788", "label": "Porvenir"}, {
                "value": 1,
                "color": "#ea1563",
                "highlight": "#ea1563",
                "label": "Beverley"
            }, {"value": 1, "color": "#afae9f", "highlight": "#afae9f", "label": "Ciudad Frontera"}, {
                "value": 1,
                "color": "#283e31",
                "highlight": "#283e31",
                "label": "Mohnton"
            }, {"value": 1, "color": "#7ed638", "highlight": "#7ed638", "label": "Paran\u00e1"}, {
                "value": 1,
                "color": "#da53c5",
                "highlight": "#da53c5",
                "label": "Passira"
            }, {"value": 1, "color": "#9e2f7c", "highlight": "#9e2f7c", "label": "Oros"}, {
                "value": 1,
                "color": "#d7cc4f",
                "highlight": "#d7cc4f",
                "label": "Minas"
            }, {"value": 1, "color": "#aff20d", "highlight": "#aff20d", "label": "Car\u00fapano"}, {
                "value": 1,
                "color": "#a47fe8",
                "highlight": "#a47fe8",
                "label": "Sao Joaquim do Monte"
            }, {"value": 1, "color": "#bd3d92", "highlight": "#bd3d92", "label": "V\u00e1rzea"}, {
                "value": 1,
                "color": "#6b0427",
                "highlight": "#6b0427",
                "label": "Buri"
            }, {"value": 1, "color": "#6400ad", "highlight": "#6400ad", "label": "Chihuahua"}, {
                "value": 1,
                "color": "#cdb17d",
                "highlight": "#cdb17d",
                "label": "Planalto"
            }, {"value": 1, "color": "#42d559", "highlight": "#42d559", "label": "Watertown"}, {
                "value": 1,
                "color": "#1361fb",
                "highlight": "#1361fb",
                "label": "Las Lomas"
            }, {"value": 1, "color": "#3e9887", "highlight": "#3e9887", "label": "Itapebi"}, {
                "value": 1,
                "color": "#494507",
                "highlight": "#494507",
                "label": "Pudahuel"
            }, {"value": 1, "color": "#b6ee9a", "highlight": "#b6ee9a", "label": "Kaiserslautern"}, {
                "value": 1,
                "color": "#2a4e8f",
                "highlight": "#2a4e8f",
                "label": "Sayama"
            }, {"value": 1, "color": "#2789e1", "highlight": "#2789e1", "label": "Agua"}, {
                "value": 1,
                "color": "#72bc60",
                "highlight": "#72bc60",
                "label": "Galway"
            }, {"value": 1, "color": "#4a34ff", "highlight": "#4a34ff", "label": "Bartlett"}, {
                "value": 1,
                "color": "#805489",
                "highlight": "#805489",
                "label": "Ostr\u00f3w Wielkopolski"
            }, {"value": 1, "color": "#39fb28", "highlight": "#39fb28", "label": "Tecoman"}, {
                "value": 1,
                "color": "#852c95",
                "highlight": "#852c95",
                "label": "Fatima"
            }, {"value": 1, "color": "#fa7643", "highlight": "#fa7643", "label": "Quitandinha"}, {
                "value": 1,
                "color": "#b0cd50",
                "highlight": "#b0cd50",
                "label": "Powerview"
            }, {
                "value": 1,
                "color": "#443925",
                "highlight": "#443925",
                "label": "Sao Sebastiao do Tocantins"
            }, {"value": 1, "color": "#db9b34", "highlight": "#db9b34", "label": "Prescott"}, {
                "value": 1,
                "color": "#fb233b",
                "highlight": "#fb233b",
                "label": "Panambi"
            }, {"value": 1, "color": "#74bace", "highlight": "#74bace", "label": "Ville-Marie"}, {
                "value": 1,
                "color": "#ea5539",
                "highlight": "#ea5539",
                "label": "Brewster"
            }, {"value": 1, "color": "#91f552", "highlight": "#91f552", "label": "H\u00e4rn\u00f6sand"}, {
                "value": 1,
                "color": "#c6dd75",
                "highlight": "#c6dd75",
                "label": "Campos Altos"
            }, {"value": 1, "color": "#394bab", "highlight": "#394bab", "label": "Joa\u00e7aba"}, {
                "value": 1,
                "color": "#e83a14",
                "highlight": "#e83a14",
                "label": "Junqueiro"
            }, {"value": 1, "color": "#2620dd", "highlight": "#2620dd", "label": "Cordova"}, {
                "value": 1,
                "color": "#a8ebd1",
                "highlight": "#a8ebd1",
                "label": "Bryan"
            }, {"value": 1, "color": "#e7380e", "highlight": "#e7380e", "label": "Alexandria"}, {
                "value": 1,
                "color": "#946c2b",
                "highlight": "#946c2b",
                "label": "Valle Hermoso"
            }, {"value": 1, "color": "#5fdacb", "highlight": "#5fdacb", "label": "Mission"}, {
                "value": 1,
                "color": "#99590e",
                "highlight": "#99590e",
                "label": "East Chicago"
            }, {"value": 1, "color": "#60eba3", "highlight": "#60eba3", "label": "Sanford"}, {
                "value": 1,
                "color": "#df4ebf",
                "highlight": "#df4ebf",
                "label": "Solidaridad"
            }, {"value": 1, "color": "#d2938c", "highlight": "#d2938c", "label": "Aguas Lindas"}, {
                "value": 1,
                "color": "#760335",
                "highlight": "#760335",
                "label": "Guaramirim"
            }, {"value": 1, "color": "#b1c8ee", "highlight": "#b1c8ee", "label": "Blacktown"}, {
                "value": 1,
                "color": "#26e320",
                "highlight": "#26e320",
                "label": "Midway"
            }, {"value": 1, "color": "#601c0f", "highlight": "#601c0f", "label": "Paraguacu"}, {
                "value": 1,
                "color": "#7a5c45",
                "highlight": "#7a5c45",
                "label": "Eilat"
            }, {"value": 1, "color": "#d1fe6e", "highlight": "#d1fe6e", "label": "McAllen"}, {
                "value": 1,
                "color": "#a9e0d6",
                "highlight": "#a9e0d6",
                "label": "S\u00e3o Sebasti\u00e3o Para\u00edso"
            }, {"value": 1, "color": "#8db94f", "highlight": "#8db94f", "label": "Dianella"}, {
                "value": 1,
                "color": "#5f8c99",
                "highlight": "#5f8c99",
                "label": "Oakville"
            }, {"value": 1, "color": "#8ac6c0", "highlight": "#8ac6c0", "label": "Jeddah"}, {
                "value": 1,
                "color": "#5d2ec1",
                "highlight": "#5d2ec1",
                "label": "Skoldinge"
            }, {"value": 1, "color": "#bf5b45", "highlight": "#bf5b45", "label": "Amadora"}, {
                "value": 1,
                "color": "#44cee3",
                "highlight": "#44cee3",
                "label": "Krosno"
            }, {"value": 1, "color": "#4fc926", "highlight": "#4fc926", "label": "Sudbury"}, {
                "value": 1,
                "color": "#f501b0",
                "highlight": "#f501b0",
                "label": "Diamantina"
            }, {"value": 1, "color": "#b825c0", "highlight": "#b825c0", "label": "Xanxer\u00ea"}, {
                "value": 1,
                "color": "#c2526c",
                "highlight": "#c2526c",
                "label": "Carlton"
            }, {"value": 1, "color": "#9ee18e", "highlight": "#9ee18e", "label": "Celina"}, {
                "value": 1,
                "color": "#48cf26",
                "highlight": "#48cf26",
                "label": "Kubu"
            }, {"value": 1, "color": "#23b283", "highlight": "#23b283", "label": "Hiroshima"}, {
                "value": 1,
                "color": "#82bf45",
                "highlight": "#82bf45",
                "label": "Yonkers"
            }, {"value": 1, "color": "#c2ddff", "highlight": "#c2ddff", "label": "Barranqueras"}, {
                "value": 1,
                "color": "#fda572",
                "highlight": "#fda572",
                "label": "Metz"
            }, {"value": 1, "color": "#527e26", "highlight": "#527e26", "label": "Nairn"}, {
                "value": 1,
                "color": "#d5f024",
                "highlight": "#d5f024",
                "label": "Malta"
            }, {"value": 1, "color": "#895312", "highlight": "#895312", "label": "Marshfield"}, {
                "value": 1,
                "color": "#3eb367",
                "highlight": "#3eb367",
                "label": "Aldama"
            }, {"value": 1, "color": "#c75070", "highlight": "#c75070", "label": "Sound Beach"}, {
                "value": 1,
                "color": "#55141c",
                "highlight": "#55141c",
                "label": "Moncton"
            }, {"value": 1, "color": "#2115a8", "highlight": "#2115a8", "label": "Brive-la-Gaillarde"}, {
                "value": 1,
                "color": "#50939a",
                "highlight": "#50939a",
                "label": "Itabirito"
            }, {"value": 1, "color": "#ed5c7e", "highlight": "#ed5c7e", "label": "Cabeceiras"}, {
                "value": 1,
                "color": "#9462c1",
                "highlight": "#9462c1",
                "label": "Santa Mar\u00eda Acuitlapilco"
            }, {"value": 1, "color": "#a34789", "highlight": "#a34789", "label": "Agua Viva"}, {
                "value": 1,
                "color": "#ae8922",
                "highlight": "#ae8922",
                "label": "Aracuai"
            }, {"value": 1, "color": "#6c6190", "highlight": "#6c6190", "label": "Spring Grove"}, {
                "value": 1,
                "color": "#305864",
                "highlight": "#305864",
                "label": "Tlajomulco de Zuniga"
            }, {"value": 1, "color": "#34fe27", "highlight": "#34fe27", "label": "Para de Minas"}, {
                "value": 1,
                "color": "#172f8d",
                "highlight": "#172f8d",
                "label": "Newburgh"
            }, {"value": 1, "color": "#3d7181", "highlight": "#3d7181", "label": "Solonopole"}, {
                "value": 1,
                "color": "#8d86f6",
                "highlight": "#8d86f6",
                "label": "Ventanilla"
            }, {"value": 1, "color": "#4291a2", "highlight": "#4291a2", "label": "Clementina"}, {
                "value": 1,
                "color": "#c05bde",
                "highlight": "#c05bde",
                "label": "Caldas Novas"
            }, {"value": 1, "color": "#d71188", "highlight": "#d71188", "label": "Garuva"}, {
                "value": 1,
                "color": "#78c797",
                "highlight": "#78c797",
                "label": "Pongai"
            }, {"value": 1, "color": "#e95832", "highlight": "#e95832", "label": "Vieux-Saint-Laurent"}, {
                "value": 1,
                "color": "#56b483",
                "highlight": "#56b483",
                "label": "Caxambu"
            }, {"value": 1, "color": "#c5847d", "highlight": "#c5847d", "label": "Davis"}, {
                "value": 1,
                "color": "#be87fb",
                "highlight": "#be87fb",
                "label": "Maracena"
            }, {"value": 1, "color": "#816d04", "highlight": "#816d04", "label": "Quirihue"}, {
                "value": 1,
                "color": "#e58084",
                "highlight": "#e58084",
                "label": "Novais"
            }, {"value": 1, "color": "#2a0f25", "highlight": "#2a0f25", "label": "Spruce Grove"}, {
                "value": 1,
                "color": "#a76ed8",
                "highlight": "#a76ed8",
                "label": "San Fernando"
            }, {"value": 1, "color": "#b17ceb", "highlight": "#b17ceb", "label": "El Pinar"}, {
                "value": 1,
                "color": "#d70e15",
                "highlight": "#d70e15",
                "label": "Rogers"
            }, {"value": 1, "color": "#dd88c6", "highlight": "#dd88c6", "label": "Cacapava do Sul"}, {
                "value": 1,
                "color": "#f0e7ef",
                "highlight": "#f0e7ef",
                "label": "Farmingdale"
            }, {"value": 1, "color": "#7eaac1", "highlight": "#7eaac1", "label": "Sun Valley"}, {
                "value": 1,
                "color": "#6b34ed",
                "highlight": "#6b34ed",
                "label": "Goiatuba"
            }, {"value": 1, "color": "#59e9d8", "highlight": "#59e9d8", "label": "Sarzedo"}, {
                "value": 1,
                "color": "#342575",
                "highlight": "#342575",
                "label": "Sao Sebastiao"
            }, {"value": 1, "color": "#b91c54", "highlight": "#b91c54", "label": "C\u00e1ceres"}, {
                "value": 1,
                "color": "#c602aa",
                "highlight": "#c602aa",
                "label": "Talagante"
            }, {"value": 1, "color": "#32455d", "highlight": "#32455d", "label": "Andradas"}, {
                "value": 1,
                "color": "#ab2f90",
                "highlight": "#ab2f90",
                "label": "Sao Mateus do Sul"
            }, {"value": 1, "color": "#be93da", "highlight": "#be93da", "label": "Torrance"}, {
                "value": 1,
                "color": "#83a3ae",
                "highlight": "#83a3ae",
                "label": "Ciudad Bol\u00edvar"
            }, {"value": 1, "color": "#77bb55", "highlight": "#77bb55", "label": "Wilde"}, {
                "value": 1,
                "color": "#d6d8ef",
                "highlight": "#d6d8ef",
                "label": "Ciudad del Este"
            }, {"value": 1, "color": "#da13be", "highlight": "#da13be", "label": "Edison"}, {
                "value": 1,
                "color": "#5565c0",
                "highlight": "#5565c0",
                "label": "Kew"
            }, {"value": 1, "color": "#fe1d94", "highlight": "#fe1d94", "label": "Pacajus"}, {
                "value": 1,
                "color": "#4e7d8d",
                "highlight": "#4e7d8d",
                "label": "Wickford"
            }, {"value": 1, "color": "#90089d", "highlight": "#90089d", "label": "Tejucuoca"}, {
                "value": 1,
                "color": "#4b06a7",
                "highlight": "#4b06a7",
                "label": "Dias davila"
            }, {"value": 1, "color": "#6cec89", "highlight": "#6cec89", "label": "Wolli Creek"}, {
                "value": 1,
                "color": "#f62d21",
                "highlight": "#f62d21",
                "label": "Junqueiropolis"
            }, {
                "value": 1,
                "color": "#490dd2",
                "highlight": "#490dd2",
                "label": "Santo Antonio da Alegria"
            }, {"value": 1, "color": "#6a1080", "highlight": "#6a1080", "label": "Toluca"}, {
                "value": 1,
                "color": "#f54cf2",
                "highlight": "#f54cf2",
                "label": "Babica"
            }, {"value": 1, "color": "#b03eaf", "highlight": "#b03eaf", "label": "Ecoporanga"}, {
                "value": 1,
                "color": "#2d27f5",
                "highlight": "#2d27f5",
                "label": "Simrishamn"
            }, {"value": 1, "color": "#ff1e55", "highlight": "#ff1e55", "label": "Saint Albans Bay"}, {
                "value": 1,
                "color": "#f2e107",
                "highlight": "#f2e107",
                "label": "Greenleaf"
            }, {"value": 1, "color": "#954930", "highlight": "#954930", "label": "Areiopolis"}, {
                "value": 1,
                "color": "#371312",
                "highlight": "#371312",
                "label": "Rio das Pedras"
            }, {"value": 1, "color": "#dc288b", "highlight": "#dc288b", "label": "Itai"}, {
                "value": 1,
                "color": "#79726f",
                "highlight": "#79726f",
                "label": "West Covina"
            }, {"value": 1, "color": "#660a1a", "highlight": "#660a1a", "label": "Lagoa do Ouro"}, {
                "value": 1,
                "color": "#ba927a",
                "highlight": "#ba927a",
                "label": "Kverva"
            }, {"value": 1, "color": "#40c2a9", "highlight": "#40c2a9", "label": "Culpeper"}, {
                "value": 1,
                "color": "#4078f4",
                "highlight": "#4078f4",
                "label": "Buffalo"
            }, {"value": 1, "color": "#2576a0", "highlight": "#2576a0", "label": "Gubin"}, {
                "value": 1,
                "color": "#19886e",
                "highlight": "#19886e",
                "label": "Goleszow"
            }, {"value": 1, "color": "#75e015", "highlight": "#75e015", "label": "Yumbel"}, {
                "value": 1,
                "color": "#5b99b3",
                "highlight": "#5b99b3",
                "label": "Bochnia"
            }, {"value": 1, "color": "#210c2f", "highlight": "#210c2f", "label": "Allen"}, {
                "value": 1,
                "color": "#d6f41c",
                "highlight": "#d6f41c",
                "label": "Plaza Huincul"
            }, {"value": 1, "color": "#c1d65d", "highlight": "#c1d65d", "label": "Hindman"}, {
                "value": 1,
                "color": "#166532",
                "highlight": "#166532",
                "label": "Harwich"
            }, {"value": 1, "color": "#1bffe5", "highlight": "#1bffe5", "label": "Beenleigh"}, {
                "value": 1,
                "color": "#c2874a",
                "highlight": "#c2874a",
                "label": "Ermington"
            }, {"value": 1, "color": "#d4fb7e", "highlight": "#d4fb7e", "label": "Icara"}, {
                "value": 1,
                "color": "#9cae94",
                "highlight": "#9cae94",
                "label": "Bergen"
            }, {"value": 1, "color": "#b88ffb", "highlight": "#b88ffb", "label": "Eneida"}, {
                "value": 1,
                "color": "#dbf37f",
                "highlight": "#dbf37f",
                "label": "Rub\u00ed"
            }, {"value": 1, "color": "#1efa8f", "highlight": "#1efa8f", "label": "Warwick"}, {
                "value": 1,
                "color": "#c39ab1",
                "highlight": "#c39ab1",
                "label": "Pirapora"
            }, {"value": 1, "color": "#abcd03", "highlight": "#abcd03", "label": "Caririacu"}, {
                "value": 1,
                "color": "#f8a1be",
                "highlight": "#f8a1be",
                "label": "Tavistock"
            }, {"value": 1, "color": "#8ed874", "highlight": "#8ed874", "label": "Hekinan"}, {
                "value": 1,
                "color": "#d41266",
                "highlight": "#d41266",
                "label": "Jiutepec"
            }, {"value": 1, "color": "#aa8d82", "highlight": "#aa8d82", "label": "Buzios"}, {
                "value": 1,
                "color": "#5c2ef2",
                "highlight": "#5c2ef2",
                "label": "Cinco Saltos"
            }, {"value": 1, "color": "#2dc67f", "highlight": "#2dc67f", "label": "Colonia Benito Juarez"}, {
                "value": 1,
                "color": "#ff59e5",
                "highlight": "#ff59e5",
                "label": "Tromsdalen"
            }, {"value": 1, "color": "#c8f855", "highlight": "#c8f855", "label": "Granollers"}, {
                "value": 1,
                "color": "#875e74",
                "highlight": "#875e74",
                "label": "Caripito"
            }, {"value": 1, "color": "#7f4467", "highlight": "#7f4467", "label": "Cypress"}, {
                "value": 1,
                "color": "#b24f08",
                "highlight": "#b24f08",
                "label": "Monte Alegre do Sul"
            }, {
                "value": 1,
                "color": "#186659",
                "highlight": "#186659",
                "label": "Riach\u00e3o Do Jacu\u00edpe"
            }, {"value": 1, "color": "#436033", "highlight": "#436033", "label": "Sales Oliveira"}, {
                "value": 1,
                "color": "#d2a51c",
                "highlight": "#d2a51c",
                "label": "Georgetown"
            }, {"value": 1, "color": "#9ecfa9", "highlight": "#9ecfa9", "label": "Orem"}, {
                "value": 1,
                "color": "#7717a7",
                "highlight": "#7717a7",
                "label": "Sao Sebastiao do Cai"
            }, {"value": 1, "color": "#a5c7e8", "highlight": "#a5c7e8", "label": "Sacramento"}, {
                "value": 1,
                "color": "#205b7f",
                "highlight": "#205b7f",
                "label": "Itagi"
            }, {"value": 1, "color": "#c19662", "highlight": "#c19662", "label": "Twin Falls"}, {
                "value": 1,
                "color": "#8d79e2",
                "highlight": "#8d79e2",
                "label": "Antonina"
            }, {"value": 1, "color": "#cd4703", "highlight": "#cd4703", "label": "Elblag"}, {
                "value": 1,
                "color": "#de18dd",
                "highlight": "#de18dd",
                "label": "Esteban Echeverria"
            }, {"value": 1, "color": "#7d0875", "highlight": "#7d0875", "label": "Lake Charles"}, {
                "value": 1,
                "color": "#70356e",
                "highlight": "#70356e",
                "label": "Faxinalzinho"
            }, {"value": 1, "color": "#fe2ec1", "highlight": "#fe2ec1", "label": "Philadelphia"}, {
                "value": 1,
                "color": "#f6dc08",
                "highlight": "#f6dc08",
                "label": "Itueta"
            }, {"value": 1, "color": "#f323d3", "highlight": "#f323d3", "label": "Sao Miguel Arcanjo"}, {
                "value": 1,
                "color": "#37ced0",
                "highlight": "#37ced0",
                "label": "Bekasi"
            }, {"value": 1, "color": "#c7efd5", "highlight": "#c7efd5", "label": "Baton Rouge"}, {
                "value": 1,
                "color": "#3c70b1",
                "highlight": "#3c70b1",
                "label": "Atlixco"
            }, {"value": 1, "color": "#eb18f4", "highlight": "#eb18f4", "label": "Guapore"}, {
                "value": 1,
                "color": "#cf27e7",
                "highlight": "#cf27e7",
                "label": "Nova Aurora"
            }, {"value": 1, "color": "#ea1dfc", "highlight": "#ea1dfc", "label": "Avanhandava"}, {
                "value": 1,
                "color": "#b4571a",
                "highlight": "#b4571a",
                "label": "Cotipora"
            }, {"value": 1, "color": "#3ef18f", "highlight": "#3ef18f", "label": "Sete Ponte"}, {
                "value": 1,
                "color": "#143061",
                "highlight": "#143061",
                "label": "Ellenbrook"
            }, {"value": 1, "color": "#ade409", "highlight": "#ade409", "label": "Reseda"}, {
                "value": 1,
                "color": "#60d5c6",
                "highlight": "#60d5c6",
                "label": "Labrador"
            }, {"value": 1, "color": "#16771c", "highlight": "#16771c", "label": "Mendes"}, {
                "value": 1,
                "color": "#a42e79",
                "highlight": "#a42e79",
                "label": "Sao Domingos do Prata"
            }, {"value": 1, "color": "#35b2ea", "highlight": "#35b2ea", "label": "Janesville"}, {
                "value": 1,
                "color": "#1d605c",
                "highlight": "#1d605c",
                "label": "Vargem Grande do Sul"
            }, {"value": 1, "color": "#cf43d9", "highlight": "#cf43d9", "label": "Campo Magro"}, {
                "value": 1,
                "color": "#2dc432",
                "highlight": "#2dc432",
                "label": "Ciudad Delicias"
            }, {"value": 1, "color": "#e01592", "highlight": "#e01592", "label": "Belmore"}, {
                "value": 1,
                "color": "#fee9d2",
                "highlight": "#fee9d2",
                "label": "Quintao"
            }, {"value": 1, "color": "#c5ddab", "highlight": "#c5ddab", "label": "Oriente"}, {
                "value": 1,
                "color": "#aa54df",
                "highlight": "#aa54df",
                "label": "Jalostotitlan"
            }, {"value": 1, "color": "#11b589", "highlight": "#11b589", "label": "The Bronx"}, {
                "value": 1,
                "color": "#8accb0",
                "highlight": "#8accb0",
                "label": "Catu"
            }, {"value": 1, "color": "#490f7d", "highlight": "#490f7d", "label": "Oak Lawn"}, {
                "value": 1,
                "color": "#f0db37",
                "highlight": "#f0db37",
                "label": "Capela do Alto"
            }, {"value": 1, "color": "#db2ee9", "highlight": "#db2ee9", "label": "Kansas City"}, {
                "value": 1,
                "color": "#385bbc",
                "highlight": "#385bbc",
                "label": "Uni\u00e3o Da Victoria"
            }, {"value": 1, "color": "#df3873", "highlight": "#df3873", "label": "Rio Piracicaba"}, {
                "value": 1,
                "color": "#9a3bd9",
                "highlight": "#9a3bd9",
                "label": "Murdoch"
            }, {"value": 1, "color": "#58cc31", "highlight": "#58cc31", "label": "New Bedford"}, {
                "value": 1,
                "color": "#84ca4c",
                "highlight": "#84ca4c",
                "label": "Ivaipora"
            }, {"value": 1, "color": "#18b966", "highlight": "#18b966", "label": "Kingswood"}, {
                "value": 1,
                "color": "#1232c8",
                "highlight": "#1232c8",
                "label": "Aoicho"
            }, {"value": 1, "color": "#45f8c1", "highlight": "#45f8c1", "label": "Ipswich"}, {
                "value": 1,
                "color": "#91ef1c",
                "highlight": "#91ef1c",
                "label": "Evergreen"
            }, {"value": 1, "color": "#b36468", "highlight": "#b36468", "label": "T\u00f8nsberg"}, {
                "value": 1,
                "color": "#c0aed9",
                "highlight": "#c0aed9",
                "label": "Cabrobo"
            }, {"value": 1, "color": "#a1fec1", "highlight": "#a1fec1", "label": "Moema"}, {
                "value": 1,
                "color": "#dd8e62",
                "highlight": "#dd8e62",
                "label": "Ciudad Nicol\u00e1s Romero"
            }, {"value": 1, "color": "#5e1024", "highlight": "#5e1024", "label": "Russell Island"}, {
                "value": 1,
                "color": "#690403",
                "highlight": "#690403",
                "label": "Arequipa"
            }, {"value": 1, "color": "#3fdcc0", "highlight": "#3fdcc0", "label": "Sao Lourenco da Serra"}, {
                "value": 1,
                "color": "#dbaf65",
                "highlight": "#dbaf65",
                "label": "Toru?"
            }, {"value": 1, "color": "#eebb62", "highlight": "#eebb62", "label": "Rio Acima"}, {
                "value": 1,
                "color": "#14e90b",
                "highlight": "#14e90b",
                "label": "Salesopolis"
            }, {"value": 1, "color": "#e3929d", "highlight": "#e3929d", "label": "Kangaroo Flat"}, {
                "value": 1,
                "color": "#1117fc",
                "highlight": "#1117fc",
                "label": "Sundbyberg"
            }, {"value": 1, "color": "#9cde1b", "highlight": "#9cde1b", "label": "Rafael Lucio"}, {
                "value": 1,
                "color": "#914f50",
                "highlight": "#914f50",
                "label": "Gladesville"
            }, {"value": 1, "color": "#e88f35", "highlight": "#e88f35", "label": "Queluz"}, {
                "value": 1,
                "color": "#956e26",
                "highlight": "#956e26",
                "label": "Brandenburg"
            }, {"value": 1, "color": "#9a278f", "highlight": "#9a278f", "label": "Biritiba Mirim"}, {
                "value": 1,
                "color": "#9aed7b",
                "highlight": "#9aed7b",
                "label": "Rayne"
            }, {"value": 1, "color": "#aa7982", "highlight": "#aa7982", "label": "Wellingborough"}, {
                "value": 1,
                "color": "#144091",
                "highlight": "#144091",
                "label": "Italva"
            }, {"value": 1, "color": "#6fa17a", "highlight": "#6fa17a", "label": "Tres Barras"}, {
                "value": 1,
                "color": "#cc4f99",
                "highlight": "#cc4f99",
                "label": "Iguatu"
            }, {"value": 1, "color": "#533225", "highlight": "#533225", "label": "Oaxaca City"}, {
                "value": 1,
                "color": "#760d75",
                "highlight": "#760d75",
                "label": "Goiana"
            }, {"value": 1, "color": "#ee2f12", "highlight": "#ee2f12", "label": "Cajazeiras"}, {
                "value": 1,
                "color": "#a57408",
                "highlight": "#a57408",
                "label": "Vicente Dutra"
            }, {"value": 1, "color": "#c1fd57", "highlight": "#c1fd57", "label": "Newport Beach"}, {
                "value": 1,
                "color": "#e4f8d0",
                "highlight": "#e4f8d0",
                "label": "La Rinconada"
            }, {"value": 1, "color": "#d385c7", "highlight": "#d385c7", "label": "Barbalha"}, {
                "value": 1,
                "color": "#ac19b1",
                "highlight": "#ac19b1",
                "label": "Lapa"
            }, {"value": 1, "color": "#e02794", "highlight": "#e02794", "label": "Paisley"}, {
                "value": 1,
                "color": "#6eaf9d",
                "highlight": "#6eaf9d",
                "label": "El Paso"
            }, {"value": 1, "color": "#921948", "highlight": "#921948", "label": "Novo Mundo"}, {
                "value": 1,
                "color": "#484e80",
                "highlight": "#484e80",
                "label": "S\u00e3o Miguel Do Guam\u00e1"
            }, {"value": 1, "color": "#f1a6a2", "highlight": "#f1a6a2", "label": "Piacabucu"}, {
                "value": 1,
                "color": "#ce7fdf",
                "highlight": "#ce7fdf",
                "label": "Straumsbukta"
            }, {"value": 1, "color": "#d0956c", "highlight": "#d0956c", "label": "Senhor Do Bonfim"}, {
                "value": 1,
                "color": "#e8f5f7",
                "highlight": "#e8f5f7",
                "label": "Poco Fundo"
            }, {"value": 1, "color": "#d36161", "highlight": "#d36161", "label": "Albertina"}, {
                "value": 1,
                "color": "#8feb73",
                "highlight": "#8feb73",
                "label": "Del Rio"
            }, {"value": 1, "color": "#220efa", "highlight": "#220efa", "label": "Luj\u00e1n"}, {
                "value": 0,
                "color": "#0",
                "highlight": "#0",
                "label": null
            }], opt);

        });
    </script>

@endsection

