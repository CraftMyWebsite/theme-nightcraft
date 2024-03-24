<?php

/* @var \CMW\Entity\Pages\PageEntity $page */
/* @var \CMW\Model\Pages\PagesModel $pages */
/* @var \CMW\Controller\CoreController $core */
/* @var \CMW\Controller\Menus\MenusController $menu */
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle(ucfirst($page->getTitle()));
Website::setDescription(ucfirst($page->getTitle()));
?>
<?php if(ThemeModel::getInstance()->fetchConfigValue('overlay_everywhere')): ?>
    <div class="overlay"></div>
<?php endif; ?>

<section class="mb-8 px-8 md:px-36 2xl:px-96">
    <div style="background: var(--card-bg-color);" class="rounded-lg p-6">
        <h4 style="color: var(--main-color)" class="text-center"><?= ucfirst($page->getTitle()) ?></h4>
        <?= $page->getConverted() ?>
    </div>
</section>