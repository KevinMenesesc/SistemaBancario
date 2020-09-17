<?php

 include '../modelo/obtenerDatos.php';
  
    $usuario= new datosUsuario();
    $result=$usuario->mostrarDatos();
     echo $result;
