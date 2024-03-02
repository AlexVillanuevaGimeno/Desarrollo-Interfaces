<?php
require_once 'controladores/Controlador.php';
require_once 'modelos/M_Menu.php';
require_once 'vistas/Vista.php';


class C_Menu extends Controlador
{
    private $modelo;
    public function __construct()
    {
        parent::__construct();
        $this->modelo = new M_Menu();
    }

    public function getMenus($filtros = array())
    {
        $menus = $this->modelo->buscarMenu($filtros);
        Vista::render('vistas\Menus\V_Menu.php', array('menuBueno' => $menus));
    }
    public function getVistaMttoMenus($parameters = array())
    {
        $menus = $this->modelo->buscarMenu($parameters);
        // Vista::render('vistas\Menus\V_Menu.php', array('menuBueno'=>$menus));
        Vista::render('vistas\Menus\V_MttoMenu.php');
        // Vista::render('vistas\Menus\V_ResultadosMtto.php');
    }
    public function busquedaMenusMtto($parameters = array())
    {
        $menus = $this->modelo->buscarMenu($parameters);
        // Vista::render('vistas\Menus\V_Menu.php', array('menuBueno'=>$menus));
        // Vista::render('vistas\Menus\V_MttoMenu.php');
        Vista::render(
            'vistas\Menus\V_ResultadosMtto.php',
            array('menus' => $menus)
        );
    }
}
?>