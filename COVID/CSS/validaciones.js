//VARIABLES DE REGISTRO 

var popup2 = document.getElementById('popup2');
var abir2 = document.getElementById('registrar');
var overlay2 = document.getElementById('overlay2');
var cerrar2 = document.getElementById('cerrar-popup2');

//FORMULARIO DE REGISTRO

abir2.addEventListener('click', function() {
    overlay2.classList.add('active');
    popup2.classList.add('active');

});

cerrar2.addEventListener('click', function() {
    overlay2.classList.remove('active');
    popup2.classList.remove('active');

});

//VALIDACIONES DE REGISTRO

var form = document.getElementById('formulario');

var nombre = document.getElementById('nombre');
var contraseña = document.getElementById('contraseña');
var fecha = document.getElementById('fecha');
var genero2 = document.getElementsByName('genero');
var FR = document.getElementsByName('FR');
var telefono = document.getElementById('telefono');
//INICIO DE SESIÓN
var ID = document.getElementById('ID');
var contraseña2 = document.getElementById('contraseña2');


const expresiones = {
    nombrev: /^[a-zA-ZÀ-ÿ\s]{10,100}$/, // Letras y espacios, pueden llevar acentos.
    passwordv: /^.{8}$/, // 8 dígitos.
    generov: /^[MF]{1}$/
}

function validar_contrasena(contrasena) {
    var caracter_1 = contrasena.substr(0, 1);
    var caracter_2 = contrasena.substr(1, 1);
    var caracter_3 = contrasena.substr(2, 1);
    var caracter_4 = contrasena.substr(3, 1);
    var caracter_5 = contrasena.substr(4, 1);
    var caracter_6 = contrasena.substr(5, 1);
    var caracter_7 = contrasena.substr(6, 1);
    var caracter_8 = contrasena.substr(7, 1);

    var dato = caracter_1 + caracter_3 + caracter_5 + caracter_7;
    var dato2 = caracter_2 + caracter_4 + caracter_6 + caracter_8;
    var valoresAceptados = /^[0-9]+$/;
    var valoresAceptados2 = /^[A-Z]+$/;


    if (dato2.match(valoresAceptados2) == null || dato.match(valoresAceptados) == null) {
        return false;
    } else {
        return true;
    }

}

function validar() {

    if (!expresiones.nombrev.test(nombre.value)) { alert("Nombre incorrecto"); return false; } else if (!validar_contrasena(contraseña.value) || !expresiones.passwordv.test(contraseña.value)) { alert("La contraseña debe estar formada por 8 dígitos, \nletras mayúsculas y números intercalados, empezando siempre con un número."); return false; } else if (telefono.value.length != 10) { alert("El número de teléfono debe tener 10 dígitos"); return false; } else if (fecha.value == "") { alert("Selecciona tu fecha de nacimiento"); return false; } else if (!genero[0].checked && !genero[1].checked) { alert("Selecciona tu genero"); return false; }
}

function validar2() {
    if (ID.value.length == 0) { alert("Ingresa la ID"); return false; } else if (contraseña2.value.length == 0) { alert("Ingresa la contraseña"); return false; }
}

form.reset();
//VARIABLES DE REGISTRO 

var popup3 = document.getElementById('popup3');
var abir3 = document.getElementById('sesion');
var overlay3 = document.getElementById('overlay3');
var cerrar3 = document.getElementById('cerrar-popup3');

//FORMULARIO DE REGISTRO

abir3.addEventListener('click', function() {
    overlay3.classList.add('active');
    popup3.classList.add('active');

});

cerrar3.addEventListener('click', function() {
    overlay3.classList.remove('active');
    popup3.classList.remove('active');

});