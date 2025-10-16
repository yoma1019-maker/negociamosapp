<?php

namespace Model;

class ListadoProyectos extends ActiveRecord{

    public $id;
    public $nombre;
    public $tipo;
 

protected static $tabla = 'listadoProyectos';
protected static $columnasDB = ['id', 'nombre', 'tipo'];

public function __construct( $args = []) //crea un espejo de la base de datos
{
    $this -> id = $args['id'] ?? null;//si no esta presente el id sale null
    $this -> nombre = $args['nombre'] ?? ''; 
    $this -> tipo = $args['tipo'] ?? ''; 



}

    public function validarListadoPoryectos() {

       if (!$this -> nombre){
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
        //}

    

       return self::$alertas;

   }
}