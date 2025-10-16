<?php

namespace Model;

class Ventas extends ActiveRecord {

    public $id;
    public $fecha;
    public $agente_id;
    public $cliente_id;
    public $proyecto;
    public $lote;
    public $etapa;
    public $aream;
    public $valor_aream;
    public $estado;
    public $porcen_restante;
    public $valor_total;
    public $descuento;
    public $valor_venta;
    public $obserdescu;
    public $porcen_inicial;
    public $cuota_inicial;
    public $separacion;
    public $saldo_inicial;
    public $doc_separacion;
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
   

    protected static $tabla = 'ventas';
    protected static $columnasDB = [
        'id', 'fecha', 'agente_id', 'cliente_id', 
        'proyecto', 'lote', 'etapa', 'aream',
        'valor_aream', 'estado', 'porcen_restante','valor_total',
        'descuento', 'valor_venta', 'obserdescu', 'porcen_inicial',
        'cuota_inicial', 'separacion', 'doc_separacion',
        'saldo_inicial', 'numcuota_inicial', 
        'valcuota_inicial1', 'valcuota_inicial2', 'valcuota_inicial3', 'valcuota_inicial4', 'valcuota_inicial5',
        'valcuota_inicial6', 'valcuota_inicial7', 'valcuota_inicial8', 'valcuota_inicial9', 'valcuota_inicial10',
        'valcuota_inicial11', 'valcuota_inicial12', 
        'feccuota_inicial1', 'feccuota_inicial2', 'feccuota_inicial3', 'feccuota_inicial4', 'feccuota_inicial5',
        'feccuota_inicial6', 'feccuota_inicial7', 'feccuota_inicial8', 'feccuota_inicial9', 'feccuota_inicial10',
        'feccuota_inicial11', 'feccuota_inicial12',
        'valor_restante', 'numcuota_restante', 
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

    public function __construct($args = []) {
        $this->id                  = $args['id'] ?? null;
        $this->fecha               = $args['fecha'] ?? date('Y-m-d');
        $this->agente_id           = $args['agente_id'] ?? '';
        $this->cliente_id          = $args['cliente_id'] ?? '';
        $this->proyecto            = $args['proyecto'] ?? '';
        $this->lote                = $args['lote'] ?? null;
        $this->etapa               = $args['etapa'] ?? null;
        $this->aream               = $args['aream'] ?? null;
        $this->valor_aream         = $args['valor_aream'] ?? null;
        $this->estado              = $args['estado'] ?? '';
        $this->valor_total         = $args['valor_total'] ?? null;
        $this->descuento           = $args['descuento'] ?? null;
        $this->porcen_restante     = $args['porcen_restante'] ?? null;
        $this->valor_venta         = $args['valor_venta'] ?? null;
        $this->obserdescu          = $args['obserdescu'] ?? '';
        $this->porcen_inicial      = $args['porcen_inicial'] ?? null;
        $this->cuota_inicial       = $args['cuota_inicial'] ?? null;
        $this->separacion          = $args['separacion'] ?? null;
        $this->doc_separacion      = $args['doc_separacion'] ?? null;
        $this->saldo_inicial       = $args['saldo_inicial'] ?? null;
        $this->numcuota_inicial    = $args['numcuota_inicial'] ?? null;
        $this->valcuota_inicial2   = $args['valcuota_inicial2'] ?? null;
        $this->valcuota_inicial3   = $args['valcuota_inicial3'] ?? null;
        $this->valcuota_inicial4   = $args['valcuota_inicial4'] ?? null;
        $this->valcuota_inicial5   = $args['valcuota_inicial5'] ?? null;
        $this->valcuota_inicial6   = $args['valcuota_inicial6'] ?? null;
        $this->valcuota_inicial7   = $args['valcuota_inicial7'] ?? null;
        $this->valcuota_inicial8   = $args['valcuota_inicial8'] ?? null;
        $this->valcuota_inicial9   = $args['valcuota_inicial9'] ?? null;
        $this->valcuota_inicial10  = $args['valcuota_inicial10'] ?? null;
        $this->valcuota_inicial11  = $args['valcuota_inicial11'] ?? null;
        $this->valcuota_inicial12  = $args['valcuota_inicial12'] ?? null;
        $this->feccuota_inicial1   = $args['feccuota_inicial1'] ?? null;
        $this->feccuota_inicial2   = $args['feccuota_inicial2'] ?? null;
        $this->feccuota_inicial3   = $args['feccuota_inicial3'] ?? null;
        $this->feccuota_inicial4   = $args['feccuota_inicial4'] ?? null;
        $this->feccuota_inicial5   = $args['feccuota_inicial5'] ?? null;
        $this->feccuota_inicial6   = $args['feccuota_inicial6'] ?? null;
        $this->feccuota_inicial7   = $args['feccuota_inicial7'] ?? null;
        $this->feccuota_inicial8   = $args['feccuota_inicial8'] ?? null;
        $this->feccuota_inicial9   = $args['feccuota_inicial9'] ?? null;
        $this->feccuota_inicial10  = $args['feccuota_inicial10'] ?? null;
        $this->feccuota_inicial11  = $args['feccuota_inicial11'] ?? null;
        $this->feccuota_inicial12  = $args['feccuota_inicial12'] ?? null;
        $this->valor_restante      = $args['valor_restante'] ?? null;
        $this->numcuota_restante   = $args['numcuota_restante'] ?? null;
        $this->valcuota_restante1  = $args['valcuota_restante1'] ?? null;
        $this->valcuota_restante2  = $args['valcuota_restante2'] ?? null;
        $this->valcuota_restante3  = $args['valcuota_restante3'] ?? null;
        $this->valcuota_restante4  = $args['valcuota_restante4'] ?? null;
        $this->valcuota_restante5  = $args['valcuota_restante5'] ?? null;
        $this->valcuota_restante6  = $args['valcuota_restante6'] ?? null;
        $this->valcuota_restante7  = $args['valcuota_restante7'] ?? null;
        $this->valcuota_restante8  = $args['valcuota_restante8'] ?? null;
        $this->valcuota_restante9  = $args['valcuota_restante9'] ?? null;
        $this->valcuota_restante10 = $args['valcuota_restante10'] ?? null;
        $this->valcuota_restante11 = $args['valcuota_restante11'] ?? null;
        $this->valcuota_restante12 = $args['valcuota_restante12'] ?? null;
        $this->valcuota_restante13 = $args['valcuota_restante13'] ?? null;
        $this->valcuota_restante14 = $args['valcuota_restante14'] ?? null;
        $this->valcuota_restante15 = $args['valcuota_restante15'] ?? null;
        $this->valcuota_restante16 = $args['valcuota_restante16'] ?? null;
        $this->valcuota_restante17 = $args['valcuota_restante17'] ?? null;
        $this->valcuota_restante18 = $args['valcuota_restante18'] ?? null;
        $this->valcuota_restante19 = $args['valcuota_restante19'] ?? null;
        $this->valcuota_restante20 = $args['valcuota_restante20'] ?? null;
        $this->valcuota_restante21 = $args['valcuota_restante21'] ?? null;
        $this->valcuota_restante22 = $args['valcuota_restante22'] ?? null;
        $this->valcuota_restante23 = $args['valcuota_restante23'] ?? null;
        $this->valcuota_restante24 = $args['valcuota_restante24'] ?? null;
        $this->valcuota_restante25 = $args['valcuota_restante25'] ?? null;
        $this->valcuota_restante26 = $args['valcuota_restante26'] ?? null;
        $this->valcuota_restante27 = $args['valcuota_restante27'] ?? null;
        $this->valcuota_restante28 = $args['valcuota_restante28'] ?? null;
        $this->valcuota_restante29 = $args['valcuota_restante29'] ?? null;
        $this->valcuota_restante30 = $args['valcuota_restante30'] ?? null;
        $this->valcuota_restante31 = $args['valcuota_restante31'] ?? null;
        $this->valcuota_restante32 = $args['valcuota_restante32'] ?? null;
        $this->valcuota_restante33 = $args['valcuota_restante33'] ?? null;
        $this->valcuota_restante34 = $args['valcuota_restante34'] ?? null;
        $this->valcuota_restante35 = $args['valcuota_restante35'] ?? null;
        $this->valcuota_restante36 = $args['valcuota_restante36'] ?? null;
        $this->valcuota_restante37 = $args['valcuota_restante37'] ?? null;
        $this->valcuota_restante38 = $args['valcuota_restante38'] ?? null;
        $this->valcuota_restante39 = $args['valcuota_restante39'] ?? null;
        $this->valcuota_restante40 = $args['valcuota_restante40'] ?? null;
        $this->valcuota_restante41 = $args['valcuota_restante41'] ?? null;
        $this->valcuota_restante42 = $args['valcuota_restante42'] ?? null;
        $this->valcuota_restante43 = $args['valcuota_restante43'] ?? null;
        $this->valcuota_restante44 = $args['valcuota_restante44'] ?? null;
        $this->valcuota_restante45 = $args['valcuota_restante45'] ?? null;
        $this->valcuota_restante46 = $args['valcuota_restante46'] ?? null;
        $this->valcuota_restante47 = $args['valcuota_restante47'] ?? null;
        $this->valcuota_restante48 = $args['valcuota_restante48'] ?? null;
        $this->feccuota_restante1  = $args['feccuota_restante1'] ?? null;
        $this->feccuota_restante2  = $args['feccuota_restante2'] ?? null;
        $this->feccuota_restante3  = $args['feccuota_restante3'] ?? null;
        $this->feccuota_restante4  = $args['feccuota_restante4'] ?? null;
        $this->feccuota_restante5  = $args['feccuota_restante5'] ?? null;
        $this->feccuota_restante6  = $args['feccuota_restante6'] ?? null;
        $this->feccuota_restante7  = $args['feccuota_restante7'] ?? null;
        $this->feccuota_restante8  = $args['feccuota_restante8'] ?? null;
        $this->feccuota_restante9  = $args['feccuota_restante9'] ?? null;
        $this->feccuota_restante10 = $args['feccuota_restante10'] ?? null;
        $this->feccuota_restante11 = $args['feccuota_restante11'] ?? null;
        $this->feccuota_restante12 = $args['feccuota_restante12'] ?? null;
        $this->feccuota_restante13 = $args['feccuota_restante13'] ?? null;
        $this->feccuota_restante14 = $args['feccuota_restante14'] ?? null;
        $this->feccuota_restante15 = $args['feccuota_restante15'] ?? null;
        $this->feccuota_restante16 = $args['feccuota_restante16'] ?? null;
        $this->feccuota_restante17 = $args['feccuota_restante17'] ?? null;
        $this->feccuota_restante18 = $args['feccuota_restante18'] ?? null;
        $this->feccuota_restante19 = $args['feccuota_restante19'] ?? null;
        $this->feccuota_restante20 = $args['feccuota_restante20'] ?? null;
        $this->feccuota_restante21 = $args['feccuota_restante21'] ?? null;
        $this->feccuota_restante22 = $args['feccuota_restante22'] ?? null;
        $this->feccuota_restante23 = $args['feccuota_restante23'] ?? null;
        $this->feccuota_restante24 = $args['feccuota_restante24'] ?? null;
        $this->feccuota_restante25 = $args['feccuota_restante25'] ?? null;
        $this->feccuota_restante26 = $args['feccuota_restante26'] ?? null;
        $this->feccuota_restante27 = $args['feccuota_restante27'] ?? null;
        $this->feccuota_restante28 = $args['feccuota_restante28'] ?? null;
        $this->feccuota_restante29 = $args['feccuota_restante29'] ?? null;
        $this->feccuota_restante30 = $args['feccuota_restante30'] ?? null;
        $this->feccuota_restante31 = $args['feccuota_restante31'] ?? null;
        $this->feccuota_restante32 = $args['feccuota_restante32'] ?? null;
        $this->feccuota_restante33 = $args['feccuota_restante33'] ?? null;
        $this->feccuota_restante34 = $args['feccuota_restante34'] ?? null;
        $this->feccuota_restante35 = $args['feccuota_restante35'] ?? null;
        $this->feccuota_restante36 = $args['feccuota_restante36'] ?? null;
        $this->feccuota_restante37 = $args['feccuota_restante37'] ?? null;
        $this->feccuota_restante38 = $args['feccuota_restante38'] ?? null;
        $this->feccuota_restante39 = $args['feccuota_restante39'] ?? null;
        $this->feccuota_restante40 = $args['feccuota_restante40'] ?? null;
        $this->feccuota_restante41 = $args['feccuota_restante41'] ?? null;
        $this->feccuota_restante42 = $args['feccuota_restante42'] ?? null;
        $this->feccuota_restante43 = $args['feccuota_restante43'] ?? null;
        $this->feccuota_restante44 = $args['feccuota_restante44'] ?? null;
        $this->feccuota_restante45 = $args['feccuota_restante45'] ?? null;
        $this->feccuota_restante46 = $args['feccuota_restante46'] ?? null;
        $this->feccuota_restante47 = $args['feccuota_restante47'] ?? null;
        $this->feccuota_restante48 = $args['feccuota_restante48'] ?? null;
        $this->estado_lote         = $args['estado_lote'] ?? '';
 
    }
    // Dentro de Model\Ventas.php
public function limpiarCamposMoneda()
        {
            // Campos que queremos normalizar (puedes añadir/quitar según necesites)
            $camposNumericos = [
                'valor_aream', 'valor_total', 'descuento', 'valor_venta',
                'porcen_inicial', 'cuota_inicial', 'separacion', 'saldo_inicial',
                'porcen_restante', 'valor_restante'
            ];

            for ($i = 1; $i <= 12; $i++) $camposNumericos[] = "valcuota_inicial{$i}";
            for ($i = 1; $i <= 48; $i++) $camposNumericos[] = "valcuota_restante{$i}";

            foreach ($camposNumericos as $campo) {
                if (!property_exists($this, $campo)) continue;

                $raw = $this->$campo;

                // Si viene vacío o null, mantenemos NULL (no forzamos 0)
                if ($raw === null || $raw === '' ) {
                    $this->$campo = null;
                    continue;
                }

                // Asegurarnos que trabajamos con string
                $s = (string)$raw;
                // quitar espacios normales y espacios no-break
                $s = trim($s);
                $s = str_replace("\xC2\xA0", '', $s); // eliminar NBSP si existe

                // Eliminar todo excepto dígitos, puntos y comas
                $s = preg_replace('/[^\d\.\,]/u', '', $s);

                // Normalizar formatos comunes:
                // - "1.234.567,89" (es-CO): puntos = miles, coma = decimal -> eliminar puntos, coma->.
                // - "1,234,567.89" (en-US): comas = miles, punto = decimal -> eliminar comas
                // - "1234567.89" o "1234567,89"
                if (strpos($s, ',') !== false && strpos($s, '.') !== false) {
                    // hay ambos: asumimos formato europeo (puntos miles, coma decimal)
                    // pero hay casos mixtos; tratar como: eliminar puntos, coma->.
                    // si no es correcto en tu caso, ajusta la heurística
                    $s = str_replace('.', '', $s);
                    $s = str_replace(',', '.', $s);
                } elseif (strpos($s, ',') !== false && strpos($s, '.') === false) {
                    // solo coma: asumimos coma decimal -> convertir a punto
                    $s = str_replace(',', '.', $s);
                } elseif (strpos($s, '.') !== false && substr_count($s, '.') > 1) {
                    // varios puntos -> se asume puntos como separador de miles -> borrar
                    $s = str_replace('.', '', $s);
                }
                // en otros casos (un solo punto) lo dejamos como decimal

                // Finalmente convertir a float (o NULL si no es numérico)
                $num = is_numeric($s) ? (float)$s : null;

                $this->$campo = $num;
            }
        }


    // 🔹 Mantener método de validación
public function validarVentas() {
        return self::$alertas;
    }

  

}

