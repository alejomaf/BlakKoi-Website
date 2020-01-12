<?php 
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
      
      
     
      $usuario_id= $_SESSION['usuario'];
      global $user;
      $mensaje=$_POST['mensaje'];
      echo $mensaje . $usuario_id;
      $consulta="INSERT INTO chats (fecha,mensaje,usuario_rec,usuario_env) VALUES (?,?,?,?)";
      $resultado=$conn->prepare($consulta);
      $fecha=getdate();
      $year=$fecha['year'];
      $month=$fecha['mon'];
      $day=$fecha['mday'];
      $fecha=$year . "-" . $month . "-" . $day;
      $resultado->execute([$fecha,$mensaje,$usuario_id,1]);
      echo $resultado->rowcount();
      if($resultado->rowcount()>0){
        header("Location: unicoUsuario.php?id=" . $usuario_id);
      }
     
?>