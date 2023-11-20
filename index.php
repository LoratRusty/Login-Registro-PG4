<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
        <main>
            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en el sistema</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">¡Regístrate!</button>
                    </div>
                </div>
                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form id="form-login" action="php/login_usuario.php" method="post" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Usuario" name="usuario" required title="Requerido">
                        <input type="password" placeholder="Contraseña" name="contrasena" required title="Requerido">
                        <button type="button" id="btn-login">Ingresar</button>
                    </form>
                    <!--Registro-->
                    <form id="form-registro" action="php/registro_usuario.php" method="post" class="formulario__register">
                        <h2>¡Regístrate!</h2>
                        <input type="text" placeholder="Nombre Completo" name="nombre_completo" required title="Requerido">
                        <input type="email" placeholder="Correo Electrónico" name="correo" required title="Requerido">
                        <input type="text" placeholder="Usuario" name="usuario" required title="Requerido">
                        <div class="tooltip">
                            <input type="password" placeholder="Contraseña" name="contrasena" required title="Requerido">
                            <span class="tooltiptext">Debe contener al menos un número, una letra mayúscula y un carácter especial, y tener al menos 6 caracteres.</span>
                        </div>
                        <button type="button" id="btn-registro">Registrate</button>
                    </form>
                </div>
                <div id="notificacion-container"></div>
            </div>
        </main>
    <script src="js/script.js"></script>
</body>
</html>