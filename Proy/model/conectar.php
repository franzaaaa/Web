<?php


class Conectar
{

    public static function dbConnect()
    {
        $servidor = "localhost";
        $base = "panaderia";
        $usuario = "root";
        $contrasenha = "";
        try {
            $db = new PDO('mysql:host=' . $servidor . ';dbname=' . $base, $usuario, $contrasenha);
        } catch (PDOException $e) {
            echo '<p>No conectado !!</p>';
            echo $e->getMessage();
            exit;
        }
        return $db;
    }
}
