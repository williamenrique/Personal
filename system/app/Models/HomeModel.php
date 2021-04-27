<?php
class HomeModel extends Mysql {
	// declaramos variables para el uso interno
	private $intIdUser;
	private $strTitulo;
	private $strDescripcion;
	private $strTextColor;
	private $strColor;
	private $strStartEvent;
	private $strEndEvent;

	public function __construct(){
		parent::__construct();
	}

	// public function setCalendario(string $strTitulo,string $strDescripcion,string $strTextColor,string $strColor,string $strStartEvent,string $strEndEvent){
	// 	$this->intIdUser = $intIdUser;
	// 	$this->strTitulo = $strTitulo;
	// 	$this->strDescripcion = $strDescripcion;
	// 	$this->strTextColor = $strTextColor;
	// 	$this->strColor = $strColor;
	// 	$this->strStartEvent = $strStartEvent;
	// 	$this->strEndEvent = $strEndEvent;
	// 	// dep();
	// 	$sql = "INSERT INTO table_calendar(titulo,descripcion,textColor,color,startEvent,endEvent) VALUES (?,?,?,?,?,?)";
	// 	$arrData = array($this->strTitulo, $this->strDescripcion, $this->strTextColor, $this->strStartEvent, $this->strEndEvent);
	// 	$request = $this->insert($sql,$arrData);
	// 	return $request;
	// }
	public function getCalendario(){
		$sql = "SELECT * FROM table_calendario";
		$request = $this->select_all($sql);
		return $request;
	}



	public function setCalendario(string $strTitulo,string $strDescripcion,string $strColor,string $strTextColor, string $strStartEvent,string $strEndEvent, int $intIdUser){
		$this->intIdUser = $intIdUser;
		$this->strTitulo = $strTitulo;
		$this->strDescripcion = $strDescripcion;
		$this->strTextColor = $strTextColor;
		$this->strColor = $strColor;
		$this->strStartEvent = $strStartEvent;
		$this->strEndEvent = $strEndEvent;
		// dep();
		$sql = "INSERT INTO table_calendario(title,description,color,textColor,start,end,user_id) VALUES (?,?,?,?,?,?,?)";
		$arrData = array($this->strTitulo, $this->strDescripcion, $this->strColor, $this->strTextColor, $this->strStartEvent,$this->strEndEvent, $this->intIdUser);
		$request = $this->insert($sql,$arrData);
		return $request;
	}

}