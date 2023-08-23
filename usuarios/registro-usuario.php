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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Crear Usuario Agrov</h3></div>
                                    <div class="card-body">


                                    <form method="POST" action="registrar.php">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputUsuario" name="inputUsuario" type="text" placeholder="Crea usuario" />
                                            <label for="inputUsuario">Nuevo Usuario</label>
                                        </div>
                                        
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputContrasena" name="inputContrasena" type="text" placeholder="Crear Contraseña" />
                                            <label for="inputContrasena">Contraseña</label>
                                        </div>
                                        
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputNombre" name="inputNombre" type="text" placeholder="Escribe tu nombre completo" />
                                            <label for="inputNombre">Nombre Completo</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputDireccion" name="inputDireccion" type="text" placeholder="Direccion" />
                                            <label for="inputDireccion">Direccion</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputNumero" name="inputNumero" type="text" placeholder="Número de Teléfono" />
                                            <label for="inputNumero">Número de Teléfono</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputFecha" name="inputFecha" type="date" />
                                            <label for="inputFecha">Fecha</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <select class="form-control" id="inputRol" name="inputRol">
                                            <option value=""></option>
                                            <option value="administrador">Administrador</option>
                                            <option value="preventista">Preventista</option>
                                            <option value="distribuidor">Distribuidor</option>
                                            </select>
                                            <label for="inputRol">Definir Rol</label>
                                        </div>
                                        
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                            <button class="btn btn-primary btn-block" type="submit">Crear Usuario Agrov</button>
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
