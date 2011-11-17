<?php 
	header("Content-type: text/html; charset=iso-8859-1");
	
	require("funcionesDB.php");
	
	$query = "SELECT rbKey, rbContext FROM RESOURCEBUNDLE";
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
		<td><?php echo $user['rbKey'] ?></td>
		<td><?php echo $user['rbContext'] ?></td>
	</tr>
<?php 		
		$i--;
	} 
?>
</table>
</body>
</html>