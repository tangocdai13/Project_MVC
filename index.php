<?php 

require './Common/Autoload.php';
require './Common/Helper.php';

$controllerName = ucfirst(($_GET['controller'] ?? 'Home') . 'Controller');
var_dump($controllerName);
$actionName = $_GET['action'] ?? 'index'; 

$controller = new $controllerName;

$controller->$actionName();