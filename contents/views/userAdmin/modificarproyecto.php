<?php
error_reporting(0);
  session_start();
  require '../generic-views/database.php';
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
  }
  

  $id=$_SESSION['var'];
  $nombre=$_POST['nombre'];
  $fecha=$_POST['fecha'];
  $coste= $_POST['coste'];
  $informacion=$_POST['informacion'];
  
 
  if(!empty($nombre)){
    $consulta="UPDATE proyectos SET nombre = ?  where id_proyecto = ?";
   $records=$conn->prepare($consulta);
   $records->execute([$nombre,$id]); 
  
  }
  if(!empty($fecha)){
    $consulta="UPDATE proyectos SET fecha_terminacion = ? where id_proyecto = ?";
    $records=$conn->prepare($consulta);
    $records->execute([$fecha,$id]); 
   }
   if(!empty($coste)){
    $consulta="UPDATE proyectos SET coste_total = ? where id_proyecto = ?";
    $records=$conn->prepare($consulta);
    $records->execute([$coste,$id]); 
   }
   if(!empty($informacion)){
    $consulta="UPDATE proyectos SET informacion = ? where id_proyecto = ?";
    $records=$conn->prepare($consulta);
    $records->execute([$informacion,$id]); 
   }

   
   
?>
<!DOCTYPE html>
<html>
<head>
<title>Modificar proyecto</title>
<!-- Cargamos el scrip de jQuery para poder realizar inserciones de codigo seguras-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
  /*Funcion que hace aparecer y desaparecer la barra de busqueda*/

  function aparecerBarra(){
    var cuadrado=document.getElementById("square");
    var barra=document.getElementById("sidebar");

    if(barra.style.width!="0%"){
        barra.style.width="0%";
        cuadrado.style.width="100%";
        }
    else {
        barra.style.width="100%";
        cuadrado.style.width="0%";
        }
    
  }
  function cargarServicios(){
    /*Estamos cargando en el elemento square el elemento con id= "contenido" de servicios.html
    para adaptar los estilos recomiendo hacerlo primero manualmente para dejar preparada la
    inserción de código */
    $('#square').empty();
    $('#square').load('../generic-views/servicios.html #contenido');
  }
  function cargarPortfolio(){
    /*Estamos cargando en el elemento square el elemento con id= "contenido" de portfolio.html
    para adaptar los estilos recomiendo hacerlo primero manualmente para dejar preparada la
    inserción de código */
    $('#square').empty();
    $('#square').load('../generic-views/portfolio.html #contenido');
  }
  
</script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../styles/contacta.css">
</head>

<!--Cuerpo-->
<body>

<!--FORMULARIO DE INICIO DE SESIÓN-->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>

    <button class="btn" style="float: right" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-home "></i> <br> Welcome <?= $user['email']; ?></button>
    <button class="closer" title="Close sidebar" onclick=aparecerBarra()>☰</button>

  <div id="sidebar"> 
    
    <div class="logo"><img src="../../images/logoSinLetras.jpeg"
    style="max-width:100%;"></div>
    <img class="logo"></a>
    <a class="active" href="#home">Inicio</a>
    <a href="#news" onclick="cargarServicios();">Servicios</a>
    <a href="#contact">Solicitud presupuesto</a>
    <a href="#porfolio" onclick="cargarPortfolio();">Portfolio</a>
    <a href="#about">Contacta</a>
    <a href="#about">Información</a>
    <a href="#about">Blog</a>
    <div class="enlaces">
    <a class="enlace" href="">
        <img class="imgh" src="../../images/IconoWhatsapp2.png">
    </a>
    <a class="enlace" href="">
        <img class="imgh" src="../../images/IconoTwitter2.png">
    </a>
    <a class="enlace" href="">
        <img class="imgh" src="../../images/IconoInstagram2.png">
    </a>
      
  </div>

  </div>


  <div class="content">
    <div id="square"> 
      <div id='contenido'>
         <div class="column">
             
          <form action="modificarproyecto.php" method="POST">
            
            <label for="fname">Nombre</label>
            <input type="text"  name="nombre" placeholder="">

            <label for="lname">Fecha finalización</label>
            <input type="text" name="fecha" placeholder="">

            <label for="lname">Coste total</label>
            <input type="text" name="coste" placeholder="">

            <label for="subject">Información</label>
            <input type="text" name="informacion" placeholder="" style="height:170px">

            <input type="submit" value="Modificar">
          </form>
          
        </div>
      </div>
        
    </div>
  </div>

  <script>
    // Get the modal
    var modal = document.getElementById('id01');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>
</body> 
</html>