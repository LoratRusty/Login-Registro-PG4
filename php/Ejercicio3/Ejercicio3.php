<?php
// Incluye la lógica de verificación de sesión
require_once('validar_sesion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
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
              <h1 class="card-title text-center mb-2 fw-light fs-2"><strong>Lenguajes de Programación</strong></h1>
              <h3 class="card-title text-center mb-5 fw-light fs-3">Ingresa tus lenguajes de programación favoritos</h3>
              <form id="form-registro" action="guardar.php" method="POST">
              <!-- Lenaguaje 1 -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="lenguaje1" placeholder="Lenaguaje 1:" name="lenguaje1" required autofocus>
                  <label for="lenguaje1">Lenaguaje 1:</label>
                </div>
              <!-- Lenaguaje 2 -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="lenguaje2" placeholder="Lenguaje 2" name="lenguaje2" required autofocus>
                  <label for="lenguaje2">Lenguaje 2:</label>
                </div>
              <!-- Lenaguaje 3 -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="lenguaje3" placeholder="Lenguaje 3" name="lenguaje3" required autofocus>
                  <label for="lenguaje3">Lenguaje 3:</label>
                </div>
              <!-- Botón de Guardado -->
                <div class="d-grid mb-2">
                  <button type="button" id="btn-registro" class="btn btn-lg btn-primary btn-login fw-bold" type="submit">Guardar</button>
                </div>
              <!-- Botón de regresar -->
                <div class="d-grid mb-2">
                <a href="../bienvenida.php" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Regresar a la Bienvenida</a>
                </div>
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