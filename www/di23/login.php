<?php session_start();
$usuario = '';
$pass = '';
extract($_POST);
//var_dump($_POST);
if ($usuario == '' || $pass == '') {
    $mensa = 'Debe completar los campos';
} else {
    require_once 'controladores/C_Usuarios.php';
    $objUsuarios = new C_Usuarios();
    $datos['usuario'] = $usuario;
    $datos['pass'] = $pass;
    // $resultado=$objUsuarios->validarUsuario($datos);

    $resultado = $objUsuarios->validarUsuario(array(
        'usuario' => $usuario,
        'pass' => $pass
    ));
    if ($resultado == 'S') {
        header('Location: index.php');
    } else {
        $mensa = 'Datos incorrectos';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>LOGIN</title>
</head>

<body>
    <div id="bloqueBordeBloqueForm">
        <div id="bloqueForm">
            <h1 id="tituloLogin">LOGIN</h1>
            <form method="post" id="form">
                <label for="username" id="username">Username</label>
                <input type="text" id="usuario" name="usuario" required>
                <br>
                <label for="password" id="password">Password</label>
                <input type="password" id="pass" name="pass" required>
                <br><br>
                <button type="submit" id="botonLogin"><a id="txtLogin">Log In</a></button>
                <br>
                <a id="informe">
                    <?php echo $mensa; ?>
                </a>
                
            </form>
        </div>

    </div>
    <!-- <div class="login-container">
  <h2>Login</h2>
  <form method="post">
    <label for="username">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required>

    <label for="password">Contraseña:</label>
    <input type="password" id="pass" name="pass" required>

    <button type="submit">Iniciar sesión</button>
  </form>
  <div id="mensajeForm">
   
  </div> -->
</body>

</html>