//funcion para printar en una vista los menus de usuario
function buscarMenus(){
    let opciones = { method: "GET" };
    let parametros = "controlador=Menu&metodo=busquedaMenusMtto";
    parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formBusquedaMenus"))).toString();
    fetch("C_Ajax.php?" + parametros, opciones)
        .then(res => {
            if (res.ok) {
                console.log('Respuesta ok');
                return res.text();
            }
        })
        .then(vista => {
            document.getElementById("bloqueMttoMenu").innerHTML = vista;
            console.log(vista);
            console.log("deberia ir bien")

        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}

