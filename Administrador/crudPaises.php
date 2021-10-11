<?php
include_once 'db.php';

if(isset($_POST['save']))
{
    $nombre = $MySQLiconn->real_escape_string($_POST['nombre']);
    
 

    $SQL = $MySQLiconn->query("INSERT INTO paises (nombre) VALUES('$nombre')");

    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }
}


if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->query("DELETE FROM paises WHERE idpais=".$_GET['del']);
    header("Location: indexPais.php");
}



if(isset($_GET['edit'])){
    
    $SQL=$MySQLiconn->query("SELECT * FROM paises WHERE idpais=".$_GET['edit']);

    $getRow=$SQL->fetch_array();  
}

if(isset($_POST['update'])){

    $SQL=$MySQLiconn->query("UPDATE paises SET nombre='".$_POST['nombre']."'WHERE idpais=".$_GET['edit']);
    
    header("Location: indexPais.php");
}