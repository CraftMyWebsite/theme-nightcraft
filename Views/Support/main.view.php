<?php

use CMW\Controller\Core\SecurityController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Support\SupportResponsesModel;
use CMW\Model\Support\SupportSettingsModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Support\SupportEntity[] $publicSupport */
/* @var CMW\Entity\Support\SupportSettingEntity $config */

Website::setTitle('Support');
Website::setDescription('Consultez les réponses de nos experts.');
?>
<?php if (ThemeModel::getInstance()->fetchConfigValue('overlay_everywhere')): ?>
    <div class="overlay"></div>
<?php endif; ?>

<section class="mb-8 px-8 md:px-36 2xl:px-96">
    <div class="mb-4 text-center">
        <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>support/private" class="btn-short">Voir mes demandes</a>
    </div>
    <div class="<?php if ($config->getDefaultVisibility() && $config->visibilityIsDefinedByCustomer() || !$config->visibilityIsDefinedByCustomer()): ?>lg:grid grid-cols-3<?php endif; ?> gap-6">
        <div style="background: var(--card-bg-color);" class="rounded-lg h-fit p-4">
            <div class="page-title-divider text-center pt-1 w-full">
                <h2 style="color: var(--main-color)" class="text-xl uppercase">Nouvelle demande</h2>
            </div>
            <div class="p-4">
                <form class="space-y-6" action="" method="post">
                    <?php (new SecurityManager())->insertHiddenToken() ?>
                    <div class="mb-2">
                        <label for="support_question" class="block mb-2 text-sm font-medium ">Votre demande :</label>
                        <textarea minlength="20" id="support_question" rows="4" name="support_question"
                                  class="input block p-2.5 w-full text-sm  bg-gray-50 rounded-lg border"
                                  placeholder="Impossible de ..."></textarea>
                    </div>
                    <div class="flex flex-wrap justify-between items-center">
                        <?php if (!$config->visibilityIsDefinedByCustomer()): ?>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="support_is_public" name="support_is_public" checked type="checkbox" value=""
                                       class="input w-4 h-4 border border-gray-300 rounded bg-gray-50">
                            </div>
                            <label for="support_is_public" class="ml-2 text-sm font-medium">Question publique</label>
                        </div>
                        <?php endif; ?>
                        <div>
                            <button type="submit" class="btn">Soumettre <i class="fa-solid fa-paper-plane"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php if ($config->getDefaultVisibility() && $config->visibilityIsDefinedByCustomer() || !$config->visibilityIsDefinedByCustomer()): ?>
        <div style="background: var(--card-bg-color);" class="rounded-lg  col-span-2 h-fit p-4">
            <div class="page-title-divider text-center pt-1 w-full">
                <h2 style="color: var(--main-color)"class=" text-xl uppercase">Support publique</h2>
            </div>
            <div class="mt-4">
                <div class="lg:grid grid-cols-3 gap-6 lg:space-x-0 space-x-4">
                    <?php foreach ($publicSupport as $support): ?>
                    <a href="<?= $support->getUrl() ?>">
                        <div style="background: var(--card-in-card-bg-color);" class=" lg:mb-4">
                            <h6 class="p-1" style="background-color: var(--main-color);"><?= mb_strimwidth($support->getQuestion(), 0, 30, '...') ?></h6>
                            <div class="px-2 py-2">
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
        <?php endif; ?>
    </div>
</section>