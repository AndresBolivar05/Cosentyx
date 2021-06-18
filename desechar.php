<?php include "init.php";?>
<?php include "timeUser.php";?>   
<!DOCTYPE html>
<html lang="en">
<?php include 'parts/head.php'; $title_site = "Desecho del autoinyector <br> usado Cosentyx® ";?>

  <body>
    <main>
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
              <div class="stepsContainer">
                <div class="stepCard">
                  <div class="container"><img src="./assets/images/desechar.png" alt="" style="width:50%;height:auto;max-width:400px"></div>
                </div>
              </div>
              <div>
                <div class="stepCard">
                  <div class="container"><span style="color:#000">Es importante <b>desechar el aplicador</b> en un lugar seguro. Antes de depositarlo en la basura, introdúzcalo en un contenedor plástico con la tapa cerrada</span></div>
                </div>
              </div>
              <br>
              <div class="container">
                <div class="row">
                  <div class="col- text-center" style="width:50%">
                    <a href="fotopage">
                      <button type="button" class="btn btn-outline-danger"><i class="fas fa-arrow-left"></i> Anterior</button>
                    </a>
                  </div>
                  <div class="col- text-center" style="width:50%">
                    <a href="reaccion">
                      <button type="button" class="btn btn-outline-danger">Siguiente <i class="fas fa-arrow-right"></i></button>
                    </a>
                  </div>
                </div>
              </div>
              <br>
              <?php include 'parts/modalsoporte.php'; ?>
                <div class="progress">
                  <div class="progress-bar bg-danger" style="width:79.92%; background-color: #ab1862 !important;"></div><span>Progreso</span></div>
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