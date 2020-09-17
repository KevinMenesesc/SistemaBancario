<?php

class adminDatos{

    public function Registar($identificacion,$nombre,$correo,$contraseña){
            
        include 'conexion.php';
        include 'numeroCuenta.php';

        $generarCuenta=generarCodigo();

        $consult="INSERT INTO `usuario` (`identificacion`, `nombres`, `correo`, `contraseña`, `numeroCuenta`)
        VALUES ('$identificacion','$nombre','$correo','$contraseña',$generarCuenta)";
        $ejec=mysqli_query($conect,$consult);
        
        $consult2="INSERT INTO `disponible` (`id`, `saldo`)
        VALUES ('$identificacion',1000000)";
        $ejec2=mysqli_query($conect,$consult2);

       if ($ejec2){
            echo "1";
        }else{
            echo "0";
        }

    } 

    public function iniciarSesion($usuario,$contraseña){

        include 'conexion.php';

        try {

            $consulta="SELECT * FROM `usuario` WHERE usuario.correo='$usuario' AND usuario.contraseña=$contraseña ";
            $env=mysqli_query($conect,$consulta);

            if ( mysqli_num_rows($env)>0) 
            {

                $datos= $env->fetch_assoc();
           
                  
                  session_start(); 
                  $_SESSION['user'] =$datos['nombres'];
                  $_SESSION['id'] =$datos['identificacion'];
                  $_SESSION['cuent'] =$datos['numeroCuenta'];

                  echo 1;
            }
            
            
        } catch (\Throwable $th) {
           echo "no entro" ;
        }



    }

}



