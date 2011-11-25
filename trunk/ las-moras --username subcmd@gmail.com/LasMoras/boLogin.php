<?php 
	include("include/headers.php");
	require("include/funcionesDB.php");
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		// Inicio conexion
		$connection = mysql_connect(DB_SERVER,DB_USER, DB_PASS) or die ("Problemas en la conexion");
		
		mysql_select_db(DB_NAME,$connection);
		
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		
		$usuario = quote_smart($usuario, $connection);
		$password = quote_smart($password, $connection);
		
		$SQL = "SELECT * FROM BOUSER WHERE usuario = $usuario AND password = $password";
		$result = mysql_query($SQL);
		$num_rows = mysql_num_rows($result);
		
		$errorMessage = "";
		if ($result) {
			if ($num_rows > 0) {
				session_start();
				$user = mysql_fetch_array($result);
				$_SESSION['boLogin'] = "1";
				$_SESSION['boNombre'] = $user['nombre'];
				$_SESSION['boApellido'] = $user['apellido'];
				header ("Location: boHome.php");
			} else {
				$errorMessage = "No existe el usuario";
			}
		} else {
			$errorMessage = "Error de conexion";
		}
		
		closeConnection($connection);
	}
?>
<html>
<head>
<title>Basic Login Script</title>
</head>
<body>

<FORM NAME ="form1" METHOD ="POST" ACTION ="boLogin.php">

Username: <INPUT TYPE = 'TEXT' Name ='usuario'  value="<?PHP print $_POST['usuario'];?>" maxlength="20">
Password: <INPUT TYPE = 'TEXT' Name ='password'  value="<?PHP print $_POST['password'];?>" maxlength="20">

<P align = center>
<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Login">
</P>

</FORM>

<P>
<?PHP print $errorMessage;?>
</body>
</html>