<?php

	$id=$_POST['idCurso'];

	require_once('DataBase.php');
	$driver = DataBase::getInstance();

	//hago un query para obtener los alumnos
	$consulta="SELECT a.codigo,a.nombre,a.apellidoP,a.apellidoM from alumno a where a.codigo!= (select m.codigo from matriculado m where idCurso='$id')";
	$resultado= $driver->query($consulta);
	//proceso del resultado
	while($row = $resultado -> fetch_assoc())
			$rows[] = $row;


	echo json_encode($rows);

?>