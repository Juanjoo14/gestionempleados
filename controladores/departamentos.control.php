<?php

$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);
require_once $_SERVER['DOCUMENT_ROOT'] . "/" . $rutaProyecto[1] . '/modelos/departamentos.class.php';

class Controlador
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new Modelo();
    }

    public function index()
    {
        $departamentos = $this->modelo->obtenerDepartamentos();
        global $rutaProyecto;
        include $_SERVER['DOCUMENT_ROOT'] . "/" . $rutaProyecto[1] . '/vistas/listar.php';
    }

    public function crearDepartamento()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $success = $this->modelo->crearDepartamento($nombre);
            if ($success) {
                echo '<script>alert("Departamento creado exitosamente.");</script>';
            } else {
                echo '<script>alert("Error al crear el departamento.");</script>';
            }
            echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 13);</script>';
        } else {
            global $rutaProyecto;
            include $_SERVER['DOCUMENT_ROOT'] . "/" . $rutaProyecto[1] . '/vistas/crear.php';
        }
    }

    public function actualizarDepartamento($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $success = $this->modelo->actualizarDepartamento($id, $nombre);
            if ($success) {
                echo '<script>alert("Departamento actualizado exitosamente.");</script>';
            } else {
                echo '<script>alert("Error al actualizar el departamento.");</script>';
            }
            echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 13);</script>';
        } else {
            $dep = $this->modelo->obtenerDepartamento($id);
            global $rutaProyecto;
            include $_SERVER['DOCUMENT_ROOT'] . "/" . $rutaProyecto[1] . '/vistas/actualizar.php';
        }
    }

    public function eliminarDepartamento($id)
    {
        $success = $this->modelo->eliminarDepartamento($id);
        if ($success) {
            echo '<script>alert("Departamento eliminado exitosamente.");</script>';
        } else {
            echo '<script>alert("Error al eliminar el departamento.");</script>';
        }
        echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 13);</script>';
    }
}
