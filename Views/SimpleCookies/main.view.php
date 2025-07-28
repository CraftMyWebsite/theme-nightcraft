<?php

/* @var \CMW\Entity\SimpleCookies\SimpleCookiesSettingsEntity $content */

use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle('Cookies');
Website::setDescription('Découvrez pourquoi on à besoin de cookies !');
?>
<div data-cmw-visible="global:overlay_everywhere" data-cmw-style="background-image:global:overlay_img" class="overlay"></div>

<section class="mb-8 px-8 md:px-36 2xl:px-96">
    <div style="background: var(--card-bg-color);" class="rounded-lg p-6">
        <h4 style="color: var(--main-color)" class="text-center">Cookies</h4>
        <?= $content ?>
    </div>
</section>