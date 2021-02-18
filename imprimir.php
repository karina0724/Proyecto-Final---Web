<?php
session_start();
if($_SESSION['tipo_usuario'] != "doctor" ){
  header("Location: Login/form_login.php");
  
}else{
include('estilo.php');
include('conexion/conexion.php');
include('conexion/config.php');


if($_GET['receta']){
    $doctor = $_SESSION['doctor'];
    $ok = explode(".",$_GET['receta']);
    $fecha  = $ok[0];
    $hora = $ok[1];
$sql = "SELECT * from consulta where fecha = '{$fecha}' and hora ='{$hora}';";
$data = conexion::query_array($sql);
echo "<div class='container'id= 'receta'>
<h1 class='text-primary'>Hospital 4 Pilares</h1></br>
<h6>fecha: {$data[0]['fecha']}</h6>
<h6>paciente: {$data[0]['paciente']}</h6></br>
<h4>DR: {$doctor}</h4>
<h5 class='text-bold'>Sintoma: {$data[0]['motivo']}</br>
<hr>
Receta: </br></h5>
<h7 id='lm'>{$data[0]['receta']}</h7>
<hr>

</div>"
;
echo "<script>window.print();</script>";
} }
?>
