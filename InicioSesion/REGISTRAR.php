<?php 
    // SE REQUIEREN LOS DATOS GUARDADOS EN EL ARCHIVO DATABASE
    require 'DB_Noe.php'; 

    $message ='';

    if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['contrasena']) && !empty($_POST['email'])) {
        $tipo="Usuario";
        $sql = "INSERT INTO usuario (nombre, apellido, contrasena, nivel, email) VALUES (:nombre, :apellido, :contrasena, :nivel, :email)"; //los espacios afectan al codigo
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre',$_POST['nombre']);
        $stmt->bindParam(':apellido',$_POST['apellido']);
        $stmt->bindParam(':contrasena', $_POST['contrasena']);
        #$stmt->bindParam(':contrasena',$_POST['contrasena']);
        $stmt->bindParam(':nivel',$tipo);
        $stmt->bindParam(':email',$_POST['email']);

        if ($stmt->execute()){
            $message = 'Successfully created new user';
        }else{
            $message = "Sorry there must have been an issue creating your acoount";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRAR</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require 'partials/header.php'?> 
        <?php if(!empty($message)):?>
        <p><?= $message ?></p>
    <?php endif?>
    <h1>REGISTRAR</h1>
    <span> or <a href="LOGEAR.php">Login</a> </span>
    <form action="REGISTRAR.php" method="post">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="apellido" placeholder="Apellido">
        <input type="text" name="email" placeholder="Email"> 
        <input type="password" name="contrasena" placeholder="Contraseña">

        <input type="submit" value="Enviar">
    </form>
</body>
</html>