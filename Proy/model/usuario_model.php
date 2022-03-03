<?php

class Usuario_model
{

    private $db;

    private $usuario;

    public function __construct()
    {
        require_once("conectar.php");
        $this->db = Conectar::dbConnect();
        $this->usuario = array();
    }

    
    
    //Obtenemos los usuarios de la base de datos
    public function get_usuario()
    {
        $pdo = $this->db;
        $sql = "select codigo,nombre,correo,telefono,direccion,contraseña from usuario where correo='" . $_SESSION["email"] . "';";
        $stmt = $pdo->query($sql);
        //$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        while ($filas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->usuario[] = $filas;
        }
        unset($pdo);
        unset($stmt);
        return $this->usuario;
    }

    //Funcion que hace UPDATE en la tabla usuarios
    public function modificar()
    {
        $pdo = $this->db;
        $update = "UPDATE `usuario` SET `nombre`=:nombre,`correo`=:correo,`telefono`=:telefono,`direccion`=:direccion,`ficheros`=:ficheros WHERE `correo`='" . $_SESSION["email"] . "';";
        $stmt = $pdo->prepare($update);
        $stmt->bindValue(':nombre', $_POST['name'], PDO::PARAM_STR);
        $stmt->bindValue(':correo', $_POST['email'], PDO::PARAM_STR);
        $stmt->bindValue(':telefono', $_POST['tel'], PDO::PARAM_INT);
        $stmt->bindValue(':direccion', $_POST['direc'], PDO::PARAM_STR);
        $stmt->bindValue(':ficheros', "../usuarios/" . $_POST['name'] . "/", PDO::PARAM_STR);
        $result = $stmt->execute();
        //echo var_dump($result);
        //echo $_SESSION["email"];
        if ($result == 1) {
            unset($stmt);
            unset($pdo);
            $_SESSION["email"] = $_POST["email"];
            header("Location:profile.php");
        } else {
            echo '<p>Se produjo un error en la actualización..</p>';
        }
    }

    //Modificamos la contraseña
    public function modificarPsw()
    {
        $pdo = $this->db;
        $update = "UPDATE `usuario` SET `contraseña`=:psw WHERE `correo`='" . $_SESSION["email"] . "';";
        $stmt = $pdo->prepare($update);
        $stmt->bindValue(':psw', password_hash($_POST["psw2"], PASSWORD_DEFAULT), PDO::PARAM_STR);
        $result = $stmt->execute();
        if ($result == 1) {
            unset($stmt);
            unset($pdo);
            //header("Location:profile.php");
        } else {
            echo '<p>Se produjo un error en la actualización..</p>';
        }
    }

    //Comprobamos que $_POST["pwd"] sea igual a la que hay en la bbdd
    public function comprobarPsw()
    {
        if (password_verify($_POST["psw"], $this->usuario[0]["contraseña"])) {
            $res = false;
        } else {
            $res = true;
        }

        return $res;
    }

    //Insertamos el acceso en la tabla Logs
    public function insertMod()
    {
        try {
            $pdo = $this->db;
            $sql = "INSERT INTO `mods`(`usuario`, `fecha`) VALUES (:usu,:fecha)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":usu", $this->usuario[0]["codigo"], PDO::PARAM_INT);
            $stmt->bindValue(":fecha", date('m/d/Y h:i:s a', time()), PDO::PARAM_STR);
            $result = $stmt->execute();
            //echo var_dump($result);
            unset($stmt);
            unset($pdo);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
}
