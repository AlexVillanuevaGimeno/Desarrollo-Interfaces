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
    $id_usuario = "";
    extract($filtros);
    echo $id_usuario;
    
    $sql = "SELECT DISTINCT permiso.id_menu , permiso.id_permiso
    FROM usuarios
    INNER JOIN usuario_rol ON usuarios.id_usuario = usuario_rol.id_usuario
    INNER JOIN rol ON usuario_rol.id_rol = rol.id_rol
    INNER JOIN rol_permiso ON rol.id_rol = rol_permiso.id_rol
    INNER JOIN permiso ON rol_permiso.id_permiso = permiso.id_permiso
    WHERE usuarios.id_usuario = ' $id_usuario '
    UNION
    SELECT DISTINCT permiso.id_menu ,permiso.id_permiso
    FROM usuarios
    INNER JOIN usuario_permiso ON usuarios.id_usuario = usuario_permiso.id_usuario
    INNER JOIN permiso ON usuario_permiso.id_permiso = permiso.id_permiso
    WHERE usuarios.id_usuario = ' $id_usuario '
    ORDER BY id_menu;";


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