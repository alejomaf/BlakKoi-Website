<?php
  session_start();
  require '../../connections/database.php';
  require '../../connections/getData.php';

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script>
function mensajes(){
  $('#adminSquare').empty();
  setTimeout(function(){$('#adminSquare').load("selectorMensajes.php");
  },800);
}

$(".mail").click(mensajes);
</script>

<div id="gestionUsuarios">


          <div class="addremove"  class="options_container">
            <div class="añadirEliminarUsuario">
                <button class="button" onclick="document.getElementById('anadirUsuario').style.display='block'"><div class="plus"><img src="../../images/plus.png"></div></button>
                <button class="button1"><div class="trash"><img src="../../images/trash.png"></div></button>
          
                <button class="button" ><div class="mail" ><img src="../../images/mail.svg"></div></button>
                <button class="button1"><div class="addVideo"><img src="../../images/addVideo.png"></div></button>
                <button class="button1"><div class="addVideo"><img src="../../images/modifyUser.png"></div></button>
                <button class="button1"><div class="addVideo"><img src="../../images/createProject.png"></div></button>
                <button class="button">Actualizar contenido</button>
    
            </div>
          </div>    
        
        

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
                              <p><a href="home.php#gestUsua?id='.$row['id'].'" onclick="actualizarUsua('.$row['id'].')">' . $row['email'] . '</a></p>
                              </div>';
                              
                       }
                   else{
                        echo ' <div class="contenedor_claro">
                              <p><a href="home.php#gestUsua?id='.$row['id'].'" onclick="actualizarUsua('.$row['id'].')">' . $row['email'] . '</a></p>
                               </div>';
                } 
              }
            }
      ?>
  </div>
    
</div>



                  
                  