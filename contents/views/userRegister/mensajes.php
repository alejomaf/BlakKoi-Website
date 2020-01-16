<?php
  session_start();
  require '../../connections/database.php';
  require '../../connections/getData.php';


    $mensajesConsulta = $conn->prepare('SELECT id, mensaje, destinatario, fechaEnvio, leido FROM mensajes WHERE id = :id');
    $mensajesConsulta->bindParam(':id', $results['id']);
    $mensajesConsulta->execute();
    $_SESSION['mensajes'] = "0";
?>

<table class="table table-borderless">
        <thead>
            <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
<?php
   while($row=$mensajesConsulta->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>";
    if($row['destinatario']==0){
        echo "<th scope='col'><div class='panel panel-default'><div class='panel-body'><h4>".$row['mensaje']."</h4></div><div class='panel-footer'>Enviado el: ".$row['fechaEnvio']."</div></div></th><th scope='col'></th>";
    }else{
        echo "<th scope='col'></th><th scope='col'><div class='panel panel-default'><div class='pull-right'><div class='panel-body'><h4>".$row['mensaje']."</h4></div><div class='pull-right'><div class='panel-footer'>Enviado el: ".$row['fechaEnvio']."</div></div></div></div></th>";
    }
    echo "</tr>";
} 
?>
</tbody>
</table>
<div class="form-group">
<form name="message" action="home.php" method="POST">
        <input id="entradaTexto" name="usermsg" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" />
        <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</div>
<script>

</script>
