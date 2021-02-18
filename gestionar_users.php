<?php 
session_start();
if($_SESSION['tipo_usuario'] != "administrador" ){
  header("Location: Login/form_login.php");
  
}else{
include('conexion/conexion.php');
include('conexion/config.php');
include('head.php');
include('admin.php');    
?>

<div  style="margin-top:135px;">
  <nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand font-weight-bolder text-dark text-uppercase font">Consulta de Usuarios</a>
    <form class="form-inline" method="POST">    
        <select class="form-control mr-sm-2" name="usuario" >
              <option selected>Seleccione el tipo de usuario</option>
                  <option value="doctor">Doctor</option>
                  <option value="asistente">Asistente</option> 
          </select>
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
      </form>
  </nav>
  <br>
  <table class="table">
  
      <thead>
          <tr>
              <th class="text-primary">Nombre</th>
              <th class="text-primary">Apellido</th>
              <th class="text-primary">Tipo de Usuario</th>
              <th class="text-primary">Correo</th>
              <th class="text-primary">Contraseña</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
        <?php 
           if($_POST){
             extract($_POST);
            
             $sql= "select * from $usuario";
             $rs= conexion::query_array($sql);
    
             foreach($rs as $data)
             {
                echo"
                  <tr>
                     <td>{$data['nombre']}</td>
                     <td>{$data['apellido']}</td>
                     <td>{$data['rol']}</td>
                     <td>{$data['user']}</td>
                     <td>{$data['pass']}</td>
                     <td><a class='btn btn-secondary' style='width:100px;' href='users.php?edit={$data['rol']}/{$data['id']}'>Editar</a></td>
                  </tr>
                ";
             }
           }
  
        ?>
      </tbody>
  </table>
</div>

<?include('foot.php'); }?>