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

<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">

<!-- Cargamos el scrip de jQuery para poder realizar inserciones de codigo seguras-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../../scripts/scriptGeneral.js"></script>

<script>
var userID;

function actualizarUsua(aux){
  $(".button1").attr("style","display:inline");
  userID=aux;
  $('#adminSquare').empty();
  setTimeout(function(){$('#adminSquare').load("proyectos.php");
  },800);
}

</script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../styles/estiloVistaPrincipal.css">
</head>


<!--Cuerpo-->
<body id="backgroundImages">
  <p id="user"><?php printf($results["email"]);?></p>
    <button class="closer" title="Close sidebar" onclick=aparecerBarra()>☰</button>

    <div id="bar">
        <div class="logo"><img src="../../images/logoSinLetrasCircular.png"
        style="max-width:100%;"></div>
  <div id="sidebar">
    <a class="active" href=#gestUsua onclick="cargarCont('gestionarUsuarios.php')">Gestión de usuarios</a>
    <a class="btn" href="#gestPort" onclick="cargarAdm('#gestionPortfolio');">Gestión del portfolio y modificar información del inicio</a>
    <a class="btn" href="#gestBlog" onclick="cargarAdm('#gestionarBlog');">Gestionar blog</a>
    <a class="btnSpe" href="../../connections/logout.php">Cerrar sesión</a>
  </div>
  </div>

  <div class="content">
    <div id="square">
      

    <!--FIN del square-->
    </div>
  </div>

  <!--Añadir usuario-->
  <div id="anadirUsuario" class="modal">
  
  <form class="box" action="#" method="POST">
      <img id="out" src="../../images/crossWhite.jpg" onclick="document.getElementById('anadirUsuario').style.display='none'">
      <h1>Registrar usuario</h1>
      <input name="email" type="textI" placeholder="Enter Email" name="uname" required>
      <input name="password" type="password" placeholder="Enter Password" name="psw" required>
      <input name="confirm_password" type="password" placeholder="Confirm Password">
      <input type="submit" name="Registrar" value="Añadir usuario">
    </form>
</div>


  <script>


      /*Inicializamos la primera vista*/
      cargarCont('gestionarUsuarios.php');

      /*Botones activos*/
  
      // Coge el cuadro del contenido
      var btnContainer = document.getElementById("sidebar");
  
      // Coge todos los botones de la clase boton dentro del div
      var btns = btnContainer.getElementsByClassName("btn");
  
      btnContainer.getElementsByClassName("active")[0].addEventListener("click", cambioBotones);
      // Va cambiando los botones
      for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", cambioBotones);
      }
      function cambioBotones(){
          var current = document.getElementsByClassName("active");
          current[0].className = current[0].className.replace("active", "btn");
            this.className += " active";}

        /*Cuadros emergentes*/

      // Coge el cuadro de inicio
      var modal = document.getElementById('anadirUsuario');
      
      // Cuando el usuario clicke fuera se cierra el cuadro
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>
      </script>
</body> 
</html>