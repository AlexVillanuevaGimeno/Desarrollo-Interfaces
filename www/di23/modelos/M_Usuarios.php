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
        $id_Usuario = '';
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
            if ($id_Usuario != '') {
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

        $SQL = "INSERT INTO usuarios (nombre, apellido_1, apellido_2, sexo, fecha_Alta, mail, login, pass, activo)";

        if (
            $nombre != "" &&
            //  $apellido_1!= "" && $apellido_2!= ""&& $sexo!= ""&& $email != ""&&
            $login != "" && $password != ""
        ) {
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
        }
        $usuarios = $this->DAO->insertar($SQL);
        return $usuarios;
    }


    public function updatearUsuario($parameters = array())
    {
        $id_UsuarioGuardada = "";
        $nameUpdate = "";
        $apellidoUpdate1 = "";
        $apellidoUpdate2 = "";
        $sexoUpdate = "";
        $emailUpdate = "";
        $loginUpdate = "";
        $telefonoUpdate = "";
        extract($parameters);
        $SQL2  ="";
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
        if ($emailUpdate !="") {
            $SQL2 .= "mail = '$emailUpdate' ,";
        }
        if ($loginUpdate!="") {
            $SQL2 .= "login = '$loginUpdate' ,";
        }
        if ($telefonoUpdate!="") {
            $SQL2 .= "movil = $telefonoUpdate ";
        }
        $SQLCamposSinComa = substr($SQL2, 0, -2);
        $SQL .= $SQLCamposSinComa;
        $SQL .= "WHERE id_Usuario = $id_UsuarioGuardada";
        echo $SQL;
        $this->DAO->actualizar($SQL);
    }
}
