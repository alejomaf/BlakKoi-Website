<?php
  session_start();
  require '../../connections/database.php';
  require '../../connections/getData.php';

  $id=$results["id"];

  $consulta="SELECT * FROM proyectos WHERE proyectos.id_usuario=".$id." AND fecha_terminacion='0000-00-00'";
  $proyectos=$conn->prepare($consulta);
  $proyectos->execute();

  
  if($proyectos->rowcount() == 0){
    echo 'No hay proyectos activos';
  }else{   
    //window.history.pushState("", "", '/newpage');
    echo "<div class='card-group'>";
    while($row = $proyectos->fetch(PDO::FETCH_ASSOC)){
      $consultaAux="SELECT * FROM videos_proyecto WHERE videos_proyecto.id_proyecto=".$row['id_proyecto'];
      $numVideosAux=$conn->prepare($consultaAux);
      $numVideosAux->execute();
      $numVideos=$numVideosAux->rowcount();
      
        echo  "<div class='card' style='width: 20rem;'>
        <div class='card-body'>
          <h2 class='card-title'>".$row['nombre']."</h2>
          <p class='card-text'>".$row['informacion']."</p>
        </div>
        <ul class='list-group list-group-flush'>
          <li class='list-group-item'><b>Fecha de comienzo: </b>" .$row['fecha_inicio']. "</li>
          <li class='list-group-item'><b>Fecha de finalización: </b>" .$row['fecha_terminacion']. "</li>
          <li class='list-group-item'><b>Número de vídeos: </b>" .$numVideos. "</li>
        </ul>
        <div class='card-body'>
          <a href='#' class='card-link'>Ver vídeos</a>
        </div>
        </div>";
        }
        echo "</div>";
    }
    
?>


