<?php
   $dbhost = 'localhost';
        $dbuser = 'ulises';
        $dbpass = '1234';
        $dbname = 'vacunas';

        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if(!$conn) {
         die("No hay conexion <br>" . mysqli_connect_error());
       }

       $ID = $_GET['TraspasoID'];
       $sql="SELECT * FROM usuarios WHERE ID='".$ID."'";
    $query=mysqli_query($conn,$sql);
    $sql3="SELECT * FROM vacunas_619 WHERE ID='".$ID."'";
    $query3=mysqli_query($conn,$sql3);
 ?>

<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='CSS/Perfil.css'>
    <title>Registro de vacunas</title>
</head>

<body>
  <form method="POST">
  <div class='header'> <img src='user.png' class='avatar'> <h1 class='user'><?php echo $row['nombre']; ?> </h1></div>
      <div class='content'> <h2>Selecciona las vacunas que ya ha recibido: </h2> <h3> Formulario de 20 a 50 </h3>
  <?php while($row=$query->fetch_array()) { while($row3=$query3->fetch_array()) { ?>

  <?php if($row3['TD'] == "C" && $row['fechaNacimiento'] > 25) { ?> <p><input type="checkbox" name="TD" value="C">TD</p> <?php } ?>

  <?php if($row['fechaNacimiento'] > 18 && $row['FR'] == "S") { ?> <p><input type="checkbox" name="Influenza" value="C">Influenza estacional</p> <?php } ?>

  <?php if($row['genero'] == "F") { ?>
<p>Contesta la siguiente casilla sólo si estás embarazada de la semana 20 a 32 de gestación</p>
<p><input type="checkbox" name="TDPa" value="C">TDPa</p> <?php } ?>

<?php } }?>
<p><input type="submit" name="Enviar" value="Enviar" class="boton">
</div>
  </form>
</body>

<?php
if(isset($_POST['Enviar'])) {

$TD= $_POST['TD'];
$influenza = $_POST['Influenza'];
$TDPa= $_POST['TDPa'];


$insertar = "INSERT INTO vacunas_2050(TD, influenza, TDPa, ID) VALUES ('$TD', '$influenza', '$TDPa', '$ID')";
$sql_insertar = mysqli_query($conn, $insertar);
if(!$sql_insertar) {

    echo "Error: <br> No existe un usuario con aquella ID! (".$ID.")";
} else {
    $sql="SELECT fechaNacimiento FROM usuarios where ID = '$ID'";
    $resultado=mysqli_query($conn,$sql);
    while ($row=$resultado->fetch_array()) {
    if($row['fechaNacimiento'] < 60) {
      echo "<script>alert(\"Has terminado de registrar tus datos!\");</script>";
      sleep(2);
      header("Location: index.php?error=2");
    } else {
      echo "<div class='content'> <h2> Registro Exitoso! Se te redirigirá a la siguiente parte...</h2></div>";
      sleep(2);
      header("Location: registro_vacunas4.php?TraspasoID=".$ID."");
}
}
}
}
?>
