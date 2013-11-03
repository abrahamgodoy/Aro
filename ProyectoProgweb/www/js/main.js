var exprNum = /^[0-9]+$/;

$("#buttonlogin").click(function(){

	var $codigo = $("#codigo").val();
	var $password = $("#contra").val();

	if($codigo == ""){
		//$("#errorCodigo").replaceWith("<div class=\"errores\" id=\"errorCodigo\">Escribe tu codigo</div>");
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

	if($password == ""){
		$("#errorPass").fadeIn("slow");
	}
	else
		$("#errorPass").fadeOut();
});
