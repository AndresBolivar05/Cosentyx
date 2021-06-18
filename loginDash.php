<!DOCTYPE html>
<html lang="en">
    <?php include 'parts/headDash.php'?>
    <?php include "parts/dbQueries.php";?>
    <?php include "init.php";?>
<body>
<nav class="header-bg">
  <div style="text-align: center; margin-top: -.5%">
    <p style="font-size: 1.5rem;">Login</p>
  </div>
</nav>
<div style="text-align: center;margin-top: 2%;">

<?php
if (isset($_POST['submit'])) {
    $nit =  $_POST['nit'];
    $password = $_POST['password'];

    if ($nit == "" || $password == "") {
        echo "Error.";
        echo "<br/>";
        echo "<a href='/v2/loginDash' class='btn btn-primary mt-3' style='padding: .5% 2%;background-color: #ab1862!important;border-color: #ab1862!important;'>Regresar</a>";
    } else {
        $dbQueries = new dbQueries;
        $dbQueries->Query("SELECT * FROM admin WHERE nit = '$nit' and password = '$password'");

        if($dbQueries->rowCount() > 0){
            $row  = $dbQueries->fetch();
            $nitDB = $row->nit;
            $passwordDB = $row->password;
            $_SESSION['admin'] = $nitDB;
            $_SESSION['timeAdmin'] = time();
            if ($_SESSION['admin'] === $nit && $passwordDB === $password) {
              header("location: dashboard");
            }
        }else{
            echo "Datos invalidos.";
            echo "<br/>";
            echo "<a href='/v2/loginDash' class='btn btn-primary mt-3' style='padding: .5% 2%;background-color: #ab1862!important;border-color: #ab1862!important;'>Regresar</a>";
        }
    }
} else {
    ?>
    <div class="container">
  <div class="row">
    <div style="margin: 0 auto;width: 100%;">
      <form class="form-dash" name="form1" method="post" action="">
        <div class="form-group" style="margin-bottom: 4%">
          <label for="nit" style="float: left; margin-bottom: 1%;">NIT</label>
          <input type="text" class="form-control" id="nit" name="nit">
        </div>
        <div class="form-group">
          <label for="nit" style="float: left; margin-bottom: 1%;">Contraseña</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div style="margin-top: 3%">
          <input style="padding: 2% 10%;background-color: #ab1862!important;border-color: #ab1862!important;" type="submit" class="btn btn-primary" name="submit" value="Ingresar">
        </div>
      </form>
    </div>
  </div>
</div>
    <?php
}
?>

</div>
</body>
</html>