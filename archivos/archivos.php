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
                            <a class="nav-link" href="../pedidos/tablas-pedidos.php">
                                Pedidos Agrov
                            </a>
                            <a class="nav-link" href="../pedidos/mapa.php">
                                Mapa de Pedidos
                            </a>
                            <a class="nav-link" href="archivos.php">
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

            <div class="container mt-4" style="height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <a href="reporte.php" class="btn btn-primary btn-lg px-5 py-3">Generar Archivo Excel de todos los pedidos</a>
            </div>
            <div class="col-md-6 text-center">
                <a href="reporte2.php" class="btn btn-secondary btn-lg px-5 py-3">Liberar espacio de la<br>base de datos de Pedidos</a>
            </div>
        </div>
    </div>

    <footer class="py-4 bg-light fixed-bottom">
        <div class="container text-center">
            <div class="alert alert-warning" role="alert">
                AL LIBERAR ESPACIO DE LA BASE DE DATOS DE PEDIDOS SE ELIMINARA PERMANENTEMENTE LOS PEDIDOS<BR>
                SE RECOMIENDA GENERAR UN ARCHIVO DE EXCEL COMO PRIMER PASO.
            </div>
        </div>
    </footer>
    

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    

        
        

    </body>
</html>