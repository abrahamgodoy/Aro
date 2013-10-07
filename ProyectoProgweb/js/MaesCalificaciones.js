$("#btnRegistrar").click(function (){

	var $curso = $("#curso").val();

	if($curso == 0)
		$("#errorCurso").fadeIn("slow");
	else
		$("#errorCurso").fadeOut();
});