<?php
$activo = '1';

$sql  = "SELECT * ";
$sql .= "FROM pacientes ";
$sql .= "WHERE ";
$sql .= "activo LIKE ? ";
$sql .= "ORDER BY cama DESC";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('s', $activo);
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();

?>
        <div class="header-large-title">
            <h1 class="title">Pacientes Activos</h1>
            <h4 class="subtitle"><br></h4>
        </div>

        <div class="section full mb-2">
            <div class="wide-block p-0">
                <div class="table-responsive table-activos">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="table-activos-nombre">Nombre</th>
                                <th scope="col" class="table-activos-cama">Cama</th>
                                <th scope="col" class="table-activos-intervencion">Intervención</th>
                                <th scope="col" class="table-activos-residente">Residente</th>
                                <th scope="col" class="table-activos-control">Control</th>
                                <th scope="col" class="table-activos-editar"></th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle;">
<?php
	while($row = $res->fetch_assoc()): 
?>
                            <tr>
                                <th scope="row" class="table-activos-nombre"><?php echo $row['nombre']; ?></th>
                                <td class="table-activos-cama table-activos-cama-uc"><?php echo $row['cama']; ?></td>
                                <td class="table-activos-intervencion"><?php echo $row['intervencion']; ?></td>
                                <td class="table-activos-residente">
<?php
										$residente = $row['residente'];
									$sql_residente  = "SELECT * ";
									$sql_residente .= "FROM usuarios ";
									$sql_residente .= "WHERE ";
									$sql_residente .= "id LIKE ? ";
										$stmt_residente = $conn->prepare($sql_residente);
										$stmt_residente->bind_param('i', $residente);
										$stmt_residente->execute();
										$res_residente = $stmt_residente->get_result();
										$stmt_residente->close();
									if($row_r = $res_residente->fetch_assoc()) echo $row_r['nombre']." ".$row_r['apellido'];
?>
								</td>
                                <td class="table-activos-control"><?php echo $row['fecha']; ?></td>
                                <td class="table-activos-editar">
									<a href="<?php echo $url_paciente."&pac_id=".$row['id']; ?>">
										<button type="button" class="btn btn-icon btn-primary me-1 mb-1">
											<i class="bi bi-pencil-square"></i>
										</button>
									</a>
								</td>
                            </tr>
<?php endwhile;	?>
                        </tbody>
                    </table>
                </div>
            </div>
			<!-- <div class="wide-block pt-2 pb-2">
				<button type="button" class="btn btn-primary btn-lg btn-block">NUEVO PACIENTE</button>
			</div> -->
			

        </div>