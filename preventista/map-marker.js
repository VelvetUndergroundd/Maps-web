// Función para inicializar el mapa y agregar marcadores
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