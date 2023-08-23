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

// Verificar si se ha enviado un formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre_cliente = $_POST["nombre_cliente"];
    $pedido = $_POST["pedido"];
    $total = $_POST["total"];
    $ubicacion = $_POST["ubicacion"];
    $descripcion = $_POST["descripcion"];
    $preventista = $_POST["preventista"];
    $distribuidor = $_POST["distribuidor"];
    $fecha = $_POST["fecha"];
    $estado = $_POST["estado"];

    // Actualizar los datos del usuario en la base de datos
    $sql = "UPDATE pedido SET nombre_cliente='$nombre_cliente', pedido='$pedido', total='$total', ubicacion='$ubicacion', descripcion='$descripcion', preventista='$preventista', distribuidor='$distribuidor', fecha='$fecha', estado='$estado' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo '<p style="font-size: 24px;">PEDIDO ACTUALIZADO CORRECTAMENTE.</p>';
       
        echo '<script>setTimeout(function() { window.location.href = "../index.php"; }, 500);</script>';
    
    } else {
        echo '<p style="font-size: 24px;">NO SE PUDO ACTUALIZAR EL PEDIDO.</p>';
    echo '<button style="font-size: 20px; padding: 10px 20px;" onclick="window.location.href = \'../index.php\';">VOLVER AL INICIO</button>';

    }
}

// Obtener el ID del usuario a editar desde la URL
$id = $_GET["id"];

// Obtener los datos del usuario de la base de datos
$sql = "SELECT * FROM pedido WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $nombre_cliente = $row["nombre_cliente"];
    $pedido = $row["pedido"];
    $total = $row["total"];
    $ubicacion = $row["ubicacion"];
    $descripcion = $row["descripcion"];
    $preventista = $row["preventista"];
    $distribuidor = $row["distribuidor"];
    $fecha = $row["fecha"];
    $estado = $row["estado"];
} else {
    echo "No se encontró el pedido";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Editar Pedido</h3></div>
                                    <div class="card-body">




                                    <form method="POST" action="">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                                    <label for="nombre_cliente">Actualizar Nombre del Cliente:</label>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" name="nombre_cliente" >
                                            <label for="inputNombre"><?php echo $nombre_cliente; ?></label>
                                        </div>

                                    <label for="pedido">Actualizar pedido:</label>    
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" name="pedido"value="<?php echo $pedido;?>">
                                            <label for="inputPedido"><?php echo $pedido; ?></label>
                                        </div>

                                    <label for="total">Actualizar Total a pagar del pedido</label>       
                                        <div class="form-floating mb-3">
                                            <input class="form-control"type="text" name="total"/>
                                            <label for="inputNombre"><?php echo $total; ?></label>
                                        </div>

                                    <label for="ubicacion">Actualizar Ubicacion del lugar a entregar el pedido:</label>   
                                        <div class="form-floating mb-3">
                                            <input class="form-control"type="text" name="ubicacion">
                                            <label for="inputUbicacion"><?php echo $ubicacion; ?></label>
                                        </div>

                                    <label for="descripcion">Actualizar Descripcion del a entregar el pedido</label>   
                                        <div class="form-floating mb-3">
                                            <input class="form-control"type="text" name="descripcion"value="<?php echo $descripcion;?>">
                                            <label for="inputDescripcion"><?php echo $descripcion; ?></label>
                                        </div>

                                    <label for="preventista">Actualizar Preventista del pedido</label>   
                                        <div class="form-floating mb-3">
                                            <input class="form-control"type="text" name="preventista">
                                            <label for="inputPreventista"><?php echo $preventista; ?></label>
                                        </div>

                                    <label for="distribuidor">Actualizar Distribuidor del pedido</label>   
                                        <div class="form-floating mb-3">
                                            <input class="form-control"type="text" name="distribuidor">
                                            <label for="inputDistribuidor"><?php echo $distribuidor; ?></label>
                                        </div>  

                                        <?php include 'mapa-api.php'; ?>
                                                                                            
                                    <label for="estado">Actualizar Estado del pedido:</label>   
                                        <div class="form-floating mb-3">
                                            <select class="form-control" name="estado">
                                            <option value=""></option>
                                            <option value="administrador">Pendiente</option>
                                            <option value="preventista">Entregado</option>
                                            <option value="distribuidor">Cancelado</option>
                                            </select>
                                            <label for="inputEstado"><?php echo $estado; ?></label>
                                        </div>
                                        
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                            <button class="btn btn-primary btn-block" type="submit">Actualizar Pedido </button>
                                            </div>
                                        </div>
                                        </form>






                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; AgrovAdminSystem</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>