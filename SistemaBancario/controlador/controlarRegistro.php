<?php

//$datos=$_POST['nombre'];

require_once  "limpiarDatos.php";  
$nuevo=new Filtro();

$id=$nuevo->evaluar($_POST['id']);
$nombre=$nuevo->evaluar($_POST['nombre']);
$correo=$nuevo->evaluar($_POST['correo']);
$contrasena=$nuevo->evaluar($_POST['contrasena']);

require_once  "../modelo/admDatos.php";  
$adminDatos=new adminDatos();

$adminDatos->Registar($id,$nombre,$correo,$contrasena);