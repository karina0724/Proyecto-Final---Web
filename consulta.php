<!-- Vendor CSS Files -->
<?php
date_default_timezone_set('America/Santo_Domingo');
$fecha_ss= (new DateTime())->format('Y/m/d H:i:s');

session_start();
  if($_SESSION['tipo_usuario'] != "doctor" ){
    header("Location: Login/form_login.php");
    
}else{
include('conexion/conexion.php');
include('conexion/config.php');
include('medico.php');
  if(isset($_GET['paciente'])){
    $cita = explode(".", $_GET['paciente']);
    $paciente = $cita[1];
    $id_cita = $cita[0];
    $fechah = date("Y-m-d h:i:sa");
    $_SESSION['doctor'] = "Manuel";
    $doctor = $_SESSION['doctor'];
    if($_POST){
      extract($_POST);
      if($fechap != null){
        $sql = "INSERT INTO `citas`(`fecha`, `hora`, duracion, `paciente`, `doctor`) VALUES ('{$fechap}', '{$horap}',{$duracion},'{$paciente}','{$doctor}');";
        conexion::execute($sql);

        $registro="INSERT INTO reporte_sistema (actividad, usuario_afectado, usuario_c, fecha) VALUES ('Cita Agregada', '{$paciente}', '{$_SESSION['nombre']}','{$fecha_ss}')";
      conexion::execute($registro);
      }
      $sql = "INSERT INTO `consulta`(`fecha`, `hora`, `duracion`, `paciente`, `doctor`, `motivo`, `comentario`, `receta`, `costo`, `proxima_visita`)
       VALUES ('{$fechah}', '{$hora}', {$duracion},'{$paciente}','{$doctor}','{$motivo}', '{$comentario}','{$receta}', (select costo from costos),'{$fechap}');";
      conexion::execute($sql);

      $registro="INSERT INTO reporte_sistema (actividad, usuario_afectado, usuario_c, fecha) VALUES ('Consulta Agregada', '{$paciente}', '{$_SESSION['nombre']}','{$fecha_ss}')";
      conexion::execute($registro);

      if($imprimir == 1){
          echo "<script>window.open('imprimir.php?receta={$fechah}.{$hora}','Receta', 'width=550px,height=550px');</script>";
      }
    }

?>
<div class="container" style="background:#dce8e8; padding: 20px;width: 50%; margin-top:3%;">
<h2 class='text-dark'>Consulta</h2>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<form method='post'>
    <label for='motivo'>Motivo</label>
    <input type='text' class="form-control" name='motivo' id='motivo' placeholder='Motivo' required>
    <label for='comentario'>Comentario</label>
    <textarea  name='comentario' class="form-control" id='comentario' rows='1' cols="10" placeholder='Comentario'></textarea>
    <label for='receta'>Receta</label>
    <textarea  name='receta' id='receta'class="form-control" rows='3' cols="10" placeholder='Receta' required></textarea><br/>
    <div><label for="im">Imprimir receta</label>
    <input type="radio" id='im' name="imprimir" value='1'>
    <label for="nim">No imprimir receta</label>
    <input type="radio" id='nim' name="imprimir" value='2'></div>
    <input type='hidden' name='hora' id='hora'>
    <div class="card" style="width: 70%; margin-left:15%; padding:30px;">
    <label>Cita Proxima</label>
  <div class="row">
    <div class="col-6">
    <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">fecha</span>
  </div>
  <input type='date' name='fechap' class="form-control" id='fechap'>
</div></br>
    </div>
    <div class="col-3">
    <input type='time' name='horap' class="form-control" id='horap'>
    </div>
    <div class="col-3">
      <input type='number' name='duracion' class="form-control" id='duracion' min="1" max="4">
    </div>
  </div>
  </div><br/>
    <button class ='btn btn-info' type='submit'>Guardar Consulta</button>
</div>

</form>
<script>
  function addZero(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}
  var d = new Date();
  var hora = document.getElementById('hora');
  var s = addZero(d.getMinutes());
  hora.setAttribute("value", d.getHours()+":"+s);
</script>

<?php }
} ?>