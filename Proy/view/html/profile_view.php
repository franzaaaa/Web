<?php

try {
    
    if (isset($_POST["modificar"]) && !$usuario->comprobarPsw()) {
        if (!empty($_POST["psw2"])) {
            $usuario->modificarPsw();
        }
        $usuario->insertMod();
        $usuario->modificar();
    } else {
        if (isset($_POST["modificar"])) {
            echo '<script language="javascript">alert("Error en la modificación");</script>';
        }
    }
    if (isset($_POST["logout"])) {
        session_unset();
        session_destroy();
        header("Location:index.php");
    }
} catch (PDOException $e) {
    print $e->getMessage();
}


if (isset($_SESSION["email"])) {
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="../css/profile_register.css">
        </head>

        <body>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                <div class="container">
                    <h1>TU PERFIL</h1>
                    <p>MODIFICA LOS DATOS A TO GUSTO</p>
                    <hr>
                    <label for="name"><b>NOMBRE</b></label>
                    <input type="text" placeholder="Enter name" name="name" id="name" required value="<?php echo $atrib_usuario["nombre"]; ?>">

                    <label for="email"><b>CORREO ELECTRÓNICO</b></label>
                    <input type="text" placeholder="Enter Email" name="email" id="email" required value="<?php echo $atrib_usuario["correo"]; ?>">

                    <label for="psw"><b>CONTRASEÑA</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" id="psw" required value="<?php echo "*********" ?>">

                    <label for="psw2"><b>NUEVA CONTRASEÑA</b></label>
                    <input type="password" placeholder="Enter Password" name="psw2" id="psw2">

                    <label for="tel"><b>TELÉFONO</b></label>
                    <input type="text" placeholder="Para contactarte en caso de necesidad" name="tel" id="tel" required value="<?php echo $atrib_usuario["telefono"]; ?>">

                    <label for="dir"><b>DIRECCIÓN</b></label>
                    <input type="text" placeholder="¿A dónde enviamos el pedido?" name="direc" id="direc" required value="<?php echo $atrib_usuario["direccion"]; ?>">

                    <label for="fich"><b>FICHEROS</b></label>
                    <input type="file" name="fich" id="fich">

                    <button type="submit" name="modificar" class="registerbtn">MODIFICAR</button>
                    <button type="submit" name="logout" class="registerbtn">SAÍR</button>
               
                </div>
            </form>
            <?php
            if($_SESSION["email"]=="franza@gmail.com"){ 
                $usuario->mostrar();
            ?>
                
               
            <?php
            }
            ?>
        </body>

    </html>

    </body>

    </html>
<?php
} else {
    echo "<h3>Ha ocurrido un problema</h3>";
}
?>