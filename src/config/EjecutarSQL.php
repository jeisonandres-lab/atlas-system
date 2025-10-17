<?php

namespace App\Atlas\config;
use App\Atlas\config\Conexion;
use App\Atlas\helpers\ResponseHelper;

use PDO;
use PDOException;

class EjecutarSQL extends Conexion{

    private $ResponseHelper; 

    public function __construct()
    {
        parent::__construct();
        $this->ResponseHelper = new ResponseHelper();
    }

    /**
     * Ejecuta una consulta SQL
     * @param string $consulta
     * @param array $parametros
     * @return array|false
     */
    public function ejecutarConsulta($consulta, array $parametros = [])
    {
        try {
            $stmt = $this->conectar()->prepare($consulta);
            $stmt->execute($parametros);
            // Si la consulta devuelve resultados, los obtenemos
            //  if ($stmt->rowCount() > 0) {
            //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
            // } else {
            //     return [];
            // }
            // Para consultas SELECT, siempre intentamos obtener los resultados
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        } catch (PDOException $e) {
            Error::captureError();
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

   
    /**
     * Verifica si los datos cumplen con el patrón
     * @param string $filtro
     * @param string $cadena
     * @return bool
     */
    public function verificarDatos($filtro, $cadena)
    {
        $patron = "/^" . $filtro . "$/";
        return !preg_match($patron, $cadena);
    }

    /**
     * Guarda datos en una tabla
     * @param string $tabla
     * @param array $datos
     * @return PDOStatement
     */
    protected function guardarDatos($tabla, $datos)
    {
        $query = "INSERT INTO $tabla (";
        $C = 0;
        foreach ($datos as $clave) {
            if ($C >= 1) {
                $query .= ",";
            }
            $query .= $clave["campo_nombre"];
            $C++;
        }
        $query .= ") VALUES(";
        $C = 0;
        foreach ($datos as $clave) {
            if ($C >= 1) {
                $query .= ",";
            }
            $query .= $clave["campo_marcador"];
            $C++;
        }
        $query .= ")";
        $sql = $this->conectar()->prepare($query);
        foreach ($datos as $clave) {
            $sql->bindParam($clave["campo_marcador"], $clave["campo_valor"]);
        }
        $sql->execute();

        return $sql;
    }

    /**
     * Actualiza datos en una tabla
     * @param string $tabla
     * @param array $datos
     * @param array $condicion
     * @return PDOStatement
     */
    protected function actualizarDatos($tabla, $datos, $condicion)
    {
        $query = "UPDATE $tabla SET ";

        $C = 0;
        foreach ($datos as $clave) {
            if ($C >= 1) {
                $query .= ",";
            }
            $query .= $clave["campo_nombre"] . " = " . $clave["campo_marcador"];
            $C++;
        }

        $query .= " WHERE " . $condicion["condicion_campo"] . " = " . $condicion["condicion_marcador"];

        $sql = $this->conectar()->prepare($query);

        foreach ($datos as $clave) {
            $sql->bindParam($clave["campo_marcador"], $clave["campo_valor"]);
        }

        $sql->bindParam($condicion["condicion_marcador"], $condicion["condicion_valor"]);

        $sql->execute();

        return $sql;
    }

    /**
     * Elimina un registro de una tabla
     * @param string $tabla
     * @param string $campo
     * @param string $id
     * @return PDOStatement
     */
    protected function eliminarRegistro($tabla, $campo, $id)
    {
        $sql = $this->conectar()->prepare("DELETE FROM $tabla WHERE $campo=:id");
        $sql->bindParam(":id", $id);
        $sql->execute();

        return $sql;
    }

    /**
     * Selecciona datos de una tabla
     * @param string $tipo
     * @param string $tabla
     * @param string $campo
     * @param string $id
     * @return PDOStatement
     */
    public function seleccionarDatos($tipo, $tabla, $campo, $id)
    {
        $tipo = $this->ResponseHelper->limpiarCadena($tipo);
        $tabla = $this->ResponseHelper->limpiarCadena($tabla);
        $campo = $this->ResponseHelper->limpiarCadena($campo);
        $id = $this->ResponseHelper->limpiarCadena($id);

        if ($tipo == "Unico") {
            $sql = $this->conectar()->prepare("SELECT * FROM $tabla WHERE $campo=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Normal") {
            $sql = $this->conectar()->prepare("SELECT $campo FROM $tabla");
        }
        $sql->execute();

        return $sql;
    }

    /**
     * Obtiene la primera columna de una tabla
     * @param string $tabla
     * @return string|null
     */
    protected function obtenerPrimeraColumna(string $tabla)
    {
        $consulta = "SELECT COLUMN_NAME
                 FROM INFORMATION_SCHEMA.COLUMNS
                 WHERE TABLE_NAME = ?
                 ORDER BY ORDINAL_POSITION
                 LIMIT 1";

        $resultado = $this->ejecutarConsulta($consulta, [$tabla]);

        if ($resultado && count($resultado) > 0) {
            return $resultado[0]['COLUMN_NAME'];
        }

        return null;
    }

}