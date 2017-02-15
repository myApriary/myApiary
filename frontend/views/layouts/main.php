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
//use kartik\sidenav\SideNav;
use kartik\widgets\SideNav;
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
     <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" /> 
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/logo.png', ['alt'=>'myApiary']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('app_frontend','Sign in'), 'url' => ['/user/security/login']];
    } else {
		$menuItems = [
			['label' => 'Home', 'url' => ['/site/index']],
		];
        $menuItems[] = [
            'label' => Yii::t('app_frontend', 'Logout') . ' (' . Yii::$app->user->identity->username . ')', 
            'url' => ['/user/security/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
        $menuItems[] = [
            'label' => Yii::t('app_frontend', 'My Account'),
            'items' => [
                [
                    'label' => Yii::t('app_frontend', 'Password reset'),
                    'url' => ['/user/recovery/reset'],
                    //'linkOptions' => ['data-method' => 'post'],
                ],
                [
                    'label' => Yii::t('app_frontend', 'Profile settings'),
                    'url' => ['/user/settings/profile'],
                    //'linkOptions' => ['data-method' => 'post'],
                ],
                [
                    'label' => Yii::t('app_frontend', 'Account settings'),
                    'url' => ['/user/settings/account'],
                    //'linkOptions' => ['data-method' => 'post'],
                ],
                [
                    'label' => Yii::t('app_frontend', 'Social network accounts settings'),
                    'url' => ['/user/settings/networks'],
                    //'linkOptions' => ['data-method' => 'post'],
                ],
            ],
        ];
    }
    $menuItems[] = ['label' => 'EN', 'url' => [substr(\yii\helpers\Url::current(), 3), 'language' => 'en'], 'active'=>Yii::$app->language==='en-US',];
    $menuItems[] = ['label' => 'PL', 'url' => [substr(\yii\helpers\Url::current(), 3), 'language' => 'pl'], 'active'=>Yii::$app->language==='pl-PL',];
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
                 $type = SideNav::TYPE_WARNING;
                 echo SideNav::widget([
                    'type' => $type, 
                    'encodeLabels' => false,
                    'activateItems' => true,
                    'heading' => false,
                    'itemOptions' => [],
                    'items' => [
                        [
                            'url' => '/',
                            'label' => Icon::show('home',['style'=>'width:25px']) . 'Home',
                            //'icon' => 'home',
                            'active' => Yii::$app->controller->id==='site',
                            'type' => $type,
                        ],
                        [
                            'url' => Url::to(['/apiaries/view?id=1']),
                            'label' => Icon::show('cubes',['style'=>'width:25px']) . ucwords(Yii::t('app_frontend','apiaries')),
                            //'icon' => 'glyphicon glyphicon-globe',
                            'active' => Yii::$app->controller->id==='apiaries',
                        ],
                        [
                            'url' => Url::to(['/hives/index']),
                            'label' => Icon::show('archive',['style'=>'width:25px']) . ucwords(Yii::t('app_frontend','beehives')),
                            //'icon' => 'glyphicon glyphicon-book',
                            'active' => Yii::$app->controller->id==='hives',
                        ],
                        [
                            'url' => Url::to(['/queen/index']),
                            'label' => Icon::show('venus',['style'=>'width:25px']) . Yii::t('app_frontend','Queen bees'),
                            //'icon' => 'glyphicon glyphicon-book',
                            'active' => Yii::$app->controller->id==='queen',
                        ],
                        [
                            'url' => Url::to(['/mattingbox/index']),
                            'label' => Icon::show('venus-mars',['style'=>'width:25px']) . Yii::t('app_frontend','Mating boxes'),
                            //'icon' => 'glyphicon glyphicon-book',
                            'active' => Yii::$app->controller->id==='mattingbox',
                        ],     
                        [
                            'url' => Url::to(['/honeyharvest/index']),
                            'label' => Icon::show('battery-half',['style'=>'width:25px']) . Yii::t('app_frontend','Honey harvests'),
                            //'icon' => 'glyphicon glyphicon-book',
                            'active' => Yii::$app->controller->id==='honeyharvest',
                        ],
                        [
                            'url' => Url::to(['/feeding/index']),
                            'label' => Icon::show('cutlery',['style'=>'width:25px']) . ucwords(Yii::t('app_frontend','feeding')),
                            //'icon' => 'glyphicon glyphicon-book',
                            'active' => Yii::$app->controller->id==='feeding',
                        ],
                        [
                            'url' => Url::to(['/treatment/index']),
                            'label' => Icon::show('medkit',['style'=>'width:25px']) . Yii::t('app_frontend','Treatments'),
                            //'icon' => ,
                            'active' => Yii::$app->controller->id==='treatment',
                        ],   
                        [
                            'url' => Url::to(['/sensor/index']),
                            'label' => Icon::show('thermometer',['style'=>'width:25px']) . Yii::t('app_frontend','Sensors'),
                            //'icon' => 'glyphicon glyphicon-book',
                            'active' => Yii::$app->controller->id==='sensor',
                        ],
                        [
                            'url' => Url::to(['/cost/index']),
                            'label' => Icon::show('usd',['style'=>'width:25px']) . Yii::t('app_frontend','Costs'),
                            //'icon' => 'glyphicon glyphicon-book',
                            'active' => Yii::$app->controller->id==='cost',
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

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

