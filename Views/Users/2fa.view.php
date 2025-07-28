<?php

use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle('Double facteur');
Website::setDescription('Activer le double facteur');

?>
<div data-cmw-visible="global:overlay_everywhere" data-cmw-style="background-image:global:overlay_img" class="overlay"></div>

<div class="mt-auto mx-auto relative w-full max-w-md h-full mb-4">
    <h4 style="background-color: var(--card-bg-color); color: var(--main-color)" class="rounded-xl p-2 text-center my-4">Double authentification</h4>
    <div style="background-color: var(--card-bg-color)" class="rounded-xl">
        <div class="py-6 px-6 lg:px-8">
            <form class="space-y-6" action="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') . 'login/validate/tfa' ?>" method="post">
                <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                <div>
                    <label for="code" class="block mb-2 text-sm font-medium">Code d'authentification</label>
                    <input id="code" name="code" type="text" class="input border border-gray-300 text-sm rounded-lg block w-full p-2.5" placeholder="123456" required>
                </div>
                <button type="submit" class="btn w-full">Connexion</button>
            </form>
        </div>
    </div>
</div>
