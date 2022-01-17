<?php

include_once("controllers/".$controlador."Controllers.php");

$objController= ucfirst($controlador)."Controller";

$controller = new $objController();
$controller->$accion();

?>