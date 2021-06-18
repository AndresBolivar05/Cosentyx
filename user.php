<!DOCTYPE html>
<html lang="en">
<?php include 'parts/headDash.php' ?>
<?php include "init.php";?>
<?php include "authorized.php";?>
<?php include "timeDash.php";?>

<body>
<nav class="header-bg">
    <div class="col-12 text-center" style="margin: -.5% auto">
        <p style="font-size: 1.7rem;" id="pin"></p>
    </div>
    <div style="text-align: right;margin: -2% 1%;">
        <p style="font-size: 1.1rem;">
          <a href="/v2/dashboard" style="color: #ffffff; text-decoration: none; border: 2px solid #fff; padding: .5% 1%;">Dashboard</a>
          <a href="/v2/dashboardMonth" style="color: #ffffff; text-decoration: none; border: 2px solid #fff; padding: .5% 1%;">Dashboard Fechas</a>
          <a href="/v2/logoutDash" style="color: #ffffff; text-decoration: none; border: 2px solid #fff; padding: .5% 1%;">Cerrar sesion</a>
        </p>
    </div>
</nav>
<div class="container">
    <div class="row" id="applications"></div>
</div>
<script>
    let param = new URLSearchParams(location.search);
    let pinn = param.get('pin');
    let pin = document.getElementById('pin');
    pin.innerHTML = `Pagina de usuario ${pinn} (Historial de aplicaciones)`;
</script>
<script src="dist/js/user.js"></script>
</body>
</html>