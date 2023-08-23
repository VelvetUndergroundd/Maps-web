<!DOCTYPE html>
<html>
<head>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=animation&key=AIzaSyByBL6NMGLshPSLUHcBkrtN1iL9PvRUEh4"></script>
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

            // Lista de ubicaciones y datos de los pedidos
            var pedidos = [
                <?php
                // Datos de conexión a la base de datos
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "agrov";

                // Crear una nueva conexión
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Error en la conexión a la base de datos: " . $conn->connect_error);
                }

                // Consulta para obtener los pedidos con estado 'activo' y sus ubicaciones
                $sql = "SELECT ubicacion, preventista, distribuidor FROM pedido WHERE estado = 'pendiente'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Recorrer los resultados de la consulta
                    while ($row = $result->fetch_assoc()) {
                        $ubicacion = $row["ubicacion"];
                        $preventista = $row["preventista"];
                        $distribuidor = $row["distribuidor"];

                        $coordenadas = explode(",", $ubicacion);
                        $latitud = trim($coordenadas[0]);
                        $longitud = trim($coordenadas[1]);

                        echo "{ lat: $latitud, lng: $longitud, preventista: '$preventista', distribuidor: '$distribuidor' }, ";
                    }
                }

                // Cerrar la conexión
                $conn->close();
                ?>
            ];






            var markers = []; // Almacena los marcadores para crear la ruta

            pedidos.forEach(function(pedido) {
                var ubicacion = { lat: pedido.lat, lng: pedido.lng };
                var marker = new google.maps.Marker({
                    position: ubicacion,
                    map: map,
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: 8,
                        fillColor: 'red',
                        fillOpacity: 1,
                        strokeColor: 'white',
                        strokeWeight: 2
                    },
                    animation: google.maps.Animation.DROP
                });

                markers.push(ubicacion); // Agrega la ubicación al arreglo de marcadores

                var infoWindow = new google.maps.InfoWindow({
                    content: `
                        <div>
                            <p>Preventista: ${pedido.preventista}</p>
                            <p>Distribuidor: ${pedido.distribuidor}</p>
                            <img src="tienda.png" alt="Tienda">
                        </div>
                    `
                });

                marker.addListener('click', function() {
                    infoWindow.open(map, marker);
                });
            });

            // Crea la polilínea para conectar los marcadores
            var routePath = new google.maps.Polyline({
                path: markers,
                geodesic: true,
                strokeColor: '#0000FF', // Color de la línea
                strokeOpacity: 1.0,
                strokeWeight: 2
            });

            routePath.setMap(map); // Agrega la polilínea al mapa
        }
        
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByBL6NMGLshPSLUHcBkrtN1iL9PvRUEh4&callback=initMap" async defer></script>
</body>
</html>