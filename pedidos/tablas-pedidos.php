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

// Consulta para obtener los datos de la tabla "pedido"
$sql = "SELECT * FROM pedido";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Frut-Club-Admin</Frut-Club-Admin></title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
             
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../index.php">Frut-Club-Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
           
            
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Usuarios</div>
                            <a class="nav-link" href="../usuarios/tables.php">
                                Panel de Usuarios Agrov
                            </a>
                            <a class="nav-link" href="../usuarios/registro-usuario.php">
                                Registrar Usuario Agrov
                            </a>

                            <div class="sb-sidenav-menu-heading">Administracion</div>
                            <a class="nav-link" href="../catalogo/catalogo.php">
                                Catalogo Productos Agrov
                            </a>
                            <a class="nav-link" href="tablas-pedidos.php">
                                Pedidos Agrov
                            </a>
                            <a class="nav-link" href="mapa.php">
                                Mapa de Pedidos
                            </a>
                            <a class="nav-link" href="../archivos/archivos.php">
                                Archivos Agrov
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Bienvenido</div>
                        nombre_de_usuario
                    </div>
                </nav>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    

        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pedidos</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active">Tabla de Pedidos</li>
                        </ol>
                        <div class="card mb-4">
                            
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla de Pedidos Agrov
                            </div>


                            

                            <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre del Cliente</th>
                                        <th>Pedido</th>
                                        <th>Total</th>
                                        <th>Ubicacion cordenadas</th>
                                        <th>Descripcion</th>
                                        <th>Preventista</th>
                                        <th>Distribuidor</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        // Recorrer los resultados de la consulta y mostrar los datos en la tabla
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["nombre_cliente"] . "</td>";
                                            echo "<td>" . $row["pedido"] . "</td>";
                                            echo "<td>" . $row["total"] . "</td>";
                                            echo "<td>" . $row["ubicacion"] . "</td>";
                                            echo "<td>" . $row["descripcion"] . "</td>";
                                            echo "<td>" . $row["preventista"] . "</td>";
                                            echo "<td>" . $row["distribuidor"] . "</td>";
                                            echo "<td>" . $row["fecha"] . "</td>";
                                            echo "<td>" . $row["estado"] . "</td>";

                                            echo '<td>
                                                <a class="btn btn-primary btn-sm" href="editar-pedido.php?id=' . $row["id"] . '">Editar</a>
                                            </td>';
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No se encontraron usuarios</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>




                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        
            
    </body>
</html>