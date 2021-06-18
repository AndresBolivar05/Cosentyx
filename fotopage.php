<?php include "init.php";?>
<?php include "timeUser.php";?>   
<!DOCTYPE html>
<html lang="en">
<?php $title_site = "Registro aplicación <br>Cosentyx®";

include 'parts/head.php';
 ?>


<style>
  #my_camera {
    padding: 0;
    width: 240px;
    height: 320px;
    margin-top: 10px !important;
  }

  .displayhide {
  display: none;
  }

/* .shutter {
  background: 0;
  margin-left: 20%;
  border: 1px solid #ababab;
  border-radius: 50%;
  margin-right: 2%;
  width: 50px;
  height: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 2.5%;
} */

</style>

</head>
<body>
<main style="text-align: center;">
    
<?php
  if(isset($_SESSION['valid'])) {     
    include("parts/dbQueries.php");
    $dbQueries = new dbQueries;         
    $result = $dbQueries->Query("SELECT * FROM users");
    $pin_user = $_SESSION['valid'];
  ?>

    <?php include 'parts/navbar.php'; ?>
      <div>
        <div class="bg-light p-5-custom" style="background:url(./assets/images/fondo-cosentux.png);background-size:cover;background-repeat:no-repeat;padding:0!important">
              <div class="col-sm-10 mx-auto" style="">
            <div class="container" style="padding:0;">
              <div class="row" style="margin: 0 auto">
                <div class="text-center" style="width: 80%; margin: 0 auto;">
                    <video id="webcam" autoplay playsinline style="width: 100% !important; height: 100% !important;"></video>
                </div>
                <div class="text-center" id="results" style="width: 80%; margin: 0 auto;"></div>
                <canvas id="canvas" style="display: none;"></canvas>
                <div class="row" style="z-index:9999;margin: 0px auto;">
                  <p style="width: 85%;text-align:justify;margin: 0 auto; line-height: 15px; font-size: .8rem">Con el fin de registrar su aplicación, por favor tome una foto del aplicador Cosentyx® usado.
                    <!-- <br>Cosentyx Usado</p> -->
                  <div class="col-md-12" style="display: flex; text-align:center;margin-bottom: 4%; justify-content: space-around; align-items: center;">
                    <button class="shutter" onClick="take_snapshot()" id="botonOne"><img class="img-fluiddd" style="width:60px;height:60px;margin-top:2px" src="./assets/logos/camera-logo.png"></button>
                    <button class="shutter" id="botonTwo"><img class="img-fluiddd" style="width:28px;height:28px;margin:2px auto" src="./assets/images/rotate.png" alt=""></button>
                    <button class="shutter displayhide" onClick="tomarotra()" id="botonreset"><img  class="img-fluiddd" style="width:28px;height:28px;margin:2px auto" src="./assets/images/arrow.png"></button>
                    <input class="displayhide" type=button value="Guardar Foto" onClick="saveSnap()" id="botonguardar">
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col- text-center" style="width:50%">
                  <a href="ar?paso=7">
                    <button type="button" class="btn btn-outline-danger"><i class="fas fa-arrow-left"></i> Anterior</button>
                  </a>
                </div>
                <div class="col- text-center" style="width:50%">
                  <a href="desechar" class="not-active" id="btnSiguiente">
                    <button type="button" class="btn btn-outline-danger" onClick="saveSnap()">Siguiente <i class="fas fa-arrow-right"></i></button>
                  </a>
                </div>
              </div>
            </div>
            <br>
            <?php include 'parts/modalsoporte.php'; ?>
            <div class="progress">
              <div class="progress-bar bg-danger" style="width:73.26%; background-color: #ab1862 !important;"></div><span>Progreso</span></div>
            <?php 
  } else {
    // echo "Solo Usuarios Registrados.<br/><br/>";
    // echo "<a href='index' class='btn btn-secondary' style='text-decoration: none;'>Inicio</a>";
    ?>
      <script>
        window.location.href = '/v2/unlockeduser'
      </script>
    <?php
  }
  ?>
          </div>
        </div>
      </div>
      <div>
        <?php include 'parts/footer.php'; ?>
      </div>
  </main>

<script type="text/javascript" src="https://unpkg.com/webcam-easy/dist/webcam-easy.min.js"></script>
<script src="./dist/js/demoCamara.js"></script>
<!-- <script src="./scripts/camara.js"></script> -->
<script src="./dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>