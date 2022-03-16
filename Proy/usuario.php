<?php

require_once("model/conectar.php");

try {
    
    $usu="";
    if(isset($_GET["usuElim"])){
        $sql="Delete from usuario where codigo = :cod;";
        $usu=$_GET["usuElim"];
    }
    if(isset($_GET["usuConv"])){
        $sql="UPDATE `usuario` SET `rol`= 0 WHERE codigo = :cod";
        $usu=$_GET["usuConv"];
    }
    $db = model\Conectar::dbConnect();
    $stmt=$db->prepare($sql);
    $stmt->bindValue(":cod", $usu,\PDO::PARAM_INT);
    if($stmt->execute()==1){
        header("Location:profile.php");
    }    
} catch (PDOException $e) {
    echo $e->getMessage();
    header("Location:profile.php");
    exit;
}

