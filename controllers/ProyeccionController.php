<?php
namespace Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;


class ProyeccionController {

        public static function generarPDF() {
                require_once __DIR__ . '/../models/Ventas.php';
                require_once __DIR__ . '/../models/Agente.php';
                require_once __DIR__ . '/../models/Clientes.php';
                require_once __DIR__ . '/../models/Listados/Ciudad.php';
                require_once __DIR__ . '/../models/Listados/Pais.php';
                require_once __DIR__ . '/../vendor/autoload.php';


                // 🔹 Obtener la última venta (o una por id)
                $id = $_GET['id'] ?? null;
                $venta = $id ? \Model\Ventas::find($id) : \Model\Ventas::findLast();

                if (!$venta) {
                    http_response_code(404);
                    echo "⚠️ No se encontró la venta solicitada.";
                    exit;
                }

                /** @var \Model\Ventas $venta */
                /** @var \Model\Agente|null $agente */
                /** @var \Model\Clientes|null $cliente */
        

                            // ✅ Traer datos del agente (usando el nombre real del campo)
                    $agente = null;
                    if (!empty($venta->agente_id)) {
                        $agente = \Model\Agente::find($venta->agente_id);
                    }

                     $cliente = null;
                    if (!empty($venta->cliente_id)) {
                        $cliente = \Model\Clientes::find($venta->cliente_id);
                        $cliente?->cargarRelaciones(); // 🔹 completa nombre_ciudad y nombre_pais
                    }

                    // ✅ Variables para la vista PDF
                    $venta_datos = $venta;
                    $agente_datos = $agente;
                    $cliente_datos = $cliente;

                // 🔹 Generar HTML
                ob_start();
                include __DIR__ . '/../views/pdf/proyeccion.php';
                $html = ob_get_clean();

                // ✅ Generar el PDF
                $options = new Options();
                $options->set('isHtml5ParserEnabled', true);
                $options->set('isRemoteEnabled', true);

                $dompdf = new Dompdf($options);
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();

                // ✅ Descargar PDF automáticamente
                $dompdf->stream("proyeccion_venta_{$venta->id}.pdf", ["Attachment" => true]);
    }



}



















