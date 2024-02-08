-- CONSULTA PARA SABER PERMISOS ESPECIFICOS DE USUARIOS
SELECT
    usuarios.id_usuario,
    usuarios.nombre,
    usuario_rol.id_rol,
    usuario_permiso.id_permiso
FROM
    usuarios
    INNER JOIN usuario_permiso ON usuario_permiso.id_usuario = usuarios.id_usuario
    INNER JOIN usuario_rol ON usuario_rol.id_usuario = usuarios.id_usuario
ORDER BY
    usuarios.id_usuario ASC;


-- CONSULTA PARA SABER PERMISOS DE USUARIOS permisos concatenados
SELECT
    usuarios.id_usuario,
    usuarios.nombre,
    usuario_rol.id_rol,
    GROUP_CONCAT(
        rol_permiso.id_permiso
        ORDER BY
            rol_permiso.id_permiso ASC
    ) AS permisos
FROM
    usuarios
    INNER JOIN usuario_permiso ON usuarios.id_usuario = usuario_permiso.id_usuario
    INNER JOIN usuario_rol ON usuarios.id_usuario = usuario_rol.id_usuario
    INNER JOIN rol_permiso ON usuario_rol.id_rol = rol_permiso.id_rol
GROUP BY
    usuarios.id_usuario,
    usuarios.nombre,
    usuario_rol.id_rol;



-- Permisos sin concatenar
SELECT usuarios.id_usuario, rol_permiso.id_permiso
FROM usuarios
INNER JOIN usuario_permiso ON usuarios.id_usuario = usuario_permiso.id_usuario
INNER JOIN usuario_rol ON usuarios.id_usuario = usuario_rol.id_usuario
INNER JOIN rol_permiso ON usuario_rol.id_rol = rol_permiso.id_rol
ORDER BY rol_permiso.id_permiso ASC;

