$( document ).ready(function() {

    $("input[name=aLunes]").change(function(){
        $("input[name='lunes[]']").each( function() {            
            if($("input[name='aLunes']:checked").length == 1){
                this.checked = true;
            } else {
                this.checked = false;
            }
        });
    });

    $("input[name=aMartes]").change(function(){
        $("input[name='martes[]']").each( function() {            
            if($("input[name='aMartes']:checked").length == 1){
                this.checked = true;
            } else {
                this.checked = false;
            }
        });
    });

    $("input[name=aMiercoles]").change(function(){
        $("input[name='miercoles[]']").each( function() {            
            if($("input[name='aMiercoles']:checked").length == 1){
                this.checked = true;
            } else {
                this.checked = false;
            }
        });
    });

    $("input[name=aJueves]").change(function(){
        $("input[name='jueves[]']").each( function() {            
            if($("input[name='aJueves']:checked").length == 1){
                this.checked = true;
            } else {
                this.checked = false;
            }
        });
    });

    $("input[name=aViernes]").change(function(){
        $("input[name='viernes[]']").each( function() {            
            if($("input[name='aViernes']:checked").length == 1){
                this.checked = true;
            } else {
                this.checked = false;
            }
        });
    });

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

    	if(!$("input[type=checkbox]").is(":checked"))
    		$("#errorAsistencias").fadeIn("slow")
    	else
    		$("#errorAsistencias").fadeOut();
    });


    $( "#semana" ).datepicker({
        showWeek: true
    });

});