$("#btnRegistrar").click(function (){

	var $curso = $("#curso").val();
	var $semana = $("#semana").val();

	if($curso == 0)
		$("#errorCurso").fadeIn("slow");
	else
		$("#errorCurso").fadeOut();

	if($semana == 0)
		$("#errorSemana").fadeIn("slow");
	else
		$("#errorSemana").fadeOut();

});