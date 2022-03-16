<?php
    session_start();
    require_once("model/ingrediente_model.php");
<<<<<<< HEAD
    
    //Instanciamos clase Ingredientes
    $ingredientes= new model\Ingredientes_model;


    //Metodos de la clase
=======
    $ingredientes= new Ingredientes_model;
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
    $producto_ingredientes=$ingredientes->get_productoIngrediente();
    
    require_once("view/html/ingrediente_view.php");

?>