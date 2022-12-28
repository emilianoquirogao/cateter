<?php
$id_paciente = $_GET['pac_id'];
$residente = $_SESSION['user']['id'];
$diuresis = isset($_POST['diuresis']) ? $_POST['diuresis'] : null ;
$prurito = isset($_POST['prurito']) ? $_POST['prurito'] : null ;
$nauseas = isset($_POST['nauseas']) ? $_POST['nauseas'] : null ;
$vomitos = isset($_POST['vomitos']) ? $_POST['vomitos'] : null ;
$dolor = isset($_POST['dolor']) ? $_POST['dolor'] : null ;
$deambulacion = isset($_POST['deambulacion']) ? $_POST['deambulacion'] : null ;
$infusion = isset($_POST['infusion']) ? $_POST['infusion'] : null ;
$rescate = isset($_POST['rescate']) ? $_POST['rescate'] : null ;
$observaciones = isset($_POST['observaciones']) ? $_POST['observaciones'] : null ;

	$sql  = "INSERT INTO control (";
	$sql .= "id_paciente,";
	$sql .= "diuresis,";
	$sql .= "prurito,";
	$sql .= "nauseas,";
	$sql .= "vomitos,";
	$sql .= "dolor,";
	$sql .= "deambulacion,";
	$sql .= "infusion,";
	$sql .= "rescate,";
	$sql .= "observaciones,";
	$sql .= "residente";
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
	$sql .= "?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('iiiiiiisssi', $id_paciente,$diuresis,$prurito,$nauseas,$vomitos,$dolor,$deambulacion,$infusion,$rescate,$observaciones,$residente);

if(!empty($_POST)){
	$stmt->execute();
	$stmt->close();
	header("Location: ".$url_paciente."&pac_id=".$id_paciente);
}
?>
        <div class="header-large-title">
            <h1 class="title">Pascual Pedro - 345B</h1>
        </div>
		
		<div class="section full mt-2 mb-2">
            <div class="wide-block pb-1 pt-1">

                <form action="<?php echo $url_agregarcontrol."&pac_id=".$id_paciente; ?>" method="post" class="needs-validation" novalidate>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="diuresis">Diuresis</label>
                            <select class="form-control form-select" id="diuresis" name="diuresis" required>
							    <option disabled selected value="">¿?</option>
                                <option value="2">Conservada, espontánea</option>
                                <option value="1">SV+</option>
                                <option value="0">Negativa</option>
                            </select>
                        </div>
                    </div>
					
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="prurito">Prurito</label>
                            <select class="form-control form-select" id="prurito" name="prurito" required>
							    <option disabled selected value="">¿?</option>
								<option value="0">Negativo</option>
                                <option value="1">Positivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="nauseas">Nauseas</label>
                            <select class="form-control form-select" id="nauseas" name="nauseas" required>
							    <option disabled selected value="">¿?</option>
                                <option value="0">Negativo</option>
                                <option value="1">Positivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="vomitos">Vomitos</label>
                            <select class="form-control form-select" id="vomitos" name="vomitos" required>
							    <option disabled selected value="">¿?</option>
                                <option value="0">Negativo</option>
                                <option value="1">Positivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="dolor">Dolor</label>
                            <input type="dolor" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="2" class="form-control" id="dolor" name="dolor" placeholder=" /10" min="0" max="10" required>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="deambulacion">Deambulación</label>
                            <select class="form-control form-select" id="deambulacion" name="deambulacion" required>
							    <option disabled selected value="">¿?</option>
                                <option value="0">Postrado</option>
                                <option value="1">Se sienta</option>
                                <option value="2">Se pone de pie</option>
                                <option value="3">Camina</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="infusion">Infusión</label>
                            <textarea id="infusion" name="infusion" rows="2" class="form-control" placeholder="Drogas en infusión contínua, dosis, velocidad de infusion, tiempo restante."></textarea>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="rescate">Rescate</label>
                            <textarea id="rescate" name="rescate" rows="2" class="form-control" placeholder="Drogas de rescate, dosis."></textarea>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="observaciones">Observaciones</label>
                            <textarea id="observaciones" name="observaciones" rows="4" class="form-control" placeholder="Complicaciones, TA/FC/satO2/drenajes si aplica, otras observaciones."></textarea>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
					<br>
					<button type="submit" class="btn btn-primary btn-lg btn-block"><i class="bi bi-plus"></i>CONTROL</button>

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