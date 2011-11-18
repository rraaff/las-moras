<?php 
	header("Content-type: text/html; charset=iso-8859-1");
	require("funcionesDB.php");
	
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
	
	$query = "INSERT INTO SYSTEMUSER (nombre, apellido, documento, email, usuario, password) 
		VALUES ($nombre, $apellido, $documento, $email, $usuario, $password)";
	$res = mysql_query($query,$connection);// or die ("Error en insert ".mysql_error()."\n".$query);
	
	// Cierre conexion
	closeConnection($connection);
// validar todo lo que haga falta, campo a campo
// usuario ya existente	
// password en md5?
$output = '{ "success": "yes", "welcome": "Welcome" }';
// } else {
// $output = '{ "success": "no", "message": "This is not working" }';
// }

$output = str_replace("\r", "", $output);
$output = str_replace("\n", "", $output);

echo $output;
?>