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
<style>
em.error {
  background:url("images/unchecked.gif") no-repeat 0px 0px;
  padding-left: 16px;
}
em.success {
  background:url("images/checked.gif") no-repeat 0px 0px;
  padding-left: 16px;
}
em.error { color: black; }
#warning { display: none; }
</style>
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
		<table border="1" cellpadding="0" cellspacing="0" id="registroTable">
			<tr><td><input type="text" name="nombre"></td><td></td></tr>
			<tr><td><input type="text" name="apellido"></td><td></td></tr>
			<tr><td><input type="text" name="documento"></td><td></td></tr>
			<tr><td><input type="text" name="email"></td><td></td></tr>
			<tr><td><input type="text" name="edad"></td><td></td></tr>
			<tr><td><input type="text" name="usuario"></td><td width="25" id="usuario_err"></td></tr>
			<tr><td><input type="password" name="password"></td><td></td></tr>
			<tr><td colspan="2"><input type="submit"></td></tr>
		</table>
	</form>
</div>
	
<!-- modal carga codigo -->
<div id="basic-modal-login">
	<form action="doLogin.php" name="loginForm" id="loginForm" method="POST">
		<table width="380" border="0" bordercolor="#00FF00" cellpadding="0" cellspacing="0">
			<tr><td width="85" height="30"></td><td width="295"><input type="text" name="usuario"></td><td></td></tr>
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
			<tr><td><input type="text" name="codigo" id="codigo"></td><td width="25" id="codigoerr"></td></tr>
			<tr><td colspan="2"><input type="submit" style="background-image:url(images/buttons/cargarCodigo.png); width:156px; height:43px;"></td><td></td></tr>
		</table>
	</form>
</div>

<!-- modal recordar password -->
<div id="basic-modal-recordarPassword">
	<form action="doRecordarPassword.php" name="recordarPasswordForm" id="recordarPasswordForm" method="POST">
		<table>
			<tr><td>Email</td><td><input type="text" name="email" id="emailrecordar"></td><td width="25" id="recPassEmailerr"></td></tr>
			<tr><td colspan="2"><input type="submit"></td></tr>
		</table>
	</form>
</div>

<!-- modal gracias por cargar -->
<div id="basic-modal-gracias">
	<table>
		<tr><td>Gracias por ingresar el codigo.</td></tr>
		<tr><td>Ya esta participando del sorteo.</td></tr>
		<tr><td colspan="2"><input type="button" onclick="closeCurrentModal()"></td></tr>
	</table>
</div>

<!-- modal instant win -->
<div id="basic-modal-win">
	<table>
		<tr><td><div id="detallePremio"></div></td></tr>
		<tr><td><div id="imagenPremio"></div></td></tr>
		<tr><td colspan="2"><input type="button" onclick="closeCurrentModal()"></td></tr>
	</table>
</div>

<!-- modal clave eviada-->
<div id="basic-modal-claveEnviada">
	<table>
		<tr><td>Se envio el usuario y clave a tu email</tr>
		<tr><td colspan="2"><input type="button" onclick="closeCurrentModal()"></td></tr>
	</table>
</div>

<div id="tooltip" style="display: none; "><h3></h3><div></div><div class="url"></div></div>

<!-- Load jQuery, SimpleModal and Basic JS files -->
<script src='js/jquery-1.7.min.js'></script>
<script src='js/jquery.form.js'></script>
<script src='js/jquery.simplemodal-1.3.5.js'></script>
<script src="js/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script language="javascript">

function showCargaCodigoLigthBox() {
	$('#basic-modal-cargaCodigo').modal({
		overlayId: 'cargaCodigo-overlay',
		containerId: 'cargaCodigo-container',
		persist: true,
		onShow: function (dialog) {document.getElementById('codigo').value = '';}
	});
}

function showLoginLigthBox() {
	$('#basic-modal-login').modal({
		overlayId: 'login-overlay',
		containerId: 'login-container',
		persist: true
	});
}

function showRegistroLigthBox() {
	$('#basic-modal-registro').modal({
		overlayId: 'registro-overlay',
		containerId: 'registro-container',
		persist: true,
		onClose: function (dialog) {closeAnimateCurrentDialog(dialog);}
	});
}

function showRecordarPasswordLigthBox() {
	$('#basic-modal-recordarPassword').modal({
		overlayId: 'recordarPassword-overlay',
		containerId: 'recordarPassword-container',
		persist: true,
		onShow: function (dialog) {document.getElementById('emailrecordar').value = '';}
	});
}

function showGraciasLigthBox() {
	$('#basic-modal-gracias').modal({
		overlayId: 'codigoGracias-overlay',
		containerId: 'codigoGracias-container',
		onClose: function (dialog) {closeAnimateCurrentDialog(dialog);}
	});
}

function showInstantWinLigthBox() {
	$('#basic-modal-win').modal({
		overlayId: 'codigoWin-overlay',
		containerId: 'codigoWin-container',
		onClose: function (dialog) {closeAnimateCurrentDialog(dialog);}
	});
}

function showClaveEnviadaLigthBox() {
	$('#basic-modal-claveEnviada').modal({
		overlayId: 'claveEnviada-overlay',
		containerId: 'claveEnviada-container',
		onClose: function (dialog) {closeAnimateCurrentDialog(dialog);}
	});
}

jQuery(function ($) {
	
	$('#cargaCodigo').click(function (e) {
		if (logged) {
			showCargaCodigoLigthBox();
		} else {
			showLoginLigthBox();
		}
		return true;
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
		
		/*$("#recordarPasswordForm").ajaxForm({
			type: "POST",
			url: "./doRecordarPassword.php",
			dataType: "json",
			success: postRecordarPassword
			});*/

		//function to generate tooltips
		function generateTooltips() {
		  //make sure tool tip is enabled for any new error label
			$("img[id*='error']").tooltip({
				showURL: false,
				opacity: 0.99,
				fade: 150,
				positionRight: true,
					bodyHandler: function() {
						return $("#"+this.id).attr("hovertext");
					}
			});
			//make sure tool tip is enabled for any new valid label
			$("img[src*='tick.gif']").tooltip({
				showURL: false,
					bodyHandler: function() {
						return "OK";
					}
			});
		}

		$("#loginForm").mouseover(function(){
		      generateTooltips();
		    });
		$("#registroForm").mouseover(function(){
		      generateTooltips();
		    });
		$("#ticketForm").mouseover(function(){
		      generateTooltips();
		    });
		$("#recordarPasswordForm").mouseover(function(){
		      generateTooltips();
		    });
	
		$("#loginForm").validate({
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("td").next("td") );
			},
			rules: { usuario: {required: true},
					password: {required: true}
			},
			messages: { usuario: {required: "<img id='usuarioerror' src='images/unchecked.gif' hovertext='Ingrese el usuario.' />"},
						password: {required: "<img id='passworderror' src='images/unchecked.gif' hovertext='Ingrese el password.' />"},
			}
		});

		$("#recordarPasswordForm").validate({
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("td").next("td") );
			},
			rules: { email: {required: true,
							email: true}
			},
			messages: { email: {required: "<img id='emailerror' src='images/unchecked.gif' hovertext='Ingrese la direccion de email.' />",
								email: "<img id='emailerror' src='images/unchecked.gif' hovertext='Ingrese una direccion de email valida.' />"}
			},
			submitHandler: function() {
				setError('recPassEmail', '');
	            $('#recordarPasswordForm').ajaxSubmit({
	    			type: "POST",
	    			url: "./doRecordarPassword.php",
	    			dataType: "json",
	    			success: postRecordarPassword
	    			});
	        }
		});

		$("#loginForm").ajaxForm({
			type: "POST",
			url: "./doLogin.php",
			dataType: "json",
			success: postLogin
			});

		$("#ticketForm").validate({
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("td").next("td") );
			},
			rules: { codigo: {required: true}
			},
			messages: { codigo: {required: "<img id='codigoerror' src='images/unchecked.gif' hovertext='Ingrese el codigo.' />"}
			},
			submitHandler: function() {
	            $('#ticketForm').ajaxSubmit({
	    			type: "POST",
	    			url: "./doCargaTicket.php",
	    			dataType: "json",
	    			success: postCargaCodigo
	    			});
	        }
		});
		
		/*$("#ticketForm").ajaxForm({
			type: "POST",
			url: "./doCargaTicket.php",
			dataType: "json",
			success: postCargaCodigo
			});*/
	}

);

function closeAnimateCurrentDialog(dialog) {
	dialog.data.fadeOut('slow', function () {
		dialog.container.hide('slow', function () {
			dialog.overlay.slideUp('slow', function () {
				$.modal.close();
			});
		});
	});
}

function closeCurrentModal() {
	$.modal.close();
}

function postRegisto(data) {
	if (data.success == 'yes') {
		logged = true;
		$.modal.close();
	} else {
		if (data.usuario != '') {
			document.getElementById('usuarioerr').innerHTML = "<img id='usuarioerror' src='images/unchecked.gif' hovertext='" + data.usuario + "' />";
		} 
	}
}

function postLogin(data) {
	if (data.success == 'yes') {
		logged = true;
		$.modal.close();
		showCargaCodigoLigthBox();
	} else {
		alert(data.error);
	}
}

function postRecordarPassword(data) {
	if (data.success == 'yes') {
		$.modal.close();
		showClaveEnviadaLigthBox();
	} else {
		setError('recPassEmail', data.error);
	}
}

function register() {
	$.modal.close();
	showRegistroLigthBox();
}

function recordarPassword() {
	$.modal.close();
	showRecordarPasswordLigthBox();
}

function setError(fieldId, err) {
	var obj = document.getElementById(fieldId + "err");
	if (err == '') {
		obj.innerHTML = '';
	} else {
		obj.innerHTML = "<img id='"+fieldId + "error' src='images/unchecked.gif' hovertext='" + err + "' />";
	}
}

function postCargaCodigo(data) {
	if (data.success == 'yes') {
		$.modal.close();
		setError('codigo', '');
		if (data.win == 'yes') {
			document.getElementById('detallePremio').innerHTML = data.iw_desc;
			document.getElementById('imagenPremio').innerHTML = "<img src='getIWImage.php?id="+data.iw_id+"'/>";
			showInstantWinLigthBox();
		} else {
			showGraciasLigthBox();
		}
	} else {
		setError('codigo', data.codigo);
	}
}
</script>
</body>
</html>