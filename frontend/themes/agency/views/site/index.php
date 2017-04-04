   <?php

    Yii::$app->layout='homepage';

   $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/themes/agency/dist');
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
<?php
/*
    <?= $this->render('_service.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_portfolio.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_about.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_team.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_client.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_contact.php',['directoryAsset'=>$directoryAsset ]) ?>
    
*/
?>

<?php
$script = <<< JS
(function($) {
    "use strict"; // Start of use strict

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    })

})(jQuery);;
JS;
$this->registerJs($script);
?>
?>