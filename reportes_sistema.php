<?php 

session_start();
if($_SESSION['tipo_usuario'] != 'administrador'){
  header("Location: Login/form_login.php");
  
}else{

include('conexion/conexion.php');
include('conexion/config.php');
include('head.php');

?>

<?php include('admin.php');?>

<div style="margin-top:135px;">
   <h3 class="font-weight-bold" style="color:#1977cc;">Reportes del Sistema</h3>
   <br>
   
   <table class="table">
      <thead>
         <tr>
           <th class="text-dark">Fecha</th>
           <th class="text-dark">Actividad</th>
           <th class="text-dark">Usuario Operario</th>
           <th class="text-dark">Usuario Afectado</th>
         </tr>
      </thead>
      <tbody>
         <?php 
            
            $sql= "select * from reporte_sistema";
            $data= conexion::execute($sql);
   
            foreach($data as $dato){
                echo "
                  <tr>
                     <td>{$dato['fecha']}</td>
                     <td>{$dato['actividad']}</td>
                     <td>{$dato['usuario_c']}</td>
                     <td>{$dato['usuario_afectado']}</td>
                  </tr>
                ";
            }     
         
         ?>
      </tbody>
   </table>
</div>

<?include('foot.php'); }?>