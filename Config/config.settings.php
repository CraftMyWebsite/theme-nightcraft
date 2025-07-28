<?php
use CMW\Manager\Theme\Editor\Entities\EditorMenu;
use CMW\Manager\Theme\Editor\Entities\EditorRangeOptions;
use CMW\Manager\Theme\Editor\Entities\EditorSelectOptions;
use CMW\Manager\Theme\Editor\Entities\EditorType;
use CMW\Manager\Theme\Editor\Entities\EditorValue;

return [
    new EditorMenu(
        title: 'En tête',
        key: 'header',
        scope: null,
        requiredPackage: null,
        values: [
            new EditorValue(
                title: 'Afficher les titre',
                themeKey: 'header_active_title',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Afficher le logo',
                themeKey: 'header_active_logo',

                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Logo',
                themeKey: 'header_img_logo',
                defaultValue: 'Config/Default/Img/logo.png',
                type: EditorType::IMAGE
            ),
            new EditorValue(
                title: 'Taille du logo',
                themeKey: 'site_image_width',
                defaultValue: '350',
                type: EditorType::RANGE,
                rangeOptions: [
                    new EditorRangeOptions(min: 0, max: 500,step: 1,suffix: 'px')
                ]
            ),
            new EditorValue(
                title: 'IP du serveur',
                themeKey: 'join_ip',
                defaultValue: 'play.nightcraft.fr',
                type: EditorType::TEXT
            ),
            new EditorValue(
                title: 'Autoriser les enregistrement',
                themeKey: 'header_allow_register_button',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Autoriser les connexions',
                themeKey: 'header_allow_login_button',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Message d\'enregistrement interdit',
                themeKey: 'global_no_register_message',
                defaultValue: 'Nous somme désolé mais les inscriptions sont pour le moment désactiver.',
                type: EditorType::TEXT
            ),
        ]
    ),
    new EditorMenu(
        title: 'Couleurs & Typo',
        key: 'global',
        scope: null,
        requiredPackage: null,
        values: [
            new EditorValue(
                title: 'Police d\'écriture',
                themeKey: 'main_font',
                defaultValue: 'font-kanit',
                type: EditorType::SELECT,
                selectOptions: [
                    new EditorSelectOptions(value: 'font-angkor', text: 'Angkor'),
                    new EditorSelectOptions(value: 'font-ibmplexsans', text: 'ibmplexsans'),
                    new EditorSelectOptions(value: 'font-kanit', text: 'kanit'),
                    new EditorSelectOptions(value: 'font-lora', text: 'lora'),
                    new EditorSelectOptions(value: 'font-madimione', text: 'madimione'),
                    new EditorSelectOptions(value: 'font-ojuju', text: 'ojuju'),
                    new EditorSelectOptions(value: 'font-opensans', text: 'opensans'),
                    new EditorSelectOptions(value: 'font-playfairdisplay', text: 'playfairdisplay'),
                    new EditorSelectOptions(value: 'font-robotocondensed', text: 'robotocondensed'),
                    new EditorSelectOptions(value: 'font-robotomono', text: 'robotomono'),
                    new EditorSelectOptions(value: 'font-robotoslab', text: 'robotoslab'),
                    new EditorSelectOptions(value: 'font-rubik', text: 'rubik'),
                    new EditorSelectOptions(value: 'font-ubuntu', text: 'ubuntu'),
                    new EditorSelectOptions(value: 'font-roboto', text: 'roboto'),
                    new EditorSelectOptions(value: 'font-unbounded', text: 'unbounded'),
                    new EditorSelectOptions(value: 'font-montserrat', text: 'montserrat'),
                    new EditorSelectOptions(value: 'font-paytone', text: 'paytone'),
                    new EditorSelectOptions(value: 'font-sora', text: 'sora'),
                    new EditorSelectOptions(value: 'font-outfit', text: 'outfit'),
                    new EditorSelectOptions(value: 'font-alata', text: 'alata'),
                    new EditorSelectOptions(value: 'font-titan', text: 'titan'),
                    new EditorSelectOptions(value: 'font-pressstart', text: 'pressstart'),
                ]
            ),
            new EditorValue(
                title: 'Afficher l\'overlay partout',
                themeKey: 'overlay_everywhere',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Flou de l\'overlay',
                themeKey: 'overlay_blur',
                defaultValue: '5',
                type: EditorType::RANGE,
                rangeOptions: [
                    new EditorRangeOptions(min: 0, max: 20,step: 1,suffix: 'px')
                ]
            ),
            new EditorValue(
                title: 'Image de l\'overlay',
                themeKey: 'overlay_img',
                defaultValue: 'Config/Default/Img/bg.webp',
                type: EditorType::IMAGE
            ),
            new EditorValue(
                title: 'Couleur principale',
                themeKey: 'main_color',
                defaultValue: '#F59E0B',
                type: EditorType::COLOR,
            ),
            new EditorValue(
                title: 'Couleur du fond',
                themeKey: 'bg_color',
                defaultValue: '#21212d',
                type: EditorType::COLOR,
            ),
            new EditorValue(
                title: 'Couleur des bouton (hover)',
                themeKey: 'btn_hover_color',
                defaultValue: '#f5b30b',
                type: EditorType::COLOR,
            ),
            new EditorValue(
                title: 'Couleur des textes des boutons',
                themeKey: 'btn_text_color',
                defaultValue: '#ffffff',
                type: EditorType::COLOR,
            ),
            new EditorValue(
                title: 'Couleur des textes des boutons (hover)',
                themeKey: 'btn_text_hover_color',
                defaultValue: '#fff7f7',
                type: EditorType::COLOR,
            ),
            new EditorValue(
                title: 'Couleur navigation (active)',
                themeKey: 'nav_active_color',
                defaultValue: '#10B981',
                type: EditorType::COLOR,
            ),
            new EditorValue(
                title: 'Couleur navigation (hover)',
                themeKey: 'nav_hover_color',
                defaultValue: '#F59E0B',
                type: EditorType::COLOR,
            ),
            new EditorValue(
                title: 'Couleur des textes',
                themeKey: 'text_color',
                defaultValue: '#e3e3e3',
                type: EditorType::COLOR,
            ),
            new EditorValue(
                title: 'Fond du footer',
                themeKey: 'footer_bg_color',
                defaultValue: '#1a1a23',
                type: EditorType::COLOR,
            ),
            new EditorValue(
                title: 'Couleur du fond des champs textes',
                themeKey: 'input_bg_color',
                defaultValue: '#474a56',
                type: EditorType::COLOR,
            ),
            new EditorValue(
                title: 'Couleur du texte des champs textes',
                themeKey: 'input_text_color',
                defaultValue: '#ffffff',
                type: EditorType::COLOR,
            ),
            new EditorValue(
                title: 'Couleur des placeholder des champs textes',
                themeKey: 'input_placeholder_color',
                defaultValue: '#8f8f96',
                type: EditorType::COLOR,
            ),
            new EditorValue(
                title: 'Couleur des urls',
                themeKey: 'link_color',
                defaultValue: '#6060be',
                type: EditorType::COLOR,
            ),
            new EditorValue(
                title: 'Couleur des urls (hover)',
                themeKey: 'hover_link_color',
                defaultValue: '#ffffff',
                type: EditorType::COLOR,
            ),
            new EditorValue(
                title: 'Couleur de bouton',
                themeKey: 'home_btn_color',
                defaultValue: '#0bb7f5',
                type: EditorType::COLOR,
            ),
            new EditorValue(
                title: 'Couleur des bouton (hover)',
                themeKey: 'home_btn_hover_color',
                defaultValue: '#1cc1ff',
                type: EditorType::COLOR,
            ),
            new EditorValue(
                title: 'CARTE INTERNE RGBA',
                themeKey: 'card_color',
                defaultValue: 'rgba(35, 40, 49, 0.76)',
                type: EditorType::CSS,
            ),
            new EditorValue(
                title: 'CARTE INTERNE RGBA',
                themeKey: 'card_color_inner',
                defaultValue: 'rgba(28, 31, 35, 0.76)',
                type: EditorType::CSS,
            ),
            new EditorValue(
                title: 'NAVIGATION RGBA',
                themeKey: 'nav_bg_color',
                defaultValue: 'rgba(35, 40, 49, 0.76)',
                type: EditorType::CSS,
            ),
        ]
    ),
    new EditorMenu(
        title: '404 & Maintenance',
        key: 'maint',
        scope: null,
        requiredPackage: null,
        values: [
            new EditorValue(
                title: 'Image de maintenance',
                themeKey: 'maintenance_img',
                defaultValue: 'Config/Default/Img/maintenance.png',
                type: EditorType::IMAGE
            ),
            new EditorValue(
                title: 'Taille image maintenance',
                themeKey: 'maintenance_width',
                defaultValue: '60',
                type: EditorType::RANGE,
                rangeOptions: [
                    new EditorRangeOptions(min: 0, max: 512,step: 1)
                ]
            ),
            new EditorValue(
                title: 'Image page 404',
                themeKey: '404_img',
                defaultValue: 'Config/Default/Img/404.png',
                type: EditorType::IMAGE
            ),
            new EditorValue(
                title: 'Taille image 404',
                themeKey: '404_width',
                defaultValue: '50',
                type: EditorType::RANGE,
                rangeOptions: [
                    new EditorRangeOptions(min: 0, max: 512,step: 1)
                ]
            ),
        ]
    ),
    new EditorMenu(
        title: 'Accueil - News',
        key: 'home-news',
        scope: null,
        requiredPackage: 'news',
        values: [
            new EditorValue(
                title: 'Activer la section',
                themeKey: 'news_section_active',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Titre de section',
                themeKey: 'news_section_title',
                defaultValue: 'Derniers articles',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Description de section',
                themeKey: 'news_section_desc',
                defaultValue: 'Retrouvez ci-dessous les dernières actualités et mises à jour !',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Nombre de news à afficher',
                themeKey: 'news_number_display',
                defaultValue: '3',
                type: EditorType::NUMBER,
            ),
        ]
    ),
    new EditorMenu(
        title: 'Accueil - Rejoindre',
        key: 'home-join',
        scope: null,
        requiredPackage: null,
        values: [
            new EditorValue(
                title: 'Activer',
                themeKey: 'join_section_active',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Titre de section',
                themeKey: 'join_section_title',
                defaultValue: 'Rejoingnez NightCraft !',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Description de section',
                themeKey: 'join_section_text',
                defaultValue: 'Plongez dans Nightcraft, un monde Minecraft unique où l\'aventure et la créativité n\'ont pas de limites! Rejoignez-nous pour des constructions époustouflantes et des quêtes inoubliables. ✨',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Image',
                themeKey: 'join_section_img',
                defaultValue: 'Config/Default/Img/discord.png',
                type: EditorType::IMAGE
            ),
            new EditorValue(
                title: 'Taille de l\'image',
                themeKey: 'home_join_width',
                defaultValue: '255',
                type: EditorType::RANGE,
                rangeOptions: [
                    new EditorRangeOptions(min: 0, max: 500,step: 1,suffix: 'px')
                ]
            ),
            new EditorValue(
                title: 'Texte du bouton',
                themeKey: 'join_section_text_button',
                defaultValue: 'Rejoindre le discord',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Url du bouton',
                themeKey: 'join_section_url',
                defaultValue: '#',
                type: EditorType::TEXT,
            ),
        ]
    ),
    new EditorMenu(
        title: 'Accueil - Custom',
        key: 'home-custom',
        scope: null,
        requiredPackage: null,
        values: [
            new EditorValue(
                title: 'Activer la section 1',
                themeKey: 'custom_section_active_1',
                defaultValue: '0',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Titre de la section 1',
                themeKey: 'custom_section_title_1',
                defaultValue: 'Titre personnalisé 1',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Contenue de la section 1',
                themeKey: 'custom_section_content_1',
                defaultValue: '<h1>Personnalise moi</h1> <br> <p>Comme du code HTML !</p>',
                type: EditorType::HTML,
            ),
            new EditorValue(
                title: 'Activer la section 2',
                themeKey: 'custom_section_active_2',
                defaultValue: '0',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Titre de la section 2',
                themeKey: 'custom_section_title_2',
                defaultValue: 'Titre personnalisé 2',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Contenue de la section 2',
                themeKey: 'custom_section_content_2',
                defaultValue: '<h1>Personnalise moi</h1> <br> <p>Comme du code HTML !</p>',
                type: EditorType::HTML,
            ),
            new EditorValue(
                title: 'Activer la section 3',
                themeKey: 'custom_section_active_3',
                defaultValue: '0',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Titre de la section 3',
                themeKey: 'custom_section_title_3',
                defaultValue: 'Titre personnalisé 3',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Contenue de la section 3',
                themeKey: 'custom_section_content_3',
                defaultValue: '<h1>Personnalise moi</h1> <br> <p>Comme du code HTML !</p>',
                type: EditorType::HTML,
            ),
            new EditorValue(
                title: 'Activer la section 4',
                themeKey: 'custom_section_active_4',
                defaultValue: '0',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Titre de la section 4',
                themeKey: 'custom_section_title_4',
                defaultValue: 'Titre personnalisé 4',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Contenue de la section 4',
                themeKey: 'custom_section_content_4',
                defaultValue: '<h1>Personnalise moi</h1> <br> <p>Comme du code HTML !</p>',
                type: EditorType::HTML,
            ),
        ]
    ),
    new EditorMenu(
        title: 'Nouveautés',
        key: 'news',
        scope: 'news',
        requiredPackage: 'news',
        values: [
            new EditorValue(
                title: 'Titre de la page',
                themeKey: 'news_page_title',
                defaultValue: 'Les dernières actus !',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'News à afficher',
                themeKey: 'news_page_number_display',
                defaultValue: '20',
                type: EditorType::NUMBER,
            ),
        ]
    ),
    new EditorMenu(
        title: 'F.A.Q',
        key: 'faq',
        scope: 'faq',
        requiredPackage: 'faq',
        values: [
            new EditorValue(
                title: 'Titre de la page',
                themeKey: 'faq_page_title',
                defaultValue: 'F.A.Q',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Titre Questions',
                themeKey: 'faq_question_title',
                defaultValue: 'Une question ?',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Titre Réponses',
                themeKey: 'faq_answer_title',
                defaultValue: 'Des réponses',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Afficher l\'auteur',
                themeKey: 'faq_display_autor',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Afficher le formulaire de contact',
                themeKey: 'faq_display_form',
                defaultValue: '0',
                type: EditorType::BOOLEAN,
            ),
        ]
    ),
    new EditorMenu(
        title: 'Votes',
        key: 'votes',
        scope: 'vote',
        requiredPackage: 'votes',
        values: [
            new EditorValue(
                title: 'Titre de la page',
                themeKey: 'votes_page_title',
                defaultValue: 'Voter',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Titre Participer',
                themeKey: 'votes_participate_title',
                defaultValue: 'Participer',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Afficher les votes globaux',
                themeKey: 'votes_display_global',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
        ]
    ),
    new EditorMenu(
        title: 'Wiki',
        key: 'wiki',
        scope: 'wiki',
        requiredPackage: 'wiki',
        values: [
            new EditorValue(
                title: 'Titre de la page',
                themeKey: 'wiki_page_title',
                defaultValue: 'Wiki',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Titre Participer',
                themeKey: 'wiki_menu_title',
                defaultValue: 'Navigation',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Afficher les icons des cats',
                themeKey: 'wiki_display_categorie_icon',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Afficher les icons des articles',
                themeKey: 'wiki_display_article_categorie_icon',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Afficher les icons des articles',
                themeKey: 'wiki_display_article_icon',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Afficher la date du wiki',
                themeKey: 'wiki_display_creation_date',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Afficher la date d\'édition',
                themeKey: 'wiki_display_edit_date',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Afficher l\'auteur',
                themeKey: 'wiki_display_autor',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
        ]
    ),
    new EditorMenu(
        title: 'Forum',
        key: 'forum',
        scope: 'forum',
        requiredPackage: 'forum',
        values: [
            new EditorValue(
                title: 'Activer le widget',
                themeKey: 'forum_use_widgets',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Widget - Stats',
                themeKey: 'forum_widgets_show_stats',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Widget - Stats : Titre',
                themeKey: 'forum_widgets_title_stats',
                defaultValue: 'Stats du forum',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Widget - Membres',
                themeKey: 'forum_widgets_show_member',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Widget - Membres : Titre',
                themeKey: 'forum_widgets_text_member',
                defaultValue: 'Membres totaux :',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Widget - Messages',
                themeKey: 'forum_widgets_show_messages',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Widget - Messages : Titre',
                themeKey: 'forum_widgets_text_messages',
                defaultValue: 'Messages totaux :',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Widget - Topics',
                themeKey: 'forum_widgets_show_topics',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Widget - Topics : Titre',
                themeKey: 'forum_widgets_text_topics',
                defaultValue: 'Nombres de topics :',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Widget - Discord',
                themeKey: 'forum_widgets_show_discord',
                defaultValue: '0',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Widget - Discord : API',
                themeKey: 'forum_widgets_content_id',
                defaultValue: '(Paramètres serveur > Widget > ID serveur)',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Widget - Custom',
                themeKey: 'forum_widgets_show_custom',
                defaultValue: '0',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Widget - Custom : Titre',
                themeKey: 'forum_widgets_custom_title',
                defaultValue: 'Widget personnaliser',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Widget - Custom : Contenue',
                themeKey: 'forum_widgets_custom_text',
                defaultValue: '<p>Bonjour !</p>',
                type: EditorType::HTML,
            ),
            new EditorValue(
                title: 'Menu Accueil',
                themeKey: 'forum_breadcrumb_home',
                defaultValue: 'Accueil',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Icon bouton création topic',
                themeKey: 'forum_btn_create_topic_icon',
                defaultValue: 'fa-solid fa-pen-to-square',
                type: EditorType::FONTAWESOMEPICKER,
            ),
            new EditorValue(
                title: 'Texte bouton création topic',
                themeKey: 'forum_btn_create_topic',
                defaultValue: 'Créer un topic',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Titre page sous-forum',
                themeKey: 'forum_sub_forum',
                defaultValue: 'Sous-Forums',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Titre page topics',
                themeKey: 'forum_topics',
                defaultValue: 'Topics',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Forum vide : Message',
                themeKey: 'forum_nobody_send_message_text',
                defaultValue: 'Aucun message',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Forum hover color',
                themeKey: 'forum_hover_color',
                defaultValue: 'rgba(20, 21, 23, 0.76)',
                type: EditorType::TEXT,
            ),
        ]
    ),
    new EditorMenu(
        title: 'Footer',
        key: 'footer',
        scope: null,
        requiredPackage: null,
        values: [
            new EditorValue(
                title: 'Nom du site',
                themeKey: 'footer_use_title',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Message',
                themeKey: 'footer_message',
                defaultValue: 'Nightcraft n\'est en aucun cas affilié à Mojang AB.',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Liens dans un nouvel onglet',
                themeKey: 'footer_open_link_new_tab',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Facebook : Activer',
                themeKey: 'footer_active_facebook',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Facebook : Url',
                themeKey: 'footer_link_facebook',
                defaultValue: '#',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Facebook : Icon',
                themeKey: 'footer_icon_facebook',
                defaultValue: 'fa-brands fa-facebook',
                type: EditorType::FONTAWESOMEPICKER,
            ),
            new EditorValue(
                title: 'X : Activer',
                themeKey: 'footer_active_x',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'X : Url',
                themeKey: 'footer_link_x',
                defaultValue: '#',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'X : Icon',
                themeKey: 'footer_icon_x',
                defaultValue: 'fa-brands fa-square-x-twitter',
                type: EditorType::FONTAWESOMEPICKER,
            ),
            new EditorValue(
                title: 'Instagram : Activer',
                themeKey: 'footer_active_instagram',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Instagram : Url',
                themeKey: 'footer_link_instagram',
                defaultValue: '#',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Instagram : Icon',
                themeKey: 'footer_icon_instagram',
                defaultValue: 'fa-brands fa-instagram',
                type: EditorType::FONTAWESOMEPICKER,
            ),
            new EditorValue(
                title: 'Discord : Activer',
                themeKey: 'footer_active_discord',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Discord : Url',
                themeKey: 'footer_link_discord',
                defaultValue: '#',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Discord : Icon',
                themeKey: 'footer_icon_discord',
                defaultValue: 'fa-brands fa-discord',
                type: EditorType::FONTAWESOMEPICKER,
            ),
            new EditorValue(
                title: 'Afficher les CGU/CGV',
                themeKey: 'footer_active_condition',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Titre conditions',
                themeKey: 'footer_title_condition',
                defaultValue: 'Conditions',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'CGU',
                themeKey: 'footer_desc_condition_use',
                defaultValue: 'CGU',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'CGV',
                themeKey: 'footer_desc_condition_sale',
                defaultValue: 'CGV',
                type: EditorType::TEXT,
            ),
        ]
    ),
];
