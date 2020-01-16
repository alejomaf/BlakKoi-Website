<?php
  session_start();
  require '../../connections/database.php';
  require '../../connections/getData.php';

    
    $mensajesConsulta = $conn->prepare('SELECT id, mensaje, destinatario, fechaEnvio, leido FROM mensajes WHERE id = :id');
    $mensajesConsulta->bindParam(':id', $_GET['id']);
    $mensajesConsulta->execute();

    if (!empty($_POST['usermsg'])) {
        $insercionMsg="INSERT INTO `mensajes` (`idMensaje`, `id`, `mensaje`, `asunto`, `destinatario`, `fechaEnvio`, `leido`) 
        VALUES ('', :id, :mensaje, '', '0', :fecha, '0')";
        $sql = "INSERT INTO mensajes (id, mensaje, destinatario, fechaEnvio, leido) VALUES (:id, :mensaje, 0, GETDATE(), 0)";
        $stmt = $conn->prepare($insercionMsg);
        $fecha=date('Y-m-d H:i:s');
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':id', $_POST[user_id]);
        $stmt->bindParam(':mensaje', $_POST['usermsg']);
        $stmt->execute();
        //AQUI HABRÍA QUE HACER UN LOAD
        header("Location: ../userAdmin/mensajeUsuario.php?id=".$_POST[user_id]);
      }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">

<!-- Cargamos el scrip de jQuery para poder realizar inserciones de codigo seguras-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../../scripts/scriptGeneral.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../styles/estiloVistaPrincipal.css">
</head>


<!--Cuerpo-->
<body id="backgroundImages">
  <div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				
	  		<h1><a href="home.php" class="logo"><img src="../../images/logoSinLetrasCircular.png"
    style="max-width:100%;"></a></h1>
        <ul id="cambioActivo" class="list-unstyled components mb-5">

                <li class="active"><a href="home.php">Gestión de usuarios</a></li>
                <li class="boton"><a  href="#gestPort" onclick="cargarAdm('#gestionPortfolio');">Gestión del portfolio y modificar información del inicio</a></li>
                <li class="boton"><a href="#gestBlog" onclick="cargarAdm('#gestionarBlog');">Gestionar blog</a></li>
                <li class="boton"><a href="#mensajes" onclick="cargarCont('mensajes.php');">Mensajes</a></li>
                <li class="boton"><a class="btnSpe" href="../../connections/logout.php">Cerrar sesión</a></li>
        </ul>

    	</nav>
      <div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>


    <!--Principio del square-->

        
        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
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
            if($row['destinatario']==1){
                echo "<th scope='col'><div class='panel panel-default'><div class='panel-body'><h4>".$row['mensaje']."</h4></div><div class='panel-footer'>Enviado el: ".$row['fechaEnvio']."</div></div></th><th scope='col'></th>";
            }else{
                echo "<th scope='col'></th><th scope='col'><div class='panel panel-default'><div class='pull-right'><div class='panel-body'><h4>".$row['mensaje']."</h4></div><div class='pull-right'><div class='panel-footer'>Enviado el: ".$row['fechaEnvio']."</div></div></div></div></th>";
            }
            echo "</tr>";
        } 
        ?>
        </tbody>
        </table>
        <div class="form-group" style="position:relative;">
        <form name="message" action="mensajeUsuario.php" method="POST">
                <input id="entradaTexto" name="usermsg" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" />
                <input type="hidden" value="<?php echo $_GET['id']?>" name="user_id" />
                <div class='pull-right'><button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        </div>
        </div>
        
    
</div>


<!--FIN del square-->
  </div>
  
  <p id="user"><?php printf($results["email"]);?></p>
</div>

<script src="../../scripts/finalPagina.js"></script>
<script>

function scrollDown() {
    var elem = document.getElementById('content');
    elem.scrollTop = elem.scrollHeight;
    var input = document.getElementById('entradaTexto');
    input.focus();
    input.select();
}
scrollDown();



</script>
</body> 
</html>

