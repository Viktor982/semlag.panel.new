@extends('layout.default')
@section('content')
    <div>
        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label"><input type="checkbox" id="travel-checkbox"> Travel in time:</label>
                        <div class="col-sm-8" id="time-selector" style="display:none;">
                            <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">
                                        <i class="glyph-icon icon-calendar"></i>
                                    </span>
                                <input type="text"
                                       id="daterangepicker-time"
                                       class="form-control"
                                       value="{{ date('Y/m/d') }} - {{ date('Y/m/d') }}">
                            </div>
                            <button class="btn btn-success" id="travel-go">go</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div id="map"></div>
@endsection

@section('extra-scripts')
    <style>
        /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */

        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */

        html,
        body {
            height: 100%;
        }

        #time-slider .ui-slider-range {
            background: #000000;
            opacity: 0.5;

            filter: alpha(opacity=50);
        }

        #time-slider .ui-slider-handle {
            background: #000000;
        }

    </style>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6tN1f1aQfrL27P7_SdGGEQ-l_bIczZdI&callback=init"></script>
    <style src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css"></style>

    @include('pages.monitoring.partials.map-style')
    <script>

        var _LOOP_ = null;

        function init() {

            var _TRAVEL_ = false;

            document.getElementById('travel-checkbox')
                .addEventListener('change', function () {
                    _TRAVEL_ = !_TRAVEL_;
                    resetAllAlerts();

                    if(! _TRAVEL_){
                        createRefreshLoop();
                    }else {
                        resetRefreshLoop();
                    }
                    document.getElementById('time-selector').style.display = (_TRAVEL_) ? 'block' : 'none';
                });

            document.getElementById('travel-go')
                .addEventListener('click', function () {
                    loadTravelInTimeAlerts();
                });

            document.getElementById('daterangepicker-time')
                .addEventListener('change', function () {
                    resetAllAlerts();
                });

            function loadTravelInTimeAlerts() {
                resetAllAlerts();
                var timeTotal = $('#daterangepicker-time').val().split(' - ').map(function (i){
                    return i.replace(/\//g, "-");
                });
                var args = 'ts='+timeTotal[0]+'&'+'te='+timeTotal[1];
                args = args.replace(/AM/g, '');
                $.ajax({
                    url: '/api/server-alerts?'+args
                }).done(function (data) {
                    var json = JSON.parse(data);
                    var result = [];
                    Object.keys(json).forEach(function (k) {
                        result.push(json[k]);
                    });
                    result.forEach(function (alert) {
                        addAlert(alert, true);
                    });
                    lifeCycle(true);
                });
            }

            function toggleTravelInTimeView() {
                var selector = document.getElementById('time-selector').style.display;
                document.getElementById('time-selector').style.display = (selector === 'none') ? 'block' : 'none';
            }


            function resetAllAlerts() {
                Object.keys(_SERVER_ALERT_LIST_).forEach(function (k) {
                    var _row = _SERVER_ALERT_LIST_[k];
                    _row.alerts = {};
                    _row.line.setMap(null);
                });
            }

            function resetRefreshLoop() {
                if(_LOOP_ !== null){
                    clearInterval(_LOOP_);
                    _LOOP_ = null;
                }
            }
            function createRefreshLoop() {
                if(_LOOP_ === null) {
                    _LOOP_ = setInterval(function () {
                        updateAlerts(function (data) {
                            var json = JSON.parse(data);
                            json.forEach(function (alert) {
                                addAlert(alert);
                            });
                            lifeCycle();
                        });
                    }, 5000);
                }
            }

            var _SERVER_LIST_ = {};
            var _SERVER_ALERT_LIST_ = {};

            var serverRoute = function (id) {
                var base = '{{ route('monitoring.edit-server', ['id' => ':id']) }}';
                return base.replace(':id', id);
            };

            function addServer(_server) {
                _SERVER_LIST_[_server.id] = {
                    ip: _server.ip,
                    name: _server.name,
                    lat: _server.lat,
                    lng: _server.lng,
                    location: _server.location
                };
            }

            function getServer(id) {
                return _SERVER_LIST_[id];
            }

            function getLine(id) {
                return _SERVER_ALERT_LIST_[id];
            }

            var generateErrorString = function (alert) {
                var messages = {
                    1: ':o teve spike ao pingar :d',
                    16: ':o teve timeout ao pingar :d',
                    4: ':o teve flutuação pingar :d'
                };
                var origin = getServer(alert.origin);
                var destination = getServer(alert.destination);
                return messages[alert.type].replace(':d', destination.name + ' (' + destination.location + ')').replace(':o', origin.name + ' (' + origin.location + ')');
            };

            var generateErrorInfo = function (id) {
                var line = getLine(id);
                var keys = Object.keys(line.alerts);
                var errors = [];
                keys.forEach(function (k) {
                    errors.push(generateErrorString(line.alerts[k]));
                });
                return errors.join('<br>');
            };

            var addAlertLine = function (name, p1, p2) {
                if (!(name in _SERVER_ALERT_LIST_)) {
                    _SERVER_ALERT_LIST_[name] = {
                        line: null,
                        info: null,
                        alerts: {},
                        p1: p1,
                        p2: p2
                    };
                }
            };

            var now = function () {
                return new Date().getTime();
            };

            var convertDT = function (dt) {
                return new Date(dt).getTime();
            };

            var addAlert = function (alert, ignore = false) {
                if (ignore || now() < convertDT(alert.expire_at)) {
                    var _line = hash_line(alert.pinger_id, alert.server_id);
                    addAlertLine(_line, alert.pinger_id, alert.server_id);
                    var _name = hash_alert(alert.pinger_id, alert.type);
                    if (!(_name in _SERVER_ALERT_LIST_[_line].alerts)) {
                        _SERVER_ALERT_LIST_[_line].alerts[_name] = {
                            type: alert.type,
                            origin: alert.pinger_id,
                            destination: alert.server_id,
                            id: alert.id,
                            expire: alert.expire_at
                        }
                    } else {
                        if (_SERVER_ALERT_LIST_[_line].alerts[_name].id < alert.id) {
                            _SERVER_ALERT_LIST_[_line].alerts[_name].id = alert.id;
                            _SERVER_ALERT_LIST_[_line].alerts[_name].expire = alert.expire_at;
                        }
                    }
                }
            };

            function getCoordServers(id) {
                var _server = _SERVER_LIST_[id];
                if (!_server) {
                    return {
                        lat: 0,
                        lng: 0
                    }
                }
                return {
                    lat: _server.lat,
                    lng: _server.lng
                };
            }

            function hash_line(origin, destination) {
                var _arr = [origin, destination];
                return _arr.sort().join('_');
            }

            function hash_alert(origin, type) {
                return origin + '_' + type;
            }

            function updateAlerts(cb) {
                $.ajax({
                    url: '/api/server-alerts?t=now'
                }).done(function (data) {
                    cb(data);
                });
            }

            var coordinates = {
                routes: {},
                center: {
                    lat: {{ $lat }},
                    lng:{{ $lng }}
                }
            };

            // Create a new StyledMapType object, passing it an array of styles,
            // and the name to be displayed on the map type control.
            var styledMapType = new google.maps.StyledMapType(mapStyle, {
                name: 'Styled Map'
            });

            // Create a map object, and include the MapTypeId to add
            // to the map type control.
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    "lat": parseInt(coordinates.center.lat),
                    "lng": parseInt(coordinates.center.lng)
                },
                zoom: 5,
                mapTypeControlOptions: {
                    mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                        'styled_map'
                    ]
                }
            });

            function lifeCycle(ignore = false) {
                var _keys = Object.keys(_SERVER_ALERT_LIST_);
                _keys.forEach(function (k) {
                    _row = _SERVER_ALERT_LIST_[k];
                    _coords = [getCoordServers(_row.p1), getCoordServers(_row.p2)];;

                    if(! _TRAVEL_) {
                        Object.keys(_row.alerts).forEach(function (i) {
                            if (now() > convertDT(_row.alerts[i].expire)) {
                                delete _row.alerts[i];
                            }
                        });

                        // set line as null
                        if (Object.keys(_row.alerts).length === 0 && _row.line !== null) {
                            _row.line.setMap(null);
                            _row.line = null;
                        }
                    }

                    //esse if precisa ver se existem alertas.
                    if (_row.line === null && Object.keys(_row.alerts).length > 0) {
                        var _line = new google.maps.Polyline({
                            path: _coords,
                            geodesic: false,
                            strokeColor: '#d80f2a',
                            strokeOpacity: 1.0,
                            strokeWeight: 2
                        });

                        _line.setMap(map);

                        var infowindow = new google.maps.InfoWindow({
                            content: ''
                        });

                        _line.addListener('click', function (event) {
                            infowindow.setPosition(event.latLng);
                            infowindow.setContent(generateErrorInfo(k));
                            infowindow.open(map);
                        });

                        _SERVER_ALERT_LIST_[k].line = _line;
                        _SERVER_ALERT_LIST_[k].info = infowindow;
                    }
                });
            };
            map.mapTypes.set('styled_map', styledMapType);
            $.get("/api/servers", function (data) {
                data = $.parseJSON(data);
                $.each(data.servers, function (key, _server) {
                    var marker = new google.maps.Marker({
                        position: {
                            lat: _server.lat,
                            lng: _server.lng
                        },
                        map: map,
                        animation: false,
                        draggable: false
                    });
                    var _type = (_server.type == 1) ? "NPSERVER" : "SERVER";
                    addServer(_server);
                    var _link = serverRoute(_server.id);
                    var contentString = `
                        <b>nome:</b> ${_server.name}<br>
                        <b>ip:</b> ${_server.ip}<br>
                        <b>location:</b> ${_server.location}<br>
                        <b>tipo:</b> ${_type}<br>
                        <br>
                        <b><a class="btn btn-primary pull-right" href="javascript:window.location='${_link}'">Editar</a></b>
                    `;
                    var infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });
                    marker.addListener('click', function () {
                        infowindow.open(map, marker);
                    });
                });
            });
            createRefreshLoop();
        }
    </script>
@endsection