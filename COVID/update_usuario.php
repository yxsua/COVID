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
   $sql2="SELECT * FROM vacunas_05 WHERE ID='$ID'";
$query2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_array($query2);
                                            
$sql3="SELECT * FROM vacunas_619 WHERE ID='$ID'";
$query3=mysqli_query($conn,$sql3);
$row3=mysqli_fetch_array($query3);
                                            
$sql4="SELECT * FROM vacunas_2050 WHERE ID='$ID'";
$query4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_array($query4);
                                            
$sql5="SELECT * FROM vacunas_60a WHERE ID='$ID'";
$query5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_array($query5);

$nombre=$_POST['nombre'];
$edad=$_POST['fechaNac'];
$genero=$_POST['genero'];
$contrasena=$_POST['contrasena'];
$telefono=$_POST['telefono'];
$FR=$_POST['FR'];
//Las validaciones son para que se mantengan los valores que ya estaban insertados cuando se modifican solo algunos
//Vacunas del rango de 0 a 5
if(isset($_POST['BCG'])) { $BCG = $_POST['BCG']; } else { $BCG = $row2['BCG']; }
if(isset($_POST['hepatitisB'])) { $hepatitisB = $_POST['hepatitisB']; } else { $hepatitisB = $row2['hepatitisB']; }
if(isset($_POST['Pentavalente'])) { $pentavalente = $_POST['Pentavalente']; } else { $pentavalente = $row2['pentavalente']; }
if(isset($_POST['Rotavirus'])) { $rotavirus = $_POST['Rotavirus']; } else {$rotavirus = $row2['rotavirus'];  }
if(isset($_POST['Neumococo'])) { $neumococo = $_POST['Neumococo']; } else {$neumococo = $row2['neumococo'];  }
if(isset($_POST['Influenza1'])) { $influenza = $_POST['Influenza1']; } else {$influenza = $row2['influenza'];  }
if(isset($_POST['DPT'])) { $DPT  = $_POST['DPT']; } else { $DPT = $row2['DPT']; }
if(isset($_POST['tripleViral'])) { $tripleViral = $_POST['tripleViral']; } else { $tripleViral = $row2['tripleViral']; }

//Vacunas del rango de 6 a 19
if(isset($_POST['SRP'])) { $SRP = $_POST['SRP']; } else { $SRP = $row3['SRP']; }
if(isset($_POST['VPH'])) { $VPH = $_POST['VPH']; } else { $VPH = $row3['VPH'];  }
if(isset($_POST['hepatitisB2'])) { $hepatitisB2 = $_POST['hepatitisB2']; } else { $hepatitisB2 = $row3['hepatitisB']; }
if(isset($_POST['TD1'])) { $TD1 = $_POST['TD1']; } else { $TD1 = $row3['TD']; }
if(isset($_POST['SR'])) { $SR = $_POST['SR']; } else { $SR = $row3['SR']; }

//Vacunas del rango de 20 a 59
if(isset($_POST['TD2'])) { $TD2 = $_POST['TD2']; } else { $TD2 = $row4['TD']; }
if(isset($_POST['Influenza2'])) { $influenza2 = $_POST['Influenza2']; } else { $influenza2 = $row4['influenza']; }
if(isset($_POST['TDPa'])) { $TDPa = $_POST['TDPa']; } else { $TDPa = $row4['TDPa']; }

//Vacunas del rango de 60 en adelante
if(isset($_POST['TD3'])) { $TD3 = $_POST['TD3']; } else { $TD3 = $row5['TD']; }
if(isset($_POST['Influenza3'])) { $influenza3 = $_POST['Influenza3']; } else { $Influenza3 = $row5['influenza']; }
if(isset($_POST['polivalente'])) { $polivalente = $_POST['polivalente']; } else { $polivalente = $row2['polivalente']; }

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
        Header("Location: info_vacunas.php?id=".$ID."");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn) . "<br>";
        echo "Error: " . $sql3 . "<br>" . mysqli_error($conn) . "<br>";
        echo "Error: " . $sql4 . "<br>" . mysqli_error($conn) . "<br>";
        echo "Error: " . $sql5 . "<br>" . mysqli_error($conn) . "<br>";
    }
?>