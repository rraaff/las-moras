<?php 
	include("include/headers.php");
	require("include/funcionesDB.php");
	require("include/boCheckLogin.php");
?>

<html>
<head>
<title>Home</title>
<?php include("include/headerBO.php"); ?>
</head>
<body>
Hola <?php echo($_SESSION['boNombre']);?> <?php echo($_SESSION['boApellido']);?><br>

<?php include("include/menuBO.php"); ?>

</body>
</html>