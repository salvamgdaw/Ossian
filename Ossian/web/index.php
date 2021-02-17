<?php
require_once __DIR__ . '/../app/Config.php';
require_once __DIR__ . '/../app/Model.php';
require_once __DIR__ . '/../app/Controller.php';
$map = array(
    'home' => array(
        'controller' => 'Controller',
        'action' => 'home'
    ),
    'read' => array(
        'controller' => 'Controller',
        'action' => 'read'
    ),
    'create' => array(
        'controller' => 'Controller',
        'action' => 'create'
    ),
    'update' => array(
        'controller' => 'Controller',
        'action' => 'update'
    ),
    'delete' => array(
        'controller' => 'Controller',
        'action' => 'delete'
    )
);
if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: No existe la ruta <i>' . $_GET['ctl'] . '</p></body></html>';
        exit();
    }
} else {
    $ruta = 'home';
}
$controlador = $map[$ruta];
if (method_exists($controlador['controller'], $controlador['action'])) {
    call_user_func(array(
        new $controlador['controller'](),
        $controlador['action']
    ));
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' . $controlador['controller'] . '->' . $controlador['action'] . '</i> no existe</h1></body></html>';
}
