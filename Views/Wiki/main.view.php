<?php

use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

$title = Website::getName() . ' - '. ThemeModel::fetchConfigValue('wiki_title');
$description = ThemeModel::fetchConfigValue('wiki_description');
?>

<div style="background-color: #18202E !important;" class="w-full pt-14 pb-4">
    <div class="text-center pt-4 font-bold text-4xl border-t border-gray-500"><?= ThemeModel::fetchConfigValue('wiki_page_title') ?></div>
</div>
<div class="custom-shape-divider-top-1667065406">
    <svg width="100%" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
         preserveAspectRatio="none" class="h-2 lg:h-10" style="background-color: #1e293b !important; color: #18202E;">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
              opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
              opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
              class="shape-fill"></path>
    </svg>
</div>

<section class="px-4 lg:px-16 py-6">
    <?php if (ThemeModel::fetchConfigValue('widget_use_wiki')): ?>
    <div class="lg:grid lg:grid-cols-5 gap-6">
        <div>
            <?php include_once("Public/Themes/Rainfall/Views/Includes/widget.inc.php"); ?>
        </div>
        <?php endif; ?>
        <section class="grid lg:grid-cols-3 gap-4 rounded-lg my-8 mx-2 <?php if (!ThemeModel::fetchConfigValue('widget_use_wiki')): ?>lg:mx-72<?php endif; ?> col-span-4">

            <div style="background-color: #18202E !important;" class="container mx-auto rounded-md shadow-lg p-4 h-fit">
                <div class="flex flex-no-wrap justify-center items-center py-4 -mb-6">
                    <div class="px-10 w-auto">
                        <h2 class="font-semibold text-2xl uppercase"><?= ThemeModel::fetchConfigValue('wiki_menu_title') ?></h2>
                    </div>
                </div>
                <?php foreach ($categories as $categorie): ?>
                <div class="font-medium text-gray-500 mt-6 cursor-default"><?php if(ThemeModel::fetchConfigValue('wiki_display_categorie_icon')): ?><i class="<?= $categorie->getIcon() ?>"></i><?php endif; ?> <?= $categorie->getName() ?></div>
                <?php foreach ($categorie?->getArticles() as $menuArticle): ?>
                <a href="<?=   EnvManager::getInstance()->getValue("PATH_SUBFOLDER") . "wiki/" . $categorie->getSlug() . "/" . $menuArticle->getSlug() ?>">
                    <div class="pl-2 py-1 mt-1 cursor-pointer rounded hover:bg-gray-900"><?php if(ThemeModel::fetchConfigValue('wiki_display_article_categorie_icon')): ?><i class="<?= $menuArticle->getIcon() ?>"></i><?php endif; ?> <?= $menuArticle->getTitle() ?></div>
                </a>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>

            <div class="col-span-2 mt-4 lg:mt-0">
                <div style="background-color: #18202E !important;" class="container mx-auto rounded-md shadow-lg py-4 px-8 h-fit">
                    <?php if($article !== null): ?>
                    <div class="flex flex-no-wrap justify-center items-center py-4">
                        <div class="px-10 w-auto">
                            <h2 class="font-semibold text-2xl uppercase"><?php if(ThemeModel::fetchConfigValue('wiki_display_article_icon')): ?><i class="<?= $article->getIcon() ?>"></i><?php endif; ?> <?= $article->getTitle() ?></h2>
                        </div>
                    </div>
                        <div class="mb-4"><?= $article->getContent() ?></div>
                        <div class="flex flex-wrap justify-between border-t">
                            <?php if(ThemeModel::fetchConfigValue('wiki_display_creation_date')): ?><div class="mt-1">Crée le : <?= date("d/m/Y", strtotime($article->getDateCreate())) ?></div><?php endif; ?>
                            <?php if(ThemeModel::fetchConfigValue('wiki_display_autor')): ?><div class="bg-gray-600 font-medium inline-block px-3 py-1 rounded-sm text-xs mt-1"><?= $article->getAuthor()->getPseudo() ?></div><?php endif; ?>
                            <?php if(ThemeModel::fetchConfigValue('wiki_display_edit_date')): ?><div class="mt-1">Modifié le : <?= date("d/m/Y", strtotime($article->getDateUpdate())) ?></div><?php endif; ?>
                        </div>
                    <?php elseif($firstArticle === null && $article !== null): ?>
                    <div class="flex flex-no-wrap justify-center items-center py-4">
                        <div class="px-10 w-auto">
                            <h2 class="font-semibold text-2xl uppercase">Aucun article !</h2>
                        </div>
                    </div>
                        <div class="mb-4">Vous n'avez pas encoré commencer la création de votre Wiki ! <br>Connectez-vous pour le remplir !</div>
                        <div class="flex flex-wrap justify-between border-t">
                            <div class="mt-1">Crée le : Jamais</div>
                            <div class="bg-gray-600 font-medium inline-block px-3 py-1 rounded-sm text-xs mt-1">Personne</div>
                            <div class="mt-1">Modifié le : Jamais</div>
                        </div>
                    <?php else: ?>
                    <div class="flex flex-no-wrap justify-center items-center py-4">
                        <div class="px-10 w-auto">
                            <h2 class="font-semibold text-2xl uppercase"><?php if(ThemeModel::fetchConfigValue('wiki_display_article_icon')): ?><i class="<?= $firstArticle->getIcon() ?>"></i><?php endif; ?> <?= $firstArticle->getTitle() ?></h2>
                        </div>
                    </div>
                        <div class="mb-4"><?= $firstArticle->getContent() ?></div>
                        <div class="flex flex-wrap justify-between border-t">
                            <?php if(ThemeModel::fetchConfigValue('wiki_display_creation_date')): ?><div class="mt-1">Crée le : <?= date("d/m/Y", strtotime($firstArticle->getDateCreate())) ?></div><?php endif; ?>
                            <?php if(ThemeModel::fetchConfigValue('wiki_display_autor')): ?><div class="bg-gray-600 font-medium inline-block px-3 py-1 rounded-sm text-xs mt-1"><?= $firstArticle->getAuthor()->getPseudo() ?></div><?php endif; ?>
                            <?php if(ThemeModel::fetchConfigValue('wiki_display_edit_date')): ?><div class="mt-1">Modifié le : <?= date("d/m/Y", strtotime($firstArticle->getDateUpdate())) ?></div><?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php if (ThemeModel::fetchConfigValue('widget_use_wiki')): ?></div><?php endif; ?>
</section>
