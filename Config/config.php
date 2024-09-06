<?php
use CMW\Controller\Core\PackageController;
use CMW\Controller\Core\ThemeController;
use CMW\Manager\Lang\LangManager;
use CMW\Model\Core\CoreModel;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Votes\VotesConfigModel;
use CMW\Utils\SecurityService;
use CMW\Utils\Utils;

if (PackageController::isInstalled('News')) {
    /* @var \CMW\Entity\News\NewsEntity $news */
    $newsList = \CMW\Model\News\NewsModel::getInstance()->getNews();
}
?>

<style>
    #colorPicker {
        display: flex;
        flex-direction: column;
        width: 200px;
    }

    #colorPicker label {
        margin: 5px 0;
    }

    #colorDisplay {
        border: 1px solid #000;
    }

    input[type='color'] {
        -webkit-appearance: none;
        border: black solid 1px;
        width: 20px;
        height: 20px;
        cursor: pointer;
        padding: 0;
    }

    input[type='color']::-webkit-color-swatch-wrapper {
        padding: 0;
    }
    input[type='color']::-webkit-color-swatch {
        border: none;
    }
    input[type='color']::-moz-color-swatch {
        border: none;
    }
</style>
<!-------------->
<!--Navigation-->
<!-------------->
<div class="tab-menu">
    <ul class="tab-horizontal" data-tabs-toggle="#tab-content-config">
        <li>
            <button type="button" data-tabs-target="#tab1" role="tab">Global</button>
        </li>
        <li>
            <button type="button" data-tabs-target="#tab11" role="tab">En tête</button>
        </li>
        <li>
            <button type="button" data-tabs-target="#tab2" role="tab">Accueil</button>
        </li>
        <?php if (PackageController::isInstalled('News')): ?>
            <li>
                <button type="button" data-tabs-target="#tab3" role="tab">News</button>
            </li>
        <?php endif; ?>
        <?php if (PackageController::isInstalled('Faq')): ?>
            <li>
                <button type="button" data-tabs-target="#tab4" role="tab">F.A.Q</button>
            </li>
        <?php endif; ?>
        <?php if (PackageController::isInstalled('Votes')): ?>
            <li>
                <button type="button" data-tabs-target="#tab5" role="tab">Votes</button>
            </li>
        <?php endif; ?>
        <?php if (PackageController::isInstalled('Wiki')): ?>
            <li>
                <button type="button" data-tabs-target="#tab6" role="tab">Wiki</button>
            </li>
        <?php endif; ?>
        <?php if (PackageController::isInstalled('Forum')): ?>
            <li>
                <button type="button" data-tabs-target="#tab7" role="tab">Forum</button>
            </li>
        <?php endif; ?>
        <li>
            <button type="button" data-tabs-target="#tab8" role="tab">Footer</button>
        </li>
    </ul>
</div>

<!--------------->
<!----CONTENT---->
<!--------------->
<div id="tab-content-config">
    <!--
    En tête et Global
    -->
    <div class="tab-content" id="tab1">
        <div class="grid-2">
            <div>
                <div class="grid-2">

                        <div class="flex items-center">
                            <input type="color" id="main_color" name="main_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('main_color') ?>">
                            <label style="margin-left: 0.5rem" for="main_color">Couleur du site</label>
                        </div>

                        <div class="flex items-center">
                            <input type="color" id="bg_color" name="bg_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('bg_color') ?>">
                            <label style="margin-left: 0.5rem" for="bg_color">Couleur du fond</label>
                        </div>

                        <div class="flex items-center">
                            <input type="color" id="btn_hover_color" name="btn_hover_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('btn_hover_color') ?>">
                            <label style="margin-left: 0.5rem" for="btn_hover_color">Couleur lors du survol des boutons</label>
                        </div>

                        <div class="flex items-center">
                            <input type="color" id="btn_text_color" name="btn_text_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('btn_text_color') ?>">
                            <label style="margin-left: 0.5rem" for="btn_text_color">Couleur des textes des boutons</label>
                        </div>

                        <div class="flex items-center">
                            <input type="color" id="btn_text_hover_color" name="btn_text_hover_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('btn_text_hover_color') ?>">
                            <label style="margin-left: 0.5rem" for="btn_text_hover_color">Couleur lors du survol des textes des boutons</label>
                        </div>

                        <div class="flex items-center">
                            <input type="color" id="text_color" name="text_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('text_color') ?>">
                            <label style="margin-left: 0.5rem" for="text_color">Couleur des textes</label>
                        </div>

                        <div class="flex items-center">
                            <input type="color" id="card_color" name="card_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('card_color') ?>">
                            <label style="margin-left: 0.5rem" for="card_color">Couleur des cartes</label>
                        </div>

                        <div class="flex items-center">
                            <input type="color" id="card_in_card_color" name="card_in_card_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('card_in_card_color') ?>">
                            <label style="margin-left: 0.5rem" for="card_in_card_color">Couleur des cartes dans les cartes</label>
                        </div>

                        <div class="flex items-center">
                            <input type="color" id="footer_bg_color" name="footer_bg_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_bg_color') ?>">
                            <label style="margin-left: 0.5rem" for="footer_bg_color">Couleur du footer</label>
                        </div>

                        <div class="flex items-center">
                            <input type="color" id="input_bg_color" name="input_bg_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('input_bg_color') ?>">
                            <label style="margin-left: 0.5rem" for="input_bg_color">Couleur du fond des champs texte</label>
                        </div>

                        <div class="flex items-center">
                            <input type="color" id="input_text_color" name="input_text_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('input_text_color') ?>">
                            <label style="margin-left: 0.5rem" for="input_text_color">Couleur des textes des champs texte</label>
                        </div>

                        <div class="flex items-center">
                            <input type="color" id="input_placeholder_color" name="input_placeholder_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('input_placeholder_color') ?>">
                            <label style="margin-left: 0.5rem" for="input_placeholder_color">Couleur des placeholder des champs texte</label>
                        </div>

                        <div class="flex items-center">
                            <input type="color" id="link_color" name="link_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('link_color') ?>">
                            <label style="margin-left: 0.5rem" for="link_color">Couleur des liens</label>
                        </div>

                        <div class="flex items-center">
                            <input type="color" id="hover_link_color" name="hover_link_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('hover_link_color') ?>">
                            <label style="margin-left: 0.5rem" for="hover_link_color">Couleur du survol des liens</label>
                        </div>


                </div>
                <div class="mt-4">
                    <label for="hero_button_link">Police d'écriture :</label>
                    <select class="form-select" name="main_font" required>
                        <option value="angkor" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'angkor' ? 'selected' : '' ?>>
                            Angkor
                        </option>
                        <option value="ibmplexsans" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'ibmplexsans' ? 'selected' : '' ?>>
                            ibmplexsans
                        </option>
                        <option value="kanit" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'kanit' ? 'selected' : '' ?>>
                            kanit
                        </option>
                        <option value="lora" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'lora' ? 'selected' : '' ?>>
                            lora
                        </option>
                        <option value="madimione" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'madimione' ? 'selected' : '' ?>>
                            madimione
                        </option>
                        <option value="ojuju" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'ojuju' ? 'selected' : '' ?>>
                            ojuju
                        </option>
                        <option value="opensans" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'opensans' ? 'selected' : '' ?>>
                            opensans
                        </option>
                        <option value="playfairdisplay" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'playfairdisplay' ? 'selected' : '' ?>>
                            playfairdisplay
                        </option>
                        <option value="robotocondensed" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'robotocondensed' ? 'selected' : '' ?>>
                            robotocondensed
                        </option>
                        <option value="robotomono" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'robotomono' ? 'selected' : '' ?>>
                            robotomono
                        </option>
                        <option value="robotoslab" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'robotoslab' ? 'selected' : '' ?>>
                            robotoslab
                        </option>
                        <option value="rubik" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'rubik' ? 'selected' : '' ?>>
                            rubik
                        </option>
                        <option value="ubuntu" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'ubuntu' ? 'selected' : '' ?>>
                            ubuntu
                        </option>
                        <option value="roboto" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'roboto' ? 'selected' : '' ?>>
                            roboto (par défaut)
                        </option>
                        <option value="unbounded" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'unbounded' ? 'selected' : '' ?>>
                            unbounded
                        </option>
                        <option value="montserrat" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'montserrat' ? 'selected' : '' ?>>
                            montserrat
                        </option>
                        <option value="paytone" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'paytone' ? 'selected' : '' ?>>
                            paytone
                        </option>
                        <option value="sora" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'sora' ? 'selected' : '' ?>>
                            sora
                        </option>
                        <option value="outfit" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'outfit' ? 'selected' : '' ?>>
                            outfit
                        </option>
                        <option value="alata" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'alata' ? 'selected' : '' ?>>
                            alata
                        </option>
                        <option value="titan" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'titan' ? 'selected' : '' ?>>
                            titan
                        </option>
                        <option value="pressstart" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === 'pressstart' ? 'selected' : '' ?>>
                            pressstart
                        </option>
                    </select>
                </div>
            </div>
            <div>

                    <h6>Couleurs (avec transparence)</h6>
                    <div class="grid-2">
                        <div class="">
                            <div class="colorPicker">
                                <label>Couleur des cadres :</label>
                                <div class="flex">
                                    <div>
                                        <div class="colorDisplay" style="width:90px; height:90px; margin-right: 5px"></div>
                                    </div>
                                    <div>
                                        <label for="r1">Rouge: <input type="range" id="r1" class="r" name="card_color_r" value="<?= ThemeModel::getInstance()->fetchConfigValue('card_color_r') ?>" min="0" max="255"></label><br>
                                        <label for="g1">Vert: <input type="range" id="g1" class="g" name="card_color_g" value="<?= ThemeModel::getInstance()->fetchConfigValue('card_color_g') ?>" min="0" max="255"></label><br>
                                        <label for="b1">Bleu: <input type="range" id="b1" class="b" name="card_color_b" value="<?= ThemeModel::getInstance()->fetchConfigValue('card_color_b') ?>" min="0" max="255"></label><br>
                                        <label for="a1">Alpha: <input type="range" id="a1" class="a" name="card_color_a" value="<?= ThemeModel::getInstance()->fetchConfigValue('card_color_a') ?>" min="0" max="1" step="0.01"></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="colorPicker">
                                <label>Couleur des cadres dans les cardes :</label>
                                <div class="flex">
                                    <div>
                                        <div class="colorDisplay" style="width:90px; height:90px; margin-right: 5px"></div>
                                    </div>
                                    <div>
                                        <label for="r2">Rouge: <input type="range" id="r2" class="r" name="card_in_card_color_r" value="<?= ThemeModel::getInstance()->fetchConfigValue('card_in_card_color_r') ?>" min="0" max="255"></label><br>
                                        <label for="g2">Vert: <input type="range" id="g2" class="g" name="card_in_card_color_g" value="<?= ThemeModel::getInstance()->fetchConfigValue('card_in_card_color_g') ?>" min="0" max="255"></label><br>
                                        <label for="b2">Bleu: <input type="range" id="b2" class="b" name="card_in_card_color_b" value="<?= ThemeModel::getInstance()->fetchConfigValue('card_in_card_color_b') ?>" min="0" max="255"></label><br>
                                        <label for="a2">Alpha: <input type="range" id="a2" class="a" name="card_in_card_color_a" value="<?= ThemeModel::getInstance()->fetchConfigValue('card_in_card_color_a') ?>" min="0" max="1" step="0.01"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="colorPicker">
                                <label>Couleur du fond de la navigation :</label>
                                <div class="flex">
                                    <div>
                                        <div class="colorDisplay" style="width:90px; height:90px; margin-right: 5px"></div>
                                    </div>
                                    <div>
                                        <label for="r3">Rouge: <input type="range" id="r3" class="r" name="nav_bg_color_r" value="<?= ThemeModel::getInstance()->fetchConfigValue('nav_bg_color_r') ?>" min="0" max="255"></label><br>
                                        <label for="g3">Vert: <input type="range" id="g3" class="g" name="nav_bg_color_g" value="<?= ThemeModel::getInstance()->fetchConfigValue('nav_bg_color_g') ?>" min="0" max="255"></label><br>
                                        <label for="b3">Bleu: <input type="range" id="b3" class="b" name="nav_bg_color_b" value="<?= ThemeModel::getInstance()->fetchConfigValue('nav_bg_color_b') ?>" min="0" max="255"></label><br>
                                        <label for="a3">Alpha: <input type="range" id="a3" class="a" name="nav_bg_color_a" value="<?= ThemeModel::getInstance()->fetchConfigValue('nav_bg_color_a') ?>" min="0" max="1" step="0.01"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <h6>Accès</h6>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Connexion <i data-bs-toggle="tooltip"
                                                             title="Désactive le bouton de connexion mais vous avez toujours accès à la page"
                                                             class="fa-sharp fa-solid fa-circle-question"></i></p>
                        <input type="checkbox" class="toggle-input" id="header_allow_login_button"
                               name="header_allow_login_button" <?= ThemeModel::getInstance()->fetchConfigValue('header_allow_login_button') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Inscription <i data-bs-toggle="tooltip"
                                                               title="Vous pouvez désactiver les inscriptions et afficher un message"
                                                               class="fa-sharp fa-solid fa-circle-question"></i></p>
                        <input type="checkbox" class="toggle-input" name="header_allow_register_button"
                               id="header_allow_register_button" <?= ThemeModel::getInstance()->fetchConfigValue('header_allow_register_button') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
                <label for="global_no_register_message">Message lorsque l'inscription est désactivée :</label>
                <input class="input" type="text" id="global_no_register_message" name="global_no_register_message"  value="<?= ThemeModel::getInstance()->fetchConfigValue('global_no_register_message') ?>">
            </div>
        </div>

        <div class="col-12 col-lg-6 mt-4">
            <div class="card-in-card p-4">
                <h4>Overlay</h4>
                <div class="grid-2">
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Afficher sur toutes les pages</p>
                            <input type="checkbox" class="toggle-input" id="overlay_everywhere" name="overlay_everywhere" <?= ThemeModel::getInstance()->fetchConfigValue('overlay_everywhere') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <div class="">
                        <div>
                            <label class="form-check-label" for="overlay_blur">Flou de l'image</label>
                            <input class="input" type="text" id="overlay_blur" name="overlay_blur"  value="<?= ThemeModel::getInstance()->fetchConfigValue('overlay_blur') ?>">
                        </div>
                    </div>
                </div>
                <div class="text-center ">
                    <img class="w-100" src="<?= ThemeModel::getInstance()->fetchImageLink('overlay_img') ?>" alt="Image introuvable !">
                </div>
                <div class="drop-img-area" data-input-name="overlay_img"></div>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="card-in-card p-4">
                <h4>Images</h4>
                <div class="grid-2">
                    <div>
                        <div>
                            <h6>Page d'erreur / 404 :</h6>
                            <label for="404_width">Largeur de l'image: <input type="range" id="404_width" name="404_width" value="<?= ThemeModel::getInstance()->fetchConfigValue('404_width') ?>" min="0" max="100"></label><br>
                                <img class="w-50 mx-auto" src="<?= ThemeModel::getInstance()->fetchImageLink('404_img') ?>" alt="Image introuvable !">
                            <div class="drop-img-area" data-input-name="404_img"></div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <h6>Maintenance :</h6>
                            <label for="maintenance_width">Largeur de l'image: <input type="range" id="maintenance_width" name="maintenance_width" value="<?= ThemeModel::getInstance()->fetchConfigValue('maintenance_width') ?>" min="0" max="100"></label><br>
                                <img class="w-50 mx-auto" src="<?= ThemeModel::getInstance()->fetchImageLink('maintenance_img') ?>" alt="Image introuvable !">
                            <div class="drop-img-area" data-input-name="maintenance_img"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="tab-content" id="tab11">
        <div class="grid-2">
            <div>
                <h6>En tête</h6>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Titre : <i data-bs-toggle="tooltip"
                                                           title="Vous pouvez l'afficher ou le masqué"
                                                           class="fa-sharp fa-solid fa-circle-question"></i></p>
                        <input type="checkbox" class="toggle-input" name="header_active_title"
                               id="header_active_title" <?= ThemeModel::getInstance()->fetchConfigValue('header_active_title') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Logo : <i data-bs-toggle="tooltip"
                                                          title="Vous pouvez l'afficher ou le masqué"
                                                          class="fa-sharp fa-solid fa-circle-question"></i></p>
                        <input type="checkbox" class="toggle-input" id="header_active_logo"
                               name="header_active_logo" <?= ThemeModel::getInstance()->fetchConfigValue('header_active_logo') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
                <div class="grid-2">
                    <div class="flex justify-center">
                        <img class="w-25" src="<?= ThemeModel::getInstance()->fetchImageLink('header_img_logo') ?>"
                             alt="Image introuvable !">
                    </div>
                    <div class="drop-img-area mt-4" data-input-name="header_img_logo"></div>
                    <div class="col-12 mt-4">
                        <label for="logo_width">Largeur de l'image: <input type="range" id="logo_width" name="logo_width" value="<?= ThemeModel::getInstance()->fetchConfigValue('logo_width') ?>" min="0" max="100"></label><br>
                    </div>
                </div>
            </div>


            <div>
                <div class="col-12 mt-4">
                    <h6>Rejoindre :</h6>
                    <label for="join_ip">Adresse IP</label>
                    <input class="input" type="text" id="join_ip" name="join_ip"  value="<?= ThemeModel::getInstance()->fetchConfigValue('join_ip') ?>">
                </div>
                <div class="">
                    <h6>Couleurs de navigation</h6>
                    <div class="grid-2">
                        <div>
                            <div class="flex items-center">
                                <input type="color" id="nav_active_color" name="nav_active_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('nav_active_color') ?>">
                                <label style="margin-left: 0.5rem" for="nav_active_color">Couleur du bouton actif de la navigation</label>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center">
                                <input type="color" id="nav_hover_color" name="nav_hover_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('nav_hover_color') ?>">
                                <label style="margin-left: 0.5rem" for="nav_hover_color">Couleur du survol de la navigation</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
    Accueil
    -->
    <div class="tab-content" id="tab2">
        <h6>Indéxation de la page (meta) :</h6>
        <div class="alert-warning">
            <h6 class="alert-heading">Bien comprendre l'indéxation</h6>
            <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des
                affichages sur Discord, Twitter...<br>
                Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un peu
                plus bas (Si votre page est éligible à ce réglage).<br>
                Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
        </div>
        <label for="home_title">Titre de la page :</label>
        <input type="text" id="home_title" name="home_title"
               value="<?= ThemeModel::getInstance()->fetchConfigValue('home_title') ?>" required class="input">
        <hr>
        <div class="card-in-card p-4 mt-4">
            <h6>Apparences</h6>
            <div class="grid-3">
                <div class="col-12 col-lg-6 mt-2">
                    <div class="flex items-center">
                        <input type="color" id="home_btn_color" name="home_btn_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('home_btn_color') ?>">
                        <label style="margin-left: 0.5rem" for="home_btn_color">Couleur du bouton</label>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-2">
                    <div class="flex items-center">
                        <input type="color" id="home_btn_hover_color" name="home_btn_hover_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('home_btn_hover_color') ?>">
                        <label style="margin-left: 0.5rem" for="home_btn_hover_color">Couleur du survol du bouton</label>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-2">
                    <div class="flex items-center">
                        <input type="color" id="home_btn_text_color" name="home_btn_text_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('home_btn_text_color') ?>">
                        <label style="margin-left: 0.5rem" for="home_btn_text_color">Couleur du texte du bouton</label>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!--NEWS-->
        <?php if (PackageController::isInstalled('News')): ?>
            <div class="card-in-card mt-4">
                <div class="card-body">
                    <label class="toggle">
                        <h6 class="toggle-label">Nouveautés : </h6>
                        <input type="checkbox" class="toggle-input" id="news_section_active" name="news_section_active" <?= ThemeModel::getInstance()->fetchConfigValue('news_section_active') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                    <label>Titre de la section :</label>
                    <input type="text" class="input" name="news_section_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('news_section_title') ?>" required>
                    <label>Description de la section :</label>
                    <input type="text" class="input" name="news_section_desc" value="<?= ThemeModel::getInstance()->fetchConfigValue('news_section_desc') ?>" required>
                    <div class="form-group">
                        <label>Nombre de news à afficher :</label>
                        <input class="input" type="number" id="news_number_display" name="news_number_display" value="<?= ThemeModel::getInstance()->fetchConfigValue('news_number_display') ?>">
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <hr>
        <!--JOIN US-->
        <div class="">
            <div class="card-body">
                <label class="toggle">
                    <h6 class="toggle-label">Rejoindre : </h6>
                    <input type="checkbox" class="toggle-input" id="join_section_active" name="join_section_active" <?= ThemeModel::getInstance()->fetchConfigValue('join_section_active') ? 'checked' : '' ?>>
                    <div class="toggle-slider"></div>
                </label>
                <div class="grid-2">
                    <div>
                        <label for="home_join_width">Largeur de l'image: <input type="range" id="home_join_width" name="home_join_width" value="<?= ThemeModel::getInstance()->fetchConfigValue('home_join_width') ?>" min="0" max="100"></label><br>
                        <img class="w-50 mx-auto" src="<?= ThemeModel::getInstance()->fetchImageLink('join_section_img') ?>" alt="Image introuvable !">
                        <div class="drop-img-area" data-input-name="join_section_img"></div>
                    </div>
                    <div>
                        <label for="join_section_title">Titre de la section :</label>
                        <input type="text" class="input" id="join_section_title" name="join_section_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('join_section_title') ?>" required>
                        <label for="join_section_text">Description de la section :</label>
                        <input type="text" class="input" id="join_section_text" name="join_section_text" value="<?= ThemeModel::getInstance()->fetchConfigValue('join_section_text') ?>" required>
                        <label for="join_section_text_button">Texte du bouton :</label>
                        <input type="text" class="input" id="join_section_text_button" name="join_section_text_button" value="<?= ThemeModel::getInstance()->fetchConfigValue('join_section_text_button') ?>" required>
                        <label for="join_section_url">Url du bouton :</label>
                        <input type="text" class="input" id="join_section_url" name="join_section_url" value="<?= ThemeModel::getInstance()->fetchConfigValue('join_section_url') ?>" required>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!--CUSTOM 1-->
        <div>
            <label class="toggle">
                <h5 class="toggle-label">Personnalisable 1 : <i data-bs-toggle="tooltip"
                                                                title="Vous pouvez activer ou non cette section."
                                                                class="fa-sharp fa-solid fa-circle-question"></i></h5>
                <input type="checkbox" class="toggle-input" id="custom_section_active_1"
                       name="custom_section_active_1" <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_active_1') ? 'checked' : '' ?>>
                <div class="toggle-slider"></div>
            </label>
        </div>
        <label for="custom_section_title_1">Titre de la section :</label>
        <input type="text" class="input" id="custom_section_title_1" name="custom_section_title_1"
               value="<?= ThemeModel::getInstance()->fetchConfigValue('custom_section_title_1') ?>" required>
        <label for="custom_section_content_1">Contenu :</label>
        <textarea id="custom_section_content_1" name="custom_section_content_1"
                  class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_1') ?></textarea>
        <hr>
        <!--CUSTOM 2-->
        <div>
            <label class="toggle">
                <h5 class="toggle-label">Personnalisable 2 : <i data-bs-toggle="tooltip"
                                                                title="Vous pouvez activer ou non cette section."
                                                                class="fa-sharp fa-solid fa-circle-question"></i></h5>
                <input type="checkbox" class="toggle-input" id="custom_section_active_2"
                       name="custom_section_active_2" <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_active_2') ? 'checked' : '' ?>>
                <div class="toggle-slider"></div>
            </label>
        </div>
        <label for="custom_section_title_2">Titre de la section :</label>
        <input type="text" class="input" id="custom_section_title_2" name="custom_section_title_2"
               value="<?= ThemeModel::getInstance()->fetchConfigValue('custom_section_title_2') ?>" required>
        <label for="custom_section_content_2">Contenu :</label>
        <textarea name="custom_section_content_2" id="custom_section_content_2"
                  class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_2') ?></textarea>
        <hr>
        <!--CUSTOM 3-->
        <div>
            <label class="toggle">
                <h5 class="toggle-label">Personnalisable 3 : <i data-bs-toggle="tooltip"
                                                                title="Vous pouvez activer ou non cette section."
                                                                class="fa-sharp fa-solid fa-circle-question"></i></h5>
                <input type="checkbox" class="toggle-input" id="custom_section_active_3"
                       name="custom_section_active_3" <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_active_3') ? 'checked' : '' ?>>
                <div class="toggle-slider"></div>
            </label>
        </div>
        <label for="custom_section_title_3">Titre de la section :</label>
        <input type="text" class="input" id="custom_section_title_3" name="custom_section_title_3"
               value="<?= ThemeModel::getInstance()->fetchConfigValue('custom_section_title_3') ?>" required>
        <label for="custom_section_content_3">Contenu :</label>
        <textarea name="custom_section_content_3" id="custom_section_content_3"
                  class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_3') ?></textarea>
        <hr>
        <div>
            <label class="toggle">
                <h5 class="toggle-label">Personnalisable 4 : <i data-bs-toggle="tooltip"
                                                                title="Vous pouvez activer ou non cette section."
                                                                class="fa-sharp fa-solid fa-circle-question"></i></h5>
                <input type="checkbox" class="toggle-input" id="custom_section_active_4"
                       name="custom_section_active_4" <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_active_4') ? 'checked' : '' ?>>
                <div class="toggle-slider"></div>
            </label>
        </div>
        <label for="custom_section_title_4">Titre de la section :</label>
        <input type="text" class="input" id="custom_section_title_4" name="custom_section_title_4"
               value="<?= ThemeModel::getInstance()->fetchConfigValue('custom_section_title_4') ?>" required>
        <label for="custom_section_content_4">Contenu :</label>
        <textarea name="custom_section_content_4" id="custom_section_content_4"
                  class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_4') ?></textarea>
    </div>
    <div class="tab-content" id="tab3">
        <!---NEWS---->
        <?php if (PackageController::isInstalled('News')): ?>
            <h6>Indéxation de la page (meta) :</h6>
            <div class="alert alert-warning">
                <h6 class="alert-heading">Bien comprendre l'indéxation</h6>
                <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des
                    affichages sur Discord, Twitter...<br>
                    Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un
                    peu plus bas (Si votre page est éligible à ce réglage).<br>
                    Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
            </div>
            <div class="grid-2">
                <div>
                    <label for="news_title">Titre de la page :</label>
                    <input type="text" class="input" id="news_title" name="news_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('news_title') ?>" required>
                </div>
                <div>
                    <label for="news_description">Description de la page :</label>
                    <input type="text" class="input" id="news_description" name="news_description"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('news_description') ?>" required>
                </div>
            </div>
            <hr>
            <h6>Réglages :</h6>
            <div class="grid-2">
                <div>
                    <label for="news_page_title">Titre :</label>
                    <input type="text" class="input" id="news_page_title" name="news_page_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('news_page_title') ?>" required>
                </div>
                <div>
                    <label for="news_page_number_display">Nombre de news à afficher:</label>
                    <input class="input" type="number" id="news_page_number_display" name="news_page_number_display"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('news_page_number_display') ?>">
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="tab-content" id="tab4">
        <!---FAQ---->
        <?php if (PackageController::isInstalled('Faq')): ?>
            <h6>Indéxation de la page (meta) :</h6>
            <div class="alert alert-warning">
                <h6 class="alert-heading">Bien comprendre l'indéxation</h6>
                <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des
                    affichages sur Discord, Twitter...<br>
                    Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un
                    peu plus bas (Si votre page est éligible à ce réglage).<br>
                    Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
            </div>
            <div class="grid-2">
                <div>
                    <label for="faq_title">Titre de la page :</label>
                    <input type="text" class="input" id="faq_title" name="faq_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_title') ?>" required>
                </div>
                <div>
                    <label for="faq_description">Description de la page :</label>
                    <input type="text" class="input" id="faq_description" name="faq_description"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_description') ?>" required>
                </div>
            </div>
            <hr>
            <h6>Réglages :</h6>
            <div class="grid-2">
                <div>
                    <label for="faq_page_title">Titre :</label>
                    <input type="text" class="input" id="faq_page_title" name="faq_page_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_page_title') ?>" required>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Afficher l'auteur</p>
                            <input type="checkbox" class="toggle-input" id="faq_display_autor"
                                   name="faq_display_autor" <?= ThemeModel::getInstance()->fetchConfigValue('faq_display_autor') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Formulaire de contact</p>
                            <input type="checkbox" class="toggle-input" id="faq_display_form"
                                   name="faq_display_form" <?= ThemeModel::getInstance()->fetchConfigValue('faq_display_form') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                </div>
                <div>
                    <label for="faq_question_title">Titre section formulaire :</label>
                    <input type="text" class="input" id="faq_question_title" name="faq_question_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_question_title') ?>" required>
                    <label for="faq_answer_title">Titre section réponse :</label>
                    <input type="text" class="input" id="faq_answer_title" name="faq_answer_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_answer_title') ?>" required>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <!---VOTES---->
    <div class="tab-content" id="tab5">
        <?php if (PackageController::isInstalled('Votes')): ?>
            <h6>Indéxation de la page (meta) :</h6>
            <div class="alert alert-warning">
                <h6 class="alert-heading">Bien comprendre l'indéxation</h6>
                <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des
                    affichages sur Discord, Twitter...<br>
                    Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un
                    peu plus bas (Si votre page est éligible à ce réglage).<br>
                    Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
            </div>
            <div class="grid-2">
                <div class="col-12 col-lg-6">
                    <label for="vote_title">Titre de la page :</label>
                    <input type="text" class="input" id="vote_title" name="vote_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('vote_title') ?>" required>
                </div>
                <div class="col-12 col-lg-6">
                    <label for="vote_description">Description de la page :</label>
                    <input type="text" class="input" id="vote_description" name="vote_description"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('vote_description') ?>" required>
                </div>
            </div>
            <hr>
            <h4>Réglages :</h4>
            <div class="grid-3">
                <div>
                    <label for="votes_page_title">Titre :</label>
                    <input type="text" class="input" id="votes_page_title" name="votes_page_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('votes_page_title') ?>" required>
                    <label for="votes_participate_title">Participation :</label>
                    <input type="text" class="input" id="votes_participate_title" name="votes_participate_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('votes_participate_title') ?>"
                           required>
                </div>
                <div>
                    <label for="votes_top_10_title">Top <?= (new VotesConfigModel())->getConfig()->getTopShow() ?> du
                        mois :</label>
                    <input type="text" class="input" id="votes_top_10_title" name="votes_top_10_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('votes_top_10_title') ?>" required>
                    <label
                        for="votes_top_10_global_title">Top <?= (new VotesConfigModel())->getConfig()->getTopShow() ?>
                        Global :</label>
                    <input type="text" class="input" id="votes_top_10_global_title" name="votes_top_10_global_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('votes_top_10_global_title') ?>"
                           required>
                </div>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Top global</p>
                        <input type="checkbox" class="toggle-input" id="votes_display_global"
                               name="votes_display_global" <?= ThemeModel::getInstance()->fetchConfigValue('votes_display_global') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="tab-content" id="tab6">
        <!---WIKI---->
        <?php if (PackageController::isInstalled('Wiki')): ?>
            <h6>Indéxation de la page (meta) :</h6>
            <div class="alert alert-warning">
                <h6 class="alert-heading">Bien comprendre l'indéxation</h6>
                <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des
                    affichages sur Discord, Twitter...<br>
                    Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un
                    peu plus bas (Si votre page est éligible à ce réglage).<br>
                    Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
            </div>
            <div class="grid-2">
                <div class="col-12 col-lg-6">
                    <label for="wiki_title">Titre de la page :</label>
                    <input type="text" class="input" id="wiki_title" name="wiki_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('wiki_title') ?>" required>
                </div>
                <div class="col-12 col-lg-6">
                    <label for="wiki_description">Description de la page :</label>
                    <input type="text" class="input" id="wiki_description" name="wiki_description"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('wiki_description') ?>" required>
                </div>
            </div>
            <hr>
            <h6>Réglages :</h6>
            <div class="grid-3">
                <div>
                    <label for="wiki_page_title">Titre :</label>
                    <input type="text" class="input" id="wiki_page_title" name="wiki_page_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('wiki_page_title') ?>" required>
                    <label for="wiki_menu_title">Menu :</label>
                    <input type="text" class="input" id="wiki_menu_title" name="wiki_menu_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('wiki_menu_title') ?>" required>
                </div>
                <div>
                    <h6>Icônes :</h6>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Afficher les icons des catégorie (menu)</p>
                            <input type="checkbox" class="toggle-input" id="wiki_display_categorie_icon"
                                   name="wiki_display_categorie_icon" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_categorie_icon') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Afficher les icons des articles (menu)</p>
                            <input type="checkbox" class="toggle-input" id="wiki_display_article_categorie_icon"
                                   name="wiki_display_article_categorie_icon" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_article_categorie_icon') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Afficher les icons des articles (articles)</p>
                            <input type="checkbox" class="toggle-input" id="wiki_display_article_icon"
                                   name="wiki_display_article_icon" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_article_icon') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                </div>
                <div>
                    <h6>Autres :</h6>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Afficher la date de création</p>
                            <input type="checkbox" class="toggle-input" id="wiki_display_creation_date"
                                   name="wiki_display_creation_date" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_creation_date') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Afficher la date d'édition</p>
                            <input type="checkbox" class="toggle-input" id="wiki_display_edit_date"
                                   name="wiki_display_edit_date" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_edit_date') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Afficher l'auteur</p>
                            <input type="checkbox" class="toggle-input" id="wiki_display_autor"
                                   name="wiki_display_autor" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_autor') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="tab-content" id="tab7">
        <!---FORUM---->
        <?php if (PackageController::isInstalled('Forum')): ?>

            <h6>Indéxation de la page (meta) :</h6>
            <div class="alert alert-warning">
                <h6 class="alert-heading">Bien comprendre l'indéxation</h6>
                <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des
                    affichages sur Discord, Twitter...<br>
                    Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un
                    peu plus bas (Si votre page est éligible à ce réglage).<br>
                    Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
            </div>
            <div class="grid-2">
                <div>
                    <label for="forum_title">Titre de la page :</label>
                    <input type="text" class="input" id="forum_title" name="forum_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_title') ?>" required>
                </div>
                <div>
                    <label for="forum_description">Description de la page :</label>
                    <input type="text" class="input" id="forum_description" name="forum_description"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_description') ?>" required>
                </div>
            </div>
            <hr>
            <h6>Réglages :</h6>
            <div class="grid-4">
                <div>
                    <h6>Titres :</h6>
                    <label for="forum_sub_forum">Sous-Forums :</label>
                    <input type="text" class="input" id="forum_sub_forum" name="forum_sub_forum"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_sub_forum') ?>" required>
                    <label for="forum_topics">Topics :</label>
                    <input type="text" class="input" id="forum_topics" name="forum_topics"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_topics') ?>" required>
                    <label for="forum_message">Messages :</label>
                    <input type="text" class="input" id="forum_message" name="forum_message"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_message') ?>" required>
                    <label for="forum_last_message">Dernier messages :</label>
                    <input type="text" class="input" id="forum_last_message" name="forum_last_message"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_last_message') ?>" required>
                    <label for="forum_display">Affichages :</label>
                    <input type="text" class="input" id="forum_display" name="forum_display"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_display') ?>" required>
                    <label for="forum_response">Réponses :</label>
                    <input type="text" class="input" id="forum_response" name="forum_response"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_response') ?>" required>

                </div>
                <div>

                    <h6>Topic sans message :</h6>
                    <div class="form-group">
                        <label for="forum_nobody_send_message_text">Texte :</label>
                        <input type="text" class="input" id="forum_nobody_send_message_text"
                               name="forum_nobody_send_message_text"
                               value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_nobody_send_message_text') ?>"
                               required>
                    </div>
                    <div class="form-group">
                        <h6>Image :</h6>
                        <div class="flex justify-center">
                            <img class="w-24"
                                 src="<?= ThemeModel::getInstance()->fetchImageLink('forum_nobody_send_message_img') ?>"
                                 alt="Image introuvable !">
                        </div>
                        <div class="drop-img-area" data-input-name="forum_nobody_send_message_img"></div>
                    </div>
                </div>
                <div>

                    <h6>Bouton :</h6>
                    <div class="form-group">
                        <label for="forum_btn_create_topic">Texte :</label>
                        <input type="text" class="input" id="forum_btn_create_topic" name="forum_btn_create_topic"
                               value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_btn_create_topic') ?>"
                               required>
                    </div>
                    <div class="form-group">
                        <div class="icon-picker" data-id="forum_btn_create_topic_icon"
                             data-name="forum_btn_create_topic_icon" data-label="Icône :"
                             data-placeholder="Sélectionner un icon"
                             data-value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_btn_create_topic_icon') ?>"></div>
                    </div>
                </div>

                <div>
                    <label for="forum_breadcrumb_home">Navigation rapide <small>(accueil)</small> :</label>
                    <input type="text" class="input" id="forum_breadcrumb_home" name="forum_breadcrumb_home"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_breadcrumb_home') ?>" required>
                </div>
            </div>
            <hr>
            <div>
                <label class="toggle">
                    <h6 class="toggle-label">Widgets :</h6>
                    <input type="checkbox" class="toggle-input" id="forum_use_widgets"
                           name="forum_use_widgets" <?= ThemeModel::getInstance()->fetchConfigValue('forum_use_widgets') ? 'checked' : '' ?>>
                    <div class="toggle-slider"></div>
                </label>
            </div>
            <div class="grid-3">
                <div>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Statistiques :</p>
                            <input type="checkbox" class="toggle-input" id="forum_widgets_show_stats"
                                   name="forum_widgets_show_stats" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_stats') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <label for="forum_widgets_title_stats">Titre du widget :</label>
                    <input type="text" class="input" id="forum_widgets_title_stats" name="forum_widgets_title_stats"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_title_stats') ?>"
                           required>
                    <hr>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Nombre de membres :</p>
                            <input type="checkbox" class="toggle-input" id="forum_widgets_show_member"
                                   name="forum_widgets_show_member" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_member') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <input type="text" class="input" id="forum_widgets_text_member" name="forum_widgets_text_member"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_member') ?>"
                           required>
                    <hr>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Nombre de messages</p>
                            <input type="checkbox" class="toggle-input" id="forum_widgets_show_messages"
                                   name="forum_widgets_show_messages" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_messages') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <input type="text" class="input" id="forum_widgets_text_messages" name="forum_widgets_text_messages"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_messages') ?>"
                           required>
                    <hr>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Nombre de topics :</p>
                            <input type="checkbox" class="toggle-input" id="forum_widgets_show_topics"
                                   name="forum_widgets_show_topics" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_topics') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <input type="text" class="input" id="forum_widgets_text_topics" name="forum_widgets_text_topics"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_topics') ?>"
                           required>
                </div>
                <div>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Discord</p>
                            <input type="checkbox" class="toggle-input" id="forum_widgets_show_discord"
                                   name="forum_widgets_show_discord" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_discord') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <label for="forum_widgets_content_id">Id Discord :</label>
                    <input type="text" class="input" id="forum_widgets_content_id" name="forum_widgets_content_id"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_content_id') ?>"
                           required>
                </div>
                <div>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Widget personnalisé</p>
                            <input type="checkbox" class="toggle-input" id="forum_widgets_show_custom"
                                   name="forum_widgets_show_custom" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_custom') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <label for="forum_widgets_custom_title">Titre du widget :</label>
                    <input type="text" class="input" id="forum_widgets_custom_title" name="forum_widgets_custom_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_custom_title') ?>"
                           required>
                    <label for="forum_widgets_custom_text">Contenu :</label>
                    <textarea name="forum_widgets_custom_text" id="forum_widgets_custom_text"
                              class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_custom_text') ?></textarea>

                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="tab-content" id="tab8">
        <!---FOOTER---->
        <h6>Réglages :</h6>
        <div class="grid-2">
            <div>
                <label for="footer_year">Année :</label>
                <input type="text" class="input" id="footer_year" name="footer_year"
                       value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_year') ?>" required>
            </div>
            <div>
                <label class="toggle">
                    <p class="toggle-label">Ouvrir les liens dans un nouvel onglet</p>
                    <input type="checkbox" class="toggle-input" id="footer_open_link_new_tab"
                           name="footer_open_link_new_tab" <?= ThemeModel::getInstance()->fetchConfigValue('footer_open_link_new_tab') ? 'checked' : '' ?>>
                    <div class="toggle-slider"></div>
                </label>
            </div>
        </div>
        <hr>
        <h4>Conditions générales :</h4>
        <div>
            <label class="toggle">
                <p class="toggle-label">Afficher dans le footer</p>
                <input type="checkbox" class="toggle-input" id="footer_active_condition"
                       name="footer_active_condition" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_condition') ? 'checked' : '' ?>>
                <div class="toggle-slider"></div>
            </label>
        </div>
        <div class="grid-3">
            <div>
                <label for="footer_title_condition">Titre de section :</label>
                <input type="text" class="input" id="footer_title_condition" name="footer_title_condition"
                       value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_title_condition') ?>" required>
            </div>
            <div>
                <label for="footer_desc_condition_use">Condition General d'Utilisation :</label>
                <input type="text" class="input" id="footer_desc_condition_use" name="footer_desc_condition_use"
                       value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_desc_condition_use') ?>" required>
            </div>
            <div>
                <label for="footer_desc_condition_sale">Condition General de Vente :</label>
                <input type="text" class="input" id="footer_desc_condition_sale" name="footer_desc_condition_sale"
                       value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_desc_condition_sale') ?>"
                       required>
            </div>
        </div>
        <hr>
        <h4>Icônes :</h4>
        <p>Retrouvez les icônes ici : <a href="https://fontawesome.com/search?o=r&m=free" target="_blank">FontAwesome
                (gratuit)</a></p>
        <div class="grid-4">
            <div>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Icône 1 :</p>
                        <input type="checkbox" class="toggle-input" id="footer_active_facebook"
                               name="footer_active_facebook" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_facebook') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
                <div class="text-center">
                    <i style="font-size : 6rem;"
                       class="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_facebook') ?>"></i>
                </div>
                <label for="footer_link_facebook">Lien :</label>
                <input type="text" class="mt-1 input" id="footer_link_facebook" name="footer_link_facebook"
                       value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_facebook') ?>" required>
                <div class="icon-picker" data-id="footer_icon_facebook" data-name="footer_icon_facebook"
                     data-label="Icône :" data-placeholder="Sélectionner un icon"
                     data-value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_facebook') ?>"></div>
            </div>
            <div>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Icône 2 :</p>
                        <input type="checkbox" class="toggle-input" id="footer_active_twitter"
                               name="footer_active_twitter" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_twitter') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
                <div class="text-center">
                    <i style="font-size : 6rem;"
                       class="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_twitter') ?>"></i>
                </div>
                <label for="footer_link_twitter">Lien :</label>
                <input type="text" class="mt-1 input" id="footer_link_twitter" name="footer_link_twitter"
                       value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_twitter') ?>" required>
                <div class="icon-picker" data-id="footer_icon_twitter" data-name="footer_icon_twitter"
                     data-label="Icône :" data-placeholder="Sélectionner un icon"
                     data-value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_twitter') ?>"></div>
            </div>
            <div>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Icône 3 :</p>
                        <input type="checkbox" class="toggle-input" id="footer_active_instagram"
                               name="footer_active_instagram" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_instagram') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
                <div class="text-center">
                    <i style="font-size : 6rem;"
                       class="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_instagram') ?>"></i>
                </div>
                <label for="footer_link_instagram">Lien :</label>
                <input type="text" class="mt-1 input" id="footer_link_instagram" name="footer_link_instagram"
                       value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_instagram') ?>" required>
                <div class="icon-picker" data-id="footer_icon_instagram" data-name="footer_icon_instagram"
                     data-label="Icône :" data-placeholder="Sélectionner un icon"
                     data-value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_instagram') ?>"></div>
            </div>
            <div>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Icône 4 :</p>
                        <input type="checkbox" class="toggle-input" id="footer_active_discord"
                               name="footer_active_discord" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_discord') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
                <div class="text-center">
                    <i style="font-size : 6rem;"
                       class="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_discord') ?>"></i>
                </div>
                <label for="footer_link_discord">Lien :</label>
                <input type="text" class="mt-1 input" id="footer_link_discord" name="footer_link_discord"
                       value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_discord') ?>" required>
                <div class="icon-picker" data-id="footer_icon_discord" data-name="footer_icon_discord"
                     data-label="Icône :" data-placeholder="Sélectionner un icon"
                     data-value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_discord') ?>"></div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateColor(picker) {
        const r = picker.querySelector('.r').value;
        const g = picker.querySelector('.g').value;
        const b = picker.querySelector('.b').value;
        const a = picker.querySelector('.a').value;

        const colorDisplay = picker.querySelector('.colorDisplay');
        colorDisplay.style.backgroundColor = `rgba(${r}, ${g}, ${b}, ${a})`;
    }

    // Initialise chaque sélecteur de couleur
    document.querySelectorAll('.colorPicker').forEach(picker => {
        picker.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', () => updateColor(picker));
        });
        updateColor(picker); // Initialiser la couleur d'affichage
    });
</script>