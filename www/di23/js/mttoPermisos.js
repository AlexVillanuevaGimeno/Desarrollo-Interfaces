function buscarPermisos(){
    let opciones = { method: "GET" };
    let parametros = "controlador=Permisos&metodo=getResultadoPermisos";
     parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formBusquedaPermisos"))).toString();
    fetch("C_Ajax.php?" + parametros, opciones)
        .then((res) => {
            if (res.ok) {
                console.log("Respuesta ok");
                return res.text();
            }
        })
        .then((vista) => {
            document.getElementById("bloqueMttoPermisos").innerHTML = vista;
            console.log(vista);
            console.log("deberia ir bien");
        })
        .catch((err) => {
            console.log("Error al realizar la peticion.", err.message);
        });
}