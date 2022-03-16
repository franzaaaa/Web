<?php
session_start();
require_once("model/producto_model.php");

<<<<<<< HEAD
//Instanciamos clase Producto
$productos=new model\Producto_model();

//Metodos de la clase
=======
$productos=new Producto_model();

>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
$producto=$productos->get_producto();
$mostrar=$productos->mostrar();

$producto_ordenado=$productos->get_ordenado();
$mostrar_ordenado=$productos->mostrar_ordenado();

require_once("view/html/shop_view.php");
