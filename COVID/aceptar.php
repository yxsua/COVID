<?php

$contraseña = 'soyeladmin';
$contra = $_POST['adminaccess'];

if($contra == $contraseña)
{
    header("Location: admin.php");
}
else
{
    echo "<script>alert(\" Acceso denegado\");</script>";
    header("Location: index.php");
}