<?php

require __DIR__ . '../../../vendor/autoload.php';

// Normalizar /atlas3 o /atlas3/ a /atlas3/login (redirigir)


define('BASE_PATH', dirname(__DIR__, 2)); // Esto te da c:\xampp\htdocs\atlas3

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    // Ruta raíz
    $r->addRoute('GET', '/atlas3/', '');
    $r->addRoute('GET', '/atlas3/login', '/src/views/login/login.php');

    // Ruta para el dashboard

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
       
        if ($uri === '/atlas3' || $uri === '/atlas3/') {
            // redirección permanente (cambiar a 302 si prefieres temporal)
            header('Location: /atlas3/login', true, 301);
            exit;
        }

        require BASE_PATH . $handler;
        break;
}