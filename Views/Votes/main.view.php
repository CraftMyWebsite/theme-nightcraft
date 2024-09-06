<?php

use CMW\Controller\Core\ThemeController;
use CMW\Controller\Users\UsersController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Theme\ThemeManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Users\UsersModel;
use CMW\Model\Votes\VotesConfigModel;
use CMW\Utils\Website;

/* TITRE ET DESCRIPTION */
Website::setTitle('Votez');
Website::setDescription("Votez, obtenez des points de vote et plein d'autres cadeaux!");
?>
<?php if (ThemeModel::getInstance()->fetchConfigValue('overlay_everywhere')): ?>
    <div class="overlay"></div>
<?php endif; ?>

<section class="mb-8 px-8 md:px-36 2xl:px-96">
    <div class="lg:grid grid-cols-3 gap-6">
        <div style="background-color: var(--card-bg-color);" class="rounded-lg h-fit">
            <div class="page-title-divider text-center pt-1 w-full">
                <h4 style="color: var(--main-color)"><?= ThemeModel::getInstance()->fetchConfigValue('votes_participate_title') ?></h4>
            </div>
            <div class="p-4">
                <div class="space-y-4">
                    <?php if (!UsersController::isUserLogged()): ?>
                        <div style="background-color: var(--card-in-card-bg-color);" class="rounded-lg p-2 mb-4">
                            <div class="text-center">Pour pouvoir voter et récupérer vos récompenses, vous devez être connecté sur le site, alors n'attendez plus pour obtenir des récompenses uniques !</div>
                            <div class="pt-4 pb-2 text-center">
                                <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>login" class="btn">Connexion</i></a>
                            </div>
                        </div>
                    <?php else: ?>
                        <?php foreach ($sites as $site): ?>
                            <div style="background-color: var(--card-in-card-bg-color);" class="rounded-lg p-4">
                                <div class="flex flex-wrap justify-between">
                                    <p><?= $site->getTitle() ?></p>
                                    <p class="text-xs bg-gray-400 py-1 px-2 text-white"><i class="fa-solid fa-clock-rotate-left "></i> <?= $site->getTimeFormatted() ?></p>
                                </div>
                                <p>Récompense : <b><?= $site->getRewards()?->getTitle() ?></b></p>
                                <div class="flex justify-center mt-2">
                                    <button id="<?= $site->getSiteId() ?>" onclick="sendVote('<?= $site->getSiteId() ?>')" class="btn">Voter <i class="fa-solid fa-award"></i></button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div style="background-color: var(--card-bg-color);" class="rounded-lg col-span-2 h-fit">
            <div class="page-title-divider text-center pt-1 w-full">
                <h4 style="color: var(--main-color)">Top <?= VotesConfigModel::getInstance()->getConfig()->getTopShow() ?> du mois</h4>
            </div>
            <div class="p-4">
                <table class="w-full text-sm text-left">
                    <thead style="background-color: var(--card-in-card-bg-color);" class="text-xs uppercase">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            <i class="fa-solid fa-user"></i> Voteur
                        </th>
                        <th scope="col" class="py-3 px-6 text-center">
                            <i class="fa-solid fa-trophy"></i> Position
                        </th>
                        <th scope="col" class="py-3 px-6 text-center">
                            <i class="fa-solid fa-award"></i> Nombres de votes
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;
                    foreach ($topCurrent as $top):
                        $i++; ?>
                    <tr style="background-color: var(--card-in-card-bg-color);">
                        <td scope="row" class="flex items-center lg:px-6 font-medium whitespace-nowrap">
                            <img class="hidden lg:inline-block w-10 h-10" src="https://apiv2.craftmywebsite.fr/skins/3d/user=<?= $top->getUser()->getPseudo() ?>&headOnly=true" alt="...">
                            <div class="lg:pl-3 py-4">
                                <div class="text-base font-semibold"><?= $top->getUser()->getPseudo() ?></div>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <?php $color_position = $i ?>
                            <div class="<?php
                        switch ($color_position) {
                            case '1':
                                echo 'bg-amber-400';
                                break;
                            case '2':
                                echo 'bg-amber-300';
                                break;
                            case '3':
                                echo 'bg-amber-200';
                                break;
                            default:
                                echo 'bg-blue-200';
                                break;
                        }
                    ?> inline-block px-3 py-1 rounded-sm font-medium text-black"># <?= $i ?></div>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <div class="font-medium"><?= $top->getVotes() ?></div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php if (ThemeModel::getInstance()->fetchConfigValue('votes_display_global')): ?>
    <div style="background-color: var(--card-bg-color);" class="rounded-lg col-span-2 h-fit mt-8">
        <div class="page-title-divider text-center pt-1 w-full">
            <h4 style="color: var(--main-color)">Top <?= VotesConfigModel::getInstance()->getConfig()->getTopShow() ?> global</h4>
        </div>
        <div class="p-4">
            <table class="w-full text-sm text-left">
                <thead style="background-color: var(--card-in-card-bg-color);" class="text-xs uppercase">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        <i class="fa-solid fa-user"></i> Voteur
                    </th>
                    <th scope="col" class="py-3 px-6 text-center">
                        <i class="fa-solid fa-trophy"></i> Position
                    </th>
                    <th scope="col" class="py-3 px-6 text-center">
                        <i class="fa-solid fa-award"></i> Nombres de votes
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 0;
                foreach ($topGlobal as $top):
                    $i++; ?>
                <tr style="background-color: var(--card-in-card-bg-color);">
                    <td scope="row" class="flex items-center lg:px-6 font-medium whitespace-nowrap">
                        <img class="hidden lg:inline-block w-10 h-10 rounded-full" src="https://apiv2.craftmywebsite.fr/skins/3d/user=<?= $top->getUser()->getPseudo() ?>&headOnly=true" alt="...">
                        <div class="lg:pl-3 py-4">
                            <div class="text-base font-semibold"><?= $top->getUser()->getPseudo() ?></div>
                        </div>
                    </td>
                    <td class="py-4 px-6 text-center">
                        <?php $color_position = $i ?>
                        <div class="<?php
                    switch ($color_position) {
                        case '1':
                            echo 'bg-amber-400';
                            break;
                        case '2':
                            echo 'bg-amber-300';
                            break;
                        case '3':
                            echo 'bg-amber-200';
                            break;
                        default:
                            echo 'bg-blue-200';
                            break;
                    }
                    ?>
                        inline-block px-3 py-1 rounded-sm font-medium text-black"># <?= $i ?></div>
                    </td>
                    <td class="py-4 px-6 text-center">
                        <div class="font-medium"><?= $top->getVotes() ?></div>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>
</section>
