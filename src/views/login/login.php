<?php use App\Atlas\config\App; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inicia sesión en tu cuenta para acceder a todas las funcionalidades de ATLAS, nuestro sistema de gestión de recursos humanos">
    <title>Inicio de Sesión | ATLAS</title>
    <?php require_once App::URL_lAYOUTS . "cssGlobal.php"; ?>
     <link rel="stylesheet" href="<?php echo App::URL_CSS . "login.css"; ?>">
</head>

<body>
    <main class="principal container-fluid">
        <section class="h-100 d-flex justify-content-center align-items-center" aria-label="Formulario de inicio de sesión">
            <article class="col-md-3 col-sm-8 user_card">
                <header class="mt-5 mb-3 d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <div class="brand_logo d-flex align-items-center justify-content-center">
                            <img src="<?php echo App::URL_IMG . 'logo_atlas.png'; ?>" class="brand_logo_img" alt="Logo ATLAS">
                        </div>
                    </div>
                </header>
                <div class="d-flex justify-content-center align-items-center flex-column mt-5">
                    <form class="formularioEnviar" method="POST" action="./src/ajax/userAjax.php" autocomplete="on" aria-label="Formulario de inicio de sesión">
                        <div class="inicioSesion container-fluid d-flex justify-content-center mt-2">
                            <h1 class="text-muted h4">INICIO DE SESIÓN</h1>
                        </div>
                        <div class="mb-3 mt-3">
                            <div class="input-group mb-3">
                                <label for="usuario" class="input-group-text d-flex"><i class="fa-regular fa-user"></i></label>
                                <input type="text" name="usuario" id="usuario" class="form-control input_user px-3" placeholder="Usuario" autocomplete="username" required>
                            </div>
                            <div class="input-group">
                                <label for="password" class="input-group-text d-flex candado" id="candado"><i class="password fa-solid fa-lock"></i></label>
                                <input type="password" name="password" id="password" class="form-control input_pass px-3" placeholder="Contraseña" autocomplete="current-password" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3 mb-2 login_container">
                            <button type="submit" name="button" class="btn btn-primary login_btn btn-hover-azul">Iniciar sesión</button>
                        </div>
                    </form>
                    <div id="alert" role="alert" aria-live="polite"></div>
                </div>
                <footer class="mt-4">
                    <div class="d-flex justify-content-center links">
                        <span>¿Olvidaste los datos de tu cuenta?</span>
                    </div>
                    <div class="d-flex justify-content-center links">
                        <a href="recuperarDatos"><i class="fa-solid fa-arrow-right me-2"></i>Recuperar Datos</a>
                    </div>
                </footer>
                <div class="barraNaranja" aria-hidden="true"></div>
            </article>
        </section>
    </main>
    <div id="particles-js" aria-hidden="true"></div>
    <script src="<?php echo App::URL_LIBRARY . "particles.js/particles.js"; ?>"></script>
    <script src="<?php echo App::URL_LIBRARY . "crypto-js/crypto.js"; ?>"></script>
</body>
</html>