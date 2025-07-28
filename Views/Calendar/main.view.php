<?php

use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle('Calendrier');
Website::setDescription('Découvrez nos futur événements');
?>
<div data-cmw-visible="global:overlay_everywhere" data-cmw-style="background-image:global:overlay_img" class="overlay"></div>
<section class="mb-8 px-8 md:px-36 2xl:px-96">
    <div style="background-color: var(--card-bg-color)" class="p-6 rounded-xl">
        <h4 style="color: var(--main-color)" class="text-center">Nos évènements</h4>
        <div id='calendar'></div>
    </div>
</section>