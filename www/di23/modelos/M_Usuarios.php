<?php
require_once 'modelos/Modelo.php';
require_once 'modelos/DAO.php';
class M_Usuarios extends Modelo
{
    public $DAO;

    public function __construct()
    {
        parent::__construct(); //ejecuta constructor del padre
        $this->DAO = new DAO();
    }

    public function buscarUsuarios($filtros = array())
    {
        $id_usuario = '';
        $activoBusqueda = '';
        $sexoBusqueda = '';
        $nombreBusqueda = '';
        $usuario = '';
        $pass = '';
        extract($filtros);

        $SQL = "SELECT * FROM usuarios WHERE 1=1";

        if ($usuario != '' && $pass != '') {
            $usuario = addslashes($usuario);
            $pass = addslashes($pass);
            $SQL .= " AND login = '$usuario' AND pass = MD5('$pass')";
        } else {
            if ($id_usuario != '' && $id_usuario!= 0) {
                $aTexto = explode(' ', $id_Usuario);
                $SQL .= " AND (1=2 ";
                foreach ($aTexto as $palabra) {
                    $SQL .= " OR id_Usuario LIKE $palabra ";
                }
                $SQL .= " ) ";
            }
            if ($nombreBusqueda != '') {
                $aTexto = explode(' ', $nombreBusqueda);
                $SQL .= " AND (1=2 ";
                foreach ($aTexto as $palabra) {
                    $SQL .= " OR apellido_1 LIKE '%$palabra%' ";
                    $SQL .= " OR apellido_2 LIKE '%$palabra%' ";
                    $SQL .= " OR nombre LIKE '%$palabra%' ";
                }
                $SQL .= " ) ";
            }
            //  echo $c_texto;
            if ($sexoBusqueda != 'T' && $sexoBusqueda != "") {
                $SQL .= " AND sexo = '$sexoBusqueda'";
            }
            // echo $d_texto;
            // var_dump ($filtros);
            if ($activoBusqueda != '') {
                $SQL .= " AND activo = '$activoBusqueda'";
            }
        }



        // echo $SQL;
        $usuarios = $this->DAO->consultar($SQL);
    
        return $usuarios;
    }

    
    // public function construirConsultaUsuariosConPaginacion(array $filtros = [])
    // {
    //     $registrosPorPagina = 10;
    //     $paginaActual = 1;
        
    //     extract($filtros);
        
    //     // Llamada a la función existente para buscar usuarios
    //     $usuarios = $this->buscarUsuarios($filtros);
    
    //     // Contar el total de registros
    //     $totalRegistros = count($usuarios);
    
    //     // Calcular el total de páginas
    //     $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
    
    //     // Aplicar lógica de paginación
    //     $inicio = ($paginaActual - 1) * $registrosPorPagina;
    //     $usuariosPaginados = array_slice($usuarios, $inicio, $registrosPorPagina);
    
    //     // Devolver los usuarios paginados junto con la información de paginación
    //     return [
    //         'usuarios' => $usuariosPaginados,
    //         'totalRegistros' => $totalRegistros,
    //         'totalPaginas' => $totalPaginas,
    //     ];
    // }
    

    public function insertarUsuario($parameters = array())
    {
        $nombre = "";
        $apellido_1 = "";
        $apellido_2 = "";
        $email = "";
        $sexo = "";
        $login = "";
        $password = "";
        $activo = "";
        extract($parameters);

        // Validar si ya existe un usuario con el mismo nombre de usuario
    
        if ($login != "") {
            $sqlVerificar = "SELECT COUNT(*) AS total FROM usuarios WHERE login = '$login'";
            $resultadoVerificar = $this->DAO->consultar($sqlVerificar);
            $filaLogin = $resultadoVerificar[0]['total'];
            
                if ($filaLogin > 0) {
                    // Ya existe un usuario con el mismo nombre de usuario
                    echo "Error: Ya existe un usuario con el mismo nombre de usuario.";
                    return;
                }
    
        }


        $SQL = "INSERT INTO usuarios (nombre, apellido_1, apellido_2, sexo, fecha_Alta, mail, login, pass, activo)";

        //compruebo que introduzcas nombre, username(login),password
        if ($nombre != "" && $login != "" && $password != "") {
            $nombre = addslashes($nombre);
            $apellido_1 = addslashes($apellido_1);
            $apellido_2 = addslashes($apellido_2);
            $sexo = addslashes($sexo);
            $email = addslashes($email);
            $login = addslashes($login);
            $password = ($password);
            if ($activo != "") {
                $activo = $activo;
            } else {
                $activo = 'N';
            }

            $SQL .= "VALUES ('$nombre', '$apellido_1', '$apellido_2', '$sexo', NOW(), '$email', '$login', md5('$password'), '$activo' )";
            // echo $SQL;

            // Realizar la inserción después de la validación
            $usuarios = $this->DAO->insertar($SQL);
            return $usuarios;
        } else {
            return "Error: Por favor, complete todos los campos obligatorios.";
        }
    }



    public function updatearUsuario($parameters = array()){
        $id_UsuarioGuardada = "";
        $nameUpdate = "";
        $apellidoUpdate1 = "";
        $apellidoUpdate2 = "";
        $sexoUpdate = "";
        $emailUpdate = "";
        $loginUpdate = "";
        $telefonoUpdate = "";

        extract($parameters);

        if ($loginUpdate != "") {
            $sqlVerificar = "SELECT COUNT(*) AS total FROM usuarios WHERE login = '$loginUpdate'";
            $resultadoVerificar = $this->DAO->consultar($sqlVerificar);
            $filaLogin = $resultadoVerificar[0]['total'];
            
                if ($filaLogin > 0) {
                    // Ya existe un usuario con el mismo nombre de usuario
                    echo '<script>alert("Error: Ya existe un usuario con el mismo login.");</script>';
                    return;
                }
    
        }


        $SQL2 = "";
        $SQL = "UPDATE usuarios SET ";
        if ($nameUpdate != "") {
            $SQL2 .= "nombre = '$nameUpdate' ,";
        }
        if ($apellidoUpdate1 != "") {
            $SQL2 .= "apellido_1 = '$apellidoUpdate1' ,";
        }
        if ($apellidoUpdate2 != "") {
            $SQL2 .= "apellido_2 = '$apellidoUpdate2' ,";
        }
        if ($sexoUpdate != "") {
            $SQL2 .= "sexo = '$sexoUpdate' , ";
        }
        if ($emailUpdate != "") {
            $SQL2 .= "mail = '$emailUpdate' ,";
        }
        if ($loginUpdate != "") {
            $SQL2 .= "login = '$loginUpdate' ,";
        }
        if ($telefonoUpdate != "") {
            $SQL2 .= "movil = $telefonoUpdate ";
        }
        $SQLCamposSinComa = substr($SQL2, 0, -2);
        $SQL .= $SQLCamposSinComa;
        $SQL .= " WHERE id_Usuario = $id_UsuarioGuardada";
        echo "SQL EN EL UPDATE= ".$SQL;

        // Ejecutar la actualización
        $result = $this->DAO->actualizar($SQL);

        if ($result === false) {
            // Manejar el error
            echo '<script>alert("Error en la actualización del usuario.");</script>';
        } else {
            // Todo salió bien
            echo '<script>alert("Usuario actualizado correctamente.");</script>';
        }
    }
    
}