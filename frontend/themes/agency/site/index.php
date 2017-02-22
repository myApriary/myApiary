   <?php

    Yii::$app->layout='homepage';

   $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@dixonsatit/agencyTheme/dist');
   ?>
   <!-- Header -->
    <header style="background-image: url('/frontend/web/images/bee2.jpg')">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">
                    <?= Yii::t('app_frontend', 'Welcome to myApiary!');  ?>
                </div>
                <div class="intro-heading">
                    <?= Yii::t('app_frontend', 'Could be easier?');  ?>
                </div>
                <a href="#services" class="page-scroll btn btn-xl">
                    <?= Yii::t('app_frontend', 'Check it!');  ?>
                </a>
            </div>
        </div>
    </header>

    <?= $this->render('_service.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_portfolio.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_about.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_team.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_client.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_contact.php',['directoryAsset'=>$directoryAsset ]) ?>
    