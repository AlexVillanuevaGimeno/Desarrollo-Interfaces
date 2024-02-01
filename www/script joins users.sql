
SELECT usuarios.id_usuario, usuarios.nombre, usuario_rol.id_rol, usuario_permiso.id_permiso
FROM usuarios
INNER JOIN usuario_permiso ON usuario_permiso.id_usuario = usuarios.id_usuario
INNER JOIN usuario_rol ON usuario_rol.id_usuario = usuarios.id_usuario
ORDER BY usuarios.id_usuario ASC;
