<?php 
	header("Content-type: text/html; charset=utf-8");
	require("funcionesDB.php");
	include_once('phpmail/class.phpmailer.php');
	include("constantes_mail.php");
	
	// Inicio conexion
	$connection = mysql_connect(DB_SERVER,DB_USER, DB_PASS) or die ("Problemas en la conexion");
	mysql_select_db(DB_NAME,$connection);

	$email = $_POST['email'];	
	$email = quote_smart($email, $connection);
	
	$SQL = "SELECT * FROM SYSTEMUSER WHERE email = $email";
	$result = mysql_query($SQL);
	$num_rows = mysql_num_rows($result);
	if ($result) {
		// Si encontre el usuario le mando el email
		if ($num_rows == 1) {

			$result_user = mysql_fetch_array($result);
			$nombre = $result_user['nombre'];
			$apellido = $result_user['apellido'];
			$usuario = $result_user['usuario'];
			$password = $result_user['password'];
			
			$emailto = $result_user['email'];
			$mail = new PHPMailer(); // defaults to using php "mail()"
			
			//$mail->Mailer = 'smtp';
			$mail->SMTPDebug = true;
			$mail->From       = EMAIL_FROM;
			$mail->FromName   = EMAIL_FROM_NAME;
			//Headers
			$headers['X-Mailer'] = 'X-Mailer: PHP/' . phpversion();
			$mail -> AddCustomHeader($headers);
			$mail->Subject    = PASSWORD_REMINDER_SUBJECT;
			$mail->AltBody    = PASSWORD_REMINDER_BODY_ALT;
			//$body             = $mail->getFile('password_reminder.html');
			$mail->MsgHTML("$body");
			$mail->AddAddress("$emailto", "$nombre $apellido");
			if(!$mail->Send()) {
				$err_mail = $mail->ErrorInfo;
				//$output = '{ "success": "no", "error": "$err_mail" }';
				$output = $err_mail;
			} else {
				$output = '{ "success": "yes", "error": "" }';
			}
		} else {
			// Si ya fue cargado, doy mensaje de error
			$output = '{ "success": "no", "error": "No existe usuario con ese email." }';
		}
	} else {
		$output = '{ "success": "no", "error": "Error generico." }';
	}
	// Cierre conexion
	mysql_close($connection);
	//validar todo lo que haga falta, campo a campo
	
	$output = str_replace("\r", "", $output);
	$output = str_replace("\n", "", $output);
	echo $output;
?>