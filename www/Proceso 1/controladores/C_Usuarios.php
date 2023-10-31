<?php
require_once 'controladores/Controlador.php';
    class C_Usuarios extends Controlador{
        function __construct(){
            parent::__construct();
        }

        public function validarUsuario($datos){
            $usuario='';
            $pass='srfdvsvwrt';
            extract($datos);
            $valido='N';
            if ($usuario=='javier' && $pass=='1234') {
                $_SESSION['usuario'] = $usuario;
                $valido='S';
            }
            echo $valido;

        }


    }
?>