<?php

use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;

$newsList = $newsModel->getSomeNews(ThemeModel::getInstance()->fetchConfigValue('news_page_number_display'), 'DESC');

use CMW\Controller\Users\UsersController;
use CMW\Utils\Website;

/* TITRE ET DESCRIPTION */
Website::setTitle(ThemeModel::getInstance()->fetchConfigValue('news_title'));
Website::setDescription(ThemeModel::getInstance()->fetchConfigValue('news_description'));
?>
<?php if (ThemeModel::getInstance()->fetchConfigValue('overlay_everywhere')): ?>
    <div class="overlay"></div>
<?php endif; ?>

<section class="mb-8 px-8 md:px-36 2xl:px-96">
    <div class="lg:grid grid-cols-2 gap-6">
        <?php foreach ($newsList as $news): ?>
        <div style="background: var(--card-bg-color);" class="flex flex-col p-4 rounded-2xl">
            <div class="relative h-52 overflow-hidden zoomable-image">
                <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>news/<?= $news->getSlug() ?>" class="rotate-news">
                    <img src="<?= $news->getImageLink() ?>" style="object-fit: cover" class="rotate-news-img top-0 left-0 absolute w-full h-full rounded-lg">
                </a>
            </div>
            <div class="px-6 py-4 space-y-4">
                <h4 style="color: var(--main-color)"><?= $news->getTitle() ?></h4>
                <p><?= $news->getDescription() ?></p>
                <div class="flex items-center space-x-2">
                    <img width="40px" loading="lazy" src="https://apiv2.craftmywebsite.fr/skins/2d/user=<?= $news->getAuthor()->getPseudo() ?>&headOnly=true">
                    <div class="w-full flex justify-between items-end">
                        <div>
                            <p><?= $news->getAuthor()->getPseudo() ?></p>
                            <p class="text-xs"><?= $news->getDateCreated() ?></p>
                        </div>
                        <div>
                            <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>news/<?= $news->getSlug() ?>" class="btn">Lire l'article</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>