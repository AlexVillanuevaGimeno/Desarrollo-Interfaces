<?php
echo '<div id="bloqueTxt">
        <p class="fw-bolder fst-italic fs-3" id="txtBusqueda">
        Busqueda de Usuarios
        </p>
    </div>';



?>
<!--CAMPOS FORMULARIO BUSCAR-->
<form id="formularioBuscar" name="formularioBuscar" onkeydown="return event.key != 'Enter';">
    <label for="nombreBusqueda" oninput="buscarUsuarios()">
        <input type="text" id="nombreBusqueda" name="nombreBusqueda" placeholder="Nombre">
    </label>
    <label for="sexoBusqueda">Sexo
        <select name="sexoBusqueda" oninput="buscarUsuarios()">
            <option value="T">Todos</option>
            <option value="H">Hombre</option>
            <option value="M">Mujer</option>
        </select>
    </label>
    <label for="activoBusqueda" oninput="buscarUsuarios()">Actividad
        <input type="checkbox" id="activoBusqueda" name="activoBusqueda" value="S">
    </label>
    <button type="button" id="btnBuscar" class="btn btn-primary" onclick="buscarUsuarios()">Buscar</button>
    <button type="button" id="btnCreateUser" class="btn btn-primary" onclick="mostrarCamposCreate()">Crear nuevo usuario</button>
</form>

<!--CAMPOS FORMULARIO CREAR-->
<form id="formularioCrear" name="formularioCrear">
    <div id="camposCrear" style="display: none;">
        <p class="fw-bolder fst-italic fs-3" id="txtInsertar">Inserta un nuevo usuario</p>
        <!-- Contenedor para mensajes de error sobre los campos -->
        <div id="errores" class="error-container">
            <div id="errorNombre" class="error"></div>
            <div id="errorApellido" class="error"></div>
            <div id="errorSexo" class="error"></div>
            <div id="errorMail" class="error"></div>
            <div id="errorUsername" class="error"></div>
            <div id="errorPassword" class="error"></div>
            <div id="errorActivo" class="error"></div>
        </div>

        <!-- Campos del formulario -->
         
        <!-- Campo Nombre -->
         <label for="nombre">Nombre:</label>
        <div id="nombreError" class="error-field"></div>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre"><br>

        <!-- Campo Apellido 1 -->
        <label for="apellido1">Apellido 1:</label>
        <div id="apellido1Error" class="error-field"></div>
        <input type="text" id="apellido1" name="apellido_1" placeholder="Apellido 1"><br>

        <!-- Campo Apellido 2 -->
        <label for="apellido2">Apellido 2:</label>
        <div id="apellido2Error" class="error-field"></div>
        <input type="text" id="apellido2" name="apellido_2" placeholder="Apellido 2"><br>

        <!-- Campo Sexo -->
        <label for="sexo">Sexo:</label>
        <div id="sexoError" class="error-field"></div>
        <select name="sexo" id="sexo">
            <option value="H">Hombre</option>
            <option value="M">Mujer</option>
        </select><br>

        <!-- Campo Email -->
        <label for="email">Email:</label>
        <div id="emailError" class="error-field"></div>
        <input type="text" id="email" name="email" placeholder="Email"><br>

        <!-- Campo Username -->
        <label for="username">Nombre de usuario:</label>
        <div id="usernameError" class="error-field"></div>
        <input type="text" id="username" name="login" placeholder="Nombre usuario"><br>

        <!-- Campo Password -->
        <label for="password">Contraseña:</label>
        <div id="passwordError" class="error-field"></div>
        <input type="text" id="password" name="password" placeholder="Contraseña"><br>

        <!-- Campo Activo -->
        <label for="activo">Actividad:</label>
        <div id="activoError" class="error-field"></div>
        <label for="d_texto">
            <input type="checkbox" id="activo" name="activo" value="S"> Activo
        </label>
        <br>
        <button type="button" id="btnInsertar" class="btn btn-primary" onclick="validarUsuario('crear')">Insertar Usuario</button>
    </div>
</form>



<!--CAMPOS FORMULARIO UPDATEAR-->
<form id="formularioUpdatear" name="formularioUpdatear">
    <div id="camposUpdatear" style="display: none;">
        <p class="fw-bolder fst-italic fs-3" id="txtUpdatear">Actualizame el usuario</p>
        
        <!-- Contenedor para mensajes de error sobre los campos -->
        <div id="erroresUpdatear" class="error-container">
            <div id="errorNameUpdate" class="error-field"></div>
            <div id="errorApellidoUpdate1" class="error-field"></div>
            <div id="errorApellidoUpdate2" class="error-field"></div>
            <div id="errorSexoUpdate" class="error-field"></div>
            <div id="errorEmailUpdate" class="error-field"></div>
            <div id="errorLoginUpdate" class="error-field"></div>
            <div id="errorTelefonoUpdate" class="error-field"></div>
        </div>

        <!-- Campos del formulario -->

        <!-- Campo Nombre -->
        <label for="nameUpdate">Nombre:</label>
        <div id="nombreUpdateError" class="error-field"></div>
        <input type="text" id="nameUpdate" name="nameUpdate" placeholder="Nombre"><br>

        <!-- Campo Apellido 1 -->
        <label for="apellidoUpdate1">Apellido 1:</label>
        <div id="apellidoUpdate1Error" class="error-field"></div>
        <input type="text" id="apellidoUpdate1" name="apellidoUpdate1" placeholder="Apellido 1"><br>

        <!-- Campo Apellido 2 -->
        <label for="apellidoUpdate2">Apellido 2:</label>
        <div id="apellidoUpdate2Error" class="error-field"></div>
        <input type="text" id="apellidoUpdate2" name="apellidoUpdate2" placeholder="Apellido 2"><br>

        <!-- Campo Sexo -->
        <label for="sexoUpdate">Sexo:</label>
        <div id="sexoUpdateError" class="error-field"></div>
        <select name="sexoUpdate" id="sexoUpdate">
            <option value="H">Hombre</option>
            <option value="M">Mujer</option>
        </select><br>

        <!-- Campo Email -->
        <label for="emailUpdate">Email:</label>
        <div id="emailUpdateError" class="error-field"></div>
        <input type="email" id="emailUpdate" name="emailUpdate" placeholder="Email"><br>

        <!-- Campo Username -->
        <label for="loginUpdate">Nombre de usuario:</label>
        <div id="loginUpdateError" class="error-field"></div>
        <input type="text" id="loginUpdate" name="loginUpdate" placeholder="Nombre usuario"><br>

        <!-- Campo Telefono -->
        <label for="telefonoUpdate">Telefono:</label>
        <div id="telefonoUpdateError" class="error-field"></div>
        <input type="tel" id="telefonoUpdate" name="telefonoUpdate" placeholder="Telefono"><br>

        <button type="button" id="btnUpdatear" class="btn btn-primary" onclick="validarUsuario('updatear')">Actualizar</button>
    </div>
</form>


<div id="capaResultadosBusqueda">

</div>