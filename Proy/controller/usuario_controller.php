<?php
    session_start();
    require_once("model/usuario_model.php");

<<<<<<< HEAD
    //Instanciamos clase Usuario
    $usuario=new model\Usuario_model();


    //Metodos de la clase
=======
    $usuario=new Usuario_model();
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
    $lista=$usuario->obtener();
    $atrib_usuario=$usuario->get_usuario();
    
    require_once("view/html/profile_view.php");
<<<<<<< HEAD
    
=======
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
