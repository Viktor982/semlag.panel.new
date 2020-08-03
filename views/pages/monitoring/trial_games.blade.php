@extends('layout.default')
@section('content')
    <div id="page-title">
        <h2>Relatório de trials</h2>
    </div>
    <div class="panel">
        <div class="panel-body">
            <div class="example-box-wrapper">
                <div class="accordion" id="countries-general">

                </div>
                <hr>
                <div class="container">
                    <div class="row">
                        <div id="country-charts">

                        </div>
                    </div>
                </div>
                <br><br>
                <br class="clearfix">
                <hr>
                <table class="table table-striped table-bordered responsive no-wrap" id="games-tbl">
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
                        <th>token:</th>
                        <th>mais jogado:</th>
                        <th>proccess:</th>
                        <th>tempo mais jogado</th>
                        <th>tempo total</th>
                        <th>data de registro</th>
                        <th>Freed?</th>
                        <th>Freed Address</th>
                        <th>País</th>
                    </tr>
                    </thead>
                    <tbody id="trials-table">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script type="text/javascript">

        var COUNTRY_CC = {"NULL":"INDEFINIDO","BD": "Bangladesh", "BE": "Belgium", "BF": "Burkina Faso", "BG": "Bulgaria", "BA": "Bosnia and Herzegovina", "BB": "Barbados", "WF": "Wallis and Futuna", "BL": "Saint Barthelemy", "BM": "Bermuda", "BN": "Brunei", "BO": "Bolivia", "BH": "Bahrain", "BI": "Burundi", "BJ": "Benin", "BT": "Bhutan", "JM": "Jamaica", "BV": "Bouvet Island", "BW": "Botswana", "WS": "Samoa", "BQ": "Bonaire, Saint Eustatius and Saba ", "BR": "Brazil", "BS": "Bahamas", "JE": "Jersey", "BY": "Belarus", "BZ": "Belize", "RU": "Russia", "RW": "Rwanda", "RS": "Serbia", "TL": "East Timor", "RE": "Reunion", "TM": "Turkmenistan", "TJ": "Tajikistan", "RO": "Romania", "TK": "Tokelau", "GW": "Guinea-Bissau", "GU": "Guam", "GT": "Guatemala", "GS": "South Georgia and the South Sandwich Islands", "GR": "Greece", "GQ": "Equatorial Guinea", "GP": "Guadeloupe", "JP": "Japan", "GY": "Guyana", "GG": "Guernsey", "GF": "French Guiana", "GE": "Georgia", "GD": "Grenada", "GB": "United Kingdom", "GA": "Gabon", "SV": "El Salvador", "GN": "Guinea", "GM": "Gambia", "GL": "Greenland", "GI": "Gibraltar", "GH": "Ghana", "OM": "Oman", "TN": "Tunisia", "JO": "Jordan", "HR": "Croatia", "HT": "Haiti", "HU": "Hungary", "HK": "Hong Kong", "HN": "Honduras", "HM": "Heard Island and McDonald Islands", "VE": "Venezuela", "PR": "Puerto Rico", "PS": "Palestinian Territory", "PW": "Palau", "PT": "Portugal", "SJ": "Svalbard and Jan Mayen", "PY": "Paraguay", "IQ": "Iraq", "PA": "Panama", "PF": "French Polynesia", "PG": "Papua New Guinea", "PE": "Peru", "PK": "Pakistan", "PH": "Philippines", "PN": "Pitcairn", "PL": "Poland", "PM": "Saint Pierre and Miquelon", "ZM": "Zambia", "EH": "Western Sahara", "EE": "Estonia", "EG": "Egypt", "ZA": "South Africa", "EC": "Ecuador", "IT": "Italy", "VN": "Vietnam", "SB": "Solomon Islands", "ET": "Ethiopia", "SO": "Somalia", "ZW": "Zimbabwe", "SA": "Saudi Arabia", "ES": "Spain", "ER": "Eritrea", "ME": "Montenegro", "MD": "Moldova", "MG": "Madagascar", "MF": "Saint Martin", "MA": "Morocco", "MC": "Monaco", "UZ": "Uzbekistan", "MM": "Myanmar", "ML": "Mali", "MO": "Macao", "MN": "Mongolia", "MH": "Marshall Islands", "MK": "Macedonia", "MU": "Mauritius", "MT": "Malta", "MW": "Malawi", "MV": "Maldives", "MQ": "Martinique", "MP": "Northern Mariana Islands", "MS": "Montserrat", "MR": "Mauritania", "IM": "Isle of Man", "UG": "Uganda", "TZ": "Tanzania", "MY": "Malaysia", "MX": "Mexico", "IL": "Israel", "FR": "France", "IO": "British Indian Ocean Territory", "SH": "Saint Helena", "FI": "Finland", "FJ": "Fiji", "FK": "Falkland Islands", "FM": "Micronesia", "FO": "Faroe Islands", "NI": "Nicaragua", "NL": "Netherlands", "NO": "Norway", "NA": "Namibia", "VU": "Vanuatu", "NC": "New Caledonia", "NE": "Niger", "NF": "Norfolk Island", "NG": "Nigeria", "NZ": "New Zealand", "NP": "Nepal", "NR": "Nauru", "NU": "Niue", "CK": "Cook Islands", "XK": "Kosovo", "CI": "Ivory Coast", "CH": "Switzerland", "CO": "Colombia", "CN": "China", "CM": "Cameroon", "CL": "Chile", "CC": "Cocos Islands", "CA": "Canada", "CG": "Republic of the Congo", "CF": "Central African Republic", "CD": "Democratic Republic of the Congo", "CZ": "Czech Republic", "CY": "Cyprus", "CX": "Christmas Island", "CR": "Costa Rica", "CW": "Curacao", "CV": "Cape Verde", "CU": "Cuba", "SZ": "Swaziland", "SY": "Syria", "SX": "Sint Maarten", "KG": "Kyrgyzstan", "KE": "Kenya", "SS": "South Sudan", "SR": "Suriname", "KI": "Kiribati", "KH": "Cambodia", "KN": "Saint Kitts and Nevis", "KM": "Comoros", "ST": "Sao Tome and Principe", "SK": "Slovakia", "KR": "South Korea", "SI": "Slovenia", "KP": "North Korea", "KW": "Kuwait", "SN": "Senegal", "SM": "San Marino", "SL": "Sierra Leone", "SC": "Seychelles", "KZ": "Kazakhstan", "KY": "Cayman Islands", "SG": "Singapore", "SE": "Sweden", "SD": "Sudan", "DO": "Dominican Republic", "DM": "Dominica", "DJ": "Djibouti", "DK": "Denmark", "VG": "British Virgin Islands", "DE": "Germany", "YE": "Yemen", "DZ": "Algeria", "US": "United States", "UY": "Uruguay", "YT": "Mayotte", "UM": "United States Minor Outlying Islands", "LB": "Lebanon", "LC": "Saint Lucia", "LA": "Laos", "TV": "Tuvalu", "TW": "Taiwan", "TT": "Trinidad and Tobago", "TR": "Turkey", "LK": "Sri Lanka", "LI": "Liechtenstein", "LV": "Latvia", "TO": "Tonga", "LT": "Lithuania", "LU": "Luxembourg", "LR": "Liberia", "LS": "Lesotho", "TH": "Thailand", "TF": "French Southern Territories", "TG": "Togo", "TD": "Chad", "TC": "Turks and Caicos Islands", "LY": "Libya", "VA": "Vatican", "VC": "Saint Vincent and the Grenadines", "AE": "United Arab Emirates", "AD": "Andorra", "AG": "Antigua and Barbuda", "AF": "Afghanistan", "AI": "Anguilla", "VI": "U.S. Virgin Islands", "IS": "Iceland", "IR": "Iran", "AM": "Armenia", "AL": "Albania", "AO": "Angola", "AQ": "Antarctica", "AS": "American Samoa", "AR": "Argentina", "AU": "Australia", "AT": "Austria", "AW": "Aruba", "IN": "India", "AX": "Aland Islands", "AZ": "Azerbaijan", "IE": "Ireland", "ID": "Indonesia", "UA": "Ukraine", "QA": "Qatar", "MZ": "Mozambique"};

        var RULES = {!! json_encode($rules_by_id->toArray()) !!};

        var RULEID_BY_PROCESS = {!! json_encode($rule_id_by_process) !!};

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
        
        var results = {!! $results !!};

        var tbl = document.getElementById('trials-table');
        var playedGames = {};
        var playedGamesByCountry = {};
        var CountryPlayedGames = {};
        var countries = {};
        Object.keys(results).forEach(function (k){
            var customer = results[k];
            if('games' in customer) {
                if(!(customer.cc in countries)){
                    countries[customer.cc] = 1;
                }else {
                    countries[customer.cc] += 1;
                }
                if(!(customer.cc in CountryPlayedGames)){
                    CountryPlayedGames[customer.cc] = {};
                }
                Object.keys(customer.games.process)
                    .forEach(function (w) {
                        var _w = (w === 'Others') ? RULES[RULEID_BY_PROCESS[customer.games.process[w]]] : w;
                        if(!(_w in playedGames)) {
                            playedGames[_w] = [];
                        }
                        if(! (_w in playedGamesByCountry)){
                            playedGamesByCountry[_w] = {};
                        }
                        if(! (customer.cc in playedGamesByCountry[_w])){
                            playedGamesByCountry[_w][customer.cc] = 0;
                        }
                        if(! (_w in CountryPlayedGames[customer.cc])) {
                            CountryPlayedGames[customer.cc][_w] = 0;
                        }
                        playedGamesByCountry[_w][customer.cc] += 1;
                        playedGames[_w].push(customer.games.time[w]);
                        CountryPlayedGames[customer.cc][_w] += 1;
                    });
            }

            if(customer.length === undefined) {
                var _tr = document.createElement('tr');

                var _created = document.createElement('td');
                _created.innerHTML = customer.created_at || 'não definido';

                var _token = document.createElement('td');
                _token.innerHTML = k;

                var _most = document.createElement('td');
                var _h = objHighestKey(customer.games.time);
                _most.innerHTML = _h;

                var _time = document.createElement('td');
                _time.innerHTML = secondsToHMS(customer.games.time[_h]);

                var _process = document.createElement('td');
                _process.innerHTML = customer.games.process[_h];
                var _total = document.createElement('td');
                _total.innerHTML = secondsToHMS(sumObjValues(customer.games.time));

                var _freed = document.createElement('td');
                _freed.innerHTML = (customer.freed) ? 'sim' : 'não';
                var _freedIp = document.createElement('td');
                _freedIp.innerHTML = '('+COUNTRY_CC[customer.freed_address_cc]+')'+customer.freed_address;

                var _country = document.createElement('td');
                _country.innerHTML = '('+COUNTRY_CC[customer.cc]+') '+customer.ip;

                _tr.appendChild(_token);
                _tr.appendChild(_most);
                _tr.appendChild(_process);
                _tr.appendChild(_time);
                _tr.appendChild(_total);
                _tr.appendChild(_created);
                _tr.appendChild(_freed);
                _tr.appendChild(_freedIp);
                _tr.appendChild(_country);
                tbl.appendChild(_tr);
            }
        });

        var tbl_games = document.getElementById('games-general');
        var _countries = document.getElementById('countries-general');
        var _totalCountries = sumObjValues(countries);

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
        var charts = document.getElementById('country-charts');

        Object.keys(playedGamesByCountry)
            .forEach(function (_g) {
                var _tid = _g+randomString(6);
                _tid = _tid.safeCSSId();
                var _container = document.createElement('div');
                _container.classList.add('col-lg-6');

                var _canvas = document.createElement('canvas');
                _canvas.id = _tid;

                _container.appendChild(_canvas);
                charts.appendChild(_container);

                var _labels = [];
                var _data = [];
                var _colors = [];

                var _sortedPlayedGamesByCountry = [];

                for (var _country in playedGamesByCountry[_g]) {
                    _sortedPlayedGamesByCountry.push([_country, playedGamesByCountry[_g][_country]]);
                }
                _sortedPlayedGamesByCountry
                    .sort(function (a, b){
                        return a[1] - b[1];
                    })
                    .map(function (i) {
                        return i[0];
                    })
                    .reverse()
                    .forEach(function (_cn) {
                        _labels.push(COUNTRY_CC[_cn]);
                        _data.push(playedGamesByCountry[_g][_cn]);
                        var _ss = md5(_cn+randomString(8));
                        _colors.push('#'+_ss.toHexColour())
                    });

                // NOW CREATE CHART:
                var _configs = {
                    type: 'doughnut',
                    data: {
                        labels: _labels,
                        datasets: [
                            {
                                data: _data,
                                backgroundColor: _colors,
                                hoverBackgroundColor: _colors
                            }
                        ]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: _g+' ('+sumObjValues(playedGamesByCountry[_g])+')'
                        },
                        tooltips: {
                            callbacks: {
                                label: function (tooltipItem, data) {
                                    var allData = data.datasets[tooltipItem.datasetIndex].data;
                                    var tooltipLabel = data.labels[tooltipItem.index];
                                    var tooltipData = allData[tooltipItem.index];
                                    var total = 0;
                                    for (var i in allData) {
                                        total += allData[i];
                                    }
                                    var tooltipPercentage = Math.round((tooltipData / total) * 100);
                                    return tooltipLabel + ': '+tooltipData+' (' + tooltipPercentage + '%)';
                                }
                            }
                        }
                    }
                };

                var _ctx = document.getElementById(_tid).getContext("2d");
                new Chart(_ctx, _configs);

            });

        var sortableContries = [];
        for (var _country in countries) {
            sortableContries.push([_country, countries[_country]]);
        }
        sortableContries.sort(function (a, b) {
                return a[1] - b[1];
            })
            .reverse()
            .map(function (arr) {
                return arr[0];
            })
            .forEach(function (c) {
                var _title = document.createElement('h3');
                var _container = document.createElement('div');
                var _canvas = document.createElement('canvas');
                _title.innerHTML = ((c !== 'NULL') ? COUNTRY_CC[c] : 'INDEFINIDO')+' |'+countries[c]+'| ('+((countries[c] / _totalCountries) * 100).toFixed(2)+'%)';
                var _games = CountryPlayedGames[c];

                var _labels = [];
                var _data = [];
                var _colors = [];
                var _id = randomString(14).safeCSSId();
                _canvas.id = _id;
                _container.appendChild(_canvas);

                var _sortedGames = [];
                for (var _game in _games) {
                    _sortedGames.push([_game, _games[_game]]);
                }
                _sortedGames
                    .sort(function (a, b) {
                        return a[1] - b[1];
                    })
                    .map(function (i) {
                        return i[0];
                    })
                    .reverse()
                    .forEach(function (g) {
                        _labels.push(g);
                        _data.push(_games[g]);
                        _colors.push('#'+(randomString(20)+g).toHexColour());
                    });

                var _configs = {
                    type: 'doughnut',
                    data: {
                        labels: _labels,
                        datasets: [
                            {
                                data: _data,
                                backgroundColor: _colors,
                                hoverBackgroundColor: _colors
                            }
                        ]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: COUNTRY_CC[c]
                        },
                        tooltips: {
                            callbacks: {
                                label: function (tooltipItem, data) {
                                    var allData = data.datasets[tooltipItem.datasetIndex].data;
                                    var tooltipLabel = data.labels[tooltipItem.index];
                                    var tooltipData = allData[tooltipItem.index];
                                    var total = 0;
                                    for (var i in allData) {
                                        total += allData[i];
                                    }
                                    var tooltipPercentage = Math.round((tooltipData / total) * 100);
                                    return tooltipLabel + ': '+tooltipData+' (' + tooltipPercentage + '%)';
                                }
                            }
                        }
                    }
                };

                _countries.appendChild(_title);
                _countries.appendChild(_container);

                var _ctx = document.getElementById(_id).getContext("2d");
                new Chart(_ctx, _configs);
            });

        $(function() { "use strict";
            $(".accordion").accordion({
                heightStyle: "content",
                collapsible: true,
                active: false
            });
        });

        /* Datatables responsive */

        $(document).ready(function () {
            $('#datatable-responsive').DataTable({
                responsive: true,
                paginate: false,
                order:[]
            });
            $('#countries-tbl').DataTable({
                responsive: true,
                paginate: false,
                order:[]
            });
            $('#games-tbl').DataTable({
                responsive: true,
                paginate: false,
                order:[[2, 'desc']]
            });
        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Pesquisar...");
        });

    </script>
@endsection