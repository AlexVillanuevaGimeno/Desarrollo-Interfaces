<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript">
        function checkLogin() {
            const username = document.querySelector('#username');
            const password = document.querySelector('#password');
            let errorMessage = '';

            if (username.value == '' || password.value == '') {
                errorMessage = 'Rellena los parametros requeridos';
            } else {
                let opciones ={method: "GET"};
                let parametros = "username="+username.value+"&password="+password.value;
                fetch("validarUsuario.php?"+parametros, opciones)
                .then(res =>{
                    console.log(res);
                    if (res.ok) {
                        console.log("respuesta ok");
                        return res.json();
                    }
                }).then(res =>{
                    console.log(res)
                    if ( res.valido == "SI" ) {
                        location.href = "index.php";
                    }else
                        document.querySelector("#errormsg").innerHTML = res.msj;
                }).catch(err=>{
                    console.log("Error al realizar la petición:", err.message);
                });
            }
            document.querySelector('#errormsg').innerHTML = errorMessage;
        }
    </script>
</head>

<body>
    <form action="./login.php" method="GET">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="">
        <br>
        <span id="errormsg"></span>
        <button type="button" id="enviar" onclick="checkLogin()">enviar</button>
    </form>
</body>

</html>
