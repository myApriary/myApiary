<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use kartik\sidenav\SideNav;

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
        'brandLabel' => Html::img('@web/images/logo.png', ['alt'=>'myApriary']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Zaloguj', 'url' => ['/user/security/login']];
    } else {
		$menuItems = [
			['label' => 'Home', 'url' => ['/site/index']],
		];
        $menuItems[] = [
            'label' => 'Wyloguj (' . Yii::$app->user->identity->username . ')', 
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
                            'url' => '/',
                            'label' => 'Home',
                            'icon' => 'home',
                            'active' => Yii::$app->controller->id==='site',
                        ],
                        [
                            'url' => Url::to(['/pasieki/index']),
                            'label' => 'Pasieki',
                            'icon' => 'glyphicon glyphicon-globe',
                            'active' => Yii::$app->controller->id==='pasieki',
                        ],
                        [
                            'url' => Url::to(['/pnie/index']),
                            'label' => 'Pnie',
                            'icon' => 'glyphicon glyphicon-book',
                            'active' => Yii::$app->controller->id==='pnie',
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
        <p class="pull-left">&copy; myApriary <?= date('Y') ?></p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

