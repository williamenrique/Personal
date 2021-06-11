<?php
class AccesoModel extends Mysql {
	// declaramos variables para el uso interno
	private $intIdentificacion;
	private $intIdUser;
	private $strRuta;
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
	private $strCodUser;
	private $strCodigo;
	private $strHoraInicio;
	private $strHoraFin;
	private $strTipo;
	private $intOpcion;
	private $strR1;
	private $strR2;
	private $strR3;
	private $intCi;

	public function __construct(){
		parent::__construct();
	}
	/* traer datos del usuario segun el email si existe */
	public function user(string $txtUser){
		$this->strTxtUser = $txtUser;
		// echo $sql = "SELECT * FROM table_user tu JOIN table_block  tb WHERE  tu.user_id = tb.user_id AND (tu.email = '$this->strTxtUser' OR tu.user = '$this->strTxtUser') AND tu.status != 0 ";
	// echo	$sql = "SELECT tu.user, tu.email FROM table_user tu JOIN (table_block tb JOIN table_seguridad ts ) WHERE tu.user_id = tb.user_id AND tu.user_id = ts.user_id AND (tu.email = '$this->strTxtUser' OR tu.user = '$this->strTxtUser') AND tu.status != 0 ";
	$sql = "SELECT  tu.user, tu.email FROM table_user tu JOIN (table_block tb JOIN table_seguridad ts ) WHERE tu.user_id = tb.user_id AND tu.user_id = ts.user_id AND tu.status != 0 ";
		$request = $this->select($sql);
		return $request;
	}
	// comprobar para hacer login
	public function loginUser(string $txtUser, string $txtPass){
		$this->strTxtUser = $txtUser;
		$this->strTxtPass = $txtPass;
		// $sql = "SELECT * FROM table_user WHERE (email = '$this->strTxtUser' OR user = '$this->strTxtUser') AND  pass = '$this->strTxtPass' AND status != 0 ";
		$sql = "SELECT * FROM table_user  tu JOIN table_block  tb WHERE  tu.user_id = tb.user_id AND (tu.email = '$this->strTxtUser' OR tu.user = '$this->strTxtUser') AND  tu.pass = '$this->strTxtPass' AND tu.status != 0 ";
		// echo $sql;
		$request = $this->select($sql);
		return $request;
	}
	// datos para el inicio de sesion
	public function sessionLogin(int $intIdUser){
		$this->intIdUser = $intIdUser;
		// $sql = "SELECT  * FROM table_user p  WHERE user_id = $this->intIdUser";
		$sql = "SELECT * FROM table_user tu JOIN (table_block tb JOIN table_seguridad ts ) WHERE tu.user_id = tb.user_id AND tu.user_id = ts.user_id AND tu.user_id = $this->intIdUser";
		$request = $this->select($sql);
		$_SESSION['userData'] = $request;
		return $request;
	}
	// generar el codigo de bloqueo para enviarlo al correo
	public function genToken(int $intIdUser, string $strToken, int $intOpcion){
		$this->intIdUser = $intIdUser;
		$this->strToken = $strToken;
		$this->intOpcion = $intOpcion;
		$sqlUpdate = "UPDATE table_block SET token = ? WHERE user_id = $this->intIdUser";
		$sqltoken = "SELECT token FROM table_block WHERE user_id = $this->intIdUser";
		$requestToken = $this->select($sqltoken);
		if($requestToken['token'] == 0){
			// echo $this->intOpcion;
			if($this->intOpcion == 1){
				$strToken = $this->strToken;
			}
		}else if($this->intOpcion == 2){
				$strToken = 0;
			}
			$arrData = array($strToken);
			$request = $this->update($sqlUpdate,$arrData);
			return $request;
	}
	// crear el usuario y comprobar que no existe
	public function createUser(int $intIdentificacion, string $strTxtNombre, string $strTxtEmail, string $strTxtPass){
		$this->intIdentificacion = $intIdentificacion;
		$this->strTxtNombre = $strTxtNombre;
		$this->strTxtPass = $strTxtPass;
		$this->strTxtEmail = $strTxtEmail;
		$this->intListStatus = 1;
		$this->intlistRolId = 7;
		$this->strImg = base_url()."src/img/default.png";

		//consultar si existe
		$sql = "SELECT * FROM table_user WHERE  email = '{$this->strTxtEmail}' or  ci = {$this->intIdentificacion}";
		$request = $this->select_all($sql);
		//si no encontro ningun resultado insertamos el usuario
		if(empty($request)){
			// insertar el nuevo usuario
			$queryInsert = "INSERT INTO table_user(user,ci,nombre,email,status,img,pass) VALUES(?,?,?,?,?,?,?)";
			$arrData = array('default',$this->intIdentificacion,$this->strTxtNombre,$this->strTxtEmail,$this->intListStatus,$this->strImg,$this->strTxtPass);
			$requestInsert = $this->insert($queryInsert,$arrData);
			//inicializar tabla de bloqueo
			$sqlIntento = "INSERT INTO table_block(user_id,intentos,token) VALUES(?,?,?)";
			$arrIntento = array($requestInsert,0,0);
			$log = $this->insert($sqlIntento,$arrIntento);
			$return = $requestInsert;
			//inicializar preguntas
			$sqlQuestion = "INSERT INTO table_seguridad(user_id,r1,r2,r3) VALUES(?,?,?,?)";
			$arrQuestion = array($requestInsert,'','','');
			$log = $this->insert($sqlQuestion,$arrQuestion);
			$return = $requestInsert;
		}else{
			//si no viene vacia es que ya existe un registro
			$return = "exist";
		}
		return $return;
	}
	// actualizar ruta de imagen 
	public function updateUserRuta(int $intIdUser, int $intIdentificacion,string $strTxtEmail, string $strCodUser,string $strRuta){
		$this->intIdUser = $intIdUser;
		$this->intIdentificacion = $intIdentificacion;
		$this->strTxtEmail = $strTxtEmail;
		$this->strCodUser = $strCodUser;
		$this->strRuta = $strRuta;
	 	$sql = "SELECT * FROM table_user WHERE email = '{$this->strTxtEmail}' AND ci = $this->intIdentificacion ";
		$request = $this->select_all($sql);
		if(!empty($request)){
			$sql = "UPDATE table_user SET codigo = ? ,ruta = ? WHERE email = '{$this->strTxtEmail}'  AND ci = $this->intIdentificacion ";
			$arrData = array($this->strCodUser,$this->strRuta);
			$request = $this->update($sql,$arrData);
		}else{
			$request = 'error';
		}
		return $request;
	}
		// evaluar las preguntas para el desbloqueo
	public function pregunta(string $strTxtEmail,string $strR1,string $strR2,string $strR3,int $intCi,string $strToken, string $opcion){
		$this->strR1 = $strR1;
		$this->strR2 = $strR2;
		$this->strR3 = $strR3;
		$this->intCi = $intCi;
		$this->strTxtEmail = $strTxtEmail;
		$this->strToken = $strToken;
		$sql = "SELECT * FROM table_user tu JOIN  (table_block tb  JOIN table_seguridad ts ) WHERE tu.user_id = tb.user_id AND tu.user_id = ts.user_id  AND tu.email = '$this->strTxtEmail' AND  tb.token = '$this->strToken' AND  tu.ci = '$this->intCi' AND tu.status != 0 ";
		$request = $this->select($sql);
		return $request;
	}
	// actualizar tabla de bloqueo para los intentos
	public function updateBlock(int $intIdUser, int $intIntento, int $intOpcion){
		$this->intIdUser = $intIdUser;
		$this->intIntento = $intIntento;
		$this->intOpcion = $intOpcion;
		$sqlUpdate = "UPDATE table_block SET intentos = ? WHERE user_id = $this->intIdUser";
		// die();
		// echo $this->intOpcion;
		if($this->intOpcion == 1){
			$intento = $this->intIntento + 1;
		}else if($this->intOpcion == 2){
			$intento = 0;
		}
		$arrData = array($intento);
		$request = $this->update($sqlUpdate,$arrData);
		return $request;
	}
	// obtener datos del usuario para las preguntas y desbloquear cuenta
	public function getUserBlock(string $strTxtEmail, string $strToken, int $intCi){
		$this->strTxtEmail = $strTxtEmail;
		$this->strToken = $strToken;
		$this->intCi = $intCi;
		$sql = "SELECT * FROM table_user tu JOIN  (table_block tb  JOIN table_seguridad ts ) WHERE tu.user_id = tb.user_id AND tu.user_id = ts.user_id  AND tu.email = '$this->strTxtEmail' AND  tb.token = '$this->strToken' AND  tu.ci = '$this->intCi' AND tu.status != 0 ";
		$request = $this->select($sql);
		return $request;
	}
	// cmabiar clave
	public function changePass(int $intIdUser, string $strTxtPass){
		$this->intIdUser = $intIdUser;
		$this->strTxtPass = $strTxtPass;
		$sqlUpdate = "UPDATE table_user SET pass = ? WHERE user_id = $this->intIdUser";
		$arrData = array($strTxtPass);
		$request = $this->update($sqlUpdate,$arrData);
		return $request;
	}
}