<?php

use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Controller\Core\SecurityController;
use CMW\Manager\Security\SecurityManager;
use CMW\Utils\Website;

Website::setTitle("Connexion");
Website::setDescription("Connectez-vous sur " . Website::getWebsiteName());
?>
<?php if(ThemeModel::getInstance()->fetchConfigValue('overlay_everywhere')): ?>
    <div class="overlay"></div>
<?php endif; ?>

<div class="mt-auto mx-auto relative w-full max-w-md h-full mb-4">
    <h4 style="background-color: var(--card-bg-color); color: var(--main-color)" class="rounded-xl p-2 text-center my-4">Connexion</h4>
    <div style="background-color: var(--card-bg-color)" class="rounded-xl">
        <div class="py-6 px-6 lg:px-8">
            <form class="space-y-6" action="" method="post">
                <?php (new SecurityManager())->insertHiddenToken() ?>
                <input hidden name="previousRoute" type="text" value="<?= $_SERVER['HTTP_REFERER'] ?>">
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium">Mail</label>
                    <input name="login_email" type="email" class="input bg-gray-50 border border-gray-300  text-sm rounded-lg block w-full p-2.5" placeholder="mail@craftmywebsite.fr" required>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium ">Mot de passe</label>
                    <div class="flex">
                        <input type="password" name="login_password" id="passwordInput" placeholder="••••••••" class="input bg-gray-50 border border-gray-300 text-sm rounded-l-lg block w-full p-2.5" required>
                        <div onclick="showPassword()" style="background-color: var(--main-color);" class="cursor-pointer p-2.5 text-sm font-medium rounded-r-lg"><i class="fa fa-eye-slash" aria-hidden="true"></i></div>
                    </div>
                </div>
                <div class="flex justify-between">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="login_keep_connect" name="login_keep_connect" type="checkbox" value="" class="input w-4 h-4 bg-gray-50 rounded border border-gray-300">
                        </div>
                        <label for="login_keep_connect" class="ml-2 text-sm font-medium ">Se souvenir de moi</label>
                    </div>
                    <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>login/forgot" class="a-base">Mot de passe oublié ?</a>
                </div>
                <div class="flex justify-center mt-2">
                    <?php SecurityController::getPublicData(); ?>
                </div>
                <button type="submit" class="btn w-full">Connexion</button>
            </form>
        </div>
    </div>
</div>


<script>
function showPassword() {
  var x = document.getElementById("passwordInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>