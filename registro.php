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

session_start();

if($_POST){
    extract($_POST);
   
  if(isset($_GET['reg'])){

    $insert= "INSERT INTO pacientes (cedula, nombre, apellido,fecha_nacimiento,tipo_sangre,telefono) VALUES ({$_GET['reg']}, '{$nombre}','{$apellido}','{$fecha}','{$sangre}','{$telefono}')";
    conexion:: execute($insert);

    $registro="INSERT INTO reporte_sistema (actividad, usuario_afectado, usuario_c, fecha) VALUES ('Paciente Insertado', '{$nombre}', '{$_SESSION['nombre']}','{$fecha}')";
    conexion::execute($registro);

    header("Location: data.php");
  }


}
   
?>
<?php include('assiten.php')?>
<div style="margin-top:135px;">
  <h2 class="text-center text-secondary">Registro de Pacientes</h2>
  <form method="POST" class="needs-validation" novalidate>
      <div class="form-group">
        <label for="cedula">Cédula</label>
        <input type="text" class="form-control" id="cedula" value="<?php echo $_GET['reg']; ?>" name="cedula" disabled required>
        <div class="valid-feedback"></div>
        <div class="invalid-feedback">Complete el campo</div>
      </div>
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba su nombre" required>
        <div class="valid-feedback"></div>
        <div class="invalid-feedback">Complete el campo</div>
      </div>
      <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Escriba su apellido" required>
        <div class="valid-feedback"></div>
        <div class="invalid-feedback">Complete el campo</div>
      </div>
      <div class="form-group">
        <label for="fecha">Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="fecha" name="fecha"  required>
        <div class="valid-feedback"></div>
        <div class="invalid-feedback">Complete el campo</div>
      </div>
      <div class="form-group">
        <label for="sangre" >Tipo de Sangre</label>
        <input type="text" class="form-control" id="sangre" name="sangre" placeholder="Escriba su tipo de sangre" required>
        <div class="valid-feedback"></div>
        <div class="invalid-feedback">Complete el campo</div>
      </div>
      <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Escriba su teléfono" required>
        <div class="valid-feedback"></div>
        <div class="invalid-feedback">Complete el campo</div>
      </div>
      <center><button type="submit" class="btn btn-primary mt-3" style="width:200px;">Enviar</button></center>
     
  </form>
  
</div>

<?include('foot.php'); }?>