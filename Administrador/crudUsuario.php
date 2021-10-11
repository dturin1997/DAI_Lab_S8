<?php
include_once 'db.php';  //Llamada de un archivo, 
                        //el one lo carga una vez
/* Codigo para realizar insercion */
if(isset($_POST['save'])){
    $nombre=$MySQLiconn->real_escape_string($_POST['nombre']);
    $apellido=$MySQLiconn->real_escape_string($_POST['apellido']);
    $contrasena=$MySQLiconn->real_escape_string($_POST['contrasena']);
    $nivel=$MySQLiconn->real_escape_string($_POST['nivel']);
    $email=$MySQLiconn->real_escape_string($_POST['email']);

    $SQL=$MySQLiconn->query("INSERT INTO usuario(nombre,apellido,contrasena,nivel,email) VALUES('$nombre','$apellido','$contrasena','$nivel','$email')");

    if(!$SQL){
        echo $MySQLiconn->error;
    }
}
/* Codigo para el Delete */
if(isset($_GET['del'])){
    $SQL=$MySQLiconn->query("DELETE FROM usuario WHERE idusuario=".$_GET['del']);
    //Enviar cosas por header
    header("Location: indexUsuario.php");
    
}
/* Codigo para el Update */
//Parte 1
if(isset($_GET['edit'])){
    $SQL=$MySQLiconn->query("SELECT * FROM usuario WHERE idusuario=".$_GET['edit']);
    $getRow=$SQL->fetch_array();  
}
//Parte 2
if(isset($_POST['update'])){
    $SQL=$MySQLiconn->query("UPDATE usuario SET 
    nombre='".$_POST['nombre']."', apellido='".$_POST['apellido']."', contrasena='".$_POST['contrasena']."', nivel='".$_POST['nivel']."', email='".$_POST['email']."' WHERE idusuario=".$_GET['edit']);
    header("Location: indexUsuario.php");
    
}
?>