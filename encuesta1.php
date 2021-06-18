<?php include "init.php";?>
<?php include "timeUser.php";?>   

<!DOCTYPE html>
<html lang="es">
<?php include 'parts/head.php'; 
$title_site = "Bienvenido a la autoaplicación <br> <img class='img-fluid' src='./assets/logos/logoblanco.png'  style='width: 150px;padding-bottom:10px;padding-top:5px;'>";?>
<body>
<main>

<?php
  if(isset($_SESSION['valid'])) {     
    include("parts/dbQueries.php");
    $dbQueries = new dbQueries;         
    $result = $dbQueries->Query("SELECT * FROM users");
    $pin_user = $_SESSION['valid'];
  ?>
<?php include 'parts/navbar-enc.php'; ?>
<div>
  
<div class="bg-light p-5-custom">
<div class="col-sm-10 mx-auto">
<div>
<div class="stepCard" style="text-align:left;box-shadow:none;color:#000"><b><span>Por favor conteste las siguientes preguntas antes de continuar:</b></span></div>
</div>
<form action="diagnostico" method="post" id="form-id">  
<div class="stepsContainer">
  <div class="stepCard" name="qOne">
    <p>¿Ha tenido fiebre en los últimos 3 días?</p>
    <ul class="donate-now">
        <li>
          <input type="radio" id="Si1" name="q1" value="0">
          <label for="Si1">Si</label>
        </li>
        <li>
          <input type="radio" id="No1" name="q1" value="1">
          <label for="No1">No</label>
        </li>
    </ul>
  </div>
</div>
<br>
<div class="stepsContainer">
<div class="stepCard" name="qTwo">
<p>¿Ha presentado síntomas de gripa en los últimos 3 días?</p>
<ul class="donate-now">
<li>
<input type="radio" id="Si2" name="q2" value="0">
<label for="Si2">Si</label>
</li>
<li>
<input type="radio" id="No2" name="q2"  value="1">
<label for="No2">No</label>
</li>
</ul>
</div>
</div>
<br>
<div class="stepsContainer">
<div class="stepCard" name="qThree">
<p>¿Se encuentra tomando algún tipo de antibiótico actualmente?</p>
<ul class="donate-now">
<li>
<input type="radio" id="Si3" name="q3" value="0">
<label for="Si3">Si</label>
</li>
<li>
<input type="radio" id="No3" name="q3"  value="1">
<label for="No3">No</label>
</li>
</ul>
</div>
</div>
<br>
<div class="stepsContainer">
<div class="stepCard" name="qFour">
<p>¿Tiene sarpullido donde normalmente se aplica Cosentyx?</p>
<ul class="donate-now">
<li>
<input type="radio" id="Si4" name="q4"  value="0">
<label for="Si4">Si</label>
</li>
<li>
<input type="radio" id="No4" name="q4"  value="1">
<label for="No4">No</label>
</li>
</ul>
</div>
</div>
<br>
<div class="container">
<div class="row">
<div class="col- text-center" style="width:50%">
<a href="/v2/">
  <button type="button" class="btn btn-outline-danger"><i class="fas fa-arrow-left"></i> Anterior</button>
</a>
</div>
<div class="col- text-center" style="width:50%">
  <button type="button" id="your-id"  class="btn btn-outline-danger" disabled>Siguiente <i class="fas fa-arrow-right"></i></button>
</a>
</form>
</div>
</div>
</div>
<br>
<?php include 'parts/modalsoporte.php'; ?>
<div class="progress">
<div class="progress-bar bg-danger" style="width:0; background-color: #ab1862 !important;"></div><span>Progreso</span></div>

</div>
</div>
<?php include 'parts/footer.php'; ?>
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
</main>

<script src="dist/js/quiz.js"></script>
<script src="./dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
