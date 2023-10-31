<?php
    $username = '';
    $password = '';
    $respuesta['valido'] = 'NO';
    $respuesta['msj'] = 'NO verificado';
    $respuesta['username'] = '';
    unset($_SESSION['usuario']);

    // $respuesta = array('valid' => 'NO', 'msj' => 'NO verificado', 'username' => '');
    // $respuesta = ['valid' => 'NO', 'msj' => 'NO verificado', 'username' => ''];


    if ( isset($_GET) ) {
        extract($_GET);
        if ( $username == '' || $password == '' ) {
            $respuesta['msj'] = 'Datos Incorrectos. ERR-LG-01';
        }else{
            if ( $username == 'User' && $password == '1234' ) {
                $respuesta['valido'] = 'SI';
                $respuesta['msj'] = 'username valido';
                $respuesta['username'] = 'User';
            }else{
                $respuesta['msj'] = 'Datos Incorrectos. ERR-LG-01';
            }
        }
    }else {
        $respuesta['msj'] = 'Datos no recibidos';
    }
    echo json_encode($respuesta);
?>