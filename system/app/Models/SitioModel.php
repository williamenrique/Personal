<?php
class SitioModel extends Mysql {
	// declaramos variables para el uso interno
	private $strSitio;
	private $strUsuario;
	private $strPass;
	private $strUrl;

	public function __construct(){
		parent::__construct();
	}
	public function setSitio( string $strSitio,string $strUsuario,string $strPass,string $strUrl){
		$this->strSitio = $strSitio;
		$this->strUsuario = $strUsuario;
		$this->strPass = $strPass;
		$this->strUrl = $strUrl;
		$this->intStatus = 1;
		$sql = "INSERT INTO table_sitio(sitio,usuario,pass,url,status) VALUES (?,?,?,?,?)";
		$arrData = array($this->strSitio, $this->strUsuario, $this->strPass, $this->strUrl, $this->intStatus);
		$request = $this->insert($sql,$arrData);
		return $request;
	}
	// seleccionar todos los sitios 
	public function getSitios(){
		$sql = "SELECT * FROM table_sitio WHERE status != 0";
		$request = $this->select_all($sql);
		return $request;
	}
	// seleccionar un sitio especifica
	public function getSitio(int $intSitio){
		$this->intSitio = $intSitio;
		$sql = "SELECT * FROM table_sitio WHERE idCuenta = $this->intIdCuenta AND idSitio = $this->intSitio";
		$request = $this->select($sql);
		return $request;
	}
		// seleccionar un sitio especifica
	public function deleteSitio(int $intSitio){
		$this->intSitio = $intSitio;
	echo	$sql = "UPDATE table_sitio SET status = 0 WHERE  idSitio = $this->intSitio";
		$request = $this->update($sql);
		return $request;
	}
}