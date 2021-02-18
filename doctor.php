<?php
session_start();
  if($_SESSION['tipo_usuario'] != "doctor" ){
    header("Location: Login/form_login.php");
    
}else{

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Laboratorio de medicos</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  
</head>

<body>

 
  

  <?php
  include('medico.php');
  ?>

  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Bienvenido al Hospital Los 4 Pilares</h1>
      <h2>Somos un equipo de diseñadores talentosos que crean sitios web con Bootstrap.</h2>
      <a href="#about" class="btn-get-started scrollto">EMPEZAR</a>
    </div>
  </section>

  <main id="main">

    
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>¿De donde somos?</h3>
              <p>
              Somos estudiantes el Instituto Tecnológico de Las Américas (ITLA) es una institución técnica de estudios superiores,
               fundada en el año 2000 por el Estado dominicano. 
               Única especializada en educación tecnológica en la República Dominicana. 
               Ha sido ganadora de diversos reconocimientos por el prestigio y calidad de sus servicios,
                entre ellos el Premio Nacional a la Calidad que otorga el Ministerio de Administración Pública del país,
                 convirtiéndose en la primera institución académica en recibir el galardón.desmostrando  lo aprendido
                del curso de programacion web
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Leer mas <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>MISIÓN</h4>
                    <p> Convertirnos en profesionales en las ciencias de las tecnologías.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Equipo de trabajo</h4>
                    <p><strong>1*</strong>Karina montero<br><strong>2*</strong>Ricardo miguel<br><strong>3*</strong>Gregory burgos<br><strong>4*</strong>Alfredo valenzuela</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Fecha de entrega </h4>
                    <p>07/08/2020</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>¿Qué hace un Médico?</h3>
            <p>Los Médicos previenen, diagnostican y tratan diversas enfermedades para mejorar la salud general de sus pacientes.
             En principio, se dividen en dos grandes grupos: Médicos Generales y Médicos Especialistas.</p>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Los Médicos Generales</a></h4>
              <p class="description">también conocidos como Médicos de Cabecera o Familiares, no se especializan en un área particular,
               por lo tanto, solo se encargan del diagnóstico 
              y tratamiento de enfermedades y trastornos generales y 
              remiten a los pacientes a Médicos Especialistas según la atención médica requerida. </p>
            </div>

          
            <div class="icon-box">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title"><a href="">Los Médicos Especialistas</a></h4>
              <p class="description"> pueden especializarse en medicina clínica, en la cual diagnostican y tratan enfermedades 
              y trastornos específicos especializados con su área de experticia, tales como cardiología, neumología, radiología u oncología,
               por lo que, en ocasiones, le dan asesorías a sus colegas. </p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Labores diarias</a></h4>
              <p class="description"><strong>1*</strong>Diagnosticar y tratar enfermedades, lesiones y demás trastornos de salud luego de realizar el respectivo chequeo médico y la evaluación física.
                                    <br><strong>2*</strong>Prescribir y administrar los tratamientos adecuados según el diagnóstico.
                                    <br><strong>3*</strong>Orientar y aconsejar a los pacientes y sus familiares.
                                    <br><strong>4*</strong>Llevar registros detallados y precisos de los pacientes, hacer seguimiento de cualquier cambio en su condición y hacer cualquier reemplazo pertinente en el tratamiento asignado de no mejorar su estado.</p>
            </div>

          </div>
        </div>

      </div>
    </section>

    
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="icofont-doctor-alt"></i>
              <span data-toggle="counter-up">85</span>
              <p>Doctores</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="icofont-patient-bed"></i>
              <span data-toggle="counter-up">18</span>
              <p>Departamentos</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="icofont-laboratory"></i>
              <span data-toggle="counter-up">8</span>
              <p>Laboratorios</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="icofont-award"></i>
              <span data-toggle="counter-up">150</span>
              <p>Puesto por servicio</p>
            </div>
          </div>

        </div>

      </div>
    </section>

    

    
    <section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title">
          <h2>Galeria</h2>
          <p>Somos una entidad especializada en velar por la salud de nuestros ciudadanos, Y como dijo una vez Hipócrates Las enfermedades no nos llegan de la nada. Se desarrollan a partir de pequeños pecados diarios contra la Naturaleza. Cuando se hayan acumulado suficientes pecados, las enfermedades aparecerán de repente.</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row no-gutters">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-1.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-2.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-3.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-4.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-5.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-6.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-7.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-8.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section>

    

        

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

  
  <script src="assets/js/main.js"></script>

</body>

</html>
<? } ?>