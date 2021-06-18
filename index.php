<?php include "init.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Cosentyx</title>
    <link href="./styles/style.css" rel="stylesheet" type="text/css">
    <link href="./styles/homestyle.css" rel="stylesheet" type="text/css">
    <link href="./dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <script>
        if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || 
            navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i)) {
            // window.location.href = 'https://cosentyx.sosadiazeventos.com/v2/';
        }else{
            window.location.href = 'https://cosentyx.sosadiazeventos.com/v2/message';
        }
    </script>    
</head>

<body>
    <main style="background:url(assets/images/fondo-1.png);background-size:cover">
        <div>
            <div class="p-5-custom">
                <div class="col-sm-10 mx-auto">
                    <div style="text-align:center">
                        <div class="container"><img src="assets/logos/novartis-new-logo.png">
                            <div class="subContainter" style="margin-bottom: 30%;">
                                <h2 class="text-center">Bienvenido a la herramienta de autoaplicación</h2>
                                <p>Ingrese el PIN asignado por su IPS</p>

                                <?php
include "parts/dbQueries.php";
if (isset($_POST['submit'])) {
    $user =  $_POST['pin'];

    if ($user == "") {
        echo "Error.";
        echo "<br/>";
        echo "<a href='/v2/' class='btn btn-primary mt-3'>Regresar</a>";
    } else {
        $dbQueries = new dbQueries;
        $dbQueries->Query("SELECT pin FROM users WHERE pin = '$user'");

        if($dbQueries->rowCount() > 0){
            $row  = $dbQueries->fetch();
            $pin = $row->pin;
            $_SESSION['valid'] = $pin;
            if ($_SESSION['valid'] === $user) {
                $_SESSION['timeUser'] = time();
                header("Location: /v2/encuesta1");
            }
        }else{
            echo "Pin Invalido.";
            echo "<br/>";
            echo "<a href='/v2/' class='btn btn-primary mt-3'>Regresar</a>";
        }
    }
} else {
    ?>
                                <form name="form1" method="post" action="">
                                    <input class="enterInput" type="number" name="pin" id="pin">
                                    <input type="submit" class="enterButton" name="submit" value="Entrar">
                                </form>
                                <?php
}
?>
                            </div>
                            <div class="containerr" style="">
                                <div class="footerr" style="">
                                    <div>
                                        <p style="font-size: .7rem;">
                                            Novartis de Colombia S.A. Calle 93B No. 16-31. PBX 654 44 44. Bogotá, D.C. Novartis de Colombia S.A. Novartis Pharma, AG de Basilea, Suiza. ® = Marca registrada. Material exclusivo para uso de pacientes. No se autoriza la grabación o toma de fotografías del material y tampoco difusión por medios no autorizados por Novartis. Fecha de aprobación: XXXXXX. Fecha de caducidad: XXXXXX. Código de aprobación P3: XXXXXX. 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
    </main>
    <script src="./dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>