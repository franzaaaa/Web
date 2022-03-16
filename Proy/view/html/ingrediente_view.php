<?php
if (isset($_POST["volver"])) {
    header("Location:shop.php");
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>

        <body>
            <form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]) ?>" method="POST">
                <?php
                echo $ingredientes->mostrar();
                if (isset($_SESSION["email"])) {
<<<<<<< HEAD
                    if ($_SESSION["rol"] == 0) {
=======
                    if ($_SESSION["email"] == "franza@gmail.com") {
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
                        echo "<button type='submit' name='eliminar'>Eliminar</button>";
                    }
                }
                ?>
                <button type="submit" name="volver">Volver</button>
            </form>
            <?php
            if (isset($_POST["eliminar"])) {
<<<<<<< HEAD
                $ingredientes->eliminar($_GET["producto"]);
=======
                $ingredientes->eliminar();
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
                header("Location:shop.php");
            }
            ?>
        </body>

    </html>
    <?php
}
?>