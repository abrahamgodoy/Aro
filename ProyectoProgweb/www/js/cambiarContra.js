$("#cambiar").click(function(){

	var error = false;
	var $contraA = $("#contraA").val();
	var $contraN = $("#contraN").val();

	if($contraA == ""){
		$("#errorA").fadeIn("slow");
		error = true;
	}
	else
		$("#errorA").fadeOut();

	if($contraN == ""){
		$("#errorN").fadeIn("slow");
		error = true;
	}
	else
		$("errorN").fadeOut();

	if(!error)
		$( "#formulario" ).submit();

});

function cifrar(){
    var contraA = document.getElementById("contraA");
    var contraN = document.getElementById("contraN");
    if(!contraN.value == "" && !contraA.value == ""){
        contraN.value = sha1(contraN.value);
        contraA.value = sha1(contraA.value);
    }

}