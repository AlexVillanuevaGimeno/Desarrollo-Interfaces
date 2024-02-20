<?php
require_once 'modelos/Modelo.php';
require_once 'modelos/DAO.php';
class M_Permisos extends Modelo
{
    public $DAO;
    function __construct()
    {
        parent::__construct();
        $this->DAO = new DAO();

    }
    //Devuelve todos los permisos de un usuario en particular
    function getPermisos($filtros = array()){
    extract($filtros);
    // SELECT permiso.id_menu
    // FROM usuarios
    // INNER JOIN usuario_permiso ON usuarios.id_usuario = usuario_permiso.id_usuario
    // INNER JOIN permiso ON usuario_permiso.id_permiso = permiso.id_permiso
    // INNER JOIN menu ON menu.id_menu = permiso.id_menu
    // WHERE usuarios.id_usuario = 2
    // ORDER BY permiso.id_permiso ASC
       $sql = "SELECT  permiso.id_menu
       FROM usuarios
       INNER JOIN usuario_permiso ON usuarios.id_usuario = usuario_permiso.id_usuario
       INNER JOIN 
       INNER JOIN permiso ON menu.id_permiso = permiso.id_menu
       ORDER BY rol_permiso.id_permiso ASC;";

        echo $sql;
        $resultado = $this->DAO->consultar($sql);

        foreach ($resultado as $permiso) {
            $resultadoId[$permiso['id_menu']][$permiso['id_permiso']] =true;
        }

        //  echo json_encode($resultado);
        return $resultadoId;
    }

}
?>