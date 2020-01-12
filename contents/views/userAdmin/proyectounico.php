<?php
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
  global $user;
  $id=$_GET['id_proyecto'];
  $_SESSION['var']=$id;
  global $id;
?>
<!DOCTYPE html>
<html>
<head>
<title>Proyecto</title>
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
<link rel="stylesheet" href="../../styles/proyectounico.css">
<link rel="stylesheet" href="../../styles/datospersonales.css">
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

    <button class="btn" style="float: right" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-home "></i>Cerrar sesión</button>
    <button class="closer" title="Close sidebar" onclick=aparecerBarra()>☰</button>

  <div id="sidebar">  
    <div class="logo"><img src="../../images/logoSinLetras.jpeg"
    style="max-width:100%;"></div>
    <img class="logo"></a>
    <a class="active" href="#home">Salir</a>
    <a href="#news" onclick="cargarServicios();">Proyectos </a>
    <a href="#contact">Proyectos Pendientes</a>
    <a href="#porfolio" onclick="cargarPortfolio();">Mensajes</a>
    <a href="#about">Fidelización</a>
    <a href="#about">Datos Personales</a>
    

  </div>


  <div class="content">
    <div id="square"> 
      <div id='contenido'>
       <?php
        $consulta="SELECT * FROM proyectos
        where id_proyecto = ?";
        $records=$conn->prepare($consulta);
        $records->execute([$id]);
        if($records->rowcount() == 0){
        echo 'No hay videos diponibles';
          }
        if($records->rowcount() >0){
           $row = $records->fetch(PDO::FETCH_ASSOC);
           echo '<div class="proyecto">
           <div class="texto2">
           <h2>'. $row['nombre'] . '</h2>
           <h3>Fecha comienzo:' . $row['fecha_inicio'] . '</h3>
           <h3>Fecha finalización:' . $row['fecha_terminacion'] . '</h3>
           <h3>Coste total del proyecto:' . $row['coste_total'] . '</h3> 
           <h3>Información : </h3><p>' . $row['informacion'] . '</p>
           <a href="modificarproyecto.php?id_proyecto='. $row['id_proyecto'] . '">Modificar</a>
           </div>
           <div class="archivos">';
          $consulta2="SELECT * from videos_proyecto where id_proyecto = ?";
          $resultado=$conn->prepare($consulta2);
          $resultado->execute([$id]);
          if($resultado->rowcount() == 0){
            echo 'No hay videos diponibles';
              }
           if($resultado->rowcount() >0){
            while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
              echo '<iframe id="imagen" allow="fullscreen"
                     src="' . str_replace("watch?v=","embed/",$row['enlace']) . '">
                      </iframe>';
            }
          }
           echo '</div>';
            
          }
      

       ?>
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