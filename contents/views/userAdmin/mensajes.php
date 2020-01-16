<?php
    session_start();
    require '../../connections/database.php';
    require '../../connections/getData.php';

    $consultaId= $conn->prepare('SELECT email, id FROM users WHERE id=:id');
    $mensajesConsulta = $conn->query("SELECT id, COUNT(id) FROM `mensajes` WHERE `leido` = 0 GROUP BY id"); 
    $mensajesConsulta->execute();

    echo '<h2>Mensajes no leidos</h2>';
    
    while($row = $mensajesConsulta->fetch(PDO::FETCH_ASSOC)){
        $consultaId->bindParam(':id', $row['id']);
        $consultaId->execute();
        while($aux = $consultaId->fetch(PDO::FETCH_ASSOC))$email=$aux['email'];
        echo
        '<div style="outline-style: solid;"><div class="row">
        <div class="col-xs-12 col-md-8"><a href="mensajeUsuario.php?id='.$row["id"].'">'.$email.'</a></div>
        <div class="col-xs-6 col-md-4"><b>'.$row["COUNT(id)"].'</b></div>
        </div> 
        </div>'; 
    }
    ?>
    