<!DOCTYPE html>
<html lang="en">
<?php include 'parts/headDash.php'?>
<?php include "init.php";?>
<?php include "authorized.php";?>
<?php include "timeDash.php";?>
<body>

<nav class="header-bg">
    <div class="col-12 text-center" style="margin: -.5% auto">
        <p style="font-size: 1.7rem;" id="pin">Dashboard Mes</p>  
    </div>
    <div style="text-align: right;margin: -2% 8%;">
        <p style="font-size: 1.1rem;">
          <a href="/v2/dashboard" style="color: #ffffff; text-decoration: none; border: 2px solid #fff; padding: .5% 1%; margin-right: 1%">Dashboard</a>
          <a href="/v2/logoutDash" style="color: #ffffff; text-decoration: none; border: 2px solid #fff; padding: .5% 1%;">Cerrar sesion</a>
        </p>
    </div>
</nav>
<div class="container"> 
    <div class="d-flex justify-content-center mt-4">
        <input type="date" id="dateIni" onchange="getObjectIni(this);" style="border-color: #ab1862 !important">  
        <p style="margin: 0 1%;">HASTA</p>
        <input type="date" id="dateFin" onchange="getObjectFin(this);" style="border-color: #ab1862 !important">  
    </div>
    <div id="countApli" style="width: 15%;margin: 2% auto; border: 2px solid  #ab1862 !important"></div>
    <div class="row" style="margin: 0">
        <div class="col-6" id="applications"></div>
        <div class="col-6" id="applicationsPro"></div>
    </div>
</div>
<script src="dist/js/dashMonth.js"></script>
</body>
</html>