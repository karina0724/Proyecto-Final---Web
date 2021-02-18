<?php 

$mensaje= array();
$txt= "";
if($_POST){
   $txt= $_POST['servidor'].';'.$_POST['usuario'].';'.$_POST['clave'].';'.$_POST['bd'];
   $datos= explode(';',$txt);
   $ok= true;
   if(count($datos) != 4){
       $mensaje[]= "Por favor, revise los datos ingresados. Debe ingresar 4 datos.";
       $ok= false;
   }

   if($ok){
       $link= mysqli_connect($datos[0],$datos[1],$datos[2]);

       if($link == false){
           $mensaje[]= "Revise los datos de la conexion.";
       }
       /*else if(isset($_GET['crear'])){
        ?>
        <h1>Crear Administrador</h1>
        <form method="post" >
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username" id="username">
        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena" id="contrasena">
        <input type="hidden" name="permiso" value = "1">
        <button type= "submit">Registrar</button>
        </form>
        
        <?php
       }*/
       else{
           $sql= "create database {$datos[3]}";
           mysqli_query($link, $sql);

           mysqli_query($link, "use {$datos[3]}");

           $sql= "DROP TABLE IF EXIST `admin`;";
           mysqli_query($link, $sql);

           $sql= "CREATE TABLE `admin` (
            `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
            `apellido` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
            `user` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
            `pass` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
            `rol` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
          mysqli_query($link, $sql);

          $sql= "DROP TABLE IF EXIST `asistente`;";
          mysqli_query($link, $sql);

          $sql= "CREATE TABLE `asistente` (
            `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
            `apellido` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
            `user` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
            `pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
            `rol` varchar(70) COLLATE utf8mb4_general_ci NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
         mysqli_query($link, $sql);

         $sql= "DROP TABLE IF EXIST `citas`;";
         mysqli_query($link, $sql);

         $sql= "CREATE TABLE `citas` (
            `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `fecha` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
            `hora` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
            `duracion` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
            `paciente` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
            `doctor` varchar(150) COLLATE utf8mb4_general_ci NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
        mysqli_query($link, $sql);

        $sql= "DROP TABLE IF EXIST `consulta`;";
         mysqli_query($link, $sql);

         $sql= "CREATE TABLE `consulta` (
            `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `fecha` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
            `hora` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
            `duracion` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
            `paciente` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
            `doctor` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
            `motivo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
            `comentario` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
            `receta` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
            `costo` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
            `proxima_visita` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
        mysqli_query($link, $sql);

        $sql= "INSERT INTO `admin` (`nombre`, `apellido`, `user`, `pass`, `rol`) VALUES
        ('Ricardo', 'Montero Leonardo', 'ricardo@ricardo', '6720720054e9d24fbf6c20a831ff287e', 'administrador'),
        ('Mami', 'Montero Leonardo', 'mami@mami', 'fed8f5d6744128839ed7390f84268a78', 'administrador'),
        ('Gregory', 'Burgos', 'grego@grego', '4bb76b889a9e86b5d54fb11d1e4134d5', 'administrador');";
        mysqli_query($link, $sql);

        $sql= "DROP TABLE IF EXIST `costos`;";
         mysqli_query($link, $sql);

         $sql= "CREATE TABLE `costos` (
            `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `costo` int(11) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
        mysqli_query($link, $sql);

        $sql= "DROP TABLE IF EXIST `doctor`;";
         mysqli_query($link, $sql);

         $sql= "CREATE TABLE `doctor` (
            `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
            `apellido` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
            `user` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
            `pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
            `rol` varchar(70) COLLATE utf8mb4_general_ci NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
        mysqli_query($link, $sql);

        
        $sql= "DROP TABLE IF EXIST `pacientes`;";
         mysqli_query($link, $sql);

         $sql= "CREATE TABLE `pacientes` (
            `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `cedula` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
            `nombre` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
            `apellido` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
            `fecha_nacimiento` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
            `tipo_sangre` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
            `telefono` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
          ";
        mysqli_query($link, $sql);

        $sql= "DROP TABLE IF EXIST `reporte_sistema`;";
         mysqli_query($link, $sql);

         $sql= "CREATE TABLE `reporte_sistema` (
            `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `actividad` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
            `usuario_afectado` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
            `usuario_c` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
            `fecha` varchar(150) COLLATE utf8mb4_general_ci NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
          ";
        mysqli_query($link, $sql);

        

          $info= "
                <?php 

                define('DB_HOST', '{$datos[0]}');
                define('DB_USER', '{$datos[1]}');
                define('DB_PASS', '{$datos[2]}');
                define('DB_NAME', '{$datos[3]}');
          ";

          file_put_contents("conexion/config.php", $info);

          echo "
          <script>
             alert('Sistema Instalado...');
             window.location= 'index.php';
          </script>
          ";
       }
   }
}

$mensaje= implode("</ br>", $mensaje);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Instalador</title>
    <style>
        .asg_error{
            font-weight:700;
            color:#43F909;
        }
        
    </style>
</head>
<body>
    
   <div class="container">
        <div class="row mt-3">
          <div class="col mt-3">
               
                <h1 class="text-primary mt-4 text-center">Clínica 4 Pilares</h1>
               
                <h3 class="text-secondary">Instalador</h3>

                <p class="mb-4">Conexion a la Base de Datos </p>
                <!-- <p>Digite el servidor;usuario,clave,basededatos en ese orden separados por ";" </p> -->
                <form method="post">

                    <div class="form-group">
                      <label for="servidor" class="font-weight-bold">Nombre del servidor</label>
                      <input type="text" value="<?php echo $datos[0];?>" name="servidor" id="servidor" class="form-control" placeholder="Ingrese el servidor" required>
                    </div>
                    <div class="form-group">
                      <label for="usuario " class="font-weight-bold">Usuario</label>
                      <input type="text" value="<?php echo $datos[1];?>" name="usuario" id="usuario" class="form-control" placeholder="Ingrese el usuario" required>
                    </div>
                    <div class="form-group">
                      <label for="clave" class="font-weight-bold">Clave</label>
                      <input type="password" value="<?php echo $datos[2];?>" name="clave" id="clave" class="form-control" placeholder="Ingrese la clave">
                    </div>
                    <div class="form-group">
                      <label for="bd" class="font-weight-bold">Nombre de la base de datos</label>
                      <input type="text" value="<?php echo $datos[3];?>" name="bd" id="bd" class="form-control" placeholder="Ingrese el nombre de la base de datos" required>
                    </div>

                    <div class="asg_error">
                        <?php echo $mensaje;?>
                    </div>

                   <div class="mt-5 boton">
                       <center> <button type="submit" class="btn btn-primary" style="width:200px;">Instalar</button> </center>
                   </div>
                </form>
          </div> 
      </div>       
  </div>

</body>
</html>