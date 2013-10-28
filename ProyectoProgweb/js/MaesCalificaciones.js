var exprNum = /^[0-1]?[0-9]{1,2}$/;

$("#btnRegistrar").click(function (){

	var $curso = $("#curso").val();
	var blanco = true;
	var invalido = false;

	if($curso == 0)
		$("#errorCurso").fadeIn("slow");
	else
		$("#errorCurso").fadeOut();

	$("input[type='text']").each( function() {
		if(!$(this).val() == "")
		{
			blanco = false;
			if(!exprNum.test($(this).val()))
				invalido = true;
			else
				invalido = false;
		}
	});
	if(invalido)
	{
		$("#errorCalif").replaceWith("<div class=\"errores\" id=\"errorCalif\">Calificación inválida</div>");
		$("#errorCalif").fadeIn("slow");
	}	
	else
		$("#errorCalif").fadeOut();
	if(blanco)
	{
		$("#errorCalif").replaceWith("<div class=\"errores\" id=\"errorCalif\">Debes capturar calificaciones</div>");
		$("#errorCalif").fadeIn("slow");
	}
});