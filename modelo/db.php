<?php


class Conectar {

public static function conexion(){

try{

    $database_connection = new PDO("mysql:host=localhost; dbname=db_ejercico" , "root", ""); 
    $database_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database_connection->exec("set names utf8mb4");

}   catch(Exception $e){

    die("Error:" . $e->getMessage());
    echo "error line: " . $e->getLine();

}
    return $database_connection;

    }

}

?>