@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Linguagens</h2>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Linguagem</th>
                        <th>Titulo</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Linguagem</th>
                        <th>Titulo</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($langs as $lang => $files)
                        <tr>
                            <td colspan="3"><h1 style="text-align: center;">Idioma: {{ $lang }}</h1></td>
                        </tr>
                        @foreach($files as $file)
                            <tr>
                                <td>{{ $file->lang }}</td>
                                <td>{{ $file->title }}</td>
                                <td>
                                    <form action="{{ route('site.read-file') }}" method="post">
                                        <input name="file" value="{{ $file->file }}" style="display: none">
                                        <button type="submit" class="btn btn-black"><i class="glyph-icon icon-edit"></i>
                                            Ler
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')

@endsection