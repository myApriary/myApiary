<?php
use yii\web\View;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/themes/agency/dist');
$this->registerJsFile($directoryAsset.'/js/cbpAnimatedHeader.min.js',['position'=>View::POS_END]);
?>
<?php $this->beginContent('@frontend/themes/agency/views/layouts/_base.php'); ?>

<?= $this->render('_header.php') ?>

<?= $content ?>

<?= $this->render('_footer.php') ?>

<?php $this->endContent(); ?>


