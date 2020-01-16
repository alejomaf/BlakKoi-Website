<?php
  session_start();
  require '../../connections/database.php';
  require '../../connections/getData.php';

  $id=$_GET['id'];
      
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
  while($row = $proyectos->fetch(PDO::FETCH_ASSOC)){
    $id_proyecto=$row['id_proyecto'];
  }
  $consulta="INSERT INTO `videos_proyecto` (`idVideo`, `tituloVideo`, `descripcionVideo`, `enlace`, `id_proyecto`) VALUES (?,?,?,?,?)";
  $records = $conn->prepare($consulta);
  $records->execute([ NULL,$titulo,$descripcion,$enlace,$id_proyecto]);
  if($records->rowcount() >0){
    echo 'Insertado con éxito';
    header("Location: gestionUsuario.php?id=".$id);
  }
   
   
?>