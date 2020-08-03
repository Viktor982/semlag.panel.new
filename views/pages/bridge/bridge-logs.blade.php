@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Log de ações nos Servidores</h2>
        <p>Listagem.</p>
    </div>
    <div class="panel">

        <div class="panel-body">
            <br class="clearfix">
            <div class="form-horizontal bordered-row">
                <div class="col-sm-2">
                    <div class="input-group">
                        <span class="input-group-addon bg-white border-left-0"><i class="glyph-icon icon-search"></i></span>
                        <input class="form-control" type="name" id="myInput"
                         placeholder="Search" name="Search" onkeyup="search()">
                    </div>
                </div>
            </div>
                
            <br>
            <br>
            <br>
            <br>

            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap sortable"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr style="cursor: pointer;">
                        <th>ID</th>
                        <th>User</th>
                        <th>Message</th>
                        <th>Action</th>
                        <th class="sorttable_numeric">Date</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Message</th>
                        <th>Action</th>
                        <th>Date</th>
                    </tr>
                    </tfoot>

                    <tbody>
                        @foreach ($log as $log_item)
                        <tr>
                            <td>{{$log_item->id}}</td>
                            <td>{{$log_item->user}}</td>
                            <td>{{$log_item->message}}</td>
                            <td>{{$log_item->action}}</td>
                            <th>{{$log_item->date}}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script>
      function search() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("datatable-responsive");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[1];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }       
        }
      }
    </script>
@endsection