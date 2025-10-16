<?php
namespace Controllers;

use Dompdf\Dompdf;


class ProyeccionController {

        public static function generarPDF() {
                require_once __DIR__ . '/../models/Ventas.php';
                require_once __DIR__ . '/../vendor/autoload.php';


                // 🔹 Obtener la última venta (o una por id)
                $id = $_GET['id'] ?? null;
                $venta = $id ? \Model\Ventas::find($id) : \Model\Ventas::findLast();

                if (!$venta) {
                    http_response_code(404);
                    echo "⚠️ No se encontró la venta solicitada.";
                    exit;
                }

                // 🔹 Generar HTML
                ob_start();
                include __DIR__ . '/../views/pdf/proyeccion.php';
                $html = ob_get_clean();

                // 🔹 Configurar Dompdf
                $options = new \Dompdf\Options();
                $options->set('isHtml5ParserEnabled', true);
                $options->set('isRemoteEnabled', true);

                $dompdf = new \Dompdf\Dompdf($options);
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();

                // 🔹 Descargar el archivo directamente
                $dompdf->stream("proyeccion_venta.pdf", ["Attachment" => true]);
            }



}



















