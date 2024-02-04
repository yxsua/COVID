<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='CSS/Perfil.css'>

  <title> Mi perfil </title>
</head>
<body>

<?php
  $dbhost = 'localhost';
  $dbuser = 'ulises';
  $dbpass = '1234';
  $dbname = 'vacunas';

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  if(!$conn) {die("No hay conexion <br>" . mysqli_connect_error());}

if(isset($_GET['id'])) {
  $ID = $_GET['id'];
  $query = mysqli_query($conn,"SELECT * FROM usuarios WHERE ID='".$ID."' ");
$nr = mysqli_num_rows($query);
} else {
$ID = $_POST['ID'];
$contrasena = $_POST['contrasena'];
$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE ID='".$ID."' and contrasena='".$contrasena."' ");
$nr = mysqli_num_rows($query);
}

if($nr == 1) {
  $cons="SELECT * FROM usuarios WHERE ID='".$ID."' ";
  $resultado= mysqli_query($conn,$cons);

  if($resultado){
    $row=$resultado->fetch_array(); 
      $fechaNacimiento = $row['fechaNacimiento'];
      $ID = $row['ID'];
      $nombre = $row['nombre'];
      $contrasena = $row['contrasena'];
      $genero = $row['genero'];

      echo "<div class='header'><ul><li><a href='index.php'> Principal </a> </li></ul> <img src='user.png' class='avatar'> <h1 class='user'>$nombre</h1></div>";
      echo " <div class='content'> <h2>Vacunas pendientes </h2>";

      $sql2="SELECT * FROM vacunas_05 WHERE ID='".$row['ID']."'";
      $query2=mysqli_query($conn,$sql2);

      $sql3="SELECT * FROM vacunas_619 WHERE ID='".$row['ID']."'";
      $query3=mysqli_query($conn,$sql3);

      $sql4="SELECT * FROM vacunas_2050 WHERE ID='".$row['ID']."'";
      $query4=mysqli_query($conn,$sql4);

      $sql5="SELECT * FROM vacunas_60a WHERE ID='".$row['ID']."'";
      $query5=mysqli_query($conn,$sql5);

      while($row2=mysqli_fetch_array($query2)){
      if($row2['BCG'] != "C"){ echo "<p>No cuentas con la vacuna BCG!</p>"; }
      if($row2['hepatitisB'] != "C"){ echo "<p>No cuentas con la vacuna de hepatitis B!</p>"; }
      if($row2['pentavalente'] != "C"){ echo "<p>No cuentas con la vacuna de pentavalente!</p>"; }
      if($row2['rotavirus'] != "C"){ echo "<p>No cuentas con la vacuna de rotavirus!</p>"; }
      if($row2['neumococo'] != "C"){ echo "<p>No cuentas con la vacuna de neumococo!</p>"; }
      if($row2['influenza'] != "C"){ echo "<p>No cuentas con la vacuna de influenza!</p>"; }
      if($row2['DPT'] != "C" && $row['fechaNacimiento'] > 3){ echo "<p>No cuentas con la vacuna DPT!</p>"; }
      if($row2['tripleViral'] != "C" && $row['fechaNacimiento'] > 0){ echo "<p>No cuentas con la vacuna Triple Viral!</p>"; }

  while($row3=mysqli_fetch_array($query3)){

      if($row3['SRP'] != "C"){ echo "<p>No cuentas con la vacuna Triple Viral!</p>"; }
      if($row3['VPH'] != "C" && $row['genero'] == "F" && $row['fechaNacimiento'] > 9){ echo "<p>No cuentas con la vacuna de VPH!</p>"; }
      if($row3['hepatitisB'] != "C" && $row['fechaNacimiento'] > 10 && $row2['hepatitisB'] == "C"){ echo "<p>No cuentas con la vacuna de hepatitis B!</p>"; }
      if($row3['TD'] != "C" && $row['fechaNacimiento'] > 14){ echo "<p>No cuentas con la vacuna TD!</p>"; }
      if($row3['SR'] != "C" && $row['fechaNacimiento'] > 14){ echo "<p>No cuentas con la vacuna SR!</p>";}

  while($row4=mysqli_fetch_array($query4)){

      if($row4['TD'] != "C" && $row3['TD'] == "C" && $row['fechaNacimiento'] > 25){ echo "<p>No cuentas con la vacuna TD!</p>"; }
      if($row4['influenza'] != "C" && $row['fechaNacimiento'] > 18 && $row['FR'] == "S"){ echo "<p>No cuentas con la vacuna de influenza!</p>"; }
      if($row4['TDPa'] != "C" && $row['genero'] == "F"){ echo "<p>No cuentas con la vacuna de TDPa!</p>"; }

  while($row5=mysqli_fetch_array($query5)){

      if($row5['TD'] != "C"){ echo "<p>No cuentas con la vacuna TD!</p>"; }
      if($row5['influenza'] != "C"){ echo "<p>No cuentas con la vacuna de influenza!</p>"; }
      if($row5['polivalente'] != "C" && $row['fechaNacimiento'] < 65 && $row['FR'] == "S"){ echo "<p>No cuentas con la vacuna polivalente!</p>"; }
  }}}}
  
  ?> <h4>(Si está vacio, no tienes ninguna vacuna pendiente) </h4><?php
  }


} else if ($nr == 0) {
  header("Location: index.php?error=1");
}
?>

<a href="editar_usuario.php?id=<?php echo $ID; ?>"> <button class="info"> Editar </button> </a>  

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="CSS/popup.js"></script>

</body>
</html>
