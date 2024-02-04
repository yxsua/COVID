<?php
function conectar(){
    
        $dbhost = 'localhost';
        $dbuser = 'ulises';
        $dbpass = '1234';
        $dbname = 'vacunas';
        
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if(!$conn) {
          die("No hay conexion <br>" . mysqli_connect_error());
        }
}

?>
