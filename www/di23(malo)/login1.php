<?php session_start();
    $usuario='';
    $pass='';
    extract($_POST);
    //var_dump($_POST);
    if($usuario=='' || $pass==''){
        $mensa='Debe completar los campos';
    }else{
        if($usuario=='javier' && $pass=='123'){
            $_SESSION['usuario']=$usuario;
            header('Location: index.php');

        }else{
            $mensa='Datos incorrectos';
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript">
            function validar(){
                const usuario= document.getElementById("usuario");
                const pass= document.getElementById("pass");
                let mensaje='';
                if(usuario.value=='' || pass.value==''){
                    mensaje='Desbes completar los campos';
                }else{
                    //enviar formulario
                    document.getElementById("formularioLogin").submit();
                }
                document.getElementById("msj").innerHTML=mensaje;
            }
        </script>

    </head>
    <body>
    <form id="formularioLogin" name="formularioLogin" method="post" action="login.php">
        <label for="usuario">Usuario:</label><br>
            <input type="text" id="usuario" name="usuario" 
                value="<?php echo $usuario; ?>"><br>

        <label for="pass">Contraseña:</label><br>   
            <input type="password" id="pass" name="pass" 
                value="<?php echo $pass; ?>"><br>
        <span id="msj"><?php echo $mensa; ?></span>
            <button type="button" id="aceptar" onclick="validar()">Aceptar</button>
    </form>

    </body>
</html>
