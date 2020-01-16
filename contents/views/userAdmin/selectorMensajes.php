<?php
    session_start();
    require '../../connections/database.php';
    require '../../connections/getData.php';

    $id="<script>document.writeln(p1);</script>";

    $consultaId= $conn->prepare('SELECT email, idMensaje FROM users WHERE id=:id');
    $consultaNoLeidos= $conn->prepare('SELECT id, SUM(leido) FROM mensajes WHERE leido=1 GROUP BY id');//AÑADIR WHERE id!=1 quitando el admin
    $consultaNoLeidos->execute();
?>


    <?php
    while($row = $consultaNoLeidos->fetch(PDO::FETCH_ASSOC)){
        $consultaId->bindParam(':id', $row['id']);
        $consultaId-> execute();
        while($aux=$consultaId->fetch(PDO::FETCH_ASSOC))$emailUsuario=$aux['email'];
        echo "
        <div id='messages'
        <a id='title'><b> Usuario: ".$emailUsuario."</b></a>
        <a id='destinatario'><b>Mensajes no leidos: ".row['leido']."</b></a></div>
        ";
    }
    ?>