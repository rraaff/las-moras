<?php 
	require("funcionesDB.php");
	require("boCheckLogin.php");
	if(isset($_GET['excel'])) {
		header("Content-type: application/vnd.ms-excel; name='excel'");
		header("Content-Disposition: filename=usuarios.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
	} else {
		header("Content-type: text/html; charset=utf-8");
	}
	
	$query = "SELECT id, nombre, apellido, documento, email, usuario, fechaCreacion,
		(select max(fechaCarga) from TICKETS WHERE systemuserID = SU.id) ultimaCarga,
		(select count(*) from TICKETS WHERE systemuserID = SU.id) cantidadCodigos 
		FROM SYSTEMUSER SU 
		ORDER BY fechaCreacion";
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
	<table>
	<tr>
		<td>Fecha de registro</td>
		<td>Fecha de login</td>
		<td>Cantidad de codigos</td>
		<td>Fecha de ultima carga</td>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Documento</td>
		<td>Usuario</td>
		<td>Email</td>
	</tr>
<?php
	while ($iw = mysql_fetch_array($res)){
?>
	<tr>
		<td><?php echo $iw['fechaCreacion'] ?></td>
		<td>-</td>
		<td><?php echo $iw['cantidadCodigos'] ?></td>
		<td><?php 
			if (is_null($iw['ultimaCarga'])) {
   				echo '-';
			} else {
				echo $iw['ultimaCarga'];
			}
		?></td>
		<td><?php echo $iw['nombre'] ?></td>
		<td><?php echo $iw['apellido'] ?></td>
		<td><?php echo $iw['documento'] ?></td>
		<td><?php echo $iw['usuario'] ?></td>
		<td><?php echo $iw['email'] ?></td>
	</tr>
<?php 		
	} 
?>
</table>
<?php if(!isset($_GET['excel'])) { ?>
	<a href="boSystemUsers.php?excel=true">Excel</a>
<?php 		
	} 
?>
<!-- Load jQuery, SimpleModal and Basic JS files -->
<script type='text/javascript' src='js/jquery-1.7.min.js'></script>
<script type='text/javascript' src='js/jquery.form.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/jquery-ui-1.8.16.custom.min.js'></script>
<script type='text/javascript' src='js/jquery-ui-timepicker-addon.js'></script>
<script>

function showWinner(ticketID) {
	$.get("getTicketWinner.php?ticketID=" + ticketID, function(data){
		// create a modal dialog with the data
		$(data).modal({
			overlayId: 'simplemodal-overlay',
			containerId: 'simplemodal-container'
		});
	});
}

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