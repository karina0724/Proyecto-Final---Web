<?php 
session_start();
if($_SESSION['tipo_usuario'] != "asistente" ){
  header("Location: Login/form_login.php");
  
}else{
include('conexion/conexion.php');
include('conexion/config.php');
include('head.php');

?>
<?php   
include('assiten.php');
?>

<div style="margin-top:135px;">
  <h2 class="text-primary font-weight-bold text-center mb-5">Listado de Pacientes</h2>
  
     <table class="table">
        <thead>
          <tr>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha de Nacimiento</th>
            <th>Tipo de Sangre</th>
            <th>Teléfono</th>
          </tr>
        </thead>
        <tbody>
          <?php   
          $sql = '';
           if(isset($_GET['ced'])){
            $sql="select * from pacientes where cedula= {$_GET['ced']}";
           }else{
            $sql="select * from pacientes";
           }
           $rs= conexion::query_array($sql);
  
           foreach($rs as $data){
             echo "
                <tr>
                   <td>{$data['cedula']}</td>
                   <td>{$data['nombre']}</td>
                   <td>{$data['apellido']}</td>
                   <td>{$data['fecha_nacimiento']}</td>
                   <td>{$data['tipo_sangre']}</td>
                   <td>{$data['telefono']}</td>
                </tr>
             ";
           }
  
          ?>
  
        </tbody>
     </table>
</div>


<? include('foot.php'); }?>