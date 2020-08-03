@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Depoimentos</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                <center>
                    <a href="{{ route('testimonials') }}">
                        <button class="btn ra-100 btn-black">Todos</button>
                    </a>
                    <a href="{{ route('testimonials.approved') }}">
                        <button class="btn ra-100 btn-success">Aprovados</button>
                    </a>
                    <a href="{{ route('testimonials.disapproved') }}">
                        <button class="btn ra-100 btn-warning">Reprovados</button>
                    </a>
                    <a href="{{ route('testimonials.pending') }}">
                        <button class="btn ra-100 btn-danger">Pendentes</button>
                    </a>
                </center>
            </h3>
            <div id="result"></div>

            <div class="form-horizontal bordered-row">
                <form class="form-group" action="{{ route('testimonials.search') }}" method="post">
                    <label class="col-md-2 control-label">Filtro:</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="method" name="method">
                            <option value="title">Por Titulo</option>
                            <option value="game">Por Jogo</option>
                            <option value="customer">Por Usuário</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="value_text" name="value">
                            <select class="form-control" id="value_select"
                                    @if($method == 'status') style="display: block;"
                                    @else style="display: none;" @endif >
                                @foreach($games as $game)
                                    <option value="{{ $game->id }}">{{ $game->name }}</option>
                                @endforeach>
                            </select>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-info" id="filter" title="Pesquisar">
                                    <i class="glyph-icon icon-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>

            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Landing?</th>
                        <th>Usuário</th>
                        <th>Jogo</th>
                        <th>Titulo</th>
                        <th>Depoimento</th>
                        <th>Aprovado?</th>
                        <th>Idioma</th>
                        <th>Criado em</th>
                        <th>Atualizado em</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Landing?</th>
                        <th>Usuário</th>
                        <th>Jogo</th>
                        <th>Titulo</th>
                        <th>Depoimento</th>
                        <th>Aprovado?</th>
                        <th>Idioma</th>
                        <th>Criado em</th>
                        <th>Atualizado em</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($testimonials as $testimonial)
                        <tr>
                            <td>{{ $testimonial->id }}</td>
                            <td>
                                {!! ($testimonial->landing) ? "<button class='btn btn-warning' id='$testimonial->id.minus' onclick='updateLandingPage(0, $testimonial->id)' style='display: block'><i class='glyph-icon icon-minus'> Remover</i></button>
                                <button class='btn btn-black' id='$testimonial->id.plus' onclick='updateLandingPage(1, $testimonial->id)' style='display: none'><i class='glyph-icon icon-plus'> Ativar</i></button>":"<button class='btn btn-black' id='$testimonial->id.plus' onclick='updateLandingPage(1, $testimonial->id)' style='display: block'><i class='glyph-icon icon-plus' > Ativar</i></button><button class='btn btn-warning' id='$testimonial->id.minus' onclick='updateLandingPage(0, $testimonial->id)' style='display: none'><i class='glyph-icon icon-minus'> Remover</i></button>" !!}
                            </td>
                            <td>{{ $testimonial->customer->usuario }}</td>
                            <td>{{ $testimonial->game->name }}</td>
                            <td>{{ $testimonial->title }}    </td>
                            <td>{{ $testimonial->body }} </td>
                            <td>
                                @if($testimonial->approved == 1)
                                    <center>
                                        <b>Pendente</b>
                                        <form action="{{ route('testimonials.update-status') }}" method="post">
                                            <input type="text" value="2" name="status" id="status" hidden>
                                            <input type="text" value="{{ $testimonial->id }}" name="testimonial-id"
                                                   id="testimonial-id" hidden>
                                            <button class="btn btn-sm btn-success" title="Aprovar Depoimento">
                                                <span class="glyph-icon icon-check"></span>
                                            </button>
                                        </form>
                                        <form action="{{ route('testimonials.update-status') }}" method="post">
                                            <input type="text" value="3" name="status" id="status" hidden>
                                            <input type="text" value="{{ $testimonial->id }}" name="testimonial-id"
                                                   id="testimonial-id" hidden>
                                            <button class="btn btn-sm btn-warning" title="Reprovar Depoimento">
                                                <span class="glyph-icon icon-remove"></span>
                                            </button>
                                        </form>
                                    </center>
                                @elseif($testimonial->approved == 2)
                                    <center>
                                        <b>Aprovado</b>
                                        <form class="form-horizontal bordered-row"
                                              action="{{ route('testimonials.update-status') }}" method="post">
                                            <input type="text" value="1" name="status" id="status" hidden>
                                            <input type="text" value="{{ $testimonial->id }}" name="testimonial-id"
                                                   id="testimonial-id" hidden>
                                            <button class="btn btn-sm btn-warning" title="Remover Aprovação">
                                                <span class="glyph-icon icon-remove"></span>
                                            </button>
                                        </form>
                                    </center>
                                @elseif($testimonial->approved == 3)
                                    <center>
                                        <b>Reprovado</b>
                                        <form class="form-horizontal bordered-row"
                                              action="{{ route('testimonials.update-status') }}" method="post">
                                            <input type="text" value="2" name="status" id="status" hidden>
                                            <input type="text" value="{{ $testimonial->id }}" name="testimonial-id"
                                                   id="testimonial-id" hidden>
                                            <button class="btn btn-sm btn-success" title="Aprovar Depoimento">
                                                <span class="glyph-icon icon-check"></span>
                                            </button>
                                        </form>
                                    </center>
                                @endif
                            </td>
                            <td>
                                <form class="form-horizontal bordered-row"
                                      action="{{ route('testimonials.update-language') }}" method="post">
                                    <input type="text" value="{{ $testimonial->id }}" name="testimonial-id"
                                           id="testimonial-id" hidden>
                                    <select class="form-control" name="language">
                                        <option value="1" {{ ($testimonial->lang == 1) ? 'selected':'' }} >br</option>
                                        <option value="2" {{ ($testimonial->lang == 2) ? 'selected':'' }}>en</option>
                                        <option value="3" {{ ($testimonial->lang == 3) ? 'selected':'' }}>es</option>
                                    </select>
                                    <center>
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <span class="glyph-icon icon-refresh"></span>
                                        </button>
                                    </center>
                                </form>
                            </td>
                            <td>{{ brDate($testimonial->created_at) }}</td>
                            <td>{{ brDate($testimonial->updated_at) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $testimonials->render() }}
@endsection
@section('extra-scripts')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#method').change(function () {
                if (jQuery(this).val() == 'game') {
                    jQuery("#value_text").hide().prop('disabled', true).removeAttr('name');
                    jQuery("#value_select").show().attr('name','value');
                } else {
                    jQuery("#value_text").show().prop('disabled', false).attr('name','value');
                    jQuery("#value_select").hide().prop('disabled', true).removeAttr('name');
                }
            });
        });
    </script>
    <script type="text/javascript">
        function updateLandingPage($value, $id) {
            jQuery(document).ready(function () {
                var status = $value;
                var id = $id;
                jQuery.ajax({
                    type: "POST",
                    url: '{{ route('testimonials.update-landing') }}',
                    data: {status: status, id: id},
                    success: function () {
                        $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-success"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-green alert-icon"><i class="glyph-icon icon-check"></i></div><div class="alert-content"><h4 class="alert-title">Pronto!</h4><p><b>Sua Solicitição foi atendida com sucesso.</b></p></div></div></div></div></div></div></div></div></div></div>').delay(3000).hide(500);
                        ;
                        if (status == 1) {
                            document.getElementById(id + '.minus').style.display = 'block';
                            document.getElementById(id + '.plus').style.display = 'none';
                        }
                        else {
                            document.getElementById(id + '.minus').style.display = 'none';
                            document.getElementById(id + '.plus').style.display = 'block';
                        }

                    },
                    error: function () {
                        $('#result').html('<p><div class="example-box-wrapper"><div class="alert alert-close alert-error"><a href="#" title="Close" class="glyph-icon alert-close-btn icon-remove"></a><div class="bg-green alert-icon"><i class="glyph-icon icon-remove"></i></div><div class="alert-content"><h4 class="alert-title">Erro!</h4><p><b>Favor entrar em contato com o setor de Desenvolvimento.</b></p></div></div></div></div></div></div></div></div></div></div>').delay(3000).hide(500);
                        ;
                    }
                });

                return false;
            });
        }
    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paging: false,
            });
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });

    </script>
@endsection
