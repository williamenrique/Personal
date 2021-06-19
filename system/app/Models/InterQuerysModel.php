<?php
class InterQuerysModel extends Mysql{
	public function __construct(){
		parent::__construct();
	}
	//funcion para traer todos los roles
	public function selectState(){
		$sql = "SELECT * FROM table_estados";
		$request = $this->select_all($sql);
		return $request;
	}
}