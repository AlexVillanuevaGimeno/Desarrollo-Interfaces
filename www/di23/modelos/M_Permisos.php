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
    function getPermisos($filtros = array())
    {
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
            $resultadoId[$permiso['id_menu']][$permiso['id_permiso']] = true;
        }

        //  echo json_encode($resultado);
        return $resultadoId;
    }

    function getListaPermisos($filtros = array()) {
        $nombreUsuarioPermiso = "";
        extract($filtros);
        $id_usuario = null;
        
        // Obtener el ID del usuario por su nombre
        if (!empty($nombreUsuarioPermiso)) {
            $sql_nombre = "SELECT id_usuario FROM usuarios WHERE nombre = '$nombreUsuarioPermiso'";
            $resultado_nombre = $this->DAO->consultar($sql_nombre);
            if (!empty($resultado_nombre)) {
                $id_usuario = $resultado_nombre[0]['id_usuario'];
            }
        }
    
        // Construir la parte de la consulta SQL para el JOIN
        $sql_join = "";
        if ($id_usuario !== null) {
            $sql_join = " INNER JOIN rol_permiso rp ON p.id_permiso = rp.id_permiso 
                         INNER JOIN rol r ON rp.id_rol = r.id_rol 
                         INNER JOIN usuario_rol ur ON r.id_rol = ur.id_rol
                         INNER JOIN usuarios u ON ur.id_usuario = u.id_usuario 
                         LEFT JOIN usuario_permiso up ON u.id_usuario = up.id_usuario
                         WHERE u.id_usuario = $id_usuario"; 
        }
    
        // Consulta SQL para obtener los permisos
        $SQL = "SELECT DISTINCT p.* FROM permiso p $sql_join ORDER BY p.id_permiso ASC";
    
        // Ejecutar la consulta
        $permisos = $this->DAO->consultar($SQL);
    
        // Devolver los permisos
        return $permisos;
    }

    function getAllPermisos(){
        $SQL = "SELECT * FROM PERMISOS WHERE 1=1";
        $resultado = $this->DAO->consultar($SQL);
        return $resultado;
    }
    

}
?>