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
//Redirección páginas
var ubicacion=window.location.href;
var texto=ubicacion.split("#");

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

<!--FORMULARIO DE INICIO DE SESIÓN-->
<div id="id01" class="modal">
  
  <form class="box" action="login.php" method="POST">
      <img id="out" src="../../images/crossWhite.jpg" onclick="document.getElementById('id01').style.display='none'">
      <h1>Login</h1>
      <input name="email" type="textI" placeholder="Enter Email" name="uname" required>
      <input name="password" type="password" placeholder="Enter Password" name="psw" required>
      <input type="submit" name="Login" value="Login">
      <div class="contenedor">
        <div><a href="">Recordar contraseña</a></div> <p></p>
          <div> <a href="signup.php">Registrarse</a></div>
      </div>
      
    </form>
</div>

  <button class="closer" title="Close sidebar" onclick=aparecerBarra()>☰</button>
  <div id="bar"> 
      <div class="logo"><img src="../../images/logoSinLetrasCircular.png"
      style="max-width:100%;"></div>
  <div id="sidebar"> 
    <a class="active" href="#home" onclick="cargar('#inicio');">Inicio</a>
    <a class="btn" href="#services" onclick="cargar('#servicios');">Servicios</a>
    <a class="btn" href="#solicitudPresupuesto" onclick="cargar('#presupuesto');">Solicitud presupuesto</a>
    <a class="btn" href="#porfolio" onclick="cargar('#portfolio');">Portfolio</a>
    <a class="btn" href="#contact" onclick="cargar('#contacta');">Contacta</a>
    <a class="btn" href="#blog" onclick="cargar('#blog');">Blog</a>
    
    <a class="btnSpe" style="cursor: pointer;" onclick="document.getElementById('id01').style.display='block'"> Iniciar sesión</a>
  </div>
  
  </div>


  <div class="content">
    <div id="square"> 
         
    </div>
  </div>


  <script>
  
    /*Inicio*/

    var x=1;
    $('#square').load('../generic-views/generic-views.html #inicio');
    function temporizador(){
      cambiarTexto(x);
      if(x==4)x=1;else x++;
    }
    setInterval(temporizador,10000);

    function cambiarTexto(aux2){
      var modal = document.getElementById('texttop'+aux2);
      var borrar;
      if(aux2==1){
      borrar=document.getElementById('texttop4');
      }else{
      borrar=document.getElementById('texttop'+(aux2-1));
      }
      borrar.style.display="none";
      modal.style.display="block";
    }
    
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
        this.className += " active";
      }


    /*Cuadro de inicio de sesión*/

    // Coge el cuadro de inicio
    var modal = document.getElementById('id01');
    
    // Cuando el usuario clicke fuera se cierre el cuadro de inicio
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>

</body> 
</html>