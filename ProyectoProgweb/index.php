<?php
session_start();

if(!isset($_GET["ctl"]))
	$_GET["ctl"]='login';

switch($_GET["ctl"]){

	case 'login':
		require_once("Controladores/loginCtl.php");
		$ctl = new loginCtl();
		break;

	case 'logout':
		require_once("Controladores/logoutCtl.php");
		$ctl = new loginCtl();		
		break;

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
	break;

	case 'olvidaste':
		require_once("Controladores/olvidasteCtl.php");
		$ctl = new olvidasteoCtl();
		break;

	case 'subirArchivo':
		require_once("Controladores/subirArchivoCtl.php");
}

$ctl -> ejecutar();

?>