<?php

use CMW\Controller\Core\SecurityController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Lang\LangManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Utils;
use CMW\Utils\Website;

/* @var \CMW\Interface\Users\IUsersOAuth[] $oAuths */

Website::setTitle('Inscription');
Website::setDescription('Inscrivez-vous');
?>
<div data-cmw-visible="global:overlay_everywhere" data-cmw-style="background-image:global:overlay_img" class="overlay"></div>

<?php if (ThemeModel::getInstance()->fetchConfigValue('header','header_allow_register_button')): ?>
    <div class="mt-auto mx-auto relative w-full max-w-md h-full mb-4">
        <h4 style="background-color: var(--card-bg-color); color: var(--main-color)" class="rounded-xl p-2 text-center my-4">Inscription</h4>
        <div style="background-color: var(--card-bg-color)" class="rounded-xl">
            <div class="py-6 px-6 lg:px-8">
            <form class="space-y-6" action="" method="post">
                <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                        <div>
                            <label for="register_email" class="block mb-2 text-sm font-medium">Mail</label>
                            <input id="register_email" name="register_email" type="email" class="input border border-gray-300 text-sm rounded-lg block w-full p-2.5" placeholder="mail@craftmywebsite.fr" required>
                        </div>
                        <div>
                            <label for="passwordInput" class="block mb-2 text-sm font-medium">Mot de passe</label>
                            <div class="flex">
                                <input id="passwordInput" type="password" name="register_password" placeholder="••••••••" class="input block  border border-gray-300 text-sm rounded-l-lg w-full p-2.5" required>
                                <div onclick="showPassword()" style="background-color: var(--main-color);" class="cursor-pointer p-2.5 text-sm font-medium rounded-r-lg"><i class="fa fa-eye-slash"></i></div>
                            </div>
                        </div>

                        <div>
                            <label for="register_pseudo" class="block mb-2 text-sm font-medium">Pseudo minecraft</label>
                            <input id="register_pseudo" name="register_pseudo" type="text" class="input  border border-gray-300  text-sm rounded-lg block w-full p-2.5" placeholder="Pseudo" required>
                        </div>
                        <div>
                            <label for="passwordInputV" class="block mb-2 text-sm font-medium">Confirmation</label>
                            <div class="flex">
                                <input id="passwordInputV" type="password" name="register_password_verify" placeholder="••••••••" class="input block  border border-gray-300 text-sm rounded-l-lg w-full p-2.5" required>
                                <div onclick="showPasswordV()" style="background-color: var(--main-color);" class="cursor-pointer p-2.5 text-sm font-medium rounded-r-lg"><i class="fa fa-eye-slash"></i></div>
                            </div>
                        </div>


                <div class="flex justify-center">
                    <?php SecurityController::getPublicData(); ?>
                </div>
                <button type="submit" class="btn w-full">M'inscrire</button>
            </form>
                <div class="flex flex-no-wrap justify-center items-center py-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <p class="font-medium">S'enregistrer avec</p>
                    </div>
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                </div>
                <div class="px-4 py-2 justify-center text-center w-full sm:w-auto">
                    <div class="flex-wrap inline-flex space-x-3">
                        <?php foreach ($oAuths as $oAuth): ?>
                            <a href="oauth/<?= $oAuth->methodIdentifier() ?>" class="hover:text-blue-600"
                               aria-label="<?= $oAuth->methodeName() ?>">
                                <img src="<?= $oAuth->methodeIconLink() ?>"
                                     alt="<?= $oAuth->methodeName() ?>" width="32" height="32"/>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php else: ?>
<div class="mx-auto relative p-4 w-full max-w-xl h-full md:h-auto mb-6 mt-6">
    <div class="relative bg-white rounded-lg shadow">
        <div class="py-6 px-6 lg:px-8">
            <?= ThemeModel::getInstance()->fetchConfigValue('header','global_no_register_message') ?>
        </div>
    </div>
</div>
<?php endif; ?>


<script>
function showPassword() {
  var x = document.getElementById("passwordInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function showPasswordV() {
  var x = document.getElementById("passwordInputV");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>