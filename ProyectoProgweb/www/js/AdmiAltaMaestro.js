	var exprNombre = /^([a-zA-Z ñáéíóú]{2,60})$/;
	var exprCorreo = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	var exprNum = /^[0-9]+$/;

$("#btnRegistrar").click(function (){

	var $nombre = $("#nombre").val();
	var $ApePat = $("#apellidop").val();
	var $ApeMat = $("#apellidom").val();
	var $correo = $("#correo").val();
	var error = false;

	if($nombre == "")
	{
		$("#errorNombre").replaceWith("<div class=\"errores\" id=\"errorNombre\">Escribe tu nombre</div>");
		$("#errorNombre").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorNombre").fadeOut();
		if(!exprNombre.test($nombre))
		{
			$("#errorNombre").replaceWith("<div class=\"errores\" id=\"errorNombre\">Nombre inválido</div>");
			$("#errorNombre").fadeIn("slow");
			error = true;
		}
	}

	if($ApePat == "")
	{
		$("#errorApellidoP").replaceWith("<div class=\"errores\" id=\"errorApellidoP\">Escribre tu apellido</div>");
		$("#errorApellidoP").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorApellidoP").fadeOut();
		if(!exprNombre.test($ApePat))
		{
			$("#errorApellidoP").replaceWith("<div class=\"errores\" id=\"errorApellidoP\">Apellido inválido</div>");
			$("#errorApellidoP").fadeIn("slow");
			error = true;
		}
	}

	if($ApeMat == "")
	{
		$("#errorApellidoM").replaceWith("<div class=\"errores\" id=\"errorApellidoM\">Escribre tu apellido</div>");
		$("#errorApellidoM").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorApellidoM").fadeOut();
		if(!exprNombre.test($ApeMat))
		{
			$("#errorApellidoM").replaceWith("<div class=\"errores\" id=\"errorApellidoM\">Apellido inválido</div>");
			$("#errorApellidoM").fadeIn("slow");
			error = true;
		}
	}

	if($correo == "")
	{
		$("#errorCorreo").replaceWith("<div class=\"errores\" id=\"errorCorreo\">Escribre tu correo</div>");
		$("#errorCorreo").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorCorreo").fadeOut();
		if(!exprCorreo.test($correo))
		{
			$("#errorCorreo").replaceWith("<div class=\"errores\" id=\"errorCorreo\">Correo inválido</div>");
			$("#errorCorreo").fadeIn("slow");
			error = true;
		}
	}

	if(!error)
		$( "#formulario" ).submit();
});