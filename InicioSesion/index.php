<?php
  session_start();

  require 'DB_Noe.php';
  //SI EXISTE LA SESION
  if (isset($_SESSION['idusuario'])) {
    //CONSULTANDO A LA BASE DE DATOS
    $records = $conn->prepare('SELECT idusuario, email, contrasena FROM usuario WHERE idusuario = :id');
    $records->bindParam(':id', $_SESSION['idusuario']);
    $records->execute();
    //SE GUARDAN LOS RESULTADOS DE LA CONSULTA
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to your App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php require 'partials/header.php'?>

    <?php if(!empty($user)): ?>
        <br> Welcome. <?= $user['email']; ?>
        <br>You are Successfully Logged In
        <a href="SALIR.php">
            Logout
        </a>
    <?php else: ?>
      <h1>Por favor registrarse o logearse</h1>

      <a href="LOGEAR.php">Logear</a> or
      <a href="REGISTRAR.php">Registrar</a>
    <?php endif; ?>
</body>
</html>