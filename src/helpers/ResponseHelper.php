<?php

namespace App\Atlas\helpers;

class ResponseHelper
{
    public static function imprimirRespuestaJSON(array $respuesta): array
    {
        header('Content-Type: application/json');
        echo json_encode($respuesta);
        return $respuesta;
    }

    public static function redirigirALogin(): void
    {
        header('Location: Identificarse');
        exit();
    }

    public function convertirFecha($fecha) {
        $fechaObj = \DateTime::createFromFormat('d-m-Y', $fecha);
        return $fechaObj ? $fechaObj->format('Y-m-d') : false;
    }
    
     /**
     * Limpia una cadena de caracteres
     * @param string $cadena
     * @return string
     */
    public function limpiarCadena($cadena)
    {
        $palabras = [
            "<script>",
            "</script>",
            "<script src",
            "<script type=",
            "SELECT * FROM",
            "SELECT",
            "SELECT",
            "DELETE FROM",
            "INSERT INTO",
            "DROP TABLE",
            "DROP DATABASE",
            "TRUNCATE TABLE",
            "SHOW TABLES",
            "SHOW DATABASES",
            "<?php",
            "?>",
            "--",
            "^",
            "<",
            ">",
            "==",
            "=",
            ";",
            "::"
        ];
        $cadena = trim($cadena);
        $cadena = stripslashes($cadena);
        foreach ($palabras as $palabra) {
            $cadena = str_ireplace($palabra, "", $cadena);
        }
        $cadena = trim($cadena);
        $cadena = stripslashes($cadena);
        return  $cadena;
    }
}