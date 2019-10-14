<?php
include_once("class/class_conexion.php");
session_start();
 if(!isset($_SESSION['nombre_usuario'])||($_SESSION['inicio']==2))
 header("Location: index.php");
$conexion = new Conexion();

$cantidadPreguntas=$_POST["txtcantidadPreguntas"];
$cantidadEscalable=$_POST["txtcantidadPreguntasEsc"];
$cantidadCerrada=$_POST["txtcantidadPreguntasCer"];
$categoriaSeleccionada=$_POST["txtcurrentCat"];
$usuarioId=$_POST["txtUserid"];
$i=1;
$j=1;
$cj=0;
$ej=0;

$sqlid = ("SELECT id_encuesta
			FROM encuesta
 	 		ORDER BY id_encuesta DESC LIMIT 1");

	$resultado=$conexion->ejecutarInstruccion($sqlid);
    $fila = $conexion->obtenerFila($resultado);
	$codigoEncuesta=$fila["id_encuesta"];

while ( $i<= $cantidadCerrada) {
	$respuestaCer=$_POST["radioCerrada$cj"];
	$codigoCer=$_POST["txtcodigoPregunta$cj"];
	$tipoCer=$_POST["txtcodigoTipoPregunta$cj"];

$sql1 = "CALL SP_INLOGENCUESTA('".$codigoEncuesta."', 
		'".$codigoCer."','".$tipoCer."','".$usuarioId."','".$respuestaCer."')";
		$res1 = $conexion->ejecutarInstruccion($sql1);
	$i++;
	$cj++;
}
while ( $j<= $cantidadEscalable) {
	$respuestaEsc=$_POST["radioEscalable$ej"];
	$codigoEsc=$_POST["txtcodigoPreguntaB$ej"];
	$tipoEsc=$_POST["txtcodigoTipoPreguntaB$ej"];

$sql2 = "CALL SP_INLOGENCUESTA('".$codigoEncuesta."', 
		'".$codigoEsc."','".$tipoEsc."','".$usuarioId."','".$respuestaEsc."')";
		$res2 = $conexion->ejecutarInstruccion($sql2);
	$j++;
	$ej++;
}
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Gracias</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body style="background: url(img/Fondo1.jpg);
             background-repeat: no-repeat;
             background-position: center center; 
             background-attachment: fixed;
             background-size: cover;
             background-size: cover;">

  <!-- Start your project here-->
  <!--Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar mask rgba-grey-strong img-fluid">
  <a class="navbar-brand" href="#"><img src="img/Cocesna-Logo.png" height="40" alt="mdb logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
    aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent-555">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        </li>
      </ul>
      <ul class="navbar-nav ml-auto nav-flex-icons">
         <li class="nav-item dropdown">
          <a class="nav-link" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php 
              if($_SESSION['posicion']==2){
              echo "Supervisor: ".$_SESSION['nombre_usuario'];}
              else{
              echo $_SESSION['nombre_usuario'];}
            ?>
          </a>
        </li>
      </ul>
    </div>
  </nav>
<!--/.Navbar -->  
    <div>
        <div style="width: 60%;
             position: absolute;
             top: 215px;
             left: 22%;
             margin-left: -50px;">

          <div class="card text-center" style="background-color: rgba(229, 228, 255, 0.2);">
              <div class="card-header">
                <p class="white-text">Agradecimiento</p>
              </div>
              <div class="card-body">
                <h5 class="card-title white-text">Muchas Gracias por participar en la encuesta</h5>
                <p class="card-text white-text" >Sus respuestas han sido guardadas con exito, desea regresar a la pagina de categorias y responder otra encuesta o terminar la encuesta?</p>
              </div>
              <div class="card-footer text-muted">
                <a class="nav-link btn btn-secondary" href="encuesta.php">Volver a Encuesta</a>
                <a class="nav-link btn btn-secondary" href="cerrar_sesion_mail.php?nombreUser=<?php echo $_POST["txtUsername"];?>">Terminar Encuesta</a>
              </div>
          </div>  
        </div>
    </div>


    
  
  
  <!-- Start your project here-->

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
