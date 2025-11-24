<!-- Sidebar del menú -->
<div class="app-sidebar" id="sidebar">
    <!-- Perfil del Usuario -->
    <div class="sidebar-profile">
        <div class="user-avatar">
            <img src="./src/files/photos/<?php echo $_SESSION['cedula']?>.png" alt="User Profile" onerror="this.src='./public/assets/images/icons/favicon.webp'">
        </div>
        <div class="user-info">
            <h6 class="user-name"><?php echo $_SESSION['user'] ?></h6>
            <span class="user-email"><?php echo $_SESSION['rol'] ?></span>
            <div class="user-socials">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-github"></i></a>
            </div>
        </div>
    </div>

    <!-- Navegación -->
    <div class="sidebar-content">
        <ul class="sidebar-menu">
            <!-- Dashboard -->
            <li class="menu-item">
                <a href="inicio" class="menu-link">
                    <i class="fa-solid fa-chart-simple menu-icon"></i>
                    <span class="menu-text">Home</span>
                </a>
            </li>

            <!-- Pages Category -->
            <li class="menu-header">Paginas</li>

            <!-- Empleados (Authentication style) -->
            <li class="menu-item has-submenu">
                <a href="#" class="menu-link">
                    <i class="fa-solid fa-user-tie menu-icon"></i>
                    <span class="menu-text">Empleados</span>
                    <i class="fa-solid fa-chevron-right menu-arrow"></i>
                </a>
                <ul class="submenu">
                    <li><a href="RegistrarEmpleado" class="submenu-link">Registrar</a></li>
                    <li><a href="Empleados" class="submenu-link">Listado</a></li>
                </ul>
            </li>

            <!-- Familiares -->
            <li class="menu-item has-submenu">
                <a href="#" class="menu-link">
                    <i class="fa-solid fa-people-roof menu-icon"></i>
                    <span class="menu-text">Familiares</span>
                    <i class="fa-solid fa-chevron-right menu-arrow"></i>
                </a>
                <ul class="submenu">
                    <li><a href="RegistrarFamiliares" class="submenu-link">Registrar</a></li>
                    <li><a href="Familiares" class="submenu-link">Listado</a></li>
                </ul>
            </li>

             <!-- Bienestar Social -->
             <li class="menu-item has-submenu">
                <a href="#" class="menu-link">
                    <i class="fa-solid fa-handshake-angle menu-icon"></i>
                    <span class="menu-text">Bienestar Social</span>
                    <i class="fa-solid fa-chevron-right menu-arrow"></i>
                </a>
                <ul class="submenu">
                    <li><a href="ficha" class="submenu-link">Ficha Técnica</a></li>
                    <li><a href="datosPersonal" class="submenu-link">Renuncia</a></li>
                </ul>
            </li>

            <!-- Vacaciones -->
            <li class="menu-item has-submenu">
                <a href="#" class="menu-link">
                    <i class="fa-solid fa-umbrella-beach menu-icon"></i>
                    <span class="menu-text">Vacaciones</span>
                    <i class="fa-solid fa-chevron-right menu-arrow"></i>
                </a>
                <ul class="submenu">
                    <li><a href="ausencia" class="submenu-link">Asignar Ausento</a></li>
                    <li><a href="vacaciones" class="submenu-link">Asignar Vacaciones</a></li>
                </ul>
            </li>

            <!-- Forms & Tables Category -->
            <li class="menu-header">ADMINISTRACION</li>

            <li class="menu-item has-submenu">
                <a href="#" class="menu-link">
                    <i class="fa-solid fa-users-gear menu-icon"></i>
                    <span class="menu-text">Usuarios</span>
                    <i class="fa-solid fa-chevron-right menu-arrow"></i>
                </a>
                <ul class="submenu">
                    <li><a href="HistorialUsuarios" class="submenu-link">Historial</a></li>
                    <li><a href="RegistrosUsuarios" class="submenu-link">Gestión</a></li>
                </ul>
            </li>
            
             <li class="menu-item">
                <a href="#" class="menu-link" id="cerrarSession">
                    <i class="fa-solid fa-right-from-bracket menu-icon"></i>
                    <span class="menu-text">Cerrar Sesión</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Footer Workspace -->
    <div class="sidebar-footer">
        <div class="workspace-info">
            <div class="workspace-icon">
                <i class="fa-solid fa-layer-group"></i>
            </div>
            <div class="workspace-details">
                <span class="workspace-name">ATLAS System</span>
                <span class="workspace-status">Workspace</span>
            </div>
            <i class="fa-utility fa-semibold fa-alarm-clock"></i>
        </div>
    </div>
</div>

<!-- Overlay para movil -->
<div class="menu-overlay" id="menuOverlay"></div>

<!-- Boton toggle movil (flotante o en header externo si existiera, aqui lo pongo flotante por si acaso) -->
<button class="mobile-menu-toggle d-lg-none" id="mobileMenuToggle">
    <i class="fa-solid fa-bars"></i>
</button>
