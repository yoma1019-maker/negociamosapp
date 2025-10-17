<?php

function fmt($v) { return htmlspecialchars($v ?? ''); }
function num($v) { return number_format((float)($v ?? 0), 0, ',', '.'); }
function fdate($d) { return $d ? date('d/m/Y', strtotime($d)) : ''; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Proyección de Pago - <?= fmt($venta->proyecto ?? '') ?></title>
<style>
<?php
$cssPath = __DIR__ . '/../../public/build/css/app.css'; // o ajusta si tu carpeta se llama css/
if (file_exists($cssPath)) {
    echo file_get_contents($cssPath);
} else {
    echo "/* ⚠️ No se encontró el archivo de estilos: $cssPath */";
}
?>
</style>
</head>
<body>

<!-- ENCABEZADO -->
        <table class="no-border">
            <tr>
            <td class="logo" style="width:30%;">
            <img src="https://i.ibb.co/4fv9L9J/logo-alcala.png" alt="Logo" width="120">
            </td>
            <td class="center bold" style="font-size:16px;">PROYECCIÓN DE PAGO</td>
            </tr>
        </table>

<!-- DATOS DEL VENDEDOR-->

        
            <p class="section-title">Datos del Promitente Vendedor</p>

                <table class="tabla-vendedor">
                    <tr>
                        <td class="bold">NOMBRE:</td>
                        <td><?= fmt($agente_datos->nombre ?? '') ?></td>
                    <tr>
                        <td class="bold">CELULAR:</td>
                        <td><?= fmt($agente_datos->celular ?? '') ?></td>
                    </tr>
                    <tr>
                        <td class="bold">DIRECCIÓN:</td>
                        <td><?= fmt($agente_datos->direccion ?? '') ?></td>
                    </tr>
                    <tr>
                        <td class="bold">EMAIL:</td>
                        <td><?= fmt($agente_datos->email ?? '') ?></td>
                    </tr>
                </table>


<!-- DATOS DEL CLIENTE -->
            <p class="section-title">Promitente Comprador</p>
                <table>
                    <tr>
                        <td class="bold">NOMBRES Y APELLIDOS:</td>
                        <td><?= fmt($cliente_datos->nombre ?? '') ?></td>
                    </tr>
                    <tr>
                        <td class="bold">N° IDENTIFICACIÓN:</td>
                        <td><?= fmt($cliente_datos->cedula ?? '') ?></td>
                    </tr>
                    <tr>
                        <td class="bold">TELÉFONO DE CONTACTO:</td>
                        <td><?= fmt($cliente_datos->celular ?? '') ?></td>
                    </tr>
                    <tr>
                        <td class="bold">CORREO ELECTRÓNICO:</td>
                        <td><?= fmt($cliente_datos->email ?? '') ?></td>
                    </tr>
                    <tr>
                        <td class="bold">DIRECCIÓN DE RESIDENCIA:</td>
                        <td ><?= fmt($cliente_datos->direccion ?? '') ?></td>
                    </tr>
                    <tr>
                        <td class="bold">CIUDAD:</td>
                        <td><?= fmt($cliente_datos->nombre_ciudad?? '') ?></td>
                    </tr>
                    <tr>
                        <td class="bold">PAÍS:</td>
                        <td><?= fmt($cliente_datos->nombre_pais ?? '') ?></td>
                    </tr>
                </table>


<!-- INFORMACION DEL PROYECTO -->
            <p class="section-title">Información del Proyecto</p>
                <table>
                    <tr>
                        <td class="bold" style="width:25%;">PROYECTO:</td>
                        <td class="bold" style="width:25%;">N° LOTE:</td>
                        <td class="bold" style="width:25%;">MTRS2:</td>
                        <td class="bold" style="width:25%;">VALOR METR2:</td>
                    </tr>
                    <tr>
                        <td><?= fmt($venta->proyecto ?? '') ?></td>
                        <td><?= fmt($venta->lote ?? '') ?></td>
                        <td><?= fmt($venta->aream ?? 0) ?></td>
                        <td><?= fmt($venta->valor_aream ?? 0) ?></td>
                    </tr>
                </table>

<!-- PROYECCIÓN DE PAGO -->
            <p class="section-title">Proyección de Pago</p>
                <table>
                    <thead>
                        <tr>
                        <th colspan="2" class="center">INFORMACIÓN VALOR DEL LOTE</th>
                        <th colspan="2" class="center">INFORMACIÓN CUOTA INICIAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td class="center bold">%</td>
                        <td class="right"><?= num($venta->porcen_restante ?? 0) ?></td>
                        <td class="center bold">%</td>
                        <td class="right"><?= num($venta->porcen_inicial ?? 0) ?></td>
                        </tr>
                        <tr>
                        <td class="center bold">VALOR TOTAL LOTE ($)</td>
                        <td class="right"><?= num($venta->valor_total ?? 0) ?></td>
                        <td class="center bold">CUOTA INICIAL ($)</td>
                        <td class="right"><?= num($venta->cuota_inicial ?? 0) ?></td>
                        </tr>

                        <tr>
                        <td class="center bold">DESCUENTO ($):</td>
                        <td class="right"><?= num($venta->descuento ?? 0) ?></td>
                        <td class="center bold">SEPARACIÓN ($):</td>
                        <td class="right"><?= num($venta->separacion ?? 0) ?></td>
                        </tr>

                        <tr>
                        <td class="center bold">VALOR DE VENTA ($):</td>
                        <td class="right"><?= num($venta->valor_venta ?? 0) ?></td>
                        <td class="center bold">PENDIENTE INICIAL ($):</td>
                        <td class="right"><?= num($venta->saldo_inicial ?? 0) ?></td>
                        </tr>

                        <tr>
                        <td class="center bold">NÚMERO DE CUOTAS:</td>
                        <td class="center"><?= fmt($venta->numcuota_restante ?? '') ?></td>
                        <td class="center bold">NÚMERO DE CUOTAS:</td>
                        <td class="center"><?= fmt($venta->numcuota_inicial ?? '') ?></td>
                        </tr>
                    </tbody>
                    </table>


<!-- FORMA DE PAGO -->
                <p class="section-title">Forma de Pago</p>
                <table>
                <thead>
                    <tr>
                    <th class="center">DESCRIPCION</th>
                    <th class="center">FECHA</th>
                    <th class="center">VALOR ($)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($venta->cuotas) && is_array($venta->cuotas)): ?>
                    <?php foreach ($venta->cuotas as $i => $c): ?>
                        <tr>
                        <td class="center"><?= $i + 1 ?></td>
                        <td class="center"><?= fdate($c['fecha']) ?></td>
                        <td class="right"><?= num($c['valor']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr><td colspan="4" class="center">Sin cuotas registradas</td></tr>
                    <?php endif; ?>
                </tbody>
                </table>

</body>
</html>

