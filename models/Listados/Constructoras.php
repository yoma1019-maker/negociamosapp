<?php

namespace Model;

class Constructoras extends ActiveRecord{

    public $id;
    public $tipo;
    public $identificacion;
    public $nombre;
    public $contacto;
    public $celular;
    public $email;



protected static $tabla = 'constructoras';
protected static $columnasDB = ['id', 'Tipo de Identificacion', 'N°_Identificacion',  'Nombre_o_Razon_Social', 'Contacto', 
'Celular', 'Correo_Contacto'];

public function __construct( $args = []) //crea un espejo de la base de datos
{
    $this -> id = $args['id'] ?? null;//si no esta presente el id sale null
    $this -> tipo = $args['Tipo de Identificacion'] ?? ''; 
    $this -> identificacion = $args['N°_Identificacion'] ?? ''; 
    $this -> nombre = $args['Nombre_o_Razon_Social'] ?? ''; 
    $this -> contacto = $args['Contacto'] ?? ''; 
    $this -> celular = $args['Celular'] ?? ''; 
    $this -> email = $args['Correo_Contacto'] ?? ''; 


}

    public function validarConstructora() {

       if (!$this -> identificacion){
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