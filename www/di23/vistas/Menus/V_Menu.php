<?php
$menus= $datos['menus'];
    foreach ($menus as $menu) {
        if (is_null($menu['id_padre'])) {
            // si no tengo padre soy menu principal
            // crear elementos nav item dentro del nav bar
        }else{
            //submenu 
        }
    }
?>
