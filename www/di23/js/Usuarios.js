function buscarUsuarios(){
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=buscarUsuarios";
    parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioBuscar"))).toString();
    fetch("C_Ajax.php?" + parametros, opciones)
        .then(res => {
            if (res.ok) {
                console.log('Respuesta ok');
                return res.text();
            }
        })
        .then(vista => {

            document.getElementById("capaResultadosBusqueda").innerHTML = vista;
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}

function insertarUsuario(){
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=insertarUsuario";
    parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioCrear"))).toString();
    fetch("C_Ajax.php?" + parametros, opciones)
        .then(res => {
            if (res.ok) {
                console.log('Respuesta ok');
                return res.text();
            }
        })
        .then(vista => {

            document.getElementById("capaResultadosBusqueda").innerHTML = vista;
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}

function mostrarCampos() {
    var camposUsuario = document.getElementById("camposUsuario");
    if (camposUsuario.style.display === "none") {
      camposUsuario.style.display = "block";
    //   camposUsuario.style.backgroundColor = "#212529"
    } else {
      camposUsuario.style.display = "none";
    }
  }