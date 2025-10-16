<?php

namespace Model;

class ClientesAsociados extends ActiveRecord {

    public $id;
    public $fecha;
    public $nombre;
    public $nacimiento;
    public $cedula;
    public $expedicion;
    public $lugarexp;
    public $cedula1;
    public $cedula2;
    public $celular;
    public $civil;
    public $direccion;
    public $ciudad;
    public $nacionalidad;
    public $email;
    public $cliente_id;   // 🔹 Relación con cliente principal



    protected static $tabla = 'clientes_asociados';
    protected static $columnasDB = [ 'id', 'nombre', 'nacimiento', 'cedula', 'expedicion', 
    'lugarexp', 'cedula1', 'cedula2','celular', 'civil', 'direccion', 'ciudad', 'nacionalidad', 'email', 'cliente_id' ];

    public function __construct($args = []) {

        $this->id           = $args['id'] ?? null;
        $this->fecha        = $args['fecha'] ?? '';
        $this->nombre       = $args['nombre'] ?? '';
        $this->nacimiento   = $args['nacimiento'] ?? '';
        $this->cedula       = $args['cedula'] ?? '';
        $this->expedicion   = $args['expedicion'] ?? '';
        $this->lugarexp     = $args['lugarexp'] ?? '';
        $this->cedula1      = $args['cedula1'] ?? '';
        $this->cedula2      = $args['cedula2'] ?? '';
        $this->celular      = $args['celular'] ?? '';
        $this->civil        = $args['civil'] ?? '';
        $this->direccion    = $args['direccion'] ?? '';
        $this->ciudad       = $args['ciudad'] ?? '';
        $this->nacionalidad = $args['nacionalidad'] ?? '';
        $this->email        = $args['email'] ?? '';
        $this->cliente_id   = $args['cliente_id'] ?? null; 

        // inicializamos también el nombre del agente si viene en $args
        
    }
}