<?php 
// TODO Login de usuarios polenta

	header("Content-type: text/html; charset=utf-8");
	require("include/funcionesDB.php");
	
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
	header ("Location: premiosInstantaneos.php");
?>
