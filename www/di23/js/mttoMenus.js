//funcion para printar en una vista los menus de usuario
id_menuGuardada = 0;
id_padreGuardada = 0;
function buscarMenus(
  id_menu,
  id_padre
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
  if (id_padre != null) {
      metodos += "&id_padre=" + id_padre;
      console.log("parametros: " + metodos)
  }
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

function guardarIdMenu( id_menu ) {
  buscarMenus(id_menu);
  id_menuGuardada = id_menu;
  console.log("Estoy guardando el id (funcion) " + id_menu);
  // console.log("Estoy guardando el id (funcion) " + id_padre);
}
function guardarIdMenuPadre(id_padre){
  buscarMenus(null,id_padre);
  id_padreGuardada = id_padre;
  console.log("Estoy guardando el id (funcion) " + id_padre);

}

function validarMenu() {
  console.log("el id es= " + id_menuGuardada);
  if (id_menuGuardada === 0) {
    const IDPADRE = id_menuGuardada;
    
    // Obtener los valores de los campos variables menus
    const NOMBREMENU = document.querySelector("#nombre_menu").value.trim();
    const ORDEN = document.querySelector("#orden").value.trim();

    // Validación de campos
    let errores = [];

    // Validación de nombre del menú
    if (!NOMBREMENU) {
      errores.push("El campo 'Nombre del Menú' es obligatorio.");
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
    document.getElementById("ordenError").innerHTML = errores.includes(
      "El campo 'Orden' es obligatorio."
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
    document
      .getElementById("ordenError")
      .classList.toggle(
        "error-field",
        errores.includes("El campo 'Orden' es obligatorio.")
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
        // mostrarCamposCreate();
      })
      .catch((err) => {
        console.log("Error al realizar la peticion.", err.message);
      });

    //UPDATE
  } else {

  }
}
function mostrarCamposCreateMenu() {
  var camposCreate = document.getElementById("camposCrearMenu");
  if (camposCreate.style.display == "none") {
    camposCreate.style.display = "block";
  } else {
    camposCreate.style.display = "none";
  }
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
function limpiarCamposCreateMenu() {
  // Obtiene el formulario por su ID
  var formulario = document.getElementById("formularioCrearMenu");
  // Resetea el formulario, limpiando todos los campos
  formulario.reset();
}
