<?php
  session_start();
error_reporting(0);
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

?>

<?php
  $consulta="SELECT * FROM proyectos WHERE proyectos.id_usuario=".$results['id'];
  $records=$conn->prepare($consulta);
  $records->execute();
  $numero=0;
  $uno=1;
  $proyecto="'proyecto.php'";
  if($records->rowcount() == 0){
    echo 'No hay proyectos activos';
  }else{   
    //window.history.pushState("", "", '/newpage');
    while($row = $records->fetch(PDO::FETCH_ASSOC)){
      $consultaAux="SELECT * FROM videos_proyecto WHERE videos_proyecto.id_proyecto=".$row['id_proyecto'];
      $numVideosAux=$conn->prepare(consultaAux);
      $numVideosAux->execute();
      $numVideos=$numVideosAux->rowcount();
      $numero=$numero + $uno;
      if(($numero % 2) == 0){
        echo  "<div id='proyectos'>
        <a href='#proyecto' onclick='cargarProy(".$row['id_proyecto'].");'><h4>" .$row['nombre']. "</h4></a>
        <p><b>Fecha de comienzo: </b>" .$row[fecha_inicio]. "<br>
        <b>Fecha de finalización: </b>" .$row[fecha_terminacion]. "</p>
        <p><b>Número de vídeos: </b>" .$numVideos. "</p>
        <p><b>Duración: (minutos totales)</b></p>
        </div>";
        }
      else{
        echo  "<div id='proyectos'>
        <a href='#proyecto' onclick='cargarProy(".$row['id_proyecto'].");'><h4>" .$row['nombre']. "</h4></a>
        <p><b>Fecha de comienzo: </b>" .$row[fecha_inicio]. "<br>
        <b>Fecha de finalización: </b>" .$row[fecha_terminacion]. "</p>
        <p><b>Número de vídeos: </b>" .$numVideos. "</p>
        <p><b>Duración: (minutos totales)</b></p>
        </div>";
        } 
    }
  }
?>

