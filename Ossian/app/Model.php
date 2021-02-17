<?php
include_once ("Config.php");

class Model extends PDO
{

    protected $conexion;

    public function __construct()
    {
        try {
            $this->conexion = new PDO(Config::$dbHost, Config::$dbUsuario, Config::$dbPass);
        } catch (PDOException $e) {
            echo "<p>Error: No puede conectarse con la base de datos.</p>\n";
            echo "<p>Error: " . $e->getMessage();
        }
    }

    public function list()
    {
        try {

            $consulta = "SELECT * FROM images";
            $result = $this->conexion->query($consulta);
            return $result->fetchAll();
        } catch (PDOException $e) {

            echo "<p>Error: " . $e->getMessage();
        }
    }

    public function insert($titulo, $categoria, $descripcion, $url)
    {
        $consulta = "INSERT into images (titulo, categoria, descripcion, url) values (?, ?, ?, ?)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(1, $titulo);
        $result->bindParam(2, $categoria);
        $result->bindParam(3, $descripcion);
        $result->bindParam(4, $url);
        $result->execute();

        return $result;
    }

    public function update($titulo, $categoria, $descripcion, $url, $id)
    {
        $consulta = "UPDATE images SET
        titulo=:titulo,
        categoria=:categoria,
        descripcion=:descripcion,
        url=:url
        WHERE id=:id";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(":titulo", $titulo);
        $result->bindParam(":categoria", $categoria);
        $result->bindParam(":descripcion", $descripcion);
        $result->bindParam(":url", $url);
        $result->bindParam(":id", $id);
        $result->execute();
    }

    public function delete($id)
    {
        $consulta = "DELETE FROM images WHERE id=:id";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(":id", $id);
        $result->execute();
    }
}
?>
