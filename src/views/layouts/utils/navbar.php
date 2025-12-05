<?php

use App\Atlas\config\App; ?>
<!-- Navbar -->
<link rel="stylesheet" href="./public/assets/css/utils/navbar.css">
<nav class=" p-3">
    <div class="main-header navbar app-header navbar-expand navbar-white navbar-light">

        <div class="container-fluid">
            <!-- Left navbar links -->
            <!-- <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" id="navbarMenuToggle" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul> -->

            <!-- Center Search -->
            <div class="navbar-center">
                <form class="form-inline navbar-search-form" role="search" action="#" method="GET" aria-label="Barra de búsqueda principal">
                    <label for="navSearch" class="visually-hidden">Buscar</label>
                    <div class="input-group rounded-pill" style="max-width:520px;">
                        <span class="input-group-text bg-white border-0" id="search-addon" style="border-radius: 50px 0 0 50px;">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input id="navSearch" name="q" class="form-control border-0" type="search" placeholder="Buscar empleados, documentos o proyectos..." aria-label="Buscar" autocomplete="off">
                        <!-- <div class="ms-2">
                            <button class="btn btn-primary btn-sm rounded-pill " type="submit" title="Buscar">
                                Buscar
                            </button>
                        </div> -->
                    </div>
                </form>
            </div>

            <!-- Right navbar links -->
            <ul class="navbar-nav ms-auto align-items-center">
                <!-- Fullscreen Toggle -->

                <li class="nav-item">
                    <a class="nav-link nav-icon-btn" href="#" role="button">
                        <i class="fa-regular fa-sun-bright"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link nav-icon-btn" data-widget="fullscreen" href="#" role="button">
                        <i class="fa-solid fa-expand"></i>
                    </a>
                </li>

                <!-- Notifications Dropdown -->
                <li class="nav-item dropdown me-2">
                    <a class="nav-link nav-icon-btn" data-bs-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge-notification">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end notification-dropdown">
                        <div class="notification-header">
                            <span>Notificaciones</span>
                            <a href="#" class="text-muted text-sm">Marcar todo como leído</a>
                        </div>

                        <a href="#" class="notification-item">
                            <img src="./src/files/photos/default.png" alt="User Avatar" class="notification-img">
                            <div class="notification-content">
                                <span class="notification-title">Juan Pérez</span>
                                <span class="notification-msg">Ha comentado en tu publicación reciente sobre el proyecto.</span>
                                <span class="notification-time"><i class="far fa-clock mr-1"></i> Hace 5 mins</span>
                            </div>
                        </a>

                        <a href="#" class="notification-item">
                            <img src="./src/files/photos/default.png" alt="User Avatar" class="notification-img">
                            <div class="notification-content">
                                <span class="notification-title">María García</span>
                                <span class="notification-msg">Te ha enviado una solicitud de amistad.</span>
                                <span class="notification-time"><i class="far fa-clock mr-1"></i> Hace 2 horas</span>
                            </div>
                        </a>

                        <a href="#" class="notification-item">
                            <img src="./src/files/photos/default.png" alt="User Avatar" class="notification-img">
                            <div class="notification-content">
                                <span class="notification-title">Sistema</span>
                                <span class="notification-msg">Tu contraseña expirará pronto. Por favor actualízala.</span>
                                <span class="notification-time"><i class="far fa-clock mr-1"></i> Hace 1 día</span>
                            </div>
                        </a>

                        <a href="#" class="notification-footer">Ver todas las notificaciones</a>
                    </div>
                </li>


                <!-- User Dropdown Menu -->
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="user-role-badge me-2 d-none d-md-inline"><?php echo $_SESSION['rol'] ?? 'Rol'; ?></span>
                        <img src="./src/files/photos/<?php echo $_SESSION['cedula'] ?? 'default'; ?>.png"
                            class="user-image mt-0"
                            alt="User Image"
                            onerror="this.src='<?php echo App::URL_ICONS . 'favicon.webp'; ?>'">
                    </a>
                    <ul class="dropdown-menu user-dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a href="#" class="user-dropdown-item">
                                <i class="fas fa-cog"></i>
                                Configuración
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a href="#" class="user-dropdown-item" id="cerrarSessionNav">
                                <i class="fas fa-sign-out-alt"></i>
                                Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</nav>

<!-- Floating Configuration Icon
<div class="floating-config-btn" title="Configuración">
    <i class="fas fa-cog"></i>
</div> -->
<!-- /.navbar -->