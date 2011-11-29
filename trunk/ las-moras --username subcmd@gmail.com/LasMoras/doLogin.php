<?php 
	include("include/headers.php");
	require("include/funcionesDB.php");
	session_start();
	
	// Inicio conexion
	$connection = mysql_connect(DB_SERVER,DB_USER, DB_PASS) or die ("Problemas en la conexion");
	mysql_select_db(DB_NAME,$connection);

	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	
	$usuario = quote_smart($usuario, $connection);
	$password = quote_smart($password, $connection);
	
	$SQL = "SELECT * FROM SYSTEMUSER WHERE usuario = $usuario AND password = $password";
	$result = mysql_query($SQL);
	$num_rows = mysql_num_rows($result);
	
	$errorMessage = "";
	if ($result) {
		if ($num_rows > 0) {
			$user = mysql_fetch_array($result);
			// login
			$_SESSION['Login'] = "1";
			$_SESSION['Nombre'] = $user['nombre'];
			$_SESSION['Apellido'] = $user['apellido'];
			$_SESSION['Id'] = $user['id'];
			
			// login
			$nombre = $user['nombre'];
			$apellido = $user['apellido'];
			$systemUserID = $user['id'];
			$query = "INSERT INTO LOGINS (systemUserID, fechaLogin)
			VALUES ($systemUserID, NOW() )";
			$res = mysql_query($query,$connection);// or die ("Error en insert ".mysql_error()."\n".$query);
			
			$output = '{ "success": "yes", "error": "" , "nombre": "' .$nombre . '", "apellido": "' .$apellido. '"}';
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