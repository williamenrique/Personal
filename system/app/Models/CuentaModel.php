<?php

class CuentaModel extends Mysql {
	private $intIdUser;
	private $banco;
	private $strTxtBanco;
	private $strTxtCuenta;
	private $strTxtTipoCuenta;
	private $strtxtUsuario;
	private $strTxtPass;
	private $strTxtClaveTlf;
	private $strTxtPregunta1;
	private $strTxtPregunta2;
	private $strTxtPregunta3;
	private $strTxtRespuesta1;
	private $strTxtRespuesta2;
	private $strTxtRespuesta3;
	private $strTxtfechaMod;
	public function __construct(){
		parent::__construct();
	}
	public function selectCuenta(){
		$sql = "SELECT * from table_cuenta a JOIN table_cuenta_user b JOIN table_user c WHERE c.id_user = b.id_user";
		$request = $this->select($sql);
		return $request;
	}
}