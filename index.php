<?php
require_once 'controladores/departamentos.control.php';

$controlador = new Controlador();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];
    $controlador->$action($id);
} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
    $controlador->$action();
} else {
    $controlador->index();
}
