<?php
    session_start();
    require_once("model/ingrediente_model.php");
    
    //Instanciamos clase Ingredientes
    $ingredientes= new model\Ingredientes_model;


    //Metodos de la clase
    $producto_ingredientes=$ingredientes->get_productoIngrediente();
    
    require_once("view/html/ingrediente_view.php");

?>