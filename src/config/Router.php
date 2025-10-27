<?php

use App\Atlas\config\SessionManager;


// Normalizar /atlas3 o /atlas3/ a /atlas3/login (redirigir)


define('BASE_PATH', dirname(__DIR__, 2)); // Esto te da c:\xampp\htdocs\atlas3

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    // Ruta raíz
    $r->addRoute('GET', '/atlas3/', '');
    $r->addRoute('GET', '/atlas3/login', '/src/views/login/login.php');

    // Ruta para el dashboard
    $r->addRoute('GET', '/atlas3/inicio', '/src/views/home/home.php');
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

        // Rutas públicas que no requieren sesión
        $publicRoutes = [
            '/atlas3/login',
            '/atlas3/',
            '/atlas3'
        ];

        // Definir rutas permitidas por rol
        $routesByRole = [
            'Administrador' => ['*'], // '*' = acceso a todo
            'Medico'        => [

                '/atlas3/consultas',
                '/atlas3/paciente',
            ],
            'Informatica'   => [
                '/atlas3/paneladmin',
                '/atlas3/inicio',
                '/atlas3/tools',
            ],
            // agregar más roles y rutas según necesidad
        ];

        // Si es ruta pública, permitir
        if (in_array($uri, $publicRoutes, true)) {
            require BASE_PATH . $handler;
            break;
        }


        $sessionManager = new SessionManager();
        SessionManager::start();
        $userRole = $_SESSION['rol'] ?? null;

        // Si no hay sesión activa o no hay rol en la sesión -> redirigir a login
        if (!SessionManager::haySessionActiva() || empty($userRole)) {
            header('Location: /atlas3/login', true, 302);
            exit;
        }

        // Si es administrador, permitir todo
        if ($userRole === 'Administrador' || (isset($routesByRole['Administrador']) && in_array('*', $routesByRole['Administrador'], true))) {
            require BASE_PATH . $handler;
            break;
        }

        // Si el rol existe en la lista y la ruta está permitida, permitir
        if (isset($routesByRole[$userRole])) {
            if (in_array($uri, $routesByRole[$userRole], true)) {
                require BASE_PATH . $handler;
                break;
            }

            // ruta no permitida para este rol
            http_response_code(403);
            require BASE_PATH . '/src/views/vista.php';
            exit;
        }

        require BASE_PATH . $handler;
        break;
}
