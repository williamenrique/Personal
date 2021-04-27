<?php
//retorna la ruta del proyecto
function base_url(){
	return BASE_URL;
}
function headAcceso($data = ""){
	$view_header = VIEWS."Modules/headAcceso.php";
	require_once  $view_header;
}
function footerAcceso($data = ""){
	$view_footer = VIEWS."Modules/footerAcceso.php";
	require_once  $view_footer;
}
function getModal(string $nameModal, $data){
	$view_modal = VIEWS."Modules/Modals/{$nameModal}.php";
	require_once $view_modal;
}
//funciones para la pgina inicial del cliente
function head($data = ""){
	$view_header = VIEWS."Modules/head.php";
	require_once  $view_header;
}
function footer($data = ""){
	$view_footer = VIEWS."Modules/footer.php";
	require_once  $view_footer;
}
//muestra informacion formateada
function dep($data){
	$format = print_r('<pre>');
	$format = print_r($data);
	$format = print_r('</pre>');
	return $format;
}
// encriptar cadenas
function encryption($string){
	$output=FALSE;
	$key=hash('sha256', SECRET_KEY);
	$iv=substr(hash('sha256', SECRET_IV), 0, 16);
	$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
	$output=base64_encode($output);
	return $output;
}
// desencriptar cadenas
function decryption($string){
	$key=hash('sha256', SECRET_KEY);
	$iv=substr(hash('sha256', SECRET_IV), 0, 16);
	$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
	return $output;
}
// modificar fecha y hora para mostrarla en formato
function formatear_timestamp($fecha){
	$dia = date('N', strtotime($fecha));
	$dias = ["Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"];
	$mes = date("m", strtotime($fecha));
	$meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
	$salida = $dias[$dia-1].', '.date("d", strtotime($fecha)).' de '.$meses[$mes-1].' a las '.date("g:i a", strtotime($fecha));
	return $salida;
}
// modificar fecha para mostrarla en formato
function formatear_fecha($fecha){
	$dia = date('N', strtotime($fecha));
	$dias = ["Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"];
	$mes = date("m", strtotime($fecha));
	$ano = date("Y", strtotime($fecha));
	$meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
	$salida = $dias[$dia-1].', '.date("d", strtotime($fecha)).' de '.$meses[$mes-1].' · '.$ano;
	return $salida;
}
// cargar datos del usuario al iniciar sesion o hacer un cambio en el sistema
function sessionUser(int $idUser){
	require_once ("system/app/Models/AccesoModel.php");
	$objLogin = new AccesoModel();
	$request = $objLogin->sessionLogin($idUser);
	return $request;
}
// limpiar cadenas eliminando inyeccion de sentencias
function strClean($srtCadena){
	$string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''],$srtCadena);
	$string = trim($srtCadena);
	$string = stripslashes($srtCadena);
	$string = str_ireplace("<script>","",$string);
	$string = str_ireplace("</script>","",$string);
	$string = str_ireplace("<script src>","",$string);
	$string = str_ireplace("<script type=>","",$string);
	$string = str_ireplace("SELECT * FROM ","",$string);
	$string = str_ireplace("DELETE * FROM ","",$string);
	$string = str_ireplace("INSERT INTO ","",$string);
	$string = str_ireplace("SELECT COUNT(*) FROM ","",$string);
	$string = str_ireplace("DELETE TABLE ","",$string);
	$string = str_ireplace("DROP TABLE ","",$string);
	$string = str_ireplace("OR '1'='1' ","",$string);
	$string = str_ireplace('OR "1"="1" ',"",$string);
	$string = str_ireplace("IS NULL; --","",$string);
	$string = str_ireplace('LIKE "',"",$string);
	$string = str_ireplace("LIKE '","",$string);
	$string = str_ireplace("--","",$string);
	$string = str_ireplace("^","",$string);
	$string = str_ireplace("[","",$string);
	$string = str_ireplace("]","",$string);
	$string = str_ireplace("==","",$string);

	return $string;
}
// generador de codigo de 10 digitos
function passGenerator($length = 10){
	$pass = "";
	$longitud = $length;
	$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$longitudcadena = strlen($cadena);
	for ($i=1; $i <= $longitud; $i++) {
		$pas = rand(0, $longitudcadena -1);
		$pass .= substr($cadena,$pas,1);
	}
	return $pass;
}
// generador de codigo de 4 digitos
function codGenerator($length = 4){
	$pass = "";
	$longitud = $length;
	$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$longitudcadena = strlen($cadena);
	for ($i=1; $i <= $longitud; $i++) {
		$pas = rand(0, $longitudcadena -1);
		$pass .= substr($cadena,$pas,1);
	}
	return $pass;
}
// generar token al azar encriptado
function token(){
	$sr1 = bin2hex(random_bytes(10));
	$sr2 = bin2hex(random_bytes(10));
	$sr3 = bin2hex(random_bytes(10));
	$sr4 = bin2hex(random_bytes(10));
	$token = $sr1 .'-'.$sr2.'-'.$sr3.'-'.$sr4;
	return $token;
}
// para la subida de imagen del usuario avatar
function uploadImage(array $data, string $imgProfile){
	$ulr_temp = $data['tmp_name'];
	$destino = 'system/app/Views/Docs/'.$_SESSION['userData']['codigo'].'/'.$imgProfile;
	$move = move_uploaded_file($ulr_temp, $destino);
	return $move;
}
// obtener los datos del usuario para comparar al momento de desbloquear la cuenta
function getUser(string $strEmail,string $strToken, int $intCi){
	require_once ("system/app/Models/AccesoModel.php");
	$objUser = new AccesoModel();
	$request = $objUser->getUserBlock($strEmail, $strToken,$intCi);
	return $request;
}
// envio de email
function email(string $nombre, string $email, string $asunto, string $mensaje, string $url){
	require_once 'system/core/PHPMailer/send_mail.php';
	$email = strclean(strtolower($email));
	$asunto = strClean($asunto);
	$mensaje = strClean($mensaje);
	$nombre = strClean(ucwords($nombre));
	$urlEnv = base_url().$url;
	if(empty($nombre) || empty($email ) || empty($asunto ) || empty($mensaje )){
				$arrResponse = array("status" => false, "msg" => "Debe llenar los campos");
	}else{
		// configuro direccion de envio
		$mail->setFrom($email, $nombre);
		// $mail->setFrom($destinatario, $nom);
		// ASUNTO DEL MENSAJE: Debe trarse de la config del cliente
		$mail->Subject = $asunto;
		// borro y seteo la direccion de respuesta
		$mail->clearReplyTos();
		$mail->addReplyTo($email);
		// armo el body
	$message  = "<html><body>";
	$message .= "
		<table border='0' cellpadding='0' cellspacing='0' id='m_7161113079002404850body' style='text-align:center;min-width:640px;width:100%;margin:0;padding:0' bgcolor='#fafafa'>
			<tbody>
					<tr>
							<td style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;height:4px;font-size:4px;line-height:4px' bgcolor='#6b4fbb'></td>
					</tr>
					<tr>
							<td style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:13px;line-height:1.6;color:#5c5c5c;padding:25px 0'>

									<img alt='Work' src='' width='55' height='50' class='CToWUd'>
							</td>
					</tr>
					<tr>
							<td style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif'>
									<table border='0' cellpadding='0' cellspacing='0' class='m_7161113079002404850wrapper' style='width:640px;border-collapse:separate;border-spacing:0;margin:0 auto'>
											<tbody>
													<tr>
															<td class='m_7161113079002404850wrapper-cell' style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;border-radius:3px;overflow:hidden;padding:18px 25px;border:1px solid #ededed' align='left' bgcolor='#fff'>
																	<table border='0' cellpadding='0' cellspacing='0' style='width:100%;border-collapse:separate;border-spacing:0'>
																			<tbody>
																					<tr>
																							<td style='font-family:' Helvetica Neue ',Helvetica,Arial,sans-serif;color:#333333;font-size:15px;font-weight:400;line-height:1.4;padding:15px
													5px' align='center'>
																									<h1 style='font-family:' Helvetica Neue ',Helvetica,Arial,sans-serif;color:#333333;font-size:18px;font-weight:400;line-height:1.4;margin:0;padding:0' align='center'>Hola Sr(@). {$nombre}</h1>
																									<p>{$mensaje}</p>
																									<p>Si no realizó esta solicitud, puede ignorar este correo electrónico.</p>
																									<p>De lo contrario, haga clic en el enlace a continuación para completar el proceso.</p>
																									<div id=''>
																											<a href='{$urlEnv}'style='color:#3777b0;text-decoration:none' target='_blank'>Ir a tu cuenta</a>
																									</div>

																							</td>
																					</tr>

																			</tbody>
																	</table>
															</td>
													</tr>
											</tbody>
									</table>
							</td>
					</tr>


					<tr>
							<td style='font-family:' Helvetica Neue ',Helvetica,Arial,sans-serif;font-size:13px;line-height:1.6;color:#5c5c5c'>
									<div>
											Everyone can contribute
									</div>
									<div>
											<div class='adm'>
													<div id='q_25' class='ajR h4'>
															<div class='ajT'></div>
													</div>
											</div>
											<div class='h5'>
													<div>
															<a style='color:#3777b0;text-decoration:none' href='https://about.gitlab.com/blog/' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://about.gitlab.com/blog/&amp;source=gmail&amp;ust=1618515550924000&amp;usg=AFQjCNGo4nXFJ1-twIeNHJ82j2IiJEiDIQ'>Blog</a>                            ·
															<a style='color:#3777b0;text-decoration:none' href='https://twitter.com/gitlab' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://twitter.com/gitlab&amp;source=gmail&amp;ust=1618515550924000&amp;usg=AFQjCNHulIjb4gFPrI6CHJFh9uX9eg6lVA'>Twitter</a>                            ·
															<a style='color:#3777b0;text-decoration:none' href='https://www.facebook.com/gitlab/' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://www.facebook.com/gitlab/&amp;source=gmail&amp;ust=1618515550924000&amp;usg=AFQjCNGrhiwLCxplTNxL0mVYPfMQggYWgw'>Facebook</a>                            ·
															<a style='color:#3777b0;text-decoration:none' href='https://www.youtube.com/channel/UCnMGQ8QHMAnVIsI3xJrihhg' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://www.youtube.com/channel/UCnMGQ8QHMAnVIsI3xJrihhg&amp;source=gmail&amp;ust=1618515550924000&amp;usg=AFQjCNE5Q7QrrEePwC8u_CBm6mva7Fgvpw'>YouTube</a>                            ·
															<a style='color:#3777b0;text-decoration:none' href='https://www.linkedin.com/company/gitlab-com' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://www.linkedin.com/company/gitlab-com&amp;source=gmail&amp;ust=1618515550924000&amp;usg=AFQjCNGZ11YLZBbbRNhuV3GE9Qv_abNukw'>LinkedIn</a>
													</div>
											</div>
									</div>
							</td>
					</tr>

					<tr>
							<td style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:13px;line-height:1.6;color:#5c5c5c;padding:25px 0'>

							</td>
					</tr>
			</tbody>
		</table>
	";
	$message .= "</body></html>";
		// asigno el cuerpo a la clase
		$mail->msgHTML($message);
		// borro y seteo el email del Destinatario
		$mail->ClearAllRecipients();
		// $mail->addAddress($destinatario, "");
		$mail->addAddress($email, $nombre);
		// Success
		$mail->send();	
	}
}
// enviar email para avisar que esta bloqueada la cuenta y envio de token para desbloquear
function emailBlok($email, $asunto, $mensaje,$token,$nombre,$intUserId,$intUserCi,$tipo){
	require_once 'system/core/PHPMailer/send_mail.php';
	$email = strclean(strtolower($email));
	$asunto = strClean($asunto);
	$mensaje = strClean($mensaje);
	$nombre = ucwords($nombre);
	$emailEncrip = encryption($email);
	$urlEnv = base_url()."acceso/{$tipo}?reset_password_token={$token}&email={$emailEncrip}&id={$intUserId}&ci={$intUserCi}";
	// $urlEnv = "http://project.lat/acceso/disblockCount?reset_password_token={$token}&email={$emailEncrip}&id={$intUserId}&ci={$intUserCi}";
	// configuro direccion de envio
	$mail->setFrom($email, $nombre);
	// $mail->setFrom($destinatario, $nom);
	// ASUNTO DEL MENSAJE: Debe trarse de la config del cliente
	$mail->Subject = $asunto;
	// borro y seteo la direccion de respuesta
	$mail->clearReplyTos();
	$mail->addReplyTo($email);
	// armo el body
	$message  = "<html><body>";
	$message .= "
		<table border='0' cellpadding='0' cellspacing='0' id='m_7161113079002404850body' style='text-align:center;min-width:640px;width:100%;margin:0;padding:0' bgcolor='#fafafa'>
			<tbody>
					<tr>
							<td style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;height:4px;font-size:4px;line-height:4px' bgcolor='#6b4fbb'></td>
					</tr>
					<tr>
							<td style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:13px;line-height:1.6;color:#5c5c5c;padding:25px 0'>

									<img alt='Work' src='' width='55' height='50' class='CToWUd'>
							</td>
					</tr>
					<tr>
							<td style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif'>
									<table border='0' cellpadding='0' cellspacing='0' class='m_7161113079002404850wrapper' style='width:640px;border-collapse:separate;border-spacing:0;margin:0 auto'>
											<tbody>
													<tr>
															<td class='m_7161113079002404850wrapper-cell' style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;border-radius:3px;overflow:hidden;padding:18px 25px;border:1px solid #ededed' align='left' bgcolor='#fff'>
																	<table border='0' cellpadding='0' cellspacing='0' style='width:100%;border-collapse:separate;border-spacing:0'>
																			<tbody>
																					<tr>
																							<td style='font-family:' Helvetica Neue ',Helvetica,Arial,sans-serif;color:#333333;font-size:15px;font-weight:400;line-height:1.4;padding:15px
													5px' align='center'>
																									<h1 style='font-family:' Helvetica Neue ',Helvetica,Arial,sans-serif;color:#333333;font-size:18px;font-weight:400;line-height:1.4;margin:0;padding:0' align='center'>Hola Sr(@). {$nombre}</h1>
																									<p>{$mensaje}</p>
																									<p>Si no realizó esta solicitud, puede ignorar este correo electrónico.</p>
																									<p>De lo contrario, haga clic en el enlace a continuación para completar el proceso.</p>
																									<div id=''>
																											<a href='{$urlEnv}'style='color:#3777b0;text-decoration:none' target='_blank'>Reestablecer cuenta</a>
																									</div>

																							</td>
																					</tr>

																			</tbody>
																	</table>
															</td>
													</tr>
											</tbody>
									</table>
							</td>
					</tr>


					<tr>
							<td style='font-family:' Helvetica Neue ',Helvetica,Arial,sans-serif;font-size:13px;line-height:1.6;color:#5c5c5c'>
									<div>
											Everyone can contribute
									</div>
									<div>
											<div class='adm'>
													<div id='q_25' class='ajR h4'>
															<div class='ajT'></div>
													</div>
											</div>
											<div class='h5'>
													<div>
															<a style='color:#3777b0;text-decoration:none' href='https://about.gitlab.com/blog/' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://about.gitlab.com/blog/&amp;source=gmail&amp;ust=1618515550924000&amp;usg=AFQjCNGo4nXFJ1-twIeNHJ82j2IiJEiDIQ'>Blog</a>                            ·
															<a style='color:#3777b0;text-decoration:none' href='https://twitter.com/gitlab' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://twitter.com/gitlab&amp;source=gmail&amp;ust=1618515550924000&amp;usg=AFQjCNHulIjb4gFPrI6CHJFh9uX9eg6lVA'>Twitter</a>                            ·
															<a style='color:#3777b0;text-decoration:none' href='https://www.facebook.com/gitlab/' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://www.facebook.com/gitlab/&amp;source=gmail&amp;ust=1618515550924000&amp;usg=AFQjCNGrhiwLCxplTNxL0mVYPfMQggYWgw'>Facebook</a>                            ·
															<a style='color:#3777b0;text-decoration:none' href='https://www.youtube.com/channel/UCnMGQ8QHMAnVIsI3xJrihhg' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://www.youtube.com/channel/UCnMGQ8QHMAnVIsI3xJrihhg&amp;source=gmail&amp;ust=1618515550924000&amp;usg=AFQjCNE5Q7QrrEePwC8u_CBm6mva7Fgvpw'>YouTube</a>                            ·
															<a style='color:#3777b0;text-decoration:none' href='https://www.linkedin.com/company/gitlab-com' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://www.linkedin.com/company/gitlab-com&amp;source=gmail&amp;ust=1618515550924000&amp;usg=AFQjCNGZ11YLZBbbRNhuV3GE9Qv_abNukw'>LinkedIn</a>
													</div>
											</div>
									</div>
							</td>
					</tr>

					<tr>
							<td style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:13px;line-height:1.6;color:#5c5c5c;padding:25px 0'>

							</td>
					</tr>
			</tbody>
		</table>
	";
	$message .= "</body></html>";
	// asigno el cuerpo a la clase
	$mail->msgHTML($message);
	// borro y seteo el email del Destinatario
	$mail->ClearAllRecipients();
	// $mail->addAddress($destinatario, "");
	$mail->addAddress($email, $nombre);
	// Success
	$mail->send();
	// if ($mail->send()) {
	// $arrResponse = array("statusEmail" => true, "msg" => "Email enviado");
	// } else {
	// $arrResponse = array("statusEmail" => false, "msg" => "A ocurrio un error");
	// }
	// echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
}
// enviar email de preguntas
function emailQuestion($rows){
	require_once 'system/core/PHPMailer/send_mail.php';
	$strAsunto = strClean($rows['strAsunto']);
	$strEmail = strClean($rows['strEmail']);
	$strMensaje = strClean($rows['strMensaje']);
	$strP1 = strClean($rows['strP1']);
	$strP2 = strClean($rows['strP2']);
	$strP3 = strClean($rows['strP3']);
	$strR1 = strClean($rows['strR1']);
	$strR2 = strClean($rows['strR2']);
	$strR3 = strClean($rows['strR3']);
	$strFecha = $rows['strFecha'];
	$strNombre = ucwords($rows['strNombre']);
	// $emailEncrip = encryption($email);
	// $urlEnv = base_url()."acceso/{$tipo}?reset_password_token={$token}&email={$emailEncrip}&id={$intUserId}&ci={$intUserCi}";
	// configuro direccion de envio
	$mail->setFrom($strEmail, $strNombre);
	// $mail->setFrom($destinatario, $nom);
	// ASUNTO DEL MENSAJE: Debe trarse de la config del cliente
	$mail->Subject = $strAsunto;
	// borro y seteo la direccion de respuesta
	$mail->clearReplyTos();
	$mail->addReplyTo($strEmail);
	// armo el body
	$message  = "<html><body>";
	$message .= "
		<table border='0' cellpadding='0' cellspacing='0' id='m_7161113079002404850body' style='text-align:center;min-width:640px;width:100%;margin:0;padding:0' bgcolor='#fafafa'>
			<tbody>
					<tr>
							<td style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;height:4px;font-size:4px;line-height:4px' bgcolor='#6b4fbb'></td>
					</tr>
					<tr>
							<td style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:13px;line-height:1.6;color:#5c5c5c;padding:25px 0'>

									<img alt='Work' src='' width='55' height='50' class='CToWUd'>
							</td>
					</tr>
					<tr>
							<td style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif'>
									<table border='0' cellpadding='0' cellspacing='0' class='m_7161113079002404850wrapper' style='width:640px;border-collapse:separate;border-spacing:0;margin:0 auto'>
											<tbody>
													<tr>
															<td class='m_7161113079002404850wrapper-cell' style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;border-radius:3px;overflow:hidden;padding:18px 25px;border:1px solid #ededed' align='left' bgcolor='#fff'>
																	<table border='0' cellpadding='0' cellspacing='0' style='width:100%;border-collapse:separate;border-spacing:0'>
																			<tbody>
																					<tr>
																							<td style='font-family:' Helvetica Neue ',Helvetica,Arial,sans-serif;color:#333333;font-size:15px;font-weight:400;line-height:1.4;padding:15px 5px' align=''>
																									<h1 style='font-family:' Helvetica Neue ',Helvetica,Arial,sans-serif;color:#333333;font-size:18px;font-weight:400;line-height:1.4;margin:0;padding:0' align='center'>Hola Sr(@). {$strNombre}</h1>
																									<p>{$strMensaje}</p>
																									<ul >
																										<li>Pregunta #1 : <span style = 'color:#6b4fbb; font-weight:700'>{$strP1}</span></li>
																										<li>Respuesta #1 : <span style = 'color:#6b4fbb; font-weight:700'>{$strR1}</span></li>
																										<li>Pregunta #2 : <span style = 'color:#6b4fbb; font-weight:700'>{$strP2}</span></li>
																										<li>Respuesta #2 : <span style = 'color:#6b4fbb; font-weight:700'>{$strR2}</span></li>
																										<li>Pregunta #3 : <span style = 'color:#6b4fbb; font-weight:700'>{$strP3}</span></li>
																										<li>Respuesta #3 : <span style = 'color:#6b4fbb; font-weight:700'>{$strR3}</span></li>
																									</ul>
																									<p>Fecha de la actualizacion {$strFecha}</p>
																									<p>Si no realizó esta solicitud, puede ignorar este correo electrónico, de lo contrario pongase en contacto con su administrador.</p>
																							</td>
																					</tr>
																			</tbody>
																	</table>
															</td>
													</tr>
											</tbody>
									</table>
							</td>
					</tr>


					<tr>
							<td style='font-family:' Helvetica Neue ',Helvetica,Arial,sans-serif;font-size:13px;line-height:1.6;color:#5c5c5c'>
									<div>
											Everyone can contribute
									</div>
									<div>
											<div class='adm'>
													<div id='q_25' class='ajR h4'>
															<div class='ajT'></div>
													</div>
											</div>
											<div class='h5'>
													<div>
															<a style='color:#3777b0;text-decoration:none' href='https://about.gitlab.com/blog/' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://about.gitlab.com/blog/&amp;source=gmail&amp;ust=1618515550924000&amp;usg=AFQjCNGo4nXFJ1-twIeNHJ82j2IiJEiDIQ'>Blog</a>                            ·
															<a style='color:#3777b0;text-decoration:none' href='https://twitter.com/gitlab' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://twitter.com/gitlab&amp;source=gmail&amp;ust=1618515550924000&amp;usg=AFQjCNHulIjb4gFPrI6CHJFh9uX9eg6lVA'>Twitter</a>                            ·
															<a style='color:#3777b0;text-decoration:none' href='https://www.facebook.com/gitlab/' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://www.facebook.com/gitlab/&amp;source=gmail&amp;ust=1618515550924000&amp;usg=AFQjCNGrhiwLCxplTNxL0mVYPfMQggYWgw'>Facebook</a>                            ·
															<a style='color:#3777b0;text-decoration:none' href='https://www.youtube.com/channel/UCnMGQ8QHMAnVIsI3xJrihhg' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://www.youtube.com/channel/UCnMGQ8QHMAnVIsI3xJrihhg&amp;source=gmail&amp;ust=1618515550924000&amp;usg=AFQjCNE5Q7QrrEePwC8u_CBm6mva7Fgvpw'>YouTube</a>                            ·
															<a style='color:#3777b0;text-decoration:none' href='https://www.linkedin.com/company/gitlab-com' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://www.linkedin.com/company/gitlab-com&amp;source=gmail&amp;ust=1618515550924000&amp;usg=AFQjCNGZ11YLZBbbRNhuV3GE9Qv_abNukw'>LinkedIn</a>
													</div>
											</div>
									</div>
							</td>
					</tr>

					<tr>
							<td style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:13px;line-height:1.6;color:#5c5c5c;padding:25px 0'>

							</td>
					</tr>
			</tbody>
		</table>
	";
	$message .= "</body></html>";
	// asigno el cuerpo a la clase
	$mail->msgHTML($message);
	// borro y seteo el email del Destinatario
	$mail->ClearAllRecipients();
	// $mail->addAddress($destinatario, "");
	$mail->addAddress($strEmail, $strNombre);
	// Success
	$mail->send();
}