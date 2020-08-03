@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Relatório de clientes</h2>
    </div>
    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <table class="table table-striped table-bordered responsive no-wrap">
                    <thead>
                    <tr>
                        <td>JOGO</td>
                        <td>Média de uso</td>
                        <td>Total de jogadores</td>
                    </tr>
                    </thead>
                    <tbody id="games-general">

                    </tbody>
                </table>
                <hr>
                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>email</th>
                        <th>mais jogado</th>
                        <th>process</th>
                        <th>tempo mais jogado</th>
                        <th>total jogado</th>
                        <th>primeira venda</th>
                        <th>última venda</th>
                        <th>Afiliado?</th>
                    </tr>
                    </thead>
                    <tbody id="customers-table">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script type="text/javascript">
        var customerRoute = '{{ route('customers.edit', ['id' => ':id']) }}';
        function objHighestKey(obj) {
            return Object.keys(obj).reduce(function(a, b){ return obj[a] > obj[b] ? a : b });
        }

        function secondsToHMS(seconds) {
            return (new Date(seconds * 1000)).toUTCString().match(/(\d\d:\d\d:\d\d)/)[0];
        }

        function sumObjValues(obj) {
            var _total = 0;
            for (var key in obj) {
                _total += obj[key];
            }
            return _total;
        }

        var results = {!! json_encode($results) !!};
        var playedGames = {};
        var tbl = document.getElementById('customers-table');
        Object.keys(results).forEach(function (k){
            var customer = results[k];
            if('email' in customer) {
                if('games' in customer && 'process' in customer.games) {
                    Object.keys(customer.games.process)
                        .forEach(function (e) {
                            var _e = (e === 'Others') ? e+'-'+customer.games.process[e].replace(/\./g, '-') : e;
                            if(!(_e in playedGames)) {
                                playedGames[_e] = [];
                            }
                            playedGames[_e].push(customer.games.time[e]);
                        });
                }
                var _tr = document.createElement('tr');

                var _mail = document.createElement('td');
                _mail.innerHTML = customer.email;

                var _most = document.createElement('td');
                var _h = objHighestKey(customer.games.time);
                _most.innerHTML = _h;

                var _process = document.createElement('td');
                _process.innerHTML = customer.games.process[_h];

                var _time = document.createElement('td');
                _time.innerHTML = secondsToHMS(customer.games.time[_h]);

                var _total = document.createElement('td');
                _total.innerHTML = secondsToHMS(sumObjValues(customer.games.time));

                var _first = document.createElement('td');
                _first.innerHTML = customer.fsale;

                var _last = document.createElement('td');
                _last.innerHTML = customer.lsale;

                var _aff = document.createElement('td');
                if('id' in customer.affiliate){
                    var _affInner = document.createElement('a');
                    var _linkText = document.createTextNode(customer.affiliate.name);
                    _affInner.href = customerRoute.replace(':id', customer.affiliate.id);
                    _affInner.appendChild(_linkText);

                }else {
                    var _affInner = 'não possui';
                }
                _aff.innerHTML = _affInner;


                _tr.appendChild(_mail);
                _tr.appendChild(_most);
                _tr.appendChild(_process);
                _tr.appendChild(_time);
                _tr.appendChild(_total);
                _tr.appendChild(_first);
                _tr.appendChild(_last);
                _tr.appendChild(_aff);
                tbl.appendChild(_tr);
                /*
                DataTables is a shit, and row.add don't work. (/dann95)
                 */
            }
        });
        var tbl_games = document.getElementById('games-general');
        Object.keys(playedGames)
            .forEach(function (e) {
                var _tr = document.createElement('tr');
                var _title = document.createElement('td');
                _title.innerHTML = e;
                var _average = document.createElement('td');
                var _players = playedGames[e].length;
                var _totalplayed = playedGames[e]
                    .reduce(function (a,b) {
                        return a+b;
                    },0);
                _average.innerHTML = secondsToHMS(_totalplayed / _players);

                var _total = document.createElement('td');
                _total.innerHTML = _players;

                _tr.appendChild(_title);
                _tr.appendChild(_average);
                _tr.appendChild(_total);
                tbl_games.appendChild(_tr);
            });

        /* Datatables responsive */

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paginate: false,
                order:[]
            });
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });

    </script>
@endsection