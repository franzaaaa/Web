<?php
    session_start();
    require_once("model/ingrediente_model.php");
    $ingredientes= new Ingredientes_model;
    $producto_ingredientes=$ingredientes->get_productoIngrediente();

    require_once("view/html/ingrediente_view.php");

?>