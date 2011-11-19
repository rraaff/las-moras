<?php 
	header("Content-type: text/html; charset=utf-8");
	
	require("funcionesDB.php");
	
	$query = "SELECT nombre, apellido FROM SYSTEMUSER";
	$res = doSelect($query);
?>
<html>
<body>
xcxc
<table>
<?php
	$i = mysql_num_rows($res);
	$posicion = 0;
	while ($i >= 0 && $user = mysql_fetch_array($res)){
?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $user['nombre'] ?></td>
		<td><?php echo $user['apellido'] ?></td>
	</tr>
<?php 		
		$i--;
	} 
?>
</table>
</body>
</html>