<?php
use yii\web\View;



$this->registerJsFile($directoryAsset.'/js/cbpAnimatedHeader.min.js',['position'=>View::POS_END]);
?>
<?php $this->beginContent('@dixonsatit/agencyTheme/views/layouts/_base.php'); ?>

<?= $this->render('_header.php') ?>

<?= $content ?>

<?= $this->render('_footer.php') ?>

<?php $this->endContent(); ?>


