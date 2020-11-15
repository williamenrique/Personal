<?php
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
			$data['page_title'] = "Personal - Home";
		$this->views->getViews($this, "home",$data);
	}
}