<?php 

namespace Controllers;

use Classes\Paginacion;
use Model\Agente;
use Model\Proyectos;
use Model\Ventas;
use Model\ListadoProyectos;
use Model\estadoVentas;
use Model\Clientes;
use Model\Proyeccion;
use MVC\Router;




class DashboardController {

//VISTAS DEL DASHBOARD
    public static function index (Router $router){

        session_start(); // se debe iniciar la sesion para validar
        isAuth(); //protege el dashboar

        $router -> render('dashboard/index', [ //vista apenas se inicie sesion
                'titulo' => 'Bienvenidos'
        ]);
    }


    public static function agenda(Router $router){
        session_start();
         isAuth(); 
        $router -> render('dashboard/agenda', [
            'titulo' => 'Agenda'
        ]);
    }

    public static function proyectos(Router $router){
        session_start();
         isAuth(); 
        $router -> render('dashboard/proyectos', [
            'titulo' => 'Proyectos'
        ]);
    }

    public static function clientes(Router $router){
        session_start();
        $router -> render('dashboard/clientes', [
            'titulo' => 'Clientes'
        ]);
    }

    public static function ventas(Router $router){
        session_start();
        $router -> render('dashboard/ventas', [
            'titulo' => 'Ventas'
        ]);
    }

    public static function cartera(Router $router){
        session_start();
        $router -> render('dashboard/cartera', [
            'titulo' => 'Cartera'
        ]);
    }

    public static function parametros(Router $router){
        session_start();
        isAuth();

        $router -> render('dashboard/parametros', [
            'titulo' => 'Parametros'
        ]);
    }

    public static function seguridad(Router $router){
        session_start();
        $router -> render('dashboard/seguridad', [
            'titulo' => 'Seguridad'
        ]);
    }
    
//INFORMACION LISTADO DE PRECIOS DE LOS PROYECTOS

    public static function informacion_proyectos(Router $router){
        session_start();
        isAuth();

        //paginacion
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        
        if(!$pagina_actual || $pagina_actual < 1){
            header('Location: /informacion_proyectos?page=1');
            exit;
        }

        $registro_por_pagina = 20;
        $total = Proyectos::total();
        $paginacion = new Paginacion($pagina_actual, $registro_por_pagina, $total);

        if($paginacion-> total_paginas() < $pagina_actual){
            header('Location: /informacion_proyectos?page=1');
            exit;
        }
 
        //consultar la base de datos
         $proyectos = Proyectos::paginar($registro_por_pagina, $paginacion->offset());
         
    

         $router -> render('dashboard/informacion_proyectos', [
            'titulo' => 'Proyectos',
            'proyectos' => $proyectos, //nombre como esta 
            'paginacion' => $paginacion->paginacion(),
        ]);
    }

//INFORMACION LISTADO NOMBRE DE LOS PROYECTOS
    public static function listado_proyectos(Router $router){
        session_start();
        isAuth();

        //paginacion
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        
        if(!$pagina_actual || $pagina_actual < 1){
            header('Location: /listado_proyectos?page=1');
            exit;
        }

        $registro_por_pagina = 20;
        $total = ListadoProyectos::total();
        $paginacion = new Paginacion($pagina_actual, $registro_por_pagina, $total);

        if($paginacion-> total_paginas() < $pagina_actual){
            header('Location: /listado_proyectos?page=1');
            exit;
        }
 
        //consultar la base de datos
         $listadoProyectos = ListadoProyectos::paginar($registro_por_pagina, $paginacion->offset());
         
         $options = self::getProyectosOptions();


         $router -> render('dashboard/listado_proyectos', [
            'titulo' => 'Listado Proyectos',
            'listadoProyectos' => $listadoProyectos, //nombre como esta 
            'paginacion' => $paginacion->paginacion(),
            'options' => $options,
        ]);
    }


//INFORMACION LISTADO ESTADO DE LAS VENTAS
    public static function estado_ventas(Router $router){
        session_start();
        isAuth();

        //paginacion
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        
        if(!$pagina_actual || $pagina_actual < 1){
            header('Location: /estado_ventas?page=1');
            exit;
        }

        $registro_por_pagina = 20;
        $total = estadoVentas::total();
        $paginacion = new Paginacion($pagina_actual, $registro_por_pagina, $total);

        if($paginacion-> total_paginas() < $pagina_actual){
            header('Location: /estado_ventas?page=1');
            exit;
        }
 
        //consultar la base de datos
         $estadoVentas = EstadoVentas::paginar($registro_por_pagina, $paginacion->offset());

         $options = self::getEstadoVentasOptions();


         $router -> render('dashboard/estado_ventas', [
            'titulo' => 'Estado Ventas',
            'estadoVentas' => $estadoVentas, //nombre como esta 
            'paginacion' => $paginacion->paginacion(),
            'options' => $options,
        ]);
    }
// SELECCIONAR LISTADO PROYECTOS

        public static function getProyectosOptions() {
            
            global $db; // Accede a la conexión global
            // Consulta a la tabla para obtener las opciones
            $stmt = $db->prepare('SELECT nombre FROM listadoProyectos');
            $stmt->execute();

        // Obtener los resultados
            $result = $stmt->get_result();

            // Obtener todos los resultados como un arreglo
            $options = $result->fetch_all(MYSQLI_ASSOC);

            // Devolver las opciones
            return $options;
        }

 // SELECCIONAR ESTADO DE LAS VENTAS

        public static function getEstadoVentasOptions() {

            global $db; // Accede a la conexión global
            // Consulta a la tabla para obtener las opciones
            $stmt2 = $db->prepare('SELECT id, estado FROM estadoventas');
            $stmt2->execute();

        // Obtener los resultados
            $result2 = $stmt2->get_result();

            // Obtener todos los resultados como un arreglo
            $options2 = $result2->fetch_all(MYSQLI_ASSOC);

            // Devolver las opciones
            return $options2;
        }

// SELECCIONAR AGENTES

        public static function getAgentesOptions() {

            global $db; // Accede a la conexión global
            // Consulta a la tabla para obtener las opciones
            $stmt3 = $db->prepare('SELECT id, nombre FROM agentes');
            $stmt3->execute();

        // Obtener los resultados
            $result3 = $stmt3->get_result();

            // Obtener todos los resultados como un arreglo
            $options3 = $result3->fetch_all(MYSQLI_ASSOC);

            // Devolver las opciones
            return $options3;
        }

// SELECCIONAR CIUDADES

        public static function getCiudadesOptions() {

            global $db; // Accede a la conexión global
            // Consulta a la tabla para obtener las opciones
            $stmt4 = $db->prepare('SELECT id, ciudad FROM ciudad');
            $stmt4->execute();

        // Obtener los resultados
            $result4 = $stmt4->get_result();

            // Obtener todos los resultados como un arreglo
            $options4 = $result4->fetch_all(MYSQLI_ASSOC);

            // Devolver las opciones
            return $options4;
        }

// SELECCIONAR DEPARTAMENTOS

        public static function getDepartamentosOptions() {

            global $db; // Accede a la conexión global
            // Consulta a la tabla para obtener las opciones
            $stmt5 = $db->prepare('SELECT id, depto FROM departamentos');
            $stmt5->execute();

        // Obtener los resultados
            $result5 = $stmt5->get_result();

            // Obtener todos los resultados como un arreglo
            $options5 = $result5->fetch_all(MYSQLI_ASSOC);

            // Devolver las opciones
            return $options5;
        }

// SELECCIONAR PAISES

        public static function getPaisesOptions() {

            global $db; // Accede a la conexión global
            // Consulta a la tabla para obtener las opciones
            $stmt6 = $db->prepare('SELECT id, pais FROM pais');
            $stmt6->execute();

        // Obtener los resultados
            $result6 = $stmt6->get_result();

            // Obtener todos los resultados como un arreglo
            $options6 = $result6->fetch_all(MYSQLI_ASSOC);

            // Devolver las opciones
            return $options6;
        }


// SELECCIONAR PROYECTO
        public static function buscarProyecto() {
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $proyecto = $_POST['proyecto'] ?? '';
                $lote = $_POST['lote'] ?? '';

                if (!$proyecto || !$lote) {
                    echo json_encode(['error' => 'Faltan datos']);
                    return;
                }

                $fila = Proyectos::whereArray([
                    'proyecto' => $proyecto,
                    'lote' => $lote
                ]);

                if (!$fila) {
                    echo json_encode(['error' => 'Proyecto o lote no encontrados']);
                    return;
                }

                header('Content-Type: application/json');
                echo json_encode([
                    "aream" => $fila["aream"] ?? '',
                    "valor_total" => $fila["valor_total"] ?? '',
                    "porcen_inicial" => $fila["porcen_inicial"] ?? '',
                    "cuota_inicial" => $fila["cuota_inicial"] ?? '',
                    "valor_restante" => $fila["valor_restante"] ?? '',
                    "valor_cuotas" => $fila["valor_cuotas"] ?? '',
                    "cuotas" => $fila["cuotas"] ?? '',
                    "etapa" => $fila["etapa"] ?? '',
                    "estado" => $fila["estado"] ?? '',
                ]);
            }
        }


// INFORMACION y FORMULARIO DE LAS VENTAS
    public static function formulario_ventas(Router $router){
        
        session_start();
        isAuth();
        $alertas = []; 
        $ventas = new Ventas;

            if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //echo "<pre>";
         // var_dump($_POST);
          //echo "</pre>";  
          //exit; // detener ejecución para ver resultado
        
        
            $data = $_POST;

            // Crear objeto Ventas y sincronizar datos
            $venta = new Ventas();
            $venta->sincronizar($data);


            // Guardar solo la primera cuota en valcuota_inicial
            if (isset($data['valcuota_inicial1'])) {
            $data['valcuota_inicial1'] = $data['valcuota_inicial1'];
            }

            if (isset($data['feccuota_inicial1'])) {
                $data['feccuota_inicial1'] = $data['feccuota_inicial1'];
            }

            if (isset($data['valcuota_restante1'])) {
                $data['valcuota_restante1'] = $data['valcuota_restante1'];
            }

            if (isset($data['feccuota_restante1'])) {
                $data['feccuota_restante1'] = $data['feccuota_restante1'];
            }

            // Archivos subidos vía AJAX
  
                $ventas->doc_separacion = $_FILES['doc_separacion']['name'] ?? '';

                // Fecha automática si está vacía
                if (empty($venta->fecha)) {
                    $venta->fecha = date('Y-m-d');
                }

                // Validación
                $alertas = $venta->validarVentas();

                if(empty($alertas)){
                    // Guardar en la base de datos
                    $venta->guardar();

                    // Redirigir
                    header('Location: /informacion_ventas?page=1');
                    exit;
                } 
            }

            $dashboardController = new self();
            $options = $dashboardController->getProyectosOptions();
            $options2 = $dashboardController->getEstadoVentasOptions();
            $options3 = $dashboardController->getAgentesOptions();
            $options4 = $dashboardController->getCiudadesOptions();
            $options5 = $dashboardController->getDepartamentosOptions();
            $options6 = $dashboardController->getPaisesOptions();

            $router->render('dashboard/formulario_ventas', [
                'venta' => $ventas,
                'alertas' => $alertas,
                'titulo' => 'Crear Ventas',
                'options' => $options,
                'options2' => $options2,
                'options3' => $options3,
                'options4' => $options4,
                'options5' => $options5,
                'options6' => $options6,
            ]);
        }

    public static function informacion_ventas(Router $router){
        session_start();
        isAuth();

        // ===== POST: guardar formulario =====
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // echo "<pre>";
            //var_dump($_POST);
            //echo "</pre>";  
            //exit; // detener ejecución para ver resultado
            $data = $_POST;

            // Solo guardar cuota1 como valcuota_inicial
                if (isset($data['valcuota_inicial1'])) {$data['valcuota_inicial1'] = $data['valcuota_inicial1'];}
                if (isset($data['feccuota_inicial1'])) {$data['feccuota_inicial1'] = $data['feccuota_inicial1'];}
                if (isset($data['valcuota_restante1'])){$data['valcuota_restante1'] = $data['valcuota_restante1'];}
                if (isset($data['feccuota_restante1'])) {$data['feccuota_restante1'] = $data['feccuota_restante1'];}

                // Elimina 'fecha' si existe en $_POST o está vacío
                if (isset($_POST['fecha']) && trim($_POST['fecha']) === '') {unset($_POST['fecha']);}

                // Capturar fechas de las cuotas para evitar errores de MySQL
                for ($i = 1; $i <= 48; $i++) {
                $_POST["feccuota_restante$i"] = !empty($_POST["feccuota_restante$i"]) ? $_POST["feccuota_restante$i"] : null;
                }

                for ($i = 1; $i <= 6; $i++) {
                $_POST["fecha_extras$i"] = !empty($_POST["fecha_extras$i"]) ? $_POST["fecha_extras$i"] : null;
                }
            
            $cliente_id = $_POST['cliente_id'] ?? null;

                // Datos del cliente
                $datosCliente = [
                    'nombre'         => $_POST['nombre'] ?? '',
                    'nacimiento'     => $_POST['nacimiento'] ?? null,
                    'c_nacimiento'   => $_POST['c_nacimiento'] ?? null,
                    'sexo'           => $_POST['sexo'] ?? null,
                    't_documento'    => $_POST['t_documento'] ?? null,
                    'otro_doc'       => $_POST['otro_doc'] ?? '',
                    'cedula'         => $_POST['cedula'] ?? '',
                    'expedicion'     => $_POST['expedicion'] ?? null,
                    'lugarexp'       => $_POST['lugarexp'] ?? '',
                    'celular'        => $_POST['celular'] ?? '',
                    'celular2'       => $_POST['celular2'] ?? '',
                    'civil'          => $_POST['civil'] ?? '',
                    'nacionalidad'   => $_POST['nacionalidad'] ?? '',
                    'otro_nac'       => $_POST['otro_nac'] ?? '',
                    'direccion'      => $_POST['direccion'] ?? '',
                    'ciudad'         => $_POST['ciudad'] ?? '',
                    'departamento'   => $_POST['departamento'] ?? '',
                    'pais'           => $_POST['pais'] ?? '',
                    'email'          => $_POST['email'] ?? '',
                    'cedula1'        => $_POST['cedula1'] ?? '',
                    'cedula2'        => $_POST['cedula2'] ?? '',
     
                ];

                // ✅ Si existe cliente, actualizar
                if ($cliente_id) {
                    $cliente = Clientes::find($cliente_id);
                    if ($cliente) {
                        $cliente->sincronizar($datosCliente);
                        $cliente->guardar(); // update
                    }
                } else {
                    // ✅ Si no existe, crear uno nuevo
                    $cliente = new Clientes($datosCliente);
                    $cliente->guardar(); // insert
                    $cliente_id = $cliente->id; // obtener nuevo id
                }
                    // ===== 3. Crear la venta con cliente_id seguro =====
                    $ventas = new Ventas();
                    $ventas->sincronizar($data);
                    
                // ✅ Asignar correctamente el agente seleccionado
                if (isset($data['agentes']['principal'])) {
                    $ventas->agente_id = $data['agentes']['principal'];
                }

                // ✅ Asociar el cliente creado o actualizado
                $ventas->cliente_id = $cliente->id ?? null;


            
                $ventas->doc_separacion = $_FILES['doc_separacion']['name'] ?? '';

                if (empty($ventas->fecha)) {
                $ventas->fecha = date('Y-m-d');  // Guarda fecha de hoy automáticamente
                }

                
                
            $ventas->limpiarCamposMoneda();
            // Guardar en DB
            $ventas->guardar();

            

            // Respuesta JSON
            echo json_encode(["ok" => true, "id" => $ventas->id]);
            exit;
            }

            // ===== GET: listar ventas con paginación =====
            $pagina_actual = $_GET['page'] ?? 1;
            $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

            if(!$pagina_actual || $pagina_actual < 1){
                header('Location: /informacion_ventas?page=1');
                exit;
            }

            $registro_por_pagina = 20;
            $total = Ventas::total();
            $paginacion = new Paginacion($pagina_actual, $registro_por_pagina, $total);

            if($paginacion->total_paginas() < $pagina_actual){
                header('Location: /informacion_ventas?page=1');
                exit;
            }

            // Consultar la base de datos
            $ventas = Ventas::paginar($registro_por_pagina, $paginacion->offset());

            $router->render('dashboard/informacion_ventas', [
                'titulo' => 'Ventas',
                'ventas' => $ventas,
                'paginacion' => $paginacion->paginacion(),
            ]);
        }

// INFORMACION Y FORMULARIOS DE LOS AGENTES

    public static function informacion_agente(Router $router){
        session_start();
        isAuth();

        //paginacion
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        
        if(!$pagina_actual || $pagina_actual < 1){
            header('Location: /informacion_agente?page=1');
            exit;
        }

        $registro_por_pagina = 20;
        $total = Agente::total();
        $paginacion = new Paginacion($pagina_actual, $registro_por_pagina, $total);

        if($paginacion-> total_paginas() < $pagina_actual){
            header('Location: /informacion_agente?page=1');
            exit;
        }
    
        //consultar la base de datos
         $agente =Agente::paginar($registro_por_pagina, $paginacion->offset());

        $router -> render('dashboard/informacion_agente', [
            'titulo' => 'Agentes',
            'agente' => $agente,
            'paginacion' => $paginacion->paginacion()
        ]);
    }
     

    public static function formulario_agente(Router $router){
        
        session_start();
        isAuth();
        $alertas = []; 
        $agente = new Agente;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $agente -> sincronizar($_POST);
            
            //validacion
            $alertas = $agente -> validarAgente();

            if(empty($alertas)){

              // almacenar perfil
              //$agente -> perfilid = $_SESSION['id'];

              //guardar proyecto
               $agente -> guardar(); 

              //redireccionar
               header('Location: /informacion_agente?=1');
               exit;
            } 
         }
        
        $router -> render('dashboard/formulario_agente', [
            'agente' => $agente,
            'alertas' => $alertas,
            'titulo' => 'Crear Agentes'
            
        ]);
    }

// INFORMACION Y FORMULARIOS DE LOS CLIENTES

    public static function informacion_clientes(Router $router){
        session_start();
        isAuth();

        //paginacion
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        
        if(!$pagina_actual || $pagina_actual < 1){
            header('Location: /informacion_clientes?page=1');
            exit;
        }

        $registro_por_pagina = 20;
        $total = Clientes::total();
        $paginacion = new Paginacion($pagina_actual, $registro_por_pagina, $total);

        if($paginacion-> total_paginas() < $pagina_actual){
            header('Location: /informacion_clientes?page=1');
            exit;
        }
    
        //consultar la base de datos
         $cliente = Clientes::paginar($registro_por_pagina, $paginacion->offset());
        
        $router -> render('dashboard/informacion_clientes', [
            'titulo' => 'Clientes',
            'clientes' => $cliente,
            'paginacion' => $paginacion->paginacion()
            
        ]);
    }
     

    public static function formulario_clientes(Router $router){
        
        session_start();
        isAuth();
        $alertas = []; 
        $cliente = new Clientes;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $cliente -> sincronizar($_POST);

            //validacion
            //$alertas = $cliente -> validarCliente();

            if(empty($alertas)){

              // almacenar perfil
              //$cliente -> perfilid = $_SESSION['id'];
             
              //guardar proyecto
               $cliente -> guardar();
                 
                
              //redireccionar
               header('Location: /informacion_clientes?=1');
               exit;
            } 
         }
        $dashboardController = new self();
        $options3 = $dashboardController->getAgentesOptions();
        $options4 = $dashboardController->getCiudadesOptions();

        $router -> render('dashboard/formulario_clientes', [
            'cliente' => $cliente,
            'alertas' => $alertas,
            'titulo' => 'Crear Clientes',
            'options3' => $options3,
            'options4' => $options4,

        ]);
    }


// SECCION BUSCAR CLIENTE
        public static function buscarCliente() {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre  = trim($_POST['nombre'] ?? '');
                $email  = trim($_POST['email'] ?? '');
                $celular = trim($_POST['celular'] ?? '');

                if (!$nombre && !$email && !$celular) {
                    echo json_encode(['error' => 'Debe ingresar al menos un filtro']);
                    return;
                }

                // Construir condiciones dinámicas
                $condiciones = [];
                if ($nombre)  $condiciones['nombre']  = $nombre;
                if ($email)  $condiciones['email']  = $email;
                if ($celular) $condiciones['celular'] = $celular;

                // Retornar lista de coincidencias
                $clientes = Clientes::whereArrayOrAll($condiciones);

                if (!$clientes || count($clientes) === 0) {
                    echo json_encode(['error' => 'Cliente no encontrado']);
                    return;
                }

                header('Content-Type: application/json');
                echo json_encode($clientes);
                exit;
            }
        }


















    }
















