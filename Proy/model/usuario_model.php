<?php

namespace model;

class Usuario_model
{

    private $db;

    private $usuario;
    
    private $lista;

    public function __construct()
    {
        require_once("conectar.php");
        $this->db = Conectar::dbConnect();
        $this->usuario = array();
        $this->lista=array();
        $this->info_usu=array();
    }


    
    //Obtenemos al usuario
    public function get_usuario(){
        $lista=$this->lista;
        foreach($lista as $usuario){
            if($usuario["correo"]==$_SESSION["email"]){
                return $this->usuario=$usuario;
            }
        }
    }

    /*public function obtener_mods($email){
        $res=[];
        $pdo = $this->db;
        $sql="SELECT * from mods where usuario = (select codigo from usuario where correo = ?)";
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam(1,$email,\PDO::PARAM_STR_CHAR);
        while ($filas = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $res[] = $filas;
        }
        echo var_dump($res);
        return $res;
    }*/

    public function obtener_mods($email){
        $res=[];
        $pdo = $this->db;
        if($_SESSION["rol"]==0){
            $sql="SELECT * from mods";
        }else{
            $sql="SELECT * from mods where usuario = (select codigo from usuario where correo = '".$email."')";
        }
        
        $stmt=$pdo->query($sql);
        while ($filas = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $res[] = $filas;
        }
        //echo var_dump($res);
        $salida="<table><tr><th>Número Modificación</th><th>Fecha Modificación</th><tr>";

        foreach($res as $modificacion){
            $salida.="<tr>";
            $salida.="<td>".$modificacion["numero"]."</td>";
            $salida.="<td>".$modificacion["fecha"]."</td>";
            $salida.="</tr>";

        }
        $salida.="</table>";
        return $salida;
    }

    public function obtener_mods_param($email,$param1,$param2){
        $res=[];
        $pdo = $this->db;
        if($_SESSION["rol"]==0){
            $sql="SELECT * from mods where fecha between '".$param1."' and '".$param2."'";
        }else{
            $sql="SELECT * from mods where usuario = (select codigo from usuario where correo = '".$email."') and fecha between '".$param1."' and '".$param2."'";
        }
        $stmt=$pdo->query($sql);
        while ($filas = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $res[] = $filas;
        }
        //echo var_dump($res);
        $salida="<table><tr><th>Número Modificación</th><th>Fecha Modificación</th><tr>";

        foreach($res as $modificacion){
            $salida.="<tr>";
            $salida.="<td>".$modificacion["numero"]."</td>";
            $salida.="<td>".$modificacion["fecha"]."</td>";
            $salida.="</tr>";

        }
        $salida.="</table>";
        return $salida;
    }


    
    //Obtenemos los usuarios de la base de datos
    public function obtener(){
        $pdo = $this->db;
        $sql = "select * from usuario;";
        $stmt = $pdo->query($sql);
        //$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        while ($filas = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $this->lista[] = $filas;
        }
        unset($pdo);
        unset($stmt);
        return $this->lista;
    }
    
    public function mostrar(){
        $lista=$this->lista;
        $msg="";
        foreach($lista as $usuario){
            $msg.="<div class='card'><p>"."</p><p>"."<b>NOMBRE:</b> ".$usuario["nombre"]."</p>"
                    . "<p>"."<b>EMAIL: </b>".$usuario["correo"]."</p><p>"."<b>TELÉFONO:</b> ".$usuario["telefono"]."</p>"
                    . "<p>"."<b>DIRECCIÓN:</b> ".$usuario["direccion"]."</p>";
            $msg.= "<a href='usuario.php?usuConv=".$usuario["codigo"]."'><button class='card' type='submit'>Convertir</button></a>";
            $msg.= "<a href='usuario.php?usuElim=".$usuario["codigo"]."'><button class='card' type='submit'>Eliminar</button></a></div>";
        }
        return $msg;
    }
    
    
    //Funcion que hace UPDATE en la tabla usuarios
    public function modificar()
    {
        $pdo = $this->db;
        $update = "UPDATE `usuario` SET `nombre`=:nombre,`correo`=:correo,`telefono`=:telefono,`direccion`=:direccion,`ficheros`=:ficheros WHERE `correo`='" . $_SESSION["email"] . "';";
        $stmt = $pdo->prepare($update);
        $stmt->bindValue(':nombre', $_POST['name'], \PDO::PARAM_STR);
        $stmt->bindValue(':correo', $_POST['email'], \PDO::PARAM_STR);
        $stmt->bindValue(':telefono', $_POST['tel'], \PDO::PARAM_INT);
        $stmt->bindValue(':direccion', $_POST['direc'], \PDO::PARAM_STR);
        $stmt->bindValue(':ficheros', "../usuarios/" . $_POST['name'] . "/", \PDO::PARAM_STR);
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
        $update = "UPDATE `usuario` SET `contrasena`=:psw WHERE `correo`='" . $_SESSION["email"] . "';";
        $stmt = $pdo->prepare($update);
        $stmt->bindValue(':psw', password_hash($_POST["psw2"], PASSWORD_DEFAULT), \PDO::PARAM_STR);
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
        if (password_verify($_POST["psw"], $this->usuario["contrasena"])) {
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
            $stmt->bindValue(":usu", $this->usuario["codigo"], \PDO::PARAM_INT);
            $stmt->bindValue(":fecha", date('Y/m/d'), \PDO::PARAM_STR);
            $result = $stmt->execute();
            //echo var_dump($result);
            unset($stmt);
            unset($pdo);
        } catch (\PDOException $e) {
            print $e->getMessage();
        }
    }

    public function subir_fichero($email){
        $fichero_subido = "../usuarios/".$email."/".($_FILES['fich']['name']);
        
        if (move_uploaded_file($_FILES['fich']['tmp_name'], $fichero_subido)) {
            return "El fichero es válido y se subió con éxito.\n";
        } else {
            return "¡Posible ataque de subida de ficheros!\n";
        }
    }
}
