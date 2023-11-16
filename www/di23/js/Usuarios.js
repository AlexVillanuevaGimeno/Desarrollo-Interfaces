
var id_UsuarioGuardada;


function buscarUsuarios(id_Usuario){
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=buscarUsuarios";
    parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioBuscar"))).toString();
    if (id_Usuario != null) {
        parametros += "&id_Usuario=" + id_Usuario;
        console.log("parametros: " + parametros)
    }

    fetch("C_Ajax.php?" + parametros, opciones)
        .then(res => {
            if (res.ok) {
                console.log('Respuesta ok');
                return res.text();
            }
        })
        .then(vista => {
            document.getElementById("capaResultadosBusqueda").innerHTML = vista;
            tablaAltura();
            // if (id_Usuario != null) {
                
            // }
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
            buscarUsuarios();
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}

 function guardarIdUsuario(id_Usuario){
    buscarUsuarios(id_Usuario);
    id_UsuarioGuardada = id_Usuario;
    console.log("Estoy guardando el id (funcion) " + id_Usuario);
}

function updatearUsuario (){
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=updatearUsuario";
    parametros += "&id_UsuarioGuardada=" + id_UsuarioGuardada;
    parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioUpdatear"))).toString();
    fetch("C_Ajax.php?" + parametros, opciones)
        .then(res => {
            if (res.ok) {
                console.log('Respuesta ok');
                return res.text();
            }
        })
        .then(vista => {
            buscarUsuarios();
            id_UsuarioGuardada = 0;
            mostrarCamposUpdate();
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}

function mostrarCamposCreate() {
    var camposCreate = document.getElementById("camposCrear");
    var camposUpdate = document.getElementById("camposUpdatear");
    if (camposCreate.style.display === "none") {
        if (camposUpdate.style.display === "block") {
            camposUpdate.style.display ="none";
            camposCreate.style.display = "block";
        }else{
            camposCreate.style.display = "block";
        }
      } else {
        camposCreate.style.display = "none";
      }
    
  }

  function mostrarCamposUpdate() {
    var camposCreate = document.getElementById("camposCrear");
    var camposUpdate = document.getElementById("camposUpdatear");
    if (camposUpdate.style.display === "none") {
        if (camposCreate.style.display === "block") {
            camposCreate.style.display ="none";
            camposUpdate.style.display = "block";
        }else{
            camposUpdate.style.display = "block";
        }
      } else {
        camposUpdate.style.display = "none";
      }
    
  }

/*
FUNCION PARA DEJAR LA TABLA ESTATICA 
AUNQUE SE AÑADAN LOS CAMPOS DE INSERTO O UPDATE
*/
  function tablaAltura() {
    var camposCreate = document.getElementById("camposCrear");
    var camposUpdate = document.getElementById("camposUpdatear");
    var resultados = document.getElementById("bloqueTabla");

    // Obtener los estilos computados
    var estilosCreate = window.getComputedStyle(camposCreate);
    var estilosUpdate = window.getComputedStyle(camposUpdate);

    // Verificar si al menos uno de los campos está visible
    if (estilosCreate.display !== "none" || estilosUpdate.display !== "none") {
        console.log("Al menos uno de los campos está visible");
        resultados.style.height = "605px";
    } else {
        console.log("Ambos campos están ocultos");
        resultados.style.height = "700px";
    }
}
//   function tablaAltura() {
//     var camposCreate = document.getElementById("camposCrear");
//     var camposUpdate = document.getElementById("camposUpdatear");
//     var resultados = document.getElementById("capaResultadosBusqueda");

//     if (camposCreate.style.display === "block" || camposUpdate.style.display === "block") {
//         console.log(camposCreate + camposUpdate + "no existen campos")
//         resultados.style.height = "625px";
//     } else {
//         console.log(camposCreate + camposUpdate + "si existen campos")
//         resultados.style.height = "600px";
//     }
// }



  

  