<?php
class Logout{
	public function __construct(){
		session_start();
		// $strHoraFin = date("h:i:s");
		// endTimeline($_SESSION['strCodigo'],$strHoraFin);
		session_unset();
		session_destroy();
		header("Location:".base_url().'acceso/login');
	}
}