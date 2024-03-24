<?php

use CMW\Controller\Core\CoreController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Uploads\ImagesManager;
use CMW\Manager\Views\View;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/* @var \CMW\Controller\Core\CoreController $core */
/* @var string $title */
/* @var string $description */
/* @var array $includes */

$siteName = Website::getWebsiteName();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta property="og:title" content=<?= $siteName ?>>
    <meta property="og:site_name" content="<?= $siteName ?>">
    <meta property="og:description" content="<?= Website::getDescription() ?>">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?= EnvManager::getInstance()->getValue('PATH_URL') ?>">

    <title><?= Website::getTitle() ?></title>
    <meta name="description" content="<?= Website::getDescription() ?>">

    <meta name="author" content="CraftMyWebsite, <?= $siteName ?>">
    <meta name="publisher" content="<?= $siteName ?>">
    <meta name="copyright" content="CraftMyWebsite, <?= $siteName ?>">
    <meta name="robots" content="follow, index, all"/>


    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Css/style.css">
    <link rel="stylesheet" href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Admin/Resources/Vendors/Fontawesome-free/Css/fa-all.min.css">

    <?= ImagesManager::getFaviconInclude() ?>

    <?php
    View::loadInclude($includes, "styles");
    ?>


</head>

<style>
    @font-face {  font-family: angkor;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/Angkor-Regular.ttf");  }
    @font-face {  font-family: ibmplexsans;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/IBMPlexSans-Regular.ttf");  }
    @font-face {  font-family: kanit;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/Kanit-Regular.ttf");  }
    @font-face {  font-family: lora;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/Lora-Regular.ttf");  }
    @font-face {  font-family: madimione;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/MadimiOne-Regular.ttf");  }
    @font-face {  font-family: ojuju;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/Ojuju-Regular.ttf");  }
    @font-face {  font-family: opensans;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/OpenSans-Regular.ttf");  }
    @font-face {  font-family: playfairdisplay;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/PlayfairDisplay-Regular.ttf");  }
    @font-face {  font-family: robotocondensed;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/RobotoCondensed-Regular.ttf");  }
    @font-face {  font-family: robotomono;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/RobotoMono-Regular.ttf");  }
    @font-face {  font-family: robotoslab;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/RobotoSlab-Regular.ttf");  }
    @font-face {  font-family: rubik;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/Rubik-Regular.ttf");  }
    @font-face {  font-family: ubuntu;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/Ubuntu-Regular.ttf");  }
    @font-face {  font-family: roboto;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/Roboto-Regular.ttf");  }
    @font-face {  font-family: unbounded;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/Unbounded-Regular.ttf");  }
    @font-face {  font-family: montserrat;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/Montserrat-Regular.ttf");  }
    @font-face {  font-family: paytone;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/PaytoneOne-Regular.ttf");  }
    @font-face {  font-family: sora;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/Sora-Regular.ttf");  }
    @font-face {  font-family: outfit;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/Outfit-Regular.ttf");  }
    @font-face {  font-family: alata;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/Alata-Regular.ttf");  }
    @font-face {  font-family: titan;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/TitanOne-Regular.ttf");  }
    @font-face {  font-family: pressstart;  src:url("<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Nightcraft/Assets/Webfonts/PressStart2P-Regular.ttf");  }

    :root {
        --main-color: <?= ThemeModel::getInstance()->fetchConfigValue('main_color') ?>;
        --btn-hover-color: <?= ThemeModel::getInstance()->fetchConfigValue('btn_hover_color') ?>;
        --btn-text-color: <?= ThemeModel::getInstance()->fetchConfigValue('btn_text_color') ?>;
        --btn-text-hover-color: <?= ThemeModel::getInstance()->fetchConfigValue('btn_text_hover_color') ?>;
        --nav-active-color: <?= ThemeModel::getInstance()->fetchConfigValue('nav_active_color') ?>;
        --nav-hover-color: <?= ThemeModel::getInstance()->fetchConfigValue('nav_hover_color') ?>;
        --bg-color : <?= ThemeModel::getInstance()->fetchConfigValue('bg_color') ?>;
        --nav-bg-color : <?= ThemeModel::getInstance()->fetchConfigValue('nav_bg_color') ?>;
        --bg-img: url("<?= ThemeModel::getInstance()->fetchImageLink('overlay_img') ?>");
        --text-color : <?= ThemeModel::getInstance()->fetchConfigValue('text_color') ?>;
        --home-overlay-blur: <?= ThemeModel::getInstance()->fetchConfigValue('overlay_blur') ?>px;
        --home-logo-width: <?= ThemeModel::getInstance()->fetchConfigValue('logo_width') ?>%;
        --home-btn-bg-color: <?= ThemeModel::getInstance()->fetchConfigValue('home_btn_color') ?>;
        --home-btn-hover-color: <?= ThemeModel::getInstance()->fetchConfigValue('home_btn_hover_color') ?>;
        --home-btn-text-color: <?= ThemeModel::getInstance()->fetchConfigValue('home_btn_text_color') ?>;
        --home-join-discord-width: <?= ThemeModel::getInstance()->fetchConfigValue('home_join_width') ?>%;
        --card-bg-color : <?= ThemeModel::getInstance()->fetchConfigValue('card_color') ?>;
        --card-in-card-bg-color : <?= ThemeModel::getInstance()->fetchConfigValue('card_in_card_color') ?>;
        --footer-bg-color : <?= ThemeModel::getInstance()->fetchConfigValue('footer_bg_color') ?>;
        --input-bg-color : <?= ThemeModel::getInstance()->fetchConfigValue('input_bg_color') ?>;
        --input-text-color : <?= ThemeModel::getInstance()->fetchConfigValue('input_text_color') ?>;
        --input-placeholder-text-color : <?= ThemeModel::getInstance()->fetchConfigValue('input_placeholder_color') ?>;
        --maintenance-width: <?= ThemeModel::getInstance()->fetchConfigValue('maintenance_width') ?>%;
        --404-width: <?= ThemeModel::getInstance()->fetchConfigValue('404_width') ?>%;
        --link-color: <?= ThemeModel::getInstance()->fetchConfigValue('link_color') ?>;
        --hover-link-color: <?= ThemeModel::getInstance()->fetchConfigValue('hover_link_color') ?>;
        --forum-hover-card : <?= ThemeModel::getInstance()->fetchConfigValue('forum_hover_color') ?>;
    }

    .hover-topic-forum {
        background-color: var(--card-in-card-bg-color);
        border-radius: .7rem;
    }

    .hover-topic-forum:hover {
        background-color: var(--forum-hover-card);
    }

    .a-forum {
        color: var(--main-color);
    }

    .a-forum:hover {
        text-shadow: 0 0 8px var(--hover-link-color);
        color: var(--hover-link-color);
    }

    .a-base {
        color: var(--link-color);
    }

    .a-base:hover {
        text-shadow: 0 0 8px var(--hover-link-color);
        color: var(--hover-link-color);
    }

    label {
        display: block;
    }

    .input {
        background-color: var(--input-bg-color);
        color: var(--input-text-color);
        border-radius: 0.2rem;
        padding: 0.3rem;
    }
    .input:focus {
        border-color: var(--main-color);
        box-shadow: 0 0 5px var(--main-color);
    }
    .input:checked {
        background-color: var(--main-color);
        color: var(--main-color);
    }
    .input::placeholder {
        color: var(--input-placeholder-text-color);
    }

    .input-btn {
        background-color: var(--main-color);
        border-radius: 4px;
        padding: 0.4rem 0.9rem;
        color: var(--btn-text-color);
        transition: transform 0.3s ease, box-shadow 1.9s ease;
        font-weight: bold;
    }
    .input-btn:hover {
        background-color: var(--btn-hover-color);
        color: var(--btn-text-hover-color);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 0 30px var(--btn-hover-color);
    }

    .btn {
        background-color: var(--main-color);
        border-radius: 4px;
        padding: 0.6rem 0.9rem;
        color: var(--btn-text-color);
        transition: transform 0.3s ease, box-shadow 1.9s ease;
        font-weight: bold;
    }
    .btn:hover {
        background-color: var(--btn-hover-color);
        color: var(--btn-text-hover-color);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 0 30px var(--btn-hover-color);
    }

    .btn-short {
        background-color: var(--main-color);
        border-radius: 4px;
        padding: 0.2rem 0.3rem;
        color: var(--btn-text-color);
        transition: transform 0.3s ease, box-shadow 1.9s ease;
        font-weight: bold;
    }
    .btn-short:hover {
        background-color: var(--btn-hover-color);
        color: var(--btn-text-hover-color);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 0 30px var(--btn-hover-color);
    }

    .mini-card {
        background-color: var(--main-color);
        font-size: 0.7rem;
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }

    .home-button {
        background-color: var(--home-btn-bg-color);
        transition: transform 0.3s ease, box-shadow 1.9s ease;
        color: var(--home-btn-text-color);
    }
    .home-button:hover {
        background-color: var(--home-btn-hover-color);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 0 30px var(--home-btn-hover-color);
    }

    .nav-btn-active {
        background-color: var(--nav-active-color);
        border-radius: 4px;
        padding: 0.6rem 0.9rem;
        color: var(--btn-text-color);
        font-weight: bold;
        text-transform: uppercase;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 0 30px var(--nav-active-color);
    }

    .nav-btn {
        background-color: transparent;
        border-radius: 4px;
        padding: 0.6rem 0.9rem;
        color: var(--btn-text-color);
        font-weight: bold;
        text-transform: uppercase;
    }

    .nav-btn:hover {
        background-color: var(--nav-hover-color);
        border-radius: 4px;
        padding: 0.6rem 0.9rem;
        color: var(--btn-text-color);
        font-weight: bold;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 0 30px var(--nav-hover-color);
    }

    .overlay {
        position: absolute;
        background-image: var(--bg-img);
        height: 100vh;
        filter: blur(var(--home-overlay-blur));
        top: 0;
        left: 0;
        width: 100%;
        margin: 0;
        z-index: -5;
    }
    .overlay::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(ellipse farthest-corner at 50% 50%, transparent 20%, var(--bg-color) 80%);
        z-index: -1;
    }

    .zoomable-image img {
        transition: transform 0.5s ease;
        transform: scale(1.0);
    }

    .zoomable-image:hover img {
        transform: scale(1.6);
    }

</style>

<body style="background-color: var(--bg-color); color: var(--text-color)" class="dark font-<?= ThemeModel::getInstance()->fetchConfigValue('main_font') ?> flex flex-col min-h-screen">
<?php
View::loadInclude($includes, "beforeScript");
echo CoreController::getInstance()->cmwWarn();
?>
