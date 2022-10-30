<?php
use CMW\Utils\Utils;
use CMW\Manager\Lang\LangManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\SecurityService;
use CMW\Model\Votes\VotesConfigModel;
?>

<div class="row">
    <div class="col-12">
        <form action="" method="post"> <!-- IMPORTANT, KEEP THE FORM -->
            <?php (new SecurityService())->insertHiddenToken() ?>
            <div class="card card-primary">
                <div class="card-body">

                    <!-- CONFIG TABS -->

                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="config-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabs-header-tab" data-toggle="pill"
                                       href="#tabs-header" role="tab" aria-controls="tabs-header"
                                       aria-selected="false">Paramètres globaux</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-widget-tab" data-toggle="pill"
                                       href="#tabs-widget" role="tab" aria-controls="tabs-widget"
                                       aria-selected="false">Widget</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="config-tabs-home-tab" data-toggle="pill"
                                       href="#config-tabs-home" role="tab" aria-controls="config-tabs-home"
                                       aria-selected="true">Page d'accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="config-tabs-news-tab" data-toggle="pill"
                                       href="#config-tabs-news" role="tab" aria-controls="config-tabs-news"
                                       aria-selected="false">Page des news</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-faq-tab" data-toggle="pill"
                                       href="#tabs-faq" role="tab" aria-controls="tabs-faq"
                                       aria-selected="false">Page des F.A.Q</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-votes-tab" data-toggle="pill"
                                       href="#tabs-votes" role="tab" aria-controls="tabs-votes"
                                       aria-selected="false">Page de votes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabs-wiki-tab" data-toggle="pill"
                                       href="#tabs-wiki" role="tab" aria-controls="tabs-wiki"
                                       aria-selected="false">Page du wiki</a>
                                </li>
                            </ul>
                        </div>

                        <!-- CONFIG TABS CONTENT -->

<div class="card-body">
    <div class="tab-content" id="config-tabs-home-tabContent">

        <div class="tab-pane fade active show" id="tabs-header" role="tabpanel" aria-labelledby="tabs-header-tab">
            <h3>Accès au site :</h3>
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="global_only_member_access" value="false" class="custom-control-input" id="global_only_member_access" <?= ThemeModel::fetchConfigValue('global_only_member_access') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="global_only_member_access">Restreindre l'accès au site pour les membres uniqement ?</label>
                    </div> <br>
                    <div class="form-group">
                    <label for="hero_button_link">Message pour les non membres :</label>
                        <input style="width: 50%;" type="text" id="global_only_member_message" name="global_only_member_message" value="<?= ThemeModel::fetchConfigValue('global_only_member_message') ?>">
                    </div>
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="header_allow_login_button" value="false" class="custom-control-input" id="header_allow_login_button" <?= ThemeModel::fetchConfigValue('header_allow_login_button') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="header_allow_login_button">Activer le bouton de connexion ? (vous pourrez toujours accéder à la page)</label>
                    </div> <br>
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="header_allow_register_button" value="false" class="custom-control-input" id="header_allow_register_button" <?= ThemeModel::fetchConfigValue('header_allow_register_button') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="header_allow_register_button">Activer l'inscription ?</label>
                    </div> <br>
                    <div class="form-group">
                    <label for="hero_button_link">Message d'inscription désactiver :</label>
                        <input style="width: 50%;" type="text" id="global_no_register_message" name="global_no_register_message" value="<?= ThemeModel::fetchConfigValue('global_no_register_message') ?>">
                    </div>
                    <hr class="border border-dark">
                    <h3>Design :</h3>
                    <img src="<?= getenv("PATH_SUBFOLDER") ?>public/uploads/Rainfall/logo.png" class="mr-3 h-6 sm:h-9" alt="Vous devez upload logo.png depuis votre panel !">
                    <div class="input-group col">
                        <div class="custom-file " style="width: 30px;">
                            <input type="file" class="custom-file-input" id="Logo" accept=".png" name="Logo">
                            <label class="custom-file-label" for="Logo">Définissez votre logo.</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="primaryColor">Couleur d'arrière plan (Defaut : R:30 G:41 B:59 / #1e293b)</label>
                        <input type="color" id="primaryColor" name="primaryColor" value="<?= ThemeModel::fetchConfigValue('primaryColor') ?>">
                    </div>
                    <div class="form-group">
                        <label for="secondaryColor">Couleur principale (Defaut : R:24 G:32 B:46 / #18202E)</label>
                        <input type="color" id="secondaryColor" name="secondaryColor" value="<?= ThemeModel::fetchConfigValue('secondaryColor') ?>">
                    </div>

                    <div class="form-group">
                    <label for="hero_button_link">Année du footer :</label>
                    <input type="text" id="footer_year" name="footer_year" value="<?= ThemeModel::fetchConfigValue('footer_year') ?>">
                </div> 
        </div>


        <div class="tab-pane fade" id="tabs-widget" role="tabpanel" aria-labelledby="tabs-widget-tab">
                <div class="form-group float-right">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="widget_active" value="false" class="custom-control-input" id="widget_active" <?= ThemeModel::fetchConfigValue('widget_active') ? 'checked' : '' ?>>
                        <label class="custom-control-label" for="widget_active">Activer le widget ?</label>
                    </div>
                </div>
            <h3>Donnez lui un nom :</h3>
                <div class="form-group">
                    <label for="hero_button_link">Titre :</label>
                        <input type="text" id="widget_title" name="widget_title" value="<?= ThemeModel::fetchConfigValue('widget_title') ?>">
                </div>
            <hr class="border border-dark">
            <div class="form-group float-right">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="widget_last_news_active" value="false" class="custom-control-input" id="widget_last_news_active" <?= ThemeModel::fetchConfigValue('widget_last_news_active') ? 'checked' : '' ?>>
                        <label class="custom-control-label" for="widget_last_news_active">Activer les dernières news ?</label>
                    </div>
                </div>
            <h3>Dernières news :</h3>
                <div class="form-group">
                    <label for="hero_button_link">Titre :</label>
                        <input type="text" id="widget_last_news_title" name="widget_last_news_title" value="<?= ThemeModel::fetchConfigValue('widget_last_news_title') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Nombre de news à afficher :</label>
                    <input type="text" id="widget_last_news_number_display" name="widget_last_news_number_display" value="<?= ThemeModel::fetchConfigValue('widget_last_news_number_display') ?>">
                </div> 
            <hr class="border border-dark">
            <div class="form-group float-right">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="widget_discord_active" value="false" class="custom-control-input" id="widget_discord_active" <?= ThemeModel::fetchConfigValue('widget_discord_active') ? 'checked' : '' ?>>
                        <label class="custom-control-label" for="widget_discord_active">Activer l'intégration Discord ?</label>
                    </div>
                </div>
            <h3>Intégration Discord :</h3>
                <div class="form-group">
                    <label for="hero_button_link">Titre :</label>
                        <input type="text" id="widget_discord_title" name="widget_discord_title" value="<?= ThemeModel::fetchConfigValue('widget_discord_title') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Liens d'intégration :</label>
                    <input type="text" id="widget_discord_link" name="widget_discord_link" value="<?= ThemeModel::fetchConfigValue('widget_discord_link') ?>">
                </div> 
            <hr class="border border-dark">
            <div class="form-group float-right">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="widget_custom_active_1" value="false" class="custom-control-input" id="widget_custom_active_1" <?= ThemeModel::fetchConfigValue('widget_custom_active_1') ? 'checked' : '' ?>>
                        <label class="custom-control-label" for="widget_custom_active_1">Activer cette section ?</label>
                    </div>
                </div>
            <h3>Section personnalisé 1 :</h3>
                <div class="form-group">
                    <label for="hero_button_link">Titre :</label>
                        <input type="text" id="widget_custom_title_1" name="widget_custom_title_1" value="<?= ThemeModel::fetchConfigValue('widget_custom_title_1') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Contenue :</label>
                    <input style="width: 100%" type="text" id="widget_custom_content_1" name="widget_custom_content_1" value="<?= ThemeModel::fetchConfigValue('widget_custom_content_1') ?>">
                </div> 
            <hr class="border border-dark">
            <div class="form-group float-right">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="widget_custom_active_2" value="false" class="custom-control-input" id="widget_custom_active_2" <?= ThemeModel::fetchConfigValue('widget_custom_active_2') ? 'checked' : '' ?>>
                        <label class="custom-control-label" for="widget_custom_active_2">Activer cette section ?</label>
                    </div>
                </div>
            <h3>Section personnalisé 2 :</h3>
                <div class="form-group">
                    <label for="hero_button_link">Titre :</label>
                        <input type="text" id="widget_custom_title_2" name="widget_custom_title_2" value="<?= ThemeModel::fetchConfigValue('widget_custom_title_2') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Contenue :</label>
                    <input style="width: 100%" type="text" id="widget_custom_content_2" name="widget_custom_content_2" value="<?= ThemeModel::fetchConfigValue('widget_custom_content_2') ?>">
                </div> 
            <hr class="border border-dark">
            <div class="form-group float-right">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="widget_custom_active_3" value="false" class="custom-control-input" id="widget_custom_active_3" <?= ThemeModel::fetchConfigValue('widget_custom_active_3') ? 'checked' : '' ?>>
                        <label class="custom-control-label" for="widget_custom_active_3">Activer cette section ?</label>
                    </div>
                </div>
            <h3>Section personnalisé 3 :</h3>
                <div class="form-group">
                    <label for="hero_button_link">Titre :</label>
                        <input type="text" id="widget_custom_title_3" name="widget_custom_title_3" value="<?= ThemeModel::fetchConfigValue('widget_custom_title_3') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Contenue :</label>
                    <input style="width: 100%" type="text" id="widget_custom_content_3" name="widget_custom_content_3" value="<?= ThemeModel::fetchConfigValue('widget_custom_content_3') ?>">
                </div> 
            <hr class="border border-dark">
            <hr class="border border-dark">
            <div class="form-group float-right">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="widget_custom_active_4" value="false" class="custom-control-input" id="widget_custom_active_4" <?= ThemeModel::fetchConfigValue('widget_custom_active_4') ? 'checked' : '' ?>>
                        <label class="custom-control-label" for="widget_custom_active_4">Activer cette section ?</label>
                    </div>
                </div>
            <h3>Section personnalisé 4 :</h3>
                <div class="form-group">
                    <label for="hero_button_link">Titre :</label>
                        <input type="text" id="widget_custom_title_4" name="widget_custom_title_4" value="<?= ThemeModel::fetchConfigValue('widget_custom_title_4') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Contenue :</label>
                    <input style="width: 100%" type="text" id="widget_custom_content_4" name="widget_custom_content_4" value="<?= ThemeModel::fetchConfigValue('widget_custom_content_4') ?>">
                </div>     
        </div>


        <div class="tab-pane fade" id="config-tabs-home" role="tabpanel" aria-labelledby="config-tabs-home-tab">
            <h3>Indéxation de la page :</h3>
                <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Bien comprendre l'indéxation</h5>
                Ces options change le titre et la déscription de votre page dans l'onglet mais également lors des affichage dans discord, twitter ...<br>
                Ceci n'est aucunment lié au titre de la page en cours cette option ce trouve un peu plus bas (Si votre page est éligible à ce réglage.)<br>
                Si vous ne comprenez toujours pas ce que sa modifier merci de contacter le support de CraftMyWebsite
                </div>
                <div class="form-group">
                    <label for="home_title">Titre :</label>
                        <input type="text" id="home_title" name="home_title" value="<?= ThemeModel::fetchConfigValue('home_title') ?>">
                </div>
            <hr class="border border-dark">
            <h3>Page :</h3>
                <div class="form-group">
                    <label for="home_description">Déscription :</label>
                    <input type="text" id="home_description" name="home_description" value="<?= ThemeModel::fetchConfigValue('home_description') ?>">
                </div> 
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="footer_open_link_new_tab" value="false" class="custom-control-input" id="footer_open_link_new_tab" <?= ThemeModel::fetchConfigValue('footer_open_link_new_tab') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="footer_open_link_new_tab">Ouvrir les liens dans un nouvel onglet ?</label>
                    </div><br>
                    <hr class="border border-dark">
                    <h3>Icône 1</h3>
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="footer_active_facebook" value="false" class="custom-control-input" id="footer_active_facebook" <?= ThemeModel::fetchConfigValue('footer_active_facebook') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="footer_active_facebook">Activer cet icône ?</label>
                    </div><br>
                    <div class="form-group">
                        <label for="hero_button_link">Liens icône :</label>
                            <input type="text" id="footer_link_facebook" name="footer_link_facebook" value="<?= ThemeModel::fetchConfigValue('footer_link_facebook') ?>">
                    </div>
                    <div class="form-group">
                        <label for="hero_button_link">Icône <a href="https://fontawesome.com/search?o=r&m=free" target="_blank">FontAwesome (gratuit)</a> :</label>
                            <input type="text" id="footer_icon_facebook" name="footer_icon_facebook" value="<?= ThemeModel::fetchConfigValue('footer_icon_facebook') ?>">
                    </div>
                    <hr class="border border-dark">
                    <h3>Icône 2</h3>
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="footer_active_twitter" value="false" class="custom-control-input" id="footer_active_twitter" <?= ThemeModel::fetchConfigValue('footer_active_twitter') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="footer_active_twitter">Activer cet icône ?</label>
                    </div><br>
                    <div class="form-group">
                        <label for="hero_button_link">Liens icône :</label>
                            <input type="text" id="footer_link_twitter" name="footer_link_twitter" value="<?= ThemeModel::fetchConfigValue('footer_link_twitter') ?>">
                    </div>
                    <div class="form-group">
                        <label for="hero_button_link">Icône <a href="https://fontawesome.com/search?o=r&m=free" target="_blank">FontAwesome (gratuit)</a> :</label>
                            <input type="text" id="footer_icon_twitter" name="footer_icon_twitter" value="<?= ThemeModel::fetchConfigValue('footer_icon_twitter') ?>">
                    </div>
                    <hr class="border border-dark">
                    <h3>Icône 3</h3>
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="footer_active_instagram" value="false" class="custom-control-input" id="footer_active_instagram" <?= ThemeModel::fetchConfigValue('footer_active_instagram') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="footer_active_instagram">Activer cet icône ?</label>
                    </div><br>
                    <div class="form-group">
                        <label for="hero_button_link">Liens icône :</label>
                            <input type="text" id="footer_link_instagram" name="footer_link_instagram" value="<?= ThemeModel::fetchConfigValue('footer_link_instagram') ?>">
                    </div>
                    <div class="form-group">
                        <label for="hero_button_link">Icône <a href="https://fontawesome.com/search?o=r&m=free" target="_blank">FontAwesome (gratuit)</a> :</label>
                            <input type="text" id="footer_icon_instagram" name="footer_icon_instagram" value="<?= ThemeModel::fetchConfigValue('footer_icon_instagram') ?>">
                    </div>
                    <hr class="border border-dark">
                    <h3>Icône 4</h3>
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="footer_active_discord" value="false" class="custom-control-input" id="footer_active_discord" <?= ThemeModel::fetchConfigValue('footer_active_discord') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="footer_active_discord">Activer cet icône ?</label>
                    </div><br>
                    <div class="form-group">
                        <label for="hero_button_link">Liens icône :</label>
                            <input type="text" id="footer_link_discord" name="footer_link_discord" value="<?= ThemeModel::fetchConfigValue('footer_link_discord') ?>">
                    </div>
                    <div class="form-group">
                        <label for="hero_button_link">Icône <a href="https://fontawesome.com/search?o=r&m=free" target="_blank">FontAwesome (gratuit)</a> :</label>
                            <input type="text" id="footer_icon_discord" name="footer_icon_discord" value="<?= ThemeModel::fetchConfigValue('footer_icon_discord') ?>">
                    </div> 
        </div>


<!------------NEWS------------>
        <div class="tab-pane fade" id="config-tabs-news" role="tabpanel" aria-labelledby="config-tabs-news-tab">
            <h3>Indéxation de la page :</h3>
                <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Bien comprendre l'indéxation</h5>
                Ces options change le titre et la déscription de votre page dans l'onglet mais également lors des affichage dans discord, twitter ...<br>
                Ceci n'est aucunment lié au titre de la page en cours cette option ce trouve un peu plus bas (Si votre page est éligible à ce réglage.)<br>
                Si vous ne comprenez toujours pas ce que sa modifier merci de contacter le support de CraftMyWebsite
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Titre :</label>
                        <input type="text" id="news_title" name="news_title" value="<?= ThemeModel::fetchConfigValue('news_title') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Déscription :</label>
                        <input style="width: 50%" type="text" id="news_description" name="news_description" value="<?= ThemeModel::fetchConfigValue('news_description') ?>">
                </div>
            <hr class="border border-dark">
                <div class="form-group">
                    <label for="hero_button_link">Titre de la page :</label>
                        <input type="text" id="news_page_title" name="news_page_title" value="<?= ThemeModel::fetchConfigValue('news_page_title') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Nombre de news à afficher :</label>
                    <input type="text" id="news_page_number_display" name="news_page_number_display" value="<?= ThemeModel::fetchConfigValue('news_page_number_display') ?>">
                </div> 
        </div>


<!------------FAQ------------>
        <div class="tab-pane fade" id="tabs-faq" role="tabpanel" aria-labelledby="tabs-faq-tab">
            <h3>Indéxation de la page :</h3>
                <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Bien comprendre l'indéxation</h5>
                Ces options change le titre et la déscription de votre page dans l'onglet mais également lors des affichage dans discord, twitter ...<br>
                Ceci n'est aucunment lié au titre de la page en cours cette option ce trouve un peu plus bas (Si votre page est éligible à ce réglage.)<br>
                Si vous ne comprenez toujours pas ce que sa modifier merci de contacter le support de CraftMyWebsite
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Titre :</label>
                        <input type="text" id="faq_title" name="faq_title" value="<?= ThemeModel::fetchConfigValue('faq_title') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Déscription :</label>
                        <input style="width: 50%" type="text" id="faq_description" name="faq_description" value="<?= ThemeModel::fetchConfigValue('faq_description') ?>">
                </div>
            <hr class="border border-dark">
                <div class="form-group">
                    <label for="hero_button_link">Titre de la page :</label>
                        <input type="text" id="faq_page_title" name="faq_page_title" value="<?= ThemeModel::fetchConfigValue('faq_page_title') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Titre de la section formulaire :</label>
                        <input type="text" id="faq_question_title" name="faq_question_title" value="<?= ThemeModel::fetchConfigValue('faq_question_title') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Titre de la section réponse :</label>
                        <input type="text" id="faq_answer_title" name="faq_answer_title" value="<?= ThemeModel::fetchConfigValue('faq_answer_title') ?>">
                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="faq_display_autor" value="false" class="custom-control-input" id="faq_display_autor" <?= ThemeModel::fetchConfigValue('faq_display_autor') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="faq_display_autor">Afficher l'auteur de la réponse ?</label>
                    </div> <br>
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="faq_display_form" value="false" class="custom-control-input" id="faq_display_form" <?= ThemeModel::fetchConfigValue('faq_display_form') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="faq_display_form">Activer le formulaire de contact ?</label>
                    </div> 
        </div>

<!------------VOTES------------>
        <div class="tab-pane fade" id="tabs-votes" role="tabpanel" aria-labelledby="tabs-faq-votes">
            <h3>Indéxation de la page :</h3>
                <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Bien comprendre l'indéxation</h5>
                Ces options change le titre et la déscription de votre page dans l'onglet mais également lors des affichage dans discord, twitter ...<br>
                Ceci n'est aucunment lié au titre de la page en cours cette option ce trouve un peu plus bas (Si votre page est éligible à ce réglage.)<br>
                Si vous ne comprenez toujours pas ce que sa modifier merci de contacter le support de CraftMyWebsite
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Titre :</label>
                        <input type="text" id="vote_title" name="vote_title" value="<?= ThemeModel::fetchConfigValue('vote_title') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Description :</label>
                        <input style="width: 50%" type="text" id="vote_description" name="vote_description" value="<?= ThemeModel::fetchConfigValue('vote_description') ?>">
                </div>
            <hr class="border border-dark">
            <h3>Section hero :</h3>
                <div class="form-group">
                    <label for="hero_button_link">Titre de la page :</label>
                        <input type="text" id="votes_page_title" name="votes_page_title" value="<?= ThemeModel::fetchConfigValue('votes_page_title') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Titre de la section participation :</label>
                        <input type="text" id="votes_participate_title" name="votes_participate_title" value="<?= ThemeModel::fetchConfigValue('votes_participate_title') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Titre de la section top <?= (new VotesConfigModel())->getConfig()->getTopShow()?> :</label>
                        <input type="text" id="votes_top_10_title" name="votes_top_10_title" value="<?= ThemeModel::fetchConfigValue('votes_top_10_title') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Titre de la section top <?= (new VotesConfigModel())->getConfig()->getTopShow()?> global :</label>
                        <input type="text" id="votes_top_10_global_title" name="votes_top_10_global_title" value="<?= ThemeModel::fetchConfigValue('votes_top_10_global_title') ?>">
                </div>

                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="votes_display_global" value="false" class="custom-control-input" id="votes_display_global" <?= ThemeModel::fetchConfigValue('votes_display_global') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="votes_display_global">Activer le classement global ?</label>
                    </div> 
        </div>


<!------------WIKI------------>
        <div class="tab-pane fade" id="tabs-wiki" role="tabpanel" aria-labelledby="tabs-faq-wiki">
            <h3>Indéxation de la page :</h3>
                <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Bien comprendre l'indéxation</h5>
                Ces options change le titre et la déscription de votre page dans l'onglet mais également lors des affichage dans discord, twitter ...<br>
                Ceci n'est aucunment lié au titre de la page en cours cette option ce trouve un peu plus bas (Si votre page est éligible à ce réglage.)<br>
                Si vous ne comprenez toujours pas ce que sa modifier merci de contacter le support de CraftMyWebsite
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Titre :</label>
                        <input type="text" id="wiki_title" name="wiki_title" value="<?= ThemeModel::fetchConfigValue('wiki_title') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Description :</label>
                        <input style="width: 50%" type="text" id="wiki_description" name="wiki_description" value="<?= ThemeModel::fetchConfigValue('wiki_description') ?>">
                </div>
            <hr class="border border-dark">
                <div class="form-group">
                    <label for="hero_button_link">Titre de la page :</label>
                        <input type="text" id="wiki_page_title" name="wiki_page_title" value="<?= ThemeModel::fetchConfigValue('wiki_page_title') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Titre du menu :</label>
                        <input type="text" id="wiki_menu_title" name="wiki_menu_title" value="<?= ThemeModel::fetchConfigValue('wiki_menu_title') ?>">
                </div>
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="wiki_display_categorie_icon" value="false" class="custom-control-input" id="wiki_display_categorie_icon" <?= ThemeModel::fetchConfigValue('wiki_display_categorie_icon') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="wiki_display_categorie_icon">Activer les icons des categories (menu) ?</label>
                    </div><br>
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="wiki_display_article_categorie_icon" value="false" class="custom-control-input" id="wiki_display_article_categorie_icon" <?= ThemeModel::fetchConfigValue('wiki_display_article_categorie_icon') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="wiki_display_article_categorie_icon">Activer les icons des articles (menu) ?</label>
                    </div><br> 
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="wiki_display_article_icon" value="false" class="custom-control-input" id="wiki_display_article_icon" <?= ThemeModel::fetchConfigValue('wiki_display_article_icon') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="wiki_display_article_icon">Activer les icons des articles (articles) ?</label>
                    </div><br>
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="wiki_display_creation_date" value="false" class="custom-control-input" id="wiki_display_creation_date" <?= ThemeModel::fetchConfigValue('wiki_display_creation_date') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="wiki_display_creation_date">Activer la date de création ?</label>
                    </div><br>
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="wiki_display_edit_date" value="false" class="custom-control-input" id="wiki_display_edit_date" <?= ThemeModel::fetchConfigValue('wiki_display_edit_date') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="wiki_display_edit_date">Activer la date d'édition ?</label>
                    </div><br>
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="wiki_display_autor" value="false" class="custom-control-input" id="wiki_display_autor" <?= ThemeModel::fetchConfigValue('wiki_display_autor') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="wiki_display_autor">Activer l'auteur ?</label>
                    </div>
        </div>






    </div>




</div>
</div>
</div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit"
                            class="btn btn-primary float-right"><?= LangManager::translate("core.btn.save") ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
