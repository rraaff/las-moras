<?php 
	header("Content-type: text/html; charset=utf-8");
	require("funcionesDB.php");
	require("boCheckLogin.php");
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		// Inicio conexion
		$connection = mysql_connect(DB_SERVER,DB_USER, DB_PASS) or die ("Problemas en la conexion");
		mysql_select_db(DB_NAME,$connection);
		
		$descripcion = $_POST['descripcion'];
		$inicio = $_POST['inicio'];
		$fin = $_POST['fin'];
		
		$descripcion = quote_smart($descripcion, $connection);
		$inicio = quote_smart($inicio, $connection);
		$fin = quote_smart($fin, $connection);
		
		$insertTicket = "INSERT INTO INSTANT_WIN (descripcion, inicio, fin) VALUES ($descripcion, $inicio, $fin)";
		$res = mysql_query($insertTicket,$connection);// or die ("Error en insert ".mysql_error()."\n".$query);
		
		mysql_close($connection);
	}
	
	// TODO estados, ganadores, etc
	$query = "SELECT IW.*, UNIX_TIMESTAMP(IW.FIN) FIN_UNIX, TI.ticket, SU.id systemUserID, SU.nombre || ' ' || SU.apellido Winner
		FROM INSTANT_WIN IW 
		LEFT JOIN TICKETS TI ON (IW.ticketID = TI.id) 		
		LEFT JOIN SYSTEMUSER SU ON (TI.systemUserID = SU.id)";
	$res = doSelect($query);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Las Moras</title>

<link type='text/css' href='css/jquery-ui-1.8.16.custom.css' rel='stylesheet' media='screen' />

<!-- Contact Form CSS files -->
<link type='text/css' href='css/sm_basic.css' rel='stylesheet' media='screen' />
<!-- IE6 "fix" for the close png image -->
<!--[if lt IE 7]>
<link type='text/css' href='css/sm_basic_ie.css' rel='stylesheet' media='screen' />
<![endif]-->
<!-- JS files are loaded at the bottom of the page -->
</head>
<body>

	<form action="boPremiosInstantaneos.php" name="altaIWForm" id="altaIWForm" method="POST">
		<table>
			<tr><td>Descripcion</td><td><input type="text" name="descripcion"></td></tr>
			<tr><td>Imagen</td><td><input type="file" name="imagen" id="imagen"></td></tr>
			<tr><td>Inicio</td><td><input type="text" name="inicio" id="inicio"></td></tr>
			<tr><td>Fin</td><td><input type="text" name="fin" id="fin"></td></tr>
			<tr><td colspan="2"><input type="submit"></td></tr>
		</table>
	</form>

	<table>
	<tr>
		<td>Id</td>
		<td>Descripcion</td>
		<td>Inicio</td>
		<td>Fin</td>
		<td>Estado</td>
		<td>Ganador</td>
	</tr>
<?php
	$todays_date = date("Y-m-d");
	$today = strtotime($todays_date);
	while ($iw = mysql_fetch_array($res)){
?>
	<tr>
		<td><?php echo $iw['id'] ?></td>
		<td><?php echo $iw['descripcion'] ?></td>
		<td><?php echo $iw['inicio'] ?></td>
		<td><?php echo $iw['fin'] ?></td>
		<td><?php 
			if (is_null($iw['ticketID'])) {
				if ($iw['FIN_UNIX'] > $today) {
     				echo 'Pendiente';
				} else {
				    echo 'Vencido';
				}
			} else {
				echo 'Asignado';
			}
		?></td>
		<td><?php 
			if (!is_null($iw['winner'])) {
				echo $iw['winner'];
			} else {
				echo '-';
			}
		?></td>
	</tr>
<?php 		
	} 
?>
</table>
<!-- Load jQuery, SimpleModal and Basic JS files -->
<script type='text/javascript' src='js/jquery-1.7.min.js'></script>
<script type='text/javascript' src='js/jquery.form.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/jquery-ui-1.8.16.custom.min.js'></script>
<script type='text/javascript' src='js/jquery-ui-timepicker-addon.js'></script>
<script>
$(document).ready(
		function(){
			$('#inicio').datetimepicker({
				showSecond: true,
				showMillisec: false,
				dateFormat: 'yy-mm-dd',
				timeFormat: 'hh:mm:ss',
				onSelect: function (selectedDateTime){
					var start = $(this).datetimepicker('getDate');
					$('#fin').datetimepicker('option', 'minDate', new Date(start.getTime()) );
				}
			});
			$('#fin').datetimepicker({
				showSecond: true,
				showMillisec: false,
				dateFormat: 'yy-mm-dd',
				timeFormat: 'hh:mm:ss',
				onSelect: function (selectedDateTime){
					var end= $(this).datetimepicker('getDate');
					$('#inicio').datetimepicker('option', 'maxDate', new Date(end.getTime()) );
				}
			});
		}
	)
</script>
</body>
</html>