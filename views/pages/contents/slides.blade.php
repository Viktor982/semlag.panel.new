@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>SlideShow</h2>
    </div>


    <div class="panel">
        <form class="form-horizontal bordered-row">
            <div class="form-group">
                <label class="col-sm-3 control-label">Idioma</label>
                <div class="col-sm-6">
                    <select class="form-control" id="language_form">
                        <option value="{{ route('contents.slides', ['language' => 1]) }}"
                                @if($lang == null || $lang == 1 ) selected @endif>Português Brasileiro
                        </option>
                        <option value="{{ route('contents.slides', ['language' => 2]) }}"
                                @if($lang == 2 ) selected @endif>English (United States)
                        </option>
                        <option value="{{ route('contents.slides', ['language' => 3]) }}"
                                @if($lang == 3 ) selected @endif>Espanõl
                        </option>
                    </select>
                </div>
                <a class="btn btn-black pull-left" href="{{ route('contents.slides.create') }}"><span
                            class="glyph-icon icon-plus-circle"> Adicionar Novo Slide</span></a>
            </div>
        </form>
        <p></p>
        <div class="panel-body">
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>IMG</th>
                        <th>Rota</th>
                        <th>Ativo</th>
                        <th>Idioma</th>
                        <th>Ordem</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>IMG</th>
                        <th>Rota</th>
                        <th>Ativo</th>
                        <th>Idioma</th>
                        <th>Ordem</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($slideshow as $slide)
                        <tr>
                            <td>{{ $slide->id }}</td>
                            <td>{{ $slide->title }}</td>
                            <td><a class="btn btn-sm btn-black" href="{{ $slide->url }}" target="_blank"><i
                                            class="glyph-icon icon-edit"></i> Abrir Imagem</a></td>
                            <td>{{ $slide->route_link }}</td>
                            <td>{{ ($slide->active) ? "Sim":"Não" }}</td>
                            <td>{{ $slide->language->name }}</td>
                            <td>
                                <div class="col-md-12">
                                    <form method="post"
                                          action="{{ route('contents.slides.order-update', ['id' => $slide->id ]) }}">
                                        <input name="order" class="order form-control input-md" type="number"
                                               value="{{ $slide->order }}"
                                               style="margin: 0 auto;width: 60px;display: initial;">
                                        <button class="btn btn-black"><i class="glyph-icon icon-save"></i> Salvar
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-success"
                                   href="{{ route('contents.slides.edit',['id' => $slide->id]) }}"><i
                                            class="glyph-icon icon-edit"></i> Editar</a>
                                <a class="btn btn-sm btn-warning"
                                   href="{{ route('contents.slides.delete',['id' => $slide->id]) }}"><i
                                            class="glyph-icon icon-edit"></i> Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $slideshow->render() }}

@endsection
@section('extra-scripts')

    <script>
        $(function () {
            // bind change event to select
            $('#language_form').on('change', function () {
                var url = $(this).val(); // get selected value
                if (url) { // require a URL
                    window.location = url; // redirect
                }
                return false;
            });
        });
    </script>

    <script type="text/javascript">

        /* Datatables responsive */

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                ordering: false
            });
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });

    </script>
@endsection