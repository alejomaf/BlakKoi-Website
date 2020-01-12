<?php
    session_start();
    require '../../connections/database.php';
    require '../../connections/getData.php';

    $id="<script>document.writeln(p1);</script>";

    
    $consultaId= $conn->prepare('SELECT email, id FROM users WHERE id=:id');
    $mensajesConsulta = $conn->prepare('SELECT id, mensaje, destinatario, fechaEnvio, leido FROM mensajes WHERE id = :id');
    $mensajesConsulta->bindParam(':id', $results['id']);
    $mensajesConsulta->execute();
?>


    <?php
    while($row = $mensajesConsulta->fetch(PDO::FETCH_ASSOC)){
        if($row['destinatario']==0){$estilo="admin";}else{$estilo="user";}
        $consultaId->bindParam(':id', $row['id']);
        $consultaId-> execute();
        while($aux=$consultaId->fetch(PDO::FETCH_ASSOC))$emailUsuario=$aux['email'];
        echo "
        <div id='messages'
        <a id='body'>".substr($row['mensaje'], 30)."</a>
        <a id='destinatario'><b>Enviado a: ".$emailUsuario."</b></a>
        <a id='date'><b>".$row['fechaEnvio']."</b></a></div>
        ";
    }
    ?>
    