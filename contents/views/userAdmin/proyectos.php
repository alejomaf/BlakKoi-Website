<?php
  session_start();
  require '../../connections/database.php';
  require '../../connections/getData.php';

$consulta="SELECT * FROM proyectos
                  where id_usuario = ?";
$records=$conn->prepare($consulta);
$records->execute([$user['id']]);

if($records->rowcount() >0){
  while($row = $records->fetch(PDO::FETCH_ASSOC)){
      echo 
      '<div class="proyecto">
              <a href="proyectounico.php?id_proyecto=' . $row['id_proyecto'] .'"><h4>' . $row['nombre'] .'</h4></a>
              <p>Información : ' . $row['informacion'] . '<br>
              Fecha comienzo:' . $row['fecha_inicio'] .'<br>
              Fecha finalización:' . $row['fecha_terminacion'] .'</p>
              <p>Coste total del proyecto : ' . $row['coste_total'] . '</p>
            </div>';
                  }
            }
?>