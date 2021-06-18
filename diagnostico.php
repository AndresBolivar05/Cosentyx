<?php include "init.php";?>
<?php include "timeUser.php";?>   
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <?php include 'parts/head.php'; $title_site = "Diagnóstico y dosis";?>
      <style>
     
        [type=radio]:checked +img {
          border: 3px solid #4e3260 !important;
          border-radius: 5px;
          padding: 1px;
          zoom: 120%;
        }
      </style>
  </head>


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
                    <div class="container">
                      <div class="row"><span style="color:#000; font-size: .8rem"><b>Por favor indíquenos cuál es la patología por la que está usando Consentyx</b></span>
                        <br>
                      </div>
                      <br>
                      <div class="row">
                        <select class="form-control" id="pathology">
                          <option value="Psoriasis">Psoriasis</option>
                          <option value="Espondilitis Anquilosante">Espondilitis Anquilosante</option>
                          <option value="Artritis Psoriásica">Artritis Psoriásica</option>
                          <option value="Espondiloartritis axial no radiográfica">Espondiloartritis axial no radiográfica</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="stepsContainer">
                  <div class="stepCard">
                    <div class="container don">
                      <div class="row"><span style="color:#000">¿Qué dosis se está aplicando actualmente?</span></div>
                      <br>
                      <label>
                        <input type="radio" name="small" id="small" value="small"> <img src="./assets/images/150mg.png"></label>
                      <label>
                        <input type="radio" name="small" id="big" value="big"> <img src="./assets/images/300mg.png"></label>
                    </div>
                  </div>
                </div>
                <br>
                <div class="stepsContainer">
                  <div class="stepCard">
                    <div class="container">
                      <div class="row"><span style="color:#000">Después del período de impregnación, esta es la dosis número:</span>
                        <br>
                      </div>
                      <br>
                      <div class="row">
                        <select class="form-control" id="numberDosis">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="5">4</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="container">
                  <div class="row">
                    <div class="col- text-center" style="width:50%">
                      <a href="encuesta1">
                        <button type="button" class="btn btn-outline-danger"><i class="fas fa-arrow-left"></i> Anterior</button>
                      </a>
                    </div>
                    <div class="col- text-center" style="width:50%">
                      <a href="video">
                        <button type="button" class="btn btn-outline-danger" id="your-id">Siguiente <i class="fas fa-arrow-right"></i></button>
                      </a>
                    </div>
                  </div>
                </div>
                <br>
                <?php include 'parts/modalsoporte.php'; ?>
                  <div class="progress">
                    <div class="progress-bar bg-danger" style="width:6.66%; background-color: #ab1862 !important;"></div><span>Progreso</span></div>
                  <?php
                 } else { 
                  ?>
                  <script>
                    window.location.href = '/v2/unlockeduser'
                  </script>
                <?php
                  } ?>
              </div>
            </div>
            <?php include 'parts/footer.php'; ?>
          </div>
    </main>
    <script>
      let pathology   = document.getElementById('pathology'); 
      let numberDosis = document.getElementById('numberDosis'); 
      let radiosOne = document.querySelectorAll('input[type=radio][name=small]');
      radiosOne.forEach(radioOne => radioOne.addEventListener('change', appliedDose));

      let data = {};

      function appliedDose(){
        let applied_dose = document.querySelector("input[name='small']:checked");
        data.applied_dose = applied_dose.value;
      }

      eventListeners();
      function eventListeners(){
        data.pathology   = pathology.value;
        data.numberDosis = numberDosis.value;
        pathology.addEventListener('change', dataForm);
        numberDosis.addEventListener('change', dataForm);
      }

      function dataForm(){
        data.pathology = pathology.value;
        data.numberDosis = numberDosis.value;
      }

      document.getElementById("your-id").addEventListener("click", function () {
        sessionStorage.setItem('diagnostic', JSON.stringify(data));
      });

    </script>
    <script src="./dist/js/bootstrap.bundle.min.js"></script>
  </body>

  </html>