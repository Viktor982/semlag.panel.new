@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Depoimentos Programados</h2>
        <p>Criação de Testimonial Fake Programados.</p>
    </div>

    <div class="example-box-wrapper">
        <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Customer ID</th>
                <th>Titulo</th>
                <th>Texto</th>
                <th>Linguagem</th>
                <th>Programado para:</th>
                <th>Convertido?:</th>
                <th>Opções:</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>#</th>
                <th>Customer ID</th>
                <th>Titulo</th>
                <th>Texto</th>
                <th>Linguagem</th>
                <th>Programado para:</th>
                <th>Convertido?:</th>
                <th>Opçõe:</th>
            </tr>
            </tfoot>

            <tbody>
            @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->id }}</td>
                    <td>{{ $schedule->customer_id }} </td>
                    <td>{{ $schedule->title }}</td>
                    <td>{{ $schedule->text }}</td>
                    <td>
                        <select class="form-control" name="language">
                            <option value="1" {{ ($schedule->language == 1) ? 'selected':'' }} >br</option>
                            <option value="2" {{ ($schedule->language == 2) ? 'selected':'' }}>en</option>
                            <option value="3" {{ ($schedule->language == 3) ? 'selected':'' }}>es</option>
                        </select>
                    </td>
                    <td>{{ $schedule->schedule_for }}</td>
                    <td>{{ $schedule->converted }}</td>
                    <td>
                        {!! aroute('<i class="glyph-icon icon-remove"></i> Deletar</a>', 'testimonials.fake-delete-schedule', ['id' => $schedule->id], ['class' => 'btn btn-sm btn-danger'])!!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection

