<?php
function imprimirMenu($menu, $nivel = 0)
{
    $estilo = '';
    if ($nivel == 1) {
        $estilo = 'font-size: 2em; font-weight: bold; color: black;  text-shadow: 0 0 16px rgba(255, 247, 103, 1), 0 0 16px rgba(255, 247, 103, 1);';
    } else {
        $estilo = 'font-size: 1.5em; font-style: italic;  color: black;  text-shadow: 0 0 16px rgba(255, 247, 103, 1), 0 0 16px rgba(255, 247, 103, 1);';
    }

    echo '<div style="border: 1px solid black; background-color: #b88d37; border-radius: 5px; padding: 10px; margin: 10px;">';
    echo '<span style="' . $estilo . '">' . str_repeat(' ', ($nivel - 1) * 4) . $menu['nombre_menu'] . "</span><br>";
    if (!empty($menu['hijos'])) {
        foreach ($menu['hijos'] as $hijo) {
            imprimirMenu($hijo, $nivel + 1);
            echo '</div>';
        }
    }
    echo '</div>';
}

$menus = $datos['menus'];
foreach ($menus as $menu) {
    imprimirMenu($menu, 1); // Comenzar con una sangría de 1 nivel
}
?>