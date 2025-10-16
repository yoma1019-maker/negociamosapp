<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\APIController;
use Controllers\LoginController;
use Controllers\DashboardController;
use Controllers\ProyeccionController;
use MVC\Router;
$router = new Router();

//login 

$router -> get('/', [LoginController::class, 'login']); //Inicia sesion
$router -> post('/', [LoginController::class, 'login']);//Inicia sesion
$router -> get('/logout', [LoginController::class, 'logout']); //cierra sesion

// ZONA PROYECTOS

$router -> get('/dashboard', [DashboardController::class, 'index']);// pagina principal
$router -> get('/agenda', [DashboardController::class, 'agenda']);
$router -> get('/proyectos', [DashboardController::class, 'proyectos']);
$router -> get('/clientes', [DashboardController::class, 'clientes']);
$router -> get('/ventas', [DashboardController::class, 'ventas']);
$router -> get('/cartera', [DashboardController::class, 'cartera']);
$router -> get('/parametros', [DashboardController::class, 'parametros']);
$router -> get('/informacion_agente', [DashboardController::class, 'informacion_agente']);
$router -> post('/informacion_agente', [DashboardController::class, 'informacion_agente']);
$router -> get('/formulario_agente', [DashboardController::class, 'formulario_agente']);
$router -> post('/formulario_agente', [DashboardController::class, 'formulario_agente']);
$router -> get('/informacion_constructoras', [DashboardController::class, 'informacion_constructoras']);
$router -> post('/informacion_constructoras', [DashboardController::class, 'informacion_constructoras']);
$router -> get('/informacion_proyectos', [DashboardController::class, 'informacion_proyectos']);
$router -> post('/informacion_proyectos', [DashboardController::class, 'informacion_proyectos']);

$router -> get('/formulario_ventas', [DashboardController::class, 'formulario_ventas']);
$router -> post('/formulario_ventas', [DashboardController::class, 'formulario_ventas']);
$router -> get('/informacion_ventas', [DashboardController::class, 'informacion_ventas']);
$router -> post('/informacion_ventas', [DashboardController::class, 'informacion_ventas']);

$router -> get('/listado_proyectos', [DashboardController::class, 'listado_proyectos']);
$router -> post('/listado_proyectos', [DashboardController::class, 'listado_proyectos']);
$router -> get('/estado_ventas', [DashboardController::class, 'estado_ventas']);
$router -> post('/estado_ventas', [DashboardController::class, 'estado_ventas']);
$router->post('/dashboard/buscarProyecto', [DashboardController::class, 'buscarProyecto']);
$router->post('/dashboard/buscarCliente', [DashboardController::class, 'buscarCliente']);

$router -> get('/informacion_clientes', [DashboardController::class, 'informacion_clientes']);
$router -> post('/informacion_clientes', [DashboardController::class, 'informacion_clientes']);
$router -> get('/formulario_clientes', [DashboardController::class, 'formulario_clientes']);
$router -> post('/formulario_clientes', [DashboardController::class, 'formulario_clientes']);

$router -> get('/formulario_clientes', [DashboardController::class, 'formulario_clientes']);
$router -> post('/formulario_clientes', [DashboardController::class, 'formulario_clientes']);

$router->post('/guardar_venta', [DashboardController::class, 'guardarVenta']);

//PDF proyeccion de pagos
$router->get('/proyeccion/generarPDF', [ProyeccionController::class, 'generarPDF']);
$router->post('/proyeccion/generarPDF', [ProyeccionController::class, 'generarPDF']);

//$router->get('/proyeccion/pdf', [ProyeccionController::class, 'generarPDF']);
//$router->get('/proyeccion/vista', [ProyeccionController::class, 'vistaPrevia']);


//API De Clientes


//area administracion



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();