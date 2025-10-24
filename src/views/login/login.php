<?php

use App\Atlas\config\App; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inicia sesión en tu cuenta para acceder a todas las funcionalidades de ATLAS, nuestro sistema de gestión de recursos humanos">
    <title>Inicio de Sesión | ATLAS</title>
    <?php require_once App::URL_lAYOUTS . "cssGlobal.php"; ?>
    <link rel="stylesheet" href="<?php echo App::URL_CSS . "login2.css"; ?>">
    <link rel="stylesheet" href="<?php echo App::URL_CSS . "Utils/loading.css"; ?>">

</head>

<body>
    <?php require_once App::URL_lAYOUTS . "loader.php"; ?>
    <div class=" brand_logo d-flex align-items-center justify-content-center ">

    </div>
    <div class='box'>
        <div class='box-form'>
            <div class='box-login-tab'></div>
            <div class='box-login-title'>
                <img src="<?php echo App::URL_IMG . 'logo_atlas.png'; ?>" class="brand_logo_img" alt="Logo">
                <!-- <div class='i i-login'><i class="fa-solid fa-xmark"></i></div> -->
                <h2>ATLAS</h2>
            </div>
            <div class='box-login'>
                <form action="#" class="formularioEnviar">
                    <div class='fieldset-body d-flex flex-column' id='login_form'>
                        <div class="d-flex w-100 justify-content-end">
                            <button type="button" onclick="openLoginInfo();" class='b b-form i i-more d-flex g-5'>
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                        </div>


                        <div class="title-login mb-2">
                            <h2 class="">LOGIN</h2>
                        </div>
                        <p class='field'>
                            <label for='usuario'>CORREO ELECTRÓNICO</label>
                            <input type='text' id='usuario' name='user' />
                            <span id='valida' class='i i-warning'></span>
                        </p>
                        <p class='field'>
                            <label for='password'>CONTRASEÑA</label>
                            <input type='password' id='password' name='pass' class='password__input' />
                            <span id='valida' class='i i-close'><i class="fa-solid fa-eye password"></i></span>
                        </p>

                        <!-- <label class='checkbox'>
                        <input type='checkbox' value='TRUE' title='Keep me Signed in' /> Keep me Signed in
                    </label> -->
                        <div class="dialogo">
                            <p>sistema de<strong class="text-primary fw-bold"> gestión</strong> del departamento Talento Humanos <strong class="text-danger fw-bold">INCES</strong> </p>
                        </div>
                        <input class="" type='submit' id='do_login' value='INICIAR' />
                    </div>
                </form>
            </div>
        </div>
        <div class='box-info'>
            <div class="box-info-header">
                <button onclick="closeLoginInfo();" class='b b-info i i-left' aria-label="Cerrar información">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <h3>¿Necesitas ayuda?</h3>
            </div>
            <div class='line-wh'></div>
            <button onclick="" class='b-support btn-hover-azul'> ¿Olvidaste tu contraseña?</button>
            <button onclick="" class='b-support btn-hover-azul'> Contactar con soporte</button>
            <div class='line-wh'></div>
            <button onclick="" class='b-cta btn-hover-azul'>SOLICITAR CUENTA</button>
        </div>
    </div>


    <?php require_once App::URL_lAYOUTS . "scriptsGlobal.php"; ?>
    <script src="<?php echo App::URL_LIBRARY . "crypto-js/crypto.js"; ?>" defer></script>
    <script type="module" src="<?php echo App::URL_SCRIPS . "login.js" ?>" defer></script>
</body>

</html>