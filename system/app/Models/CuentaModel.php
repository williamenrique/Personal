<?php
class CuentaModel extends Mysql {
	// declaramos variables para el uso interno
	private $intIdentificacion;
	private $intUser;
	private $strBanco;
	private $strNombre;
	private $strTipo;
	private $strNcuenta;
	private $strNtarjeta;
	private $intCcv;
	private $strUsuario;
	private $strPass;
	private $strPassEspecial;
	private $strP1;
	private $strR1;
	private $strP2;
	private $strR2;
	private $strP3;
	private $strR3;
	private $intTipoC;
	private $intIdCuenta;

	public function __construct(){
		parent::__construct();
	}
	public function setCuenta(int $intUser, string $strNombre,string $strBanco,string $strTipo,string $strNcuenta,string $strNtarjeta,string $intCcv,string $strUsuario,string $strPass,string $strPassEspecial,string $strP1,string $strR1,string $strP2,string $strR2,string $strP3,string $strR3,int $intTipoC){
		$this->strBanco = $strBanco;
		$this->strNombre = $strNombre;
		$this->strTipo = $strTipo;
		$this->strNcuenta = $strNcuenta;
		$this->strNtarjeta = $strNtarjeta;
		$this->intCcv = $intCcv;
		$this->strUsuario = $strUsuario;
		$this->strPass = $strPass;
		$this->strPassEspecial = $strPassEspecial;
		$this->strP1 = $strP1;
		$this->strR1 = $strR1;
		$this->strP2 = $strP2;
		$this->strR2 = $strR2;
		$this->strP3 = $strP3;
		$this->strR3 = $strR3;
		$this->intTipoC = $intTipoC;
		$this->intUser = $intUser;
		$sql = "INSERT INTO table_cuenta(idUser,nombre,banco,tipoC,nCuenta,nTarjeta,ccv,usuario,pass,passEspecial,p1,r1,p2,r2,p3,r3,tipo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$arrData = array(
							$this->intUser,
							$this->strNombre,
							$this->strBanco,
							$this->strTipo,
							$this->strNcuenta,
							$this->strNtarjeta,
							$this->intCcv,
							$this->strUsuario,
							$this->strPass,
							$this->strPassEspecial,
							$this->strP1,
							$this->strR1,
							$this->strP2,
							$this->strR2,
							$this->strP3,
							$this->strR3,
							$this->intTipoC
						);
						$request = $this->insert($sql,$arrData);
		return $request;
	}
	// seleccionar todas las cuentas de 
	public function getCuentas(int $intTipo){
		$this->intTipo = $intTipo;
		$sql = "SELECT * FROM table_cuenta WHERE tipoC = $this->intTipo";
		$request = $this->select_all($sql);
		return $request;
	}
	// seleccionar una cuenta especifica
	public function getCuenta(int $intIdCuenta, int $intTipo){
		$this->intIdCuenta = $intIdCuenta;
		$this->intTipo = $intTipo;
		$sql = "SELECT * FROM table_cuenta WHERE idCuenta = $this->intIdCuenta AND tipoC = $this->intTipo";
		$request = $this->select($sql);
		return $request;
	}
}