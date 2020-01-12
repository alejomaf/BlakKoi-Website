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
  
  $consulta="INSERT INTO portfolio (enlace,descripcion,titulo) VALUES (?,?,?)";
  $records = $conn->prepare($consulta);
  $nombre=$_POST['Nombre'];
  $descripcion=$_POST['Descripcion'];
  $enlace=$_POST['Enlace'];
  $records->execute([$enlace,$descripcion,$nombre]);
  if($records->rowcount() >0){
    echo 'Insertado con éxito';
  }
   
   
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Añadir Video</title>
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
  function cargarProyectos(){
    /*Estamos cargando en el elemento square el elemento con id= "contenido" de servicios.html
    para adaptar los estilos recomiendo hacerlo primero manualmente para dejar preparada la
    inserción de código */
    $('#square').empty();
    $('#square').load('../special-views/zonaPersonal.html #proyectos');
  }
  function cargarProyectosPendientes(){
    /*Estamos cargando en el elemento square el elemento con id= "contenido" de servicios.html
    para adaptar los estilos recomiendo hacerlo primero manualmente para dejar preparada la
    inserción de código */
    $('#square').empty();
    $('#square').load('../special-views/zonaPersonal.html #proyectosPendientes');
  }
  function cargarVideos(){
    /*Estamos cargando en el elemento square el elemento con id= "contenido" de servicios.html
    para adaptar los estilos recomiendo hacerlo primero manualmente para dejar preparada la
    inserción de código */
    $('#square').empty();
    $('#square').load('../special-views/zonaPersonal.html #videos');
  }
  function cargarMensajes(){
    /*Estamos cargando en el elemento square el elemento con id= "contenido" de servicios.html
    para adaptar los estilos recomiendo hacerlo primero manualmente para dejar preparada la
    inserción de código */
    $('#square').empty();
    $('#square').load('../special-views/zonaPersonal.html #messages');
  }
  function cargarDatosPersonales(){
    /*Estamos cargando en el elemento square el elemento con id= "contenido" de servicios.html
    para adaptar los estilos recomiendo hacerlo primero manualmente para dejar preparada la
    inserción de código */
    $('#square').empty();
    $('#square').load('../special-views/zonaPersonal.html #datosPersonales');
  }
  function cargarCambiarCorreo(){
    /*Estamos cargando en el elemento square el elemento con id= "contenido" de servicios.html
    para adaptar los estilos recomiendo hacerlo primero manualmente para dejar preparada la
    inserción de código */
    $('#square').empty();
    $('#square').load('../special-views/zonaPersonal.html #cambiarCorreo');
  }
  function cargarCambiarContraseña(){
    /*Estamos cargando en el elemento square el elemento con id= "contenido" de servicios.html
    para adaptar los estilos recomiendo hacerlo primero manualmente para dejar preparada la
    inserción de código */
    $('#square').empty();
    $('#square').load('../special-views/zonaPersonal.html #cambiarContraseña');
  }
  
</script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../styles/datosPersonales.css">

</head>

<!--Cuerpo-->
<body>

    <button class="btn" style="float: right" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-home "></i>  Cerrar sesión</button>
    <button class="closer" title="Close sidebar" onclick=aparecerBarra()>☰</button>

  <div id="sidebar">  
    <div class="logo"><img src="../../images/logoSinLetras.jpeg"
    style="max-width:100%;"></div>
    <img class="logo"></a>
    <a class="active" href="#home">Salir</a>
    <a href="#projects" onclick="cargarProyectos();">Proyectos</a>
    <a href="#workProjects" onclick="cargarProyectosPendientes();">Proyectos Pendientes</a>
    <a href="#messages" onclick="cargarMensajes();">Mensajes</a>
    <a href="#personalDate" onclick="cargarDatosPersonales();">Datos Personales</a>
    

  </div>


  <div class="content">
    <div id="square"> 
      <form action="añadirVideo.php" method="POST">
       <input type="text" placeholder="Enlace" name="Enlace">
        <input type="text" placeholder="Nombre" name="Nombre">
        <input type="text" placeholder="Descripcion" name="Descripcion">
        <input type="submit" name="Login" value="Añadir">
      </form>
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