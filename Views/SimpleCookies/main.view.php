<?php

/* @var \CMW\Entity\SimpleCookies\SimpleCookiesSettingsEntity $content */

use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle('Cookies');
Website::setDescription('Découvrez pourquoi on à besoin de cookies !');
?>
<?php if (ThemeModel::getInstance()->fetchConfigValue('overlay_everywhere')): ?>
    <div class="overlay"></div>
<?php endif; ?>

<section class="mb-8 px-8 md:px-36 2xl:px-96">
    <div style="background: var(--card-bg-color);" class="rounded-lg p-6">
        <h4 style="color: var(--main-color)" class="text-center">Cookies</h4>
        <?= $content ?>
    </div>
</section>