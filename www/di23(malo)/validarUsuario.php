<?php session_start();
    $usuario='';
    $pass='';
    $respuesta['valido']='NO';
    $respuesta['msj']='NO verificado';
    $respuesta['usuario']='';
    unset($_SESSION['usuario']);
    /*$respuesta=array('valido'=>'NO', 'msj'=>'NO verificado', 'usuario'=>'');
    $respuesta=['valido'=>'NO', 'msj'=>'NO verificado', 'usuario'=>'']; */
    if(isset($_GET)){
        extract($_GET);
        if($usuario=='' || $pass==''){
            $respuesta['msj']='Datos incorrectos. ERR-LG-01';
        }else{
            if($usuario=='javier' && $pass=='123'){
                $respuesta['valido']='SI';
                $respuesta['msj']='Usuario valido';
                $respuesta['usuario']='Javier';
                $_SESSION['usuario']='Javier';
            }else{
                $respuesta['msj']='Datos incorrectos. ERR-LG-02';
            }
        }
    }else{
        $respuesta['msj']='Datos no recibidos';
    }

    echo json_encode($respuesta);
?>