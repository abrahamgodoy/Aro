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


	function getUser($correo){
		$admi=$this->administrativo($correo);
		if($admi!=false)
			return $admi;


		$maes=$this->maestro($correo);
		if($maes!=false)
			return $maes;


		$alum=$this->alumno($correo);
		if($alum!=false)
			return $alum;

		return false;
		
	}

	function administrativo($correo){
		$query = "SELECT * FROM administrativo where correo='$correo'";

		$r = $this -> driver -> query($query);

		if ($r-> num_rows!=0){
			$row=$this->procesarResultado($r);
			return $row[0];
		}

		return false;
	}

	function maestro($correo){
		$query = "SELECT * FROM maestro where correo='$correo'";

		$r = $this -> driver -> query($query);

		if ($r->num_rows!=0){
			$row=$this->procesarResultado($r);
			return $row[0];
		}

		return false;

	}

	function alumno($correo){
		$query = "SELECT * FROM alumno where correo='$correo'";

		$r = $this -> driver -> query($query);

		if ($r->num_rows!=0){
			$row=$this->procesarResultado($r);
			return $row[0];
		}

		return false;
	}


}

?>