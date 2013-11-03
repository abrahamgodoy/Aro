var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

$(document).ready(function(){
            //función click
            $("#benviar").click(function(){
            	var correo = $("#correo").val();

            	if(correo == "" || !expr.test(correo)){
                        $("#mensaje2").fadeIn("slow");
                        return false;
                }
                
 
            });//click
        });//ready