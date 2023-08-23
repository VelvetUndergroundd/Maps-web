<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrov";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del usuario a eliminar desde la URL
$id = $_GET["id"];

// Eliminar el usuario
$sql = "DELETE FROM catalogo WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo '<p style="font-size: 24px;">PRODUCTO BORRADO EXITOSAMENTE.</p>';
    echo '<button style="font-size: 20px; padding: 10px 20px;" onclick="window.location.href = \'catalogo.php\';">VOLVER AL CATALOGO</button>';

} else {
    echo '<p style="font-size: 24px;">NO SE PUEDO BORRAR EL PRODUCTO.</p>';
    echo '<button style="font-size: 20px; padding: 10px 20px;" onclick="window.location.href = \'catalogo.php\';">VOLVER AL CATALOGO</button>';

}

// Cerrar la conexión a la base de datos
$conn->close();
?>