
	var exprCiclo = /^20[0-9]{2}[(a|b|v)(A|B|V)]$/;
	var exprFecha = /^(19|20)[0-9][0-9]-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$/;
	var numID = 1;

$( document ).ready(function() {

    $( ".date" ).datepicker({
    	dateFormat: 'yy-mm-dd'
    });

	$("#otroDia").click(function(){
		$("div#dia1").clone().attr("id","dia" + (numID+1)).insertAfter("#motivo" + numID);
		$("div#motivo1").clone().attr("id","motivo" + (numID+1)).insertAfter("#dia" + (numID+1));
		numID++;
	});

	$("#btnRegistrar").click(function (){

		var $ciclo = $("#nciclo").val();
		var $inicio = $("#inicio").val();
		var $finalizacion = $("#finalizacion").val();
		var error = false;

		if($ciclo == "")
		{
			$("#errorCiclo").replaceWith("<div class=\"errores\" id=\"errorCiclo\">Escribe el ciclo</div>");
			$("#errorCiclo").fadeIn("slow");
			error = true;
		}
		else
		{
			$("#errorCiclo").fadeOut();
			if(!exprCiclo.test($ciclo))
			{
				$("#errorCiclo").replaceWith("<div class=\"errores\" id=\"errorCiclo\">Ciclo inválido</div>");
				$("#errorCiclo").fadeIn("slow");
				error = true;
			}
		}
		if($inicio == "" || $inicio == 0)
		{
			$("#errorFecha1").fadeIn("slow");
			error = true;
		}
		else
		{
			$("#errorFecha1").fadeOut();
		}

		if($finalizacion == "" || $finalizacion == 0)
		{
			$("#errorFecha2").fadeIn("slow");
			error = true;
		}
		else
		{
			$("#errorFecha2").fadeOut();
		}

		for(var i = 1; i <= numID; i++){
			var $dia = $("div#dia"+i+" input#festivos").val();
			var $motivo = $("div#motivo"+i+" input#motivo").val();

			if($dia == "")
			{
					$("div#dia"+i+" div#errorFestivo").replaceWith("<div class=\"errores\" id=\"errorFestivo\">Selecciona un día</div>");
					$("div#dia"+i+" div#errorFestivo").fadeIn("slow");
					error = true;
			}
			else
			{
				$("div#dia"+i+" div#errorFestivo").fadeOut();
				
				if(!exprFecha.test($dia))
				{
					$("div#dia"+i+" div#errorFestivo").replaceWith("<div class=\"errores\" id=\"errorFestivo\">Dia inválido</div>");
					$("div#dia"+i+" div#errorFestivo").fadeIn("slow");
					error = true;
				}
			}

			if($motivo == "")
			{
					$("div#motivo"+i+" div#errorMotivo").replaceWith("<div class=\"errores\" id=\"errorMotivo\">Escribe el motivo</div>");
					$("div#motivo"+i+" div#errorMotivo").fadeIn("slow");
					error = true;
			}
			else
			{
				$("div#motivo"+i+" div#errorMotivo").fadeOut();
			}
		}

		if(!error)
			$("#formulario").submit();
	});
});	