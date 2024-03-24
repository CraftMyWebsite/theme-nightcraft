<?php
//<?= ThemeModel::getInstance()->fetchConfigValue('slider_title_1')
use CMW\Manager\Env\EnvManager;

return [
   /* - - - - - - - - 
       - - HEADER & GLOBAL - -
    - - - - - - - - - */
    "main_font" => "kanit",
    "header_allow_register_button" => "1",
    "header_allow_login_button" => "1",
    "global_no_register_message" => "Nous somme désolé mais les inscriptions sont pour le moment désactiver.",
    "main_color" => "#F59E0B",
    "bg_color" => "#21212d",
    "btn_hover_color" => "#f5b30b",
    "btn_text_color" => "#ffffff",
    "btn_text_hover_color" => "#fff7f7",
    "nav_active_color" => "#10B981",
    "nav_hover_color" => "#F59E0B",
    "nav_bg_color" => "rgba(35, 40, 49, 0.76)",
    "text_color" => "#e3e3e3",
    "card_color" => "rgba(35, 40, 49, 0.76)",
    "card_in_card_color" => "rgba(28, 31, 35, 0.76)",
    "footer_bg_color" => "#1a1a23",
    "input_bg_color" => "#474a56",
    "input_text_color" => "#ffffff",
    "input_placeholder_color" => "#8f8f96",
    "link_color" => "#6060be",
    "hover_link_color" => "#ffffff",
    "logo_width" => "15",

    "overlay_everywhere" => "1",
    "overlay_blur" => "5",
    "overlay_img" => "Config/Default/Img/bg.webp",
    "maintenance_img" => "Config/Default/Img/maintenance.png",
    "maintenance_width" => "60",
    "404_width" => "50",
    "404_img" => "Config/Default/Img/404.png",
    "home_btn_color" => "#0bb7f5",
    "home_btn_hover_color" => "#1cc1ff",
    "home_btn_text_color" => "#ffffff",
    "home_join_width" => "50",

    /* - - - - - - - - 
       - - HOME - -
    - - - - - - - - - */
    /*TOP*/
    "header_active_title" => "1",
    "header_active_logo" => "1",
    "header_img_logo" => "Config/Default/Img/logo.png",
    "join_ip" => "play.nightcraft.fr",
    /*TITLE DESC*/
    "home_title" => "Accueil",
    /*NEWS SECTION*/
    "news_section_active" => "1",
    "news_number_display" => "3",
    /*JOIN SECTION*/
    "join_section_active" => "1",
    "join_section_img" => "Config/Default/Img/discord.png",
    "join_section_title" => "Rejoingnez NightCraft !",
    "join_section_text" => "Plongez dans Nightcraft, un monde Minecraft unique où l'aventure et la créativité n'ont pas de limites! Rejoignez-nous pour des constructions époustouflantes et des quêtes inoubliables. ✨",
    "join_section_text_button" => "Rejoindre le discord",
    "join_section_url" => "#",
    /*CUSTOM SECTION #1*/
    "custom_section_active_1" => "0",
    "custom_section_title_1" => "Titre personnalisé 1",
    "custom_section_content_1" => "<h1>Personnalise moi</h1> <br> <p>Comme du code HTML !</p>",
    /*CUSTOM SECTION #2*/
    "custom_section_active_2" => "0",
    "custom_section_title_2" => "Titre personnalisé 2",
    "custom_section_content_2" => "<h1>Personnalise moi</h1> <br> <p>Comme du code HTML !</p>",
    /*CUSTOM SECTION #3*/
    "custom_section_active_3" => "0",
    "custom_section_title_3" => "Titre personnalisé 3",
    "custom_section_content_3" => "<h1>Personnalise moi</h1> <br> <p>Comme du code HTML !</p>",
    /*CUSTOM SECTION #4*/
    "custom_section_active_4" => "0",
    "custom_section_title_4" => "Titre personnalisé 4",
    "custom_section_content_4" => "<h1>Personnalise moi</h1> <br> <p>Comme du code HTML !</p>",

    /* - - - - - - - - 
       - - NEWS - -
    - - - - - - - - - */
    "news_title" => "Nouveautés",
    "news_description" => "Les dernières actus !",
    "news_page_title" => "Archives des nouveautés",
    "news_page_number_display" => "20",

    /* - - - - - - - - 
       - - F.A.Q - -
    - - - - - - - - - */
    "faq_title" => "FAQ",
    "faq_description" => "Retrouvez toutes les réponses à vos questions",
    "faq_page_title" => "F.A.Q",
    "faq_question_title" => "Une question ?",
    "faq_answer_title" => "Des réponses",
    "faq_display_autor" => "1",
    "faq_display_form" => "1",

    /* - - - - - - - - 
       - - VOTES - -
    - - - - - - - - - */
    "vote_title" => "Votes",
    "vote_description" => "Votez pour le serveur et gagnez des récompenses uniques !",
    "votes_page_title" => "Voter",
    "votes_participate_title" => "Participer",
    "votes_top_10_title" => "Top 10 du mois",
    "votes_top_10_global_title" => "Top 10 global",
    "votes_display_global" => "1",

    /* - - - - - - - - 
       - - WIKI - -
    - - - - - - - - - */
    "wiki_title" => "Wiki",
    "wiki_description" => "Découvrez notre wiki !",
    "wiki_page_title" => "Wiki",
    "wiki_menu_title" => "Navigation",
    "wiki_display_categorie_icon" => "1",
    "wiki_display_article_categorie_icon" => "1",
    "wiki_display_article_icon" => "1",
    "wiki_display_creation_date" => "1",
    "wiki_display_edit_date" => "1",
    "wiki_display_autor" => "1",

    /* - - - - - - - -
       - - FORUM - -
    - - - - - - - - - */
    "forum_hover_color" => "rgba(20, 21, 23, 0.76)",
    "forum_title" => "Forum",
    "forum_description" => "Parcourez notre forum",
    "forum_use_widgets" => "1",
    "forum_widgets_show_stats" => "1",
    "forum_widgets_title_stats" => "Stats du forum",
    "forum_widgets_show_member" => "1",
    "forum_widgets_text_member" => "Membres totaux :",
    "forum_widgets_show_messages" => "1",
    "forum_widgets_text_messages" => "Messages totaux :",
    "forum_widgets_show_topics" => "1",
    "forum_widgets_text_topics" => "Nombres de topics :",
    "forum_widgets_show_discord" => "1",
    "forum_widgets_content_id" => "(Paramètres serveur > Widget > ID serveur)",
    "forum_widgets_show_custom" => "1",
    "forum_widgets_custom_title" => "Widget personnaliser",
    "forum_widgets_custom_text" => "<p>Bonjour !</p>",

    "forum_breadcrumb_home" => "Accueil",
    "forum_btn_create_topic_icon" => "fa-solid fa-pen-to-square",
    "forum_btn_create_topic" => "Créer un topic",

    "forum_sub_forum" => "Sous-Forums",
    "forum_topics" => "Topics",
    "forum_message" => "Messages",
    "forum_last_message" => "Dernier messages",
    "forum_display" => "Affichages",
    "forum_response" => "Réponses",

    "forum_nobody_send_message_img" => "Config/Default/Img/Forum/nobody.png",
    "forum_nobody_send_message_text" => "Aucun message",

    /* - - - - - - - - 
       - - FOOTER - -
    - - - - - - - - - */
    "footer_use_logo" => "1",
    "footer_use_title" => "1",

    "footer_year" => "2023",
    "footer_open_link_new_tab" => "1",

    "footer_link_facebook" => "#",
    "footer_icon_facebook" => "fa-brands fa-facebook",
    "footer_active_facebook" => "1",

    "footer_link_twitter" => "#",
    "footer_icon_twitter" => "fa-brands fa-square-twitter",
    "footer_active_twitter" => "1",

    "footer_link_instagram" => "#",
    "footer_icon_instagram" => "fa-brands fa-instagram",
    "footer_active_instagram" => "1",

    "footer_link_discord" => "#",
    "footer_icon_discord" => "fa-brands fa-discord",
    "footer_active_discord" => "1",

    "footer_title_condition" => "Conditions",
    "footer_desc_condition_use" => "CGU",
    "footer_desc_condition_sale" => "CGV",
    "footer_active_condition" => "1",
];