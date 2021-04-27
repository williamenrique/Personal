<?php
class UserModel extends Mysql{
		private $intId;
		private $intIdUser;
		private $strTxtNick;
		private $strAvatar;
		private $strTxtEmail;
		private $intCi;
		private $strTxtPass;
		private $strNomb;
		private $strApell;
		private $strTlf;
		private $strDirec;
		private $intState;
		private $intCiudad; 
		private $strP1;
		private $strP2;
		private $strP3;
		private $strR1;
		private $strR2;
		private $strR3;
	public function __construct(){
		parent::__construct();
	}
	//funciones para traer todas los estados ciudades y municipios
	public function selectState(){
		$sql = "SELECT * FROM table_estados";
		$request = $this->select_all($sql);
		return $request;
	}
	public function selectCiudades(int $id){
		$sql = "SELECT * FROM table_ciudades WHERE id_estado = $id";
		$request = $this->select_all($sql);
		return $request;
	}
	public function selectMunicipios(int $id){
		$sql = "SELECT * FROM table_municipios WHERE id_estado = $id";
		$request = $this->select_all($sql);
		return $request;
	}

	//crear Nick
	public function createNick(int $intIdUser, int $intCi, string $strTxtEmail, string $strTxtNick){
		$this->intIdUser = $intIdUser;
		$this->strTxtNick = $strTxtNick;
		$this->strTxtEmail = $strTxtEmail;
		$this->intCi = $intCi;
		//comprovar que el usuario no exista
		$sqlNick = "SELECT user FROM table_user WHERE user = '{$this->strTxtNick}'";
		$requestNick = $this->select_all($sqlNick);

		if(empty($requestNick)){
			$sql = "UPDATE table_user SET  user = ? WHERE user_id = $this->intIdUser AND ci = $this->intCi";
			$arrData = array($this->strTxtNick);
			$request = $this->update($sql,$arrData);
		}else{
			$request = "exist";
		}
		return $request;
	}
	// cmabio de clave
	public function changePass(int $intIdUser, int $intCi, string $strTxtEmail, string $strTxtPass){
		$this->intIdUser = $intIdUser;
		$this->strTxtEmail = $strTxtEmail;
		$this->intCi = $intCi;
		$this->strTxtPass = $strTxtPass;
		$sql = "UPDATE table_user SET pass = ? WHERE user_id = $this->intIdUser AND ci = $this->intCi";
		$arrData = array($this->strTxtPass);
		$request = $this->update($sql,$arrData);
		return $request;
	}
	// actualizar datos de perfil
	public function updateProfile(int $intIdUser,int $intCi,string $strTxtEmail,string $strNomb,string $strApell, string $strTlf, string $strDirec,int $intCodPostal,int $intState,int $intCiudad){
		$this->intIdUser = $intIdUser;
		$this->strTxtEmail = $strTxtEmail;
		$this->intCi = $intCi;
		$this->strNomb = $strNomb;
		$this->strApell = $strApell;
		$this->strTlf = $strTlf;
		$this->strDirec = $strDirec;
		$this->intState = $intState;
		$this->intCiudad = $intCiudad;
		$this->intCodPostal = $intCodPostal;

		$sql = "UPDATE table_user SET nombre= ? , apellido= ? , telefono= ? , direccion= ?, estado= ? , ciudad= ? ,codPostal= ? WHERE user_id = $this->intIdUser AND ci = $this->intCi";
		$arrData = array($this->strNomb,$this->strApell,$this->strTlf,$this->strDirec,$this->intState,$this->intCiudad,$this->intCodPostal);
		$request = $this->update($sql,$arrData);
		return $request;
	}

	// cambiar imagen de perfil
	public function updateAvatar(int $intIdUser,int $intCi,string $strTxtEmail,string $strAvatar){
		$this->intIdUser = $intIdUser;
		$this->strTxtEmail = $strTxtEmail;
		$this->intCi = $intCi;
		$this->strAvatar = $strAvatar;
		
		$sql = "UPDATE table_user SET img= ? WHERE user_id = $this->intIdUser AND ci = $this->intCi";
		$arrData = array($this->strAvatar);
		$request = $this->update($sql,$arrData);
		return $request;
	}
	// actualizar las preguntas y respuestas de seguridad
	public function updateQuestion($intId,$strP1, $strP2, $strP3, $strR1, $strR2, $strR3){
		$this->intId = $intId;
		$this->strP1 = $strP1;
		$this->strP2 = $strP2;
		$this->strP3 = $strP3;
		$this->strR1 = $strR1;
		$this->strR2 = $strR2;
		$this->strR3 = $strR3;
		$sqlUpdate = "UPDATE table_seguridad SET p1 = ?, r1 = ?, p2 = ?, r2 = ?, p3 = ?, r3 = ? WHERE user_id = $this->intId";
		$arrData = array($this->strP1,$this->strR1,$this->strP2,$this->strR2,$this->strP3,$this->strR3);
		$request = $this->update($sqlUpdate,$arrData);
		return $request;
	}
}