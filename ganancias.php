<?php

session_start();
  if($_SESSION['tipo_usuario'] != "doctor" ){
    header("Location: Login/form_login.php");
    
}else{
include('conexion/conexion.php');
include('conexion/config.php');
include('head.php');
?>

<?php include('medico.php');?>

<div style="margin-top:135px;">

<h3 class="font-weight-bold" style="color:#1977cc;">Ganancias</h3>
   <br>
    <form method='post' class="form-inline">

      <div class="form-group col-5">
               <label for="fecha">Fecha</label>     
               <input type='date' name='fecha' id="fecha" class="form-control ml-sm-4 " >
               <input type ='submit' class='btn btn-info ml-4' style="width:125px;" value="Search" >
               
      </div>
    </form>
   <table class="table mt-4">
      <thead>
         <tr>
           <th class="text-dark">Fecha</th>
           <th class="text-dark">Ganacias</th>
         </tr>
      </thead>
      <tbody>
         <?php 
            if($_POST){
                
           extract($_POST);

            $sql= "select * from consulta where fecha like '{$fecha}%'";
            $data= conexion::query_array($sql);
            $total= "select sum(costo) from consulta where fecha like '{$fecha}%'";
            $totalito= conexion::query_array($total);
   
            foreach($data as $dato){
                echo "
                  <tr>
                     <td>{$dato['fecha']}</td>
                    <td>{$dato['costo']}</td>
                  </tr>
                ";
            }     
            echo "<tr> 
                   <th> Total</th>
                <th> {$totalito[0]['sum(costo)']}</th>
                </tr>";
        }
         ?>
      </tbody>
   </table>
</div>

<?include('foot.php'); }?>