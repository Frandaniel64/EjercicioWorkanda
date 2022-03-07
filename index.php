<?php
/*Ejercicio de Workanda */
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "controller/userController.php";
require_once "controller/viewController.php";
require_once "modelo/usuarioModel.php";


$index = new vista();
$index->index();

