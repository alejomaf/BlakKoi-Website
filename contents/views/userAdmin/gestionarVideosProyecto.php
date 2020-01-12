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
  

  $id=$_SESSION['var'];
  $enlace=$_POST['enlace'];
  
  echo $_SESSION['ID'];
  
  if(!empty($enlace)){
   $consulta="INSERT INTO videos_proyecto (id_proyecto.url) VALUES (?,?)";
   $records=$conn->prepare($consulta);
   $records->execute([$id,$enlace]); 
  
  }
  

   
   
?>