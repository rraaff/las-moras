<?php 
	include("include/headers.php");
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Finca Las Moras - Premia tu forma de disfrutar la vida</title>
<meta name="keywords" content="Vino, Tinto, Blanco, Finca Las Moras, Beber con moderaci�n" />
<meta name="description" content="Finca Las Moras premia tu forma de disfrutar la vida" />
<meta name="AUTHOR" content="That Day in London - Agencia Interactiva & Dise�o - para Publiquest" />
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
<div style="display:none">
	<img src="img/basic/x.png" alt="" />
	<img src="images/buttons/cargaElCodigo.gif" alt="" />
	<img src="images/buttons/miraLosPremios.gif" alt="" />
	<img src="images/buttons/fb.gif" alt="" />
	<img src="images/buttons/tw.gif" alt="" />
	<img src="images/buttons/email.gif" alt="" />
</div>

<a href='#' class='registrate' id="registro">Registrate</a>
<a href='#' class='recordarPassword' id="recordarPassword">Recordar password</a>

<!-- modal registro display:block; -->
<div id="basic-modal-registro">
	<form action="doRegistro.php" name="registroForm" id="registroForm" method="POST">
		<table border="1" cellpadding="0" cellspacing="0">
			<tr><td><input type="text" name="nombre"></td></tr>
			<tr><td><input type="text" name="apellido"></td></tr>
			<tr><td><input type="text" name="documento"></td></tr>
			<tr><td><input type="text" name="email"></td></tr>
			<tr><td><input type="text" name="edad"></td></tr>
			<tr><td><input type="text" name="usuario"></td></tr>
			<tr><td><input type="password" name="password"></td></tr>
			<tr><td colspan="2"><input type="submit"></td></tr>
		</table>
	</form>
</div>
	
<!-- modal carga codigo -->
<div id="basic-modal-login">
	<form action="doLogin.php" name="loginForm" id="loginForm" method="POST">
		<table width="380" border="0" bordercolor="#00FF00" cellpadding="0" cellspacing="0">
			<tr><td width="85" height="30"></td><td width="295"><input type="text" name="usuario"></td></tr>
			<tr><td colspan="2" height="16"></td></tr>
			<tr><td></td><td><input type="password" name="password"></td></tr>
			<tr><td colspan="2" height="10"></td></tr>
			<tr><td></td><td height="120" align="right"><input type="image" src="images/buttons/enviarDatos.png" width="158" height="47"></td></tr>
			<tr><td colspan="2"><table cellpadding="0" cellspacing="0"><tr><td>SI NO EST&Aacute;S REGISTRADO, <br><a href="javascript:register()">HAC&Eacute; CLIC AC&Aacute;.</a></td><td width="30"></td><td>¿OLVIDASTE TU PASSWORD?,<br><a href="javascript:recordarPassword()">HAC&Eacute; CLIC AC&Aacute;.</a></td></tr></table></td></tr>
		</table>
	</form>
</div>

<!-- modal carga codigo -->
<div id="basic-modal-cargaCodigo">
	<form action="doCargaTicket.php" name="ticketForm" id="ticketForm" method="POST">
		<table>
			<tr><td><input type="text" name="codigo"></td></tr>
			<tr><td><input type="submit" style="background-image:url(images/buttons/cargarCodigo.png); width:156px; height:43px;"></td></tr>
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
<script language="javascript">


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
		logged = true;
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

function postRecordarPassword(data) {
	if (data.success == 'yes') {
		$.modal.close();
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