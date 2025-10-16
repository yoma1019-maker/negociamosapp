<?php  include_once __DIR__ . '/header-dashboard.php'; ?>
                
        
    <div class="contenedor-sm">


        <form class="formulario-clientes" method="POST" action="formulario_clientes"> 

            <div class="encabezado-cliente">
            <p class="nombre2-cliente">CREAR NUEVO CLIENTE</p><hr/>
            </div> 
            
            <div class="contenido-campo-cliente">

                            <div class="campo2 campo-nombre">
                                <label for="nombre">Nombre y Apellidos:</label>
                                <input 
                                    type="text" 
                                    id="nombre" 
                                    placeholder="Nombres y Apellidos" 
                                    name="nombre" 
                                    value="<?php echo s($ventas->nombre ?? ''); ?>">
                            </div> 

                            <div class="campo2 campo-celular">
                                <label for="celular">Celular:</label>
                                <input 
                                    type="text" 
                                    id="celular" 
                                    placeholder="Celular" 
                                    name="celular" 
                                    maxlength="10"
                                    value="<?php echo s($ventas->celular ?? ''); ?>">
                            </div> 

                            <div class="campo2 campo-celular">
                                <label for="celular2">Celular:</label>
                                <input 
                                    type="text" 
                                    id="celular2" 
                                    placeholder="Celular2" 
                                    name="celular2" 
                                    maxlength="10"
                                    value="<?php echo s($ventas->celular ?? ''); ?>">
                            </div> 

                            <div class="campo2 campo-email">
                                <label for="email">Email:</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    placeholder="Email" 
                                    name="email" 
                                    value="<?php echo s($ventas->email ?? ''); ?>">
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

                            <div class="grupo-agente">
                            <div class="campo2 campo-agente1">
                                <label for="agente_id">Agente</label>
                                <select name="agente_id" id="agente_id" required>
                                    <option value="">-- Seleccione un agente --</option>
                                    <?php foreach ($options3 as $agente) : ?>
                                        <option value="<?php echo s($agente['id']); ?>"
                                            <?php echo (isset($clientes->agente_id) && $clientes->agente_id == $agente['id']) ? 'selected' : ''; ?>>
                                            <?php echo s($agente['nombre']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                    </div>

                
                        <div class="botones">
                            <div>
                            <a href="informacion_agente" id="anterior" class="boton3" >&laquo; Regresar</a>
                            </div>
                            <input type="submit" class="boton2" value="Crear">
                        </div>
         </form>
        
    </div>   


<?php  include_once __DIR__ . '/footer-dashboard.php'; ?>