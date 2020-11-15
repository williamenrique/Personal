<?php
class AccesoModel extends Mysql {
	private $intIdentificacion;
	private $intIdUser;
	private $strTxtUser;
	private $strTxtPass;
	private $strTxtNombre;
	private $strtxtApellidos;
	private $intTxtTlf;
	private $strTxtEmail;
	private $intListStatus;
	private $intlistRolId;
	private $strToken;
	private $strNick;
	private $strFileBase;
	private $strCodigo;
	private $strHoraInicio;
	private $strHoraFin;
	private $strTipo;
	public function __construct(){
		parent::__construct();
	}
	public function loginUser(string $txtUser, string $txtPass){
		$this->strTxtUser = $txtUser;
		$this->strTxtPass = $txtPass;
		$sql = "SELECT * FROM table_user WHERE (email = '$this->strTxtUser' OR user = '$this->strTxtUser') AND  pass = '$this->strTxtPass' AND status != 0";
		$request = $this->select($sql);
		return $request;
	}

	public function sessionLogin(int $intIdUser){
		$this->intIdUser = $intIdUser;
		$sql = "SELECT  p.ci,p.user, p.id_user,p.nombre,p.pass,p.telefono,p.email, p.status FROM table_user p  WHERE p.id_user = $this->intIdUser";
		$request = $this->select($sql);
		$_SESSION['userData'] = $request;
		return $request;
	}

	public function createUser(int $intIdentificacion, string $strTxtNombre, string $strTxtEmail, string $strTxtPass){
		$this->intIdentificacion = $intIdentificacion;
		$this->strTxtNombre = $strTxtNombre;
		$this->strTxtPass = $strTxtPass;
		$this->strTxtEmail = $strTxtEmail;
		$this->intListStatus = 2;
		$this->intlistRolId = 7;
		$this->strImg = "default.png";

	//consultar si existe
		$sql = "SELECT * FROM table_user WHERE  email = '{$this->strTxtEmail}' or  ci = {$this->intIdentificacion}";
		$request = $this->select_all($sql);
		//si no encontro ningun resultado insertamos el usuario
		if(empty($request)){
			$queryInsert = "INSERT INTO table_user(ci,nombre,email,status,imagen,pass) VALUES(?,?,?,?,?,?)";
			$arrData = array($this->intIdentificacion,$this->strTxtNombre,$this->strTxtEmail,$this->intListStatus,$this->strImg,$this->strTxtPass);
			$requestInsert = $this->insert($queryInsert,$arrData);
			//almacenar errores
			// $pagina_error = $_SERVER['PHP_SELF']. addslashes($requestInsert);
			// $usuario = 0;

			// $sqlLog = "INSERT INTO table_log(log_idUser,log_descripcion,log_comando) VALUES(?,?,?)";
			// $arrDataLog = array($usuario,$pagina_error,$queryInsert);
			// $log = $this->insert($sqlLog,$arrDataLog);
			// dep($requestInsert);
			//die();
			$return = $requestInsert;
		}else{
			//si no viene vacia es que ya existe un registro
			$return = "exist";
		}
		return $return;
	}

	public function updateNick(int $intIdUser, int $intIdentificacion,string $strTxtEmail, string $strNick,string $strFileBase){
		$this->intIdUser = $intIdUser;
		$this->intIdentificacion = $intIdentificacion;
		$this->strTxtEmail = $strTxtEmail;
		$this->strNick = $strNick;
		$this->strFileBase = $strFileBase;
	 	$sql = "SELECT * FROM table_user WHERE email = '{$this->strTxtEmail}'  AND ci = $this->intIdentificacion ";
		$request = $this->select_all($sql);
		if(!empty($request)){
			$sql = "UPDATE table_user SET user = ? , ruta = ? WHERE email = '{$this->strTxtEmail}'  AND ci = $this->intIdentificacion ";
			$arrData = array($this->strNick, $this->strFileBase);
			$request = $this->update($sql,$arrData);
		}else{
			$request = 'error';
		}
		return $request;
	}
}