var popup = document.getElementById('popup');
var abir = document.getElementById('admin');
var overlay = document.getElementById('overlay');
var cerrar = document.getElementById('cerrar-popup');

abir.addEventListener('click', function()
{ 
    overlay.classList.add('active');
    popup.classList.add('active');

});

cerrar.addEventListener('click', function()
{
    overlay.classList.remove('active');
    popup.classList.remove('active');

});