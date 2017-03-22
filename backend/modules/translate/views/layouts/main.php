<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use kartik\sidenav\SideNav;
use kartik\icons\Icon;
Icon::map($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'myApiary',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Sign in', 'url' => ['/user/security/login']];
    } else {
        $menuItems[] = [
            'label' => 'Sign out (' . Yii::$app->user->identity->username . ')', 
            'url' => ['/user/security/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
		<?php if(!Yii::$app->user->isGuest): ?>
		<?= Alert::widget() ?>
        <div class="row">
            <div class="col-md-2">
                <?php 
                
                if (!Yii::$app->user->isGuest) {
                 echo SideNav::widget([
                    'type' => SideNav::TYPE_DEFAULT,
                    'encodeLabels' => false,
                    'activateItems' => true,
                    'heading' => false,
                    'items' => [
                        [
                            'url' => Url::to(['locale/']),
                            'label' => Icon::show('envelope-o',['style'=>'width:25px']) . 'Locale',
                            //'icon' => 'glyphicon glyphicon-file',
                            'active' => Yii::$app->controller->id==='locale',
                        ],
                        [
                            'url' => Url::to(['sourcemessage/']),
                            'label' => Icon::show('envelope-o',['style'=>'width:25px']) . 'Source message',
                            //'icon' => 'glyphicon glyphicon-file',
                            'active' => Yii::$app->controller->id==='sourcemessage',
                        ],
                        [
                            'url' => Url::to(['message/']),
                            'label' => Icon::show('envelope-o',['style'=>'width:25px']) . 'Message',
                            //'icon' => 'glyphicon glyphicon-file',
                            'active' => Yii::$app->controller->id==='message',
                        ],                         
                    ],
                ]);}; ?>             
            </div>
            <div class="col-md-10">
                <?php echo Breadcrumbs::widget([
                        'homeLink' => [
                            'label' => '<i class=" glyphicon glyphicon-home"></i>',
                            'url' => Yii::$app->homeUrl,
                            'encode' => false// Requested feature
                        ],
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]); ?>
                <?= $content ?>
            </div>
        </div>
		<?php else: ?>
			<?= $content ?>
		<?php endif ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; myApiary <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
