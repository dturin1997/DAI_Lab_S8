<?php
include_once 'crudDiplomacia.php';
session_start();
?>

<?php
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

<?php if(!empty($user)): ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / General - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="../index.php" class="logo d-flex align-items-center">
        <img src="assets/img/mincetur.png" alt="">
        <span class="d-none d-lg-block">Mincetur</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/administrador.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php 
                echo $_SESSION['user']['nombre']." ".$_SESSION['user']['apellido'];
              ?></span>
          </a><!-- End Profile Image Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php 
                echo $_SESSION['user']['nombre']." ".$_SESSION['user']['apellido'];
              ?></h6>
              <span><?php echo $_SESSION['user']['nivel'] ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../InicioSesion/SALIR.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      


      <li class="nav-item">
        <a class="nav-link" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            <li>
              <a href="indexUsuario.php">
                <i class="bi bi-circle"></i><span>Tabla Usuario</span>
              </a>
            </li>
            <li>
              <a href="indexProducto.php">
                <i class="bi bi-circle"></i><span>Tabla Producto</span>
              </a>
            </li>
            <li>
              <a href="indexPais.php">
                <i class="bi bi-circle"></i><span>Tabla Paises</span>
              </a>
            </li>
            <li>
              <a href="indexFlujoproducto.php">
                <i class="bi bi-circle"></i><span>Tabla Flujo Producto</span>
              </a>
            </li>
            <li>
              <a href="indexDiplomacia.php" class="active">
                <i class="bi bi-circle"></i><span>Tabla Diplomacia</span>
              </a>
            </li>
        </ul>
      </li><!-- End Tables Nav -->

      

      

      <li class="nav-heading">Pages</li>

      

      

      

      

      

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Mantenimiento Relaciones Diplomáticas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="indexMenu.php">Home</a></li>
          <li class="breadcrumb-item">Tablas</li>
          <li class="breadcrumb-item active">Diplomacia</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
    <!-- Columna 1---> 
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tabla Diplomacia</h5>

              <!-- Default Table -->
              <table class="table"style="font-size:13px;">
              
              <thead>
                  <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Pais</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Motivo</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  </tr>
              </thead>
                  <?php
                  $res=$MySQLiconn->query("SELECT * FROM diplomacia");
                  while($row=$res->fetch_array()){
                      ?>
                      <tr>
                          <td><?php echo $row['iddiplomacia']; ?></td>
                          <td><?php echo $row['idpais']; ?></td>
                          <td><?php echo $row['fecha']; ?></td>
                          <td><?php echo $row['motivo']; ?></td>
                          <td><a href="?edit=<?php echo $row['iddiplomacia']; ?>" onclick="return confirm('Confirmar edicion')">Editar</a></td>
                          <td><a href="?del=<?php echo $row['iddiplomacia']; ?>" onclick="return confirm('Confirmar eliminacion')">Eliminar</a></td>
                      </tr>
                      <?php
                  }
                  ?>
        
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>


          

          

        </div>
  <!--Columna Numero 2-->

        <div class="col-lg-3">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Registrar Relacion Diplomática</h5>

              <form method="post">
                <table class="table table-sm">
                    
                    <tr>
                        <td>
                            <input type="text" name="idpais" placeholder="Pais" value="<?php if(isset($_GET['edit'])){ echo $getRow['idpais'];}?>">              
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="fecha" placeholder="Fecha" value="<?php if(isset($_GET['edit'])){ echo $getRow['fecha'];}?>">              
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="motivo" placeholder="Motivo" value="<?php if(isset($_GET['edit'])){ echo $getRow['motivo'];}?>">              
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                           <?php
                                if(isset($_GET['edit'])){
                                    ?><!-- Se fraccionó el codigo-->
                                    <button class="btn btn-primary" type="submit" name="update">Editar</button>
                                    <?php
                                }else{
                                    ?>
                                    <button class="btn btn-primary" type="submit" name="save">Registrar</button>
                                    <?php
                                }
                           ?>
                        </td>
                    </tr>
                </table>
            </form>

            </div>
          </div>

          

          
         

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Tecsup-2021-II</span></strong>. Todos los derechos reservados
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Diseñado por <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

<?php else: ?>
      <h1>Por favor registrarse o logearse</h1>

      <a href="../InicioSesion/LOGEAR.php">Logear</a> or
      <a href="../InicioSesion/REGISTRAR.php">Registrar</a>
    <?php endif; ?>