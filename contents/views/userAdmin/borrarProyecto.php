<?php 
session_start();
require '../../connections/database.php';
require '../../connections/getData.php';



  $id=$_GET['id'];
  $id_proyecto=$_GET['id_proyecto'];
    $consulta="DELETE from videos_proyecto where id_proyecto= $id_proyecto";
    $records=$conn->prepare($consulta);
    $records->execute([$id]);
    $consulta="DELETE from proyectos where id_proyecto= $id_proyecto";
    $records=$conn->prepare($consulta);
    $records->execute([$id]);
    if($records->rowcount()>0){
        header("Location: gestionUsuario.php?id=".$id);
    }
?>