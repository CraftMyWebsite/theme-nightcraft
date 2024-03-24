<?php

use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Support\SupportResponsesModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Support\SupportEntity[] $privateSupport */

Website::setTitle("Support");
Website::setDescription("Consultez les réponses de nos experts.");
?>
<?php if(ThemeModel::getInstance()->fetchConfigValue('overlay_everywhere')): ?>
    <div class="overlay"></div>
<?php endif; ?>

<section class="mb-8 px-8 md:px-36 2xl:px-96">
    <div class="mb-4 text-center">
        <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>support" class="btn-short">Retourner au support</a>
    </div>
    <div style="background: var(--card-bg-color);" class="rounded-lg col-span-2 h-fit p-4">
        <div class="page-title-divider text-center pt-1 w-full">
            <h2 style="color: var(--main-color)"class=" text-xl uppercase">Mes demandes</h2>
        </div>
        <div class="mt-4">
            <div class="lg:grid grid-cols-3 gap-6 lg:space-x-0 space-x-4">
                <?php foreach ($privateSupport as $support): ?>
                <a href="<?= $support->getUrl() ?>">
                    <div style="background: var(--card-in-card-bg-color);" class=" lg:mb-4">
                        <h6 class="p-1" style="background-color: var(--main-color);"><?= mb_strimwidth($support->getQuestion(), 0, 30, '...') ?></h6>
                        <div class="px-2 py-2">
                            <p>Confidentialité : <?= $support->getIsPublicFormatted() ?></p>
                            <p>Statut : <?= $support->getStatusFormatted() ?></p>
                            <p>Date : <?= $support->getCreated() ?></p>
                            <p>Réponses : <?= SupportResponsesModel::getInstance()->countResponses($support->getId()) ?></p>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>