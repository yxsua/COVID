<?php

$dbhost = 'localhost';
    $dbuser = 'ulises';
    $dbpass = '1234';
    $dbname = 'vacunas';
    
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if(!$conn) {
     die("No hay conexion <br>" . mysqli_connect_error());
   }

   //Datos del usuario
   $ID = $_POST['ID'];
$nombre=$_POST['nombre'];
$edad=$_POST['fechaNac'];
$genero=$_POST['genero'];
$contrasena=$_POST['contrasena'];
$telefono=$_POST['telefono'];
$FR=$_POST['FR'];
//Vacunas del rango de 0 a 5
$FR=$_POST['FR'];
$BCG = $_POST['BCG'];
$hepatitisB = $_POST['hepatitisB'];
$pentavalente = $_POST['Pentavalente'];
$rotavirus = $_POST['Rotavirus'];
$neumococo = $_POST['Neumococo'];
$influenza = $_POST['Influenza1'];
$DPT  = $_POST['DPT'];
$tripleViral = $_POST['tripleViral'];
//Vacunas del rango de 6 a 19
$SRP = $_POST['SRP'];
$VPH = $_POST['VPH'];
$hepatitisB2 = $_POST['hepatitisB2'];
$TD1 = $_POST['TD1'];
$SR = $_POST['SR'];
//Vacunas del rango de 20 a 59
$TD2 = $_POST['TD2'];
$influenza2 = $_POST['Influenza2'];
$TDPa = $_POST['TDPa'];
//Vacunas del rango de 60 en adelante
$TD3 = $_POST['TD3'];
$influenza3 = $_POST['Influenza3'];
$polivalente = $_POST['polivalente'];

$sql="UPDATE usuarios SET nombre='$nombre', fechaNacimiento = '$edad', contrasena = '$contrasena', telefono='$telefono', genero = '$genero', FR = '$FR' WHERE ID='$ID' ";
$query=mysqli_query($conn,$sql);

$sql2="UPDATE vacunas_05 SET BCG='$BCG', hepatitisB = '$hepatitisB', pentavalente = '$pentavalente', rotavirus = '$rotavirus', neumococo = '$neumococo', influenza = '$influenza', DPT = '$DPT', tripleViral = '$tripleViral' WHERE ID='$ID' ";
$query2=mysqli_query($conn,$sql2);

$sql3="UPDATE vacunas_619 SET SRP='$SRP', VPH = '$VPH', hepatitisB = '$hepatitisB2', TD = '$TD1', SR = '$SR' WHERE ID='$ID' ";
$query3=mysqli_query($conn,$sql3);

$sql4="UPDATE vacunas_2050 SET TD='$TD2', influenza = '$influenza2', TDPa = '$TDPa' WHERE ID='$ID' ";
$query4=mysqli_query($conn,$sql4);

$sql5="UPDATE vacunas_60a SET TD='$TD3', influenza = '$influenza3', polivalente = '$polivalente' WHERE ID='$ID' ";
$query5=mysqli_query($conn,$sql5);

    if($query && $query2 && $query3 && $query4 && $query5){
        Header("Location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn) . "<br>";
        echo "Error: " . $sql3 . "<br>" . mysqli_error($conn) . "<br>";
        echo "Error: " . $sql4 . "<br>" . mysqli_error($conn) . "<br>";
        echo "Error: " . $sql5 . "<br>" . mysqli_error($conn) . "<br>";
    }
?>