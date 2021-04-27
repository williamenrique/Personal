<?php
header('Access-Control-Allow-Origin: *');
class User extends Controllers{
	public function __construct(){
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'acceso/login');
		}
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	// obtener los estados del pais
	public function getSelectState(){
		$htmlOptions = "";
		$arrData = $this->model->selectState();
		if(count($arrData) > 0){
			for ($i=0; $i < count($arrData); $i++) { 
				$htmlOptions .= '<option value="'.$arrData[$i]['id_estado'].'">'.$arrData[$i]['estado'].'</option>';
			}
		}
		echo $htmlOptions;
		die();
	}
	// obtener la ciudades dependiendo el estado
	public function getSelectCiudades(int $id){
		$htmlOptions = "";
		$intID = intval($id);
		if($intID > 0){
			$arrData = $this->model->selectCiudades($id);
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData); $i++) { 
					$htmlOptions .= '<option value="'.$arrData[$i]['id_ciudad'].'">'.$arrData[$i]['ciudad'].'</option>';
				}
			}
		}
		echo $htmlOptions;
		die();
	}
	// obtener los municipios segun la ciudad
	public function getSelectMunicipio(int $id){
		$htmlOptions = "";
		$intID = intval($id);
		if($intID > 0){
			$arrData = $this->model->selectMunicipios($id);
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData); $i++) { 
					$htmlOptions .= '<option value="'.$arrData[$i]['id_municipio'].'">'.$arrData[$i]['municipio'].'</option>';
				}
			}
		}
		echo $htmlOptions;
		die();
	}
	// crear nick si no posee
	public function createNick(){
		if($_POST){
				if(empty($_POST['txt_nick'])) {
					$arrResponse = array("status" => false, "msg" => "Campo nick debe llenarlo");
				}else{
					$idUser = intval($_POST['textId']);
					$strTxtEmail = strtolower($_POST['textEmail']);//convierte todas las letras en minusculas
					$strTxCi = $_POST['textCi'];
					$strTxtNick = strClean($_POST['txt_nick']);
					$requestUser = $this->model->createNick($idUser,$strTxCi,$strTxtEmail, $strTxtNick);
					//comprovamos la existencia del usuario si no se actualiza correctamente
					if($requestUser > 0){
						$arrResponse = array("status" => true, "msg" => "Usuario Creado"); 
						sessionUser($_SESSION['idUser']);
					}else if($requestUser == "exist"){
						$arrResponse = array("status" => false, "msg" => "Usuario seleccionado ya esta en uso");
					}else{
						$arrResponse = array("status" => false, "msg" => "No es posible almacenar los datos");
					}
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	// cambio de clave del sistema
	public function changePass(){
		if($_POST){
			$strTxtPass = strclean($_POST['txt_pass']);
			$strTxtRepet = strclean($_POST['txt_passRepet']);
			if(empty($strTxtPass) && empty($_POST['txt_passRepet'])){
				$arrResponse = array("status" => false, "msg" => "Debe llenar los campos");
			}else if($strTxtPass != $strTxtRepet){
				$arrResponse = array("status" => false, "msg" => "Claves no coinciden");
			}else{
					$idUser = intval($_POST['textId']);
					$strTxtEmail = strtolower($_POST['textEmail']);//convierte todas las letras en minusculas
					$strTxCi = $_POST['textCi'];
					$passEncrypt = encryption($strTxtPass);
					$requestChange = $this->model->changePass($idUser,$strTxCi,$strTxtEmail, $passEncrypt);
					// evaluamos la respuesta
					if($requestChange > 0){
						$arrResponse = array("status" => true, "msg" => "Cambio exitoso");
						// enviar un email con la informacion de la clave
					}else{
						$arrResponse = array("status" => false, "msg" => "A ocurrido un error no se cambio");
					}
				}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	// actualizar datos del perfil
	public function updateProfile(){
		if($_POST){
			$idUser = intval($_POST['textId']);
			$strTxtEmail = strtolower($_POST['textEmail']);//convierte todas las letras en minusculas
			$strTxCi = $_POST['textCi'];
			$strNomb = strClean($_POST['txt_nombre']);
			$strApell = strClean(strtoupper($_POST['txt_apellido']));
			$strTlf = strClean($_POST['txt_tlf']);
			$strDirec = strClean($_POST['txt_direccion']);
			$intState = intval($_POST['selectState']);
			$intCiudad = intval($_POST['selectCiudad']);
			$intCodPostal = intval($_POST['txt_codPost']);

			$requestUpdate = $this->model->updateProfile($idUser,$strTxCi,$strTxtEmail,$strNomb,$strApell,$strTlf,$strDirec,$intCodPostal,$intState,$intCiudad);
			if($requestUpdate > 0){
				$arrResponse = array("status" => true, "msg" => "Se actualizo la informacion");
				sessionUser($_SESSION['idUser']);
			}else{
				$arrResponse = array("status" => false, "msg" => "A ocurrido un error");
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	// actualizar imagen de perfil
	public function updateAvatar(){
		if($_POST){
			$idUser = intval($_POST['textId']);
			$strTxtEmail = strtolower($_POST['textEmail']);//convierte todas las letras en minusculas
			$strTxCi = $_POST['textCi'];
			$avatar = $_FILES['imgFile'];
			$avName = $avatar['name'];
			$avType = $avatar['type'];
			$avTemp = $avatar['tmp_name'];
			$avError = $avatar['error'];
			$avSize = $avatar['size'];
			$avatarProfile = 'src/img/default.png';
			
			if($avatar != ''){
				$imgProfile = 'img_'.$_SESSION['userData']['codigo'].'.jpg';
				$avatarProfile = base_url().'system/app/Views/Docs/'.$_SESSION['userData']['codigo'].'/'.$imgProfile;
			}
			if($avType != 'image/jpg' && $avType != 'image/png' && $avType != 'image/jpeg'){
				$arrResponse = array("status" => true, "msg" => "Archivo no permitido seleccione otro");
			}else{

				$requestUpdate = $this->model->updateAvatar($idUser,$strTxCi,$strTxtEmail,$avatarProfile);
				if($requestUpdate > 0){
					$arrResponse = array("status" => true, "msg" => "Se a cambiado la imagen de perfil");
					if($avName != ''){ uploadImage($avatar,$imgProfile);}
					sessionUser($_SESSION['idUser']);
				}else{
					$arrResponse = array("status" => false, "msg" => "A ocurrido un error");
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}	
		die();
	}
	/**
	 * mostrar vista de configuracion de usuario
	 */
	public function setting(){
		$data['page_title'] = "Configuracion de Usuario";
		$data['page_link'] = "blank";
		$data['page_menu_open'] = "empty";
		$data['page_link_acitvo'] = "empty";
		$data['page_function'] = "function.user.js";
		$this->views->getViews($this, "setting",$data);
	}
	public function setQuestion(){
		$strCi = intval($_POST['textCi']);
		$intId = intval($_POST['textId']); 
		$strEmail = strClean(strtolower($_POST['textEmail'])); 
		$strP1= strClean(strtoupper($_POST['txtP1'])); 
		$strR1 = strClean(strtoupper($_POST['txtR1'])); 
		$strP2 = strClean(strtoupper($_POST['txtP2'])); 
		$strR2 = strClean(strtoupper($_POST['txtR2'])); 
		$strP3 = strClean(strtoupper($_POST['txtP3'])); 
		$strR3= strClean(strtoupper($_POST['txtR3']));
		if($strP1 == '' && $strP2 == '' && $strP3 == '' && $strR1 == '' && $strR2 == '' && $strR3 == ''){
			$arrResponse = array("status" => false, "msg" => "Debe completar las<br> Preguntas y Respuestas");
		}else{
			$requestUpdate = $this->model->updateQuestion($intId,$strP1, $strP2, $strP3, $strR1, $strR2, $strR3);
			if($requestUpdate){
				$arrResponse = array("status" => true, "msg" => "Se actualizaron las<br> preguntas y respuesta");
				$rows = 
								array(
									'intId' => $intId,
									'strP1' => $strP1,
									'strP2' => $strP2,
									'strP3' => $strP3,
									'strR1' => $strR1,
									'strR2' => $strR2,
									'strR3' => $strR3,
									'strEmail' => $strEmail,
									'strNombre' => $_SESSION['userData']['nombre'],
									'strAsunto' => 'Actualizacion de seguridad',
									'strMensaje' => 'Se han actualizado las preguntas de seguridad, le enviamos la informacion actualizada',
									'strFecha' => formatear_timestamp(date("Y-m-d H:i:s"))
								);
				sessionUser($intId);
				emailQuestion($rows);
			}else{
				$arrResponse = array("status" => false, "msg" => "A ocurrido un error...?");
			}
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
		/**
	 * cargar vista de datos del usuario
	 */
	public function profile(){
		$data['page_title'] = "Perfil de Usuario";
		$data['page_link'] = "blank";
		$data['page_menu_open'] = "empty";
		$data['page_link_acitvo'] = "empty";
		$data['page_function'] = "function.user.js";
		$this->views->getViews($this, "profile",$data);
	}
}