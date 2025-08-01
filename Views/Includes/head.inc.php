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
<!--
  .oooooo.                       .o88o.     .        ooo        ooooo                  oooooo   oooooo     oooo            .o8                 o8o      .
 d8P'  `Y8b                      888 `"   .o8        `88.       .888'                   `888.    `888.     .8'            "888                 `"'    .o8
888          oooo d8b  .oooo.   o888oo  .o888oo       888b     d'888  oooo    ooo        `888.   .8888.   .8'    .ooooo.   888oooo.   .oooo.o oooo  .o888oo  .ooooo.
888          `888""8P `P  )88b   888      888         8 Y88. .P  888   `88.  .8'          `888  .8'`888. .8'    d88' `88b  d88' `88b d88(  "8 `888    888   d88' `88b
888           888      .oP"888   888      888         8  `888'   888    `88..8'            `888.8'  `888.8'     888ooo888  888   888 `"Y88b.   888    888   888ooo888
`88b    ooo   888     d8(  888   888      888 .       8    Y     888     `888'              `888'    `888'      888    .o  888   888 o.  )88b  888    888 . 888    .o
 `Y8bood8P'  d888b    `Y888""8o o888o     "888"      o8o        o888o     .8'                `8'      `8'       `Y8bod8P'  `Y8bod8P' 8""888P' o888o   "888" `Y8bod8P'.fr
                                                                      .o..P'
                                                                      `Y8P'
-->
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
    <link rel="stylesheet" type="text/css" href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Css/style.css">
    <link rel="stylesheet" href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Admin/Resources/Vendors/Fontawesome-free/Css/fa-all.min.css">

    <?= ImagesManager::getFaviconInclude() ?>

    <?php
        View::loadInclude($includes, 'styles');
    ?>


</head>

<style>
    @font-face {  font-family: angkor;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/Angkor-Regular.ttf");  }
    @font-face {  font-family: ibmplexsans;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/IBMPlexSans-Regular.ttf");  }
    @font-face {  font-family: kanit;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/Kanit-Regular.ttf");  }
    @font-face {  font-family: lora;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/Lora-Regular.ttf");  }
    @font-face {  font-family: madimione;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/MadimiOne-Regular.ttf");  }
    @font-face {  font-family: ojuju;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/Ojuju-Regular.ttf");  }
    @font-face {  font-family: opensans;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/OpenSans-Regular.ttf");  }
    @font-face {  font-family: playfairdisplay;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/PlayfairDisplay-Regular.ttf");  }
    @font-face {  font-family: robotocondensed;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/RobotoCondensed-Regular.ttf");  }
    @font-face {  font-family: robotomono;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/RobotoMono-Regular.ttf");  }
    @font-face {  font-family: robotoslab;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/RobotoSlab-Regular.ttf");  }
    @font-face {  font-family: rubik;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/Rubik-Regular.ttf");  }
    @font-face {  font-family: ubuntu;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/Ubuntu-Regular.ttf");  }
    @font-face {  font-family: roboto;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/Roboto-Regular.ttf");  }
    @font-face {  font-family: unbounded;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/Unbounded-Regular.ttf");  }
    @font-face {  font-family: montserrat;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/Montserrat-Regular.ttf");  }
    @font-face {  font-family: paytone;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/PaytoneOne-Regular.ttf");  }
    @font-face {  font-family: sora;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/Sora-Regular.ttf");  }
    @font-face {  font-family: outfit;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/Outfit-Regular.ttf");  }
    @font-face {  font-family: alata;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/Alata-Regular.ttf");  }
    @font-face {  font-family: titan;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/TitanOne-Regular.ttf");  }
    @font-face {  font-family: pressstart;  src:url("<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>Public/Themes/Nightcraft/Assets/Webfonts/PressStart2P-Regular.ttf");  }

    :root {
        --main-color: /*cmw:global:main_color*/;
        --btn-hover-color: /*cmw:global:btn_hover_color*/;
        --btn-text-color: /*cmw:global:btn_text_color*/;
        --btn-text-hover-color: /*cmw:global:btn_text_hover_color*/;
        --nav-active-color: /*cmw:global:nav_active_color*/;
        --nav-hover-color: /*cmw:global:nav_hover_color*/;
        --bg-color : /*cmw:global:bg_color*/;
        --nav-bg-color : /*cmw:global:nav_bg_color*/;
        --text-color : /*cmw:global:text_color*/;
        --home-btn-bg-color: /*cmw:global:home_btn_color*/;
        --home-btn-hover-color: /*cmw:global:home_btn_hover_color*/;
        --home-btn-text-color: /*cmw:global:home_btn_text_color*/;
        --card-bg-color : /*cmw:global:card_color*/;
        --card-in-card-bg-color : /*cmw:global:card_color_inner*/;
        --footer-bg-color : /*cmw:global:footer_bg_color*/;
        --input-bg-color : /*cmw:global:input_bg_color*/;
        --input-text-color : /*cmw:global:input_text_color*/;
        --input-placeholder-text-color : /*cmw:global:input_placeholder_color*/;
        --link-color: /*cmw:global:link_color*/;
        --hover-link-color: /*cmw:global:hover_link_color*/;
        --forum-hover-card : /*cmw:global:forum_hover_color*/;
        --overlay-blur: <?= ThemeModel::getInstance()->fetchConfigValue('global','overlay_blur') ?>px;
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
        height: 100vh;
        filter: blur(var(--overlay-blur));
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

<body data-cmw-class="global:main_font" style="background-color: var(--bg-color); color: var(--text-color)" class="dark flex flex-col min-h-screen">
<?php
View::loadInclude($includes, 'beforeScript');
echo CoreController::getInstance()->cmwWarn();
?>
