<?php 
    $dbhost = 'localhost';
    $dbuser = 'ulises';
    $dbpass = '1234';
    $dbname = 'vacunas';
    
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if(!$conn) {
     die("No hay conexion <br>" . mysqli_connect_error());
   }

$id=$_GET['id'];

$sql="SELECT * FROM usuarios WHERE ID='$id'";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);

$sql2="SELECT * FROM vacunas_05 WHERE ID='$id'";
$query2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_array($query2);
                                            
$sql3="SELECT * FROM vacunas_619 WHERE ID='$id'";
$query3=mysqli_query($conn,$sql3);
$row3=mysqli_fetch_array($query3);
                                            
$sql4="SELECT * FROM vacunas_2050 WHERE ID='$id'";
$query4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_array($query4);
                                            
$sql5="SELECT * FROM vacunas_60a WHERE ID='$id'";
$query5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_array($query5);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST" name="admin" onsubmit="return validar3();">
                    
                                <input type="hidden" name="ID" value="<?php echo $row['ID']  ?>">
                                
                                Nombre<input type="text" id="nombre2" class="form-control mb-3" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre'];  ?>">
                                Edad<input type="number" id="edad" class="form-control mb-3" name="fechaNac" placeholder="Edad" value="<?php echo $row['fechaNacimiento'];  ?>">
                                Género<input type="text" id="genero2" class="form-control mb-3" name="genero" placeholder="Genero" value="<?php echo $row['genero'];  ?>">
                                Télefono<input type="text" id="telefono2" class="form-control mb-3" name="telefono" placeholder="Teléfono" value="<?php echo $row['telefono'];  ?>">
                                Contraseña<input type="text" id="contraseña3" class="form-control mb-3" name="contrasena" placeholder="Contraseña" value="<?php echo $row['contrasena'];  ?>">
                                Factores de Riesgo<input type="text" id="FR2" class="form-control mb-3" name="FR" placeholder="Factores de riesgo" value="<?php echo $row['FR'];  ?>">
                                <hr> De 0 a 5 años <br>
                                BCG<input type="text" class="form-control mb-3" name="BCG" placeholder="Vacuna BCG" value="<?php echo $row2['BCG'];  ?>" pattern="[C]{1}">
                                Hepatitis B<input type="text" class="form-control mb-3" name="hepatitisB" placeholder="Vacuna hepatitis B" value="<?php echo $row2['hepatitisB'];  ?>" pattern="[C]{1}">
                                Pentavalente<input type="text" class="form-control mb-3" name="Pentavalente" placeholder="Vacuna Pentavalente" value="<?php echo $row2['pentavalente'];  ?>" pattern="[C]{1}">
                                Rotavirus<input type="text" class="form-control mb-3" name="Rotavirus" placeholder="Vacuna rotavirus" value="<?php echo $row2['rotavirus'];  ?>" pattern="[C]{1}">
                                Neumococo<input type="text" class="form-control mb-3" name="Neumococo" placeholder="Vacuna neumococo" value="<?php echo $row2['neumococo'];  ?>" pattern="[C]{1}">
                                Influenza<input type="text" class="form-control mb-3" name="Influenza1" placeholder="Vacuna influenza estacional" value="<?php echo $row2['influenza'];  ?>" pattern="[C]{1}">
                                DPT<input type="text" class="form-control mb-3" name="DPT" placeholder="Vacuna DPT" value="<?php echo $row2['DPT'];  ?>" pattern="[C]{1}">
                                Triple Viral (SRP) <input type="text" class="form-control mb-3" name="tripleViral" placeholder="Vacuna SRP" value="<?php echo $row2['tripleViral'];  ?>" pattern="[C]{1}">
                                <?php if($row['fechaNacimiento'] > 5) { ?> <hr> De 6 a 19 años <br>
                                Triple Viral (SRP) <input type="text" class="form-control mb-3" name="SRP" placeholder="Vacuna SRP" value="<?php echo $row3['SRP'];  ?>" pattern="[C]{1}">
                                VPH<input type="text" class="form-control mb-3" name="VPH" placeholder="Vacuna VPH" value="<?php echo $row3['VPH'];  ?>" pattern="[C]{1}">
                                Hepatitis B<input type="text" class="form-control mb-3" name="hepatitisB2" placeholder="Vacuna hepatitis B" value="<?php echo $row3['hepatitisB'];  ?>" pattern="[C]{1}">
                                TD<input type="text" class="form-control mb-3" name="TD1" placeholder="Vacuna TD" value="<?php echo $row3['TD'];  ?>" pattern="[C]{1}">
                                Doble Viral (SR) <input type="text" class="form-control mb-3" name="SR" placeholder="Vacuna SR" value="<?php echo $row3['SR'];  ?>" pattern="[C]{1}"> <?php } ?>
                                <?php if($row['fechaNacimiento'] > 19) { ?> <hr> De 20 a 59 años <br>
                                TD<input type="text" class="form-control mb-3" name="TD2" placeholder="Vacuna TD" value="<?php echo $row4['TD'];  ?>" pattern="[C]{1}">
                                Influenza<input type="text" class="form-control mb-3" name="Influenza2" placeholder="Vacuna influenza estacional" value="<?php echo $row4['influenza'];  ?>" pattern="[C]{1}">
                                TDPa<input type="text" class="form-control mb-3" name="TDPa" placeholder="Vacuna TDPa" value="<?php echo $row4['TDPa'];  ?>" pattern="[C]{1}"> <?php } ?>
                                <?php if($row['fechaNacimiento'] > 59) { ?> <hr> De 60 en adelante <br>
                                TD<input type="text" class="form-control mb-3" name="TD3" placeholder="Vacuna TD" value="<?php echo $row5['TD'];  ?>" pattern="[C]{1}">
                                Influenza<input type="text" class="form-control mb-3" name="Influenza3" placeholder="Vacuna influenza estacional" value="<?php echo $row5['influenza'];  ?>" pattern="[C]{1}">
                                Polivalente<input type="text" class="form-control mb-3" name="polivalente" placeholder="Vacuna polivalente" value="<?php echo $row5['polivalente'];  ?>" pattern="[C]{1}"> <?php } ?>

                                <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                            
                    </form>
                    
                </div>
                <script src="CSS/validaciones2.js" type=""> </script>
    </body>
</html>