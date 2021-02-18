<?php 
session_start();
if($_SESSION['tipo_usuario'] != "administrador"){
  header("Location: Login/form_login.php");
  
}else{

include('conexion/conexion.php');
include('conexion/config.php');
include('head.php');
include('admin.php');

  date_default_timezone_set('America/Santo_Domingo');
  $fecha= (new DateTime())->format('Y/m/d H:i:s');

    if($_POST){
        foreach($_POST as $valor){
            $valor= addslashes($valor);
        }
        extract($_POST);
        $pass = md5($pass);
       
        if(isset($_GET['edit'])){
            $varl= $_GET['edit'];
            $var = explode('/', $varl);
         
            $id= $var[1];
            $rol= $var[0];
            $sql="update $rol set nombre= '{$nombre}', apellido= '{$apellido}', user= '{$user}', pass= '{$pass}', rol= '{$tipo}' where id= $id";
            conexion::execute($sql); 

            $registro="INSERT INTO reporte_sistema (actividad, usuario_afectado, usuario_c, fecha) VALUES ('Usuario {$tipo} actualizado', '{$nombre} {$apellido} [ID: $id]', '{$_SESSION['nombre']}','{$fecha}')";
            conexion::execute($registro);

            if($tipo != $rol){
             $sql= "delete from $rol where id= $id";
             conexion::execute($sql);
           
             $sql= "INSERT INTO $tipo (nombre, apellido, rol, user, pass) VALUES ('{$nombre}', '{$apellido}','{$tipo}','{$user}','{$pass}')";
            conexion::execute($sql);
            }

            header("Location: gestionar_users.php");
        }
        else{ 
            $sql= "INSERT INTO $tipo (nombre, apellido, rol, user, pass) VALUES ('{$nombre}', '{$apellido}','{$tipo}','{$user}','{$pass}')";
            conexion::execute($sql);

            $registro="INSERT INTO reporte_sistema (actividad, usuario_afectado, usuario_c, fecha) VALUES ('Usuario {$tipo} creado', '{$nombre} {$apellido} [ID: $id]', '{$_SESSION['nombre']}','{$fecha}')";
            conexion::execute($registro);

            header("Location: users.php");

            $_POST['nombre']= '';
            $_POST['apellido']= '';
            $_POST['user']= '';
            $_POST['pass']= '';
        }
        

    }

if(isset($_GET['edit'])){

   $varl= $_GET['edit'];
   $var = explode('/', $varl);

   $id= $var[1];
   $rol= $var[0];
    
    $sql= "select * from $rol where id= $id";
    $rs = conexion::query_array($sql);

    if(count($rs) > 0){
        $data = $rs[0];
        $_POST= $data;
    }

}

?>
<div style="margin-top:135px;">
    
    <h3 class="text-center text-primary" style="font-weight:700;">Registro de Usuarios</h3><br>
    
        <form method="POST" class="needs-validation" novalidate>
                      
                      <div class="form-group ">
                          <label for="nombre">Nombre</label>
                          <input type="text" name="nombre" id="nombre" value="<? echo $_POST['nombre'];?>" class="form-control" placeholder="Ingrese su nombre" value="" required>
                          <div class="valid-feedback"></div>
                          <div class="invalid-feedback">Complete el campo.</div>   
                      </div>
                      <div class="form-group ">
                          <label for="apellido">Apellido</label>
                          <input type="text" name="apellido" value="<? echo $_POST['apellido'];?>" id="apellido" class="form-control" placeholder="Ingrese su apellido" required>
                          <div class="valid-feedback"></div>
                          <div class="invalid-feedback">Complete el campo para continuar</div>
                      </div>  
    
                      <div class="form-group ">
                          <label for="tipo">Tipo de Usuario</label>
                           <select name="tipo" id="tipo" class="form-control">
                            <option value=""><? echo $_POST['rol'];?></option>
                            <option value="doctor">Doctor</option>
                            <option value="asistente">Asistente</option>
                           </select>
                          <div class="valid-feedback"></div>
                          <div class="invalid-feedback">Complete el campo para continuar</div>
                      </div>  
            
                     <div class="form-group ">
                          <label for="correo">Correo</label>
                          <input type="email" class="form-control" value="<? echo $_POST['user'];?>" name="user" id="correo" placeholder="Ingrese su correo" required>
                          <div class="valid-feedback"></div>
                          <div class="invalid-feedback">Complete el campo para continuar</div>
                     </div>
                    <div class="form-group ">
                         <label for="pasaporte">Contraseña</label>
                         <input type="password" class="form-control" value="<? echo $_POST['pass'];?>" name="pass" id="contraseña" placeholder="Ingrese su contraseña" required>
                         <div class="valid-feedback"></div>
                         <div class="invalid-feedback">Complete el campo para continuar</div>
                    </div>
                    
                      <br>
                   <center><button type="submit" class="btn " style="width:200px; background:#1977cc; color:#fff;">Guardar</button></center>
                   
            </form>
    
</div>



<?php 
 include('foot.php'); }

?>