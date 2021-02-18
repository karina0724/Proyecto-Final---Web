<?php
session_start();
if($_SESSION['tipo_usuario'] != "asistente"){
    header("Location: Login/form_login.php");
    
}else{
include('conexion/conexion.php');
include('conexion/config.php');
include('head.php');

date_default_timezone_set('America/Santo_Domingo');
  $fecha= (new DateTime())->format('Y/m/d H:i:s');

if($_POST){
    extract($_POST);
   
    $sql = "SELECT nombre from pacientes where cedula = '{$paciente}'";
    $nombre = conexion::query_array($sql);
    /*var_dump($nombre);
    exit();*/
    $cont= mysqli_num_rows(conexion::execute($sql));
    if($cont > 0){
        $sql = "INSERT INTO `citas`(`fecha`, `hora`, duracion, `paciente`, `doctor`) VALUES ('{$fecha}', '{$hora}',{$duracion},'{$nombre[0]['nombre']}','{$_SESSION['nombre']}');";
        conexion::execute($sql);

        $registro="INSERT INTO reporte_sistema (actividad, usuario_afectado, usuario_c, fecha) VALUES ('Cita agregada', '{$nombre[0]['nombre']}', '{$_SESSION['nombre']}','{$fecha}')";
        conexion::execute($registro);
    }else{
    header("Location: registro.php?reg={$paciente}");
    }

}
   
?>
<?php include('assiten.php')?>
<div style="margin-top:135px;">
  <h2 class="u-center text-secondary">Citas</h2>
  <form method="POST" class="needs-validation" novalidate>
      <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" id="fecha" name="fecha" required>
        <div class="valid-feedback"></div>
        <div class="invalid-feedback">Complete el campo</div>
      </div>
      <div class="form-group">
        <label for="hora">Hora</label>
        <input type="time" class="form-control" id="hora" name="hora" required>
        <div class="valid-feedback"></div>
        <div class="invalid-feedback">Complete el campo</div>
      </div>
      <div class="form-group">
        <label for="duracion">Duracion</label>
        <input type="number" class="form-control" id="duracion" name="duracion" max=4 min=1 required>
        <div class="valid-feedback"></div>
        <div class="invalid-feedback">Complete el campo</div>
      </div>
      <div class="form-group">
        <label for="paciente">Cedula del paciente</label>
        <input type="text" class="form-control" id="paciente" name="paciente"  required>
        <div class="valid-feedback"></div>
        <div class="invalid-feedback">Complete el campo</div>
      </div>
      <center><button type="submit" class="btn btn-primary mt-3" style="width:200px;">Enviar</button></center>
     
  </form>
  
</div>

<?include('foot.php'); }?>
