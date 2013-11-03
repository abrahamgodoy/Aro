<?php
switch($_GET["ctl"]){
	case "alumnos":
		//incluyo el controlador
		require_once("Controladores/alumnoCtl.php");
		$ctl = new alumnoCtl();
	break;
	case "administrativo":
		require_once("Controladores/administrativoCtl.php");
		$ctl = new administrativoCtl();
	break;
	case "maestro":
		require_once("Controladores/maestroCtl.php");
		$ctl = new maestroCtl();
	default:
}

$ctl -> ejecutar();

?>