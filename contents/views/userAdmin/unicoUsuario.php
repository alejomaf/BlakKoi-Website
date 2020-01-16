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
      
      $id=$_GET['id'];
      $_SESSION['usuario']=$id;
      $usuario_id=$_GET['id'];
      global $user;
      $mensaje=$_POST['mensaje'];
      $consulta="INSERT INTO chats (fecha,mensaje,usuario_rec,usuario_env) VALUES (?,?,?,?)";
      $resultado=$conn->prepare($consulta);
      $fecha=getdate();
      $year=$fecha['year'];
      $month=$fecha['mon'];
      $day=$fecha['mday'];
      $fecha=$year . "-" . $month . "-" . $day;
      $resultado->execute([$fecha,$mensaje,$usuario_id,1]);
      if($resultado->rowcount()>0){
        header("Location: unicoUsuario.php?id=" . $usuario_id);
      }
     
?>
<!DOCTYPE html>
<html>
<head>
<title>Gestionar Usuario</title>
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
<link rel="stylesheet" href="../../styles/gestionarIsiarios.css">
<link rel="stylesheet" href="../../styles/proyectos.css">
<link rel="stylesheet" href="../../styles/mensajes.css">
</head>

<!--Cuerpo-->
<body>


    <button class="btn" style="float: right" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-home "></i>Cerrar sesión</button>
    <button class="closer" title="Close sidebar" onclick=aparecerBarra()>☰</button>

  <div id="sidebar">  
    <div class="logo"><img src="../../images/logoSinLetras.jpeg"
    style="max-width:100%;"></div>
    <img class="logo"></a>
    <a class="active" href="#home">Salir</a>
    <a href="#news" onclick="cargarServicios();">Gestion de Usuarios </a>
    <a href="#contact">Gestión del Portfolio</a>
    <a href="#porfolio" onclick="cargarPortfolio();">Modificar información</a>
    <a href="#about">Gestionar blog</a>
  </div>


  <div class="content">
    <div id="square"> 
    <?php
        $consulta="SELECT * FROM users where id=?";
        $records=$conn->prepare($consulta);
        $records->execute([$id]);
        $row = $records->fetch(PDO::FETCH_ASSOC);
        echo '<h3>Email usuario : ' . $row['email'] . '</h3>';
        $consulta="SELECT * FROM cuestionario where id_usuario=?";
        $records=$conn->prepare($consulta);
        $records->execute([$id]);
        $row = $records->fetch(PDO::FETCH_ASSOC);
        if($records->rowcount()>0){
        echo '<h4>Primera pregunta : ' . $row['primera'] . '</h4>';
        echo '<h4>Segunda pregunta : ' . $row['segunda'] . '</h4>';
        echo '<h4>Tercera pregunta : ' . $row['tercera'] . '</h4>';
        }
        echo ' Últimos mensajes : ';
        $consulta="SELECT * FROM chats where usuario_env=? or usuario_rec=? order by id_chat";
        $records=$conn->prepare($consulta);
        $records->execute([$id,$id]);
       if($records->rowcount() == 0){
          echo 'No hay mensajes';
          }
        if($records->rowcount() >0){
          while($row = $records->fetch(PDO::FETCH_ASSOC)){
             
             if(($row['usuario_rec']) == 1){
                 echo ' <div class="container darker">
                        <p>' . $row['mensaje'] . '</p>
                        <span class="time-right">' . $row['fecha'] .'</span>
                        </div>';
                 }
             else{
                  echo ' <div class="container">
                         <p>' . $row['mensaje'] . '</p>
                         <span class="time-left">' . $row['fecha'] .'</span>
                         </div>';
          } 
        }
      }
      echo '<form action="crearMensaje.php" method="POST">
            <textarea id="subject" name="mensaje" placeholder="" style="height:150px">
            </textarea>
            <input type="submit" value="Enviar">
            </form>';
      $consulta="SELECT * FROM proyectos
      where id_usuario = ?";
     $records=$conn->prepare($consulta);
     $records->execute([$usuario_id]);
     if($records->rowcount() == 0){
       echo 'No hay videos diponibles';
}   
    echo '<div id="contenido">';   
    if($records->rowcount() >0){
    while($row = $records->fetch(PDO::FETCH_ASSOC)){
    echo '<div class="proyecto">
          <a href="proyectounico.php?id_proyecto=' . $row['id_proyecto'] .'"><h4>' . $row['nombre'] .'</h4></a>
          <p>Información : ' . $row['informacion'] . '<br>
          Fecha comienzo:' . $row['fecha_inicio'] .'<br> 
          Fecha finalización:' . $row['fecha_terminacion'] .'</p>
          <p>Coste total del proyecto : ' . $row['coste_total'] . '</p>
          </div>';
       }
  }
  echo '<form action="eliminarUsuario.php" method="POST">
        <input type="submit" name="delete" value="Delete">
        </form>';
  echo '<form action="crearProyecto.php" method="POST">
        <input type="text" name="name" value="Nombre">
        <input type="submit" name="crear" value="Crear proyecto">
        </form>';
  echo '</div>';
?>
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