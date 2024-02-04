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
    <div class='header'><img src='user.png' class='avatar'> <h1 class='user'><?php echo $row['nombre']; ?> </h1></div>
      <div class='content'> <h2>Selecciona las vacunas que ya ha recibido: </h2> <h3> Formulario de 0 a 5 </h3>
<p><input type="checkbox" name="BCG" value="C">BCG</p>
<p><input type="checkbox" name="HepatitisB" value="C">Hepatitis B</p>
<p><input type="checkbox" name="Hexavalente" value="C">Hexavalente acelular</p>
<p><input type="checkbox" name="Rotavirus" value="C">Rotavirus</p>
<p><input type="checkbox" name="Neumococo" value="C">Neumococo</p>
<p><input type="checkbox" name="Influenza" value="C">Influenza estacional</p>
<?php if($row['fechaNacimiento'] > 3) { ?><p><input type="checkbox" name="DPT" value="C">DPT</p> <?php } ?>
<?php if($row['fechaNacimiento'] > 0) { ?><p><input type="checkbox" name="SRP" value="C">SRP</p> <?php } ?>
<?php }?>
<p><input type="submit" name="Enviar" value="Enviar" class="boton">
  </div>
  </form>
</body>

<?php
if(isset($_POST['Enviar'])) {

    $ID = $_GET['TraspasoID'];
$BCG = $_POST['BCG'];
$hepatitisB = $_POST['HepatitisB'];
$pentavalente = $_POST['Hexavalente'];
$rotavirus = $_POST['Rotavirus'];
$neumococo = $_POST['Neumococo'];
$influenza = $_POST['Influenza'];
$DPT = $_POST['DPT'];
$tripleViral = $row['SRP'];
$insertar = "INSERT INTO vacunas_05(BCG, hepatitisB, pentavalente, rotavirus, neumococo, influenza, DPT, tripleViral, ID) VALUES ('$BCG', '$hepatitisB', '$pentavalente', '$rotavirus', '$neumococo', '$influenza', '$DPT', '$tripleViral', '$ID')";
$sql_insertar = mysqli_query($conn, $insertar);

if(!$sql_insertar) {

    echo "Error: <br> No existe un usuario con aquella ID! (".$ID.")";
} else {
    $sql="SELECT fechaNacimiento FROM usuarios where ID = '$ID'";
    $resultado=mysqli_query($conn,$sql);
    while ($row=$resultado->fetch_array()) {
    if($row['fechaNacimiento'] < 6) {
      echo "<script>alert(\"Has terminado de registrar tus datos!\");</script>";
      sleep(2);
      header("Location: index.php?error=2");
    } else {
      echo "<div class='content'> <h2> Registro Exitoso! Se te redirigirá a la siguiente parte...</h2> </div>";
      sleep(2);
    header("Location: registro_vacunas2.php?TraspasoID=".$ID."");
}
}
}
}
?>

