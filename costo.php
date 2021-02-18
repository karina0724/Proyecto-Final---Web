<?php 
session_start();
if($_SESSION['tipo_usuario'] != "administrador" ){
  header("Location: Login/form_login.php");
  
}else{
include('conexion/conexion.php');
include('conexion/config.php');
include('head.php');
include('admin.php');

date_default_timezone_set('America/Santo_Domingo');
$fecha= (new DateTime())->format('Y/m/d H:i:s');

if($_POST){
    extract($_POST);

    if(isset($_GET['edit'])){
        $sql= "update costos set costo= '{$costo}' where id= {$_GET['edit']}";
        conexion::execute($sql);

        $registro="INSERT INTO reporte_sistema (actividad, usuario_afectado, usuario_c, fecha) VALUES ('Costo Actualizado', 'Ninguno', '{$_SESSION['nombre']}','{$fecha}')";
        conexion::execute($registro);
        
    }
    else{

        $sql= "insert into costos(costo) values ($costo);";
        conexion::execute($sql);

        $registro="INSERT INTO reporte_sistema (actividad, usuario_afectado, usuario_c, fecha) VALUES ('Costo Establecido', 'Ninguno', '{$_SESSION['nombre']}','{$fecha}')";
        conexion::execute($registro);
    }
}
if(isset($_GET['edit'])){

    $sql= "select * from costos where id= {$_GET['edit']}";
    $rs= conexion::query_array($sql);

    if(count($rs) > 0){
        $data= $rs[0];
        $_POST= $data;
    }
}

?>


   <div style="margin-top:135px;">
        <h3 class="font-weight-bold">Costo de consulta</h3>
       
            <p class="text-secondary">Establecer costo de consulta</p><br>
            <form method="POST">
              
                 <label for="costo" class="font-weight-bolder">Costo</label>
                 <input type="number" name="costo" id="costo" class="form-control col-6" value="<?php echo $_POST['costo']; ?>" placeholder="Ingrese el monto de la consulta" required>
                 <br>
               <button type="submit" style="width:150px;" class="btn btn-primary font-weight-normal">Guardar</button>
            </form>
            <br>
              
            <table class="table col-6">
                <thead>
                   <tr>
                      <th>Costo de Consulta</th>
                      <th></th>
                   </tr>
                </thead>
                <tbody>
                   <?php 
                   
                     $sql= "select * from costos";
                     $rs= conexion::query_array($sql);
       
                     foreach($rs as $data){
                         echo "
                            <tr>
                               <td>RD$ {$data['costo']}</td>
                               <td><a class='btn btn-success' style='width:100px;' href='costo.php?edit={$data['id']}' >Editar</a></td>
                            </tr>
                         ";
                     }
                   
                   ?>
                </tbody>
            </table>
       
   </div>
<?php include('foot.php');
} ?>