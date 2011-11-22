<?php 
	header("Content-type: text/html; charset=utf-8");
	require("funcionesDB.php");
	session_start();
	
	// Inicio conexion
	$connection = mysql_connect(DB_SERVER,DB_USER, DB_PASS) or die ("Problemas en la conexion");
	mysql_select_db(DB_NAME,$connection);

	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	$ticket = $_POST['codigo'];
	
	$usuario = quote_smart($usuario, $connection);
	$password = quote_smart($password, $connection);
	$ticket = quote_smart($ticket, $connection);
	
	$SQL = "SELECT * FROM SYSTEMUSER WHERE usuario = $usuario AND password = $password";
	$result = mysql_query($SQL);
	$num_rows = mysql_num_rows($result);
	
	$errorMessage = "";
	if ($result) {
		if ($num_rows > 0) {
			$user = mysql_fetch_array($result);
			$_SESSION['Login'] = "1";
			$_SESSION['Nombre'] = $user['nombre'];
			$_SESSION['Apellido'] = $user['apellido'];
			$_SESSION['Id'] = $user['id'];
			$output = '{ "success": "yes", "error": "" }';
		} else {
// 			no esta registrado
			$output = '{ "success": "no", "error": "No esta registrado." }';
		}
	} else {
		$output = '{ "success": "no", "error": "Error generico." }';
	}
	
	// Cierre conexion
	mysql_close($connection);
	//validar todo lo que haga falta, campo a campo
	
	$output = str_replace("\r", "", $output);
	$output = str_replace("\n", "", $output);
	echo $output;
?>