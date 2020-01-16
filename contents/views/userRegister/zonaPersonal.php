<?php
  session_start();
  require '../../connections/database.php';
  require '../../connections/getData.php';
  
  $email=$results["email"];
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
/*Cargar página principal*/
cargarCont('gestionarProyectosNF.php');

function mensajes(){
  $('#content').empty();
  setTimeout(function(){$('#content').load("mensajes.php");
  },800);
}

//Redirección páginas
var ubicacion=window.location.href;
var texto=ubicacion.split("#");

if(texto.length!=1){
  switch(texto[1]){
    case "messages": mensajes(); break;
    case "projects": cargarCont('gestionarProyectos.php'); break;
    case "workProjects":cargarCont('gestionarProyectosNF.php'); break;
    case "personalData": cargarZon('#datosPersonales'); break;
  }
}
</script>

<?php
  if(isset($_SESSION['mensajes'])){
  if($_SESSION['mensajes'] == "0"){
    header("Location: #messages");
    $_SESSION['mensajes'] = "1";
  }
}
?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../styles/estiloVistaPrincipal.css" >



</head>

<!--Cuerpo-->
<body id="backgroundImages">

<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				
	  		<h1><a href="home.php" class="logo"><img src="../../images/logoSinLetrasCircular.png"
        style="max-width:100%;"></a></h1>
        <ul id="cambioActivo" class="list-unstyled components mb-5">

                <li class="boton"><a class="btnSpe" href="home.php">Salir</a></li>
                <li class="activo"><a href="#workProjects" onclick="cargarCont('gestionarProyectosNF.php');">Proyectos Pendientes</a></li>
                <li class="boton"><a href="#projects" onclick="cargarCont('gestionarProyectos.php');">Proyectos finalizados</a></li>
                <li class="boton"><a href="#messages" onclick="mensajes()" id="mensajes">Mensajes</a></li>
                <li class="boton"><a href="#personalData" onclick="cargarZon('#datosPersonales');">Datos Personales</a></li>
           
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
      <p id="user"><?php printf($email);?></p>
</div>

  
<script src="../../scripts/finalPagina.js"></script>
<script>
function scrollDown() {
    var elem = document.getElementById('content');
    elem.scrollTop = elem.scrollHeight;
    var input = document.getElementById('entradaTexto');
    input.focus();
    input.select();
}
scrollDown();
</script>


</body> 
</html>