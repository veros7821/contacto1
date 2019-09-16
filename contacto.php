<?php
if ($_POST) {
require ("PHPMailer/class.phpmailer.php");
require("PHPMailer/class.smtp.php");


	$visitante_nombre = "";
	$visitante_email = "";
	$visitante_asunto = "";
	$visitante_mensaje = "";
	
	if (isset ($_POST ['visitante_nombre'] )) {
		$visitante_nombre = filter_var ( $_POST ['visitante_nombre'], FILTER_SANITIZE_STRING );
	}
	
	if (isset ( $_POST ['visitante_email'] )) {
		$visitante_email = str_replace ( array (
				"\r",
				"\n",
				"%0a",
				"%0d" 
		), '', $_POST ['visitante_email'] );
		$visitante_email = filter_var ($_POST ['visitante_email'], FILTER_VALIDATE_EMAIL );
	}
	
	if (isset ( $_POST ['visitante_asunto'] )) {
		$visitante_asunto = filter_var ( $_POST ['visitante_asunto'], FILTER_SANITIZE_STRING );
	}
	
	if (isset ( $_POST ['visitante_mensaje '] )) {
		$visitante_mensaje = htmlspecialchars ( $_POST ['visitante_mensaje'] );
	}
	
	$smtpHost = "SMTP.gmail.com";  // Dominio alternativo brindado en el email de alta
	$smtpUsuario = "veros7821@gmail.com";  // Mi cuenta de correo
	$smtpClave = "bIANCA13";  // Mi contraseña
	
	$mail = new PHPMailer();
	$mail->IsSMTP ();
	$mail->SMTPAuth = true;
	$mail->Host = "SMTP.gmail.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
	$mail->Username = "veros7821@gmail.com"; // Correo completo a utilizar
	$mail->Password = "bIANCa"; // Contraseña
	$mail->Port = 587; // Puerto a utilizar
	$mail->From = $visitante_email; // Desde donde enviamos (Para mostrar)
	$mail->FromName = $visitante_nombre;
	$mail->AddAddress ( "veros7821@gmail.com" ); // Esta es la dirección a donde enviamos
	$mail->Subject = $visitante_asunto; // Este es el titulo del email.
	
	$body = $visitante_mensaje;
	$mail->Body = 
	"
	<html>
	
	<body>
	
	<h1>Recibiste un nuevo mensaje desde el formulario de contacto</h1>
	
	<p>Informacion enviada por el usuario de la web:</p>
	
	<p>nombre: {$visitante_nombre}</p>
	
	<p>email: {$visitante_email}</p>
	

	
	<p>asunto: {$visitante_asunto}</p>
	
	<p>mensaje: {$visitante_mensaje}</p>
	
	</body>
	
	</html>
	
	<br />"; // Texto del email en formato HTML
	$mail->AltBody = "{$visitante_mensaje} \n\n "; // Texto sin formato HTML
	
	$mail->SMTPOptions = array(
			'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
			)
	);
	$exito = $mail->Send(); // Envía el correo.
	
	if ($exito) {
		echo "El correo fue enviado correctamente.";
	} else {
		echo "Hubo un inconveniente. Contacta a un administrador.";
	}
}
?>

