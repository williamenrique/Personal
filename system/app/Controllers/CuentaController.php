<?php
class Cuenta extends Controllers{
	public function __construct(){
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function Cuenta(){
			$data['page_title'] = "Personal - Cuentas";
		$this->views->getViews($this, "cuenta",$data);
	}
}