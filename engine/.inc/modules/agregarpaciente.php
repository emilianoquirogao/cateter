<?php
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null ;
$edad = isset($_POST['edad']) ? $_POST['edad'] : null ;
$cama = isset($_POST['cama']) ? $_POST['cama'] : null ;
$app = isset($_POST['app']) ? $_POST['app'] : null ;
$diagnostico = isset($_POST['diagnostico']) ? $_POST['diagnostico'] : null ;
$cirugia = isset($_POST['cirugia']) ? $_POST['cirugia'] : null ;
$intervencion = isset($_POST['intervencion']) ? $_POST['intervencion'] : null ;
$drogas = isset($_POST['drogas']) ? $_POST['drogas'] : null ;
$infusion = isset($_POST['infusion']) ? $_POST['infusion'] : null ;
$observaciones = isset($_POST['observaciones']) ? $_POST['observaciones'] : null ;
$residente = $_SESSION['user']['id'] ;
$activo = '1';

	$sql  = "INSERT INTO pacientes (";
	$sql .= "nombre,";
	$sql .= "edad,";
	$sql .= "cama,";
	$sql .= "app,";
	$sql .= "diagnostico,";
	$sql .= "cirugia,";
	$sql .= "intervencion,";
	$sql .= "drogas,";
	$sql .= "infusion,";
	$sql .= "observaciones,";
	$sql .= "residente,";
	$sql .= "activo";
	$sql .= ") VALUES (";
	$sql .= "?, ";
	$sql .= "?, ";
	$sql .= "?, ";
	$sql .= "?, ";
	$sql .= "?, ";
	$sql .= "?, ";
	$sql .= "?, ";
	$sql .= "?, ";
	$sql .= "?, ";
	$sql .= "?, ";
	$sql .= "?, ";
	$sql .= "?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('sissssssssii', $nombre,$edad,$cama,$app,$diagnostico,$cirugia,$intervencion,$drogas,$infusion,$observaciones,$residente,$activo);

if(!empty($_POST)){
	$stmt->execute();
	$stmt->close();
	header("Location: ".$url_activos);
}
?>
        <div class="header-large-title">
            <h1 class="title">Nuevo Paciente</h1>
        </div>
		
		
		
		
		<div class="section full mt-2 mb-2">
            <div class="wide-block pb-1 pt-1">

                <form action="<?php echo $url_agregarpaciente; ?>" method="post" class="needs-validation" novalidate>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="nombre">Nombre y Apellido</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre y apellido del paciente" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="edad">Edad</label>
                            <input type="number" class="form-control" id="edad" name="edad" placeholder="Edad del paciente" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="sexo">Sexo</label>
                            <select class="form-control form-select" id="sexo"  name="sexo" required>
                                <option value="" disabled selected></option>
                                <option value="raquidea">Masculino</option>
                                <option value="peridural">Femenino</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="cama">Cama</label>
                            <input type="text" class="form-control" id="cama" name="cama" placeholder="Cama del paciente" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="app">APP</label>
                            <input type="text" class="form-control" id="app" name="app" placeholder="Antecedentes patológicos">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="diagnostico">Diagnóstico</label>
                            <input type="text" class="form-control" id="diagnostico" name="diagnostico" placeholder="Diagnostico presuntivo / intraoperatorio" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="cirugia">Cirugía</label>
                            <input type="text" class="form-control" id="cirugia" name="cirugia" placeholder="Operacion realizada" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="intervencion">Intervención</label>
                            <select class="form-control form-select" id="intervencion" name="intervencion" required>
                                <option value="" disabled selected></option>
                                <option value="raquidea">Raquídea</option>
                                <option value="peridural">Peridural</option>
                                <option value="cateter">Cateter</option>
                                <option value="bloqueo">Bloqueo Periférico</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="drogas">Drogas</label>
                            <input type="text" class="form-control" id="drogas" name="drogas" placeholder="Drogas administradas en bolo y dosis" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="infusion">Infusión Contínua</label>
                            <textarea id="infusion" name="infusion" rows="2" class="form-control" placeholder="Drogas en infusión contínua, dosis, velocidad de infusion"></textarea>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="observaciones">Observaciones</label>
                            <textarea id="observaciones" name="observaciones" rows="4" class="form-control" placeholder="Complicaciones en la colocación / Otras observaciones"></textarea>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
					<br>
					<button type="submit" class="btn btn-primary btn-lg me-1 mb-1 btn-block">Agregar Paciente</button>

                </form>

            </div>
        </div>

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