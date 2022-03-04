<?php

require_once("model/conectar.php");

try {
    $db = Conectar::dbConnect();
    $sql="Delete from usuario where codigo=".$_GET["usu"].";";
    if($stmt=$db->query($sql)==1){
        header("Location:profile.php");
    }else{
        echo "Ha ocurrido un error en la eliminación.";
    }
} catch (PDOException $e) {
    echo '<p>No conectado !!</p>';
    echo $e->getMessage();
    exit;
}

