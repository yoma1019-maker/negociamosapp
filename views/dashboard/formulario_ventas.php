    <?php include_once __DIR__ . '/header-dashboard.php'; ?>

    <div class="contenedor-sm">

        <?php include_once __DIR__ . '/../templates/alertas.php'?>



    <form id="formularioVentas" class="formulario-ventas" method="POST" action="/informacion_ventas" enctype="multipart/form-data">

         <!--Campo oculto para relacionar cliente existente -->
        <input type="hidden" name="cliente_id" value="<?php echo $ventas->cliente_id ?? ''; ?>">
    
        <!-- Información del Cliente -->
        <div class="encabezado2">



<!-- Página 1: Información del Cliente encabezado-->

            <div class="pagina active" id="pagina1">
                        
                        <div class="encabezado2">
                        <p class="nombre2">Información del Cliente</p>
                        <hr/>
                        </div>


<!--Buscador de clientes-->
             <div class="h3">
                <h3> Buscar Clientes</h3>
            </div>

            <div class="filtro-clientes">
                <div class="campo2">
                    <label for="filtro_nombre">Nombre:</label>
                    <input type="text" id="filtro_nombre" placeholder="Nombre del cliente">
                </div>
                <div class="campo2">
                    <label for="filtro_email">Correo:</label>
                    <input type="email" id="filtro_email" placeholder="Correo del cliente">
                </div>
                <div class="campo2">
                    <label for="filtro_celular">Celular:</label>
                    <input type="text" id="filtro_celular" placeholder="Celular del cliente">
                </div>
                <div class="botones boton-buscar-cliente">
                    <button type="button" class="btn_buscar_cliente btn-buscar"   id="btn_buscar_cliente">Buscar</button>
                </div>
        

            </div>

                    <!-- Resultado de la búsqueda -->
                <div id="resultados_clientes"></div>



<!-- Cliente Principal -->


                    <div class="h3">
                         <h3> Información del Cliente Principal</h3>
                    </div>

                    <!-- FILA 1 -->
                    <div class="contenido-campo2">

                            <div class="campo2 campo-nombre">
                                <label for="nombre">Nombre y Apellidos:</label>
                                <input type="text" id="nombre" placeholder="Nombres y Apellidos" name="nombre" value="<?php echo s($ventas->nombre ?? ''); ?>">
                            </div> 

                            <div class="campo2 campo-nacimiento">
                                <label for="nacimiento">F. Nacimiento:</label>
                                <input type="date" id="nacimiento" name="nacimiento" value="<?php echo s($ventas->nacimiento ?? ''); ?>" required>
                            </div>

                            <div class="campo2 campo-ciudad-nacimiento">
                                <label for="ciudad-nacimiento">C. Nacimiento:</label>
                                <select name="c_nacimiento" id="c_nacimiento" required>
                                    <option value="" disabled selected hidden>seleccione ciudad</option>
                                    <?php foreach ($options4 as $ciudad) : ?>
                                        <option value="<?php echo s($ciudad['id']); ?>"
                                            <?php echo (isset($ventas->ciudad) && $ventas->ciudad == $ciudad['id']) ? 'selected' : ''; ?>>
                                            <?php echo s($ciudad['ciudad']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                             <div class="campo2 campo-sexo">
                                <label for="sexo">Genero:</label>
                                <select id="sexo" name="sexo" required>
                                    <option value="" disabled selected hidden>Genero</option>
                                    <option value="masculino" <?php echo ($ventas->sexo ?? '') === 'masculino' ? 'selected' : ''; ?>>MASCULINO</option>
                                    <option value="femenino" <?php echo ($ventas->sexo ?? '') === 'femenino' ? 'selected' : ''; ?>>FEMENINO</option>
                                </select>
                            </div>

                        </div>
  
                        <!-- FILA 2 -->
                        <div class="contenido-campo3">
                        
                            <div class="campo2 campo-tipo-cedula">
                                <label for="tipo_cedula">T.DOC:</label>
                                    <select id="t_documento" name="t_documento" required>
                                        <option value="" disabled selected hidden>Tipo</option>
                                        <option value="cc" <?php echo ($ventas->t_documento ?? '') === 'cc' ? 'selected' : ''; ?>>C.C</option>
                                        <option value="ce" <?php echo ($ventas->t_documento ?? '') === 'ce' ? 'selected' : ''; ?>>C.E</option>
                                        <option value="rc" <?php echo ($ventas->t_documento ?? '') === 'rc' ? 'selected' : ''; ?>>R.C</option>
                                        <option value="ti" <?php echo ($ventas->t_documento ?? '') === 'ti' ? 'selected' : ''; ?>>T.I</option>
                                        <option value="pasaporte" <?php echo ($ventas->t_documento ?? '') === 'pasaporte' ? 'selected' : ''; ?>>PASAPORTE</option>
                                        <option value="otro" <?php echo ($ventas->t_documento ?? '') === 'otro' ? 'selected' : ''; ?>>OTRO</option>
                                    </select>
                            </div>

                            <div class="campo2 campo-otro_doc">
                                <label for="otro_doc">Otro. Cual?:</label>
                                <input type="text" id="otro_doc" placeholder="Describa tipo de doc" name="otro_doc" value="<?php echo s($ventas->otro_doc ?? ''); ?>">
                            </div>

                            <div class="campo2 campo-cedula">
                                <label for="cedula">N° Cédula:</label>
                                <input type="text" pattern="\d+" id="cedula" placeholder="Cédula" name="cedula" maxlength="10" value="<?php echo s($ventas->cedula ?? ''); ?>">
                            </div> 
    
                             <div class="campo2 campo-expedicion">
                                <label for="expedicion">F. Expedición:</label>
                                <input type="date" id="expedicion" placeholder="Fecha de Expedición" name="expedicion" value="<?php echo s($ventas->expedicion ?? ''); ?>" required>
                            </div>

                            <div class="campo2 campo-lugarexp">
                                <label for="lugarexp">Ciudad Expedición:</label>
                                <select name="lugarexp" id="lugarexp" required>
                                    <option value="" disabled selected hidden>Seleccione Ciudad</option>
                                    <?php foreach ($options4 as $ciudad) : ?>
                                        <option value="<?php echo s($ciudad['id']); ?>"
                                            <?php echo (isset($ventas->lugarexp) && $ventas->lugarexp == $ciudad['lugarexp']) ? 'selected' : ''; ?>>
                                            <?php echo s($ciudad['ciudad']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- FILA 3 -->
                        <div class="contenido-campo4">

                            <div class="campo2 campo-celular">
                                <label for="celular">Celular1:</label>
                                <input type="text" id="celular" placeholder="Celular" name="celular" maxlength="10" value="<?php echo s($ventas->celular ?? ''); ?>">
                            </div> 

                            <div class="campo2 campo-celula2">
                                <label for="celular2">Celular2:</label>
                                <input type="text" id="celular2" placeholder="Celular2" name="celular2" maxlength="10" value="<?php echo s($ventas->celular ?? ''); ?>">
                            </div> 

                            <div class="campo2 campo-civil">
                                <label for="civil">Estado Civil:</label>
                                <select id="civil" name="civil" required>
                                <option value="" disabled selected hidden>Estado Civil</option>
                                <option value="soltero" <?php echo ($ventas->civil ?? '') === 'soltero' ? 'selected' : ''; ?>>SOLTERO(A)</option>
                                <option value="casado" <?php echo ($ventas->civil ?? '') === 'casado' ? 'selected' : ''; ?>>CASADO(A)</option>
                                <option value="union_libre" <?php echo ($ventas->civil ?? '') === 'union_libre' ? 'selected' : ''; ?>>UNION LIBRE</option>
                                <option value="separado" <?php echo ($ventas->civil ?? '') === 'separado' ? 'selected' : ''; ?>>SEPARADO(A)</option>
                                <option value="viudo" <?php echo ($ventas->civil ?? '') === 'viudo' ? 'selected' : ''; ?>>VIUDO(A)</option>
                            </select>
                            </div>

                            <div class="campo2 campo-nacionalidad">
                                <label for="nacionalidad">Nacionalidad:</label>
                                <select id="nacionalidad" name="nacionalidad" required>
                                    <option value="" disabled selected hidden>Nacionalidad</option>
                                    <option value="colombiano" <?php echo ($ventas->nacionalidad ?? '') === 'colombiano' ? 'selected' : ''; ?>>COLOMBIANO</option>
                                    <option value="extranjera" <?php echo ($ventas->nacionalidad ?? '') === 'extranjera' ? 'selected' : ''; ?>>EXTRANJERA</option>
                                </select>
                            </div>

                            <div class="campo2 campo-otro-nac">
                                <label for="otro_nac">cual?:</label>
                                <input type="text" id="otro_nac" placeholder="cual" name="otro_nac" value="<?php echo s($ventas->otro_nac ?? ''); ?>">
                            </div>
                        </div>

                    <!-- FILA 4 -->
                    <div class="contenido-campo5">

                            <div class="campo2 campo-direccion">
                                <label for="direccion">Dirección:</label>
                                <input type="text" id="direccion" placeholder="Dirección de residencia" name="direccion" value="<?php echo s($ventas->direccion ?? ''); ?>">
                            </div>

                            <div class="campo2 campo-ciudad">
                                <label for="ciudad">Ciudad:</label>
                                <select name="ciudad" id="ciudad" required>
                                    <option value="" disabled selected hidden>Seleccione Ciudad</option>
                                    <?php foreach ($options4 as $ciudad) : ?>
                                        <option value="<?php echo s($ciudad['id']); ?>"
                                            <?php echo (isset($ventas->ciudad) && $ventas->ciudad == $ciudad['id']) ? 'selected' : ''; ?>>
                                            <?php echo s($ciudad['ciudad']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="campo2 campo-departamento">
                                <label for="departamento">Departamento:</label>
                                <select name="departamento" id="departamento" required>
                                    <option value="" disabled selected hidden>Seleccione un departamento</option>
                                    <?php foreach ($options5 as $departamento) : ?>
                                        <option value="<?php echo s($departamento['id']); ?>"
                                            <?php echo (isset($ventas->departamento) && $ventas->departamento == $departamento['id']) ? 'selected' : ''; ?>>
                                            <?php echo s($departamento['depto']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                    </div>

                    <!-- FILA 5 -->
                    <div class="contenido-campo">
                             <div class="campo2 campo-pais">
                                <label for="pais">País:</label>
                                <select name="pais" id="pais" required>
                                    <option value="" disabled selected hidden>-- Seleccione un país --</option>
                                    <?php foreach ($options6 as $pais) : ?>
                                        <option value="<?php echo s($pais['id']); ?>"
                                            <?php echo (isset($ventas->pais) && $ventas->pais == $pais['id']) ? 'selected' : ''; ?>>
                                            <?php echo s($pais['pais']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

    
                            <div class="campo2 campo-email">
                                <label for="email">Email:</label>
                                <input type="email" id="email" placeholder="Email" name="email" value="<?php echo s($ventas->email ?? ''); ?>">
                            </div> 

                         </div>

                            <div class="upload-group campo-archivo1">
                                <label for="archivo" class="file-label">
                                    <span>📁 Adjunto1</span>
                                </label>
                                <input type="file" id="archivo" name="archivo">
                                <span class="file-name">Ningún archivo seleccionado</span>
                                </div>

                                <div class="upload-group campo-archivo2">
                                <label for="archivo2" class="file-label">
                                    <span>📁 Adjunto2</span>
                                </label>
                                <input type="file" id="archivo2" name="archivo2">
                                <span class="file-name">Ningún archivo seleccionado</span>
                            </div>




                       
                    

<!-- Cliente segundo -->

            <div class="acordeon">
                        <button class="acordeon-titulo">➤ Información Segundo Cliente</button>
                    <div class="acordeon-contenido">
                        <div class="contenido-campo">

                            <div class="campo2 campo-nombre">
                                <label for="nombre2">Nombre y Apellidos:</label>
                                <input  type="text" name="asociados[0][nombre]" id="nombre2" placeholder="Nombres y Apellidos">
                            </div> 

                            <div class="campo2 campo-nacimiento">
                                <label for="nacimiento2">Fecha de Nacimiento:</label>
                                <input type="date" id="nacimiento2" name="asociados[0][nacimiento]">
                            </div>

                            <div class="campo2 campo-civil">
                                <label for="civil2">Estado Civil:</label>
                                <select id="civil2" name="asociados[0][civil]">
                                <option value="">-- Seleccione --</option>
                                <option value="soltero">SOLTERO(A)</option>
                                <option value="casado">CASADO(A)</option>
                                <option value="union_libre">UNIÓN LIBRE</option>
                                <option value="separado">SEPARADO(A)</option>
                                <option value="viudo">VIUDO(A)</option>
                            </select>
                            </div>

                            <div class="campo2 campo-cedula">
                                <label for="cedula22">Cédula:</label>
                                <input type="text" pattern="\d+" id="cedula22" placeholder="Cédula" name="asociados[0][cedula]">
                            </div> 

                            <div class="campo2 campo-expedicion">
                                <label for="expedicion2">Fecha de Expedición:</label>
                                <input type="date" id="expedicion2" placeholder="Fecha de Expedición" name="asociados[0][expedicion]">
                            </div>

                            <div class="campo2 campo-lugarexp">
                                <label for="lugarexp2">Lugar de Expedición:</label>
                                <input type="text" id="lugarexp2" placeholder="Lugar de Expedición" name="asociados[0][lugarexp]">
                            </div>

                            <div class="campo2 campo-celular">
                                <label for="celular2">Celular:</label>
                                <input  type="text" id="celular2" placeholder="Celular" name="sociados[0][celular]">
                            </div> 

                            <div class="campo2 campo-email">
                                <label for="email2">Email:</label>
                                <input type="email" id="email2" placeholder="Email" name="asociados[0][email]">
                            </div> 

                            <div class="campo2 campo-ciudad">
                                <label for="ciudad2">Ciudad:</label>
                                <input type="text" id="ciudad2" placeholder="Ciudad de residencia" name="asociados[0][ciudad]">
                            </div>

                            <div class="campo2 campo-direccion">
                                <label for="direccion2">Dirección:</label>
                                <input type="text" id="direccion2" placeholder="Dirección de residencia" name="asociados[0][direccion]">
                            </div>
                        
                            <div class="campo2 campo-nacionalidad">
                                <label for="nacionalidad2">Nacionalidad:</label>
                                <input type="text" id="nacionalidad2" placeholder="Nacionalidad" name="nasociados[0][nacionalidad]">
                            </div>

                            <div class="campo-archivo">
                                <label for="archivo3">Cedula Frente:</label>
                                <input type="file" id="archivo3" name="asociados[0][cedula1]" accept="image/*,application/pdf">

                                <label for="archivo4">Cedula Reversa:</label>
                                <input type="file" id="archivo4" name="asociados[0][cedula2]" accept="image/*,application/pdf">
                            </div> 
                        </div>
                    </div>
                </div>


<!-- tercer cliente -->

                <div class="acordeon">
                        <button class="acordeon-titulo">➤ Información Tercer Cliente</button>
                    <div class="acordeon-contenido">
                        <div class="contenido-campo">

                            <div class="campo2 campo-nombre">
                                <label for="nombre2">Nombre y Apellidos:</label>
                                <input  type="text" name="asociados[2][nombre]" id="nombre2" placeholder="Nombres y Apellidos">
                            </div> 

                            <div class="campo2 campo-nacimiento">
                                <label for="nacimiento2">Fecha de Nacimiento:</label>
                                <input type="date" id="nacimiento2" name="asociados[2][nacimiento]">
                            </div>

                            <div class="campo2 campo-civil">
                                <label for="civil2">Estado Civil:</label>
                                <select id="civil2" name="asociados[2][civil]">
                                <option value="">-- Seleccione --</option>
                                <option value="soltero">SOLTERO(A)</option>
                                <option value="casado">CASADO(A)</option>
                                <option value="union_libre">UNIÓN LIBRE</option>
                                <option value="separado">SEPARADO(A)</option>
                                <option value="viudo">VIUDO(A)</option>
                            </select>
                            </div>

                            <div class="campo2 campo-cedula">
                                <label for="cedula22">Cédula:</label>
                                <input type="text" pattern="\d+" id="cedula22" placeholder="Cédula" name="asociados[2][cedula]">
                            </div> 

                            <div class="campo2 campo-expedicion">
                                <label for="expedicion2">Fecha de Expedición:</label>
                                <input type="date" id="expedicion2" placeholder="Fecha de Expedición" name="asociados[2][expedicion]">
                            </div>

                            <div class="campo2 campo-lugarexp">
                                <label for="lugarexp2">Lugar de Expedición:</label>
                                <input type="text" id="lugarexp2" placeholder="Lugar de Expedición" name="asociados[2][lugarexp]">
                            </div>

                            <div class="campo2 campo-celular">
                                <label for="celular2">Celular:</label>
                                <input  type="text" id="celular2" placeholder="Celular" name="sociados[2][celular]">
                            </div> 

                            <div class="campo2 campo-email">
                                <label for="email2">Email:</label>
                                <input type="email" id="email2" placeholder="Email" name="asociados[2][email]">
                            </div> 

                            <div class="campo2 campo-ciudad">
                                <label for="ciudad2">Ciudad:</label>
                                <input type="text" id="ciudad2" placeholder="Ciudad de residencia" name="asociados[2][ciudad]">
                            </div>

                            <div class="campo2 campo-direccion">
                                <label for="direccion2">Dirección:</label>
                                <input type="text" id="direccion2" placeholder="Dirección de residencia" name="asociados[2][direccion]">
                            </div>
                        
                            <div class="campo2 campo-nacionalidad">
                                <label for="nacionalidad2">Nacionalidad:</label>
                                <input type="text" id="nacionalidad2" placeholder="Nacionalidad" name="nasociados[2][nacionalidad]">
                            </div>

                            <div class="campo-archivo">
                                <label for="archivo3">Cedula Frente:</label>
                                <input type="file" id="archivo3" name="asociados[2][cedula1]" accept="image/*,application/pdf"">

                                <label for="archivo4">Cedula Reversa:</label>
                                <input type="file" id="archivo4" name="asociados[2][cedula2]" accept="image/*,application/pdf"">
                            </div> 
                        </div>
                    </div>
                </div>


<!-- cuarto cliente -->

                <div class="acordeon">
                        <button class="acordeon-titulo">➤ Información Tercer Cliente</button>
                    <div class="acordeon-contenido">
                        <div class="contenido-campo">

                            <div class="campo2 campo-nombre">
                                <label for="nombre2">Nombre y Apellidos:</label>
                                <input  type="text" name="asociados[1][nombre]" id="nombre2" placeholder="Nombres y Apellidos">
                            </div> 

                            <div class="campo2 campo-nacimiento">
                                <label for="nacimiento2">Fecha de Nacimiento:</label>
                                <input type="date" id="nacimiento2" name="asociados[1][nacimiento]">
                            </div>

                            <div class="campo2 campo-civil">
                                <label for="civil2">Estado Civil:</label>
                                <select id="civil2" name="asociados[1][civil]">
                                <option value="">-- Seleccione --</option>
                                <option value="soltero">SOLTERO(A)</option>
                                <option value="casado">CASADO(A)</option>
                                <option value="union_libre">UNIÓN LIBRE</option>
                                <option value="separado">SEPARADO(A)</option>
                                <option value="viudo">VIUDO(A)</option>
                            </select>
                            </div>

                            <div class="campo2 campo-cedula">
                                <label for="cedula22">Cédula:</label>
                                <input type="text" pattern="\d+" id="cedula22" placeholder="Cédula" name="asociados[1][cedula]">
                            </div> 

                            <div class="campo2 campo-expedicion">
                                <label for="expedicion2">Fecha de Expedición:</label>
                                <input type="date" id="expedicion2" placeholder="Fecha de Expedición" name="asociados[1][expedicion]">
                            </div>

                            <div class="campo2 campo-lugarexp">
                                <label for="lugarexp2">Lugar de Expedición:</label>
                                <input type="text" id="lugarexp2" placeholder="Lugar de Expedición" name="asociados[1][lugarexp]">
                            </div>

                            <div class="campo2 campo-celular">
                                <label for="celular2">Celular:</label>
                                <input  type="text" id="celular2" placeholder="Celular" name="sociados[1][celular]">
                            </div> 

                            <div class="campo2 campo-email">
                                <label for="email2">Email:</label>
                                <input type="email" id="email2" placeholder="Email" name="asociados[1][email]">
                            </div> 

                            <div class="campo2 campo-ciudad">
                                <label for="ciudad2">Ciudad:</label>
                                <input type="text" id="ciudad2" placeholder="Ciudad de residencia" name="asociados[1][ciudad]">
                            </div>

                            <div class="campo2 campo-direccion">
                                <label for="direccion2">Dirección:</label>
                                <input type="text" id="direccion2" placeholder="Dirección de residencia" name="asociados[1][direccion]">
                            </div>
                        
                            <div class="campo2 campo-nacionalidad">
                                <label for="nacionalidad2">Nacionalidad:</label>
                                <input type="text" id="nacionalidad2" placeholder="Nacionalidad" name="nasociados[1][nacionalidad]">
                            </div>

                            <div class="campo-archivo">
                                <label for="archivo3">Cedula Frente:</label>
                                <input type="file" id="archivo3" name="asociados[1][cedula1]" accept="image/*,application/pdf"">

                                <label for="archivo4">Cedula Reversa:</label>
                                <input type="file" id="archivo4" name="asociados[1][cedula2]" accept="image/*,application/pdf"">
                            </div> 
                        </div>
                    </div>
                </div>

                    <div class="botones">
                        <button type="button" class="btn-siguiente" onclick="mostrarPagina(2)">Siguiente</button>
                    </div>

                    </div>
                    
            
            

<!-- Información del Proyecto -->

    <!-- Página 2: Información del Proyecto encabezado  -->

                <div class="pagina" id="pagina2">

                        <div class="encabezado2">
                        <p class="nombre2">Información del Proyecto</p>
                        <hr/>
                        </div>

    <!-- seccion bucadro por proyecto y lote -->


                        <div class="informacion-proyecto cuatro-partes">
                            <div class="parte campo-proyecto campo2">
                                <label for="proyecto">Proyecto</label>
                                <select name="proyecto" id="proyecto" required>
                                    <option value="" disabled selected hidden>-- Seleccione Proyecto --</option>
                                    <?php foreach ($options as $option) { ?>
                                        <option value="<?php echo $option['nombre']; ?>">
                                            <?php echo $option['nombre']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="parte campo-lote campo2">
                                <label for="lote">Lote</label>
                                <input type="number" id="lote" placeholder="Número de lote" name="lote" value="" required>
                            </div>  

                            <div class="parte campo-buscar-estado botones">
                                <button for="buscar" type="button" class="btn-buscar" id="buscar">Buscar</button>
                            </div>

                        </div>

                         <div class="contenido-informacion">

                         <div class="parte campo-estado-lote campo2">
                                <label for="estado">Estado Lote</label>
                                <input type="text" id="estado" name="estado" readonly>
                            </div>

                         <div class="campo-etapa campo2">
                            <label for="etapa">Etapa</label>
                            <input type="number" id="etapa" name="etapa" readonly>
                        </div>

                        <div class="campo-area campo2 ">
                            <label for="aream">Metros²</label>
                            <input type="text" id="aream" name="aream" readonly>
                        </div>

                        <div class="campo-valor_area campo2 ">
                            <label for="valor_aream">Valor Mtr2</label>
                            <input type="text" id="valor_aream" name="valor_aream" step="0.01" readonly class="moneda">
                        </div>
                </div>
                    
<!-- seccion informacion general del lote y descueto ofrecido -->

                        <div class="h3">
                            <h3> Información Precios y Descuentos</h3>
                        </div>
                
               

                <div class="contenido-informacion2">

                        <div class="campo-inline3 campo-restante-porc campo2">
                            <label for="porcen_restante">% cuota restante</label>
                            <input type="text" id="porcen_restante" name="porcen_restante">
                        </div> 

                        <div class="campo-total campo2 campo-inline3">
                            <label for="valor_total">Valor del lote</label>
                            <input type="text" id="valor_total" name="valor_total" step="0.01" class="moneda">
                        </div>

                        <div class="campo-descuento campo2 campo-inline3">
                            <label for="descuento">Descuento</label>
                            <input type="text" id="descuento" name="descuento" min="0" max="12" step="0.01" class="moneda" placeholder="valor sin puntos ni comas">
                        </div>

                        <div class="campo-venta campo2 campo-inline3">
                            <label for="valor_venta">Valor venta</label>
                            <input type="text" id="valor_venta" name="valor_venta" step="0.01" readonly class="moneda">
                        </div>

                        <div class="campo-inline3 campo-iniporc campo2">
                            <label for="porcen_inicial">% cuota inicial</label>
                            <input type="text" id="porcen_inicial" name="porcen_inicial">
                        </div>

                        <div class="campo-inline3 campo-inicial campo2">
                            <label for="cuota_inicial">cuota inicial</label>
                            <input type="text" id="cuota_inicial" name="cuota_inicial" min="0" max="12" step="0.01" readonly class="moneda">
                        </div>

                        <div class="campo-inline3 campo-separacion campo2">
                            <label for="separacion">separación</label>
                            <input type="text" id="separacion" name="separacion" min="0" max="12" step="0.01" class="moneda" placeholder="valor sin puntos ni comas">
                        </div>

                        <div class="campo-inline3 campo-pendiente-inicial campo2">
                            <label for="saldo_inicial">pendiente inicial</label>
                            <input type="text" id="saldo_inicial" name="saldo_inicial" readonly class="moneda">
                        </div>

                        <div class="campo-inline3 campo-observaciones campo2">
                            <label for="obserdescu">Observaciones</label>
                            <input type="text" id="obserdescu" name="obserdescu" placeholder="observaciones de descuento">
                        </div>

                
                        <div class="campo-archivo">
                            <label for="doc_separacion">Archivo:</label>
                            <input 
                                type="file" 
                                id="doc_separacion" 
                                name="doc_separacion" 
                                accept="image/*,application/pdf">
                        </div>

                </div>   

                

<!-- Información Cuota Inicial -->
                        <div class="h3">
                            <h3> Información cuotas iniciales</h3>
                        </div>
                    
                <div class="contenido-inicial2">
                        <div class="campo-cuotas-inicial  campo2">
                            <label for="numcuota_inicial">N° cuotas</label>
                            <input type="text" id="numcuota_inicial" name="numcuota_inicial" autocomplete="off">
                        </div>
                </div>
<!-- Numero de Cuotas restantes-->
                        <?php 
                        // Número total de cuotas
                        $cuotas = 12; 
                        ?>

                        <div class="cuotas-fechas">
                        <?php for ($i = 1; $i <= $cuotas; $i++): ?>
                                <div class="fila-cuota">
                                <div class="campo-inline4 campo2">
                                    <label for="cuota<?= $i ?>">Cuota <?= $i ?></label>
                                    <input type="text" id="cuota<?= $i ?>" name="valcuota_inicial<?= $i ?>" readonly class="moneda">
                                </div>

                                <div class="campo-inline4 campo2">
                                    <label for="fecha_cuota<?= $i ?>">Fecha <?= $i ?></label>
                                    <input type="date" id="fecha_cuota<?= $i ?>" name="feccuota_inicial<?= $i ?>" >
                                </div>
                            </div>
                        <?php endfor; ?>
                        </div>

<!-- Información Cuotas restantes-->
                <div class="h3">
                            <h3> Información Cuotas valor Restante</h3>
                        </div>

                <div class="contenido-restante1">

                        <div class="campo-inline3 campo-menos-inicial campo2">
                            <label for="valor_restante">Valor menos cuota inicial</label>
                            <input type="text" id="valor_restante" name="valor_restante" readonly class="moneda">
                        </div>

                        <div class="campo-inline3 campo-cuotas-restantes campo2">
                            <label for="numcuota_restante">Número de cuotas</label>
                            <input type="text" id="numcuota_restante" name="numcuota_restante" >
                        </div>
                </div>

                

<!-- campo de cada cuota restante-->
                        <?php
                        $cuotasRestantes = 48;
                        ?>

                    <div id="contenedor_cuotas_restantes" class=cuotas-fechas2>

                    <?php for ($i = 1; $i <= $cuotasRestantes; $i++): ?>
                        <div class="fila-cuota2">
                            <div class="campo-inline4 campo2">
                                <label for="valor_cuotas_restante<?= $i ?>">Cuota <?= $i ?></label>
                                <input type="text" id="valor_cuotas_restante<?= $i ?>" name="valcuota_restante<?= $i ?>" class="cuota-restante-input moneda">
                            </div>

                            <div class="campo-inline4 campo2">
                                <label for="fecha_pago<?= $i ?>">Fecha <?= $i ?></label>
                                <input type="date" id="fecha_pago<?= $i ?>" name="feccuota_restante<?= $i ?>">
                            </div>

                        </div>
                        <?php endfor; ?>
                </div>
                
<!-- Información Adicional -->
                        <div class="h3">
                            <h3> Información Adicional</h3>
                        </div>

                        <div class="campo2 campo-inline">
                        <label for="estado_lote">Estado Venta</label>
                            <select name="estado_lote" id="estado_lote" required>
                                <option value="separado">SEPARADO</option>
                            </select>
                        </div>


                    <div class="contenido-agentes">

                        <!-- 🔹 Agente 1 -->
                        <div class="grupo-agente">
                            <div class="campo2 campo-agente1">
                                <label for="agente1_id">Agente 1</label>
                                <select name="agentes[principal]" id="agente1_id" required>
                                    <option value="">-- Seleccione un agente --</option>
                                    <?php foreach ($options3 as $agente) : ?>
                                        <option value="<?php echo s($agente['id']); ?>"
                                            <?php echo (isset($ventas->agente1_id) && $ventas->agente1_id == $agente['id']) ? 'selected' : ''; ?>>
                                            <?php echo s($agente['nombre']); ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="campo2 campo-porcentaje1">
                                <label for="porcentaje1">% aplicado</label>
                                <input type="text" id="porcentaje1" name="porcentaje1" value="100" inputmode="decimal">
                            </div>

                            <div class="campo2 campo-valor1">
                                <label for="valorAgente1">Valor</label>
                                <input type="text" id="valorAgente1" name="valorAgente1" readonly>
                            </div>
                        </div>

                        <!-- 🔹 Agente 2 -->
                        <div class="grupo-agente">
                            <div class="campo2 campo-agente2">
                                <label for="agente2_id">Agente 2</label>
                                <select name="agentes[secundario]" id="agente2_id">
                                    <option value="">-- Seleccione un agente --</option>
                                    <?php foreach ($options3 as $agente) : ?>
                                        <option value="<?php echo s($agente['id']); ?>"
                                            <?php echo (isset($ventas->agente2_id) && $ventas->agente2_id == $agente['id']) ? 'selected' : ''; ?>>
                                            <?php echo s($agente['nombre']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="campo2 campo-porcentaje2">
                                <label for="porcentaje2">% aplicado</label>
                                <input type="text" id="porcentaje2" name="porcentaje2" inputmode="decimal">
                            </div>

                            <div class="campo2 campo-valor2">
                                <label for="valorAgente2">Valor</label>
                                <input type="text" id="valorAgente2" name="valorAgente2" readonly>
                            </div>
                        </div>

                        <!-- 🔹 Agente 3 -->
                        <div class="grupo-agente">
                            <div class="campo2 campo-agente3">
                                <label for="agente3_id">Agente 3</label>
                                <select name="agentes[adicional]" id="agente3_id">
                                    <option value="">-- Seleccione un agente --</option>
                                    <?php foreach ($options3 as $agente) : ?>
                                        <option value="<?php echo s($agente['id']); ?>"
                                            <?php echo (isset($ventas->agente3_id) && $ventas->agente3_id == $agente['id']) ? 'selected' : ''; ?>>
                                            <?php echo s($agente['nombre']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="campo2 campo-porcentaje3">
                                <label for="porcentaje3">% aplicado</label>
                                <input type="text" id="porcentaje3" name="porcentaje3" inputmode="decimal">
                            </div>

                            <div class="campo2 campo-valor3">
                                <label for="valorAgente3">Valor</label>
                                <input type="text" id="valorAgente3" name="valorAgente3" readonly>
                            </div>
                        
                        
                        
                        </div>

                        <div class="botones">
                            <button type="button" class="btn-anterior" onclick="mostrarPagina(1)">Anterior</button>
                            <button type="submit" class="btn-enviar">Enviar</button>
                        </div>

<a id="btnPDF"
   href="/proyeccion/generarPDF"
   class="btn btn-warning"
   target="_blank">
   📄 Generar PDF
</a>




                    </div>

                                    
    </form>


<!-- Script -->
    <script src="/build/js/buscarProyecto.js"></script>
    <script src="/build/js/buscarCliente.js"></script>
    <?php include_once __DIR__ . '/footer-dashboard.php'; ?>