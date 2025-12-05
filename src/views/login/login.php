<?php use App\Atlas\config\App;?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inicia sesión en tu cuenta para acceder a todas las funcionalidades de ATLAS, nuestro sistema de gestión de recursos humanos">
    <title>Inicio de Sesión | ATLAS</title>
    <?php require_once App::URL_lAYOUTS . "cssGlobal.php"; ?>
    <link rel="stylesheet" href="<?php echo App::URL_CSS . "login2.css"; ?>">
    <link rel="stylesheet" href="<?php echo App::URL_CSS . "Utils/loading.css"; ?>">
</head>

<body>

    <?php require_once App::URL_lAYOUTS . "utils/loader.php"; ?>

    <div class="container-fluid p-0 overflow-hidden">
        <div class="row g-0 login-container">
            <!-- Left Side: Image/Brand -->
            <div class="col-lg-7 d-none d-lg-flex login-brand-side">
                <!-- <h1>Your Image</h1> -->
                <!-- You can replace the h1 with an actual image tag if needed -->
                <img src="<?php echo App::URL_IMG . 'hermosos-paisajes-naturales-de-cascadas.jpg'; ?>" alt="Login Background" style="width: 100%; height: 100%; object-fit: cover;">
            </div>

            <!-- Right Side: Login Form -->
            <div class="col-lg-5 col-12 login-form-side">
                <div class="login-form-content d-flex flex-column justify-content-between h-100 py-4">

                    <div class="login-top-spacer"></div> <!-- Spacer to push content to center -->

                    <div class="login-main-content">
                        <div class="text-center mb-4">
                            <img src="<?php echo App::URL_ICONS . 'logo atlas.svg'; ?>" alt="Atlas Logo" class="atlas-logo mb-3">
                        </div>

                        <div class="login-header">
                            <h2>Login</h2>
                            <p>Bienvenido de nuevo, por favor ingresa tus datos.</p>
                        </div>

                        <form action="#" method="POST" class="formularioEnviar">
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="user" placeholder="Ingresa tu usuario">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control password__input" id="password" name="pass" placeholder="••••••••">
                                    <i class="fas fa-eye password-toggle-icon password" id="togglePassword"></i>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mb-4">
                                <a href="#" class="forgot-password" data-bs-toggle="modal" data-bs-target="#recoveryModal">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" id="do_login" class="btn btn-primary">Iniciar Sesión</button>
                            </div>

                            <div class="sign-up-link">
                                ¿No tienes una cuenta? <a href="#">Regístrate aquí</a>
                            </div>
                        </form>
                    </div>

                    <div class="login-footer text-center mt-4">
                        <img src="<?php echo App::URL_IMG . 'logoinces3.png'; ?>" alt="Inces Logo" class="inces-logo">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Password Recovery Modal -->
    <div class="modal fade" id="recoveryModal" tabindex="-1" aria-labelledby="recoveryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-cen
tered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="recoveryModalLabel">Recuperar Contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted mb-4">Ingresa tu número de cédula para restablecer tu contraseña.</p>
                    <form id="recoveryForm">
                        <div class="mb-3">
                            <label for="recoveryCedula" class="form-label">Cédula</label>
                            <input type="text" class="form-control" id="recoveryCedula" name="cedula" placeholder="Ej: 12345678" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="submitRecovery()">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <?php require_once App::URL_lAYOUTS . "scriptsGlobalMenu.php"; ?>
    <script src="<?php echo App::URL_LIBRARY . "crypto-js/crypto.js"; ?>" defer></script>
    <script type="module" src="<?php echo App::URL_SCRIPS . "login.js" ?>" defer></script>
    <script>
        function submitRecovery() {
            const cedula = document.getElementById('recoveryCedula').value;
            if (cedula) {
                alert('Solicitud de recuperación enviada para la cédula: ' + cedula);
                // Here you would typically make an AJAX call to your backend
                var modal = bootstrap.Modal.getInstance(document.getElementById('recoveryModal'));
                modal.hide();
            } else {
                alert('Por favor ingresa tu cédula.');
            }
        }
    </script>

</body>

</html>