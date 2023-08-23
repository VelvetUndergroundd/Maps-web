<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "agrov";

  // Crear conexión
  $conn = new mysqli($servername, $username, $password, $database);

  // Verificar la conexión
  if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
  }

  // Obtener los datos del formulario
  $nombre = $_POST['inputProducto'];
  $precio = $_POST['inputPrecio'];
  $stock = $_POST['inputStock'];
  // Crear la consulta SQL para insertar los datos en la tabla
  $sql = "INSERT INTO catalogo (nombre, precio, stock) VALUES ('$nombre', '$precio', '$stock')";

  if ($conn->query($sql) === TRUE) {

    
    echo '<p style="font-size: 24px;">PRODUCTO REGISTRADO EXITOSAMENTE.</p>';
    echo '<script>setTimeout(function() { window.location.href = "catalogo.php"; }, 1000);</script>';
  } else {
    echo '<p style="font-size: 24px;">NO SE PUDO REGISTRAR EL PRODUCTO.</p>';
    echo '<button style="font-size: 20px; padding: 10px 20px;" onclick="window.location.href = \'catalogo.php\';">VOLVER AL INICIO</button>';

  }

  // Cerrar la conexión
  $conn->close();
}
?>