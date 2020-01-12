<?php 
session_start();
require '../generic-views/database.php';

      $id=$_SESSION['usuario'];
      echo $id;
      $name=$_POST['name'];
      if(isset($_POST['crear'])){
        $consulta="INSERT into proyectos (nombre,fecha_inicio,id_usuario) VALUES (?,?,?)";
        $fecha=getdate();
        $year=$fecha['year'];
        $month=$fecha['mon'];
        $day=$fecha['mday'];
        $fecha=$year . "-" . $month . "-" . $day;
        $records=$conn->prepare($consulta);
        $records->execute([$name,$fecha,$id]);
        if($records->rowcount()>0){
            header("Location: unicoUsuario.php?id=" . $_SESSION['usuario']);
        }
      }
?>