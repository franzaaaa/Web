<?php
    session_start();
    require_once("model/usuario_model.php");

    $usuario=new Usuario_model();
    $lista=$usuario->obtener();
    $atrib_usuario=$usuario->get_usuario();
    
    require_once("view/html/profile_view.php");
