$("#btnIzquierda").click(function(){
	var $Seleccionado = $("#listaDerecha option:selected");
	$("#listaIzquierda").append($Seleccionado);
});

$("#btnDerecha").click(function(){
	var $Seleccionado = $("#listaIzquierda option:selected");
	$("#listaDerecha").append($Seleccionado);
});