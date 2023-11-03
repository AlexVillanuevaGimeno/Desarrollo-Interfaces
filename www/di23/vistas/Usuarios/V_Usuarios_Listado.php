<?php
    $usuarios= $datos['usuarios'];

    echo '<table id="tablaListado">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Apellido</th>';
        echo '<th>Nombre</th>';
        echo '<th>Usuario</th>';
        echo '<th>Sexo</th>';
        echo '<th>Telefono</th>';
        echo '<th>Actividad</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';


        function returnGenero($fila) {
            if ($fila['sexo'] == 'H') {
                return "Hombre" ;
                // <img src='img/IconoHombre.png' alt='IconoGeneroHombre'>";
            } elseif ($fila['sexo'] == 'M') {
                return "Mujer";
                 // <img src='img/IconoMujer.png' alt='IconoGeneroMujer'>";
            }
        }
        

        function returnActivos($fila){
            if($fila['activo'] == 'S'){
                return "Activo";
                // <img src='img/check.png' alt='Activo'>";
            }elseif($fila['activo'] == 'N'){
                return"Inactivo";
                // <img src='img/x.png' alt='Inactivo'>";
            }
        }
            
            



            // }elseif($fila['sexo'] == 'H'){
            //     return "Activo";
            // }else{
            //     return"Inactivo";
            // }
        
    

        foreach ($usuarios as $fila) {
            echo '<tr>';
            echo '<td>' . $fila['apellido_1'] . ' ' . $fila['apellido_2'] . '</td>';
            echo '<td>' . $fila['nombre'] . '</td>';
            echo '<td>' . $fila['login'] . '</td>';
            echo '<td>' . returnGenero($fila) . '</td>';
            echo '<td>' . $fila['movil'] . '</td>';
            echo '<td>' . returnActivos($fila) . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    
    // foreach($usuarios as $fila){
    //     echo $fila['apellido_1'].' '.$fila['apellido_2'].', '.$fila['nombre'].'<br>';
    //  }

?>