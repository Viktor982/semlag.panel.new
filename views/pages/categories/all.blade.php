@extends('layout.default')

@section('content')
    <div id="page-title">
        <h2>Categorias</h2>
    </div>
    {{-- delete post modal--}}
    <div class="modal fade" tabindex="-1" role="dialog" id="disable-category-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id-disable-category" id="id-disable-category">
                    <p id="change-body"></p>
                </div>
                <div id="show-disable-success" style="display: none">
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

                <div id="show-disable-error" style="display: none">
                    <div class="alert alert-danger">
                        <div class="bg-black alert-icon">
                            <i class="glyph-icon icon-warning"></i>
                        </div>
                        <div class="alert-content">
                            <h4 class="alert-title">Erro</h4>
                            <p id="error-type-disable"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-black" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="disable-button-ok">Sim</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="add-category-modal">
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
                            <label class="col-md-4 control-label">Nome da Categoria:</label>
                            <div class="col-md-4">
                                <input id="category_name" name="category_name" type="text"
                                       class="form-control input-md">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Status:</label>
                            <div class="col-md-4">
                                <select class="form-control" id="category_status" name="category_status">
                                    <option value="1">Ativa</option>
                                    <option value="0">Inativa</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="show-add-success" style="display: none">
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

                    <div id="show-add-error" style="display: none">
                        <div class="alert alert-danger">
                            <div class="bg-black alert-icon">
                                <i class="glyph-icon icon-warning"></i>
                            </div>
                            <div class="alert-content">
                                <h4 class="alert-title">Erro</h4>
                                <p id="error-type-add"></p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary button-cancel" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-black button-save" id="button-save">Salvar Categoria</button>
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
                            <label class="col-md-4 control-label">Nome da Categoria:</label>
                            <div class="col-md-4">
                                <input id="category_name_edit" name="category_name_edit" type="text"
                                       class="form-control input-md">
                                <input id="id_edit" name="id_edit" type="hidden"
                                       class="form-control input-md">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Status:</label>
                            <div class="col-md-4">
                                <select class="form-control" id="category_status_edit" name="category_status_edit">
                                    <option value="1">Ativa</option>
                                    <option value="0">Inativa</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="show-edit-success" style="display: none">
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

                    <div id="show-edit-error" style="display: none">
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
                    <button type="button" class="btn btn-primary button-cancel" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-black button-update" id="button-edit-save">Salvar Categoria</button>
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                <button class="btn btn-black"
                        data-toggle="modal"
                        data-target="#add-category-modal"
                        data-lang="{{ $language['short'] }}"
                        type="button">
                    <i class="glyph-icon icon-plus-square"></i>
                    Criar Nova Categoria
                </button>
                <div class="dropdown pull-right">
                    <button class="btn btn-black dropdown-toggle" type="button" data-toggle="dropdown">
                        Trocar Idioma Para ...
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        @foreach($languages as $lang)
                            <li>
                                <a href="{{ route('blog.categories.all', ['lang'=>$lang['short']]) }}">{{ $lang['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </h3>

            <div class="panel">
                <div class="panel-body">
                    <div class="example-box-wrapper">
                        <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome da Categoria:</th>
                                <th>Slug:</th>
                                <th>Posts Cadastrados na Categoria:</th>
                                <th>Status:</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($categories as $category)
                                <tr id="{{ $category->id }}">
                                    <td>{{ $category->id }}</td>
                                    <td id="name-{{ $category->id }}">{{ $category->name }}</td>
                                    <td id="slug-{{ $category->id }}">{{ $category->slug }}</td>
                                    <td>
                                        <button class="btn
                                                {{ ($category->posts->count() == 0)
                                                    ? "btn-danger":"btn-success" }}">
                                            {{ $category->posts->count() }} Posts
                                        </button>
                                    </td>
                                    <td><button id="button-{{ $category->id }}" class="btn {{ ($category->active) ? "btn-success":"btn-danger" }}">
                                            {{($category->active) ? "Ativa":"Desativada"}}
                                        </button></td>
                                    <td>
                                        {{ brDate($category->created_at) }}
                                    </td>
                                    <td>

                                        <button id="button_edit"
                                                data-toggle="modal"
                                                data-target="#edit-category-modal"
                                                data-id="{{ $category->id }}"
                                                class="edit-category btn btn-sm btn-black">
                                            <i class="glyph-icon icon-edit"></i> Editar
                                        </button>

                                        <button id="button-change-{{ $category->id }}"
                                                data-toggle="modal"
                                                data-target="#disable-category-modal"
                                                data-id="{{ $category->id }}"
                                                data-status="{{ $category->active }}"
                                                class="open-disable-category btn btn-sm
                                                {{ ($category->active) ? "btn-danger":"btn-success" }}">
                                            <i id="icon-change-{{ $category->id }}" class="glyph-icon {{ ($category->active) ? "icon-remove":"icon-check" }}"></i> {{ ($category->active) ? "Desativar Categoria":"Ativar Categoria" }}
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="pull-right">
                        {{ $categories->render() }}
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    @endsection
    @section('extra-scripts')
        <!--Javascript Disable Category --->
            <script type="text/javascript">
                $(document).on("click", ".open-disable-category", function () {
                    var id = $(this).data('id');
                    var status = $(this).data('status');
                    $("#id-disable-category").val(id);
                    if (status === 0) {
                        $("#modal-title").text("Ativar Categoria:");
                        $("#change-body").text("Você deseja realmente Ativar essa categoria?");
                    } else {
                        $("#modal-title").text("Desativar Categoria:")
                        $("#change-body").text("Você deseja realmente Desativar essa categoria?")
                    }
                });
                var request_disabled = false;
                $('#disable-button-ok').click(function () {
                    var id = $("#id-disable-category").val();
                    var callbackSuccess = function (res) {
                        if (!res.data.success) {
                            $("#error-type-disable").text(res.data.alert);
                            $("#show-disable-error").show();
                             request_disabled = false;
                        } else {
                            $("#show-disable-success").show();
                            setTimeout(function () {
                                $("#disable-category-modal").modal('toggle');
                                if(!res.data.status) {
                                    $('#button-change-'+id).html('<i class="glyph-icon icon-check"></i> Ativar Categoria').attr('class', 'btn btn-sm btn-success').data('status', 0);
                                    $('#button-'+id).text("Desativada").attr('class', 'btn btn-danger');
                                } else {
                                    $('#button-change-'+id).html('<i class="glyph-icon icon-remove"></i> Desativar Categoria').attr('class', 'btn btn-sm btn-danger').data('status', 1);
                                    $('#button-'+id).text("Ativa").attr('class', 'btn btn-success');
                                }
                                $("#show-disable-success").hide();
                                request_disabled = false;
                            }, 1500);
                        }
                    };
                    var callbackFail = function (res) {
                        $("#error-type-disable").text(res.data.alert);
                        $("#show-disable-error").show()
                    };
                    if (!request_disabled) {
                        request_disabled = true;
                        axios.post('{{ route('blog.categories.update.changes_status', ['lang' => $language['short'] ]) }}', {
                            id: id
                        }).then(callbackSuccess, callbackFail);
                    }
                });
            </script>
            <!--Javascript Disable Category --->
            <script type="text/javascript">

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
            <!--Javascript Add Category --->
            <script type="text/javascript">
                var request_disabled = false;
                $('#button-save').click(function () {
                    var name = $('#category_name').val();
                    var status = $('#category_status').val();
                    var callbackSuccess = function (res) {
                        if (!res.data.success) {
                            $("#error-type-add").text(res.data.alert);
                            $("#show-add-error").show();
                            request_disabled = false;
                        } else {
                            $("#show-add-success").show();
                            setTimeout(function () {
                                $("#add-category-modal").modal('toggle');
                                if(!res.data.category.active){
                                    $('#datatable-responsive > tbody:last-child').append(
                                        '<tr>'
                                        +'<td>'+res.data.category.id+'</td>'
                                        +'<td>'+res.data.category.name+'</td>'
                                        +'<td>'+res.data.category.slug+'</td>'
                                        +'<td><button class="btn btn-danger">0 Posts</button></td>'
                                        + '<td><button id="button-'+res.data.category.id+'" class="btn btn-danger"> Desativada</button></td>'
                                        +'<td>'+res.data.category.created_at+'</td>'
                                        +'<td><button data-toggle="modal" data-target="#edit-category-modal" data-id="'+res.data.category.id+'"class="open-edit-category btn btn-sm btn-success"><i class="glyph-icon icon-edit"></i> Editar</button><button id="button-change-'+res.data.category.id+'" data-toggle="modal" data-target="#disable-category-modal" data-id="'+res.data.category.id+'" data-status="'+res.data.category.id+'" class="open-disable-category btn btn-sm btn-success"><i class="glyph-icon icon-check"></i> Ativar Categoria</button></td>'
                                        +'</tr>');
                                } else {
                                    $('#datatable-responsive > tbody:last-child').append(
                                        '<tr>'
                                        +'<td>'+res.data.category.id+'</td>'
                                        +'<td>'+res.data.category.name+'</td>'
                                        +'<td>'+res.data.category.slug+'</td>'
                                        +'<td><button class="btn btn-danger">0 Posts</button></td>'
                                        + '<td><button id="button-'+res.data.category.id+'" class="btn btn-success"> Ativa</button></td>'
                                        +'<td>'+res.data.category.created_at+'</td>'
                                        +'<td><button data-toggle="modal" data-target="#edit-category-modal" data-id="'+res.data.category.id+'"class="open-edit-category btn btn-sm btn-black"><i class="glyph-icon icon-edit"></i> Editar</button> <button id="button-change-'+res.data.category.id+'" data-toggle="modal" data-target="#disable-category-modal" data-id="'+res.data.category.id+'" data-status="'+res.data.category.id+'" class="open-disable-category btn btn-sm btn-danger"><i class="glyph-icon icon-remove"></i> Desativar Categoria</button></td>'
                                        +'</tr>');
                                }
                                $("#show-add-success").hide();
                                request_disabled = false;
                            }, 1500);
                        }
                    };
                    var callbackFail = function (res) {
                        $("#error-type-disable").text(res.data.alert);
                        $("#show-disable-error").show()
                    };
                    if (!request_disabled) {
                        request_disabled = true;
                        axios.post('{{ route('blog.categories.store', ['lang' => $language['short'] ]) }}', {
                            name: name,
                            status: status
                        }).then(callbackSuccess, callbackFail);
                    }
                });
            </script>

    <!--- Edit Category --->
            <script type="text/javascript">
                $(document).on("click", ".edit-category", function () {
                    var id = $(this).data('id');
                    var status = $(this).data('status');
                    var callbackSuccess = function (res) {
                        $("#category_name_edit").val(res.data.category.name);
                        $("#category_status_edit").val(res.data.category.active);
                        $("#id_edit").val(res.data.category.id);
                    };
                    var callbackFail = function (res) {

                    };
                    axios.post('{{ route('api.blog.get-category') }}', {
                        id: id
                    }).then(callbackSuccess, callbackFail);
                });

                var request_disabled = false;
                $('#button-edit-save').click(function () {
                    var name = $('#category_name_edit').val();
                    var status = $('#category_status_edit').val();
                    var id = $('#id_edit').val();
                    var callbackSuccess = function (res) {
                        if (!res.data.success) {
                            $("#error-type-edit").text(res.data.alert);
                            $("#show-edit-error").show();
                            request_disabled = false;
                        } else {
                            $("#show-edit-success").show();
                            setTimeout(function () {
                                $("#name-"+id).text(name);
                                $("#slug-"+id).text(res.data.slug);
                                if(res.data.status == 0) {
                                    $('#button-change-'+id).html('<i class="glyph-icon icon-check"></i> Ativar Categoria').attr('class', 'btn btn-sm btn-success').data('status', 0);
                                    $('#button-'+id).text("Desativada").attr('class', 'btn btn-danger');
                                } else {
                                    $('#button-change-'+id).html('<i class="glyph-icon icon-remove"></i> Desativar Categoria').attr('class', 'btn btn-sm btn-danger').data('status', 1);
                                    $('#button-'+id).text("Ativa").attr('class', 'btn btn-success');
                                }
                                $("#edit-category-modal").modal('toggle');
                                $("#show-edit-success").hide();
                                request_disabled = false;
                            }, 1500);
                        }
                    };
                    var callbackFail = function (res) {
                        $("#error-type-disable").text("Avise a Equipe de Devs.");
                        $("#show-disable-error").show()
                    };
                    if (!request_disabled) {
                        request_disabled = true;
                        axios.post('{{ route('blog.categories.update', ['lang' => $language['short'] ]) }}', {
                            id: id,
                            name: name,
                            status: status
                        }).then(callbackSuccess, callbackFail);
                    }
                });
            </script>
@endsection