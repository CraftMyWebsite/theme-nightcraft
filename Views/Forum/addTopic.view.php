<?php

use CMW\Controller\Forum\Admin\ForumPermissionController;
use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Manager\Security\SecurityManager;
use CMW\Controller\Users\UsersController;
use CMW\Utils\Website;

/** @var \CMW\Entity\Forum\ForumCategoryEntity $category */
/** @var \CMW\Entity\Forum\ForumEntity $forum */
/* @var CMW\Model\Forum\ForumModel $forumModel */
/* @var CMW\Controller\Forum\ForumSettingsController $iconNotRead */
/* @var CMW\Controller\Forum\ForumSettingsController $iconImportant */
/* @var CMW\Controller\Forum\ForumSettingsController $iconPin */
/* @var CMW\Controller\Forum\ForumSettingsController $iconClosed */
/* @var CMW\Controller\Forum\ForumSettingsController $iconNotReadColor */
/* @var CMW\Controller\Forum\ForumSettingsController $iconImportantColor */
/* @var CMW\Controller\Forum\ForumSettingsController $iconPinColor */
/* @var CMW\Controller\Forum\ForumSettingsController $iconClosedColor */

Website::setTitle("Forum");
Website::setDescription("Ajouter un sujet");
?>
<?php if(ThemeModel::getInstance()->fetchConfigValue('overlay_everywhere')): ?>
    <div class="overlay"></div>
<?php endif; ?>

<section class="mb-16 px-4 md:px-36 2xl:px-72 space-y-8">
    <section class=" gap-6">
        <div style="background: var(--card-bg-color);" class="col-span-3 p-2 rounded-lg">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-2">
                    <li class="">
                        <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>forum" class="a-forum">
                            <?= ThemeModel::getInstance()->fetchConfigValue('forum_breadcrumb_home') ?>
                        </a>
                    </li>
                    <li>
                        <div class="">
                            <i style="color: var(--main-color);" class="fa-solid fa-chevron-right"></i>
                            <a href="<?= $category->getLink() ?>"
                               class="a-forum ml-2"><?= $category->getName() ?></a>
                        </div>
                    </li>
                    <?php foreach ($forumModel->getParentByForumId($forum->getId()) as $parent): ?>
                    <li>
                        <div class="">
                            <i style="color: var(--main-color);" class="fa-solid fa-chevron-right"></i>
                            <a href="../../<?= $parent->getName() ?>"
                               class="a-forum ml-2"><?= $parent->getName() ?></a>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ol>
            </nav>
        </div>
    </section>

    <section style="background: var(--card-bg-color);" class="rounded-lg">
        <div class="rounded-md p-8">

            <h4>Nouveau topic dans : <b><?= $forum->getName() ?></b></h4>
            <form action="" method="post">
                <?php (new SecurityManager())->insertHiddenToken() ?>
                <?php if (UsersController::isAdminLogged() || ForumPermissionController::getInstance()->hasPermission("operator")) : ?>
                <!--
                ADMINISTRATION
                -->
                <div class="border-b p-2">
                    <p class="font-semibold mt-2 text-center">Administration</p>
                    <div class="flex">
                        <div class="flex ml-3 space-x-4">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input name="important" value="1" id="important" type="checkbox" class="input  w-4 h-4 rounded" >
                                </div>
                                <label for="important" class="ml-2 text-sm font-medium"><i style='color: <?= $iconImportantColor?>' class="<?= $iconImportant ?> fa-sm"></i> Important</label>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input name="pin" id="pin" type="checkbox" value="" class="input w-4 h-4 rounded" >
                                </div>
                                <label for="pin" class="ml-2 text-sm font-medium"><i style='color: <?= $iconPinColor?>' class="<?= $iconPin ?> fa-sm"></i> Épingler</label>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input name="disallow_replies" value="1" id="closed" type="checkbox" class="input w-4 h-4 rounded " >
                                </div>
                                <label for="closed" class="ml-2 text-sm font-medium"><i style='color: <?= $iconClosedColor?>' class="<?= $iconClosed ?> fa-sm"></i> Fermer</label>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <!--
                PUBLIC
                -->
                <p class="font-semibold mt-4 text-center">Topic<span class="text-red-500">*</span></p>
                <div class="grid gap-6 mb-4 md:grid-cols-2 mt-4">
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium">Titre du topic<span class="text-red-500">*</span> :</label>
                        <input name="name" id="title" type="text" class="input text-sm rounded-lg block w-full p-2.5" placeholder="Titre du topic" required></div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium">Tags : <small>Séparez vos tags par ','</small></label>
                        <input name="tags" type="text" id="last_name" class="input text-sm rounded-lg block w-full p-2.5" placeholder="Tag1,Tag2,Tag3">
                    </div>
                </div>
                <label class="block mb-2 text-sm font-medium ">Options :</label>
                <div class="flex mb-4 ">
                    <div class="flex ml-3 space-x-4">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="follow" type="checkbox" name="followTopic" class="input w-4 h-4 rounded" checked>
                            </div>
                            <label for="follow" class="ml-2 text-sm font-medium">Suivre la discussion (alérter par mail)</label>
                        </div>
                    </div>
                </div>
                <label class="block mb-2 text-sm font-medium ">Contenue<span class="text-red-500">*</span> :</label>
                <textarea minlength="20" name="content"  class="input w-full tinymce"></textarea>
                <div class="text-center mt-4">
                    <button type="submit" class="btn"><i class="fa-solid fa-pen-to-square"></i> Poster</button>
                </div>
            </form>
        </div>
    </section>

</section>