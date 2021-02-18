<?php
session_start();
  if($_SESSION['tipo_usuario'] != "asistente"){
    header("Location: Login/form_login.php");
    
}else{
include('conexion/conexion.php');
include('conexion/config.php');
include('head.php');

if($_POST){
    extract($_POST);
    var_dump($cedula);

    $id= conexion::query_array("select * from pacientes where cedula={$cedula}");
    if($id[0]>0){
        header("Location: data.php?ced={$cedula}");
    
      }
      else{
        echo"
        <script>
        window.location='registro.php?reg={$cedula}';
        </script>
        ";
    }
    }
         

?>
<?php   include('assiten.php');?>

<div style="margin-top:135px;">
  <form method="POST"  >
  <h3 class="font-weight-bold mt-4 mb-4">Verificacion de Usuario</h3>
      <div class="form-group">
        <label for="cedula">Cédula</label>
        <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Escriba su cédula" required>
        <small class="form-text text-muted">Ingrese su cedula</small>
      </div>
      <button type="submit" class="btn btn-primary col-2 mt-3" >Enviar</button>
  </form>
</div>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>
<?include('foot.php'); }?>