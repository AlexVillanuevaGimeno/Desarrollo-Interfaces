<?php
require_once 'modelos/Modelo.php';
require_once 'modelos/DAO.php';
require_once 'modelos/M_Permisos.php';
class M_Menu extends Modelo{
    public $DAO;

    public function __construct()
    {
        parent::__construct(); //ejecuta constructor del padre
        $this->DAO = new DAO();
    }
  
    public function  buscarMenu(){
      $SQL="SELECT * FROM Menu WHERE 1=1 ORDER BY ID_PADRE ASC, ORDEN ASC";
      $menus = $this->DAO->consultar($SQL);
      foreach ($menus as $menu) {
        if($menu['id_padre']==0){
            $menuBueno[$menu['id_menu']] = $menu;
        
        }else{
            $menuBueno[$menu['id_padre']] ['hijos'][]=$menu;
        
        }
        }
      return $menuBueno;
    }
    // public function getMenuPorPermisos($id_usuario){
    //     $sql = "SELECT id_permiso, id_menu
    //     FROM Menu 
    //     INNER JOIN Permisos ON Menu.id_menu = Permisos.id_menu 
    //     INNER JOIN Usuario_Permiso ON Permisos.id_usuario = Usuario_Permiso.id_usuario
    //     WHERE Permisos.id_usuario = ?
    //     ORDER BY Menu.ID_PADRE ASC, Menu.ORDEN ASC";
        
    //     $menus = $this->DAO->consultar($sql, array($id_usuario));
        
    //     $menuBueno = array();
    //     foreach ($menus as $menu) {
    //       if($menu['id_padre'] == 0){
    //         $menuBueno[$menu['id_menu']] = $menu;
    //       }else{
    //         $menuBueno[$menu['id_padre']]['hijos'][] = $menu;
    //       }
    //     }
    //     return $menuBueno;
    // }


  }

?>