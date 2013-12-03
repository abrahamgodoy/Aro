	var exprNombre = /^[a-zA-Z]+$/;
	var exprNum = /^[0-9]+$/;
	var exprSecc = /^D[0-9][0-9]$/;
	var exprNrc = /^[0-9][0-9][0-9][0-9]$/;
	var exprCriterio = /^[a-zA-Z]+$/;
	var exprPts = /^[0-9][0-9]$/;
	var numCriterio = 2;
	var numHorario = 2;
	var exprHora = /^[0-9][0-9]:[0-9][0-9]$/;

$("#otrohorario").click(function (){
	var idHorario = "horario" + numHorario;
	$("div.clonarhorario").clone().removeClass("horario").attr("id",idHorario).insertBefore("#divOtroHorario");
	numHorario++;
});

$("#otrocriterio").click(function (){
	var idCriterio = "criterio" + numCriterio;
	$("div.clonarcri").clone().removeClass("duplicarcri").attr("id",idCriterio).insertBefore("#divOtroCriterio");
	numCriterio++;
});


$("#btnRegistrar").click(function (){

	var $ciclo = $("#ciclo").val();
	var $nombre = $("#nom").val();
	var $seccion = $("#seccion").val();
	var $nrc = $("#nrc").val();
	var error = false;

	if($ciclo == 0)
	{
		$("#errorCiclo").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorCiclo").fadeOut();
	}

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
			$("#errorNombre").replaceWith("<div class=\"errores\" id=\"errorNombre\">Nombre inválido. Solo letras del alfabeto</div>");
			$("#errorNombre").fadeIn("slow");
			error = true;
		}
	}

	if($seccion == "")
	{
		$("#errorSeccion").replaceWith("<div class=\"errores\" id=\"errorSeccion\">Escribre una sección</div>");
		$("#errorSeccion").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorSeccion").fadeOut();
		if(!exprSecc.test($seccion))
		{
			$("#errorSeccion").replaceWith("<div class=\"errores\" id=\"errorSeccion\">Sección inválida. Formato: D[numero][numero]</div>");
			$("#errorSeccion").fadeIn("slow");
			error = true;
		}
	}

	if($nrc == "")
	{
		$("#errorNrc").replaceWith("<div class=\"errores\" id=\"errorNrc\">Escribre el NRC</div>");
		$("#errorNrc").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorNrc").fadeOut();
		if(!exprNrc.test($nrc))
		{
			$("#errorNrc").replaceWith("<div class=\"errores\" id=\"errorNrc\">NRC inválido. Formato: [num][num][num][num]</div>");
			$("#errorNrc").fadeIn("slow");
			error = true;
		}
	}

	if(!$("input[name='dias[]']").is(":checked"))
	{
		$("#errorDias").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorDias").fadeOut();
	}

	for (var i = 1; i < numHorario; i++) {

		var id = "horario" + i;
		var $hora = $("div#"+id+" input#hora").val();
		var $hora2 = $("div#"+id+" input#hora2").val();
		if($hora == "" || $hora2 == "")
		{
			$("div#"+id+" div#errorHora").replaceWith("<div class=\"errores\" id=\"errorHora\">Escribe una Hora</div>");
			$("div#"+id+" div#errorHora").fadeIn("slow");
			error = true;
		}
		else
		{
			$("div#"+id+" div#errorHora").fadeOut();
			if(!exprHora.test($hora) || !exprHora.test($hora2))
			{
				$("div#"+id+" div#errorHora").replaceWith("<div class=\"errores\" id=\"errorHora\">Hora inválida.Formato: [num][num]:[num][num]</div>");
				$("div#"+id+" div#errorHora").fadeIn("slow");
				error = true;
			}
		}
	};
		
	for (var i = 1; i < numCriterio; i++) {

		var id = "criterio" + i;
		var $criterio = $("div#"+id+" input#criterio").val();
		var $puntos = $("div#"+id+" input#pts").val();

		if($criterio == "" || $criterio == "Criterio" || $puntos == "" || $puntos == "--%")
		{
			$("div#"+id+" div#errorCriterio").replaceWith("<div class=\"errores\" id=\"errorCriterio\">Escribre un criterio</div>");
			$("div#"+id+" div#errorCriterio").fadeIn("slow");
			error = true;
		}
		else
		{
			$("div#"+id+" div#errorCriterio").fadeOut();
			if(!exprCriterio.test($criterio) || !exprPts.test($puntos))
			{
				$("div#"+id+" div#errorCriterio").replaceWith("<div class=\"errores\" id=\"errorCriterio\">Criterio inválido.Criterio:[letras]-Pts:[num][num]</div>");
				$("div#"+id+" div#errorCriterio").fadeIn("slow");
				error = true;
			}
		}
	};

	if(!error)
		$("#formulario").submit();
});

$("#btnClonar").click(function(){
	var $curso = $("#curso2").val();
	var $ciclo = $("#ciclo2").val();

	if($curso == 0)
	{
		$("#errorCiclo2").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorCiclo2").fadeOut();
		error = false;
	}

	if($ciclo == 0)
	{
		$("#errorCurso2").fadeIn("slow");
		error = true;
	}
	else
	{
		$("#errorCurso2").fadeOut();
		error = false;
	}
});