<?php

use CMW\Entity\Wiki\WikiArticlesEntity;
use CMW\Entity\Wiki\WikiCategoriesEntity;
use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle(ThemeModel::getInstance()->fetchConfigValue('wiki','wiki_page_title'));
Website::setDescription('');

/* @var ?WikiArticlesEntity $article */
/* @var ?WikiArticlesEntity $firstArticle */
/* @var WikiCategoriesEntity[] $categories */
?>
<div data-cmw-visible="global:overlay_everywhere" data-cmw-style="background-image:global:overlay_img" class="overlay"></div>

<section class="mb-8 px-8 md:px-36 2xl:px-96">
    <div class="lg:grid grid-cols-4 gap-6">
        <div style="background: var(--card-bg-color);" class="rounded-lg py-6 px-4 space-y-3 h-fit">
            <h4 data-cmw="wiki:wiki_menu_title" style="color: var(--main-color)" class="text-center">
            </h4>
            <?php foreach ($categories as $categorie): ?>
                <div class="flex flex-col space-y-1">
                    <p class="uppercase font-bold">
                            <i data-cmw-visible="wiki:wiki_display_categorie_icon" class="<?= $categorie->getIcon() ?>"></i>
                        <?= $categorie->getName() ?>
                    </p>
                    <?php foreach ($categorie?->getArticles() as $menuArticle): ?>
                        <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') . 'wiki/' . $categorie->getSlug() . '/' . $menuArticle->getSlug() ?>"
                           class="a-base ml-3">
                                <i data-cmw-visible="wiki:wiki_display_article_categorie_icon" class="<?= $menuArticle->getIcon() ?>"></i>
                            <?= $menuArticle->getTitle() ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div style="background: var(--card-bg-color);" class="rounded-lg p-6 col-span-3 h-fit">
            <?php if ($article !== null): ?>
                <h4 style="color: var(--main-color)" class="text-center">
                        <i data-cmw-visible="wiki:wiki_display_article_icon" class="<?= $article->getIcon() ?>"></i>
                    <?= $article->getTitle() ?>
                </h4>
                <?= $article->getContent() ?>
                <hr>
                <div class="flex flex-wrap justify-between items-center mt-2">
                        <p data-cmw-visible="wiki:wiki_display_creation_date" class="text-xs">
                            Crée le : <?= $article->getDateCreate() ?>
                        </p>
                        <p data-cmw-visible="wiki:wiki_display_autor" class="text-xs py-1 px-2 bg-gray-300">
                            <?= $article->getAuthor()->getPseudo() ?>
                        </p>
                        <p data-cmw-visible="wiki:wiki_display_edit_date" class="text-xs">
                            Modifié le : <?= $article->getDateUpdate() ?>
                        </p>
                </div>
            <?php elseif ($firstArticle === null): ?>
                <h4 style="color: var(--main-color)" class="text-center">Aucun article</h4>
                Nos administrateurs travaillent dessus !
                <hr>
                <div class="flex flex-wrap justify-between items-center mt-2">
                        <p data-cmw-visible="wiki:wiki_display_creation_date" class="text-xs">
                            Crée-le : Jamais
                        </p>
                        <p data-cmw-visible="wiki:wiki_display_autor" class="text-xs py-1 px-2 bg-gray-300">
                            Personne
                        </p>
                        <p data-cmw-visible="wiki:wiki_display_edit_date" class="text-xs">
                            Modifié le : Jamais
                        </p>
                </div>
            <?php else: ?>
                <h4 style="color: var(--main-color)" class="text-center">
                        <i data-cmw-visible="wiki:wiki_display_article_icon" class="<?= $firstArticle->getIcon() ?>"></i>
                    <?= $firstArticle->getTitle() ?>
                </h4>
                <?= $firstArticle->getContent() ?>
                <hr>
                <div class="flex flex-wrap justify-between items-center mt-2">
                        <p data-cmw-visible="wiki:wiki_display_creation_date" class="text-xs">
                            Crée le : <?= $firstArticle->getDateCreate() ?>
                        </p>
                        <p data-cmw-visible="wiki:wiki_display_autor" class="text-xs py-1 px-2 bg-gray-300">
                            <?= $firstArticle->getAuthor()->getPseudo() ?>
                        </p>
                        <p data-cmw-visible="wiki:wiki_display_edit_date" class="text-xs">
                            Modifié le : <?= $firstArticle->getDateUpdate() ?>
                        </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>