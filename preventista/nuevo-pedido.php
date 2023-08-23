<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Mapa interactivo</title>
        <link href="map.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Nuevo Pedido</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="registrar-producto.php">                         
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputNombre" name="inputNombre" type="text" placeholder="Definir el Nombre del Cliente" />
                                    <label for="inputNombre">Nombre del Cliente</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputTotal" name="inputTotal" type="text" placeholder="Definir el Total" />
                                    <label for="inputTotal">Total a pagar</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputGeolocalizacion" name="inputGeolocalizacion" type="text" placeholder="Geolocalización" readonly />
                                <label for="inputGeolocalizacion">Geolocalización</label>
                            </div>
                            <div id="mapa"></div> <!-- Nuevo div para el mapa -->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputDescripcion" name="inputDescripcion" type="text" placeholder="Definir la Descripcion" />
                                    <label for="inputDescripcion">Descripcion del lugar</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control" id="inputPreventista" name="inputPreventista">
                                    <option value=""></option>
                                    <option value="administrador">Administrador</option>
                                    <option value="preventista">Preventista</option>
                                    <option value="distribuidor">Distribuidor</option>
                                    </select>
                                    <label for="inputPreventista">Definir Preventista</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control" id="inputDistribuidor" name="inputDistribuidor">
                                    <option value=""></option>
                                    <option value="administrador">Administrador</option>
                                    <option value="preventista">Preventista</option>
                                    <option value="distribuidor">Distribuidor</option>
                                    </select>
                                    <label for="inputDistribuidor">Definir Distribuidor</label>
                            </div>
                            <div class="form-floating mb-3">
                                    <input class="form-control" id="inputFecha" name="inputFecha" type="date" />
                                    <label for="inputFecha">Fecha</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control" id="inputEstado" name="inputEstado">
                                    <option value=""></option>
                                    <option value="administrador">PENDIENTE</option>
                                    <option value="preventista">ENTREGADO</option>
                                    <option value="distribuidor">CANCELADO</option>
                                    </select>
                                    <label for="inputDistribuidor">Definir Estado</label>
                            </div>
                            <div class="form-floating mb-3">
                            <div class="input-group">
                                <input type="button" class="btn btn-primary" value="+" onclick="addField();">
                                <select class="form-select" name="dropdown">
                                    <option value="option1">Opción 1</option>
                                    <option value="option2">Opción 2</option>
                                    <option value="option3">Opción 3</option>
                                </select>
                                <input type="number" class="form-control" name="number">
                            </div>
                            </div>
                            </form>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-block" type="submit">Registrar nuevo Producto</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="map-marker.js"></script>
    <script>
        function addField() {
            var form = document.querySelector("form");
            var inputGroup = document.createElement("div");
            inputGroup.classList.add("input-group");

            var select = document.createElement("select");
            select.classList.add("form-select");
            select.name = "dropdown";

            var option1 = document.createElement("option");
            option1.value = "option1";
            option1.textContent = "Opción 1";

            var option2 = document.createElement("option");
            option2.value = "option2";
            option2.textContent = "Opción 2";

            var option3 = document.createElement("option");
            option3.value = "option3";
            option3.textContent = "Opción 3";

            select.appendChild(option1);
            select.appendChild(option2);
            select.appendChild(option3);

            var inputNumber = document.createElement("input");
            inputNumber.type = "number";
            inputNumber.classList.add("form-control");
            inputNumber.name = "number";

            inputGroup.appendChild(select);
            inputGroup.appendChild(inputNumber);

            form.insertBefore(inputGroup, form.lastElementChild);
        }
    </script>
    <script src="geol.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByBL6NMGLshPSLUHcBkrtN1iL9PvRUEh4&callback=initMap" async defer></script>
</body>
</html>
