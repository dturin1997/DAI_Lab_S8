<?php
//recordar siempre el punto y coma al final de las lineas
    $server = 'localhost';
    $username = 'root';
    $password ='';
    $database = 'lab_s8';

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
        //CONEXION A LA BASE DE DATOS MYSQL
    }catch (PDOException $e) {
        die('Connection Failed: ' . $e->getMessage());
        //DIE ACABA CON EL PROCESO
        //GETMESSAGE ES UN METODO QUE MOSTRAR EL ERROR OCURRIDO
    }
?>