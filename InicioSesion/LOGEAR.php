<?php

  session_start();

  if (isset($_SESSION['idusuario'])) {
    header('Location: index.php');
  }
  require 'DB_Noe.php';

  if (!empty($_POST['email']) && !empty($_POST['contrasena']) ) {
    
    //Lo siguiente no funcionó, creo que es por poner muchas variables en el where
    #$records = $conn->prepare('SELECT (email,nivel) FROM usuario WHERE (email IN(:email)) AND (nivel IN(:nivel))');
    $records = $conn->prepare('SELECT idusuario,contrasena,nivel,email FROM usuario WHERE email=:email');
    $records->bindParam(':email', $_POST['email']); 
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    
    
    
    $message = '';

    if (count($results) > 0 && $results['nivel']=="Usuario" && $results['contrasena']==$_POST['contrasena']) {
      $_SESSION['idusuario'] = $results['idusuario'];
      header("Location: ../UsuarioGeneral/indexGeneral.php");
    }elseif(count($results) > 0 && $results['nivel']=="Administrador" && $results['contrasena']==$_POST['contrasena']){
      $_SESSION['idusuario'] = $results['idusuario'];
      header("Location: ../Administrador/indexMenu.php");
    }else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logeo</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Logear</h1>
    <span>or <a href="REGISTRAR.php">Registrar</a></span>

    <form action="LOGEAR.php" method="POST">
      <input name="email" type="text" placeholder="Enter your email">
      <input name="contrasena" type="password" placeholder="Enter your Password">
      <input type="submit" value="Submit">
    </form>
  </body>
</html>