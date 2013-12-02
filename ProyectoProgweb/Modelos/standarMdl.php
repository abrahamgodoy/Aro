<?php

class olvidasteMdl{
	public $driver;

	function __construct(){
		require_once('DataBase.php');
		$this -> driver = DataBase::getInstance();
	}

	function procesarResultado($r){

		while($row = $r -> fetch_assoc())
			$rows[] = $row;

		return $rows;
	}

	function userValidator($codigo,$contrasena){
		$r=$this->administrativo($codigo,$contrasena);
		if ($r==true)
			return 'administrativo';

		$r=$this->maestro($codigo,$contrasena);
		if ($r==true)
			return 'maestro';

		$r=$this->alumno($codigo,$contrasena);
		if ($r==true)
			return 'alumno';

		return false;
	}

	function administrativo($codigo,$contrasena){
		$query="SELECT * from administrativo where codigo='$codigo' and contrasena='$contrasena' ";
		$r=$this -> driver -> query($query);

		if($r-> num_rows==0)
			return false;

		return true;

	}

	function maestro($codigo,$contrasena){
		$query="SELECT * from maestro where codigo='$codigo' and contrasena='$contrasena' ";
		$r=$this -> driver -> query($query);

		if($r-> num_rows==0)
			return false;

		return true;

	}

	function alumno($codigo,$contrasena){
		$query="SELECT * from alumno where codigo='$codigo' and contrasena='$contrasena' ";
		$r=$this -> driver -> query($query);

		if($r-> num_rows==0)
			return false;

		return true;

	}

	function getAdmi($codigo){
		$query="SELECT * from administrativo where codigo='$codigo'";

		$r=$this -> driver -> query($query);

		$rows=$this->procesarResultado($r);
		return $rows[0];

	}
	function getTeacher($codigo){
		$query="SELECT * from maestro where codigo='$codigo'";

		$r=$this -> driver -> query($query);

		$rows=$this->procesarResultado($r);
		return $rows[0];
		
	}
	function getStudent($codigo){
		$query="SELECT * from alumno where codigo='$codigo'";

		$r=$this -> driver -> query($query);

		$rows=$this->procesarResultado($r);
		return $rows[0];
	}



}
?>