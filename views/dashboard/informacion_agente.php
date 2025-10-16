<?php  include_once __DIR__ . '/header-dashboard.php'; ?>


    
    <form class="contenedor-sm-blistado" action="/formulario_agente">
    <input class="boton" type="submit" value="Crear Agente">
    </form>

    <div id="agente" class="listado-agentes contenedor-listado">

        <table class="table">
            
            <thead class="table__thead">
               
                <tr>
                    <th scope="col" class="table__th">ID</th>
                    <th scope="col" class="table__th">FECHA</th>
                    <th scope="col" class="table__th">CEDULA</th>
                    <th scope="col" class="table__th">NOMBRE COMPLETO</th>
                    <th scope="col" class="table__th">CELULAR</th>
                    <th scope="col" class="table__th">EMAIL</th>
                    <th scope="col" class="table__th">F. NACIMIENTO</th>
                    <th scope="col" class="table__th">DIRECCION</th>
                    <th scope="col" class="table__th">BARRIO</th>
                    <th scope="col" class="table__th">USUARIO</th>
                    <th scope="col" class="table__th">CLAVE</th>
                    <th scope="col" class="table__th">CETEGORIA</th>
                    <th scope="col" class="table__th">ROL</th>
                    <th scope="col" class="table__th">ACCIONES</th>
                </tr>
            </thead>

            <tbody class="table__body">
                <?php
                foreach( $agente as  $agente){
                ?>
                <tr class="table__tr">
                   <td class="table__td"><?php echo $agente -> id; ?></td>
                   <td class="table__td"><?php echo $agente -> fecha; ?></td>
                   <td class="table__td"><?php echo $agente -> cedula; ?></td>
                   <td class="table__td"><?php echo $agente -> nombre; ?></td>
                   <td class="table__td"><?php echo $agente -> celular; ?></td>
                   <td class="table__td"><?php echo $agente -> email; ?></td>
                   <td class="table__td"><?php echo $agente -> nacimiento; ?></td>
                   <td class="table__td"><?php echo $agente -> direccion; ?></td>
                   <td class="table__td"><?php echo $agente -> barrio; ?></td>
                   <td class="table__td"><?php echo $agente -> usuario; ?></td>
                   <td class="table__td"><?php echo $agente -> clave; ?></td>
                   <td class="table__td"><?php echo $agente -> categoria_nombre?? 'Sin categoría'; ?></td>
                   <td class="table__td"><?php echo $agente -> rol_nombre ?? 'Sin rol'; ?></td>
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

