<?php

function generarCodigo(){

    include 'Conexion.php';

    $codigo=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
  

    $consult="SELECT usuario.numeroCuenta FROM usuario  ";
    $consulta=mysqli_query($conect,$consult);
    
    while ($nCuenta=$consulta->fetch_assoc()) {

        if($codigo==$nCuenta['numeroCuenta']){
            $codigo=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
            $consulta=mysqli_query($conn,$Ccodg);
        }
    }

    return $codigo;

}
