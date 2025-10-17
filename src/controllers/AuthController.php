<?php
namespace App\Atlas\controllers;

use App\Atlas\models\public\UsuarioModelPublic;
use App\Atlas\config\SessionManager;

class AuthController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModelPublic();
    }

    private function readInput(): array
    {
        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
        if (stripos($contentType, 'application/json') !== false) {
            $data = json_decode(file_get_contents('php://input'), true);
            return is_array($data) ? $data : [];
        }
        // form-data / application/x-www-form-urlencoded
        return $_POST ?? [];
    }

    public function login()
    {
        header('Content-Type: application/json; charset=utf-8');

        $input = $this->readInput();

        $usuario = isset($input['usuario']) ? trim($input['usuario']) : '';
        $contrasena = isset($input['contrasena']) ? trim($input['contrasena']) : '';

        if ($usuario === '') {
            http_response_code(400);
            echo json_encode(['ok' => false, 'error' => 'usuario_vacio', 'message' => 'Campo usuario vacío']);
            return;
        }

        if ($contrasena === '') {
            http_response_code(400);
            echo json_encode(['ok' => false, 'error' => 'contrasena_vacia', 'message' => 'Campo contraseña vacío']);
            return;
        }

        $user = $this->usuarioModel->getExisteUsuario($usuario);

        if (!$user) {
            http_response_code(401);
            echo json_encode(['ok' => false, 'message' => 'Usuario no encontrado']);
            return;
        }

        // Iniciar sesión usando SessionManager si existe, si no fallback a session_start
        if (class_exists(SessionManager::class)) {
            SessionManager::start();
        } else {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
        }

        // Guardar datos de usuario en sesión
        $_SESSION['user'] = $user;

        // Construir respuesta leyendo el array con foreach
        $userData = [];
        foreach ($user as $key => $value) {
            $userData[$key] = $value;
        }

        echo json_encode([
            'ok' => true,
            'user' => $userData
        ]);
    }
}