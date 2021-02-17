<?php

class Controller
{

    public function home()
    {
        $params["msj"] = "Bienvenido/a a la prueba técnica de PHP Full Stack Software Engineer en Ossian Technology";
        require __DIR__ . "/templates/home.php";
    }

    public function create()
    {
        $m = new Model(Config::$dbHost, Config::$dbUsuario, Config::$dbPass, Config::$dbNombre);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $m->insert($_POST["titulo"], $_POST["categoria"], $_POST["descripcion"], $_POST["url"]);
            header("location: index.php?ctl=read");
        }
    }

    public function read()
    {
        $m = new Model(Config::$dbHost, Config::$dbUsuario, Config::$dbPass, Config::$dbNombre);
        $params["images"] = $m->list();
        require __DIR__ . "/templates/read.php";
    }

    public function update()
    {
        $m = new Model(Config::$dbHost, Config::$dbUsuario, Config::$dbPass, Config::$dbNombre);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $m->update($_POST["updTitulo"], $_POST["updCategoria"], $_POST["updDescripcion"], $_POST["updUrl"], $_POST["txtId"]);
        }
        header("location: index.php?ctl=read");
    }

    public function delete()
    {
        $m = new Model(Config::$dbHost, Config::$dbUsuario, Config::$dbPass, Config::$dbNombre);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $m->delete($_POST["txtId"]);
        }
        header("location: index.php?ctl=read");
    }
}
?>