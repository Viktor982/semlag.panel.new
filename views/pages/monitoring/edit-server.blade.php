@extends('layout.default')
@section('content')
    <div>
        <div id="map"></div>
    </div>
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

    </style>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6tN1f1aQfrL27P7_SdGGEQ-l_bIczZdI&callback=init"></script>
    <style src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css">

    </style>
    @include('pages.monitoring.partials.map-style')
    <script>
        var map;

        var coordinates = {
            routes: {},
            center: {
                lat: "{{$lat}}",
                lng: "{{$lng}}"
            }
        };
        var line = [];

        function init() {

            // Create a new StyledMapType object, passing it an array of styles,
            // and the name to be displayed on the map type control.
            var styledMapType = new google.maps.StyledMapType(mapStyle, {
                name: 'Styled Map'
            });

            // Create a map object, and include the MapTypeId to add
            // to the map type control.
            map = new google.maps.Map(document.getElementById('map'), {
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

            $.get('/api/server/{{$id}}', function (_server) {

                _server = $.parseJSON(_server);

                var marker = new google.maps.Marker({
                    position: {
                        lat: {{ $lat }},
                        lng: {{ $lng }}
                    },
                    map: map,
                    animation: google.maps.Animation.DROP,
                    draggable: true
                });

                var updateInfoWindow = function (event) {
                    infowindow.setPosition(event.latLng);
                    infowindow.open(map);

                    $("#location").focus();

                    $("#btn-save").click(function () {

                        var data = {
                            lat: event.latLng.lat(),
                            lng: event.latLng.lng(),
                            location: $('#location').val()
                        }

                        $.post("/api/server/" + _server.id + "/set-position", data, function () {

                            infowindow.close();

                            new Noty({
                                text: 'Geolocalização Salva com sucesso',
                                type: 'success',
                                dismissQueue: true,
                                layout: 'top',
                                timeout: 2000,
                                callbacks: {
                                    afterShow: function () {
                                        var url = "{{ route('monitoring.index', ['coords'=>':coords']) }}";
                                        var coords = btoa(event.latLng.lat() + ';' + event.latLng.lng());
                                        url = url.replace(":coords", coords);
                                        window.location = url;
                                    }
                                }
                            }).show();
                        });
                    });
                };

                marker.addListener('click', function (event) {
                    updateInfoWindow(event);
                });

                marker.addListener('dragend', function (event) {
                    updateInfoWindow(event);
                });


                var contentString = `
                        <b>nome:</b> ${_server.name}<br>
                        <b>ip:</b> ${_server.host}<br>
                        <b>location:</b> ${_server.location}<br>
                        <b>tipo:</b> ${_server.type}<br>
                        <input name="location" id="location" class="form-group" type="text" value="${_server.location}"><br>
                        <button class="btn btn-black pull-right" id="btn-save">Salvar</button>
                    `;


                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

            });

            //Associate the styled map with the MapTypeId and set it to display.
            map.mapTypes.set('styled_map', styledMapType);
            map.setMapTypeId('styled_map');
        }

    </script>
@endsection