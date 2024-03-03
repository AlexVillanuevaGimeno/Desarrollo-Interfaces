//funcion para printar en una vista los menus de usuario
id_menuGuardada = 0;
id_padreGuardada = 0;
function buscarMenus(
  id_menu
  // id_padre
) {
  let opciones = { method: "GET" };
  let parametros = "controlador=Menu&metodo=busquedaMenusMtto";
  parametros +=
    "&" +
    new URLSearchParams(
      new FormData(document.getElementById("formBusquedaMenus"))
    ).toString();
  if (id_menu != null) {
    parametros += "&id_menu=" + id_menu;
    console.log("parametros: " + parametros);
  }
  // if (id_padre != null) {
  //     metodos += "&id_padre=" + id_padre;
  //     console.log("parametros: " + metodos)
  // }
  fetch("C_Ajax.php?" + parametros, opciones)
    .then((res) => {
      if (res.ok) {
        console.log("Respuesta ok");
        return res.text();
      }
    })
    .then((vista) => {
      document.getElementById("bloqueMttoMenu").innerHTML = vista;
      console.log(vista);
      console.log("deberia ir bien");
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
    });
}

function guardarIdMenu(
  id_menu
  //  id_padre
) {
  buscarMenus(id_menu);
  id_UsuarioGuardada = id_menu;
  // id_padreGuardada = id_padre;
  console.log("Estoy guardando el id (funcion) " + id_menu);
  // console.log("Estoy guardando el id (funcion) " + id_padre);
}

function validarMenu() {
  console.log("el id es= " + id_menuGuardada);
  if (id_menuGuardada === 0) {
    // Obtener los valores de los campos variables menus
    const NOMBREMENU = document.querySelector("#nombreMenu").value.trim();
    const IDPADRE = document.querySelector("#idPadre").value.trim();
    const ACCION = document.querySelector("#accion").value.trim();
    const ORDEN = document.querySelector("#orden").value.trim();

    // Validación de campos
    let errores = [];

    // Validación de nombre del menú
    if (!NOMBREMENU) {
      errores.push("El campo 'Nombre del Menú' es obligatorio.");
    }

    // Validación de ID del padre
    if (!IDPADRE) {
      errores.push("El campo 'ID del Padre' es obligatorio.");
    }

    // Validación de acción
    if (!ACCION) {
      errores.push("El campo 'Acción' es obligatorio.");
    }

    // Validación de orden
    if (!ORDEN) {
      errores.push("El campo 'Orden' es obligatorio.");
    }

    // Mostrar mensajes de error sobre los campos
    document.getElementById("nombreMenuError").innerHTML = errores.includes(
      "El campo 'Nombre del Menú' es obligatorio."
    )
      ? "Campo obligatorio"
      : "";
    document.getElementById("idPadreError").innerHTML = errores.includes(
      "El campo 'ID del Padre' es obligatorio."
    )
      ? "Campo obligatorio"
      : "";
    document.getElementById("accionError").innerHTML = errores.includes(
      "El campo 'Acción' es obligatorio."
    )
      ? "Campo obligatorio"
      : "";
    document.getElementById("ordenError").innerHTML = errores.includes(
      "El campo 'Orden' es obligatorio."
    )
      ? "Campo obligatorio"
      : "";

    // Cambiar el color del campo de error
    document.getElementById("nombreMenu").classList.toggle("error-field",errores.includes("El campo 'Nombre del Menú' es obligatorio."));
    document.getElementById("idPadre").classList.toggle("error-field",errores.includes("El campo 'ID del Padre' es obligatorio."));
    document.getElementById("accion").classList.toggle("error-field",errores.includes("El campo 'Acción' es obligatorio."));
    document.getElementById("orden").classList.toggle("error-field",errores.includes("El campo 'Orden' es obligatorio."));
    // Si hay errores, no continuas
    if (errores.length > 0) {
      return false;
    }
    let opciones = { method: "GET" };
    let parametros = "controlador=Menu&metodo=insertarMenu";
    parametros +=
      "&" +
      new URLSearchParams(
        new FormData(document.getElementById("formularioCrearMenu"))
      ).toString();
    fetch("C_Ajax.php?" + parametros, opciones)
      .then((res) => {
        if (res.ok) {
          console.log("Respuesta ok");
          return res.text();
        }
      })
      .then((vista) => {
        buscarMenus();
        limpiarCamposCreate();
        mostrarCamposCreate();
      })
      .catch((err) => {
        console.log("Error al realizar la peticion.", err.message);
      });
  } else {
    const EMAIL = document.querySelector("#emailUpdate").value.trim();
    const TELEFONO = document.querySelector("#telefonoUpdate").value.trim();
    // Validación de campos
    let errores = [];
    // Validación de correo electrónico
    if (!/^\S+@\S+\.\S+$/.test(EMAIL)) {
      errores.push(
        "El campo 'Correo Electrónico' no es una dirección de correo válida."
      );
    }
    // Validación de teléfono (debe tener 9 caracteres numéricos)
    if (!/^\d{9}$/.test(TELEFONO)) {
      errores.push("El campo 'Teléfono' debe contener 9 caracteres numéricos.");
    }
    document.getElementById("emailUpdateError").innerHTML = errores.includes(
      "El campo 'Correo Electrónico' no es una dirección de correo válida."
    )
      ? "Dirección de correo inválida"
      : "";
    document.getElementById("telefonoUpdateError").innerHTML = errores.includes(
      "El campo 'Teléfono' debe contener 9 caracteres numéricos."
    )
      ? "Formato inválido"
      : "";
    document
      .getElementById("emailUpdate")
      .classList.toggle(
        "error-field",
        errores.includes(
          "El campo 'Correo Electrónico' no es una dirección de correo válida."
        )
      );
    document
      .getElementById("telefonoUpdate")
      .classList.toggle(
        "error-field",
        errores.includes(
          "El campo 'Teléfono' debe contener 9 caracteres numéricos."
        )
      );
    // Si hay errores no continua
    if (errores.length > 0) {
      return false;
    }
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=updatearUsuario";
    parametros += "&id_UsuarioGuardada=" + id_UsuarioGuardada;
    parametros +=
      "&" +
      new URLSearchParams(
        new FormData(document.getElementById("formularioUpdatear"))
      ).toString();
    fetch("C_Ajax.php?" + parametros, opciones)
      .then((res) => {
        if (res.ok) {
          console.log("Respuesta ok");
          return res.text();
        }
      })
      .then((vista) => {
        buscarUsuarios();
        id_UsuarioGuardada = 0;
        limpiarCamposUpdate();
        mostrarCamposUpdate();
      })
      .catch((err) => {
        console.log("Error al realizar la peticion.", err.message);
      });
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
function limpiarCamposCreateMenu() {
    // Obtiene el formulario por su ID
    var formulario = document.getElementById("formularioCrearMenu");

    // Resetea el formulario, limpiando todos los campos
    formulario.reset();
  }