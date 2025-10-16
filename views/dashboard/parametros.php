<?php  include_once __DIR__ . '/header-dashboard.php'; ?>

       

<div class="contenedor">
                
            <div class="contenedor-sm">

                <div class="encabezado-p">
                <p class="nombre-p">Informacion General</p><hr/>
                </div>

                <div class="grip">
                    
                    <div class="parametro">
                        
                            <a href="/informacion_agente">
                            <div class="icono-parametro">
                            <i class="fa-solid fa-user-tie"></i>
                            </div>
                            </a>
                            <div class="informacion-parametro">
                            <a href="/informacion_agente">Información Empleado</a>
                            </div>
                        
                    </div>

                    <div class="parametro">
                        <a href="/listado_proyectos">
                        <div class="icono-parametro">
                        <i class="fa-solid fa-building"></i>
                        </div>
                        <div class="informacion-parametro">
                        <a href="/listado_proyectos">Listado Proyectos</a>
                        </div></a>
                    </div>

                    <div class="parametro">
                        <a href="informacion_proyectos">
                        <div class="icono-parametro">
                        <i class="fa-solid fa-pen-ruler"></i>
                        </div>
                        <div class="informacion-parametro">
                        <a href="#">Información Proyectos</a>
                        </div></a>
                    </div>
                </div>
            </div>

            <div class="contenedor-sm">
        
                <div class="encabezado-p">
                <p class="nombre-p">Parametros Administrativos</p><hr/>
                </div>

                <div class="grip">

                    <div class="parametro">
                        <a href="#">
                        <div class="icono-parametro">
                        <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <div class="informacion-parametro">
                        <a href="/informacion_agente">Tipos de Negocio</a>
                        </div></a>
                    </div>

                    <div class="parametro">
                        <a href="#">
                        <div class="icono-parametro">
                        <i class="fa-solid fa-house"></i>
                        </div>
                        <div class="informacion-parametro">
                        <a href="#">Tipos de Inmuebles</a>
                        </div></a>
                    </div>

                    <div class="parametro">
                        <a href="#">
                        <div class="icono-parametro">
                        <i class="fa-solid fa-lightbulb"></i>
                        </div>
                        <div class="informacion-parametro">
                        <a href="/estado_ventas">Estados del Inmueble</a>
                        </div></a>
                    </div>

                    <div class="parametro">
                        <a href="#">
                        <div class="icono-parametro">
                        <i class="fa-solid fa-handshake"></i>
                        </div>
                        <div class="informacion-parametro">
                        <a href="#">Tpos de Servicios</a>
                        </div></a>
                    </div>

                    <div class="parametro">
                        <a href="#">
                        <div class="icono-parametro">
                        <i class="fa-solid fa-id-card"></i>
                        </div>
                        <div class="informacion-parametro">
                        <a href="#">Tipos de Documentos</a>
                        </div></a>
                    </div>

                </div>
            </div>
</div>




    





<?php  include_once __DIR__ . '/footer-dashboard.php'; ?>


<?php 
$script = '

    <script src="build/js/ventana.js"></script> 

'; 
?>