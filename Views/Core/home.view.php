<?php

use CMW\Controller\Core\SecurityController;
use CMW\Controller\Users\UsersController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;
/* Check installed package */
use CMW\Controller\Core\PackageController;
/* NEWS BASIC NEED */
use CMW\Model\News\NewsModel;

if (PackageController::isInstalled('News')) {
    /* @var \CMW\Entity\News\NewsEntity[] $newsList */
    $newsLists = new newsModel;
    $newsList = $newsLists->getSomeNews(ThemeModel::getInstance()->fetchConfigValue('home-news','news_number_display'));
}

/* CONTACT BASIC NEDD */
use CMW\Model\Contact\ContactModel;

/* TITRE ET DESCRIPTION */
Website::setTitle(Website::getWebsiteDescription());
Website::setDescription(Website::getWebsiteDescription());
?>
<div data-cmw-style="background-image:global:overlay_img" class="overlay"></div>

<section class="mt-6 text-center mb-28">
    <h1 data-cmw-visible="header:header_active_title" style="color: var(--main-color)"><?= Website::getWebsiteName() ?></h1>
    <img data-cmw-visible="header:header_active_logo" data-cmw-style="width:header:site_image_width" data-cmw-attr="src:header:header_img_logo" class="mx-auto mb-6" alt="logo">
    <a onclick="copyURL('<?= ThemeModel::getInstance()->fetchConfigValue('header','join_ip') ?>')" class="home-button uppercase font-bold px-4 py-3 rounded cursor-pointer space-x-3">
        <span data-cmw="header:join_ip"></span>
    </a>
    <p class="text-xs mt-3">Clique pour copier !</p>
</section>

    <div data-cmw-visible="home-custom:custom_section_active_1" style="background: var(--card-bg-color);" class="px-8 md:px-36 2xl:px-96 my-16">
        <div class="text-center w-full">
            <h4 data-cmw="home-custom:custom_section_title_1" style="color: var(--main-color)"></h4>
        </div>
        <div data-cmw="home-custom:custom_section_content_1">
        </div>
    </div>

<?php if (PackageController::isInstalled('News')): ?>
<section data-cmw-visible="home-news:news_section_active" class="mb-8 px-8 md:px-36 2xl:px-96">
    <div style="background-color: var(--card-bg-color)" class="p-6 rounded-xl">
        <div class="flex justify-between items-center">
            <h4 data-cmw="home-news:news_section_title"></h4>
            <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>news" class="btn">Voir plus d'articles</a>
        </div>
        <p data-cmw="home-news:news_section_desc"></p>
        <div class="lg:grid grid-cols-3 gap-6">
            <?php foreach ($newsList as $news): ?>
            <div style="background-color: var(--card-in-card-bg-color)" class="p-4 rounded-2xl flex flex-col zoomable-image">
                <div class="relative h-52 overflow-hidden">
                    <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>news/<?= $news->getSlug() ?>" class="">
                        <img src="<?= $news->getImageLink() ?>" style="object-fit: cover" class="top-0 left-0 absolute w-full h-full rounded-lg">
                    </a>
                </div>
                <div class="space-y-4 mt-2">
                    <h4><?= $news->getTitle() ?></h4>
                    <p><?= $news->getDescription() ?></p>
                </div>
                <div class="mt-auto">
                    <div class="flex justify-between mb-2">
                        <p class="text-xs"><?= $news->getDateCreated() ?></p>

                        <div class="cursor-pointer">
                            <?php if ($news->isLikesStatus()): ?>
                                <span data-tooltip-target="<?php if ($news->getLikes()->userCanLike()) { echo 'tooltip-liked'; } else { echo 'tooltip-like'; } ?>">
                                <span class="text-base"><?= $news->getLikes()->getTotal() ?>
                                    <?php if ($news->getLikes()->userCanLike()): ?>
                                        <a href="#"><i class="fa-solid fa-heart"></i></a>
                                        <div id="tooltip-liked" role="tooltip" class="hidden lg:inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                        <?php if (UsersController::isUserLogged()) { echo 'Vous aimez déjà !'; } else { echo 'Connectez-vous pour aimé !'; } ?>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <?php else: ?>
                                        <a href="<?= $news->getLikes()->getSendLike() ?>"><i class="fa-regular fa-heart"></i></a>
                                        <div id="tooltip-like" role="tooltip" class="hidden lg:inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                        Merci pour votre soutien !
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <?php endif; ?>
                                </span>
                                </span>
                            <?php endif; ?>
                        </div>

                    </div>

                    <div class="flex justify-center">
                        <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>news/<?= $news->getSlug() ?>" class="btn text-center">Lire l'article</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

    <div data-cmw-visible="home-custom:custom_section_active_2" style="background: var(--card-bg-color);" class="px-8 md:px-36 2xl:px-96 my-16">
        <div class="text-center w-full">
            <h4 data-cmw="home-custom:custom_section_title_2" style="color: var(--main-color)"></h4>
        </div>
        <div data-cmw="home-custom:custom_section_content_2">
        </div>
    </div>

<section data-cmw-visible="home-join:join_section_active" style="background-color: var(--card-bg-color)" class="px-8 md:px-36 2xl:px-96 my-16">
    <div class="lg:grid grid-cols-2 py-16 gap-6 items-center">
        <div class="flex justify-center">
            <img data-cmw-style="width:home-join:home_join_width" data-cmw-attr="src:home-join:join_section_img" style="object-fit: cover;" class="rounded-lg">
        </div>
        <div class="space-y-6">
            <h4 data-cmw="home-join:join_section_title"></h4>
            <p data-cmw="home-join:join_section_text"></p>
            <div class="flex justify-center mt-4">
                <a data-cmw-attr="href:home-join:join_section_url" target="_blank" class="btn" data-cmw="home-join:join_section_text_button"></a>
            </div>
        </div>
    </div>
</section>

<div data-cmw-visible="home-custom:custom_section_active_3" style="background: var(--card-bg-color);" class="px-8 md:px-36 2xl:px-96 my-16">
    <div class="text-center w-full">
        <h4 data-cmw="home-custom:custom_section_title_3" style="color: var(--main-color)"></h4>
    </div>
    <div data-cmw="home-custom:custom_section_content_3">
    </div>
</div>

<div data-cmw-visible="home-custom:custom_section_active_4" style="background: var(--card-bg-color);" class="px-8 md:px-36 2xl:px-96 my-16">
    <div class="text-center w-full">
        <h4 data-cmw="home-custom:custom_section_title_4" style="color: var(--main-color)"></h4>
    </div>
    <div data-cmw="home-custom:custom_section_content_4">
    </div>
</div>