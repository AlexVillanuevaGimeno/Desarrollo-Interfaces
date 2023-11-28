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
        <div id="nombreError" class="error-field"></div>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre">
        <div id="apellido1Error" class="error-field"></div>
        <input type="text" id="apellido1" name="apellido_1" placeholder="Apellido 1">
        <div id="apellido2Error" class="error-field"></div>
        <input type="text" id="apellido2" name="apellido_2" placeholder="Apellido 2">
        <div id="sexoError" class="error-field"></div>
        <select name="sexo">
            <option value="H">Hombre</option>
            <option value="M">Mujer</option>
        </select>
        <div id="emailError" class="error-field"></div>
        <input type="text" id="email" name="email" placeholder="Email">
        
        <div id="usernameError" class="error-field"></div>
        <input type="text" id="username" name="login" placeholder="Nombre usuario">
        
        <div id="passwordError" class="error-field"></div>
        <input type="text" id="password" name="password" placeholder="Contrasena">
        
        <div id="activoError" class="error-field"></div>
        <label for="d_texto">Actividad
            <input type="checkbox" id="activo" name="activo" value="S">
        </label>
        <br>
        <button type="button" id="btnInsertar" class="btn btn-primary" onclick="validarUsuarioNuevo('crear')">Insertar Usuario</button>
    </div>
</form>



<!--CAMPOS FORMULARIO UPDATEAR-->
<form id="formularioUpdatear" name="formularioUpdatear">
    <div id="camposUpdatear" style="display: none;">
        <p class="fw-bolder fst-italic fs-3" id="txtInsertar">Actualizame el usuario</p>
        <input type="text" id="nameUpdate" name="nameUpdate" placeholder="Nombre">
        <input type="text" id="apellidoUpdate1" name="apellidoUpdate1" placeholder="Apellido 1">
        <input type="text" id="apellidoUpdate2" name="apellidoUpdate2" placeholder="Apellido 2">
        <select name="sexoUpdate">
            <option value="H">Hombre</option>
            <option value="M">Mujer</option>
        </select>
        <input type="email" id="emailUpdate" name="emailUpdate" placeholder="Email">
        <input type="text" id="loginUpdate" name="loginUpdate" placeholder="Nombre usuario">
        <input type="tel" id="telefonoUpdate" name="telefonoUpdate" placeholder="Telefono">
        <button type="button" id="btnUpdatear" class="btn btn-primary" onclick="updatearUsuario()">Actualizar</button>
    </div>
</form>

<div id="capaResultadosBusqueda">

</div>