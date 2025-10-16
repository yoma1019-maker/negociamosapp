<?php

namespace Model;

class Departamentos extends ActiveRecord{

    public $id;
    public $depto;

protected static $tabla = 'departamentos';
protected static $columnasDB = ['id', 'depto'];

public function __construct( $args = []) //crea un espejo de la base de datos
{
    $this -> id = $args['id'] ?? null;//si no esta presente el id sale null
    $this -> depto = $args['depto'] ?? '';


}

    public function validarDepartamento() {

       if (!$this -> depto){
            self::$alertas['error'] [] = 'Departamento Obligatorio';
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