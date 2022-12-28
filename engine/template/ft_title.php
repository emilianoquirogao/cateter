<?php
switch($_GET['page_id']){
	case "activos": echo "Pacientes Activos";break;
	case "agregarcontrol": echo "Nuevo Control";break;
	case "agregarpaciente": echo "Nuevo Paciente";break;
	case "buscarpaciente": echo "Buscar Paciente";break;
	case "estadisticas": echo "Estadísticas";break;
	case "historial": echo "Historial";break;
	case "home": echo "cateter";break;
	case "login": echo "Login";break;
	case "mispacientes": echo "Mis Pacientes";break;
	case "paciente": echo "Paciente";break;
	case "perfil": echo "Perfil";break;
	case "configuracion": echo "Configuración";break;
	case "alta": echo "Alta";break;
}
?>