<?php 
ini_set('display_errors', -1);
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/engine/.inc/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/engine/.inc/sistema/conn.php');
if($_GET['page_id']!=='login') include('engine/.inc/sistema/logged.php'); //Si no estas logeado no podes usar la app, te envida directamente al login. Si estas logeado es opuesto, no podes acceder a la pagina de login, te redirecciona a home (eso esta en la primera linea de login.php).
?>