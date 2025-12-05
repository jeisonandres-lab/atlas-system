<?php

use App\Atlas\config\App;
use App\Atlas\helpers\DatosFecha;



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATLAS | HOME</title>
    <?php require_once App::URL_lAYOUTS . "./cssGlobal.php"; ?>
    <?php require_once App::URL_lAYOUTS . "./cssGlobalMenu.php"; ?>
    <?php require_once App::URL_lAYOUTS . "./cssGlobalDataTables.php"; ?>


    <link rel="stylesheet" href="<?php echo App::URL_CSS . "./home.css"; ?>">
    <link rel="stylesheet" href="<?php echo App::URL_CSS . "./Utils/botones.css"; ?>">
    <link rel="stylesheet" href="<?php echo App::URL_CSS . "./Utils/datatables.css"; ?>">

    
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper conten-main" id="conten-main">
        <!-- Menu lateral y superior -->
        <?php require_once App::URL_lAYOUTS . "utils/menu.php"; ?>

        <!-- CUERPO DEL SISTEMA -->
        <main class="app-main p-3">
            <div class="row">
                <!-- Personal -->
                <div class="col-12 col-md-6 col-xl-2 mb-4">
                    <div class="card dashboard-card card-personal">
                        <div class="card-header-flex">
                            <div class="card-icon-wrapper">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="card-options">
                                <i class="fas fa-ellipsis-v"></i>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-title">Personal</div>
                            <div class="card-value">150</div>
                            <div class="card-trend trend-up">
                                <i class="fas fa-arrow-up"></i> 12%
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Vacaciones -->
                <div class="col-12 col-md-6 col-xl-2 mb-4">
                    <div class="card dashboard-card card-vacaciones">
                        <div class="card-header-flex">
                            <div class="card-icon-wrapper">
                                <i class="fas fa-plane"></i>
                            </div>
                            <div class="card-options">
                                <i class="fas fa-ellipsis-v"></i>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-title">Vacaciones</div>
                            <div class="card-value">12</div>
                            <div class="card-trend trend-down">
                                <i class="fas fa-arrow-down"></i> 5%
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ausencias -->
                <div class="col-12 col-md-6 col-xl-2 mb-4">
                    <div class="card dashboard-card card-ausencias">
                        <div class="card-header-flex">
                            <div class="card-icon-wrapper">
                                <i class="fas fa-calendar-times"></i>
                            </div>
                            <div class="card-options">
                                <i class="fas fa-ellipsis-v"></i>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-title">Ausencias</div>
                            <div class="card-value">5</div>
                            <div class="card-trend trend-up">
                                <i class="fas fa-arrow-up"></i> 2%
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Archivos -->
                <div class="col-12 col-md-6 col-xl-2 mb-4">
                    <div class="card dashboard-card card-archivos">
                        <div class="card-header-flex">
                            <div class="card-icon-wrapper">
                                <i class="fas fa-file"></i>
                            </div>
                            <div class="card-options">
                                <i class="fas fa-ellipsis-v"></i>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-title">Archivos</div>
                            <div class="card-value">1,240</div>
                            <div class="card-trend trend-up">
                                <i class="fas fa-arrow-up"></i> 18%
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Usuarios -->
                <div class="col-12 col-md-6 col-xl-2 mb-4">
                    <div class="card dashboard-card card-usuarios">
                        <div class="card-header-flex">
                            <div class="card-icon-wrapper">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="card-options">
                                <i class="fas fa-ellipsis-v"></i>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-title">Usuarios</div>
                            <div class="card-value">45</div>
                            <div class="card-trend trend-up">
                                <i class="fas fa-arrow-up"></i> 8%
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Familiares -->
                <div class="col-12 col-md-6 col-xl-2 mb-4">
                    <div class="card dashboard-card card-familiares">
                        <div class="card-header-flex">
                            <div class="card-icon-wrapper">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <div class="card-options">
                                <i class="fas fa-ellipsis-v"></i>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-title">Familiares</div>
                            <div class="card-value">320</div>
                            <div class="card-trend trend-down">
                                <i class="fas fa-arrow-down"></i> 3%
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- UNIFIED CHART CARD -->
            <div class="row tablert mb-4">
                <div class="col-12">
                    <div class="card dashboard-card">
                        <div class="card-content">
                            <div class="row">
                                <!-- Left Side: Bar Chart (Yearly) -->
                                <div class="col-12 col-lg-8 border-end-lg">
                                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                                        <div>
                                            <div class="text-muted small">Resumen Anual</div>
                                            <div class="h4 mb-0" id="year-summary-title">Total Archivos</div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <!-- Date Range Picker -->
                                            <div class="d-flex align-items-center gap-1 bg-light rounded p-1">
                                                <input type="date" class="form-control form-control-sm border-0 bg-transparent" id="date-start" style="max-width: 110px; font-size: 0.8rem;">
                                                <span class="text-muted small">-</span>
                                                <input type="date" class="form-control form-control-sm border-0 bg-transparent" id="date-end" style="max-width: 110px; font-size: 0.8rem;">
                                                <button class="btn btn-sm btn-white shadow-sm rounded-circle" id="btn-update-range" style="width: 28px; height: 28px; padding: 0; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fas fa-arrow-right text-primary" style="font-size: 0.8rem;"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="chart-year" style="height: 320px;"></div>
                                </div>

                                <!-- Right Side: Radial Chart (Monthly) -->
                                <div class="col-12 col-lg-4 ps-lg-4 mt-4 mt-lg-0">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="h6 mb-0">Mensual</div>
                                        <select class="form-select form-select-sm border-0 bg-light fw-bold text-primary" id="month-select-radial" style="width: auto; cursor: pointer;">
                                            <option value="current">Este Mes</option>
                                            <?php echo DatosFecha::getOptionsMeses(); ?>
                                        </select>
                                    </div>
                                    <div id="chart-month" style="height: 280px; display: flex; justify-content: center;"></div>
                                    <div class="text-center mt-n2">
                                        <div class="h4 mb-0 fw-bold" id="month-summary-value">Cargando...</div>
                                        <div class="text-muted small">Archivos Subidos</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cotenedor_tabla_usuarios">
                <div class="card p-3 dashboard-card card__data__table">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 users-table" id="users__table">
                            <thead class="table-light small text-muted">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ESTATUS</th>
                                    <th scope="col">ROL</th>
                                    <th scope="col">USUARIO</th>
                                    <th scope="col">FECHA</th>
                                    <th scope="col">USO</th>
                                    <th scope="col">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
        <?php require_once App::URL_lAYOUTS . "./utils/footer.php"; ?>
    </div>

    <?php require_once App::URL_lAYOUTS . "./scriptsGlobalMenu.php"; ?>
    <!-- DataTables JS -->
    <?php require_once App::URL_lAYOUTS . "./scriptsDataTables.php"; ?>

    <script src="<?php echo App::URL_LIBRARY . "apexcharts/apexcharts.js"; ?>" defer></script>
    <script src="<?php echo App::URL_SCRIPS; ?>home.js" defer></script>
    <script src="<?php echo App::URL_SCRIPS; ?>dataUsuerio.js"></script>

</body>

</html>