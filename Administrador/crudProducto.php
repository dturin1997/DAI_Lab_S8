<?php
include_once 'db.php';  //Llamada de un archivo, 
                        //el one lo carga una vez
/* Codigo para realizar insercion */
if(isset($_POST['save'])){
    $nombre=$MySQLiconn->real_escape_string($_POST['nombre']);
    $detalle=$MySQLiconn->real_escape_string($_POST['detalle']);

    $SQL=$MySQLiconn->query("INSERT INTO producto(nombre,detalle) VALUES('$nombre','$detalle')");

    if(!$SQL){
        echo $MySQLiconn->error;
    }
}
/* Codigo para el Delete */
if(isset($_GET['del'])){
    $SQL=$MySQLiconn->query("DELETE FROM producto WHERE idproducto=".$_GET['del']);
    //Enviar cosas por header
    header("Location: indexProducto.php");
    
}
/* Codigo para el Update */
//Parte 1
if(isset($_GET['edit'])){
    $SQL=$MySQLiconn->query("SELECT * FROM producto WHERE idproducto=".$_GET['edit']);
    $getRow=$SQL->fetch_array();  
}
//Parte 2
if(isset($_POST['update'])){
    $SQL=$MySQLiconn->query("UPDATE producto SET 
    nombre='".$_POST['nombre']."', detalle='".$_POST['detalle']."' WHERE idproducto=".$_GET['edit']);
    header("Location: indexProducto.php");
    
}
?>