<?php
class Cuenta extends Controllers{
	public function __construct(){
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'acceso/login');
		}
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function Cuenta(){
		$data['page_title'] = "Personal - Cuentas";
		$data['page_functions'] = "function.cuenta.js";
		$this->views->getViews($this, "cuenta",$data);
	}
}