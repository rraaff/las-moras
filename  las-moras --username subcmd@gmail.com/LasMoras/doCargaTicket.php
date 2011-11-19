<?php 
	header("Content-type: text/html; charset=utf-8");
	require("funcionesDB.php");
	
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
			// si el usuario existe verifico ticket ya cargado
			$SQL_tickets = "SELECT * FROM TICKETS WHERE ticket = $ticket";
			$result_tickets = mysql_query($SQL_tickets);
			$num_rows_tickets = mysql_num_rows($result_tickets);
			if ($result_tickets) {
				// Si no fue cargado, lo cargo
				if ($num_rows_tickets == 0) {
					$user = mysql_fetch_array($result);
					$userID = $user['id'];
					$insertTicket = "INSERT INTO TICKETS (systemuserID, ticket) VALUES ($userID, $ticket)";
					$res = mysql_query($insertTicket,$connection);// or die ("Error en insert ".mysql_error()."\n".$query);
					$output = '{ "success": "yes", "error": "" }';
				} else {
					// Si ya fue cargado, doy mensaje de error
					$output = '{ "success": "no", "error": "Ticket ya cargado." }';
				}
			} else {
				$output = '{ "success": "no", "error": "Error generico." }';
			}
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