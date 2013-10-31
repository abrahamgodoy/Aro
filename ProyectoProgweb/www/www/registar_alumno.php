<?php
	echo 'hola';

	//Creando conexion
	$con = new mysqli('localhost','root','','user203');

	var_dump($con);

	if($con->connect_error){
		//echo "no me puedo conectar";
		//exit();
		die('no me pude conectar');
	}


	$nombre= $_POST("nombre");
	$codigo= $_POST("codigo");

	$miquery = "insert into alumno(codigo, nombre) values()";

	/*$miquery = "select * from alumnos";

	$resultado = $con->query($miquery);

	var_dump($resultado);*/

	$con->close();

?>