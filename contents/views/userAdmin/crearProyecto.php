<?php 
session_start();
require '../generic-views/database.php';

      $id=$_GET['id'];
      
      $nombre=$_POST['nombre'];
      $costeTotal=$_POST['coste_total'];
      $informacion=$_POST['informacion'];

        $consulta="INSERT into proyectos (nombre,fecha_inicio,id_usuario,coste_total,informacion) VALUES (?,?,?,?,?)";
        $fecha=date('Y-m-d H:i:s');
        $records=$conn->prepare($consulta);
        $records->execute([$nombre,$fecha,$id,$costeTotal,$informacion]);
        if($records->rowcount()>0){
            header("Location: gestionUsuario.php?id=".$id);
        }
?>
