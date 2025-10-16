<?php
namespace Model;
class ActiveRecord {

// Base DE DATOS
        protected static $db;
        protected static $tabla = '';
        protected static $columnasDB = [];
        public $id;
        public $valor_aream;
        public $valor_total;
        public $descuento;
        public $valor_venta;
        public $cuota_inicial;
        public $separacion;
        public $direccion;
        public $email;
        public $saldo_inicial;
        public $valcuota_inicial1;
        public $valor_restante;
        public $valcuota_restante1;
        public $feccuota_inicial1;
        public $feccuota_restante1;



// Alertas y Mensajes
       protected static $alertas = [];
    
// Definir la conexión a la BD - includes/database.php
        public static function setDB($database) {
            self::$db = $database;
        }

        protected static function getDB() {
    return self::$db; // devuelve la conexión PDO almacenada
}


        public static function setAlerta($tipo, $mensaje) {
            static::$alertas[$tipo][] = $mensaje;
        }
// Validación
        public static function getAlertas() {
            return static::$alertas;
        }

        public function validar() {
            static::$alertas = [];
            return static::$alertas;
        }


    

// Registros all
            public static function all() {
                $query = "SELECT * FROM " . static::$tabla;
                 $resultado = self::consultarSQL($query);
                return $resultado;
            }

// Busca un registro por su id

            public static function find($id) {
                $id = (int)$id; // seguridad contra inyecciones
                $query = "SELECT * FROM " . static::$tabla . " WHERE id = {$id} LIMIT 1";
                $resultado = self::consultarSQL($query);
                return $resultado ? array_shift($resultado) : null;
            }
            //public static function find($id) {
                //$query = "SELECT * FROM " . static::$tabla  ." WHERE id = {$id}";
                //$resultado = self::consultarSQL($query);
                //return array_shift( $resultado ) ;
            //}

// Obtener Registro
            public static function get($limite) {
                $query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite} ORDER BY id DESC";
                $resultado = self::consultarSQL($query);
                return array_shift( $resultado );
            }

//paginar registros
        public static function paginar($registro_por_pagina, $offset) {
            $query = "SELECT * FROM " . static::$tabla . " ORDER BY id ASC LIMIT {$registro_por_pagina} OFFSET {$offset} ";
            $resultado = self::consultarSQL($query);
            return( $resultado );
        }


// Busqueda Where con Columna 
        
        public static function where($columna, $valor) {
            $valor = trim($valor);
            $query = "SELECT * FROM " . static::$tabla . " WHERE {$columna} = '{$valor}' LIMIT 1";
            $resultado = self::consultarSQL($query);
            return $resultado ? array_shift($resultado) : null;
        }
        //public static function where($columna, $valor) {
           // $query = "SELECT * FROM " . static::$tabla . " WHERE {$columna} = '{$valor}'";
           // $resultado = self::consultarSQL($query);
           // return array_shift( $resultado ) ;
        //}

//traer un total de registros
        public static function total() {
            $query = "SELECT COUNT(*) FROM " . static::$tabla;
            $resultado = self::$db ->query($query);
            $total = $resultado -> fetch_array();
            return array_shift($total);
        }


//consulta plana sql utilizar cuando los metodos del modelo no son suficientes
        public static function SQL($query) {
            $resultado = self::consultarSQL($query);
            return ( $resultado );
        }


// Busqueda todos los registros que pertenecen a un id Where con Columna 
        public static function belongsTo($columna, $valor) {
            $query = "SELECT * FROM " . static::$tabla . " WHERE {$columna} = '{$valor}'";
            $resultado = self::consultarSQL($query);
            return $resultado;
        }



// === GUARDAR ===
        public function guardar() {
        if (!is_null($this->id)) {
            return $this->actualizar(); // 🔥 ahora sí hace update
        } else {
            return $this->crear(); // insert
        }
    }

// Dlimpiar decimales
        protected function limpiarDecimal($valor) {
             if ($valor === null || $valor === '') return null;
            // Quitar símbolo de $ y espacios (incluido espacio no-break)
            $valor = str_replace(['$', ' ', "\xC2\xA0"], '', $valor);
            // Quitar separador de miles
            $valor = str_replace('.', '', $valor);
            // Cambiar coma decimal por punto
            $valor = str_replace(',', '.', $valor);
            return is_numeric($valor) ? (float)$valor : null;
        }

// crea un nuevo registro    
    protected function crear() {
    // ===== Limpiar campos DECIMAL =====
        $decimales = [
            'valor_aream', 'valor_total', 'descuento', 'valor_venta',
            'cuota_inicial', 'separacion', 'saldo_inicial',
            'valcuota_inicial1', 'valor_restante', 'valcuota_restante1'
        ];

            foreach ($decimales as $campo) {
                if (isset($this->$campo)) {
                    $this->$campo = $this->limpiarDecimal($this->$campo);
                }
            }

            // ===== Obtener atributos listos =====
            $atributos = $this->atributos();
                
            //echo "<pre>";
            //var_dump($atributos);
            //echo "</pre>";  
            //exit; // detener ejecución para ver resultado
                
            unset($atributos['id']); // ignorar id autoincremental

            $campos = array_keys($atributos);
            $placeholders = implode(',', array_fill(0, count($campos), '?'));

            

            $sql = "INSERT INTO " . static::$tabla . " (" . implode(', ', $campos) . ") VALUES ($placeholders)";
 
            $stmt = self::$db->prepare($sql);
            if (!$stmt) {
                throw new \Exception("Error en prepare(): " . self::$db->error);
            }

            // ===== Armar tipos y valores dinámicos =====
            $tipos = '';
            $valores = [];
            foreach ($atributos as $key => $valor) {
                // Normalizar fechas vacías a null
                if ($valor === '' && preg_match('/fecha|nacimiento|expedicion/i', $key)) {
                    $valor = null;
                }

                if (is_null($valor)) {
                    $tipos .= 's'; // NULL se trata como string
                    $valores[] = null;
                } elseif (is_int($valor)) {
                    $tipos .= 'i';
                    $valores[] = $valor;
                } elseif (is_float($valor)) {
                    $tipos .= 'd';
                    $valores[] = $valor;
                } else {
                    $tipos .= 's';
                    $valores[] = $valor;
                }
        }
                $stmt->bind_param($tipos, ...$valores);

                $resultado = $stmt->execute();
                if (!$resultado) {
                    throw new \Exception("Error en execute(): " . $stmt->error);
                }

                $this->id = $stmt->insert_id;
                $stmt->close();

                    return true;
    }


// Actualizar un registro
    public function actualizar() {
    // Sanitizar los datos
    $atributos = $this->sanitizarAtributos();

    // Iterar para ir agregando cada campo de la BD
    $valores = [];
    foreach($atributos as $key => $value) {
        // 🚀 $value ya viene con comillas o NULL o número listo
        $valores[] = "{$key}={$value}";
    }

    $query = "UPDATE " . static::$tabla ." SET ";
    $query .=  join(', ', $valores );
    $query .= " WHERE id = " . intval($this->id) . " LIMIT 1";

    $resultado = self::$db->query($query);
    return $resultado;
}


// Eliminar un registro - Toma el ID de Active Record
        public function eliminar() {
            $query = "DELETE FROM "  . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
            $resultado = self::$db->query($query);
            return $resultado;
        }
//consultar
            public static function consultarSQL($query) {
            // Consultar la base de datos
            $resultado = self::$db->query($query);

            // Iterar los resultados
            $array = [];
            while($registro = $resultado->fetch_assoc()) {
                $array[] = static::crearObjeto($registro);
            }

            // liberar la memoria
            $resultado->free();

            // retornar los resultados
            return $array;
        }

//crear objeto
        protected static function crearObjeto($registro) {
            $objeto = new static;

            foreach($registro as $key => $value ) {
                if(property_exists( $objeto, $key  )) {
                    $objeto->$key = $value;
                }
            }

            return $objeto;
        }



// Identificar y unir los atributos de la BD
        public function atributos() {
    $atributos = [];

    // Lista de columnas DECIMAL (ajústala según tu tabla real)
    $decimales = [
        'valor_aream', 'valor_total', 'descuento', 'valor_venta',
        'cuota_inicial', 'separacion', 'saldo_inicial',
        'valcuota_inicial1', 'valcuota_restante1',
        'valor_restante', 'valcuota_inicial', 'valcuota_restante',
        'numcuota_inicial', 'numcuota_restante',
        // agrega más si en tu tabla hay otras DECIMAL
    ];

    foreach(static::$columnasDB as $columna) {
        if ($columna === 'id') continue;

        $valor = $this->$columna ?? null;

        // 🔥 Si es DECIMAL y viene como string → limpiar
        if (in_array($columna, $decimales) && is_string($valor)) {
            $valor = $this->limpiarDecimal($valor);
        }

        // 🔥 Si es campo DATE vacío → guardar como NULL
        if ($valor === '' && preg_match('/fecha|fec|nacimiento|expedicion/i', $columna)) {
            $valor = null;
        }

        // 🔥 Si cualquier otro valor está vacío → guardar como NULL
        if ($valor === '') {
            $valor = null;
        }

        $atributos[$columna] = $valor;
    }

    return $atributos;
}




//sanitizar
   public function sanitizarAtributos() {
    $atributos = $this->atributos();
    $sanitizado = [];
    foreach($atributos as $key => $value) {
        if ($value === null) {
            $sanitizado[$key] = "NULL"; // 🔥 texto NULL sin comillas
        } else {
            $sanitizado[$key] = "'" . self::$db->real_escape_string($value) . "'";
        }
    }
    return $sanitizado;
}

    public function sincronizar($args=[]) { 
        foreach($args as $key => $value) {
          if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
          }
        }
    }
}