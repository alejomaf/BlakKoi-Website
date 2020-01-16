<?php
    session_start();
    require '../../connections/database.php';
    require '../../connections/getData.php';?>


<html>
    <head></head>
<body>

    
    <div id="datosPersonales">


        <!--Cambiar contraseña-->
<div class="modal fade" id="cambiarContrasena" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Cambiar contraseña</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
  
        
        <form action="modificarContrasena.php" method="POST" id=changePass>
          <div class="form-group">
            <label for="validationDefault01">Contraseña antigua</label>
            <input name="contAntigua" class="form-control" type="password" placeholder="Ingrese su contraseña antigua" required>
          </div>
          <div class="form-group">
            <label for="validationDefault01">Contraseña nueva</label>
            <input name="contNueva" class="form-control" type="password" placeholder="Ingrese su contraseña nueva" required>
          </div>
          <div class="form-group">
            <label for="validationDefault01">Repetir contraseña</label>
            <input name="contNuevaRepe" class="form-control"  type="password" placeholder="Confirme su contraseña antigua">
          </div>
  
  
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" form="changePass" value="Submit" class="btn btn-primary">Cambiar contraseña</button>
        </div>
      </div>
    </div>
  </div>


        <!--Cambiar usuario-->
<div class="modal fade" id="cambiarUsuario" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Cambiar correo electrónico</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
  
        
        <form action="modificarCorreo.php" method="POST" id=changeUser>
          <div class="form-group">
            <label for="validationDefault01">Correo electrónico antiguo</label>
            <input name="emailAntiguo" class="form-control" placeholder="Correo electrónico antiguo" required>
          </div>
          <div class="form-group">
            <label for="validationDefault01">Correo electrónico nuevo</label>
            <input name="emailNuevo" class="form-control" placeholder="Correo electrónico nuevo" required>
          </div>
  
  
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" form="changeUser" value="Submit" class="btn btn-primary">Cambiar correo electrónico</button>
        </div>
      </div>
    </div>
  </div>

  

        <nav class="navbar navbar-expand-lg navbar-light bg-light" >
            <a class="navbar-brand" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#cambiarContrasena">Cambiar contraseña</a>
            <a class="navbar-brand" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#cambiarUsuario">Cambiar usuario</a>
            </nav>    
    
</body>

</html>