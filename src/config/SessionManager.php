<?php
namespace App\Atlas\config;

class SessionManager
{
    public static function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function iniciarName(): string
    {
        return session_name();
    }

    public static function cerrarSession(): bool
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset();
            return session_destroy();
        }
        return true;
    }
}