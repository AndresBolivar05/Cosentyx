<?php include "init.php";?>
<?php include "timeUser.php";?>   
<!DOCTYPE html>
<html lang="en">

<?php include 'parts/head.php'; 
$title_site = "Para esta experiencia<br>
Cosentyx® ";?>
</head>

<body>
  <main style="overflow:hidden;">
     <?php
  if(isset($_SESSION['valid'])) {     
    include("parts/dbQueries.php");
    $dbQueries = new dbQueries;         
    $result = $dbQueries->Query("SELECT * FROM users");
    $pin_user = $_SESSION['valid'];
  ?>
    <?php include 'parts/navbar.php'; ?>
    <div>
      <div class="bg-light p-5-custom">
        <div class="col-sm-10 mx-auto">
          <div>
            <div class="stepCard" style="text-align:left;box-shadow:none;color:#000"><b><span>Tenga encuenta las siguientes indicaciones:</b></span></div>
          </div>
          <div class="stepsContainer">
            <div>
              <div class="stepCard"><img class="img-fluid" src="./assets/logos/camera-logo.png" alt="">
                <p>Permita que esta aplicación utilice la cámara aceptando la alerta que saldrá en el siguiente paso</p>
              </div>
            </div>
          </div>
          <br>
          <div class="stepsContainer">
            <div style="margin-top: -7%;">
              <div class="stepCard"><img class="img-fluid" src="./assets/logos/marker-logo.png" alt="">
                <p>Con la cámara, apunte al marcador como si le fuera a tomar una foto para empezar la experiencia en realidad aumentada</p>
              </div>
            </div>
          </div>
          <br>
          <div class="stepsContainer">
            <div style="margin-top: -7%;">
              <div class="stepCard"><img class="img-fluid" src="./assets/logos/cosentyx-logo.png" alt="">
                <p>En la pantalla de su teléfono se mostrarán hologramas de los pasos de aplicación, trate de nunca desenfocar el marcador</p>
              </div>
            </div>
          </div>
          <br>
          <div class="stepsContainer">
            <div style="margin-top: -7%;">
              <div class="stepCard"><img class="img-fluid" src="./assets/logos/soporte-logo.png" alt="">
                <p>Contará con un botón de ayuda, este lo enviará a una llamada con una persona que resolverá sus dudas</p>
              </div>
            </div>
          </div>
          <br>
          <div class="container">
            <div class="row">
              <div class="col- text-center" style="width:50%">
                <a href="video">
                  <button type="button" class="btn btn-outline-danger"><i class="fas fa-arrow-left"></i> Anterior</button>
                </a>
              </div>
              <div class="col- text-center" style="width:50%">
                <a href="ar">
                  <button type="button" class="btn btn-outline-danger">Siguiente <i class="fas fa-arrow-right"></i></button>
                </a>
              </div>
            </div>
          </div>
          <br>
          <?php include 'parts/modalsoporte.php'; ?>
          <div class="progress">
            <div class="progress-bar bg-danger" style="width:19.98%; background-color: #ab1862 !important;"></div><span>Progreso</span></div>
           <?php 
  } else {
    ?>
      <script>
        window.location.href = '/v2/unlockeduser'
      </script>
    <?php
  }
  ?>
        </div>
      </div>
      <?php include 'parts/footer.php'; ?>
    </div>
  </main>
  <script src="./dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>