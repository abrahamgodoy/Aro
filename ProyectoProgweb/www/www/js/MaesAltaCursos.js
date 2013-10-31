	var exprNombre = /^[a-zA-Z]+$/;
	var exprNum = /^[0-9]+$/;
	var exprSecc = /^D[0-9][0-9]$/;
	var exprNrc = /^[0-9][0-9][0-9][0-9]$/;
	var exprCriterio = /^[a-zA-Z]+$/;
	var exprPts = /^[0-9][0-9]$/;
	var numCriterio = 2;
	var numHorario = 2;

$("#otrohorario").click(function (){
	var idHorario = "horario" + numHorario;
	$("div.horario").clone().removeClass("horario").attr("id",idHorario).insertBefore("#criterio1");
	numHorario++;
});

$("#otrocriterio").click(function (){
	var idCriterio = "criterio" + numCriterio;
	$("div.duplicarcri").clone().removeClass("duplicarcri").attr("id",idCriterio).insertBefore("#botonregistrar");
	numCriterio++;
});


$("#btnRegistrar").click(function (){

	var $ciclo = $("#ciclo").val();
	var $nombre = $("#nom").val();
	var $seccion = $("#seccion").val();
	var $nrc = $("#nrc").val();

	if($ciclo == 0)
		$("#errorCiclo").fadeIn("slow");
	else
		$("#errorCiclo").fadeOut();

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

	if($seccion == "")
	{
		$("#errorSeccion").replaceWith("<div class=\"errores\" id=\"errorSeccion\">Escribre una sección</div>");
		$("#errorSeccion").fadeIn("slow");
	}
	else
	{
		$("#errorSeccion").fadeOut();
		if(!exprSecc.test($seccion))
		{
			$("#errorSeccion").replaceWith("<div class=\"errores\" id=\"errorSeccion\">Sección inválida</div>");
			$("#errorSeccion").fadeIn("slow");
		}
	}

	if($nrc == "")
	{
		$("#errorNrc").replaceWith("<div class=\"errores\" id=\"errorNrc\">Escribre el NRC</div>");
		$("#errorNrc").fadeIn("slow");
	}
	else
	{
		$("#errorNrc").fadeOut();
		if(!exprNrc.test($nrc))
		{
			$("#errorNrc").replaceWith("<div class=\"errores\" id=\"errorNrc\">NRC inválido</div>");
			$("#errorNrc").fadeIn("slow");
		}
	}

	if(!$("input[name='dias[]']").is(":checked"))
	{
		$("#errorDias").fadeIn("slow");
	}
	else
		$("#errorDias").fadeOut()

	for (var i = 1; i < numHorario; i++) {

		var id = "horario" + i;
		var $hora = $("div#"+id+" input#hora").val();
		var $hora2 = $("div#"+id+" input#hora2").val();
		if($hora == "" || $hora2 == "")
		{
			$("div#"+id+" div#errorHora").replaceWith("<div class=\"errores\" id=\"errorHora\">Escribe una Hora</div>");
			$("div#"+id+" div#errorHora").fadeIn("slow");
		}
		else
		{
			$("div#"+id+" div#errorHora").fadeOut();
			if(!exprNrc.test($hora) || !exprNrc.test($hora2))
			{
				$("div#"+id+" div#errorHora").replaceWith("<div class=\"errores\" id=\"errorHora\">Hora inválida</div>");
				$("div#"+id+" div#errorHora").fadeIn("slow");
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
		}
		else
		{
			$("div#"+id+" div#errorCriterio").fadeOut();
			if(!exprCriterio.test($criterio) || !exprPts.test($puntos))
			{
				$("div#"+id+" div#errorCriterio").replaceWith("<div class=\"errores\" id=\"errorCriterio\">Criterio inválido</div>");
				$("div#"+id+" div#errorCriterio").fadeIn("slow");
			}
		}
	};
});

$("#btnClonar").click(function(){
	var $curso = $("#curso2").val();
	var $ciclo = $("#ciclo2").val();

	if($curso == 0)
		$("#errorCiclo2").fadeIn("slow");
	else
		$("#errorCiclo2").fadeOut();

	if($ciclo == 0)
		$("#errorCurso2").fadeIn("slow");
	else
		$("#errorCurso2").fadeOut();
});