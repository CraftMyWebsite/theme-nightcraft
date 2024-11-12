<?php

use CMW\Manager\Env\EnvManager;
use CMW\Utils\Utils;
/* @var \CMW\Entity\News\NewsEntity $news */
use CMW\Controller\Users\UsersController;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/* TITRE ET DESCRIPTION */
Website::setTitle(ThemeModel::getInstance()->fetchConfigValue('news_title') . ' - ' . $news->getTitle());
Website::setDescription(ThemeModel::getInstance()->fetchConfigValue('news_description'));
?>
<?php if (ThemeModel::getInstance()->fetchConfigValue('overlay_everywhere')): ?>
    <div class="overlay"></div>
<?php endif; ?>

<section class="mb-8 px-8 md:px-36 2xl:px-96">
        <div style="background: var(--card-bg-color);" class="flex flex-col rounded-lg">
            <div class="relative h-52 overflow-hidden">
                <a class="zoomable-image">
                    <img src="<?= $news->getImageLink() ?>" style="object-fit: cover" class="rotate-news-img top-0 left-0 absolute w-full h-full">
                </a>
            </div>
            <div class="px-6 py-4 space-y-4">
                <div class="text-center">
                    <h4 style="color: var(--main-color)"><?= $news->getTitle() ?></h4>
                    <p><?= $news->getDescription() ?></p>
                </div>

                <div style="background: var(--card-in-card-bg-color);" class="rounded-lg p-4">
                    <?= $news->getContent() ?>
                </div>

                <div class="flex items-center space-x-2">
                    <img width="40px" loading="lazy" src="https://apiv2.craftmywebsite.fr/skins/2d/user=<?= $news->getAuthor()->getPseudo() ?>&headOnly=true">
                    <div class="w-full flex justify-between items-end">
                        <div>
                            <p><?= $news->getAuthor()->getPseudo() ?></p>
                            <p class="text-xs"><?= $news->getDateCreated() ?></p>
                        </div>
                        <div>
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
                    </div>

                </div>
            </div>
        </div>
<?php if ($news->isCommentsStatus()): ?>
        <div style="background: var(--card-bg-color);" class="rounded-lg h-fit p-4 mt-8">
            <div class="page-title-divider text-center pt-1 w-full">
                <h4 style="color: var(--main-color)">Espace commentaire</h4>
            </div>
            <div class="p-4">
    <?php foreach ($news->getComments() as $comment): ?>
                <div style="background: var(--card-in-card-bg-color);" class="rounded-lg shadow md:grid md:grid-cols-6 py-4 pr-4 mb-4">
                    <div class="">
                        <img class="hidden lg:block mx-auto" height="35%" width="35%" src="https://apiv2.craftmywebsite.fr/skins/3d/user=<?= $comment->getUser()->getPseudo() ?>&headOnly=true" alt="...">
                    </div>
                    <div class="col-span-5 px-4 md:px-0">
                        <div class="flex justify-between">
                            <p class="font-bold"><?= $comment->getUser()->getPseudo() ?> :</p>
                            <p class="mini-card font-medium inline-block px-3 py-1 rounded-sm text-xs uppercase"><?= $comment->getDate() ?></p>
                        </div>
                        <div><?= $comment->getContent() ?></div>
                        <div class="flex justify-end">
                            <div class="cursor-pointer">
                                <span data-tooltip-target="<?php if ($comment->userCanLike()) { echo 'tooltip-liked'; } else { echo 'tooltip-like'; } ?>">
                                <span class="text-base"><?= $comment->getLikes()->getTotal() ?>
                                    <?php if ($comment->userCanLike()): ?>
                                        <a href="#"><i class="fa-solid fa-heart"></i></a>
                                        <div id="tooltip-liked" role="tooltip" class="hidden lg:inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                        <?php if (UsersController::isUserLogged()) { echo 'Vous aimez déjà !'; } else { echo 'Connectez-vous pour aimé !'; } ?>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <?php else: ?>
                                        <a href="<?= $comment->getSendLike() ?>"><i class="fa-regular fa-heart"></i></a>
                                        <div id="tooltip-like" role="tooltip" class="hidden lg:inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                        Merci pour votre soutien !
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <?php endif; ?>
                                </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
    <?php endforeach; ?>
                <hr>
                <div class=" mb-4 pb-4">
                    <form action="<?= $news->sendComments() ?>" method="post" class="rounded-md">
                        <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                        <div class=" w-full mt-2">
                            <label for="message" class="block mb-2 text-sm font-medium ">Votre commentaire :</label>
                            <textarea minlength="50"  id="message" name="comments" rows="4" class="input block p-2.5 w-full text-sm  bg-gray-50 rounded border border-gray-300" placeholder="Bonjour," required></textarea>
                        </div>
                        <div class="text-center mt-4">
    <?php if (UsersController::isUserLogged()): ?>
                            <button type="submit"  class="btn">Commenter <i class="fa-solid fa-comments"></i></button>
    <?php else: ?>
                            <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>login" class="btn">Connexion <i class="fa-solid fa-user"></i></a>
    <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php endif; ?>
    </section>
