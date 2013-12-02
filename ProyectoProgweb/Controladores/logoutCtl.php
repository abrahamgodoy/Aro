<?php
require_once("Estandar.php");
class LoginCtl extends CtlEstandar{

        public function ejecutar(){
                $this -> logout();
                header('Location: index.php?ctl=login');
        }
}

?>