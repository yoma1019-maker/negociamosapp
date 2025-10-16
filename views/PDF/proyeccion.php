<?php
function fmt($v) { return htmlspecialchars($v ?? ''); }
function num($v) { return number_format((float)($v ?? 0), 0, ',', '.'); }
function fdate($d) { return $d ? date('d/m/Y', strtotime($d)) : ''; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Proyección de Pago - <?= fmt($venta->nombre_cliente ?? '') ?></title>
<style>
body { font-family: Arial, Helvetica, sans-serif; font-size: 12px; margin: 25px; color: #000; }
table { width: 100%; border-collapse: collapse; margin-top: 5px; }
td, th { border: 1px solid #444; padding: 5px; vertical-align: middle; }
th { background: #f2f2f2; font-weight: bold; }
.no-border td { border: none; }
.center { text-align: center; }
.bold { font-weight: bold; }
.right { text-align: right; }
.section-title {
  background: #267599;
  font-weight: bold;
  padding: 6px;
  color: #FFFFFF;
  text-transform: uppercase;
  border: 1px solid #FFFFFF;
}
.logo { text-align: left; }
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
                <table>
                    
                    <tr>
                        <td class="bold">PROMITENTE VENDEDOR:</td>
                        <td><?= fmt($venta->agente1_id ?? '') ?></td>
                        <td class="bold">CELULAR:</td>
                        <td><?= fmt($venta->telefono_vendedor ?? '') ?></td>
                    </tr>
                    <tr>
                        <td class="bold">DIRECCIÓN:</td>
                        <td><?= fmt($venta->direccion_vendedor ?? '') ?></td>
                        <td class="bold">CORREO ELECTRÓNICO:</td>
                        <td colspan="3"><?= fmt($venta->correo_vendedor ?? '') ?></td>
                    </tr>
                </table>

<!-- DATOS DEL CLIENTE -->
            <p class="section-title">Promitente Comprador</p>
                <table>
                    <tr>
                        <td class="bold">NOMBRES Y APELLIDOS:</td>
                        <td><?= fmt($venta->nombre_cliente ?? '') ?></td>
                        <td class="bold">N° IDENTIFICACIÓN:</td>
                        <td><?= fmt($venta->cedula_cliente ?? '') ?></td>
                    </tr>
                    <tr>
                        <td class="bold">TELÉFONO DE CONTACTO:</td>
                        <td><?= fmt($venta->telefono_cliente ?? '') ?></td>
                        <td class="bold">CORREO ELECTRÓNICO:</td>
                        <td><?= fmt($venta->correo_cliente ?? '') ?></td>
                    </tr>
                    <tr>
                        <td class="bold">DIRECCIÓN DE RESIDENCIA:</td>
                        <td colspan="3"><?= fmt($venta->direccion_cliente ?? '') ?></td>
                    </tr>
                    <tr>
                        <td class="bold">CIUDAD:</td>
                        <td><?= fmt($venta->ciudad_cliente ?? '') ?></td>
                        <td class="bold">PAÍS:</td>
                        <td><?= fmt($venta->pais_cliente ?? '') ?></td>
                    </tr>
                </table>


<!-- INFORMACION DEL PROYECTO -->
            <p class="section-title">Información del Proyecto</p>
                <table>
                    <tr>
                        <td class="bold" style="width:25%;">PROYECTO:</td>
                        <td><?= fmt($venta->proyecto ?? 'ALCALÁ CONDOMINIO CAMPESTRE') ?></td>
                        
                        <td class="bold" style="width:25%;">N° LOTE:</td>
                        <td><?= fmt($venta->lote ?? '') ?></td>
                    </tr>
                    <tr>
                        <td class="bold" style="width:25%;">MTRS2:</td>
                        <td><?= fmt($venta->mtrs2 ?? 0) ?></td>

                        <td class="bold" style="width:25%;">VALOR METR2:</td>
                        <td><?= fmt($venta->valor_m2 ?? 0) ?></td>
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
                        <td class="right"><?= num($venta->valor_real ?? 0) ?></td>
                        <td class="center bold">%</td>
                        <td class="right"><?= num($venta->valor_real ?? 0) ?></td>
                        </tr>
                        <tr>
                        <td class="center bold">VALOR TOTAL LOTE ($)</td>
                        <td class="right"><?= num($venta->valor_real ?? 0) ?></td>
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
                        <td class="right"><?= num($venta->valor_total ?? 0) ?></td>
                        <td class="center bold">PENDIENTE INICIAL ($):</td>
                        <td class="right"><?= num($venta->pendiente_inicial ?? 0) ?></td>
                        </tr>

                        <tr>
                        <td class="center bold">NÚMERO DE CUOTAS:</td>
                        <td class="center"><?= fmt($venta->numero_cuotas ?? '') ?></td>
                        <td class="center bold">NÚMERO DE CUOTAS:</td>
                        <td class="center"><?= fmt($venta->numero_cuotas_inicial ?? '') ?></td>
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

