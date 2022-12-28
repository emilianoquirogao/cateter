<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($config_dbhost, $config_dbuser, $config_dbpass, $config_dbname);
if($conn->connect_error) die('Error de conexión.');
if(!$conn->set_charset("utf8")){
  printf("Error cargando el conjunto de caracteres utf8: %\n", $conn->error);
  exit();
}
?>