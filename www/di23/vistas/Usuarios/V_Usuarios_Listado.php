<?php
    $usuarios= $datos['usuarios'];
    echo '<div id="bloqueTabla" class="container-fluid table-responsive">';
    echo '<table id="tablaListado" class="table table-dark table-striped">';
        echo '<thead class="text-capitalize fs-6 fw-bolder">';
        echo '<tr>';
        // echo '<th>Id</th>';
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
                    
                    return "<img/ src='img/masc-nobg-icon.png' alt='HOMBRE' id='imgMasc'>";
                    
                } elseif ($fila['sexo'] == 'M') {
                    return "<img/ src='img/fem-nobg-icon.png' alt='MUJER' id='imgFem'>";

                     
                }
            }
            
        }
        function returnActivos($fila){
            if ($fila['activo'] =='') {
                return "No especificado";
            }else{
                if($fila['activo'] == 'S'){
                    // return '<i class="fa-regular fa-check" style="color: #00f010;"></i>';
                    return"<img src='img/Green-Check-Mark-PNG-Free-Download.png' alt='Activo'>";
                }elseif($fila['activo'] == 'N'){
                    // return '<i class="fa-regular fa-xmark" style="color: #ff0000;"></i>';
                    return "<img src='img/x.png' alt='inactivo'>";
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

            $respuesta = array(
                'tablaHTML' => $tablaHTML,
                'totalRegistros' => $usuarios, // TOTAL REGISTROS
            );
            echo json_encode($respuesta);
    

        foreach ($usuarios as $fila) {
            echo '<tr>';
            // echo '<td>' . $fila['id_Usuario'] . '</td>';
            echo '<td>' . returnNoEspecificados($fila['apellido_1']) . ' &nbsp&nbsp&nbsp&nbsp ' . returnNoEspecificados($fila['apellido_2']) . '</td>';
            echo '<td>' . returnNoEspecificados($fila['nombre']). '</td>';
            echo '<td>' . returnNoEspecificados($fila['login']) . '</td>';
            //POSIBLE IMPLEMENTACION DE CORREOS EN TABLA :D 
            echo '<td>' .  returnGenero($fila).  '</td>';
            echo '<td>' . returnNoEspecificados($fila['movil']) . '</td>';
            echo '<td>' . returnActivos($fila) . '</td>';
            echo '<td><button id="btnCamposUpdate" class="btn btn-primary" onclick="mostrarCamposUpdate(); tablaAltura(); guardarIdUsuario('.$fila['id_Usuario'].')">Actualizar</button></td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>'

        
    
    // foreach($usuarios as $fila){
    //     echo $fila['apellido_1'].' '.$fila['apellido_2'].', '.$fila['nombre'].'<br>';
    //  }

?>