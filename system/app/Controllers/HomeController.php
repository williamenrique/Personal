<?php
header('Access-Control-Allow-Origin: *');
class Home extends Controllers{
	public function __construct(){
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'acceso/login');
		}
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function home(){
		$data['page_title'] = "Pagina Principal";
		$data['page_link'] = "home";
		$data['page_menu_open'] = "empty";
		$data['page_link_acitvo'] = "empty";
		$data['page_function'] = "function.home.js";
		$this->views->getViews($this, "home",$data);
	}
	 public function setCalendar(){
// txtIdUser: 1
// txtTitulo: evento
// txtDescripcion: nueva descripcion
// txtStart: 2021-04-26
// txtEnd: 2021-04-27
// txtColor: #35d515
// txtTextColor: #fff5f5
		$strIdUser = intval($_POST['txtIdUser']);
		$txtTitulo = strClean(strtolower($_POST['txtTitulo']));
		$txtDescripcion = strClean(strtolower($_POST['txtDescripcion']));
		$txtStartEvent = strClean($_POST['txtStart']);
		$txtStartTime = strClean($_POST['txtStartTime']);
		$txtEndEvent = strClean($_POST['txtEnd']);
		$txtEndTime = strClean($_POST['txtEndTime']);
		$txtTexColor= strClean($_POST['txtColor']);
		$txtColorFont = strClean($_POST['txtColorFont']);
		$inicio = $txtStartEvent." ".$txtStartTime;
		$fin = $txtEndEvent." ".$txtEndTime;
		$request = $this->model->setCalendario($txtTitulo,$txtDescripcion,$txtColorFont,$txtTexColor,$inicio,$fin,$strIdUser);
		if($request > 0){
				$arrResponse = array("status" => true, "msg" => "Evento agregada");
		}else{
				$arrResponse = array("status" => false, "msg" => "No se pudo agregar");
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	 }
	 public function getCalendar(){
		 $arrData = $this->model->getCalendario();
		 echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
	 }
}