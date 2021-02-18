

<?php
session_start();

  if($_SESSION['tipo_usuario'] != "asistente" && $_SESSION['tipo_usuario'] != "administrador" && $_SESSION['tipo_usuario'] != "doctor"){
       header("Location: Login/form_login.php");
       
   }else{
include('medico.php');
?>
<h2 style="margin-left: 40%;font-weight: 700; font-size: 29px;" >Calendario</h3>
<div class="container" id='fondo'>
<div id='info-citas'>
</br>
<h3>Citas</h3>
<?php
include('estilo.php');
include('conexion/conexion.php');
include('conexion/config.php');
if($_POST){
  extract($_POST);
$sql = "SELECT * FROM CITAS WHERE fecha = '{$fechac}'";
    $datos= conexion::execute($sql);
    
  while($data = mysqli_fetch_array($datos)){
        echo "
        <p style='margin-left: 18px;'>Cita con {$data['paciente']}</br>
        a las {$data['hora']} con {$data['duracion']}</br>
        de duración</p>
        <button ><a href='consulta.php?paciente={$data['id']}.{$data['paciente']}'>Consultar</a></button>
        </br>
        ";
    }
    
}

?>
</div>
<div class="container"  style="width:50%;">

    <div class="row"  >
        <div class="col-sm">
          <button style="margin-left: 0;" class="boton" onclick="anterior()">&#10094;</button>
        </div>
        <div class="col-5">
          <h4 style="margin-left: 80%; color:white; text-align: center;" id="año"></h4>
        </div>
        <div class="col-sm">
          <button style="margin-left: 290%;" class="boton" onclick="siguiente()">&#10095;</button>
        </div>
    
        <form id="lascitas" method= 'post'>
            <input type='hidden' name='fechac' id='fechac'>
        </form>

    <table class="table table-borderless table-dark ">
        <thead>
        <tr>
            <th>Dom</th>
            <th>Lun</th>
            <th>Mar</th>
            <th>Mie</th>
            <th>Jue</th>
            <th>Vie</th>
            <th>Sab</th>
        </tr>
        </thead>
        <tbody id='dia'>
            
        </tbody>
    </table>
  </div>
</div>
<script>
     let month= new Date().getMonth();
    let year= new Date().getFullYear();
    let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Deciembre"];
    let lista = [];

    function addZero(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}
<?php 
$sql = "SELECT * FROM `citas`;";
$datos= conexion::execute($sql);
while ($dia = mysqli_fetch_array($datos)){
    $ok =  $dia['fecha'];
    echo "lista.push('{$ok}');";
}
?>
    mostrar(month, year);
    
    function siguiente(){
        if(month!=11){
        month++;
        }else{
            month=0;
            year++;
        }
        mostrar(month, year);
    }
    function anterior(){
        if(month!=0){
        month--;
        }else{
            month=11;
            year--;
        }
        mostrar(month, year);
    }
    function mostrar(month, year){
    document.getElementById("año").innerHTML = meses[month]+"<br/> "+year;
    let fecha = new Date(year, month, 1);
    let calendario = document.getElementById('dia');
    cantidad = 32 - new Date(year, month, 32).getDate();
    let d= 0;
    calendario.innerHTML = "";
    let x = 0;
    while(d<cantidad){
        let row = document.createElement("tr");
        j= 7;
        for(i= 0; i<j; i++){
            
            if(fecha.getDay() != 0 && d == 0){
                j=8;
                for(;i<fecha.getDay(); i++){
                    let dias = document.createElement("td");
                    let texto =  document.createTextNode("");
                    dias.appendChild(texto);
                    row.appendChild(dias);  
                }
                d++;
                
            }else if(fecha.getDay() == 0 && d == 0){
                d++;
                j=0;
            }
            else if(d>cantidad){
                break;
            }else{
                let dias = document.createElement("td");
                texto = document.createTextNode(d);
                dias.appendChild(texto);
                if(lista.includes(year+'-'+addZero(month+1)+'-'+addZero(d))){
                    dias.setAttribute("class", "cita_");
                    dias.addEventListener("click", function(){
                        document.getElementById("fechac").value = year+'-'+addZero(month+1)+'-'+addZero(parseInt(this.innerHTML));
                        document.getElementById("lascitas").submit();
                    });
                    x++;
                }
                row.appendChild(dias);
                d++;
            }
            
        }
        calendario.appendChild(row);
    }
}

</script>

<?php  }?>