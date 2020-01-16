<?php
  session_start();
  require '../../connections/database.php';
  require '../../connections/getData.php';

  
  if (!empty($_POST['usermsg'])) {
    $insercionMsg="INSERT INTO `mensajes` (`idMensaje`, `id`, `mensaje`, `asunto`, `destinatario`, `fechaEnvio`, `leido`) 
    VALUES ('', :id, :mensaje, '', '1', :fecha, '0')";
    $sql = "INSERT INTO mensajes (id, mensaje, destinatario, fechaEnvio, leido) VALUES (:id, :mensaje, 1, GETDATE(), 0)";
    $stmt = $conn->prepare($insercionMsg);
    $fecha=date('Y-m-d H:i:s');
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':id', $results['id']);
    $stmt->bindParam(':mensaje', $_POST['usermsg']);
    $stmt->execute();
    //AQUI HABRÍA QUE HACER UN LOAD
    header("Location: ../userRegister/zonaPersonal.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<!-- Cargamos el scrip de jQuery para poder realizar inserciones de codigo seguras-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../../scripts/scriptGeneral.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<script>
cargar('#inicio');
if(texto.length!=1){
  switch(texto[1]){
    case "home": cargar('#inicio'); break;
    case "services": cargar('#servicios'); break;
    case "solicitudPresupuesto": cargar('#presupuesto'); break;
    case "portfolio": cargar('#portfolio'); break;
    case "contact": cargar('#contacta'); break;
    case "blog": cargar('#blog'); break;
  }
}
</script>


<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../styles/estiloVistaPrincipal.css">
</head>

<!--Cuerpo-->
<body id="backgroundImages">
<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				
	  		<h1><a href="home.php" class="logo"><img src="../../images/logoSinLetrasCircular.png"
        style="max-width:100%;"></a></h1>
        <ul id="cambioActivo" class="list-unstyled components mb-5">

                <li class="boton"><a class="btnSpe" href="../../connections/logout.php">Cerrar sesión</a></li>
                <li><a href="zonaPersonal.php">ZonaPersonal</a></li>
                <li class="active"><a href="#home" onclick="cargar('#inicio');">Inicio</a></li>
                <li class="boton"><a  href="#services" onclick="cargar('#servicios');">Servicios</a></li>
                <li class="boton"><a href="#solicitudPresupuesto" onclick="cargar('#presupuesto');">Solicitud presupuesto</a></li>
                <li class="boton"><a href="#porfolio" onclick="cargarCont('portfolio.php');">Portfolio</a></li>
                <li class="boton"><a href="#contact" onclick="cargar('#contacta');">Contacta</a></li>
                <li class="boton"><a href="#blog" onclick="cargar('#blog');">Blog</a></li>
                
           
        </ul>

      </nav>
      
      <div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
      </div>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

      </div>
      <p id="user"><?php printf($results["email"]);?></p>
</div>

<script src="../../scripts/cambioTexto.js"></script>
<script src="../../scripts/finalPagina.js"></script>

</body> 
</html>

