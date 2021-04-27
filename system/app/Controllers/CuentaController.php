<?php 
header('Access-Control-Allow-Origin: *');
class Cuenta extends Controllers {
	public function __construct(){
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'acceso/login');
		}
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	/**
	 * cargar vista  y metodos
	 */
	public function propia(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_title'] = "Cuenta - Propias";
		$data['page_name'] = "Cuentas Propias";
		$data['page_link'] = "menu-cuenta";
		$data['page_menu_open'] = "sub-menu-cuenta";
		$data['page_link_acitvo'] = "propia";
		$data['page_function'] = "function.cuenta.js";
		$this->views->getViews($this, "propia", $data);
	}
	public function setCuenta(){
		// dep($_POST);
		$strBanco = strClean($_POST['txtBanco']);
		$strTipo = strClean($_POST['txtTipo']);
		$strNombre = strClean(strtoupper($_POST['txtNombre']));
		$strNcuenta = strClean($_POST['txtNcuenta']);
		
		$strUsuario = strClean($_POST['txtUsuario']);
		$strPass = strClean($_POST['txtPass']);
		$strP1 = strClean(strtoupper($_POST['txtP1']));
		$strR1 = strClean(strtoupper($_POST['txtR1']));
		$strP2 = strClean(strtoupper($_POST['txtP2']));
		$strR2 = strClean(strtoupper($_POST['txtR2']));
		$strP3 = strClean(strtoupper($_POST['txtP3']));
		$strR3 = strClean(strtoupper($_POST['txtR3']));
		$intUser = $_SESSION['userData']['user_id'];
		$intTipo = $_POST['txtTipoC'];
		// dep($_POST);
		if($strBanco == "" || $strTipo == "" || $strNcuenta == "" || $strUsuario == "" || $strPass == ""){
			$arrResponse = array("status" => false, "msg" => "Debe llenar los campos");
		}else{
			$strNcuenta = strClean(encryption($_POST['txtNcuenta']));
			$strPass = strClean(encryption($_POST['txtPass']));
			$strNtarjeta = strClean(encryption($_POST['txtNtarjeta']));
			$intCcv = strClean(encryption($_POST['txtCcv']));
			$strPassEspecial = strClean(encryption($_POST['txtClaveEspecial']));
			$request = $this->model->setCuenta(
				$intUser,
				$strNombre,
				$strBanco,
				$strTipo,
				$strNcuenta,
				$strNtarjeta,
				$intCcv,
				$strUsuario,
				$strPass,
				$strPassEspecial,
				$strP1,
				$strR1,
				$strP2,
				$strR2,
				$strP3,
				$strR3,
				$intTipo);
			if($request > 0){
				$arrResponse = array("status" => true, "msg" => "Cuenta agregada");
			}else{
				$arrResponse = array("status" => false, "msg" => "error al guardar");
			}
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

// obtener todas las cuentas
	public function getCuentas($intTipoC){
		$arrData = $this->model->getCuentas($intTipoC);
		//provar que trae el array
		// dep($arrData[0]['rol_status']);exit();
		//recorrer el arreglo para colocara el status
		for ($i=0; $i < count($arrData) ; $i++) { 
			$arrData[$i]['n'] = $i + 1;
			$arrData[$i]['pass'] = decryption($arrData[$i]['pass']);
			$arrData[$i]['nCuenta'] = decryption($arrData[$i]['nCuenta']);
			$arrData[$i]['nTarjeta'] = decryption($arrData[$i]['nTarjeta']);
			$arrData[$i]['ccv'] = decryption($arrData[$i]['ccv']);
			$arrData[$i]['opciones'] ='<div class="">
																	<button type="button" class="btn btn-secondary btn-sm btnPremisoRol" onClick="fntRol('.$arrData[$i]['idCuenta'].')" title="Permisos"><span class="fa-fw select-all fas"></span></button>
																	<button type="button" class="btn btn-success btn-sm btnEditRol" onClick="fntEditRol('.$arrData[$i]['idCuenta'].')" title="Editar" ><span class="fa fa-edit" aria-hidden="true"></i></button>
																	<button type="button" class="btn btn-danger btn-sm btnDelRol" onClick="fntDelRol('.$arrData[$i]['idCuenta'].')" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
																</div>';
		}
		//convertir el arreglo de datos en un formato json
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}
		/**
	 * cargar vista  y metodos
	 */
	public function tercero(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_title'] = "Cuenta - Terceros";
		$data['page_name'] = "Cuentas Terceros";
		$data['page_link'] = "menu-cuenta";
		$data['page_menu_open'] = "sub-menu-cuenta";
		$data['page_link_acitvo'] = "tercero";
		$data['page_function'] = "function.cuenta.js";
		$this->views->getViews($this, "tercero", $data);
	}
	
}