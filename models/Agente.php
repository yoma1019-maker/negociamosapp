<?php

namespace Model;

    class Agente extends ActiveRecord{

        public $id;
        public $fecha;
        public $cedula;
        public $nombre;
        public $celular;
        public $email;
        public $nacimiento;
        public $direccion;
        public $barrio;
        public $usuario;
        public $clave;
        public $id_categoria;
        public $id_rol ;


    protected static $tabla = 'agentes';
    protected static $columnasDB = ['id', 'fecha', 'cedula', 'nombre',  'celular', 'email', 'nacimiento', 'direccion', 
    'barrio', 'usuario', 'clave', 'id_categoria', 'id_rol'];

    public function __construct( $args = []) //crea un espejo de la base de datos
    {
        $this -> id          = $args['id'] ?? null;//si no esta presente el id sale null
        $this-> fecha       = $args['fecha'] ?? '';
        $this -> cedula      = $args['cedula'] ?? ''; 
        $this -> nombre      = $args['nombre'] ?? ''; 
        $this -> celular     = $args['celular'] ?? ''; 
        $this -> email       = $args['email'] ?? ''; 
        $this -> nacimiento  = $args['nacimiento'] ?? ''; 
        $this -> direccion   = $args['direccion'] ?? ''; 
        $this -> barrio      = $args['barrio'] ?? ''; 
        $this -> usuario     = $args['usuario'] ?? ''; 
        $this -> clave       = $args['clave'] ?? ''; 
        $this -> id_categoria = $args['id_categoria'] ?? ''; 
        $this -> id_rol      = $args['id_rol'] ?? ''; 


    }

        public function validarAgente() {

        //if (!$this->cedula) self::$alertas['error'][] = 'Cédula obligatoria';
        //if (!$this->nombre) self::$alertas['error'][] = 'Nombre obligatorio';
        //if (!$this->barrio) self::$alertas['error'][] = 'Barrio obligatorio';
        //if (!$this->id_categoria) self::$alertas['error'][] = 'Seleccione una categoría';
        //if (!$this->id_rol) self::$alertas['error'][] = 'Seleccione un rol';

        //return self::$alertas;
    }

    public function eliminar(){
    $db = self::getDB();
    $query = "DELETE FROM " . self::$tabla . " WHERE id = " . $this->id;
    $db->query($query);
}

    // ===================================
    // Método sincronizar
    // ===================================
    public function sincronizar($args = []) {
        $campos = [
            'fecha', 'cedula', 'nombre', 'celular', 'email', 'nacimiento', 'direccion',
            'barrio', 'usuario', 'direccion', 'barrio', 'usuario', 'clave', 
            'id_categoria', 'id_rol'];

        foreach ($campos as $campo) {
            if (array_key_exists($campo, $args)) {
                $this->$campo = $args[$campo];
            }
        }

        // Si no viene fecha en $args, asigna la fecha actual
            if (empty($this->fecha)) {
                $this->fecha = date('Y-m-d');
            }
    }

        public static function paginar($limit, $offset) {
                $db = self::getDB(); // mysqli

                // Aseguramos que sean enteros para evitar inyección SQL
                $limit = (int)$limit;
                $offset = (int)$offset;

                $query = "SELECT a.id, a.fecha, a.cedula, a.nombre, a.celular, a.email, a.nacimiento,
                                a.direccion, a.barrio, a.usuario, a.clave,
                                c.categoria AS categoria_nombre,
                                r.roles AS rol_nombre
                        FROM agentes a
                        LEFT JOIN categoriaagente c ON a.id_categoria = c.id_categoriaagente
                        LEFT JOIN rol_personal r ON a.id_rol = r.id_rol
                        ORDER BY a.id ASC
                        LIMIT $limit OFFSET $offset";

                $resultado = $db->query($query);

                if(!$resultado) {
                    die("Error en la consulta: " . $db->error);
                }

               // Convertir cada fila a objeto
                $agentes = [];
                while($row = $resultado->fetch_assoc()) {
                    $agentes[] = (object)$row;
                }

                return $agentes;
}

            


    }