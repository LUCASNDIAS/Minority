<!DOCTYPE html>
<?php 
use yii\helpers\Html;
?>
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
                    zoom: 12,
                    center: new google.maps.LatLng(-19.980464, -44.0659),
                    mapTypeId: 'roadmap'
                });

                var iconBase = '/Minority/backend/web/img/icones/';

                $.ajax({
                    type: 'GET',
                    url: '/Minority/backend/web/ajax/local'
                }).done(function (data) {
                    dados = data;
                    $.each(data, function (index, value) {
                        var informacoes = '<div id="content">' +
                                '<div id="siteNotice">' +
                                '</div>' +
                                '<h3 id="firstHeading" class="firstHeading">' + value.nome + '</h3>' +
                                '<div id="bodyContent">' +
                                '<table><tr>' +
                                '<td>Tipo de local:</td>' +
                                '<td>' + value.id + ' - ' + value.tipo + '</td>' +
                                '<tr>' +
                                '<td>Responsavel:</td>' +
                                '<td>' + value.contato + '</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td>Telefone:</td>' +
                                '<td>' + value.telefone + '</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td>Obs.:</td>' +
                                '<td>' + value.observacoes + '</td>' +
                                '</tr>'+
                                '<tr>' +
                                '<td colspan="2">' + '<img src="/Minority/backend/web/img/locais/' + value.id + '/fachada.jpg" width="250px" />' + '</td>' +
                                '</tr><tr><td><a href="/Minority/backend/web/local/default/view?id=' + value.id + '" target="_blank" >Detalhes</a></td></tr></table>' +
                                '</div>' +
                                '</div>';
                        var infowindow = new google.maps.InfoWindow({
                            content: informacoes,
                        });

                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(value.latitude, value.longitude),
                            icon: iconBase + value.icone,
                            //map: map,
                            animation: google.maps.Animation.DROP
//                            draggable: true,
//                            title: "Drag me!"
                        });

                        marker.setMap(map);

                        marker.addListener('click', function () {
                            infowindow.open(map, marker);
                        });
                    });                    
                });

            }

        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBa4P2TMdxRcgbh8zj9PdqdhMuiBQLfV0Y&callback=initMap">
        </script>
    </body>
</html>