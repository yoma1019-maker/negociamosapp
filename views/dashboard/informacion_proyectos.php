<?php  include_once __DIR__ . '/header-dashboard.php'; ?>

   

    <form class="contenedor-sm-blistado" action="/formulario_proyectos">
    <input class="boton" type="submit" value="Crear proyectos">
    </form>

    <!-- Formulario de filtro -->
    <form method="get">
    <input type="text" name="lote" placeholder="Buscar lote" value="<?= htmlspecialchars($lote ?? '') ?>">
    <input type="text" name="proyecto" placeholder="Buscar proyecto" value="<?= htmlspecialchars($proyecto ?? '') ?>">
    <button type="submit">Filtrar</button>
    </form>

    <div id="proyectos" class="listado-proyectoss contenedor-listado">

        <table class="table" id="miTabla">
            
            <thead class="table__thead">
               
                <tr>
                    <th scope="col" class="table__th">id</th>
                    <th scope="col" class="table__th">proyecto</th>
                    <th scope="col" class="table__th">lote</th>
                    <th scope="col" class="table__th">etapa</th>
                    <th scope="col" class="table__th">aream</th>
                    <th scope="col" class="table__th">estado</th>
                    <th scope="col" class="table__th">valor_aream</th>
                    <th scope="col" class="table__th">tipo_lote</th>
                    <th scope="col" class="table__th">valor_total</th>
                    <th scope="col" class="table__th">porcen_inicial</th>
                    <th scope="col" class="table__th">cuota_inicial</th>
                    <th scope="col" class="table__th">valor_restante</th>
                    <th scope="col" class="table__th">cuotas</th>
                    <th scope="col" class="table__th">valor_cuotas</th>
                    <th scope="col" class="table__th">acciones</th>
                </tr>
            </thead>

            <tbody class="table__body">

                <?php
                foreach( $proyectos as  $proyectos){
                ?>
                <tr class="table__tr">
                   <td class="table__td"><?php echo $proyectos -> id; ?></td>
                   <td class="table__td"><?php echo $proyectos -> proyecto; ?></td>
                   <td class="table__td"><?php echo $proyectos -> lote; ?></td>
                   <td class="table__td"><?php echo $proyectos -> etapa; ?></td>
                   <td class="table__td"><?php echo $proyectos -> aream; ?></td>
                    <td class="table__td"><?php echo $proyectos -> estado; ?></td>
                   <td class="table__td"><?php echo '$ ' . number_format($proyectos->valor_aream, 0, ',', '.'); ?></td>
                   <td class="table__td"><?php echo $proyectos -> tipo_lote; ?></td>
                   <td class="table__td"><?php echo '$ ' . number_format($proyectos->valor_total, 0, ',', '.'); ?></td>
                   <td class="table__td"><?php echo $proyectos -> porcen_inicial; ?></td>
                   <td class="table__td"><?php echo '$ ' . number_format($proyectos->cuota_inicial, 0, ',', '.'); ?></td>
                   <td class="table__td"><?php echo '$ ' . number_format($proyectos->valor_restante, 0, ',', '.'); ?></td>
                   <td class="table__td"><?php echo $proyectos -> cuotas; ?></td>
                   <td class="table__td"><?php echo '$ ' . number_format($proyectos->valor_cuotas, 0, ',', '.'); ?></td>
                   <td class="table__td--acciones">
                     
                    <a class="table__accion table__accion--editar" href="">
                     <i class="fa-solid fa-check"></i>
                    </a>

                     <form class="table__formulario">
                        <button class="table__accion table__accion--eliminar"type="submit">
                        <i class="fa-regular fa-trash-can"></i>
                        </button>
                     </form>
                   </td>

                </tr>
                <?php  } ?>

            <script src="build/js/filtro.js"></script>
            </tbody>

        </table>   

             </div>
    
        <?php 
        echo $paginacion;
        ?>
    

    

<?php  include_once __DIR__ . '/footer-dashboard.php'; ?>

