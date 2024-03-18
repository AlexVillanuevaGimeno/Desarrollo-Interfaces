<?php
$permisos = $datos['permisos'];
if ($permisos !== null && is_array($permisos)) {
    echo '<div style="border: 1px solid black; background-color: #b88d37; border-radius: 5px; padding: 10px; margin: 10px;">';
    echo '<h3>Permisos Encontrados</h3>';
    echo '<form>'; 
    echo '<ul>';
    foreach ($permisos as $permiso) {
        echo '<li><input type="checkbox" name="permisos[]" value="' . htmlspecialchars($permiso['id_permiso']) . '"> ' . htmlspecialchars($permiso['nombre_permiso']) . '</li>';
    }
    echo '</ul>';
    echo '</form>'; 
    echo '</div>';
} else {
    echo '<p>No se encontraron permisos.</p>';
}
?>
