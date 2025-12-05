<?php

use App\Atlas\config\SessionManager;

// Normalizar /atlas-system o /atlas-system/ a /atlas-system/login (redirigir)


define('BASE_PATH', dirname(__DIR__, 2)); // Esto te da c:\xampp\htdocs\atlas-system

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    // Ruta raíz
    $r->addRoute('GET', '/atlas-system/', '');
    $r->addRoute('GET', '/atlas-system/login', '/src/views/login/login.php');
    $r->addRoute('GET', '/atlas-system/login2', '/src/views/login/login2.php');

    // Ruta para el dashboard
    $r->addRoute('GET', '/atlas-system/inicio', '/src/views/home/home.php');
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

        if(PHP_SESSION_ACTIVE == 2){SessionManager::start();};

        if ($uri === '/atlas-system' || $uri === '/atlas-system/') {
            // redirección permanente (cambiar a 302 si prefieres temporal)
            header('Location: /atlas-system/login', true, 301);
            exit;
        }

        
        

        // // Rutas públicas que no requieren sesión
        // $publicRoutes = [
        //     '/atlas-system/login',
        //     '/atlas-system/',
        //     '/atlas-system',
        //     '/atlas-system/login2'
        // ];

        // // Definir rutas permitidas por rol
        // $routesByRole = [
        //     'Administrador' => ['*'], // '*' = acceso a todo
        //     'Medico'        => [

        //         '/atlas-system/consultas',
        //         '/atlas-system/paciente',
        //     ],
        //     'Informatica'   => [
        //         '/atlas-system/paneladmin',
        //         '/atlas-system/inicio',
        //         '/atlas-system/tools',
        //     ],
        //     // agregar más roles y rutas según necesidad
        // ];

        // // Si es ruta pública, permitir
        // if (in_array($uri, $publicRoutes, true)) {
        //     require BASE_PATH . $handler;
        //     break;
        // }


        // $sessionManager = new SessionManager();
        // SessionManager::start();
        // $userRole = $_SESSION['rol'] ?? null;

        // // Si no hay sesión activa o no hay rol en la sesión -> redirigir a login
        // if (!SessionManager::haySessionActiva() || empty($userRole)) {
        //     header('Location: /atlas-system/login', true, 302);
        //     exit;
        // }

        // // Si es administrador, permitir todo
        // if ($userRole === 'Administrador' || (isset($routesByRole['Administrador']) && in_array('*', $routesByRole['Administrador'], true))) {
        //     require BASE_PATH . $handler;
        //     break;
        // }

        // // Si el rol existe en la lista y la ruta está permitida, permitir
        // if (isset($routesByRole[$userRole])) {
        //     if (in_array($uri, $routesByRole[$userRole], true)) {
        //         require BASE_PATH . $handler;
        //         break;
        //     }

        //     // ruta no permitida para este rol
        //     http_response_code(403);
        //     require BASE_PATH . '/src/views/vista.php';
        //     exit;
        // }

        require BASE_PATH . $handler;
        break;
}
