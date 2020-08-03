@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Topicos de categorias de Tickets</h2>
        <p>Lista de Topicos.</p>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="create-category-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Adicionar Novo Tópico:</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Categoria:</label>
                            <div class="col-md-4">
                                <select class="form-control" id="category_id" name="active">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->translations->where('language_id', 1)->first()->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status:</label>
                            <div class="col-md-4">
                                <select class="form-control" id="status_topic" name="active">
                                        <option value="1">Ativo</option>
                                        <option value="0">Inativo</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tag:</label>
                            <div class="col-md-4">
                                <input id="tag" name="tag" type="text"
                                       class="form-control input-md">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nome (BR):</label>
                            <div class="col-md-4">
                                <input id="name_br" name="name[]" type="text"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Template(BR):</label>
                            <div class="col-md-7">
                                <textarea class="form-control input-md" name="template[]" id="template-br"></textarea>
                                <p class="help-block">Modelo de Template</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nome (EN):</label>
                            <div class="col-md-4">
                                <input id="name_en" name="name[]" type="text"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Template(EN):</label>
                            <div class="col-md-7">
                                <textarea class="form-control input-md" name="template[]" id="template-en"></textarea>
                                <p class="help-block">Modelo de Template</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nome (ES):</label>
                            <div class="col-md-4">
                                <input id="name_es" name="name[]" type="text"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Template(ES):</label>
                            <div class="col-md-7">
                                <textarea class="form-control input-md" name="template[]" id="template-es"></textarea>
                                <p class="help-block">Modelo de Template</p>
                            </div>
                        </div>
                    </div>

                    <div id="show-success" style="display: none">
                        <div class="alert alert-success">
                            <div class="bg-green alert-icon">
                                <i class="glyph-icon icon-check"></i>
                            </div>
                            <div class="alert-content">
                                <h4 class="alert-title">Atenção!</h4>
                                <p>A sua solicitação foi atendida com sucesso.</p>
                            </div>
                        </div>
                    </div>

                    <div id="show-error" style="display: none">
                        <div class="alert alert-danger">
                            <div class="bg-black alert-icon">
                                <i class="glyph-icon icon-warning"></i>
                            </div>
                            <div class="alert-content">
                                <h4 class="alert-title">Erro</h4>
                                <p id="error-type-edit"></p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-default button-cancel"
                            data-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="button"
                            class="btn btn-success button-update"
                            id="button-save">
                        <i class="glyph-icon icon-save"></i> Criar Tópico
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-topic-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Tópico</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Categoria:</label>
                            <div class="col-md-4">
                                <select class="form-control" id="category_id_edit" name="active">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->translations->where('language_id', 1)->first()->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status:</label>
                            <div class="col-md-4">
                                <select class="form-control" id="status_topic_edit" name="active">
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tag:</label>
                            <div class="col-md-4">
                                <input id="edit_tag" name="name[]" type="text"
                                       class="form-control input-md">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nome (BR):</label>
                            <div class="col-md-4">
                                <input id="edit_id" type="hidden"
                                       class="form-control input-md">
                                <input id="edit_name_br" name="name[]" type="text"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Template(BR):</label>
                            <div class="col-md-7">
                                <textarea class="form-control input-md" name="template[]" id="edit_template_br"></textarea>
                                <p class="help-block">Modelo de Template</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nome (EN):</label>
                            <div class="col-md-4">
                                <input id="edit_name_en" name="name[]" type="text"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Template(EN):</label>
                            <div class="col-md-7">
                                <textarea class="form-control input-md" name="template[]" id="edit_template_en"></textarea>
                                <p class="help-block">Modelo de Template</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nome (ES):</label>
                            <div class="col-md-4">
                                <input id="edit_name_es" name="name[]" type="text"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Template(ES):</label>
                            <div class="col-md-7">
                                <textarea class="form-control input-md" name="template[]" id="edit_template_es"></textarea>
                                <p class="help-block">Modelo de Template</p>
                            </div>
                        </div>

                    </div>

                    <div id="show-success-update" style="display: none">
                        <div class="alert alert-success">
                            <div class="bg-green alert-icon">
                                <i class="glyph-icon icon-check"></i>
                            </div>
                            <div class="alert-content">
                                <h4 class="alert-title">Atenção!</h4>
                                <p>A sua solicitação foi atendida com sucesso.</p>
                            </div>
                        </div>
                    </div>

                    <div id="show-error-update" style="display: none">
                        <div class="alert alert-danger">
                            <div class="bg-black alert-icon">
                                <i class="glyph-icon icon-warning"></i>
                            </div>
                            <div class="alert-content">
                                <h4 class="alert-title">Erro</h4>
                                <p id="error-type-edit"></p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-default button-cancel"
                            data-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="button"
                            class="btn btn-success button-update"
                            id="button-update">
                        <i class="glyph-icon icon-save"></i> Salvar Alterações
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                    <button class="btn btn-black"
                            data-toggle="modal"
                            data-target="#create-category-modal">
                        <i class="glyph-icon icon-plus-square"></i>
                        Novo Tópico
                    </button>
            </h3>
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome (BR):</th>
                        <th>Nome (EN):</th>
                        <th>Nome (ES):</th>
                        <th>Tag:</th>
                        <th>Categoria:</th>
                        <th>Ativo?</th>
                        <th>Criado em:</th>
                        <th>Atualizado em:</th>
                        <th>Opções:</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nome (BR):</th>
                        <th>Nome (EN):</th>
                        <th>Nome (ES):</th>
                        <th>Tag:</th>
                        <th>Categoria:</th>
                        <th>Ativo?</th>
                        <th>Criado em:</th>
                        <th>Atualizado em:</th>
                        <th>Opções:</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($topics as $topic)
                        <tr>
                            <td>{{ $topic->id }}</td>
                            <td>{{ $topic->translations()->where('language_id', 1)->first()->name }}</td>
                            <td>{{ $topic->translations()->where('language_id', 2)->first()->name }}</td>
                            <td>{{ $topic->translations()->where('language_id', 3)->first()->name }}</td>
                            <td>{{ $topic->tag }}</td>
                            <td>
                                <button class="btn btn-black btn-xs">
                                    {{ $topic->category->translations->where('language_id', 1)->first()->name }}
                                </button>
                            </td>
                            <td>
                                {!! ($topic->active)
                                    ?
                                    "<button class='btn btn-success btn-xs'>Ativo</button>":"<button class='btn btn-black btn-xs'>Inativo</button>"
                                !!}
                            </td>
                            <td>{{ brDate($topic->created_at) }}</td>
                            <td>{{ brDate($topic->updated_at) }}</td>
                            <td>
                                <button class="btn btn-xs btn-black edit-topic"
                                        data-id="{{ $topic->id }}"
                                        data-toggle="modal"
                                        data-target="#edit-topic-modal"
                                >Editar</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script type="text/javascript">
        /**
         * Get Data in API And Show Data for Edit Topic.
         */
        $(document).on("click", ".edit-topic", function () {
            var id = $(this).data('id');
            var callbackSuccess = function (res) {
                $("#edit_id").val(res.data.id);
                $("#category_id_edit").val(res.data.category_id);
                $("#status_topic_edit").val(res.data.status);
                $("#edit_tag").val(res.data.br.tag);
                $("#edit_name_br").val(res.data.br.name);
                $("#edit_template_br").val(res.data.br.template);
                $("#edit_name_en").val(res.data.en.name);
                $("#edit_template_en").val(res.data.en.template);
                $("#edit_name_es").val(res.data.es.name);
                $("#edit_template_es").val(res.data.es.template);
            };
            var callbackFail = function (res) {

            };
            axios.post('{{ route('api.tickets.get-topics') }}', {
                id: id
            }).then(callbackSuccess, callbackFail);
        });
        /**
         * Update Data Topic.
         */
        var request_disabled_update = false;
        $('#button-update').click(function () {
            var data = new FormData();
            data.append('id', $("#edit_id").val());
            data.append('category_id', $("#category_id_edit").val());
            data.append('tag', $("#edit_tag").val());
            data.append('br_name', $("#edit_name_br").val());
            data.append('br_template', $("#edit_template_br").val());
            data.append('en_name', $("#edit_name_en").val());
            data.append('en_template', $("#edit_template_en").val());
            data.append('es_name', $("#edit_name_es").val());
            data.append('es_template', $("#edit_template_es").val());
            data.append('active', $("#status_topic_edit").val());
            var callbackSuccess = function (res) {
                if (!res.data.success) {
                    $("#error-type-disable").text(res.data.alert);
                    $("#show-error-update").show();
                    setTimeout(function () {
                        $("#show-error").hide();
                        request_disabled_update = false;
                    }, 3500);
                } else {
                    $("#show-success-update").show();
                    setTimeout(function () {
                        $("#edit-category-modal").modal('toggle');
                        $("#show-success-update").hide();
                        location.reload();
                        request_disabled_update = false;
                    }, 2000);
                }
            };
            var callbackFail = function (res) {
                $("#error-type-disable").text(res.data.alert);
                $("#show-error-update").show();
                setTimeout(function () {
                    $("#show-error-update").hide();
                    request_disabled_update = false;
                }, 1500);
            };
            if (!request_disabled_update) {
                request_disabled_update = true;
                axios.post('{{ route('site.tickets.topics.update') }}', data).then(callbackSuccess, callbackFail);
            }
        });
        /**
         * Create new Data
         */
        var request_disabled = false;
        $('#button-save').click(function () {
            var data = new FormData();
            data.append('category_id', $("#category_id").val());
            data.append('name_br', $("#name_br").val());
            data.append('tag', $("#tag").val());
            data.append('template_br', $("#template-br").val());
            data.append('name_en', $("#name_en").val());
            data.append('template_en', $("#template-en").val());
            data.append('name_es', $("#name_es").val());
            data.append('template_es', $("#template-es").val());
            data.append('active', $("#status_topic").val());
            var callbackSuccess = function (res) {
                if (!res.data.success) {
                    $("#error-type-disable").text(res.data.alert);
                    $("#show-error").show();
                    setTimeout(function () {
                        $("#show-error").hide();
                        request_disabled = false;
                    }, 3500);
                } else {
                    $("#show-success").show();
                    setTimeout(function () {
                        $("#create-category-modal").modal('toggle');
                        $("#show-disable-success").hide();
                        location.reload();
                        request_disabled = false;
                    }, 2500);
                }
            };
            var callbackFail = function (res) {
                $("#error-type-disable").text(res.data.alert);
                $("#show-error").show();
                setTimeout(function () {
                    $("#show-error").hide();
                    request_disabled = false;
                }, 2500);
            };
            if (!request_disabled) {
                request_disabled = true;
                axios.post('{{ route('site.tickets.topics.store') }}', data).then(callbackSuccess, callbackFail);
            }
        });
    </script>
    <script type="text/javascript">
        /* Datatables responsive */
        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paging: false
            });
        });
        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });
    </script>
@endsection
