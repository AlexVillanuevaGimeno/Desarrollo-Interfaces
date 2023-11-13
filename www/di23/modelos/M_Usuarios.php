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

    public function buscarUsuarios($filtros = array()){
        $d_texto='';
        $c_texto='';
        $b_texto = '';
        $usuario = '';
        $pass = '';
        extract($filtros);

        $SQL = "SELECT * FROM usuarios WHERE 1=1";

        if ($usuario != '' && $pass != '') {
            $usuario = addslashes($usuario);
            $pass = addslashes($pass);
            $SQL .= " AND login = '$usuario' AND pass = MD5('$pass')";
        }else{
            if ($b_texto != '') {
                $aTexto = explode(' ', $b_texto);
                $SQL .= " AND (1=2 ";
                foreach ($aTexto as $palabra) {
                    $SQL .= " OR apellido_1 LIKE '%$palabra%' ";
                    $SQL .= " OR apellido_2 LIKE '%$palabra%' ";
                    $SQL .= " OR nombre LIKE '%$palabra%' ";
                }
                $SQL .= " ) ";
            }
            //  echo $c_texto;
            if ( $c_texto !='T') {
                $SQL .= " AND sexo = '$c_texto'";
            }
            // echo $d_texto;
            // var_dump ($filtros);
            if ($d_texto != '') {
                $SQL .= " AND activo = '$d_texto'";
            }
        }
        


        // echo $SQL;
        $usuarios = $this->DAO->consultar($SQL);
        return $usuarios;

    }

    public function insertarUsuario($parameters = array()){
        $nombre= "";
        $apellido_1= "";
        $apellido_2= "";
        $email = "";
        $sexo= "";
        $login = "";
        $password= "";
        $activo= "";
        extract($parameters);

        $SQL= "INSERT INTO usuarios (nombre, apellido_1, apellido_2, sexo, fecha_Alta, mail, login, pass, activo)";

        if(
            $nombre!= "" &&
            //  $apellido_1!= "" && $apellido_2!= ""&& $sexo!= ""&& $email != ""&&
         $login != ""&& $password!= "") {
            $nombre = addslashes($nombre);
            $apellido_1 = addslashes($apellido_1);
            $apellido_2 = addslashes($apellido_2);
            $sexo = addslashes($sexo);
            $email =addslashes($email);
            $login = addslashes($login);
            $password = ($password);
            if ($activo!= "") {
                $activo = $activo;
            }else{
                $activo = 'N';
            }

            
            $SQL .= "VALUES ('$nombre', '$apellido_1', '$apellido_2', '$sexo', NOW(), '$email', '$login', md5('$password'), '$activo' )";
            // echo $SQL;
    }
    $usuarios = $this->DAO->insertar($SQL);
        return $usuarios;

}


public function updatearUsuario($parameters = array()){
        $nameUpdate= "";
        $apellidoUpdate1= "";
        $apellidoUpdate2= "";
        $emailUpdate = "";    
        $loginUpdate = "";
        $passwordUpdate= "";
        extract($parameters);

        $SQL = "UPDATE usuarios SET ";
        $SQL .= " nombre = '$nombre', apellido_1 = '$apellido_1', apellido_2 = '$apellido_2',";
        $SQL .= " sexo = '$sexo', mail = '$email', pass = md5('$password'),";


}

}

