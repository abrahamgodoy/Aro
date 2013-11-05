	var exprNombre = /^[a-zA-Z]+$/;
	var exprCorreo = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	var exprNum = /^[0-9]+$/;


$("#btnArchivo").click(function(){

	var $archivo = $("#lista").val();

	if($archivo == "")
	{
		$("#errorArchivo").fadeIn("slow");
	}

});


$("#btnRegistrar").click(function (){

	var $codigo = $("#cod").val();
	var $nombre = $("#nom").val();
	var $ApePat = $("#app").val();
	var $ApeMat = $("#apm").val();
	var $correo = $("#correo").val();
	var $carrera = $("#carrera").val();
	var $status = $("#status").val();


	if($codigo == "")
	{
		$("#errorCod").replaceWith("<div class=\"errores\" id=\"errorCod\">Escribe tu codigo</div>");
		$("#errorCod").fadeIn("slow");
	}
	else
	{
		$("#errorCod").fadeOut();
		if(!exprNum.test($codigo))
		{
			$("#errorCod").replaceWith("<div class=\"errores\" id=\"errorCod\">Codigo inválido</div>");
			$("#errorCod").fadeIn("slow");
		}
	}

	if($nombre == "")
	{
		$("#errorNom").replaceWith("<div class=\"errores\" id=\"errorNom\">Escribe tu nombre</div>");
		$("#errorNom").fadeIn("slow");
	}
	else
	{
		$("#errorNom").fadeOut();
		if(!exprNombre.test($nombre))
		{
			$("#errorNom").replaceWith("<div class=\"errores\" id=\"errorNom\">Nombre inválido</div>");
			$("#errorNom").fadeIn("slow");
		}
	}

	if($ApePat == "")
	{
		$("#errorApp").replaceWith("<div class=\"errores\" id=\"errorApp\">Escribre tu apellido paterno</div>");
		$("#errorApp").fadeIn("slow");
	}
	else
	{
		$("#errorApp").fadeOut();
		if(!exprNombre.test($ApePat))
		{
			$("#errorApp").replaceWith("<div class=\"errores\" id=\"errorApp\">Apellido inválido</div>");
			$("#errorApp").fadeIn("slow");
		}
	}

	if($ApeMat == "")
	{
		$("#errorApm").replaceWith("<div class=\"errores\" id=\"errorApm\">Escribre tu apellido materno</div>");
		$("#errorApm").fadeIn("slow");
	}
	else
	{
		$("#errorApm").fadeOut();
		if(!exprNombre.test($ApeMat))
		{
			$("#errorApm").replaceWith("<div class=\"errores\" id=\"errorApm\">Apellido inválido</div>");
			$("#errorApm").fadeIn("slow");
		}
	}

	if($carrera == 0)
		$("#errorCarr").fadeIn("slow");
	else
		$("#errorCarr").fadeOut();

	if($correo == "")
	{
		$("#errorCorr").replaceWith("<div class=\"errores\" id=\"errorCorr\">Escribre correo</div>");
		$("#errorCorr").fadeIn("slow");
	}
	else
	{
		$("#errorCorr").fadeOut();
		if(!exprCorreo.test($correo))
		{
			$("#errorCorr").replaceWith("<div class=\"errores\" id=\"errorCorr\">Correo inválido</div>");
			$("#errorCorr").fadeIn("slow");
		}
	}
	if($status == 0)
		$("#errorStatus").fadeIn("slow");
	else
		$("#errorStatus").fadeOut();

});

function estaActivado( checkbox ) {
        if( checkbox.checked ) {
                if( checkbox.id == "tiene_celular" ) {
                        var campo = document.getElementById( 'campo_celular' );
                        campo.setAttribute( 'style', 'display: block' );
                }
                else if( checkbox.id == "tiene_github" ) {
                        var campo = document.getElementById( 'campo_github' );
                        campo.setAttribute( 'style', 'display: block' );
                }
                else { //tiene_pagina
                        var campo = document.getElementById( 'campo_pagina' );
                        campo.setAttribute( 'style', 'display: block' );
                }

        }
        else {
                if( checkbox.id == "tiene_celular" ) {
                        var campo = document.getElementById( 'campo_celular' );
                        campo.setAttribute( 'style', 'display: none' );
                }
                else if( checkbox.id == "tiene_github" ) {
                        var campo = document.getElementById( 'campo_github' );
                        campo.setAttribute( 'style', 'display: none' );
                }
                else { //tiene_pagina
                        var campo = document.getElementById( 'campo_pagina' );
                        campo.setAttribute( 'style', 'display: none' );
                }
        }
}