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
	public function login(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_title'] = "Acceso - Login";
		$data['page_name'] = "login";
		$data['page_functions'] = "function.login.js";
		$this->views->getViews($this, "login", $data);
	}
	public function loginUser(){
		if($_POST){
			if(empty($_POST['textUser']) || empty($_POST['textPass'])){
				$arrResponse = array('status' => false, 'msg' => 'Error en datos');
			}else{
				$strUser = strtolower($_POST['textUser']);
				$strPass = encryption($_POST['textPass']);
				$requestUser = $this->model->loginUser($strUser,$strPass);
				if(empty($requestUser)){
					$arrResponse = array('status' => false, 'msg' => 'El usuario o el password es incorrecto');
				}else{
					$arrData = $requestUser;
					if ($arrData['status'] == 1) {
						$_SESSION['idUser'] = $arrData['id_user'];
						$_SESSION['login'] = true;
						$arrData = $this->model->sessionLogin($_SESSION['idUser']);
						//creamos la variable de sesion mediante un helper
						sessionUser($_SESSION['idUser']);
						// $strCodigo = "biCod-".$_SESSION['userData']['user_id']."-".codGenerator();
						// $_SESSION['strCodigo'] = $strCodigo;
						// $fecha = date('Y-m-d');
						// $strHoraInicio = date('h:i:s');
						// setTimeline($_SESSION['idUser'],$strCodigo,$fecha,$strHoraInicio);
						$arrResponse = array('status' => true, 'msg' => 'ok');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'El usuario inactivo');
					}
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

	public function register(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_title'] = "Acceso - registro";
		$data['page_name'] = "register";
		$data['page_functions'] = "function.login.js";
		$this->views->getViews($this, "register", $data);
	}

	public function createUser(){
		if($_POST){
			$registerName = ucwords($_POST['registerName']);
			$registerCi = intval($_POST['registerCi']);
			$registerEmail = strtolower($_POST['registerEmail']);
			$registerPassword = $_POST['registerPassword'];
			$repetPass = $_POST['repetPass'];
			if(empty($_POST['repetPass'])) {
				$arrResponse = array("status" => false, "msg" => "Clave no puede estar vacia");
			}else if($_POST['registerPassword'] == $_POST['repetPass']){
				$strPassEncript = encryption($repetPass);
				$requestUser = $this->model->createUser($registerCi,$registerName,$registerEmail,$strPassEncript);
				// echo $requestUser;
				if($requestUser > 0){
					//comprobar si el nick ya esta en uso
					$userNIck =  substr($registerName,0,1).'UN'.'-0'.$requestUser;
					$fileBase = "system/app/Views/Docs/". $userNIck . "/";
					$fileHash = substr(md5($fileBase . uniqid(microtime() . mt_rand())), 0, 8);
					// creo carpeta en servidor si no existe
					if (!file_exists($fileBase))
					mkdir($fileBase, 0777, true);
					$sqlUpdate = $this->model->updateNick($requestUser,$registerCi,$registerEmail,$userNIck,$fileBase);
					$arrResponse = array("status" => true, "msg" => "Cuenta creada");
				}else if($requestUser == "exist"){
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
}