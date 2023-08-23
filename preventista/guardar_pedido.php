<?php
// Conexión a la base de datos (Asegúrate de cambiar los valores de acuerdo a tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrov";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombreCliente = $_POST["inputNombre"];
$total = $_POST["inputTotal"];
$ubicacion = $_POST["inputGeolocalizacion"];
$descripcion = $_POST["inputDescripcion"];
$preventista = $_POST["inputPreventista"];
$distribuidor = $_POST["inputDistribuidor"];
$fecha = $_POST["inputFecha"];
$estado = $_POST["inputEstado"];

// Obtener los datos de los menús desplegables
if (isset($_POST["menu_options"]) && is_array($_POST["menu_options"])) {
    $menuOptions = $_POST["menu_options"];
    $pedido = implode(", ", $menuOptions); // Convertir el array de opciones en una cadena separada por comas
} else {
    $pedido = ""; // Si no hay opciones seleccionadas, dejar el valor en blanco
}

// Preparar y ejecutar la consulta de inserción
$sql = "INSERT INTO pedido (nombre_cliente, pedido, total, ubicacion, descripcion, preventista, distribuidor, fecha, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdssssss", $nombreCliente, $pedido, $total, $ubicacion, $descripcion, $preventista, $distribuidor, $fecha, $estado);
$result = $stmt->execute();
// Verificar si la inserción fue exitosa y enviar una respuesta al cliente
if ($result) {
    $response = array("status" => "success", "message" => "Pedido registrado correctamente");
} else {
    $response = array("status" => "error", "message" => "Error al registrar el pedido: " . $conn->error);
}
$conn->close();
header("Content-Type: application/json");
echo json_encode($response);
exit(); // Asegúrate de agregar esta línea para evitar cualquier otra salida o contenido HTML adicional
?>