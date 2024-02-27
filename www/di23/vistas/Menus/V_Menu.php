
<?php
$sessionPermissions = $_SESSION['permisos'];  // replace this with where you store permissions in session
$menuBueno = $datos['menuBueno'];
// echo $menuBueno;
foreach($menuBueno as $padres){
    if(isset($padres['hijos'])){
        $hasPermission = false;
        foreach ($padres['hijos'] as $submenu) {
            if (isset($_SESSION['permisos'][$submenu['id_menu']])) {
                $hasPermission = true;
                break;
            }
        }
        if ($hasPermission) {
            echo '<a class="nav-link dropdown-toggle" href="#" id="dropdownMenu' . $padres['id_menu'] . '" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $padres['nombre_menu'] . '</a>';
            echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenu' . $padres['id_menu'] . '">';

            // Ahora, itera para imprimir los submenús
            foreach ($padres['hijos'] as $submenu) {
                if (isset($_SESSION['permisos'][$submenu['id_menu']])) {
                    echo '<li><a class="dropdown-item" onclick="'.$submenu['accion'].'">' . $submenu['nombre_menu'] . '</a></li>';
                }
            }

            echo '</ul>';
            // echo "estoy en permisos";
        }
    }else{
        if (isset($_SESSION['permisos'][$padres['id_menu']])) {
            echo '<a class="nav-link" href="#">' . $padres['nombre_menu'] . '</a>';
            // echo "no hay permisos";
        }
    }
}
?>


