<?php 
	header("Content-type: text/html; charset=utf-8");
	require("funcionesDB.php");
	require("boCheckLogin.php");
?>

<html>
<head>
<title>Home</title>
</head>
<body>
Hola <?php echo($_SESSION['boNombre']);?> <?php echo($_SESSION['boApellido']);?><br>

<A HREF = "boPremiosInstantaneos.php">Premios</A><br>

<A HREF = "boSystemUsers.php">Usuarios</A><br>

<A HREF = "boLogout.php">Log out</A><br>
</body>
</html>