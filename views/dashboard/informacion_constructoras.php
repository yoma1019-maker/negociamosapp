<?php  include_once __DIR__ . '/header-dashboard.php'; ?>


    
    <form class="contenedor-sm-blistado" action="/formulario_constructora">
    <input class="boton" type="submit" value="Anexar Constructora">
    </form>

    <div id="constructoras" class="listado-agentes contenedor-listado">

        <table class="table">
            
            <thead class="table__thead">
               
                <tr>
                    <th scope="col" class="table__th">id</th>
                    <th scope="col" class="table__th">tipo</th>
                    <th scope="col" class="table__th">identificacion</th>
                    <th scope="col" class="table__th">nombre</th>
                    <th scope="col" class="table__th">contacto</th>
                    <th scope="col" class="table__th">celular</th>
                    <th scope="col" class="table__th">email</th>
                </tr>
            </thead>

            <tbody class="table__body">
                <?php
                foreach( $constructora as  $constructora){
                ?>
                <tr class="table__tr">
                   <td class="table__td"><?php echo $constructora -> id; ?></td>
                   <td class="table__td"><?php echo $constructora -> tipo; ?></td>
                   <td class="table__td"><?php echo $constructora -> identificacion; ?></td>
                   <td class="table__td"><?php echo $constructora -> nombre; ?></td>
                   <td class="table__td"><?php echo $constructora -> contacto; ?></td>
                   <td class="table__td"><?php echo $constructora -> celular; ?></td>
                   <td class="table__td"><?php echo $constructora -> email; ?></td>
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
            </tbody>

        </table>   

             </div>
    
        <?php 
        echo $paginacion;
        ?>
    

    

<?php  include_once __DIR__ . '/footer-dashboard.php'; ?>