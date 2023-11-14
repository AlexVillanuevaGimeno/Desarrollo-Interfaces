<?php
echo '<div id="bloqueTxt">
        <p class="fw-bolder fst-italic fs-3" id="txtBusqueda">
        Busqueda de Usuarios
        </p>
    </div>';



?>
<!--CAMPOS FORMULARIO BUSCAR-->
<form id="formularioBuscar" name="formularioBuscar" onkeydown="return event.key != 'Enter';">
    <label for="b_texto" oninput="buscarUsuarios()">
        <input type="text" id="nombreBusqueda" name="nombreBusqueda" placeholder="Nombre">
    </label>
    <label for="c_texto">Sexo
        <select name="sexoBusqueda" oninput="buscarUsuarios()">
            <option value="T">Todos</option>
            <option value="H">Hombre</option>
            <option value="M">Mujer</option>
        </select>
    </label>
    <label for="d_texto" oninput="buscarUsuarios()">Actividad
        <input type="checkbox" id="activoBusqueda" name="activoBusqueda" value="S">
    </label>
    <button type="button" id="btnBuscar" class="btn btn-primary" onclick="buscarUsuarios()">Buscar</button>
    <button type="button" id="btnCreateUser" class="btn btn-primary" onclick="mostrarCamposCreate()">Crear nuevo usuario</button>
</form>

<!--CAMPOS FORMULARIO CREAR-->
<form id="formularioCrear" name="formularioCrear">
    <div id="camposCrear" style="display: none;">
        <p class="fw-bolder fst-italic fs-3" id="txtInsertar">Inserta un nuevo usuario</p>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre">
        <input type="text" id="apellido1" name="apellido_1" placeholder="Apellido 1">
        <input type="text" id="apellido2" name="apellido_2" placeholder="Apellido 2">
        <select name="sexo">
            <option value="H">Hombre</option>
            <option value="M">Mujer</option>
        </select>
        <input type="text" id="email" name="email" placeholder="Email">
        <input type="text" id="username" name="login" placeholder="Nombre usuario">
        <input type="text" id="password" name="password" placeholder="Contrasena">

        <label for="d_texto">Actividad
            <input type="checkbox" id="activo" name="activo" value="S">
        </label>
        <button type="button" id="btnInsertar" class="btn btn-primary" onclick="insertarUsuario()">Insertar Usuario</button>
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
        <input type="password" id="passwordUpdate" name="passwordUpdate" placeholder="Contrasena">
        <button type="button" id="btnUpdatear" class="btn btn-primary" onclick="updatearUsuario()">Actualizar</button>
    </div>
</form>

<div id="capaResultadosBusqueda">

</div>