<?php include "init.php";?>
<?php include "timeUser.php";?>   
<!DOCTYPE html>
<html lang="en">
<?php include 'parts/head.php'; 
$title_site = "Encuesta de satisfaccion<br>
Cosentyx® ";?>
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
                <div class="row">
                  <div id="historial"></div>

                  <!-- <div class="divhistorial">
                    <table class="table table-sm" style="margin-bottom:0">
                      <tbody>
                        <tr>
                          <td><img src="./assets/logos/yeslogo.png" alt="" style="width:15px;height:auto">Aplicada</td>
                          <td>11 de Abril</td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-sm" style="margin-bottom:0">
                      <tr>
                        <td style="background-color:#3c2052!important;color:#fff">Aplicada</td>
                      </tr>
                    </table>
                  </div>
                  <div class="divhistorial">
                    <table class="table table-sm" style="margin-bottom:0">
                      <tbody>
                        <tr>
                          <td><img src="./assets/logos/danger.png" alt="" style="width:15px;height:auto">No Aplicada</td>
                          <td>11 de Marzo</td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-sm" style="margin-bottom:0">
                      <tr>
                        <td style="background-color:#3c2052!important;color:#fff">No Aplicada</td>
                      </tr>
                    </table>
                  </div>
                  <div class="divhistorial">
                    <table class="table table-sm" style="margin-bottom:0">
                      <tbody>
                        <tr>
                          <td><img src="./assets/logos/yeslogo.png" alt="" style="width:15px;height:auto">Aplicada</td>
                          <td>11 de Febrero</td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-sm" style="margin-bottom:0">
                      <tr>
                        <td style="background-color:#3c2052!important;color:#fff">Aplicada</td>
                      </tr>
                    </table>
                  </div>
                  <div class="divhistorial">
                    <table class="table table-sm" style="margin-bottom:0">
                      <tbody>
                        <tr>
                          <td><img src="./assets/logos/yeslogo.png" alt="" style="width:15px;height:auto">Aplicada</td>
                          <td>11 de Enero</td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-sm" style="margin-bottom:0">
                      <tr>
                        <td style="background-color:#3c2052!important;color:#fff">Aplicada</td>
                      </tr>
                    </table>
                  </div> -->
                  <div class="col-12">
                    <a href="javascript: history.go(-1)">
                      <button type="button" class="btn btn-outline-danger"><i class="fas fa-arrow-left"></i> Anterior</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <?php include 'parts/modalsoporte.php'; ?>
          </div>
          <?php 
  } else {
    ?>
      <script>
        window.location.href = '/v2/unlockeduser'
      </script>
    <?php
  }
  ?>
          <?php include 'parts/footer.php'; ?>
        </div>
      </div>
    </div>
  </main>
  <script src="./dist/js/bootstrap.bundle.min.js"></script>
  <script src="dist/js/historial.js"></script>
</body>

</html>