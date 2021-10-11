<?php
  session_start();

  require '../InicioSesion/DB_Noe.php';
  //SI EXISTE LA SESION
  if (isset($_SESSION['idusuario'])) {
    //CONSULTANDO A LA BASE DE DATOS
    $records = $conn->prepare('SELECT * FROM usuario WHERE idusuario = :id');
    $records->bindParam(':id', $_SESSION['idusuario']);
    $records->execute();
    //SE GUARDAN LOS RESULTADOS DE LA CONSULTA
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;
    $_SESSION['user']=$results;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>
<?php
    include_once '../Administrador/db.php'; 

    //SI EXISTE LA SESION
    if (isset($_SESSION['idusuario'])) {
        //CONSULTANDO A LA BASE DE DATOS
        $SQL=$MySQLiconn->query("SELECT idflujo,producto.nombre as nproducto,paises.nombre as npais, tipo FROM flujoproducto INNER	JOIN	paises ON flujoproducto.idpais=paises.idpais INNER	JOIN	producto ON	flujoproducto.idproducto=producto.idproducto");
        //$getRow=$SQL->fetch_array();  
        $SQL2=$MySQLiconn->query("SELECT iddiplomacia,paises.nombre as npais, fecha, motivo
        FROM	diplomacia
        INNER JOIN paises
        ON	diplomacia.idpais=paises.idpais");
        
    }
    

?>


<?php if(!empty($user)): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de inicio</title>
    <link rel="stylesheet" href="css/estilos3.css ">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body style="background-color: rgb(249, 230, 196);">
    <div class="banner">
        <div class="navbar">
            <img src="img/index3/loomincetur.png" class="logo" alt="">
            <ul>
                <li><a href="#">Contacto</a></li>
                <li><a href="#">Quienes somos</a></li>
                <li><a href="#">Soporte</a></li>
                <li>
                    <a  href="../InicioSesion/SALIR.php">
                        Sign Out
                    </a>
                </li>
                
                
            </ul>
        </div>

        <div class="content">
            <div class="title">
                Bienvenido
               
            </div>
            <p>Podrás visualizar las exportaciones e importaciones del Perú</p>
            <a href="../InicioSesion/LOGEAR.php"><button type="button">  Ingresar</button></a>
            
        </div>
    </div>
    <div>
<div class="container">        
    <div class="row">
        <div class="col-6">
            <center><h1>Relaciones Comerciales</h1></center>
            <table class="table table-success table-striped"style="font-size:16px;">
              
              <thead>
                  <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Producto</th>
                  <th scope="col">Pais</th>
                  <th scope="col">Tipo</th>
                  </tr>
              </thead>
              <?php 
                $i = 1;
                foreach ($SQL as $fila => $contenidos) {?>
                      <tr>
                          <td><?php echo $contenidos['idflujo']; ?></td>
                          <td><?php echo $contenidos['nproducto']; ?></td>
                          <td><?php echo $contenidos['npais']; ?></td>
                          <td><?php echo $contenidos['tipo']; ?></td>
                      </tr>
                      
                    <?php } ?>
              </table>
            

            
        </div>
        <div class="col-6">
        <center><h1>Relaciones Diplomáticas</h1></center>
        <table class="table table-danger table-striped"style="font-size:16px;">
              
              <thead>
                  <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Pais</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Motivo</th>
                  </tr>
              </thead>
              <?php 
                $i = 1;
                foreach ($SQL2 as $fila => $contenidos) {?>
                      <tr>
                          <td><?php echo $contenidos['iddiplomacia']; ?></td>
                          <td><?php echo $contenidos['npais']; ?></td>
                          <td><?php echo $contenidos['fecha']; ?></td>
                          <td><?php echo $contenidos['motivo']; ?></td>
                      </tr>
                      
                    <?php } ?>
              </table>
            
        </div>
    </div>   
</div>    
    
    
    </div>
</body>
</html>

<?php else: ?>
      <h1>Por favor registrarse o logearse</h1>
      
      <a href="../InicioSesion/LOGEAR.php">Logear</a> or
      <a href="../InicioSesion/REGISTRAR.php">Registrar</a>
    <?php endif; ?>