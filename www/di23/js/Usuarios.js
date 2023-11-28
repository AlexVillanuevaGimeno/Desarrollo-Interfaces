
var id_UsuarioGuardada;


function buscarUsuarios(id_Usuario) {
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
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}

function insertarUsuario() {
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
}
function validarUsuarioNuevo($crear) {
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

    if ($crear === "crear") {
        insertarUsuario();
    }
}





function guardarIdUsuario(id_Usuario) {
    buscarUsuarios(id_Usuario);
    id_UsuarioGuardada = id_Usuario;
    console.log("Estoy guardando el id (funcion) " + id_Usuario);
}

function updatearUsuario() {
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
function validarUsuarioUpdatear($updatear) {
    // Obtener los valores de los campos
    // const NOMBRE = document.querySelector('#nameUpdate').value.trim();
    // const APELLIDO1 = document.querySelector('#apellidoUpdate1').value.trim();
    // const APELLIDO2 = document.querySelector('#apellidoUpdate2').value.trim();
    // const SEXO = document.querySelector('select[name="sexoUpdate"]').value;  
    const EMAIL = document.querySelector('#emailUpdate').value.trim();
    // const LOGIN = document.querySelector('#loginUpdate').value.trim();  
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

    // Mostrar mensajes de error sobre los campos
    // document.getElementById('nombreUpdateError').innerHTML = errores.includes("El campo 'Nombre' es obligatorio.") ? "Campo obligatorio" : "";
    // document.getElementById('apellidoUpdate1Error').innerHTML = errores.includes("Los campos 'Apellido 1' y 'Apellido 2' son obligatorios.") ? "Ambos campos son obligatorios" : "";
    // document.getElementById('apellidoUpdate2Error').innerHTML = errores.includes("Los campos 'Apellido 1' y 'Apellido 2' son obligatorios.") ? "Ambos campos son obligatorios" : "";
    // document.getElementById('sexoUpdateError').innerHTML = errores.includes("El campo 'Sexo' debe ser 'M' o 'H'.") ? "Seleccione M o H" : "";
    document.getElementById('emailUpdateError').innerHTML = errores.includes("El campo 'Correo Electrónico' no es una dirección de correo válida.") ? "Dirección de correo inválida" : "";
    // document.getElementById('loginUpdateError').innerHTML = errores.includes("El campo 'Nombre de Usuario' es obligatorio.") ? "Campo obligatorio" : "";
    document.getElementById('telefonoUpdateError').innerHTML = errores.includes("El campo 'Teléfono' debe contener 9 caracteres numéricos.") ? "Formato inválido" : "";

    // Cambiar el color del campo de error
    // document.getElementById('nameUpdate').classList.toggle('error-field', errores.includes("El campo 'Nombre' es obligatorio."));
    // document.getElementById('apellidoUpdate1').classList.toggle('error-field', errores.includes("Los campos 'Apellido 1' y 'Apellido 2' son obligatorios."));
    // document.getElementById('apellidoUpdate2').classList.toggle('error-field', errores.includes("Los campos 'Apellido 1' y 'Apellido 2' son obligatorios."));
    // document.querySelector('select[name="sexoUpdate"]').classList.toggle('error-field', errores.includes("El campo 'Sexo' debe ser 'M' o 'H'."));
    document.getElementById('emailUpdate').classList.toggle('error-field', errores.includes("El campo 'Correo Electrónico' no es una dirección de correo válida."));
    // document.getElementById('loginUpdate').classList.toggle('error-field', errores.includes("El campo 'Nombre de Usuario' es obligatorio."));
    document.getElementById('telefonoUpdate').classList.toggle('error-field', errores.includes("El campo 'Teléfono' debe contener 9 caracteres numéricos."));

    // Si hay errores no continua
    if (errores.length > 0) {
        return false;
    }

    if ($updatear ==="updatear") {
        updatearUsuario();
    }
}


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

