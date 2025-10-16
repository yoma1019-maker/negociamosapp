<?php

namespace Model;


class Usuario extends ActiveRecord {

        public $id;
        public $cedula;
        public $nombre;
        public $celular;
        public $email;
        public $nacimiento;
        public $direccion;
        public $barrio;
        public $tipo_agente;
        public $usuario;
        public $clave;
        public $rol;
        

    protected static $tabla = 'agentes';
    protected static $columnasDB = ['id', 'cedula', 'nombre',  'celular', 'email', 'nacimiento', 'direccion', 
    'barrio', 'tipo_agente', 'usuario', 'clave', 'rol'];

    public function __construct( $args = []) //crea un espejo de la base de datos
    {
        $this -> id = $args['id'] ?? null;//si no esta presente el id sale null
        $this -> cedula = $args['cedula'] ?? ''; 
        $this -> nombre = $args['nombre'] ?? ''; 
        $this -> celular = $args['celular'] ?? ''; 
        $this -> email = $args['email'] ?? ''; 
        $this -> nacimiento = $args['nacimiento'] ?? ''; 
        $this -> direccion = $args['direccion'] ?? ''; 
        $this -> barrio = $args['barrio'] ?? ''; 
        $this -> tipo_agente = $args['tipo_agente'] ?? ''; 
        $this -> usuario = $args['usuario'] ?? ''; 
        $this -> clave = $args['clave'] ?? ''; 
        $this -> rol = $args['rol'] ?? ''; 
    }


    // validar el login de usuarios

    public function validarLogin(){

        if(!$this -> usuario){
            self::$alertas['error'] [] = 'El Usuario es Obligatorio';
        }

        if(!$this -> clave){
            self::$alertas['error'] [] = 'La Contraseña es Obligatoria';
        }

        return self::$alertas;
    }




}