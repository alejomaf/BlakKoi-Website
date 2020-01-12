<?php>
error_reporting(0);
  session_start();
  require '../generic-views/database.php';
  
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
  }

  $id=$_SESSION['var'];
  $nombre=$_POST['nombre'];
  $fecha=$_POST['fecha'];
  $coste= $_POST['coste'];
  $informacion=$_POST['informacion'];
  $enlace=$_POST['enlace'];
  echo $_SESSION['ID'];
  
  if(!empty($nombre)){
    $consulta="UPDATE proyectos SET nombre = ?  where id_proyecto = ?";
   $records=$conn->prepare($consulta);
   $records->execute([$nombre,$id]); 
  
  }
  if(!empty($fecha)){
    $consulta="UPDATE proyectos SET fecha_terminacion = ? where id_proyecto = ?";
    $records=$conn->prepare($consulta);
    $records->execute([$fecha,$id]); 
   }
   if(!empty($coste)){
    $consulta="UPDATE proyectos SET coste_total = ? where id_proyecto = ?";
    $records=$conn->prepare($consulta);
    $records->execute([$coste,$id]); 
   }
   if(!empty($informacion)){
    $consulta="UPDATE proyectos SET informacion = ? where id_proyecto = ?";
    $records=$conn->prepare($consulta);
    $records->execute([$informacion,$id]); 
   }
   if(!empty($enlace)){
    $consulta="INSERT INTO videos_proyecto (id_proyecto,enlace) VALUES(?,?)";
    $records=$conn->prepare($consulta);
    $records->execute([$id,$enlace]); 
   }
?>

         <div class="column">
             
          <form action="gestionarProyectos.php" method="POST">
            
            <label for="fname">Nombre</label>
            <input type="text"  name="nombre" placeholder="">

            <label for="lname">Fecha finalización</label>
            <input type="text" name="fecha" placeholder="">

            <label for="lname">Coste total</label>
            <input type="text" name="coste" placeholder="">

            <label for="subject">Información</label>
            <input type="text" name="informacion" placeholder="" style="height:170px">

            <input type="submit" value="Modificar">
          </form>
          <form action="gestionarProyectos.php" method="POST">
            
            <label for="fname">Enlace para video</label>
            <input type="text"  name="enlace" placeholder="">
            <input type="submit" value="Añadir">
          </form>
          
        
      </div>
    </div>
  </div>

