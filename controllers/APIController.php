<?php 

namespace Controllers;

use Model\Agente;
use Model\Proyectos;
use Model\Ventas;

class APIController {

    public static function informacion_agentes (){
        $agentes = Agente::all();
        echo json_encode($agentes);
    }

    public static function informacion_proyectos (){
        $proyecto = Proyectos::all();
        echo json_encode( $proyecto);
    }

    
    public static function informacion_ventas (){
        $ventas = Ventas::all();
        echo json_encode( $ventas);
    }


 
}