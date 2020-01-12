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
        
    $idProyecto=$_COOKIE['idProyecto'];

    $consulta="SELECT * FROM videos_proyecto WHERE videos_proyecto.id_proyecto=".$idProyecto;
    $records=$conn->prepare($consulta);
    $records->execute();
    echo "<div id='videos'>";
  if($records->rowcount() == 0){
    echo '<p>No hay ningún video actualmente</p>';
  }else{   
    while($row = $records->fetch(PDO::FETCH_ASSOC)){
        echo  "<div>
        <iframe id='imagen' src='" .$row['enlace']. "'></iframe>
        <p><b>" .$row['tituloVideo']. "</p></b>
        <p>" .$row['descripcionVideo']. "</p>
        </div>";
    }
  }
    echo "</div>";
    


?>

