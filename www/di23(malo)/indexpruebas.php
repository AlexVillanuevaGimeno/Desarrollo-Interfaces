<?php session_start();
    if(isset($_SESSION['usuario']) && $_SESSION['usuario']!=''){
        //esta logeado
    }else{
        header('Location: login.php');
    }

?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        Hola <?php echo $_SESSION['usuario']; ?>.
        <?php
            echo "<br>hoy es jueves";
            $numero=5;
            $texto='<br>esto es un texto';
            echo $texto;
            $texto="<br>esto es un texto y es un $numero número";
            echo $texto;
            $matriz=array();
            $matriz=array('a','b','c',6);
            echo '<br>';
            print_r($matriz);
            for($posicion=0; $posicion < sizeof($matriz); $posicion++ ){
                echo '<br>En la posicion '.$posicion.' está el elemento: '.$matriz[$posicion];
                echo "<br>En la posicion $posicion está el elemento: $matriz[$posicion] ";
                echo "<br>En la posicion $posicion está el elemento: ".$matriz[$posicion];
            }

            foreach($matriz as $posicion => $valor){
                echo '<br>En la posicion '.$posicion.' está el elemento: '.$valor;
            }

            $edades=array('Javier'=>52, 'Ivan'=>23);
            foreach($edades as $nombre => $edad){
                echo '<br>'.$nombre.' tiene: '.$edad.' años';
            }

            echo $msj;
            define('CENTRO', 'San Valero') ;
        ?>


        <br>(c) <?php echo CENTRO; ?> 2023
        <br>(c) <?=CENTRO ?> 2023
    </body>

</html>