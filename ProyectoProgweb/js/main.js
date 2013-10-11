var exprnum= /^[0-9]+?/;

$("#buttonlogin").click(function(){

	var $codigo = $("#codigo").val();
	var $password = $("#contraseña").val(); 

	if($codigo == ""){
		$("#errorCodigo").replaceWith("<p class=\"errores\" id=\"errorCodigo\">Escribe tu codigo</p>");
		$("#errorCodigo").fadeIn("slow");
	}
	else
	{
		$("#errorCodigo").fadeOut();
		if(!exprNum.test($codigo))
		{
			$("#errorCodigo").replaceWith("<p class=\"errores\" id=\"errorCodigo\">Codigo inválido</p>");
			$("#errorCodigo").fadeIn("slow");
		}
	}

	if($password==""){
		$("#errorPass").fadeIn("slow");
	}
}

);
