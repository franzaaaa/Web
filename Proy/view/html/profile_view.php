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
<<<<<<< HEAD
  
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
                <div class="container">
                    <h1>TU PERFIL</h1>
                    <p id="sesion">Bienvenido:</p>
                    
=======
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
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
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
<<<<<<< HEAD
                    
                    <label for="fich"><b>FICHEROS</b></label>
                    <input type="file" name="fich" id="fich">
                    <input type="submit" name="enviar" value="Enviar">
=======

                    <label for="fich"><b>FICHEROS</b></label>
                    <input type="file" name="fich" id="fich">
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8

                    <button type="submit" name="modificar" class="registerbtn">MODIFICAR</button>
                    <button type="submit" name="logout" class="registerbtn">SAÍR</button>
               
                </div>
            </form>
<<<<<<< HEAD
            <div id="tabla_modificaciones">
                <h1>Historial de Modificaciones:</h1>   
                <div id="tabla_modificaciones_inner">
                    <p>Filtrado por fecha: </p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                        <div id="inputs">
                            <div>
                                <label for="">Fecha Inicio:</label><input type="date" name="fecha1">
                            <label for="">Fecha Final:</label><input type="date" name="fecha2">
                            </div>
                            <div>
                                <input type="submit" value="Filtrar" name="filtrar">
                            <input type="submit" value="Quitar filtros" name="desfiltrar">
                            </div> 
                        </div>
                    </form>
                </div>

                <?php
                    //Controlador para filtrar
                    if(!isset($_POST["filtrar"])){
                        $res=$usuario->obtener_mods($_SESSION["email"]);  
                        echo $res;
                    }else{
                        $res2=$usuario->obtener_mods_param($_SESSION["email"],$_POST["fecha1"],$_POST["fecha2"]);  
                        echo $res2;
                    }
                    //Controlador para desfiltrar
                    if(isset($_POST["desfiltrar"])){
                        unset($_POST["fecha1"]);
                        unset($_POST["fecha2"]);
                    }
                   
                ?>
            </div>
            <div id="usuarios_eliminar">
            <?php
            
            if(isset($_POST["enviar"]) && !empty($_FILES)){
                echo $usuario->subir_fichero($_SESSION["email"]);
            }
            if($_SESSION["rol"]==0){ 
                echo $usuario->mostrar();
            }
            ?>
            </div>  
=======
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
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
<?php
} else {
    echo "<h3>Ha ocurrido un problema</h3>";
}
?>