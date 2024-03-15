// Variables globales o configuraciones
var id_UsuarioGuardada =0;
var registrosPorPagina = 10;

function cargarTabla(data) {
    // Coloca la tabla en el contenedor
    document.getElementById('tablaContainer').innerHTML = data.tablaHTML;

    // Utiliza el total de registros desde la respuesta JSON
    var totalRegistros = data.totalRegistros;

    // Actualiza la información de paginación si es necesario
    actualizarPaginacion(totalRegistros, calcularTotalPaginas(totalRegistros, registrosPorPagina));
}

// Función para calcular el total de páginas
function calcularTotalPaginas(totalRegistros, registrosPorPagina) {
    return Math.ceil(totalRegistros / registrosPorPagina);
}

// Función para cargar la página y la tabla
function cargarPagina(pagina) {
    // Hacer una petición AJAX para obtener los datos de la página deseada
    fetch('C_Ajax.php?' + pagina + '&registrosPorPagina=' + registrosPorPagina, {
        method: 'GET'
    })
    .then(response => response.json())
    .then(data => {
        // Después de obtener los datos paginados, carga la tabla y realiza cualquier otra lógica necesaria
        cargarTabla(data);
    })
    .catch(error => {
        console.error('Error al cargar la página:', error);
    });
}

// Manejar clic en los enlaces de paginación
document.addEventListener('click', function (e) {
    if (e.target && e.target.className === 'page-link') {
        e.preventDefault();

        // Obtén el número de la página desde el enlace
        var pagina = e.target.text;

        // Carga los datos de la página seleccionada
        cargarPagina(pagina);
    }
});

// // Cargar la tabla al inicio
cargarPagina(1);

function buscarUsuarios(id_usuario) {
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=buscarUsuarios";
    parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioBuscar"))).toString();
    if (id_usuario != null) {
        parametros += "&id_usuario=" + id_usuario;
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
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}



function validarUsuario() {
    console.log("el id es= " + id_UsuarioGuardada);
    if (id_UsuarioGuardada === 0) {
        // Obtener los valores de los campos
    const NOMBRE = document.querySelector('#nombre').value.trim();
    const APELLIDO1 = document.querySelector('#apellido1').value.trim();
    const APELLIDO2 = document.querySelector('#apellido2').value.trim();
    const SEXO = document.querySelector('select[name="sexo"]').value;  
    const MAIL = document.querySelector('#email').value.trim();
    const LOGIN = document.querySelector('#username').value.trim();  
    const PASS = document.querySelector('#password').value.trim();  
    const ACTIVO = document.querySelector('#activo').checked ? 'S' : 'N';  

    // Validación de campos
    let errores = [];

    // Validación de nombre
    if (!NOMBRE) {
        errores.push("El campo 'Nombre' es obligatorio.");
    }

    // Validación de apellidos
    if (!APELLIDO1 || !APELLIDO2) {
        errores.push("Los campos 'Apellido 1' y 'Apellido 2' son obligatorios.");
    }

    // Validación de sexo
    if (SEXO !== 'M' && SEXO !== 'H') {
        errores.push("El campo 'Sexo' debe ser 'M' o 'H'.");
    }

    // Validación de correo electrónico
    if (!/^\S+@\S+\.\S+$/.test(MAIL)) {
        errores.push("El campo 'Correo Electrónico' no es una dirección de correo válida.");
    }

    // Validación de nombre de usuario (login)
    if (!LOGIN) {
        errores.push("El campo 'Nombre de Usuario' es obligatorio.");
    }

    // Validación de contraseña (agrega reglas según sea necesario)
    if (!PASS) {
        errores.push("El campo 'Contraseña' es obligatorio.");
    }

    // Validación de campo activo (asumiendo que debe ser 'S' o 'N')
    if (ACTIVO !== 'S' && ACTIVO !== 'N') {
        errores.push("El campo 'Activo' debe ser 'S' o 'N'.");
    }


    // Mostrar mensajes de error sobre los campos
    document.getElementById('nombreError').innerHTML = errores.includes("El campo 'Nombre' es obligatorio.") ? "Campo obligatorio" : "";
    document.getElementById('apellido1Error').innerHTML = errores.includes("Los campos 'Apellido 1' y 'Apellido 2' son obligatorios.") ? "Ambos campos son obligatorios" : "";
    document.getElementById('apellido2Error').innerHTML = errores.includes("Los campos 'Apellido 1' y 'Apellido 2' son obligatorios.") ? "Ambos campos son obligatorios" : "";
    document.getElementById('sexoError').innerHTML = errores.includes("El campo 'Sexo' debe ser 'M' o 'H'.") ? "Seleccione M o H" : "";
    document.getElementById('emailError').innerHTML = errores.includes("El campo 'Correo Electrónico' no es una dirección de correo válida.") ? "Dirección de correo inválida" : "";
    document.getElementById('usernameError').innerHTML = errores.includes("El campo 'Nombre de Usuario' es obligatorio.") ? "Campo obligatorio" : "";
    document.getElementById('passwordError').innerHTML = errores.includes("El campo 'Contraseña' es obligatorio.") ? "Campo obligatorio" : "";
    document.getElementById('activoError').innerHTML = errores.includes("El campo 'Activo' debe ser 'S' o 'N'.") ? "Seleccione S o N" : "";

    // Cambiar el color del campo de error
    document.getElementById('nombre').classList.toggle('error-field', errores.includes("El campo 'Nombre' es obligatorio."));
    document.getElementById('apellido1').classList.toggle('error-field', errores.includes("Los campos 'Apellido 1' y 'Apellido 2' son obligatorios."));
    document.getElementById('apellido2').classList.toggle('error-field', errores.includes("Los campos 'Apellido 1' y 'Apellido 2' son obligatorios."));
    document.querySelector('select[name="sexo"]').classList.toggle('error-field', errores.includes("El campo 'Sexo' debe ser 'M' o 'H'."));
    document.getElementById('email').classList.toggle('error-field', errores.includes("El campo 'Correo Electrónico' no es una dirección de correo válida."));
    document.getElementById('username').classList.toggle('error-field', errores.includes("El campo 'Nombre de Usuario' es obligatorio."));
    document.getElementById('password').classList.toggle('error-field', errores.includes("El campo 'Contraseña' es obligatorio."));
    document.getElementById('activo').classList.toggle('error-field', errores.includes("El campo 'Activo' debe ser 'S' o 'N'."));

    // Si hay errores, no continuas 
    if (errores.length > 0) {
        return false;
    }
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
            limpiarCamposCreate();
            mostrarCamposCreate();
            
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });

    }else{
        
    const EMAIL = document.querySelector('#emailUpdate').value.trim();
    const TELEFONO = document.querySelector('#telefonoUpdate').value.trim();
    // Validación de campos
    let errores = [];
    // Validación de correo electrónico
    if (!/^\S+@\S+\.\S+$/.test(EMAIL)) {
        errores.push("El campo 'Correo Electrónico' no es una dirección de correo válida.");
    }
    // Validación de teléfono (debe tener 9 caracteres numéricos)
    if (!/^\d{9}$/.test(TELEFONO)) {
        errores.push("El campo 'Teléfono' debe contener 9 caracteres numéricos.");
    }
    document.getElementById('emailUpdateError').innerHTML = errores.includes("El campo 'Correo Electrónico' no es una dirección de correo válida.") ? "Dirección de correo inválida" : "";
    document.getElementById('telefonoUpdateError').innerHTML = errores.includes("El campo 'Teléfono' debe contener 9 caracteres numéricos.") ? "Formato inválido" : "";
    document.getElementById('emailUpdate').classList.toggle('error-field', errores.includes("El campo 'Correo Electrónico' no es una dirección de correo válida."));
    document.getElementById('telefonoUpdate').classList.toggle('error-field', errores.includes("El campo 'Teléfono' debe contener 9 caracteres numéricos."));
    // Si hay errores no continua
    if (errores.length > 0) {
        return false;
    }
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
            limpiarCamposUpdate();
            mostrarCamposUpdate();
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
    }
}

// function insertarUsuario() {
//     let opciones = { method: "GET" };
//     let parametros = "controlador=Usuarios&metodo=insertarUsuario";
//     parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioCrear"))).toString();
//     fetch("C_Ajax.php?" + parametros, opciones)
//         .then(res => {
//             if (res.ok) {
//                 console.log('Respuesta ok');
//                 return res.text();
//             }
//         })
//         .then(vista => {
//             buscarUsuarios();
//             limpiarCamposCreate();
//             mostrarCamposCreate();
            
//         })
//         .catch(err => {
//             console.log("Error al realizar la peticion.", err.message);
//         });
// }

function guardarIdUsuario(id_Usuario) {
    buscarUsuarios(id_Usuario);
    id_UsuarioGuardada = id_Usuario;
    console.log("Estoy guardando el id (funcion) " + id_Usuario);
}

// function updatearUsuario() {
//     let opciones = { method: "GET" };
//     let parametros = "controlador=Usuarios&metodo=updatearUsuario";
//     parametros += "&id_UsuarioGuardada=" + id_UsuarioGuardada;
//     parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioUpdatear"))).toString();
//     fetch("C_Ajax.php?" + parametros, opciones)
//         .then(res => {
//             if (res.ok) {
//                 console.log('Respuesta ok');
//                 return res.text();
//             }
//         })
//         .then(vista => {
//             buscarUsuarios();
//             id_UsuarioGuardada = 0;
//             limpiarCamposUpdate();
//             mostrarCamposUpdate();
//         })
//         .catch(err => {
//             console.log("Error al realizar la peticion.", err.message);
//         });
// }



function mostrarCamposCreate() {
    var camposCreate = document.getElementById("camposCrear");
    var camposUpdate = document.getElementById("camposUpdatear");
    if (camposCreate.style.display === "none") {
        if (camposUpdate.style.display === "block") {
            camposUpdate.style.display = "none";
            camposCreate.style.display = "block";
        } else {
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
            camposCreate.style.display = "none";
            camposUpdate.style.display = "block";
        } else {
            camposUpdate.style.display = "block";
        }
    } else {
        camposUpdate.style.display = "none";
    }

}

/*
FUNCION PARA DEJAR LA TABLA ESTATICA 
AUNQUE SE AÑADAN LOS CAMPOS DE INSERT O UPDATE
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


function limpiarCamposCreate() {
    // Obtiene el formulario por su ID
    var formulario = document.getElementById("formularioCrear");

    // Resetea el formulario, limpiando todos los campos
    formulario.reset();
  }

  function limpiarCamposUpdate() {
    // Obtiene el formulario por su ID
    var formulario = document.getElementById("formularioUpdatear");

    // Resetea el formulario, limpiando todos los campos
    formulario.reset();
  }

