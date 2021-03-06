<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <link href="./styles/ar-page.css" rel="stylesheet" type="text/css" />
    <link href="./styles/loader.css" rel="stylesheet" type="text/css" />
    <link
      href="./styles/components/footer-modal.css"
      rel="stylesheet"
      type="text/css"
    />
    <link href="./styles/style.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap core CSS -->
<link href="./dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <script src="dist/js/jquery-3.1.1.min.js"></script>
    <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
    <!-- we import arjs version without NFT but with marker + location based support -->
    <script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/donmccurdy/aframe-extras@v6.1.1/dist/aframe-extras.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=UA-173558179-3"
    ></script>
     <script>
function taima() {
  setTimeout(function(){
      var botones = document.getElementById("botonera");
      botones.classList.toggle("displayhide");}, 2000);
      }
</script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }

      gtag("js", new Date());
      gtag("config", "UA-173558179-3");
    </script>
    <style>

    .displayhide {
  display: none;
}

</style>
  </head>

  <!-- https://arjs-cors-proxy.herokuapp.com/https://raw.githack.com/AR-js-org/AR.js/master/aframe/examples/image-tracking/nft/trex/scene.gltf -->
  <body style="margin: 0px; overflow: hidden" onload="taima()">
   
<?php
  if(isset($_SESSION['valid'])) {     
    include("parts/dbQueries.php");
    $dbQueries = new dbQueries;         
    $result = $dbQueries->Query("SELECT * FROM users");
    $pin_user = $_SESSION['valid'];
  ?>
     <a-scene
      embedded
      arjs
      vr-mode-ui="enabled: false"
      light="defaultLightsEnabled: false"
      renderer="antialias: true; logarithmicDepthBuffer: true; colorManagement: true; sortObjects: true; colorManagement: true;
      physicallyCorrectLights: true;"
    >
      <a-assets timeout="30000">
        <a-asset-item id="model1" src="./assets/models/new/CosentyxS1.gltf">
        </a-asset-item>

        <a-asset-item id="model2" src="./assets/models/new/CosentyxS2.gltf">
        </a-asset-item>

        <a-asset-item id="model3" src="./assets/models/new/CosentyxS3.gltf">
        </a-asset-item>

        <a-asset-item id="model4" src="./assets/models/new/CosentyxS4.gltf">
        </a-asset-item>

        <a-asset-item id="model5" src="./assets/models/new/CosentyxS5.gltf">
        </a-asset-item>

        <a-asset-item id="model6" src="./assets/models/new/CosentyxS6.gltf">
        </a-asset-item>

        <a-asset-item id="model7" src="./assets/models/new/CosentyxS7.gltf">
        </a-asset-item>

        <a-asset-item
          id="audio1"
          src="./assets/sounds/step-1.mp3"
          response-type="arraybuffer"
        ></a-asset-item>

        <a-asset-item
          id="audio2"
          src="./assets/sounds/step-2.mp3"
          response-type="arraybuffer"
        ></a-asset-item>

        <a-asset-item
          id="audio3"
          src="./assets/sounds/step-3.mp3"
          response-type="arraybuffer"
        ></a-asset-item>

        <a-asset-item
          id="audio4"
          src="./assets/sounds/step-4.mp3"
          response-type="arraybuffer"
        ></a-asset-item>

        <a-asset-item
          id="audio5"
          src="./assets/sounds/step-5.mp3"
          response-type="arraybuffer"
        ></a-asset-item>

        <a-asset-item
          id="audio6"
          src="./assets/sounds/step-6.mp3"
          response-type="arraybuffer"
        ></a-asset-item>

        <a-asset-item
          id="audio7"
          src="./assets/sounds/step-7.mp3"
          response-type="arraybuffer"
        ></a-asset-item>
      </a-assets>
      <a-marker markerhandler preset='custom' type='pattern' url='assets/pattern.patt'>
        <a-entity
          id="model3D"
          position="0 0 0"
          scale="0.500 0.500 0.500"
          animation-mixer
          gltf-model="#model1"
        ></a-entity>
        <a-entity
          light="intensity: 4; castShadow: true; type: point"
          position="0.055 4.294 0.009"
          data-aframe-default-light=""
          aframe-injected=""
        ></a-entity>
        <a-entity
          light="intensity: 4; castShadow: true; type: point"
          position="-2.395 0.829 -0.252"
          data-aframe-default-light=""
          aframe-injected=""
        ></a-entity>
        <a-entity
          light="intensity: 4; castShadow: true; type: point"
          position="1.789 1.372 -0.242"
          data-aframe-default-light=""
          aframe-injected=""
        ></a-entity>
        <a-entity
          light="intensity: 4; castShadow: true; type: point"
          position="-0.09469 1.372 -2.60061"
          data-aframe-default-light=""
          aframe-injected=""
        ></a-entity>
        <a-entity
          light="intensity: 4; castShadow: true; type: point"
          position="-0.09469 1.372 2.53395"
          data-aframe-default-light=""
          aframe-injected=""
        ></a-entity>
        <a-entity id="sound" sound="src: #audio1" autoplay="false"></a-entity>
      </a-marker>
      <a-entity camera></a-entity>
    </a-scene>

 

    <div
      onclick="toggleModal()"
      id="footerModal"
      class="footerModalbg hideModal"
    >
      <div class="footerModal">
        <img src="./assets/logos/novartis-new-logo-old.png" />
        <p>
          Novartis de Colombia S.A. Calle 93B No. 16-31. PBX 654 44 44. Bogot??,
          D.C. Novartis de Colombia S.A. Novartis Pharma, AG de Basilea, Suiza.
          ?? = Marca registrada. Mayor informaci??n en el Departamento Medico de
          Novartis de Colombia S.A. Tel. 6544444. Material exclusivo para uso de
          pacientes. No se autoriza la grabaci??n o toma de fotograf??as del
          material y tampoco difusi??n por medios no autorizados por Novartis.
          Para mayor informaci??n consultar la informaci??n completa para la
          prescripci??n de Cosentyx (en la palabra Cosentyx debe haber un link
          que redirija a la sucinta que adjunt?? en el correo) Fecha de
          aprobaci??n: XXXXXX. Fecha de caducidad: XXXXXX. C??digo de aprobaci??n
          P3: XXXXXX. Si desea reportar un evento adverso ingrese al siguiente
          link: https://www.report.novartis.com/es o a trav??s del correo
          electr??nico: colombia.farmacovigilancia@novartis.com
        </p>
      </div>
    </div>

    <div class="stepTitle">
      <nav class="navbar navbar-dark header-bg" aria-label="First navbar example">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation" style="
    border: 0px;
">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#" style="text-align: center;"><div id="stepTitle" class="">

      
      <!-- <h2>Paso 1</h2> -->
    </div></a>
      <span type="" class="" data-bs-toggle="modal" data-bs-target="#modalSoporte">
<span type="" class="" data-bs-toggle="modal" data-bs-target="#modalSoporte">
<img class="img-fluid" src="./assets/logos/soporte-logo.png" alt="" style="
    width: 50px;
"></span></span>
      

      <div class="navbar-collapse collapse" id="navbarsExample01" style="">
<ul class="navbar-nav me-auto mb-2 custom-class-nav" style="">
<li class="nav-item">
<a class="nav-link active linavitem-a" aria-current="page" href="encuesta1.php">Dosis</a>
</li>
<li class="nav-item">
<a class="nav-link linavitem-ab" style="" href="historial.php">Historial</a>
</li>
</ul>
</div>
    </div>
  </nav>
    <p style="color:white;background: #4e3260; padding: 5px;">Recuerde apuntar siempre al marcador y tener el volumen al m??ximo</p>
    </div>

    

    <div id="loader" class="sk-chase">
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
    </div>

    



    <div class="modal fade"  id="modalSoporte" tabindex="-1" aria-labelledby="modalsoporte" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="
    padding-bottom: 0px;
">

        <h5 class="modal-title" id="modalsoporte" style="
    width: 100%;
"><span type="" class="" data-bs-toggle="modal" data-bs-target="#modalSoporte">
<img class="img-fluid" src="./assets/logos/soporte-logo.png" alt="" style="
    width: 50px;
"></span> Linea de soporte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="
    padding-top: 0px;
    margin-top: -45px;
    margin-right: -15px;
"></button>
      </div>
      <div class="modal-body" style="
    font-size: 18px;
    font-weight: 600;
">
        ??Quiere comunicarse con un representante de Sanitas para resolver cualquier duda?

        
      </div>
      <div class="container" style="
    text-align: center;
    padding-bottom: 15px;
"><button class="btn btn-danger" style="
    width: 90%;
">Llamar</button></div>
      
      
    </div>
  </div>
</div>
    <div class="footer-image">
      <div class="container">
    <div class="row displayhide" id="botonera">
      <div class="col- text-center" style="width: 50%">  <a onclick="timeOutPrevModel()"><button type="button" class="btn btn-outline-danger"><i class="fas fa-arrow-left"></i> Anterior</button></a>
    </div>
    <div class="col- text-center" style="width: 50%; margin-left: -2%" id="animation">
      <a onclick="timeOutNextModel()"><button type="button" class="btn btn-outline-danger">Siguiente <i class="fas fa-arrow-right"></i></button>
    </a>
</div>
  </div>
  <br>

  <div class="progress">
        <div class="progress-bar bg-danger" id="progress" style="background-color: #ab1862 !important;">
        </div>
        <span>Progreso</span>
    </div>
</div>
<br>
  
          <?php 
  } else {
    ?>
      <script>
        window.location.href = '/v2/unlockeduser'
      </script>
    <?php
  }
  ?>
<?php include 'parts/footerAr.php'; ?>
</div>
    <script src="dist/js/bootstrap.bundle.min.js"></script>
    <script src="scripts/arHandler.js"></script>
    <script src=scripts/toggleModal.js"></script>
  </body>
</html>
