//EDICIÓN DE DATOS
var form = document.getElementsByName('admin');
var nombre2 = document.getElementById('nombre2');
var contraseña3 = document.getElementById('contraseña3');
var edad = document.getElementById('edad');
var genero2 = document.getElementById('genero2');
var telefono2 = document.getElementById('telefono2');
var FR2 = document.getElementById('FR2');

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

function validar3() {
    if (!expresiones.nombrev.test(nombre2.value)) {
        alert("Nombre incorrecto o incompleto");

        return false;
    } else if (!validar_contrasena(contraseña3.value) || !expresiones.passwordv.test(contraseña3.value)) {
        alert("La contraseña debe estar formada por 8 dígitos, \nletras mayúsculas y números intercalados, empezando siempre con un número.");

        return false;
    } else if (telefono2.value.length != 10) {
        alert("El número de teléfono debe tener 10 dígitos");

        return false;
    } else if (edad.value == "") {
        alert("Ingresa la edad");

        return false;
    } else if (FR2.value != 'S' && FR2.value != 'N') {
        alert("Los factores de riesgo deben colocarse como S o N");

        return false;
    } else if (!expresiones.generov.test(genero2.value)) {
        alert("Ingresa M o F para el género");

        return false;
    }
}

form.reset();