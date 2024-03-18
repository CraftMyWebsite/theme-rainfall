<?php

use CMW\Controller\Core\SecurityController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Support\SupportSettingsModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Support\SupportEntity $support */
/* @var CMW\Entity\Support\SupportResponseEntity[] $responses */

Website::setTitle("Support");
Website::setDescription("Consultez les réponses de nos experts.");
?>

<div class="bg-[#18202E] w-full pt-14 pb-4">
    <div class="text-center pt-4 font-extrabold text-4xl border-t border-gray-500">Support</div>
</div>
<div class="custom-shape-divider-top-1667065406">
    <svg width="100%" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
         preserveAspectRatio="none" class="bg-[#1e293b] text-[#18202E] h-2 lg:h-10">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
              opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
              opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
              class="shape-fill"></path>
    </svg>
</div>

<section class="pt-2 pb-6 px-2 lg:px-24 2xl:px-72">
    <div style="background-color: #18202E !important;" class="container mx-auto rounded-md shadow-lg p-8 h-fit mt-4">
        <div class="flex flex-wrap justify-between">
            <a href="<?= Website::getProtocol() . "://" . $_SERVER["SERVER_NAME"] . EnvManager::getInstance()->getValue("PATH_SUBFOLDER") . "support" ?>"
               class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center">Retourner
                au support</a>
            <?php if ($support->getStatus() !== "2"): ?>
            <a href="<?= $support->getCloseUrl() ?>"
               class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center">Cloturer</a>
            <?php endif; ?>
        </div>
        <div class="flex flex-wrap justify-between">
            <p>Auteur : <?= $support->getUser()->getPseudo() ?></p>
            <p>État : <?= $support->getStatusFormatted() ?></p>
            <p>Visibilité : <?= $support->getIsPublicFormatted() ?></p>
            <p>Date : <?= $support->getCreated() ?></p>
        </div>
        <h4>Demande :</h4>
        <div style="background-color: #2b2f3d !important;" class="shadow-lg rounded-lg p-4 mb-4">
            <?= $support->getQuestion() ?>
        </div>
        <div class="border-t"></div>
        <h4>Réponses :</h4>
        <?php foreach ($responses as $response): ?>
            <div style="background-color: #2b2f3d !important;" class="shadow-lg rounded-lg p-4 mb-4">
                <div class="flex-wrap flex justify-between">
                    <b><?= $response->getUser()->getPseudo() ?> : </b>
                    <?php if ($response->getIsStaff()): ?><small class="rounded-lg px-2 py-1" style="background-color: #0f5132"><?= $response->getIsStaffFormatted() ?></small><?php endif; ?>
                </div>
                <p><?= $response->getResponse() ?></p>
                <p><?= $response->getCreated() ?></p>
            </div>
        <?php endforeach; ?>
        <?php if ($support->getStatus() !== "2"): ?>
        <form class="space-y-6" action="" method="post">
            <?php (new SecurityManager())->insertHiddenToken() ?>
            <div class="mb-4">
                <label for="support_response_content" class="block mb-2 text-sm font-medium ">Votre réponse :</label>
                <textarea minlength="20" id="support_response_content" name="support_response_content" rows="4"
                          class="block p-2.5 w-full text-sm bg-gray-800 border border-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Vous pouvez ..."></textarea>
            </div>
            <div class="text-center">
                <button type="submit"
                        class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Envoyé
                </button>
            </div>
        </form>
        <?php endif; ?>
    </div>
</section>