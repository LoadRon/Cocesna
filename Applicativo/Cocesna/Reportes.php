<?php
    include_once("class/class_conexion.php");
    include_once("class/class_categoria.php"); 
    $conexion = new Conexion();
    session_start();
    if(!isset($_SESSION['nombre_usuario'])||($_SESSION['inicio']==2))
    header("Location: index.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Reportes</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
     <nav class="mb-1 navbar navbar-expand-lg navbar-dark blue-gradient lighten-1">
        <a class="navbar-brand" href="#"><img src="img/Cocesna-Logo.png" height="50" alt="mdb logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
          aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent-555">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <?php 
              if($_SESSION['posicion']==3){
              echo "<a class='nav-link' href='Reportes.php'>Inicio";}
              else{
              echo "<a class='nav-link' href='index_admin.php'>Inicio";}
              ?>
                      
                <span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto nav-flex-icons">
             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php 
                if($_SESSION['posicion']==4){
                echo "Administrador: ".$_SESSION['nombre_usuario'];}
                else{
                echo "Recursos Humanos: ".$_SESSION['nombre_usuario'];}
              ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                <a class="dropdown-item" href="cerrar_sesion.php">Log out</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
           

  <div class="col-md-11 mb-6" 
             style="width: 2000px;
             position: absolute;
             top: 150px;
             left: 10%;
             margin-left: -50px;">
    <a type="button" class="btn btn-block  btn-rounded waves-effect" href="preguntas_respondidasxcategoria.php"><h5>REPORTE GRAFICO PREGUNTAS RESPONDIDAS POR CATEGORIA</h5><p style="color:grey;"><i>Muesta un grafico que indica la cantidad de veces que se ha respondido una pregunta de cada categoria</i></p></a>
    <a type="button" class="btn btn-block  btn-rounded waves-effect" href="reporte_personalizado.php?dv=0"><h5>REPORTE PERSONAL</h5><p style="color:grey;"><i>Ingresa un nombre de usuario y se mostrara la ultima encuesta que ha respondido</i></p></a>
  </div>
    
    
  
  

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>