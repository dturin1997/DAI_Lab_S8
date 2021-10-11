  
<?php
//se inicia sesion
  session_start();
//se quita la sesion
  session_unset();
//se elimina la sesion
  session_destroy();
//redireccionando al logeo
  header('Location: ../index.php');
?>