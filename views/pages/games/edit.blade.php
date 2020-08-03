@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Editar Game - {{ $game->name }} </h2>
    </div>
    <form class="form-horizontal bordered-row" method="POST" enctype="multipart/form-data"
          action="{{ route('games.update', ['id' => $game->id]) }}">
        <div class="panel">
            <div class="panel-body">
                <div class="example-box-wrapper">
                    <h3 class="title-hero">Informações Básicas:</h3>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nome do Jogo:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control popover-button-default"
                                   placeholder=""
                                   data-content="Adicione o Nome do Jogo EX: Overwatch"
                                   title="Nome" data-trigger="focus" data-placement="top" name="name"
                                   value="{{ $game->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fixar Na Home?</label>
                        <div class="col-sm-6">
                            <select class="form-control popover-button-default"
                                    placeholder=""
                                    data-content="Selecione se Você deseja Fixar esse Jogo na Home do site"
                                    title="Fixar Na Home" data-trigger="focus" data-placement="top" name="fixed_cover">
                                <option value="1" {{ ($game->fixed_cover == 1) ? "selected":"" }}>Sim</option>
                                <option value="0" {{ ($game->fixed_cover == 0) ? "selected":"" }}>Não</option>
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
                                <option value="1" {{ ($game->page_access == 1) ? "selected":"" }}>Sim</option>
                                <option value="0" {{ ($game->page_access == 0) ? "selected":"" }}>Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Capa Atual:</label>
                        <div class="col-sm-6">
                            <img src="https://nptunnel.com/npimg/{{$game->cover}}">
                            <p class="help-block">Tamanho da Capa (192x268)</p>
                            <div class="checkbox checkbox-success">
                                <label>
                                    <input type="checkbox" value="1" id="update-cover" class="custom-checkbox"
                                           name="update-cover"> <b>Atualizar Logo?</b>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="new-cover" style="display:none">
                        <label class="col-sm-3 control-label">Capa do Jogo:</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="file2" name="cover">
                            <p class="help-block">Tamanho da Capa (192x268)</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Logo Atual:</label>
                        <div class="col-sm-6">
                            <img src="https://nptunnel.com/npimg/{{$game->image}}">
                            <p class="help-block">Tamanho da Capa (158x65)</p>
                            <div class="checkbox checkbox-success">
                                <label>
                                    <input type="checkbox" value="1" id="update-logo" class="custom-checkbox"
                                           name="update-logo"> <b>Atualizar Logo?</b>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="new-logo" style="display: none">
                        <label class="col-sm-3 control-label" id="new-logo">Logo do Jogo:</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="file" name="logo">
                            <p class="help-block">Tamanho do Logo (158x65)</p>
                        </div>
                    </div>
                    <!--- ÁREA CAPAS DE DEPOIMENTO --->
                    <div class="portfolio-controls mrg10L mrg10R radius-all-4 portfolio-nav-alt bg-black clearfix controls">
                        <div class="container text-center">
                            <ul class="float-none">
                                <h2>Capas de Depoimento:</h2>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix">
                        <ul id="portfolio-grid" class="reset-ul">
                            @foreach($game->testimonialCovers as $testimonialCovers)
                                <li class="col-lg-3 col-sm-6 col-md-4" data-cat="1">
                                    <div class="thumbnail-box">
                                        <a class="thumb-link" data-toggle="modal"
                                           onclick="getValueModal('{{ $testimonialCovers->id  }}','{{ $testimonialCovers->file }}')"
                                           data-target="#delete_cover"></a>
                                        <div class="thumb-content">
                                            <div class="center-vertical">
                                                <div class="center-content">
                                                    <div class="thumb-btn animated rotateIn">
                                                        <small>
                                                            <button class="btn btn-primary">Deletar Essa Capa
                                                            </button>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="thumb-overlay bg-black"></div>
                                        <img src="https://nptunnel.com/npimg/{{ $testimonialCovers->file }}" alt="">
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="divider"></div>
                    <div class="form-group">
                        <div class="checkbox checkbox-success">
                            <label>
                                <input type="checkbox" id="add_new_cover" name="add_new_cover" value="1"
                                       class="custom-checkbox">
                                <b><i class="glyph-icon icon-plus"></i> Adicionar Mais Capas</b>
                            </label>
                        </div>
                    </div>
                    <div id="new_cover" style="display: none">
                        <div class="form-group" id="original-capas">
                            <label class="col-sm-3 control-label">Capa de Depoimento:</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" id="capa[]" name="capa[]" multiple>
                                <p class="help-block">Tamanho do Capa (240x180)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--- ÁREA FIM CAPAS DE DEPOIMENTO --->
        <div class="panel">
            <div class="panel-body">
                <div class="example-box-wrapper">
                    <!--- ÁREA POST --->
                    @foreach($game->publish as $publish)
                        <h3 class="title-hero">
                            Sobre o Jogo ({{ getLang($publish->lang) }}):
                        </h3>
                        <div class="form-group">
                            <label for="subject" class="col-sm-3 control-label">Título:</label>
                            <div class="col-sm-6">
                                <input required id="subject" type="text"
                                       value="{{ (empty($publish->title)) ? "":$publish->title }}"
                                       name="gfield_title[]" class="form-control"
                                       placeholder="Ex: O Jogo">
                                <input type="hidden" name="gfield_lang[]" value="{{ $publish->lang }}">
                                <input type="hidden" name="gfield_id[]" value="{{ $publish->id }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="col-sm-3 control-label">Corpo:</label>
                            <div class="col-sm-6">
                            <textarea name="gfield_body[]"
                                      class="wysiwyg-editor"> {{ (empty($publish->body)) ? "":$publish->body }}</textarea>
                            </div>
                        </div>
                @endforeach
                    <div class="form-group">
                        <label for="subject" class="col-sm-3 control-label">Tags:</label>
                        <div class="col-sm-6">
                            <input required id="subject" type="text" name="gtags" value="{{ (is_null($game->tags)) ? "":$game->tags->tags  }}" class="form-control"
                                   placeholder="Ex: FPS, Overwatch, Online">
                        </div>
                    </div>
                <!--- ÁREA END POST --->
                    <!--- ÁREA CHECKBOX --->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Outras Opções:</label>
                        <div class="col-sm-7">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_requirements"
                                       {{ (($game->requirements->isEmpty())) ? '':'checked' }} name="checkbox_requirements"
                                       value="1">
                                Adicionar Requerimentos?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="checkbox_fields"
                                       {{ (($game->fields->isEmpty())) ? '':'checked' }} name="checkbox_fields"
                                       value="1">
                                Adicionar Campos Do Jogo?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="checkbox_sections"
                                       {{ (($game->sections->isEmpty())) ? '':'checked' }} name="checkbox_section"
                                       value="1">
                                Adicionar Seções?
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--- ÁREA END CHECKBOX --->
        <!--- ÁREA REQUERIMENTS --->
        <div class="panel" id="requeriments"
             style="display:{{ (($game->requirements->isEmpty())) ?  'none':'block'  }}">
            <div class="panel-body">
                <div class="example-box-wrapper">
                    <h3 class="title-hero">
                        Requerimentos do Jogo:
                    </h3>
                    <!--- Checkbox Requirements--->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">O que você deseja inserir?</label>
                        <div class="col-sm-7">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_operational_system"
                                       {{ ($game->requirements->where('title', 'operational_system')->isEmpty()) ? '':'checked' }}
                                       onclick="showDiv('check_operational_system','div_operational_system',
                                       'operational_system')">
                                Sistema Operacional?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_cpu"
                                       {{ ($game->requirements->where('title', 'cpu')->isEmpty()) ? '':'checked' }}
                                       onclick="showDiv('check_cpu','div_cpu', 'cpu')">
                                Processador?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_gpu"
                                       {{ ($game->requirements->where('title', 'gpu')->isEmpty()) ? '':'checked' }}
                                       onclick="showDiv('check_gpu','div_gpu', 'gpu')">
                                Placa de Vídeo?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_ram"
                                       {{ ($game->requirements->where('title', 'ram')->isEmpty()) ? '':'checked' }}
                                       onclick="showDiv('check_ram','div_ram', 'ram')">
                                Memória?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_disk_space"
                                       {{ ($game->requirements->where('title', 'disk_space')->isEmpty()) ? '':'checked' }}
                                       onclick="showDiv('check_disk_space','div_disk_space', 'disk_space')">
                                Armazenamento?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_resolution"
                                       {{ ($game->requirements->where('title', 'resolution')->isEmpty()) ? '':'checked' }}
                                       onclick="showDiv('check_resolution','div_resolution', 'resolution')">
                                Resolução?
                            </label>
                        </div>
                    </div>
                    <!--- Checkbox End Requirements--->
                    <!--- Requirement Fields--->
                    <div class="form-group" id="div_operational_system"
                         style="display: {{ ($game->requirements->where('title', 'operational_system')->isEmpty()) ? 'none':'block' }}">
                        <label for="subject" class="col-sm-3 control-label">Sistema Operacional:</label>
                        <div class="col-sm-6">
                            <input id="operational_system" type="text" name="operational_system" class="form-control"
                                   placeholder="Ex: Windows 7 / Windows 8 / Windows 10 64-Bit"
                                   value="{{ $game->requirements->where('title', 'operational_system')->first()->value }}"
                                    {{ ($game->requirements->where('title', 'operational_system')->isEmpty()) ? 'disabled':'' }}>
                        </div>
                    </div>
                    <div class="form-group" id="div_cpu"
                         style="display: {{ ($game->requirements->where('title', 'cpu')->isEmpty()) ? 'none':'block' }}">
                        <label for="subject" class="col-sm-3 control-label">Processador:</label>
                        <div class="col-sm-6">
                            <input id="cpu" type="text" name="cpu" class="form-control"
                                   placeholder="Ex: Intel Core I3 3550"
                                   value="{{ $game->requirements->where('title', 'cpu')->first()->value }}"
                                    {{ ($game->requirements->where('title', 'cpu')->isEmpty()) ? 'disabled':'' }}>
                        </div>
                    </div>
                    <div class="form-group" id="div_gpu"
                         style="display: {{ ($game->requirements->where('title', 'gpu')->isEmpty()) ? 'none':'block' }}">
                        <label for="subject" class="col-sm-3 control-label">Placa de Vídeo:</label>
                        <div class="col-sm-6">
                            <input id="gpu" type="text" name="gpu" class="form-control"
                                   placeholder="Ex: NVIDIA GEFORCE GT 1050 TI"
                                   value="{{ $game->requirements->where('title', 'gpu')->first()->value }}"
                                    {{ ($game->requirements->where('title', 'gpu')->isEmpty()) ? 'disabled':'' }}>
                        </div>
                    </div>
                    <div class="form-group" id="div_ram"
                         style="display: {{ ($game->requirements->where('title', 'ram')->isEmpty()) ? 'none':'block' }}">
                        <label for="subject" class="col-sm-3 control-label">Memória RAM:</label>
                        <div class="col-sm-6">
                            <input id="ram" type="text" name="ram" class="form-control"
                                   placeholder="Ex: 4 GB"
                                   value="{{ $game->requirements->where('title', 'ram')->first()->value }}"
                                    {{ ($game->requirements->where('title', 'ram')->isEmpty()) ? 'disabled':'' }}>
                        </div>
                    </div>
                    <div class="form-group" id="div_disk_space"
                         style="display: {{ ($game->requirements->where('title', 'disk_space')->isEmpty()) ? 'none':'block' }}">
                        <label for="subject" class="col-sm-3 control-label">Armazenamento:</label>
                        <div class="col-sm-6">
                            <input id="disk_space" type="text" name="disk_space" class="form-control"
                                   placeholder="Ex: 30 GB de espaço disponível em disco"
                                   value="{{ $game->requirements->where('title', 'disk_space')->first()->value }}"
                                    {{ ($game->requirements->where('title', 'disk_space')->isEmpty()) ? 'disabled':'' }}>
                        </div>
                    </div>
                    <div class="form-group" id="div_resolution"
                         style="display: {{ ($game->requirements->where('title', 'resolution')->isEmpty()) ? 'none':'block' }}">
                        <label for="subject" class="col-sm-3 control-label">Resolução:</label>
                        <div class="col-sm-6">
                            <input id="resolution" type="text" name="resolution" class="form-control"
                                   placeholder="Ex: Resolução mínima de 1024x768"
                                   value="{{ $game->requirements->where('title', 'resolution')->first()->value }}"
                                    {{ ($game->requirements->where('title', 'resolution')->isEmpty()) ? 'disabled':'' }}>
                        </div>
                    </div>
                    <!--- Requirement Fields End--->
                </div>
            </div>
        </div>
        <!--- AREA END REQUIREMENTS --->
        <!--- AREA FIELDS --->
        <div class="panel" id="fields" style="display:{{ (($game->fields->isEmpty())) ?  'none':'block'  }}">
            <div class="panel-body">
                <div class="example-box-wrapper">
                    <div id="page-title">
                        <h2>Campos:</h2>
                    </div>
                    <!--- Checkbox Fields--->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">O que você deseja colocar?</label>
                        <div class="col-sm-7">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_genre"
                                       {{ ($game->fields->where('key', 'genre')->isEmpty()) ? '':'checked' }}
                                       onclick="showDiv('check_genre','div_genre', 'genre')">
                                Gênero?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_date"
                                       {{ ($game->fields->where('key', 'date')->isEmpty()) ? '':'checked' }}
                                       onclick="showDiv('check_date','div_date', 'date')">
                                Data De Lançamento?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_servers"
                                       {{ ($game->fields->where('key', 'servers')->isEmpty()) ? '':'checked' }}
                                       onclick="showDiv('check_servers','div_servers', 'servers')">
                                Servidores?
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check_site"
                                       {{ ($game->fields->where('key', 'site')->isEmpty()) ? '':'checked' }}
                                       onclick="showDiv('check_site','div_site', 'site')">
                                Site Oficial?
                            </label>
                        </div>
                    </div>
                    <!--- Checkbox End Fields--->
                    <!--- Fields Input--->
                    <div class="form-group" id="div_genre"
                         style="display: {{ ($game->fields->where('key', 'genre')->isEmpty()) ? 'none':'block' }}">
                        <label for="subject" class="col-sm-3 control-label">Gênero:</label>
                        <div class="col-sm-6">
                            <input id="genre" type="text" name="genre" class="form-control popover-button-default"
                                   data-content="Adicione o Gênero do Jogo aqui."
                                   title="Gênero do Jogo" data-trigger="focus" data-placement="top"
                                   placeholder="Ex: FPS (Tiro em Primeira Pessoa)"
                                   value="{{ $game->fields->where('key', 'genre')->first()->value }}"
                                    {{ ($game->fields->where('key', 'genre')->isEmpty()) ? 'disabled':'' }}>
                        </div>
                    </div>
                    <div class="form-group" id="div_date"
                         style="display: {{ ($game->fields->where('key', 'date')->isEmpty()) ? 'none':'block' }}">
                        <label for="subject" class="col-sm-3 control-label">Data de Lançamento:</label>
                        <div class="col-sm-6">
                            <input id="date" type="text" name="date"
                                   class="bootstrap-datepicker form-control popover-button-default"
                                   data-content="Clique e Selecione a Data de Lançamento do Jogo aqui."
                                   title="Data de Lançamento Do Jogo" data-trigger="focus" data-placement="top"
                                   data-date-format="yy-mm-dd"
                                   placeholder="Ex: 2017-11-12"
                                   value="{{ $game->fields->where('key', 'date')->first()->value }}"
                                    {{ ($game->fields->where('key', 'date')->isEmpty()) ? 'disabled':'' }}>
                        </div>
                    </div>
                    <div class="form-group" id="div_servers"
                         style="display: {{ ($game->fields->where('key', 'servers')->isEmpty()) ? 'none':'block' }}">
                        <label for="subject" class="col-sm-3 control-label">Servidores:</label>
                        <div class="col-sm-6">
                            <input id="servers" type="text" name="servers" class="form-control  popover-button-default"
                                   data-content="Clique e Selecione a Data de Lançamento do Jogo aqui."
                                   title="Data de Lançamento Do Jogo" data-trigger="focus" data-placement="top"
                                   placeholder="Ex: US, EU e BR"
                                   value="{{ $game->fields->where('key', 'servers')->first()->value }}"
                                    {{ ($game->fields->where('key', 'servers')->isEmpty()) ? 'disabled':'' }}>
                        </div>
                    </div>
                    <div class="form-group" id="div_site"
                         style="display: {{ ($game->fields->where('key', 'site')->isEmpty()) ? 'none':'block' }}">
                        <label for="subject" class="col-sm-3 control-label">Site Oficial:</label>
                        <div class="col-sm-6">
                            <input id="site" type="text" name="site" class="form-control"
                                   placeholder="Ex: playoverwatch.com"
                                   value="{{ $game->fields->where('key', 'site')->first()->value }}"
                                    {{ ($game->fields->where('key', 'site')->isEmpty()) ? 'disabled':'' }}>
                        </div>
                    </div>
                    <!--- Fields Input End--->
                </div>
            </div>
        </div>
        <!--- AREA END FIELDS --->
        <!--- AREA SECTIONS --->
        <div class="panel" id="sections" style="display:{{ (($game->sections->isEmpty())) ?  'none':'block'  }}">
            <div class="panel-body">
                <div class="example-box-wrapper">
                    <div id="page-title">
                        <h2>Seções:</h2>
                    </div>
                    @if($game->sections->isEmpty() == false)
                        @foreach($game->sections as $section)
                            <div class="form-group">
                                <label for="subject" class="col-sm-3 control-label">Título:</label>
                                <div class="col-sm-6">
                                    <input id="gsection_title[]" type="text" value="{{ $section->title }}"
                                           name="gsection_title[]"
                                           class="form-control"
                                           placeholder="Ex: O Jogo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject" class="col-sm-3 control-label">Lingua:</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="gsection_lang[]">
                                        @foreach($langs as $lang)
                                            <option value="{{ $lang['id'] }}" {{ ($section->lang == $lang['id']) ? 'selected':'' }}> {{ $lang['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject" class="col-sm-3 control-label">Ordem:</label>
                                <div class="col-sm-6">
                                    <input id="gsection_order[]" type="number" value="{{ $section->order }}"
                                           name="gsection_order[]"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">Corpo:</label>
                                <div class="col-sm-6">
                                        <textarea id="gsection_body[]" class="form-control"
                                                  name="gsection_body[]">{{ $section->body }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    @elseif($game->sections->isEmpty() == true)
                        <div id="origem">
                            <div class="form-group">
                                <label for="subject" class="col-sm-3 control-label">Título:</label>
                                <div class="col-sm-6">
                                    <input id="gsection_title[]" type="text" name="gsection_title[]"
                                           class="form-control"
                                           placeholder="Ex: O Jogo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject" class="col-sm-3 control-label">Lingua:</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="gsection_lang[]">
                                        @foreach($langs as $lang)
                                            <option value="{{ $lang['id'] }}"> {{ $lang['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject" class="col-sm-3 control-label">Ordem:</label>
                                <div class="col-sm-6">
                                    <input id="gsection_order[]" type="number" name="gsection_order[]"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">Corpo:</label>
                                <div class="col-sm-6">
                                    <textarea id="gsection_body[]" class="form-control"
                                              name="gsection_body[]"></textarea>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($game->sections->isEmpty() == false)
                        <div id="origem">
                            <div class="form-group">
                                <label for="subject" class="col-sm-3 control-label">Título:</label>
                                <div class="col-sm-6">
                                    <input id="gsection_title[]" type="text" name="gsection_title[]"
                                           class="form-control"
                                           placeholder="Ex: O Jogo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject" class="col-sm-3 control-label">Lingua:</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="gsection_lang[]">
                                        @foreach($langs as $lang)
                                            <option value="{{ $lang['id'] }}"> {{ $lang['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject" class="col-sm-3 control-label">Ordem:</label>
                                <div class="col-sm-6">
                                    <input id="gsection_order[]" type="number" name="gsection_order[]"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-sm-3 control-label">Corpo:</label>
                                <div class="col-sm-6">
                                    <textarea id="gsection_body[]" class="form-control"
                                              name="gsection_body[]"></textarea>
                                </div>
                            </div>
                            <button type="button" onclick="removerCampos(this);" class="btn btn-black pull-right"><i
                                        class="glyph-icon icon-minus"></i>
                                Remover Seção
                            </button>
                        </div>
                    @endif
                    <div id="destino">
                    </div>
                    <button type="button" onclick="duplicarCampos();" class="btn btn-black pull-right"><i
                                class="glyph-icon icon-plus"></i>
                        Adicionar Seção
                    </button>
                </div>
            </div>
        </div>
        <!--- ÁREA END SECTIONS --->
        <button type="submit" class="btn btn-success pull-right">Editar jogo</button>
        <br class="clearfix">
    </form>
    <!--Modal Delete Cover --->
    <div class="modal fade" id="delete_cover" tabindex="-1" role="dialog" aria-labelledby="delete_coverlabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Deletar Capa:</h4>
                </div>
                <form class="form-horizontal bordered-row" action="" id="form" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">Capa Escolhida:</label>
                            <div class="col-md-6">
                                <img src="" id="action-confirm" name="action-confirm">
                                <input type="hidden" id="id-cover" name="id-cover">
                            </div>
                        </div>
                        <h3><b>Você tem certeza que deseja apagar essa capa? </b></h3>
                    </div>
                    <div id="result"></div>
                    <div class="modal-footer">
                        <button type="button" id="close" class="btn btn-black" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Apagar Capa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <!-- Script send the values to modal and delete the cover-->
    <script>
        /* Send Values To Modal */
        function getValueModal(id, img) {
            document.getElementById('action-confirm').value = img
            document.getElementById('id-cover').value = id
            console.log(id, img);
            $("#action-confirm").attr("src", 'http://nptunnel.com/npimg/' + img);
        }
        /* Remove The Values when close the modal  */
        $('#close').click(function () {
            $('#action-reconfirm').val('');
            $('#id-cover').val('');
        });
        /* Event for Send the values in the Ajax for delete cover  */
        jQuery(document).ready(function () {
            jQuery('#form').submit(function () {
                var id_cover = $("#id-cover").val();
                var id = {{ $game->id }}
                jQuery.ajax({
                    type: "POST",
                    url: '{{ route('games.delete-cover') }}',
                    data: {id: id, id_cover: id_cover},
                    success: function (data) {
                        console.log(data);
                        $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-success"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-green alert-icon"><i class="glyph-icon icon-check"></i></div><div class="alert-content"><h4 class="alert-title">Pronto!</h4><p><b>Sua Solicitição foi atendida com sucesso.</b></p></div></div></div></div></div></div></div></div></div></div>');
                        setInterval('window.location.reload()', 1500);
                    },
                    error: function (data) {
                        $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-danger"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-red alert-icon"><i class="glyph-icon icon-remove"></i></div><div class="alert-content"><h4 class="alert-title">Erro!</h4><p><b>Favor entrar em contato com o desenvolvedor.</b></p></div></div></div></div></div></div></div></div></div></div>');
                    }
                });
                return false;
            });
        });
    </script>
    <script type="text/javascript">
        /* Datepicker bootstrap */
        $(function () {
            "use strict";
            $('.bootstrap-datepicker').bsdatepicker({
                format: 'yyyy-mm-dd'
            });
        });
        /* Function DuplicateSections Inputs */
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
        /* Function DuplicateCovers Input Upload */
        function duplicarCapas() {
            var clone_capa = document.getElementById('original-capas').cloneNode(true);
            var destino_capa = document.getElementById('destino-capas');
            destino_capa.appendChild(clone_capa);
            var capasClonadas = clone_capa.getElementsByTagName('input');
            for (i = 0; i < capasClonadas.length; i++) {
                capasClonadas[i].value = '';
            }
        }
        /* Function Remove */
        function removerCampos(id) {
            var node1 = document.getElementById('destino');
            node1.removeChild(node1.childNodes[0]);
        }
        //Toggle Action for checkbox inputs
        jQuery(document).ready(function () {
            $('#check_requirements').click(function () {
                $('#requeriments').toggle();
            });
            $('#update-cover').click(function () {
                $('#new-cover').toggle();
            });
            $('#update-logo').click(function () {
                $('#new-logo').toggle();
            });
            $('#add_new_cover').click(function () {
                $('#new_cover').toggle();
            });
            $('#checkbox_fields').click(function () {
                $('#fields').toggle();
            });
            $('#checkbox_sections').click(function () {
                $('#sections').toggle();
            });
        });
        //Function Show Div Fields Display in Checkbox
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
                            $("#file").val('');
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