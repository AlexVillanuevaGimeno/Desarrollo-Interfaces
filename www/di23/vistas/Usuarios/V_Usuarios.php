<?php
echo '<div id="bloqueTxt"><a id="txtBusqueda">Busqueda de Usuarios</a></div>';

    

?>
<form id="formularioBuscar" name="formularioBuscar" onkeydown="return event.key != 'Enter';">
<label for="b_texto" oninput="buscarUsuarios()">
    <input type="text" id="b_texto" name="b_texto" placeholder="Nombre">
</label>
<label for="c_texto">Sexo
   <select name="c_texto" oninput="buscarUsuarios()">
   <option value="T">Todos</option>
    <option value="H">H</option>
    <option value="M">M</option>
   </select>
</label>
<label for="d_texto" oninput="buscarUsuarios()">Actividad
    <input type="checkbox" id="d_texto" name="d_texto" value="S" >
</label>
<button type="button" id="btnBuscar" onclick="buscarUsuarios()">Buscar</button>
</form>
<div id="capaResultadosBusqueda">
</div>