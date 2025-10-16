<?php

namespace Model;

class Proyectos extends ActiveRecord{

    public $id;
    public $proyecto;
    public $lote;
    public $etapa;
    public $aream;
    public $estado;
    public $valor_aream;
    public $tipo_lote;
    public $valor_total;
    public $porcen_inicial;
    public $cuota_inicial;
    public $valor_restante;
    public $cuotas;
    public $valor_cuotas;



protected static $tabla = 'proyectos';
protected static $columnasDB = ['id', 'proyecto', 'lote',  'etapa', 'aream',  'estado', 'valor_aream' , 'tipo_lote' , 'valor_total' ,'porcen_inicial',
'cuota_inicial', 'valor_restante', 'cuotas', 'valor_cuotas'];

public function __construct( $args = []) //crea un espejo de la base de datos
{
    $this -> id = $args['id'] ?? null;//si no esta presente el id sale null
    $this -> proyecto = $args['proyecto'] ?? ''; 
    $this -> lote = $args['lote'] ?? ''; 
    $this -> etapa = $args['etapa'] ?? ''; 
    $this -> aream = $args['aream'] ?? ''; 
    $this -> estado = $args['estado'] ?? ''; 
    $this -> valor_aream = $args['valor_aream'] ?? ''; 
    $this -> tipo_lote = $args['tipo_lote'] ?? '';
    $this -> valor_total = $args['valor_total'] ?? ''; 
    $this -> porcen_inicial = $args['porcen_inicial'] ?? ''; 
    $this -> cuota_inicial = $args['cuota_inicial'] ?? ''; 
    $this -> valor_restante = $args['valor_restante'] ?? ''; 
    $this -> cuotas = $args['cuotas'] ?? ''; 
    $this -> valor_cuotas = $args['valor_cuotas'] ?? ''; 


}

    public function informacion_proyectos() {

       if (!$this -> proyecto){
            self::$alertas['error'] [] = 'Identificacion Obligatoria';
        }
        //if (!$this -> nombre){
        //    self::$alertas['error'] [] = 'Nombre Obligatorio';
       // }
       // if (!$this -> usuario){
        //    self::$alertas['error'] [] = 'Usuario Obligatorio';
       // }
        //if (!$this -> clave){
        //    self::$alertas['error'] [] = 'Clave Obligatoria';
        //}
       // if (!$this -> perfil){
          //  self::$alertas['error'] [] = 'Perfil Obligatorio';
        //

       return self::$alertas;

   }

   public static function whereArray($campos) {
    $condiciones = [];
    foreach ($campos as $campo => $valor) {
        $condiciones[] = "{$campo} = '" . self::$db->escape_string($valor) . "'";
    }

    $query = "SELECT * FROM " . static::$tabla . " WHERE " . implode(' AND ', $condiciones) . " LIMIT 1";

    $resultado = self::$db->query($query);

    return $resultado ? $resultado->fetch_assoc() : null;
}



}

   

   
