<?php

namespace Model;

class Ciudad extends ActiveRecord{

    public $id;
    public $ciudad;

protected static $tabla = 'ciudad';
protected static $columnasDB = ['id', 'ciudad'];

public function __construct( $args = []) //crea un espejo de la base de datos
{
    $this -> id = $args['id'] ?? null;//si no esta presente el id sale null
    $this -> ciudad = $args['ciudad'] ?? '';


}

    public function validarCiudad() {

       if (!$this -> ciudad){
            self::$alertas['error'] [] = 'Ciudad Obligatoria';
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