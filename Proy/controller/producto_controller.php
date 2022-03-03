<?php
session_start();
require_once("model/producto_model.php");

$productos=new Producto_model();

$producto=$productos->get_producto();
$mostrar=$productos->mostrar();

$producto_ordenado=$productos->get_ordenado();
$mostrar_ordenado=$productos->mostrar_ordenado();

require_once("view/html/shop_view.php");
