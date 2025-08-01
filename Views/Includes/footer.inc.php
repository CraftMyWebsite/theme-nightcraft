
<?php
use CMW\Controller\Core\CoreController;
use CMW\Controller\Core\PackageController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Manager\Views\View;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/** @var CoreController $core */
?>


</body>

<footer style="background-color: var(--footer-bg-color)"  class="mt-auto px-8 md:px-36 2xl:px-96">
    <div class="pt-8 pb-1">
        <div class="md:flex justify-between">
            <div class="space-y-6">
                <div>
                    <h3 data-cmw-visible="footer:footer_use_title"><?= Website::getWebsiteName() ?></h3>
                    <p class="text-xs" data-cmw="footer:footer_message"></p>
                </div>
                <div class="space-x-6">
                    <a onclick="copyURL('<?= ThemeModel::getInstance()->fetchConfigValue('header','join_ip') ?>')" class="home-button uppercase font-bold px-3 py-2 rounded cursor-pointer space-x-3">
                        <span data-cmw="header:join_ip"></span>
                    </a>
                    <div class="flex-wrap inline-flex space-x-3">
                        <a data-cmw-visible="footer:footer_active_facebook" data-cmw-attr="href:footer:footer_link_facebook" <?php if(ThemeModel::getInstance()->fetchConfigValue('footer','footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="head-a">
                            <i data-cmw-class="footer:footer_icon_facebook" class="fa-xl"></i>
                        </a>
                        <a data-cmw-visible="footer:footer_active_x" data-cmw-attr="href:footer:footer_link_x" <?php if(ThemeModel::getInstance()->fetchConfigValue('footer','footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="head-a">
                            <i data-cmw-class="footer:footer_icon_x" class="fa-xl"></i>
                        </a>
                        <a data-cmw-visible="footer:footer_active_instagram" data-cmw-attr="href:footer:footer_link_instagram" <?php if(ThemeModel::getInstance()->fetchConfigValue('footer', 'footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="head-a">
                            <i data-cmw-class="footer:footer_icon_instagram" class="fa-xl"></i>
                        </a>
                        <a data-cmw-visible="footer:footer_active_discord" data-cmw-attr="href:footer:footer_link_discord" <?php if(ThemeModel::getInstance()->fetchConfigValue('footer','footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="head-a">
                            <i data-cmw-class="footer:footer_icon_discord" class="fa-xl "></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <?php if (PackageController::isInstalled('Newsletter')): ?>
                <form action="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>newsletter" method="post">
                    <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                    <label for="mail">NewsLetter :</label>
                    <div class="inline-block">
                        <input id="mail" name="newsletter_users_mail" class="input" type="email" placeholder="votre@mail.fr" required>
                        <button class="input-btn" type="submit">M'inscrire</button>
                    </div>
                </form>
                <?php endif; ?>
                <div data-cmw-visible="footer:footer_active_condition">
                    <a class="head-a" href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>cgu" data-cmw="footer:footer_desc_condition_use"></a> /
                    <a class="head-a" href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>cgv" data-cmw="footer:footer_desc_condition_sale"></a>
                </div>
            </div>
        </div>
        <div class="mt-8">
            <p class="text-xs text-center text-black">Copyright © <?= date('Y') ?> Par <a class="text-blue-900" href="https://craftmywebsite.fr" target="_blank">CraftMyWebsite</a> pour <span class="text-white"><?= Website::getWebsiteName() ?></span></p>
            <p class="hidden">Credit thème : Z0mblard</p>
        </div>
    </div>
</footer>
</html>

<script src="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Js/flowbite.js"></script>
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
                title: "<?= Website::getWebsiteName() ?>",
                message: "Adresse du serveur copié !",
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





