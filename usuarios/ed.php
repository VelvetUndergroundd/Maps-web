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
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    $nombre_completo = $_POST["nombre_completo"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $rol = $_POST["rol"];

    // Actualizar los datos del usuario en la base de datos
    $sql = "UPDATE usuarios SET usuario='$usuario', contraseña='$contraseña', nombre_completo='$nombre_completo', direccion='$direccion', telefono='$telefono', rol='$rol' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo '<p style="font-size: 24px;">DATOS ACTUALIZADOS CORRECTAMENTE.</p>';
       
        echo '<script>setTimeout(function() { window.location.href = "../index.php"; }, );</script>';
    
    } else {
        echo '<p style="font-size: 24px;">NO SE PUDO ACTUALIZAR INFORMACION DE USUARIO.</p>';
    echo '<button style="font-size: 20px; padding: 10px 20px;" onclick="window.location.href = \'../index.php\';">VOLVER AL INICIO</button>';

    }
}

// Obtener el ID del usuario a editar desde la URL
$id = $_GET["id"];

// Obtener los datos del usuario de la base de datos
$sql = "SELECT * FROM usuarios WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $usuario = $row["usuario"];
    $contraseña = $row["contraseña"];
    $nombre_completo = $row["nombre_completo"];
    $direccion = $row["direccion"];
    $telefono = $row["telefono"];
    $rol = $row["rol"];
} else {
    echo "No se encontró el usuario";
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Editar Usuario Agrov</h3></div>
                                    <div class="card-body">




                                    <form method="POST" action="">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                                    <label for="usuario">Definir nuevo Usuario:</label>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" name="usuario" >
                                            <label for="inputUsuario"><?php echo $usuario; ?></label>
                                        </div>

                                    <label for="contraseña">Definir nueva Contraseña:</label>    
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" name="contraseña">
                                            <label for="inputContrasena"><?php echo $contraseña; ?></label>
                                        </div>

                                    <label for="nombre">Definir nuevo Nombre Completo:</label>       
                                        <div class="form-floating mb-3">
                                            <input class="form-control"type="text" name="nombre_completo"/>
                                            <label for="inputNombre"><?php echo $nombre_completo; ?></label>
                                        </div>

                                    <label for="direccion">Definir nueva Direccion:</label>   
                                        <div class="form-floating mb-3">
                                            <input class="form-control"type="text" name="direccion">
                                            <label for="inputDireccion"><?php echo $direccion; ?></label>
                                        </div>

                                    <label for="numero">Definir nuevo Numero de Telefono:</label>   
                                        <div class="form-floating mb-3">
                                            <input class="form-control"type="text" name="telefono">
                                            <label for="inputNumero"><?php echo $telefono; ?></label>
                                        </div>

                                    <label for="rol">Definir nuevo Rol:</label>   
                                        <div class="form-floating mb-3">
                                            <select class="form-control" name="rol">
                                            <option value=""></option>
                                            <option value="administrador">Administrador</option>
                                            <option value="preventista">Preventista</option>
                                            <option value="distribuidor">Distribuidor</option>
                                            </select>
                                            <label for="inputRol"><?php echo $rol; ?></label>
                                        </div>
                                        
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                            <button class="btn btn-primary btn-block" type="submit">Actualizar Usuario </button>
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
