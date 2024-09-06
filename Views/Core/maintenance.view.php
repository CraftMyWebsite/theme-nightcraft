<?php

/* @var \CMW\Entity\Core\MaintenanceEntity $maintenance */

/* TITRE ET DESCRIPTION */

use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle('Maintenance');
Website::setDescription('Maintenance en cours sur le site');
?>

<?php if ($maintenance->isEnable()): ?>
    <?php if (ThemeModel::getInstance()->fetchConfigValue('overlay_everywhere')): ?>
        <div class="overlay"></div>
    <?php endif; ?>
    <section class="mt-auto px-8 md:px-36 2xl:px-96">
        <div style="background-color: var(--card-bg-color)" class="p-6 rounded-xl">
            <h4 style="color: var(--main-color)" class="text-center"><?= $maintenance->getTitle() ?></h4>
            <div class="lg:grid grid-cols-2">
                <div class="flex justify-center">
                    <img class="my-2" style="width: var(--maintenance-width)" alt="maintenance" src="<?= ThemeModel::getInstance()->fetchImageLink('maintenance_img') ?>">
                </div>
                <div class="flex flex-col justify-center items-center space-y-6">
                    <p class="text-lg"><?= $maintenance->getDescription() ?></p>
                    <p class="text-lg">Fin de la maintenance prévu le <?= $maintenance->getTargetDateFormatted() ?></p>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



