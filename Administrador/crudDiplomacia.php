<?php
include_once 'db.php';

if(isset($_POST['save']))
{
    $idpais = $MySQLiconn->real_escape_string($_POST['idpais']);
    $fecha = $MySQLiconn->real_escape_string($_POST['fecha']);
    $motivo = $MySQLiconn->real_escape_string($_POST['motivo']);
 

    $SQL = $MySQLiconn->query("INSERT INTO diplomacia (idpais,fecha,motivo) VALUES('$idpais','$fecha','$motivo')");

    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }
}


if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->query("DELETE FROM diplomacia WHERE iddiplomacia=".$_GET['del']);
    header("Location: indexDiplomacia.php");
}



if(isset($_GET['edit'])){
    
    $SQL=$MySQLiconn->query("SELECT * FROM diplomacia WHERE iddiplomacia=".$_GET['edit']);

    $getRow=$SQL->fetch_array();  
}

if(isset($_POST['update'])){

    $SQL=$MySQLiconn->query("UPDATE diplomacia SET idpais='".$_POST['idpais']."', fecha='".$_POST['fecha']."', motivo='".$_POST['motivo']."' WHERE iddiplomacia=".$_GET['edit']);
    
    header("Location: indexDiplomacia.php");
}