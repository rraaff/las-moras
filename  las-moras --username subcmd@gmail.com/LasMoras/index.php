<?php 
	header("Content-type: text/html; charset=utf-8");
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Finca Las Moras - Premia tu forma de disfrutar la vida</title>
<meta name="keywords" content="Vino, Tinto, Blanco, Finca Las Moras, Beber con moderación" />
<meta name="description" content="Finca Las Moras premia tu forma de disfrutar la vida" />
<meta name="AUTHOR" content="That Day in London - Agencia Interactiva & Diseño - para Publiquest" />
<link rel="icon" href="./favicon.ico" type="icon"/>
<!-- Contact Form CSS files -->
<link type='text/css' href='css/sm_basic.css' rel='stylesheet' media='screen' />
<!-- IE6 "fix" for the close png image -->
<!--[if lt IE 7]>
<link type='text/css' href='css/sm_basic_ie.css' rel='stylesheet' media='screen' />
<![endif]-->
<!-- JS files are loaded at the bottom of the page -->
<script src="js/popup.js" type="text/javascript"></script>
<script type='text/javascript'>
	function openLegal(){
		openPopupWindow('basesycondiciones.html', 481, 460, 0, 0, false, false, 'bases', false);
	}

<?php if (isset($_SESSION['Login']) && $_SESSION['Login'] == 1) { ?>
	var logged = true;
<?php } else { ?>
	var logged = false;
<?php } ?>
</script>
</head>
<body>
<div id="centralContent">
	<div id="promoButtons"><a href='#' class='cargaCodigo' id="cargaCodigo"><img src="images/buttons/cargaElCodigo.gif" width="336" height="45" border="0"></a><a href="premios.html"><img src="images/buttons/miraLosPremios.gif" width="336" height="45" border="0"></a></div>
	<div id="footer">
		<div id="legal"><a href="javascript:openLegal();">Bases y condiciones del sitio</a></div>
		<div id="socialHub"><a href="#"><img src="images/buttons/fb.gif" width="38" height="30" border="0"></a><a href="#"><img src="images/buttons/tw.gif" width="36" height="30" border="0"></a><a href="#"><img src="images/buttons/email.gif" width="39" height="30" border="0"></a></div>
	</div>
</div>
<!-- preload the images -->
<div style='display:none'>
	<img src='img/basic/x.png' alt='' />
	<img src="images/buttons/cargaElCodigo.gif">
	<img src="images/buttons/miraLosPremios.gif">
	<img src="images/buttons/fb.gif">
	<img src="images/buttons/tw.gif">
	<img src="images/buttons/email.gif">
</div>

<a href='#' class='registrate' id="registro">Registrate</a>
<a href='#' class='recordarPassword' id="recordarPassword">Recordar password</a>

<!-- modal registro -->
<div id="basic-modal-registro">
	<form action="doRegistro.php" name="registroForm" id="registroForm" method="POST">
		<table>
			<tr><td>Nombre</td><td><input type="text" name="nombre"></td></tr>
			<tr><td>Apellido</td><td><input type="text" name="apellido"></td></tr>
			<tr><td>Documento</td><td><input type="text" name="documento"></td></tr>
			<tr><td>Email</td><td><input type="text" name="email"></td></tr>
			<tr><td>EDAD</td><td><input type="text" name="edad"></td></tr>
			<tr><td>Usuario</td><td><input type="text" name="usuario"></td></tr>
			<tr><td>Password</td><td><input type="text" name="password"></td></tr>
			<tr><td colspan="2"><input type="submit"></td></tr>
		</table>
	</form>
</div>
	
<!-- modal carga codigo -->
<div id="basic-modal-login">
	<form action="doLogin.php" name="loginForm" id="loginForm" method="POST">
		<table>
			<tr><td>Usuario</td><td><input type="text" name="usuario"></td></tr>
			<tr><td>Password</td><td><input type="text" name="password"></td></tr>
			<tr><td colspan="2"><input type="submit"></td></tr>
			<tr><td><a href="javascript:register()">No esta registrado</a></td><td><a href="javascript:recordarPassword()">No recuerda el password</a></td></tr>
		</table>
	</form>
</div>

<!-- modal carga codigo -->
<div id="basic-modal-cargaCodigo">
	<form action="doCargaTicket.php" name="ticketForm" id="ticketForm" method="POST">
		<table>
			<tr><td>Ticket</td><td><input type="text" name="codigo"></td></tr>
			<tr><td colspan="2"><input type="submit"></td></tr>
		</table>
	</form>
</div>

<!-- modal recordar password -->
<div id="basic-modal-recordarPassword">
	<form action="doRecordarPassword.php" name="recordarPasswordForm" id="recordarPasswordForm" method="POST">
		<table>
			<tr><td>Email</td><td><input type="text" name="email"></td></tr>
			<tr><td colspan="2"><input type="submit"></td></tr>
		</table>
	</form>
</div>

<!-- Load jQuery, SimpleModal and Basic JS files -->
<script src='js/jquery-1.7.min.js'></script>
<script src='js/jquery.form.js'></script>
<script src='js/jquery.simplemodal-1.3.5.js'></script>
<script lang="javascript">


jQuery(function ($) {
	$('#registro').click(function (e) {
		$('#basic-modal-registro').modal(
			{
			overlayId: 'registro-overlay',
			containerId: 'registro-container'
			});
		return false;
	});

	$('#cargaCodigo').click(function (e) {
		if (logged) {
			$('#basic-modal-cargaCodigo').modal({
				overlayId: 'cargaCodigo-overlay',
				containerId: 'cargaCodigo-container'
			});
		} else {
			$('#basic-modal-login').modal({
				overlayId: 'login-overlay',
				containerId: 'login-container'
			});
		}
		return true;
	});

	$('#recordarPassword').click(function (e) {
		$('#basic-modal-recordarPassword').modal({
			overlayId: 'recordarPassword-overlay',
			containerId: 'recordarPassword-container'
		});
		return false;
	});
});


$(document).ready(
	function(){
		$("#registroForm").ajaxForm({
			type: "POST",
			url: "./doRegistro.php",
			dataType: "json",
			success: postRegisto
			});

		$("#loginForm").ajaxForm({
			type: "POST",
			url: "./doLogin.php",
			dataType: "json",
			success: postLogin
			});

		$("#ticketForm").ajaxForm({
			type: "POST",
			url: "./doCargaTicket.php",
			dataType: "json",
			success: postCargaCodigo
			});
		
		$("#recordarPasswordForm").ajaxForm({
			type: "POST",
			url: "./doRecordarPassword.php",
			dataType: "json",
			success: postRecordarPassword
			});
	}
);

function postRegisto(data) {
	if (data.success == 'yes') {
		$.modal.close();
	} else {
		alert(data.error);
	}
}

function postLogin(data) {
	if (data.success == 'yes') {
		logged = true;
		$.modal.close();
		$('#basic-modal-cargaCodigo').modal({
			overlayId: 'cargaCodigo-overlay',
			containerId: 'cargaCodigo-container'
		});
	} else {
		alert(data.error);
	}
}

function register() {
	$.modal.close();
	$('#basic-modal-registro').modal(
		{
		overlayId: 'registro-overlay',
		containerId: 'registro-container'
	});
}

function recordarPassword() {
	$.modal.close();
	$('#basic-modal-recordarPassword').modal({
		overlayId: 'recordarPassword-overlay',
		containerId: 'recordarPassword-container'
	});
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