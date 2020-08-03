@extends('layout.default')
@section('content')

    <div id="page-title">
        <h2>Relatório VIP</h2>
    </div>

    <div class="form-horizontal bordered-row">
        <form class="form-group" action="#" method="post">
            <label class="col-sm-3 control-label">Filtro</label>
            <div class="col-sm-2">
                <select class="form-control" id="method" name="method">
                    <option value="email">Email</option>
                </select>
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="form-control" id="value_text" name="value">
                    <span class="input-group-btn">
                                <button class="btn btn-info" id="filter">
                                    <i class="glyph-icon icon-search"></i>
                                </button>
                            </span>
                </div>
            </div>
        </form>
    </div>
    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="all">Cliente</th>
                        <th>Titulo</th>
                        <th class="none">Dia 31</th>
                        <th class="none">Dia 30</th>
                        <th class="none">Dia 29</th>
                        <th class="none">Dia 28</th>
                        <th class="none">Dia 27</th>
                        <th class="none">Dia 26</th>
                        <th class="none">Dia 25</th>
                        <th class="none">Dia 24</th>
                        <th class="none">Dia 23</th>
                        <th class="none">Dia 22</th>
                        <th class="none">Dia 21</th>
                        <th class="none">Dia 22</th>
                        <th class="none">Dia 20</th>
                        <th class="none">Dia 19</th>
                        <th class="none">Dia 18</th>
                        <th class="none">Dia 17</th>
                        <th class="none">Dia 16</th>
                        <th class="none">Dia 15</th>
                        <th class="none">Dia 14</th>
                        <th class="none">Dia 13</th>
                        <th class="none">Dia 12</th>
                        <th class="none">Dia 11</th>
                        <th class="none">Dia 10</th>
                        <th class="none">Dia 9</th>
                        <th class="none">Dia 8</th>
                        <th class="none">Dia 7</th>
                        <th class="none">Dia 6</th>
                        <th>Dia 5</th>
                        <th>Dia 4</th>
                        <th>Dia 3</th>
                        <th>Dia 2</th>
                        <th>Dia 1</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th class="all">Cliente</th>
                        <th>Titulo</th>
                        <th class="none">Dia 31</th>
                        <th class="none">Dia 30</th>
                        <th class="none">Dia 29</th>
                        <th class="none">Dia 28</th>
                        <th class="none">Dia 27</th>
                        <th class="none">Dia 26</th>
                        <th class="none">Dia 25</th>
                        <th class="none">Dia 24</th>
                        <th class="none">Dia 23</th>
                        <th class="none">Dia 22</th>
                        <th class="none">Dia 21</th>
                        <th class="none">Dia 22</th>
                        <th class="none">Dia 20</th>
                        <th class="none">Dia 19</th>
                        <th class="none">Dia 18</th>
                        <th class="none">Dia 17</th>
                        <th class="none">Dia 16</th>
                        <th class="none">Dia 15</th>
                        <th class="none">Dia 14</th>
                        <th class="none">Dia 13</th>
                        <th class="none">Dia 12</th>
                        <th class="none">Dia 11</th>
                        <th class="none">Dia 10</th>
                        <th class="none">Dia 9</th>
                        <th class="none">Dia 8</th>
                        <th class="none">Dia 7</th>
                        <th class="none">Dia 6</th>
                        <th>Dia 5</th>
                        <th>Dia 4</th>
                        <th>Dia 3</th>
                        <th>Dia 2</th>
                        <th>Dia 1</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    <tr>
                        <td>Marcos</td>
                        <td>teste@teste.com.b</td>
                        <td>+30</td>
                        <td>-1</td>
                        <td>-1</td>
                        <td>-1</td>
                        <td>6</td>
                        <td>9</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('extra-scripts')

    <script type="text/javascript">

        /* Datatables responsive */


        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true
            });
        });

    </script>
@endsection