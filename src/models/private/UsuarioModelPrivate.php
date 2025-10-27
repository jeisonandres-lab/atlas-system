<?php

namespace App\Atlas\models\private;

use App\Atlas\config\EjecutarSQL;

class UsuarioModelPrivate extends EjecutarSQL
{

    public function existeUsuario(string $user)
    {
        $sql = $this->ejecutarConsulta(
            "SELECT 
                us.nameUser, 
                us.userPassword, 
                us.saltPass, 
                us.activo,
                r.rol,
                dtp.cedula,
                dtp.primerNombre,
                dtp.primerApellido
                FROM users us
                INNER JOIN rol r ON us.idRol = r.id_rol
                INNER JOIN datosempleados dte ON us.idEmpleado = dte.id_empleados
                INNER JOIN datospersonales dtp ON dte.idPersonal = dtp.id_personal
                WHERE nameUser = ?
                LIMIT 1",
            [$user]
        );

        if (empty($sql)) {
            return false; // no existe
        }

        return $sql[0]; // retorna la fila (array asociativo)
    }

    protected function datosUsuario($user): string
    {
        $sql = $this->ejecutarConsulta("SELECT * FROM users WHERE nameUser = ?", [$user]);
        return $sql;
    }

    protected function pinSeguridad(array $parametros)
    {
        $sql = $this->ejecutarConsulta("SELECT us.pin, dtp.cedula FROM users us INNER JOIN datosempleados dte ON us.idEmpleado = id_empleados
        INNER JOIN datospersonales dtp ON dte.idPersonal = dtp.id_personal WHERE us.pin = ? AND dtp.cedula = ? ", $parametros);
        if (empty($sql)) {
            return false;
        } else {
            return $sql;
        }
    }
}
