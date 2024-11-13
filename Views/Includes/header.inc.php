<?php

use CMW\Controller\Core\PackageController;
use CMW\Controller\Minecraft\MinecraftController;
use CMW\Controller\Users\UsersController;
use CMW\Controller\Users\UsersSessionsController;
use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\MenusModel;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Minecraft\MinecraftModel;
use CMW\Model\Shop\Cart\ShopCartItemModel;

if (PackageController::isInstalled('Shop')) {
    $itemInCart = ShopCartItemModel::getInstance()->countItemsByUserId(UsersSessionsController::getInstance()->getCurrentUser()?->getId(), session_id());
}

if (PackageController::isInstalled('Minecraft')) {
    $mc = new minecraftModel;
    $favExist = $mc->favExist();
    if ($favExist) {
        $minecraft = MinecraftController::pingServer($mc->getFavServer()->getServerIp(), $mc->getFavServer()->getServerPort())->getPlayersOnline();
    }
}

$menus = MenusModel::getInstance();
?>
<nav style="padding-top: 1.5rem; padding-bottom: 1.5rem; background-color: var(--nav-bg-color)" id="site-header" class="sticky top-0 shadow-sm z-30 mb-8">
    <div class="container flex flex-wrap justify-between md:mx-auto md:px-28">
        <div class="flex justify-between items-center md:order-2 w-full md:w-auto">

            <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center p-2 text-sm rounded-lg md:hidden  focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>


            <?php if (UsersController::isUserLogged()): ?>
            <div>
                <a id="multiLevelDropdownButton" data-dropdown-toggle="dropdown1" class="cursor-pointer uppercase btn">
                    <img class="inline mr-2" loading="lazy" alt="player head" width="30px" src="https://apiv2.craftmywebsite.fr/skins/3d/user=<?= UsersSessionsController::getInstance()->getCurrentUser()->getPseudo() ?>&headOnly=true"> <?= UsersSessionsController::getInstance()->getCurrentUser()->getPseudo() ?></a>
                <div id="dropdown1" style="background-color: var(--main-color); z-index: 500"  class="hidden w-44 rounded divide-y divide-gray-100 shadow">
                    <div class="py-1 text-sm " aria-labelledby="multiLevelDropdownButton">
                    <?php if (UsersController::isAdminLogged()): ?>
                        <div>
                            <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>cmw-admin"
                               target="_blank" class="block py-2 px-4 "><i
                                    class="fa-solid fa-screwdriver-wrench"></i> Administration</a>
                        </div>
                    <?php endif; ?>
                        <div>
                            <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>profile"
                               class="block py-2 px-4 "><i class="fa-regular fa-address-card"></i>
                                Profil</a>
                        </div>
                    <?php if (PackageController::isInstalled('Shop')): ?>
                        <div>
                            <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>shop/settings"
                               class="block py-2 px-4 "><i class="fa-solid fa-gear"></i>
                                Paramètres</a>
                        </div>
                        <div>
                            <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>shop/history"
                               class="block py-2 px-4 "><i class="fa-solid fa-clipboard-list"></i>
                                Commandes</a>
                        </div>
                    <?php endif; ?>
                    </div>
                    <div class="py-1">
                        <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>logout"
                           class="block py-2 px-4 text-sm text-red-700 "><i
                                class="fa-solid fa-right-from-bracket"></i> Déconnexion</a>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="space-x-3">
            <?php if (ThemeModel::getInstance()->fetchConfigValue('header_allow_login_button')): ?>
                <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>login"
                   class="btn uppercase">Connexion</a>
            <?php endif; ?>
                    <?php if (ThemeModel::getInstance()->fetchConfigValue('header_allow_register_button')): ?>
                <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>register"
                   class="hidden md:inline btn uppercase">Inscription</a>
                    <?php endif; ?>
            </div>
            <?php endif; ?>

        </div>
        <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <div class="flex flex-col md:flex-row md:space-x-3">

                <?php foreach ($menus->getMenus() as $menu): ?>
                    <?php if ($menu->isUserAllowed()): ?>
                <a id="multiLevelDropdownButton" data-dropdown-toggle="dropdown-<?= $menu->getId() ?>" <?= !$menu->isTargetBlank() ?: "target='_blank'" ?> class="<?php if ($menu->urlIsActive()) { echo 'nav-btn-active'; } else { echo 'nav-btn'; } ?> " href="<?= $menu->getUrl() ?>"><?= $menu->getName() ?></a>

                <div id="dropdown-<?= $menu->getId() ?>" style="background-color: var(--main-color)" class="hidden z-10 w-44 rounded divide-y divide-gray-100 shadow">
                        <?php foreach ($menus->getSubMenusByMenu($menu->getId()) as $subMenu): ?>
                            <?php if ($subMenu->isUserAllowed()): ?>
                    <ul class="py-1 text-sm " aria-labelledby="multiLevelDropdownButton">
                        <li>
                            <a href="<?= $subMenu->getUrl() ?>" id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown-<?= $subMenu->getId() ?>" data-dropdown-placement="right-start" type="button" class="flex justify-between items-center py-2 px-4 w-full " <?= !$subMenu->isTargetBlank() ?: "target='_blank'" ?>><?= $subMenu->getName() ?></a>
                                <?php foreach ($menus->getSubMenusByMenu($subMenu->getId()) as $subSubMenu): ?>
                                    <?php if ($subSubMenu->isUserAllowed()): ?>
                            <div id="doubleDropdown-<?= $subMenu->getId() ?>" style="background-color: var(--main-color)"  class="hidden z-10 w-44 rounded divide-y divide-gray-100 shadow" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="right-start">
                                <ul class="py-1 text-sm " aria-labelledby="doubleDropdownButton">
                                    <li>
                                        <a href="<?= $subSubMenu->getUrl() ?>" class="block py-2 px-4 " <?= !$subSubMenu->isTargetBlank() ?: "target='_blank'" ?>><?= $subSubMenu->getName() ?></a>
                                    </li>
                                </ul>
                            </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                        </li>
                    </ul>
                            <?php endif; ?>
                        <?php endforeach; ?>
                </div>
                    <?php endif; ?>
                <?php endforeach; ?>




            </div>
        </div>
    </div>
</nav>

<script>
    (function (window, document) {
        "use strict";

        const header = document.getElementById("site-header");
        const logo = document.getElementById("site-img");

        window.addEventListener("scroll", function () {
            if (window.scrollY > 0) {
                header.style.transition = "all 300ms";
                header.style.padding = ".9rem";
                logo.style.transition = "all 300ms";
                logo.style.width = "2.5rem";
            } else {
                header.style.transition = "all 300ms";
                header.style.paddingTop = "1.5rem";
                header.style.paddingBottom = "1.5rem";
                logo.style.transition = "all 300ms";
                logo.style.width = "3.2rem";
            }
        });
    })(window, document);
</script>
