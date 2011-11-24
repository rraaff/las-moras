<?php 
	header("Content-type: text/html; charset=utf-8");
	require("funcionesDB.php");
	session_start();
	
	// Inicio conexion
	$connection = mysql_connect(DB_SERVER,DB_USER, DB_PASS) or die ("Problemas en la conexion");
	mysql_select_db(DB_NAME,$connection);
	
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$documento = $_POST['documento'];
	$email = $_POST['email'];
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	
	$nombre = quote_smart($nombre, $connection);
	$apellido = quote_smart($apellido, $connection);
	$documento = quote_smart($documento, $connection);
	$email = quote_smart($email, $connection);
	$usuario = quote_smart($usuario, $connection);
	$password = quote_smart($password, $connection);
	
	$SQL = "SELECT * FROM SYSTEMUSER WHERE usuario = $usuario";
	$result = mysql_query($SQL);
	$num_rows = mysql_num_rows($result);
	if ($result) {
		if ($num_rows > 0) {
			$output = '{ "success": "no", "error": "El nombre de usuario ya esta registrado." }';
		} else {
			$SQL = "SELECT * FROM SYSTEMUSER WHERE email = $email";
			$result = mysql_query($SQL);
			$num_rows = mysql_num_rows($result);
			if ($result) {
				if ($num_rows > 0) {
					$output = '{ "success": "no", "error": "El email ya esta registrado." }';
				} else {
					$query = "INSERT INTO SYSTEMUSER (nombre, apellido, documento, email, usuario, password, fechaCreacion)
					VALUES ($nombre, $apellido, $documento, $email, $usuario, $password, NOW() )";
					$res = mysql_query($query,$connection);// or die ("Error en insert ".mysql_error()."\n".$query);
					$returnInsert = mysql_insert_id($connection);
					// login
					$_SESSION['Login'] = "1";
					$_SESSION['Nombre'] = $nombre;
					$_SESSION['Apellido'] = $apellido;
					$_SESSION['Id'] = $returnInsert;
					$output = '{ "success": "yes", "error": "" }';
				}
			} else {
				$output = '{ "success": "no", "error": "Error generico." }';
			}
		}
	} else {
		$output = '{ "success": "no", "error": "Error generico." }';
	}
	// Cierre conexion
	closeConnection($connection);
// validar todo lo que haga falta, campo a campo
// usuario ya existente	
// password en md5?
// } else {
// $output = '{ "success": "no", "message": "This is not working" }';
// }

$output = str_replace("\r", "", $output);
$output = str_replace("\n", "", $output);

echo $output;
?>