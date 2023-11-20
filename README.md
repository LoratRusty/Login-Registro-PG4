# Login-Registro-PG4
## Requisitos Previos
 - XAMPP - Activar Apache y MYSQL
 - Instalar la base de datos (Si tienes un usario y contraseña establecido cambiar las mismas), con el uso de config.php que se encuentra en la carpeta base_de_datos
 - Ubica el proyecto dentro de tu carpeta de htdocs y accede a ella a traves del navegador como es de constumbre.

## Uso
 - Reístrate como usuario para acceder al sitema
 - Explora los diferentes ejercicios disponibles.
Contribuciones
 - Si encuentras algún problema o tienes mejoras para proponer, por favor escribeme un correo.

## Esto proyecto fue creado por José De Sousa aka LoratRusty.


## Mejoras Realizadas  19/11/2023
1.	Se utilizo SweetAlert2 para todas las notificaciones al usuario.
2.	Se estableció que las notificaciones salgan en la misma ventana del formulario y no se tenga que ir a una nueva dirección para procesar la información. 
3.	Se utilizo el mismo formulario ara todos los ejercicios.
4.	Se creo un archivo de config.php donde crea de manera automática la base de datos al ejecutarla.
5.	Se limito la entrada de datos, en donde indica cedula, numero de jugador y notas.
6.	Se modificaron las imágenes para que tuvieran relación con el ejercicio y se le anexo el logo de la UBA.
7.	Se implemento todas las validaciones necesarias, como lo son:
 a.	En el index.php:
  i.	En el campo de Registro de Usuario:
   1.	Validación de campo único para usuario y correo (que no se repita en la base de datos).
   2.	Indicaciones para establecer una contraseña más segura.
   3.	En la base de datos se encripto la contraseña con el uso de sal (SALT en inglés que es una cadena de bits aleatoria), que sirve para aplicar la función de hash a la contraseña esto sirve para evitar ataques de fuerza bruta y otros tipos de ataques.
   4.	Se estableció todos los campos como obligatorios.
   5.	Se coloco la notificación de Operación Exitosa.
  ii.	En el campo de Iniciar Sesión:
   1.	Se estableció ambos campos como obligatorios.
   2.	En caso de colocar datos incorrectos le indica al usuario que verifique los datos.
   3.	Se estableció un session_start(), para evitar que accedan a los demás archivos si no se ha iniciado sesión al sistema.
   4.	Se creo el archivo de validar_sesion.php el cual se ocupa de hacer las confirmaciones necesarias para el acceso a los archivos y establece un limite de tiempo de 30 min que, si el usuario no realiza ninguna actividad durante los siguientes 30 min, el sistema desconecta al usuario automáticamente.
   5.	Se coloco la notificación de Operación Exitosa.
 b.	En el Ejercicio2.php:
  i.	Se estableció que el valor que no se repita es la cedula.
  ii.	Se modifico la vista del mismo.
  iii.	Se estableció todos los campos como obligatorios.
 c.	En el Ejercicio3.php:
  i.	Se modifico la vista del mismo.
  ii.	Se estableció todos los campos como obligatorios.
 d.	En el Ejercicio4.php:
  i.	Se estableció que el valor que no se repita es la cedula.
  ii.	Se limito el número de caracteres ingresados en “Promedio en Secundaria” para que solo se pueda escribir “número . número” (17.85) o “número , número” (17,85).
  iii.	En el campo “Tipo de Horario” se agrego una lista para establecer los valores por predeterminado de “Mañana, Tarde, Noche”.
  iv.	Se estableció todos los campos como obligatorios.
 e.	En el Ejercicio5.php:
  i.	Se estableció que todas las asignaturas no se puedan repetir en la base de datos.
  ii.	Se limito el número de caracteres ingresados en “Calificación” para que solo se pueda escribir “número . número” (17.85) o “número , número” (17,85).
  iii.	Al momento de ingresar se estableció que no se puedan repetir dos asignaturas al momento de subir los nombres mas las notas a la base de datos.
  iv.	Soporte para sistemas de calificación en base a 20 o 100.
  v.	Se estableció todos los campos como obligatorios.
 f.	En el Ejercicio6.php:
  i.	Se establecieron los campos de “Cédula” y “Número de Jugador” como únicos.
  ii.	Se estableció todos los campos como obligatorios.
