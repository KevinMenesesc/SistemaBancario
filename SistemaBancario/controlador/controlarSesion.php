<?php
require_once  "limpiarDatos.php";  
$nuevo=new Filtro();

$correo=$nuevo->evaluar($_POST['correo']);
$contrasena=$nuevo->evaluar($_POST['contrasena']);


require_once  "../modelo/admDatos.php";  
$adminDatos=new adminDatos();

$adminDatos->iniciarSesion($correo,$contrasena);