<?php
require_once("vendor/autoload.php");
require_once("./Model/Connection.php");

session_start();
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
