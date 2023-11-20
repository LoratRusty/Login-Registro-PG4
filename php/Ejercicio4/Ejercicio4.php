<?php
// Incluye la lógica de verificación de sesión
require_once('validar_sesion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../../images/logo.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
          <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
            <div class="card-img-left d-none d-md-flex">
            </div>
            <div class="card-body p-4 p-sm-5">
              <!-- Titulo del formulario -->
              <h1 class="card-title text-center mb-2 fw-light fs-2"><strong>Registro de Estudiante Nuevo Ingreso</strong></h1>
              <h3 class="card-title text-center mb-5 fw-light fs-3">Escuela: Ingeniería de Sistemas</h3>
              <form id="form-registro" action="guardar.php" method="POST">
              <!-- Cédula -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="cedula" placeholder="Cédula" name="cedula" required oninput="validaNumericos();" maxlength="9" autofocus>
                  <label for="cedula">Cédula:</label>
                </div>
              <!-- Nombre -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="nombre" placeholder="Nombres:" name="nombre" required autofocus>
                  <label for="nombre">Nombres:</label>
                </div>
              <!-- Apellido -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="apellido" placeholder="Apellidos:" name="apellido" required autofocus>
                  <label for="apellido">Apellidos:</label>
                </div>
              <!-- Dirección -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="direccion" placeholder="Dirección:" name="direccion" required autofocus>
                  <label for="direccion">Dirección:</label>
                </div>
              <!-- Promedio en Secundaria -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="promedio" placeholder="Promedio general en Secundaria:" name="promedio" required autofocus oninput="validaNota(this);" maxlength="5">
                  <label for="promedio">Promedio en Secundaria:</label>
                </div>
              <!-- Tipo de horario -->
              <div class="form-floating mb-3">
                  <select class="form-select" id="horario" name="horario" required autofocus>
                      <option value="Mañana">Mañana</option>
                      <option value="Tarde">Tarde</option>
                      <option value="Noche">Noche</option>
                  </select>
                  <label for="horario">Tipo de Horario:</label>
              </div>
              <!-- Botón de Guardado -->
                <div class="d-grid mb-2">
                  <button type="button" id="btn-registro" class="btn btn-lg btn-primary btn-login fw-bold" type="submit">Guardar</button>
                </div>
              <!-- Botón de regresar -->
                <div class="d-grid mb-2">
                <a href="../bienvenida.php" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Regresar a la Bienvenida</a>
                </div>
                <script>
                  // Elimina caracteres no numéricos de la cedula
                  function validaNumericos() {
                      var inputtxt = document.getElementById('cedula');
                      inputtxt.value = inputtxt.value.replace(/[^0-9]/g, ''); 
                  }
                  // Validar entrada para permitir solo numeros
                    function validaNota(input) {
                        // Elimina caracteres no permitidos
                        input.value = input.value.replace(/[^\d.,]/g, '');
                    }
                </script>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div id="notificacion-container"></div>
    </div>
  </body>
  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>