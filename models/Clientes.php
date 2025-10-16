<?php

namespace Model;

class Clientes extends ActiveRecord {

    public $id;
    public $fecha;
    public $nombre;
    public $nacimiento;
    public $c_nacimiento;
    public $sexo;
    public $t_documento;
    public $otro_doc;
    public $cedula;
    public $expedicion;
    public $lugarexp;
    public $celular;
    public $celular2;
    public $civil;
    public $nacionalidad;
    public $otro_nac;
    public $direccion;
    public $ciudad;
    public $departamento;
    public $pais;
    public $email;
    public $agente_id;
    public $cedula1;
    public $cedula2;
    public $proyeccion_pdf;
    public $intencion_pdf;
    public $nombre_agente;



    protected static $tabla = 'clientes';
    protected static $columnasDB = [ 'id', 'nombre', 'nacimiento', 'c_nacimiento', 'sexo', 't_documento', 
    'otro_doc', 'cedula', 'expedicion', 'lugarexp', 'celular', 'celular2', 'civil', 'nacionalidad', 'otro_nac', 
    'direccion', 'ciudad', 'departamento', 'pais', 'email', 'agente_id', 'cedula1', 'cedula2', 
    'proyeccion_pdf', 'intencion_pdf',];

    public function __construct($args = []) {

        $this->id           = $args['id'] ?? null;
        $this->fecha        = $args['fecha'] ?? '';
        $this->nombre       = $args['nombre'] ?? '';
        $this->nacimiento   = $args['nacimiento'] ?? '';
        $this->c_nacimiento = $args['c_nacimiento'] ?? '';
        $this->sexo         = $args['sexo'] ?? '';
        $this->t_documento  = $args['t_documento'] ?? '';
        $this->otro_doc     = $args['otro_doc'] ?? '';
        $this->cedula       = $args['cedula'] ?? '';
        $this->expedicion   = $args['expedicion'] ?? '';
        $this->lugarexp     = $args['lugarexp'] ?? '';
        $this->celular      = $args['celular'] ?? '';
        $this->celular2     = $args['celular2'] ?? '';
        $this->civil        = $args['civil'] ?? '';
        $this->nacionalidad = $args['nacionalidad'] ?? '';
        $this->otro_nac     = $args['otro_nac'] ?? '';
        $this->direccion    = $args['direccion'] ?? '';
        $this->ciudad       = $args['ciudad'] ?? '';
        $this->departamento = $args['departamento'] ?? '';
        $this->pais         = $args['pais'] ?? '';
        $this->email        = $args['email'] ?? '';
        $this->agente_id    = $args['agente_id'] ?? '';
        $this->cedula1      = $args['cedula1'] ?? '';
        $this->cedula2      = $args['cedula2'] ?? '';
        $this->proyeccion_pdf = $args['proyeccion_pdf'] ?? '';
        $this->intencion_pdf  = $args['intencion_pdf'] ?? '';
    }


        
    // 🔹 Mantener tu función whereArrayOrAll
    public static function whereArrayOrAll($campos) {
        $condiciones = [];
        foreach ($campos as $campo => $valor) {
            $condiciones[] = "{$campo} LIKE '%" . self::$db->escape_string($valor) . "%'";
        }

        $query = "SELECT * FROM " . static::$tabla . " WHERE " . implode(' OR ', $condiciones);
        $resultado = self::$db->query($query);

        $clientes = [];
        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                $clientes[] = [
                    "id"           => $fila["id"],
                    "nombre"       => $fila["nombre"] ?? '',
                    "nacimiento"   => $fila["nacimiento"] ?? '',
                    "c_nacimiento" => $fila["c_nacimiento"] ?? '',
                    "sexo"         => $fila["sexo"] ?? '',
                    "t_documento"  => $fila["t_documento"] ?? '',
                    "otro_doc"     => $fila["otro_doc"] ?? '',
                    "cedula"       => $fila["cedula"] ?? '',
                    "expedicion"   => $fila["expedicion"] ?? '',
                    "lugarexp"     => $fila["lugarexp"] ?? '',
                    "celular"      => $fila["celular"] ?? '',
                    "celular2"     => $fila["celular2"] ?? '',
                    "civil"        => $fila["civil"] ?? '',
                    "nacionalidad" => $fila["nacionalidad"] ?? '',
                    "otro_nac"     => $fila["otro_nac"] ?? '',
                    "direccion"    => $fila["direccion"] ?? '',
                    "ciudad"       => $fila["ciudad"] ?? '',
                    "departamento" => $fila["departamento"] ?? '',
                    "pais"         => $fila["pais"] ?? '',
                    "email"        => $fila["email"] ?? '',
                    "agente_id"    => $fila["agente_id"] ?? '',
                    "cedula1"      => $fila["cedula1"] ?? '',
                    "cedula2"      => $fila["cedula2"] ?? '',

                ];
            }
        }
        return $clientes;
    }

    



}

