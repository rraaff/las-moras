<?php 
	include("include/headers.php");
	require("include/funcionesDB.php");
	require("include/boCheckLogin.php");
	if(isset($_GET['excel'])) {
		header("Content-type: application/vnd.ms-excel; name='excel'");
		header("Content-Disposition: filename=usuarios.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
	} else {
		header("Content-type: text/html; charset=utf-8");
	}
	
	$query = "SELECT id, nombre, apellido, documento, edad, email, usuario, fechaCreacion,
		(select max(fechaCarga) from TICKETS WHERE systemuserID = SU.id) ultimaCarga,
		(select max(fechaLogin) from LOGINS WHERE systemuserID = SU.id) ultimoLogin,
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

<?php include("include/headerBO.php"); ?>

</head>


<body>
<?php if(!isset($_GET['excel'])) { ?>
<?php include("include/menuBO.php"); ?> <br>
<?php } ?>
	<table>
	<tr>
		<td>Fecha de registro</td>
		<td>Fecha de ultimo login</td>
		<td>Cantidad de codigos</td>
		<td>Fecha de ultima carga</td>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Documento</td>
		<td>Edad</td>
		<td>Usuario</td>
		<td>Email</td>
	</tr>
<?php
	while ($iw = mysql_fetch_array($res)){
?>
	<tr>
		<td><?php echo $iw['fechaCreacion'] ?></td>
		<td><?php echo $iw['ultimoLogin'] ?></td>
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
		<td><?php echo $iw['edad'] ?></td>
		<td><?php echo $iw['usuario'] ?></td>
		<td><?php echo $iw['email'] ?></td>
	</tr>
<?php 		
	} 
?>
</table>
<?php if(!isset($_GET['excel'])) { ?>
	<a href="boSystemUsers.php?excel=true">Excel</a>
<?php } ?>
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