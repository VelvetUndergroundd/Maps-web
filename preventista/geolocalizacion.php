<!DOCTYPE html>
<html>
<head>
    <title>Mapa interactivo</title>
    <style>
        #map {
            height: 650px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="map"></div>
    <script>
        // Función para inicializar el mapa y agregar marcadores
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15, // Ajusta el nivel de zoom según tus necesidades
                center: { lat: -17.3895, lng: -66.151885 } // Coordenadas iniciales del mapa
            });

            // Marcador rojo para el lugar donde se hizo clic
            var marker = new google.maps.Marker({
                position: { lat: 0, lng: 0 }, // La posición se actualizará en el evento click
                map: map,
                icon: {
                    path: google.maps.SymbolPath.CIRCLE,
                    scale: 8,
                    fillColor: 'red',
                    fillOpacity: 1,
                    strokeColor: 'white',
                    strokeWeight: 2
                },
                visible: false // No mostrar el marcador inicialmente hasta hacer clic en el mapa
            });

            // Agregar evento click al mapa
            map.addListener('click', function(event) {
                var latitude = event.latLng.lat();
                var longitude = event.latLng.lng();
                var coordinates = latitude.toFixed(6) + ', ' + longitude.toFixed(6);

                // Actualizar la posición del marcador
                marker.setPosition(event.latLng);

                // Mostrar el marcador en la posición del clic
                marker.setVisible(true);

                // Muestra las coordenadas en un cuadro de alerta (puedes mostrarlas en cualquier otro lugar)
                alert("Coordenadas: " + coordinates);
            });
        }
    </script
    function initMap() {
    var map = new google.maps.Map(document.getElementById('mapa'), {
        zoom: 15,
        center: { lat: -17.3895, lng: -66.151885 }
    });

    var marker = new google.maps.Marker({
        position: { lat: -17.380028, lng: -66.152022 }, // Coordenadas por defecto
        map: map,
        icon: {
            path: google.maps.SymbolPath.CIRCLE,
            scale: 8,
            fillColor: 'red',
            fillOpacity: 1,
            strokeColor: 'white',
            strokeWeight: 2
        }
    });

    var geolocalizacionInput = document.getElementById('inputGeolocalizacion');

    map.addListener('click', function(event) {
        var latitude = event.latLng.lat();
        var longitude = event.latLng.lng();
        var coordinates = latitude.toFixed(6) + ', ' + longitude.toFixed(6);

        marker.setPosition(event.latLng);

        // Actualizar el campo de texto con las coordenadas
        geolocalizacionInput.value = coordinates;
    });
}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByBL6NMGLshPSLUHcBkrtN1iL9PvRUEh4&callback=initMap" async defer></script>
</body>
</html>

