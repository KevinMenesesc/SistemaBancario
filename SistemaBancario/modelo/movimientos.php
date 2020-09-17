<?php

class movimientos{

    function retiro($cuenta,$contraseña,$retiro){
        include 'conexion.php';
        session_start(); 
        $id=$_SESSION['id'];
        $ncuenta=$_SESSION['cuent'];

        if((int)$ncuenta==(int)$cuenta){

       

                $consulta="INSERT INTO `transacciones` (`Id`, `nombre`, `valor`, `destinatario`) VALUES ('$id', 'retiro', '$retiro', '')";
                $ejec=mysqli_query($conect,$consulta);

                $sald="SELECT * FROM disponible WHERE disponible.id= $id";
                $ejec=mysqli_query($conect,$sald);

            
                if( mysqli_num_rows($ejec)>0){
                    $datos= $ejec->fetch_assoc();

                    $nuevoSaldo=(int)$datos['saldo']-(int)$retiro ;

                }

            $conslt="UPDATE `disponible` SET `saldo` = $nuevoSaldo WHERE `disponible`.`id` = $id";
            $ejec=mysqli_query($conect,$conslt);

            return $nuevoSaldo;
        }else{
            return 0;
        }

    }



}