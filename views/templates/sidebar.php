<aside class="dashboard__sidebar">

      <nav class="dashboard__menu">

         <a href="/dashboard/index" class="dashboard__enlace">
            <i class="fa-solid fa-house"></i>
            <span class="dashboard__menu-texto">
            inicio
            </span>
         </a>

         <a href="/agenda" class="dashboard__enlace  <?php echo ($titulo === 'Agenda') ? 'activo' : ''; ?>">
            <i class="fa-solid fa-address-book"></i>
            <span class="dashboard__menu-texto">
            Agenda
            </span>
         </a>

         <a href="/proyectos" class="dashboard__enlace  <?php echo ($titulo === 'Proyectos') ? 'activo' : ''; ?>">
            <i class="fa-solid fa-house"></i>
            <span class="dashboard__menu-texto">
            Proyectos Disponibles
            </span>
         </a>

         <a href="/clientes" class="dashboard__enlace  <?php echo ($titulo === 'Clientes') ? 'activo' : ''; ?>">
            <i class="fa-solid fa-people-group"></i>
            <span class="dashboard__menu-texto">
            Clientes
            </span>
         </a>

         <a href="/ventas" class="dashboard__enlace  <?php echo ($titulo === 'Ventas') ? 'activo' : ''; ?>">
            <i class="fa-solid fa-money-bill-trend-up"></i>
            <span class="dashboard__menu-texto">
            Ventas
            </span>
         </a>


         <a href="/cartera" class="dashboard__enlace  <?php echo ($titulo === 'Cartera') ? 'activo' : ''; ?>">
            <i class="fa-solid fa-briefcase"></i>
            <span class="dashboard__menu-texto">
            Cartera
            </span>
         </a>

         <a href="/parametros" class="dashboard__enlace  <?php echo ($titulo === 'Parametros') ? 'activo' : ''; ?>">
            <i class="fa-solid fa-sliders"></i>
            <span class="dashboard__menu-texto">
            Parametros
            </span>
         </a>

         <a href="/seguridad" class="dashboard__enlace  <?php echo ($titulo === 'Seguridad') ? 'activo' : ''; ?>">
            <i class="fa-solid fa-user-lock"></i>
            <span class="dashboard__menu-texto">
            Seguridad
            </span>
         </a>

      </nav>


</aside>