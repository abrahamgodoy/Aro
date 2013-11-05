<?php

class LoginCtl {
        private $modelo;

        public function ejecutar() {
                require_once( "Modelos/LoginMdl.php" );
                $this -> modelo = new LogInMdl();

                if( empty( $_POST ) ) {
                        require_once( "Vistas/index.html" );
                } 
                else {
                        $codigo = $_POST['codigo'];
                        $pass = $_POST['contra'];

                        if( $this -> modelo -> administrador( $codigo, $pass)) {
                                header( "Location: index.php?ctl=administrativo&ct=listaCiclo" );
                                if(!isset($_SESSION['codigo'])){
                                        echo "No hay sesion y voy a crearla";
                                        $_SESSION['codigo']=$codigo;
                                }
                                else
                                        echo "La sesion es de". $_SESSION['codigo'];
                        }

                        /*else if( $this -> modelo -> maestro( $codigo, $pass ) ) {
                                //header( "Location: index.php?ctl=profesor&act=cursos" );
                        } 
                        else if( $this -> modelo -> alumno( $codigo, $pass ) ) {
                                //header( "Location: index.php?ctl=alumno" ); 
                        }*/
                        
                }
        }
}

?>