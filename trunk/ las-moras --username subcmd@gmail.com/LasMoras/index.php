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
<style>
em.error {
	background:url("images/unchecked.gif") no-repeat 0px 0px;
/*  padding-left: 16px;*/
}
em.success {
	background:url("images/checked.gif") no-repeat 0px 0px;
 /* padding-left: 16px;*/
}
em.error { color: black; }
#warning { display: none; }
</style>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="centralContent">
	<div id="promoButtons"><a href='#' class='cargaCodigo' id="cargaCodigo"><img src="images/buttons/cargaElCodigo.gif" width="336" height="45" border="0"></a><a href="premios.html"><img src="images/buttons/miraLosPremios.gif" width="336" height="45" border="0"></a></div>
	<div id="footer">
		<div id="legal"><a href="javascript:openLegal();">Bases y condiciones del sitio</a></div>
		<div id="socialHub">
			<div class="fb-like" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true"></div>
			<a href="https://twitter.com/share" class="twitter-share-button" data-count="none" data-lang="es">Twittear</a><br>
			<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
			<a href="javascript:showCompartirEmailLigthBox()"><img src="images/buttons/email.gif" width="39" height="30" border="0"></a></div>
	</div>
</div>
<!-- preload the images -->
<div style="display:none">
	<img src="images/buttons/botonX.png" alt="" />
	<img src="images/buttons/cargaElCodigo.gif" alt="" />
	<img src="images/buttons/miraLosPremios.gif" alt="" />
	<img src="images/buttons/fb.gif" alt="" />
	<img src="images/buttons/tw.gif" alt="" />
	<img src="images/buttons/email.gif" alt="" />
</div>
<!--
<a href='#' class='registrate' id="registro">Registrate</a>
<a href='#' class='recordarPassword' id="recordarPassword">Recordar password</a>
-->
<!-- modal registro display:block; -->
<div id="basic-modal-registro">
	<form action="doRegistro.php" name="registroForm" id="registroForm" method="POST">
		<table width="406" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="90" height="30"><img src="images/null.gif" width="90" height="10"></td>
				<td width="300"><input type="text" name="nombre"></td>
				<td width="16"></td>
			</tr>
			<tr>
				<td colspan="3" height="16"><img src="images/null.gif" width="20" height="16"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="text" name="apellido"></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3" height="18"><img src="images/null.gif" width="20" height="18"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="text" name="documento"></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3" height="14"><img src="images/null.gif" width="20" height="14"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="text" name="email"></td>
				<td width="25" id="emailerr"></td>
			</tr>
			<tr>
				<td colspan="3" height="18"><img src="images/null.gif" width="20" height="18"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="text" name="edad"></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3" height="20"><img src="images/null.gif" width="20" height="20"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="text" name="usuario"></td>
				<td width="25" id="usuarioerr"></td>
			</tr>
			<tr>
				<td colspan="3" height="18"><img src="images/null.gif" width="20" height="18"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="password" name="password"></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3" height="10"><img src="images/null.gif" width="20" height="10"></td>
			</tr>
			<tr>
				<td colspan="3" align="right"><input type="submit" class="submitButton" value=" "></td>
			</tr>
		</table>
	</form>
</div>
	
<!-- modal login -->
<div id="basic-modal-login">
	<form action="doLogin.php" name="loginForm" id="loginForm" method="POST">
		<table width="396" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="80" height="30"><img src="images/null.gif" width="80" height="10"></td>
				<td width="300"><input type="text" name="usuario"></td>
				<td width="16" id="loginusuarioerr"></td>
			</tr>
			<tr>
				<td colspan="3" height="16"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="password" name="password"></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3" height="10"></td>
			</tr>
			<tr>
				<td colspan="3" height="120" align="right"><input type="submit" class="loginButton" value=" "></td>
			</tr>
			<tr>
				<td colspan="3">
					<table border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td>SI NO EST&Aacute;S REGISTRADO, <br><a href="javascript:register()">HAC&Eacute; CLIC AC&Aacute;.</a></td>
							<td width="60"></td>
							<td>OLVIDASTE TU PASSWORD?,<br><a href="javascript:recordarPassword()">HAC&Eacute; CLIC AC&Aacute;.</a></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>
</div>

<!-- modal carga codigo -->
<div id="basic-modal-cargaCodigo">
	<form action="doCargaTicket.php" name="ticketForm" id="ticketForm" method="POST">
		<table width="406" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="140" height="30"></td>
				<td width="241"><input type="text" name="codigo" id="codigo"></td>
				<td width="25" id="codigoerr"></td>
			</tr>
			<tr>
				<td colspan="3" height="50"></td>
			</tr>
			<tr>
				<td colspan="3" align="right"><input type="submit" class="codeButton" value=" " border="0"></td>
			</tr>
		</table>
	</form>
</div>

<!-- modal recordar password -->
<div id="basic-modal-recordarPassword">
	<form action="doRecordarPassword.php" name="recordarPasswordForm" id="recordarPasswordForm" method="POST">
		<table width="401" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="85" height="30"><img src="images/null.gif" width="85" height="10"></td>
				<td width="290"><input type="text" name="email" id="emailrecordar"></td>
				<td width="26" id="recPassEmailerr"></td>
			</tr>
			<tr>
				<td colspan="3" height="70"></td>
			</tr>
			<tr>
				<td colspan="3" align="right"><input type="submit" class="passRecoveryButton" value=" " border="0"></td>
			</tr>
		</table>
	</form>
</div>

<!-- modal share email-->
<div id="basic-modal-compartirEmail">
	<form action="doCompartirEmail.php" name="compartirEmailForm" id="compartirEmailForm" method="POST">
		<table width="401" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="85" height="30"><img src="images/null.gif" width="85" height="10"></td>
				<td width="290"><input type="text" name="email" id="emailcompartir"></td>
				<td width="25" id="emailcompartirerr"></td>
			</tr>
			<tr>
				<td colspan="3" height="70"></td>
			</tr>
			<tr>
				<td colspan="3" align="right"><input type="submit" class="shareButton" value=" " border="0"></td>
			</tr>
		</table>
	</form>
</div>

<!-- modal gracias por compartir -->
<div id="basic-modal-compartirEmailGracias">
	<table width="457" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td height="300"><img src="images/null.gif" width="1" height="300"></td>
		</tr>
		<tr>
			<td align="center"><a href="javascript:closeCurrentModal();">sss</a></td>
		</tr>
	</table>
</div>

<!-- modal gracias por registrarte -->
<div id="basic-modal-graciasPorRegistrarte">
	<table width="420" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td height="300"><img src="images/null.gif" width="1" height="300"></td>
		</tr>
		<tr>
			<td align="right"><a href="javascript:closeCurrentModal();"><img src="images/buttons/ingresar.png" width="159" height="45" border="0"></a></td>
		</tr>
	</table>
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
		persist: true
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

function showRegistradoLigthBox() {
	$('#basic-modal-graciasPorRegistrarte').modal({
		overlayId: 'registroGracias-overlay',
		containerId: 'registroGracias-container',
		onClose: function (dialog) {closeAnimateCurrentDialog(dialog);}
	});
}

function showCompartirEmailLigthBox() {
	$('#basic-modal-compartirEmail').modal({
		overlayId: 'compartirEmail-overlay',
		containerId: 'compartirEmail-container'
	});
}

function showCompartirEmailGraciasLigthBox() {
	$('#basic-modal-compartirEmailGracias').modal({
		overlayId: 'compartirEmailGracias-overlay',
		containerId: 'compartirEmailGracias-container'
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
		
		/*$("#registroForm").ajaxForm({
			type: "POST",
			url: "./doRegistro.php",
			dataType: "json",
			success: postRegisto
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
		$("#compartirEmailForm").mouseover(function(){
		      generateTooltips();
		    });

		$("#registroForm").validate({
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("td").next("td") );
			},
			rules: { nombre: {required: true},
					apellido: {required: true},
					documento: {required: true, maxlength: 9},
					email: {required: true, email: true},
					edad: {required: true, min: 18},
					usuario: {required: true},
					password: {required: true}
			},
			messages: {
				nombre: {required: "<img id='usuarioerror' src='images/unchecked.gif' hovertext='Ingrese el nombre.' />"}, 
				apellido: {required: "<img id='apellidoerror' src='images/unchecked.gif' hovertext='Ingrese el apellido.' />"},
				documento: {required: "<img id='docerror' src='images/unchecked.gif' hovertext='Ingrese el documento.' />",
						maxlength: "<img id='docerror' src='images/unchecked.gif' hovertext='El documento debe tener hasta 9 numeros.' />"},
				email: {required: "<img id='emailerror' src='images/unchecked.gif' hovertext='Ingrese el email.' />",
						email: "<img id='emailerror' src='images/unchecked.gif' hovertext='Ingrese un email valido.' />"},
				edad: {required: "<img id='edaderror' src='images/unchecked.gif' hovertext='Ingrese la edad.' />",
						digits: "<img id='edaderror' src='images/unchecked.gif' hovertext='Ingrese un numero.' />",
						min: "<img id='edaderror' src='images/unchecked.gif' hovertext='Para participar de la promo debe se mayor de edad.' />"},
				usuario: {required: "<img id='usuarioerror' src='images/unchecked.gif' hovertext='Ingrese el usuario.' />"},
				password: {required: "<img id='passworderror' src='images/unchecked.gif' hovertext='Ingrese el password.' />"},
			},
			submitHandler: function() {
				//setError('loginusuario', '');
	            $('#registroForm').ajaxSubmit({
	    			type: "POST",
	    			url: "./doRegistro.php",
	    			dataType: "json",
	    			success: postRegisto
	    			});
	        }
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
			},
			submitHandler: function() {
				setError('loginusuario', '');
	            $('#loginForm').ajaxSubmit({
	    			type: "POST",
	    			url: "./doLogin.php",
	    			dataType: "json",
	    			success: postLogin
	    		});
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

		$("#compartirEmailForm").validate({
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("td").next("td") );
			},
			rules: { email: {required: true, email: true}
		},
		messages: {
			email: {required: "<img id='emailerror' src='images/unchecked.gif' hovertext='Ingrese el email.' />",
					email: "<img id='emailerror' src='images/unchecked.gif' hovertext='Ingrese un email valido.' />"}
		},
			submitHandler: function() {
	            $('#compartirEmailForm').ajaxSubmit({
	    			type: "POST",
	    			url: "./doCompartirEmail.php",
	    			dataType: "json",
	    			success: postCompartirEmail
	    			});
	        }
		});

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
	setError('usuario', '');
	setError('email', '');
	if (data.success == 'yes') {
		logged = true;
		$.modal.close();
		showRegistradoLigthBox();
	} else {
		setError('usuario', data.usuario);
		setError('email', data.email);
	}
}

function postLogin(data) {
	if (data.success == 'yes') {
		logged = true;
		$.modal.close();
		showCargaCodigoLigthBox();
	} else {
		setError('loginusuario', data.error);
	}
}

function postRecordarPassword(data) {
	setError('recPassEmail', '');
	if (data.success == 'yes') {
		$.modal.close();
		showClaveEnviadaLigthBox();
	} else {
		setError('recPassEmail', data.error);
	}
}

function postCompartirEmail(data) {
	setError('emailcompartir', '');
	if (data.success == 'yes') {
		$.modal.close();
		showCompartirEmailGraciasLigthBox();
	} else {
		setError('emailcompartir', data.error);
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
	if (err == null || err == '') {
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