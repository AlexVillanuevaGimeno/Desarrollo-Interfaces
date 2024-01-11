<?php
$menuBueno = $datos['menuBueno'];
foreach($menuBueno as $padres){
    if(isset($padres['hijos'])){
        echo '<a class="nav-link dropdown-toggle" href="#" id="dropdownMenu' . $padres['id_menu'] . '" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $padres['nombre_menu'] . '</a>';
        echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenu' . $padres['id_menu'] . '">';

        // Ahora, itera para imprimir los submenús
        foreach ($padres['hijos'] as $submenu) {
            if ($submenu['id_padre'] == $padres['id_menu']) {
                echo '<li><a class="dropdown-item" onclick="'.$submenu['accion'].'">' . $submenu['nombre_menu'] . '</a></li>';
            }
        }

        echo '</ul>';
    }else{
        echo '<a class="nav-link" href="#">' . $padres['nombre_menu'] . '</a>';
        
    }
}





