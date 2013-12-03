	var exprNombre = /^([a-zA-Z ñáéíóú]{2,60})$/;
	var exprCorreo = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	var exprNum = /^[0-9]+$/;
	

$("#btnArchivo").click(function(){
	var errora = false
	var $archivo = $("#lista").val();

	if($archivo == "")
	{
		$("#errorArchivo").fadeIn("slow");
		errora = true;
	}
	else
	{
		$("#errorArchivo").fadeOut();
	}

	if(!errora)
		$(" #examinar ").submit();

});


$("#btnRegistrar").click(function (){

	var $nombre = $("#nom").val();
	var $ApePat = $("#app").val();
	var $ApeMat = $("#apm").val();
	var $correo = $("#correo").val();
	var $carrera = $("#carrera").val();
	var $status = $("#status").val();
	var error = false;

	if($nombre == "")
	{
		$("#errorNom").replaceWith("<div class=\"errores\" id=\"errorNom\">Escribe tu nombre</div>");
		$("#errorNom").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorNom").fadeOut();
		if(!exprNombre.test($nombre))
		{
			$("#errorNom").replaceWith("<div class=\"errores\" id=\"errorNom\">Nombre inválido</div>");
			$("#errorNom").fadeIn("slow");
			error = true;
		}
	}

	if($ApePat == "")
	{
		$("#errorApp").replaceWith("<div class=\"errores\" id=\"errorApp\">Escribre tu apellido paterno</div>");
		$("#errorApp").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorApp").fadeOut();
		if(!exprNombre.test($ApePat))
		{
			$("#errorApp").replaceWith("<div class=\"errores\" id=\"errorApp\">Apellido inválido</div>");
			$("#errorApp").fadeIn("slow");
			error = true;
		}
	}

	if($ApeMat == "")
	{
		$("#errorApm").replaceWith("<div class=\"errores\" id=\"errorApm\">Escribre tu apellido materno</div>");
		$("#errorApm").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorApm").fadeOut();
		if(!exprNombre.test($ApeMat))
		{
			$("#errorApm").replaceWith("<div class=\"errores\" id=\"errorApm\">Apellido inválido</div>");
			$("#errorApm").fadeIn("slow");
			error = true;
		}
	}

	if($carrera == "")
	{
		$("#errorCarr").replaceWith("<div class=\"errores\" id=\"errorCarr\">Escribre tu carrera</div>");
		$("#errorCarr").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorCarr").fadeOut();
		if(!exprNombre.test($carrera))
		{
			$("#errorCarr").replaceWith("<div class=\"errores\" id=\"errorCarr\">Carrera inválida</div>");
			$("#errorCarr").fadeIn("slow");
			error = true;
		}
	}

	if($correo == "")
	{
		$("#errorCorr").replaceWith("<div class=\"errores\" id=\"errorCorr\">Escribre correo</div>");
		$("#errorCorr").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorCorr").fadeOut();
		if(!exprCorreo.test($correo))
		{
			$("#errorCorr").replaceWith("<div class=\"errores\" id=\"errorCorr\">Correo inválido</div>");
			$("#errorCorr").fadeIn("slow");
			error = true;
		}
	}
	if($status == 0)
	{
		$("#errorStatus").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorStatus").fadeOut();
	}
		
	if(!error)
		$( "#formulario" ).submit();
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