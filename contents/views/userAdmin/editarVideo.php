<?php
  session_start();
  require '../../connections/database.php';
  require '../../connections/getData.php';

  $id=$_POST['id'];
  $idP=$_POST['idP'];
      
  $titulo=$_POST['titulo'];
  $enlace=$_POST['enlace'];
  $descripcion=$_POST['descripcion'];

  $consulta="";

  if(isset($_POST['titulo'])){
    $consulta+="`tituloVideo` = ".$_POST['titulo'];
  }
  else if(isset($_POST['descripcion'])){
    if(empty($consulta)){
      $consulta+="`descripcionVideo` = ".$_POST['descripcion'];
    }else{
      $consulta+=",`descripcionVideo` = ".$_POST['descripcion'];
    }
  }else{
    if(empty($consulta)){
      $consulta+="`enlace` = ".$_POST['enlace'];
    }else{
      $consulta+=",`enlace` = ".$_POST['descripcion'];
    }
  }


  if(!empty($consulta)){
    $actualizarVideo="UPDATE `videos_proyecto` SET ".$consulta." WHERE `videos_proyecto`.`idVideo` =".$id;
    $actualizacion=$conn->prepare($actualizarVideo);
    $actualizacion->execute();
  }
  header("Location: videos.php?id=".$idP);
  ?>