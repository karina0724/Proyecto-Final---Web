<?php
session_start();
if($_SESSION['tipo_usuario'] != "asistente" ){
  header("Location: Login/form_login.php");
  
}else{

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Cumpleaños</title>
</head>
<body>
<?php include('assiten.php')?>
<div style="margin-top:135px;">
  <div class= "container m-5">
    <h2 class="text-center ">Cumpleaños por Mes</h2>
     <form  method="post">
    <div class="form-group">
              <label for="mes" class=" control-label font-weight-bold">Mes</label>      
                <select name="mes" class="form-control" id="mes">
                  <option value="">Seleccionar</option>
                  <option> 01</option>
                  <option > 02</option>
                  <option > 03</option>						  
                  <option > 04</option>
                  <option > 05</option>
                  <option> 06</option>
                  <option >07</option>
                  <option >08</option>
                  <option >09</option>
                  <option >10</option>
                  <option >11</option>
                  <option >12</option>
                </select>
      </div>
              <button type="submit" class="btn btn-primary mb-4" style="width:150px;">Buscar</button> 
              <button onclick="window.print();" class="btn btn-info mb-4" style="margin-right:720px;">Imprimir</button>
                <div id="calendar" class="col-centered">
                </div>
    </form>
  
   
          
               
				
           
		
      <table class="table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Fecha de Nacimiento</th>
              <th>Teléfono</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          
          include('conex/conex.php');
          include('conex/conx.php');
          if($_POST){
              extract($_POST);
        
          $consulta= conexion::query_arrayy("SELECT nombre, apellido, fecha_nacimiento, telefono FROM pacientes where fecha_nacimiento like '_____{$mes}%'");
          foreach($consulta as $data){
            echo"
            <tr>
              <td>{$data['nombre']}</td>
              <td>{$data['apellido']}</td>
              <td>{$data['fecha_nacimiento']}</td>
              <td>{$data['telefono']}</td>
            </tr>
            ";

          }
 
         
         

          }
 ?>
          </tbody>
      </table>
  </div>
</div>

</form>
</body>
</html>
        <? } ?>