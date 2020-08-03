@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Imagens</h2>
    </div>
    <div class="panel">
        <form class="form-horizontal bordered-row">
            <div class="form-group">
            </div>
        </form>
        <div class="modal fade" id="upload_image" tabindex="-1" role="dialog" aria-labelledby="upload_image"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Editar:</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">País:</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="country" id="country" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Url:</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="url" id="url">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Carregar Imagem?:</label>
                                <div class="col-md-5">
                                    <input type="checkbox" name="upload_image" id="upload_image_file" value="0">
                                </div>
                            </div>
                            <div class="form-group" id="file_upload" style="display: none">
                                <label class="col-sm-3 control-label">Imagem:</label>
                                <div class="col-md-5">
                                    <input type="hidden" name="country_id" id="country_id">
                                    <input type="file" class="form-control" id="file" name="file">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Status:</label>
                                <div class="col-md-5">
                                    <select class="form-control" name="active" id="active">
                                        <option value="1">Ativa</option>
                                        <option value="0">Inativa</option>
                                    </select>
                                </div>
                            </div>
                        </form>
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
                                    <p id="error-type"></p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-black" id="save-banner">Salvar Edição</button>
                    </div>
                </div>
            </div>
        </div>
        <!--modal-->
        <div class="panel-body">
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>País</th>
                        <th>Código País</th>
                        <th>Imagem Vinculada?</th>
                        <th>Url?</th>
                        <th>Ativo</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>País</th>
                        <th>Código País</th>
                        <th>Imagem Vinculada?</th>
                        <th>Url?</th>
                        <th>Ativo</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($countries as $country)
                        <tr>
                            <td>
                                {{ $country->id }}
                            </td>
                            <td>
                                {{ $country->name }}
                            </td>
                            <td>
                                {{ $country->code }}
                            </td>
                            <td>
                                {!! ($country->image_id) ?
                                "<a href='https://nptunnel.com/npimg/".$country->image->slug."' target='_blank'><button class='btn btn-black'>Visualizar Imagem</button></a>"
                                :
                                "<button class='btn btn-danger'>Imagem não vinculada</button>" !!}
                            </td>
                            <td>
                                {!! ($country->url == null) ? "<button class='btn btn-black'>Sem Url Cadastrada</button>":"<a href='".$country->url."' target='_blank'><button class='btn btn-black'>Acessar Url</button></a>" !!}
                            </td>
                            <td>
                                <button class="btn btn-{{ ($country->active) ? "success":"danger" }}">
                                    {{ ($country->active) ? "Sim":"Não" }}
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-black open-upload"
                                        data-toggle="modal" data-target="#upload_image" data-id="{{ $country->id }}">
                                    <i class="glyph-icon icon-edit"></i>
                                    Editar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $countries->render() }}
@endsection
@section('extra-scripts')
    <script>
        $('#upload_image_file').click(function () {
            if ($("#upload_image_file").is(':checked')) {
                $("#upload_image_file").val(1);
            } else {
                $("#upload_image_file").val("");
            }
            $('#file_upload').toggle()
        });
        $(document).on("click", ".open-upload", function () {
            var id = $(this).data('id');
            $("#country_id").val(id);
            var callbackSuccess = function (res) {
                $("#country").val(res.data.country);
                $("#url").val(res.data.url);
            };
            var callbackFail = function (res) {

            };
            axios.post('{{ route('api.images.get-image') }}', {
                id: id
            }).then(callbackSuccess, callbackFail);
        });
    </script>
    <script>
        var request_disabled = false;
        $('#save-banner').click(function () {
            var url = $('#url').val();
            var id = $('#country_id').val();
            var check = $('#upload_image_file').val();
            var status = $('#active').val();
            var data = new FormData();
            data.append('id', id);
            data.append('url', url);
            data.append('status', status),
            data.append('check', check),
            data.append('file', document.getElementById('file').files[0]);

            var callbackSuccess = function (res) {
                if (!res.data.success) {
                    request_disabled = false;
                    $("#error-type").text("Avise a Equipe de Devs.");
                    $("#show-error").show()
                } else {
                    $("#show-success").show();
                    setTimeout(function () {
                        $("#show-success").hide();
                        window.location.reload()
                    }, 1500);
                }
            };
            var callbackFail = function (res) {
                $("#error-type").text("Avise a Equipe de Devs.");
                $("#show-error").show()
            };
            if (!request_disabled) {
                request_disabled = true;
                axios.post('{{ route('site.image.update') }}', data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(callbackSuccess, callbackFail);
            }
        });
    </script>
@endsection