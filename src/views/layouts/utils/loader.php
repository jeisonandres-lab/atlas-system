<?php
use App\Atlas\config\App;
?>
<div class="loading" id="spinner">
    <div class="loader-content">
        <div class="logo-wrapper">
            <div class="glow-ring"></div>
            <div class="spinner-ring"></div>
            <img src="<?php echo App::URL_ICONS . 'logo atlas.svg'; ?>" alt="Atlas Logo" class="loader-logo">
        </div>
        <div class="loading-text-wrapper">
            <span class="loading-text">Cargando</span>
            <div class="dots">
                <span>.</span><span>.</span><span>.</span>
            </div>
        </div>
    </div>
</div>