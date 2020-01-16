<?php
  session_start();
  require '../../connections/database.php';
  require '../../connections/getData.php';

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

 ?>


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

    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
    <a class="navbar-brand"  type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#anadirUsuario">Añadir usuario</a>
    </nav>    

      <div id="adminSquare">
        <div id="titulo"><p><b>Lista de usuarios</b></p></div>
        <div class="grid-container">
          <?php
          $consulta="SELECT * FROM users";
          $records=$conn->prepare($consulta);
          $records->execute();
          $numero=0;
          $uno=1;
          if($records->rowcount() == 0){
            echo 'No hay usuarios';
            }
          if($records->rowcount() >0){
            while($row = $records->fetch(PDO::FETCH_ASSOC)){
                $numero=$numero + $uno;
                if(($numero % 2) == 0){
                    echo ' <div class="contenedor_oscuro">
                          <p><a href="gestionUsuario.php?id='.$row['id'].'">' . $row['email'] . '</a></p>
                          </div>';
                          
                    }
                else{
                    echo ' <div class="contenedor_claro">
                            <p><a href="gestionUsuario.php?id='.$row['id'].'">' . $row['email'] . '</a></p>
                            </div>';
            } 
          }
        }
      ?>
    </div>
    
</div>


<!--FIN del square-->
  </div>
  
  <p id="user"><?php printf($results["email"]);?></p>
</div>

<script src="../../scripts/finalPagina.js"></script>

</body> 
</html>