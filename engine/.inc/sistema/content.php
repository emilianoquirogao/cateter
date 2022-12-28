<?php
$page_id = "";
$page_id = $_GET['page_id'];
 if ($page_id == "" || !$page_id){
	 header('Location: index.php?page_id=home');}

$module = 'engine/.inc/modules/' . $page_id . '.php';

if (file_exists($module))
	include($module);
 else
	 {header('Location: index.php?page_id=home');}
?>