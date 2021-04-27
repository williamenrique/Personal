<?php
class Acceso extends Controllers{
	public function __construct(){
		session_start();
		if (isset($_SESSION['login'])) {
			header("Location:".base_url().'home');
		}
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	/**
	 * cargar vista login y metodos
	 */
	public function login(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_title'] = "Acceso - Login";
		$data['page_name'] = "login";
		$data['page_functions'] = "function.login.js";
		$this->views->getViews($this, "login", $data);
	}
	// iniciar sesion
	public function loginUser(){
		if($_POST){
			if(empty($_POST['textUser']) || empty($_POST['textPass'])){
				$arrResponse = array('status' => false, 'msg' => 'Error en datos');
			}else{
				$strUser = strtolower($_POST['textUser']);
				$strPass = encryption($_POST['textPass']);
				$requestUserNick = $this->model->user($strUser);
				$arrDataInt = $requestUserNick;
				if($arrDataInt['user'] == "" && $arrDataInt['user'] != $strUser && $arrDataInt['email'] != $strUser){
					$arrResponse = array('status' => false, 'msg' => 'Usuario incorrecto o inhabilitado');
				}else if ($arrDataInt['intentos'] >= 0 AND $arrDataInt['intentos'] < 3) {
						$requestUser = $this->model->loginUser($strUser,$strPass);
						if(empty($requestUser)){
							if($requestUser['user'] !=  $strUser){
								$opcion = 1;
								$intentofail = $this->model->updateBlock($arrDataInt['user_id'], $arrDataInt['intentos'] , $opcion);
								$arrResponse = array('status' => false, 'msg' => 'Datos incorrectos Cuenta sera <br>bloqueada intentos '.($arrDataInt['intentos'] + 1));
							}else{
								$arrResponse = array('status' => false, 'msg' => 'Datos incorrectos ');		
							}
						}else{
							$arrData = $requestUser;
							if ($arrData['status'] == 1) {
								$_SESSION['idUser'] = $arrData['user_id'];
								$_SESSION['login'] = true;
								$arrData = $this->model->sessionLogin($_SESSION['idUser']);
								//creamos la variable de sesion mediante un helper
								sessionUser($_SESSION['idUser']);
								$arrResponse = array('status' => true, 'msg' => 'ok');
							}else{
									$arrResponse = array('status' => false, 'msg' => 'Cuenta bloqueada');
							}
						}
				}else if($arrDataInt['intentos'] == 3){
					$strCodigo = token();
					$arrResponse = array('status' => false, 'msg' => 'Cuenta bloqueada <br>se le envio un correo');
					$opcion = 1;
					$tipo = "disblockCount";
					$intentofail = $this->model->genToken($arrDataInt['user_id'], $strCodigo , $opcion);
					$email = emailBlok($arrDataInt['email'],"Desbloquear cuenta","Hemos detectado que tiene la cuenta bloqueada, estas de suerte puedes reestablecerla siguendos los pasos",$strCodigo,$arrDataInt['nombre'],$arrDataInt['user_id'],$arrDataInt['ci'], $tipo);
				}	
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	/**
	 * cargar vista de registro y metodos
	 */
	public function register(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_title'] = "Acceso - registro";
		$data['page_name'] = "register";
		$data['page_functions'] = "function.login.js";
		$this->views->getViews($this, "register", $data);
	}
	// registrar un nuevo usuario
	public function createUser(){
		if($_POST){
			$name = strClean($_POST['registerName']);
			$registerName = strtoupper($name);
			$registerCi = intval($_POST['registerCi']);
			$registerEmail = strtolower($_POST['registerEmail']);
			$registerPassword = $_POST['registerPassword'];
			$repetPass = $_POST['repetPass'];
			if(empty($registerPassword)) {
				$arrResponse = array("status" => false, "msg" => "Clave no puede estar vacia");
			}else if($_POST['registerPassword'] == $_POST['repetPass']){
				// si las claves son iguales pasar a la segunda comprovacion
				$strPassEncript = encryption($repetPass);
				$requestUser = $this->model->createUser($registerCi,$registerName,$registerEmail,$strPassEncript);
				// echo $requestUser;
				if($requestUser > 0){
					//crear ruta de archivo para el usuario
					$codUser=  $requestUser.'-'.substr($registerName,0,2).substr($registerCi,-3);
					// $userRuta=  substr($registerName,0,1).'UN'.'-0'.$requestUser;
					$ruta = "system/app/Views/Docs/". $codUser. "/";
					$fileHash = substr(md5($ruta . uniqid(microtime() . mt_rand())), 0, 8);
					// // creo carpeta en servidor si no existe
					if (!file_exists($ruta))
					mkdir($ruta, 0777, true);
					$tipo = "login";
					$arrResponse = array("status" => true, "msg" => "Cuenta creada <br> se le envio un email");
					$email = email($registerName,$registerEmail,"Nueva cuenta creada","Felicitaciones haz creado una cuenta con nosotros, ponte en contacto con el administrador para la activacion.", $tipo);
					$sqlUpdate = $this->model->updateUserRuta($requestUser,$registerCi,$registerEmail,$codUser,$ruta);
				}else if($requestUser == "exist"){
				// evaluar si la cedula no esta registrada al igual que el email
					$arrResponse = array("status" => false, "msg" => "Atencion! email o identificacion ya existe ingrese otro");
				}else{
					$arrResponse = array("status" => false, "msg" => "No es posible crear la cuenta");
				}
			}else{
				$arrResponse = array("status" => false, "msg" => "Claves no coinciden");
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	/**
	 * cargar vista de recuperar clave
	 * y metodos
	 */
	public function recuperar(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		$data['page_title'] = "Acceso - Olvido clave";
		$data['page_name'] = "recuperar";
		$data['page_functions'] = "function.login.js";
		$this->views->getViews($this, "recuperar", $data);
	}
	// poder enviar un email para reseter la clave si se olvido
	public function resetPass(){
		if($_POST){
			$email = strClean(strtolower($_POST['txtEmail']));
			if(empty($email)){
				$arrResponse = array("status" => false, "msg" => "Debe ingreasar un email o usuario");
			}else{
				$comprobarEmail = $this->model->user($email);
				if($comprobarEmail){
					$opcion = 1;
					$tipo = 'reset';
					$strCodigo = token();
					// generamos el token
					$intentofail = $this->model->genToken($comprobarEmail['user_id'], $strCodigo , $opcion);
					// enviamos un email al usuario para desbloquear la cuenta
					$email = emailBlok($comprobarEmail['email'],"Olvido clave de acceso","Haz solicitado reestablecer tu clave, si es asi sigue los pasos que se te indicaran",$strCodigo,$comprobarEmail['nombre'],$comprobarEmail['user_id'],$comprobarEmail['ci'], $tipo);
					$arrResponse = array("status" => true, "msg" => "Se envio un mail");
				}else{
					$arrResponse = array("status" => false, "msg" => "Email no esta registrado");
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	/**
	 * cargar vista de desbloquear cuenta
	 * y metodos
	 */
	public function disblockCount(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		$data['page_title'] = "Acceso - desbloquear cuenta";
		$data['page_name'] = "desbloquear";
		$data['page_functions'] = "function.login.js";
		$this->views->getViews($this, "disblockCount", $data);
	}
	public function disblock(){
		$strTxtEmail = strClean(strtolower($_POST['txtEmail']));
		$strR1 = strClean(strtolower($_POST['txtR1']));
		$strR2 = strClean(strtolower($_POST['txtR2']));
		$strR3 = strClean(strtolower($_POST['txtR3']));
		$intCi = $_POST['txtCi'];
		$strToken = $_POST['txtToken'];
		if(empty($_POST['txtR1']) || empty($_POST['txtR2']) || empty($_POST['txtR3']) || empty($_POST['txtCi'])){
			$arrResponse = array('status' => false, 'msg' => 'Debe responder');
		}else{
			$opcion = "1";
			// obtenemos las respuestas
			$request = $this->model->pregunta($strTxtEmail,$strR1,$strR2,$strR3,$intCi,$strToken,$opcion);
			if($request){
				// comparamos las respuestas que estan almacenadas
				if($strR1 == $request['r1'] AND $strR2 == $request['r2'] AND $strR3== $request['r3'] ){
					$arrResponse = array('status' => true, 'msg' => 'Cuenta desbloqueada');
					// reseteamos el token y los intentos
					$intentofail = $this->model->updateBlock($request['user_id'], '0' , '2');
					$token = $this->model->genToken($request['user_id'], '0' , '2');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Respuestas no coinciden');
				}
			}else{
				$arrResponse = array('status' => false, 'msg' => 'Error en datos');
			}
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
	/**
	 * cargar vista de reseet clave
	 */
	public function reset(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		$data['page_title'] = "Acceso - desbloquear cuenta";
		$data['page_name'] = "desbloquear";
		$data['page_functions'] = "function.login.js";
		$this->views->getViews($this, "reset", $data);
	}
	public function changePass(){
		$strTxtEmail = strClean(strtolower($_POST['txtEmail']));
		$strCod = strClean($_POST['txtCod']);
		$strPass = strClean($_POST['txtPass']);
		$strPassConfirm = strClean($_POST['txtPassConfirm']);
		$intCi = $_POST['txtCi'];
		$strToken = $_POST['txtToken'];
		if($strPass == $strPassConfirm){
			// traer los datos del usuario
			$compDatos = $this->model->user($strTxtEmail);
			if($compDatos){
				if($compDatos['codigo'] == $strCod AND $strToken == $compDatos['token']){
					// hacer el envio de claves para reset y el token
					$strPassEncri = encryption($strPass);
					$envPass = $this->model->changePass($compDatos['user_id'],$strPassEncri);
					if($envPass){
						$arrResponse = array('status' => true, 'msg' => 'Cambio de clave exitoso.');
						// eliminar el token y colocarlo en 0 si el usuario lo genero
						$token = $this->model->genToken($compDatos['user_id'], '0' , '2');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al cambiar clave.');
					}
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error en datos de envio <br> algun dato es equivocado.');
				}
			}else{
				$arrResponse = array('status' => false, 'msg' => 'A ocurrido un error.');
			}
		}else{
			$arrResponse = array('status' => false, 'msg' => 'No coinciden las claves.');
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

}