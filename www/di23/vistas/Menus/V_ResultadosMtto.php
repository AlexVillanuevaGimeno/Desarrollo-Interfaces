<?php
function imprimirMenu($menu, $nivel = 0)
{
    $estilo = '';
    if ($nivel == 1) {
        $estilo = 'font-size: 2em; font-weight: bold; color: black;  text-shadow: 0 0 16px rgba(255, 247, 103, 1), 0 0 16px rgba(255, 247, 103, 1); margin-right: 10px;';
    } else {
        $estilo = 'font-size: 1.5em; font-style: italic;  color: black;  text-shadow: 0 0 16px rgba(255, 247, 103, 1), 0 0 16px rgba(255, 247, 103, 1); margin-right: 10px;';
    }

    echo '<div style="border: 1px solid black; background-color: #b88d37; border-radius: 5px; padding: 10px; margin: 10px;">';
    echo '<span id= "menus" nivel= "' . $nivel . '" style="' . $estilo . '">' . str_repeat(' ', ($nivel - 1) * 4) . $menu['nombre_menu'] . "</span>";

   
    echo '<button style="margin: 5px;" onclick=" guardarIdMenu(' . $menu['id_menu'] . '); mostrarCamposUpdateMenu();">Actualizar Menú</button>';
    echo '<button style="margin: 5px;" onclick="guardarIdMenu(' . $menu['id_menu'] . '); guardarOrden('.$menu['id_menu'].');">Eliminar Menú</button>';

    echo '<br>';
    echo '<button style="margin: 5px;" onclick="guardarIdMenuPadre(' . $menu['id_menu'] . '); guardarOrden('.$menu['id_menu'].'); mostrarCamposCreateMenu();">Crear Menú</button>';
    if (!empty($menu['hijos'])) {
        foreach ($menu['hijos'] as $hijo) {
            imprimirMenu($hijo, $nivel + 1);
        }
    }
    echo '</div>';
}


$menus = $datos['menus'];
foreach ($menus as $menu) {
    imprimirMenu($menu, 1); // Comenzar con una sangría de 1 nivel
    echo '<button class="btn btn-primary" type="button" name="btnCrearMenus" id="btnCrearMenus"
            onclick=" guardarOrden('.$menu['orden'].'); 
            mostrarCamposCreateMenu();">Nuevo Padre</button>';
}


?>