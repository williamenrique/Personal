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
		$intIdUser = intval($_POST['txtIdUser']);
		$intID = intval($_POST['txtId']);
		$txtTitulo = strClean(strtoupper($_POST['txtTitulo']));
		$txtOpcion = strClean($_POST['txtOpcion']);
		$txtDescripcion = strClean(ucwords($_POST['txtDescripcion']));
		$txtStartEvent = strClean($_POST['txtStart']);
		$txtStartTime = strClean($_POST['txtStartTime']);
		$txtEndEvent = strClean($_POST['txtEnd']);
		$txtEndTime = strClean($_POST['txtEndTime']);
		$txtTexColor= strClean($_POST['txtColor']);
		$txtColorFont = strClean($_POST['txtColorFont']);
		$inicio = $txtStartEvent." ".$txtStartTime;
		$fin = $txtEndEvent." ".$txtEndTime;
		if(empty($txtEndEvent)){
			$fin = '0000-00-00 00-00-00';
		}

		switch ($txtOpcion) {
			case 'set':
				if($txtTitulo == "" ){
					$arrResponse = array("status" => false, "msg" => "Debe colocar un titulo");
				}else{
					$request = $this->model->setCalendario($txtTitulo,$txtDescripcion,$txtColorFont,$txtTexColor,$inicio,$fin,$intIdUser);
					if($request > 0){
							$arrResponse = array("status" => true, "msg" => "Evento agregado");
							navPaginar();
					}else{
							$arrResponse = array("status" => false, "msg" => "No se pudo agregar");
					}
				}
				break;
			case 'update':
				$request = $this->model->updateCalendario($txtTitulo,$txtDescripcion,$txtColorFont,$txtTexColor,$inicio,$fin,$intIdUser,$intID);
				if($request){
					$arrResponse = array("status" => true, "msg" => "Evento actualizado");
				}else{
					$arrResponse = array("status" => true, "msg" => "Error al actualizar");
				}
				break;

			case 'delete':
				$request = $this->model->deleteCalendario($intID, $intIdUser);
				if($request){
					$arrResponse = array("status" => true, "msg" => "Evento Eliminado");
				}else{
					$arrResponse = array("status" => true, "msg" => "Error al eliminar evento");
				}
				break;
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
	public function getCalendar(){
		$strStartEvent = date('Y-m-d');
		$arrData = $this->model->getCalendario();
		$totalEvent = $this->model->countEvents($strStartEvent);
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
	}
	// obtener un evnto especifico
	public function getEvent($intId){
		$intId = intval($intId);
		//comprobamos que sea un id valido para poder ejecutar
		if($intId > 0){
			$arrData = $this->model->getEvent($intId);
			if(empty($arrData)){
				$arrResponse = array('status'=> false,'msg' => '¡Datos no encontrados.'); 
			}else{
				$arrResponse = array('status'=> true,'data' => $arrData); 
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	// obtener los eventos
	public function getEvents(){
		$htmlOptions = "";
		$strStartEvent = date('Y-m-d');
		// total de filas
		$num_total_rows = $this->model->countEvents($strStartEvent);
	  $num_total_rows = count($num_total_rows);
		$pages = $num_total_rows / NUM_ITEMS_BY_PAGE;
		$pages = ceil($pages);
		if($num_total_rows > 0){
			// numeros de paginas
			$num_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);
			$result = $this->model->selectEvents($strStartEvent,0,NUM_ITEMS_BY_PAGE);
			$hh = $num_total_rows;
			if(count($result) > 0 ){
				foreach ($result as $event) {
					$date = formatear_timestamp($event['start']);
					$htmlOptions .="<li style='list-style:none'>
														<a href='#' class='list-group-item list-group-item-action' onclick=btnUpdate({$event['id']})>
															<div class='d-flex w-100 justify-content-between'>
																<h6 class='mb-1' data-bs-toggle='tooltip' data-bs-placement='bottom' data='{$event['description']}'>{$event['title']}</h6>
															</div>
															<small class='text-muted' style='font-size: .775em;'>{$date}</small>
														</a>
													</li>";
				}
			}
		}
		echo $htmlOptions;
	}
	// cargar los eventos en pagina
	public function getEventsPage($page){
		$htmlOptions = '';
		$rowsPerPage = NUM_ITEMS_BY_PAGE;
	  $offset = ($page - 1) * $rowsPerPage;

		$strStartEvent = date('Y-m-d');
		$request = $this->model->selectEvents($strStartEvent,$offset,$rowsPerPage);
		if(count($request) > 0){
			foreach ($request as $event) {
				$date=formatear_timestamp($event['start']);
				$htmlOptions .="<li style='list-style:none'>
														<a href='#' class='list-group-item list-group-item-action' onclick=btnUpdate({$event['id']})>
															<div class='d-flex w-100 justify-content-between'>
																<h6 class='mb-1 ' data-bs-toggle='tooltip' data-bs-placement='bottom' title='{$event['description']}'>{$event['title']}</h6>
															</div>
															<small class='text-muted' style='font-size: .775em;'>{$date}</small>
														</a>
													</li>";
			}
		}
		echo $htmlOptions;
	}
}