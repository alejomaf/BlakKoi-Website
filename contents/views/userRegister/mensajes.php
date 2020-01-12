<?php
  session_start();
  require '../../connections/database.php';
  require '../../connections/getData.php';


    $mensajesConsulta = $conn->prepare('SELECT id, mensaje, destinatario, fechaEnvio, leido FROM mensajes WHERE id = :id');
    $mensajesConsulta->bindParam(':id', $results['id']);
    $mensajesConsulta->execute();
    $_SESSION['mensajes'] = "0";
?>

<div id="cuadroMensajes">
<?php
   while($row=$mensajesConsulta->fetch(PDO::FETCH_ASSOC)){
    if($row['destinatario']==1){
        echo "<div id='mensajeEmi'>".$row['mensaje']."</div>";
    }else{
        echo "<div id='mensajeRec'>".$row['mensaje']."</div>";
    }
   } 
?>


</div>
<form name="message" action="home.php" method="POST">
        <input name="usermsg" type="text" id="usermsg" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Enviar" />
</form>