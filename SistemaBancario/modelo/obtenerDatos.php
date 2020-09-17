<?php

class datosUsuario{

    function mostrarDatos(){
       include 'conexion.php';
        session_start(); 

        $id= $_SESSION['id'];
        $nombre=$_SESSION['user'];


       $saldo="SELECT * FROM disponible WHERE disponible.id=$id";

        $ejec=mysqli_query($conect,$saldo);

        if ( mysqli_num_rows($ejec)>0) 
        {

            $datos= $ejec->fetch_assoc();
       
            $info=$nombre.",".$datos['saldo'];

              return $info ;
        }

        

    }


}