<?php
class HomeModel extends Mysql {
	// declaramos variables para el uso interno
	private $intIdUser;
	private $intID;
	private $strTitulo;
	private $strDescripcion;
	private $strTextColor;
	private $strColor;
	private $strStartEvent;
	private $strEndEvent;
	private $offset;
	private $rowsPerPage;

	public function __construct(){
		parent::__construct();
	}

	public function getCalendario(){
		// $sql = "SELECT title,description,start,end,count(*) FROM table_calendario WHERE status = 1";
		$sql = "SELECT * FROM table_calendario WHERE status = 1";
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
		$sql = "INSERT INTO table_calendario(title,description,color,textColor,start,end,user_id,status) VALUES (?,?,?,?,?,?,?,?)";
		$arrData = array($this->strTitulo, $this->strDescripcion, $this->strColor, $this->strTextColor, $this->strStartEvent,$this->strEndEvent, $this->intIdUser,1);
		$request = $this->insert($sql,$arrData);
		return $request;
	}

	public function updateCalendario(string $strTitulo,string $strDescripcion,string $strColor,string $strTextColor, string $strStartEvent,string $strEndEvent, int $intIdUser, int $intID){
		$this->intIdUser = $intIdUser;
		$this->intID = $intID;
		$this->strTitulo = $strTitulo;
		$this->strDescripcion = $strDescripcion;
		$this->strTextColor = $strTextColor;
		$this->strColor = $strColor;
		$this->strStartEvent = $strStartEvent;
		$this->strEndEvent = $strEndEvent;
		$sql = "UPDATE  table_calendario SET title= '$this->strTitulo', description= '$this->strDescripcion', color= '$this->strColor', textColor= '$this->strTextColor', start= '$this->strStartEvent', end = '$this->strEndEvent' WHERE id = $this->intID AND user_id = $this->intIdUser";
		$arrData = array($this->strTitulo, $this->strDescripcion, $this->strColor, $this->strTextColor, $this->strStartEvent,$this->strEndEvent);
		$request = $this->update($sql,$arrData);
		return $request;
	}
	public function deleteCalendario(int $intID, int $intIdUser){
		$this->intIdUser = $intIdUser;
		$this->intID = $intID;
		$sql = "UPDATE  table_calendario SET  status = 0 WHERE id = $this->intID AND user_id = $this->intIdUser";
		$arrData = array($this->strTitulo, $this->strDescripcion, $this->strColor, $this->strTextColor, $this->strStartEvent,$this->strEndEvent);
		$request = $this->update($sql,$arrData);
		return $request;
	}
	public function getEvent(int $intID){
		$this->intID = $intID;
		 $sql = "SELECT * FROM  table_calendario WHERE id = $this->intID AND status = 1 ";
		$request = $this->select($sql);
		return $request;
	}
	public function selectEvent(string $strStartEvent){
		$this->strStartEvent = $strStartEvent;
	  $sql = "SELECT * FROM  table_calendario WHERE start >= '$this->strStartEvent' AND status = 1 ORDER BY start ASC  LIMIT 0, 6";
		$request = $this->select_all($sql);
		return $request;
	}
	public function selectEvents(string $strStartEvent, int $offset, int $rowsPerPage){
		$this->strStartEvent = $strStartEvent;
		$this->offset = $offset;
		$this->rowsPerPage = $rowsPerPage;
	  $sql = "SELECT * FROM  table_calendario WHERE start >= '$this->strStartEvent' AND status = 1 ORDER BY start ASC  LIMIT $this->offset, $this->rowsPerPage";
		$request = $this->select_all($sql);
		return $request;
	}
	public function countEvents(string $strStartEvent){
		$this->strStartEvent = $strStartEvent;
	  $sql = "SELECT * FROM  table_calendario WHERE start >= '$this->strStartEvent' AND status = 1";
		$request = $this->select_all($sql);
		return $request;
	}
}