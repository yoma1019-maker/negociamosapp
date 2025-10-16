<?php  include_once __DIR__ . '/header-dashboard.php'; ?>

<form class="contenedor-sm-blistado" action="/formulario_ventas">
    <input class="boton" type="submit" value="Crear ventas">
</form>

<div id="ventas" class="listado-proyectoss contenedor-listado">

    <table class="table" id="miTablaventas">
        <thead class="table__thead">
            <tr>
                <th scope="col" class="table__th">FECHA</th>
                <th scope="col" class="table__th">ID</th>
                <th scope="col" class="table__th">AGENTE</th>
                <th scope="col" class="table__th">CLIENTE</th>
                <th scope="col" class="table__th">PROYECTO</th>
                <th scope="col" class="table__th">N° LOTE</th>
                <th scope="col" class="table__th">ETAPA</th>
                <th scope="col" class="table__th">ÁREA</th>
                <th scope="col" class="table__th">VALOR MTR2</th>
                <th scope="col" class="table__th">ESTADO DEL PROYECTO</th>
                <th scope="col" class="table__th">VALOR PROYECTO</th>
                <th scope="col" class="table__th">DESCUENTO</th>
                <th scope="col" class="table__th">OBSERVACIONES DE DESCUENTO</th>
                <th scope="col" class="table__th">VALOR VENTA</th>
                <th scope="col" class="table__th">VALOR CUOTA INICIAL</th>
                <th scope="col" class="table__th">VALOR SEPARACIÓN</th>
                <th scope="col" class="table__th">SOPORTE</th>
                <th scope="col" class="table__th">SALDO CUOTA INICIAL</th>
                <th scope="col" class="table__th">N° CUOTAS</th>
                <th scope="col" class="table__th">VALOR MENSUAL</th>
                <th scope="col" class="table__th">FECHA PACTADA I</th>
                <th scope="col" class="table__th">VALOR RESTANTE</th>
                <th scope="col" class="table__th">N° CUOTAS</th>
                <th scope="col" class="table__th">VALOR MENSUAL</th>
                <th scope="col" class="table__th">FECHA PACTADA II</th>
                <th scope="col" class="table__th">ESTADO VENTA</th>
                <th scope="col" class="table__th">ACCIONES</th>
            </tr>
        </thead>

        <tbody class="table__body">
            <?php foreach ($ventas as $venta) { ?>
                <tr class="table__tr">
                    <td class="table__td"><?php echo $venta->fecha; ?></td>
                    <td class="table__td"><?php echo $venta->id; ?></td>
                    <td class="table__td"><?php echo $venta->agente_id; ?></td>
                    <td class="table__td"><?php echo $venta->cliente_id; ?></td>
                    <td class="table__td"><?php echo $venta->proyecto; ?></td>
                    <td class="table__td"><?php echo $venta->lote; ?></td>
                    <td class="table__td"><?php echo $venta->etapa; ?></td>
                    <td class="table__td"><?php echo $venta->aream; ?></td>
                    <td class="table__td"><?php echo $venta->valor_aream; ?></td>
                    <td class="table__td"><?php echo $venta->estado; ?></td>
                    <td class="table__td"><?php echo $venta->valor_total; ?></td>
                    <td class="table__td"><?php echo $venta->descuento; ?></td>
                    <td class="table__td"><?php echo $venta->obserdescu; ?></td>
                    <td class="table__td"><?php echo $venta->valor_venta; ?></td>
                    <td class="table__td"><?php echo $venta->cuota_inicial; ?></td>
                    <td class="table__td"><?php echo $venta->separacion; ?></td>

                    <td class="table__td">
                        <?php if ($venta->doc_separacion) { ?>
                            <a href="/descargar.php?id=<?php echo $ventas->id; ?>" target="_blank">Ver Documento</a>
                        <?php } else { ?>
                            Sin documento
                        <?php } ?>
                    </td>

                    <td class="table__td"><?php echo $venta->saldo_inicial; ?></td>
                    <td class="table__td"><?php echo $venta->numcuota_inicial; ?></td>
                    <td class="table__td"><?php echo $venta->valcuota_inicial1; ?></td>
                    <td class="table__td"><?php echo $venta->feccuota_inicial1; ?></td>
                    <td class="table__td"><?php echo $venta->valor_restante; ?></td>
                    <td class="table__td"><?php echo $venta->numcuota_restante; ?></td>
                    <td class="table__td"><?php echo $venta->valcuota_restante1; ?></td>
                    <td class="table__td"><?php echo $venta->feccuota_restante1; ?></td>
                    <td class="table__td"><?php echo $venta->estado_lote; ?></td>

                    <td class="table__td acciones">
                        <a class="table__accion table__accion--editar" href="">
                            <i class="fa-solid fa-check"></i>
                        </a>
                        <form class="table__formulario">
                            <button class="table__accion table__accion--eliminar" type="submit">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php echo $paginacion; ?>

<?php  include_once __DIR__ . '/footer-dashboard.php'; ?>
