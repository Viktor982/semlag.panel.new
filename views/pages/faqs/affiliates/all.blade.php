@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Faqs - Afiliados</h2>
    </div>

    <div class="panel">
        <form class="form-horizontal bordered-row">
            <div class="form-group">
                <label class="col-sm-3 control-label">Idioma</label>
                <div class="col-sm-6">
                    <form action="{{ route('site.faqs.affiliates') }}" method="post">
                    <select class="form-control" id="language_form" name="language" onchange="this.form.submit()">
                        <option value="1"
                                @if($lang == null || $lang == 1 ) selected @endif>Português Brasileiro
                        </option>
                        <option value="2"
                                @if($lang == 2 ) selected @endif>English (United States)
                        </option>
                        <option value="3"
                                @if($lang == 3 ) selected @endif>Espanõl
                        </option>
                    </select>
                    </form>
                </div>
                <a href="{{ route('site.faqs.affiliates.create') }}">
                    <button type="button" class="btn btn-sm btn-black  pull-left">
                        <i class="glyph-icon icon-plus-square"></i> Adicionar Nova FAQ
                    </button>
                </a>
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
                        <th>Idioma</th>
                        <th>Ordem</th>
                        <th>Pergunta</th>
                        <th>Ações</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Idioma</th>
                        <th>Ordem</th>
                        <th>Pergunta</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($faqs as $faq)
                        <tr>
                            <td>{{ $faq->id }}</td>
                            <td>{{ $faq->language->name }}</td>
                            <td>
                                <div class="col-md-9">
                                    <form method="post"
                                          action="{{ route('site.faqs.affiliates.update-order', ['id' => $faq->id ]) }}">
                                        <input name="order" class="order form-control input-md" type="number"
                                               value="{{ $faq->order }}"
                                               style="margin: 0 auto;width: 60px;display: initial;">
                                        <button class="btn btn-black"><i class="glyph-icon icon-save"></i> Salvar
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ $faq->question }}</td>
                            <td>
                                {!! aroute('<i class="glyph-icon icon-edit"></i> Editar</a>', 'site.faqs.affiliates.edit', ['id' => $faq->id], ['class' => 'btn btn-sm btn-black'])!!}
                                {!! aroute('<i class="glyph-icon icon-remove"></i> Deletar</a>', 'site.faqs.affiliates.delete', ['id' => $faq->id], ['class' => 'btn btn-sm btn-danger'])!!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $faqs->render() }}
        @endsection
        @section('extra-scripts')
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
@endsection