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

    <div id="listadoProyectos" class="tabla-contenedor">

        <table class="tabla-proyectos" id="miTabla">
            
            <thead class="table__thead">
               
                <tr>
                    <th scope="col" class="table__th">id</th>
                    <th scope="col" class="table__th">nombre</th>
                    <th scope="col" class="table__th">tipo</th>
                    <th scope="col" class="table__th">acciones</th>
                </tr>
            </thead>

            <tbody class="table__body">

                <?php
                foreach( $listadoProyectos as  $listadoProyectos){
                ?>
                <tr class="table__tr">
                   <td class="table__td"><?php echo $listadoProyectos -> id; ?></td>
                   <td class="table__td"><?php echo $listadoProyectos -> nombre; ?></td>
                   <td class="table__td"><?php echo $listadoProyectos -> tipo; ?></td>
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