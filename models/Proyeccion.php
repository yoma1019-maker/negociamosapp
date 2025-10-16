<?php
namespace Model;




class Proyeccion extends ActiveRecord {

public $id;
    public $fecha;
    public $cliente_id;
    public $agente_id;
    public $proyecto;
    public $lote;
    public $etapa;
    public $aream;
    public $valor_aream;
    public $estado;
    public $valor_total;
    public $descuento;
    public $valor_venta;
    public $obserdescu;
    public $cuota_inicial;
    public $separacion;
    public $doc_separacion;
    public $saldo_inicial;
    public $numcuota_inicial;
    public $valcuota_inicial1;
    public $valcuota_inicial2;
    public $valcuota_inicial3;
    public $valcuota_inicial4;
    public $valcuota_inicial5;
    public $valcuota_inicial6;
    public $valcuota_inicial7;
    public $valcuota_inicial8;
    public $valcuota_inicial9;
    public $valcuota_inicial10;
    public $valcuota_inicial11;
    public $valcuota_inicial12;

    public $feccuota_inicial1;
    public $feccuota_inicial2;
    public $feccuota_inicial3;
    public $feccuota_inicial4;
    public $feccuota_inicial5;
    public $feccuota_inicial6;
    public $feccuota_inicial7;
    public $feccuota_inicial8;
    public $feccuota_inicial9;
    public $feccuota_inicial10;
    public $feccuota_inicial11;
    public $feccuota_inicial12;

    public $valor_restante;
    public $numcuota_restante;

    public $valcuota_restante1;
    public $valcuota_restante2;
    public $valcuota_restante3;
    public $valcuota_restante4;
    public $valcuota_restante5;
    public $valcuota_restante6;
    public $valcuota_restante7;
    public $valcuota_restante8;
    public $valcuota_restante9;
    public $valcuota_restante10;
    public $valcuota_restante11;
    public $valcuota_restante12;
    public $valcuota_restante13;
    public $valcuota_restante14;
    public $valcuota_restante15;
    public $valcuota_restante16;
    public $valcuota_restante17;
    public $valcuota_restante18;
    public $valcuota_restante19;
    public $valcuota_restante20;
    public $valcuota_restante21;
    public $valcuota_restante22;
    public $valcuota_restante23;
    public $valcuota_restante24;
    public $valcuota_restante25;
    public $valcuota_restante26;
    public $valcuota_restante27;
    public $valcuota_restante28;
    public $valcuota_restante29;
    public $valcuota_restante30;
    public $valcuota_restante31;
    public $valcuota_restante32;
    public $valcuota_restante33;
    public $valcuota_restante34;
    public $valcuota_restante35;
    public $valcuota_restante36;
    public $valcuota_restante37;
    public $valcuota_restante38;
    public $valcuota_restante39;
    public $valcuota_restante40;
    public $valcuota_restante41;
    public $valcuota_restante42;
    public $valcuota_restante43;
    public $valcuota_restante44;
    public $valcuota_restante45;
    public $valcuota_restante46;
    public $valcuota_restante47;
    public $valcuota_restante48;
    public $feccuota_restante1;
    public $feccuota_restante2;
    public $feccuota_restante3;
    public $feccuota_restante4;
    public $feccuota_restante5;
    public $feccuota_restante6;
    public $feccuota_restante7;
    public $feccuota_restante8;
    public $feccuota_restante9;
    public $feccuota_restante10;
    public $feccuota_restante11;
    public $feccuota_restante12;
    public $feccuota_restante13;
    public $feccuota_restante14;
    public $feccuota_restante15;
    public $feccuota_restante16;
    public $feccuota_restante17;
    public $feccuota_restante18;
    public $feccuota_restante19;
    public $feccuota_restante20;
    public $feccuota_restante21;
    public $feccuota_restante22;
    public $feccuota_restante23;
    public $feccuota_restante24;
    public $feccuota_restante25;
    public $feccuota_restante26;
    public $feccuota_restante27;
    public $feccuota_restante28;
    public $feccuota_restante29;
    public $feccuota_restante30;
    public $feccuota_restante31;
    public $feccuota_restante32;
    public $feccuota_restante33;
    public $feccuota_restante34;
    public $feccuota_restante35;
    public $feccuota_restante36;
    public $feccuota_restante37;
    public $feccuota_restante38;
    public $feccuota_restante39;
    public $feccuota_restante40;
    public $feccuota_restante41;
    public $feccuota_restante42;
    public $feccuota_restante43;
    public $feccuota_restante44;
    public $feccuota_restante45;
    public $feccuota_restante46;
    public $feccuota_restante47;
    public $feccuota_restante48;
    public $estado_lote;

    // 🔹 Relaciones
    public $cliente_nombre;
    public $cliente_email;
    public $cliente_telefono;
    public $agente_nombre;
    public $agente_email;
    public $agente_celular;

    protected static $tabla = 'ventas'; // la proyección se genera desde ventas

    protected static $columnasDB = [
        'id',
        'fecha',
        'cliente_id',
        'agente_id',
        'proyecto',
        'lote',
        'etapa',
        'aream',
        'valor_aream',
        'estado',
        'valor_total',
        'descuento',
        'valor_venta',
        'obserdescu',
        'cuota_inicial',
        'separacion',
        'doc_separacion',
        'saldo_inicial',
        'numcuota_inicial',
        'valcuota_inicial1', 'valcuota_inicial2', 'valcuota_inicial3', 'valcuota_inicial4', 'valcuota_inicial5',
        'valcuota_inicial6', 'valcuota_inicial7', 'valcuota_inicial8', 'valcuota_inicial9', 'valcuota_inicial10',
        'valcuota_inicial11', 'valcuota_inicial12', 
        'feccuota_inicial1', 'feccuota_inicial2', 'feccuota_inicial3', 'feccuota_inicial4', 'feccuota_inicial5',
        'feccuota_inicial6', 'feccuota_inicial7', 'feccuota_inicial8', 'feccuota_inicial9', 'feccuota_inicial10',
        'feccuota_inicial11', 'feccuota_inicial12',
        'valor_restante',
        'numcuota_restante',
        'valcuota_restante1', 'valcuota_restante2', 'valcuota_restante3', 'valcuota_restante4', 'valcuota_restante5',
        'valcuota_restante6', 'valcuota_restante7', 'valcuota_restante8', 'valcuota_restante9', 'valcuota_restante10',
        'valcuota_restante11', 'valcuota_restante12', 'valcuota_restante13', 'valcuota_restante14', 'valcuota_restante15',
        'valcuota_restante16', 'valcuota_restante17', 'valcuota_restante18', 'valcuota_restante19', 'valcuota_restante20',
        'valcuota_restante21', 'valcuota_restante22', 'valcuota_restante23', 'valcuota_restante24', 'valcuota_restante25',
        'valcuota_restante26', 'valcuota_restante27', 'valcuota_restante28', 'valcuota_restante29', 'valcuota_restante30',
        'valcuota_restante31', 'valcuota_restante32', 'valcuota_restante33', 'valcuota_restante34', 'valcuota_restante35',
        'valcuota_restante36', 'valcuota_restante37', 'valcuota_restante38', 'valcuota_restante39', 'valcuota_restante40',
        'valcuota_restante41', 'valcuota_restante42', 'valcuota_restante43', 'valcuota_restante44', 'valcuota_restante45',
        'valcuota_restante46', 'valcuota_restante47', 'valcuota_restante48',
        'feccuota_restante1', 'feccuota_restante2', 'feccuota_restante3', 'feccuota_restante4', 'feccuota_restante5',
        'feccuota_restante6', 'feccuota_restante7', 'feccuota_restante8', 'feccuota_restante9', 'feccuota_restante10',
        'feccuota_restante11', 'feccuota_restante12', 'feccuota_restante13', 'feccuota_restante14', 'feccuota_restante15',
        'feccuota_restante16', 'feccuota_restante17', 'feccuota_restante18', 'feccuota_restante19', 'feccuota_restante20',
        'feccuota_restante21', 'feccuota_restante22', 'feccuota_restante23', 'feccuota_restante24', 'feccuota_restante25',
        'feccuota_restante26', 'feccuota_restante27', 'feccuota_restante28', 'feccuota_restante29', 'feccuota_restante30',
        'feccuota_restante31', 'feccuota_restante32', 'feccuota_restante33', 'feccuota_restante34', 'feccuota_restante35',
        'feccuota_restante36', 'feccuota_restante37', 'feccuota_restante38', 'feccuota_restante39', 'feccuota_restante40',
        'feccuota_restante41', 'feccuota_restante42', 'feccuota_restante43', 'feccuota_restante44', 'feccuota_restante45',
        'feccuota_restante46', 'feccuota_restante47', 'feccuota_restante48',
        'estado_lote'
    ];

    // 🔹 Método adicional para traer la info completa del cliente y del agente
    public static function obtenerConRelacion($id) {
    $query = "SELECT 
                v.*, 
                c.nombre AS cliente_nombre,
                c.cedula AS cliente_cedula,
                c.celular AS cliente_telefono,  /* revisa si tu columna es celular o telefono */
                c.email AS cliente_email,
                c.direccion AS cliente_direccion,
                c.ciudad AS cliente_ciudad,
                a.nombre AS agente_nombre,
                a.email AS agente_email,
                a.celular AS agente_celular
              FROM ventas v
              LEFT JOIN clientes c ON c.id = v.cliente_id
              LEFT JOIN agentes a ON a.id = v.agente_id
              WHERE v.id = {$id}
              LIMIT 1";
    $resultado = self::consultarSQL($query);
    if (!$resultado) return null;
    $fila = array_shift($resultado);
    return (object) $fila; // <-- importante: convertimos a objeto
}


    
}
