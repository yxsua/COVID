<?php
    $dbhost = 'localhost';
    $dbuser = 'ulises';
    $dbpass = '1234';
    $dbname = 'vacunas';
    
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if(!$conn) {
     die("No hay conexion <br>" . mysqli_connect_error());
   }

    $sql="SELECT * FROM usuarios";
    $query=mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> ADMINISTRADOR </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/admin.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    <body>
            <div class="container mt-5">
                    <div class="row">

                        
   
                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Edad</th>
                                        <th>Genero</th>
                                        <th>Contraseña</th>
                                        <th>Teléfono</th>
                                        <th>Factores de Riesgo</th>
                                        <th></th>
                                        <th></th>
                                        <th colspan="8"> Primera Infancia ( 0 - 5 años )</th>
                                        <th colspan="5"> Niñez y adolescencia ( 6 - 19 años )</th>
                                        <th colspan="3"> Adultos (20 - 50 años )</th>
                                        <th colspan="3"> Adultos mayores ( 60 años y más )</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                                
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['ID'];?></th>
                                                <?php
                                                $sql2="SELECT * FROM vacunas_05 WHERE ID='".$row['ID']."'";
                                                $query2=mysqli_query($conn,$sql2);
                                            
                                                $sql3="SELECT * FROM vacunas_619 WHERE ID='".$row['ID']."'";
                                                $query3=mysqli_query($conn,$sql3);
                                            
                                                $sql4="SELECT * FROM vacunas_2050 WHERE ID='".$row['ID']."'";
                                                $query4=mysqli_query($conn,$sql4);
                                            
                                                $sql5="SELECT * FROM vacunas_60a WHERE ID='".$row['ID']."'";
                                                $query5=mysqli_query($conn,$sql5);
                                                ?>
                                                <th><?php  echo $row['nombre'];?></th>
                                                <th><?php  echo $row['fechaNacimiento'];?></th>
                                                <th><?php  echo $row['genero'];?></th>
                                                <th><?php  echo $row['contrasena'];?></th>
                                                <th><?php  echo $row['telefono'];?></th>
                                                <th><?php  echo $row['FR'];?></th>
                                                <th><a href="actualizar.php?id=<?php echo $row['ID'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['ID'] ?>" class="btn btn-danger">Eliminar</a></th>
                                                <?php
                                                while($row2=mysqli_fetch_array($query2)){
                                                    ?>
                                                    <th style="color:white;background:<?php if($row2['BCG'] == "C") { echo "green"; } else { echo "red"; }?>">BCG</th>
                                                    <th style="color:white;background:<?php if($row2['hepatitisB'] == "C") { echo "green"; } else { echo "red"; }?>">Hepatitis B</th>
                                                    <th style="color:white;background:<?php if($row2['pentavalente'] == "C") { echo "green"; } else { echo "red"; }?>">Pentavalente</th>
                                                    <th style="color:white;background:<?php if($row2['rotavirus'] == "C") { echo "green"; } else { echo "red"; }?>">Rotavirus</th>
                                                    <th style="color:white;background:<?php if($row2['neumococo'] == "C") { echo "green"; } else { echo "red"; }?>">Neumococo</th>
                                                    <th style="color:white;background:<?php if($row2['influenza'] == "C") { echo "green"; } else { echo "red"; }?>">Influenza</th>
                                                    <th style="color:white;background:<?php if($row2['DPT'] == "C") { echo "green"; } else { echo "red"; }?>">DPT</th>
                                                    <th style="color:white;background:<?php if($row2['tripleViral'] == "C") { echo "green"; } else { echo "red"; }?>">Triple Viral</th>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                while($row3=mysqli_fetch_array($query3)){
                                                    ?>
                                                    <th style="color:white;background:<?php if($row3['SRP'] == "C") { echo "green"; } else { echo "red"; }?>">SRP</th>
                                                    <th style="color:white;background:<?php if($row3['VPH'] == "C") { echo "green"; } else { echo "red"; }?>">VPH</th>
                                                    <th style="color:white;background:<?php if($row3['hepatitisB'] == "C") { echo "green"; } else { echo "red"; }?>">Hepatitis B</th>
                                                    <th style="color:white;background:<?php if($row3['TD'] == "C") { echo "green"; } else { echo "red"; }?>">TD</th>
                                                    <th style="color:white;background:<?php if($row3['SR'] == "C") { echo "green"; } else { echo "red"; }?>">SR</th>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                while($row4=mysqli_fetch_array($query4)){
                                                    ?>
                                                    <th style="color:white;background:<?php if($row4['TD'] == "C") { echo "green"; } else { echo "red"; }?>">TD</th>
                                                    <th style="color:white;background:<?php if($row4['influenza'] == "C") { echo "green"; } else { echo "red"; }?>">Influenza</th>
                                                    <th style="color:white;background:<?php if($row4['TDPa'] == "C") { echo "green"; } else { echo "red"; }?>">TDPa</th>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                while($row5=mysqli_fetch_array($query5)){
                                                    ?>
                                                    <th style="color:white;background:<?php if($row5['TD'] == "C") { echo "green"; } else { echo "red"; }?>">TD</th>
                                                    <th style="color:white;background:<?php if($row5['influenza'] == "C") { echo "green"; } else { echo "red"; }?>">Influenza</th>
                                                    <th style="color:white;background:<?php if($row5['polivalente'] == "C") { echo "green"; } else { echo "red"; }?>">Polivalente</th>
                                                    <?php
                                                }
                                                ?>
                                            </tr>
                                            
                                        <?php
                                            }
                                        ?>
                                </tbody>
                            </table>
                            <center><a href="index.php"><button class="btn btn-primary"> Volver a la página principal </button></a></center> <br> <br>
                        </div>
                    </div>
            </div>
            <script src="CSS/validaciones.js" type=""> </script>
    </body>
</html>
