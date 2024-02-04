<?php
     $dbhost = 'localhost';
     $dbuser = 'ulises';
     $dbpass = '1234';
     $dbname = 'vacunas';
     
     $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
     if(!$conn) {
      die("No hay conexion <br>" . mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>

<body>
<div class="center">
         <input type="checkbox" id="show">
         <label for="show" class="show-btn">Inicia sesión</label>
         <div class="container">
            <label for="show" class="close-btn fas fa-times" title="close"></label>
            <div class="text">
               Iniciar sesión
            </div>
            <form action="info_vacunas.php" method="post">
               <div class="data">
                  <label>ID</label>
                  <input type="text" name="ID" pattern="[0-9]{1-3}" required>
               </div>
               <div class="data">
                  <label>Contraseña</label>
                  <input type="password" name="contrasena" pattern="[a-zA-ZÁÉÍÓÚáéíóú0-9%$_-#]{5-15}" required>
               </div>
               <div class="btn">
                  <div class="inner"></div>
                  <input type="submit" name="Enviar">Confirmar</button>
               </div>
               <div class="signup-link">
                  Volver a la <a href="index.php">página principal</a>
               </div>
            </form>
         </div>
      </div>

</body>

</html>