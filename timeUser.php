<?php 
if((time() - $_SESSION['timeUser']) > 3600){
    session_destroy();
    header('Location: index');
}

?>