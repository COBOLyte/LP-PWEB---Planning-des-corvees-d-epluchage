<?php
session_start();
require_once("./Model/connection.php");
$connection = new Connection();
$db = $connection->getDb();

if (
    (isset($_GET["ctrl"]) && !empty($_GET["ctrl"])) &&
    (isset($_GET["method"]) && !empty($_GET["method"]))
    ) {
        $ctrl = ucfirst($_GET["ctrl"]);
        $method = $_GET["method"];
    } else {
        $ctrl = "Index";
        $method = "index";
    }
    
    require_once("./Controller/" . $ctrl . "Controller.php");
    $ctrl = $ctrl . "Controller";
    $controller = new $ctrl($db);
    $controller->$method();
?>
