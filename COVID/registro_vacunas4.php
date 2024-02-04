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
       $sql4="SELECT * FROM vacunas_2050 WHERE ID='".$ID."'";
       $query4=mysqli_query($conn,$sql4);
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
  <?php while($row=$query->fetch_array()) { ?>
    <div class='header'></li></ul> <img src='user.png' class='avatar'> <h1 class='user'><?php echo $row['nombre']; ?> </h1></div>
      <div class='content'> <h2>Selecciona las vacunas que ya ha recibido: </h2> <h3> Formulario de 60 en adelante </h3>
<p><input type="checkbox" name="TD" value="C">TD</p>

<p><input type="checkbox" name="Influenza" value="C">Influenza estacional</p>

<?php if($row['fechaNacimiento'] < 65 && $row['FR'] == "S") { ?><p><input type="checkbox" name="Polivalente" value="C">Polivalente</p><?php } ?>

<?php }?>
<p><input type="submit" name="Enviar" value="Enviar" class="boton">
</div>
  </form>
</body>

<?php
if(isset($_POST['Enviar'])) {

$TD= $_POST['TD'];
$influenza = $_POST['Influenza'];
$polivalente= $_POST['Polivalente'];


$insertar = "INSERT INTO vacunas_60a(TD, influenza, polivalente, ID) VALUES ('$TD', '$influenza', '$polivalente', '$ID')";
$sql_insertar = mysqli_query($conn, $insertar);
if(!$sql_insertar) {
    echo "Error: <br> No existe un usuario con aquella ID! (".$ID.")";
    header("Location: index.php");
} else {
  echo "<div class='content'> <h2> Registro Exitoso! Se te redirigirá a la página principal... </h2></div>";
  sleep(2);
  header("Location: index.php?error=2");
}
}
?>
