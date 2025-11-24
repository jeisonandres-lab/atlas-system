<?php

namespace App\Atlas\requests;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Atlas\config\Peticiones;
use App\Atlas\controllers\AuthController;

header('Content-Type: application/json; charset=utf-8');
 $inputJson = json_decode(file_get_contents('php://input'), true) ?: [];

// Obtener variables de entrada
$peticiones = new Peticiones();
$vars = is_array($peticiones->obtenerVariables()) ? $peticiones->obtenerVariables() : [];
extract($vars);

// Validación de que existe el módulo de usuario en la petición
if (!isset($_GET['modulo_usuario'])) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Módulo no especificado']);
    exit;
}


$authController = new AuthController();
switch ($_GET['modulo_usuario']) {
    case 'logear':
        sleep(10);   
               
        $usuario = $_POST['usuario'] ?? $inputJson['usuario'] ?? null;
        $contrasena = $_POST['password'] ?? $inputJson['password'] ?? null;

        // Verificar token de autenticación
        $authController->login($usuario, $contrasena);
        break;

    default:
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(['error' => 'Módulo no válido']);
        exit;
}