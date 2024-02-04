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
       $sql2="SELECT * FROM vacunas_05 WHERE ID='".$ID."'";
       $query2=mysqli_query($conn,$sql2);

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
  <?php while($row=$query->fetch_array()) { while($row2=$query2->fetch_array()) { ?>
    <div class='header'><img src='user.png' class='avatar'> <h1 class='user'><?php echo $row['nombre']; ?> </h1></div>
      <div class='content'> <h2>Selecciona las vacunas que ya ha recibido: </h2> <h3> Formulario de 6 a 19 </h3>
<p><input type="checkbox" name="SRP" value="C">SRP</p>

<?php if($row['genero'] == "F" && $row['fechaNacimiento'] > 9) { ?><p><input type="checkbox" name="VPH" value="C">VPH</p> <?php } ?>

<?php if($row['fechaNacimiento'] > 10 && $row2['hepatitisB'] != "C") { ?> <p><input type="checkbox" name="HepatitisB" value="C">Hepatitis B</p> <?php } ?>

<?php if($row['fechaNacimiento'] > 14) { ?> <p><input type="checkbox" name="TD" value="C">TD</p> <?php } ?>

<?php if($row['fechaNacimiento'] > 10 && $row2['tripleViral'] != "C") { ?><p><input type="checkbox" name="SR" value="C">SR</p> <?php } ?>

<?php } }?>
<p><input type="submit" name="Enviar" value="Enviar" class="boton">
</div>
  </form>
</body>

<?php
if(isset($_POST['Enviar'])) {
$SRP = $_POST['SRP'];
$VPH = $_POST['VPH'];
$hepatitisB = $_POST['HepatitisB'];
$TD= $_POST['TD'];
$SR = $_POST['SR'];

$insertar = "INSERT INTO vacunas_619(SRP, VPH, hepatitisB, TD, SR, ID) VALUES ('$SRP', '$VPH', '$hepatitisB', '$TD', '$SR', '$ID')";
$sql_insertar = mysqli_query($conn, $insertar);
if(!$sql_insertar) {

    echo "Error: <br> No existe un usuario con aquella ID! (".$ID.")";
} else {
    $sql="SELECT fechaNacimiento FROM usuarios where ID = '$ID'";
    $resultado=mysqli_query($conn,$sql);
    while ($row=$resultado->fetch_array()) {
    if($row['fechaNacimiento'] < 20 && $row['genero'] != "F") {
        echo "<script>alert(\"Has terminado de registrar tus datos!\");</script>";
        sleep(2);
        header("Location: index.php?error=2");
    } else {
      echo "<div class='content'> <h2> Registro Exitoso! Se te redirigirá a la siguiente parte...</h2> </div>";
      sleep(2);
      header("Location: registro_vacunas3.php?TraspasoID=".$ID."");
}
}
}
}

?>
