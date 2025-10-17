<?php

namespace Model;

class Pais extends ActiveRecord{

    public $id;
    public $pais;

protected static $tabla = 'pais';
protected static $columnasDB = ['id', 'pais'];

public function __construct( $args = []) //crea un espejo de la base de datos
{
    $this -> id = $args['id'] ?? null;//si no esta presente el id sale null
    $this -> pais = $args['pais'] ?? '';


}

    public function validarPais() {

       if (!$this -> pais){
            self::$alertas['error'] [] = 'Pais Obligatorio';
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