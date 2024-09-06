<?php

use CMW\Controller\Core\SecurityController;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle('Contactez-nous');
Website::setDescription('Contactez-nous dès maintenant');
?>
<?php if (ThemeModel::getInstance()->fetchConfigValue('overlay_everywhere')): ?>
    <div class="overlay"></div>
<?php endif; ?>


<section class="mt-auto px-8 md:px-36 2xl:px-96">
    <div style="background-color: var(--card-bg-color)" class="p-6 rounded-xl">
        <h4 style="color: var(--main-color)" class="text-center">Nous contacter</h4>
        <form action="" method="post" class="space-y-4">
            <?php (new SecurityManager())->insertHiddenToken() ?>
            <div class="lg:grid grid-cols-2 gap-6">
                <div>
                    <label for="email">Votre mail :</label>
                    <input id="email" name="email" type="email" class="input w-full" placeholder="votre@mail.com" required>
                </div>
                <div>
                    <label for="name">Votre pseudo :</label>
                    <input id="name" name="name" type="text" class="input w-full" placeholder="SuperGamer99" required>
                </div>
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
</section>