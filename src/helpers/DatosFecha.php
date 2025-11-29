<?php

namespace App\Atlas\helpers;

class DatosFecha
{
    /**
     * Retorna el nombre del mes actual en español
     * @return string
     */
    public static function getMesActualInfo(): array
    {
        $numMes = (int)date('n');
        $meses = self::getDatosMeses();
        return [
            'numero' => $numMes,
            'nombre' => $meses[$numMes] ?? '',
            'abreviatura' => substr($meses[$numMes] ?? '', 0, 3),
            'fechaActual' => date('d-m-Y')
        ];
    }

    public static function getDatosMeses(): array
    {
        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre'
        ];
        return $meses;
    }

    /**
     * Retorna solo las opciones <option> de los meses
     * @param int|null $selected Mes seleccionado
     * @return string
     */
    public static function getOptionsMeses($selected = null)
    {
        $meses = self::getDatosMeses();
        // Si no se pasa $selected, usar el mes actual
        if ($selected === null) {
            $selected = self::getMesActualInfo()['numero'];
        }
        $html = '';
        foreach ($meses as $num => $nombre) {
            $html .= '<option value="' . $num . '"';
            if ((int)$selected === (int)$num) {
                $html .= ' selected';
            }
            $html .= '>' . htmlspecialchars($nombre) . '</option>';
        }
        return $html;
    }
}


?>