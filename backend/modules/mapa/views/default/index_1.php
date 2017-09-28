<!DOCTYPE html>
<html>
    <head>
        <title>Minority Report</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <script src="/Minority/backend/web/assets/663fcccc/jquery.js"></script>
        <style>
            /* Always set the map height explicitly to define the size of the div
             * element that contains the map. */
            #map {
                height: 100%;
            }
            /* Optional: Makes the sample page fill the window. */
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
        </style>
    </head>
    <body>
        <div id="map"></div>
        <script>
            var map;
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 16,
                    center: new google.maps.LatLng(-19.980464, -44.0659),
                    mapTypeId: 'roadmap'
                });

                var iconBase = '/Minority/backend/web/img/icones/';
                var icons = {
                    batalhao: {
                        icon: iconBase + 'police.png'
                    }
                };

                var features = [
                    {
                        position: new google.maps.LatLng(-19.980464, -44.0659),
                        type: 'batalhao'
                    }
                ];

                // Create markers.
                features.forEach(function (feature) {
                    var marker = new google.maps.Marker({
                        position: feature.position,
                        icon: iconBase + 'police.png',
                        map: map
                    });
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBa4P2TMdxRcgbh8zj9PdqdhMuiBQLfV0Y&callback=initMap">
        </script>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: 'GET',
                    url: '/Minority/backend/web/ajax/local'
                }).done(function (data) {
                    $.each(data, function (index, value) {
                        
                    });
                });
            });
        </script>
    </body>
</html>