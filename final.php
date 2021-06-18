<?php 
  include "init.php";
  include "timeUser.php";
  session_destroy();
  header('refresh: 25, url=index');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'parts/head.php'; 
// $title_site = "Finalizado";?>
</head>
<body>
<main>
<?php
  if(isset($_SESSION['valid'])) {
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
<h3>¡Gracias!</h3><img src="./assets/logos/check.png" class="img-fluid" style="padding:30%;padding-top:15px;padding-bottom:15px">
<h4>Por vivir la experiencia</h4><img src="./assets/images/cosentyxexp.png" class="img-fluid" style="padding:20%;padding-top:15px;padding-bottom:15px"></div>
</div>
</div>
</div>
</div>
<br>
<?php include 'parts/modalsoporte.php'; ?>
<div class="progress">
<div class="progress-bar bg-danger" role="progressbar" style="width:100%; background-color: #ab1862 !important;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Progreso</div>
</div>
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
<script src="./dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>