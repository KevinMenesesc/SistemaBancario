<?php

$indi=$_POST['indice'];
require_once  "limpiarDatos.php";  
$nuevo=new Filtro();
require_once  "../modelo/movimientos.php";  
$mv=new movimientos();
if($indi==1){

    $nCuenta=$nuevo->evaluar($_POST['numeroCuenta']);
    $contraseña=$nuevo->evaluar($_POST['contraseña']);
    $retiro=$nuevo->evaluar($_POST['retiro']);

    $resul=$mv->retiro($nCuenta,$contraseña,$retiro);

    echo $resul;

}