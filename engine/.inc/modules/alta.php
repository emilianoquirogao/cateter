<?php
$pac_id = $_GET['pac_id'];
$res_id = $_SESSION['user']['id'];
$user_password = isset($_POST['password']) ? $_POST['password'] : "";
$activo = '0';
$alta='0';
$datosincorrectos = "0";
$notowner = '0';

$sql  = "SELECT * ";
$sql .= "FROM pacientes ";
$sql .= "WHERE ";
$sql .= "id LIKE ? ";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('i', $pac_id);
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();

$sqlu  = "SELECT * ";
$sqlu .= "FROM usuarios ";
$sqlu .= "WHERE ";
$sqlu .= "id LIKE ? ";
	$stmtu = $conn->prepare($sqlu);
	$stmtu->bind_param('i', $res_id);
	$stmtu->execute();
	$resu = $stmtu->get_result();
	$stmtu->close();

if(!empty($_POST)){
	if($user = $resu->fetch_assoc()){
		if($user['password']==$user_password){
			if($pac = $res->fetch_assoc()){
				if($pac['residente']==$res_id){
					$sql_alta = "UPDATE pacientes SET 
					activo = ? 
					WHERE id = ?";
					$stmt_alta = $conn->prepare($sql_alta);
						if ($conn->error) {
							try {   
								throw new Exception("MySQL error $conn->error <br> Query:<br> $sql_alta", $conn->errno);   
							} catch(Exception $e ) {
								echo "Error No: ".$e->getCode(). " - ". $e->getMessage() . "<br >";
								echo nl2br($e->getTraceAsString());
							}
						}
					$stmt_alta->bind_param('ii', $activo,$pac_id);
					$stmt_alta->execute();
					$stmt_alta->close();
					$conn->close();
					
					$alta='1';
				}else{
					$notowner = '1';
				}
			}
		}else{
			$datosincorrectos = "1";
		}
	}
}
?>
<?php if($notowner == '1'): ?>
<div class="section  mt-2">
	<div class="alert alert-outline-danger" role="alert">
		<h1 class="alert-title">ERROR</h1>
		<h3>Solo se puede realizar esta accion desde la cuenta donde se creo el registro.</h3>
	</div>
	<br>
	<button onclick="location.href='<?php echo $url_activos; ?>';" class="btn btn-primary btn-block btn-lg">VOLVER</button>
	</p>
</div>
<?php else: ?>
<?php if($alta!=='1'): ?>
<div class="login-form">
	<div class="section">
<?php if($pat = $res->fetch_assoc()):?>
		<h1>ALTA: <span class="paciente_nombre"><?php echo $pat['nombre'] ?></span></h1>
<?php endif; ?>
		<h4>Colocá tu contraseña para continuar</h4>
	</div>
	<div class="section mt-2 mb-5">
		<form action="<?php echo $url_alta."&pac_id=".$pac_id; ?>" method="post" class="needs-validation" novalidate>
			<?php if($datosincorrectos == "1"): ?>
			<div class="alert2 alert-danger m-b-0" role="alert">
			  Contraseña incorrecta.
			</div>
			<?php endif; ?>
			<div class="form-group boxed">
				<div class="input-wrapper">
					<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
					<i class="clear-input">
						<ion-icon name="close-circle"></ion-icon>
					</i>
				</div>
			</div>
			<button type="submit" class="btn btn-primary btn-block btn-lg">DAR DE ALTA</button>
		</form>
	</div>
</div>
<?php // endif; ?>
<?php else: ?>
<div class="section  mt-2">
	<div class="alert alert-outline-primary" role="alert">
		<h4 class="alert-title">Paciente dado de alta.</h4>
		<p>Se ha quitado al paciente de las listas Activos y Mis Pacientes.</p>
		<p>Aun podes ver sus datos y controles en la sección de <a href="<?php echo $url_buscarpaciente; ?>">Búsqueda</a>.</p>
	</div>
	<br>
	<button onclick="location.href='<?php echo $url_activos; ?>';" class="btn btn-primary btn-block btn-lg">VOLVER</button>
	</p>
</div>
<?php endif; ?>
<?php endif; ?>

<script>
	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function () {
		'use strict';
		window.addEventListener('load', function () {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function (form) {
				form.addEventListener('submit', function (event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();
</script>