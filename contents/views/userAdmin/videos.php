<?php
  session_start();
  require '../../connections/database.php';
  require '../../connections/getData.php';

  $id=$_GET['id'];

  $consulta="SELECT * FROM videos_proyecto WHERE videos_proyecto.id_proyecto=".$id;
  $videos=$conn->prepare($consulta);
  $videos->execute();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">

<!-- Cargamos el scrip de jQuery para poder realizar inserciones de codigo seguras-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../../scripts/scriptGeneral.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../styles/estiloVistaPrincipal.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<!--Añadir video-->
<div class="modal fade" id="anadirVideo" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Modificar información</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">


      <form action="anadirVideo.php?id=<?php echo $id?>" method="POST" id=editVideo>
        <div class="form-group">
          <label for="validationDefault01">Título del video</label>
          <input name="titulo" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="validationDefault01">Enlace</label>
          <input name="enlace" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="validationDefault01">Descripción del video</label>
        <textarea name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="editVideo" value="Submit" class="btn btn-primary">Añadir video</button>
      </div>
    </div>
  </div>
</div>


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
                <li class="boton"><a class="btnSpe" href="../../connections/logout.php">Cerrar sesión</a></li>
        </ul>

    	</nav>
      <div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
          
    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
                <a class="navbar-brand"  type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#anadirUsuario">Añadir usuario</a>
                <a class="navbar-brand" href="eliminarUsuario.php?id=<?php echo $id?>">Borrar usuario</a>
          
                <a class="navbar-brand">Mandar mensaje</a>
                <a class="navbar-brand" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#anadirVideo">Añadir video</a>
                <a class="navbar-brand" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modificarUsuario">Modificar usuario</a>
                <a class="navbar-brand" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#crearProyecto">Crear proyecto</a>
</nav>    

<!-- Modal HTML -->


<?php
  echo "<div class='card-group'>";
  while($row = $videos->fetch(PDO::FETCH_ASSOC)){
      $video = explode("=", $row['enlace']);
      echo  "<div class='card'>
      <div class='embed-responsive embed-responsive-16by9' style='min-width: 300px'>
      <iframe src='https://www.youtube.com/embed/".$video[1]."'></iframe></div>
      <div class='card-body'>
        <h2 class='card-title'>".$row['tituloVideo']."</h2>
        <p class='card-text'>".$row['descripcionVideo']."</p>
      </div>
      <div class='card-body'>
      <a class='navbar-brand' type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#anadirVideo'>Editar video</a>
      <a href='#' class='card-link'>Borrar video</a>
        </div>
      </div>";
      }
      echo "</div>";
    
    ?>

<!--FIN del square-->
</div>
  
  <p id="user"><?php printf($results["email"]);?></p>
</div>

<script src="../../scripts/finalPagina.js"></script>

</body> 
</html>