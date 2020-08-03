@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Categorias de Tickets</h2>
        <p>Lista de Categorias.</p>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="create-category-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Adicionar Nova Categoria</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nome (BR):</label>
                            <div class="col-md-4">
                                <input id="category_name_br" name="name[]" type="text"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nome (EN):</label>
                            <div class="col-md-4">
                                <input id="category_name_en" name="name[]" type="text"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nome (ES):</label>
                            <div class="col-md-4">
                                <input id="category_name_es" name="name[]" type="text"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tag:</label>
                            <div class="col-md-4">
                                <input id="category_tag" name="tag" type="text"
                                       class="form-control input-md">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Status:</label>
                            <div class="col-md-4">
                                <select class="form-control" id="active_status" name="active">
                                    <option value="1">Ativa</option>
                                    <option value="0">Inativa</option>
                                </select>
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
                        <i class="glyph-icon icon-save"></i> Criar Categoria
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-category-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Categoria</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nome (BR):</label>
                            <div class="col-md-4">
                                <input id="category_edit_name_br" name="name[]" type="text"
                                       class="form-control input-md">
                                <input id="category_id" name="category_id" type="hidden"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nome (EN):</label>
                            <div class="col-md-4">
                                <input id="category_edit_name_en" name="name[]" type="text"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nome (ES):</label>
                            <div class="col-md-4">
                                <input id="category_edit_name_es" name="name[]" type="text"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tag:</label>
                            <div class="col-md-4">
                                <input id="category_edit_tag" name="tag" type="text"
                                       class="form-control input-md">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Status:</label>
                            <div class="col-md-4">
                                <select class="form-control" id="active_edit_status" name="active">
                                    <option value="1">Ativa</option>
                                    <option value="0">Inativa</option>
                                </select>
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
                            id="button-edit-save">
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
                        Nova Categoria
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
                        <th>Tag</th>
                        <th>Qtd. Tópicos Vinculados:</th>
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
                        <th>Tag</th>
                        <th>Qtd. Tópicos Vinculados:</th>
                        <th>Ativo?</th>
                        <th>Criado em:</th>
                        <th>Atualizado em:</th>
                        <th>Opções:</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                {{ $category->translations()
                                    ->where('language_id', 1)
                                    ->first()->name
                                }}
                            </td>
                            <td>
                                {{ $category->translations()
                                    ->where('language_id', 2)
                                    ->first()->name
                                }}
                            </td>
                            <td>
                                {{ $category->translations()
                                    ->where('language_id', 3)
                                    ->first()->name
                                }}
                            </td>
                            <td>{{ $category->tag}}</td>
                            <td>
                                <button class="btn btn-xs {{ ($category->topics()->count() >= 1) ? "btn-black":"btn-danger" }}">
                                    {{ $category->topics()->count() }} Tópicos
                                </button>
                            </td>
                            <td>
                                {!! ($category->active)
                                    ?
                                    "<button class='btn btn-success btn-xs'>Ativo</button>":"<button class='btn btn-black btn-xs'>Inativo</button>"
                                !!}
                            </td>
                            <td>{{ brDate($category->created_at) }}</td>
                            <td>{{ brDate($category->updated_at) }}</td>
                            <td>
                                <button class="btn btn-xs btn-black edit-category"
                                        data-id="{{ $category->id }}"
                                        data-toggle="modal"
                                        data-target="#edit-category-modal"
                                >Editar</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $categories->render() }}
@endsection
@section('extra-scripts')
    <script type="text/javascript">
        /**
         * Get Data in API And Show Data for Edit Category.
         */
        $(document).on("click", ".edit-category", function () {
            var id = $(this).data('id');
            var callbackSuccess = function (res) {
                $("#category_id").val(res.data.id);
                $("#category_edit_name_br").val(res.data.br);
                $("#category_edit_name_en").val(res.data.en);
                $("#category_edit_name_es").val(res.data.es);
                $("#category_edit_tag").val(res.data.tag);
                $("#active_edit_status").val(res.data.status);
            };
            var callbackFail = function (res) {

            };
            axios.post('{{ route('api.tickets.get-categories') }}', {
                id: id
            }).then(callbackSuccess, callbackFail);
        });
        /**
         * Update Data Category.
         */
        var request_disabled_update = false;
        $('#button-edit-save').click(function () {
            var data = new FormData();
            data.append('id', $("#category_id").val());
            data.append('br', $("#category_edit_name_br").val());
            data.append('en', $("#category_edit_name_en").val());
            data.append('es', $("#category_edit_name_es").val());
            data.append('tag', $("#category_edit_tag").val());
            data.append('active', $("#active_edit_status").val());
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
                axios.post('{{ route('site.tickets.categories.update') }}', data).then(callbackSuccess, callbackFail);
            }
        });
        /**
         * Create new Data
         */
        var request_disabled = false;
        $('#button-save').click(function () {
            var data = new FormData();
            data.append('br', $("#category_name_br").val());
            data.append('en', $("#category_name_en").val());
            data.append('es', $("#category_name_es").val());
            data.append('tag', $("#category_tag").val());
            data.append('active', $("#active_status").val());
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
                    }, 2000);
                }
            };
            var callbackFail = function (res) {
                $("#error-type-disable").text(res.data.alert);
                $("#show-error").show();
                setTimeout(function () {
                    $("#show-error").hide();
                    request_disabled = false;
                }, 1500);
            };
            if (!request_disabled) {
                request_disabled = true;
                axios.post('{{ route('site.tickets.categories.store') }}', data).then(callbackSuccess, callbackFail);
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
