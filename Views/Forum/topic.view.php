<?php

use CMW\Manager\Env\EnvManager;
use CMW\Manager\Uploads\ImagesManager;
use CMW\Model\Core\ThemeModel;
use CMW\Manager\Security\SecurityManager;
use CMW\Controller\Users\UsersController;
use CMW\Model\Forum\ForumDiscordModel;
use CMW\Model\Forum\ForumFeedbackModel;
use CMW\Model\Forum\ForumFollowedModel;
use CMW\Model\Forum\ForumPermissionRoleModel;
use CMW\Model\Users\UsersModel;
use CMW\Utils\Website;

/* @var \CMW\Entity\Forum\ForumCategoryEntity $category */
/* @var CMW\Model\Forum\ForumModel $forumModel */
/* @var CMW\Entity\Forum\ForumEntity $forum */
/* @var CMW\Controller\Forum\ForumSettingsController $iconNotRead */
/* @var CMW\Controller\Forum\ForumSettingsController $iconImportant */
/* @var CMW\Controller\Forum\ForumSettingsController $iconPin */
/* @var CMW\Controller\Forum\ForumSettingsController $iconClosed */
/* @var CMW\Controller\Forum\ForumSettingsController $iconNotReadColor */
/* @var CMW\Controller\Forum\ForumSettingsController $iconImportantColor */
/* @var CMW\Controller\Forum\ForumSettingsController $iconPinColor */
/* @var CMW\Controller\Forum\ForumSettingsController $iconClosedColor */
/* @var CMW\Model\Forum\ForumFeedbackModel $feedbackModel */
/* @var CMW\Entity\Forum\ForumTopicEntity $topic */
/* @var CMW\Entity\Forum\ForumResponseEntity[] $responses */
Website::setTitle("Forum");
Website::setDescription("Lisez les sujets et les réponses de la communauté");
$i = 0;
?>
<?php if(ThemeModel::getInstance()->fetchConfigValue('overlay_everywhere')): ?>
    <div class="overlay"></div>
<?php endif; ?>

<section class="mb-16 px-4 md:px-36 2xl:px-72 space-y-8">
    <section class="lg:grid grid-cols-4 gap-6">
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
                                <a href="<?= $parent->getLink() ?>"
                                   class="a-forum ml-2"><?= $parent->getName() ?></a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    <li>
                        <div class="">
                            <i style="color: var(--main-color);" class="fa-solid fa-chevron-right"></i>
                            <a href=""
                               class="a-forum ml-2"><?= $topic->getName() ?></a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="flex">
            <div class="relative w-full">
                <form action="forum/search" method="POST">
                    <input type="text" name="for"
                           class="input block p-1.5 w-full z-20 text-sm rounded-lg border-l-2"
                           placeholder="Rechercher">
                    <button type="submit" style="background-color: var(--main-color); "
                            class="absolute top-0 right-0 p-1.5 text-sm font-medium rounded-r-lg">
                        <i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </section>

    <section style="background: var(--card-bg-color);" class="rounded-lg p-4">
        <?php if ($totalPage > "1"): ?>
            <div class="mx-auto">
                <div class="flex justify-center">
                    <?php if ($currentPage !== "1"): ?>
                        <a href="p1" style="background-color: var(--main-color);"
                           class="mr-2 p-1 text-sm font-medium rounded-lg ">
                            <i class="fa-solid fa-chevron-left"></i><i class="fa-solid fa-chevron-left"></i></a>
                        <a href="p<?=$currentPage-1?>" style="background-color: var(--main-color);"
                           class="p-1 text-sm font-medium rounded-l-lg">
                            <i class="fa-solid fa-chevron-left"></i></a>
                    <?php endif; ?>
                    <span style="background-color: var(--main-color);" class="p-1 text-sm"><?= $currentPage?>/<?= $totalPage?></span>
                    <?php if ($currentPage !== $totalPage): ?>
                        <a href="p<?=$currentPage+1?>" style="background-color: var(--main-color);"
                           class="p-1 text-sm font-medium rounded-r-lg">
                            <i class="fa-solid fa-chevron-right"></i></a>
                        <a href="p<?=$totalPage?>" style="background-color: var(--main-color);"
                           class="ml-2 p-1 text-sm font-medium rounded-lg">
                            <i class="fa-solid fa-chevron-right"></i><i class="fa-solid fa-chevron-right"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>



        <div class="rounded-md p-8">
            <section>
                <div class="flex justify-between">
                    <h4>
                        <?php if ($topic->getPrefixId()): ?><span class="px-2 text-white rounded-lg"
                                                                  style="color: <?= $topic->getPrefixTextColor() ?>; background: <?= $topic->getPrefixColor() ?>"><?= $topic->getPrefixName() ?></span> <?php endif; ?><?= $topic->getName() ?>
                    </h4>
                    <div class="">
                        <?php if ($topic->isImportant()): ?>
                            <i style='color: <?= $iconImportantColor?>' data-tooltip-target="tooltip-important"
                               class="<?= $iconImportant ?> ml-4"></i>
                            <div id="tooltip-important" role="tooltip"
                                 class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                                Important
                            </div>
                        <?php endif; ?>
                        <?php if ($topic->isPinned()): ?>
                            <i style='color: <?= $iconPinColor?>' data-tooltip-target="tooltip-pined" class="<?= $iconPin ?> ml-4"></i>
                            <div id="tooltip-pined" role="tooltip"
                                 class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                                Épinglé
                            </div>
                        <?php endif; ?>
                        <?php if ($topic->isDisallowReplies()): ?>
                            <i style='color: <?= $iconClosedColor?>' data-tooltip-target="tooltip-closed" class="<?= $iconClosed ?> ml-4"></i>
                            <div id="tooltip-closed" role="tooltip"
                                 class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                                Fermé
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <p><small>Discussion dans crée par <?= $topic->getUser()->getPseudo() ?>,
                        le <?= $topic->getCreated() ?></small></p>
                <?php if ($topic->getTags() === []): ?>
                    <p><small>Ce topic ne possède pas de tags</small></p>
                <?php else: ?>
                    <p><small>Tags :</small>
                        <?php foreach ($topic->getTags() as $tag): ?>
                            <small><span class="px-1 bg-gray-200 rounded mr-1"><?= $tag->getContent() ?></span></small>
                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>

            </section>

            <section style="background-color: var(--card-in-card-bg-color)" class="rounded-lg mt-4">
                <div class="flex justify-between title-color forum-title-divider p-2">
                    <p><?= $topic->getCreated() ?></p>
                    <div>
                        <?php if (UsersController::isUserLogged()): ?>
                            <?php if (ForumFollowedModel::getInstance()->isFollower($topic->getId(), UsersModel::getCurrentUser()?->getId())): ?>
                                <a href="<?= $topic->unfollowTopicLink() ?>"><i
                                        class="fa-solid fa-eye-slash text-blue-500 mr-2"></i></a>
                            <?php else: ?>
                                <a href="<?= $topic->followTopicLink() ?>"><i
                                        class="fa-solid fa-eye text-blue-500 mr-2"></i></a>
                            <?php endif ?>
                        <?php endif; ?>
                        <i data-modal-target="reportTopic-<?= $topic->getId() ?>"
                           data-modal-toggle="reportTopic-<?= $topic->getId() ?>" data-tooltip-target="tooltip-admin"
                           class="fa-solid fa-circle-exclamation"></i>
                    </div>

                </div>
                <!------------------
                --- REPORT TOPIC MODAL ---
                -------------------->
                <div id="reportTopic-<?= $topic->getId() ?>" tabindex="-1" aria-hidden="true"
                     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                    <div class="relative w-full h-full max-w-2xl md:h-auto">
                        <!-- Modal content -->
                        <div style="background: var(--card-bg-color);" class="relative rounded-lg ">
                            <!-- Modal header -->
                            <div
                                class="flex items-start justify-between p-4 border-b rounded-t">
                                <h3 class="text-xl font-semibold">
                                    Signalé le topic <?= $topic->getName() ?>
                                </h3>
                                <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                                        data-modal-hide="reportTopic-<?= $topic->getId() ?>">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form id="modal-<?= $topic->getId() ?>"
                                  action="p1/reportTopic/<?= $topic->getId() ?>"
                                  method="post">
                                <?php (new SecurityManager())->insertHiddenToken() ?>
                                <div class="p-4">
                                    <div>
                                        <label for="reportTopic"
                                               class="block mb-2 text-sm font-medium">Raison</label>
                                        <select id="reportTopic" name="reason"
                                                class="input border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            <option value="1">Nom du topic inapproprié</option>
                                            <option value="2">Le topic n'est pas au bon endroit</option>
                                            <option value="3">Contenue choquant</option>
                                            <option value="4">Harcèlement, discrimination ...</option>
                                            <option value="0">Autre</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="flex justify-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                                    <button type="submit"
                                            class="btn">
                                        Signalé
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="lg:grid grid-cols-5">
                    <div class="p-4 text-center ">
                        <div style="background-color: var(--card-bg-color)" class="rounded-lg">
                            <div class="p-2">
                                <div class="w-36 h-36 mx-auto">
                                    <img style="object-fit: fill; max-height: 144px; max-width: 144px" width="144px"
                                         height="144px"
                                         src="https://apiv2.craftmywebsite.fr/skins/3d/user=<?= $topic->getUser()->getPseudo() ?>&headOnly=true"/>
                                </div>
                            </div>
                            <h5 class="font-semibold"><?= $topic->getUser()->getPseudo() ?></h5>
                            <div style="background-color: var(--card-bg-color)" class="pb-1">
                                <p>
                                    <small><?= ForumPermissionRoleModel::getInstance()->getHighestRoleByUser($topic->getUser()->getId())->getName() ?></small>
                                </p>
                            </div>
                            <div class="px-4 pb-2">
                                <div style="background-color: var(--card-in-card-bg-color)" class="rounded-lg">
                                    <div class="grid grid-cols-3">
                                        <div>
                                            <p><i class="fa-solid fa-comments fa-xs text-gray-600"></i></p>
                                            <p>
                                                <small><?= $responseModel->countResponseByUser($topic->getUser()->getId()) ?></small>
                                            </p>
                                        </div>
                                        <div>
                                            <p><i class="fa-solid fa-thumbs-up fa-xs text-gray-600"></i></p>
                                            <p>
                                                <small><?= $feedbackModel->countTopicFeedbackByUser($topic->getUser()->getId()) ?></small>
                                            </p>
                                        </div>
                                        <div>
                                            <p><i class="fa-solid fa-trophy fa-xs text-gray-600"></i></p>
                                            <p><small>NA</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-4 py-4 pr-2">
                        <div style="background-color: var(--card-bg-color)" class="rounded-lg p-2 h-fit">
                            <?= $topic->getContent() ?>
                            <div class="flex justify-between mt-4">
                                <p><small><?= $topic->getUser()->getPseudo() ?>, <?= $topic->getCreated() ?></small></p>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 text-center mt-1">
                            <?php foreach ($feedbackModel->getFeedbacks() as $feedback) : ?>
                                <?php if ($feedback->userCanTopicReact($topic->getId())): ?>
                                    <?php if (UsersController::isUserLogged()): ?>
                                        <?php if ($feedback->getFeedbackTopicReacted($topic->getId()) == $feedback->getId()): ?>
                                            <a style="background-color: var(--card-in-card-bg-color)" class=" border-2 border-blue-300 px-1 flex flex-wrap rounded-xl items-center mr-2"
                                               data-tooltip-target="tooltip-users-<?= $feedback->getId() ?>"
                                               href="<?= $topic->getFeedbackDeleteTopicLink($feedback->getId()) ?>">
                                                <img class="mr-1" alt="..." style="max-width: 20px; max-height: 20px"
                                                     src="<?= $feedback->getImage() ?>"></img>
                                                <?= $feedback->countTopicFeedbackReceived($topic->getId()) ?>
                                                <div id="tooltip-users-<?= $feedback->getId() ?>" role="tooltip"
                                                     class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-gray-700 rounded-lg">
                                                    <?php foreach ($feedbackModel->getTopicUsersFeedbackByFeedbackId($topic->getId(), $feedback->getId()) as $userId) : ?>
                                                        <small
                                                            class="px-2 text-xs">- <?= $user = UsersModel::getInstance()->getUserById($userId)->getPseudo() ?></small>
                                                    <?php endforeach; ?>
                                                    <p class="p-1"><small><?= $feedback->getName() ?></small></p>
                                                </div>
                                            </a>
                                        <?php else: ?>
                                            <a style="background-color: var(--card-in-card-bg-color)" class=" border-2 border-blue-300 px-1 flex flex-wrap rounded-xl items-center mr-2"
                                               data-tooltip-target="tooltip-users-<?= $feedback->getId() ?>"
                                               href="<?= $topic->getFeedbackChangeTopicLink($feedback->getId()) ?>">
                                                <img class="mr-1" alt="..." style="max-width: 20px; max-height: 20px"
                                                     src="<?= $feedback->getImage() ?>"></img>
                                                <?= $feedback->countTopicFeedbackReceived($topic->getId()) ?>
                                                <div id="tooltip-users-<?= $feedback->getId() ?>" role="tooltip"
                                                     class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-gray-700 rounded-lg">
                                                    <?php foreach ($feedbackModel->getTopicUsersFeedbackByFeedbackId($topic->getId(), $feedback->getId()) as $userId) : ?>
                                                        <small
                                                            class="px-2">- <?= $user = UsersModel::getInstance()->getUserById($userId)->getPseudo() ?></small>
                                                    <?php endforeach; ?>
                                                    <p class="p-1"><small><?= $feedback->getName() ?></small></p>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div
                                            style="background-color: var(--card-in-card-bg-color)" class=" border-2 border-blue-300 px-1 flex flex-wrap rounded-xl items-center mr-2"
                                            data-tooltip-target="tooltip-users-<?= $feedback->getId() ?>">
                                            <img class="mr-1" alt="..." style="max-width: 20px; max-height: 20px"
                                                 src="<?= $feedback->getImage() ?>"></img>
                                            <?= $feedback->countTopicFeedbackReceived($topic->getId()) ?>
                                            <div id="tooltip-users-<?= $feedback->getId() ?>" role="tooltip"
                                                 class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-gray-700 rounded-lg">
                                                <?php foreach ($feedbackModel->getTopicUsersFeedbackByFeedbackId($topic->getId(), $feedback->getId()) as $userId) : ?>
                                                    <small
                                                        class="px-2">- <?= $user = UsersModel::getInstance()->getUserById($userId)->getPseudo() ?></small>
                                                <?php endforeach; ?>
                                                <p class="p-1"><small><?= $feedback->getName() ?></small></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <a style="background-color: var(--card-in-card-bg-color)" class=" border-2 border-blue-300 px-1 flex flex-wrap rounded-xl items-center mr-2"
                                       data-tooltip-target="tooltip-users-<?= $feedback->getId() ?>"
                                       href="<?= $topic->getFeedbackAddTopicLink($feedback->getId()) ?>">
                                        <img class="mr-1" alt="..." style="max-width: 20px; max-height: 20px"
                                             src="<?= $feedback->getImage() ?>"></img>
                                        <?= $feedback->countTopicFeedbackReceived($topic->getId()) ?>
                                        <div id="tooltip-users-<?= $feedback->getId() ?>" role="tooltip"
                                             class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-gray-700 rounded-lg">
                                            <?php foreach ($feedbackModel->getTopicUsersFeedbackByFeedbackId($topic->getId(), $feedback->getId()) as $userId) : ?>
                                                <small
                                                    class="px-2">- <?= $user = UsersModel::getInstance()->getUserById($userId)->getPseudo() ?></small>
                                            <?php endforeach; ?>
                                            <p class="p-1"><small><?= $feedback->getName() ?></small></p>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>


                        <div class="flex justify-end p-1">
                            <?php if ($topic->isSelfTopic()): ?>
                                <a href="<?= $topic->editTopicLink() ?>">
                                    <i data-tooltip-target="tooltip-edittopic"
                                       class="fa-solid fa-edit text-blue-500 ml-4"></i>
                                    <div id="tooltip-edittopic" role="tooltip"
                                         class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                                        Éditer ma réponse
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </section>


            <div class="flex flex-no-wrap justify-center items-center py-4">
                <h4 style="color: var(--main-color)">Réponses</h4>
            </div>


            <?php foreach ($responses as $response) : ?>
                <section style="background-color: var(--card-in-card-bg-color)" class="rounded-lg mt-4" id="<?= $response->getId() ?>">
                    <div class="flex justify-between title-color forum-title-divider p-2">
                        <p><?= $response->getCreated() ?></p>
                        <div>
                            <span class="mr-2"><?= $response->isTopicAuthor() ? "Auteur du topic" : "" ?></span>
                            <span
                                onclick="copyURL('<?= Website::getProtocol() . "://" . $_SERVER['HTTP_HOST'] . EnvManager::getInstance()->getValue("PATH_SUBFOLDER") . "forum/c/" . $category->getSlug() . "/f/" . $forum->getSlug() . "/t/" . $response->getResponseTopic()->getSlug()."/p".$currentPage."/#" . $response->getId() ?>')"
                                class="text-gray-700 hover:text-blue-600"><i class="fa-solid fa-share-nodes"></i></span>
                            <span><i data-modal-target="reportResponse-<?= $response->getId() ?>"
                                     data-modal-toggle="reportResponse-<?= $response->getId() ?>"
                                     data-tooltip-target="tooltip-admin"
                                     class="fa-solid fa-circle-exclamation ml-2"></i></span>
                            <span class="ml-2">#<?= $response->getResponsePosition() ?></span>
                        </div>
                    </div>

                    <!------------------
                --- REPORT TOPIC MODAL ---
                -------------------->
                    <div id="reportResponse-<?= $response->getId() ?>" tabindex="-1" aria-hidden="true"
                         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                        <div class="relative w-full h-full max-w-2xl md:h-auto">
                            <!-- Modal content -->
                            <div style="background-color: var(--card-bg-color)" class="relative rounded-lg ">
                                <!-- Modal header -->
                                <div
                                    class="flex items-start justify-between p-4 border-b rounded-t ">
                                    <h3 class="text-xl font-semibold ">
                                        Signalé cette réponse
                                    </h3>
                                    <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                                            data-modal-hide="reportResponse-<?= $response->getId() ?>">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                             viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form id="modal-<?= $response->getId() ?>"
                                      action="p1/reportResponse/<?= $response->getId() ?>"
                                      method="post">
                                    <?php (new SecurityManager())->insertHiddenToken() ?>
                                    <div class="p-4">
                                        <div>
                                            <label for="reportTopic"
                                                   class="block mb-2 text-sm font-medium ">Raison</label>
                                            <select id="reportTopic" name="reason"
                                                    class="input border border-gray-300  text-sm rounded-lg block w-full p-2.5">
                                                <option value="1">Réponse inapproprié</option>
                                                <option value="2">Contenue choquant</option>
                                                <option value="3">Harcèlement, discrimination ...</option>
                                                <option value="0">Autre</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex justify-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                                        <button type="submit"
                                                class="btn">
                                            Signalé
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="lg:grid grid-cols-5">
                        <div class="p-4 text-center ">
                            <div style="background-color: var(--card-bg-color)" class="rounded-lg">
                                <div class="p-2">
                                    <div class="w-36 h-36 mx-auto">
                                        <img style="object-fit: fill; max-height: 144px; max-width: 144px" width="144px"
                                             height="144px"
                                             src="https://apiv2.craftmywebsite.fr/skins/3d/user=<?= $response->getUser()->getPseudo() ?>&headOnly=true"/>
                                    </div>
                                </div>
                                <h5 class="font-semibold"><?= $response->getUser()->getPseudo() ?></h5>
                                <div class=" pb-1">
                                    <p>
                                        <small><?= ForumPermissionRoleModel::getInstance()->getHighestRoleByUser($response->getUser()->getId())->getName() ?></small>
                                    </p>
                                </div>
                                <div class="px-4 pb-2">
                                    <div style="background-color: var(--card-in-card-bg-color)" class="rounded-lg">
                                        <div class="grid grid-cols-3">
                                            <div>
                                                <p><i class="fa-solid fa-comments fa-xs text-gray-600"></i></p>
                                                <p>
                                                    <small><?= $responseModel->countResponseByUser($response->getUser()->getId()) ?></small>
                                                </p>
                                            </div>
                                            <div>
                                                <p><i class="fa-solid fa-thumbs-up fa-xs text-gray-600"></i></p>
                                                <p>
                                                    <small><?= $feedbackModel->countTopicFeedbackByUser($topic->getUser()->getId()) ?></small>
                                                </p>
                                            </div>
                                            <div>
                                                <p><i class="fa-solid fa-trophy fa-xs text-gray-600"></i></p>
                                                <p><small>NA</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-4 py-4 pr-2">
                            <div style="background-color: var(--card-bg-color)" class="rounded-lg p-2 h-fit">
                                <?= $response->getContent() ?>
                                <div class="flex justify-between mt-4">
                                    <p><small><?= $response->getUser()->getPseudo() ?>
                                            , <?= $response->getCreated() ?></small></p>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-2 text-center mt-1">
                                <?php foreach ($feedbackModel->getFeedbacks() as $responseFeedback) : ?>
                                    <?php if ($responseFeedback->userCanResponseReact($response->getId())): ?>
                                        <?php if (UsersController::isUserLogged()): ?>
                                            <?php if ($responseFeedback->getFeedbackResponseReacted($response->getId()) === $responseFeedback->getId()): ?>

                                                <a style="background-color: var(--card-in-card-bg-color)" class=" border-2 border-blue-300 px-1 flex flex-wrap rounded-xl items-center mr-2"
                                                   data-tooltip-target="tooltip-users-response-<?= $responseFeedback->getId() ?>-<?= $i ?>"
                                                   href="<?= $response->getFeedbackDeleteResponseLink($responseFeedback->getId()) ?>">
                                                    <img class="mr-1" alt="..." style="max-width: 20px; max-height: 20px"
                                                         src="<?= $responseFeedback->getImage() ?>"></img>
                                                    <?= $responseFeedback->countResponseFeedbackReceived($response->getId()) ?>
                                                    <div
                                                        id="tooltip-users-response-<?= $responseFeedback->getId() ?>-<?= $i ?>"
                                                        role="tooltip"
                                                        class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-gray-700 rounded-lg">
                                                        <?php foreach ($feedbackModel->getResponseUsersFeedbackByFeedbackId($response->getId(), $responseFeedback->getId()) as $userResponseId) : ?>
                                                            <small
                                                                class="px-2">- <?= $user = UsersModel::getInstance()->getUserById($userResponseId)->getPseudo() ?></small>
                                                            <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                        <p class="p-1"><small><?= $responseFeedback->getName() ?></small>
                                                        </p>
                                                    </div>

                                                </a>
                                            <?php else: ?>
                                                <a style="background-color: var(--card-in-card-bg-color)" class=" border-2 border-blue-300 px-1 flex flex-wrap rounded-xl items-center mr-2"
                                                   data-tooltip-target="tooltip-users-response-<?= $responseFeedback->getId() ?>-<?= $i ?>"
                                                   href="<?= $response->getFeedbackChangeResponseLink($responseFeedback->getId()) ?>">
                                                    <img class="mr-1" alt="..." style="max-width: 20px; max-height: 20px"
                                                         src="<?= $responseFeedback->getImage() ?>"></img>
                                                    <?= $responseFeedback->countResponseFeedbackReceived($response->getId()) ?>
                                                    <div
                                                        id="tooltip-users-response-<?= $responseFeedback->getId() ?>-<?= $i ?>"
                                                        role="tooltip"
                                                        class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-gray-700 rounded-lg">
                                                        <?php foreach ($feedbackModel->getResponseUsersFeedbackByFeedbackId($response->getId(), $responseFeedback->getId()) as $userResponseId) : ?>
                                                            <small
                                                                class="px-2">- <?= $user = UsersModel::getInstance()->getUserById($userResponseId)->getPseudo() ?></small>
                                                            <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                        <p class="p-1"><small><?= $responseFeedback->getName() ?></small>
                                                        </p>
                                                    </div>
                                                </a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <div
                                                style="background-color: var(--card-in-card-bg-color)" class=" border-2 border-blue-300 px-1 flex flex-wrap rounded-xl items-center mr-2"
                                                data-tooltip-target="tooltip-users-response-<?= $responseFeedback->getId() ?>-<?= $i ?>">
                                                <img class="mr-1" alt="..." style="max-width: 20px; max-height: 20px"
                                                     src="<?= $responseFeedback->getImage() ?>"></img>
                                                <?= $responseFeedback->countResponseFeedbackReceived($response->getId()) ?>
                                                <div id="tooltip-users-response-<?= $responseFeedback->getId() ?>-<?= $i ?>"
                                                     role="tooltip"
                                                     class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-gray-700 rounded-lg">
                                                    <?php foreach ($feedbackModel->getResponseUsersFeedbackByFeedbackId($response->getId(), $responseFeedback->getId()) as $userResponseId) : ?>
                                                        <small
                                                            class="px-2">- <?= $user = UsersModel::getInstance()->getUserById($userResponseId)->getPseudo() ?></small>
                                                        <?php $i++; ?>
                                                    <?php endforeach; ?>
                                                    <p class="p-1"><small><?= $responseFeedback->getName() ?></small></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a style="background-color: var(--card-in-card-bg-color)" class="border-2 border-blue-300 px-1 flex flex-wrap rounded-xl items-center mr-2"
                                           data-tooltip-target="tooltip-users-response-<?= $responseFeedback->getId() ?>-<?= $i ?>"
                                           href="<?= $response->getFeedbackAddResponseLink($responseFeedback->getId()) ?>">
                                            <img class="mr-1" alt="..." style="max-width: 20px; max-height: 20px"
                                                 src="<?= $responseFeedback->getImage() ?>"></img>
                                            <?= $responseFeedback->countResponseFeedbackReceived($response->getId()) ?>
                                            <div id="tooltip-users-response-<?= $responseFeedback->getId() ?>-<?= $i ?>"
                                                 role="tooltip"
                                                 class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-gray-700 rounded-lg">
                                                <?php foreach ($feedbackModel->getResponseUsersFeedbackByFeedbackId($response->getId(), $responseFeedback->getId()) as $userResponseId) : ?>
                                                    <small
                                                        class="px-2">- <?= $user = UsersModel::getInstance()->getUserById($userResponseId)->getPseudo() ?></small>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>
                                                <p class="p-1"><small><?= $responseFeedback->getName() ?></small></p>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>


                            <div class="flex justify-end p-1">
                                <?php if ($response->isSelfReply()): ?>
                                    <i data-modal-target="popup-modal-<?= $response->getId() ?>"
                                       data-modal-toggle="popup-modal-<?= $response->getId() ?>"
                                       data-tooltip-target="tooltip-delete" class="fa-solid fa-trash text-red-500 ml-4"></i>
                                    <div id="tooltip-delete" role="tooltip"
                                         class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                                        Supprimer ma réponse
                                    </div>
                                    <div id="popup-modal-<?= $response->getId() ?>" tabindex="-1"
                                         class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                        <div class="relative w-full h-full max-w-md md:h-auto">
                                            <div class="relative bg-white rounded-lg shadow">
                                                <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                        data-modal-hide="popup-modal-<?= $response->getId() ?>">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6 text-center">
                                                    <svg aria-hidden="true"
                                                         class="mx-auto mb-4 text-gray-400 w-14 h-14 "
                                                         fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500">
                                                        Voulez-vous vraiment supprimer votre réponse ?</h3>
                                                    <a href="<?= $response->trashLink() ?>"
                                                       class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Supprimer
                                                    </a>
                                                    <button data-modal-hide="popup-modal-<?= $response->getId() ?>"
                                                            type="button"
                                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">
                                                        Annuler
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endforeach; ?>

            <?php if ($totalPage > "1"): ?>
                <div class="mx-auto mt-4">
                    <div class="flex justify-center">
                        <?php if ($currentPage !== "1"): ?>
                            <a href="p1" style="background-color: var(--main-color);"
                               class="mr-2 p-1 text-sm font-medium rounded-lg ">
                                <i class="fa-solid fa-chevron-left"></i><i class="fa-solid fa-chevron-left"></i></a>
                            <a href="p<?=$currentPage-1?>" style="background-color: var(--main-color);"
                               class="p-1 text-sm font-medium rounded-l-lg">
                                <i class="fa-solid fa-chevron-left"></i></a>
                        <?php endif; ?>
                        <span style="background-color: var(--main-color);" class="p-1 text-sm"><?= $currentPage?>/<?= $totalPage?></span>
                        <?php if ($currentPage !== $totalPage): ?>
                            <a href="p<?=$currentPage+1?>" style="background-color: var(--main-color);"
                               class="p-1 text-sm font-medium rounded-r-lg">
                                <i class="fa-solid fa-chevron-right"></i></a>
                            <a href="p<?=$totalPage?>" style="background-color: var(--main-color);"
                               class="ml-2 p-1 text-sm font-medium rounded-lg">
                                <i class="fa-solid fa-chevron-right"></i><i class="fa-solid fa-chevron-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!$topic->isDisallowReplies() && UsersController::isUserLogged()): ?>
                <section style="background-color: var(--card-in-card-bg-color)" class="mt-4 rounded-lg">
                    <div  class=" p-2">
                        <p><b>Répondre à ce topic :</b></p>
                    </div>
                    <div class="lg:grid grid-cols-5">
                        <div class="p-4 text-center ">
                            <div style="background-color: var(--card-bg-color)" class="rounded-lg pt-2">
                                <div class="w-36 h-36 mx-auto ">
                                    <img style="object-fit: fill; max-height: 144px; max-width: 144px" width="144px"
                                         height="144px"
                                         src="https://apiv2.craftmywebsite.fr/skins/3d/user=<?= UsersModel::getCurrentUser()->getPseudo() ?>&headOnly=true"/>
                                </div>
                                <h5 class="font-semibold"><?= UsersModel::getCurrentUser()->getPseudo() ?></h5>
                            </div>
                        </div>
                        <div class="col-span-4 py-4 pr-2">
                            <div class="h-fit">
                                <form action="" method="post">
                                    <?php (new SecurityManager())->insertHiddenToken() ?>
                                    <input hidden type="text" name="topicId" value="<?= $topic->getId() ?>">
                                    <textarea minlength="20" class="w-full tinymce" name="topicResponse"></textarea>
                                    <div class="flex justify-center mt-2">
                                        <button type="submit"
                                                class="btn">
                                            <i class="fa-solid fa-reply"></i> Poster ma réponse
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        </div>
    </section>


</section>

<link rel="stylesheet"
      href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') . 'Admin/Resources/Vendors/Izitoast/iziToast.min.css' ?>">
<script
    src="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') . 'Admin/Resources/Vendors/Izitoast/iziToast.min.js' ?>"></script>

<script>
    function copyURL(url) {
        navigator.clipboard.writeText(url)
        iziToast.show(
            {
                titleSize: '14',
                messageSize: '12',
                icon: 'fa-solid fa-check',
                title: "Forum",
                message: "Le liens vers cette réponse à été copié !",
                color: "#20b23a",
                iconColor: '#ffffff',
                titleColor: '#ffffff',
                messageColor: '#ffffff',
                balloon: false,
                close: true,
                pauseOnHover: true,
                position: 'topCenter',
                timeout: 4000,
                animateInside: false,
                progressBar: true,
                transitionIn: 'fadeInDown',
                transitionOut: 'fadeOut',
            });
    }
</script>