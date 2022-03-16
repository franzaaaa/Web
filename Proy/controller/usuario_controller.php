<?php
    session_start();
    require_once("model/usuario_model.php");

    //Instanciamos clase Usuario
    $usuario=new model\Usuario_model();


    //Metodos de la clase
    $lista=$usuario->obtener();
    $atrib_usuario=$usuario->get_usuario();
    
    require_once("view/html/profile_view.php");
    
