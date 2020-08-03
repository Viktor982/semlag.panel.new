@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Adicionar Novo Game:</h2>
    </div>
    <form class="form-horizontal bordered-row" method="POST" enctype="multipart/form-data"
          action="{{ route('games.store') }}">
        <div class="panel">
            <div class="panel-body">
                <div class="example-box-wrapper">
                    <h3 class="title-hero">
                        Informações Básicas:
                    </h3>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nome do Jogo:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control popover-button-default"
                                   placeholder=""
                                   data-content="Adicione o Nome do Jogo EX: Overwatch"
                                   title="Nome" data-trigger="focus" data-placement="top" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fixar Na Home?</label>
                        <div class="col-sm-6">
                            <select class="form-control popover-button-default"
                                    placeholder=""
                                    data-content="Selecione se Você deseja Fixar esse Jogo na Home do site"
                                    title="Fixar Na Home" data-trigger="focus" data-placement="top" name="fixed_cover">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Acesso a Pagina Completa?</label>
                        <div class="col-sm-6">
                            <select class="form-control popover-button-default"
                                    placeholder=""
                                    data-content="Selecione se Você deseja Liberar o Usuário ver Todos os Detalhes do
                                    Jogo Na Pagina de Games"
                                    title="Acesso a Pagina Completa?" data-trigger="focus" data-placement="top"
                                    name="page_access">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Capa do Jogo:</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="file2" name="cover">
                            <p class="help-block">Tamanho da Capa (192x268)</p>
                            <img id="cover-preview" src="#">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Logo do Jogo:</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="file" name="logo">
                            <p class="help-block">Tamanho do Logo (158x65)</p>
                            <img id="logo-preview" src="#">
                        </div>
                    </div>
                    <div class="form-group" id="original-capas">
                        <label class="col-sm-3 control-label">Imagem de Depoimento:</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="capa" name="capa[]" multiple>
                            <p class="help-block">Tamanho do Capa (240x180)</p>
                        </div>
                    </div>
                    <div id="destino-capas">

                    </div>
                    <button type="button" onclick="duplicarCapas();" class="btn btn-black pull-right"><i class="glyph-icon icon-plus"></i>
                        Adicionar Capa
                    </button>
                </div>
            </div>
        </div>
        <!--- ÁREA POST --->
        <div class="panel">
            <div class="panel-body">
                <div class="example-box-wrapper">
                    <h3 class="title-hero">
                        Sobre o Jogo (Português Brasileiro):
                    </h3>
                    <div class="form-group">
                        <label for="subject" class="col-sm-3 control-label">Título:</label>
                        <div class="col-sm-6">
                            <input required id="subject" type="text" name="gfield_title[]" class="form-control"
                                   placeholder="Ex: O Jogo">
                            <input type="hidden" name="gfield_lang[]" value="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Corpo:</label>
                        <div class="col-sm-8">
                            <textarea name="gfield_body[]" class="wysiwyg-editor"></textarea>
                        </div>
                    </div>
                    <h3 class="title-hero">
                        Sobre o Jogo (Inglês):
                    </h3>
                    <div class="form-group">
                        <label for="subject" class="col-sm-3 control-label">Título:</label>
                        <div class="col-sm-6">
                            <input required id="subject" type="text" name="gfield_title[]" class="form-control"
                                   placeholder="Ex: O Jogo">
                        </div>
                    </div>
                    <input type="hidden" name="gfield_lang[]" value="2">
                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Corpo:</label>
                        <div class="col-sm-8">
                            <textarea name="gfield_body[]" class="wysiwyg-editor"></textarea>
                        </div>
                    </div>
                    <h3 class="title-hero">
                        Sobre o Espanhol (Espanhol):
                    </h3>
                    <div class="form-group">
                        <label for="subject" class="col-sm-3 control-label">Título:</label>
                        <div class="col-sm-6">
                            <input required id="subject" type="text" name="gfield_title[]" class="form-control"
                                   placeholder="Ex: O Jogo">
                            <input type="hidden" name="gfield_lang[]" value="3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Corpo:</label>
                        <div class="col-sm-6">
                            <textarea name="gfield_body[]" class="wysiwyg-editor"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject" class="col-sm-3 control-label">Tags:</label>
                        <div class="col-sm-6">
                            <input required id="subject" type="text" name="gtags" class="form-control"
                                   placeholder="Ex: FPS, Overwatch, Online">
                        </div>
                    </div>
                    <!--- ÁREA CHECKBOX --->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Outras Opções:</label>
                        <div class="col-sm-7">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_requirements" name="checkbox_requirements" value="1">
                                Adicionar Requerimentos?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="checkbox_fields" name="checkbox_fields" value="1">
                                Adicionar Campos Do Jogo?
                            </label>
                        </div>
                    </div>
                    <!--- ÁREA END CHECKBOX --->
                </div>
            </div>
        </div>
        <!--- ÁREA END POST --->
        <!--- ÁREA REQUIREMENTS --->
        <div class="panel" id="requeriments" style="display: none">
            <div class="panel-body">
                <div class="example-box-wrapper">
                    <h3 class="title-hero">
                        Requerimentos do Jogo:
                    </h3>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">O que você deseja colocar?</label>
                        <div class="col-sm-7">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_operational_system"
                                       onclick="showDiv('check_operational_system','div_operational_system',
                                       'operational_system')">
                                Sistema Operacional?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_cpu" onclick="showDiv('check_cpu','div_cpu', 'cpu')">
                                Processador?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_gpu" onclick="showDiv('check_gpu','div_gpu', 'gpu')">
                                Placa de Vídeo?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_ram" onclick="showDiv('check_ram','div_ram', 'ram')">
                                Memória?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_disk_space"
                                       onclick="showDiv('check_disk_space','div_disk_space', 'disk_space')">
                                Armazenamento?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_resolution"
                                       onclick="showDiv('check_resolution','div_resolution', 'resolution')">
                                Resolução?
                            </label>
                        </div>
                    </div>
                    <div class="form-group" id="div_operational_system" style="display: none">
                        <label for="subject" class="col-sm-3 control-label">Sistema Operacional:</label>
                        <div class="col-sm-6">
                            <input id="operational_system" type="text" name="operational_system" class="form-control"
                                   placeholder="Ex: Windows 7 / Windows 8 / Windows 10 64-Bit" disabled>
                        </div>
                    </div>
                    <div class="form-group" id="div_cpu" style="display: none">
                        <label for="subject" class="col-sm-3 control-label">Processador:</label>
                        <div class="col-sm-6">
                            <input id="cpu" type="text" name="cpu" class="form-control"
                                   placeholder="Ex: Intel Core I3 3550" disabled>
                        </div>
                    </div>
                    <div class="form-group" id="div_gpu" style="display: none">
                        <label for="subject" class="col-sm-3 control-label">Placa de Vídeo:</label>
                        <div class="col-sm-6">
                            <input id="gpu" type="text" name="gpu" class="form-control"
                                   placeholder="Ex: NVIDIA GEFORCE GT 1050 TI" disabled>
                        </div>
                    </div>
                    <div class="form-group" id="div_ram" style="display: none">
                        <label for="subject" class="col-sm-3 control-label">Memória RAM:</label>
                        <div class="col-sm-6">
                            <input id="ram" type="text" name="ram" class="form-control"
                                   placeholder="Ex: 4 GB" disabled>
                        </div>
                    </div>
                    <div class="form-group" id="div_disk_space" style="display: none">
                        <label for="subject" class="col-sm-3 control-label">Armazenamento:</label>
                        <div class="col-sm-6">
                            <input id="disk_space" type="text" name="disk_space" class="form-control"
                                   placeholder="Ex: 30 GB de espaço disponível em disco" disabled>
                        </div>
                    </div>
                    <div class="form-group" id="div_resolution" style="display: none">
                        <label for="subject" class="col-sm-3 control-label">Resolução:</label>
                        <div class="col-sm-6">
                            <input id="resolution" type="text" name="resolution" class="form-control"
                                   placeholder="Ex: Resolução mínima de 1024x768" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--- AREA END REQUIREMENTS --->
        <!--- AREA FIELDS --->
        <div class="panel" id="fields" style="display: none">
            <div class="panel-body">
                <div class="example-box-wrapper">
                    <div id="page-title">
                        <h2>Campos:</h2>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">O que você deseja colocar?</label>
                        <div class="col-sm-7">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_genre"
                                       onclick="showDiv('check_genre','div_genre', 'genre')">
                                Gênero?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_date"
                                       onclick="showDiv('check_date','div_date', 'date')">
                                Data De Lançamento?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_servers"
                                       onclick="showDiv('check_servers','div_servers', 'servers')">
                                Servidores?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_site"
                                       onclick="showDiv('check_site','div_site', 'site')">
                                Site Oficial?
                            </label>
                        </div>
                    </div>
                    <div class="form-group" id="div_genre" style="display: none">
                        <label for="subject" class="col-sm-3 control-label">Gênero:</label>
                        <div class="col-sm-6">
                            <input id="genre" type="text" name="genre" class="form-control popover-button-default"
                                   data-content="Adicione o Gênero do Jogo aqui."
                                   title="Gênero do Jogo" data-trigger="focus" data-placement="top"
                                   placeholder="Ex: FPS (Tiro em Primeira Pessoa)" disabled>
                        </div>
                    </div>
                    <div class="form-group" id="div_date" style="display: none">
                        <label for="subject" class="col-sm-3 control-label">Data de Lançamento:</label>
                        <div class="col-sm-6">
                            <input id="date" type="text" name="date"
                                   class="bootstrap-datepicker form-control popover-button-default"
                                   data-content="Clique e Selecione a Data de Lançamento do Jogo aqui."
                                   title="Data de Lançamento Do Jogo" data-trigger="focus" data-placement="top"
                                   data-date-format="yy-mm-dd"
                                   placeholder="Ex: 2017-11-12" disabled>
                        </div>
                    </div>
                    <div class="form-group" id="div_servers" style="display: none">
                        <label for="subject" class="col-sm-3 control-label">Servidores:</label>
                        <div class="col-sm-6">
                            <input id="servers" type="text" name="servers" class="form-control  popover-button-default"
                                   data-content="Clique e Selecione a Data de Lançamento do Jogo aqui."
                                   title="Data de Lançamento Do Jogo" data-trigger="focus" data-placement="top"
                                   placeholder="Ex: US, EU e BR" disabled>
                        </div>
                    </div>
                    <div class="form-group" id="div_site" style="display: none">
                        <label for="subject" class="col-sm-3 control-label">Site Oficial:</label>
                        <div class="col-sm-6">
                            <input id="site" type="text" name="site" class="form-control"
                                   placeholder="Ex: playoverwatch.com" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--- AREA END FIELDS --->
        <button type="submit" class="btn btn-success pull-right">Adicionar jogo</button>
        <br class="clearfix">
    </form>
@endsection
@section('extra-scripts')
    <script type="text/javascript">
        /* Datepicker bootstrap */
        $(function () {
            "use strict";
            $('.bootstrap-datepicker').bsdatepicker({
                format: 'yyyy-mm-dd'
            });
        });
        function coverPreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#cover-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        function logoPreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#logo-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file").change(function () {
            logoPreview(this);
        });
        $("#file2").change(function () {
            coverPreview(this);
        });
        function duplicarCampos() {
            var clone = document.getElementById('origem').cloneNode(true);
            var destino = document.getElementById('destino');
            destino.appendChild(clone);
            var camposClonados = clone.getElementsByTagName('input');
            var textareaClonados = clone.getElementsByTagName('textarea');
            for (i = 0; i < camposClonados.length; i++) {
                camposClonados[i].value = '';
                textareaClonados[i].value = '';
            }
        }
        function duplicarCapas() {
            var clone_capa = document.getElementById('original-capas').cloneNode(true);
            var destino_capa = document.getElementById('destino-capas');
            destino_capa.appendChild(clone_capa);
            var capasClonadas = clone_capa.getElementsByTagName('input');
            for (i = 0; i < capasClonadas.length; i++) {
                capasClonadas[i].value = '';
            }
        }
        function removerCampos(id) {
            var node1 = document.getElementById('destino');
            node1.removeChild(node1.childNodes[0]);
        }
        //Toggle Action for checkbox inputs
        jQuery(document).ready(function () {
            $('#check_requirements').click(function () {
                $('#requeriments').toggle();
            });
            $('#checkbox_fields').click(function () {
                $('#fields').toggle();
            });
        });
        function showDiv(checkbox, div, input) {
            $('#' + div).toggle();
            console.log(checkbox, div, input);
            if ($('#' + checkbox).is(':checked')) {
                $('#' + input).prop('disabled', false)
            } else {
                $('#' + input).prop('disabled', true)
                $('#' + input).val('');
            }
        }
    </script>
    <script type='text/javascript'>//<![CDATA[
        $(function () {
            var _URL = window.URL || window.webkitURL;
            $("#file").change(function (e) {
                var image, file;
                if ((file = this.files[0])) {
                    image = new Image();
                    image.onload = function () {
                        if (this.width <= 158 && this.height <= 65) {

                        }
                        else {
                            alert("A Imagem Ultrapassou a Dimensão permitida de 158x65 ");
                            $("#file").val('')
                        }
                    };
                    image.src = _URL.createObjectURL(file);
                }
            });
            $("#file2").change(function (e) {
                var image, file;
                if ((file = this.files[0])) {
                    image = new Image();
                    image.onload = function () {
                        if (this.width <= 192 && this.height <= 268) {

                        }
                        else {
                            alert("A Imagem Ultrapassou a Dimensão permitida de 192x268 ");
                            $("#file2").val('');
                        }
                    };
                    image.src = _URL.createObjectURL(file);
                }
            });
        });//]]>
    </script>
    <script type="text/javascript">
        /* WYSIWYG editor */
        $(function () {
            "use strict";
            $('.wysiwyg-editor').summernote({
                height: 150,
                placeholder: 'Digite aqui sua mensagem.'
            });
        });
    </script>
@endsection


