<?php  include_once __DIR__ . '/header-dashboard.php'; ?>


    
    <form class="contenedor-sm-blistado" action="/formulario_clientes">
    <input class="boton" type="submit" value="Crear Cliente">
    </form>

    <div id="clientes" class="listado-clientes contenedor-listado">

        <table class="table">
            
            <thead class="table__thead">
               
                <tr>
                    <th scope="col" class="table__th">Fecha</th>
                    <th scope="col" class="table__th">id</th>
                    <th scope="col" class="table__th">nombre</th>
                    <th scope="col" class="table__th">nacimiento</th>
                    <th scope="col" class="table__th">ciudad nacimiento</th>
                    <th scope="col" class="table__th">sexo</th>
                    <th scope="col" class="table__th">tipo documento</th>
                    <th scope="col" class="table__th">otro_doc</th>
                    <th scope="col" class="table__th">cedula</th>
                    <th scope="col" class="table__th">expedicion</th>
                    <th scope="col" class="table__th">lugar expedicion</th>
                    <th scope="col" class="table__th">celular</th>
                    <th scope="col" class="table__th">celular2</th>
                    <th scope="col" class="table__th">civil</th>
                    <th scope="col" class="table__th">nacionalidad</th>
                    <th scope="col" class="table__th">cual?</th>
                    <th scope="col" class="table__th">direccion</th>
                    <th scope="col" class="table__th">ciudad</th>
                    <th scope="col" class="table__th">departamento</th>
                    <th scope="col" class="table__th">pais</th>
                    <th scope="col" class="table__th">email</th>
                    <th scope="col" class="table__th">agente</th>
                    <th scope="col" class="table__th">cedula1</th>
                    <th scope="col" class="table__th">cedula2</th>
                    <th scope="col" class="table__th">proyeccion</th>
                    <th scope="col" class="table__th">intencion</th>
                    <th scope="col" class="table__th">acciones</th>
                </tr>
            </thead>

            <tbody class="table__body">
                <?php
                foreach( $clientes as  $cliente){
                ?>
                    <tr class="table__tr">
                    <td class="table__td"><?php echo $cliente  -> fecha; ?></td>
                    <td class="table__td"><?php echo $cliente -> id; ?></td>
                    <td class="table__td"><?php echo $cliente  -> nombre; ?></td>
                    <td class="table__td"><?php echo $cliente  -> nacimiento; ?></td>
                    <td class="table__td"><?php echo $cliente  -> c_nacimiento; ?></td>
                    <td class="table__td"><?php echo $cliente  -> sexo; ?></td>
                    <td class="table__td"><?php echo $cliente  -> t_documento; ?></td>
                    <td class="table__td"><?php echo $cliente  -> otro_doc; ?></td>
                    <td class="table__td"><?php echo $cliente  -> cedula; ?></td>
                    <td class="table__td"><?php echo $cliente  -> expedicion; ?></td>
                    <td class="table__td"><?php echo $cliente  -> lugarexp; ?></td>
                    <td class="table__td"><?php echo $cliente  -> celular; ?></td>
                    <td class="table__td"><?php echo $cliente  -> celular2; ?></td>
                    <td class="table__td"><?php echo $cliente  -> civil; ?></td>
                    <td class="table__td"><?php echo $cliente  -> nacionalidad; ?></td>
                    <td class="table__td"><?php echo $cliente  -> otro_nac; ?></td>
                    <td class="table__td"><?php echo $cliente  -> direccion; ?></td>
                    <td class="table__td"><?php echo $cliente  -> ciudad; ?></td>
                    <td class="table__td"><?php echo $cliente  -> departamento; ?></td>
                    <td class="table__td"><?php echo $cliente  -> pais; ?></td>
                    <td class="table__td"><?php echo $cliente  -> email; ?></td>
                    <td class="table__td"><?php echo $cliente  -> nombre_agente; ?></td>
                    <td class="table__td"><?php echo $cliente  -> cedula1; ?></td>
                    <td class="table__td"><?php echo $cliente  -> cedula2; ?></td>
                    <td class="table__td"><?php echo $cliente  -> proyeccion_pdf; ?></td>
                    <td class="table__td"><?php echo $cliente  -> intencion_pdf; ?></td>
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