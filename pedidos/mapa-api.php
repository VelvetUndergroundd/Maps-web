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

            // Itera sobre los pedidos y crea los marcadores
            pedidos.forEach(function(pedido) {
                var ubicacion = { lat: pedido.lat, lng: pedido.lng };

                // Crea la ventana de información del marcador
                var infoWindow = new google.maps.InfoWindow({
                    content: "Preventista: " + pedido.preventista + "<br>Distribuidor: " + pedido.distribuidor
                });

                // Agrega un marcador en la ubicación
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
                    }
                });

                // Abre la ventana de información al hacer clic en el marcador
                marker.addListener('click', function() {
                    infoWindow.open(map, marker);
                });
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByBL6NMGLshPSLUHcBkrtN1iL9PvRUEh4&callback=initMap" async defer></script>
</body>
</html>