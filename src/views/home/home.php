<?php 

use App\Atlas\config\App;
use App\Atlas\config\SessionManager;

$fechaInicio = new DateTime();
$fechaFin = new DateTime();

$meses = [
    1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
    5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
    9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATLAS | HOME</title>
    <?php require_once App::URL_lAYOUTS . "./cssGlobal.php"; ?>
    <?php require_once App::URL_lAYOUTS . "./cssGlobalMenu.php"; ?>

    <link rel="stylesheet" href="<?php echo App::URL_CSS . "./home.css"; ?>">
    <link rel="stylesheet" href="<?php echo App::URL_CSS . "./Utils/botones.css"; ?>">
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
        </main>
        <?php require_once App::URL_lAYOUTS . "./utils/footer.php"; ?>
    </div>

     <?php require_once App::URL_lAYOUTS . "./scriptsGlobalMenu.php"; ?>
</body>

</html>