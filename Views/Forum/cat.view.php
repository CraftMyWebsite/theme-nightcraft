<?php

use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Users\UsersModel;
use CMW\Utils\Website;

/** @var \CMW\Model\Forum\ForumModel $forumModel */
/** @var \CMW\Entity\Forum\ForumCategoryEntity $category */
Website::setTitle('Forum');
Website::setDescription('Consulter les catégorie du Forum');
?>
<div data-cmw-visible="global:overlay_everywhere" data-cmw-style="background-image:global:overlay_img" class="overlay"></div>

<section class="mb-16 px-4 md:px-36 2xl:px-72 space-y-8">
    <section class="lg:grid grid-cols-4 gap-6">
        <div style="background: var(--card-bg-color);" class="col-span-3 p-2 rounded-lg">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-2">
                    <li class="">
                        <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>forum" class="a-forum">
                            <?= ThemeModel::getInstance()->fetchConfigValue('forum','forum_breadcrumb_home') ?>
                        </a>
                    </li>
                    <li>
                        <div class="">
                            <i style="color: var(--main-color);" class="fa-solid fa-chevron-right"></i>
                            <a href="<?= $category->getLink() ?>"
                               class="a-forum ml-2"><?= $category->getName() ?></a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="flex">
            <div class="relative w-full">
                <form action="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>forum/search" method="POST">
                    <?php SecurityManager::getInstance()->insertHiddenToken() ?>
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

    <section class="<?php if (ThemeModel::getInstance()->fetchConfigValue('forum','forum_use_widgets')): ?>lg:grid <?php endif; ?> grid-cols-4 gap-6 my-8">
        <div class="col-span-3 space-y-6">
            <?php if ($category->isUserAllowed()): ?>
            <div style="background: var(--card-bg-color);" class="p-4 rounded-lg h-fit">
                <h4 style="color: var(--main-color)"><?= $category->getFontAwesomeIcon() ?> <?= $category->getName() ?></h4>
                <div class="mt-2 space-y-2">
                    <?php foreach ($forumModel->getForumByCat($category->getId()) as $forumObj): ?>
                    <?php if ($forumObj->isUserAllowed()): ?>
                    <div class="flex py-2 hover-topic-forum">
                        <div class="md:w-[55%] px-2">
                            <a class="flex items-center" href="<?= $forumObj->getLink() ?>">
                                <div class="py-2 px-2 title-color forum-title-divider rounded-xl shadow-connect w-fit h-fit">
                                    <?= $forumObj->getFontAwesomeIcon('fa-xl') ?>
                                </div>
                                <div class="ml-4">
                                    <div class="font-bold text-lg">
                                        <?= $forumObj->getName() ?>
                                    </div>
                                    <div>
                                        <?= $forumObj->getDescription() ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="hidden md:block w-[20%] my-auto">
                            <p><?= $forumModel->countTopicInForum($forumObj->getId()) ?> Topics</p>
                            <p><?= $forumModel->countMessagesInForum($forumObj->getId()) ?> messages</p>
                        </div>
                        <!--Dernier message-->
                        <div class="hidden md:block w-[25%] my-auto">
                            <div class="flex text-sm">
                                <?php if ($forumObj->getLastResponse() !== null): ?>
                                <a href="<?= $forumObj->getParent()->getLink() ?>/f/<?= $forumObj->getLastResponse()->getResponseTopic()->getForum()->getSlug() ?>/t/<?= $forumObj->getLastResponse()->getResponseTopic()->getSlug() ?>/p<?= $forumObj->getLastResponse()->getPageNumber() ?>/#<?= $forumObj->getLastResponse()?->getId() ?>">
                                    <?php endif; ?>
                                    <div tabindex="0" class="avatar w-10">
                                        <div class="w-fit rounded-full ">
                                            <img src="<?= 'https://apiv2.craftmywebsite.fr/skins/3d/user=' . $forumObj->getLastResponse()?->getUser()->getPseudo() . '&headOnly=true' ?? ThemeModel::getInstance()->fetchImageLink('forum_nobody_send_message_img') ?>"/>
                                        </div>
                                    </div>
                                </a>
                                <?php if ($forumObj->getLastResponse() !== null): ?>
                                <a href="<?= $forumObj->getParent()->getLink() ?>/f/<?= $forumObj->getLastResponse()->getResponseTopic()->getForum()->getSlug() ?>/t/<?= $forumObj->getLastResponse()->getResponseTopic()->getSlug() ?>/p<?= $forumObj->getLastResponse()->getPageNumber() ?>/#<?= $forumObj->getLastResponse()?->getId() ?>">
                                    <?php endif; ?>
                                    <div class="ml-2">
                                        <div class=""><?= $forumObj->getLastResponse()?->getUser()->getPseudo() ?? ThemeModel::getInstance()->fetchConfigValue('forum','forum_nobody_send_message_text') ?></div>
                                        <div><?= $forumObj->getLastResponse()?->getCreated() ?? '' ?></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!--WIDGET-->
        <section data-cmw-visible="forum:forum_use_widgets" class="h-fit space-y-6">
            <div data-cmw-visible="forum:forum_widgets_show_stats" style="background: var(--card-bg-color);" class="w-full rounded-lg p-4">
                <div class="flex">
                    <h4 data-cmw="forum:forum_widgets_title_stats" style="color: var(--main-color)"></h4>
                </div>
                <div class="">
                    <div data-cmw-visible="forum:forum_widgets_show_member">
                        <p>
                            <span data-cmw="forum:forum_widgets_text_member"></span>
                            <b><?= UsersModel::getInstance()->countUsers() ?></b>
                        </p>
                    </div>
                    <div data-cmw-visible="forum:forum_widgets_show_messages">
                        <p>
                            <span data-cmw="forum:forum_widgets_text_messages"></span>
                            <b><?= $forumModel->countAllMessagesInAllForum() ?></b>
                        </p>
                    </div>
                    <div data-cmw-visible="forum:forum_widgets_show_topics">
                        <p>
                            <span data-cmw="forum:forum_widgets_text_topics"></span>
                            <b><?= $forumModel->countAllTopicsInAllForum() ?></b>
                        </p>
                    </div>
                </div>
            </div>

            <div data-cmw-visible="forum:forum_widgets_show_discord" class="w-full">
                <div class="">
                    <iframe style="width: 100%"
                            src="https://discord.com/widget?id=<?= ThemeModel::getInstance()->fetchConfigValue('forum','forum_widgets_content_id') ?>&theme=dark"
                            height="400" allowtransparency="true"
                            sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
                </div>
            </div>
            <div data-cmw-visible="forum:forum_widgets_show_custom" style="background: var(--card-bg-color);" class="w-full rounded-lg p-4">
                <div class="flex">
                    <h4 style="color: var(--main-color)" data-cmw="forum:forum_widgets_custom_title"></h4>
                </div>
                <div data-cmw="forum:forum_widgets_custom_text" class=""></div>
            </div>
        </section>
    </section>

</section>



