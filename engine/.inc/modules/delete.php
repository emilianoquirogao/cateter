<?php
$pac_id = $_GET['pac_id'];
$res_id = $_SESSION['user']['id'];

$sql  = "SELECT * ";
$sql .= "FROM pacientes ";
$sql .= "WHERE ";
$sql .= "id LIKE ? ";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('i', $pac_id);
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();

if($pac = $res->fetch_assoc()){
	if($pac['residente']==$res_id){
		$sqld  = "DELETE ";
		$sqld .= "FROM pacientes ";
		$sqld .= "WHERE ";
		$sqld .= "id LIKE ? ";
			$stmtd = $conn->prepare($sqld);
			$stmtd->bind_param('i', $pac_id);
			$stmtd->execute();
			$resd = $stmtd->get_result();
			$stmtd->close();
	}
}
?>