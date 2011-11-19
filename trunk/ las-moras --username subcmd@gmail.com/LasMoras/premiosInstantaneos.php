<?php 
// TODO Login de usuarios polenta
	header("Content-type: text/html; charset=utf-8");
	
	require("funcionesDB.php");
	
	// TODO estados, ganadores, etc
	$query = "SELECT id, ticketID, descripcion, inicio, fin FROM INSTANT_WIN";
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

	<form action="doAltaIW.php" name="altaIWForm" id="altaIWForm" method="POST">
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
	</tr>
<?php
	while ($iw = mysql_fetch_array($res)){
?>
	<tr>
		<td><?php echo $iw['id'] ?></td>
		<td><?php echo $iw['descripcion'] ?></td>
		<td><?php echo $iw['inicio'] ?></td>
		<td><?php echo $iw['fin'] ?></td>
		<td>TODO</td>
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