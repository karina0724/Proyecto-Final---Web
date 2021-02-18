<?php 
session_start();
if($_SESSION['tipo_usuario'] != "administrador"){
  header("Location: Login/form_login.php");
  
}else{
include('conexion/conexion.php');
include('conexion/config.php');

if($_POST){
    foreach($_POST as $valor){
        $valor= addslashes($valor);
    }

    
    extract($_POST);

    $pass= md5($contraseña);

    $sql= "INSERT INTO admin (nombre, apellido, user, pass, rol) VALUES ('{$nombre}', '{$apellido}', '{$correo}', '{$pass}', 'administrador')";
    conexion::execute($sql);

    header("Location:registro_admin.php");
}


include('head.php');
include('admin.php');   
?>

               <div style="margin-top:170px;">
                    
                    <h3 class="text-primary font-weight-bold text-center mb-4">Registro de Administradores</h3>
                   
                   <form method="POST" class="needs-validation" novalidate>
                      
                          <div class="form-group ">
                              <label for="nombre">Nombre</label>
                              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese su nombre" value="" required>
                              <div class="valid-feedback"></div>
                              <div class="invalid-feedback">Complete el campo.</div>   
                          </div>
                          <div class="form-group ">
                              <label for="apellido">Apellido</label>
                              <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese su apellido" required>
                              <div class="valid-feedback"></div>
                              <div class="invalid-feedback">Complete el campo para continuar</div>
                          </div>  
                         
                         <div class="form-group ">
                              <label for="correo">Correo</label>
                              <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingrese su correo" required>
                              <div class="valid-feedback"></div>
                              <div class="invalid-feedback">Complete el campo para continuar</div>
                         </div>
                        <div class="form-group ">
                             <label for="pasaporte">Contraseña</label>
                             <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Ingrese su contraseña" required>
                             <div class="valid-feedback"></div>
                             <div class="invalid-feedback">Complete el campo para continuar</div>
                        </div>
                        
                          <br>
                       <center><button type="submit" class="btn btn-primary" style="width:200px;">Guardar</button></center>
                       
                   <form>
               </div>

<?php include('foot.php'); }?>