<?php
    require_once 'controladores/Controlador.php';
    require_once 'modelos/M_Menu.php';
    require_once 'vistas/Vista.php';

    class C_Menu extends Controlador{
        private $modelo;
        public function __construct(){
            parent::__construct();
            $this->modelo = new M_Menu();
        }
        public function getMenus($filtros=array()){
            $menus=$this->modelo->buscarMenu($filtros);
            Vista::render('vistas\Menus\V_Menu.php', array('menus'=>$menus));
        }
    
    }
?>