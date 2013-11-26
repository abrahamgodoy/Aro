<?php
require_once("Estandar.php");
class LoginCtl extends CtlEstandar{
        private $modelo;

        public function ejecutar() {

                if( empty( $_POST ) ) {
                        require_once( "Vistas/index.html" );
                } 
                else {
                        $codigo = $_POST['codigo'];
                        $contrasena = $_POST['contra'];

                        $login=$this->login($codigo, $contrasena);

                        if($login==false)
                                require_once("Vistas/Error.html");

                        if($this->isAdmi())
                                header("Location:index.php?ctl=administrativo&act=listaCiclo");

                        if($this->isTeacher())
                                header("Location:index.php?ctl=maestro&act=listaAlumno");

                        if($this->isStudent())
                                header("Location:index.php");
                        
                }
        }
}

?>