<?php

use CMW\Entity\Wiki\WikiArticlesEntity;
use CMW\Entity\Wiki\WikiCategoriesEntity;
use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle(ThemeModel::getInstance()->fetchConfigValue('wiki_title'));
Website::setDescription(ThemeModel::getInstance()->fetchConfigValue('wiki_description'));

/* @var ?WikiArticlesEntity $article */
/* @var ?WikiArticlesEntity $firstArticle */
/* @var WikiCategoriesEntity[] $categories */
?>
<?php if (ThemeModel::getInstance()->fetchConfigValue('overlay_everywhere')): ?>
    <div class="overlay"></div>
<?php endif; ?>

<section class="mb-8 px-8 md:px-36 2xl:px-96">
    <div class="lg:grid grid-cols-4 gap-6">
        <div style="background: var(--card-bg-color);" class="rounded-lg py-6 px-4 space-y-3 h-fit">
            <h4 style="color: var(--main-color)" class="text-center">
                <?= ThemeModel::getInstance()->fetchConfigValue('wiki_menu_title') ?>
            </h4>
            <?php foreach ($categories as $categorie): ?>
                <div class="flex flex-col space-y-1">
                    <p class="uppercase font-bold">
                        <?php if (ThemeModel::getInstance()->fetchConfigValue('wiki_display_categorie_icon')): ?>
                            <i class="<?= $categorie->getIcon() ?>"></i>
                        <?php endif; ?>
                        <?= $categorie->getName() ?>
                    </p>
                    <?php foreach ($categorie?->getArticles() as $menuArticle): ?>
                        <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') . 'wiki/' . $categorie->getSlug() . '/' . $menuArticle->getSlug() ?>"
                           class="a-base ml-3">
                            <?php if (ThemeModel::getInstance()->fetchConfigValue('wiki_display_article_categorie_icon')): ?>
                                <i class="<?= $menuArticle->getIcon() ?>"></i>
                            <?php endif; ?>
                            <?= $menuArticle->getTitle() ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div style="background: var(--card-bg-color);" class="rounded-lg p-6 col-span-3 h-fit">
            <?php if ($article !== null): ?>
                <h4 style="color: var(--main-color)" class="text-center">
                    <?php if (ThemeModel::getInstance()->fetchConfigValue('wiki_display_article_icon')): ?>
                        <i class="<?= $article->getIcon() ?>"></i>
                    <?php endif; ?>
                    <?= $article->getTitle() ?>
                </h4>
                <?= $article->getContent() ?>
                <hr>
                <div class="flex flex-wrap justify-between items-center mt-2">
                    <?php if (ThemeModel::getInstance()->fetchConfigValue('wiki_display_creation_date')): ?>
                        <p class="text-xs">
                            Crée le : <?= $article->getDateCreate() ?>
                        </p>
                    <?php endif; ?>
                    <?php if (ThemeModel::getInstance()->fetchConfigValue('wiki_display_autor')): ?>
                        <p class="text-xs py-1 px-2 bg-gray-300">
                            <?= $article->getAuthor()->getPseudo() ?>
                        </p>
                    <?php endif; ?>
                    <?php if (ThemeModel::getInstance()->fetchConfigValue('wiki_display_edit_date')): ?>
                        <p class="text-xs">
                            Modifié le : <?= $article->getDateUpdate() ?>
                        </p>
                    <?php endif; ?>
                </div>
            <?php elseif ($firstArticle === null): ?>
                <h4 style="color: var(--main-color)" class="text-center">Aucun article</h4>
                Nos administrateurs travaillent dessus !
                <hr>
                <div class="flex flex-wrap justify-between items-center mt-2">
                    <?php if (ThemeModel::getInstance()->fetchConfigValue('wiki_display_creation_date')): ?>
                        <p class="text-xs">
                            Crée-le : Jamais
                        </p>
                    <?php endif; ?>
                    <?php if (ThemeModel::getInstance()->fetchConfigValue('wiki_display_autor')): ?>
                        <p class="text-xs py-1 px-2 bg-gray-300">
                            Personne
                        </p>
                    <?php endif; ?>
                    <?php if (ThemeModel::getInstance()->fetchConfigValue('wiki_display_edit_date')): ?>
                        <p class="text-xs">
                            Modifié le : Jamais
                        </p>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <h4 style="color: var(--main-color)" class="text-center">
                    <?php if (ThemeModel::getInstance()->fetchConfigValue('wiki_display_article_icon')): ?>
                        <i class="<?= $firstArticle->getIcon() ?>"></i>
                    <?php endif; ?>
                    <?= $firstArticle->getTitle() ?>
                </h4>
                <?= $firstArticle->getContent() ?>
                <hr>
                <div class="flex flex-wrap justify-between items-center mt-2">
                    <?php if (ThemeModel::getInstance()->fetchConfigValue('wiki_display_creation_date')): ?>
                        <p class="text-xs">
                            Crée le : <?= $firstArticle->getDateCreate() ?>
                        </p>
                    <?php endif; ?>
                    <?php if (ThemeModel::getInstance()->fetchConfigValue('wiki_display_autor')): ?>
                        <p class="text-xs py-1 px-2 bg-gray-300">
                            <?= $firstArticle->getAuthor()->getPseudo() ?>
                        </p>
                    <?php endif; ?>
                    <?php if (ThemeModel::getInstance()->fetchConfigValue('wiki_display_edit_date')): ?>
                        <p class="text-xs">
                            Modifié le : <?= $firstArticle->getDateUpdate() ?>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>