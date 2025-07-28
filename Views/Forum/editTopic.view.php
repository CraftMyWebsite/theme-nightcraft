<?php

use CMW\Controller\Users\UsersController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/* @var \CMW\Entity\Forum\ForumCategoryEntity $category */
/* @var CMW\Entity\Forum\ForumEntity $forum */

Website::setTitle('Forum');
Website::setDescription('Éditez un topic');
?>
<div data-cmw-visible="global:overlay_everywhere" data-cmw-style="background-image:global:overlay_img" class="overlay"></div>

<section class="mb-16 px-4 md:px-36 2xl:px-72 space-y-8">
    <section class=" gap-6">
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
                    <li>
                        <div class="">
                            <i style="color: var(--main-color);" class="fa-solid fa-chevron-right"></i>
                            <a href="<?= $forum->getLink() ?>"
                               class="a-forum ml-2"><?= $forum->getName() ?></a>
                        </div>
                    </li>
                    <li>
                        <div class="">
                            <i style="color: var(--main-color);" class="fa-solid fa-chevron-right"></i>
                            <a href="<?= $topic->getLink($category->getLink(), $forum->getSlug()) ?>"
                               class="a-forum ml-2"><?= $topic->getName() ?></a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section style="background: var(--card-bg-color);" class="rounded-lg">
        <div class="rounded-md shadow-lg p-8">

            <h4>Édition du topic : <b><?= $topic->getName() ?></b></h4>
            <form action="" method="post">
                <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                <p class="font-semibold mt-4 text-center">Topic<span class="text-red-500">*</span></p>
                <div class="grid gap-6 mb-4 md:grid-cols-2 mt-4">
                    <div>
                        <input type="text" name="topicId" hidden value="<?= $topic->getId() ?>">
                        <label for="title" class="block mb-2 text-sm font-medium">Titre du topic<span class="text-red-500">*</span> :</label>
                        <input name="name" id="title" type="text" class="input w-full" placeholder="Titre du topic" required value="<?= $topic->getName() ?>"></div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium">Tags : <small>Séparez vos tags par ','</small></label>
                        <input name="tags" type="text" id="last_name" class="input w-full" placeholder="Tag1,Tag2,Tag3" value="<?php foreach ($topic->getTags() as $tag) { echo '' . $tag->getContent() . ','; } ?>">
                    </div>
                </div>
                <label class="block mb-2 text-sm font-medium ">Contenue<span class="text-red-500">*</span> :</label>
                <textarea minlength="20" name="content"  class="input w-full tinymce"><?= $topic->getContent() ?></textarea>
                <div class="text-center mt-4">
                    <button type="submit" class="btn"><i class="fa-solid fa-pen-to-square"></i> Éditer</button>
                </div>
            </form>
        </div>
    </section>

</section>