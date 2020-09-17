<?php
$servername = 'localhost';
$namedb='sistemabancario';
$username ='root';
$password = '12345678';

try {

    $conect = new mysqli($servername, $username, $password,$namedb);
    //echo "bien";
    // set the PDO error mode to exception
   // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Conexion Exitosa!"; 
}
catch(PDOException $e)
    {
       echo "Connection failed: " . $e->getMessage();
    }
    return $conn;

