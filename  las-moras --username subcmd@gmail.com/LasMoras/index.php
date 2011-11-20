<?php 
	header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;  charset=utf-8">
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

<!-- preload the images -->
<div style='display:none'>
	<img src='img/basic/x.png' alt='' />
</div>

<a href='#' class='registrate' id="registro">Registrate</a>
<a href='#' class='cargaCodigo' id="cargaCodigo">Carga tu codigo</a>

<a href='premiosInstantaneos.php' class=''>ABM IW</a>

<!-- modal registro -->
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
	

<!-- modal carga codigo -->
<div id="basic-modal-cargaCodigo">
	<form action="doCargaTicket.php" name="ticketForm" id="ticketForm" method="POST">
		<table>
			<tr><td>Usuario</td><td><input type="text" name="usuario"></td></tr>
			<tr><td>Password</td><td><input type="text" name="password"></td></tr>
			<tr><td>Ticket</td><td><input type="text" name="codigo"></td></tr>
			<tr><td colspan="2"><input type="submit"></td></tr>
		</table>
	</form>
</div>

<!-- Load jQuery, SimpleModal and Basic JS files -->
<script type='text/javascript' src='js/jquery-1.7.min.js'></script>
<script type='text/javascript' src='js/jquery.form.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script>


jQuery(function ($) {
	$('#registro').click(function (e) {
		$('#basic-modal-registro').modal();
		return false;
	});

	$('#cargaCodigo').click(function (e) {
		$('#basic-modal-cargaCodigo').modal();
		return false;
	});
});

$(document).ready(
	function(){
		$("#registroForm").ajaxForm({
			type: "POST",
			url: "./doRegistro.php",
			dataType: "json",
			/*data: "nombre="+$("#nombre").val()+"&apellido;="+$("#apellido").val()+
				"documento="+$("#documento").val()+"&email;="+$("#email").val() +
				"usuario="+$("#usuario").val()+"&password;="+$("#password").val(),*/
			success: postRegisto
			});

		$("#ticketForm").ajaxForm({
			type: "POST",
			url: "./doCargaTicket.php",
			dataType: "json",
			/*data: "usuario="+$("#usuario").val()+"&password;="+$("#password").val()+
				"&codigo;="+$("#codigo").val(),*/
			success: postCargaCodigo
			});
	}
)
function postRegisto(data) {
	if (data.success == 'yes') {
		$.modal.close();
	} else {
		alert(data.error);
	}
}

function postCargaCodigo(data) {
	if (data.success == 'yes') {
		if (data.win == 'yes') {
			alert('te ganaste un ' + data.iw_desc);
		} else {
			alert('segui participando');
		}
	} else {
		alert(data.error);
	}
}
</script>
</body>
</html>