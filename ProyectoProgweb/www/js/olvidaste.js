var exprCorreo = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

$("#btn").click(function (){

	var $correo = $("#correo").val();
	var error = false;

	if($correo == "")
	{
		$("#errorCorreo").replaceWith("<div class=\"errores\" id=\"errorCorreo\">Escribre correo</div>");
		$("#errorCorreo").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorCorreo").fadeOut();
		if(!exprCorreo.test($correo))
		{
			$("#errorCorreo").replaceWith("<div class=\"errores\" id=\"errorCorreo\">Incorrecto: formato=[caracter(es)]@[caracter(es)].[caracter(es)]</div>");
			$("#errorCorreo").fadeIn("slow");
			error = true;
		}
	}

	if(!error)
		$( "#formulario" ).submit();
});