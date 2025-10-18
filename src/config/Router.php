<?php

require __DIR__ . '../../../vendor/autoload.php';

define('BASE_PATH', dirname(__DIR__, 2)); // Esto te da c:\xampp\htdocs\atlas3

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    // Ruta raíz
    $r->addRoute('GET', '/atlas3/', '/src/views/login/login.php');

    // Puedes agregar más rutas aquí si lo deseas
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Limpiar query string
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not 
        require BASE_PATH . '/src/views/error/error.php';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
        //  print_r($vars);
        //  print_r($handler);

        require BASE_PATH . $handler;
        break;
}