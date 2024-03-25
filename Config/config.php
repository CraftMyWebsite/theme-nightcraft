<?php use CMW\Controller\Core\PackageController; use CMW\Controller\Core\ThemeController; use CMW\Utils\Utils;use CMW\Manager\Lang\LangManager;use CMW\Model\Core\ThemeModel;use CMW\Utils\SecurityService;use CMW\Model\Votes\VotesConfigModel;use CMW\Model\Core\CoreModel;

if (PackageController::isInstalled("News")) {
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
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="setting0-tab" data-bs-toggle="tab" href="#setting0" role="tab" aria-selected="true">Global</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="setting1-tab" data-bs-toggle="tab" href="#setting1" role="tab" aria-selected="false">En tête</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="setting2-tab" data-bs-toggle="tab" href="#setting2" role="tab" aria-selected="false">Accueil</a>
    </li>
    <?php if (PackageController::isInstalled("News")): ?>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="setting3-tab" data-bs-toggle="tab" href="#setting3" role="tab" aria-selected="false">News</a>
    </li>
    <?php endif; ?>
    <?php if (PackageController::isInstalled("Faq")): ?>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="setting4-tab" data-bs-toggle="tab" href="#setting4" role="tab" aria-selected="false">F.A.Q</a>
    </li>
    <?php endif; ?>
    <?php if (PackageController::isInstalled("Votes")): ?>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="setting5-tab" data-bs-toggle="tab" href="#setting5" role="tab" aria-selected="false">Votes</a>
    </li>
    <?php endif; ?>
    <?php if (PackageController::isInstalled("Wiki")): ?>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="setting6-tab" data-bs-toggle="tab" href="#setting6" role="tab" aria-selected="false">Wiki</a>
    </li>
    <?php endif; ?>
    <?php if (PackageController::isInstalled("Forum")): ?>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="setting7-tab" data-bs-toggle="tab" href="#setting7" role="tab" aria-selected="false">Forum</a>
        </li>
    <?php endif; ?>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="setting8-tab" data-bs-toggle="tab" href="#setting8" role="tab" aria-selected="false">Footer</a>
    </li>
</ul>

<!--------------->
<!----CONTENT---->
<!--------------->
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active py-2" id="setting0" role="tabpanel" aria-labelledby="setting0-tab">
        <div class="card">
            <div class="card-body">
                <h4>Global</h4>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card-in-card p-4">
                            <h4>Apparences</h4>
                            <div class="row">
                                <div class="col-12 col-lg-6 mt-2">
                                    <div class="d-flex items-center">
                                        <input type="color" id="main_color" name="main_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('main_color') ?>">
                                        <label style="margin-left: 0.5rem" for="main_color">Couleur du site</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-2">
                                    <div class="d-flex items-center">
                                        <input type="color" id="bg_color" name="bg_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('bg_color') ?>">
                                        <label style="margin-left: 0.5rem" for="bg_color">Couleur du fond</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-2">
                                    <div class="d-flex items-center">
                                        <input type="color" id="btn_hover_color" name="btn_hover_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('btn_hover_color') ?>">
                                        <label style="margin-left: 0.5rem" for="btn_hover_color">Couleur lors du survol des boutons</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-2">
                                    <div class="d-flex items-center">
                                        <input type="color" id="btn_text_color" name="btn_text_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('btn_text_color') ?>">
                                        <label style="margin-left: 0.5rem" for="btn_text_color">Couleur des textes des boutons</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-2">
                                    <div class="d-flex items-center">
                                        <input type="color" id="btn_text_hover_color" name="btn_text_hover_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('btn_text_hover_color') ?>">
                                        <label style="margin-left: 0.5rem" for="btn_text_hover_color">Couleur lors du survol des textes des boutons</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-2">
                                    <div class="d-flex items-center">
                                        <input type="color" id="text_color" name="text_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('text_color') ?>">
                                        <label style="margin-left: 0.5rem" for="text_color">Couleur des textes</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-2">
                                    <div class="d-flex items-center">
                                        <input type="color" id="card_color" name="card_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('card_color') ?>">
                                        <label style="margin-left: 0.5rem" for="card_color">Couleur des cartes</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-2">
                                    <div class="d-flex items-center">
                                        <input type="color" id="card_in_card_color" name="card_in_card_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('card_in_card_color') ?>">
                                        <label style="margin-left: 0.5rem" for="card_in_card_color">Couleur des cartes dans les cartes</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-2">
                                    <div class="d-flex items-center">
                                        <input type="color" id="footer_bg_color" name="footer_bg_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_bg_color') ?>">
                                        <label style="margin-left: 0.5rem" for="footer_bg_color">Couleur du footer</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-2">
                                    <div class="d-flex items-center">
                                        <input type="color" id="input_bg_color" name="input_bg_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('input_bg_color') ?>">
                                        <label style="margin-left: 0.5rem" for="input_bg_color">Couleur du fond des champs texte</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-2">
                                    <div class="d-flex items-center">
                                        <input type="color" id="input_text_color" name="input_text_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('input_text_color') ?>">
                                        <label style="margin-left: 0.5rem" for="input_text_color">Couleur des textes des champs texte</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-2">
                                    <div class="d-flex items-center">
                                        <input type="color" id="input_placeholder_color" name="input_placeholder_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('input_placeholder_color') ?>">
                                        <label style="margin-left: 0.5rem" for="input_placeholder_color">Couleur des placeholder des champs texte</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-2">
                                    <div class="d-flex items-center">
                                        <input type="color" id="link_color" name="link_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('link_color') ?>">
                                        <label style="margin-left: 0.5rem" for="link_color">Couleur des liens</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-2">
                                    <div class="d-flex items-center">
                                        <input type="color" id="hover_link_color" name="hover_link_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('hover_link_color') ?>">
                                        <label style="margin-left: 0.5rem" for="hover_link_color">Couleur du survol des liens</label>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div>
                                        <label for="hero_button_link">Police d'écriture :</label>
                                        <select class="form-select" name="main_font" required>
                                            <option value="angkor" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "angkor" ? 'selected' : '' ?>>
                                                Angkor
                                            </option>
                                            <option value="ibmplexsans" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "ibmplexsans" ? 'selected' : '' ?>>
                                                ibmplexsans
                                            </option>
                                            <option value="kanit" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "kanit" ? 'selected' : '' ?>>
                                                kanit
                                            </option>
                                            <option value="lora" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "lora" ? 'selected' : '' ?>>
                                                lora
                                            </option>
                                            <option value="madimione" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "madimione" ? 'selected' : '' ?>>
                                                madimione
                                            </option>
                                            <option value="ojuju" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "ojuju" ? 'selected' : '' ?>>
                                                ojuju
                                            </option>
                                            <option value="opensans" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "opensans" ? 'selected' : '' ?>>
                                                opensans
                                            </option>
                                            <option value="playfairdisplay" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "playfairdisplay" ? 'selected' : '' ?>>
                                                playfairdisplay
                                            </option>
                                            <option value="robotocondensed" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "robotocondensed" ? 'selected' : '' ?>>
                                                robotocondensed
                                            </option>
                                            <option value="robotomono" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "robotomono" ? 'selected' : '' ?>>
                                                robotomono
                                            </option>
                                            <option value="robotoslab" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "robotoslab" ? 'selected' : '' ?>>
                                                robotoslab
                                            </option>
                                            <option value="rubik" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "rubik" ? 'selected' : '' ?>>
                                                rubik
                                            </option>
                                            <option value="ubuntu" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "ubuntu" ? 'selected' : '' ?>>
                                                ubuntu
                                            </option>
                                            <option value="roboto" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "roboto" ? 'selected' : '' ?>>
                                                roboto (par défaut)
                                            </option>
                                            <option value="unbounded" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "unbounded" ? 'selected' : '' ?>>
                                                unbounded
                                            </option>
                                            <option value="montserrat" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "montserrat" ? 'selected' : '' ?>>
                                                montserrat
                                            </option>
                                            <option value="paytone" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "paytone" ? 'selected' : '' ?>>
                                                paytone
                                            </option>
                                            <option value="sora" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "sora" ? 'selected' : '' ?>>
                                                sora
                                            </option>
                                            <option value="outfit" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "outfit" ? 'selected' : '' ?>>
                                                outfit
                                            </option>
                                            <option value="alata" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "alata" ? 'selected' : '' ?>>
                                                alata
                                            </option>
                                            <option value="titan" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "titan" ? 'selected' : '' ?>>
                                                titan
                                            </option>
                                            <option value="pressstart" <?= ThemeModel::getInstance()->fetchConfigValue('main_font') === "pressstart" ? 'selected' : '' ?>>
                                                pressstart
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="card-in-card p-4">
                            <h4>Couleurs (avec transparence)</h4>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="colorPicker">
                                        <h6>Couleur des cadres :</h6>
                                        <div class="d-flex">
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
                                        <h6>Couleur des cadres dans les cardes :</h6>
                                        <div class="d-flex">
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
                                        <h6>Couleur du fond de la navigation :</h6>
                                        <div class="d-flex">
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
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mt-4">
                        <div class="card-in-card p-4">
                            <h4>Accès</h4>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-check form-switch mt-4">
                                        <input class="form-check-input" type="checkbox" value="1" id="header_allow_login_button" name="header_allow_login_button" <?= ThemeModel::getInstance()->fetchConfigValue('header_allow_login_button') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="header_allow_login_button"><h6>Connexion <i data-bs-toggle="tooltip" title="Désactive le bouton de connexion mais vous avez toujours accès à la page" class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-2">
                                    <div class="form-check form-switch mt-4">
                                        <input class="form-check-input" type="checkbox" value="1" name="header_allow_register_button" id="header_allow_register_button" <?= ThemeModel::getInstance()->fetchConfigValue('header_allow_register_button') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="header_allow_register_button"><h6>Inscription <i data-bs-toggle="tooltip" title="Vous pouvez désactiver les inscriptions et afficher un message" class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                                    </div>
                                </div>
                                <h6>Message lorsque l'inscription est désactivée :</h6>
                                <input class="form-control text-center" type="text" id="global_no_register_message" name="global_no_register_message"  value="<?= ThemeModel::getInstance()->fetchConfigValue('global_no_register_message') ?>">
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-lg-6 mt-4">
                        <div class="card-in-card p-4">
                            <h4>Overlay</h4>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-check form-switch mt-4">
                                        <input class="form-check-input" type="checkbox" value="1" id="overlay_everywhere" name="overlay_everywhere" <?= ThemeModel::getInstance()->fetchConfigValue('overlay_everywhere') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="overlay_everywhere">Afficher sur toutes les pages</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-2">
                                    <div class="mt-4">
                                        <label class="form-check-label" for="overlay_blur">Flou de l'image</label>
                                        <input class="form-control" type="text" id="overlay_blur" name="overlay_blur"  value="<?= ThemeModel::getInstance()->fetchConfigValue('overlay_blur') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center ">
                                <img class="w-100" src="<?= ThemeModel::getInstance()->fetchImageLink("overlay_img") ?>" alt="Image introuvable !">
                            </div>
                            <input class="mt-2 form-control form-control-sm" type="file" id="overlay_img" name="overlay_img" accept=".png, .jpg, .jpeg, .webp, .gif">
                            <span>Fichiers autorisés : png, jpg, jpeg, webp, svg, gif</span>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="card-in-card p-4">
                            <h4>Images</h4>
                            <div class="row">
                                <div class="col-12 col-lg-6 mt-2">
                                    <div>
                                        <h6>Page d'erreur / 404 :</h6>
                                        <label for="404_width">Largeur de l'image: <input type="range" id="404_width" name="404_width" value="<?= ThemeModel::getInstance()->fetchConfigValue('404_width') ?>" min="0" max="100"></label><br>
                                        <input class="mt-2 form-control form-control-sm" type="file" id="404_img" name="404_img" accept=".png, .jpg, .jpeg, .webp, .gif">
                                        <span>Fichiers autorisés : png, jpg, jpeg, webp, svg, gif</span>
                                        <div class="text-center ">
                                            <img class="w-50" src="<?= ThemeModel::getInstance()->fetchImageLink("404_img") ?>" alt="Image introuvable !">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-2">
                                    <div>
                                        <h6>Maintenance :</h6>
                                        <label for="maintenance_width">Largeur de l'image: <input type="range" id="maintenance_width" name="maintenance_width" value="<?= ThemeModel::getInstance()->fetchConfigValue('maintenance_width') ?>" min="0" max="100"></label><br>
                                        <input class="mt-2 form-control form-control-sm" type="file" id="maintenance_img" name="maintenance_img" accept=".png, .jpg, .jpeg, .webp, .gif">
                                        <span>Fichiers autorisés : png, jpg, jpeg, webp, svg, gif</span>
                                        <div class="text-center ">
                                            <img class="w-50" src="<?= ThemeModel::getInstance()->fetchImageLink("maintenance_img") ?>" alt="Image introuvable !">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!---EN TÊTE---->
    <div class="tab-pane fade py-2" id="setting1" role="tabpanel" aria-labelledby="setting1-tab">
        <div class="card">
            <div class="card-body">
                <h4>En tête</h4>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card-in-card p-4">
                            <h4>Visuel</h4>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" value="1" id="header_active_logo" name="header_active_logo" <?= ThemeModel::getInstance()->fetchConfigValue('header_active_logo') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="header_active_logo"><h6>Logo : <i data-bs-toggle="tooltip" title="Vous pouvez l'afficher ou le masqué" class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" value="1" name="header_active_title" id="header_active_title" <?= ThemeModel::getInstance()->fetchConfigValue('header_active_title') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="header_active_title"><h6>Titre : <i data-bs-toggle="tooltip" title="Vous pouvez l'afficher ou le masqué" class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center ">
                                <img class="w-50" src="<?= ThemeModel::getInstance()->fetchImageLink("header_img_logo") ?>" alt="Image introuvable !">
                            </div>
                            <input class="mt-2 form-control form-control-sm" type="file" id="header_img_logo" name="header_img_logo" accept=".png, .jpg, .jpeg, .webp, .gif">
                            <span>Fichiers autorisés : png, jpg, jpeg, webp, svg, gif</span>
                            <div class="col-12 mt-4">
                                <label for="logo_width">Largeur de l'image: <input type="range" id="logo_width" name="logo_width" value="<?= ThemeModel::getInstance()->fetchConfigValue('logo_width') ?>" min="0" max="100"></label><br>
                            </div>
                            <div class="col-12 mt-4">
                                <h6>Rejoindre :</h6>
                                        <label for="join_ip">Adresse IP</label>
                                        <input class="form-control" type="text" id="join_ip" name="join_ip"  value="<?= ThemeModel::getInstance()->fetchConfigValue('join_ip') ?>">
                            </div>
                            </div>
                        </div>
                    <div class="col-12 col-lg-6">
                        <div class="card-in-card p-4">
                            <h4>Couleurs</h4>
                            <div class="row">
                                <div class="col-12 col-lg-6 mt-2">
                                    <div class="d-flex items-center">
                                        <input type="color" id="nav_active_color" name="nav_active_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('nav_active_color') ?>">
                                        <label style="margin-left: 0.5rem" for="nav_active_color">Couleur du bouton actif de la navigation</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-2">
                                    <div class="d-flex items-center">
                                        <input type="color" id="nav_hover_color" name="nav_hover_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('nav_hover_color') ?>">
                                        <label style="margin-left: 0.5rem" for="nav_hover_color">Couleur du survol de la navigation</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!---ACCUEIL---->
    <div class="tab-pane fade py-2" id="setting2" role="tabpanel" aria-labelledby="setting2-tab">
        <!--INDEX / META-->
            <div class="card-in-card">
                <div class="card-body">
                    <h4>Indéxation de la page (meta) :</h4>
                    <div class="alert alert-warning">
                        <h4 class="alert-heading">Bien comprendre l'indéxation</h4>
                        <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des affichages sur Discord, Twitter...<br>
                            Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un peu plus bas (Si votre page est éligible à ce réglage).<br>
                            Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
                    </div>
                    <h6>Titre de la page :</h6>
                        <input type="text" class="form-control" id="home_title" name="home_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('home_title') ?>" required>
                </div>
            </div>

        <div class="card-in-card p-4 mt-4">
            <h4>Apparences</h4>
            <div class="row">
                <div class="col-12 col-lg-6 mt-2">
                    <div class="d-flex items-center">
                        <input type="color" id="home_btn_color" name="home_btn_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('home_btn_color') ?>">
                        <label style="margin-left: 0.5rem" for="home_btn_color">Couleur du bouton</label>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-2">
                    <div class="d-flex items-center">
                        <input type="color" id="home_btn_hover_color" name="home_btn_hover_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('home_btn_hover_color') ?>">
                        <label style="margin-left: 0.5rem" for="home_btn_hover_color">Couleur du survol du bouton</label>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-2">
                    <div class="d-flex items-center">
                        <input type="color" id="home_btn_text_color" name="home_btn_text_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('home_btn_text_color') ?>">
                        <label style="margin-left: 0.5rem" for="home_btn_text_color">Couleur du texte du bouton</label>
                    </div>
                </div>
            </div>
        </div>
        <!--NEWS-->
        <?php if (PackageController::isInstalled("News")): ?>
            <div class="card-in-card mt-4">
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" id="news_section_active" name="news_section_active" <?= ThemeModel::getInstance()->fetchConfigValue('news_section_active') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="news_section_active"><h6>Nouveautés : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                    </div>
                    <label>Titre de la section :</label>
                    <input type="text" class="form-control" name="news_section_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('news_section_title') ?>" required>
                    <label>Description de la section :</label>
                    <input type="text" class="form-control" name="news_section_desc" value="<?= ThemeModel::getInstance()->fetchConfigValue('news_section_desc') ?>" required>
                    <div class="form-group">
                        <label>Nombre de news à afficher :</label>
                        <input class="form-control" type="number" id="news_number_display" name="news_number_display" value="<?= ThemeModel::getInstance()->fetchConfigValue('news_number_display') ?>">
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!--JOIN US-->
        <div class="card-in-card mt-4">
            <div class="card-body">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="1" id="join_section_active" name="join_section_active" <?= ThemeModel::getInstance()->fetchConfigValue('join_section_active') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="join_section_active"><h6>Rejoindre : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="text-center ">
                            <img class="w-50" src="<?= ThemeModel::getInstance()->fetchImageLink("join_section_img") ?>" alt="Image introuvable !">
                        </div>
                        <input class="mt-2 form-control form-control-sm" type="file" id="join_section_img" name="join_section_img" accept=".png, .jpg, .jpeg, .webp, .gif">
                        <span>Fichiers autorisés : png, jpg, jpeg, webp, svg, gif</span>
                        <div class="col-12 mt-4">
                            <label for="home_join_width">Largeur de l'image: <input type="range" id="home_join_width" name="home_join_width" value="<?= ThemeModel::getInstance()->fetchConfigValue('home_join_width') ?>" min="0" max="100"></label><br>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <label for="join_section_title">Titre de la section :</label>
                        <input type="text" class="form-control" id="join_section_title" name="join_section_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('join_section_title') ?>" required>
                        <label for="join_section_text">Description de la section :</label>
                        <input type="text" class="form-control" id="join_section_text" name="join_section_text" value="<?= ThemeModel::getInstance()->fetchConfigValue('join_section_text') ?>" required>
                        <label for="join_section_text_button">Texte du bouton :</label>
                        <input type="text" class="form-control" id="join_section_text_button" name="join_section_text_button" value="<?= ThemeModel::getInstance()->fetchConfigValue('join_section_text_button') ?>" required>
                        <label for="join_section_url">Url du bouton :</label>
                        <input type="text" class="form-control" id="join_section_url" name="join_section_url" value="<?= ThemeModel::getInstance()->fetchConfigValue('join_section_url') ?>" required>
                    </div>
                </div>
            </div>
        </div>
            <!--CUSTOM 1-->
            <div class="card-in-card mt-4">
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" id="custom_section_active_1" name="custom_section_active_1" <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_active_1') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="custom_section_active_1"><h6>Personnalisable 1 : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                    </div>
                    <label>Titre de la section :</label>
                    <input type="text" class="form-control" name="custom_section_title_1" value="<?= ThemeModel::getInstance()->fetchConfigValue('custom_section_title_1') ?>" required>
                    <label>Contenu :</label>
                    <textarea name="custom_section_content_1" class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_1') ?></textarea>
                </div>
            </div>
            <!--CUSTOM 2-->
            <div class="card-in-card mt-4">
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" id="custom_section_active_2" name="custom_section_active_2" <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_active_2') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="custom_section_active_2"><h6>Personnalisable 2 : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                    </div>
                    <label>Titre de la section :</label>
                    <input type="text" class="form-control" name="custom_section_title_2" value="<?= ThemeModel::getInstance()->fetchConfigValue('custom_section_title_2') ?>" required>
                    <label>Contenu :</label>
                    <textarea name="custom_section_content_2" class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_2') ?></textarea>
                </div>
            </div>
            <!--CUSTOM 3-->
            <div class="card-in-card mt-4">
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" id="custom_section_active_3" name="custom_section_active_3" <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_active_3') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="custom_section_active_3"><h6>Personnalisable 3 : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                    </div>
                    <label>Titre de la section :</label>
                    <input type="text" class="form-control" name="custom_section_title_3" value="<?= ThemeModel::getInstance()->fetchConfigValue('custom_section_title_3') ?>" required>
                    <label>Contenu :</label>
                    <textarea name="custom_section_content_3" class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_3') ?></textarea>
                </div>
            </div>
        <!--CUSTOM 4-->
        <div class="card-in-card mt-4">
            <div class="card-body">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="1" id="custom_section_active_4" name="custom_section_active_4" <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_active_4') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="custom_section_active_4"><h6>Personnalisable 4 : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                </div>
                <label>Titre de la section :</label>
                <input type="text" class="form-control" name="custom_section_title_4" value="<?= ThemeModel::getInstance()->fetchConfigValue('custom_section_title_4') ?>" required>
                <label>Contenu :</label>
                <textarea name="custom_section_content_4" class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_4') ?></textarea>
            </div>
        </div>
    </div>
    <!---NEWS---->
    <?php if (PackageController::isInstalled("News")): ?>
    <div class="tab-pane fade py-2" id="setting3" role="tabpanel" aria-labelledby="setting3-tab">
        <div class="card-in-card">
            <div class="card-body">
                <h4>Indéxation de la page (meta) :</h4>
                <div class="alert alert-warning">
                    <h4 class="alert-heading">Bien comprendre l'indéxation</h4>
                    <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des affichages sur Discord, Twitter...<br>
                        Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un peu plus bas (Si votre page est éligible à ce réglage).<br>
                        Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h6>Titre de la page :</h6>
                        <input type="text" class="form-control" id="news_title" name="news_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('news_title') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <h6>Description de la page :</h6>
                    <input type="text" class="form-control" id="news_description" name="news_description" value="<?= ThemeModel::getInstance()->fetchConfigValue('news_description') ?>" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-in-card mt-4">
            <div class="card-body">
                <h4>Réglages :</h4>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h6>Titre :</h6>
                        <input type="text" class="form-control" id="news_page_title" name="news_page_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('news_page_title') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <h6>Nombre de news à afficher:</h6>
                        <input class="form-control" type="number" id="news_page_number_display" name="news_page_number_display" value="<?= ThemeModel::getInstance()->fetchConfigValue('news_page_number_display') ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!---FAQ---->
    <?php if (PackageController::isInstalled("Faq")): ?>
    <div class="tab-pane fade py-2" id="setting4" role="tabpanel" aria-labelledby="setting4-tab">
        <div class="card-in-card">
            <div class="card-body">
                <h4>Indéxation de la page (meta) :</h4>
                <div class="alert alert-warning">
                    <h4 class="alert-heading">Bien comprendre l'indéxation</h4>
                    <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des affichages sur Discord, Twitter...<br>
                        Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un peu plus bas (Si votre page est éligible à ce réglage).<br>
                        Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h6>Titre de la page :</h6>
                        <input type="text" class="form-control" id="faq_title" name="faq_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_title') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <h6>Description de la page :</h6>
                        <input type="text" class="form-control" id="faq_description" name="faq_description" value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_description') ?>" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-in-card mt-4">
            <div class="card-body">
                <h4>Réglages :</h4>
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <h6>Titre :</h6>
                            <input type="text" class="form-control" id="faq_page_title" name="faq_page_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_page_title') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <h6>Titre section formulaire :</h6>
                            <input type="text" class="form-control" id="faq_question_title" name="faq_question_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_question_title') ?>" required>
                            <h6 class="mt-2">Titre section réponse :</h6>
                            <input type="text" class="form-control" id="faq_answer_title" name="faq_answer_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_answer_title') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="faq_display_autor" name="faq_display_autor" <?= ThemeModel::getInstance()->fetchConfigValue('faq_display_autor') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="faq_display_autor"><h6>Afficher l'auteur</h6></label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="faq_display_form" name="faq_display_form" <?= ThemeModel::getInstance()->fetchConfigValue('faq_display_form') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="faq_display_form"><h6>Formulaire de contact</h6></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!---VOTES---->
    <?php if (PackageController::isInstalled("Votes")): ?>
    <div class="tab-pane fade py-2" id="setting5" role="tabpanel" aria-labelledby="setting5-tab">
        <div class="card-in-card">
            <div class="card-body">
                <h4>Indéxation de la page (meta) :</h4>
                <div class="alert alert-warning">
                    <h4 class="alert-heading">Bien comprendre l'indéxation</h4>
                    <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des affichages sur Discord, Twitter...<br>
                        Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un peu plus bas (Si votre page est éligible à ce réglage).<br>
                        Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h6>Titre de la page :</h6>
                        <input type="text" class="form-control" id="vote_title" name="vote_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('vote_title') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <h6>Description de la page :</h6>
                        <input type="text" class="form-control" id="vote_description" name="vote_description" value="<?= ThemeModel::getInstance()->fetchConfigValue('vote_description') ?>" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-in-card mt-4">
            <div class="card-body">
                <h4>Réglages :</h4>
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <h6>Titre :</h6>
                            <input type="text" class="form-control" id="votes_page_title" name="votes_page_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('votes_page_title') ?>" required>
                            <h6 class="mt-2">Participation :</h6>
                            <input type="text" class="form-control" id="votes_participate_title" name="votes_participate_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('votes_participate_title') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <h6>Top <?= (new VotesConfigModel())->getConfig()->getTopShow()?> du mois :</h6>
                            <input type="text" class="form-control" id="votes_top_10_title" name="votes_top_10_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('votes_top_10_title') ?>" required>
                            <h6 class="mt-2">Top <?= (new VotesConfigModel())->getConfig()->getTopShow()?> Global :</h6>
                            <input type="text" class="form-control" id="votes_top_10_global_title" name="votes_top_10_global_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('votes_top_10_global_title') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="votes_display_global" name="votes_display_global" <?= ThemeModel::getInstance()->fetchConfigValue('votes_display_global') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="votes_display_global"><h6>Top global</h6></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!---WIKI---->
    <?php if (PackageController::isInstalled("Wiki")): ?>
    <div class="tab-pane fade py-2" id="setting6" role="tabpanel" aria-labelledby="setting6-tab">
        <div class="card-in-card">
            <div class="card-body">
                <h4>Indéxation de la page (meta) :</h4>
                <div class="alert alert-warning">
                    <h4 class="alert-heading">Bien comprendre l'indéxation</h4>
                    <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des affichages sur Discord, Twitter...<br>
                        Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un peu plus bas (Si votre page est éligible à ce réglage).<br>
                        Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h6>Titre de la page :</h6>
                        <input type="text" class="form-control" id="wiki_title" name="wiki_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('wiki_title') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <h6>Description de la page :</h6>
                        <input type="text" class="form-control" id="wiki_description" name="wiki_description" value="<?= ThemeModel::getInstance()->fetchConfigValue('wiki_description') ?>" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-in-card mt-4">
            <div class="card-body">
                <h4>Réglages :</h4>
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <h6>Titre :</h6>
                            <input type="text" class="form-control" id="wiki_page_title" name="wiki_page_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('wiki_page_title') ?>" required>
                            <h6 class="mt-2">Menu :</h6>
                            <input type="text" class="form-control" id="wiki_menu_title" name="wiki_menu_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('wiki_menu_title') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <h6>Icônes :</h6>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="wiki_display_categorie_icon" name="wiki_display_categorie_icon" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_categorie_icon') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="wiki_display_categorie_icon"><h6>Afficher les icons des catégorie (menu)</h6></label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="wiki_display_article_categorie_icon" name="wiki_display_article_categorie_icon" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_article_categorie_icon') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="wiki_display_article_categorie_icon"><h6>Afficher les icons des articles (menu)</h6></label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="wiki_display_article_icon" name="wiki_display_article_icon" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_article_icon') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="wiki_display_article_icon"><h6>Afficher les icons des articles (articles)</h6></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <h6>Autres :</h6>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="wiki_display_creation_date" name="wiki_display_creation_date" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_creation_date') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="wiki_display_creation_date"><h6>Afficher la date de création</h6></label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="wiki_display_edit_date" name="wiki_display_edit_date" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_edit_date') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="wiki_display_edit_date"><h6>Afficher la date d'édition</h6></label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="wiki_display_autor" name="wiki_display_autor" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_autor') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="wiki_display_autor"><h6>Afficher l'auteur</h6></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!---FORUM---->
    <?php if (PackageController::isInstalled("Forum")): ?>
        <div class="tab-pane fade py-2" id="setting7" role="tabpanel" aria-labelledby="setting7-tab">
            <div class="card-in-card">
                <div class="card-body">
                    <h4>Indéxation de la page (meta) :</h4>
                    <div class="alert alert-warning">
                        <h4 class="alert-heading">Bien comprendre l'indéxation</h4>
                        <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des affichages sur Discord, Twitter...<br>
                            Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un peu plus bas (Si votre page est éligible à ce réglage).<br>
                            Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <h6>Titre de la page :</h6>
                            <input type="text" class="form-control" id="forum_title" name="forum_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_title') ?>" required>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h6>Description de la page :</h6>
                            <input type="text" class="form-control" id="forum_description" name="forum_description" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_description') ?>" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-in-card mt-4">
                <div class="card-body">
                    <h4>Réglages :</h4>
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="card me-2 p-3">
                                <div class="col-12 col-lg-6 mt-2">
                                    <div class="d-flex items-center">
                                        <input type="color" id="forum_hover_color" name="forum_hover_color" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_hover_color') ?>">
                                        <label style="margin-left: 0.5rem" for="forum_hover_color">Couleur lors du survol</label>
                                    </div>
                                </div>
                                <h6>Titres :</h6>
                                <h6>Sous-Forums :</h6>
                                <input type="text" class="form-control" id="forum_sub_forum" name="forum_sub_forum" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_sub_forum') ?>" required>
                                <h6>Topics :</h6>
                                <input type="text" class="form-control" id="forum_topics" name="forum_topics" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_topics') ?>" required>
                                <h6>Messages :</h6>
                                <input type="text" class="form-control" id="forum_message" name="forum_message" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_message') ?>" required>
                                <h6>Dernier messages :</h6>
                                <input type="text" class="form-control" id="forum_last_message" name="forum_last_message" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_last_message') ?>" required>
                                <h6>Affichages :</h6>
                                <input type="text" class="form-control" id="forum_display" name="forum_display" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_display') ?>" required>
                                <h6>Réponses :</h6>
                                <input type="text" class="form-control" id="forum_response" name="forum_response" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_response') ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card me-2 p-3">
                                <h6>Topic sans message :</h6>
                                <div class="form-group">
                                    <h6>Texte :</h6>
                                    <input type="text" class="form-control" id="forum_nobody_send_message_text" name="forum_nobody_send_message_text" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_nobody_send_message_text') ?>" required>
                                </div>
                                <div class="form-group">
                                    <h6>Image :</h6>
                                    <div class="text-center ">
                                        <img class="w-25" src="<?= ThemeModel::getInstance()->fetchImageLink("forum_nobody_send_message_img") ?>" alt="Image introuvable !">
                                    </div>
                                    <input class="mt-2 form-control form-control-sm" type="file" id="forum_nobody_send_message_img" name="forum_nobody_send_message_img" accept=".png, .jpg, .jpeg, .webp, .gif">
                                    <span>Fichiers autorisés : png, jpg, jpeg, webp, svg, gif</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card me-2 p-3">
                                <h6>Bouton :</h6>
                                <div class="form-group">
                                    <h6>Texte :</h6>
                                    <input type="text" class="form-control" id="forum_btn_create_topic" name="forum_btn_create_topic" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_btn_create_topic') ?>" required>
                                </div>
                                <div class="form-group">
                                    <h6>Icône : ( <i class="<?= ThemeModel::getInstance()->fetchConfigValue('forum_btn_create_topic_icon') ?>"></i> )</h6>
                                    <input type="text" class="form-control" id="forum_btn_create_topic_icon" name="forum_btn_create_topic_icon" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_btn_create_topic_icon') ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="card me-2 p-3">
                                <h6>Navigation rapide <small>(accueil)</small> :</h6>
                                <input type="text" class="form-control" id="forum_breadcrumb_home" name="forum_breadcrumb_home" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_breadcrumb_home') ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-in-card mt-4">
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" id="forum_use_widgets" name="forum_use_widgets" <?= ThemeModel::getInstance()->fetchConfigValue('forum_use_widgets') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="forum_use_widgets"><h4>Widgets :</h4></label>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="card me-2 p-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" value="1" id="forum_widgets_show_stats" name="forum_widgets_show_stats" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_stats') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="forum_widgets_show_stats"><h6>Statistiques :</h6></label>
                                </div>
                                <h6>Titre du widget :</h6>
                                <input type="text" class="form-control" id="forum_widgets_title_stats" name="forum_widgets_title_stats" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_title_stats') ?>" required>
                                <hr>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" value="1" id="forum_widgets_show_member" name="forum_widgets_show_member" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_member') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="forum_widgets_show_member"><h6>Nombre de membres :</h6></label>
                                </div>
                                <input type="text" class="form-control" id="forum_widgets_text_member" name="forum_widgets_text_member" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_member') ?>" required>
                                <hr>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" value="1" id="forum_widgets_show_messages" name="forum_widgets_show_messages" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_messages') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="forum_widgets_show_messages"><h6>Nombre de messages</h6></label>
                                </div>
                                <input type="text" class="form-control" id="forum_widgets_text_messages" name="forum_widgets_text_messages" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_messages') ?>" required>
                                <hr>
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="forum_widgets_show_topics"><h6>Nombre de topics :</h6></label>
                                    <input class="form-check-input" type="checkbox" value="1" id="forum_widgets_show_topics" name="forum_widgets_show_topics" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_topics') ? 'checked' : '' ?>>
                                </div>
                                <input type="text" class="form-control" id="forum_widgets_text_topics" name="forum_widgets_text_topics" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_topics') ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card me-2 p-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" value="1" id="forum_widgets_show_discord" name="forum_widgets_show_discord" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_discord') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="forum_widgets_show_discord"><h6>Discord</h6></label>
                                </div>
                                <h6>Id Discord :</h6>
                                <input type="text" class="form-control" id="forum_widgets_content_id" name="forum_widgets_content_id" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_content_id') ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card me-2 p-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" value="1" id="forum_widgets_show_custom" name="forum_widgets_show_custom" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_custom') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="forum_widgets_show_custom"><h6>Widget personnalisé</h6></label>
                                </div>
                                <h6>Titre du widget :</h6>
                                <input type="text" class="form-control" id="forum_widgets_custom_title" name="forum_widgets_custom_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_custom_title') ?>" required>
                                <h6>Contenu :</h6>
                                <textarea name="forum_widgets_custom_text" class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_custom_text') ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    <?php endif; ?>
    <!---FOOTER---->
    <div class="tab-pane fade py-2" id="setting8" role="tabpanel" aria-labelledby="setting8-tab">
        <div class="card-in-card">
            <div class="card-body">
                <h4>Réglages :</h4>
                <div class="row">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input" type="checkbox" value="1" id="footer_use_logo" name="footer_use_logo" <?= ThemeModel::getInstance()->fetchConfigValue('footer_use_logo') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="footer_use_logo"><h6>Afficher le logo</h6></label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-2">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input" type="checkbox" value="1" name="footer_use_title" id="footer_use_title" <?= ThemeModel::getInstance()->fetchConfigValue('footer_use_title') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="footer_use_title"><h6>Afficher le nom</h6></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" id="footer_open_link_new_tab" name="footer_open_link_new_tab" <?= ThemeModel::getInstance()->fetchConfigValue('footer_open_link_new_tab') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="footer_open_link_new_tab"><h6>Ouvrir les liens dans un nouvel onglet</h6></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-in-card mt-4">
            <div class="card-body">
                <h4>Conditions générales :</h4>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h6>Titre de section :</h6>
                        <input type="text" class="form-control" id="footer_title_condition" name="footer_title_condition" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_title_condition') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" id="footer_active_condition" name="footer_active_condition" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_condition') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="footer_active_condition"><h6>Afficher dans le footer</h6></label>
                            </div>
                    </div>
                    <div class="col-12 col-lg-6 mt-2">
                        <h6>Condition General d'Utilisation :</h6>
                        <input type="text" class="form-control" id="footer_desc_condition_use" name="footer_desc_condition_use" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_desc_condition_use') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6 mt-2">
                        <h6>Condition General de Vente :</h6>
                        <input type="text" class="form-control" id="footer_desc_condition_sale" name="footer_desc_condition_sale" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_desc_condition_sale') ?>" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-in-card mt-4">
            <div class="card-body">
                <h4>Icônes :</h4>
                <p>Retrouvez les icônes ici : <a href="https://fontawesome.com/search?o=r&m=free" target="_blank">FontAwesome (gratuit)</a></p>
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="card me-2 p-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="footer_active_facebook" name="footer_active_facebook" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_facebook') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="footer_active_facebook"><h6>Icône 1 :</h6></label>
                            </div>
                            <div class="text-center">
                                <i style="font-size : 6rem;" class="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_facebook') ?>"></i>
                            </div>
                            <h6 class="mt-2">Lien :</h6>
                            <input type="text" class="mt-1 form-control" id="footer_link_facebook" name="footer_link_facebook" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_facebook') ?>" required>
                            <h6 class="mt-2">Icône :</h6>
                            <input type="text" class="form-control" id="footer_icon_facebook" name="footer_icon_facebook" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_facebook') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card me-2 p-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="footer_active_twitter" name="footer_active_twitter" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_twitter') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="footer_active_twitter"><h6>Icône 2 :</h6></label>
                            </div>
                            <div class="text-center">
                                <i style="font-size : 6rem;" class="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_twitter') ?>"></i>
                            </div>
                            <h6 class="mt-2">Lien :</h6>
                            <input type="text" class="mt-1 form-control" id="footer_link_twitter" name="footer_link_twitter" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_twitter') ?>" required>
                            <h6 class="mt-2">Icône :</h6>
                            <input type="text" class="form-control" id="footer_icon_twitter" name="footer_icon_twitter" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_twitter') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card me-2 p-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="footer_active_instagram" name="footer_active_instagram" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_instagram') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="footer_active_instagram"><h6>Icône 3 :</h6></label>
                            </div>
                            <div class="text-center">
                                <i style="font-size : 6rem;" class="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_instagram') ?>"></i>
                            </div>
                            <h6 class="mt-2">Lien :</h6>
                            <input type="text" class="mt-1 form-control" id="footer_link_instagram" name="footer_link_instagram" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_instagram') ?>" required>
                            <h6 class="mt-2">Icône :</h6>
                            <input type="text" class="form-control" id="footer_icon_instagram" name="footer_icon_instagram" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_instagram') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card me-2 p-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="footer_active_discord" name="footer_active_discord" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_discord') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="footer_active_discord"><h6>Icône 4 :</h6></label>
                            </div>
                            <div class="text-center">
                                <i style="font-size : 6rem;" class="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_discord') ?>"></i>
                            </div>
                            <h6 class="mt-2">Lien :</h6>
                            <input type="text" class="mt-1 form-control" id="footer_link_discord" name="footer_link_discord" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_discord') ?>" required>
                            <h6 class="mt-2">Icône :</h6>
                            <input type="text" class="form-control" id="footer_icon_discord" name="footer_icon_discord" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_discord') ?>" required>
                        </div>
                    </div>
                </div>
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