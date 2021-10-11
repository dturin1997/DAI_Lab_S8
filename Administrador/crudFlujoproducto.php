<?php
include_once 'db.php';

if(isset($_POST['save']))
{
    $idproducto = $MySQLiconn->real_escape_string($_POST['idproducto']);
    $idpais = $MySQLiconn->real_escape_string($_POST['idpais']);
    $tipo = $MySQLiconn->real_escape_string($_POST['tipo']);
 

    $SQL = $MySQLiconn->query("INSERT INTO flujoproducto(idproducto,idpais,tipo) VALUES('$idproducto','$idpais','$tipo')");

    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }
}


if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->query("DELETE FROM flujoproducto WHERE idflujo=".$_GET['del']);
    header("Location: indexFlujoproducto.php");
}



if(isset($_GET['edit'])){
    
    $SQL=$MySQLiconn->query("SELECT * FROM flujoproducto WHERE idflujo=".$_GET['edit']);

    $getRow=$SQL->fetch_array();  
}

if(isset($_POST['update'])){

    $SQL=$MySQLiconn->query("UPDATE flujoproducto SET idproducto='".$_POST['idproducto']."', idpais='".$_POST['idpais']."', tipo='".$_POST['tipo']."' WHERE idflujo=".$_GET['edit']);
    
    header("Location: indexFlujoproducto.php");
}