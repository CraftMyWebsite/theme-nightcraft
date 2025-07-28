<?php

use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle('Erreur');
Website::setDescription('Erreur');
?>
<div data-cmw-visible="global:overlay_everywhere" data-cmw-style="background-image:global:overlay_img" class="overlay"></div>
<section class="mt-auto px-8 md:px-36 2xl:px-96">
    <div style="background-color: var(--card-bg-color)" class="p-6 rounded-xl">
        <div class="lg:grid grid-cols-2">
            <div class="flex justify-center">
                <img class="my-2" data-cmw-style="width:maint:404_width" alt="dead" data-cmw-attr="src:maint:404_img">
            </div>
            <div class="flex flex-col justify-center items-center space-y-6">
                <h4 style="color: var(--main-color)" class="text-center text-6xl">Whouuupsss</h4>
                <p>Il semblerais qu'il y ai un problème !</p>
                <p>Contactez l'administrateur du site pour lui indiquer cette erreur !</p>
                <p>Si vous êtes l'administrateur et que vous rencontrez des difficultés contactez le support de CraftMyWebsite.</p>
                <p>Vous pouvez toujours <a class="a-base" href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>">retrourner à l'accueil</a>.</p>
            </div>
        </div>
    </div>
</section>