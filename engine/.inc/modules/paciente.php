<?php
$pac_id = $_GET['pac_id'];

$sql  = "SELECT * ";
$sql .= "FROM pacientes ";
$sql .= "WHERE ";
$sql .= "id LIKE ? ";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('i', $pac_id);
	$stmt->execute();
	$res = $stmt->get_result();
	$stmt->close();
	
$sql_control  = "SELECT * ";
$sql_control .= "FROM control ";
$sql_control .= "WHERE ";
$sql_control .= "id_paciente LIKE ? ";
$sql_control .= "ORDER BY fecha DESC";
	$stmt_control = $conn->prepare($sql_control);
	$stmt_control->bind_param('i', $pac_id);
	$stmt_control->execute();
	$res_control = $stmt_control->get_result();
	$stmt_control->close();
?>
<?php if($row = $res->fetch_assoc()): ?>
        <div class="section mt-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><span class="paciente_nombre"><?php echo $row['nombre']; ?></span> - <span class="paciente_cama"> <?php echo $row['cama']; ?></span></h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
						<span style="font-weight:bold;">Edad</span>: <?php echo $row['edad']; ?> años
					</p>
                    <p class="card-text">
						<span style="font-weight:bold;">App</span>: <?php echo $row['app']; ?>
					</p>
                    <p class="card-text">
						<span style="font-weight:bold;">Diagnóstico</span>: <span class="firstletterup"><?php echo $row['diagnostico']; ?></span>
					</p>
                    <p class="card-text">
						<span style="font-weight:bold;">Cirugía</span>: <span class="firstletterup"><?php echo $row['cirugia']; ?></span>
					</p>
                    <p class="card-text">
						<span style="font-weight:bold;">Intervención</span>: <span class="firstletterup"><?php echo $row['intervencion']; ?></span>
					</p>
                    <p class="card-text">
						<span style="font-weight:bold;">Drogas</span>: <span class="firstletterup"><?php echo $row['drogas']; ?></span>
					</p>
                    <p class="card-text">
						<span style="font-weight:bold;">Observación</span>: <span class="firstletterup"><?php echo $row['observaciones']; ?></span>
					</p>
                </div>
                <div class="card-footer">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th scope="col" style="position:sticky;top:0;z-index:2;">Fecha</th>
									<th scope="col">Diuresis</th>
									<th scope="col">Prurito</th>
									<th scope="col">N/V</th>
									<th scope="col">Dolor</th>
									<th scope="col">Movilización</th>
									<th scope="col" style="min-width:150px;">Infusion</th>
									<th scope="col" style="min-width:150px;">Rescate</th>
									<th scope="col">Observaciones</th>
									<th scope="col">Residente</th>
								</tr>
							</thead>
							<tbody>
<?php while($rowc = $res_control->fetch_assoc()): ?>
								<tr>
									<th scope="row" style="position:sticky;top:0;z-index:2;">
										<?php echo date_format(new DateTime($rowc['fecha']),'d/m/y H.i')."hs"; ?>
									</th>
									<td>
									<?php if($rowc['diuresis']=='0')echo "Negativa";elseif($rowc['diuresis']=='1')echo"SV+";elseif($rowc['diuresis']=='2')echo"+ Esp."; ?>
									</td>
									<td>
										<?php if($rowc['prurito']=='0')echo"-";else echo"+"; ?>
									</td>
									<td>
										<?php if($rowc['nauseas']=='0')echo"-";else echo"+"; ?>/<?php if($rowc['vomitos']=='0')echo"-";else echo"+"; ?>
									</td>
									<td>
										<?php echo $rowc['dolor']; ?>/10</td>
									<td>
										<?php if($rowc['deambulacion']=='0')echo "Postrado";elseif($rowc['deambulacion']=='1')echo"Se sienta en la cama";elseif($rowc['deambulacion']=='2')echo"Se para en el lugar";elseif($rowc['deambulacion']=='3')echo"Camina"; ?>
									</td>
									<td class="firstletteruptd">
										<?php if(!isset($rowc['infusion'])||$rowc['infusion']=="")echo "-"; else echo $rowc['infusion']; ?>
									</td>
									<td class="firstletteruptd">
										<?php if(!isset($rowc['rescate'])||$rowc['rescate']=="")echo "-"; else echo $rowc['rescate']; ?>
									</td>
									<td>
										<?php if(!isset($rowc['observaciones'])||$rowc['observaciones']=="")echo "-"; else{ ?>
										<button type="button" class="btn btn-icon btn-primary btn-sm" data-bs-toggle="modal"
											data-bs-target="#DialogBlockButton">
											<ion-icon name="eye-outline"></ion-icon>
										</button>
										<div class="modal fade dialogbox" id="DialogBlockButton" data-bs-backdrop="static" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Observaciones</h5>
													</div>
													<div class="modal-body firstletteruptd">
														<?php echo $rowc['observaciones'];?>
													</div>
													<div class="modal-footer">
														<div class="btn-list">
															<a href="#" class="btn btn-text-secondary btn-block" data-bs-dismiss="modal">CERRAR</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php } ?>
									</td>
									<td class="nombreresidente">
										<?php
												$residente = $rowc['residente'];
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
								</tr>
<?php endwhile; ?>
							</tbody>
						</table>
					</div>
					<a href="<?php echo $url_agregarcontrol."&pac_id=".$pac_id; ?>" type="button" class="btn btn-primary btn-lg btn-block"><i class="bi bi-plus"></i>CONTROL</a>
					<div style="height:20px;"></div>
<?php if($_SESSION['user']['id']==$row['residente']): ?>
					<div class="accordion" id="accordionExample3">
						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#accordion001">
									<i class="bi bi-gear-wide-connected"></i>
									Más Acciones
								</button>
							</h2>
							<div id="accordion001" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
								<div class="accordion-body">
									<a href="<?php echo $url_alta."&pac_id=".$pac_id; ?>" type="button" class="btn btn-secondary btn-lg btn-block">ALTA</a>
									<div style="height:10px;"></div>
									<a href="<?php echo $url_editarpaciente."&pac_id=".$pac_id; ?>" type="button" class="btn btn-secondary btn-lg btn-block">Modificar Datos</a>
									<div style="height:10px;"></div>
									<a href="<?php echo $url_eliminarpaciente."&pac_id=".$pac_id; ?>" type="button" class="btn btn-danger btn-lg btn-block">Eliminar Paciente</a>
								</div>
							</div>
						</div>
					</div>
<?php endif; ?>
                </div>
            </div>
        </div>
<?php endif; ?>