@extends('layout.default')
@section('content')


    <div id="page-title">
        <h2>Criar Testimonial</h2>
        <p>Criação de Testimonial Fake.</p>
    </div>
    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <form action="{{ route('testimonials.fake-store') }}" method="post" class="form-horizontal">

                    <div class="form-group" id="customer_fake" style="display: none">

                        <div class="col-sm-6">
                            <input type="text" id="customer_id" name="customer_id" value="{{ $customer->id }}">
                            <input type="text" id="customer_name" name="customer_name" value="{{ $customer->nome }}">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="subject" class="col-sm-3 control-label">Jogo:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="game">
                                @foreach($games as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-sm-3 control-label">Depoimento:</label>
                        <div class="col-sm-6">
                            <textarea required name="testimonial" id="testimonial" cols="30" rows="10"
                                      class="form-control" placeholder="Mensagem..."></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email_to" class="col-sm-3 control-label">Idioma:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="language">
                                @foreach($languages as $lang)
                                    <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email_to" class="col-sm-3 control-label">Lançamento:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="launch" onchange="showSchedule(this)">
                                <option value="1">Lançar agora</option>
                                <option value="2">Adiar</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" id="schedule" style="display: none">
                        <label for="schedule" class="col-sm-3 control-label">Adiar Para:</label>
                        <div class="col-sm-6">
                            <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">
                                        <i class="glyph-icon icon-calendar"></i>
                                    </span>
                                <input type="text" id="schedule_for" name="schedule_for"
                                       class="form_datetime form-control" value="" data-date-format="dd/mm/yy">
                            </div>
                        </div>
                    </div>

                    <div class="form-group bordered-row text-left">
                        <button class="btn btn-success"><i class="glyph-icon icon-send"></i> Criar Depoimento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('extra-scripts')

    <script type="text/javascript">
        function showSchedule(select) {
            if (select.value == '2') {
                document.getElementById('schedule').style.display = "block";
            } else {
                document.getElementById('schedule').style.display = "none";
                document.getElementById('schedule_for').value = ''; // Limpa o campo
            }
        }
    </script>

    <script type="text/javascript">
        $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'});
    </script>
@endsection