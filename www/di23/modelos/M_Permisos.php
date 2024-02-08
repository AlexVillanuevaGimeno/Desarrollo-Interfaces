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
    $id_usuario = '';
    extract($filtros);
       
       $sql = "SELECT usuarios.id_usuario, rol_permiso.id_permiso
       FROM usuarios
       INNER JOIN usuario_permiso ON usuarios.id_usuario = usuario_permiso.id_usuario
       INNER JOIN usuario_rol ON usuarios.id_usuario = usuario_rol.id_usuario
       INNER JOIN rol_permiso ON usuario_rol.id_rol = rol_permiso.id_rol
       ORDER BY rol_permiso.id_permiso ASC;";

        $resultado = $this->DAO->consultar($sql);
        return $resultado;
    }


}
?>