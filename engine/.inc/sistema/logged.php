<?php
    require_once("engine/.inc/common.php"); 
    if(empty($_SESSION['user'])) 
    { 
        header("Location: ".$url_login); 
        die("Redirecting to ".$url_login); 
    }
?>