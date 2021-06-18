<?php include "init.php";?>
<?php include "timeUser.php";?>   
<!DOCTYPE html>
<html lang="en">

<?php include 'parts/head.php'; 
$title_site = "Encuesta de Satisfacción<br>
Cosentyx® ";?>
  <link href="./styles/reaccionstyle.css" rel="stylesheet" type="text/css">
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
                <div class="row"><span style="color:#000" class="welcomeTitle"><b>Recuerde que presentar enrojecimiento en el área de la aplicación es normal.</b></span>
                  <br><span style="color:#000">En caso de presentar una reacción alérgica como es la imágenes inferiores, por favor consulte a su médico.</span>
                  <br>
                </div>
                <br>
              </div>
            </div>
          </div>
          <br>
          <div class="stepsContainer">
            <div class="stepCard">
              <div class="row">
                <div class="column"><img src="./assets/images/1.png" style="width:100%;height:auto;margin:5px" onclick="openModal(),currentSlide(1)" class="hover-shadow cursor"> <img src="./assets/images/2.png" style="width:100%;height:auto;margin:5px" onclick="openModal(),currentSlide(2)" class="hover-shadow cursor"></div>
                <div class="column"><img src="./assets/images/3.png" style="width:100%;height:auto;margin:5px" onclick="openModal(),currentSlide(3)" class="hover-shadow cursor"> <img src="./assets/images/4.png" style="width:100%;height:auto;margin:5px" onclick="openModal(),currentSlide(4)" class="hover-shadow cursor"></div>
              </div>
              <div id="myModal" class="modal"><span class="close cursor" onclick="closeModal()">&times;</span>
                <div class="modal-content">
                  <div class="mySlides">
                    <div class="numbertext">1 / 4</div><img src="./assets/images/1.png" style="width:100%;height:auto"></div>
                  <div class="mySlides">
                    <div class="numbertext">2 / 4</div><img src="./assets/images/2.png" style="width:100%;height:auto"></div>
                  <div class="mySlides">
                    <div class="numbertext">3 / 4</div><img src="./assets/images/3.png" style="width:100%;height:auto"></div>
                  <div class="mySlides">
                    <div class="numbertext">4 / 4</div><img src="./assets/images/4.png" style="width:100%;height:auto"></div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="container">
            <div class="row">
              <div class="col- text-center" style="width:50%">
                <a href="desechar">
                  <button type="button" class="btn btn-outline-danger"><i class="fas fa-arrow-left"></i> Anterior</button>
                </a>
              </div>
              <div class="col- text-center" style="width:50%">
                <a href="calificacion">
                  <button type="button" class="btn btn-outline-danger">Siguiente <i class="fas fa-arrow-right"></i></button>
                </a>
              </div>
            </div>
          </div>
          <br>
          <?php include 'parts/modalsoporte.php'; ?>
          <div class="progress">
            <div class="progress-bar bg-danger" style="width:86.58%; background-color: #ab1862 !important;"></div><span>Progreso</span></div>
          <?php 
  } else {
    echo "Solo Usuarios Registrados.<br/><br/>";
    echo "<a href='index'>Inicio</a>";
  }
  ?>
        </div>
      </div>
      <?php include 'parts/footer.php'; ?>
    </div>
  </main>
  <script>
    function openModal() {
      document.getElementById("myModal").style.display = "block"
    }

    function closeModal() {
      document.getElementById("myModal").style.display = "none"
    }

    function plusSlides(e) {
      showSlides(slideIndex += e)
    }

    function currentSlide(e) {
      showSlides(slideIndex = e)
    }

    function showSlides(e) {
      var n, l = document.getElementsByClassName("mySlides"),
        d = document.getElementsByClassName("demo"),
        o = document.getElementById("caption");
      for (e > l.length && (slideIndex = 1), 1 > e && (slideIndex = l.length), n = 0; n < l.length; n++) l[n].style.display = "none";
      for (n = 0; n < d.length; n++) d[n].className = d[n].className.replace(" active", "");
      l[slideIndex - 1].style.display = "block", d[slideIndex - 1].className += " active", o.innerHTML = d[slideIndex - 1].alt
    }
    var slideIndex = 1;
    showSlides(slideIndex);
  </script>
  <script src="./dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>