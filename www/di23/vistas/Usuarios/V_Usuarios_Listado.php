<?php
    $usuarios= $datos['usuarios'];

    echo '<table id="tablaListado" class="table table-dark table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Apellido</th>';
        echo '<th>Nombre</th>';
        echo '<th>Usuario</th>';
        echo '<th>Sexo</th>';
        echo '<th>Telefono</th>';
        echo '<th>Actividad</th>';
        echo '<th>Actualizar user</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';


        function returnGenero($fila) {
            if($fila['sexo'] == ''){
                return "No especificado";
              
            }else{ 
                if ($fila['sexo'] == 'H') {
                    return "Hombre" ;
                    
                } elseif ($fila['sexo'] == 'M') {
                    return "Mujer";
                     
                }
            }
            
        }
        

        function returnActivos($fila){
            if ($fila['activo'] =='') {
                return "No especificado";
            }else{
                if($fila['activo'] == 'S'){
                    return "Activo";
                    // <img src='img/check.png' alt='Activo'>";
                }elseif($fila['activo'] == 'N'){
                    return"Inactivo";
                    // <img src='img/x.png' alt='Inactivo'>";
                }
            }
        }
            
        function returnNoEspecificados($fila){
            if($fila == ''){
                return "No especificado";
                // <img src='img/check.png' alt='Activo'>";
            }else{ 
                return $fila;
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
            echo '<td>' . returnNoEspecificados($fila['apellido_1']) . ' &nbsp&nbsp&nbsp&nbsp ' . returnNoEspecificados($fila['apellido_2']) . '</td>';
            echo '<td>' . returnNoEspecificados($fila['nombre']). '</td>';
            echo '<td>' . returnNoEspecificados($fila['login']) . '</td>';
            //POSIBLE IMPLEMENTACION DE CORREOS EN TABLA :D 
            echo '<td>' . returnGenero($fila). '</td>';
            echo '<td>' . returnNoEspecificados($fila['movil']) . '</td>';
            echo '<td>' . returnActivos($fila) . '</td>';
            echo '<td><button type="button">Actualizar</button></td>';
            // onclick="actualizarMovil()
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    
    // foreach($usuarios as $fila){
    //     echo $fila['apellido_1'].' '.$fila['apellido_2'].', '.$fila['nombre'].'<br>';
    //  }

?>