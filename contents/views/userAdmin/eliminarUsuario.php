<?php 
session_start();
require '../../connections/database.php';
require '../../connections/getData.php';



  $id=intval($_GET['id']);
    $consulta="DELETE from proyectos where id_usuario= $id";
    $records=$conn->prepare($consulta);
    $records->execute([$id]);
    $consulta="DELETE from users where id= $id";
    $records=$conn->prepare($consulta);
    $records->execute([$id]);
    if($records->rowcount()>0){
        header("Location: home.php");
    }
?>