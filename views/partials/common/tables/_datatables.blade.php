<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
    <thead>
    <tr>
        @foreach($titles as $title)
            <th>{{ $title }}</th>
        @endforeach
    </tr>
    </thead>
    <tfoot>
    <tr>
        @foreach($titles as $title)
            <th>{{ $title }}</th>
        @endforeach
    </tr>
    </tfoot>

    <tbody>
    <tr>
        @foreach($rows as $row)
            <td>{{ $row }}</td>
        @endforeach
    </tr>
    </tbody>

</table>