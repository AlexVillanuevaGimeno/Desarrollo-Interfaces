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

    // //GESTIONO AL PADRE
    // if ($id_padre == 0) {
    //   $id_padre = "";

    // }

    // Incrementar el orden 
    $ordenIncrementado = $orden + 1;

    //comprobacion nombre
    if ($nombre_menu != "") {
      // $nombre_menu = addslashes($nombre_menu);
      // $id_padre = addslashes($id_padre);
      // $accion = addslashes($accion);

      $SQL = "INSERT INTO Menu (id_menu, nombre_menu, id_padre, accion, orden) VALUES ('$id_menu', '$nombre_menu', '$id_padre', '$accion', '$ordenIncrementado');";
      echo $SQL;
      $menus = $this->DAO->insertar($SQL);
      $sqlActualizarOrden = "UPDATE Menu SET ORDEN = ORDEN + 1 WHERE ORDEN >= '$ordenIncrementado'";
      $this->DAO->actualizar($sqlActualizarOrden);
      return $menus;
    } else {
      echo "Error: EL CAMPO NOMBRE";
    }
  }


  public function updatearMenu($parameters = array())
  {
    $id_menu = "";
    $nombre_menu_updatear = "";
    $id_padre_updatear = "";
    $accion_updatear = "";
    $orden_updatear = "";
    extract($parameters);
    echo $nombre_menu_updatear . " - " . $id_padre_updatear . " - " . $accion_updatear . " - " . $orden_updatear;

    //comprobamos que el nombre de menu no se repita
    if ($nombre_menu_updatear != "") {
      $sqlVerificar = "SELECT COUNT(*) AS total FROM Menu WHERE nombre_menu = '$nombre_menu_updatear'";
      $resultadoVerificar = $this->DAO->consultar($sqlVerificar);
      $filaNombre = $resultadoVerificar[0]['total'];

      if ($filaNombre > 0) {
        // Ya existe un menu con el mismo nombre
        echo '<script>alert("Error: Ya existe un menu con el mismo nombre.");</script>';
        return;
      }
    }

    $SQL2 = "";
    //sentencia para actualizar
    $SQL = "UPDATE Menu SET ";
    //si hay nombre
    if ($nombre_menu_updatear != "") {
      $SQL2 .= "nombre_menu = '$nombre_menu_updatear' ,";
    }
    //si hay id_padre
    if ($id_padre_updatear != "") {
      $SQL2 .= "id_padre = '$id_padre_updatear' ,";
    }
    //si hay accion
    if ($accion_updatear != "") {
      $SQL2 .= "accion = '$accion_updatear' ,";
    }
    //si hay orden
    if ($orden_updatear != "") {
      $SQL2 .= "orden = '$orden_updatear' ,";
      // Incrementar el orden 
    $ordenIncrementado = $orden_updatear + 1;
    $sqlActualizarOrden = "UPDATE Menu SET ORDEN = '$ordenIncrementado' WHERE ORDEN >= '$orden_updatear'";
    echo $sqlActualizarOrden;
    $this->DAO->actualizar($sqlActualizarOrden);
    }
    $SQLCamposSinComa = substr($SQL2, 0, -2);
    $SQL .= $SQLCamposSinComa;
    $SQL .= " WHERE id_menu = $id_menu";
    echo "SQL EN EL UPDATE= " . $SQL;

    // Ejecutar la actualización
    $result = $this->DAO->actualizar($SQL);

    if ($result === false) {
      // Manejar el error
      echo '<script>alert("Error en la actualización del menu.");</script>';
    } else {
      // Todo salió bien
      echo '<script>alert("Menu actualizado correctamente.");</script>';
    }
  }

  public function deleteMenu($parameters = array()){
    $id_menu = "";
    extract($parameters);
    $SQL = "DELETE FROM Menu WHERE ID_MENU = '$id_menu';";
    $menus = $this->DAO->borrar($SQL);
    return $menus;
  }




}
