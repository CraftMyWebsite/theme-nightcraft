<?php

use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Users\UsersModel;
use CMW\Utils\Website;

/** @var \CMW\Entity\Forum\ForumTopicEntity[] $results */
/* @var CMW\Model\Forum\ForumResponseModel $responseModel */

Website::setTitle("Forum");
Website::setDescription("Recherchez un sujet dans le forum");
?>
<?php if(ThemeModel::getInstance()->fetchConfigValue('overlay_everywhere')): ?>
    <div class="overlay"></div>
<?php endif; ?>

<section class="mb-16 px-4 md:px-36 2xl:px-72 space-y-8">
    <section class="lg:grid grid-cols-4 gap-6">
        <div style="background: var(--card-bg-color);" class="col-span-3 p-2 rounded-lg">
            <p>Résultat pour : <span class="font-bold"><?= $for ?></span></p>
        </div>
        <div class="flex">
            <div class="relative w-full">
                <form action="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER')?>forum/search" method="POST">
                    <?php (new SecurityManager())->insertHiddenToken() ?>
                    <input type="text" name="for"
                           class="input block p-1.5 w-full z-20 text-sm rounded-lg border-l-2"
                           placeholder="Rechercher">
                    <button type="submit" style="background-color: var(--main-color); "
                            class="absolute top-0 right-0 p-1.5 text-sm font-medium rounded-r">
                        <i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </section>

    <section class="<?php if (ThemeModel::getInstance()->fetchConfigValue('forum_use_widgets')): ?>lg:grid <?php endif; ?> grid-cols-4 gap-6 my-8">
        <div class="col-span-3 space-y-6">
            <div style="background: var(--card-bg-color);" class="p-4 rounded-lg h-fit">
                <div class="mt-2 space-y-2">
                    <?php if (empty($results)): ?>
                        <h4 class="text-center">Nous n'avons rien trouvé !</h4>
                    <?php else: ?>
                        <div class="w-full ">
                            <div style="color: var(--main-color)" class="flex py-4 title-color forum-title-divider">
                                <div class="md:w-[25%] px-4 font-bold">Topics</div>
                                <div class="hidden md:block w-[40%] font-bold text-center">Contenue</div>
                                <div class="hidden md:block w-[10%] font-bold text-center">Réponses</div>
                                <div class="hidden md:block w-[25%] font-bold text-center">Posté par</div>
                            </div>
                            <?php foreach ($results as $result): ?>
                                <div class="relative flex py-2 hover-topic-forum">
                                    <div class="md:w-[25%] px-5 relative my-auto">
                                        <a class="flex flex-wrap" href="<?= $result->getLink() ?>">
                                            <p><?php if ($result->getPrefixId()): ?><span class="px-2 text-white rounded-lg"
                                                                                          style="color: <?= $result->getPrefixTextColor() ?>; background: <?= $result->getPrefixColor() ?>"><?= $result->getPrefixName() ?></span> <?php endif; ?>
                                                <?= mb_strimwidth($result->getName(), 0, 65, '...') ?>
                                                <?= $result->isImportant() ? "
                            <i data-tooltip-target='tooltip-important' class='<?= $iconImportant ?> fa-sm text-orange-500'></i>
                            <span id='tooltip-important' role='tooltip' class='absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg'>
                                Important
                            </span>
                            " : "" ?>
                                                <?= $result->isPinned() ? "
                            <i data-tooltip-target='tooltip-pined' class='<?= $iconPin ?> fa-sm text-red-600 ml-2'></i>
                            <span id='tooltip-pined' role='tooltip' class='absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg'>
                                Épinglé
                            </span>
                             " : "" ?>
                                                <?= $result->isDisallowReplies() ? "
                            <i data-tooltip-target='tooltip-closed' class='<?= $iconClosed ?> fa-sm text-yellow-300 ml-2'></i>
                            <span id='tooltip-closed' role='tooltip' class='absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg'>
                                Fermé
                            </span>
                             " : "" ?>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="hidden md:inline-block w-[40%] text-center my-auto"><?= mb_strimwidth($result->getContent(), 0, 150, '...') ?></div>
                                    <div class="hidden md:inline-block w-[10%] text-center my-auto"><?= $responseModel->countResponseInTopic($result->getId()) ?></div>
                                    <div class="hidden md:block w-[25%] my-auto">
                                        <div class="flex text-sm">
                                            <a href="#">
                                                <div tabindex="0" class="avatar w-10">
                                                    <div class="w-fit">
                                                        <img src="https://apiv2.craftmywebsite.fr/skins/3d/user=<?= $result->getUser()->getPseudo() ?>&headOnly=true" />
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="ml-2">
                                                    <div class=""><?= $result->getUser()->getPseudo() ?></div>
                                                    <div><?= $result->getCreated() ?></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <!--WIDGET-->
        <?php if (ThemeModel::getInstance()->fetchConfigValue('forum_use_widgets')): ?>
            <section class="h-fit space-y-6">
                <?php if (ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_stats')): ?>
                    <div style="background: var(--card-bg-color);" class="w-full rounded-lg p-4">
                        <div class="flex">
                            <h4 style="color: var(--main-color)">Stats forum</h4>
                        </div>
                        <div class="">
                            <?php if (ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_member')): ?>
                                <p><?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_member') ?>
                                <b><?= UsersModel::getInstance()->countUsers() ?></b></p><?php endif; ?>
                            <?php if (ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_messages')): ?>
                                <p><?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_messages') ?>
                                <b><?= $forumModel->countAllMessagesInAllForum() ?></b></p><?php endif; ?>
                            <?php if (ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_topics')): ?>
                                <p><?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_topics') ?>
                                <b><?= $forumModel->countAllTopicsInAllForum() ?></b></p><?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_discord')): ?>
                    <div class="w-full">
                        <div class="">
                            <iframe style="width: 100%"
                                    src="https://discord.com/widget?id=<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_content_id') ?>&theme=dark"
                                    height="400" allowtransparency="true"
                                    sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_custom')): ?>
                    <div style="background: var(--card-bg-color);" class="w-full rounded-lg p-4">
                        <div class="flex">
                            <h4 style="color: var(--main-color)"><?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_custom_title') ?></h4>
                        </div>
                        <div class=""><?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_custom_text') ?></div>
                    </div>
                <?php endif; ?>
            </section>
        <?php endif; ?>

    </section>


</section>
