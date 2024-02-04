<?php
$error = $_GET['error'];
if($error == 1) {
    echo "<script> alert(\"La información ingresada no corresponde a ningún usuario registrado!\"); </script>";
} else if($error == 2) {
    echo "<script> alert(\"Su registro ha sido completado!\"); </script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title> VACUNACIÓN </title>

    <!-- Links adicionales para el diseño de la página-->

    <link rel="stylesheet" href="CSS/Principal2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>

<body>

    <section>

        <header>
            <a href="#" class="logo"><img src="https://1000marcas.net/wp-content/uploads/2020/03/United-Nations-Logo.png" alt=""></a>

            <ul>
                <li><a href="#" class="abrir-popup" id="registrar"> Regístrate </a></li>
                <li><a href="#" class="abrir-popup" id="sesion"> Iniciar Sesión </a></li>
                <li><a href="#" class="abrir-popup" id="admin"> Administrador </a></li>
            </ul>

        </header>

        <div class="content">

            <div class="textbox">

                <h2> COVID - 19 </h2>
                <p> Afecta de distintas maneras en función de cada persona. La mayoría de las personas que se contagian presentan síntomas de intensidad leve o moderada, y se recuperan sin necesidad de hospitalización.</p>

            </div>

            <div class="imgbox">
                <img src="coronavirus1.png" class="covi">
            </div>

            <ul class="thumb">
                <li><img src="coronavirus1.png" onclick="imgSlider('coronavirus1.png')"></li>
                <li><img src="coronavirus2.png" onclick="imgSlider('coronavirus2.png')"></li>
            </ul>

        </div>


    </section>

    <!-- REGISTRO -->

    <div class="overlay" id="overlay2">

        <div class="popup" id="popup2">

            <span href="" id="cerrar-popup2" class="cerrar-popup"><i class="fas fa-times"></i></span>

            <h3> Regístrate </h3>
            <h4> Ingresa tus datos para el registro</h4>

            <form action="registro.php" method="post" id="formulario" onsubmit="return validar();">

                <div class="inputs">


                    <input type="text" placeholder="Nombre" name="nombre" id="nombre">
                    <input type="password" placeholder="Contraseña" name="contrasena" id="contraseña">
                    <input type="number" placeholder="Teléfono" name="telefono" id="telefono">

                    <input type="date" name="fechaNac" id="fecha">

                        <h4> <b> Género </b>  </h4>
                        <input type="radio" value="M" name="genero" class="radio"> Masculino </input>
                        <input type="radio" value="F" name="genero" class="radio"> Femenino </input>
                    

                    <h4> <b> Factores de Riesgo </b></h4>

                    <input type="checkbox" name="FR[]" id="" value="Asma"> Asma </input>
                    <input type="checkbox" name="FR[]" id="" value="Diabetes"> Diabetes </input>
                    <input type="checkbox" name="FR[]" id="" value="Hipertension"> Hipertensión </input>
                    <input type="checkbox" name="FR[]" id="" value="Alergias"> Alergias a fármacos </input>

                </div>


                <input type="submit" class="submit" value="Enviar" name="Enviar">

            </form>

        </div>

    </div>

<!-- INICIO DE SESIÓN -->

<div class="overlay" id="overlay3">

<div class="popup" id="popup3">

    <span href="" id="cerrar-popup3" class="cerrar-popup"><i class="fas fa-times"></i></span>

    <h3> Iniciar sesión  </h3>
    <h4> Ingresa los datos.</h4>

    <form action="info_vacunas.php" method="post" id="formulario2" onsubmit="return validar2();">

        <div class="inputs">

            <input type="text" placeholder="ID" name="ID" id="ID">
            <input type="password" placeholder="Contraseña" name="contrasena" id="contraseña2">

        </div>


        <input type="submit" class="submit" value="Enviar" name="Enviar">

    </form>

</div>
</div>


    <!-- ADMIN -->

    <div class="overlay" id="overlay">

        <div class="popup" id="popup">

            <span href="#" id="cerrar-popup" class="cerrar-popup"><i class="fas fa-times"></i></span>

            <h3> Administrador </h3>
            <h4> Ingresa los datos requeridos </h4>

            <form action="aceptar.php" method="post">

                <div class="inputs">
                    <input type="password" placeholder="Contraseña" name="adminaccess">
                </div>

                <input type="submit" class="submit" value="Enviar">

            </form>

        </div>

    </div>


    <script>
        function imgSlider(anything) {
            document.querySelector('.covi').src = anything;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="CSS/admin.js" type=""> </script>
    <script src="CSS/validaciones.js" type=""> </script>

</body>

</html>

