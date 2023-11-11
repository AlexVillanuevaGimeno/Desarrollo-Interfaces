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
            buscarUsuarios();
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}

function updatearUsuario(){
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=updatearUsuario";
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
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}

function mostrarCamposCreate() {
    var camposCreate = document.getElementById("camposCrear");
    var camposUpdate = document.getElementById("camposUpdatear")
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
    var camposUpdate = document.getElementById("camposUpdatear")
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

//   $(document).ready(function() {
//     $('.btnUpdatear').on('click', function() {
//       var fila = $(this).closest('tr');
//       var login = fila.data('login');
  
//       // Puedes realizar otras acciones aquí, como mostrar un formulario de actualización
//       // o enviar una solicitud Ajax al servidor para realizar la actualización
//       // Asegúrate de incluir el valor de login al llamar a la función PHP
//       miFuncionDeActualizacion(login);
//     });
//   });
  
//   function miFuncionDeActualizacion(login) {
//     // Implementa las acciones que deseas realizar con el valor de login
//     // Por ejemplo, puedes mostrar un formulario de actualización o enviar una solicitud al servidor
//     console.log('Login a actualizar:', login);
  
//     // Llama a tu función PHP aquí, pasando el valor de login como parámetro
//     // Ejemplo: $.post('tuscript.php', { login: login }, function(response) { console.log(response); });
//   }
  