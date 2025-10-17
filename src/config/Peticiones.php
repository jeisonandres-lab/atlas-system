<?php
namespace App\Atlas\config;
use App\Atlas\helpers\ResponseHelper;

class Peticiones {

    private $responseHelper;

    public function __construct() {
        $this->responseHelper = new ResponseHelper();
    }

    public function obtenerVariables() {
        return [
            'id' => isset($_POST['id']) ? $this->responseHelper->limpiarCadena($_POST['id']) : "",
            'pin' => isset($_POST['pin']) ? $this->responseHelper->limpiarCadena($_POST['pin']) : "",
            'usuario' => isset($_POST['usuario']) ? $this->responseHelper->limpiarCadena($_POST['usuario']) : "",
            'password' => isset($_POST['password']) ? $this->responseHelper->limpiarCadena($_POST['password']) : "",
            'primerNombre' => isset($_POST['primerNombre']) ? $this->responseHelper->limpiarCadena($_POST['primerNombre']) : "",
            'segundoNombre' => isset($_POST['segundoNombre']) ? $this->responseHelper->limpiarCadena($_POST['segundoNombre']) : "",
            'primerApellido' => isset($_POST['primerApellido']) ? $this->responseHelper->limpiarCadena($_POST['primerApellido']) : "",
            'segundoApellido' => isset($_POST['segundoApellido']) ? $this->responseHelper->limpiarCadena($_POST['segundoApellido']) : "",
            'primerNombreFamiliar' => isset($_POST['primerNombreFamiliar']) ? $this->responseHelper->limpiarCadena($_POST['primerNombreFamiliar']) : "",
            'segundoNombreFamiliar' => isset($_POST['segundoNombreFamiliar']) ? $this->responseHelper->limpiarCadena($_POST['segundoNombreFamiliar']) : "",
            'primerApellidoFamiliar' => isset($_POST['primerApellidoFamiliar']) ? $this->responseHelper->limpiarCadena($_POST['primerApellidoFamiliar']) : "",
            'segundoApellidoFamiliar' => isset($_POST['segundoApellidoFamiliar']) ? $this->responseHelper->limpiarCadena($_POST['segundoApellidoFamiliar']) : "",
            'parentesco' => isset($_POST['parentesco']) ? $this->responseHelper->limpiarCadena($_POST['parentesco']) : "",
            'cedula' => isset($_POST['cedula']) ? $this->responseHelper->limpiarCadena($_POST['cedula']) : "",
            'cedulaFamiliar' => isset($_POST['cedulaFamiliar']) ? $this->responseHelper->limpiarCadena($_POST['cedulaFamiliar']) : "",
            'cedulaEmpleado' => isset($_POST['cedulaEmpleado']) ? $this->responseHelper->limpiarCadena($_POST['cedulaEmpleado']) : "",
            'civil' => isset($_POST['civil']) ? $this->responseHelper->limpiarCadena($_POST['civil']) : "",
            'correo' => isset($_POST['correo']) ? $this->responseHelper->limpiarCadena($_POST['correo']) : "",
            'ano' => isset($_POST['ano']) ? $this->responseHelper->limpiarCadena($_POST['ano']) : "",
            'mes' => isset($_POST['meses']) ? $_POST['meses'] : "",
            'dia' => isset($_POST['dia']) ? $this->responseHelper->limpiarCadena($_POST['dia']) : "",
            'edad' => isset($_POST['edad']) ? $this->responseHelper->limpiarCadena($_POST['edad']) : "",
            'sexo' => isset($_POST['sexo']) ? $this->responseHelper->limpiarCadena($_POST['sexo']) : "",
            'discapacidad' => isset($_POST['tpDiscapacidad']) ? $this->responseHelper->limpiarCadena($_POST['tpDiscapacidad']) : "",
            'nivelAcademico' => isset($_POST['nivelAcademico']) ? $this->responseHelper->limpiarCadena($_POST['nivelAcademico']) : "",
            'fechaING' => isset($_POST['fechaing']) ? $this->responseHelper->limpiarCadena($_POST['fechaing']) : "",
            'fecha_ini' => isset($_POST['fecha_ini_filtrar']) ? $this->responseHelper->limpiarCadena($_POST['fecha_ini_filtrar']) : "",
            'fecha_fin' => isset($_POST['fecha_fin_filtrar']) ? $this->responseHelper->limpiarCadena($_POST['fecha_fin_filtrar']) : "",
            'telefono' => isset($_POST['telefono']) ? $this->responseHelper->limpiarCadena($_POST['telefono']) : "",
            'linea' => isset($_POST['linea']) ? $this->responseHelper->limpiarCadena($_POST['linea']) : "",
            'numeroCarnet' => isset($_POST['carnet']) ? $this->responseHelper->limpiarCadena($_POST['carnet']) : "",
            'tomo' => isset($_POST['tomo']) ? $this->responseHelper->limpiarCadena($_POST['tomo']) : "",
            'familiarInces' => isset($_POST['familiarInces']) ? $this->responseHelper->limpiarCadena($_POST['familiarInces']) : "",
            'folio' => isset($_POST['folio']) ? $this->responseHelper->limpiarCadena($_POST['folio']) : "",
            'vivienda' => isset($_POST['vivienda']) ? $this->responseHelper->limpiarCadena($_POST['vivienda']) : "",
            'calle' => isset($_POST['calle']) ? $this->responseHelper->limpiarCadena($_POST['calle']) : "",
            'numeroVivienda' => isset($_POST['numeroVivienda']) ? $this->responseHelper->limpiarCadena($_POST['numeroVivienda']) : "",
            'pisoUrba' => isset($_POST['piso']) ? $this->responseHelper->limpiarCadena($_POST['piso']) : "",
            'nombreUrba' => isset($_POST['urbanizacion']) ? $this->responseHelper->limpiarCadena($_POST['urbanizacion']) : "",
            'numeroDepa' => isset($_POST['numeroDepa']) ? $this->responseHelper->limpiarCadena($_POST['numeroDepa']) : "",
            'idPersonal' => isset($_POST['id']) ? $this->responseHelper->limpiarCadena($_POST['id']) : "",
            'idPersonal2' => isset($_POST['idPersonal']) ? $this->responseHelper->limpiarCadena($_POST['idPersonal']) : "",
            'idfamiliar' => isset($_POST['idfamiliar']) ? $this->responseHelper->limpiarCadena($_POST['idfamiliar']) : "",
            'idEmpleado' => isset($_POST['idEmpleado']) ? $this->responseHelper->limpiarCadena($_POST['idEmpleado']) : "",
            'idestado' => isset($_POST['estado']) ? $this->responseHelper->limpiarCadena($_POST['estado']) : "",
            'idestado2' => isset($_POST['idestado']) ? $this->responseHelper->limpiarCadena($_POST['idestado']) : "",
            'idMunicipio' => isset($_POST['municipio']) ? $this->responseHelper->limpiarCadena($_POST['municipio']) : "",
            'idMunicipio2' => isset($_POST['idmunicipio']) ? $this->responseHelper->limpiarCadena($_POST['idmunicipio']) : "",
            'idParroquia' => isset($_POST['parroquia']) ? $this->responseHelper->limpiarCadena($_POST['parroquia']) : "",
            'idEstatus' => isset($_POST['estatus']) ? $this->responseHelper->limpiarCadena($_POST['estatus']) : "",
            'idCargo' => isset($_POST['cargo']) ? $this->responseHelper->limpiarCadena($_POST['cargo']) : "",
            'idDepartamento' => isset($_POST['departamento']) ? $this->responseHelper->limpiarCadena($_POST['departamento']) : "",
            'idDependencia' => isset($_POST['dependencia']) ? $this->responseHelper->limpiarCadena($_POST['dependencia']) : "",
        ];
    }

    

    public static function get($key)
    {
        return $_GET[$key] ?? null;
    }

    public static function post($key)
    {
        return $_POST[$key] ?? null;
    }
}