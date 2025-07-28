<?php

/* @var \CMW\Entity\Core\MaintenanceEntity $maintenance */

/* TITRE ET DESCRIPTION */

use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle('Maintenance');
Website::setDescription('Maintenance en cours sur le site');
?>

<?php if ($maintenance->isEnable()): ?>
    <div data-cmw-visible="global:overlay_everywhere" data-cmw-style="background-image:global:overlay_img" class="overlay"></div>
    <section class="mt-auto px-8 md:px-36 2xl:px-96">
        <div style="background-color: var(--card-bg-color)" class="p-6 rounded-xl">
            <h4 style="color: var(--main-color)" class="text-center"><?= $maintenance->getTitle() ?></h4>
            <div class="lg:grid grid-cols-2">
                <div class="flex justify-center">
                    <img data-cmw-style="width:maint:maintenance_width" data-cmw-attr="src:maint:maintenance_img" class="my-2" alt="maintenance">
                </div>
                <div class="flex flex-col justify-center items-center space-y-6">
                    <p class="text-lg"><?= $maintenance->getDescription() ?></p>
                    <p class="text-lg">Fin de la maintenance prévu le <?= $maintenance->getTargetDateFormatted() ?></p>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



