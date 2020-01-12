<?php
  session_start();
  require '../../connections/database.php';
  require '../../connections/getData.php';
?>


<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<!-- Cargamos el scrip de jQuery para poder realizar inserciones de codigo seguras-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../../scripts/scriptGeneral.js"></script>



<script>
/*Cargar página principal*/
cargarCont('gestionarProyectos.php');

function mensajes(){
  $('#square').empty();
  setTimeout(function(){$('#square').load("mensajes.php");
  },800);
}

//Redirección páginas
var ubicacion=window.location.href;
var texto=ubicacion.split("#");

if(texto.length!=1){
  switch(texto[1]){
    case "messages": mensajes(); break;
    case "projects": cargarCont('gestionarProyectos.php'); break;
    case "workProjects": cargarZon('#proyectosPendientes'); break;
    case "personalDate": cargarZon('#datosPersonales'); break;
  }
}
</script>

<?php
  if($_SESSION['mensajes']==null)$_SESSION['mensajes'] == "1";
  if($_SESSION['mensajes'] == "0"){
    header("Location: #messages");
    $_SESSION['mensajes'] = "1";
  }
?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../styles/estiloVistaPrincipal.css" >

</head>

<!--Cuerpo-->
<body id="backgroundImages">
    <p id="user"><?php printf($results['email']);?></p>
    <button class="closer" title="Close sidebar" onclick=aparecerBarra()>☰</button>

    <div id="bar">  
    <div class="logo"><img src="../../images/logoSinLetrasCircular.png" style="max-width:100%;"></div>
    <div id="sidebar">  
      <a class="special" href="home.php">Salir</a>
      <a class="active" href="#projects" onclick="cargarCont('gestionarProyectos.php');">Proyectos</a>
      <a class="btn" href="#workProjects" onclick="cargarZon('#proyectosPendientes');">Proyectos Pendientes</a>
      <a class="btn"href="#messages" onclick="mensajes()" id="mensajes">Mensajes</a>
      <a class="btn" href="#personalDate" onclick="cargarZon('#datosPersonales');">Datos Personales</a>
    </div>

  </div>


  <div class="content">
    <div id="square"> 
      
    </div>
  </div>

  
  <script>
    /*Botones activos*/
    
    // Coge el cuadro del contenido
    var btnContainer = document.getElementById("sidebar");

    // Coge todos los botones de la clase boton dentro del div
    var btns = btnContainer.getElementsByClassName("btn");

    btnContainer.getElementsByClassName("active")[0].addEventListener("click", cambioBotones);
    // Va cambiando los botones
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", cambioBotones);
    }
    function cambioBotones(){
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace("active", "btn");
        this.className += " active";}

    
    function idProyecto(id){
      document.cookie="idProyecto="+id;
    }
    </script>

    

</body> 
</html>