<?php
// Incluye la lógica de verificación de sesión
require_once('validar_sesion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
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
              <h1 class="card-title text-center mb-2 fw-light fs-2"><strong>Registro de Asignaturas de Estudiante</strong></h1>
              <h3 class="card-title text-center mb-5 fw-light fs-3">Escuela: Ingeniería de Sistemas</h3>
              <form id="form-registro" action="guardar.php" method="POST">
              <!-- Asignatura 1 -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="materia1" placeholder="1º Asignatura" name="materia1" required autofocus>
                  <label for="mateira1">1º Asignatura</label>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nota1" placeholder="Calificación" name="nota1" required autofocus oninput="validaNumericos(this);" maxlength="5">
                    <label for="nota1">Calificación</label>
                  </div>
                </div>
              <!-- Asignatura 2 -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="materia2" placeholder="2º Asignatura" name="materia2" required autofocus>
                  <label for="mateira2">2º Asignatura</label>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nota2" placeholder="Calificación" name="nota2" required autofocus oninput="validaNumericos(this);" maxlength="5">
                    <label for="nota2">Calificación</label>
                  </div>
                </div>
              <!-- Asignatura 3 -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="materia3" placeholder="3º Asignatura" name="materia3" required autofocus>
                  <label for="mateira3">3º Asignatura</label>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nota3" placeholder="Calificación" name="nota3" required autofocus oninput="validaNumericos(this);" maxlength="5">
                    <label for="nota3">Calificación</label>
                  </div>
                </div>
              <!-- Asignatura 4 -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="materia4" placeholder="4º Asignatura" name="materia4" required autofocus>
                  <label for="mateira4">4º Asignatura</label>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nota4" placeholder="Calificación" name="nota4" required autofocus oninput="validaNumericos(this);" maxlength="5">
                    <label for="nota4">Calificación</label>
                  </div>
                </div>
              <!-- Asignatura 5 -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="materia5" placeholder="5º Asignatura" name="materia5" required autofocus>
                  <label for="mateira5">5º Asignatura</label>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nota5" placeholder="Calificación" name="nota5" required autofocus oninput="validaNumericos(this);" maxlength="5">
                    <label for="nota5">Calificación</label>
                  </div>  
                </div>
              <!-- Asignatura 6 -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="materia6" placeholder="6º Asignatura" name="materia6" required autofocus>
                  <label for="mateira6">6º Asignatura</label>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nota6" placeholder="Calificación" name="nota6" required autofocus oninput="validaNumericos(this);" maxlength="5">
                    <label for="nota6">Calificación</label>
                  </div>
                </div>
              <!-- Botón de Guardado -->
                <div class="d-grid mb-2">
                  <button type="submit" id="btn-registro" class="btn btn-lg btn-primary btn-login fw-bold">Guardar</button>
                </div>
              <!-- Botón de regresar -->
                <div class="d-grid mb-2">
                <a href="../bienvenida.php" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Regresar a la Bienvenida</a>
                </div>
                <script>
                    // Validar entrada para permitir solo numeros
                    function validaNumericos(input) {
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