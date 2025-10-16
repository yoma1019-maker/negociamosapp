<?php
namespace Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use Model\Proyeccion;
use MVC\Router;
use model\Clientes;

class ProyeccionController {

        public static function generarPDF() {
                session_start();
                isAuth();

                // Solo procesa si llega POST
                if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                    http_response_code(405);
                    echo "Método no permitido";
                    exit;
                }

                require_once __DIR__ . '/../vendor/autoload.php';

                // Capturar todos los datos del formulario
                $venta = (object) $_POST; // Convertimos en objeto para usar ->campo

                // Generar HTML del PDF
                ob_start();
                include __DIR__ . '/../views/pdf/proyeccion.php';
                $html = ob_get_clean();

                // Configurar Dompdf
                $options = new \Dompdf\Options();
                $options->set('isHtml5ParserEnabled', true);
                $options->set('isRemoteEnabled', true);

                $dompdf = new \Dompdf\Dompdf($options);
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();

                // Enviar el PDF al navegador sin descargarlo
                header('Content-Type: application/pdf');
                echo $dompdf->output();

                // 👉 OPCIONAL: Guardar en la tabla clientes
                // Aquí podrías usar tu modelo Cliente para guardar los datos:
                $cliente = new Clientes([
                'nombre' => $_POST['nombre_cliente'] ?? '',
                'cedula' => $_POST['cedula_cliente'] ?? '',
                'telefono' => $_POST['telefono_cliente'] ?? '',
                'email' => $_POST['correo_cliente'] ?? ''
            ]);
            $cliente->guardar();    
                
        }



    public static function vistaPrevia(Router $router) {
        session_start();
        isAuth();

        $id = $_GET['id'] ?? null;
        if (!$id) {
            die("No se recibió el ID de la venta");
        }

        $venta = Proyeccion::obtenerConRelacion($id);
        if (!$venta) {
            die("No se encontró la venta #$id");
        }

        // Renderizar en navegador (sin Dompdf)
        $router->render('pdf/proyeccion', [
            'venta' => $venta
        ]);
    }
}


















