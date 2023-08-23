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
  $usuario = $_POST['inputUsuario'];
  $contrasena = $_POST['inputContrasena'];
  $nombre = $_POST['inputNombre'];
  $direccion = $_POST['inputDireccion'];
  $numero = $_POST['inputNumero'];
  $rol = $_POST['inputRol'];
  $fecha = $_POST['inputFecha'];

  // Crear la consulta SQL para insertar los datos en la tabla
  $sql = "INSERT INTO usuarios (usuario, contraseña, nombre_completo, direccion, telefono, rol, fecha_creacion) VALUES ('$usuario', '$contrasena', '$nombre', '$direccion', '$numero', '$rol', '$fecha')";

  if ($conn->query($sql) === TRUE) {

    
    echo '<p style="font-size: 24px;">USUARIO REGISTRADO CORRECTAMENTE.</p>';
    echo '<script>setTimeout(function() { window.location.href = "../index.php"; }, 2000);</script>';
  } else {
    echo '<p style="font-size: 24px;">NO SE PUDO REGISTRAR AL USUARIO.</p>';
    echo '<button style="font-size: 20px; padding: 10px 20px;" onclick="window.location.href = \'../index.php\';">VOLVER AL INICIO</button>';

  }

  // Cerrar la conexión
  $conn->close();
}
?>
