<?php
  require '../../connections/database.php';

  $pregunta1=$_POST['pregunta1'];
  $pregunta2=$_POST['pregunta2'];
  $pregunta3=$_POST['pregunta3'];
  $nombre=$_POST['nombre'];
  $email=$_POST['email'];

  //Solicitar presupuesto
    $consulta = "INSERT INTO `cuestionario` (`id`, `primera`, `segunda`, `tercera`, `nombre`, `correo`, `leido`) VALUES ('', '', '', '', '', '', '')";
    $records = $conn->prepare($consulta);
    $records->execute([ 'NULL',$pregunta1,$pregunta2,$pregunta3,$nombre, $email,'0']);
    //header("Location: home.php#solicitudPresupuesto");
?>
