<?php
	if((time() - $_SESSION['timeAdmin']) > 3600){
        session_destroy();
        header('Location: loginDash');
    }
?>