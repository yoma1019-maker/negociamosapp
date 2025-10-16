<?php

namespace Model;

class VentaAgente extends ActiveRecord {
    protected static $tabla = 'ventas_agentes';
    protected static $columnasDB = ['id', 'venta_id', 'agente_id', 'tipo', 'porcentaje'];

    public $id;
    public $venta_id;
    public $agente_id;
    public $tipo;
    public $porcentaje;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->venta_id = $args['venta_id'] ?? null;
        $this->agente_id = $args['agente_id'] ?? null;
        $this->tipo = $args['tipo'] ?? '';
        $this->porcentaje = $args['porcentaje'] ?? 0;
    }
}
