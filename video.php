<?php include "init.php";?>
<?php include "timeUser.php";?>   
<!DOCTYPE html>
<html lang="en">
<?php include 'parts/head.php'; 
$title_site = "Para esta experiencia<br> ";?>
</head>

<body>

<style>
  .player .vp-controls {
  position: absolute;
  bottom: 4em !important;
  }
</style>

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
          <div>
            <div>
              <div class="container">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe src="https://player.vimeo.com/video/540277974?title=0&byline=0&portrait=0" width="470" height="560" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="container">
            <div class="row" style="margin-left: 8%;">
              <div class="col- text-center" style="width:50%">
                <a href="diagnostico">
                  <button type="button" class="btn btn-outline-danger"><i class="fas fa-arrow-left"></i> Anterior</button>
                </a>
              </div>
              <div class="col- text-center" style="width:50%">
                <a href="welcome">
                  <button type="button" class="btn btn-outline-danger" style="margin-left: -45%;">Siguiente <i class="fas fa-arrow-right"></i></button>
                </a>
              </div>
            </div>
          </div>
          <br>
          <?php include 'parts/modalsoporte.php'; ?>
          <div class="progress" style="width: 62%;">
            <div class="progress-bar bg-danger" style="width:13.32%; background-color: #ab1862 !important;"></div><span>Progreso</span></div>
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
      <?php include 'parts/footerVideo.php'; ?>
    </div>
  </main>
  <script src="./dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>