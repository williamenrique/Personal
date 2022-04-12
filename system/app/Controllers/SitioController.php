<?php 
header('Access-Control-Allow-Origin: *');
class Sitio extends Controllers {
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
	public function web(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_title'] = "Sitio - WEB";
		$data['page_name'] = "Sitios WEB";
		$data['page_link'] = "sitios";
		$data['page_menu_open'] = "empty";
		$data['page_link_acitvo'] = "empty";
		$data['page_function'] = "function.sitio.js";
		$this->views->getViews($this, "web", $data);
	}
	public function setSitios(){
		// dep($_POST);
	
		$strUsuario = strClean($_POST['txtUsuario']);
		$strPass = strClean($_POST['txtPass']);
		$strUrl = strClean($_POST['txtUrl']);
		$strSitio = strClean(strtoupper($_POST['txtSitio']));
		// dep($_POST);
		if($strUsuario == "" || $strPass == "" || $strUrl == "" || $strSitio == ""){
			$arrResponse = array("status" => false, "msg" => "Debe llenar los campos");
		}else{
			$strPass = strClean(encryption($_POST['txtPass']));
			$strUrl = strClean(encryption($_POST['txtUrl']));
			$request = $this->model->setSitio(
				$strSitio,
				$strUsuario,
				$strPass,
				$strUrl);
			if($request > 0){
				$arrResponse = array("status" => true, "msg" => "Sitio agregada");
			}else{
				$arrResponse = array("status" => false, "msg" => "Error al guardar");
			}
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}

// obtener todas las cuentas
	public function getSitios($intTipoC){
		$arrData = $this->model->getSitios($intTipoC);
		//provar que trae el array
		// dep($arrData[0]['rol_status']);exit();
		//recorrer el arreglo para colocara el status
		for ($i=0; $i < count($arrData) ; $i++) { 
			$arrData[$i]['n'] = $i + 1;
			$arrData[$i]['pass'] = decryption($arrData[$i]['pass']);
			$arrData[$i]['url'] = decryption($arrData[$i]['url']);
			$arrData[$i]['opciones'] ='<div class="">
																	
																	<button type="button" class="btn btn-success btn-sm btnEditRol" onClick="fnteditSitio('.$arrData[$i]['idSitio'].')" title="Editar" ><span class="fa fa-edit" aria-hidden="true"></i></button>
																	<button type="button" class="btn btn-danger btn-sm btnDelRol" onClick="fntDelSitio('.$arrData[$i]['idSitio'].')" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
																</div>';
		}
		//convertir el arreglo de datos en un formato json
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}
	public function delSitio(){
		if($_POST){
			$inSitio = intval($_POST['inSitio']);
			$requestDel = $this->model->deleteSitio($inSitio);
			if($requestDel){
				$arrResponse = array('status' => true, 'msg' => 'Sitio eliminado');
			}else{
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
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