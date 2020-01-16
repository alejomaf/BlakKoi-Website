<?php
  require '../../connections/database.php';

  $consulta="SELECT * FROM videos_proyecto WHERE videos_proyecto.id_proyecto=1";
  $records=$conn->prepare($consulta);
  $records->execute();
  

    echo "<div class='card-group'>";
    while($row = $records->fetch(PDO::FETCH_ASSOC)){
        $video = explode("=", $row['enlace']);
        echo  "<div class='card' style='width: 20rem;'>
        <div class='embed-responsive embed-responsive-16by9' style='min-width: 300px'>
        <iframe src='https://www.youtube.com/embed/".$video[1]."'></iframe></div>
        <div class='card-body'>
          <h2 class='card-title'>".$row['tituloVideo']."</h2>
          <p class='card-text'>".$row['descripcionVideo']."</p>
        </div>
        </div>";
        }
        echo "</div>";
?>