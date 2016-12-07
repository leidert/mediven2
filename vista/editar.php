<?php

  require ('../controlador/controlador.php');
    require_once ('../modelo/articulos.php');
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    session_start();
    $objusu = $_SESSION['usuario'];
     $articulo = new articulos();
 ?>
<!DOCTYPE html>
    <html >
    <head>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/funciones.js"></script>
   <meta charset="utf-8">
  
        <title>Registro medicamento</title>
        <link rel="stylesheet" type="text/css" href="../css/css.css">
        <link href="../css/bootstrap-responsive.css" rel="stylesheet">
  <link href="../css/header.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/dist/css/sb-admin-2.css" rel="stylesheet">
   <!-- Custom Fonts -->
    <link href="../css/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     
    <link href="../css/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/dist/css/sb-admin-2.css" rel="stylesheet">
   <!-- Custom Fonts -->
    <link href="../css/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link href="../css/style.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="../css/msg.css">
</head>
<body>
<?php include_once "menu.php"; ?>
<div class="container" >
<br>
  <p>
<a href="plataforma.php"><button class="btn btn-primary">Volver Atrás</button></a>
</p>
        <div class="wrap" align="center">
      
                        <h2 class="text-success" >Registro medicamento</h2>
                   
                   <?php $articulo->mostrarEditar($_GET['id']);?>
                        

              <!--  </div>

             </div>-->
             <!-- jQuery -->
    <script src="../css/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
    </html>
<?php 


?>