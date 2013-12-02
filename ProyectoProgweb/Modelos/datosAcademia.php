<?php
	//obtengo los datos y  los limpio (o valido)
	$id=$_POST['idAcademia'];

	require_once('DataBase.php');
	$driver = DataBase::getInstance();

	//hago un query para obtener los alumnos
	$consulta="SELECT * from materia where idAcademia=$id";
	$resultado= $driver->query($consulta);

	//proceso del resultado
	while($row = $resultado -> fetch_assoc())
			$rows[] = $row;


	echo json_encode($rows);

?>