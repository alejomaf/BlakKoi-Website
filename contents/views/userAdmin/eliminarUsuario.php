<?php 
session_start();
require '../../connections/database.php';
require '../../connections/getData.php';


      $id=$_SESSION['usuario'];
      echo $id;
    if(isset($_POST['delete'])){
        echo "fg";
        $consulta="DELETE from proyectos where id_usuario= ?";
        $records=$conn->prepare($consulta);
        $records->execute([$id]);
        $consulta="DELETE from users where id= ?";
        $records=$conn->prepare($consulta);
        $records->execute([$id]);
        if($records->rowcount()>0){
            header("Location: gestionarUsuarios.php");
        }
      }
?>