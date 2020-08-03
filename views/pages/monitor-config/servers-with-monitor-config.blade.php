@extends('layout.default')
@section('content')
 <style style="text/css">
  tbody:hover {
        background-color: #ffff99 !important;
  },
  #outer
    {
        width:100%;
        text-align: left;
    }
  .inner
    {
        display: inline-block;
    }
  }
</style> 
    <div id="page-title">
            <h2>Monitor Config</h2>
            <p>Relação de Servidores com Monitor Config</p>
    </div>
    <div class="panel">
        
        <div class="panel-body">
                <div class="form-horizontal bordered-row">
                        <label for="#myInput"></label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <span class="input-group-addon bg-white border-left-0"><i class="glyph-icon icon-search"></i></span>
                                <input class="form-control type="name" id="myInput"
                                 placeholder="Search" name="Search" onkeyup="search()">
                        </div>
                    </div>
                </div>
            <br class="clearfix">
            
                <div id="servers_info">
                        <div id="new_register" class="example-box-wrapper">
                            <table id="servers_info_table" class="table table-bordered responsive no-wrap sortable" 
                            cellspacing="0" width="100%">                   
                                <thead style="color:black">
                                <tr>
                                    <th>Servidores com Monitor Config</th>
                                    <th>IPs em Monitor Config sem registro</th>
                                    <th>Servidores sem Monitor Config</th>
                                </tr>
                                </thead>
                                <tfoot>
                                        <tr>
                                                <th colspan="3" style="text-align:center;"><h3 style="font-weight:bold;"></h3></th>
                                        </tr> 
                                </tfoot>
                                <tbody>
                                <form>
                                    <tr>
                                        <td style="color:black;font-weight:bolder;background-color:lightgreen">{{ $with_monitor }}</td>
                                        <td style="color:black;font-weight:bolder;background-color:lightgrey">{{ $without_monitor }}</td>
                                        <td style="color:black;font-weight:bolder;background-color:lightsalmon">{{ count($without_table) }}</td>
                                    </tr>
                                </form> 
                                </div>
                            </div>
                <br class="clearfix">
                <div class="example-box-wrapper col-sm-12">
                    <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap sortable"
                           cellspacing="0"  width="100%">
                        <thead>
                        <tr>
                            <th>IP</th>
                            <th>Nome do servidor ausente</th>
                        </tr>
                        </thead>
    
                        <tfoot>
                        <tr>
                            <th>IP</th>
                            <th>Nome do servidor ausente</th>
                        </tr>
                        </tfoot>
    
                        <tbody>
                       @foreach ($without_table as $server)
                       <form>
                       <tr>
                       <td>{{$server->ip}}</td>
                       <td>{{$server->name}}</td>
                         </tr>
                        </form>
                       @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>  
@endsection
@section('extra-scripts')
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/balloon-css/0.5.0/balloon.min.css">
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

<script>
        jQuery(document).ready(function(){
        jQuery('#switch').on('click', function(event) {        
             jQuery('#online').toggle('show');
             jQuery('#offline').toggle('show');
        });
    });

</script>
@endsection