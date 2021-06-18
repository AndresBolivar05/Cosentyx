<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'parts/head.php'; $title_site = "Encuesta de satisfaccion<br> Cosentyx® "; ?>

  <body>
    <main>

<?php
  if(isset($_SESSION['valid'])) {     
    include("parts/dbQueries.php");
    $dbQueries = new dbQueries;         
    $result = $dbQueries->Query("SELECT * FROM users");
    $pin_user = $_SESSION['valid'];
  ?>

      <?php include 'parts/navbar.php' ?>
        <div>
          <div class="bg-light p-5-custom">
            <div class="col-sm-10 mx-auto">
              <div class="stepsContainer">
                <div class="stepCard">
                  <div class="container">
                    <div class="row"><span style="color:#000">¿Cómo califica esta herramienta según su experiencia?</span></div>
                    <br>
                    <label>
                      <input type="radio" name="testOne" value="1" > <img src="./assets/images/cal3.png" style="width:40px;height:40px;margin:15px;margin-top:0"></label>
                    <label>
                      <input type="radio" name="testOne" value="2"> <img src="./assets/images/cal2.png" style="width:40px;height:40px;margin:15px;margin-top:0"></label>
                    <label>
                      <input type="radio" name="testOne" value="3"> <img src="./assets/images/cal1.png" style="width:40px;height:40px;margin:15px;margin-top:0"></label>
                  </div>
                </div>
              </div>
              <br>
              <div class="stepsContainer">
                <div class="stepCard">
                  <div class="container">
                    <div class="row"><span style="color:#000">¿Esto facilitó la aplicación de su producto?</span></div>
                    <br>
                    <label>
                      <input type="radio" name="testTwo" value="1" > <img src="./assets/images/cal3.png" style="width:40px;height:40px;margin:15px;margin-top:0"></label>
                    <label>
                      <input type="radio" name="testTwo" value="2"> <img src="./assets/images/cal2.png" style="width:40px;height:40px;margin:15px;margin-top:0"></label>
                    <label>
                      <input type="radio" name="testTwo" value="3"> <img src="./assets/images/cal1.png" style="width:40px;height:40px;margin:15px;margin-top:0"></label>
                  </div>
                </div>
              </div>
              <br>
              <div class="stepsContainer">
                <div class="stepCard">
                  <div class="container">
                    <div class="row"><span style="color:#000">¿Utilizaria nuevamente esta herramienta para la aplicacion de Cosentyx?</span></div>
                    <br>
                    <label>
                      <input type="radio" name="testThree" value="1" > <img src="./assets/images/cal3.png" style="width:40px;height:40px;margin:15px;margin-top:0; border-radius: 50%;"></label>
                    <label>
                      <input type="radio" name="testThree" value="2"> <img src="./assets/images/cal2.png" style="width:40px;height:40px;margin:15px;margin-top:0; border-radius: 50%;"></label>
                    <label>
                      <input type="radio" name="testThree" value="3"> <img src="./assets/images/cal1.png" style="width:40px;height:40px;margin:15px;margin-top:0; border-radius: 50%;"></label>
                  </div>
                </div>
              </div>
              <br>
              <div class="container">
                <div class="row">
                  <div class="col- text-center" style="width:50%">
                    <a href="reaccion">
                      <button type="button" class="btn btn-outline-danger"><i class="fas fa-arrow-left"></i> Anterior</button>
                    </a>
                  </div>
                  <div class="col- text-center" style="width:50%">
                    <a href="final" id="fin">
                      <button type="button" class="btn btn-outline-danger" value="<?php echo $_SESSION['namePhoto'];?>">Finalizar <i class="fas fa-arrow-right"></i></button>
                    </a>
                  </div>
                </div>
              </div>
              <br>
              <?php include 'parts/modalsoporte.php' ?>
                <div class="progress">
                  <div class="progress-bar bg-danger" style="width:93.24%; background-color: #ab1862 !important;"></div><span>Progreso</span></div>
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
          <?php include 'parts/footer.php' ?>
        </div>
    </main>
    <script src="dist/js/data.js"></script>
    <script src="./dist/js/bootstrap.bundle.min.js"></script>
  </body>

</html>