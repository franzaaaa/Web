<?php

require_once("model/conectar.php");

try {
<<<<<<< HEAD
    
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
=======
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
>>>>>>> 870bdfd09394e974286f034bc9472b23c465c9a8
    exit;
}

