@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Filter com Parametros</h2>

    </div>
    <div class="panel">

        <div class="panel-body">
            @if(isset($error))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Aviso!</h4>
                    {{ $error }}
                </div>
            @endif
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Filter</th>
                        <th>Options</th>
                        <th>Path</th>
                        <th>Window</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Filter</th>
                        <th>Options</th>
                        <th>Path</th>
                        <th>Window</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($filters as $filter)
                        <tr>
                            <td>{{ $filter->identifier }}</td>
                            <td>{{ $filter->options }}</td>
                            <td>{{ $filter->path_ocurrence }}</td>
                            <td>{{ $filter->window_ocurrence }}</td>
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


    </script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paging: false,
            });
        });


    </script>
@endsection