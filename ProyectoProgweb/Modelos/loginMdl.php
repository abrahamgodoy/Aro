<?php

class loginMdl{
	public $driver;
	
	function __construct(){
		require_once('DataBase.php');
		$this -> driver = DataBase::getInstance();
	}

	function administrador($codigo,$pass){
		$query="SELECT codigo, contrasena FROM administrativo WHERE codigo='$codigo' and contrasena='$pass'";
		
		$r = $this -> driver -> query($query);

		echo $query;
		
		var_dump($r);
		echo $r->num_rows;

		if($r->num_rows==0)
			return false;
		else 
			return true;
	}

}

?>