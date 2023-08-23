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

// Verificar si se ha enviado el formulario y el nuevo stock
if (isset($_POST["id"]) && isset($_POST["nuevoStock"])) {
    $id = $_POST["id"];
    $nuevoStock = $_POST["nuevoStock"];

    // Actualizar el stock en la base de datos
    $sql = "UPDATE catalogo SET stock = '$nuevoStock' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "El stock se ha actualizado correctamente.";
    } else {
        echo "Error al actualizar el stock: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
