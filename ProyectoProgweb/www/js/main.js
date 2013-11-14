var exprNum = /^[0-9]+$/;

$("#buttonlogin").click(function(){

	var error = false;
	var $codigo = $("#codigo").val();
	var $password = $("#contra").val();

	if($codigo == ""){
		//$("#errorCodigo").replaceWith("<div class=\"errores\" id=\"errorCodigo\">Escribe tu codigo</div>");
		$("#errorCodigo").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorCodigo").fadeOut();
		if(!exprNum.test($codigo))
		{
			$("#errorCodigo").replaceWith("<div class=\"errores\" id=\"errorCodigo\">Codigo inválido</div>");
			$("#errorCodigo").fadeIn("slow");
			error = true;
		}
	}

	if($password == ""){
		$("#errorPass").fadeIn("slow");
		error = true;
	}
	else
		$("#errorPass").fadeOut();

	if(!error)
		$( "#formulario" ).submit();

});
