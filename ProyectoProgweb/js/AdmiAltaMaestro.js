	var exprNombre = /^[a-zA-Z]+$/;
	var exprCorreo = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	var exprNum = /^[0-9]+$/;

$("#btnRegistrar").click(function (){

	var $codigo = $("#codigo").val();
	var $nombre = $("#nombre").val();
	var $ApePat = $("#apellidop").val();
	var $ApeMat = $("#apellidom").val();
	var $correo = $("#correo").val();

	if($codigo == "")
	{
		$("#errorCodigo").replaceWith("<div class=\"errores\" id=\"errorCodigo\">Escribe tu codigo</div>");
		$("#errorCodigo").fadeIn("slow");
	}
	else
	{
		$("#errorCodigo").fadeOut();
		if(!exprNum.test($codigo))
		{
			$("#errorCodigo").replaceWith("<div class=\"errores\" id=\"errorCodigo\">Codigo inválido</div>");
			$("#errorCodigo").fadeIn("slow");
		}
	}

	if($nombre == "")
	{
		$("#errorNombre").replaceWith("<div class=\"errores\" id=\"errorNombre\">Escribe tu nombre</div>");
		$("#errorNombre").fadeIn("slow");
	}
	else
	{
		$("#errorNombre").fadeOut();
		if(!exprNombre.test($nombre))
		{
			$("#errorNombre").replaceWith("<div class=\"errores\" id=\"errorNombre\">Nombre inválido</div>");
			$("#errorNombre").fadeIn("slow");
		}
	}

	if($ApePat == "")
	{
		$("#errorApellidoP").replaceWith("<div class=\"errores\" id=\"errorApellidoP\">Escribre tu apellido</div>");
		$("#errorApellidoP").fadeIn("slow");
	}
	else
	{
		$("#errorApellidoP").fadeOut();
		if(!exprNombre.test($ApePat))
		{
			$("#errorApellidoP").replaceWith("<div class=\"errores\" id=\"errorApellidoP\">Apellido inválido</div>");
			$("#errorApellidoP").fadeIn("slow");
		}
	}

	if($ApeMat == "")
	{
		$("#errorApellidoM").replaceWith("<div class=\"errores\" id=\"errorApellidoM\">Escribre tu apellido</div>");
		$("#errorApellidoM").fadeIn("slow");
	}
	else
	{
		$("#errorApellidoM").fadeOut();
		if(!exprNombre.test($ApeMat))
		{
			$("#errorApellidoM").replaceWith("<div class=\"errores\" id=\"errorApellidoM\">Apellido inválido</div>");
			$("#errorApellidoM").fadeIn("slow");
		}
	}

	if($correo == "")
	{
		$("#errorCorreo").replaceWith("<div class=\"errores\" id=\"errorCorreo\">Escribre tu correo</div>");
		$("#errorCorreo").fadeIn("slow");
	}
	else
	{
		$("#errorCorreo").fadeOut();
		if(!exprCorreo.test($correo))
		{
			$("#errorCorreo").replaceWith("<div class=\"errores\" id=\"errorCorreo\">Correo inválido</div>");
			$("#errorCorreo").fadeIn("slow");
		}
	}
});