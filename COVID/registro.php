<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Usuario </title>

   <link rel="stylesheet" href="CSS/Registro.css">
</head>

<body>

<?php

if(isset($_POST['Enviar']))
{
   $nombre = $_POST['nombre'];
   $fechaNacimiento = $_POST['fechaNac'];
   $genero = $_POST['genero'];
   $contrasena = $_POST['contrasena'];
   $telefono = $_POST['telefono'];
   $asma = $_POST['Asma'];
   $diabetes = $_POST['Diabetes'];
   $hipertension = $_POST['Hipertension'];
   $alergias = $_POST['Alergias'];

 } if ($asma == 'on' || $diabetes == 'on' || $hipertension == 'on' || $alergias == 'on') {
     $FR = 'S';
   }  else {
     $FR = 'N';
   }


                  $dbhost = 'localhost';
                  $dbuser = 'ulises';
                  $dbpass = '1234';
                  $dbname = 'vacunas';
     
                  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                  if(!$conn) {die("No hay conexion <br>" . mysqli_connect_error());}

                  function obtener_edad_segun_fecha($fecha_nacimiento)
                  {
                     $nacimiento = new DateTime($fecha_nacimiento);
                     $ahora = new DateTime(date("Y-m-d"));
                     $diferencia = $ahora->diff($nacimiento);
                     return $diferencia->format("%y");
                  }

                  $edad = obtener_edad_segun_fecha($fechaNacimiento);



                  $sql = "INSERT INTO usuarios(nombre, fechaNacimiento, contrasena, telefono, genero, FR) VALUES ('".$nombre."', '".$edad."', '".$contrasena."', '".$telefono."','".$genero."', '".$FR."')";
                  if (mysqli_query($conn, $sql)) 
                  {
                   $asignacionID = "SELECT ID FROM usuarios WHERE nombre = '".$nombre."' and contrasena = '".$contrasena."' "; 
                     $resultado = mysqli_query($conn, $asignacionID);
                     while ($row=$resultado->fetch_array()) 
                     {
                        echo "<script> alert('USUARIO CREADO') </script> ";
                        echo "<div class='ID'> <span> ID (".$row['ID'].") </span> </div>";
                        sleep(2);
                        header("Location: registro_vacunas.php?TraspasoID=".$row['ID']."");
                     }
                     
                  } else {echo "Error: " . $sql . "<br>" . mysqli_error($conn);}


?>
   
</body>
</html>


