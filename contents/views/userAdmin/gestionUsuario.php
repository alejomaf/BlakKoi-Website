<?php
  session_start();
  require '../../connections/database.php';
  require '../../connections/getData.php';

  $id=$_GET['id'];

  $consulta="SELECT * FROM proyectos WHERE proyectos.id_usuario=".$id;
  $proyectos=$conn->prepare($consulta);
  $proyectos->execute();

  //Añadir usuario
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
    header("Location: ../userAdmin/home.php");
  }

  //Modificar información
  if (!empty($_POST['newemail']) || !empty($_POST['newpassword'])) {
    $sql = "UPDATE `users` SET `password` = :password,`email` = :email WHERE `users`.`id` = $id;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['newemail']);
    $password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    header("Location: ../userAdmin/home.php");
  }else if(!empty($_POST['newemail'])){
    $sql = "UPDATE `users` SET `email` = :email WHERE `users`.`id` = $id;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['newemail']);
    $stmt->execute();
    header("Location: ../userAdmin/home.php");
  }else if(!empty($_POST['newpassword'])){
    $sql = "UPDATE `users` SET `password` = :password WHERE `users`.`id` = $id;";
    $stmt = $conn->prepare($sql);
    $password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    header("Location: ../userAdmin/home.php");
  }


  
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


      <form action="anadirVideo.php?id=<?php echo $id?>" method="POST" id=addVideo>
        <div class="form-group">
          <label for="validationDefault01">Selecciona el proyecto</label>
          <select name="proyecto" class="form-control">
            <?php
            while($row = $proyectos->fetch(PDO::FETCH_ASSOC)){
              echo "<option>".$row['nombre']."</option>";
            }
            ?>
          </select>
        </div>
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
        <button type="submit" form="addVideo" value="Submit" class="btn btn-primary">Añadir video</button>
      </div>
    </div>
  </div>
</div>

<!--Modificar usuario-->
<div class="modal fade" id="modificarUsuario" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Modificar información</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">


      <form action="gestionUsuario.php" method="POST" id=changeData>
        <div class="form-group">
          <label for="validationDefault01">Nuevo correo electrónico</label>
          <input name="newemail" class="form-control" placeholder="Enter Email" name="uname" required>
        </div>
        <div class="form-group">
          <label for="validationDefault01">Nueva contraseña</label>
          <input name="newpassword" class="form-control" type="password" placeholder="Enter Password" name="psw" required>
        </div>

        
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="changeData" value="Submit" class="btn btn-primary">Aplicar cambios</button>
      </div>
    </div>
  </div>
</div>

<!--Crear proyecto-->
<div class="modal fade" id="crearProyecto" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Crear proyecto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">


      <form action="crearProyecto.php?id=<?php echo $id?>" method="POST" id=createProject>
        <div class="form-group">
          <label for="validationDefault01">Nombre del proyecto</label>
          <input name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="validationDefault01">Coste total</label>
          <input name="coste_total" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="validationDefault01">Descripción del proyecto</label>
        <textarea name="informacion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="createProject" value="Submit" class="btn btn-primary">Aplicar cambios</button>
      </div>
    </div>
  </div>
</div>

<!--Añadir usuario-->
<div class="modal fade" id="anadirUsuario" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Registrar usuario </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

      
      <form action="home.php" method="POST" id=addUser>
        <div class="form-group">
          <label for="validationDefault01">Correo electrónico</label>
          <input name="email" class="form-control" placeholder="Enter Email" name="uname" required>
        </div>
        <div class="form-group">
          <label for="validationDefault01">Contraseña</label>
          <input name="password" class="form-control" type="password" placeholder="Enter Password" name="psw" required>
        </div>
        <div class="form-group">
          <label for="validationDefault01">Repetir contraseña</label>
          <input name="confirm_password" class="form-control"  type="password" placeholder="Confirm Password">
        </div>


    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="addUser" value="Submit" class="btn btn-primary">Añadir usuario</button>
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
  $proyectos->execute();
  if($proyectos->rowcount() == 0){
    echo 'No hay proyectos activos';
  }else{   
    //window.history.pushState("", "", '/newpage');
    echo "<div class='card-group'>";
    while($row = $proyectos->fetch(PDO::FETCH_ASSOC)){
      $consultaAux="SELECT * FROM videos_proyecto WHERE videos_proyecto.id_proyecto=".$row['id_proyecto'];
      $numVideosAux=$conn->prepare($consultaAux);
      $numVideosAux->execute();
      $numVideos=$numVideosAux->rowcount();
      
        echo  "<div class='card' style='width: 20rem;'>
        <div class='card-body'>
          <h2 class='card-title'>".$row['nombre']."</h2>
          <p class='card-text'>".$row['informacion']."</p>
        </div>
        <ul class='list-group list-group-flush'>
          <li class='list-group-item'><b>Fecha de comienzo: </b>" .$row['fecha_inicio']. "</li>
          <li class='list-group-item'><b>Fecha de finalización: </b>" .$row['fecha_terminacion']. "</li>
          <li class='list-group-item'><b>Número de vídeos: </b>" .$numVideos. "</li>
        </ul>
        <div class='card-body'>
          <a href='videos.php?id=".$row['id_proyecto']."' class='card-link'>Ver vídeos</a>
          <a href='borrarProyecto.php?id=".$id."&id_proyecto=".$row['id_proyecto']."' class='card-link'>Borrar proyecto</a>
        </div>
        </div>";
        }
        echo "</div>";
    }
    
    ?>

<!--FIN del square-->
</div>
  
  <p id="user"><?php printf($results["email"]);?></p>
</div>

<script src="../../scripts/finalPagina.js"></script>

</body> 
</html>