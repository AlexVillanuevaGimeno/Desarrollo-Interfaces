<?php
require_once 'modelos/Modelo.php';
require_once 'modelos/DAO.php';
class M_Menu extends Modelo{
    public $DAO;

    public function __construct()
    {
        parent::__construct(); //ejecuta constructor del padre
        $this->DAO = new DAO();
    }
  
    public function buscarMenu(){
      $SQL="SELECT * FROM Menu WHERE 1=1 ORDER BY ID_PADRE ASC, ORDEN ASC";
      $menus = $this->DAO->consultar($SQL);
      return $menus;
    }
}
?>