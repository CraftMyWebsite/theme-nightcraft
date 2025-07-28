<?php
use CMW\Controller\Core\SecurityController;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Contact\ContactModel;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/* TITRE ET DESCRIPTION */
Website::setTitle(ThemeModel::getInstance()->fetchConfigValue('faq','faq_page_title'));
Website::setDescription('');
?>
<div data-cmw-visible="global:overlay_everywhere" data-cmw-style="background-image:global:overlay_img" class="overlay"></div>

<section class="mb-8 px-8 md:px-36 2xl:px-96">
    <div class="<?php if (ThemeModel::getInstance()->fetchConfigValue('faq','faq_display_form')): { echo 'lg:grid grid-cols-3 gap-6'; } endif ?>">
        <div data-cmw-visible="faq:faq_display_form" style="background-color: var(--card-bg-color)" class="rounded-lg p-4 h-fit">
            <h4 data-cmw="faq:faq_question_title" style="color: var(--main-color)" class="text-center"></h4>
            <form action="contact" method="post" class="space-y-4">
                <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                <div>
                    <label for="email">Votre mail :</label>
                    <input id="email" name="email" type="email" class="input w-full" placeholder="votre@mail.com" required>
                </div>
                <div>
                    <label for="name">Votre pseudo :</label>
                    <input id="name" name="name" type="text" class="input w-full" placeholder="SuperGamer99" required>
                </div>
                <div>
                    <label for="object">Sujet :</label>
                    <input id="object" name="object" type="text" class="input w-full" placeholder="J'aimerais voir avec vous ..." required>
                </div>
                <div>
                    <label for="content">Votre pseudo :</label>
                    <textarea id="content" name="content" class="input w-full" placeholder="Bonjour," required></textarea>
                </div>
                <div class="flex justify-center mt-4">
                    <?php SecurityController::getPublicData(); ?>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="btn">Envoyer <i class="fa-solid fa-paper-plane"></i></button>
                </div>
            </form>
        </div>
        <div style="background-color: var(--card-bg-color)" class="col-span-2 rounded-lg p-4 h-fit">
            <h4 style="color: var(--main-color)" class="text-center" data-cmw="faq:faq_answer_title"></h4>
            <div class="space-y-3">
                <?php foreach ($faqList as $faq): ?>
                <div style="background-color: var(--card-in-card-bg-color)" class="rounded-xl p-4">
                    <div class="flex justify-between items-center">
                        <p class="text-lg"><?= $faq->getQuestion() ?></p>
                        <p data-cmw-visible="faq:faq_display_autor" class="mini-card"><?= $faq->getAuthor()->getPseudo() ?></p>
                    </div>
                    <i><?= $faq->getResponse() ?></i>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>