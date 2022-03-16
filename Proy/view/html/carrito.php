<?php
require_once("model/conectar.php");
session_start();

$productos=implode(",", array_keys($_SESSION["carrito"]));

function getProd($cod){
    $db=model\Conectar::dbConnect();
    $sql="select codigo,nombre,precio from producto where codigo in (".$cod.")";
    $stmt=$db->query($sql);
    $filas=$stmt->fetchAll(\PDO::FETCH_ASSOC);
    
    return $filas;
}

function mostrar($array){
    $msg="<div class='container_carrito'>";
    $precio=0;

    foreach ($array as $producto){
        $msg.="<div class='card'><input type'text' name='nombre' value='".$producto["nombre"]."    (ud. ".$producto["precio"]."€)"."' disabled>";
        $msg.=" Cantidad:<input type'text' name='nombre' value='".$_SESSION["carrito"][$producto["codigo"]]."' disabled>";
        $precio+=($producto["precio"]*$_SESSION["carrito"][$producto["codigo"]]);
        $msg.="<a href='carrito.php?codElim=".$producto["codigo"]."'><button>Eliminar</button></a>";
        $msg.="<a href='carrito.php?cod=".$producto["codigo"]."'><button>Añadir</button></a></div>";
    }
    $msg.="</div><p>Precio total a pagar en el establecimiento: ";
    $msg.=$precio."€</p>";
    return $msg;
}



function eliminar($prod){
    $_SESSION["carrito"][$prod]--;
    if($_SESSION["carrito"][$prod]==0){
        unset($_SESSION["carrito"][$prod]);
    }
    header("Location:carrito.php");
}

function anhadir($prod){
    $_SESSION["carrito"][$prod]++;
    if($_SESSION["carrito"][$prod]==0){
        unset($_SESSION["carrito"][$prod]);
    }
    header("Location:carrito.php");
}

function insertar($array){
    $db=model\Conectar::dbConnect();
    $sql="select codigo from usuario where correo = '".$_SESSION["email"]."';";
    $stmt=$db->query($sql);
    $res=$stmt->fetchAll(\PDO::FETCH_OBJ);
    $usu=$res[0]->codigo;
    unset($stmt);
    unset($sql);

    //Introducimos los valores en la tabla 

    foreach ($array as $producto){
        $fecha=date('Y/m/d H:i');
        $sql="INSERT INTO `carrito`(`usuario`, `producto`, `cantidad`,`fecha`) VALUES (:usu,:prod,:cant,:fecha)";
        $stmt=$db->prepare($sql);
        $stmt->bindParam(":usu",$usu,\PDO::PARAM_INT);
        $stmt->bindParam(":prod",$producto["codigo"],\PDO::PARAM_INT);
        $stmt->bindParam(":cant",$_SESSION["carrito"][$producto["codigo"]],\PDO::PARAM_INT);
        $stmt->bindParam(":fecha",$fecha,\PDO::PARAM_STR);
        
        if($stmt->execute()==1){
            unset($sql);
            unset($stmt);
        }
    }
    /**/
    
    $_SESSION["carrito"]=[];
    header("Location:carrito.php");
}

function confirmar_pedido(){
    $res=array();
    $db=model\Conectar::dbConnect();
    $sql="select codigo, (select correo from usuario where codigo=carrito.usuario) as usuario,producto,estado from carrito where estado='pendiente';";
    $stmt=$db->query($sql);
    while ($filas = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        $res[] = $filas;
    }
    return $res;
}

function mostrar_pendientes($array){
    $msg="";
    $msg.="<table><tr><th>Código</th><th>Usuario</th><th>Producto</th><th>Estado</th><th></th></tr>";
    foreach($array as $reserva){
        $msg.= "<tr><td>".$reserva["codigo"]."</td>";
        $msg.= "<td>".$reserva["usuario"]."</td>";
        $msg.="<td>".$reserva["producto"]."</td>";
        $msg.= "<td>".$reserva["estado"]."</td>";
        $msg.="<td><a href='carrito.php?producto=".$reserva["codigo"]."'>Confirmar</a></td></tr>";
    }
    $msg.="</table>";
    return $msg;
}

function update_carrito($cod){
    $db=model\Conectar::dbConnect();
    $sql="UPDATE `carrito` SET `estado`='confirmado' WHERE codigo = :cod";
    $stmt=$db->prepare($sql);
    $stmt->bindParam(":cod",$cod,\PDO::PARAM_INT);
    if($stmt->execute()==1){
        header("Location:carrito.php");
    }
    else{
        header("Location:carrito.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Carrito</title>
</head>
<body>
    <h1>Carrito de la compra</h1>
    <?php
    if(empty($_SESSION["carrito"])){
        echo "<h2>Tu carrito se encuentra vacío</h2>";
    }

    if(isset($_GET["codElim"])){
        eliminar($_GET["codElim"]);
    }
    if(isset($_GET["cod"])){
        anhadir($_GET["cod"]);
    }
    if(isset($_GET["producto"])){
        update_carrito($_GET["producto"]);
    }
    if(!empty($_SESSION["carrito"])){
        echo mostrar(getProd($productos));
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method='POST'>
        <input type="submit" id="enviar_pedido" value='Enviar Pedido' name='enviar'>
    </form>
    <?php
        if(isset($_POST["enviar"]) && !empty($_SESSION["carrito"])){
            //require_once("mail_compra.php");
            //unset($mail);
            //require_once("mail_productos.php");
            insertar(getProd($productos));
        }
        if($_SESSION["email"]=="franza@gmail.com"){
            echo mostrar_pendientes(confirmar_pedido());
        }
    ?>
    <a href="index.php"><button class="enviar_pedido">Volver al inicio</button></a>
</body>
</html>