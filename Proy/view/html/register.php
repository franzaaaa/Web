<?php
session_start();
<<<<<<< HEAD
//throw new Exception("sdfsdf");
echo $email = isset($_POST["email"]) ? $_SESSION["email"] = $_POST["email"] : "";
echo $name = isset($_POST["name"]) ? $_SESSION["name"] = $_POST["name"] : "";
echo $tel = isset($_POST["tel"]) && ctype_digit($_POST["tel"]) ? $_POST["tel"] : "";
echo $direc = isset($_POST["direc"]) ? $_POST["direc"] : "";
$oblig = ["email", "psw", "psw2", "name", "tel", "direc"];

function dbConnect() {
    $servidor = "vl23934.dinaserver.com";
    $base = "a16d_panaderia";
    $usuario = "a16d_user";
    $contrasenha = "1@52T0j5QK#@";
    try {
        $db = new PDO('mysql:host=' . $servidor . ';dbname=' . $base, $usuario, $contrasenha);
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
=======
$email = isset($_POST["email"]) ? $_SESSION["email"] = $_POST["email"] : "";
$name = isset($_POST["name"]) ? $_SESSION["name"] = $_POST["name"] : "";
$tel = isset($_POST["tel"]) && ctype_digit($_POST["tel"]) ? $_POST["tel"] : "";
$direc = isset($_POST["direc"]) ? $_POST["direc"] : "";
$oblig = ["email", "psw", "psw2", "name", "tel", "direc"];

function dbConnect() {
    $servidor = "localhost";
    $base = "panaderia";
    $usuario = "root";
    $contrasenha = "";
    try {
        $db = new PDO('mysql:host=' . $servidor . ';dbname=' . $base, $usuario, $contrasenha);
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
    } catch (PDOException $e) {
        echo '<p>No conectado !!</p>';
        echo $e->getMessage();
        exit;
    }
    return $db;
}

function comprobar($campos) {
    $no_encontrado = "";

    foreach ($campos as $campo) {
        if (empty($_POST[$campo])) {
            $no_encontrado .= $campo . " ";
        }
    }
    if (isset($_POST["registrar"])) {
        $no_encontrado .= comprobarPsw();
    }
    if (isset($_POST["registrar"])) {
        $no_encontrado .= comprobarTel();
    }

    if (isset($_POST["registrar"])) {
        $no_encontrado .= comprobarEmail($_POST["email"]);
    }

    if (empty($no_encontrado)) {
        return false;
    } else {
        return "Revise los campos " . $no_encontrado;
    }
}

function comprobarPsw() {
    $res = "";
    if ($_POST["psw"] == $_POST["psw2"]) {
        $res = "";
    } else {
        $res = "<br>Las contraseñas no coinciden";
    }
    return $res;
}

function comprobarTel() {
    $res = "";
    if (ctype_digit($_POST["tel"])) {
        $res = "";
    } else {
        $res = "<br>Telefono no valido";
    }
    return $res;
}

function comprobarEmail($correo) {
    try {
        $pdo = dbConnect();
        $sql = "select correo from usuario;";
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $res = "";

        //echo var_dump($result);
        $bandera = true;
        foreach ($result as $bd_correo) {
            if ($bd_correo->correo == $correo) {
                $bandera = false;
            }
        }

        if ($bandera) {
            $res = "";
        } else {
            $res = "<br>Correo electrónico no valido";
<<<<<<< HEAD
            unset($_SESSION["email"]);
=======
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
        }

        unset($stmt);
        unset($pdo);
        return $res;
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}


function insertUsuario() {
    try {
        $pdo= dbConnect();
<<<<<<< HEAD
        $sql="INSERT INTO `usuario`(`codigo`, `nombre`, `correo`, `telefono`, `direccion`, `contrasena`, `ficheros`,`rol`) "
                . "VALUES ('',:nombre,:correo,:tel,:dir,:psw,:fich,1)";
=======
        $sql="INSERT INTO `usuario`(`codigo`, `nombre`, `correo`, `telefono`, `direccion`, `contraseña`, `ficheros`) "
                . "VALUES ('',:nombre,:correo,:tel,:dir,:psw,:fich)";
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
        $stmt=$pdo->prepare($sql);
        $stmt->bindValue(":nombre", $_POST["name"], PDO::PARAM_STR);
        $stmt->bindValue(":correo", $_POST["email"], PDO::PARAM_STR);
        $stmt->bindValue(":tel", $_POST["tel"], PDO::PARAM_INT);
        $stmt->bindValue(":dir", $_POST["direc"], PDO::PARAM_STR);
        $stmt->bindValue(":psw", password_hash($_POST["psw"],PASSWORD_DEFAULT) , PDO::PARAM_STR);
<<<<<<< HEAD
        $stmt->bindValue(":fich", "../../../usuarios/".$_POST["email"]."/" , PDO::PARAM_STR);
        //$stmt->execute();
        if($stmt->execute() && !file_exists("../../../usuarios/".$_POST["email"])){
            mkdir("../../../usuarios/".$_POST["email"], 0777,true);
=======
        $stmt->bindValue(":fich", "../usuarios/".$_POST["email"]."/" , PDO::PARAM_STR);
        //$stmt->execute();
        if($stmt->execute() && !file_exists("../../usuarios/".$_POST["email"])){
            mkdir("../../usuarios/".$_POST["email"], 0777,true);
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
        }
        unset($stmt);
        unset($pdo);
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}

if (!isset($_POST["registrar"]) || isset($_POST["registrar"]) && is_string(comprobar($oblig))) {
    ?>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="../css/profile_register.css" />
        </head>
        <body>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                <div class="container">
                    <h1>Regístrate</h1>
                    <p>Introduce tus datos para que podamos crear tu cuenta</p>
                    <hr>

                    <label for="email"><b>CORREO ELECTRÓNICO</b></label>
                    <input type="text" placeholder="Enter Email" name="email" id="email" value="<?php echo htmlspecialchars($email) ?>" required>

                    <label for="psw"><b>CONTRASEÑA</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

                    <label for="psw2"><b>REPITE LA CONTRASEÑA</b></label>
                    <input type="password" placeholder="Repeat Password" name="psw2" id="psw2" required>

                    <label for="name"><b>Nombre</b></label>
                    <input type="text" placeholder="Enter name" name="name" id="name" value="<?php echo htmlspecialchars($name) ?>" required>

                    <label for="tel"><b>Telefono</b></label>
                    <input type="text" placeholder="Enter mobile number" name="tel" id="tel" value="<?php echo htmlspecialchars($tel) ?>">

                    <label for="direc"><b>Dirección</b></label>
                    <input type="text" placeholder="Enter adress" name="direc" id="direc" value="<?php echo htmlspecialchars($direc) ?>">

                    <button type="submit" class="registerbtn" name="registrar">REGÍSTRATE EN NUESTRA PANADERÍA</button>

                    <?php
                    if (isset($_POST["registrar"]) && is_string(comprobar($oblig))) {
                        echo "<br>";
                        echo comprobar($oblig);
                    }
                    ?>
                </div>
                <div class="container signin">
<<<<<<< HEAD
                    <p>¿Ya tienes una cuenta? <a href="./view/html/login.php">Logueate aquí!</a></p>
=======
                    <p>¿Ya tienes una cuenta? <a href="login.php">Logueate aquí!</a>.</p>
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
                </div>
            </form>
        </body>
    </html>
    <?php
} else {
    session_unset();
    session_destroy();
    insertUsuario();
<<<<<<< HEAD
    require_once("mail_register.php");
    header("Location:view/html/login.php");
=======
    header("Location:login.php");
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
}
?>