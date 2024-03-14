//funcion para printar en una vista los menus de usuario
id_menuGuardada = 0;
id_padreGuardada = 0;
orden_guardada = 0;
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

function guardarIdMenu(id_menu) {
  buscarMenus(id_menu);
  id_menuGuardada = id_menu;
  console.log("Estoy guardando el id (guardarMenuId) " + id_menu);
  // console.log("Estoy guardando el id (funcion) " + id_padre);
}
function guardarIdMenuPadre(id_padre) {
  buscarMenus(id_padre);
  id_padreGuardada = id_padre;
  console.log("Estoy guardando el id (guardarIdPadre) " + id_padreGuardada);
}
function guardarOrden(orden) {
  orden_guardada = orden;
  console.log("Estoy guardando el orden" + orden_guardada);
}

function validarMenu() {
  console.log("el idMenuGuardada es= " + id_menuGuardada);
  console.log("el idPadreGuardada es= " + id_padreGuardada);
  console.log("el orde Guardado es= " + orden_guardada);
  //ME HACES INSERT
  if (id_menuGuardada === 0) {
    if (id_padreGuardada != 0) {
      // Obtener los valores de los campos variables menus
      const IDPADRE = id_padreGuardada;
      //deshabilito el campo y asigno el valor
      document.getElementById("id_padre").disabled = true;
      document.querySelector("#id_padre").value = IDPADRE;
      const NOMBREMENU = document.querySelector("#nombre_menu").value.trim();
      const ORDEN = orden_guardada;
      //deshabilito el campo y asigno el valor
      document.getElementById("orden").disabled = true;
      document.querySelector("#orden").value = ORDEN;
      // Validación de campos
      let errores = [];

      // Validación de nombre del menú
      if (!NOMBREMENU) {
        errores.push("El campo 'Nombre del Menú' es obligatorio.");
      }
      // Mostrar mensajes de error sobre los campos
      document.getElementById("nombreMenuError").innerHTML = errores.includes(
        "El campo 'Nombre del Menú' es obligatorio."
      )
        ? "Campo obligatorio"
        : "";

      // Cambiar el color del campo de error
      document
        .getElementById("nombreMenuError")
        .classList.toggle(
          "error-field",
          errores.includes("El campo 'Nombre del Menú' es obligatorio.")
        );
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
          limpiarCamposCreateMenu();
          mostrarCamposCreateMenu();
        })
        .catch((err) => {
          console.log("Error al realizar la peticion.", err.message);
        });
    } else {
      // Obtener los valores de los campos variables menus
      const IDPADRE = id_padreGuardada;
      //desahbilito el campo y asigno el valor
      document.getElementById("id_padre").disabled = true;
      document.querySelector("#id_padre").value = 0;

      // Obtener los valores de los campos variables menus
      const NOMBREMENU = document.querySelector("#nombre_menu").value.trim();
      const ORDEN = orden_guardada;
      //deshabilito el campo y asigno el valor
      document.getElementById("orden").disabled = true;
      document.querySelector("#orden").value = ORDEN;

      // Validación de campos
      let errores = [];

      // Validación de nombre del menú
      if (!NOMBREMENU) {
        errores.push("El campo 'Nombre del Menú' es obligatorio.");
      }
      // Mostrar mensajes de error sobre los campos
      document.getElementById("nombreMenuError").innerHTML = errores.includes(
        "El campo 'Nombre del Menú' es obligatorio."
      )
        ? "Campo obligatorio"
        : "";

      // Cambiar el color del campo de error
      document
        .getElementById("nombreMenuError")
        .classList.toggle(
          "error-field",
          errores.includes("El campo 'Nombre del Menú' es obligatorio.")
        );
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
          limpiarCamposCreateMenu();
          mostrarCamposCreateMenu();
        })
        .catch((err) => {
          console.log("Error al realizar la peticion.", err.message);
        });
    }
    //ME HACES UPDATE
  } else {
  }

  // function mostrarCamposCreateMenu() {
  //     var camposCreate = document.getElementById("camposCrearMenu");
  //     var camposUpdate = document.getElementById("camposUpdatear");
  //     if (camposCreate.style.display === "none") {
  //         if (camposUpdate.style.display === "block") {
  //             camposUpdate.style.display = "none";
  //             camposCreate.style.display = "block";
  //         } else {
  //             camposCreate.style.display = "block";
  //         }
  //     } else {
  //         camposCreate.style.display = "none";
  //     }

  // }
}
function mostrarCamposCreateMenu() {
  var camposCreate = document.getElementById("camposCrearMenu");
  if (camposCreate.style.display == "none") {
    camposCreate.style.display = "block";
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
