<?php
class Home extends Controllers{
	public function __construct(){
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function home(){
			$data['page_title'] = "Personal - Home";
		$this->views->getViews($this, "home",$data);
	}
}