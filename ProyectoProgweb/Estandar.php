<?php

	class CtlEstandar{
		private $mail;
		private $modelo;

		function isLogged(){
            if(isset($_SESSION['user']) ){
                    return true;
                }
            return false;
    	}

    	function isAdmi(){
            if(isset($_SESSION['type']) && $_SESSION['type'] == 'administrativo' )
                    return true;
            return false;
    	}

    	function isTeacher(){
            if( isset($_SESSION['type']) && $_SESSION['type'] == 'maestro' )
                    return true;
            return false;
    	}

    	function isStudent(){
            if( isset($_SESSION['type']) && $_SESSION['type'] == 'alumno' )
                    return true;
            return false;
    	}

    	function logout(){
            session_unset();
            session_destroy();                
            setcookie(session_name(), '', time()-3600);
    	}

    	function login($codigo, $contrasena){
    		require_once("Modelos/standarMdl.php");
    		$this -> modelo = new olvidasteMdl();

            //ir a la base buscarlo validarlo
            $r=$this-> modelo -> userValidator($codigo, $contrasena);
            if($r==false)
            	return false;

            $_SESSION['user'] = $codigo;
            $_SESSION['type'] = $r;

            return true;

    	}

		function generaPass(){
			$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
			$longitudCadena=strlen($cadena);
			$pass = "";
			$longitudPass=8;

			for($i=1 ; $i<=$longitudPass ; $i++){
				$pos=rand(0,$longitudCadena-1);
				$pass .= substr($cadena,$pos,1);
			}
			return $pass;
		}

        function pintar(){
            var_dump($_SESSION['user']);
            var_dump($_SESSION['type']);
        }
	}

?>