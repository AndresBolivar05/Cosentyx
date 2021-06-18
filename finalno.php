<?php include "init.php";?>
<?php include "timeUser.php";?>   
<!DOCTYPE html>
<html lang="en">
<?php include 'parts/head.php'; 
// $title_site = "Encuesta de satisfaccion<br>
// Cosentyx® ";?>
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
<div>
<div class="stepCard">
<div class="container">
<div class="row">
<div class="col-md-12">
<!-- <h3>Gracias!</h3><img src="./assets/logos/check.png" class="img-fluid" style="padding:30%;padding-top:15px;padding-bottom:15px"> -->
<h4> Por favor consulte a su médico para más información antes de aplicarse consentyx® </h4><img src="./assets/images/cosentyxexp.png" class="img-fluid" style="padding:20%;padding-top:15px;padding-bottom:15px"></div>
</div>
</div>
</div>
</div>
<br>
<?php include 'parts/modalsoporte.php'; ?>
<div class="col-12" style="margin-left: 5%;">
  <a href="javascript: history.go(-1)">
      <button type="button" class="btn btn-outline-danger"><i class="fas fa-arrow-left"></i> Anterior</button>
    </a>
</div>
<!-- <div class="progress">
<div class="progress-bar bg-danger" role="progressbar" style="width:100%; background-color: #ab1862 !important;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Progreso</div>
</div> -->
</div>
</div>
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
</main>
<script>
  sessionStorage.clear();
</script>
<script src="./dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>