<?php
class Modelo
{
    private $db_connection;

    public function __construct()
    {
        $rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $rutaProyecto = explode("/", $rutaCarpeta);
        include $_SERVER['DOCUMENT_ROOT'] . "/" . $rutaProyecto[1] . '/configuracion/database.php';
        $database = new Database();
        $this->db_connection = $database->getConnection();
    }

    public function crearDepartamento($nombre)
    {
        $query = "INSERT INTO departamentos (Nombre) VALUES (:nombre)";
        $stmt = $this->db_connection->prepare($query);
        $stmt->bindParam(":nombre", $nombre);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarDepartamento($id, $nombre)
    {
        $query = "UPDATE departamentos SET Nombre = :nombre WHERE ID = :id";
        $stmt = $this->db_connection->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nombre", $nombre);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarDepartamento($id)
    {
        $query = "DELETE FROM departamentos WHERE ID = :id";
        $stmt = $this->db_connection->prepare($query);
        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function obtenerDepartamentos()
    {
        $query = "SELECT * FROM departamentos";
        $stmt = $this->db_connection->prepare($query);
        $stmt->execute();
        $departamentos = $stmt->fetchAll();

        return $departamentos;
    }

    public function obtenerDepartamento($id)
    {
        $query = "SELECT * FROM departamentos WHERE ID = :id";
        $stmt = $this->db_connection->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $departamento = $stmt->fetch(PDO::FETCH_ASSOC);

        return $departamento;
    }
}
