<?php

namespace Model;

class EstadoVentas extends ActiveRecord{

    public $id;
    public $estado;

protected static $tabla = 'estadoventas';
protected static $columnasDB = ['id', 'estado'];

public function __construct( $args = []) //crea un espejo de la base de datos
{
    $this -> id = $args['id'] ?? null;//si no esta presente el id sale null
    $this -> estado = $args['estado'] ?? '';
    

}

    public function validarEstadoVentas() {

       if (!$this -> estado){
            self::$alertas['error'] [] = 'Estado Obligatorio';
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
        //}

    

       return self::$alertas;

   }
}