<?php 
	header("Content-type: text/html; charset=iso-8859-1");
?>
<!DOCTYPE html>
<html>
<head>
<title>Las Moras</title>

<!-- Contact Form CSS files -->
<link type='text/css' href='css/sm_basic.css' rel='stylesheet' media='screen' />
<!-- IE6 "fix" for the close png image -->
<!--[if lt IE 7]>
<link type='text/css' href='css/sm_basic_ie.css' rel='stylesheet' media='screen' />
<![endif]-->
<!-- JS files are loaded at the bottom of the page -->
</head>
<body>

<a href='#' class='registrate' id="registro">Registrate</a>

<!-- modal content -->
<div id="basic-modal-registro">
	<form action="doRegistro.php" name="registroForm" id="registroForm" method="POST">
		<table>
			<tr><td>Nombre</td><td><input type="text" name="nombre"></td></tr>
			<tr><td>Apellido</td><td><input type="text" name="apellido"></td></tr>
			<tr><td>Documento</td><td><input type="text" name="documento"></td></tr>
			<tr><td>Email</td><td><input type="text" name="email"></td></tr>
			<tr><td>Usuario</td><td><input type="text" name="usuario"></td></tr>
			<tr><td>Password</td><td><input type="text" name="password"></td></tr>
			<tr><td colspan="2"><input type="submit"></td></tr>
		</table>
	</form>
</div>

<!-- preload the images -->
<div style='display:none'>
	<img src='img/basic/x.png' alt='' />
</div>
	

<form action="doCargaTicket.php" name="ticket" method="POST">
<fieldset>
	<legend>Carga ticket</legend>
	<table>
		<tr><td>Usuario</td><td><input type="text" name="usuario"></td></tr>
		<tr><td>Password</td><td><input type="text" name="password"></td></tr>
		<tr><td>Ticket</td><td><input type="text" name="codigo"></td></tr>
		<tr><td colspan="2"><input type="submit"></td></tr>
	</table>
</fieldset>
</form>

<!-- Load jQuery, SimpleModal and Basic JS files -->
<script type='text/javascript' src='js/jquery-1.7.min.js'></script>
<script type='text/javascript' src='js/jquery.form.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/basic.js'></script>
<script>
$(document).ready(
	function(){
		$("#registroForm").ajaxForm({
			type: "POST",
			url: "./doRegistro.php",
			dataType: "json",
			data: "nombre="+$("#nombre").val()+"&apellido;="+$("#apellido").val()+
				"documento="+$("#documento").val()+"&email;="+$("#email").val() +
				"usuario="+$("#usuario").val()+"&password;="+$("#password").val(),
			success: postLogin
			});
	}
)
function postLogin(data) {
	if (data.success == 'yes') {
		alert("registrado");
	} else {
		alert(data.error);
	}
}
</script>
</body>
</html>