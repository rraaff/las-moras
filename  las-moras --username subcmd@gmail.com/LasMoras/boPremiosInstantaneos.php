<?php 
	include("include/headers.php");
	require("include/funcionesDB.php");
	require("include/boCheckLogin.php");
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_FILES['imagen']['size'] > 0){
		// Inicio conexion
		$connection = mysql_connect(DB_SERVER,DB_USER, DB_PASS) or die ("Problemas en la conexion");
		mysql_select_db(DB_NAME,$connection);
		
		$descripcion = $_POST['descripcion'];
		$inicio = $_POST['inicio'];
		$fin = $_POST['fin'];
		
		$descripcion = quote_smart($descripcion, $connection);
		$inicio = quote_smart($inicio, $connection);
		$fin = quote_smart($fin, $connection);
		
		$fileName = quote_smart($_FILES['imagen']['name'], $connection);
		$tmpName  = $_FILES['imagen']['tmp_name'];
		$fileSize = quote_smart($_FILES['imagen']['size'], $connection);
		$fileType = quote_smart($_FILES['imagen']['type'], $connection);
		$fp      = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);
		
		$insertTicket = "INSERT INTO INSTANT_WIN (descripcion, inicio, fin, name, type, size, content) 
			VALUES ($descripcion, $inicio, $fin, $fileName, $fileType, $fileSize, '$content')";
		$res = mysql_query($insertTicket,$connection);// or die ("Error en insert ".mysql_error()."\n".$query);
		
		mysql_close($connection);
		
		header("Location: boPremiosInstantaneos.php");
	} else {
	
	$query = "SELECT IW.*, UNIX_TIMESTAMP(IW.FIN) FIN_UNIX, TI.ticket, SU.id systemUserID, SU.nombre, SU.apellido
		FROM INSTANT_WIN IW 
		LEFT JOIN TICKETS TI ON (IW.ticketID = TI.id) 		
		LEFT JOIN SYSTEMUSER SU ON (TI.systemUserID = SU.id) 
		ORDER BY IW.inicio";
	$res = doSelect($query);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Las Moras</title>

<?php include("include/headerBO.php"); ?>

</head>
<body>

<?php include("include/menuBO.php"); ?> <br>

	<form action="boPremiosInstantaneos.php" name="altaIWForm" id="altaIWForm" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
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
		<td>Borrar</td>
	</tr>
<?php
	$today = time();
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
				echo 'Adjudicado';
			}
		?></td>
		<td><?php 
			if (!is_null($iw['nombre'])) { ?>
				<a href="javascript:showWinner('<?php echo $iw['ticketID'];?>')">
				<?php echo $iw['nombre'];?> <?php echo $iw['apellido'];?> 
				</a>
			<?php } else {
				echo '-';
			}
		?></td>
		<td><?php 
			if (is_null($iw['ticketID'])) {
				if ($iw['FIN_UNIX'] > $today) {
     				?>
     				<a href="doBorrarPremioInstantaneo.php?id=<?php echo $iw['id'];?>">
						Borrar 
					</a>
     				<?php 
				} else {
				    echo '-';
				}
			} else {
				echo '-';
			}
		?></td>
	</tr>
<?php 		
	} 
?>
</table>
<script>

function showWinner(ticketID) {
	$.get("getTicketWinner.php?ticketID=" + ticketID, function(data){
		// create a modal dialog with the data
		$(data).modal({
			overlayId: 'winner-overlay',
			containerId: 'winner-container'
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
<?php } ?>