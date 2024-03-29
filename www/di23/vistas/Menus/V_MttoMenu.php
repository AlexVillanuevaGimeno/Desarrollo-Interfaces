<div id="bloqueTxtMttoMenu">
    <p class="fw-bolder fst-italic fs-3" id="txtBusqueda">
        Mtto.Menús
    </p>
</div>
<div id="bloqueFormMttoMenu">
    <form id="formBusquedaMenus" name="formBusquedaMenus">
        <button class="btn btn-primary" type="button" name="btnBuscarMenus" id="btnBuscarMenus"
            onclick="buscarMenus()">Buscar</button>
        <!-- <button class="btn btn-primary" type="button" name="btnCrearMenus" id="btnCrearMenus"
            onclick="mostrarCamposCreateMenu()">Nuevo Menú</button> -->
    </form>

    <form id="formularioCrearMenu" name="formularioCrearMenu">
        <div id="camposCrearMenu" style="display: none;">
            <p class="fw-bolder fst-italic fs-3" id="txtInsertar">Inserta un nuevo menú</p>
            <!-- Contenedor para mensajes de error sobre los campos -->
            <div id="errores" class="error-container">
                <div id="errorNombreMenu" class="error"></div>
                <div id="errorIdPadre" class="error"></div>
                <div id="errorAccion" class="error"></div>
                <div id="errorOrden" class="error"></div>
            </div>

            <!-- Campos del formulario -->

            <!-- Campo Nombre del Menú -->
            <label for="nombre_menu">Nombre del Menú:</label>
            <div id="nombreMenuError" class="error-field"></div>
            <input type="text" id="nombre_menu" name="nombre_menu" placeholder="Nombre del Menú"><br>

            <!-- Campo ID del Padre -->
            <label for="id_padre">ID del Padre:</label>
            <div id="idPadreError" class="error-field"></div>
            <input type="text" id="id_padre" name="id_padre" placeholder="ID del Padre"><br>

            <!-- Campo Acción -->
            <label for="accion">Acción:</label>
            <div id="accionError" class="error-field"></div>
            <input type="text" id="accion" name="accion" placeholder="Acción"><br>

            <!-- Campo Orden -->
            <label for="orden">Orden:</label>
            <div id="ordenError" class="error-field"></div>
            <input type="text" id="orden" name="orden" placeholder="Orden"><br>

            <button type="button" id="btnInsertar" class="btn btn-primary" onclick="validarMenu();">Insertar
                Menú</button>
        </div>
    </form>

    <form id="formularioUpdatearMenu" name="formularioUpdatearMenu">
    <div id="camposUpdatearMenu" style="display: none;">
        <p class="fw-bolder fst-italic fs-3" id="txtUpdatear">Updatear menú</p>
        <!-- Contenedor para mensajes de error sobre los campos -->
        <div id="erroresUpdatear" class="error-container">
            <div id="errorNombreMenuUpdatear" class="error"></div>
            <div id="errorIdPadreUpdatear" class="error"></div>
            <div id="errorAccionUpdatear" class="error"></div>
            <div id="errorOrdenUpdatear" class="error"></div>
        </div>

        <!-- Campos del formulario -->

        <!-- Campo Nombre del Menú -->
        <label for="nombre_menu_updatear">Nombre del Menú:</label>
        <div id="nombreMenuErrorUpdatear" class="error-field"></div>
        <input type="text" id="nombre_menu_updatear" name="nombre_menu_updatear" placeholder="Nombre del Menú"><br>

        <!-- Campo ID del Padre -->
        <label for="id_padre_updatear">ID del Padre:</label>
        <div id="idPadreErrorUpdatear" class="error-field"></div>
        <input type="text" id="id_padre_updatear" name="id_padre_updatear" placeholder="ID del Padre"><br>

        <!-- Campo Acción -->
        <label for="accion_updatear">Acción:</label>
        <div id="accionErrorUpdatear" class="error-field"></div>
        <input type="text" id="accion_updatear" name="accion_updatear" placeholder="Acción"><br>

        <!-- Campo Orden -->
        <label for="orden_updatear">Orden:</label>
        <div id="ordenErrorUpdatear" class="error-field"></div>
        <input type="text" id="orden_updatear" name="orden_updatear" placeholder="Orden"><br>

        <button type="button" id="btnUpdatear" class="btn btn-primary" onclick="validarMenu();">Updatear
            Menú</button>
    </div>
</form>

</div>
<div id="bloqueMttoMenu">

</div>