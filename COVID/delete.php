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

$sql="DELETE FROM usuarios WHERE ID='$id'";
$query=mysqli_query($conn,$sql);

    if($query){
        Header("Location: admin.php");
    }
?>