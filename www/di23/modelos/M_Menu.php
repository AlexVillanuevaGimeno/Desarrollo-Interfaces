<?php
require_once 'modelos/Modelo.php';
require_once 'modelos/DAO.php';

class M_Menu extends Modelo
{
  public $DAO;

  public function __construct()
  {
    parent::__construct(); //ejecuta constructor del padre
    $this->DAO = new DAO();
  }

  public function buscarMenu()
  {
    $SQL = "SELECT * FROM Menu WHERE 1=1 ORDER BY ID_PADRE ASC, ORDEN ASC";
    $menus = $this->DAO->consultar($SQL);
    foreach ($menus as $menu) {
      if ($menu['id_padre'] == 0) {
        $menuBueno[$menu['id_menu']] = $menu;

      } else {
        $menuBueno[$menu['id_padre']]['hijos'][] = $menu;

      }
    }
    return $menuBueno;
  }

  // public function buscarOrden($parameters = array()){
  //   $id_menu = "";
  //   extract($parameters);
  //   $SQL = "SELECT ORDEN FROM Menu WHERE ID_MENU = '$id_menu';";
  //   $orden = $this->DAO->consultar($SQL);
  // }


  public function insertarMenu($parameters = array())
  {
    $nombre_menu = "";
    $id_padre = "";
    $accion = "";
    $orden = "";

    extract($parameters);
    echo $nombre_menu . " - " . $id_padre . " - " . $accion . " - " . $orden;

    //condicion compruebe que no existe un menu con el mismo nombre
    $sqlVerificarMenu = "SELECT COUNT(*) AS total FROM Menu WHERE NOMBRE_MENU = '$nombre_menu';";
    $resultadoVerificarMenu = $this->DAO->consultar($sqlVerificarMenu);
    $filaNombre = $resultadoVerificarMenu[0]['total'];
    if ($filaNombre > 0) {
      echo "Error: Ya existe un menu con el mismo nombre.";
      return;

    }
    //al no ser auto increment lo hago a mano para que no de error
    $SQLid_menu = "SELECT COUNT(*) AS num_menus FROM Menu";
    $num_menus = $this->DAO->consultar($SQLid_menu);
    $id_menu = $num_menus[0]['num_menus'];
    $id_menu = $id_menu + 1;

    //GESTIONO AL PADRE
    if ($id_padre == 0) {
      $id_padre = "";
    }

    // Incrementar el orden de los menús con un orden igual o mayor al que se está insertando
    // $ordenIncrementado = $orden + 1;
    $sqlActualizarOrden = "UPDATE Menu SET ORDEN = ORDEN + 1 WHERE ORDEN >= '$orden'";
    $this->DAO->actualizar($sqlActualizarOrden);
    //comprobacion nombre
   

    if ($nombre_menu != "" && $orden != "") {
      // $nombre_menu = addslashes($nombre_menu);
      // $id_padre = addslashes($id_padre);
      // $accion = addslashes($accion);
      //  
      $SQL = "INSERT INTO Menu (id_menu, nombre_menu, id_padre, accion, orden) VALUES ('$id_menu', '$nombre_menu', '$id_padre', '$accion', '$orden');";

      echo $SQL;

      $menus = $this->DAO->insertar($SQL);
      return $menus;
    } else {
      echo "Error: LOS CAMPOS NOMBRE Y ORDEN SON OBLIGATORIOS.";
    }


  }

}
?>